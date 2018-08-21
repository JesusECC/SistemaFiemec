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
    	'descripcion',
    	
   ];

   protected $guarded =[
     
   ];
}