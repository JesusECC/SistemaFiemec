<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    
     protected $table='Cliente_Proveedor';
    protected $primaryKey='idCliente';
    public $timestamps=false;


    protected $filleable = [

        'idU',
    	'tipo_documento',//tabla aparte
    	'nro_documento',
    	'nombres_Rs',
    	'paterno',
    	'materno',
    	'fecha_nacimiento',
    	'sexo',
    	'telefono',
    	'celular',
    	'correo',
        'fotoCEP',
    	'tipo_persona',//tabla aparte
    	'cuenta_1',
    	'cuenta_2',
    	'cuenta_3',
    	'fecha_sistema',
        'Departamento',
        'Provincia',
        'Distrito',
        'Direccion',
        'Referencia',
    	'estado',
     
   ];

   protected $guarded =[
     
   ];
}
