<?php

namespace SistemaFiemec\Http\Controllers;

use Illuminate\Http\Request;

class ControllerUsers extends Controller
{
    public function__construc(){


    }

    public function index(Request $request)
    {
    if($request)
    {

     $query=trim($request->get('searchText'));
     $users=DB::table('users')
     ->where('name','LIKE','%'.$query.'%')
     ->where('estado','=','estado')
     ->paginate(17);
       return view('proforma.users.index',["users"=>$users,"searchText"=>$query]);
    }
}
}
