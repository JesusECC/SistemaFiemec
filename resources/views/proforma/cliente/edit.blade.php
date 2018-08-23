@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<h3>Modificar Trabajador:{{$Cliente->nombres.' '.$Cliente->paterno.' '.$Cliente->materno }}</h3>
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

    {!!Form::model($Cliente,['method'=>'PATCH','route'=>['cliente.update',$Cliente->idCliente]])!!}
    {{Form::token()}}

<div class="form-group">
	<label for="tipo_documento">Tipo Documento</label>
	<input type="text" name="tipo_documento" class="form-control" required value="{{$Cliente->tipo_documento}}">	
</div>

<div class="form-group">
	<label for="nro_documento">NUmero Documento</label>
	<input type="text" name="nro_documento" class="form-control" required value="{{$Cliente->nro_documento}}">	
</div>

<div class="form-group">
	<label for="nombres">Nombre</label>
	<input type="text" name="nombres" class="form-control" required value="{{$Cliente->nombres}}">	
</div>

<div class="form-group">
	<label for="paterno">Apellido paterno</label>
	<input type="text" name="paterno" class="form-control" required value="{{$Cliente->paterno}}">	
</div>

<div class="form-group">
	<label for="materno">Apeliido materno</label>
	<input type="text" name="materno" class="form-control" required value="{{$Cliente->materno}}">	
</div>

<div class="form-group">
	<label for="fecha_nacimiento">Fecha de nacimiento</label>
	<input type="date" name="fecha_nacimiento" class="form-control" required value="{{$Cliente->fecha_nacimiento}}">	
</div>
<div class="form-group">
	<label for="sexo">Sexo</label>
	<input type="text" name="sexo" class="form-control" required value="{{$Cliente->sexo}}">	
</div>

<div class="form-group">
	<label for="telefono">Telefono</label>
	<input type="text" name="telefono" class="form-control" required value="{{$Cliente->telefono}}">	
</div>

<div class="form-group">
	<label for="celular">Celular</label>
	<input type="text" name="celular" class="form-control" required value="{{$Cliente->celular}}">	
</div>

<div class="form-group">
	<label for="usuario">Usuario</label>
	<input type="text" name="usuario" class="form-control" required value="{{$Cliente->usuario}}">	
</div>

<div class="form-group">
	<label for="contraseña">contraseña</label>
	<input type="text" name="contraseña" class="form-control" required value="{{$Cliente->contraseña}}">	
</div>

<div class="form-group">
	<label for="direccion">direccion</label>
	<input type="text" name="direccion" class="form-control" required value="{{$Cliente->direccion}}">	
</div>

<div class="form-group">
	<label for="correo">correo</label>
	<input type="text" name="correo" class="form-control" required value="{{$Cliente->correo}}">	
</div>

<div class="form-group">
	<label for="cargo">cargo</label>
	<input type="text" name="cargo" class="form-control" required value="{{$Cliente->cargo}}">	
</div>

<div class="form-group">
	<label for="sueldo">sueldo</label>
	<input type="text" name="sueldo" class="form-control" required value="{{$Cliente->sueldo}}">	
</div>

<div class="form-group">
	<label for="fecha_inicio">Fecha de inicio</label>
	<input type="date" name="fecha_inicio" class="form-control" required value="{{$Cliente->fecha_inicio}}">	
</div>

<div class="form-group">
	<label for="fecha_fin">fecha de fin</label>
	<input type="text" name="fecha_fin" class="form-control" required value="{{$Cliente->fecha_fin}}">	
</div>

<div class="from-group">
	<button class="btn btn-primary" type="submit">guardar</button>
	

</div>
{!!Form::close()!!}



@endsection