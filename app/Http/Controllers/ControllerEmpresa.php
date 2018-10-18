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
       $empresas=DB::table('Cliente_Proveedor as cr')
       ->where('nombres_Rs','LIKE','%'.$query.'%')
       ->where('tipo_persona','=','Cliente Empresa')
       ->orderby('idCliente','asc')
       ->paginate(10);

       return view('proforma.empresa.index',["empresas"=>$empresas,"searchText"=>$query]);
    }

}

public function show($id)
    {
 	$empresa=DB::table('Cliente_Proveedor')
    ->where('idCliente','=',$id)
    ->get();
		return view("proforma.empresa.show",["empresa"=>$empresa]);
   
   
    }

    public function create()
    {
        
 return view("proforma.empresa.create");

    }
  


 public function store(RequestFormIngresoCliProEmp $request)
 {
  
                  $empresa= new Clientes;

                  $empresa->tipo_documento='DNI';
                  $empresa->nro_documento=intval($request->get('nro_documento'));
                  $empresa->nombres_Rs=$request->get('nombres_Rs');
                  $empresa->paterno='.';
                  $empresa->materno='.';                
                  $empresa->telefono=$request->get('telefono');
                  $empresa->celular=$request->get('celular');
                  $empresa->correo=$request->get('correo');
                  $empresa->tipo_persona='Cliente Empresa';
                  $empresa->cuenta_1=$request->get('cuenta_1');
                  $empresa->cuenta_2=$request->get('cuenta_2');
                  $empresa->cuenta_3=$request->get('cuenta_3');
                  $empresa->estado='activo';
                  $empresa->departamento=$request->get('departamento');
                  $empresa->distrito=$request->get('distrito');
                  $empresa->direccion=$request->get('direccion');
                  $empresa->referencia=$request->get('referencia');
               
                  $empresa->save();
 
            
            return redirect::to('proforma/empresa');
          }


          public function edit($id)
    {

        return view("proforma.empresa.edit",["empresa"=>Clientes::findOrFail($id)]);
    }

   
    public function update(RequestFormIngresoCliProEmp $request,$id)
    {

        $empresa=Clientes::find($id);

         $empresa->tipo_documento='RUC';
                  $empresa->nro_documento=intval($request->get('nro_documento'));
                  $empresa->nombres_Rs=$request->get('nombres_Rs');                  
                  $empresa->telefono=$request->get('telefono');
                  $empresa->celular=$request->get('celular');
                  $empresa->correo=$request->get('correo');
                  $empresa->tipo_persona='Cliente Empresa';
                  $empresa->cuenta_1=$request->get('cuenta_1');
                  $empresa->cuenta_2=$request->get('cuenta_2');
                  $empresa->cuenta_3=$request->get('cuenta_3');
                  $empresa->estado='activo';
                  $empresa->provincia=$request->get('provincia');
                  $empresa->distrito=$request->get('distrito');
                  $empresa->direccion=$request->get('direccion');
                  $empresa->referencia=$request->get('referencia');
                  $empresa->idCliente=$idCliente;
                  $empresa->update();

        return Redirect::to('proforma/empresa');
    }

    public function destroy($id)
    {
        $producto=Clientes::findOrFail($id);
        $producto->estado='inactivo';
        $producto->update();
        return Redirect::to('proforma/empresa');


    }
}


                  