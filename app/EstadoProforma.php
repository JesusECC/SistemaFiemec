<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class EstadoProforma extends Model
{
    protected $table='Estado_proforma';
    protected $primarykey='idEstado_proforma';
    public $timestamps=false;


    protected $filleable= [

    	'idProforma',
    	'id_Empleado',
    	'nombre_estadoP',
    	'observacion_proforma',
   ];

   protected $guarded =[
     
   ];
}
