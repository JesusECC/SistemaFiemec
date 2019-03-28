<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use SistemaFiemec\Familia;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use DB;

class ControllerFamilia extends Controller
{
    public function __construct(){

    }

    public function index(Request $request)
    {
    if($request)
    {

     $query=trim($request->get('searchText'));
     $familias=DB::table('Familia as fa')
     ->join('Marca as ma','ma.idMarca','=','fa.idMarca')
     ->select('ma.nombre_proveedor','fa.nombre_familia','fa.descuento_familia','fa.idFamilia')
     
     ->where('estado2','=',1)
     
     ->paginate(17);
       return view('proforma.familia.index',["familias"=>$familias,"searchText"=>$query]);
    }
}

public function create(){

    $marca=db::table('Marca')
    ->where('estadoMA','=',1)
    ->get();

	return view('proforma.familia.create',["marca"=>$marca]);

}

public function store(Request $request)
{
   
$familia=new Familia;
$familia->nombre_familia=$request->get('nombre_familia');
$familia->descuento_familia=$request->get('descuento_familia');
$familia->estado='1';
$familia->estado2='1';
$familia->idMarca=$request->get('idMarca');
$familia->save();

return Redirect::to('proforma/familia');
}

public function edit($id){


	return view('proforma.familia.edit',["familia"=>Familia::findOrFail($id)]);
}

public function update(Request $request,$id)
{
$familia=Familia::find($id);

$familia->nombre_familia=$request->get('nombre_familia');
$familia->descuento_familia=$request->get('descuento_familia');
$familia->estado=$request->get('idEstado');
$familia->update();

return Redirect::to('proforma/familia');
}

public function destroy($id)

{
 $familia=Familia::findOrFail($id);
 $familia->estado='0';
 $familia->estado2='0';
 $familia->update();
 return Redirect::to('proforma/familia');

}
}
