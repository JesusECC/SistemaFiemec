<?php

namespace SistemaFiemec\Http\Controllers;



use Illuminate\Http\Request;
use SistemaFiemec\Clientes;
use SistemaFiemec\ClienteDireccion;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use SistemaFiemec\Http\Requests\RequestFormIngresoCliProEmp;


use DB;

class ControllerProveedor extends Controller
{
  public function __construct()
    {

    }
    public function index(Request $request)
    {
    if($request)
    {
        $query=trim($request->get('searchText'));
       $proveedores=DB::table('Cliente_Proveedor as cr')
       ->where('nombres_Rs','LIKE','%'.$query.'%')
       ->where('tipo_persona','=','Cliente proveedor')
       ->orderby('idCliente','asc')
       ->paginate(10);

       return view('proforma.proveedor.index',["proveedores"=>$proveedores,"searchText"=>$query]);
    }

}

public function show($id)
    {
  $proveedor=DB::table('Cliente_Proveedor as cp')
    ->where('idCliente','=',$id)
    ->get();
    return view("proforma.proveedor.show",["proveedor"=>$proveedor]);
   
   
    }

    public function create()
    {
        
 return view("proforma.proveedor.create");

    }
  


 public function store(RequestFormIngresoCliProEmp $request)
 {
  
                  $proveedor= new Clientes;

                  $proveedor->tipo_documento='DNI';
                  $proveedor->nro_documento=intval($request->get('nro_documento'));
                  $proveedor->nombres_Rs=$request->get('nombres_RS');                  
                  $proveedor->telefono=$request->get('telefono');
                  $proveedor->celular=$request->get('celular');
                  $proveedor->correo=$request->get('correo');
                  $proveedor->tipo_persona='Cliente proveedor';
                  $proveedor->cuenta_1=$request->get('cuenta_1');
                  $proveedor->cuenta_2=$request->get('cuenta_2');
                  $proveedor->cuenta_3=$request->get('cuenta_3');
                  $proveedor->estado='activo';
                  $proveedor->provincia=$request->get('provincia');
                  $proveedor->distrito=$request->get('distrito');
                  $proveedor->direcion=$request->get('direcion');
                  $proveedor->referencia=$request->get('referencia');
                  $proveedor->idCliente=$idCliente;
                  $proveedor->save();
 
            
            return redirect::to('proforma/proveedor');
          }


          public function edit($id)
    {

        return view("proforma.proveedor.edit",["Clientes"=>Clientes::findOrFail($id)]);
    }

   
    public function update(RequestFormIngresoCliProEmp $request,$id)
    {

        $proveedor=Clientes::find($id);

         $proveedor->tipo_documento='DNI';
                  $proveedor->nro_documento=intval($request->get('nro_documento'));
                  $proveedor->nombres_Rs=$request->get('nombres_RS');                  
                  $proveedor->telefono=$request->get('telefono');
                  $proveedor->celular=$request->get('celular');
                  $proveedor->correo=$request->get('correo');
                  $proveedor->tipo_persona='Cliente proveedor';
                  $proveedor->cuenta_1=$request->get('cuenta_1');
                  $proveedor->cuenta_2=$request->get('cuenta_2');
                  $proveedor->cuenta_3=$request->get('cuenta_3');
                  $proveedor->estado='activo';
                  $proveedor->provincia=$request->get('provincia');
                  $proveedor->distrito=$request->get('distrito');
                  $proveedor->direcion=$request->get('direcion');
                  $proveedor->referencia=$request->get('referencia');
                  $proveedor->idCliente=$idCliente;
                  $proveedor->update();

        return Redirect::to('proforma/proveedor');
    }

    public function destroy($id)
    {
        $proveedor=Clientes::findOrFail($id);
        $proveedor->estado='inactivo';
        $proveedor->update();
        return Redirect::to('proforma/proveedor');


    }
}
