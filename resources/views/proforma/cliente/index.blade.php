@extends ('layouts.admin')
@section ('contenido')
<div class='col-lg-8 col-sm-8 col-xs-12'>
	<h3> Control de Cliente <a href="cliente/create"> <button class="btn btn-success">Nuevo</button></a></h3></h3>
	
	@include('proforma.cliente.search')
</div>
<div class='row'>
	<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
		<div class="table-responsive">
			<table class=" table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					
					<th>Tipo Documento</th>
					<th>Nro Documento</th>
					<th>Nombre</th>
                    <th>Telefono / Celular</th>
					
					<th>Correo</th>
	  			    <th>Direccion</th>
	                

	                
	     					
				</thead>

	
				@foreach ($clientes as $cli)
				
				<tr>

					
					
					<td>{{$cli->tipo_documento}}</td>
					<td>{{$cli->nro_documento}}</td>
					<td>{{$cli->nombres_Rs.' '.$cli->paterno.' '.$cli->materno }}</td>
					<td>{{$cli->telefono.' / '.$cli->celular}}</td>
					<td>{{$cli->correo}}</td>
					<td>{{$cli->Direccion}}</td>

					<td>
					<a href="{{URL::action('ControllerClientes@show',$cli->idCliente)}}"><button class="btn btn-info">ver</button>
					</a>
					<td>
					<a href="{{URL::action('ControllerClientes@edit',$cli->idCliente)}}"><button class="btn btn-info">editar</button>
					</a>
					<a href="" data-target="#modal-delete-{{$cli->idCliente}}" data-toggle="modal"><button class="btn btn-danger">eliminar</button></a>
					</td>
					
				</tr>
				@include('proforma.cliente.modal')
             @endforeach
			</table>
		</div>
		{{$clientes->render()}}
	</div>
</div>

@endsection

<!-- COMENTARIOS
-Codigo de pedido ira en el detalle catalogo
-Foto ira en el detalle catalogo
-fecha de sistema de registro ira en el detalle catalogo  -->