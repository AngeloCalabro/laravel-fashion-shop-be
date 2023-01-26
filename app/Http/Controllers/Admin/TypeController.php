<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
        $types = Type::paginate(10);
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        // return view('admin.types.create');
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
        // return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     *
     */
    public function edit(Type $type)
    {
        // return view('admin.types.edit', compact('type'));
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
        $validator = $this->updateValidation($request->all(),$type);
        if ($validator->fails()) {
            return redirect()->back()->with('type_id',$type->id)->withErrors($validator, "update_errors");
        }
        $data = $validator->validated();
        $slug = Type::generateSlug($request->name);
        $data['slug'] = $slug;
        $type->update($data);
        return redirect()->route('admin.types.index')->with('message', "$type->name update successfully");

        // $data = $request->validated();
        // $slug = Type::generateSlug($request->name);
        // $data['slug'] = $slug;
        // $type->update($data);
        // return redirect()->route('admin.types.index')->with('message', "$type->name update successfully");
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

    private function storeValidation($request){
        $rules = [
            'name' => 'required|unique:types|max:45'
        ];
        $messages = [
            'name.required' => 'il nome è obbligatorio',
            'name.unique' => 'il nome esiste già',
            'name.max' => 'il nome non può superare i :max caratteri',
        ];
        $validator = Validator::make($request, $rules , $messages);
        return $validator;
    }
    private function updateValidation($request, $type){
        $rules = [
            'name' => ['required',Rule::unique('types')->ignore($type),'max:45']
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
