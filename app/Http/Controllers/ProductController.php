<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //the read phase usually its SELECT*FROM products
    public function index()
    {
        $products = Product::all(); // this will return all the products from the database
        return view('products.index', compact('products')); // this will return the view with the
        // pass products data to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        $product = Product::findOrFail($id); // this will return the product with the given id or fail if not found
        return view('products.edit', compact('product')); // this will return the view with the
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($id); // this will return the product with the given id or fail if not found
        $product->update($data); // this will update the product with the given data
        return redirect()->route('products.index')->with('success', 'Product updated successfully.'); // this will redirect to the products index page with a success message




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id); // this will return the product with the given id or fail if not found
        $product->delete(); // this will delete the product
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.'); // this will redirect to the products index page with a success message
    }
}
