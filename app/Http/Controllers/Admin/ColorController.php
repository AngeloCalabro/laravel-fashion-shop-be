<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;
use App\Models\Color;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $colors=Color::paginate(9);
        return view('admin.colors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
       // return view('admin.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreColorRequest  $request
     *
     */
    public function store(StoreColorRequest $request)
    {
        $data = $request->validated();
        $slug = Color::generateSlug($request->name);
        $data['slug'] = $slug;
        $newcolor = Color::create($data);
        return redirect()->route('admin.colors.index', $newcolor->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     *
     */
    public function show(Color $color)
    {
        //return view('admin.colors.show', compact('color'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     *
     */
    public function edit(Color $color)
    {
        //return view('admin.colors.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateColorRequest  $request
     * @param  \App\Models\Color  $color
     *
     */
    public function update(UpdateColorRequest $request, Color $color)
    {
        $validator = $this->updateValidation($request->all(),$color);
        if ($validator->fails()) {
            return redirect()->back()->with('color_id',$color->id)->withErrors($validator, "update_errors");
        }
        $data = $validator->validated();
        $slug = Color::generateSlug($request->name);
        $data['slug'] = $slug;
        $color->update($data);
        return redirect()->route('admin.colors.index')->with('message', "$color->name update successfully");

        // $data = $request->validated();
        // $slug = Color::generateSlug($request->name);
        // $data['slug'] = $slug;
        // $color->update($data);
        // return redirect()->route('admin.colors.index')->with('message', "$color->name update successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     *
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->route('admin.colors.index')->with('message', "$color->name deleted successfully");
    }

    private function storeValidation($request){
        $rules = [
            'name' => 'required|unique:colors|max:45'
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
            'name' => ['required',Rule::unique('colors')->ignore($brand),'max:45']
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
