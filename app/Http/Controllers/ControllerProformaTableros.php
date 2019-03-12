<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use Producto;
use SistemaFiemec\Proforma;
use Tableros;
use SistemaFiemec\DetalleProformaTableros;
use SistemaFiemec\DetalleProforma;
use SistemaFiemec\ProformaDetalleTableros;
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
    ->select('p.idProforma','p.fecha_hora','cp.idCliente','cp.nombres_Rs','cp.paterno','cp.materno','p.serie_proforma','p.igv','p.precio_total')
    ->where('p.idProforma','LIKE','%'.$query.'%')
    ->where('tipo_proforma','=','tablero')
    ->where('p.estado','=',1)
    ->orderBy('p.idProforma','desc')
     
        ->paginate(7);           
            return view('proforma.tablero.index',["proformas"=>$proformas,"searchText"=>$query]);
        }
    }
    public function create()
    {
        
        $productos=DB::table('Producto as po')
        ->join('Familia as fa','po.idFamilia','=','fa.idFamilia')
        ->select('po.idProducto','fa.idFamilia','fa.nombre_familia','fa.descuento_familia','po.serie_producto',
        'po.codigo_pedido','po.codigo_producto','po.nombre_producto','po.marca_producto','po.stock',
        'po.descripcion_producto','po.precio_unitario','po.foto','po.categoria_producto','po.fecha_sistema',DB::raw('CONCAT(po.codigo_producto," | ",po.nombre_producto," | ",po.marca_producto," | ",po.descripcion_producto) as producto2'))
        ->where('po.estado','=','activo')
        ->get();
        
        $monedas=DB::table('Tipo_moneda')
        ->where('estado','=',1)
        ->get();

        $representante=DB::table('Cliente_Representante')
         ->where('estadoCE','=',1)
          ->get();
          
        $clientes=DB::table('Cliente_Proveedor as cp')
         ->select('cp.idCliente','cp.idCliente','cp.nombres_Rs','cp.paterno','cp.materno',DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'cp.nro_documento')
        ->where('estado','=',1)
        ->get();
        return view('proforma.tablero.create',["representante"=>$representante,"productos"=>$productos,"clientes"=>$clientes,"monedas"=>$monedas]);
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
            $simbolo=$dato['simbolo'];
            $iduser=$dato['userid'];
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

        ->select('u.id','u.name','u.paterno as up','u.materno as um','clp.correo','p.idProforma','p.idCliente','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado',DB::raw('CONCAT(clp.Direccion,"  ",clp.Departamento,"-",clp.Distrito) as direccion'),'clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','u.telefonoU','u.celularU')
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
        
        ->select('p.idProforma','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado',DB::raw('CONCAT(pd.codigo_producto," ",pd.nombre_producto," | ",marca_producto," | ",descripcion_producto) as producto'),'clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','t.idTableros','t.nombre_tablero','t.estadoT','dePT.idDetalle_tableros','dePT.idProducto','dePT.idProforma','dePT.idTableros','dePT.cantidad','dePT.precio_venta','dePT.texto_precio_venta','dePT.descuento','dePT.descripcionDP','dePT.estadoDP','t.cantidadTab','p.totalxtab')
        ->where('p.idProforma','=',$id)
        ->get();

        // dd($tablero,$proforma,$p);

        return view("proforma.tablero.show",['td'=>$td,'proforma'=>$proforma,"tablero"=>$tablero]);
    }

    public function pdf($id){

        $td=DB::table('Proforma as p')
        ->join('Cliente_Proveedor as clp','clp.idCliente','=','p.idCliente')
        ->join('users as u','u.id','=','p.idEmpleado')   
        ->join('Cliente_Representante as cr','cr.idCR','=','p.cliente_empleado')  
        ->select('u.id',DB::raw('CONCAT(u.name," ",u.paterno," ",u.materno)as nameE'),'clp.correo','p.idProforma','p.idCliente','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.totalxtab','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado',DB::raw('CONCAT(clp.Direccion,"  ",clp.Departamento,"-",clp.Distrito) as direccion'),'clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','cr.nombre_RE','cr.telefonoRE','cr.CelularRE','u.telefonoU','u.celularU','p.totalxtab')
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
        
        ->select('p.idProforma','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.totalxtab','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado',DB::raw('CONCAT(pd.codigo_producto," ",pd.nombre_producto," | ",marca_producto," | ",descripcion_producto) as producto'), 'clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','t.idTableros','t.nombre_tablero','t.estadoT','dePT.idDetalle_tableros','dePT.idProducto','dePT.idProforma','dePT.idTableros','dePT.cantidad','dePT.precio_venta','dePT.texto_precio_venta','dePT.descuento','dePT.descripcionDP','dePT.estadoDP','dePT.simboloDPT','dePT.cambioDPT','pd.codigo_producto','t.cantidadTab')
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
        ->select('u.id',DB::raw('CONCAT(u.name," ",u.paterno," ",u.materno)as nameE'),'clp.correo','p.idProforma','p.idCliente','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.totalxtab','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado',DB::raw('CONCAT(clp.Direccion,"  ",clp.Departamento,"-",clp.Distrito) as direccion'),'clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','cr.nombre_RE','cr.telefonoRE','cr.CelularRE','u.telefonoU','u.celularU')
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
        
        ->select('p.idProforma','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.totalxtab','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado',DB::raw('CONCAT(pd.codigo_producto," ",pd.nombre_producto," | ",marca_producto," | ",descripcion_producto) as producto'), 'clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','t.idTableros','t.nombre_tablero','t.estadoT','dePT.idDetalle_tableros','dePT.idProducto','dePT.idProforma','dePT.idTableros','dePT.cantidad','dePT.precio_venta','dePT.texto_precio_venta','dePT.descuento','dePT.descripcionDP','dePT.estadoDP','dePT.simboloDPT','dePT.cambioDPT','pd.codigo_producto','t.cantidadTab')
        ->where('p.idProforma','=',$id)
        ->get();
    // dd($td,$tablero,$proforma);
        $pdf=PDF::loadView('proforma/tablero/pdf2',['td'=>$td,'proforma'=>$proforma,"tablero"=>$tablero]);
        return $pdf->stream('proforma.pdf2');

    }

        public function pdf3($id){

       $td=DB::table('Proforma as p')
        ->join('Cliente_Proveedor as clp','clp.idCliente','=','p.idCliente')
        ->join('users as u','u.id','=','p.idEmpleado')   
        ->join('Cliente_Representante as cr','cr.idCR','=','p.cliente_empleado')  
        ->select('u.id',DB::raw('CONCAT(u.name," ",u.paterno," ",u.materno)as nameE'),'clp.correo','p.idProforma','p.idCliente','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.totalxtab','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado',DB::raw('CONCAT(clp.Direccion,"  ",clp.Departamento,"-",clp.Distrito) as direccion'),'clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','cr.nombre_RE','cr.telefonoRE','cr.CelularRE','u.telefonoU','u.celularU')
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
        
        ->select('p.idProforma','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.totalxtab','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado',DB::raw('CONCAT(pd.codigo_producto," ",pd.nombre_producto," | ",marca_producto," | ",descripcion_producto) as producto'), 'clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','t.idTableros','t.nombre_tablero','t.estadoT','dePT.idDetalle_tableros','dePT.idProducto','dePT.idProforma','dePT.idTableros','dePT.cantidad','dePT.precio_venta','dePT.texto_precio_venta','dePT.descuento','dePT.descripcionDP','dePT.estadoDP','dePT.simboloDPT','dePT.cambioDPT','pd.codigo_producto','t.cantidadTab')
        ->where('p.idProforma','=',$id)
        ->get();

        $pdf=PDF::loadView('proforma/tablero/pdf3',['td'=>$td,'proforma'=>$proforma,"tablero"=>$tablero]);
        return $pdf->stream('proforma.pdf3');
    }
    public function edit($id)
    {
        //
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
        ->join('Cliente_Representante as cre','p.cliente_empleado','=','cre.idCR')
        ->select('cre.nombre_RE','p.idProforma','p.idCliente','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado','pd.nombre_producto','clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion','t.idTableros','t.nombre_tablero','t.cantidadTab','t.estadoT','dePT.idDetalle_tableros','dePT.idProducto','dePT.idProforma','dePT.idTableros','dePT.cantidad','dePT.precio_venta','dePT.texto_precio_venta','dePT.descuento','dePT.descripcionDP','dePT.estadoDP')
        ->where('p.idProforma','=',$id)
        ->get();
        // 'dePT.idDetalle_tableros','dePT.idProducto','dePT.idProforma','dePT.idTableros','dePT.cantidad','dePT.precio_venta','dePT.texto_precio_venta','dePT.descuento','dePT.descripcionDP','dePT.estadoDP'
        // return view("proforma.proforma.create",["productos"=>$productos,"clientes"=>$clientes,"monedas"=>$monedas]);
        return view("proforma.tablero.edit",["productos"=>$productos,'tablero'=>$tablero,"clientes"=>$clientes,"monedas"=>$monedas,'proforma'=>$proforma]);
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
            $idTipoCam;
            $valorcambio;
            foreach ($request->datos as $dato) {
                // $idclie=$dato['idcliente'];
                $valorv=$dato['valorVenta'];
                $tota=$dato['total'];
                // $idTipoCam=$dato['idTipoCambio'];
                // $valorcambio=$dato['valorTipoCambio'];
                $idProforma=$dato['idProforma'];
            }   
            // $idProforma=DB::table('Proforma')->insertGetId(
            //     [
            //         // 'idCliente'=>$idclie,        
            //         // 'idTipo_moneda'=>$idTipoCam,
            //         // 'serie_proforma'=>'PU365122019',
            //         'igv'=>'18',
            //         'subtotal'=>$valorv,
            //         'precio_total'=>$tota,
            //         'tipocambio'=>$valorcambio,
            //         'tipo_proforma'=>'Tablero',
            //         'estado'=>1
            //     ]
            // );
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
                // 'forma_de'=>$forma,
                // 'plaza_fabricacion'=>$request->,
                // 'plazo_oferta'=>$plazo,
                // 'garantia'=>$request->,
                // 'observacion_condicion'=>$request->,
                // 'observacion_proforma'=>$observacion,
                'estado'=>1
                ]);
            foreach ($request->tableros as $tablero) {
                $nombre=$tablero['nombre'];
                $est=$tablero['estado'];
                $idTablero=DB::table('Tableros')->insertGetId(
                    ['nombre_tablero'=>$nombre,
                    'estadoT'=>$est,
                    ]
                );
                
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
                            // $detalleProforma->texto_precio_venta=$fila[''];  
                            // $detalleProforma->observacion_detalleP=$fila[''];    
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
                                // texto_precio_venta=>$fila['' 
                                // observacion_detalleP=>$fila[''   
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
}

