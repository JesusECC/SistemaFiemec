@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<h3>Nuevo Empleado </h3>
	@if (count($errors)>0)
	<div class="alert-alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			    <li>{{$error}}</li>
			@endforeach 
		</ul>	
    </div>
    @endif
<!-- mantener valores al -->
    {!!Form::open(array('url'=>'proforma/empleado','method'=>'POST','autocomplete'=>'off'))!!}

    {{Form::token()}}

	
<div class="form-group">
	<label for="nro_documento">Numero Documento</label>
	<input type="text" name="nro_documento" class="form-control" placeholder="Ingrese el Codigo Documento">	
</div>
<div class="form-group">
	<label for="nombres">Nombres</label>
	<input type="text" name="nombres" class="form-control" placeholder="Ingrese Nombres">	
</div>
<div class="form-group">
	<label for="paterno">Paterno</label>
	<input type="text" name="paterno" class="form-control" placeholder="Ingrese el Apellido Paterno">	
</div>
<div class="form-group">
	<label for="materno">Materno</label>
	<input type="text" name="materno" class="form-control" placeholder="Ingrese el Apellido Materno">	
</div>

<div class="form-group">
	<label for="fecha_nacimiento">Fecha Nacimiento</label>
	<input type="date" name="fecha_nacimiento" class="form-control" placeholder="Ingrese Fecha nacimiento">	
</div>

<div class="from-group">
	    <label>Sexo</label>
	    <select name="sexo" class="form-control">
	    	<option ></option>
			<option value="Hombre">Hombre</option>
			<option value="Mujer">Mujer</option>
			
		</select>
	</div>



<div class="form-group">
	<label for="telefono">Telefono</label>
	<input type="text" name="telefono" class="form-control" placeholder="Ingrese el telefono">	
</div>

<div class="form-group">
	<label for="celular">Celular</label>
	<input type="text" name="celular" class="form-control" placeholder="Ingrese el  celular">	
</div>


<div class="form-group">
	<label for="direccion">Direccion</label>
	<input type="text" name="direccion" class="form-control" placeholder="Ingrese la direccion">	
</div>

<div class="form-group">
	<label for="correo">Correo</label>
	<input type="text" name="correo" class="form-control" placeholder="Ingrese Correo Electronico">	
</div>

<div class="from-group">
	    <label>Cargo</label>
	    <select name="cargo" class="form-control">
	    	<option ></option>
			<option value="Administrador">Administrador</option>
			<option value="Logistica">Logistica</option>
			<option value="Finanzas">Finanzas</option>
			<option value="Vendedor">Vendedor</option>
			<option value="Almacen">Almacen</option>
		</select>
	</div>




<div class="form-group">
	<label for="sueldo">Sueldo</label>
	<input type="text" name="sueldo" class="form-control" placeholder="Ingrese el sueldo">	
</div>

<div class="form-group">
	<label for="fecha_inicio">Fecha Inicio</label>
	<input type="date" name="fecha_inicio" class="form-control" placeholder="Ingrese Fecha Inicio">	
</div>

<div class="form-group">
	<label for="fecha_fin">Fecha Final</label>
	<input type="date" name="fecha_fin" class="form-control" placeholder="Ingrese Fecha Final">	
</div>

<!-- JOSE CORRIGE EL MARGIN DEL BOTON VOLVER CTMR!!!! -->
<div style="margin-top: 20px" class="from-group ">

	<button class="btn btn-primary" type="submit">guardar</button>
	<button class="btn btn-danger" type="reset">Limpiar</button>
	<button style="margin-left: 300px" class="btn btn-success " type="button"><a style="color: white!important" href="{{url('proforma/empleado')}}">volver</a></button>


</div>

</div>


{!!Form::close()!!}

</div>


@endsection