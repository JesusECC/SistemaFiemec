<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use Producto;
use DB;
class ControllerProformaTableros extends Controller
{
    //
    public function index()
    {
        return view('proforma.tablero.index');
    }
    public function create()
    {
        $productos=DB::table('Producto')
        ->where('estado','=','activo')
        ->orderby('idProducto','asc')
        ->get();
        
        $clientes=DB::table('Cliente_Proveedor as cp')
         ->select('cp.idCliente',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'cp.nro_documento')
        ->where('tipo_persona','=','Cliente persona')
        ->orwhere('tipo_persona','=','Cliente Empresa')
        ->get();
        return view('proforma.tablero.create',["productos"=>$productos,"clientes"=>$clientes]);
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
    //     $Proforma=new Proforma;
    //     $Proforma->idCliente=$idclien;
    //    // $Proforma->idEmpleado='2';
    //     $Proforma->idTipo_moneda=1;
    //     $Proforma->serie_proforma='PU365122018';
    //     $mytime = Carbon::now('America/Lima');
    //     $Proforma->fecha_hora=$mytime->toDateTimeString();
    //     $Proforma->igv='18';
    //     $Proforma->subtotal=$request->get('subtotal');
    //     $Proforma->precio_total=$request->get('precio_total');
    //     $Proforma->precio_totalC=$request->get('precio_totalC');
    //     $Proforma->forma_de=$request->get('forma_de');
    //     $Proforma->observacion_condicion=$request->get('observacion_condicion');
    //     $Proforma->plazo_oferta=$request->get('plazo_oferta');
    //     $Proforma->garantia=$request->get('garantia');
    //     $Proforma->tipo_proforma='unitaria';
    //     $Proforma->estado='activo';       
    //     $Proforma->save();	
         
        // $idProforma=DB::table('Proforma')->insertGetId(
        //     ['idCliente'=>(int)$request->idcliente,
        //     // 'idEmpleado'=>$request->,           
        //     'idTipo_moneda'=>1,
        //     'serie_proforma'=>'PU365122018',
        //     'fecha_hora'=>$mytime->toDateTimeString(),
        //     'igv'=>'18',
        //     'subtotal'=>$request->valorVenta,
        //     'precio_total'=>$request->total,
        //     // 'tipocambio'=>$request->,
        //     // 'precio_totalC'=>$request->,
        //     // 'descripcion_proforma'=>$request->,
        //     'tipo_proforma'=>'Tablero',
        //     // 'caracteristicas_proforma'=>$request->,
        //     // 'forma_de'=>$request->,
        //     // 'plaza_fabricacion'=>$request->,
        //     // 'plazo_oferta'=>$request->,
        //     // 'garantia'=>$request->,
        //     // 'observacion_condicion'=>$request->,
        //     // 'observacion_proforma'=>$request->,
        //     'estado'=>'activo',
        //     ]
        // ); 
        $fil=$request->tableros;
        $filaob=json_decode( $fil);
        // $cant=count($request->tableros->nombre);


        return ['data' => array($filaob)];
    }
}
