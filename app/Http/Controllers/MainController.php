<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use SistemaFiemec\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use SistemaFiemec\Http\Requests\RequestFormProforma;
use Illuminate\Support\Facades\Auth;

use Response;
use Illuminate\Support\Collection;

use DB;
class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id=Auth::user()->id;


    $unitario=DB::table('Proforma')
    ->select(DB::raw('COUNT(*) as total'))
    ->where('tipo_proforma','=','unitaria')
    ->where('idEmpleado','=',$id)
    ->where('estado','=',1)
    ->get();

     $tableros=DB::table('Proforma')
    ->select(DB::raw('COUNT(*) as total2'))
    ->where('tipo_proforma','=','Tablero')
    ->where('idEmpleado','=',$id)
    ->where('estado','=',1)
    ->get();

    $servicios=DB::table('Proforma')
    ->select(DB::raw('COUNT(*) as total3'))
    ->where('tipo_proforma','=','Servicios')
    ->where('idEmpleado','=',$id)
    ->where('estado','=',1)
    ->get();

     $bandejas=DB::table('Proforma')
    ->select(DB::raw('COUNT(*) as total4'))
    ->where('tipo_proforma','=','bandeja')
    ->where('idEmpleado','=',$id)
    ->where('estado','=',1)
    ->get();
    
     return view('main.index',["unitario"=>$unitario,"tableros"=>$tableros,"servicios"=>$servicios,"bandejas"=>$bandejas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
