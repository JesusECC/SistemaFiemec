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

class ControllerProducto extends Controller
{
    
    public function __construct()
    {

    }
    public function index(Request $request)
    {

        if ($request) 
        {
           $query=trim($request->get('searchText'));
           $productos=DB::table('Producto')
            ->where('codigo_pedido','LIKE','%'.$query.'%')
            ->where('estado','=','activo')
           ->orderby('idProducto','asc')
           ->paginate(10);

           return view('proforma.producto.index',["productos"=>$productos,"searchText"=>$query]);
        }
       } 
   
    public function create()

    {
       
       $familia=db::table('Familia')
       ->where('estado','=','1')
       ->where('estado2','=','1')
       ->get();
       $marca=db::table('Marca')
        ->where('estadoMA','=',1)
        ->get();


        return view('proforma.producto.create',["marca"=>$marca,"familia"=>$familia]);
    }

    
    public function store(Request $request)
    {
   
     $idFamilia=$request->get('idFamilia');
     $idMarca=$request->get('idMarca');
     $serie_producto=$request->get('serie_producto');
     $codigo_pedido=$request->get('codigo_pedido');
     $codigo_producto=$request->get('codigo_producto');
     $nombre_producto=$request->get('nombre_producto');
     $marca_producto=$request->get('marca_producto');
     $tipo_producto=$request->get('tipo_producto');
     $stock=$request->get('stock');
     $descripcion_producto=$request->get('descripcion_producto');
     $precio_unitario=$request->get('precio_unitario');
     $categoria_producto=$request->get('categoria_producto');
     $foto=$request->get('foto');


$cont = 0;

while ($cont<count($idFamilia)) {

    $Producto = new Producto();
    $Producto->idFamilia=$idFamilia[$cont];
    $Producto->idMarca=$idMarca[$cont];
    $Producto->serie_producto=$serie_producto[$cont];
    $Producto->codigo_pedido=$codigo_pedido[$cont];
    $Producto->codigo_producto=$codigo_producto[$cont];
    $Producto->nombre_producto=$nombre_producto[$cont];
    $Producto->marca_producto=$marca_producto[$cont];
    $Producto->tipo_producto=$tipo_producto[$cont];
    $Producto->stock=$stock[$cont];
    $Producto->descripcion_producto=$descripcion_producto[$cont];
    $Producto->precio_unitario=$precio_unitario[$cont];
    $Producto->categoria_producto=$categoria_producto[$cont];
    $Producto->foto=$foto[$cont];
    $Producto->total_existencias=$stock[$cont];
    $Producto->total_entradas=0;
    $Producto->total_salidas=0;
    $Producto->estado='activo';

    $Producto->save();
    $cont=$cont+1;
       
    }
        $Producto->save();
        return Redirect::to('proforma/producto');
    }


   
    public function edit($id)
    {
        $marca=db::table('Marca')
        ->where('estadoMA','=',1)
        ->get();
        return view("proforma.producto.edit",["producto"=>Producto::findOrFail($id),"marca"=>$marca]);
    }

   
    public function update(Request $request,$id)
    {

        $producto=Producto::find($id);
        $producto->idMarca=$request->get('id_marca');

        $producto->serie_producto=$request->get('serie_producto');
        $producto->codigo_pedido=$request->get('codigo_pedido');
        $producto->codigo_producto=$request->get('codigo_producto');
        $producto->nombre_producto=$request->get('nombre_producto');
        $producto->marca_producto=$request->get('marca_text');
        $producto->stock=$request->get('stock');
        $producto->descripcion_producto=$request->get('descripcion_producto');
        $producto->precio_unitario=$request->get('precio_unitario');
        $producto->categoria_producto=$request->get('categoria_producto');
        $mytime = Carbon::now('America/Lima');
        $producto->fecha_sistema=$mytime->toDateTimeString();
        $producto->estado='activo';
        $producto->update();
        return Redirect::to('productos');
    }

    public function destroy($id)
    {
        $producto=Producto::findOrFail($id);
        $producto->estado='retirado';
        $producto->update();
        return Redirect::to('proforma/producto');


    }
}

 

