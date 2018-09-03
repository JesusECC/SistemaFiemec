@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<h3>Modificar Trabajador:{{$moneda->nombre_moneda.' '.$moneda->paterno.' '.$moneda->materno }}</h3>
	@if (count($errors)>0)
	<div class="alert-alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			    <li>{{$error}}</li>
			@endforeach 
		</ul>	
    </div>
    @endif
</div>
</div>

    {!!Form::model($moneda,['method'=>'PATCH','route'=>['config.update',$moneda->idTipo_moneda]])!!}
    {{Form::token()}}


<div class="form-group">
	<label for="nombre_moneda">Nombre de Moneda</label>
	<input type="text" name="nombre_moneda" class="form-control" required value="{{$moneda->nombre_moneda}}">	
</div>
<div class="form-group">
	<label for="simbolo">Simbolo</label>
	<input type="text" name="simbolo" class="form-control" required value="{{$moneda->simbolo}}">	
</div>
<div class="form-group">
	<label for="tipo_cambio">Valor de la Moneda</label>
	<input type="text" name="tipo_cambio" class="form-control" required value="{{$moneda->tipo_cambio}}">	
</div>

<div class="from-group">
	<button class="btn btn-primary" type="submit">guardar</button>
	

</div>
{!!Form::close()!!}



@endsection