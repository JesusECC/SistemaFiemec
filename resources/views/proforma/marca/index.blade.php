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
    			<i class="fas fa-dolly"></i> Marcas</a>
    	</li>
    	<li class="active">Lista de Marcas</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border" style="padding: 10px !important">
					<h4>
						<strong style="font-weight: 400">
							<i class="fas fa-list-ul"></i> Listado De Marcas
						</strong>
					</h4>
					<div class="ibox-title-buttons pull-right">
						<a href="{{url('proforma/marca/create')}}" style="text-decoration: none !important">
							<button class="btn btn-block btn-success" style="background-color: #18A689 !important;">
								<i class="fas fa-plus-circle"></i> Nueva Marca
							</button></a>
							<a href="{{url('proforma/familia/create')}}" style="text-decoration: none !important">
							<button class="btn btn-block btn-success" style="margin-top: 15px">
								<i class="fas fa-plus-circle"></i>Asignar Familias
							</button></a>

					</div>
				</div>
                <!-- /.box-header -->
				<div class="box-body">
					<table id="example" class="table table-striped table-bordered table-hover" style="width:100%;font-size: 11px !important">
				       <thead>
				            <tr>
				                <th>Marca</th>
                                <th>Opciones</th>
				            </tr>
				        </thead>
				        <tbody>
				        	@foreach($marcas as $m)
				        	<tr>
				        		<td>
				        			{{$m->nombre_proveedor}}
				        		</td>
                               
				       
				        		<td align="center">
				      
									<a href="{{URL::action('ControllerMarca@edit',$m->idMarca)}}" class="btn btn-success btn-xs" role="button"><i class="fas fa-edit" title="Editar Marca"></i> </a>
									<a href="" data-target="#modal-delete-{{$m->idMarca}}"  data-toggle="modal" class="btn btn-danger btn-xs" title="Eliminar Marca"><i class="fas fa-trash-alt"></i> </a>
									
								</td>
                            </tr>
                           @include('proforma.marca.modal')
				        		
							@endforeach
				        </tbody>
    				</table>
    				{{$marcas->render()}}
				</div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
</section><!-- /.content -->
@endsection

