<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;

use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * 
     */
    public function store(StoreTypeRequest $request)
    {
        $data = $request->validated();
        $slug = Type::generateSlug($request->name);
        $data['slug'] = $slug;
        $newtype = Type::create($data);
        return redirect()->route('admin.types.index', $newtype->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * 
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * 
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * 
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $data = $request->validated();
        $slug = Type::generateSlug($request->name);
        $data['slug'] = $slug;
        $type->update($data);
        return redirect()->route('admin.types.index')->with('message', "$type->name update successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     *
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index')->with('message', "$type->name deleted successfully");
    }
}
