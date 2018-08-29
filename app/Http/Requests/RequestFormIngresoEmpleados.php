<?php

namespace SistemaFiemec\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestFormIngresoEmpleados extends FormRequest
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
        'nro_documento'=>'max:11',
        'nombres'=>'max:45',
        'materno'=>'max:45',
        'paterno'=>'max:45',
        'fecha_nacimiento'=>'date',
        'sexo'=>'max:45',
        'telefono'=>'max:45',
        'celular'=>'max:45',
        'usuario'=>'max:45',
        'contraseño'=>'max:45',
        'direccion'=>'max:250',
        'correo'=>'max:90',
        'fotoE'=>'mimes:jpeg,bmp,jpg,png',
        'estado'=>'max:15',
        'id'=>'require',
        'cargo'=>'max:50',
        'sueldo'=>'numeric',
        'fecha_inicio'=>'date',
        'fecha_fin'=>'date',
        
        ];
    }
}
