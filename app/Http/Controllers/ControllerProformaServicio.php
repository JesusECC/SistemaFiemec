<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use SistemaFiemec\Http\Requests;
use SistemaFiemec\Proforma;
use SistemaFiemec\DetalleProforma;
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
    ->join('Empleado as e','p.idEmpleado','=','e.idEmpleado')
    ->join('Detalle_proforma as dp','p.idProforma','=','dp.idProforma')
    ->select('p.idProforma','p.fecha_hora','cp.nombres_Rs','e.nombres','e.materno','e.paterno','p.serie_proforma','p.igv','p.precio_total','dp.descuento','dp.cantidad')

    ->where('p.idProforma','LIKE','%'.$query.'%')
    ->where('p.tipo_proforma','=','servicio')
    ->orderBy('p.idProforma','desc')
     
    	->paginate(7);           
            return view('proforma.servicio.index',["servicios"=>$servicios,"searchText"=>$query]);
        }
    }

public function create()
{

 $clientes=DB::table('Cliente_Proveedor as cp')
 ->select('cp.idCliente',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),DB::raw('CONCAT(cp.Direccion," ",cp.Departamento,"-",cp.Distrito) as direccion'),'cp.nro_documento')
->where('tipo_persona','=','Cliente persona')
->orwhere('tipo_persona','=','Cliente Empresa')
 ->get();
 //dd($clientes);
 return view("proforma.servicio.create",["clientes"=>$clientes]);
}

public function store(Request $request)
{

   // dd($request);
   /* try {*/

    $splitid = explode('_', $request->get('idCliente'), 2);
    $idclien= $splitid[0];

        DB::beginTransaction();
       
        $Servicios=new Proforma;
        $Servicios->idCliente=$idclien;
        $Servicios->serie_proforma='SV365122018';
        $mytime = Carbon::now('America/Lima');
        $Servicios->fecha_hora=$mytime->toDateTimeString();
        $Servicios->igv='18';
        $Servicios->subtotal=$request->get('subtotal');
        $Servicios->precio_total=$request->get('precio_total');
        $Servicios->forma_de=$request->get('forma_de');
        $Servicios->observacion_condicion=$request->get('observacion_condicion');
        $Servicios->plazo_oferta=$request->get('plazo_oferta');
        $Servicios->plazo_fabricaion=$request->get('plazo_fabricacion');
        $Servicios->tipo_proforma='servicio';
        
        $Servicios->save();
        
       
        $descripcion=$request->get('descripcion');
        $precio_venta=$request->get('precio_venta');

        $cont=0;

        
        
        while ($cont<count($precio_venta)) 
        {
            $detalle = new DetalleProforma();
            $detalle->idProforma=$Proforma->idProforma;
            $detalle->descripcion=$descripcion[$cont];
            $detalle->precio_venta=$precio_venta[$cont];
            $detalle->save();
            $cont=$cont+1; 
            //dd($Proforma,$detalle);           
        }


         DB::Commit();
   /*     
    } catch (\Exception $e) {

        DB::rollback();
        
    }*/

         return Redirect::to('proforma/servicio');
     }

   public function show($id)
   {

    $servicio=DB::table('Proforma as p')
    ->join('Cliente_Proveedor as cp','p.idcliente','=','p.idcliente')
    ->join('Empleado as e','p.idEmpleado','=','e.idEmpleado')
    ->select('p.idProforma','p.fecha_hora',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'p.serie_proforma','p.igv','p.precio_total','p.num_proforma')
    ->where('p.idProforma','=',$id)
    ->first();

    $detalles=DB::table('Detalle_proforma as dpr')
    ->join('Producto as pro','dpr.idProducto','=','pro.idProducto')
    ->select('pro.nombre_producto as producto','dpr.cantidad','dpr.descuento','dpr.precio_venta','dpr.observacion_detalleP')
    ->where('dpr.idProforma','=',$id)
    ->get();
return view("proforma.servicio.show",["servicio"=>$servicio,"detalles"=>$detalles]);
   }

}
