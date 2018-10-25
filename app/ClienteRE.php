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
        'idCliente',
        'estadoCE',
        'telefonoRE',
        'CelularRE',
        'nro_doc_RE',
        'tipo_doc'  
   ];

   protected $guarded =[
     
   ];
}
