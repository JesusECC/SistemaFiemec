<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use SistemaFiemec\Cargo;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use Response;
use Illuminate\Support\Collection;
use DB;

class ControllerCargo extends Controller
{
     public function __construct()
    {

    }
    public function index(Request $request)
    {
    if($request)
    {
       $query=trim($request->get('searchText'));
       $cargos=DB::table('Cargo')
       ->where('estado','=',1)
       ->paginate(10);
       return view('proforma.cargo.index',["cargos"=>$cargos,"searchText"=>$query]);
    }
}
    public function create()
    {
 
 return view("proforma.cargo.create");

    }

 public function store(Request $request)
 {     
 
$cargo=new Cargo;
$cargo->nombre_cargo=$request->get('nombre_cargo');
$cargo->estado=1;
$cargo->save();

return Redirect::to('proforma/cargo');
}

  public function edit($id)
  {
     
    return view("proforma.cargo.edit",["Cargo"=>Cargo::findOrFail($id)]);
  }
  public function update(Request $request,$id)
  {
$cargo=Cargo::find($id);
$cargo->nombre_cargo=$request->get('nombre_cargo');
$cargo->update();

return Redirect::to('proforma/cargo');
   }
  

  public function destroy($id)
  {
    $cargo=Cargo::findOrFail($id);
    $cargo->estado=0;
    $cargo->update();
    return Redirect::to('proforma/cargo');

  }
}
