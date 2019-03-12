<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use SistemaFiemec\Producto;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use SistemaFiemec\Http\Requests\RequestFormProducto;
use DB;

class ControllerCatalogo extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
    if($request)
    {
       $query=trim($request->get('searchText'));
       $catalogos=DB::table('Producto')
       ->where('serie_producto','LIKE','%'.$query.'%')
       ->where('estado','=','activo')
       ->orderby('idProducto','asc')
       ->paginate(20);

       $tipomenda=DB::table('Tipo_moneda')
       ->where('idTipo_moneda','=',1)
        ->get();

       return view('proforma.catalogo.index',["tipomenda"=>$tipomenda,"catalogos"=>$catalogos,"searchText"=>$query]);
    }
}
    
    
    public function show($id)
    {
        
        $detalleproducto=DB::table('Producto')
        ->where('idProducto','=',$id)
        ->get();
        return view('proforma.catalogo.show',["detalleproducto"=>$detalleproducto]);
    }

}
