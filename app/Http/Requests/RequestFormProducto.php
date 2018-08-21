<?php

namespace SistemaFiemec\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestFormProducto extends FormRequest
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
           
        'serie_producto'=>'max:45',
        'codigo_pedido'=>'max:45',
        'codigo_producto'=>'max:45',
        'nombre_producto'=>'max:145',
        'marca_producto'=>'max:45',
        'stock'=>'numeric|max:11',
        'descripcion_producto'=>'max:200',
        'precio_unitario'=>'numeric',
        'foto'=>'max:250',
        'categoria_producto'=>'max:45',
        'estado'=>'max:15',
       
        ];
    }
}
