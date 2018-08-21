<?php

namespace SistemaFiemec\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestFormProforma extends FormRequest
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
            //ids
        //'idCliente'=>'requered',//idCliente pertenence ala tabla proforma

       /*

        'idProducto'=>'require',//idProducto pertenece a la tabla Detalleproforma y 



        //proforma
        'serie_proforma'=>'max:45',
        
        'subtotal'=>'numeric',
        'precio_total'=>'required',
        'descripcion'=>'max:500',

       //detalle profomra
        'cantidad'=>'required',
        'precio_venta'=>'required',
        
        'observacion_detalleP'=>'max:500',
        'descuento'=>'required', 
*/
        ];
    }
}
