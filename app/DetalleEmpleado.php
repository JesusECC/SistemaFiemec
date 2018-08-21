<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class DetalleEmpleado extends Model
{
    protected $table='Detalle_empleado';
    protected $primarykey='detalleempl';
    public $timestamps=false;


    protected $filleable = [

    	'Empleado',
    	'cargo',
    	'sueldo',
    	'fecha_inicio',
    	'fecha_fin',
    	
     
   ];

   protected $guarded =[
     
   ];
}
