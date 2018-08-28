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
    ->select('p.idProforma','p.fecha_hora','cp.nombres_Rs',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),'p.serie_proforma','p.precio_total')
    ->where('p.idProforma','LIKE','%'.$query.'%')
    ->where('p.tipo_proforma','=','servicio')
    ->where('p.estado','=','activo')
    ->orderBy('p.idProforma','desc')
    ->paginate(7);           
            return view('proforma.servicio.index',["servicios"=>$servicios,"searchText"=>$query]);
        }
    }

public function create()
{
 $productos=DB::table('Producto')
 ->where('categoria_producto','=','servicio')
 ->get();

 $clientes=DB::table('Cliente_Proveedor as cp')
 ->select('cp.idCliente',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),DB::raw('CONCAT(cp.Direccion," ",cp.Departamento,"-",cp.Distrito) as direccion'),'cp.nro_documento')
->where('tipo_persona','=','Cliente persona')
->orwhere('tipo_persona','=','Cliente Empresa')
 ->get();

 //dd($clientes);
 return view("proforma.servicio.create",["productos"=>$productos,"clientes"=>$clientes]);

 


}

public function store(Request $request)
{

    //dd($request);
   /* try {*/

    $splitid = explode('_', $request->get('idCliente'), 2);
    $idclien= $splitid[0];

        DB::beginTransaction();
       
        $Servicios=new Proforma;
        $Servicios->idCliente=$idclien;
        $Servicios->idEmpleado='2';
        $Servicios->serie_proforma='SV365122018';
        $mytime = Carbon::now('America/Lima');
        $Servicios->fecha_hora=$mytime->toDateTimeString();
        $Servicios->igv='18';
        $Servicios->precio_total=$request->get('precio_total');
        $Servicios->forma_de=$request->get('forma_de');
        $Servicios->tipo_proforma='servicio';
        $Servicios->observacion_condicion=$request->get('observacion_condicion');
        $Servicios->plazo_oferta=$request->get('plazo_oferta');
        $Servicios->plaza_fabricacion=$request->get('plaza_fabricacion');
        $Servicios->tipo_proforma='servicio';
        $Servicios->estado='activo';
        
       $Servicios->save();
        
       
        $idProducto=$request->get('idProducto');
        $precio_venta=$request->get('precio_venta');
        $descripcionDP=$request->get('descripcionDP');
        $cont=0;

        
        
        while ($cont<count($precio_venta)) 
        {
            $detalle = new DetalleProforma();
            $detalle->idProducto=$idProducto[$cont];
            $detalle->idProforma=$Servicios->idProforma;
            $detalle->precio_venta=$precio_venta[$cont];
            $detalle->descripcionDP=$descripcionDP[$cont];
           $detalle->save();
            $cont=$cont+1; 
                     
        }
//dd($Servicios,$detalle);
         DB::Commit();
   
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
    ->select('pro.nombre_producto as producto','dpr.cantidad','dpr.descuento','dpr.precio_venta','dpr.observacion_detalleP','dpr.descripcionDP')
    ->where('dpr.idProforma','=',$id)
    ->get();
return view("proforma.servicio.show",["servicio"=>$servicio,"detalles"=>$detalles]);
   }

   public function destroy($id)
    {
        $producto=Proforma::findOrFail($id);
        $producto->estado='anulada';
        $producto->update();
        return Redirect::to('proforma/servicio');


    }

}




