<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products|min:3|max:50',
            'image' => 'nullable|image|max: 2500',
            'description' => 'nullable',
            'quantity' => 'nullable',
            'price' => 'required|min:0,01|max:9999,99',
            'price_sign' => 'nullable',
            'rating' => 'nullable',
            'type_id' => 'nullable|exists:types,id',
            'brand_id' => 'nullable|exists:brands,id',
            'texture_id' => 'nullable|exists:textures,id',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Il nome è obbligatorio.',
            'name.min' => 'Il nome deve essere lungo almeno :min caratteri.',
            'name.max' => 'Il nome non può superare i :max caratteri.',
            'name.unique:products' => 'Il nome esiste già',
            'price.required' => 'Il prezzo è obbligatorio.',
            'price.min' => 'Il prezo deve essere almeno :min.',
            'price.max' => 'Il prezo non può superare i :max.',
        ];
    }
}
