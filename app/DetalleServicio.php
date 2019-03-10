<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class DetalleServicio extends Model
{
    //
    protected $table='Detalle_proforma_servicios';
    protected $primarykey='idDetalle_proforma';
    public $timestamps=false;

    

    protected $filleable = [
        'idProforma',
        'idServicios',
        'idTarea',
        'texto_precio_venta',
        'cantidad',
        'descuento',
        'item2',
        'subtitulo',
        'descripcionDP',
        'estadoDP'
   ];

   protected $guarded =[
     
   ];
}
