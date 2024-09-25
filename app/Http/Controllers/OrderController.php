<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()){
            $user = Auth::user();

            // $orders = $user->orders;
            $orders = $user->orders()->orderBy('created_at', 'desc')->get();
            return view('orders.index',['orders'=>$orders]);        
        }else{
            return view('not-found.page-not-found');
        }
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        if(Auth::user()){
            $user = Auth::user();

            $products = $user->products;
            return view('orders.create')->with(['products'=>$products]);        
        }else{
            return view('not-found.page-not-found');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = Auth::user();
         // Validar los campos de la orden
        $request->validate([
            'customer_id' => 'nullable|exists:customers,id|numeric',
            'customer_name' => 'nullable|string|required_if:customer_id,null|min:3',
            'delivery' => 'required|boolean',
            'delivery_address' => 'nullable|string',
            'delivery_cost' => 'nullable|numeric',
            'delivery_date' => 'required|date',
            'products.*.quantity' => 'required|integer|min:0', // Validar que cada producto tenga cantidad
        ]);
        
    // Crear la orden
        $order = Order::create([
            'user_id' => $user->id,
            'customer_id' => $request->input('customer_id'),
            'customer_name' => $request->input('customer_name'),
            'status' => 'new', // Estado inicial de la orden
            'delivery' => $request->input('delivery'),
            'delivery_address' => $request->input('delivery_address'),
            'delivery_cost' => $request->input('delivery_cost'),
            'total' => 0, // se calcula más adelante
            'created_at' => now(),
            'updated_at' => now(),
        ]);   

        $total = 0;

    // Guardar los productos asociados a la orden
        foreach ($request->products as $productId => $productData) {
            if ($productData['quantity'] > 0) {
                $product = Product::find($productId);
                
                // Crear un nuevo OrderItem
                $order->orderItems()->create([
                    'product_id' => $productId,
                    'quantity' => $productData['quantity'],
                    'sub_total' => $product->price * $productData['quantity'],
                ]);

                // Calcular el total de la orden
                $total += $product->price * $productData['quantity'];
            }
        }

        // Actualizar el total de la orden
        $order->update([
            'total' => $total + $request->delivery_cost,
        ]);

        return redirect()->route('orders')->with('status', 'Order created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    /**
     * Update the status of an order.
     */
    public function updateStatus(Request $request, Order $order)
    {
        $statuses = ['new', 'pending', 'in_preparation', 'in_delivery', 'delivered', 'cancelled'];

        // Obtiene el estado actual
        $currentStatusIndex = array_search($order->status, $statuses);
    
        // Si el estado es el último (cancelled), vuelve al estado 'new'
        if ($currentStatusIndex === count($statuses) - 1) {
            $currentStatusIndex = 0;
            
            $nextStatus = $statuses[$currentStatusIndex];
            $order->status = $nextStatus;
            $order->save();
        }else{
 
            $nextStatus = $statuses[$currentStatusIndex + 1];
            $order->status = $nextStatus;
            $order->save();
        }
    
      
    
        return response()->json(['status' => $nextStatus], 200);
    }
}
