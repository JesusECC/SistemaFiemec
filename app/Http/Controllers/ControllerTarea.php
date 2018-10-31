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
    public function index(Request $request)
    {
    if($request)
    {
       $query=trim($request->get('searchText'));
       $tareas=DB::table('Tarea')
       ->where('estado','=',1)
       ->paginate(10);
       return view('proforma.tarea.index',["tareas"=>$tareas,"searchText"=>$query]);
    }
}
    
    public function create()
    {

     return view("proforma.tarea.create");

    }
 
 public function store(Request $request){


$nombre_tarea=$request->get('nombre_tarea');
$precioT=$request->get('precioT');

//dd($nombre_tarea,$precioT);  

$cont=0;

while ($cont<count($nombre_tarea)) {
 
    $tarea = new Tipotarea();
    $tarea->nombre_tarea=$nombre_tarea[$cont];
    $tarea->precioT=$precioT[$cont];
    $tarea->estado=1;
    $tarea->save();

    $cont=$cont+1;
}


         return Redirect::to('proforma/tarea');
     }

     public function edit($id)
    {

     return view("proforma.tarea.edit",["tarea"=>Tipotarea::findOrFail($id)]);

    }
 
 public function update(Request $request,$id){
       

    $tarea=Tipotarea::find($id);
    $tarea->nombre_tarea=$request->get('nombre_tarea');
    $tarea->precioT=$request->get('precioT');
    $tarea->update();

         return Redirect::to('proforma/tarea');
     }
          
          
public function destroy($id)
    {
        $tarea=Tipotarea::findOrFail($id);
        $tarea->estado=0;
        $tarea->update();
        return Redirect::to('proforma/tarea');

    }

}



