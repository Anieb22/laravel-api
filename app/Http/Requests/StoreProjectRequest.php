<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'azienda' => 'required|max:50',
            'nome_progetto' => 'required|min:3|max:50',
            'descrizione' => 'nullable|min:5',
            'passaggi' => 'nullable',
            'thumb' => 'nullable|max:250',
            'data_di_creazione' => 'required|date_format:Y-m-d|min:3|max:255',
        ];
    }
}
