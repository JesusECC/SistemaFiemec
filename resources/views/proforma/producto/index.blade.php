@extends ('layouts.admin')
@section ('contenido')
<div class='col-lg-8 col-sm-8 col-xs-12'>
	<h3> Control de Productos <a href="producto/create"> <button class="btn btn-success">Nuevo</button></a></h3>
	
	@include('proforma.producto.search')
</div>
<div class='row'>
	<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
		<div class="table-responsive">
			<table class=" table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Nº Serie</th>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Marca</th>
                    <th>Descripcion</th>
                    <th>Precio</th>                					
				</thead>

				@foreach ($productos as $pro)
				<tr>

					

					<td>{{$pro->serie_producto}}</td>
					<td>{{$pro->codigo_producto}}</td>
					<td>{{$pro->nombre_producto}}</td>
					<td>{{$pro->marca_producto}}</td>
					<td>{{$pro->descripcion_producto}}</td>
					<td>S/. {{$pro->precio_unitario}}</td>
					<td>

					<a href="{{route('producto.edit',$pro->idProducto)}}"><button class="btn btn-info">editar</button>
					</a>
					<a href="" data-target="#modal-delete-{{$pro->idProducto}}" data-toggle="modal"><button class="btn btn-danger">eliminar</button></a>
					</td>
					
					
					
					
				</tr>
				@include('proforma.producto.modal')
             @endforeach
			</table>
		</div>
		<!--para la paginacion-->
		{{$productos->render()}}
	</div>
</div>

@endsection

<!-- COMENTARIOS
-Codigo de pedido ira en el detalle catalogo
-Foto ira en el detalle catalogo
-fecha de sistema de registro ira en el detalle catalogo  -->