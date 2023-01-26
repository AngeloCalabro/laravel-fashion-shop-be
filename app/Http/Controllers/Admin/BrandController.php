<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $brands = Brand::paginate(5);
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        // return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        $data = $request->validated();
        $slug = Brand::generateSlug($request->name);
        $data['slug'] = $slug;
        $newbrand = Brand::create($data);
        return redirect()->route('admin.brands.index', $newbrand->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     *
     */
    public function show(Brand $brand)
    {
        // return view('admin.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     *
     */
    public function edit(Brand $brand)
    {
        // return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBrandRequest  $request
     * @param  \App\Models\Brand  $brand
     *
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $validator = $this->updateValidation($request->all(),$brand);
        if ($validator->fails()) {
            return redirect()->back()->with('brand_id',$brand->id)->withErrors($validator, "update_errors");
        }
        $data = $validator->validated();
        $slug = Brand::generateSlug($request->name);
        $data['slug'] = $slug;
        $brand->update($data);
        return redirect()->route('admin.brands.index')->with('message', "$brand->name update successfully");

        // $data = $request->validated();
        // $slug = Brand::generateSlug($request->name);
        // $data['slug'] = $slug;
        // $brand->update($data);
        // return redirect()->route('admin.brands.index')->with('message', "$brand->name update successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     *
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.brands.index')->with('message', "$brand->name deleted successfully");
    }

    private function storeValidation($request){
        $rules = [
            'name' => 'required|unique:brands|max:45'
        ];
        $messages = [
            'name.required' => 'il nome è obbligatorio',
            'name.unique' => 'il nome esiste già',
            'name.max' => 'il nome non può superare i :max caratteri',
        ];
        $validator = Validator::make($request, $rules , $messages);
        return $validator;
    }
    private function updateValidation($request, $brand){
        $rules = [
            'name' => ['required',Rule::unique('brands')->ignore($brand),'max:45']
        ];
        $messages = [
            'name.required' => 'il nome è obbligatorio',
            'name.unique' => 'il nome esiste già',
            'name.max' => 'il nome non può superare i :max caratteri',
        ];
        $validator = Validator::make($request, $rules , $messages);
        return $validator;
    }
}
