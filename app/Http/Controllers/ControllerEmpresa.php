<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use SistemaFiemec\Clientes;
use SistemaFiemec\ClienteDireccion;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use SistemaFiemec\Http\Requests\RequestFormIngresoCliProEmp;
use DB;

class ControllerEmpresa extends Controller
{
     public function __construct()
    {

    }
    public function index(Request $request)
    {
    if($request)
    {
       $query=trim($request->get('searchText'));
       $empresas=DB::table('Cliente_Proveedor as cp')
       ->join('Cliente_direccion as cd','cp.idCliente','=','cd.idCliente')
       ->select('cp.idCliente','cp.tipo_documento','cp.nro_documento','cp.nombres_Rs','cp.telefono','cp.celular','cp.correo','cp.cuenta_1','cp.cuenta_2','cp.cuenta_3','cd.provincia','cd.distrito','cd.direcion','cp.estado')
       ->where('cp.nombres_Rs','LIKE','%'.$query.'%')
       ->where('cp.tipo_persona','=','Cliente Empresa')
       ->orderby('cp.idCliente','asc')
       

       ->paginate(10);

       return view('proforma.empresa.index',["empresas"=>$empresas,"searchText"=>$query]);
    }

}

public function show($id)
    {
 	$empresa=DB::table('Cliente_Proveedor as cp')
    ->join('Cliente_direccion as cd','cp.idCliente','=','cd.idCliente')
    ->select('cp.idCliente','cp.tipo_documento','cp.nro_documento','cp.nombres_Rs','cp.paterno','cp.materno','cp.fecha_nacimiento','cp.sexo','cp.telefono','cp.celular','cp.correo','cp.foto','cp.tipo_persona','cp.cuenta_1','cp.cuenta_2','cp.cuenta_3','cp.fecha_sistema','cp.estado','cd.provincia','cd.distrito','cd.direcion','cd.referencia')
    ->where('cp.idCliente','=',$id)
    ->get();
		return view("proforma.empresa.show",["empresa"=>$empresa]);
   
   
    }

    public function create()
    {
        
 return view("proforma.empresa.create");

    }
  


 public function store(RequestFormIngresoCliProEmp $request){
  
     $idCliente=DB::table('Cliente_Proveedor')->insertGetId([

                  'tipo_documento'=>'RUC',
                  'nro_documento'=>intval($request->get('nro_documento')),
                  'nombres_Rs'=>$request->get('nombres_RS'), 
                  'paterno'=>'.',
                  'materno'=>'.',                 
                  'telefono'=>$request->get('telefono'),
                  'celular'=>$request->get('celular'),
                  'correo'=>$request->get('correo'),
                  'tipo_persona'=>'Cliente Empresa',
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
 
            
            return redirect::to('proforma/empresa');
          }
}
