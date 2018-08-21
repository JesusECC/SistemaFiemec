<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class ClienteDireccion extends Model
{
   protected $table='Cliente_direccion';
    protected $primarykey='idCliente_direccion';
    public $timestamps=false;


    protected $filleable = [

    	'idCliente',
    	'provincia',
    	'distrito',
    	'direcion',
    	'referencia',
    	
     
   ];

   protected $guarded =[
     
   ];
}

