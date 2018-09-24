<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class DetalleProformaTableros extends Model
{
    //
    protected $table='Detalle_proforma_tableros';
    protected $primarykey='idDetalle_tableros';
    public $timestamps=false;


    protected $filleable = [
        'idProducto',
        'idProforma',
        'idTableros',
        'cantidad',
        'precio_venta',
        'texto_precio_venta',
        'descuento',
        'descripcionDP',
        'estadoDP',

   ];

   protected $guarded =[
     
   ];
}