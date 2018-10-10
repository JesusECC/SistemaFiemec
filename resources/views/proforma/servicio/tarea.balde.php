@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<h3>Nuevas Tareas</h3>
	@if (count($errors)>0)
	<div class="alert-alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			    <li>{{$error}}</li>
			@endforeach 
		</ul>	
    </div>
    @endif

    {!!Form::open(array('url'=>'proforma/tarea','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}

    {{Form::token()}}
<div class="form-group">
	<label for="nombre_serviciot">Nombre tarea</label>
	<input type="text" name="nombre_serviciot" class="form-control" placeholder="nombre...">	
</div>
<div style="margin-top: 20px" class="from-group ">

	<button class="btn btn-primary" type="submit">guardar</button>
	<button class="btn btn-danger" type="reset">Limpiar</button>
	


</div>

</div>


{!!Form::close()!!}

</div>


@endsection