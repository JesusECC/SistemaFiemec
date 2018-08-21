<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class TipoProforma extends Model
{
     protected $table='tipo_proforma';
    protected $primarykey='idTipoproforma';
    public $timestamps=false;


    protected $filleable = [

    	
    	'idProforma',
    	'tipo_proforma',
    	'categoria',
    	'caracterisiticas_P',
    	
   ];

   protected $guarded =[
     
   ];
}
