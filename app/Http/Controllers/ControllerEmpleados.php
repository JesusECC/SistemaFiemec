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
    $empleados=DB::table('Empleado as s')
    ->join('users as u','u.id','=','s.idUser')
    ->join('Empleado as e','e.id','=','u.idEmp')
    ->select('e.id','u.last_login_at','u.id','u.admin')
    ->where('e.id','=',$id)
    ->get();
    return view("proforma.empleado.edit",["sesiones"=>$sesiones,"Empleado"=>Empleados::findOrFail($id)]);
  }
  public function update(Request $request)
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
               
            foreach ($request->datos as $dato) {
                $cargo=$dato['cargo'];   
                $valorv=$dato['valorVenta'];
                $tota=$dato['total'];
                $nomTablero=$dato['nomTablero'];
                $totaldolares=$dato['totaldolares'];
                $forma=$dato['forma'];
                $plazo=$dato['plazo'];
                $observacion=$dato['observacion'];
                $totaldolares=$dato['totaldolares'];
                $forma=$dato['forma'];
                $plazo=$dato['plazo'];
                $observacion=$dato['observacion'];
            }
                Proforma::where('idProforma',$idProforma)
                ->update([
                    // 'idCliente'=>$idclie,
                // 'idEmpleado'=>$request->,           
                // 'idTipo_moneda'=>$idTipoCam,
                'serie_proforma'=>'PU365122018',
                // 'fecha_hora'=>$mytime->toDateTimeString(),
                'igv'=>'18',
                'subtotal'=>$valorv,
                'precio_total'=>$tota,
                // 'tipocambio'=>$valorcambio,
                'precio_totalC'=>$totaldolares,
                // 'descripcion_proforma'=>$observacion, //preguntar
                'tipo_proforma'=>'unitaria',
                // 'caracteristicas_proforma'=>$request->, preguntar
                'forma_de'=>$forma,
                // 'plaza_fabricacion'=>$request->,
                'plazo_oferta'=>$plazo,
                // 'garantia'=>$request->,
                // 'observacion_condicion'=>$request->,
                'observacion_proforma'=>$observacion,
                'estado'=>1
                ]);

                User::where(idEmpleado)



            foreach($request->filas as $fila){
                if ($fila['estado']==1 || $fila['estado']==0) {
                    DetalleProforma::where('idProforma',$idProforma)
                    ->where('idDetalle_proforma',$fila['idDetalleProforma'])
                    ->update([
                    // $detalleProforma->idDetalle_proforma=$fila[''];  
                    'idProducto'=>$fila['idProducto'],
                    // 'idProforma'=>$idProforma,
                    // 'idTableros'=>$idTablero,
                    'cantidad'=>$fila['cantidadP'],
                    'precio_venta'=>$fila['prec_uniP'],
                    // texto_precio_venta=>$fila['' 
                    // observacion_detalleP=>$fila[''   
                    'descuento'=>$fila['descuentoP'],
                    'descripcionDP'=>$fila['descripcionP'],
                    'estadoDP'=>$fila['estado']
                    ]);
                }else if($fila['estado']==2){
                    $detalleProforma=new DetalleProforma;
                    // $detalleProforma->idDetalle_proforma=$fila[''];  
                    $detalleProforma->idProducto=$fila['idProducto'];
                    $detalleProforma->idProforma=$idProforma;
                    // $detalleProforma->idTableros=$idTablero;
                    $detalleProforma->cantidad=$fila['cantidadP'];
                    $detalleProforma->precio_venta=$fila['prec_uniP'];  
                    // $detalleProforma->texto_precio_venta=$fila[''];  
                    // $detalleProforma->observacion_detalleP=$fila[''];    
                    $detalleProforma->descuento=$fila['descuentoP'];    
                    $detalleProforma->descripcionDP=$fila['descripcionP'];
                    $detalleProforma->estadoDP=1;
                    $detalleProforma->save();
                }
                
            }
                return ['data' =>'proformas','veri'=>true];
            }catch(Exception $e){
                return ['data' =>$e,'veri'=>false];
            }
    

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