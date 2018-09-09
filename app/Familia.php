<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    protected $table = 'familia';
    protected $primaryKey = 'idFamilia';
    public $timestamps=false;


    protected $filleable = [
    	'impuesto';
    	'nombre_familia',
    	'descuento_familia',
      
     
   ];

   protected $guarded =[
     
   ];
}

}
