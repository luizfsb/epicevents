<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
        return [
            'titulo'=> ['required', 'max:50', 'min: 3'],
            'descricao'=> ['required', 'max: 250', 'min:3'],
            'data'=> ['required'],
            'rua' => ['required', 'min:3', 'max: 50'],
            'bairro'=>['required', 'min:3', 'max: 30'],
            'cidade' => ['required', 'min:3', 'max:50'],
            'estado' => ['required', 'min:1', 'max:2'],
            'cep' => ['required', 'min:8', 'max:9'],
            'horario' => ['required'],
            'imagem_nome' => ['required', 'image', 'mimes:jpeg,png,jpg'],
        ];
    }
}
