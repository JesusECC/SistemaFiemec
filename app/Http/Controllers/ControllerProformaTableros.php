<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use Producto;
use SistemaFiemec\Proforma;
use SistemaFiemec\Tableros;
use SistemaFiemec\DetalleProformaTableros;
use SistemaFiemec\DetalleProforma;
use SistemaFiemec\ProformaDetalleTableros;
use Carbon\Carbon;

use SistemaFiemec\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use PDF;
use DB;
class ControllerProformaTableros extends Controller
{
    //
    public function index(Request $request)
    {
          $id=Auth::user()->id;
        if ($request)
    {
    $query=trim($request->get('searchText'));
    $proformas=DB::table('Proforma as p')
    ->join('Cliente_Proveedor as cp','p.idCliente','=','cp.idCliente')
    ->join('users as u','u.id','=','p.idEmpleado')
    ->select('p.idProforma',DB::raw('DATE_ADD(p.fecha_hora, INTERVAL -2 HOUR) as fh'),'cp.idCliente','cp.nombres_Rs','cp.paterno','cp.materno','p.serie_proforma','p.igv','p.precio_total')
    ->where('p.idProforma','LIKE','%'.$query.'%')
    ->where('tipo_proforma','=','tablero')
    ->where('p.estado','=',1)
    ->where('p.idEmpleado','=',$id)
    ->orderBy('p.idProforma','desc')
     
        ->paginate(7);           
            return view('proforma.tablero.index',["proformas"=>$proformas,"searchText"=>$query]);
        }
    }
    public function create()
    {
        
        $productos=DB::table('Producto as po')
        ->join('Familia as fa','po.idFamilia','=','fa.idFamilia')
        ->select('po.idProducto','po.idFamilia','fa.nombre_familia','fa.descuento_familia','po.serie_producto','po.codigo_pedido','po.codigo_producto','po.nombre_producto','po.marca_producto','po.stock',
        'po.descripcion_producto','po.precio_unitario','po.foto','po.categoria_producto','po.fecha_sistema',DB::raw('CONCAT(po.codigo_producto," | ",po.nombre_producto," | ",po.marca_producto," | ",po.descripcion_producto) as producto2'),'po.tipo_producto')
        ->where('po.estado','=','activo')
        ->where('po.tipo_producto','!=','accesorios')
        ->where('po.marca_producto','=','ABB')
        ->get();
        
        $marcas=DB::table('Marca')
        ->where('nombre_proveedor','!=','FIEMEC BANDEJAS')
        ->where('estadoMa','=',1)
        ->get();

        $monedas=DB::table('Tipo_moneda')
        ->where('estado','=',1)
        ->get();

        $representante=DB::table('Cliente_Representante')
         ->where('estadoCE','=',1)
          ->get();
          
        $clientes=DB::table('Cliente_Proveedor as cp')
    ->join('users as u','u.id','=','cp.idU')
    ->select('cp.idCliente','cp.nombres_Rs','cp.paterno','cp.materno',DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'cp.nro_documento','cp.idU',DB::raw('CONCAT(u.name," ",u.paterno," ",u.materno) as user'))
    ->where('estado','=',1)
    ->get();
        return view('proforma.tablero.create',["representante"=>$representante,"productos"=>$productos,"clientes"=>$clientes,"monedas"=>$monedas,"marcas"=>$marcas]);
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
            $tota2;
            $tableros;
            $idTipoCam;
            $valorcambio;
            $forma;
            $plazo;
            $clienteemp;
            $observacion;
            $simbolo;
            $iduser;
            $cantt;
            $descuento;
            $nombproyecto;//nombre del proyecto
            
            // idTipoCambio:idtipocam,valorTipoCambio:valorcambio
            foreach ($request->datos as $dato) {
            $idclie=$dato['idcliente'];
            $valorv=$dato['valorVenta'];
            $tota=$dato['total'];
            $tota2=$dato['total2'];
            $idTipoCam=$dato['idTipoCambio'];
            $valorcambio=$dato['valorTipoCambio'];
            $forma=$dato['forma'];
            $plazo=$dato['plazo'];
            $clienteemp=$dato['clienteemp'];
            $observacion=$dato['observacion'];
            $descuento=$dato['desc'];
            $simbolo=$dato['simbolo'];
            $iduser=$dato['userid'];
            $nombproyecto=$dato['nombproyecto'];//nombre del proyecto
            }	
            $idProforma=DB::table('Proforma')->insertGetId(
                ['idCliente'=>$idclie,
                'idEmpleado'=>$iduser,           
                'idTipo_moneda'=>$idTipoCam,
                'serie_proforma'=>'PU365122019',
                'igv'=>'18',
                'subtotal'=>$valorv,
                'precio_total'=>$tota,
                'totalxtab'=>$tota2,
                'tipocambio'=>$valorcambio,
                'simboloP'=>$simbolo,
                'tipo_proforma'=>'Tablero',
                'forma_de'=>$forma,
                'plazo_oferta'=>$plazo,
                'cliente_empleado'=>$clienteemp,
                'observacion_proforma'=>$observacion,
                'proyecto'=>$nombproyecto,//nombre del proyecto
                'descuento'=>$descuento,
                'estado'=>1
                ]
            );
            foreach ($request->tableros as $tablero) {
                $nombre=$tablero['nombre'];
                $est=$tablero['estado'];
                $cantt=$tablero['cantt'];
                $idTablero=DB::table('Tableros')->insertGetId(['nombre_tablero'=>$nombre,'estadoT'=>$est,'cantidadTab'=>$cantt]);
                
                foreach($request->filas as $fila){
                    if($fila['nomTablero']==$tablero['nombre']){
                        $detalleProforma=new ProformaDetalleTableros;
                        // $detalleProforma->idDetalle_proforma=$fila[''];	
                        $detalleProforma->idProducto=$fila['idProducto'];
                        $detalleProforma->idProforma=$idProforma;
                        $detalleProforma->idTableros=$idTablero;
                        $detalleProforma->cantidad=$fila['cantidadP'];
                        $detalleProforma->precio_venta=$fila['prec_uniP'];	
                       	
                        $detalleProforma->descuento=$fila['descuentoP'];	
                        $detalleProforma->descripcionDP=$fila['descripcionP'];
                        
                        $detalleProforma->simboloDPT=$simbolo;
                        $detalleProforma->cambioDPT=$valorcambio;
                        $detalleProforma->estadoDP=1;
                        $detalleProforma->save();
                    }
                }
            }
            return ['data' =>'tableros','veri'=>true];
        }catch(Exception $e){
            return ['data' =>$e,'veri'=>false];
        }
    }
public function show($id){

        $td=DB::table('Proforma as p')
        ->join('Cliente_Proveedor as clp','clp.idCliente','=','p.idCliente')
        ->join('users as u','u.id','=','p.idEmpleado')

        ->select('u.id','u.name','u.paterno as up','u.materno as um','clp.correo','p.idProforma','p.idCliente','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado',DB::raw('CONCAT(clp.Direccion,"  ",clp.Departamento,"-",clp.Distrito) as direccion'),'clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','u.telefonoU','u.celularU',DB::raw('DATE_ADD(p.fecha_hora, INTERVAL -2 HOUR) as fh'))
        ->where('idProforma','=',$id)
        ->first();

        $tablero=DB::table('Tableros as t')
        ->distinct()
        ->join('Detalle_proforma_tableros as dpt','t.idTableros','=','dpt.idTableros')
        ->where('dpt.idProforma','=',$id)
        ->where('t.estadoT','=','1')

        ->get(['t.nombre_tablero','estadoT','t.cantidadTab']);

        $proforma=DB::table('Proforma as p')
        ->join('Detalle_proforma_tableros as dePT','p.idProforma','=','dePT.idProforma')
        ->join('Producto as pd','pd.idProducto','=','dePT.idProducto')
       ->join('Cliente_Proveedor as clp','clp.idCliente','=','p.idCliente')
        ->join('Tableros as t','t.idTableros','=','dePT.idTableros')
        
        ->select('p.idProforma','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado',DB::raw('CONCAT(pd.codigo_producto," ",pd.nombre_producto," | ",marca_producto," | ",descripcion_producto) as producto'),'clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','t.idTableros','t.nombre_tablero','t.estadoT','dePT.idDetalle_tableros','dePT.idProducto','dePT.idProforma','dePT.idTableros','dePT.cantidad','dePT.precio_venta','dePT.texto_precio_venta','dePT.descuento','dePT.descripcionDP','dePT.estadoDP','t.cantidadTab','p.totalxtab')
        ->where('p.idProforma','=',$id)
        ->where('dePT.estadoDP','=','1')
        ->get();

        // dd($tablero,$proforma,$p);

        return view("proforma.tablero.show",['td'=>$td,'proforma'=>$proforma,"tablero"=>$tablero]);
    }

    public function pdf($id){

        $td=DB::table('Proforma as p')
        ->join('Cliente_Proveedor as clp','clp.idCliente','=','p.idCliente')
        ->join('users as u','u.id','=','p.idEmpleado')   
        ->join('Cliente_Representante as cr','cr.idCR','=','p.cliente_empleado')  
        ->select('u.id',DB::raw('CONCAT(u.name," ",u.paterno," ",u.materno)as nameE'),'clp.correo','p.idProforma','p.idCliente','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.igv','p.subtotal','p.precio_total','p.totalxtab','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.proyecto','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado',DB::raw('CONCAT(clp.Direccion,"  ",clp.Departamento,"-",clp.Distrito) as direccion'),'clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','cr.nombre_RE','cr.telefonoRE','cr.CelularRE','u.telefonoU','u.celularU','p.totalxtab',DB::raw('DATE_ADD(p.fecha_hora, INTERVAL -2 HOUR) as fh'),'p.descuento')
        ->where('p.idProforma','=',$id)
        ->first();

        $tablero=DB::table('Tableros as t')
        ->distinct()
        ->join('Detalle_proforma_tableros as dpt','t.idTableros','=','dpt.idTableros')
        ->where('dpt.idProforma','=',$id)
        ->where('t.estadoT','=','1')
        ->get(['t.nombre_tablero','estadoT','t.cantidadTab']);

        $proforma=DB::table('Proforma as p')
        ->join('Detalle_proforma_tableros as dePT','p.idProforma','=','dePT.idProforma')
        ->join('Producto as pd','pd.idProducto','=','dePT.idProducto')
       ->join('Cliente_Proveedor as clp','clp.idCliente','=','p.idCliente')
        ->join('Tableros as t','t.idTableros','=','dePT.idTableros')
        
        ->select('p.idProforma','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora',DB::raw('DATE_ADD(fecha_hora, INTERVAL -2 HOUR) as fh'),'p.igv','p.subtotal','p.precio_total','p.totalxtab','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.proyecto','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado',DB::raw('CONCAT(pd.nombre_producto," | ",marca_producto," | ",descripcion_producto) as producto'), 'clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','t.idTableros','t.nombre_tablero','t.estadoT','dePT.idDetalle_tableros','dePT.idProducto','dePT.idProforma','dePT.idTableros','dePT.cantidad','dePT.precio_venta','dePT.texto_precio_venta','dePT.descuento','dePT.descripcionDP','dePT.estadoDP','dePT.simboloDPT','dePT.cambioDPT','pd.codigo_pedido','pd.codigo_producto','t.cantidadTab','p.descuento as de')
        ->where('p.idProforma','=',$id)
        ->where('dePT.estadoDP','=','1')
        ->get();

        $pdf=PDF::loadView('proforma/tablero/pdf',['td'=>$td,'proforma'=>$proforma,"tablero"=>$tablero]);
        return $pdf->stream('proforma.pdf');
    }
    


public function pdf2($id){

        $td=DB::table('Proforma as p')
        ->join('Cliente_Proveedor as clp','clp.idCliente','=','p.idCliente')
        ->join('users as u','u.id','=','p.idEmpleado')
        ->join('Cliente_Representante as cr','cr.idCR','=','p.cliente_empleado')
        ->select('u.id',DB::raw('CONCAT(u.name," ",u.paterno," ",u.materno)as nameE'),'clp.correo','p.idProforma','p.idCliente','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.totalxtab','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.proyecto','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado',DB::raw('CONCAT(clp.Direccion,"  ",clp.Departamento,"-",clp.Distrito) as direccion'),'clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','cr.nombre_RE','cr.telefonoRE','cr.CelularRE','u.telefonoU','u.celularU',DB::raw('DATE_ADD(p.fecha_hora, INTERVAL -2 HOUR) as fh'))
        ->where('idProforma','=',$id)
        ->first();

        $tablero=DB::table('Tableros as t')
        ->distinct()
        ->join('Detalle_proforma_tableros as dpt','t.idTableros','=','dpt.idTableros')
        ->where('dpt.idProforma','=',$id)
        ->get(['t.nombre_tablero','estadoT','t.cantidadTab']);

        $proforma=DB::table('Proforma as p')
        ->join('Detalle_proforma_tableros as dePT','p.idProforma','=','dePT.idProforma')
        ->join('Producto as pd','pd.idProducto','=','dePT.idProducto')
       ->join('Cliente_Proveedor as clp','clp.idCliente','=','p.idCliente')
        ->join('Tableros as t','t.idTableros','=','dePT.idTableros')
        
        ->select('p.idProforma','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.totalxtab','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado',DB::raw('CONCAT(pd.nombre_producto," | ",marca_producto," | ",descripcion_producto) as producto'), 'clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','t.idTableros','t.nombre_tablero','t.estadoT','dePT.idDetalle_tableros','dePT.idProducto','dePT.idProforma','dePT.idTableros','dePT.cantidad','dePT.precio_venta','dePT.texto_precio_venta','dePT.descuento','dePT.descripcionDP','dePT.estadoDP','dePT.simboloDPT','dePT.cambioDPT','pd.codigo_producto','t.cantidadTab','pd.codigo_pedido','p.descuento as de')
        ->where('p.idProforma','=',$id)
        ->get();
    //dd($td,$tablero,$proforma);
        $pdf=PDF::loadView('proforma/tablero/pdf2',['td'=>$td,'proforma'=>$proforma,"tablero"=>$tablero]);
        return $pdf->stream('proforma.pdf2');

    }

        public function pdf3($id){

       $td=DB::table('Proforma as p')
        ->join('Cliente_Proveedor as clp','clp.idCliente','=','p.idCliente')
        ->join('users as u','u.id','=','p.idEmpleado')   
        ->join('Cliente_Representante as cr','cr.idCR','=','p.cliente_empleado')  
        ->select('u.id',DB::raw('CONCAT(u.name," ",u.paterno," ",u.materno)as nameE'),'clp.correo','p.idProforma','p.idCliente','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.totalxtab','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.proyecto','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado',DB::raw('CONCAT(clp.Direccion,"  ",clp.Departamento,"-",clp.Distrito) as direccion'),'clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','cr.nombre_RE','cr.telefonoRE','cr.CelularRE','u.telefonoU','u.celularU',DB::raw('DATE_ADD(p.fecha_hora, INTERVAL -2 HOUR) as fh'))
        ->where('p.idProforma','=',$id)
        ->first();

        $tablero=DB::table('Tableros as t')
        ->distinct()
        ->join('Detalle_proforma_tableros as dpt','t.idTableros','=','dpt.idTableros')
        ->where('dpt.idProforma','=',$id)
        ->get(['t.nombre_tablero','estadoT','t.cantidadTab']);

        $proforma=DB::table('Proforma as p')
        ->join('Detalle_proforma_tableros as dePT','p.idProforma','=','dePT.idProforma')
        ->join('Producto as pd','pd.idProducto','=','dePT.idProducto')
       ->join('Cliente_Proveedor as clp','clp.idCliente','=','p.idCliente')
        ->join('Tableros as t','t.idTableros','=','dePT.idTableros')
        
        ->select('p.idProforma','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.totalxtab','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado',DB::raw('CONCAT( pd.nombre_producto," | ",marca_producto," | ",descripcion_producto) as producto'), 'clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','t.idTableros','t.nombre_tablero','t.estadoT','dePT.idDetalle_tableros','dePT.idProducto','dePT.idProforma','dePT.idTableros','dePT.cantidad','dePT.precio_venta','dePT.texto_precio_venta','dePT.descuento','dePT.descripcionDP','dePT.estadoDP','dePT.simboloDPT','dePT.cambioDPT','pd.codigo_producto','t.cantidadTab','pd.codigo_pedido','p.descuento as de')
        ->where('p.idProforma','=',$id)
        ->get();

        $pdf=PDF::loadView('proforma/tablero/pdf3',['td'=>$td,'proforma'=>$proforma,"tablero"=>$tablero]);
        return $pdf->stream('proforma.pdf3');
    }
    public function pdf4($id){

        $td=DB::table('Proforma as p')
        ->join('Cliente_Proveedor as clp','clp.idCliente','=','p.idCliente')
        ->join('users as u','u.id','=','p.idEmpleado')   
        ->join('Cliente_Representante as cr','cr.idCR','=','p.cliente_empleado')  
        ->select('u.id',DB::raw('CONCAT(u.name," ",u.paterno," ",u.materno)as nameE'),'clp.correo','p.idProforma','p.idCliente','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.igv','p.subtotal','p.precio_total','p.totalxtab','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.proyecto','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado',DB::raw('CONCAT(clp.Direccion,"  ",clp.Departamento,"-",clp.Distrito) as direccion'),'clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','cr.nombre_RE','cr.telefonoRE','cr.CelularRE','u.telefonoU','u.celularU','p.totalxtab',DB::raw('DATE_ADD(p.fecha_hora, INTERVAL -2 HOUR) as fh'))
        ->where('p.idProforma','=',$id)
        ->first();


        $proforma=DB::table('Proforma as p')
        ->join('Detalle_proforma_tableros as dePT','p.idProforma','=','dePT.idProforma')
        ->join('Producto as pd','pd.idProducto','=','dePT.idProducto')
        ->select('p.idProforma','p.idEmpleado','p.serie_proforma','dePT.idProducto','dePT.idProforma','dePT.cantidad','dePT.cantidad','dePT.descripcionDP','pd.codigo_pedido','pd.marca_producto','pd.codigo_producto','pd.nombre_producto','pd.descripcion_producto',DB::raw('sum(case dePT.idProducto when dePT.idProducto then cantidad end) as total'))
        ->where('p.idProforma','=',$id)
        ->where('dePT.estadoDP','=','1')
        ->groupBy('p.idProforma','dePT.idProducto','p.idEmpleado','p.serie_proforma','dePT.idProducto','dePT.idProforma','dePT.cantidad','dePT.cantidad','dePT.descripcionDP','pd.codigo_pedido','pd.codigo_producto','pd.nombre_producto','pd.descripcion_producto','pd.marca_producto')
        ->get();

        $pdf=PDF::loadView('proforma/tablero/pdf4',['td'=>$td,'proforma'=>$proforma]);
        return $pdf->stream('proforma.pdf4');
    }
    public function edit($id)
    {
        //
        $productos=DB::table('Producto as po')
        ->join('Familia as fa','po.idFamilia','=','fa.idFamilia')
        ->select('po.idProducto','fa.idFamilia','fa.nombre_familia','fa.descuento_familia','po.serie_producto','po.codigo_pedido','po.codigo_producto','po.nombre_producto','po.marca_producto','po.stock','po.descripcion_producto','po.precio_unitario','po.foto','po.categoria_producto','po.fecha_sistema',DB::raw('CONCAT(po.codigo_producto," | ",po.nombre_producto," | ",po.marca_producto," | ",po.descripcion_producto) as producto2'),'po.tipo_producto')
        ->where('po.estado','=','activo')
        ->where('po.tipo_producto','!=','accesorios')
        ->get();

        $monedas=DB::table('Tipo_moneda')
        ->where('estado','=','activo')
        ->get();

        $marcas=DB::table('Marca')
        ->where('nombre_proveedor','!=','FIEMEC BANDEJAS')
        ->where('estadoMa','=',1)
        ->get();


        $clientes=DB::table('Cliente_Proveedor as cp')
        ->select('cp.idCliente',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'cp.nro_documento')
        ->where('tipo_persona','=','Cliente persona')
        ->orwhere('tipo_persona','=','Cliente Empresa')
        ->get();

        $tablero=DB::table('Tableros as t')
        ->distinct()
        ->join('Detalle_proforma_tableros as dpt','t.idTableros','=','dpt.idTableros')
        ->where('dpt.idProforma','=',$id)
        ->where('t.estadoT','=','1')
        ->get(['t.nombre_tablero','estadoT','t.cantidadTab','t.idTableros']);


        $proforma=DB::table('Proforma as p')
        ->join('Detalle_proforma_tableros as dePT','p.idProforma','=','dePT.idProforma')
        ->join('Producto as pd','pd.idProducto','=','dePT.idProducto')
        ->join('Cliente_Proveedor as clp','clp.idCliente','=','p.idCliente')
        ->join('Tableros as t','t.idTableros','=','dePT.idTableros')
        ->join('Cliente_Representante as cre','p.cliente_empleado','=','cre.idCR')
        ->select('cre.nombre_RE','p.idProforma','p.idCliente','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.proyecto','p.estado','pd.nombre_producto','clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','t.idTableros as idTAB','t.nombre_tablero','t.cantidadTab','t.estadoT','dePT.idDetalle_tableros','dePT.idProducto','dePT.idProforma','dePT.idTableros','dePT.cantidad','dePT.precio_venta','dePT.texto_precio_venta','dePT.descuento','dePT.descripcionDP','dePT.estadoDP',DB::raw('CONCAT(pd.codigo_pedido," | ",pd.codigo_producto," | ",pd.nombre_producto," | ",pd.marca_producto," | ",pd.descripcion_producto) as producto2'),'pd.tipo_producto','p.descuento as des')
        ->where('p.idProforma','=',$id)
        ->where('dePT.estadoDP','=','1')
        ->get();
        // 'dePT.idDetalle_tableros','dePT.idProducto','dePT.idProforma','dePT.idTableros','dePT.cantidad','dePT.precio_venta','dePT.texto_precio_venta','dePT.descuento','dePT.descripcionDP','dePT.estadoDP'
        // return view("proforma.proforma.create",["productos"=>$productos,"clientes"=>$clientes,"monedas"=>$monedas]);
        return view("proforma.tablero.edit",["productos"=>$productos,'tablero'=>$tablero,"marcas"=>$marcas,"clientes"=>$clientes,"monedas"=>$monedas,'proforma'=>$proforma]);
    }   
    public function update(Request $request)
    {
        //
        try{
            
            $idProforma;
            $idclie;
            $valorv;
            $nombre;
            $tota;
            $tableros;
            $simbolo;
            $valorcambio;
            $forma_de;
            $plazo_oferta;
            $observacion;
            $descuento;
            $nombproyecto;
            foreach ($request->datos as $dato) {
                // $idclie=$dato['idcliente'];
                $valorv=$dato['valorVenta'];
                $tota=$dato['total'];
                $idProforma=$dato['idProforma'];
                $forma_de=$dato['forma_de'];
                $plazo_oferta=$dato['plazo_oferta'];
                $observacion=$dato['obspro'];
                $descuento=$dato['desc'];
                $simbolo=$dato['simbolo'];
                $valorcambio=$dato['valorTipoCambio'];
                $nombproyecto=$dato['nombproyecto'];
            }   
            
            Proforma::where('idProforma',$idProforma)
                ->update([
                    // 'idCliente'=>$idclie,
                // 'idEmpleado'=>$request->,           
                // 'idTipo_moneda'=>$idTipoCam,
                'serie_proforma'=>'PU365122018',
                // 'fecha_hora'=>$mytime->toDateTimeString(),
                // 'igv'=>'18',
                'subtotal'=>$valorv,
                'precio_total'=>$tota,
                // 'tipocambio'=>$valorcambio,
                // 'precio_totalC'=>$totaldolares,
                // 'descripcion_proforma'=>$observacion, //preguntar
                'tipo_proforma'=>'Tablero',
                // 'caracteristicas_proforma'=>$request->, preguntar
                'forma_de'=>$forma_de,
                'plazo_oferta'=>$plazo_oferta,
                'observacion_proforma'=>$observacion,
                'descuento'=>$descuento,
                'proyecto'=>$nombproyecto,
                'estado'=>1
                ]);

                $idTablero;


           foreach ($request->tableros as $tablero) {
                $nombre=$tablero['nombre'];
                $est=$tablero['estado'];
                $cantxT=$tablero['cantt'];

                if($est==2){
                    $idTablero=DB::table('Tableros')->insertGetId(
                     ['nombre_tablero'=>$nombre,
                      'estadoT'=>1,
                      'cantidadTab'=>$cantxT]);

                }else if($est==0 || $est==1){

                    $idTablero=$tablero['idtablero'];

                    $table=Tableros::find($idTablero);
                    $table->cantidadTab=$cantxT;
                    $table->estadoT=$est;
                    $table->update();


                }
                
                foreach($request->filas as $fila){

                    if($fila['nomTablero']==$tablero['nombre']){
                        if($fila['estado']==2){

                            $detalleProforma=new ProformaDetalleTableros;
                            // $detalleProforma->idDetalle_proforma=$fila[''];  
                            $detalleProforma->idProducto=$fila['idProducto'];
                            $detalleProforma->idProforma=$idProforma;
                            $detalleProforma->idTableros=$idTablero;
                            $detalleProforma->cantidad=$fila['cantidadP'];
                            $detalleProforma->precio_venta=$fila['prec_uniP']; 
                            $detalleProforma->estadoDP=1; 
                            $detalleProforma->simboloDPT=$simbolo;
                            $detalleProforma->cambioDPT=$valorcambio;   
                            $detalleProforma->descuento=$fila['descuentoP'];    
                            $detalleProforma->descripcionDP=$fila['descripcionP'];
                            $detalleProforma->save();
                        }else if($fila['estado']==1 || $fila['estado']==0){
                            DetalleProformaTableros::where('idProforma',$idProforma)
                            ->where('idDetalle_tableros',$fila['idDetalleTablero'])
                            ->update([
                                // $detalleProforma->idDetalle_proforma=$fila[''];  
                                'idProducto'=>$fila['idProducto'],
                                // 'idProforma'=>$idProforma,
                                // 'idTableros'=>$idTablero,
                                'cantidad'=>$fila['cantidadP'],
                                'precio_venta'=>$fila['prec_uniP'],
                                'simboloDPT'=>$simbolo, 
                                'cambioDPT'=>$valorcambio,   
                                'descuento'=>$fila['descuentoP'],
                                'descripcionDP'=>$fila['descripcionP'],
                                'estadoDP'=>$fila['estado']
                            ]);

                        }
                        
                    }
                }
            }
            return ['data' =>'tableros','veri'=>true];
        }catch(Exception $e){
            return ['data' =>$e,'veri'=>false];
        }
        
    }
        public function destroy($id)
    {
        $producto=Proforma::findOrFail($id);
        $producto->estado=0;
        $producto->update();
        return Redirect::to('tableros');
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
    public function familia(Request $request)
    {
        $idMarca=$request->get('marca');
        $marca=DB::table('Familia')
        ->where('idMarca','=',$idMarca)
        ->where('estado','=','1')
        ->get();

        $producto=DB::table('Producto as p')
        ->select('p.idProducto','p.precio_unitario','p.idProducto','p.codigo_producto','p.nombre_producto','p.marca_producto','p.descripcion_producto','p.tipo_producto','p.codigo_pedido')
        ->where('p.idMarca','=',$idMarca)
        ->where('p.estado','=','activo')
        ->orderby('p.idProducto')
        ->get();
 
        return ['producto' =>$producto,'marca' =>$marca,'veri'=>true];
    }
    public function producto(Request $request)
    {
        $idFamilia=$request->get('familia');
        $familia=DB::table('Producto as p')
        ->select('p.idProducto','p.precio_unitario','p.idProducto','p.codigo_producto','p.nombre_producto','p.marca_producto','p.descripcion_producto','p.tipo_producto','p.codigo_pedido')
        ->where('idFamilia','=',$idFamilia)

        ->get();
        // dd($request);
        return ['familia' =>$familia,'veri'=>true];
    }

    public function preciodescuento(Request $request)
    {
        $idProducto=$request->get('producto');
        $producto=DB::table('Producto as p')
        ->join('Familia as f','p.idFamilia','=','f.idFamilia')
        ->select('p.idProducto','f.descuento_familia','p.precio_unitario','p.tipo_producto',DB::raw('CONCAT(p.codigo_pedido," | ",p.codigo_producto," | ",p.nombre_producto," | ",p.marca_producto," | ",p.descripcion_producto) as producto2'),'p.codigo_pedido')
        ->where('idProducto','=',$idProducto)

        ->get();
        // dd($request);
        return ['producto' =>$producto,'veri'=>true];
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
}

