<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        return response()->json(Product::all());
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    // Display the specified resource
    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            return response()->json($product);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->update($request->all());
            return response()->json($product);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Product deleted successfully']);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
}
