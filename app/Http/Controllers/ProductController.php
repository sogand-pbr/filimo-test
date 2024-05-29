<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with(['category']);

        if (request()->has('min_price') && request()->has('max_price'))
            $product = $product->whereBetween('final_price', [request('min_price') && request('max_price')]);
        if (request('category')) {
            $category = Category::firstWhere('title', request('category'));
            $product = $product->where('category_id', $category->id);
        }
        if (request('search'))
            $product = $product->where('title', "%" . request('search') . "%");
        return response()->json([
            'success' => true,
            'data' => $product->paginate(request('per_page', '18')),
        ]);
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
    public function show(Product $product)
    {
        return $product->load(['category']);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
