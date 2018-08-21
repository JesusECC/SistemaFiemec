<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
   
    protected $table='Empleado';
    protected $primarykey='id';
    public $timestamps=false;


    protected $filleable = [

    	'tipo_documento',
    	'nro_documento',
    	'nombres',
    	'materno',
    	'paterno',
    	'fecha_nacimiento',
    	'sexo',
    	'telefono',
    	'celular',
    	'usuario',
    	'contraseña',
    	'direccion',
    	'correo',
    	'foto',
    	'estado',
     
   ];

   protected $guarded =[
     
   ];


}
