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
        'idCliente'=>'require',
        'idEmpleado'=>'require',
        'serie_proforma'=>'max:45',
        'num_proforma'=>'max:45',
        //'fecha_hora',--detro del codigo se asignara el valor
        'igv'=>'numeric',
        'subtotal'=>'numeric',
        'precio_total'=>'numeric',
        'descripcion'=>'max:500',
        'tipo_proforma'=>'max:45',
        'caracterisiticas_proforma'=>'max:500',
        'forma_de'=>'max:125',
        'plazo_fabricacion'=>'max:145',
        'plazo_oferta'=>'max:45',
        'garantia'=>'max:45',
        'observacion_condicion'=>'max:500',
        'observacion_estado'=>'max:500',
        'estado',
        ];
    }
}
