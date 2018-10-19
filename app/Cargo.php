<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table='Cargo';
    protected $primaryKey='idCargo';
    public $timestamps=false;


    protected $filleable = [
      
    	'nombre_cargo',
    	'descripcion',
    	'estado', 
   ];

   protected $guarded =[
     
   ];
}
