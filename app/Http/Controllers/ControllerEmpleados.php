<?php

namespace SistemaFiemec\Http\Controllers;


use Illuminate\Http\Request;
use SistemaFiemec\Empleados;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use DB;


class ControllerEmpleados extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
    if($request)
    {
       $query=trim($request->get('searchText'));
       $Empleados=DB::table('Empleado as e')
       //->join('users as us','e.idEmpleado','=','us.idEmp')
       ->select(db::raw('CONCAT(e.nombres," ",e.paterno," ",e.paterno) as nombre'),'e.cargo','e.direccion',
        db::raw('CONCAT(e.telefono," / ",e.celular) as fono'),'e.idEmpleado')
        ->where('e.nombres','LIKE','%'.$query.'%')
       ->where('e.estado','=','activo')
       
       ->orderby('idEmpleado','asc')
       

       ->paginate(10);
       return view('proforma.empleado.index',["Empleados"=>$Empleados,"searchText"=>$query]);
    }
}
    public function create()
    {
        
 return view("proforma.empleado.create");

    }
  


 public function store(Request $request){     
  $Empleado=new Empleados;
  $Empleado->tipo_documento='DNI';
  $Empleado->nro_documento=$request->get('nro_documento');
  $Empleado->nombres=$request->get('nombres');
  $Empleado->materno=$request->get('materno');
  $Empleado->paterno=$request->get('paterno');
  $Empleado->fecha_nacimiento=$request->get('fecha_nacimiento');
  $Empleado->sexo=$request->get('sexo');
  $Empleado->telefono=$request->get('telefono');
  $Empleado->celular=$request->get('celular');
  $Empleado->usuario=$request->get('usuario');
  $Empleado->contraseña=$request->get('contraseña');
  $Empleado->direccion=$request->get('telefono');
  $Empleado->correo=$request->get('correo');
  $Empleado->estado='activo';
  $Empleado->cargo=$request->get('cargo');
  $Empleado->sueldo=$request->get('sueldo');
  $Empleado->fecha_inicio=$request->get('fecha_inicio');
  $Empleado->fecha_fin=$request->get('fecha_fin');
   
  if (Input::hasFile('fotoE')){
    $file=Input::file('fotoE');
    $file->move(public_path().'/fotos/empleados/',$file->getClientOriginalName());
    $producto->fotoCEP=$file->getClientOriginalName();
  }                  
  $Empleado->save();  
  return redirect::to('proforma/empleado');
}

  public function edit($id)
  {
    return view("proforma.empleado.edit",["Empleado"=>Empleados::findOrFail($id)]);
  }
  public function update(Request $request,$id){
    $Empleado= Empleados::find($id);
    $Empleado->tipo_documento=$request->get('tipo_documento');
    $Empleado->nro_documento=$request->get('nro_documento');
    $Empleado->nombres=$request->get('nombres');
    $Empleado->materno=$request->get('materno');
    $Empleado->paterno=$request->get('paterno');
    $Empleado->fecha_nacimiento=$request->get('fecha_nacimiento');
    $Empleado->sexo=$request->get('sexo');
    $Empleado->usuario=$request->get('usuario');
    $Empleado->contraseña=$request->get('contraseña');
    $Empleado->direccion=$request->get('telefono');
    $Empleado->correo=$request->get('correo');
    $Empleado->celular=$request->get('celular');
    $Empleado->cargo=$request->get('cargo');
    $Empleado->sueldo=$request->get('sueldo');
    $Empleado->fecha_inicio=$request->get('fecha_inicio');
    $Empleado->fecha_fin=$request->get('fecha_fin');
    if (Input::hasFile('fotoE')){
      $file=Input::file('fotoE');
      $file->move(public_path().'/fotos/empleados/',$file->getClientOriginalName());
      $producto->fotoCEP=$file->getClientOriginalName();
    }
    $Empleado->update();
    return redirect::to('proforma/empleado');
  }
  public function show($id)
  {
    $Empleado=DB::table('Empleado as e')
    ->join ('Detalle_empleado as de','e.id','=','de.Empleado')
    ->select('e.id','e.tipo_documento','e.nro_documento','e.nombres','e.materno','e.paterno','e.fecha_nacimiento','e.sexo','e.telefono','e.celular','e.usuario','e.contraseña','e.direccion','e.correo','e.foto','e.estado','de.cargo','de.sueldo','de.fecha_inicio','de.fecha_fin')      
    ->where('e.id','=',$id)
    ->get();
    return view("proforma.empleado.show",["Empleado"=>$Empleado]);
  }

  public function destroy($id)
  {
    $Empleado=Empleado::findOrFail($id);
    $Empleado->estado='inactivo';
    $Empleado->update();
    return Redirect::to('proforma/empleado');

  }
}