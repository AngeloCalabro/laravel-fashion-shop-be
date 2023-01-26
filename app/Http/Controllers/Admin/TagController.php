<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        // return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTagRequest  $request
     *
     */
    public function store(StoreTagRequest $request)
    {
        $data = $request->validated();
        $slug = Tag::generateSlug($request->name);
        $data['slug'] = $slug;

        $newtag = Tag::create($data);
        if($request->has('products')){
            $newtag->products()->attach($request->products);
        }

        // return redirect()->route('admin.tags.index', $newtag->slug);
        return redirect()->route('admin.tags.index')->with('message', "$newtag->name update successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     *
     */
    public function show(Tag $tag)
    {

        // return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     *
     */
    public function edit(Tag $tag)
    {
        // return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTagRequest  $request
     * @param  \App\Models\Tag  $tag
     *
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $validator = $this->updateValidation($request->all(),$tag);
        if ($validator->fails()) {
            return redirect()->back()->with('tag_id',$tag->id)->withErrors($validator, "update_errors");
        }
        $data = $validator->validated();
        $slug = Tag::generateSlug($request->name);
        $data['slug'] = $slug;
        $tag->update($data);
        return redirect()->route('admin.tags.index')->with('message', "$tag->name update successfully");

        // $data = $request->validated();
        // $slug = Tag::generateSlug($request->name);
        // $data['slug'] = $slug;

        // $tag->update($data);

        // if($request->has('products')){
        //     $tag->products()->sync($request->products);
        // } else {
        //     $tag->products()->sync([]);
        // }

        // return redirect()->route('admin.tags.index')->with('message', "$tag->name update successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     *
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('message', "$tag->name deleted successfully");
    }

    private function storeValidation($request){
        $rules = [
            'name' => 'required|unique:tags|max:45'
        ];
        $messages = [
            'name.required' => 'il nome è obbligatorio',
            'name.unique' => 'il nome esiste già',
            'name.max' => 'il nome non può superare i :max caratteri',
        ];
        $validator = Validator::make($request, $rules , $messages);
        return $validator;
    }
    private function updateValidation($request, $tag){
        $rules = [
            'name' => ['required',Rule::unique('tags')->ignore($tag),'max:45']
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
