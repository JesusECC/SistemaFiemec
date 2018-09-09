<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class DetalleProforma extends Model
{
    protected $table='Detalle_proforma';
    protected $primarykey='idDetalle_proforma';
    public $timestamps=false;


    protected $filleable = [
      'idProducto',
      'idProforma',
      'idTableros',
      'cantidad',
      'precio_venta',
      'texto_precio_venta',
      'observacion_detalleP',
      'descuento',
      'descripcionDP',

   ];

   protected $guarded =[
     
   ];
}
