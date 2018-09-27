@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	
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

{!!Form::model($proveedor,['method'=>'PATCH','route'=>['proveedor.update',$proveedor->idCliente]])!!}
    {{Form::token()}}

<div class="form-group">

	<label>Tipo Documento</label>
	<select name="tipo_documento" class="form-control">
		@if($proveedor->tipo_documento=='RUC')
	   <option value="RUC" selected>RUC</option>
	   <option value="DNI">DNI</option>
	   
	   @else($proveedor->tipo_documento=='DNI')
	   
	   <option value="RUC">RUC</option>
	   <option value="DNI" selected>DNI</option>
	   @endif
	</select>
</div>

<div class="form-group">
	<label for="nro_documento">NUmero Documento</label>
	<input type="text" name="nro_documento" class="form-control" required value="{{$proveedor->nro_documento}}">	
</div>

<div class="form-group">
	<label for="nombres_Rs">Nombre</label>
	<input type="text" name="nombres_Rs" class="form-control" required value="{{$proveedor->nombres_Rs}}">	
</div>
<div class="form-group">
	<label for="telefono">Telefono</label>
	<input type="text" name="telefono" class="form-control" required value="{{$proveedor->telefono}}">	
</div>

<div class="form-group">
	<label for="celular">Celular</label>
	<input type="text" name="celular" class="form-control" required value="{{$proveedor->celular}}">	
</div>

<div class="form-group">
	<label for="correo">Correo</label>
	<input type="text" name="correo" class="form-control" required value="{{$proveedor->correo}}">	
</div>

<div class="form-group">
	<label for="cuenta_1">cuenta_1</label>
	<input type="text" name="cuenta_1" class="form-control" required value="{{$proveedor->cuenta_1}}">	
</div>
<div class="form-group">
	<label for="cuenta_2">cuenta_2</label>
	<input type="text" name="cuenta_2" class="form-control" required value="{{$proveedor->cuenta_2}}">	
</div>
<div class="form-group">
	<label for="cuenta_3">cuenta_3</label>
	<input type="text" name="cuenta_3" class="form-control" required value="{{$proveedor->cuenta_3}}">	
</div>
<div class="form-group">
	<label for="Departamento">Departamento</label>
	<input type="text" name="Departamento" class="form-control" required value="{{$proveedor->Departamento}}">	
</div>

<div class="form-group">
	<label for="Distrito">Distrito</label>
	<input type="text" name="Distrito" class="form-control" required value="{{$proveedor->Distrito}}">	
</div>
<div class="form-group">
	<label for="Direccion">Direccion</label>
	<input type="text" name="Direccion" class="form-control" required value="{{$proveedor->Direccion}}">	
</div>
<div class="form-group">
	<label for="Referencia">Referencia</label>
	<input type="text" name="Referencia" class="form-control" required value="{{$proveedor->Referencia}}">	
</div>
<div class="form-group">
	<label for="correo">correo</label>
	<input type="text" name="correo" class="form-control" required value="{{$proveedor->correo}}">	
</div>


<div class="from-group">
	<button class="btn btn-primary" type="submit">guardar</button>
</div>
{!!Form::close()!!}

@endsection