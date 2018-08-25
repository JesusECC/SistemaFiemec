<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class Proforma extends Model
{
    protected $table='Proforma';
    protected $primaryKey='idProforma';
    public $timestamps=false;

    protected $filleable = [

    	'idCliente',
    	'idEmpleado',
    	'serie_proforma',
    	'num_proforma',
    	'fecha_hora',
    	'igv',
    	'subtotal',
    	'precio_total',
    	'descripcion_proforma',
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

 

       