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
     $familias=DB::table('Familia')
     ->where('nombre_familia','LIKE','%'.$query.'%')
     ->where('estado','=','estado')
     ->paginate(17);
       return view('proforma.familia.index',["familias"=>$familias,"searchText"=>$query]);
    }
}

public function create(){

	return view('proforma.familia.create');

}

public function store(Request $request)
{
    
$familia=new Familia;
$familia->nombre_familia=$request->get('nombre_familia'); //enviando valor a cada uno de los compos del modelo
$familia->descuento_familia=$request->get('descuento_familia');
$familia->estado='estado';
$familia->get();

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
$familia->estado='estado';
$familia->update();

return Redirect::to('proforma/familia');
}

public function destroy($id)

{
 $familia=familia::findOrFail($id);
 $familia->estado='eliminado';
 $familia->update();
 return Redirect::to('proforma/familia');

}
}
