@extends ('layouts.admin')
@section ('contenido')
<section class="content-header">
	<h1 style="margin-top: 55px;">
		Panel de Administrador
		<small>Version 2.3.0</small>
    </h1>
    <ol class="breadcrumb" style="margin-top: 55px;">
    	<li>
    		<a href="#">
    		<i class="fas fa-users"></i> Clientes</a>
    	</li>
    	<li class="active">Lista Clientes</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border" style="padding: 10px !important">
					<h4>
						<strong style="font-weight: 400">
							<i class="fas fa-list-ul"></i> Listado de Clientes Fiemec
						</strong>
					</h4>
					<div class="ibox-title-buttons pull-right">
						<a href="{{route('clientes-create')}}" style="text-decoration: none !important">
							<button class="btn btn-block btn-success" style="background-color: #18A689 !important;">
								<i class="fas fa-plus-circle"></i> Nuevo Clilente
							</button></a>
					</div>
				</div>
                <!-- /.box-header -->
				<div class="box-body">
					<table id="example" class="table table-striped table-bordered table-hover" style="width:100%;font-size: 11px !important">
				       <thead>
				            <tr>
				                <th>Documento</th>
				                <th>Nro Documento</th>
				                <th>Nombre</th>
				                <th>Telefono / Celular</th>
				                <th>Correo</th>
				                <th>Dirección</th>
				                <th>Acciones</th>
				            </tr>
				        </thead>
				        <tbody>
				        	@foreach($clientes as $cli)
				        	<tr>
								<td>{{$cli->tipo_documento}}</td>
								<td>{{$cli->nro_documento}}</td>
								<td>{{$cli->nombres_Rs.' '.$cli->paterno.' '.$cli->materno }}</td>
								<td>{{$cli->telefono.' / '.$cli->celular}}</td>
								<td>{{$cli->correo}}</td>
								<td>{{$cli->Direccion}}</td>
				        		<td align="center">
				        			<a  href=""  data-target="#modal-show-{{$cli->idCliente}}"  data-toggle="modal" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="left" title="Ver Cliente"><i class="far fa-eye"></i> </a>
									<a href="{{route('clientes-edit',$cli->idCliente)}}" class="btn btn-success btn-xs" role="button"><i class="fas fa-edit" title="Editar Producto"></i> </a>
									<a href="" data-target="#modal-delete-{{$cli->idCliente}}"  data-toggle="modal" class="btn btn-danger btn-xs" title="Eliminar Producto"><i class="fas fa-trash-alt"></i> </a>
								</td>
							</tr>
							@include('proforma.cliente.modal')
							@include('proforma.cliente.show')
							@endforeach
				        </tbody>
    				</table>
				</div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
</section><!-- /.content -->
@endsection

<!-- COMENTARIOS
-Codigo de pedido ira en el detalle catalogo
-Foto ira en el detalle catalogo
-fecha de sistema de registro ira en el detalle catalogo  -->