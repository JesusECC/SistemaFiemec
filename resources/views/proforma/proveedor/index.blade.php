@extends ('layouts.admin')
@section ('contenido')
<div class='col-lg-8 col-sm-8 col-xs-12'>
	<h3> Control de Proveedor <a href="proveedor/create"> <button class="btn btn-success">Nuevo</button></a></h3></h3>
	
	@include('proforma.proveedor.search')
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

	
				@foreach ($proveedores as $pr)
				
				<tr>

					<td>{{$pr->tipo_documento}}</td>
					<td>{{$pr->nro_documento}}</td>
					<td>{{$pr->nombres_Rs}}</td>
					<td>{{$pr->telefono.' / '.$pr->celular}}</td>
					<td>{{$pr->correo}}</td>
					<td>{{$pr->Direccion}}</td>

					<td>
					<a href="{{URL::action('ControllerProveedor@show',$pr->idCliente)}}"><button class="btn btn-info">ver</button>
					</a>
					<td>
					<a href="{{URL::action('ControllerProveedor@edit',$pr->idCliente)}}"><button class="btn btn-info">editar</button>
					</a>
					<a href="" data-target="#modal-delete-{{$pr->idCliente}}" data-toggle="modal"><button class="btn btn-danger">eliminar</button></a>
					</td>
					
				</tr>
				@include('proforma.proveedor.modal')
             @endforeach
			</table>
		</div>
		{{$proveedores->render()}}
	</div>
</div>

@endsection

