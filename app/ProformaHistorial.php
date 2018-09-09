<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class ProformaHistorial extends Model
{
    protected $table='Historial';
    protected $primaryKey='idHistorial';
    public $timestamps=false;

    protected $filleable = [
        'idCliente',
        'idEmpleado',
        'idProforma',
        'serie_proforma',
        'num_proforma',
        'fecha_hora',
        'igv',
        'subtotal',
        'precio_total',
        'descripcion',
        'tipo_proforma',
        'caracterisiticas_proforma',
        'forma_de',
        'plazo_fabricacion',
        'plazo_oferta',
        'garantia',
        'observacion_condicion',
        'observacion_proforma',
        'estado',
    	
   ];

   protected $guarded =[
     
   ];
}
