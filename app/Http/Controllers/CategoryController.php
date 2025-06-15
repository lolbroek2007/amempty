<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::withCount('products')->get();
        return view('category.index', compact('categories'));
    }

    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'Category_Name' => 'required|string|max:255',
            'Category_Description' => 'nullable|string|max:1000',
            'Category_Inactive' => 'boolean'
        ]);

        Category::create($validatedData);
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }
}
