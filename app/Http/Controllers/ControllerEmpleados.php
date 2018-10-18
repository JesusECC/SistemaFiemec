<?php

namespace SistemaFiemec\Http\Controllers;


use Illuminate\Http\Request;
use SistemaFiemec\Empleados;
use SistemaFiemec\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use SistemaFiemec\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
       ->join('users as us','e.id','=','us.idEmp')
       ->join('Cargo as ca','ca.idCargo','=','us.idCargo')
       ->select(db::raw('CONCAT(e.nombres," ",e.paterno," ",e.paterno) as nombre'),'e.direccion',db::raw('CONCAT(e.telefono," / ",e.celular) as fono'),'e.id','ca.nombre_cargo')
        ->where('e.nombres','LIKE','%'.$query.'%')
       ->where('e.estado','=',1)
       
       ->orderby('e.id','asc')
      
       ->paginate(10);
       return view('proforma.empleado.index',["Empleados"=>$Empleados,"searchText"=>$query]);
    }
}
    public function create()
    {

      $cargo=db::table('Cargo')
      ->where('estado','=',1)
      ->get();

        
 return view("proforma.empleado.create",["cargo"=>$cargo]);

    }

 public function store(Request $request)
 {     
 
try{
        $cargo;
        $documento;
        $nombre;
        $paterno;
        $materno;
        $fechanac;
        $sexo;
        $telefono;
        $celular;
        $direccion;
        $email;
        $sueldo;
        $fechaini;
        $fechafin;
//var dat=[{cargo:cargo,documento:documento,nombre:nombre,paterno:paterno,
//materno:materno,fechanac:fechanac,sexo:sexo,telefono:telefono,celular:celular,
//direccion:direccion,email:email,sueldo:sueldo,fechaini:fechaini,fechafin:fechafin}];
           
        foreach ($request->datos as $dato) {
            $cargo=$dato['cargo'];
            $documento=$dato['documento'];
            $nombre=$dato['nombre'];
            $paterno=$dato['paterno'];
            $materno=$dato['materno'];
            $fechanac=$dato['fechanac'];
            $sexo=$dato['sexo'];
            $telefono=$dato['telefono'];
            $celular=$dato['celular'];
            $direccion=$dato['direccion'];
            $email=$dato['email'];
            $sueldo=$dato['sueldo'];
            $fechaini=$dato['fechaini'];
            $fechafin=$dato['fechafin'];
            
        }
        $idEmpleado=DB::table('Empleado')->insertGetId(
            ['tipo_documento'=>'DNI',
            'nro_documento'=>$documento,           
            'fecha_nacimiento'=>$fechanac,
            'nombres'=>$nombre,
            'paterno'=>$paterno,
            'materno'=>$materno,
            'sexo'=>$sexo,
            'telefono'=>$telefono,
            'celular'=>$celular,
            'correo'=>$email,
            'direccion'=>$direccion,
            'sueldo'=>$sueldo,
            'fecha_inicio'=>$fechaini,
            'fecha_fin'=>$fechafin,
            'estado'=>1
            ]
        );

            $user=new User;  
            $user->idEmp=$idEmpleado;
            $user->idCargo=$cargo;
            $user->name=$nombre; 
            $user->paterno=$paterno; 
            $user->materno=$materno;  
            $user->password=Hash::make($documento); 
            $user->admin=1;
            $user->email=$email;  
            $user->save();            
        
            return ['data' =>'empleados','veri'=>true];
        }catch(Exception $e){
            return ['data' =>$e,'veri'=>false];
        }

}

  public function edit($id)
  {
    $sesiones=DB::table('Sesiones as s')
    ->join('users as u','u.id','=','s.idUser')
    ->join('Empleado as e','e.id','=','u.idEmp')
    ->select('e.id','s.last_login','u.id','u.admin')
    ->where('e.id','=',$id)
    ->distinct()
    ->get();
    return view("proforma.empleado.edit",["sesiones"=>$sesiones,"Empleado"=>Empleados::findOrFail($id)]);
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