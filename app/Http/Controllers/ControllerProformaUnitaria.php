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
    ->where('tipo_proforma','=','unitaria')
    ->orderBy('p.idProforma','desc')
     
    	->paginate(7);           
            return view('proforma.proforma.index',["proformas"=>$proformas,"searchText"=>$query]);
        }
    }

public function create()
{
    $productos=DB::table('Producto as po')
    ->join('Familia as fa','po.idFamilia','=','fa.idFamilia')
    ->select('po.idProducto','fa.idFamilia','fa.nombre_familia','fa.descuento_familia','po.serie_producto','po.codigo_pedido','po.codigo_producto','po.stock','po.precio_unitario','po.foto','po.categoria_producto','po.fecha_sistema',DB::raw('CONCAT(po.codigo_producto," | ",po.nombre_producto," | ",po.marca_producto," | ",descripcion_producto) as productos'),'po.tipo_producto')
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

    $json=json_encode($clientes);

 return view("proforma.proforma.create",["productos"=>$productos,"clientes"=>$clientes,"monedas"=>$monedas,'json'=>$json]);
}

public function store(Request $request)
{
    try{
        $nomTablero;
        $idclie;
        $valorv;
        $tota;
        $tableros;
        $idTipoCam;
        $valorcambio;
        $totaldolares;
        $forma;
        $plazo;
        $clienteemp;
        $observacion;
        $simbolo;
// [{nomTablero:nomTablero,idcliente:idcliente,valorVenta:valorventa,total:totalt,totaldola:totaldolares,idTipoCambio:idtipocam,valorTipoCambio:valorcambio,
//     forma:forma,plazo:plazo,observacion:observacion}];
           
        foreach ($request->datos as $dato) {
            $idclie=$dato['idcliente'];
            $valorv=$dato['valorVenta'];
            $tota=$dato['total'];
            $idTipoCam=$dato['idTipoCambio'];
            $valorcambio=$dato['valorTipoCambio'];
            $nomTablero=$dato['nomTablero'];
            $totaldolares=$dato['totaldolares'];
            $forma=$dato['forma'];
            $plazo=$dato['plazo'];
            $clienteemp=$dato['clienteemp'];
            $observacion=$dato['observacion'];
            $simbolo=$dato['simbolo'];
        }
        $idProforma=DB::table('Proforma')->insertGetId(
            ['idCliente'=>$idclie,
            // 'idEmpleado'=>$request->,           
            'idTipo_moneda'=>$idTipoCam,
            'serie_proforma'=>'PU365122018',
            // 'fecha_hora'=>$mytime->toDateTimeString(),
            'igv'=>'18',
            'subtotal'=>$valorv,
            'precio_total'=>$tota,
            'tipocambio'=>$valorcambio,
            'simboloP'=>$simbolo,
            'precio_totalC'=>$totaldolares,
            // 'descripcion_proforma'=>$observacion, //preguntar
            'tipo_proforma'=>'unitaria',
            // 'caracteristicas_proforma'=>$request->, preguntar
            'forma_de'=>$forma,
            // 'plaza_fabricacion'=>$request->,
            'plazo_oferta'=>$plazo,
            // 'garantia'=>$request->,
            // 'observacion_condicion'=>$request->,
            'cliente_empleado'=>$clienteemp,
            'observacion_proforma'=>$observacion,
            'estado'=>'activo'
            ]
        );
        foreach($request->filas as $fila){
            $detalleProforma=new DetalleProforma;
            // $detalleProforma->idDetalle_proforma=$fila[''];	
            $detalleProforma->idProducto=$fila['idProducto'];
            $detalleProforma->idProforma=$idProforma;
            // $detalleProforma->idTableros=$idTablero;
            $detalleProforma->cantidad=$fila['cantidadP'];
            $detalleProforma->precio_venta=$fila['prec_uniP'];	
            // $detalleProforma->texto_precio_venta=$fila[''];	
            // $detalleProforma->observacion_detalleP=$fila[''];	
            $detalleProforma->descuento=$fila['descuentoP'];	
            $detalleProforma->descripcionDP=$fila['descripcionP'];
            $detalleProforma->estadoDP=1;
            $detalleProforma->save();            
        }
            return ['data' =>'proformas','veri'=>true];
        }catch(Exception $e){
            return ['data' =>$e,'veri'=>false];
        }
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
    
    ->select('p.idProforma','p.fecha_hora',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'p.serie_proforma','p.igv','p.precio_total','p.forma_de','p.plazo_oferta','p.observacion_condicion','p.observacion_proforma','cp.correo as email','cp.nro_documento as ndoc','p.subtotal','p.cliente_empleado')
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
    public function pdf2($id){

        $proforma=DB::table('Proforma as p')
        ->join('Cliente_Proveedor as cp','p.idcliente','=','p.idcliente')
        
        ->select('p.idProforma','p.fecha_hora',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'p.serie_proforma','p.igv','p.precio_total','p.forma_de','p.plazo_oferta','p.observacion_condicion','cp.correo as email','cp.nro_documento as ndoc','p.tipocambio','p.simboloP','p.subtotal')
        ->where('p.idProforma','=',$id)
        ->first();

        $detalles=DB::table('Detalle_proforma as dpr')
        ->join('Producto as pro','dpr.idProducto','=','pro.idProducto')
        ->join('Proforma as pr','pr.idProforma','=','dpr.idProforma')
        ->select(DB::raw('CONCAT(pro.nombre_producto,"  ",pro.marca_producto," | ",pro.descripcion_producto) as producto'),'dpr.cantidad','dpr.descuento','dpr.precio_venta','dpr.descripcionDP','dpr.simboloDP','pr.tipocambio')
        ->where('dpr.idProforma','=',$id)
        ->get();

        $pdf=PDF::loadView('proforma/proforma/pdf2',['proforma'=>$proforma,"detalles"=>$detalles]);
        return $pdf->stream('proforma.pdf');
        //return $pdf->download('Lista de requerimientos.pdf');


    }
    public function edit($id)
    {
        //
        $productos=DB::table('Producto as po')
        ->join('Familia as fa','po.idFamilia','=','fa.idFamilia')
        ->select('po.idProducto','fa.idFamilia','fa.nombre_familia','fa.descuento_familia','po.serie_producto','po.codigo_pedido','po.codigo_producto','po.nombre_producto','po.marca_producto','po.stock','po.descripcion_producto','po.precio_unitario','po.foto','po.categoria_producto','po.fecha_sistema')
        ->where('po.estado','=','activo')
        ->get();


        $proforma=DB::table('Proforma as p')
        ->join('Detalle_proforma as deP','p.idProforma','=','deP.idProforma')
        ->join('Producto as pd','pd.idProducto','=','deP.idProducto')
        ->join('Cliente_Proveedor as clp','clp.idCliente','=','p.idCliente')
        ->select('p.idProforma','p.idCliente','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado','deP.idDetalle_proforma','deP.idProducto','deP.idProforma','deP.cantidad','deP.precio_venta','deP.texto_precio_venta','deP.cambioDP','deP.estadoDP','deP.descuento','deP.descripcionDP','pd.nombre_producto','clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion')
        ->where('deP.idProforma','=',$id)
        ->get();
    
        // return view("proforma.proforma.create",["productos"=>$productos,"clientes"=>$clientes,"monedas"=>$monedas]);
        return view("proforma.proforma.edit",["productos"=>$productos,'proforma'=>$proforma]);


    }
    public function update(Request $request)
    {
        //
        try{
            $nomTablero;
            $idclie;
            $valorv;
            $tota;
            $tableros;
            $idTipoCam;
            $valorcambio;
            $totaldolares;
            $forma;
            $plazo;
            $observacion;
            $idProforma;
    // [{nomTablero:nomTablero,idcliente:idcliente,valorVenta:valorventa,total:totalt,totaldola:totaldolares,idTipoCambio:idtipocam,valorTipoCambio:valorcambio,
    //     forma:forma,plazo:plazo,observacion:observacion}];
    // nomTablero:nomTablero,idcliente:idcliente,valorVenta:valorventa,total:totalt,totaldolares:totaldolares,idTipoCambio:idtipocam,
    // valorTipoCambio:tipocam,forma:forma,plazo:plazo,observacion:observacion
               
            foreach ($request->datos as $dato) {
                $idProforma=$dato['idProforma'];
                // $idclie=$dato['idcliente'];
                $valorv=$dato['valorVenta'];
                $tota=$dato['total'];
                // $idTipoCam=$dato['idTipoCambio'];
                // $valorcambio=$dato['valorTipoCambio'];
                $nomTablero=$dato['nomTablero'];
                $totaldolares=$dato['totaldolares'];
                $forma=$dato['forma'];
                $plazo=$dato['plazo'];
                $observacion=$dato['observacion'];
            }
                Proforma::where('idProforma',$idProforma)
                ->update([
                    // 'idCliente'=>$idclie,
                // 'idEmpleado'=>$request->,           
                // 'idTipo_moneda'=>$idTipoCam,
                'serie_proforma'=>'PU365122018',
                // 'fecha_hora'=>$mytime->toDateTimeString(),
                'igv'=>'18',
                'subtotal'=>$valorv,
                'precio_total'=>$tota,
                // 'tipocambio'=>$valorcambio,
                'precio_totalC'=>$totaldolares,
                // 'descripcion_proforma'=>$observacion, //preguntar
                'tipo_proforma'=>'unitaria',
                // 'caracteristicas_proforma'=>$request->, preguntar
                'forma_de'=>$forma,
                // 'plaza_fabricacion'=>$request->,
                'plazo_oferta'=>$plazo,
                // 'garantia'=>$request->,
                // 'observacion_condicion'=>$request->,
                'observacion_proforma'=>$observacion,
                'estado'=>'activo'
                ]);
            foreach($request->filas as $fila){
                if ($fila['estado']==1 || $fila['estado']==0) {
                    DetalleProforma::where('idProforma',$idProforma)
                    ->where('idDetalle_proforma',$fila['idDetalleProforma'])
                    ->update([
                    // $detalleProforma->idDetalle_proforma=$fila[''];	
                    'idProducto'=>$fila['idProducto'],
                    // 'idProforma'=>$idProforma,
                    // 'idTableros'=>$idTablero,
                    'cantidad'=>$fila['cantidadP'],
                    'precio_venta'=>$fila['prec_uniP'],
                    // texto_precio_venta=>$fila[''	
                    // observacion_detalleP=>$fila[''	
                    'descuento'=>$fila['descuentoP'],
                    'descripcionDP'=>$fila['descripcionP'],
                    'estadoDP'=>$fila['estado']
                    ]);
                }else if($fila['estado']==2){
                    $detalleProforma=new DetalleProforma;
                    // $detalleProforma->idDetalle_proforma=$fila[''];	
                    $detalleProforma->idProducto=$fila['idProducto'];
                    $detalleProforma->idProforma=$idProforma;
                    // $detalleProforma->idTableros=$idTablero;
                    $detalleProforma->cantidad=$fila['cantidadP'];
                    $detalleProforma->precio_venta=$fila['prec_uniP'];	
                    // $detalleProforma->texto_precio_venta=$fila[''];	
                    // $detalleProforma->observacion_detalleP=$fila[''];	
                    $detalleProforma->descuento=$fila['descuentoP'];	
                    $detalleProforma->descripcionDP=$fila['descripcionP'];
                    $detalleProforma->estadoDP=1;
                    $detalleProforma->save();
                }
                
            }
                return ['data' =>'proformas','veri'=>true];
            }catch(Exception $e){
                return ['data' =>$e,'veri'=>false];
            }
    }
    public function destroy($id)
    {
        $producto=Proforma::findOrFail($id);
        $producto->estado='cancelada';
        $producto->update();
        return Redirect::to('proformas');


    }
}
