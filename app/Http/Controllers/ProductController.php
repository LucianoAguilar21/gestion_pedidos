<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $products = $user->products;
        return view('products.index')->with(['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' =>['required','min:3'],
            'price' => ['required','numeric','gt:0']
        ]);

        $request->user()->products()->create($validated);

        return to_route('products')->with('status',_('¡Product created Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show')->with(['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit')->with(['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' =>['required','min:3','unique:products,name,'. $product->id],
            'price' => ['required','numeric','gt:0']
        ]);

        if($product->update($validated)){        
            return to_route('products')->with('status',__('¡Product updated Successfully'));
        }else{
            return to_route('products.edit', $product)->with('failed',__('¡Product updated Failed'));
        }
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('products')->with(['status'=>__('Product deleted')]);
    }
}
