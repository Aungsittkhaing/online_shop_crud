<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        if ($request->name) {
            $product = Product::orWhere('name', 'LIKE', '%' . $request->name . '%')
                ->orWhere('price', 'LIKE', '%' . $request->price . '%')
                ->orWhere('stock', 'LIKE', '%' . $request->stock . '%')
                ->get();
            return response()->json([
                'product' => $product,
                'message' => 'success',
            ]);
        }
        return response()->json([
            'message' => 'Not found search data',
        ]);
    }
    public function index()
    {
        $products = Product::with('category')->get()->map(function ($product) {
            return [
                "id" => $product->id,
                "name" => $product->name,
                "price" => $product->price,
                "stock" => $product->stock,
                "status" => $product->status,
                "category" => $product->category->name,
                "description" => $product->description,
                "image" => $product->image
            ];
        });
        // $products = Product::with('category')->get();
        return response()->json([
            'products' => $products,
            'message' => 'Success',
            'statusCode' => 200
        ], 200);
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
        //upload image
        if ($request->image) {
            $file = $request->image;
            $newImg = "product_image" . uniqid() . "." . $file->extension();
            $file->storeAs("public/productImage", $newImg);
        }
        //store products
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->image = $newImg;
        $product->save();

        return response()->json([
            'message' => 'Product is added successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = Product::find($id);
        if ($products == null) {
            return response()->json([
                'message' => 'product not found'
            ]);
        }
        return response()->json([
            'id' => $products->id,
            'name' => $products->name,
            'price' => $products->price,
            'stock' => $products->stock,
            'description' => $products->description,
            'status' => $products->status,
            'category' => $products->category->name,
            'image' => $products->image,
            'message' => 'Success',
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Product::find($id);
        $products->name = $request->name;
        $products->price = $request->price;
        $products->stock = $request->stock;
        $products->status = $request->status;
        $products->category_id = $request->category_id;
        $products->description = $request->description;
        if ($request->image) {
            $file = $request->image;
            $newImg = "product_image" . uniqid() . "." . $file->extension();
            $file->storeAs("public/productImage", $newImg);
            $products->image = $newImg;
        }
        $products->update();
        return response()->json([
            'message' => 'Product is updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
