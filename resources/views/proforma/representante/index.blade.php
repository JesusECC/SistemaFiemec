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
						<a href="{{route('representante-create')}}" style="text-decoration: none !important">
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
				                <th>Documento</th>
								<th>Nombre</th>
								<th>Telefono</th>
								
								
				               
				            </tr>
				        </thead>
				        <tbody>
				        	@foreach($representantes as $re)
				        	<tr>
							    <td>{{$re->tipo_doc}}</td>
								<td>{{$re->nro_doc_RE}}</td>
								<td>{{$re->nombre_Rs}}</td>
								<td>{{$re->telefonoRE.' / '.$re->CelularRE}}</td>
								
							</tr>
						
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