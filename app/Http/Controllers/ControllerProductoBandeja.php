<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use SistemaFiemec\Http\Requests;
use SistemaFiemec\Producto;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


use DB;

class ControllerProductoBandeja extends Controller
{


    public function __construct()
    {

    }
       public function index(Request $request)
    {
    if($request)
    {
       $query=trim($request->get('searchText'));
       $producto=DB::table('Producto')
       ->where('nombre_producto','LIKE','%'.$query.'%')
       ->where('tipo_producto','=','accesorios')
       ->where('estado','=','activo')
       ->orwhere('tipo_producto','=','bandejas')
       ->orderby('nombre_producto')
       ->paginate(10);

       return view('proforma.productobandejas.index',["producto"=>$producto,"searchText"=>$query]);


    }
	}
   
     public function create()
    {

      return view('proforma.productobandejas.create');

    }

public function store(Request $request){
  
            $productobandejas=new Producto;
            $productobandejas->idFamilia=34;
            $productobandejas->idMarca=2;
            $productobandejas->nombre_producto=$request->get('nombre_producto');
            $productobandejas->promedio=$request->get('promedio');
            $productobandejas->tipo_producto='accesorios';
            $productobandejas->estado='activo';
            $productobandejas->marca_producto='Fiemec';
            $productobandejas->codigo_producto='ACCF';
            $productobandejas->save();
            
  
            return redirect::to('productobandejas');
          }

public function edit($id)
    {
        
        return view("proforma.productobandejas.edit",["productobandejas"=>Producto::findOrFail($id)]);
    }

        public function update(Request $request,$id)
    {
              $productobandejas=Producto::Find($id);
              $productobandejas->nombre_producto=$request->get('nombre_producto');
              $productobandejas->promedio=$request->get('promedio');
              $productobandejas->update();
 
            return redirect::to('productobandejas');

    }

  public function destroy($id)
    {
        $productobandejas=Producto::findOrFail($id);
        $productobandejas->estado=0;
        $productobandejas->update();
        return Redirect::to('productobandejas');


    }


}
