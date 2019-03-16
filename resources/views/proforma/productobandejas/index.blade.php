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
    			<i class="fas fa-dolly"></i> Productos Bandejas</a>
    	</li>
    	<li class="active">Listado de  Fiemec</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border" style="padding: 10px !important">
					<h4>
						<strong style="font-weight: 400">
							<i class="fas fa-list-ul"></i> Lista de Accesorios y Bandejas Fiemec
						</strong>
					</h4>
					<div class="ibox-title-buttons pull-right">
						<a href="{{route('productobandejas-create')}}" style="text-decoration: none !important">
							<button class="btn btn-block btn-success" style="background-color: #18A689 !important;">
								<i class="fas fa-plus-circle"></i> Nuevo Bandeja
							</button></a>
					</div>
				</div>
                <!-- /.box-header -->
				<div class="box-body">
					<table id="example" class="table table-striped table-bordered table-hover" style="width:100%;font-size: 11px !important">
				       <thead>
				            <tr>
				                <th>ID</th>
				                <th>Nombre</th>
				                <th>Promedio</th>
				               
				            </tr>
				        </thead>
				        <tbody>
				        	@foreach($producto as $pro)
				        	<tr>
				        		<td>
				        			{{$pro->idProducto}}
				        		</td>
				        		<td>
				        			{{$pro->nombre_producto}}
				        		</td>
				        		<td>
				        			{{$pro->promedio}}
				        		</td>
				        		<td align="center">
									<a href="{{route('productobandejas-edit',$pro->idProducto)}}" class="btn btn-success btn-xs" role="button"><i class="fas fa-edit" title="Editar Bandeja o Accesorio"></i> </a>
									<a href="" data-target="#modal-delete-{{$pro->idProducto}}"  data-toggle="modal" class="btn btn-danger btn-xs" title="Eliminar Bandeja o Accesorio"><i class="fas fa-trash-alt"></i> </a>
								</td>
							</tr>
							@include('proforma.productobandejas.modal')
							@endforeach
				        </tbody>
				        
    				</table>
    				{{$producto->render()}}
				</div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
</section><!-- /.content -->
@endsection




