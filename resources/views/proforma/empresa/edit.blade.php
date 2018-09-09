@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<h3>Modificar Cliente Empresa:{{$empresa->nombres_Rs.' '.$empresa->paterno.' '.$empresa->materno }}</h3>
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

    {!!Form::model($empresa,['method'=>'PATCH','route'=>['empresa.update',$empresa->idCliente]])!!}
    {{Form::token()}}



<div class="form-group">
	<label for="nro_documento">NUmero Documento</label>
	<input type="text" name="nro_documento" class="form-control" required value="{{$empresa->nro_documento}}">	
</div>

<div class="form-group">
	<label for="nombres">Nombre</label>
	<input type="text" name="nombres_Rs" class="form-control" required value="{{$empresa->nombres_Rs}}">	
</div>





<div class="form-group">
	<label for="telefono">Telefono</label>
	<input type="text" name="telefono" class="form-control" required value="{{$empresa->telefono}}">	
</div>

<div class="form-group">
	<label for="celular">Celular</label>
	<input type="text" name="celular" class="form-control" required value="{{$empresa->celular}}">	
</div>

<div class="form-group">
	<label for="cuenta_1">Numero Cuenta 1</label>
	<input type="text" name="cuenta_1" class="form-control" required value="{{$empresa->cuenta_1}}">	
</div>
<div class="form-group">
	<label for="cuenta_2">Numero Cuenta 2</label>
	<input type="text" name="cuenta_2" class="form-control" required value="{{$empresa->cuenta_2}}">	
</div>
<div class="form-group">
	<label for="cuenta_3">Numero Cuenta 3</label>
	<input type="text" name="cuenta_3" class="form-control" required value="{{$empresa->cuenta_3}}">	
</div>
<div class="form-group">
	<label for="Departamento">Departamento</label>
	<input type="text" name="Departamento" class="form-control" required value="{{$empresa->Departamento}}">	
</div>
<div class="form-group">
	<label for="Distrito">Distrito</label>
	<input type="text" name="Distrito" class="form-control" required value="{{$empresa->Distrito}}">	
</div>
<div class="form-group">
	<label for="Direccion">direccion</label>
	<input type="text" name="Direccion" class="form-control" required value="{{$empresa->Direccion}}">	
</div>
<div class="form-group">
	<label for="Referencia">Referencia</label>
	<input type="text" name="Referencia" class="form-control" required value="{{$empresa->Referencia}}">	
</div>

<div class="form-group">
	<label for="correo">correo</label>
	<input type="text" name="correo" class="form-control" required value="{{$empresa->correo}}">	
</div>






<div class="from-group">
	<button class="btn btn-primary" type="submit">guardar</button>
	

</div>
{!!Form::close()!!}



@endsection