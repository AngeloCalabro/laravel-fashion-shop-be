<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateColorRequest extends FormRequest
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
            'name' => ['required', Rule::unique('colors')->ignore($this->color), 'min:3', 'max:50'],
            'hex_value'=>['required',Rule::unique('colors')->ignore($this->color),'max:7']
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Il nome è obbligatorio.',
            'name.min' => 'Il nome deve essere lungo almeno :min caratteri.',
            'name.max' => 'Il nome non può superare i :max caratteri.',
            'name.unique:products' => 'Il nome esiste già',
            'hex_value.required' => 'Il colore è obbligatorio.',
         
            'hex_value.max' => 'Il prezo non può superare i :max.',
        ];
    }
}
