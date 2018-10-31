<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class Tipotarea extends Model
{
    protected $table='Tarea';
    protected $primaryKey='idTarea';
    public $timestamps=false;


    protected $filleable = [
    	
    	'nombre_tarea',
    	'descripcion_tarea',
      'estado',
      'precioT',
      'item'
      
     
   ];

   protected $guarded =[
     
   ];
}
