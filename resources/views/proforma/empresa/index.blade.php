@extends ('layouts.admin')
@section ('contenido')
<div class='col-lg-8 col-sm-8 col-xs-12'>
	<h3> Control de Clientes Empresa <a href="empresa/create"> <button class="btn btn-success">Nuevo</button></a></h3></h3>
	
	@include('proforma.empresa.search')
</div>
<div class='row'>
	<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
		<div class="table-responsive">
			<table class=" table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					
					
					<th>Numero Documento</th>
					<th>Nombre</th>
                    <th>Telefono / Celular</th>					
					<th>Correo</th>
	  			    <th>Direccion</th>
	                

	                
	     					
				</thead>

	
				@foreach ($empresas as $em)
				
				<tr>

					
					
					<td>{{$em->tipo_documento.' : '.$em->nro_documento}}</td>
					
					<td>{{$em->nombres_Rs}}</td>
					<td>{{$em->telefono.' / '.$em->celular}}</td>
					<td>{{$em->correo}}</td>
					<td>{{$em->Direccion.' '.$em->Departamento.' '.$em->Distrito}}</td>

					<td>
					<a href="{{URL::action('ControllerEmpresa@show',$em->idCliente)}}"><button class="btn btn-info">ver</button>
					</a>
					<td>
					<a href="{{URL::action('ControllerEmpresa@edit',$em->idCliente)}}"><button class="btn btn-info">editar</button>
					</a>
					<a href="" data-target="#modal-delete-{{$em->idCliente}}" data-toggle="modal"><button class="btn btn-danger">eliminar</button></a>
					</td>
					
				</tr>
				@include('proforma.empresa.modal')
             @endforeach
			</table>
		</div>
		{{$empresas->render()}}
	</div>
</div>

@endsection

<!-- COMENTARIOS
-Codigo de pedido ira en el detalle catalogo
-Foto ira en el detalle catalogo
-fecha de sistema de registro ira en el detalle catalogo  -->