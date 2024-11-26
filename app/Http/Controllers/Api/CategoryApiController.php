<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class CategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        if ($request->name) {
            $category = Category::where('name', 'LIKE', '%' . $request->name . '%')->get();
            return response()->json([
                'category' => $category,
                'message' => 'success',
            ]);
        }
        return response()->json([
            'message' => 'Not found search data',
        ]);
    }
    public function index()
    {
        // $categories = Category::all();
        $categories = Category::select(['id', 'name', 'description'])->get();

        if ($categories->isEmpty()) {
            return apiResponse($categories, 'category is not found', '404');
        }
        return apiResponse($categories, 'success', '200');
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
        $categories = new Category();
        $categories->name = $request->name;
        $categories->description = $request->description;
        $categories->save();

        return response()->json([
            // 'categories' => $categories,
            'message' => 'Category is added successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::find($id);
        return response()->json([
            'categories' => $categories
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
        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->description = $request->description;
        $categories->update();
        return response()->json([
            'message' => 'Category is updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return response()->json([
            'message' => 'Category is deleted successfully'
        ], 200);
    }
}
