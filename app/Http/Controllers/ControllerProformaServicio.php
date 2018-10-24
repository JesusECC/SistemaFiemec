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

    /* $servicios=DB::table('Servicios as s')
        ->select('s.idServicios', DB::raw('DISTINCT(s.nombre_servicio) as tarea'))
        ->get();*/

    /*  $picks = DB::table('picks')
      ->distinct()
      ->select('user_id')
      ->where('weeknum', '=', 1)
      ->groupBy('user_id')
      ->get();*/
        
        $servicios=DB::table('Tarea')
        ->distinct()
        ->select('idTarea','nombre_tarea as tarea')
        ->groupBy('idTarea','nombre_tarea')
        ->get();

        $clientes=DB::table('Cliente_Proveedor as cp')
         ->select('cp.idCliente',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'cp.nro_documento')
        ->where('tipo_persona','=','Cliente persona')
        ->orwhere('tipo_persona','=','Cliente Empresa')
        ->get();
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
            // idcliente,total,idTipoCambio,valorTipoCambio
            foreach ($request->datos as $dato) {
                $idclie=$dato['idcliente'];
                $tota=$dato['total'];
                $idTipoCam=$dato['idTipoCambio'];
                $valorcambio=$dato['valorTipoCambio'];
                $valorv=$dato['subtotal'];
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
                'tipo_proforma'=>'Servicios',
                // 'caracteristicas_proforma'=>$request->,
                // 'forma_de'=>$request->,
                // 'plaza_fabricacion'=>$request->,
                // 'plazo_oferta'=>$request->,
                // 'garantia'=>$request->,
                // 'observacion_condicion'=>$request->,
                // 'observacion_proforma'=>$request->,
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
                        $DetalleServicio->idTarea=$fila['idTarea'];
                        $DetalleServicio->idProforma=$idProforma;
                        $DetalleServicio->idServicios=$idServicio;
                        // $DetalleServicio->cantidad=$fila['cantidadP'];
                        // $DetalleServicio->precio_venta=$fila['prec_uniP'];  
                        // $DetalleServicio->texto_precio_venta=$fila[''];  
                        // $DetalleServicio->observacion_detalleP=$fila[''];    
                        // $DetalleServicio->descuento=$fila['descuentoP'];    
                        $DetalleServicio->descripcionDP=$fila['descripcionP'];
                        $DetalleServicio->descripcionDP=1;
                        
                        $DetalleServicio->save();
                    }
                }
            }
            return ['data' =>'servicios','veri'=>true];
        }catch(Exception $e){
            return ['data' =>$e,'veri'=>false];
        }
    }

    }




