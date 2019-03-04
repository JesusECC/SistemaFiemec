<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class DetalleBandejas extends Model
{
    protected $table='Detalle_bandejas';
    protected $primarykey='idDetalle_bandejas';
    public $timestamps=false;


    protected $filleable = [
      'idProducto',
      'idGalvanizado',
      'idPintura',
      'idProforma',
      'espesor',
      'precioGal',
      'precioPin',
      'precioTap',
      'preciouniB',
      'tramo',
      'dimenciones',
      'tapa',
      'cantidad',
      'precio_venta',
      'texto_precio_venta',
      'descuento',
      'medidas',
      'descripcionDP',
      'estadoDB',
      'cambioBandejas',
      'simboloBandejas',
      'promed'

   ];

   protected $guarded =[
     
   ];
}
 




