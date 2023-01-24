<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreColorRequest extends FormRequest
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
            'name'=>'required|unique:colors|min:3|max:50',
            'hex_value'=>'required|max:7|unique:colors'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Il nome è obbligatorio.',
            'name.min' => 'Il nome deve essere lungo almeno :min caratteri.',
            'name.max' => 'Il nome non può superare i :max caratteri.',
            'name.unique:colors' => 'Il nome esiste già',
            'hex_value.required'=>'il valore è obbligatorio',
            'hex_value.max'=>'il colore deve essere di :max caratteri',
            'hex_value.unique:colors' => 'Il nome esiste già',
        ];
    }
}
