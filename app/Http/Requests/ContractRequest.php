<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
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
            // 'employe_id'=>'required|exists:employes,id',
            'tipo_contrato'=>'required',
            'fecha_inicio'=>'required|date|different:fecha_fin',
            'fecha_fin'=>'required|date|after:fecha_inicio'
        ];
    }
}
