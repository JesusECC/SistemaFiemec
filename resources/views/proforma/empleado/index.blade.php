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
    			<i class="fas fa-dolly"></i> Empleados</a>
    	</li>
    	<li class="active">Lista Fiemec</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border" style="padding: 10px !important">
					<h4>
						<strong style="font-weight: 400">
							<i class="fas fa-list-ul"></i> Listado De Empleados Fiemec
						</strong>
					</h4>
					<div class="ibox-title-buttons pull-right">
						<a href="{{route('empleado-create')}}" style="text-decoration: none !important">
							<button class="btn btn-block btn-success" style="background-color: #18A689 !important;">
								<i class="fas fa-plus-circle"></i> Nuevo Empleado
							</button></a>
					</div>
				</div>
                <!-- /.box-header -->
				<div class="box-body">
					<table id="example" class="table table-striped table-bordered table-hover" style="width:100%;font-size: 11px !important">
				       <thead>
				            <tr>
				                <th>N° Nombre</th>
				                 <th>N° Direccion</th>
				                 <th>N° Telefono</th>
				                  <th>N° Correo</th>
				                 <th>N° Cargo</th>
				               
				            </tr>
				        </thead>
				        <tbody>
				        	@foreach($Empleados as $emp)
				        	<tr>
				        		<td>
				        			{{$emp->nombre}}
				        		</td>
                               <td>
				        			{{$emp->direccion}}
				        		</td>
				        		 <td>
				        			{{$emp->fono}}
				        		</td>
				        		 <td>
				        			{{$emp->email}}
				        		</td>
                                 <td>
				        			{{$emp->nombre_cargo}}
				        		</td>
				        		
				        		<td align="center">
				        			<a  href=""  data-target="#modal-show-{{$emp->id}}"  data-toggle="modal" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="left" title="Ver Producto"><i class="far fa-eye"></i> </a>
									<a href="{{route('empleado-edit',$emp->id)}}" class="btn btn-success btn-xs" role="button"><i class="fas fa-edit" title="Editar Producto"></i> </a>
									<a href="" data-target="#modal-delete-{{$emp->id}}"  data-toggle="modal" class="btn btn-danger btn-xs" title="Eliminar Producto"><i class="fas fa-trash-alt"></i> </a>
								</td>
                            </tr>
                            @include('proforma.empleado.modal')
                            @include('proforma.empleado.show')
				        		
							@endforeach
				        </tbody>
    				</table>
    				{{$Empleados->render()}}
				</div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
</section><!-- /.content -->
@endsection

