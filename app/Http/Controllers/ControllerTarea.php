<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use SistemaFiemec\Servicios;
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
        
 return view("proforma.cliente.create");

    }
  


 public function store(Request $request){
  
                  $tarea=new Clientes;
                  $tarea->tipo_documento='DNI';
               
                  
                
                  $Cliente->save();
 
            
            return redirect::to('proforma/cliente');
          }


}
