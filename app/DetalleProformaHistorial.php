<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class DetalleProformaHistorial extends Model
{
    protected $table='Detalle_historial';
    protected $primarykey='idDetalle_proformaH';
    public $timestamps=false;


    protected $filleable = [
   	
    	'idHistorial',
      'idProducto',
    	'cantidadH',
    	'precio_ventaH',
    	'texto_precio_ventaH',
    	'observacion_detallePH',
    	'descuentoH', 
      
   ];

   protected $guarded =[
     
   ];
}
