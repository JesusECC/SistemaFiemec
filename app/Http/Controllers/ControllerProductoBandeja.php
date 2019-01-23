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
        ->orwhere('tipo_producto','=','bandejas')
       ->orderby('idProducto','asc')
       ->paginate(10);

       return view('proforma.producto.productobandejas.index',["producto"=>$producto,"searchText"=>$query]);


    }
	}
   
     public function create()
    {

    	$familia=db::table('Familia')        
    	->where('estado','=','activo')
        ->get();       
         $marca=db::table('Marca')         
         ->where('estadoMA','=',1)     
         ->get();

      return view('proforma.producto.productobandejas.create',["familia"=>$familia,"marca"=>$marca]);

    }

public function store(Request $request){
  



                  $productobandejas=new Producto;
                  $productobandejas->idFamilia=34;
                   $productobandejas->idMarca=2;

                  $productobandejas->nombre_producto=$request->get('nombre_producto');

                  $productobandejas->promedio=$request->get('promedio');

                  $productobandejas->tipo_producto='accesorios';
  
  
                  $productobandejas->save();
 
            
            return redirect::to('producto/productobandejas');
          }




public function edit($id)
    {
        
        return view("proforma.producto.productobandejas.edit",["productobandejas"=>Producto::findOrFail($id)]);
    }




        public function update(Request $request,$id)
    {
                 $productobandejas=Producto::Find($id);
                  $productobandejas->nombre_producto=$request->get('nombre_producto');
                  $productobandejas->promedio=$request->get('promedio');
                   
                  $productobandejas->update();
 
            
            return redirect::to('producto/productobandejas');

    }

  public function destroy($id)
    {
        $productobandejas=Producto::findOrFail($id);
        $productobandejas->estado=0;
        $productobandejas->update();
        return Redirect::to('producto/productobandejas');


    }


}
