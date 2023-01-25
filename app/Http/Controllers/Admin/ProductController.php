<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Texture;
use App\Models\Type;
use App\Models\Tag;

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
        $products = Product::paginate(9);
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
        $tags = Tag::all();
        return view('admin.products.create', compact('brands', 'textures', 'types', 'tags', 'product'));
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

        if($request->hasFile('images')){
            $path = Storage::disk('public')->put('images', $request->images);
            $data['images'] = $path;
        }

        $newproduct = Product::create($data);
        if($request->has('tags')){
            $newproduct->tags()->attach($request->tags);
        }
        if($request->has('colors')){
            $newproduct->colors()->attach($request->colors);
        }
        

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
        $tags = Tag::all();
        return view('admin.products.edit', compact('brands', 'textures', 'types', 'tags', 'product'));
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

            $path = Storage::disk('public')->put('images', $request->images);
            $data['images'] = $path;
        }

        $product->update($data);

        if($request->has('tags')){
            $product->tags()->sync($request->tags);
        } else {
            $product->tags()->sync([]);
        }

        if($request->has('colors')){
            $product->colors()->sync($request->colors);
        } else {
            $product->colors()->sync([]);
        }

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
