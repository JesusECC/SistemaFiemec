@extends ('layouts.admin')
@section ('contenido')
<!--se copia-->
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
    	<li class="active">Lista de Proformas de Servicios </li>
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
							<i class="fas fa-list-ul"></i> Lista de Proforma Servicios
						</strong>
					</h4>
					<div class="ibox-title-buttons pull-right">
						<a href="{{route('servicio-create')}}" style="text-decoration: none !important">
							<button class="btn btn-block btn-success" style="background-color: #18A689 !important;">
								<i class="fas fa-plus-circle"></i> Nuevo Servicio
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
								<th>opciones</th>
				            </tr>
				        </thead>
				        <tbody>
				        	@foreach ($servicios as $prof)
				        	<tr>	
								<td>			        		
									{{$prof->fecha_hora}}
								</td>
								<td>
				        			{{$prof->serie_proforma.' /  f000-'.$prof->idProforma}}
				        		</td>
				        		<td>
									{{$prof->nombres_Rs}}

									{{$prof->nombres_Rs.''.$prof->paterno.''.$prof->materno}}

				        		</td>
				        		<td align="center" style="width: 220px">
				        			<div class="pull-right box-tools">
				        				<a  href="{{route('servicio-show',$prof->idProforma)}}" class="btn btn-primary btn-xs"  title="Ver Producto"><i class="far fa-eye"></i> Ver </a>
				        				<a href="{{route('servicios-edit',$prof->idProforma)}}" class="btn btn-success btn-xs" role="button"><i class="fas fa-edit" title="Editar Producto"></i> Editar </a>
				        				<a href="" data-target="#modal-delete-{{$prof->idProforma}}" class="btn btn-danger btn-xs" data-toggle="modal" title="Eliminar Producto"><i class="fas fa-trash-alt"></i> Eliminar</a>
				        				
										<div class="btn-group">
				        					<button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
				        						<i class="far fa-file-pdf" title="PDF"></i>
				        					</button>
				        					<ul class="dropdown-menu pull-right" role="menu">
				        						<li>
				        							<a target="_blank" href="{{URL::action('ControllerProformaServicio@pdf',$prof->idProforma)}}"><i class="far fa-file-pdf"></i> PDF Soles</a>
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
					{{$servicios->render()}}
				</div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
</section><!-- /.conte-->
@endsection