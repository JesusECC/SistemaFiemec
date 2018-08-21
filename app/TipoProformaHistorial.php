<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class TipoProforma extends Model
{
     protected $table='tipo_historial';
    protected $primarykey='idTipoproformaH';
    public $timestamps=false;


    protected $filleable = [

    	'idHistorial',
    	'idProforma',
    	'tipo_proformaH',
    	'categoriaH',
    	'caracterisiticas_PH',
    	
   ];

   protected $guarded =[
     
   ];
}
