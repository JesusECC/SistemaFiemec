<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use SistemaFiemec\ClienteRE;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use Response;
use Illuminate\Support\Collection;
use DB;

class ControllerClienteRE extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
    if($request)
    {
       $query=trim($request->get('searchText'));
       $representantes=DB::table('Cliente_Representante')
       ->where('nombre_RE','LIKE','%'.$query.'%')
       ->orderby('idCE','asc')
       ->paginate(10);

       return view('proforma.representante.index',["representantes"=>$representantes,"searchText"=>$query]);


    }
}
    

    public function create()
    {
       $cliente=DB::table('Cliente_Proveedor')
      ->where('estado','=',1)
      ->get();

 return view("proforma.representante.create",["cliente"=>$cliente]);

    }
  


 public function store(Request $request){
  
                  $representante=new ClienteRE;
                  $representante->nombre_RE=$request->get('nombre_RE');
                  $representante->idCliente=intval($request->get('idCliente'));
                  $representante->nro_doc_RE=$request->get('nro_doc_RE');
                  $representante->CelularRE=$request->get('CelularRE');                  
                  $representante->telefonoRE=$request->get('telefonoRE');
                  $representante->estadoCE=1;
                  $representante->save();
              
                
 
            
            return redirect::to('proforma/representante');
          }

  

  public function edit($id)
    {
        return view("proforma.representante.edit",["representante"=>ClienteRE::findOrFail($id)]);
    }

   
    public function update(Request $request,$id)
    {

                  $representante=ClienteRE::Find($id);
                  $representante->nombre_RE=$request->get('nombre_RE');
                  $representante->idCliente=intval($request->get('idCliente'));
                  $representante->nro_doc_RE=$request->get('nro_doc_RE');
                  $representante->CelularRE=$request->get('CelularRE');                  
                  $representante->telefonoRE=$request->get('telefonoRE');
                  $representante->update();
 
            
            return redirect::to('proforma/representante');
    }

    public function destroy($id)
    {
        $representante=ClienteRE::findOrFail($id);
        $representante->estadoCE=0;
        $representante->update();
        return Redirect::to('proforma/representante');


    }

}
