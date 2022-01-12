<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
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
        // dd($this->route('employee'));
        if ($this->route('employee')) {
            return [
                'nombre' => 'required',
                'apellidos' => 'required',
                'email' => 'required|email',
                'fecha_nacimiento' => 'required|date',
                'telefono' => 'required|size:9',
                'area' => 'required',
                'cargo' => 'required'
            ];
        }
        return [
            'nombre' => 'required',
            'apellidos' => 'required',
            // 'dni' => 'required|size:8|unique:employees',
            'dni' => [
                'required',
                // 'unique:employes',
                'size:8',
                Rule::unique('employes')->ignore($this->route('employee'))
            ],
            'email' => 'required|email',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|size:9',
            'area' => 'required',
            'cargo' => 'required'
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'nombre.required' => 'I need the title',
    //         'apellidos.required' => 'I need the url',
    //         'dni.required' => 'I need the description',
    //         'dni.unique' => 'I need the description',
    //         'dni.required' => 'I need the description',
    //         'email.required' => 'I need the title',
    //         'email.email' => 'esta mal',
    //         'fecha_nacimiento.required' => 'I need the url',
    //         'telefono.required' => 'I need the description',
    //         'area.required' => 'I need the url',
    //         'cargo.required' => 'I need the description',
    //     ];
    // }
}
