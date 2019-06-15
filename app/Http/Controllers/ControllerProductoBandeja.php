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
       $query=trim($request->get('searchsText'));
       $producto=DB::table('Producto')
       ->where('nombre_producto','LIKE','%'.$query.'%')
      ->where('categoria_producto','=','Producto FiemecA')
    
       ->where('estado','=','activo')
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
          //dd($request);
            
            $TipoEntradaProducto =$request ->get('tipo');

  if ($TipoEntradaProducto  == '1')
  {

            $productobandejas=new Producto;
            $productobandejas->idFamilia=32;
            $productobandejas->idMarca=6;//observacion
            $productobandejas->nombre_producto=$request->get('nombre_producto');
            $productobandejas->promedio=0;
            $productobandejas->tipo_producto='bandejas';
            $productobandejas->estado='activo';
            $productobandejas->marca_producto='Fiemec';
            $productobandejas->categoria_producto ='Producto FiemecA';
            $productobandejas->serie_producto='BAN';
            $productobandejas->codigo_producto='BANP';
            $productobandejas->descripcion_producto=$request->get('DescripcionAccesory');
            $productobandejas->save();
            
  }elseif ($TipoEntradaProducto == '2') {
             $productobandejas=new Producto;
            $productobandejas->idFamilia=34;
            $productobandejas->idMarca=6;
            $productobandejas->nombre_producto=$request->get('nombre_producto');
            $productobandejas->promedio=$request->get('promedio');
            $productobandejas->tipo_producto='accesorios';
            $productobandejas->estado='activo';
            $productobandejas->marca_producto='Fiemec';
           $productobandejas->categoria_producto ='Producto FiemecA';
            $productobandejas->serie_producto='ACC';
            $productobandejas->codigo_producto='ACCF';
            $productobandejas->descripcion_producto=$request->get('DescripcionAccesory');

            $productobandejas->save();
    # code...
  }
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
        $productobandejas->estado='retirado';
        $productobandejas->update();
        return Redirect::to('productobandejas');


    }


}
