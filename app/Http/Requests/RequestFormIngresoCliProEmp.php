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
        'nombres_Rs'=>'max:45',
        'paterno'=>'max:45',
        'materno'=>'max:45',
        'fecha_nacimiento'=>'date',
        'sexo'=>'max:45',
        'telefono'=>'max:11',
        'celular'=>'max:11',
        'correo'=>'max:100',
        'tipo_persona'=>'max:100',
        'cuenta_1'=>'max:45',
        'cuenta_2'=>'max:45',
        'cuenta_3'=>'max:45',
        'idCliente'=>'require',
        'provincia'=>'max:45',
        'distrito'=>'max:45',
        'direcion'=>'max:250',
        'referencia'=>'max:145',       
         ];
    }
}
