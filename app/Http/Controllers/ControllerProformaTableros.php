<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use Producto;
use DB;
class ControllerProformaTableros extends Controller
{
    //
    public function index()
    {
        return view('proforma.tablero.index');
    }
    public function create()
    {
        $productos=DB::table('Producto')
        ->where('estado','=','activo')
        ->orderby('idProducto','asc')
        ->get();
        
        $clientes=DB::table('Cliente_Proveedor as cp')
         ->select('cp.idCliente',DB::raw('CONCAT(cp.nombres_Rs," ",cp.paterno," ",cp.materno) as nombre'),DB::raw('CONCAT(cp.Direccion,"  ",cp.Departamento,"-",cp.Distrito) as direccion'),'cp.nro_documento')
        ->where('tipo_persona','=','Cliente persona')
        ->orwhere('tipo_persona','=','Cliente Empresa')
        ->get();
        return view('proforma.tablero.create',["productos"=>$productos]);
    }
    public function buscarProducto(Request $request)
    {
        $query=trim($request->get('buscar'));
        
        if($request->ajax())
        {
            $productos=DB::table('Producto')
            ->where('codigo_producto','LIKE','%'.$query.'%')
            ->where('estado','=','activo')
           ->orderby('idProducto','asc')->get();

            return response()->json(["productos"=>$productos]);
        }
    }
    public function store(Request $request)
    {
        return view('proforma.tablero.create');
    }
}
