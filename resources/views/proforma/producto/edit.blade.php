@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<h3>Modificar Producto: {{$producto->nombre_producto}}</h3>
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

    {!!Form::model($producto,['method'=>'PATCH','route'=>['producto.update',$producto->id]])!!}
    {{Form::token()}}


<div class="form-group">

	<label for="serie_producto">Serie Producto</label>
	<input type="text" name="serie_producto" class="form-control" required value="{{$producto->serie_producto}}">
</div>
<div class="form-group">
	<label for="codigo_pedido">Codigo Pedido</label>
	<input type="text" name="codigo_pedido" class="form-control" required value="{{$producto->codigo_pedido}}">	
</div>

<div class="form-group">
	<label for="codigo_producto">Codigo Producto</label>
	<input type="text" name="codigo_producto" class="form-control" required value="{{$producto->codigo_producto}}">	

	<label for="serie_producto">Serie</label>
	<input type="text" name="serie_producto" class="form-control" required value="{{$producto->serie_producto}}">
</div>

<div class="form-group">
	<label for="nombre_producto">Nombre</label>
	<input type="text" name="nombre_producto" class="form-control" required value="{{$producto->nombre_producto}}">	
</div>



<div class="form-group">

	<label>Marca</label>
	<select name="marca_producto" class="form-control">
		@if($producto->marca_producto=='FIEMEC')
	   <option value="FIEMEC" selected>FIEMEC</option>
	   <option value="ABB">ABB</option>
	   <option value="SCHNEIDER">SCHNEIDER</option>	
	   @elseif($producto->marca_producto=='ABB')
	   <option value="FIEMEC">FIEMEC</option>
	   <option value="ABB" selected>ABB</option>
	   <option value="SCHNEIDER">SCHNEIDER</option>
	   @else($producto->marca_producto=='SCHNEIDER')
	   <option value="FIEMEC">FIEMEC</option>
	   <option value="ABB">ABB</option>
	   <option value="SCHNEIDER" selected>SCHNEIDER</option>
	   @endif
	</select>
</div>
<div class="form-group">
	<label for="stock">stock</label>
	<input type="number" name="stock" class="form-control"  value="{{$producto->stock}}">	
</div>
<div class="form-group">
	<label for="descripcion_producto">Descripcion</label>
	<input type="text" name="descripcion_producto" class="form-control" required value="{{$producto->descripcion_producto}}">	
</div>
<div class="form-group">
	<label for="precio_unitario">Precio</label>
	<input type="text" name="precio_unitario" class="form-control" required value="{{$producto->precio_unitario}}">	
</div>
<div class="form-group">

	<label>Categoria</label>
	<select name="categoria_producto" class="form-control">
		@if($producto->categoria_producto=='Catalogo')
	   <option value="Catalogo" selected>Catalogo</option>
	   <option value="Producto Fiemec">Producto Fiemec</option>
	   
	   @else($producto->categoria_producto=='Producto Fiemec')
	   <option value="Catalogo">Catalogo</option>
	   <option value="Producto Fiemec" selected>Producto Fiemec</option>
	   @endif
	</select>
</div>

<div class="from-group">
	<button class="btn btn-primary" type="submit">guardar</button>
	

</div>
{!!Form::close()!!}


@endsection