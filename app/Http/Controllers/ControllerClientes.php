<?php

namespace SistemaFiemec\Http\Controllers;


use Illuminate\Http\Request;
use SistemaFiemec\Clientes;
use SistemaFiemec\ClienteDireccion;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use SistemaFiemec\Http\Requests\RequestFormIngresoCliProEmp;


use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use DB;


class ControllerClientes extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
    if($request)
    {
       $query=trim($request->get('searchText'));
       $clientes=DB::table('Cliente_Proveedor as cr')
       ->join('Cliente_direccion as cd','cr.idCliente','=','cd.idCliente')
       ->select('cr.idCliente','cr.tipo_documento','cr.nro_documento','cr.nombres_Rs','cr.paterno','cr.materno','cr.telefono','cr.celular','cr.correo','cr.cuenta_1','cr.cuenta_2','cr.cuenta_3','cd.provincia','cd.distrito','cd.direcion','cr.estado')
       ->where('cr.nro_documento','LIKE','%'.$query.'%')
       ->where('cr.tipo_persona','=','Cliente persona')
       ->orderby('cr.idCliente','asc')
       ->paginate(10);

       return view('proforma.cliente.index',["clientes"=>$clientes,"searchText"=>$query]);


    }



}
    public function show($id)
    {
 	$cliente=DB::table('Cliente_Proveedor as cp')
    ->join('Cliente_direccion as cd','cp.idCliente','=','cd.idCliente')
    ->select('cp.idCliente','cp.tipo_documento','cp.nro_documento','cp.nombres_Rs','cp.paterno','cp.materno','cp.fecha_nacimiento','cp.sexo','cp.telefono','cp.celular','cp.correo','cp.foto','cp.tipo_persona','cp.cuenta_1','cp.cuenta_2','cp.cuenta_3','cp.fecha_sistema','cp.estado','cd.provincia','cd.distrito','cd.direcion','cd.referencia')
    ->where('cp.idCliente','=',$id)
    ->get();
		return view("proforma.cliente.show",["cliente"=>$cliente]);
   
   
    }

    public function create()
    {
        
 return view("proforma.cliente.create");

    }
  


 public function store(RequestFormIngresoCliProEmp $request){
  
     $idCliente=DB::table('Cliente_Proveedor')->insertGetId([

                  'tipo_documento'=>'DNI',
                  'nro_documento'=>intval($request->get('nro_documento')),
                  'nombres_Rs'=>$request->get('nombres_RS'),                  
                  'paterno'=>$request->get('paterno'),
                  'materno'=>$request->get('materno'),
                  'fecha_nacimiento'=>$request->get('fecha_nacimiento'),
                  'sexo'=>$request->get('sexo'),
                  'telefono'=>$request->get('telefono'),
                  'celular'=>$request->get('celular'),
                  'correo'=>$request->get('correo'),
                  'tipo_persona'=>'Cliente persona',
                  'cuenta_1'=>$request->get('cuenta_1'),
                  'cuenta_2'=>$request->get('cuenta_2'),
                  'cuenta_3'=>$request->get('cuenta_3'),
                  'estado'=>'activo',
              ]);
            

        $cliente_direccion=new ClienteDireccion();
        $cliente_direccion->provincia=$request->get('provincia');
        $cliente_direccion->distrito=$request->get('distrito');
        $cliente_direccion->direcion=$request->get('direcion');
        $cliente_direccion->referencia=$request->get('referencia');
        $cliente_direccion->idCliente=$idCliente;
        $cliente_direccion->save();
 
            
            return redirect::to('proforma/cliente');
          }
  
  
  
}
