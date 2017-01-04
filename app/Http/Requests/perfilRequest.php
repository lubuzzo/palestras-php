<?php

namespace SeCoT\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class perfilRequest extends FormRequest
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
            'email' =>  'email',
            'password' => 'min:6',
            'r-password' => 'required_with:password|min:6|same:password',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute não pode ser vazio.',
            'email' => 'O campo :attribute deve ser um e-mail válido',
            'same' => 'As senhas não batem',
            'min' => 'O :attribute deve ter no mínimo :min caracteres'
        ];
    }
}
