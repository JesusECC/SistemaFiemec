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
                <i class="fas fa-dolly"></i> Productos</a>
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
<!-- mantener valores al 
    {!!Form::open(array('url'=>'proforma/empleado','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}

    {{Form::token()}}-->
<div class="box-body bg-gray-c">
                    <div class="row">

                       <div class="col-md-8">
                            <div class="panel panel-default panel-shadow">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="" class="control-label" style="font-size: 13px;color: #676a6c">
                                            Producto Fiemec
                                        </label>
                                    </div>
                            <div class="row">
                                <div class="col-sm-4">
                                  <div class="form-group">
                                   <label for="nombres">Nombre de la Nueva Marca</label>
                                   <input type="text" name="nombre_proveedor" id="a" class="form-control" placeholder="Ingrese nueva Marca">  
                                            </div>                                              
                                        </div>
                                        
                             <div class="col-sm-4">
                                  <div class="form-group">
                                   <label for="nombres">Nombre de la Familia</label>
                                        <input type="text" name="nombre_familia" id="b" class="form-control" placeholder="Ingrese Nombre de familia"> 
                                   </div>                                                  
                             </div>
                             
                             <div class="col-sm-4">
                                  <div class="form-group">
                                   <label for="nombres">Descuento por Familia</label>
                                        <input type="number" name="descuento_familia" id="c" class="form-control" placeholder="Ingrese Descuento"> 
                                   </div>                                                  
                             </div>
                             </div>

                            
                            <div style="margin-top: 20px" class="from-group ">

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
            saveEmpleado();
        });
         

    function saveEmpleado(){
        // se enviar los datos al controlador empleados
        var marca=$("#a").val();
        var familia=$("#b").val();
        var descuento=$("#c").val();
        


        
            var dat=[{marca:marca,familia:familia,descuento:descuento}];
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
        
    }
    var bool;
    
   
</script>
@endpush
@endsection