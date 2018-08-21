<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class Proforma extends Model
{
    protected $table='Historial';
    protected $primaryKey='idHistorial';
    public $timestamps=false;

    protected $filleable = [
        'idProforma',
    	'idCliente',
    	'idEmpleado',
    	'idProducto',
    	'serie_proformaH',
    	'num_proformaH',
    	'fecha_horaH',
    	'igvH',
    	'subtotalH',
    	'precio_totalH',
    	'descripcionH',
    	
   ];

   protected $guarded =[
     
   ];
