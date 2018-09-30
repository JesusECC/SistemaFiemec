<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    protected $table = 'Servicios';
    protected $primaryKey = 'idServicios';
    public $timestamps=false;


    protected $filleable = [
    	
    	'nombre_servicio',
    	'caracteristicas_servicio',
    	'estadoT',
      
     
   ];

   protected $guarded =[
     
   ];
}
