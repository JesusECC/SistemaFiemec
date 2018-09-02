<?php

namespace SistemaFiemec\Http\Controllers;


use Illuminate\Http\Request;
use SistemaFiemec\Clientes;
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
       $clientes=DB::table('Cliente_Proveedor')
       ->where('nombres_Rs','LIKE','%'.$query.'%')
       ->where('tipo_persona','=','Cliente persona')
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
  
                  $Cliente=new Clientes;

                  $Cliente->tipo_documento='DNI';
                  $Cliente->nro_documento=intval($request->get('nro_documento'));
                  $Cliente->nombres_Rs=$request->get('nombres_RS');                  
                  $Cliente->paterno=$request->get('paterno');
                  $Cliente->materno=$request->get('materno');
                  $Cliente->fecha_nacimiento=$request->get('fecha_nacimiento');
                  $Cliente->sexo=$request->get('sexo');
                  $Cliente->telefono=$request->get('telefono');
                  $Cliente->celular=$request->get('celular');
                  $Cliente->correo=$request->get('correo');
                  $Cliente->tipo_persona='Cliente persona';
                  $Cliente->cuenta_1=$request->get('cuenta_1');
                  $Cliente->cuenta_2=$request->get('cuenta_2');
                  $Cliente->cuenta_3=$request->get('cuenta_3');
                  $Cliente->estado='activo';
                  $Cliente->Departamento=$request->get('Departamento');
                  $Cliente->Distrito=$request->get('Distrito');
                  $Cliente->Direccion=$request->get('Direccion');
                  $Cliente->Referencia=$request->get('Referencia');
                  if (Input::hasFile('fotoCEP')){
           $file=Input::file('fotoCEP');
           $file->move(public_path().'/fotos/clientes/',$file->getClientOriginalName());
           $producto->fotoCEP=$file->getClientOriginalName();

        }
                
                  $Cliente->save();
 
            
            return redirect::to('proforma/cliente');
          }

  

  public function edit($id)
    {

        return view("proforma.cliente.edit",["cliente"=>Clientes::findOrFail($id)]);
    }

   
    public function update(Request $request,$id)
    {

                  $Cliente=Clientes::Find($id);

                  $Cliente->tipo_documento='DNI';
                  $Cliente->nro_documento=intval($request->get('nro_documento'));
                  $Cliente->nombres_Rs=$request->get('nombres_RS');               
                  $Cliente->paterno=$request->get('paterno');
                  $Cliente->materno=$request->get('materno');
                  $Cliente->fecha_nacimiento=$request->get('fecha_nacimiento');
                  $Cliente->sexo=$request->get('sexo');
                  $Cliente->telefono=$request->get('telefono');
                  $Cliente->celular=$request->get('celular');
                  $Cliente->correo=$request->get('correo');
                  $Cliente->tipo_persona='Cliente persona';
                  $Cliente->cuenta_1=$request->get('cuenta_1');
                  $Cliente->cuenta_2=$request->get('cuenta_2');
                  $Cliente->cuenta_3=$request->get('cuenta_3');
                  $Cliente->estado='activo';
                  $Cliente->provincia=$request->get('provincia');
                  $Cliente->distrito=$request->get('distrito');
                  $Cliente->direcion=$request->get('direcion');
                  $Cliente->referencia=$request->get('referencia');
                  $Cliente->idCliente=$idCliente;
                  
                  if (Input::hasFile('fotoCEP')){
           $file=Input::file('fotoCEP');
           $file->move(public_path().'/fotos/clientes/',$file->getClientOriginalName());
           $producto->fotoCEP=$file->getClientOriginalName();

        }
                  $Cliente->update();
 
            
            return redirect::to('proforma/cliente');
    }

    public function destroy($id)
    {
        $producto=Clientes::findOrFail($id);
        $producto->estado='inactivo';
        $producto->update();
        return Redirect::to('proforma/cliente');


    }
}
