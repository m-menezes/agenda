<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoRequest extends FormRequest
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
    public function rules(){
        return [
            'titulo' => 'required',
            'descricao' => 'nullable',
            'responsavel' => 'required',
            'status' => 'required',
            'data_inicio' => 'required',
            'data_prazo' => 'required|after:data_inicio',
            'data_conclusao' => 'nullable|date|after:data_inicio',
        ];
    }
}
