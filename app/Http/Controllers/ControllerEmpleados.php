<?php

namespace SistemaFiemec\Http\Controllers;


use Illuminate\Http\Request;
use SistemaFiemec\Empleados;
use SistemaFiemec\DetalleEmpleado;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use SistemaFiemec\Http\Requests\RequestFormIngresoEmpleados;
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
       ->join ('Detalle_empleado as de','e.id','=','de.Empleado')
       ->select('e.id','e.tipo_documento','e.nro_documento','e.nombres','e.materno','e.paterno','e.fecha_nacimiento','e.sexo','e.telefono','e.celular','e.usuario','e.contraseña','e.direccion','e.correo','e.foto','e.estado','de.cargo','de.sueldo','de.fecha_inicio','de.fecha_fin')
        ->where('e.nombres','LIKE','%'.$query.'%')
         ->orwhere('e.nro_documento','LIKE','%'.$query.'%')
       ->where('e.estado','=','activo')
       ->orderby('e.id','asc')
       ->paginate(10);
       return view('proforma.empleado.index',["Empleados"=>$Empleados,"searchText"=>$query]);
    }
}
    public function create()
    {
        
 return view("proforma.empleado.create");

    }
  


 public function store(RequestFormIngresoEmpleados $request){
  
     $idEmpleado=DB::table('Empleado')->insertGetId([

                  'tipo_documento'=>'DNI',
                  'nro_documento'=>intval($request->get('nro_documento')),
                  'nombres'=>$request->get('nombres'),
                  'materno'=>$request->get('materno'),
                  'paterno'=>$request->get('paterno'),
                  'fecha_nacimiento'=>$request->get('fecha_nacimiento'),
                  'sexo'=>$request->get('sexo'),
                  'telefono'=>$request->get('telefono'),
                  'celular'=>$request->get('celular'),
                  'usuario'=>$request->get('usuario'),
                  'contraseña'=>$request->get('contraseña'),
                  'direccion'=>$request->get('telefono'),
                  'correo'=>$request->get('correo'),
                  'estado'=>'activo',
              ]);
            

        $detallaEmpleado=new DetalleEmpleado();
        $detallaEmpleado->cargo=$request->get('cargo');
        $detallaEmpleado->sueldo=$request->get('sueldo');
        $detallaEmpleado->fecha_inicio=$request->get('fecha_inicio');
        $detallaEmpleado->fecha_fin=$request->get('fecha_fin');
        $detallaEmpleado->Empleado=$idEmpleado;
        $detallaEmpleado->save();
 
            
            return redirect::to('proforma/empleado');
          }

   public function edit($id)

    {

        $Empleado= Empleados::findOrFail($id);        
        $empleado=DB::table('Empleado as e')->where('e.estado','=','activo')->get();
        $detalleempleado=DB::table('Detalle_empleado')->get();
        return view("proforma.empleado.edit",["Empleado"=>$Empleado,"empleado"=>$empleado],["detalleempleado"=>$detalleempleado]);

        
    }

   
    public function update(RequestFormIngresoEmpleados $request,$id)
    {
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

        $Empleado->update();

        $updates = DB::table('Detalle_empleado')->where('Empleado', '=', $id)   ->update([    'cargo' => $request->get('cargo'),'sueldo' =>$request->get('sueldo'), 'fecha_inicio' =>$request->get('fecha_inicio'), 'fecha_fin' =>$request->get('fecha_fin')]);
  
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