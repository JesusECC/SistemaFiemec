<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class CondicionProforma extends Model
{
    protected $table='Condicion_proforma';
    protected $primarykey='idCondicion_proforma';
    public $timestamps=false;


    protected $filleable = [

    	'idProforma',
    	'forma_de',
    	'nombres_Rs',
    	'plazo_fabricacion',
    	'plazo_oferta',
    	'garantia',
    	'observacion_condicion',
     
   ];

   protected $guarded =[
     
   ];
}
