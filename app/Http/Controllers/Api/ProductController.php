<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(Request $request){
        $brand_filter = $request->query('brandFilter');
        $type_filter = $request->query('typeFilter');
        $category_filter = $request->query('categoryFilter');
        $products = Product::when(!empty($type_filter), function ($q) {
            $q->where('type_id', request('typeFilter'));
        })
        ->when(!empty($category_filter), function ($q) {
            $q->where('category_id', request('categoryFilter'));
        })
        ->when(!empty($brand_filter), function ($q) {
            $q->where('brand_id', request('brandFilter'));
        })->paginate(5);
        
        return response()->json([

            'success' => true,
            'results' => $products,

        ]);
    }

    public function show($slug){
         $product = Product::with('type', 'texture', 'brand')->where('slug', $slug)->first();
        // dd($products);

        if($product){
            return response()->json([
                'success' => true,
                'results' => $product
            ]);
        } else{
            return response()->json([
                'success' => false,
                'results' => 'Product not found!'
            ]);
        }
    }
}
