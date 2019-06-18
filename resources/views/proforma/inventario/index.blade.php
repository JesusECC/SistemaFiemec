@extends ('layouts.admin')
@section ('contenido')
<section class="content-header">
	<h1>
		Panel de Administrador
		<small>Version 2.3.0</small>
    </h1>
    <ol class="breadcrumb">
    	<li>
    		<a href="#">
    			<i class="fas fa-tachometer-alt"></i> Inicio</a>
    	</li>
    	<li class="active">Dashboard</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h1 class="page-header">¡Bienvenidos! <small>Por favor seleccione una opción del menu izquierdo</small></h1>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
                <!-- /.box-header -->
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							
							<div class="row">
								<div class="col-md-4 col-sm-12">
									<a href="{{route('entradas-create')}}" class="widget widget-stats bg-gradient-yellow inverse-mode" >
										<div class="widget-stats-left">
											<div class="widget-stats-title">
												<i class="fas fa-clipboard-list"  style="font-size:50px"></i>
											</div>
										</div>
										<div class="widget-stats-right">
											<div class="widget-stats-value">
												
											</div>
											<div class="widget-desc" style="font-size:16px">Entradas</div>
										</div>
									</a>		
								</div>
								<div class="col-md-4 col-sm-12">
									<a href="{{ route('inventarios')}}" class="widget widget-stats bg-gradient-blue inverse-mode">
										<div class="widget-stats-left">
											<div class="widget-stats-title">
												<i class="fas fa-clipboard-list"  style="font-size:50px"></i>
											</div>
										</div>
										<div class="widget-stats-right">
											<div class="widget-stats-value">
												
											</div>
											<div class="widget-desc" style="font-size:16px">Inventario Actual</div>
										</div>
									</a>		
								</div>
					 			<div class="col-md-4 col-sm-12">
									<a href="{{ route('salidas-create')}}" class="widget widget-stats bg-gradient-purple inverse-mode">
										<div class="widget-stats-left">
											<div class="widget-stats-title">
												<i class="fas fa-wrench"  style="font-size:50px"></i>
											</div>
										</div>
										<div class="widget-stats-right">
											<div class="widget-stats-value">
												
											</div>
											<div class="widget-desc" style="font-size:16px">Salidas</div>
										</div>
									</a>		
								</div>
							</div>
						</div><!-- /.box-body -->
				    </div><!-- /.box -->
				</div><!-- /.col -->
			</div>
		</div>

					<!-- /.box-header -->
						<div class="box-body">
							<table id="example" class="table table-striped table-bordered table-hover" style="width:100%;font-size: 14px !important">
		                        	<thead>
		                        		<tr>
		                        			<th>Codigo Producto</th>
		                        			<th>Descripcion</th>
		                        			<th>Existencias Iniciales</th>
		                        			<th>Entrada</th>
		                        			<th>Salida</th>
		                        			<th>Stock</th>
		                        		</tr>
		                        	</thead>
		                        	<tbody>
		                        		@foreach($inventario as $inv)
		                        		<tr>
		                                     <td>{{$inv->codigo_pedido}}</td>
		                                     <td>{{$inv->nombre_producto}} {{$inv->descripcion_producto}}</td>
		                                     <td>{{$inv->total_existencias}}</td>
		                                     <td>{{$inv->total_entradas}}</td>
		                                     <td>{{$inv->total_salidas}}</td>
		                                     <td>{{$inv->stock}}</td>
		                                </tr>
		                        		@endforeach                       		
		                        	</tbody>
		                    </table>
						</div>
		            </div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
@endsection