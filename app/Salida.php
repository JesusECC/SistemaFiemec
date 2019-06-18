<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $table='Salida';
    protected $primaryKey='idSalida';
    public $timestamps=false;

    protected $filleable =[
        'idCliente', 
        'idEmpleado',
        'idProducto',
        'idTipo_salida',  
        'num_comprobante',
        'fecha_hora', 
        'precio_total', 
        'descripcion', 
        'estado',
        'cantidad',
        
    ];

    protected $guarded=[

    ];
}
