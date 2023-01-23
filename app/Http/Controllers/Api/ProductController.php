<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with('type', 'texture', 'brand')->all();
        return response()->json([
            'success' => true,
            'results' => $products
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
