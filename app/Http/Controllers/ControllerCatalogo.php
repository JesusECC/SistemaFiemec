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
       ->orderby('id','asc')
       ->paginate(20);

       return view('proforma.catalogo.index',["catalogos"=>$catalogos,"searchText"=>$query]);
    }
}
    
    
    public function show($id)
    {
        
        $detalleproducto=DB::table('Producto')
        ->where('id','=',$id)
        ->get();
        return view('proforma.catalogo.show',["detalleproducto"=>$detalleproducto]);
    }

}
