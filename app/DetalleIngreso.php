<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    protected $table='Detalle_ingreso'
    protected $primaryKey='idDetalleingreso'
    public $timestamps=false;


    protected $filleable = [

    	
    	'idIngreso',
    	'idProducto',
    	'cantidad',
    	'costo',
    	'precio',
    	'total',
    	 
   ];

   protected $guarded =[
     
   ];
}
