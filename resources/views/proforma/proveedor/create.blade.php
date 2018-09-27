@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<h3>Nuevo Proveedor</h3>
	@if (count($errors)>0)
	<div class="alert-alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			    <li>{{$error}}</li>
			@endforeach 
		</ul>	
    </div>
    @endif

    {!!Form::open(array('url'=>'proforma/proveedor','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}

    {{Form::token()}}





<div class="form-group">
	<label for="nro_documento">Numero del documento</label>
	<input type="text" name="nro_documento" class="form-control" placeholder="RUC...">	
</div>
<div class="form-group">
	<label for="nombres_RS">Nombres</label>
	<input type="text" name="nombres_RS" class="form-control" placeholder="nombre...">	
</div>


<div class="form-group">
	<label for="telefono">Telefono</label>
	<input type="text" name="telefono" class="form-control" placeholder="Telefono...">	
</div>

<div class="form-group">
	<label for="celular">Celular</label>
	<input type="text" name="celular" class="form-control" placeholder="Celular...">	
</div>

<div class="form-group">
	<label for="correo">Correo</label>
	<input type="text" name="correo" class="form-control" placeholder="Correo...">	
</div>


<div class="form-group">
	<label for="cuenta_1">Primera cuenta</label>
	<input type="text" name="cuenta_1" class="form-control" placeholder="Ingrese la cuenta">	
</div>

<div class="form-group">
	<label for="cuenta_2">Segunda cuenta</label>
	<input type="text" name="cuenta_2" class="form-control" placeholder="Ingrese la cuenta">	
</div>

<div class="form-group">
	<label for="cuenta_3">Tercera cuenta</label>
	<input type="text" name="cuenta_3" class="form-control" placeholder="Ingrese la cuenta">	
</div>

<div class="form-group">
	<label for="Departamento">Provincia</label>
	<input type="text" name="Departamento" class="form-control" placeholder="Ingrese Provincia">	
</div>

<div class="form-group">
	<label for="Distrito">Distrito</label>
	<input type="text" name="Distrito" class="form-control" placeholder="Ingrese Distrito">	
</div>

<div class="form-group">
	<label for="Direccion">direccion</label>
	<input type="text" name="Direccion" class="form-control" placeholder="direcion">	
</div>

<div class="form-group">
	<label for="Referencia">Referencia</label>
	<input type="text" name="Referencia" class="form-control" placeholder="Ingrese la cuenta">	
</div>


<div style="margin-top: 20px" class="from-group ">

	<button class="btn btn-primary" type="submit">guardar</button>
	<button class="btn btn-danger" type="reset">Limpiar</button>
	<button style="margin-left: 300px" class="btn btn-success " type="button"><a style="color: white!important" href="{{url('proforma/proveedor')}}">volver</a></button>


</div>

</div>


{!!Form::close()!!}

</div>


@endsection