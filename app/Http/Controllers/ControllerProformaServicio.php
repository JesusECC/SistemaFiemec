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
            ->select('p.idProforma','p.fecha_hora',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),'p.serie_proforma','p.igv','p.precio_total')
            ->where('p.idProforma','LIKE','%'.$query.'%')
            ->where('p.estado','=',1)
            ->where('p.tipo_proforma','=','Servicios')
            ->orderBy('p.idProforma','desc')
            
            ->paginate(7);           
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
            $tableros;
            $idTipoCam;
            $valorcambio;
            $iduser;
            $formaPago;
            $plazoOferta;
            $observaciones;
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
            foreach ($request->tableros as $tablero) {
                $nombre=$tablero['nombre'];
                $idServicio=DB::table('Servicios')->insertGetId(
                    [
                        'nombre_servicio'=>$nombre,
                        'estadoT'=>'activo' 
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

    public function edit($id)
    {
        //
        $clientes=DB::table('Cliente_Proveedor as cp')
        ->select('cp.idCliente',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'cp.nro_documento')
        ->where('tipo_persona','=','Cliente persona')
        ->orwhere('tipo_persona','=','Cliente Empresa')
        ->where('idCliente','=',$id)
        ->get();

        $servicios=DB::table('Producto as po')
        ->join('Familia as fa','po.idFamilia','=','fa.idFamilia')
        ->select('po.idProducto','fa.idFamilia','fa.nombre_familia','fa.descuento_familia','po.serie_producto','po.codigo_pedido','po.codigo_producto','po.nombre_producto','po.marca_producto','po.stock','po.descripcion_producto','po.precio_unitario','po.foto','po.categoria_producto','po.fecha_sistema')
        ->where('po.estado','=','activo')
        ->get();

        $proforma=DB::table('Proforma as p')
        ->join('Detalle_proforma_tableros as dePT','p.idProforma','=','dePT.idProforma')
        ->join('Producto as pd','pd.idProducto','=','dePT.idProducto')
        ->join('Cliente_Proveedor as clp','clp.idCliente','=','p.idCliente')
        ->join('Tableros as t','t.idTableros','=','dePT.idTableros')
        ->select('p.idProforma','p.idCliente','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado','pd.nombre_producto','clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','t.idTableros','t.nombre_tablero','t.estadoT','dePT.idDetalle_tableros','dePT.idProducto','dePT.idProforma','dePT.idTableros','dePT.cantidad','dePT.precio_venta','dePT.texto_precio_venta','dePT.descuento','dePT.descripcionDP','dePT.estadoDP')
        ->where('p.idProforma','=',$id)
        ->get();
        // proforma
        // 'idProforma',
        // 'idCliente',
        // 'idEmpleado',
        // 'idTipo_moneda',
        // 'cliente_empleado',
        // 'serie_proforma',
        // 'fecha_hora',
        // 'igv',
        // 'subtotal',
        // 'precio_total',
        // 'tipocambio',
        // 'simboloP',
        // 'precio_totalC',
        // 'descripcion_proforma',
        // 'tipo_proforma',
        // 'caracteristicas_proforma',
        // 'forma_de',
        // 'plaza_fabricacion',
        // 'plazo_oferta',
        // 'garantia',
        // 'observacion_condicion',
        // 'observacion_proforma',
        // 'estado',
        // 'idestado',
        // 'incluye'

        $clientes=DB::table('Cliente_Proveedor as cp')
        ->select('cp.idCliente',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'cp.nro_documento')
        ->where('tipo_persona','=','Cliente persona')
        ->orwhere('tipo_persona','=','Cliente Empresa')
        ->get();

        $tablero=DB::table('Tableros as t')
        ->distinct()
        ->join('Detalle_proforma_tableros as dpt','t.idTableros','=','dpt.idTableros')
        ->where('dpt.idProforma','=',$id)
        ->get(['t.nombre_tablero','estadoT']);


        
        // 'dePT.idDetalle_tableros','dePT.idProducto','dePT.idProforma','dePT.idTableros','dePT.cantidad','dePT.precio_venta','dePT.texto_precio_venta','dePT.descuento','dePT.descripcionDP','dePT.estadoDP'
        // return view("proforma.proforma.create",["productos"=>$productos,"clientes"=>$clientes,"monedas"=>$monedas]);
        return view("proforma.tablero.edit",['tablero'=>$tablero,"clientes"=>$clientes,'proforma'=>$proforma]);
    }
}




