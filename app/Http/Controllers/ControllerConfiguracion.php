<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use SistemaFiemec\Moneda; // asignamos el modelo que se creo en relacion ala tabla.
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect; //Etiqueta sirve para la redirecciones
 //request que permite la validacion de las reglas de la tabla.
use DB;// declaramos la clase db laravel

class ControllerConfiguracion extends Controller
{
   public function __construct(){


   }

   public function index(Request $request)
   {

     if($request){

       $query=trim($request->get('searchText'));
       $monedas=DB::table('Tipo_moneda')
       ->where('nombre_moneda','LIKE','%'.$query.'%')
       ->where('estado','=',1)
       ->paginate(10);

       return view('proforma.config.index',["monedas"=>$monedas,"searchText"=>$query]);


   }
}



public function create(){

	return view('proforma.config.create');

}

public function store(Request $request)
{
$moneda=new Moneda;
$moneda->nombre_moneda=$request->get('nombre_moneda'); //enviando valor a cada uno de los compos del modelo
$moneda->tipo_cambio=$request->get('tipo_cambio');
$moneda->simbolo=$request->get('simbolo');
$moneda->estado=1;
$moneda->save();

return Redirect::to('proforma/config');
}

public function edit($id){

	return view('proforma.config.edit',["moneda"=>Moneda::findOrFail($id)]);
}

public function update(Request $request,$id)
{
$moneda=Moneda::find($id);
$moneda->nombre_moneda=$request->get('nombre_moneda'); //enviando valor a cada uno de los compos del modelo
$moneda->tipo_cambio=$request->get('tipo_cambio');
$moneda->simbolo=$request->get('simbolo');
$moneda->update();

return Redirect::to('proforma/config');
}

public function destroy($id)

{
 $moneda=Moneda::findOrFail($id);
 $moneda->estado=0;
 $moneda->update();
 return Redirect::to('proforma/config');

}
}