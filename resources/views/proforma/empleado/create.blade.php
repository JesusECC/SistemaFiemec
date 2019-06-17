@extends ('layouts.admin')
@section ('contenido')
<section class="content-header">
    <h1 style="margin-top: 55px;">
        Panel de Administrador
        <small>Version 2.3.0</small>
    </h1>
    <ol class="breadcrumb" style="margin-top: 55px;">
        <li>
            <a href="#">
                <i class="fas fa-dolly"></i> Empleados</a>
        </li>
        <li class="active">Fiemec</li>
        <li>
            <a href="#">
             Nuevo</a>
        </li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box" style="border-top: 3px solid #18A689">
                <div class="box-header with-border" style="padding: 10px !important">
                    <h4>
                        <strong style="font-weight: 400">
                            <i class="fas fa-dolly"></i> Registro Empleados Fiemec
                        </strong>
                    </h4>
                    @if(count($errors)>0)
                    <div class="alert-alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach 
                        </ul>   
                    </div>
                    @endif

                </div>
<!-- mantener valores al -->
   <!--{!!Form::open(array('url'=>'proforma/empleado','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}

    {{Form::token()}}-->
<div class="box-body bg-gray-c">
                    <div class="row">

                       <div class="col-md-8">
                            <div class="panel panel-default panel-shadow">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="" class="control-label" style="font-size: 13px;color: #676a6c">
                                            Empleados Fiemec
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nombres">N Documento</label>
                                                <input type="text" name="nro_documento" id="nrodoc" class="form-control" placeholder="Ingrese numero Documento" >  
                                            </div>                                              
                                        </div>
                                        
                             <div class="col-sm-4">
                                  <div class="form-group">
                                   <label for="nombres">Nombres</label>
                                        <input type="text" name="nombres_Rs" id="nombre" class="form-control" placeholder="Ingrese Nombres"> 
                                   </div>                                                  
                             </div>
                             
                             <div class="col-sm-4">
                                  <div class="form-group">
                                   <label for="nombres">Apellido Paterno</label>
                                        <input type="text" name="paterno" id="pa" class="form-control" placeholder="Ingrese Nombres"> 
                                   </div>                                                  
                             </div>
                             </div>

                             <div class="row">
                             <div class="col-sm-4">
                                  <div class="form-group">
                                   <label for="nombres">Apellido Materno</label>
                                        <input type="text" name="materno" id="ma" class="form-control" placeholder="Ingrese Nombres"> 
                                   </div>                               
                                   </div>                   
                             

                         
                         <div class="col-sm-4">
                             <div class="form-group">
                        <label for="fecha_nacimiento">Fecha Nacimiento</label>
                              <input type="date" name="fecha_nacimiento" id="fecnac" class="form-control" placeholder="Ingrese Fecha nacimiento">  
                                </div>
                            </div>
                          
                                   
                                    
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Sexo</label>
                                         <select name="sexo" id="sex" class="form-control">
                                                  <option ></option>
                                                  <option value="Marculino">Masculino</option>
                                                  <option value="Femenino">Femenino</option>
            
                                         </select>

                                         </div>                                              
                                    </div>
                                     </div>



                              <div class="row">
                             <div class="col-sm-4">
                                <div class="form-group">

                                <label for="telefono">Telefono</label>
                                        <input type="text" name="telefono" id="tf" class="form-control" placeholder="Ingrese el telefono">                                           
                                            </div>
                                        </div>
                                    

                                    
                            <div class="col-sm-4">
                                <div class="form-group">
                                 <label for="celular">Celular</label>
                                     <input type="text" name="celular" id="cell" class="form-control" placeholder="Ingrese el  celular"></div>                      
                                 </div>   

                                 <div class="col-sm-4">
                                <div class="form-group">
                                <label for="correo">Correo</label>
                                <input type="text" name="correo" id="email" class="form-control" placeholder="Ingrese Correo Electronico">
                                </div>  
                             </div>  
                             </div>                      
                                   
                                    <div class="row">      
                            <div class="col-sm-8">
                              <div class="from-group">
                                <label for="direccion">Direccion</label>
                                <input type="text" name="direccion" id="dir" class="form-control" placeholder="Ingrese la direccion">
                              </div>                           
                            </div> 
                                                        
                                    
                            <div class="col-sm-4">
                                     <div class="form-group">
                                                <label for="idCargo">Cargo</label>
                                                <select  name="idCargo" class="form-control selectpicker" id="car" data-live-search="true">
                                                <option value="" disabled="" selected="">Cargo</option>
                                                @foreach($cargo as $ca)                
                                                <option value="{{$ca->idCargo}}">{{$ca->nombre_cargo}}</option>
                                                @endforeach  
                                                </select>    
                                            </div>  
                                        </div>
                                    </div>
                                    
                                    <div class="row"> 
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="sueldo">Sueldo</label>
                                                  <input type="number" name="sueldo" id="su" class="form-control" placeholder="Ingrese el sueldo">
                                            </div>  
                                        </div>
                                        
                                  
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="fecha_inicio">Fecha Inicio</label>
                                                <input type="date" name="fecha_inicio" id="fecini" class="form-control" placeholder="Ingrese Fecha Inicio"> 
                                            </div>  
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="fecha_fin">Fecha Final</label>
                                                   <input type="date" name="fecha_fin" id="fecfin" class="form-control" placeholder="Ingrese Fecha Final">
                                              </div>  
                                        </div>
                                    </div>
                                 </div>
                             </div>
                          </div>
<div class="col-md-4">
                            <div class="panel panel-default panel-shadow">
                                <div class="panel-body">
                                 <div class="box-body">
          
            <label for="" class="control-label" style="font-size: 13px;color: #676a6c">
                            Cuenta de Usuario
                          </label>
                              <div class="row"> 
                                 <div class="col-sm-12">
                                     <div class="form-group">
                                       <label for="sueldo">Usuario</label>
                                        <input type="text" name="email" id="emaill" class="form-control" placeholder="Ingrese nombre de Usuario">
                                      </div>  
                                 </div>
                                        
                                  
                                 <div class="col-sm-12">
                                     <div class="form-group">
                                                <label for="fecha_inicio">Contraseña</label>
                                                <input type="text" name="password" id="pw" class="form-control" placeholder="Ingrese Fecha Inicio"> 
                                            </div>  
                                        </div>
                            <div id="ocultar" style="margin-top: 20px" class="from-group ">

                                    <button  id="save" class="btn btn-primary btn-sm" type="button"><i class="far fa-save"></i> Guardar</button>
                                    <button class="btn btn-danger" type="reset">Limpiar</button>
    
                             </div>
                                    </div>
                               </div>  
                           </div>                 
                      </div>                            
                </div>
                     
                        

</section>
<!--{!!Form::close()!!}-->



@push('scripts')
<script>
    
        $('#save').click(function(){
           // validardocumento();
            saveEmpleado();
        });
        
        $('#su').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '1');
        });
        $('#su').click(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '1');
       
        // Actualizar
         });

        /* function validardocumento(){
          
             var cargo=$("#car").val();
            var documento=$("#nrodoc").val();
            var nombre=$("#nombre").val();
            var paterno=$("#pa").val();
            var materno=$("#ma").val();
            var fechanac=$("#fecnac").val();
            var sexo=$("#sex").val();
            var telefono=$("#tf").val();
            var celular=$("#cell").val();
            var direccion=$("#dir").val();
            var email=$("#email").val();

            var pass=$("#pw").val();
           var emaill=$("#emaill").val();

          // document.getElementById("start_date").setCustomValidity("mensaje de prueba");

             if(documento === ''){
                alert("ingrese N° Documento");
             }
             else  if(nombre === ''){
                 alert("ingrese nombre");
             }
             else if(paterno === ''){
                 alert("ingrese Paterno");
             }
             else if(materno === ''){
                 alert("ingrese Materno");
             }
             else if(fechanac === ''){
                 alert("ingrese fecha nacimiento");
             }
             else if(sexo === ''){
                 alert("ingrese sexo");
             }
             else if(telefono === ''){
                 alert("ingrese Telefono");
             }
             else if(celular === ''){
                 alert("ingrese Numero de celular");
             }
             else if(email === ''){
                 alert("ingrese Email");
             }
             else  if(direccion === ''){
                 alert("ingrese Direccion");
             }
             else if(cargo === ''){
                 alert("ingrese Cargo");
             }

             else if(emaill === ''){
                 alert("ingrese Email de Usuario");
             }
             else if(pass === ''){
                 alert("ingrese Password de Usuario");
             }
             return false;
         }

*/
/*
         $('#nrodoc').click(function(){
                if(this.value == ''){
                    alert("ingrese el valor");
                }

         });

*/
    function saveEmpleado(){
        // se enviar los datos al controlador empleados
        var cargo=$("#car").val();
        var documento=$("#nrodoc").val();
        var nombre=$("#nombre").val();
        var paterno=$("#pa").val();
        var materno=$("#ma").val();
        var fechanac=$("#fecnac").val();
        var sexo=$("#sex").val();
        var telefono=$("#tf").val();
        var celular=$("#cell").val();
        var direccion=$("#dir").val();
        var email=$("#email").val();
        var sueldo=$("#su").val();
        var fechaini=$("#fecini").val();
        var fechafin=$("#fecfin").val();
        
        var pass=$("#pw").val();
        var emaill=$("#emaill").val();


        if(cargo!=null && documento!='' && nombre!='' && paterno!='' && materno!='' && fechanac!='' && sexo!='' && telefono!='' && celular!='' && direccion!='' && email!='' && pass!='' && emaill!=''){
            var dat=[{cargo:cargo,documento:documento,nombre:nombre,paterno:paterno,materno:materno,fechanac:fechanac,sexo:sexo,telefono:telefono,celular:celular,direccion:direccion,email:email,sueldo:sueldo,fechaini:fechaini,fechafin:fechafin,pass:pass,emaill:emaill}];
        
        document.getElementById("ocultar").style.display = "none";

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:  {datos:dat}, //datos que se envian a traves de ajax
                url:   'guardar', //archivo que recibe la peticion
                type:  'post', //método de envio
                dataType: "json",//tipo de dato que envio 
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    if(response.veri==true){
                        var urlBase=window.location.origin;
                        var url=urlBase+'/'+response.data;
                        document.location.href=url;
                    }else{
                        alert("problemas al guardar la informacion");
                    }
                }
            });
        }else{
            
            alert("Data Incompleta");
        }
    }
    var bool;

    
   
</script>
@endpush
@endsection