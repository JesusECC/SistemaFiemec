<?php

namespace SistemaFiemec;

use Illuminate\Database\Eloquent\Model;

class UserCargo extends Model
{
    protected $table='User_Cargo';
    public $timestamps=false;


    protected $filleable = [
      'idCargo',
      'idUser',
    	
   ];

   protected $guarded =[
     
   ];
}
