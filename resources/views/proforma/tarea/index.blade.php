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
    			<i class="fas fa-dolly"></i> Tarea</a>
    	</li>
    	<li class="active">Lista Tarea</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border" style="padding: 10px !important">
					<h4>
						<strong style="font-weight: 400">
							<i class="fas fa-list-ul"></i> Lista de Tareas
						</strong>
					</h4>
					<div class="ibox-title-buttons pull-right">
						<a href="{{url('proforma/tarea/create')}}" style="text-decoration: none !important">
							<button class="btn btn-block btn-success" style="background-color: #18A689 !important;">
								<i class="fas fa-plus-circle"></i> Nueva de Tarea
							</button></a>
					</div>
				</div>
                <!-- /.box-header -->
				<div class="box-body">
					<table id="example" class="table table-striped table-bordered table-hover" style="width:100%;font-size: 11px !important">
				       <thead>
				            <tr>
				            	
				                <th>Nombre</th>
				                <th>Precio</th>
				                <th>Opciones</th>
				            </tr>
				        </thead>
				        <tbody>
				@foreach ($tareas as $ta)
				
				<tr>

					
					
					<td>{{$ta->nombre_tarea}}</td>
					
					<td>S/. {{$ta->precioT}}</td>
					
					
					
					
					<td>
					<a href="{{URL::action('ControllerTarea@edit',$ta->idTarea)}}"class="btn btn-success btn-xs" role="button"><i class="fas fa-edit" title="Editar Producto"></i> 
		    </a>
					</a>
					<a href="" data-target="#modal-delete-{{$ta->idTarea}}" data-toggle="modal" class="btn btn-danger btn-xs" title="Eliminar Producto"><i class="fas fa-trash-alt"></i>
						
					
				</tr>
				@include('proforma.tarea.modal')
             @endforeach
             </tbody>
			</table>
			{{$tareas->render()}}
			</div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
</section>
@endsection

