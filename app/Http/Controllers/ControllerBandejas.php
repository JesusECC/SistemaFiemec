<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use SistemaFiemec\Http\Requests;
use SistemaFiemec\Proforma;

use SistemaFiemec\DetalleBandejas;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use SistemaFiemec\Http\Requests\RequestFormProforma;
use PDF;

use Response;
use Illuminate\Support\Collection;


use DB;

class ControllerBandejas extends Controller
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
    ->where('tipo_proforma','=','bandeja')
    ->orderBy('p.idProforma','desc')
     
    	->paginate(7);           
            return view('proforma.bandejas.index',["proformas"=>$proformas,"searchText"=>$query]);
        }
    }

public function create()
{
 $productos=DB::table('Producto as po')
 ->join('Familia as fa','po.idFamilia','=','fa.idFamilia')
 ->select('po.idProducto','fa.idFamilia','fa.nombre_familia','fa.descuento_familia','po.serie_producto','po.codigo_pedido','po.stock','po.precio_unitario','po.foto','po.categoria_producto','po.fecha_sistema',DB::raw('CONCAT(po.nombre_producto," | ",po.codigo_producto," | ",po.marca_producto," | ",descripcion_producto) as productos'),DB::raw('CONCAT(po.nombre_producto," | ",po.codigo_producto," | ",po.descripcion_producto) as productos2'))
 ->where('po.tipo_producto','=','bandejas')
 ->where('po.estado','=','activo')
 ->get();

 $medidas=DB::table('Medidas')
 ->where('estadoM','=','activo')
 ->get();

 $monedas=DB::table('Tipo_moneda')
 ->where('estado','=','activo')
 ->get();

 $clientes=DB::table('Cliente_Proveedor as cp')
 ->select('cp.idCliente',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'cp.nro_documento')
->where('tipo_persona','=','Cliente persona')
->orwhere('tipo_persona','=','Cliente Empresa')

 ->get();



 return view("proforma.bandejas.create",["productos"=>$productos,"clientes"=>$clientes,"monedas"=>$monedas,"medidas"=>$medidas]);
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
        $incluye;
        $plazofabri;
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
            $incluye=$dato['incluye'];
            $plazofabri=$dato['plazofabri'];
        }
        $idProforma=DB::table('Proforma')->insertGetId(
            ['idCliente'=>$idclie,
            // 'idEmpleado'=>$request->,           
            'idTipo_moneda'=>$idTipoCam,
            'serie_proforma'=>'BU365122018',
            // 'fecha_hora'=>$mytime->toDateTimeString(),
            'igv'=>'18',
            'subtotal'=>$valorv,
            'precio_total'=>$tota,
            'tipocambio'=>$valorcambio,
            'precio_totalC'=>$totaldolares,
            // 'descripcion_proforma'=>$observacion, //preguntar
            'tipo_proforma'=>'bandeja',
            // 'caracteristicas_proforma'=>$request->, preguntar
            'forma_de'=>$forma,
            // 'plaza_fabricacion'=>$request->,
            'plazo_oferta'=>$plazo,
            // 'garantia'=>$request->,
            // 'observacion_condicion'=>$request->,
            'cliente_empleado'=>$clienteemp,
            'observacion_condicion'=>$observacion,
            'incluye'=>$incluye,
            'plaza_fabricacion'=>$plazofabri,
            'estado'=>'activo'
            ]
        );
        foreach($request->filas as $fila){
            $detalleProforma=new DetalleBandejas;
            // $detalleProforma->idDetalle_proforma=$fila[''];	
            $detalleProforma->idProducto=$fila['idProducto'];
            $detalleProforma->idProforma=$idProforma;
            $detalleProforma->idMedidas=$fila['idMedidas'];
            // $detalleProforma->idTableros=$idTablero;
            $detalleProforma->cantidad=$fila['cantidadP'];
            $detalleProforma->precio_venta=$fila['prec_uniP'];	
            // $detalleProforma->texto_precio_venta=$fila[''];	
            // $detalleProforma->observacion_detalleP=$fila[''];	
            $detalleProforma->descuento=$fila['descuentoP'];
            $detalleProforma->espesor=$fila['espesorP'];	

            $detalleProforma->descripcionDP=$fila['descripcionP'];
            $detalleProforma->estadoDB=1;

            $detalleProforma->save();            
        }
        return ['data' =>'bandejas','veri'=>true];
    }catch(Exception $e){
        return ['data' =>$e,'veri'=>false];
    }
   

    // $splitid = explode('_', $request->get('idCliente'), 2);
    // $idclien= $splitid[0];

    // $splitid = explode('_', $request->get('idTipo_moneda'), 2);
    // $idmoneda= $splitid[0];
    //     DB::beginTransaction();
       
    //     $Proforma=new Proforma;
    //     $Proforma->idCliente=$idclien;
    //    // $Proforma->idEmpleado='2';
    //     $Proforma->idTipo_moneda=$idmoneda;
    //     $Proforma->serie_proforma='PU365122018';
    //     $Proforma->igv='18';
    //     $Proforma->subtotal=$request->get('subtotal');
    //     $Proforma->tipocambio=$request->get('tipocambio');
    //     $Proforma->simboloP=$request->get('simboloP');
    //     $Proforma->precio_total=$request->get('precio_total');
    //     $Proforma->precio_totalC=$request->get('precio_totalC');
    //     $Proforma->forma_de=$request->get('forma_de');
    //     $Proforma->observacion_condicion=$request->get('observacion_condicion');
    //     $Proforma->plazo_oferta=$request->get('plazo_oferta');
    //     $Proforma->garantia=$request->get('garantia');
    //     $Proforma->tipo_proforma='unitaria';
    //     $Proforma->estado='activo';

       
    //     $Proforma->save();
        
    //     $idProducto=$request->get('idProducto');
    //     $cantidad=$request->get('cantidad');
    //     $descuento=$request->get('descuento');
    //     $descripcionDP=$request->get('descripcionDP');
    //     $precio_venta=$request->get('precio_venta');
    //     $cambioDP=$request->get('cambioDP');
    //     $simboloDP=$request->get('simboloDP');

    //     $cont=0;

        
        
    //     while ($cont<count($idProducto)) 
    //     {
    //         $detalle = new DetalleProforma();
    //         $detalle->idProforma=$Proforma->idProforma;
    //         $detalle->idProducto=$idProducto[$cont];
    //         $detalle->descripcionDP=$descripcionDP[$cont];
    //         $detalle->cantidad=$cantidad[$cont];
    //         $detalle->descuento=$descuento[$cont];
    //         $detalle->cambioDP=$cambioDP[$cont];
    //         $detalle->simboloDP=$simboloDP[$cont];
    //         $detalle->precio_venta=$precio_venta[$cont];
    //         $detalle->save();
    //         $cont=$cont+1; 
                     
//         }

// //dd($Proforma,$detalle);
//          DB::Commit();
   

//          return Redirect::to('proforma/proforma');
     }

   public function show($id)
   {
    $proforma=DB::table('Proforma as p')
    ->join('Cliente_Proveedor as cp','p.idcliente','=','p.idcliente')
    ->select('p.idProforma','p.fecha_hora',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'p.serie_proforma','p.igv','p.precio_total','p.forma_de','p.plazo_oferta','p.observacion_condicion','p.igv','p.precio_total','p.subtotal','p.precio_totalC')
    ->where('p.idProforma','=',$id)
    ->first();

    $detalles=DB::table('Detalle_bandejas as db')
    ->join('Producto as pro','db.idProducto','=','pro.idProducto')
    ->join('Medidas as m','db.idMedidas','=','m.idMedidas')
    ->select(DB::raw('CONCAT(pro.nombre_producto," | ",pro.codigo_producto," | ",pro.marca_producto," | ",pro.descripcion_producto) as productos'),'db.cantidad','db.descuento','db.precio_venta','db.descripcionDP','m.medida','db.espesor')
    ->where('db.idProforma','=',$id)
    ->get();
    
    return view("proforma.bandejas.show",["proforma"=>$proforma,"detalles"=>$detalles]);
   

}

public function pdf($id){

    $proforma=DB::table('Proforma as p')
    ->join('Cliente_Proveedor as cp','p.idcliente','=','p.idcliente')
    ->select('p.idProforma','p.fecha_hora',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'p.serie_proforma','p.igv','p.precio_total','p.forma_de','p.plazo_oferta','p.observacion_condicion','p.igv','p.precio_total','p.subtotal','p.precio_totalC','cp.correo as email','p.cliente_empleado','cp.nro_documento as ndoc','p.forma_de','p.plazo_oferta','p.observacion_proforma')
    ->where('p.idProforma','=',$id)
    ->first();

    $detalles=DB::table('Detalle_bandejas as db')
    ->join('Producto as pro','db.idProducto','=','pro.idProducto')
    ->join('Medidas as m','db.idMedidas','=','m.idMedidas')
    ->select(DB::raw('CONCAT(pro.marca_producto," | ",pro.codigo_producto," | ",pro.nombre_producto," de ",m.medida," con espesor de plancha de ",db.espesor,"mm | ",pro.descripcion_producto) as productos'),'db.cantidad','db.descuento','db.precio_venta','db.descripcionDP','m.medida','db.espesor')
    ->where('db.idProforma','=',$id)
    ->get();

    $pdf=PDF::loadView('proforma/bandejas/pdf',['proforma'=>$proforma,"detalles"=>$detalles]);
    return $pdf->stream('proforma.pdf');
    

}
public function pdf2($id){

    $proforma=DB::table('Proforma as p')
    ->join('Cliente_Proveedor as cp','p.idcliente','=','p.idcliente')
    
    ->select('p.idProforma','p.fecha_hora',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'p.serie_proforma','p.igv','p.precio_total','p.forma_de','p.plazo_oferta','p.observacion_condicion','cp.correo as email','cp.nro_documento as ndoc','p.tipocambio','p.simboloP','p.subtotal')
    ->where('p.idProforma','=',$id)
    ->first();

    $detalles=DB::table('Detalle_bandejas as db')
    ->join('Producto as pro','db.idProducto','=','pro.idProducto')
    ->select(DB::raw('CONCAT(pro.nombre_producto,"  ",pro.marca_producto," | ",pro.descripcion_producto) as producto'),'db.cantidad','db.descuento','db.precio_venta','db.descripcionDP','db.estadoDB')
    ->where('db.idProforma','=',$id)
    ->get();

    $pdf=PDF::loadView('proforma/bandejas/pdf2',['proforma'=>$proforma,"detalles"=>$detalles]);
    return $pdf->stream('proforma.pdf');
    //return $pdf->download('Lista de requerimientos.pdf');


}
    public function destroy($id)
    {
        $producto=Proforma::findOrFail($id);
        $producto->estado='cancelada';
        $producto->update();
        return Redirect::to('bandejas');


    }
}
