@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<h3>Nuevo Cliente</h3>
	@if (count($errors)>0)
	<div class="alert-alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			    <li>{{$error}}</li>
			@endforeach 
		</ul>	
    </div>
    @endif

    {!!Form::open(array('url'=>'proforma/config','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}

    {{Form::token()}}





<div class="form-group">
	<label for="nombre_moneda">Nombre de Moneda</label>
	<input type="text" name="nombre_moneda" class="form-control" placeholder="nombre...">	
</div>
<div class="form-group">
	<label for="simbolo">Simbolo</label>
	<input type="text" name="simbolo" class="form-control" placeholder="valor en soles...">	
</div>
<div class="form-group">
	<label for="tipo_cambio">Valor de la Moneda</label>
	<input type="text" name="tipo_cambio" class="form-control" placeholder="valor en soles...">	
</div>

<div style="margin-top: 20px" class="from-group ">

	<button class="btn btn-primary" type="submit">guardar</button>
	<button class="btn btn-danger" type="reset">Limpiar</button>
	<button style="margin-left: 300px" class="btn btn-success " type="button"><a style="color: white!important" href="{{url('proforma/config')}}">volver</a></button>


</div>

</div>


{!!Form::close()!!}

</div>


@endsection