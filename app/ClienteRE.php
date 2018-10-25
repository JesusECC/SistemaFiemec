<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class ClienteRE extends Model
{
    protected $table = 'Cliente_Representante';
    protected $primaryKey = 'idCR';
    public $timestamps=false;


    protected $filleable = [
    	
        'nombre_RE',
        'idCliente'  
   ];

   protected $guarded =[
     
   ];
}
