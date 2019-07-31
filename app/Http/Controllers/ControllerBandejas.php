<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use SistemaFiemec\Http\Requests;
use SistemaFiemec\Proforma;

use SistemaFiemec\DetalleBandejas;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use SistemaFiemec\Http\Requests\RequestFormProforma;
use Illuminate\Support\Facades\Auth;
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
          $id=Auth::user()->id;
    if ($request)
    {
    $query=trim($request->get('searchText'));
    $proformas=DB::table('Proforma as p')
    ->join('Cliente_Proveedor as cp','p.idCliente','=','cp.idCliente')
    ->join('users as u','u.id','=','p.idEmpleado')
    ->select('p.idProforma','p.fecha_hora','cp.nombres_Rs','cp.paterno','cp.materno','p.serie_proforma','p.igv','p.precio_total')
    ->where('p.idProforma','LIKE','%'.$query.'%')
    ->where('p.estado','=',1)
    ->where('tipo_proforma','=','bandeja')
    ->where('p.idEmpleado','=',$id)
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

 $Pestania=DB::table('Pestania')
    ->get();

 $representante=DB::table('Cliente_Representante') 
    ->where('estadoCE','=',1)
    ->get();

 $clientes=DB::table('Cliente_Proveedor as cp')
    ->join('users as u','u.id','=','cp.idU')
    ->select('cp.idCliente','cp.nombres_Rs','cp.paterno','cp.materno',DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'cp.nro_documento','cp.idU',DB::raw('CONCAT(u.name," ",u.paterno," ",u.materno) as user'))
    ->where('estado','=',1)
    ->get();

 return view("proforma.bandejas.create",["productos"=>$productos,"clientes"=>$clientes,"monedas"=>$monedas,"medidas"=>$medidas,"accesorios"=>$accesorios,"galvanizado"=>$galvanizado,"pintado"=>$pintado,"representante"=>$representante,"Pestania"=>$Pestania]);
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
        $nombproyecto;
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
            $nombproyecto=$dato['nombproyect'];
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
            'proyecto'=>$nombproyecto,
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
            $detalleProforma->espesor=$fila['espesor'];
            $detalleProforma->cantidad=$fila['cantidadP'];
            $detalleProforma->precioGal=$fila['prec_gal'];
            $detalleProforma->preciouniB=$fila['preciounit'];
            $detalleProforma->precioTap=$fila['prec_tap'];
           // $detalleProforma->tramo=$fila['tramo'];
            $detalleProforma->descripcionDP=$fila['descripcionP'];
            $detalleProforma->estadoDB=1;	
            $detalleProforma->medidas=$fila['medi'];	
            $detalleProforma->dimenciones=$fila['dimencion'];
            $detalleProforma->tapa=$fila['tapa'];
            $detalleProforma->cambioBandejas=$fila['tipocambio'];    
            $detalleProforma->simboloBandejas=$fila['simbolocambio'];
            $detalleProforma->promed=$fila['promed'];

            $detalleProforma->idPintado=$fila['codpin'];
            $detalleProforma->idPintadoTapa=$fila['codpinT'];
            $detalleProforma->idPestania=$fila['codPest'];
            $detalleProforma->save();            
        }
        return ['data' =>'bandejas','veri'=>true];
    }catch(Exception $e){
        return ['data' =>$e,'veri'=>false];
    }
   

    
     }

   public function show($id)
   {
    $proforma=DB::table('Proforma as p')
    ->join('Cliente_Proveedor as cp','cp.idcliente','=','p.idcliente')
    ->join('users as u','u.id','=','p.idEmpleado')
    ->join('Empleado as em','em.id','=','u.idEmp')
    ->join('Cliente_Representante as cr','cr.idCR','=','p.cliente_empleado')
    ->select('p.idProforma','p.fecha_hora','cp.nombres_Rs','cp.paterno as paternoC','cp.materno as maternoC','cp.Direccion','cp.Departamento','cp.Distrito','p.serie_proforma','p.igv','p.precio_total','p.forma_de','p.plaza_fabricacion','p.observacion_condicion','p.igv','p.precio_total','p.subtotal','p.precio_totalC','cp.correo as email','p.cliente_empleado','cp.nro_documento as ndoc','p.forma_de','p.plazo_oferta','p.observacion_proforma','cr.nombre_RE','em.nombres','em.paterno','em.materno','em.telefono','em.celular','p.garantia','p.incluye','p.serie_proforma','u.name','u.paterno as up','u.materno as um','u.telefonoU','u.celularU')
    ->where('p.idProforma','=',$id)
    ->first();

    $detalles=DB::table('Detalle_bandejas as db')
    ->join('Producto as pro','db.idProducto','=','pro.idProducto')
    ->join('Galvanizado as gal','gal.idGalvanizado','=','db.idGalvanizado')
    ->select('db.idGalvanizado','pro.marca_producto','pro.codigo_producto','pro.nombre_producto','pro.descripcion_producto','db.descripcionDP','gal.nombreGalvanizado','db.espesor','db.cantidad','db.precioGal','db.precioTap','db.tramo','db.medidas','db.descripcionDP','db.dimenciones','db.tapa','db.promed','db.preciouniB','pro.promedio')
    ->where('db.idProforma','=',$id)
    ->where('db.estadoDB','=','1')
    ->get();
    
    return view("proforma.bandejas.show",["proforma"=>$proforma,"detalles"=>$detalles]);
   

}

public function pdf($id){

    $proforma=DB::table('Proforma as p')
    ->join('Cliente_Proveedor as cp','cp.idcliente','=','p.idcliente')
    ->join('users as u','u.id','=','p.idEmpleado')
    ->join('Empleado as em','em.id','=','u.idEmp')
    ->join('Cliente_Representante as cr','cr.idCR','=','p.cliente_empleado')
    ->select('p.idProforma','p.fecha_hora','cp.nombres_Rs','cp.paterno as paternoC','cp.materno as maternoC','cp.Direccion','cp.Departamento','cp.Distrito','p.serie_proforma','p.igv','p.precio_total','p.forma_de','p.plaza_fabricacion','p.observacion_condicion','p.igv','p.precio_total','p.subtotal','p.precio_totalC','cp.correo as email','p.cliente_empleado','cp.nro_documento as ndoc','p.forma_de','p.proyecto','p.plazo_oferta','p.observacion_proforma','cr.nombre_RE','em.nombres','em.paterno','em.materno','em.telefono','em.celular','p.garantia','p.incluye','p.serie_proforma')
    ->where('p.idProforma','=',$id)
    ->first();

    $detalles=DB::table('Detalle_bandejas as db')
    ->join('Producto as pro','db.idProducto','=','pro.idProducto')
    ->join('Galvanizado as gal','gal.idGalvanizado','=','db.idGalvanizado')
    ->select('db.idGalvanizado','pro.marca_producto','pro.codigo_producto','pro.nombre_producto','pro.descripcion_producto','db.descripcionDP','gal.nombreGalvanizado','db.espesor','db.cantidad','db.precioGal','db.precioTap','db.tramo','db.medidas','db.descripcionDP','db.dimenciones','db.tapa','db.promed','db.preciouniB','pro.promedio')
    ->where('db.idProforma','=',$id)
    ->where('db.estadoDB','=','1')
    ->get();

    $pdf=PDF::loadView('proforma/bandejas/pdf',['proforma'=>$proforma,"detalles"=>$detalles]);
    return $pdf->stream('proformas.pdf');
    

}
public function pdf2($id){

   $proforma=DB::table('Proforma as p')
    ->join('Cliente_Proveedor as cp','cp.idcliente','=','p.idcliente')
    ->join('users as u','u.id','=','p.idEmpleado')
    ->join('Empleado as em','em.id','=','u.idEmp')
    ->join('Cliente_Representante as cr','cr.idCR','=','p.cliente_empleado')
    ->select('p.idProforma','p.fecha_hora','cp.nombres_Rs','cp.paterno as paternoC','cp.materno as maternoC','cp.Direccion','cp.Departamento','cp.Distrito','p.serie_proforma','p.igv','p.precio_total','p.forma_de','p.proyecto','p.plaza_fabricacion','p.observacion_condicion','p.igv','p.precio_total','p.subtotal','p.precio_totalC','cp.correo as email','p.cliente_empleado','cp.nro_documento as ndoc','p.forma_de','p.proyecto','p.plazo_oferta','p.observacion_proforma','cr.nombre_RE','em.nombres','em.paterno','em.materno','em.telefono','em.celular','p.garantia','p.incluye','p.serie_proforma','p.tipocambio','p.simboloP')
    ->where('p.idProforma','=',$id)
    ->first();

    $detalles=DB::table('Detalle_bandejas as db')
    ->join('Producto as pro','db.idProducto','=','pro.idProducto')
    ->join('Galvanizado as gal','gal.idGalvanizado','=','db.idGalvanizado')
    ->select('db.idGalvanizado','pro.marca_producto','pro.codigo_producto','pro.nombre_producto','pro.descripcion_producto','db.descripcionDP','gal.nombreGalvanizado','db.espesor','db.cantidad','db.precioGal','db.precioTap','db.tramo','db.medidas','db.descripcionDP','db.dimenciones','db.tapa','db.promed','db.preciouniB','pro.promedio','db.cambioBandejas','db.simboloBandejas')
    ->where('db.idProforma','=',$id)
    ->where('db.estadoDB','=','1')
    ->get();

    $pdf=PDF::loadView('proforma/bandejas/pdf2',['proforma'=>$proforma,"detalles"=>$detalles]);
    return $pdf->stream('proformas.pdf');
   


}
public function edit($id)
    {
        //
    $productos=DB::table('Producto as po')
    ->join('Familia as fa','po.idFamilia','=','fa.idFamilia')
    ->select('po.idProducto','fa.idFamilia','fa.nombre_familia','fa.descuento_familia','po.serie_producto','po.codigo_pedido','po.codigo_producto','po.nombre_producto','po.marca_producto','po.stock','po.descripcion_producto','po.precio_unitario','po.foto','po.categoria_producto','po.fecha_sistema','po.tipo_producto','po.promedio')
    ->where('po.tipo_producto','=','bandejas')
    ->orwhere('po.tipo_producto','=','accesorios')
    ->where('po.estado','=','activo')
    ->get();

    $accesorios=DB::table('Accesorios')
    ->get();

    $galvanizado=DB::table('Galvanizado')
    ->get();

    $medidas=DB::table('Medidas')
    ->where('estadoM','=','activo')
    ->get();

    $monedas=DB::table('Tipo_moneda')
    ->where('estado','=','1')
    ->get();


    $Pestania=DB::table('Pestania')
    ->get();

    $pintado=DB::table('Pintado')
    ->get();

    $proforma=DB::table('Proforma as p')
    ->join('Detalle_bandejas as deP','p.idProforma','=','deP.idProforma')
    ->join('Producto as pd','pd.idProducto','=','deP.idProducto')
    ->join('Cliente_Proveedor as clp','clp.idCliente','=','p.idCliente')
    ->join('Cliente_Representante as cr','cr.idCR','=','p.cliente_empleado')
    ->join('Galvanizado as gal','gal.idGalvanizado','=','deP.idGalvanizado')
    ->select('p.idProforma','p.idCliente','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.proyecto','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado','deP.idDetalle_bandejas','deP.idProducto','deP.idProforma','deP.cantidad','deP.cambioBandejas','deP.estadoDB','deP.descripcionDP','pd.nombre_producto','clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','p.incluye','deP.espesor','deP.espesorT','deP.precioGal','deP.preciouniB','deP.precioTap','deP.tramo','deP.medidas','deP.dimenciones','deP.tapa','deP.cambioBandejas','deP.simboloBandejas','deP.promed','deP.tramo','deP.idGalvanizado','gal.nombreGalvanizado','pd.promedio','cr.nombre_RE')
    ->where('deP.idProforma','=',$id)
    ->where('deP.estadoDB','=','1')
    ->get();
    
        
    return view("proforma.bandejas.edit",["productos"=>$productos,'proforma'=>$proforma,"accesorios"=>$accesorios,'galvanizado'=>$galvanizado,'medidas'=>$medidas,'monedas'=>$monedas,'Pestania'=>$Pestania,'pintado'=>$pintado]);

    }
    public function update(Request $request)
    {
        //
        try{
            $valorv;
            $tota;
            $totaldolares;
            $forma;
            $plazo;
            $observacion;
            $idProforma;
            $incluye;
            $plazofabri;
            $iduser;
            $garantias;
            $simbolo;
            $valorcambio;
            $nombproyecto;
           
     
            foreach ($request->datos as $dato) {
                $idProforma=$dato['idProforma'];
                $valorv=$dato['valorVenta'];
                $tota=$dato['total'];
                $simbolo=$dato['simbolo'];
                $valorcambio=$dato['valorcambio'];
                $totaldolares=$dato['totaldolares'];
                $forma=$dato['forma'];
                $plazo=$dato['plazo'];
                $observacion=$dato['observacion'];
                $forma=$dato['forma'];
                $incluye=$dato['incluy'];
                $plazofabri=$dato['plazofabri'];
                $garantias=$dato['garantias'];
                $nombproyecto=$dato['nombproyecto'];
                
                
            }        
            
                Proforma::where('idProforma',$idProforma)
                ->update([
                'serie_proforma'=>'PU365122018',
                'igv'=>'18',
                'subtotal'=>$valorv,
                'precio_total'=>$tota,
                'precio_totalC'=>$totaldolares,
                'tipo_proforma'=>'bandeja',
                'forma_de'=>$forma,
                'proyecto'=>$nombproyecto,
               
                'plaza_fabricacion'=>$plazofabri,
                'plazo_oferta'=>$plazo,
                'garantia'=>$garantias,
                'incluye'=>$incluye,
                'observacion_condicion'=>$observacion,
                'estado'=>1
                ]);
            foreach($request->filas as $fila){
                if ($fila['estado']==1 || $fila['estado']==0) {
                    DetalleBandejas::where('idProforma',$idProforma)
                    ->where('idDetalle_bandejas',$fila['idDetalle_Bandeja'])
                    ->update([
                    'idProducto'=>$fila['idProducto'],
                    'idProforma'=>$idProforma,
                    'idGalvanizado'=>$fila['idGalvanizado'], 
                    'espesor'=>$fila['espesor'],
                    'cantidad'=>$fila['cantidadP'],
                    'precioGal'=>$fila['prec_gal'],
                    'precioTap'=>$fila['prec_tap'],
                    //'tramo'=>$fila['tramo'],
                    'descripcionDP'=>$fila['descripcionP'],
                    'estadoDB'=>$fila['estado'], 
                    'medidas'=>$fila['medi'],    
                    'dimenciones'=>$fila['dimenciones'],
                    'tapa'=>$fila['tapa'],   
                    'promed'=>$fila['promed'],
                    'espesorT'=>$fila['espesorT'],
                 /*  'idPintado'=>$fila['codpin'],
                    'idPintadoTapa'=>$fila['codpinT'],
                    'idPestania'=>$fila['codPest'],
*/
                    ]);

                }else if($fila['estado']==2){
            $Detallebandejas=new DetalleBandejas;  
            $Detallebandejas->idProducto=$fila['idProducto'];
            $Detallebandejas->idProforma=$idProforma;
            $Detallebandejas->idGalvanizado=$fila['idGalvanizado'];  
            $Detallebandejas->espesor=$fila['espesor'];
            $Detallebandejas->cantidad=$fila['cantidadP'];
            $Detallebandejas->precioGal=$fila['prec_gal'];
            $Detallebandejas->preciouniB=$fila['preciounit'];
            $Detallebandejas->precioTap=$fila['prec_tap'];
           // $Detallebandejas->tramo=$fila['tramo'];
            $Detallebandejas->descripcionDP=$fila['descripcionP'];
            $Detallebandejas->estadoDB=1;   
            $Detallebandejas->medidas=$fila['medi'];    
            $Detallebandejas->dimenciones=$fila['dimenciones'];
            $Detallebandejas->tapa=$fila['tapa'];
            $Detallebandejas->cambioBandejas=$valorcambio;   
            $Detallebandejas->simboloBandejas=$simbolo;
            $Detallebandejas->promed=$fila['prome'];
            
            $Detallebandejas->espesorT=$fila['espesorT'];
            $Detallebandejas->idPintado=$fila['codpin'];
            $Detallebandejas->idPintadoTapa=$fila['codpinT'];
            $Detallebandejas->idPestania=$fila['codPest'];
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



/********* PRUEBA ************/




}
