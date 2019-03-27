<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use SistemaFiemec\Http\Requests;
use SistemaFiemec\Proforma;

use SistemaFiemec\DetalleProforma;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use SistemaFiemec\Http\Requests\RequestFormProforma;

//use SistemaFiemec\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

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
    ->where('tipo_proforma','=','unitaria')
    ->where('p.idEmpleado','=',$id)
    ->orderBy('p.idProforma','desc')
     
    	->paginate(7);           
            return view('proforma.proforma.index',["proformas"=>$proformas,"searchText"=>$query]);
        }
    }

public function create()
{
    $productos=DB::table('Producto as po')
    ->join('Familia as fa','po.idFamilia','=','fa.idFamilia')
    ->join('Marca as ma','ma.idMarca','=','po.idMarca')
    ->select('po.idProducto','fa.idFamilia','fa.nombre_familia','fa.descuento_familia','po.serie_producto','po.codigo_pedido','po.codigo_producto','po.stock','po.precio_unitario','po.foto','po.categoria_producto','po.fecha_sistema',DB::raw('CONCAT(po.codigo_producto," | ",po.nombre_producto," | ",ma.nombre_proveedor," | ",descripcion_producto) as productos'),'po.tipo_producto','po.codigo_producto','po.nombre_producto','ma.nombre_proveedor','descripcion_producto')
    ->where('po.estado','=','activo')
    ->get();

    $monedas=DB::table('Tipo_moneda')
    ->where('estado','=',1)
    ->get();

    $marcas=DB::table('Marca')
    ->where('nombre_proveedor','!=','FIEMEC BANDEJAS')
        ->where('estadoMa','=',1)
        ->get();

     $representante=DB::table('Cliente_Representante') 
    ->where('estadoCE','=',1)
    ->get();

    $clientes=DB::table('Cliente_Proveedor as cp')
    ->join('users as u','u.id','=','cp.idU')
    ->select('cp.idCliente','cp.nombres_Rs','cp.paterno','cp.materno',DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'cp.nro_documento','cp.idU',DB::raw('CONCAT(u.name," ",u.paterno," ",u.materno) as user'))
    ->where('estado','=',1)
    ->get();

    $json=json_encode($clientes);

 return view("proforma.proforma.create",["representante"=>$representante,"productos"=>$productos,"marcas"=>$marcas,"clientes"=>$clientes,"monedas"=>$monedas,'json'=>$json]);
}

public function store(Request $request)
{
    // dd($request);
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
        $iduser;
           
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
            $iduser=$dato['userid'];
        }
        $idProforma=DB::table('Proforma')->insertGetId(
            ['idCliente'=>$idclie,
            'idEmpleado'=>$iduser,           
            'idTipo_moneda'=>$idTipoCam,
            'serie_proforma'=>'PU365122018',
            'igv'=>'18',
            'subtotal'=>$valorv,
            'precio_total'=>$tota,
            'tipocambio'=>$valorcambio,
            'simboloP'=>$simbolo,
            'precio_totalC'=>$totaldolares,
            'tipo_proforma'=>'unitaria',
            'forma_de'=>$forma,
            'plazo_oferta'=>$plazo,
            'cliente_empleado'=>$clienteemp,
            'observacion_proforma'=>$observacion,
            'estado'=>1
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
            $detalleProforma->cambioDP=$valorcambio;	
            $detalleProforma->simboloDP=$simbolo;	
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
    ->join('users as u','u.id','=','p.idEmpleado')
    ->select('p.idProforma','p.fecha_hora',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'cp.nro_documento as ndoc','cp.correo as mail','p.serie_proforma','p.igv','p.precio_total','p.forma_de','p.plazo_oferta','p.observacion_condicion','p.igv','p.precio_total','p.subtotal','p.precio_totalC','p.cliente_empleado','u.name','u.paterno','u.materno','u.telefonoU','u.celularU')
    ->where('p.idProforma','=',$id)
    ->first();

    $detalles=DB::table('Detalle_proforma as dpr')
    ->join('Producto as pro','dpr.idProducto','=','pro.idProducto')
    ->select('pro.nombre_producto as producto','dpr.cantidad','dpr.descuento','dpr.precio_venta','dpr.descripcionDP')
    ->where('dpr.idProforma','=',$id)
    ->where('dpr.estadoDP','=',1)
    ->get();

    return view("proforma.proforma.show",["proforma"=>$proforma,"detalles"=>$detalles]);
   

}

public function pdf($id){

   

    $proforma=DB::table('Proforma as p')
    ->join('Cliente_Proveedor as cp','cp.idCliente','=','p.idCliente')
    ->join('users as u','u.id','=','p.idEmpleado')
    ->join('Cliente_Representante as cr','cr.idCR','=','p.cliente_empleado')
    ->select('p.idEmpleado','p.idProforma','p.fecha_hora','cp.nombres_Rs','cp.paterno','cp.materno',DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'p.serie_proforma','p.igv','p.precio_total','p.forma_de','p.plazo_oferta','p.observacion_condicion','p.observacion_proforma','cp.correo as email','cp.nro_documento as ndoc','p.subtotal','p.cliente_empleado','u.name',DB::raw('CONCAT(u.name," ",u.paterno," ",u.materno)as nameE'),'cr.nombre_RE','cr.telefonoRE','cr.CelularRE','u.telefonoU','u.celularU')
    ->where('p.idProforma','=',$id)

    ->first();

    $detalles=DB::table('Detalle_proforma as dpr')
    ->join('Producto as pro','dpr.idProducto','=','pro.idProducto')
    ->join('Marca as m','m.idMarca','=','pro.idMarca')
    ->select('pro.nombre_producto','m.nombre_proveedor','pro.descripcion_producto','pro.codigo_producto','dpr.cantidad','dpr.descuento','dpr.precio_venta','dpr.descripcionDP')
    ->where('dpr.idProforma','=',$id)
    ->where('dpr.estadoDP','=',1)
    ->get();

    $pdf=PDF::loadView('proforma/proforma/pdf',['proforma'=>$proforma,"detalles"=>$detalles]);
    return $pdf->stream('proforma.pdf');
    
    


}
    public function pdf2($id){

        $proforma=DB::table('Proforma as p')
        ->join('Cliente_Proveedor as cp','cp.idCliente','=','p.idCliente') 
        ->join('users as u','u.id','=','p.idEmpleado')
        ->join('Cliente_Representante as cr','cr.idCR','=','p.cliente_empleado')      
        ->select('p.idProforma','p.fecha_hora','cp.nombres_Rs','cp.paterno','cp.materno',DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'p.serie_proforma','p.igv','p.precio_total','p.forma_de','p.plazo_oferta','p.observacion_condicion','cp.correo as email','cp.nro_documento as ndoc','p.tipocambio','p.simboloP','p.subtotal',DB::raw('CONCAT(u.name," ",u.paterno," ",u.materno)as nameE'),'p.cliente_empleado','cr.nombre_RE')
        ->where('p.idProforma','=',$id)
        ->first();

        $detalles=DB::table('Detalle_proforma as dpr')
        ->join('Producto as pro','dpr.idProducto','=','pro.idProducto')
        ->join('Proforma as pr','pr.idProforma','=','dpr.idProforma')
        ->select(DB::raw('CONCAT(pro.nombre_producto,"  ",pro.marca_producto," | ",pro.descripcion_producto) as producto'),'pro.codigo_producto','dpr.cantidad','dpr.descuento','dpr.precio_venta','dpr.descripcionDP','dpr.simboloDP','dpr.cambioDP')
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
        ->select('po.idProducto','fa.idFamilia','fa.nombre_familia','fa.descuento_familia','po.serie_producto','po.codigo_pedido','po.codigo_producto','po.nombre_producto','po.marca_producto','po.stock','po.descripcion_producto','po.precio_unitario','po.foto','po.categoria_producto','po.fecha_sistema','po.tipo_producto')
        ->where('po.estado','=','activo')
        ->get();

        $marcas=DB::table('Marca')
        ->where('nombre_proveedor','!=','FIEMEC BANDEJAS')
        ->where('estadoMa','=',1)
        ->get();


        $proforma=DB::table('Proforma as p')
        ->join('Detalle_proforma as deP','p.idProforma','=','deP.idProforma')
        ->join('Producto as pd','pd.idProducto','=','deP.idProducto')
        ->join('Cliente_Proveedor as clp','clp.idCliente','=','p.idCliente')
        ->join('Cliente_Representante as cr','cr.idCR','=','p.cliente_empleado') 
        ->select('p.idProforma','p.idCliente','p.idEmpleado','p.idTipo_moneda','p.cliente_empleado','p.serie_proforma','p.fecha_hora','p.igv','p.subtotal','p.precio_total','p.tipocambio','p.simboloP','p.precio_totalC','p.descripcion_proforma','p.tipo_proforma','p.caracteristicas_proforma','p.forma_de','p.plaza_fabricacion','p.plazo_oferta','p.garantia','p.observacion_condicion','p.observacion_proforma','p.estado','deP.idDetalle_proforma','deP.idProducto','deP.idProforma','deP.cantidad','deP.precio_venta','deP.texto_precio_venta','deP.cambioDP','deP.estadoDP','pd.codigo_producto','deP.descuento','deP.descripcionDP','pd.nombre_producto','clp.nombres_Rs','clp.paterno','clp.materno','clp.nro_documento','clp.Direccion',DB::raw('CONCAT(pd.codigo_pedido," | ",pd.codigo_producto," | ",pd.nombre_producto," | ",pd.marca_producto," | ",pd.descripcion_producto) as producto2'),'cr.nombre_RE','cr.telefonoRE','cr.CelularRE')
        ->where('deP.idProforma','=',$id)
        ->where('deP.estadoDP','=',1)
        ->get();
    
        // return view("proforma.proforma.create",["productos"=>$productos,"clientes"=>$clientes,"monedas"=>$monedas]);
        return view("proforma.proforma.edit",["productos"=>$productos,'proforma'=>$proforma,'marcas'=>$marcas]);


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
            $simbolo;
            $valorcambio;
            $totaldolares;
            $forma;
            $plazo;
            $observacion;
            $idProforma;
               
            foreach ($request->datos as $dato) {
                $idProforma=$dato['idProforma'];
                $valorv=$dato['valorVenta'];
                $tota=$dato['total'];
                $simbolo=$dato['simbolo'];
                $valorcambio=$dato['valorcambio'];
                $nomTablero=$dato['nomTablero'];
                $totaldolares=$dato['totaldolares'];
                $forma=$dato['forma'];
                $plazo=$dato['plazo'];
                $observacion=$dato['observacion'];
            }
                Proforma::where('idProforma',$idProforma)
                ->update([
                'serie_proforma'=>'PU365122018',
                'igv'=>'18',
                'simboloP'=>$simbolo,
                'tipocambio'=>$valorcambio,
                'subtotal'=>$valorv,
                'precio_total'=>$tota,
                'precio_totalC'=>$totaldolares,
                'tipo_proforma'=>'unitaria',
                'forma_de'=>$forma,
                'plazo_oferta'=>$plazo,
                'observacion_proforma'=>$observacion,
                'estado'=>1
                ]);
            foreach($request->filas as $fila){
                if ($fila['estado']==1 || $fila['estado']==0) {
                    DetalleProforma::where('idProforma',$idProforma)
                    ->where('idDetalle_proforma',$fila['idDetalleProforma'])
                    ->update([
                    'idProducto'=>$fila['idProducto'],
                    'cantidad'=>$fila['cantidadP'],
                    'precio_venta'=>$fila['prec_uniP'],
                    'descuento'=>$fila['descuentoP'],
                    'descripcionDP'=>$fila['descripcionP'],
                    'estadoDP'=>$fila['estado']
                    ]);
                }else if($fila['estado']==2){
                    $detalleProforma=new DetalleProforma;
                    $detalleProforma->idProducto=$fila['idProducto'];
                    $detalleProforma->idProforma=$idProforma;
                    $detalleProforma->cantidad=$fila['cantidadP'];
                    $detalleProforma->precio_venta=$fila['prec_uniP'];	
                    $detalleProforma->descuento=$fila['descuentoP'];	
                    $detalleProforma->descripcionDP=$fila['descripcionP'];
                    $detalleProforma->cambioDP=$valorcambio;
                    $detalleProforma->simboloDP=$simbolo;
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
        $producto->estado=0;
        $producto->update();
        return Redirect::to('proformas');
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
