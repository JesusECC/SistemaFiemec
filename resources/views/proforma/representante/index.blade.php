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
    		<i class="fas fa-users"></i> Representantes</a>
    	</li>
    	<li class="active">Lista Representantes</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border" style="padding: 10px !important">
					<h4>
						<strong style="font-weight: 400">
							<i class="fas fa-list-ul"></i> Lista de Representantes
						</strong>
					</h4>
					<div class="ibox-title-buttons pull-right">
						<a href="{{url('proforma/representante/create')}}" style="text-decoration: none !important">
							<button class="btn btn-block btn-success" style="background-color: #18A689 !important;">
								<i class="fas fa-plus-circle"></i> Nuevo Representante
							</button></a>
					</div>
				</div>
                <!-- /.box-header -->
				<div class="box-body">
					<table id="example" class="table table-striped table-bordered table-hover" style="width:100%;font-size: 11px !important">
				       <thead>
				            <tr>
							    <th>Tipo Documento</th>
							    <th>Nombre Cliente</th>
				                <th>Documento</th>
				                
								<th>Nombre Representante</th>
								<th>Telefono</th>
								<th>Opciones</th>
								
								
				               
				            </tr>
				        </thead>
				        <tbody>
				        	@foreach($representantes as $re)
				        	<tr>
							    <td>{{$re->tipo_doc}}</td>
								<td>{{$re->nombres_Rs}}</td>
								<td>{{$re->nro_doc_RE}}</td>
								<td>{{$re->nombre_RE}}</td>
								<td>{{$re->telefonoRE.' / '.$re->CelularRE}}</td>
								<td align="center">
				        			
									<a href="{{URL::action('ControllerClienteRE@edit',$re->idCR)}}" class="btn btn-success btn-xs" role="button"><i class="fas fa-edit" title="Editar Producto"></i> </a>
									<a href="" data-target="#modal-delete-{{$re->idCR}}"  data-toggle="modal" class="btn btn-danger btn-xs" title="Eliminar Producto"><i class="fas fa-trash-alt"></i> </a>
								</td>
								
							</tr>
						    @include('proforma.representante.modal')
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