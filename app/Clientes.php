<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    
     protected $table='Cliente_Proveedor';
    protected $primarykey='idCliente';
    public $timestamps=false;


    protected $filleable = [

    	'tipo_documento',
    	'nro_documento',
    	'nombres_Rs',
    	'paterno',
    	'materno',
    	'fecha_nacimiento',
    	'sexo',
    	'telefono',
    	'celular',
    	'correo',
    	'tipo_persona',
    	'cuenta_1',
    	'cuenta_2',
    	'cuenta_3',
    	'fecha_sistema',
    	'estado',
     
   ];

   protected $guarded =[
     
   ];
}
