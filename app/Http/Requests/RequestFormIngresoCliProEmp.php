<?php

namespace SistemaFiemec\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestFormIngresoCliProEmp extends FormRequest
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
        'tipo_documento'=>'max:45',
        'nro_documento'=>'max:145',
        
        
        'fecha_nacimiento'=>'date',
        'sexo'=>'max:45',
        'telefono'=>'max:11',
        'celular'=>'max:11',
        'correo'=>'max:100',
        'fotoCEP'=>'mimes:jpeg,bmp,jpg,png',
        'tipo_persona'=>'max:100',
        'cuenta_1'=>'max:45',
        'cuenta_2'=>'max:45',
        'cuenta_3'=>'max:45',
        'Departamento'=>'max:45',
        'Distrito'=>'max:45',
        'Direcion'=>'max:250',
        'Referencia'=>'max:145',       
         ];
    }
}
