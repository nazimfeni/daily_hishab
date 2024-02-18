<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $categories = Category::all(); // Retrieve all categories
            return view('categories.index', ['categories' => $categories]);
        } else {
            // If not authenticated, redirect to login with a message
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {
            return view('categories.create'); // Show the category creation form
        } else {
            // If not authenticated, redirect to login with a message
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'type' => 'required', // Add validation for the 'type' field
            'status' => 'required', // Add validation for the 'status' field
            'action' => 'required', // Add validation for the 'action' field
        ]);
        
        // Create a new category using the validated data
        $newCategory = Category::create($data);
        
        // Redirect to the category index page after creating the category
        return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {$category = Category::find($categoryId);

        if ($category) {
            $category->delete();
            return redirect(route('category.index'))->with('success', 'Category deleted successfully');
        } else {
            return redirect(route('category.index'))->with('error', 'Category not found');
        }
    }
}
