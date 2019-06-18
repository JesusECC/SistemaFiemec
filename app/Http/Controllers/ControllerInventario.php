<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use Producto;
use SistemaFiemec\Salida;
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
   	->where('stock','>',0)
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

    public function createsalida(){

    $marcas = DB::Table('Marca')
    ->where('estadoMa','=',1)
    ->get();

    $familia = DB::Table('Familia')
    ->where('estado','=','1')
    ->get();

    $clientes=DB::table('Cliente_Proveedor as cp')
    ->join('users as u','u.id','=','cp.idU')
    ->select('cp.idCliente','cp.nombres_Rs','cp.paterno','cp.materno',DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'cp.nro_documento','cp.idU',DB::raw('CONCAT(u.name," ",u.paterno," ",u.materno) as user'))
    ->where('estado','=',1)
    ->get();

   	return view('proforma.salida.create',["marcas"=>$marcas,"familia"=>$familia,"clientes"=>$clientes]);
   }

   public function storesalida(Request $request){

    $numeropedido = $request->get('numero');
    $idProducto = $request->get('idProducto');
    $descripcion = $request->get('descripcion');
    $cantidad = $request->get('cantidad');
    $idUser = $request->get('uss');
    $idCliente = $request->get('idCliente');

    $Salida = new Salida; 
    $Salida->idCliente=$idCliente;
    $Salida->idEmpleado=$idUser;
    $Salida->idProducto=$idProducto;
    $Salida->num_comprobante=$numeropedido;
    $Salida->descripcion=$descripcion;
    $Salida->estado='activo';
    $Salida->cantidad=$cantidad;
    $Salida->save();

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

    public function listarsalida(){

      $salidas=DB::table('Salida as s')
      ->join('Producto as pro','pro.idProducto','=','s.idProducto')
      ->join('Marca as m','m.idMarca','=','pro.idmarca')
      ->select('s.num_comprobante','s.cantidad','s.fecha_hora','s.descripcion','pro.codigo_pedido','pro.nombre_producto','pro.descripcion_producto','m.nombre_proveedor','s.idProducto','s.idSalida','s.precio_total')
      ->where('s.estado','=','activo')
      ->get();
      
      return ['salidas'=>$salidas,'veri'=>true];
    }

    public function destroy(Request $request){

    	$idProducto = $request->get('dato');

    	$entrada = Entrada::findOrFail($idProducto);
    	$entrada->estado='elimnado';
    	$entrada->update();

    }

    public function destroysalida(Request $request){

      $idProducto = $request->get('dato');

      $salida = Salida::findOrFail($idProducto);
      $salida->estado='elimnado';
      $salida->update();

    }

}
