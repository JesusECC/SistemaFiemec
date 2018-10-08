@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<h3>Modificar Trabajador:{{$familia->nombre_familia}}</h3>
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

    {!!Form::model($familia,['method'=>'PATCH','route'=>['familia.update',$familia->idFamilia]])!!}
    {{Form::token()}}


<div class="form-group">
	<label for="nombre_familia">Nombre de Moneda</label>
	<input type="text" name="nombre_familia" class="form-control" required value="{{$familia->nombre_familia}}">	
</div>

<div class="form-group">
	<label for="descuento_familia">Valor de la Moneda</label>
	<input type="text" name="descuento_familia" class="form-control" required value="{{$familia->descuento_familia}}">	
</div>

<div class="from-group">
	<button class="btn btn-primary" type="submit">guardar</button>
	

</div>
{!!Form::close()!!}



@endsection