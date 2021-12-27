<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'date_time_start' => 'required|date',
            'date_time_end' => 'required|date',
            'name_class' => 'required|max:40|string',
            'name_teacher' => 'required|max:30|string',
            'limit_student' => 'required|max:100|numeric',
        ];
    }
    
    public function messages()
    {
        return [
            'string' => 'Deve conter apenas letras',
            'required' => 'Campo obrigatório',
            'name_class.max' => 'Tamanho máximo de 40 caracteres',
            'name_teacher.max' => 'Tamanho máximo de 30 caracteres',
            'numeric' => 'Campo deve ser numérico',
            'limit_student.max' => 'O máximo de vagas é de 100 alunos',
            'date' => 'Deve ser uma data e hora válido.',
        ];
    }
}