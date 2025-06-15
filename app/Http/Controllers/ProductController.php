<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $categories = Category::all();
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
            'Category_ID' => 'required|exists:categories,id',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('message', 'Product created successfully!');
    }

    public function destroy($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('message', 'Product deleted successfully!');
    }

    public function edit($id){
        $products = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('products', 'categories'));
    }

    public function update(Request $request, $id){
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'Product_Name' => 'required|string|max:255',
            'Product_Description' => 'nullable|string',
            'Product_Quantity' => 'required|integer|min:0',
            'Product_Price' => 'required|numeric|min:0',
            'Product_Inactive' => 'boolean',
            'Category_ID' => 'required|exists:categories,id',
        ]);
        $product->update($validated);
        return redirect()->route('products.index')->with('message', 'Product updated successfully!');
    }

    public function info($id){
        $product = Product::findOrFail($id);
        return view('products.info', compact('product'));
    }

}
