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
        if (Auth::check()) {
            $products = Product::all();
            return view('products.index', ['products' => $products]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {
            return view('products.create');
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
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable',
            'role' => 'required', // Add validation for the 'role' field
        ]);

        $newProduct = Product::create($data);
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        if (Auth::check()) {
            return view('products.edit', ['product' => $product]);  
        }
        return redirect("login")->withSuccess('You are not allowed to access');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable',
            'role' => 'required', // Add validation for the 'role' field
        ]);

        $product->update($data);
        return redirect(route('product.index'))->with('success','Product Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'))->with('success','Product deleted successfully');
    }
}
