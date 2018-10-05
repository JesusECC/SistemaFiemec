<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use SistemaFiemec\Tipotarea;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;



use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use DB;

class ControllerTarea extends Controller
{
   public function __construct()
    {

    }
    
    public function create()
    {

     return view("proforma.tarea.create");

    }
 
 public function store(Request $request){

//dd($request);        
$nombre_tarea=$request->get('nombre_tarea');

foreach ($nombre_tarea as $key) {
 
	$detalle = new Tipotarea();
	$detalle->nombre_tarea=$key;
	$detalle->save();
}
         return Redirect::to('proforma/servicio/create');
     }
          


}



