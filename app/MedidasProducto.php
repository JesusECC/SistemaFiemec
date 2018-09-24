<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class MedidasProducto extends Model
{
    protected $table='Medidas_Producto';
    protected $primaryKey='idMedidas_Producto';
    public $timestamps=false;


    protected $filleable = [
    'idMedidas',
    'idProducto',
    	 
   ];

   protected $guarded =[
     
   ];
}
