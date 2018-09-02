<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    protected $table='Tipo_moneda';
    protected $primaryKey='idTipo_moneda';
    public $timestamps=false;


    protected $filleable = [
    	'nombre_moneda',
    	'tipo_cambio',
    	'estado', 
   ];

   protected $guarded =[
     
   ];
}
