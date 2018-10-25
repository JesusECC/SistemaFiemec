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
       $representantes=DB::table('Cliente_Representante as cr')
       ->join('Cliente_Proveedor as cp','cr.idCliente','=','cp.idCliente')
       ->select('cp.nombres_Rs','cp.paterno','cp.materno','cr.tipo_doc','cr.nro_doc_RE','cr.nombre_RE','cr.telefonoRE','cr.CelularRE','cr.idCR')
       ->where('nombre_RE','LIKE','%'.$query.'%')
       ->where('estadoCE','=',1)
       ->orderby('idCR','asc')
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
                  $representante->idCliente=intval($request->get('idCliente'));
                  $representante->tipo_doc=$request->get('tipo_doc');
                  $representante->nro_doc_RE=$request->get('nro_doc_RE');
                  $representante->nombre_RE=$request->get('nombre_RE');                                  
                  $representante->telefonoRE=$request->get('telefonoRE');
                  $representante->CelularRE=$request->get('CelularRE');
                  $representante->estadoCE=1;
                  $representante->save();
              
                
 
            
            return redirect::to('proforma/representante');
          }

  

  public function edit($id)
    {
      $cliente=DB::table('Cliente_Proveedor')
      ->where('estado','=',1)
      ->get();
        return view("proforma.representante.edit",["cliente"=>$cliente,"representante"=>ClienteRE::findOrFail($id)]);
    }

   
    public function update(Request $request,$id)
    {
               
                  $representante=ClienteRE::Find($id);
                  
                  $representante->idCliente=intval($request->get('idCliente'));
                  $representante->tipo_doc=$request->get('tipo_doc');
                  $representante->nro_doc_RE=$request->get('nro_doc_RE');
                  $representante->nombre_RE=$request->get('nombre_RE');                                  
                  $representante->telefonoRE=$request->get('telefonoRE');
                   $representante->CelularRE=$request->get('CelularRE');
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
