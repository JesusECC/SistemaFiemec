<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class ProformaDetalleServicios extends Model
{
    protected $table='Detalle_proforma_servicios';
    protected $primarykey='idDetalle_proforma';
    public $timestamps=false;


    protected $filleable = [
      'idTarea',
      'idProforma',
      'idServicios',
      'cantidad',
      'precio_venta',
      'texto_precio_venta',
      'descuento',
      'descripcionDP',
      'estadoDP',
      'simboloDPT',
      'cambioDPT',
      'item',
      'item2',
      'subtitulo',

   ];

   protected $guarded =[
     
   ];
}
