<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $table='Salida';
    protected $primaryKey='idSalida';
    public $timetamps=false;

    protected $filleable =[
        'idCliente', 
        'idProducto',
        'idEmpleado',
        'idTipo_salida',
        'serie_comprobante',  
        'num_comprobante', 
        'precio_total', 
        'descripcion', 
        'cantidad',
        'estado',
    ];

    protected $guarded=[

    ];
}
