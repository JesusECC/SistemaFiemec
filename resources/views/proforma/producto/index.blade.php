
@extends ('layouts.admin')
@section ('contenido')
<div class='col-lg-12 col-sm-12 col-xs-12'>
	<h3> Control de Productos <a href="{{route('producto-create')}}"> <button class="btn btn-success">Nuevo</button></a></h3>
	
	@include('proforma.producto.search')
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class=" table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th align="center">Nº Serie</th>
					<th align="center">Codigo</th>
					<th align="center">Nombre</th>
					<th align="center">Marca</th>		
                    <th align="center">Precio</th>
                    <th align="center">Opciones</th>
				</thead>
				<tbody>
					@foreach($productos as $pro)
					<tr>
						<td>
							{{$pro->serie_producto}}
						</td>
						<td>
							{{$pro->codigo_producto}}
						</td>
						<td>
							{{$pro->nombre_producto}}
						</td>
						<td>
							{{$pro->marca_producto}}
						</td>
						<td>
							S/. {{$pro->precio_unitario}}
						</td>
						<td align="center">
							<a  href=""  data-target="#modal-show-{{$pro->idProducto}}"  data-toggle="modal" class="btn btn-primary"><i class="far fa-eye"></i> Ver</a>
							<a href="{{route('producto-edit',$pro->idProducto)}}" class="btn btn-success" role="button"><i class="fas fa-edit"></i> Editar</a>
							<a href="" data-target="#modal-delete-{{$pro->idProducto}}"  data-toggle="modal" class="btn btn-danger" ><i class="fas fa-trash-alt"></i> Eliminar</a>
						</td>
					</tr>
					@include('proforma.producto.modal')
	  				@include('proforma.producto.modal-producto')
					@endforeach
				</tbody>
			</table>
		</div>
		{{$productos->render()}}
	</div>
</div>
@endsection

