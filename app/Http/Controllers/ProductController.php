<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cacheKey = 'products_' . md5(json_encode(request()->all()));
        $data = Cache::remember($cacheKey, now()->addMinutes(10), function () {
            $productQuery = Product::with(['category']);
            if (request()->has('min_price') && request()->has('max_price')) {
                $productQuery->whereBetween('final_price', [request('min_price'), request('max_price')]);
            }
            if (request('category')) {
                $category = Category::firstWhere('title', request('category'));
                if ($category) {
                    $productQuery->where('category_id', $category->id);
                }
            }
            if (request('search')) {
                $productQuery->where('title', 'like', '%' . request('search') . '%');
            }
            return $productQuery->paginate(request('per_page', 18));
        });
        return response()->json([
            'success' => true,
            'data' => $data,
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
        return $product->load(['category'])->append('related_products');
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
