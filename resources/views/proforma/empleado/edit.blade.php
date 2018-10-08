@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<h3>Modificar Trabajador:{{$Empleado->nombres.' '.$Empleado->paterno.' '.$Empleado->materno }}</h3>
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

    {!!Form::model($Empleado,['method'=>'PATCH','route'=>['empleado.update',$Empleado->id]])!!}
    {{Form::token()}}


<div class="form-group">
	<label>Tipo Documento</label>
	<select name="tipo_documento" class="form-control">
		@if($Empleado->tipo_documento=='RUC')
	   <option value="RUC" selected>RUC</option>
	   <option value="DNI">DNI</option>
	   
	   @else($Empleado->tipo_documento=='DNI')
	   
	   <option value="RUC">RUC</option>
	   <option value="DNI" selected>DNI</option>
	   @endif
	</select>
</div>

<div class="form-group">
	<label for="nro_documento">NUmero Documento</label>
	<input type="text" name="nro_documento" class="form-control" required value="{{$Empleado->nro_documento}}">	
</div>

<div class="form-group">
	<label for="nombres">Nombre</label>
	<input type="text" name="nombres" class="form-control" required value="{{$Empleado->nombres}}">	
</div>

<div class="form-group">
	<label for="paterno">Apellido paterno</label>
	<input type="text" name="paterno" class="form-control" required value="{{$Empleado->paterno}}">	
</div>

<div class="form-group">
	<label for="materno">Apeliido materno</label>
	<input type="text" name="materno" class="form-control" required value="{{$Empleado->materno}}">	
</div>

<div class="form-group">
	<label for="fecha_nacimiento">Fecha de nacimiento</label>
	<input type="date" name="fecha_nacimiento" class="form-control" required value="{{$Empleado->fecha_nacimiento}}">	
</div>
<div class="form-group">
	<label for="sexo">Sexo</label>
	<input type="text" name="sexo" class="form-control" required value="{{$Empleado->sexo}}">	
</div>

<div class="form-group">
	<label for="telefono">Telefono</label>
	<input type="text" name="telefono" class="form-control" required value="{{$Empleado->telefono}}">	
</div>

<div class="form-group">
	<label for="celular">Celular</label>
	<input type="text" name="celular" class="form-control" required value="{{$Empleado->celular}}">	
</div>

<div class="form-group">
	<label for="usuario">Usuario</label>
	<input type="text" name="usuario" class="form-control" required value="{{$Empleado->usuario}}">	
</div>

<div class="form-group">
	<label for="contraseña">contraseña</label>
	<input type="text" name="contraseña" class="form-control" required value="{{$Empleado->contraseña}}">	
</div>

<div class="form-group">
	<label for="direccion">direccion</label>
	<input type="text" name="direccion" class="form-control" required value="{{$Empleado->direccion}}">	
</div>

<div class="form-group">
	<label for="correo">correo</label>
	<input type="text" name="correo" class="form-control" required value="{{$Empleado->correo}}">	
</div>
	
<div class="from-group">
	<button class="btn btn-primary" type="submit">guardar</button>
	

</div>
{!!Form::close()!!}



@endsection