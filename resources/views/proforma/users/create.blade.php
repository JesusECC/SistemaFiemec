@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<h3>Nuevo Familia de Productos</h3>
	@if (count($errors)>0)
	<div class="alert-alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			    <li>{{$error}}</li>
			@endforeach 
		</ul>	
    </div>
    @endif

    {!!Form::open(array('url'=>'proforma/familia','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}

    {{Form::token()}}





<div class="form-group">
	<label for="nombre_familia">Nombre de Moneda</label>
	<input type="text" name="nombre_familia" class="form-control" placeholder="nombre...">	
</div>
<div class="form-group">
	<label for="descuento_familia">Simbolo</label>
	<input type="text" name="descuento_familia" class="form-control" placeholder="valor de descuento...">	
</div>


<div style="margin-top: 20px" class="from-group ">

	<button class="btn btn-primary" type="submit">guardar</button>
	<button class="btn btn-danger" type="reset">Limpiar</button>
	<button style="margin-left: 300px" class="btn btn-success " type="button"><a style="color: white!important" href="{{url('proforma/familia')}}">volver</a></button>


</div>

</div>


{!!Form::close()!!}

</div>


@endsection