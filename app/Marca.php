<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
   protected $table = 'Marca';
    protected $primaryKey = 'idMarca';
    public $timestamps=false;


    protected $filleable = [
    	'nombre_proveedor',
      'estadoMa',
   ];

   protected $guarded =[
     
   ];
}
