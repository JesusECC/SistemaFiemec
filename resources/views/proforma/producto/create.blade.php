@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<h3>Nuevo Producto</h3>
	@if (count($errors)>0)
	<div class="alert-alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			    <li>{{$error}}</li>
			@endforeach 
		</ul>	
    </div>
    @endif

    {!!Form::open(array('url'=>'proforma/producto','method'=>'POST','autocomplete'=>'off'))!!}

    {{Form::token()}}
<div class="form-group">
	<label for="serie_producto">Numero de serie</label>
	<input type="text" name="serie_producto" class="form-control" placeholder="Nº serie...">	
</div>
<div class="form-group">
	<label for="codigo_pedido">Codigo de Pedido</label>
	<input type="text" name="codigo_pedido" class="form-control" placeholder="codigo pedido...">	
</div>
<div class="form-group">
	<label for="codigo_producto">Codigo producto</label>
	<input type="text" name="codigo_producto" class="form-control" placeholder="codigo...">	
</div>
<div class="form-group">
	<label for="nombre_producto">Nombre producto</label>
	<input type="text" name="nombre_producto" class="form-control" placeholder="nombre...">	
</div>


	<div class="from-group">
	    <label>Marca</label>
	    <select name="marca_producto" class="form-control">
	    	<option ></option>
	    	<option value="FIEMEC">FIEMEC</option>
			<option value="ABB">ABB</option>
			<option value="Schneider">Schneider</option>
		</select>
	</div>

<div class="form-group">
	<label for="stock">stock</label>
	<input type="text" name="stock" class="form-control" placeholder="stock...">	
</div>

<div class="form-group">
	<label for="descripcion_producto">Descripcion</label>
	<input type="text" name="descripcion_producto" class="form-control" placeholder="descripcion...">	
</div>

<div class="form-group">
	<label for="precio_unitario">Precio</label>
	<input type="text" name="precio_unitario" class="form-control" placeholder="precio...">	
</div>

<div class="from-group">
	    <label>Categoria</label>
	    <select name="categoria_producto" class="form-control">
	    	<option ></option>
			<option value="Catalogo">Catalogo</option>
			<option value="Producto Fiemec">Producto Fiemec</option>
		</select>
	</div>


<!-- JOSE CORRIGE EL MARGIN DEL BOTON VOLVER CTMR!!!! -->
<div style="margin-top: 20px" class="from-group ">

	<button class="btn btn-primary" type="submit">guardar</button>
	<button class="btn btn-danger" type="reset">Limpiar</button>
	<button style="margin-left: 300px" class="btn btn-success " type="button"><a style="color: white!important" href="{{url('proforma/producto')}}">volver</a></button>


</div>

</div>


{!!Form::close()!!}

</div>


@endsection