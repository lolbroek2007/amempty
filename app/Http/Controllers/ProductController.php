<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $categories = category::all();
        $products = Product::all();
        return view('products.index', compact('categories', 'products'));
    }

    public function create(Request $request){

        
        $validated = $request->validate([
            'Product_Name' => 'required|string|max:255',
            'Product_Description' => 'nullable|string',
            'Product_Quantity' => 'required|integer|min:0',
            'Product_Price' => 'required|numeric|min:0',
            'Product_Inactive' => 'boolean',
            'Category_ID' => 'nullable|exists:categories,id',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('message', 'Product created successfully!');
    }
}
