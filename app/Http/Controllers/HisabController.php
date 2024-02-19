<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hisab;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class HisabController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::check()) {
            $hisabs = Hisab::all();
            return view('hisabs.index', compact('hisabs'));
        }
        
        return redirect("login")->withSuccess('You are not allowed to access');

       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {
            
        // $options = Category::pluck('name', 'id');
           
           $options = Category::select('id', 'name', 'type')->get();
           
            return view('hisabs.create', compact('options') );
        }
        
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      

        $cat = Category::where('name', $request['category'])->first();
        
        // Ensure the category exists
        if (!$cat) {
            return redirect()->back()->withInput()->withErrors(['category' => 'Invalid category']);
        }
    
        // Fetch the type from the retrieved category
        //$category_type = $cat->type;

        $data = $request->validate([
            'category' => 'required',
            'amount' => 'required',
            // 'category_type' => 'required',
        ]);
        $data['category_type'] = $cat->type;
        
        $newHisab = hisab::create($data);
        return redirect(route('hisab.index'))->with('success', 'hisab created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hisab $hisab)
    {
        if (Auth::check()) {
            return view('hisabs.edit', ['hisab' => $hisab]);  
        }
        
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, hisab $hisab)
    {
        $data = $request->validate([
            'category' => 'required',
            'amount' => 'required',
        ]);
        
        $hisab->update($data);
        return redirect(route('hisab.index'))->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
