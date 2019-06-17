<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class Proforma extends Model
{
    protected $table='Proforma';
    protected $primaryKey='idProforma';
    public $timestamps=false;

    protected $filleable = [

    	'idCliente',
    	'idEmpleado',
        'idTipo_moneda',
        'cliente_empleado',
    	'serie_proforma',
    	'num_proforma',
    	'fecha_hora',
    	'igv',
    	'subtotal',
    	'precio_total',
        'precio_totalC',
    	'descripcion_proforma',
        'tipo_proforma',
        'simboloP',
        'caracterisiticas_proforma',
        'forma_de',
        'tipocambio',
        'plaza_fabricacion',
        'plazo_oferta',
        'garantia',
        'observacion_condicion',
        'observacion_proforma',
        'proyecto',
        'estado',
        'incluye',
    	
   ];

   protected $guarded =[
     
   ];
}

 

       