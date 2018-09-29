<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;
use SistemaFiemec\Servicios;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;



use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use DB;

class ControllerTarea extends Controller
{
   public function __construct()
    {

    }
    public function create()
    {
        return view('proforma.producto.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
         'nombre_servicio'=> 'required'
        ]);

        Task::create($request->all());
    }

         return;

}
