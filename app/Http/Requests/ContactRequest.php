<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'empresa' => 'required|max:100',
            'rut' => 'required|max:12',
            'contacto' => 'required|max:50',
            'telefono' => 'required|max:20',
            'email' => 'required|max:50',
            'comentarios' => 'required|max:1000',
        ];
    }
}
