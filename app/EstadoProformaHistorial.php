<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class EstadoProforma extends Model
{
    protected $table='Estado_historial';
    protected $primarykey='idEstado_proformaH';
    public $timestamps=false;


    protected $filleable= [
      'idHistorial',
    	'idProforma',
    	'id_Empleado',
    	'nombre_estadoPH',
    	'observacion_proformaH',
   ];

   protected $guarded =[
     
   ];
}
