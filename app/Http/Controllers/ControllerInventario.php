<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use Producto;
use Carbon\Carbon;
use SistemaFiemec\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use PDF;
use DB;

class ControllerInventario extends Controller
{
   public function index(){

   	$inventario=DB::table('Producto')
   	->where('estado','=','activo')
   	->where('stock','>=',0)
   	->get();
    
   return view('proforma.inventario.index',["inventario"=>$inventario]);

   } 

   public function createentrada(){

   	return view('proforma.entrada.create');
   }
}
