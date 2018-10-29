<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use SistemaFiemec\Http\Requests;
use SistemaFiemec\Proforma;
use SistemaFiemec\DetalleProforma;
use SistemaFiemec\DetalleServicio;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use SistemaFiemec\Http\Requests\RequestFormProforma;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use DB;
class ControllerProformaServicio extends Controller
{
   public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $servicios=DB::table('Proforma as p')
            ->join('Cliente_Proveedor as cp','p.idCliente','=','cp.idCliente')
            ->select('p.idProforma','p.fecha_hora','cp.nombres_Rs','cp.paterno','cp.materno','p.serie_proforma','p.igv','p.precio_total')
            ->where('p.idProforma','LIKE','%'.$query.'%')
            ->where('p.estado','=',1)
            ->where('p.tipo_proforma','=','Servicios')
            ->orderBy('p.idProforma','desc')
            
            ->paginate(7);           
            // dd($servicios);
            return view('proforma.servicio.index',["servicios"=>$servicios,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $productos=DB::table('Producto as po')
        ->join('Familia as fa','po.idFamilia','=','fa.idFamilia')
        ->select('po.idProducto','fa.idFamilia','fa.nombre_familia','fa.descuento_familia','po.serie_producto',
        'po.codigo_pedido','po.codigo_producto','po.nombre_producto','po.marca_producto','po.stock',
        'po.descripcion_producto','po.precio_unitario','po.foto','po.categoria_producto','po.fecha_sistema')
        ->where('po.estado','=','activo')
        ->get();
        
        $monedas=DB::table('Tipo_moneda')
        ->where('estado','=',1)
        ->get();
        
        $servicios=DB::table('Tarea')
        ->distinct()
        ->select('idTarea','nombre_tarea as tarea')
        ->groupBy('idTarea','nombre_tarea')
        ->where('estado','=',1)
        ->get();

        $clientes=DB::table('Cliente_Proveedor as cp')
         ->select('cp.idCliente','cp.nombres_Rs','cp.paterno','cp.materno','cp.Direccion','cp.Departamento','cp.Distrito','cp.nro_documento')
        ->where('tipo_persona','=','Cliente persona')
        ->orwhere('tipo_persona','=','Cliente Empresa')
        ->get();
        // dd($clientes);
        return view('proforma.servicio.create',["productos"=>$productos,"clientes"=>$clientes,"monedas"=>$monedas,"servicios"=>$servicios]);
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
            $Servicios;
            $idTipoCam;
            $valorcambio;
            $iduser;
            $formaPago;
            $plazoOferta;
            $observaciones;
            $simbolo;
            // idcliente,total,idTipoCambio,valorTipoCambio
            foreach ($request->datos as $dato) {
                $idclie=$dato['idcliente'];
                $tota=$dato['total'];
                $idTipoCam=$dato['idTipoCambio'];
                $valorcambio=$dato['valorTipoCambio'];
                $valorv=$dato['subtotal'];
                $iduser=$dato['iduser'];
                $formaPago=$dato['formaPago'];
                $plazoOferta=$dato['plazoOferta'];
                $observaciones=$dato['observaciones'];
                $simbolo=$dato['simbolo'];
            }
            $idProforma=DB::table('Proforma')->insertGetId(
                ['idCliente'=>$idclie,
                 'idEmpleado'=>$iduser,           
                'idTipo_moneda'=>$idTipoCam,
                'cliente_empleado'=>3,
                'serie_proforma'=>'PU365122019',
                // 'fecha_hora'=>$mytime->toDateTimeString(),
                'igv'=>'18',
                'subtotal'=>$valorv,
                'precio_total'=>$tota,
                'tipocambio'=>$valorcambio,
                'simboloP'=>$simbolo,
                // 'precio_totalC'=>$request->,
                // 'descripcion_proforma'=>$request->,
                'tipo_proforma'=>'Servicios',
                // 'caracteristicas_proforma'=>$request->,
                'forma_de'=> $formaPago,
                // 'plaza_fabricacion'=>$request->,
                'plazo_oferta'=>$plazoOferta,
                // 'garantia'=>$request->,
                // 'observacion_condicion'=>$request->,
                'observacion_proforma'=>$observaciones,
                'estado'=>1
                ]
            );
            foreach ($request->Servicios as $tablero) {
                $nombre=$tablero['nombre'];
                $idServicio=DB::table('Servicios')->insertGetId(
                    [
                        'nombre_servicio'=>$nombre,
                        'estadoT'=>1 //los estados permitidos son 0 eliminacion logica, 1 activo, 2 nuevo en editar  
                    ]
                );
                foreach($request->filas as $fila){
                    if($fila['nomTablero']==$tablero['nombre']){
                        $DetalleServicio=new DetalleServicio;
                        // $detalleProforma->idDetalle_proforma=$fila[''];                          
                        $DetalleServicio->idProforma=$idProforma;
                        $DetalleServicio->idServicios=$idServicio;
                        $DetalleServicio->idTarea=$fila['idTarea'];
                        // $DetalleServicio->cantidad=$fila['cantidadP'];
                        // $DetalleServicio->precio_venta=$fila['prec_uniP'];  
                        // $DetalleServicio->texto_precio_venta=$fila[''];  
                        // $DetalleServicio->observacion_detalleP=$fila[''];    
                        // $DetalleServicio->descuento=$fila['descuentoP'];    
                        $DetalleServicio->descripcionDP=$fila['descripcionP'];
                        $DetalleServicio->estadoDP=1;
                        
                        $DetalleServicio->save();
                    }
                }
            }
            return ['data' =>'servicios','veri'=>true];
        }catch(Exception $e){
            return ['data' =>$e,'veri'=>false];
        }
    }

public function show($id)
{

        $td=DB::table('Proforma as p')
        ->join('Cliente_Proveedor as clp','clp.idCliente','=','p.idCliente')
        ->join('users as u','u.id','=','p.idEmpleado')

        ->select('u.id',DB::raw('CONCAT(u.name,u.paterno,u.materno)as nameE'),'clp.correo','p.idProforma','p.idCliente','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado',DB::raw('CONCAT(clp.Direccion,"  ",clp.Departamento,"-",clp.Distrito) as direccion'),'clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion')
        ->where('idProforma','=',$id)
        ->first();

        $tablero=DB::table('Servicios as s')
        ->distinct()
        ->join('Detalle_proforma_servicios as dps','s.idServicios','=','dpt.idServicios')
        ->where('dps.idProforma','=',$id)
        ->get(['s.nombre_servicio','estadoT']);

        $proforma=DB::table('Proforma as p')
        ->join('Detalle_proforma_servicios as dePS','p.idProforma','=','dePS.idProforma')
        ->join('Producto as ta','ta.idProducto','=','dePS.idProducto')
       ->join('Cliente_Proveedor as clp','clp.idCliente','=','p.idCliente')
        ->join('idServicios as s','s.idServicios','=','dePS.idServicios')
        
        ->select('p.idProforma','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado',DB::raw('CONCAT(ta.codigo_producto," ",ta.nombre_producto," | ",marca_producto," | ",descripcion_producto) as producto'),'clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','s.idServicios','s.nombre_servicio','s.estadoT','dePS.idDetalle_proforma','dePS.idProducto','dePS.idProforma','dePS.idServicios','dePS.cantidad','dePS.precio_venta','dePS.texto_precio_venta','dePS.descuento','dePS.descripcionDP','dePS.estadoDP')
        ->where('p.idProforma','=',$id)
        ->get();

        // dd($tablero,$proforma,$p);

        return view("proforma.servicio.show",['td'=>$td,'proforma'=>$proforma,"servicio"=>$servicio]);
    }


    public function edit($id)
    {
        //
        $clientes=DB::table('Cliente_Proveedor as cp')
        ->select('cp.idCliente',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'cp.nro_documento')
        ->where('tipo_persona','=','Cliente persona')
        ->orwhere('tipo_persona','=','Cliente Empresa')
        ->where('idCliente','=',$id)
        ->get();

        $Tareas=DB::table('Tarea as t')
        ->where('t.estado','=',1)
        ->get(); 

        $Servicios=DB::table('Servicios as s')
        ->distinct()
        ->join('Detalle_proforma_servicios as dps','s.idServicios','=','dps.idServicios')
        ->where('s.estadoT','=',1)
        ->where('dps.idServicios','=',$id)
        ->get(['s.nombre_servicio','s.estadoT']);
        
        $proforma=DB::table('Proforma as p')
        ->join('Detalle_proforma_servicios as deTS','p.idProforma','=','deTS.idProforma')
        ->join('Tarea as ta','ta.idTarea','=','deTS.idTarea')
        ->join('Cliente_Proveedor as clp','clp.idCliente','=','p.idCliente')
        ->join('Servicios as s','s.idServicios','=','deTS.idServicios')
        ->select('p.idProforma','p.idCliente','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado','p.idestado','p.incluye','deTS.idDetalle_proforma','deTS.idProforma','deTS.idServicios','deTS.idTarea','deTS.texto_precio_venta','deTS.descuento','deTS.descripcionDP','deTS.estadoDP','ta.idTarea','ta.nombre_tarea','ta.descripcion_tarea','ta.estado','clp.idCliente','clp.nro_documento','clp.nombres_Rs','clp.Direccion','s.idServicios','s.nombre_servicio','s.estadoT')
        ->where('p.idProforma','=',$id)
        ->get();
        // dd($proforma);


        // 's.idServicios','s.nombre_servicio','s.estadoT'
// 'clp.idCliente','clp.nro_documento','clp.nombres_Rs','clp.Direccion',
    // 'ta.idTarea','ta.nombre_tarea','ta.descripcion_tarea','ta.estado', 
    // 'deTS.idDetalle_proforma','deTS.idProforma','deTS.idServicios','deTS.idTarea','deTS.texto_precio_venta','deTS.descuento','deTS.descripcionDP','deTS.estadoDP',  
    // 'p.idProforma','p.idCliente','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado','p.idestado','p.incluye',
            // 'deTS.idDetalle_Servicios','deTS.idProducto','deTS.idProforma','deTS.idServicios','deTS.cantidad','deTS.precio_venta','deTS.texto_precio_venta','deTS.descuento','deTS.descripcionDP','deTS.estadoDP'
        // return view("proforma.proforma.create",["productos"=>$productos,"clientes"=>$clientes,"monedas"=>$monedas]);
        return view("proforma.servicio.edit",["clientes"=>$clientes,'proforma'=>$proforma,'Tareas'=>$Tareas,'Servicios'=>$Servicios]);
    }
    public function destroy($id)
    {
        $proforma=Proforma::findOrFail($id);
        $proforma->estado=0;
        $proforma->update();
        return Redirect::to('servicio');
    }
}




