<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use SistemaFiemec\Http\Requests;
use SistemaFiemec\Proforma;

use SistemaFiemec\DetalleProforma;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use SistemaFiemec\Http\Requests\RequestFormProforma;
use PDF;

use Response;
use Illuminate\Support\Collection;


use DB;


class ControllerProformaUnitaria extends Controller
{
     public function __construct()
    {

    }
    public function index(Request $request)
    {
    if ($request)
    {
    $query=trim($request->get('searchText'));
    $proformas=DB::table('Proforma as p')
    ->join('Cliente_Proveedor as cp','p.idCliente','=','cp.idCliente')
    ->select('p.idProforma','p.fecha_hora',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),'p.serie_proforma','p.igv','p.precio_total')
    ->where('p.idProforma','LIKE','%'.$query.'%')
    ->where('p.estado','=','activo')
    ->orderBy('p.idProforma','desc')
     
    	->paginate(7);           
            return view('proforma.proforma.index',["proformas"=>$proformas,"searchText"=>$query]);
        }
    }

public function create()
{
 $productos=DB::table('Producto as po')
 ->join('Familia as fa','po.idFamilia','=','fa.idFamilia')
 ->select('po.idProducto','fa.idFamilia','fa.nombre_familia','fa.descuento_familia','po.serie_producto','po.codigo_pedido','po.codigo_producto','po.nombre_producto','po.marca_producto','po.stock','po.descripcion_producto','po.precio_unitario','po.foto','po.categoria_producto','po.fecha_sistema')
 ->where('po.estado','=','activo')
 ->get();

 $monedas=DB::table('Tipo_moneda')
 ->where('estado','=','activo')
 ->get();

 $clientes=DB::table('Cliente_Proveedor as cp')
 ->select('cp.idCliente',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'cp.nro_documento')
->where('tipo_persona','=','Cliente persona')
->orwhere('tipo_persona','=','Cliente Empresa')

 ->get();



 return view("proforma.proforma.create",["productos"=>$productos,"clientes"=>$clientes,"monedas"=>$monedas]);
}

public function store(Request $request)
{

   

    $splitid = explode('_', $request->get('idCliente'), 2);
    $idclien= $splitid[0];

    $splitid = explode('_', $request->get('idTipo_moneda'), 2);
    $idmoneda= $splitid[0];
        DB::beginTransaction();
       
        $Proforma=new Proforma;
        $Proforma->idCliente=$idclien;
       // $Proforma->idEmpleado='2';
        $Proforma->idTipo_moneda=$idmoneda;
        $Proforma->serie_proforma='PU365122018';
        $Proforma->igv='18';
        $Proforma->subtotal=$request->get('subtotal');
        $Proforma->tipocambio=$request->get('tipocambio');
        $Proforma->precio_total=$request->get('precio_total');
        $Proforma->precio_totalC=$request->get('precio_totalC');
        $Proforma->forma_de=$request->get('forma_de');
        $Proforma->observacion_condicion=$request->get('observacion_condicion');
        $Proforma->plazo_oferta=$request->get('plazo_oferta');
        $Proforma->garantia=$request->get('garantia');
        $Proforma->tipo_proforma='unitaria';
        $Proforma->estado='activo';

       
        $Proforma->save();
        
        $idProducto=$request->get('idProducto');
        $cantidad=$request->get('cantidad');
        $descuento=$request->get('descuento');
        $descripcionDP=$request->get('descripcionDP');
        $precio_venta=$request->get('precio_venta');

        $cont=0;

        
        
        while ($cont<count($idProducto)) 
        {
            $detalle = new DetalleProforma();
            $detalle->idProforma=$Proforma->idProforma;
            $detalle->idProducto=$idProducto[$cont];
            $detalle->descripcionDP=$descripcionDP[$cont];
            $detalle->cantidad=$cantidad[$cont];
            $detalle->descuento=$descuento[$cont];
            $detalle->precio_venta=$precio_venta[$cont];
            $detalle->save();
            $cont=$cont+1; 
                     
        }

//dd($Proforma,$detalle);
         DB::Commit();
   

         return Redirect::to('proforma/proforma');
     }

   public function show($id)
   {

    $proforma=DB::table('Proforma as p')
    ->join('Cliente_Proveedor as cp','p.idcliente','=','p.idcliente')
    ->select('p.idProforma','p.fecha_hora',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'p.serie_proforma','p.igv','p.precio_total','p.forma_de','p.plazo_oferta','p.observacion_condicion','p.igv','p.precio_total','p.subtotal','p.precio_totalC')
    ->where('p.idProforma','=',$id)
    ->first();

    $detalles=DB::table('Detalle_proforma as dpr')
    ->join('Producto as pro','dpr.idProducto','=','pro.idProducto')
    ->select('pro.nombre_producto as producto','dpr.cantidad','dpr.descuento','dpr.precio_venta','dpr.descripcionDP')
    ->where('dpr.idProforma','=',$id)
    ->get();

return view("proforma.proforma.show",["proforma"=>$proforma,"detalles"=>$detalles]);
   

}

public function pdf($id){

    $proforma=DB::table('Proforma as p')
    ->join('Cliente_Proveedor as cp','p.idcliente','=','p.idcliente')
    
    ->select('p.idProforma','p.fecha_hora',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'p.serie_proforma','p.igv','p.precio_total','p.forma_de','p.plazo_oferta','p.observacion_condicion','cp.correo as email','cp.nro_documento as ndoc')
    ->where('p.idProforma','=',$id)
    ->first();

    $detalles=DB::table('Detalle_proforma as dpr')
    ->join('Producto as pro','dpr.idProducto','=','pro.idProducto')
    ->select(DB::raw('CONCAT(pro.nombre_producto,"  ",pro.marca_producto," | ",pro.descripcion_producto) as producto'),'dpr.cantidad','dpr.descuento','dpr.precio_venta','dpr.descripcionDP')
    ->where('dpr.idProforma','=',$id)
    ->get();

    $pdf=PDF::loadView('proforma/proforma/pdf',['proforma'=>$proforma,"detalles"=>$detalles]);
    return $pdf->stream('proforma.pdf');
    //return $pdf->download('Lista de requerimientos.pdf');


}
    public function destroy($id)
    {
        $producto=Proforma::findOrFail($id);
        $producto->estado='cancelada';
        $producto->update();
        return Redirect::to('proforma/proforma');


    }
}
