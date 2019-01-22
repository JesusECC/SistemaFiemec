<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use SistemaFiemec\Marca;
use SistemaFiemec\Familia;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use Response;
use Illuminate\Support\Collection;
use DB;

class ControllerMarca extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
    if($request)
    {
       $query=trim($request->get('searchText'));
       $marcas=DB::table('Marca')
       ->where('nombre_proveedor','LIKE','%'.$query.'%')
       ->where('estadoMa','=',1)
       ->paginate(10);
       return view('proforma.marca.index',["marcas"=>$marcas,"searchText"=>$query]);
    }
}
    public function create()
    {
 
 return view("proforma.marca.create");

    }

 public function store(Request $request)
 {     
 
$marca=new Marca;
$marca->nombre_proveedor=$request->get('nombre_proveedor');
$marca->estadoMa=1;
$marca->save();

return Redirect::to('proforma/marca');
}

  public function edit($id)
  {
     
    return view("proforma.marca.edit",["Marca"=>Marca::findOrFail($id)]);
  }
  public function update(Request $request,$id)
  {
$marca=Marca::find($id);
$marca->nombre_proveedor=$request->get('nombre_proveedor');
$marca->update();

return Redirect::to('proforma/marca');
   }
  

  public function destroy($id)
  {
    $Empleado=Marca::findOrFail($id);
    $Empleado->estadoMa=0;
    $Empleado->update();
    return Redirect::to('proforma/marca');

  }
}
