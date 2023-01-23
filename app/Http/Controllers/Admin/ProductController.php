<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Texture;
use App\Models\Type;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create(Product $product)
    {
        $brands = Brand::all();
        $textures = Texture::all();
        $types = Type::all();
        return view('admin.products.create', compact('brands', 'textures', 'types', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     *
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $slug = Product::generateSlug($request->name);
        $data['slug'] = $slug;

        if($request->hasFile('api_featured_image')){
            $path = Storage::disk('public')->put('product_images', $request->images);
            $data['api_featured_image'] = $path;
        }

        $newproduct = Product::create($data);
        return redirect()->route('admin.products.show', $newproduct->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     *
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     *
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $textures = Texture::all();
        $types = Type::all();
        return view('admin.products.edit', compact('brands', 'textures', 'types', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     *
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $slug = Product::generateSlug($request->name);
        $data['slug'] = $slug;

        if($request->hasFile('images')){
            if ($product->images) {
                Storage::delete($product->images);
            }

            $path = Storage::disk('public')->put('product_images', $request->images);
            $data['images'] = $path;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('message', "$product->name update successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     *
     */
    public function destroy(Product $product)
    {
        if($product->images){
            Storage::delete($product->images);
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('message', "$product->name deleted successfully");
    }
}
