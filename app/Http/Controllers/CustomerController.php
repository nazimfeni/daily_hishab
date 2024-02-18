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
        if (Auth::check()) {
            $customers = Customer::all();
            return view('customers.index', ['customers' => $customers]);
        }
        
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {
            return view('customers.create');
        }
        
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
$data = $request->validate([
    'name' => 'required',
    'phone' => 'required',
    'email' => 'required|email',
    'address' => 'required',
    'status' => 'required',
]);

$newCustomer = Customer::create($data);
return redirect(route('customer.index'))->with('success', 'Customer created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        if (Auth::check()) {
        return view('customers.edit', ['customer' => $customer]);  
    }
    
    return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'status' => 'required',
        ]);
        
        $customer->update($data);
        return redirect(route('customer.index'))->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
