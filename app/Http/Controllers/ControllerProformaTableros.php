<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use Producto;
use Proforma;
use SistemaFiemec\DetalleProforma;
use Carbon\Carbon;

use SistemaFiemec\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use PDF;
use DB;
class ControllerProformaTableros extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request)
    {
    $query=trim($request->get('searchText'));
    $proformas=DB::table('Proforma as p')
    ->join('Cliente_Proveedor as cp','p.idCliente','=','cp.idCliente')
    ->select('p.idProforma','p.fecha_hora',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),'p.serie_proforma','p.igv','p.precio_total')
    ->where('p.idProforma','LIKE','%'.$query.'%')
    ->where('tipo_proforma','=','tablero')
    ->where('p.estado','=','activo')
    ->orderBy('p.idProforma','desc')
     
        ->paginate(7);           
            return view('proforma.tablero.index',["proformas"=>$proformas,"searchText"=>$query]);
        }
    }
    public function create()
    {
        // Textos completos	
        // idProducto--
        // idFamilia
        // serie_producto--
        // codigo_pedido--
        // codigo_producto--
        // nombre_producto--
        // marca_producto-
        // stock--
        // descripcion_producto--
        // precio_unitario--
        // foto--
        // categoria_producto--
        // fecha_sistema--
        // estado--
        $productos=DB::table('Producto as po')
        ->join('Familia as fa','po.idFamilia','=','fa.idFamilia')
        ->select('po.idProducto','fa.idFamilia','fa.nombre_familia','fa.descuento_familia','po.serie_producto',
        'po.codigo_pedido','po.codigo_producto','po.nombre_producto','po.marca_producto','po.stock',
        'po.descripcion_producto','po.precio_unitario','po.foto','po.categoria_producto','po.fecha_sistema')
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
        return view('proforma.tablero.create',["productos"=>$productos,"clientes"=>$clientes,"monedas"=>$monedas]);
    }
    public function buscarProducto(Request $request)
    {
        $query=trim($request->get('buscar'));
        
        if($request->ajax())
        {
            $productos=DB::table('Producto')
            ->where('codigo_producto','LIKE','%'.$query.'%')
            ->where('estado','=','activo')
           ->orderby('idProducto','asc')->get();

            return response()->json(["productos"=>$productos]);
        }
    }
    public function store(Request $request)
    {
        try{
            $idclie;
            $valorv;
            $tota;
            $tableros;
            $idTipoCam;
            $valorcambio;
            // idTipoCambio:idtipocam,valorTipoCambio:valorcambio
            foreach ($request->datos as $dato) {
            $idclie=$dato['idcliente'];
            $valorv=$dato['valorVenta'];
            $tota=$dato['total'];
            $idTipoCam=$dato['idTipoCambio'];
            $valorcambio=$dato['valorTipoCambio'];
            }	
            $idProforma=DB::table('Proforma')->insertGetId(
                ['idCliente'=>$idclie,
                // 'idEmpleado'=>$request->,           
                'idTipo_moneda'=>$idTipoCam,
                'serie_proforma'=>'PU365122019',
                // 'fecha_hora'=>$mytime->toDateTimeString(),
                'igv'=>'18',
                'subtotal'=>$valorv,
                'precio_total'=>$tota,
                'tipocambio'=>$valorcambio,
                // 'precio_totalC'=>$request->,
                // 'descripcion_proforma'=>$request->,
                'tipo_proforma'=>'Tablero',
                // 'caracteristicas_proforma'=>$request->,
                // 'forma_de'=>$request->,
                // 'plaza_fabricacion'=>$request->,
                // 'plazo_oferta'=>$request->,
                // 'garantia'=>$request->,
                // 'observacion_condicion'=>$request->,
                // 'observacion_proforma'=>$request->,
                'estado'=>'activo'
                ]
            );
            foreach ($request->tableros as $tablero) {
                $nombre=$tablero['nombre'];
                $idTablero=DB::table('Tableros')->insertGetId(
                    ['nombre_tablero'=>$nombre]
                );
                foreach($request->filas as $fila){
                    if($fila['nomTablero']==$tablero['nombre']){
                        $detalleProforma=new DetalleProforma;
                        // $detalleProforma->idDetalle_proforma=$fila[''];	
                        $detalleProforma->idProducto=$fila['idProducto'];
                        $detalleProforma->idProforma=$idProforma;
                        $detalleProforma->idTableros=$idTablero;
                        $detalleProforma->cantidad=$fila['cantidadP'];
                        $detalleProforma->precio_venta=$fila['prec_uniP'];	
                        // $detalleProforma->texto_precio_venta=$fila[''];	
                        // $detalleProforma->observacion_detalleP=$fila[''];	
                        $detalleProforma->descuento=$fila['descuentoP'];	
                        $detalleProforma->descripcionDP=$fila['descripcionP'];
                        $detalleProforma->save();
                    }
                }
            }
            return ['data' =>'tableros','veri'=>true];
        }catch(Exception $e){
            return ['data' =>$e,'veri'=>false];
        }
    }


    public function pdf($id){

$proforma=DB::table('Proforma as p')
    ->join('Cliente_Proveedor as cp','p.idcliente','=','p.idcliente')
    ->select('p.idProforma','p.fecha_hora',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'p.serie_proforma','p.igv','p.precio_total','p.forma_de','p.plazo_oferta','p.observacion_condicion','cp.correo as email','cp.nro_documento as ndoc','p.subtotal')
    ->where('p.idProforma','=',$id)
    ->first();

    $detalles=DB::table('Detalle_proforma as dpr')
    ->join('Tableros as ta','dpr.idTableros','=','ta.idTableros')
    ->join('Producto as pro','dpr.idProducto','=','pro.idProducto')
    ->select(DB::raw('CONCAT(pro.nombre_producto,"  ",pro.marca_producto," | ",pro.descripcion_producto) as producto'),'dpr.cantidad','dpr.descuento','dpr.precio_venta','dpr.descripcionDP','ta.nombre_tablero')
    ->where('dpr.idProforma','=',$id)
    
    ->get();

    $pdf=PDF::loadView('proforma/tablero/pdf',['proforma'=>$proforma,"detalles"=>$detalles]);
    return $pdf->stream('proforma.pdf');


    }
}
