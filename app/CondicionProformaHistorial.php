<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class CondicionProforma extends Model
{
    protected $table='Condicion_proforma';
    protected $primarykey='idCondicion_proforma';
    public $timestamps=false;


    protected $filleable = [

    	'idHistorial',
    	'forma_deH',
    	'nombres_RsH',
    	'plazo_fabricacionH',
    	'plazo_ofertaH',
    	'garantiaH',
    	'observacion_condicionH',
     
   ];

   protected $guarded =[
     
   ];
}
