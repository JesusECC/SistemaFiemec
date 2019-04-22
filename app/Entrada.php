<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
   protected $table='Ingreso';
   protected $primaryKey='idIngreso';
   public $timestamps=false;

   protected $filleable = [

   	'idEmpleado',
   	'idProducto',
   	'numero_comprobante',
   	'igv',
   	'subtotal',
   	'precio_total',
   	'estado',
   	'descripcion_ingreso',
   	'fecha',
   	'cantidad',
   	
   ];

   protected $guarded = [

   ];
}
