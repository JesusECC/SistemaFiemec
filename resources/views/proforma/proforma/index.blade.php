@extends ('layouts.admin')
@section ('contenido')
<!--primera parte de la vista panel brand-->
<section class="content-header">
	<h1 style="margin-top: 55px;">
		Panel de Administrador
		<small>Version 2.3.0</small>
    </h1>
    <ol class="breadcrumb" style="margin-top: 55px;">
    	<li>
    		<a href="#">
    			<i class="fas fa-clipboard-check"></i> Proforma</a>
    	</li>
    	<li class="active">Lista de Proformas Unitarias</li>
    </ol>
</section>
<!--fin de la primera parte de la vista panel brand-->
<!-- cuerpo del box-->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border" style="padding: 10px !important">
					<h4>
						<strong style="font-weight: 400">
							<i class="fas fa-list-ul"></i> Lista de Proformas Unitarias
						</strong>
					</h4>
					<div class="ibox-title-buttons pull-right">
						<a href="{{route('proforma-create')}}" style="text-decoration: none !important">
							<button class="btn btn-block btn-success" style="background-color: #18A689 !important;">
								<i class="fas fa-plus-circle"></i> Nuevo Proforma
							</button></a>
					</div>
				</div>
                <!-- /.box-header -->
				<div class="box-body">
					<table id="example" class="table table-striped table-bordered table-hover" style="width:100%;font-size: 11px !important">
				       <thead>
				            <tr>
								<th>fecha</th>
								<th>Comprobante</th>
								<th>Nombre</th>
								<th>Acciones</th>
				            </tr>
				        </thead>
				        <tbody>
				        	@foreach ($proformas as $prof)
				        	<tr>
				        		<td>
				        			{{$prof->fecha_hora}}
				        		</td>
				        		<td>
				        			{{$prof->serie_proforma.' /  f000-'.$prof->idProforma}}
				        		</td>
				        		<td>
				        			{{$prof->nombres_Rs.' '.$prof->paterno.' '.$prof->materno}}
				        		</td>
				        		<td align="center" style="width: 220px">
				        			<div class="pull-right box-tools">
				        				<a  href="{{route('proforma-show',$prof->idProforma)}}" class="btn btn-primary btn-xs"  title="Ver Producto"><i class="far fa-eye"></i> Ver </a>
				        				<a href="{{route('proforma-edit',$prof->idProforma)}}" class="btn btn-success btn-xs" role="button"><i class="fas fa-edit" title="Editar Producto"></i> Editar </a>
				        				<a href="" data-target="#modal-delete-{{$prof->idProforma}}" class="btn btn-danger btn-xs" data-toggle="modal" title="Eliminar Proforma"><i class="fas fa-trash-alt"></i> Eliminar</a>
				        				<div class="btn-group">
				        					<button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" saria-expanded="true">
				        						<i class="far fa-file-pdf" title="PDF"></i>
				        					</button>
				        					<ul class="dropdown-menu pull-right" role="menu">
				        						<li>
				        							<a target="_blank" href="{{URL::action('ControllerProformaUnitaria@pdf',$prof->idProforma)}}"><i class="far fa-file-pdf"></i> PDF Soles</a>
				        							<a target="_blank" href="{{URL::action('ControllerProformaUnitaria@pdf2',$prof->idProforma)}}"> <i class="far fa-file-pdf"></i> PDF Dolares</a>
				        						</li>
				        					</ul>
				        				</div>

				        			</div>							
								</td>
							</tr>
							@include('proforma.proforma.modal')
							@endforeach
				        </tbody>
    				</table>
    				{{$proformas->render()}}
				</div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
</section><!-- /.content -->
<!--fin del cuerpo del box-->


@endsection