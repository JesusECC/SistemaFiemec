<?php

namespace SistemaFiemec\Http\Controllers;


use Illuminate\Http\Request;
use SistemaFiemec\Clientes;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use SistemaFiemec\Http\Requests\RequestFormIngresoCliProEmp;
use Illuminate\Support\Facades\Auth;


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
       $clientes=DB::table('Cliente_Proveedor')
       ->where('nombres_Rs','LIKE','%'.$query.'%')
       ->where('estado','=',1)
       ->orderby('idCliente','asc')
       ->paginate(10);

       return view('proforma.cliente.index',["clientes"=>$clientes,"searchText"=>$query]);


    }



}
    public function show($id)
    {
 	$cliente=DB::table('Cliente_Proveedor as ')
    ->where('idCliente','=',$id)
    ->get();
		return view("proforma.cliente.show",["cliente"=>$cliente]);
   
   
    }

    public function create()
    {
        
 return view("proforma.cliente.create");

    }
  


 public function store(Request $request){

                  $id=Auth::user()->id;

                  $Cliente=new Clientes;
                  $Cliente->idU=$id;
                  $Cliente->tipo_documento=$request->get('tipo_documento');
                  $Cliente->nro_documento=intval($request->get('nro_documento'));
                  $Cliente->nombres_Rs=$request->get('nombres_RS');                  
                  $Cliente->paterno=$request->get('paterno');
                  $Cliente->materno=$request->get('materno');
                  $Cliente->fecha_nacimiento=$request->get('fecha_nacimiento');
                  $Cliente->sexo=$request->get('sexo');
                  $Cliente->telefono=$request->get('telefono');
                  $Cliente->celular=$request->get('celular');
                  $Cliente->correo=$request->get('correo');
                  $Cliente->tipo_persona=$request->get('tipo_persona');
                  $Cliente->cuenta_1=$request->get('cuenta_1');
                  $Cliente->cuenta_2=$request->get('cuenta_2');
                  $Cliente->cuenta_3=$request->get('cuenta_3');
                  $Cliente->estado=1;
                  $Cliente->Departamento=$request->get('Departamento');
                  $Cliente->Distrito=$request->get('Distrito');
                  $Cliente->Provincia=$request->get('Provincia');
                  $Cliente->Direccion=$request->get('Direccion');
                  $Cliente->Referencia=$request->get('Referencia');
                  
                
                  $Cliente->save();
 
            
            return redirect::to('proforma/cliente');
          }

  

  public function edit($id)
    {

      

        return view("proforma.cliente.edit",["Cliente"=>Clientes::findOrFail($id)]);
    }

   
    public function update(Request $request,$id)
    {

                  $Cliente=Clientes::Find($id);
                  $Cliente->tipo_documento=$request->get('tipodoc');
                  $Cliente->nro_documento=intval($request->get('nro_documento'));
                  $Cliente->nombres_Rs=$request->get('nombres_Rs');               
                  $Cliente->paterno=$request->get('paterno');
                  $Cliente->materno=$request->get('materno');
                  $Cliente->fecha_nacimiento=$request->get('fecha_nacimiento');
                  $Cliente->sexo=$request->get('sexo');
                  $Cliente->telefono=$request->get('telefono');
                  $Cliente->celular=$request->get('celular');
                  $Cliente->correo=$request->get('correo');
                  $Cliente->cuenta_1=$request->get('cuenta_1');
                  $Cliente->cuenta_2=$request->get('cuenta_2');
                  $Cliente->cuenta_3=$request->get('cuenta_3');
                  $Cliente->Departamento=$request->get('Departamento');
                  $Cliente->Provincia=$request->get('Provincia');
                  $Cliente->Distrito=$request->get('Distrito');
                  $Cliente->Direccion=$request->get('Direccion');
                  $Cliente->Referencia=$request->get('Referencia');
                  $Cliente->update();
 
            
            return redirect::to('proforma/cliente');
    }

    public function destroy($id)
    {
        $producto=Clientes::findOrFail($id);
        $producto->estado=0;
        $producto->update();
        return Redirect::to('proforma/cliente');


    }

     
}
