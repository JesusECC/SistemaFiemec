@extends ('layouts.admin')
@section ('contenido')
<div class="container" id="detalleproducto">
	@foreach($detalleproducto as $p)
	<div class="row">
		<div class="col-lg-11">
			<blockquote>
				<h2>{{$p->nombre_producto}}</h2>
			</blockquote>
			<hr>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-5">
					<img src="http://www.repairservo.com/images/abb-img.jpg" alt="..." class="img-thumbnail">
				</div>
				<div class="col-lg-6">
					<form>
						<fieldset disabled>						
						  <div class="form-group col-lg-4">
						    <label for="exampleInputEmail1">Serie Producto</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$p->serie_producto}}">
						  </div>
						  <div class="form-group col-lg-4">
						    <label for="exampleInputEmail1">Código Pedido</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$p->codigo_pedido}}">
						  </div>
						  <div class="form-group col-lg-4">
						    <label for="exampleInputEmail1">Código Producto</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$p->codigo_producto}}">
						  </div>
						  <div class="form-group col-lg-9">
						    <label for="exampleInputEmail1">Nombre de Producto</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$p->nombre_producto}}">
						  </div>
						  <div class="form-group col-lg-3">
						    <label for="exampleInputEmail1">Marca</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$p->marca_producto}}">
						  </div>
						  <div class="form-group col-lg-9">
						    <label for="exampleInputEmail1">Descripción</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$p->descripcion_producto}}">
						  </div>
						  <div class="form-group col-lg-3">
						    <label for="exampleInputEmail1">Precio</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="S/. {{$p->precio_unitario}}">
						  </div>
						  <div class="form-group col-lg-4">
						    <label for="exampleInputEmail1">Fecha</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$p->fecha_sistema}}">
						  </div>
						  <div class="form-group col-lg-4">
						    <label for="exampleInputEmail1">Estado</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$p->estado}}">
						  </div>
						  <div class="form-group col-lg-4">
						    <label for="exampleInputEmail1">Categoria</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$p->categoria_producto}}">
						  </div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection