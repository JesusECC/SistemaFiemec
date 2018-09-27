<?php

namespace SistemaFiemec\Http\Controllers;



use Illuminate\Http\Request;
use SistemaFiemec\Clientes;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

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
       ->where('estado','LIKE','%'.$query.'%')
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
  


 public function store(Request $request)
 {
  
                  $proveedor= new Clientes;

                  $proveedor->tipo_documento='RUC';
                  $proveedor->nro_documento=intval($request->get('nro_documento'));
                  $proveedor->nombres_Rs=$request->get('nombres_Rs');                  
                  $proveedor->telefono=$request->get('telefono');
                  $proveedor->celular=$request->get('celular');
                  $proveedor->correo=$request->get('correo');
                  $proveedor->tipo_persona='Cliente proveedor';
                  $proveedor->cuenta_1=$request->get('cuenta_1');
                  $proveedor->cuenta_2=$request->get('cuenta_2');
                  $proveedor->cuenta_3=$request->get('cuenta_3');
                  $proveedor->estado='activo';
                  $proveedor->Departamento=$request->get('Departamento');
                  $proveedor->Distrito=$request->get('Distrito');
                  $proveedor->Direccion=$request->get('Direccion');
                  $proveedor->Referencia=$request->get('Referencia');
                 
                  $proveedor->save();
 
            
            return redirect::to('proforma/proveedor');
          }


    public function edit($id)
    {

        return view("proforma.proveedor.edit",["proveedor"=>Clientes::findOrFail($id)]);
    }

   
    public function update(Request $request,$id)
    {

                 $proveedor=Clientes::find($id);

                  $proveedor->tipo_documento='DNI';
                  $proveedor->nro_documento=$request->get('nro_documento');
                  $proveedor->nombres_Rs=$request->get('nombres_Rs');                  
                  $proveedor->telefono=$request->get('telefono');
                  $proveedor->celular=$request->get('celular');
                  $proveedor->correo=$request->get('correo');
                  $proveedor->tipo_persona='Cliente proveedor';
                  $proveedor->cuenta_1=$request->get('cuenta_1');
                  $proveedor->cuenta_2=$request->get('cuenta_2');
                  $proveedor->cuenta_3=$request->get('cuenta_3');
                  $proveedor->estado='activo';
                  $proveedor->Departamento=$request->get('Departamento');
                  $proveedor->Distrito=$request->get('Distrito');
                  $proveedor->Direccion=$request->get('Direccion');
                  $proveedor->Referencia=$request->get('Referencia');
                  
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
