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
    ->select('p.idProforma','p.fecha_hora','cp.nombres_Rs','cp.paterno','cp.materno','p.serie_proforma','p.igv','p.precio_total')
    ->where('p.idProforma','LIKE','%'.$query.'%')
    ->where('p.estado','=',1)
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
 ->select('po.promedio','po.idProducto','fa.idFamilia','fa.nombre_familia','fa.descuento_familia','po.serie_producto','po.codigo_pedido','po.stock','po.precio_unitario','po.foto','po.categoria_producto','po.fecha_sistema','po.nombre_producto','po.codigo_producto','po.marca_producto','descripcion_producto',DB::raw('CONCAT(po.nombre_producto," | ",po.codigo_producto," | ",po.marca_producto) as productos2'))
 ->where('po.tipo_producto','=','bandejas')
 ->orwhere('po.tipo_producto','=','accesorios')
 ->where('po.estado','=','activo')
 ->get();

 $accesorios=DB::table('Accesorios')
 ->get();

 $galvanizado=DB::table('Galvanizado')
 ->get();

  $pintado=DB::table('Pintado')
 ->get();

 $medidas=DB::table('Medidas')
 ->where('estadoM','=','activo')
 ->get();

 $monedas=DB::table('Tipo_moneda')
 ->where('estado','=','1')
 ->get();

 $representante=DB::table('Cliente_Representante') 
    ->where('estadoCE','=',1)
    ->get();

 $clientes=DB::table('Cliente_Proveedor as cp')
 ->select('cp.idCliente','cp.nombres_Rs','cp.paterno','cp.materno',DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'cp.nro_documento')
->where('cp.estado','=','1')
->get();

 return view("proforma.bandejas.create",["productos"=>$productos,"clientes"=>$clientes,"monedas"=>$monedas,"medidas"=>$medidas,"accesorios"=>$accesorios,"galvanizado"=>$galvanizado,"pintado"=>$pintado,"representante"=>$representante]);
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
        $iduser;
        $garantias;
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
            $incluye=$dato['incluye'];
            $plazofabri=$dato['plazofabri'];
            $garantias=$dato['garantias'];
            $iduser=$dato['userid'];
            $simbolo=$dato['simbolo'];
        }
        $idProforma=DB::table('Proforma')->insertGetId(
            ['idCliente'=>$idclie,
            'idEmpleado'=>$iduser,          
            'idTipo_moneda'=>$idTipoCam,
            'serie_proforma'=>'BU365122019',
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
            'garantia'=>$garantias,
            'simboloP'=>$simbolo,
            'cliente_empleado'=>$clienteemp,
            'observacion_condicion'=>$observacion,
            'incluye'=>$incluye,
            'plaza_fabricacion'=>$plazofabri,
            'estado'=>1,
            ]
        );
        foreach($request->filas as $fila){
            $detalleProforma=new DetalleBandejas;	
            $detalleProforma->idProducto=$fila['idProducto'];
            $detalleProforma->idProforma=$idProforma;
            $detalleProforma->idGalvanizado=$fila['idGalvanizado'];  
            $detalleProforma->idPintura=$fila['idPintado'];
            $detalleProforma->espesor=$fila['espesor'];
            $detalleProforma->cantidad=$fila['cantidadP'];
            $detalleProforma->precioGal=$fila['prec_gal'];
            $detalleProforma->precioPin=$fila['prec_pin'];
            $detalleProforma->precioTap=$fila['prec_tap'];
            $detalleProforma->tramo=$fila['tramo'];
            $detalleProforma->descripcionDP=$fila['descripcionP'];
            $detalleProforma->estadoDB=1;	
            $detalleProforma->medidas=$fila['medi'];	
            $detalleProforma->dimenciones=$fila['dimencion'];
            $detalleProforma->tapa=$fila['tapa'];
            $detalleProforma->cambioBandejas=$fila['tipocambio'];    
            $detalleProforma->simboloBandejas=$fila['simbolocambio'];
            $detalleProforma->promed=$fila['promed'];
            	

            
            

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
    ->join('Cliente_Proveedor as cp','cp.idcliente','=','p.idcliente')
    ->join('users as u','u.id','=','p.idEmpleado')
    ->join('Empleado as em','em.id','=','u.idEmp')
    ->join('Cliente_Representante as cr','cr.idCR','=','cp.idCliente')
    ->select('p.idProforma','p.fecha_hora','cp.nombres_Rs','cp.paterno','cp.materno','cp.Direccion','cp.Departamento','cp.Distrito','p.serie_proforma','p.igv','p.precio_total','p.forma_de','p.plaza_fabricacion','p.observacion_condicion','p.igv','p.precio_total','p.subtotal','p.precio_totalC','cp.correo as email','p.cliente_empleado','cp.nro_documento as ndoc','p.forma_de','p.plazo_oferta','p.observacion_proforma','cr.nombre_RE','em.nombres','em.paterno','em.materno','em.telefono','em.celular','p.garantia','p.incluye','p.serie_proforma')
    ->where('p.idProforma','=',$id)
    ->first();

    $detalles=DB::table('Detalle_bandejas as db')
    ->join('Producto as pro','db.idProducto','=','pro.idProducto')
    ->join('Galvanizado as gal','gal.idGalvanizado','=','db.idGalvanizado')
    ->join('Pintado as pin','pin.idPintado','=','db.idPintura')
    ->select('db.idGalvanizado','pin.idPintado','pro.marca_producto','pro.codigo_producto','pro.nombre_producto','pro.descripcion_producto','db.descripcionDP','db.espesor','gal.nombreGalvanizado','pin.nombrePintado','db.espesor','db.cantidad','db.precioGal','db.precioPin','db.precioTap','db.tramo','db.medidas','db.descripcionDP','db.dimenciones','db.tapa')
    ->where('db.idProforma','=',$id)
    ->get();
    
    return view("proforma.bandejas.show",["proforma"=>$proforma,"detalles"=>$detalles]);
   

}

public function pdf($id){

    $proforma=DB::table('Proforma as p')
    ->join('Cliente_Proveedor as cp','cp.idcliente','=','p.idcliente')
    ->join('users as u','u.id','=','p.idEmpleado')
    ->join('Empleado as em','em.id','=','u.idEmp')
    ->join('Cliente_Representante as cr','cr.idCR','=','cp.idCliente')
    ->select('p.idProforma','p.fecha_hora','cp.nombres_Rs','cp.paterno','cp.materno','cp.Direccion','cp.Departamento','cp.Distrito','p.serie_proforma','p.igv','p.precio_total','p.forma_de','p.plaza_fabricacion','p.observacion_condicion','p.igv','p.precio_total','p.subtotal','p.precio_totalC','cp.correo as email','p.cliente_empleado','cp.nro_documento as ndoc','p.forma_de','p.plazo_oferta','p.observacion_proforma','cr.nombre_RE','em.nombres','em.paterno','em.materno','em.telefono','em.celular','p.garantia','p.incluye','p.serie_proforma')
    ->where('p.idProforma','=',$id)
    ->first();

    $detalles=DB::table('Detalle_bandejas as db')
    ->join('Producto as pro','db.idProducto','=','pro.idProducto')
    ->join('Galvanizado as gal','gal.idGalvanizado','=','db.idGalvanizado')
    ->join('Pintado as pin','pin.idPintado','=','db.idPintura')
    ->select('db.idGalvanizado','pin.idPintado','pro.marca_producto','pro.codigo_producto','pro.nombre_producto','pro.descripcion_producto','db.descripcionDP','db.espesor','gal.nombreGalvanizado','pin.nombrePintado','db.espesor','db.cantidad','db.precioGal','db.precioPin','db.precioTap','db.tramo','db.medidas','db.descripcionDP','db.dimenciones','db.tapa')
    ->where('db.idProforma','=',$id)
    ->get();

    $pdf=PDF::loadView('proforma/bandejas/pdf',['proforma'=>$proforma,"detalles"=>$detalles]);
    return $pdf->stream('proformas.pdf');
    

}
public function pdf2($id){

   $proforma=DB::table('Proforma as p')
    ->join('Cliente_Proveedor as cp','cp.idcliente','=','p.idcliente')
    ->join('users as u','u.id','=','p.idEmpleado')
    ->join('Empleado as em','em.id','=','u.idEmp')
    ->join('Cliente_Representante as cr','cr.idCR','=','cp.idCliente')
    ->select('p.idProforma','p.fecha_hora','cp.nombres_Rs','cp.paterno','cp.materno','cp.Direccion','cp.Departamento','cp.Distrito','p.serie_proforma','p.igv','p.precio_total','p.forma_de','p.plaza_fabricacion','p.observacion_condicion','p.igv','p.precio_total','p.subtotal','p.precio_totalC','cp.correo as email','p.cliente_empleado','cp.nro_documento as ndoc','p.forma_de','p.plazo_oferta','p.observacion_proforma','cr.nombre_RE','em.nombres','em.paterno','em.materno','em.telefono','em.celular','p.garantia','p.incluye','p.serie_proforma','p.tipocambio','p.simboloP')
    ->where('p.idProforma','=',$id)
    ->first();

    $detalles=DB::table('Detalle_bandejas as db')
    ->join('Producto as pro','db.idProducto','=','pro.idProducto')
    ->join('Galvanizado as gal','gal.idGalvanizado','=','db.idGalvanizado')
    ->join('Pintado as pin','pin.idPintado','=','db.idPintura')
    ->select('db.idGalvanizado','pin.idPintado','pro.marca_producto','pro.codigo_producto','pro.nombre_producto','pro.descripcion_producto','db.descripcionDP','db.espesor','gal.nombreGalvanizado','pin.nombrePintado','db.espesor','db.cantidad','db.precioGal','db.precioPin','db.precioTap','db.tramo','db.medidas','db.descripcionDP','db.dimenciones','db.tapa','db.cambioBandejas','db.simboloBandejas')
    ->where('db.idProforma','=',$id)
    ->get();


    $pdf=PDF::loadView('proforma/bandejas/pdf2',['proforma'=>$proforma,"detalles"=>$detalles]);
    return $pdf->stream('proformas.pdf');
   


}
public function edit($id)
    {
        //
        $productos=DB::table('Producto as po')
 ->join('Familia as fa','po.idFamilia','=','fa.idFamilia')
 ->select('po.promedio','po.idProducto','fa.idFamilia','fa.nombre_familia','fa.descuento_familia','po.serie_producto','po.codigo_pedido','po.stock','po.precio_unitario','po.foto','po.categoria_producto','po.fecha_sistema','po.nombre_producto','po.codigo_producto','po.marca_producto','descripcion_producto',DB::raw('CONCAT(po.nombre_producto," | ",po.codigo_producto," | ",po.marca_producto) as productos2'))
 ->where('po.tipo_producto','=','bandejas')
 ->orwhere('po.tipo_producto','=','accesorios')
 ->where('po.estado','=','activo')
 ->get();
  $accesorios=DB::table('Accesorios')
 ->get();

 $galvanizado=DB::table('Galvanizado')
 ->get();

  $pintado=DB::table('Pintado')
 ->get();

 $medidas=DB::table('Medidas')
 ->where('estadoM','=','activo')
 ->get();

 $monedas=DB::table('Tipo_moneda')
 ->where('estado','=','1')
 ->get();

 $representante=DB::table('Cliente_Representante') 
    ->where('estadoCE','=',1)
    ->get();

 $clientes=DB::table('Cliente_Proveedor as cp')
 ->select('cp.idCliente','cp.nombres_Rs','cp.paterno','cp.materno',DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'cp.nro_documento')
->where('cp.estado','=','1')
->get();
         
$proforma=DB::table('Proforma as p')
->join('Detalle_bandejas as deP','p.idProforma','=','deP.idProforma')
->join('Galvanizado as gal','gal.idGalvanizado','=','deP.idGalvanizado')
->join('Producto as pd','pd.idProducto','=','deP.idProducto')
->join('Cliente_Proveedor as clp','clp.idCliente','=','p.idCliente')
->join('Cliente_Representante as ce','ce.idCliente','=','clp.idCliente')
->select('p.idProforma','p.idCliente','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado','deP.idDetalle_bandejas','deP.idProducto','deP.idProforma','deP.cantidad','deP.estadoDB','deP.descripcionDP','pd.nombre_producto','clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','deP.espesor','pd.marca_producto','pd.nombre_producto','pd.descripcion_producto','gal.nombreGalvanizado','deP.medidas','deP.tramo','deP.tapa','deP.dimenciones','deP.precioGal','deP.precioPin','deP.precioTap','deP.promed','ce.nombre_RE','p.incluye')
        ->where('deP.idProforma','=',$id)
        ->get();
    
        // return view("proforma.proforma.create",["productos"=>$productos,"clientes"=>$clientes,"monedas"=>$monedas]);
return view("proforma.bandejas.edit",["productos"=>$productos,"clientes"=>$clientes,"monedas"=>$monedas,"medidas"=>$medidas,"accesorios"=>$accesorios,"galvanizado"=>$galvanizado,"pintado"=>$pintado,"representante"=>$representante,"proforma"=>$proforma]);


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
                //$nomTablero=$dato['nomTablero'];
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
                'tipo_proforma'=>'bandeja',
                // 'caracteristicas_proforma'=>$request->, preguntar
                'forma_de'=>$forma,
                // 'plaza_fabricacion'=>$request->,
                'plazo_oferta'=>$plazo,
                // 'garantia'=>$request->,
                // 'observacion_condicion'=>$request->,
                'observacion_proforma'=>$observacion,
                'estado'=>1
                ]);
            foreach($request->filas as $fila){
                if ($fila['estado']==1 || $fila['estado']==0) {
                    DetalleBandejas::where('idProforma',$idProforma)
                    ->where('idDetalle_bandejas',$fila['idDetalleProforma'])
                    ->update([
                    // $detalleProforma->idDetalle_proforma=$fila[''];  
                    'idProducto'=>$fila['idProducto'],
                    'idMedidas'=>$fila['idMedidas'],
                    // 'idProforma'=>$idProforma,
                    // 'idTableros'=>$idTablero,
                    'cantidad'=>$fila['cantidadP'],
                    'precio_venta'=>$fila['prec_uniP'],
                    // texto_precio_venta=>$fila['' 
                    // observacion_detalleP=>$fila[''   
                    'descuento'=>$fila['descuentoP'],
                    'descripcionDP'=>$fila['descripcionP'],
                    'estadoDB'=>$fila['estado']
                    ]);
                }else if($fila['estado']==2){
                    $Detallebandejas=new DetalleBandejas;
                    // $detalleProforma->idDetalle_proforma=$fila[''];  
                    $Detallebandejas->idProducto=$fila['idProducto'];
                    
                    $Detallebandejas->idProforma=$idProforma;
                    $Detallebandejas->idMedidas=$fila['idMedidas'];
                    // $detalleProforma->idTableros=$idTablero;
                    $Detallebandejas->cantidad=$fila['cantidadP'];
                    $Detallebandejas->precio_venta=$fila['prec_uniP'];  
                    // $detalleProforma->texto_precio_venta=$fila[''];  
                    // $detalleProforma->observacion_detalleP=$fila[''];    
                    $Detallebandejas->descuento=$fila['descuentoP'];    
                    $Detallebandejas->descripcionDP=$fila['descripcionP'];
                    $Detallebandejas->estadoDB=1;
                    $Detallebandejas->save();
                }
                
            }
                return ['data' =>'bandejas','veri'=>true];
            }catch(Exception $e){
                return ['data' =>$e,'veri'=>false];
            }
    }
    public function destroy($id)
    {
        $producto=Proforma::findOrFail($id);
        $producto->estado=0;
        $producto->update();
        return Redirect::to('bandejas');
    }

    public function representante(Request $request)
    {
        $idCliente=$request->get('cliente');
        $cliente=DB::table('Cliente_Representante')
        ->where('idCliente','=',$idCliente)
        ->get();
        // dd($request);
        return ['cliente' =>$cliente,'veri'=>true];
    }
}
