<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use Producto;
use SistemaFiemec\Entrada;
use Carbon\Carbon;
use SistemaFiemec\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use PDF;
use DB;

class ControllerInventario extends Controller
{
   public function index(){

   	$inventario=DB::table('Producto')
   	->where('estado','=','activo')
   	->where('stock','>=',0)
   	->get();
    
   return view('proforma.inventario.index',["inventario"=>$inventario]);

   } 

   public function createentrada(){

    $marcas = DB::Table('Marca')
    ->where('estadoMa','=',1)
    ->get();

    $familia = DB::Table('Familia')
    ->where('estado','=','1')
    ->get();

   	return view('proforma.entrada.create',["marcas"=>$marcas,"familia"=>$familia]);
   }

   public function storeentrada(Request $request){

   	$numeropedido = $request->get('numero');
   	$idProducto = $request->get('idProducto');
   	$descripcion = $request->get('descripcion');
   	$cantidad = $request->get('cantidad');
   	$idUser = $request->get('uss');

    $Entrada = new Entrada; 
    $Entrada->numero_comprobante=$numeropedido;
    $Entrada->idEmpleado=$idUser;
    $Entrada->idProducto=$idProducto;
    $Entrada->descripcion_ingreso=$descripcion;
    $Entrada->estado='activo';
    $Entrada->cantidad=$cantidad;
    $Entrada->save();

   }

   public function marca(Request $request){

   	$idMarca = $request->get('marca');
   	$familia = DB::table('Familia')
    ->where('idMarca','=',$idMarca)
    ->where('estado','=','1')
    ->get();

    $producto = DB::table('Producto as p')
    ->join('Marca as ma','ma.idMarca','=','p.idMarca')
    ->select('p.idProducto','p.nombre_producto','p.descripcion_producto','ma.nombre_proveedor','p.codigo_pedido')
    ->where('p.idMarca','=',$idMarca)
    ->where('p.estado','=','activo')
    ->get();

    return ['familia'=>$familia, 'producto'=>$producto,'veri'=>true];

   }
 
    public function busqueda(Request $request)
    {
      $codigopedido=$request->get('codigop');
      $producto=DB::table('Producto as p')
        ->join('Familia as f','p.idFamilia','=','f.idFamilia')
        ->select('p.idProducto','p.precio_unitario','p.idProducto','p.codigo_producto','p.nombre_producto','p.marca_producto','p.descripcion_producto','p.tipo_producto','p.codigo_pedido')
        ->where('p.codigo_pedido','LIKE','%'.$codigopedido.'%')
        ->where('p.estado','=','activo')
        ->get();
        // dd($request);
        return ['producto' =>$producto,'veri'=>true];

    }

    public function stockprecio(Request $request)
    {
        $idProducto=$request->get('valores');
        $stockp=DB::table('Producto as p')
        ->join('Familia as f','p.idFamilia','=','f.idFamilia')
        ->select('p.idProducto','f.descuento_familia','p.precio_unitario','p.tipo_producto','p.stock')
        ->where('idProducto','=',$idProducto)

        ->get();
        // dd($request);
        return ['stockp' =>$stockp,'veri'=>true];
    }

    public function listar(){

    	$entradas=DB::table('Ingreso as in')
    	->join('Producto as pro','pro.idProducto','=','in.idProducto')
    	->join('Marca as m','m.idMarca','=','pro.idmarca')
    	->select('in.numero_comprobante','in.cantidad','in.fecha','in.descripcion_ingreso','pro.codigo_pedido','pro.nombre_producto','pro.descripcion_producto','m.nombre_proveedor','in.idProducto','in.idIngreso')
    	->where('in.estado','=','activo')
    	->get();
    	
    	return ['entradas'=>$entradas,'veri'=>true];
    }

    public function destroy(Request $request){

    	$idProducto = $request->get('dato');

    	$entrada = Entrada::findOrFail($idProducto);
    	$entrada->estado='elimnado';
    	$entrada->update();

    }

}
