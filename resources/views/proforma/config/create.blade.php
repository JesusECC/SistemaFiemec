@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<h3>Nuevo Tipo de Moneda</h3>
	@if (count($errors)>0)
	<div class="alert-alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			    <li>{{$error}}</li>
			@endforeach 
		</ul>	
    </div>
    @endif

   <!-- {!!Form::open(array('url'=>'proforma/config','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}

    {{Form::token()}}-->

<div class="form-group">
	<label for="nombre_moneda">Nombre de Moneda</label>
	<input type="text" name="nombre_moneda" id="a" class="form-control" placeholder="nombre...">	
</div>
<div class="form-group">
	<label for="simbolo">Simbolo</label>
	<input type="text" name="simbolo" id="b" class="form-control" placeholder="valor en soles...">	
</div>
<div class="form-group">
	<label for="tipo_cambio">Valor de la Moneda</label>
	<input type="text" name="tipo_cambio" id="c" class="form-control" placeholder="valor en soles...">	
</div>

<div style="margin-top: 20px" class="from-group ">

	<button  id="save" class="btn btn-primary btn-sm" type="button"><i class="far fa-save"></i> Guardar</button>
	<button class="btn btn-danger" type="reset">Limpiar</button>
	<button style="margin-left: 300px" class="btn btn-success " type="button"><a style="color: white!important" href="{{url('proforma/config')}}">volver</a></button>

</div>

</div>


<!--{!!Form::close()!!}-->

</div>
@push('scripts')
<script>
    
        $('#save').click(function(){
            saveEmpleado();
        });
         

    function saveEmpleado(){
        // se enviar los datos al controlador empleados
        var nombre=$("#a").val();
        var simbolo=$("#b").val();
        var valor=$("#c").val();
        


        if(nombre!=''){
            var dat=[{nombre:nombre,simbolo:simbolo,valor:valor}];
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
    }
    var bool;
    
   
</script>
@endpush

@endsection