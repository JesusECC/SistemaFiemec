<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class Tableros extends Model
{
    protected $table='Tableros';
    protected $primaryKey='idTableros';
    public $timestamps=false;

    protected $filleable = [
        
        'idProforma',
        'serie_proforma',
        'nombre_tablero',
        'caracteristicas_tablero',
        'estadoT',
        
    	
   ];

   protected $guarded =[
     
   ];

}
