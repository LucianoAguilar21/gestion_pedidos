<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
        if(Auth::user()){
            $user = Auth::user();

            $customers = $user->customers;
            return view('customers.index')->with(['customers'=>$customers]);
        }else{
            return view('not-found.page-not-found');
        }
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' =>['required','min:3'],
            'last_name' => ['min:3'],
            'phone' => ['min:3'],
            'email' => ['min:3'],
        ]);

        $request->user()->customers()->create($validated);

        return to_route('customers')->with('status',_('Customer added Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show')->with(['customer'=>$customer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit')->with(['customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' =>['required','min:3'],
            'last_name' =>[],
            'phone' =>['min:3'],
            'email' =>['min:3'],
            
        ]);

        if($customer->update($validated)){        
            return to_route('customers')->with('status',__('¡Customer updated Successfully'));
        }else{
            return to_route('customers.edit', $customer)->with('failed',__('Customer updated Failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return to_route('customers')->with(['status'=>__('Customer deleted')]);
    }
}
