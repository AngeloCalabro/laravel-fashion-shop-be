<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Texture;
use App\Http\Requests\StoreTextureRequest;
use App\Http\Requests\UpdateTextureRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;

class TextureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $textures = Texture::paginate(10);
        return view('admin.textures.index', compact('textures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        // return view('admin.textures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTextureRequest  $request
     *
     */
    public function store(StoreTextureRequest $request)
    {
        $data = $request->validated();
        $slug = Texture::generateSlug($request->name);
        $data['slug'] = $slug;
        $newtexture = Texture::create($data);
        return redirect()->route('admin.textures.index', $newtexture->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Texture  $texture
     *
     */
    public function show(Texture $texture)
    {
        // return view('admin.textures.show', compact('texture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Texture  $texture
     *
     */
    public function edit(Texture $texture)
    {
        // return view('admin.textures.edit', compact('texture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTextureRequest  $request
     * @param  \App\Models\Texture  $texture
     *
     */
    public function update(UpdateTextureRequest $request, Texture $texture)
    {
        $validator = $this->updateValidation($request->all(),$texture);
        if ($validator->fails()) {
            return redirect()->back()->with('texture_id',$texture->id)->withErrors($validator, "update_errors");
        }
        $data = $validator->validated();
        $slug = texture::generateSlug($request->name);
        $data['slug'] = $slug;
        $texture->update($data);
        return redirect()->route('admin.textures.index')->with('message', "$texture->name update successfully");

        $data = $request->validated();
        $slug = Texture::generateSlug($request->name);
        $data['slug'] = $slug;
        $texture->update($data);
        return redirect()->route('admin.textures.index')->with('texture', "$texture->name update successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Texture  $texture
     *
     */
    public function destroy(Texture $texture)
    {
        $texture->delete();
        return redirect()->route('admin.textures.index')->with('message', "$texture->name deleted successfully");
    }

     private function storeValidation($request){
        $rules = [
            'name' => 'required|unique:textures|max:45'
        ];
        $messages = [
            'name.required' => 'il nome è obbligatorio',
            'name.unique' => 'il nome esiste già',
            'name.max' => 'il nome non può superare i :max caratteri',
        ];
        $validator = Validator::make($request, $rules , $messages);
        return $validator;
    }
    private function updateValidation($request, $texture){
        $rules = [
            'name' => ['required',Rule::unique('textures')->ignore($texture),'max:45']
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
