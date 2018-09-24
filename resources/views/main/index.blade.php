@extends ('layouts.admin')
@section ('contenido')
<h1 class="page-header">¡Bienvenidos! <small>Por favor seleccione una opción del menu izquierdo</small></h1>
<div class="row">
	<div class="col-md-3 col-sm-12">
		<a href="{{ route('proforma')}}" class="widget widget-stats bg-gradient-yellow inverse-mode">
			<div class="widget-stats-left">
				<div class="widget-stats-title">
					<i class="fas fa-clipboard-list"  style="font-size:50px"></i>
				</div>
			</div>
			<div class="widget-stats-right">
				<div class="widget-stats-value">
					18
				</div>
				<div class="widget-desc" style="font-size:16px">Proforma Unitaria</div>
			</div>
		</a>		
	</div>
	<div class="col-md-3 col-sm-12">
		<a href="{{ route('tablero')}}" class="widget widget-stats bg-gradient-blue inverse-mode">
			<div class="widget-stats-left">
				<div class="widget-stats-title">
					<i class="far fa-window-restore"  style="font-size:50px"></i>
				</div>
			</div>
			<div class="widget-stats-right">
				<div class="widget-stats-value">
					18
				</div>
				<div class="widget-desc" style="font-size:16px">Proforma Tableros</div>
			</div>
		</a>		
	</div>
	<div class="col-md-3 col-sm-12">
		<a href="{{ route('servicio')}}" class="widget widget-stats bg-gradient-purple inverse-mode">
			<div class="widget-stats-left">
				<div class="widget-stats-title">
					<i class="fas fa-wrench"  style="font-size:50px"></i>
				</div>
			</div>
			<div class="widget-stats-right">
				<div class="widget-stats-value">
					18
				</div>
				<div class="widget-desc" style="font-size:16px">Proforma Servicios</div>
			</div>
		</a>		
	</div>
	<div class="col-md-3 col-sm-12">
		<a href="{{ route('bandejas')}}" class="widget widget-stats bg-gradient-red inverse-mode">
			<div class="widget-stats-left">
				<div class="widget-stats-title">
					<i class="far fa-hdd"  style="font-size:48px"></i>
				</div>
			</div>
			<div class="widget-stats-right">
				<div class="widget-stats-value">
					18
				</div>
				<div class="widget-desc" style="font-size:16px">Proforma Bandejas</div>
			</div>
		</a>		
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="box box-success">
            <div class="box-header with-border">
            	Accesos Directos <i class="fas fa-external-link-alt"></i>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                    	<div class="row">
                    		<div class="col-xs-6">
									<!-- BEGIN widget -->
									<ul class="widget widget-list m-b-0 no-bg inverse-mode">
										<li>
											<!-- BEGIN widget-list-container -->
											<a href="{{ route('proforma-create')}}" class="widget-list-container">
												<div class="widget-list-media icon p-l-0">
													<i class="bg-gradient-yellow fas fa-clipboard-list"></i>
												</div>
												<div class="widget-list-content">
													<h4 class="widget-title" style="color:#222">Nueva Proforma Unitaria</h4>
 												</div>
											</a>
											<!-- END widget-list-container -->
										</li>
										<li>
											<!-- BEGIN widget-list-container -->
											<a href="{{ route('tablero-create')}}" class="widget-list-container">
												<div class="widget-list-media icon p-l-0">
													<i class=" bg-gradient-blue far fa-window-restore "></i>
												</div>
												<div class="widget-list-content">
													<h4 class="widget-title" style="color:#222">Nuevo Proforma Tableros</h4>
													 
												</div>
											</a>
											<!-- END widget-list-container -->
										</li>
										
									</ul>
									<!-- END widget -->
							</div>
								<!-- END col-6 -->  
                    		<div class="col-xs-6">
									<!-- BEGIN widget -->
									<ul class="widget widget-list m-b-0 no-bg inverse-mode">
										<li>
											<!-- BEGIN widget-list-container -->
											<a href="{{ route('servicio-create')}}" class="widget-list-container">
												<div class="widget-list-media icon p-l-0">
													<i class="bg-gradient-purple fas fa-wrench" style="color: white !important"></i>
												</div>
												<div class="widget-list-content">
													<h4 class="widget-title" style="color:#222">Nueva Proforma Servicios</h4>
 												</div>
											</a>
											<!-- END widget-list-container -->
										</li>
										<li>
											<!-- BEGIN widget-list-container -->
											<a href="{{ route('bandejas-create')}}"  class="widget-list-container">
												<div class="widget-list-media icon p-l-0">
													<i class=" bg-gradient-red  far fa-hdd "></i>
												</div>
												<div class="widget-list-content">
													<h4 class="widget-title" style="color:#222">Nuevo Proforma Bandeja</h4>
													 
												</div>
											</a>
											<!-- END widget-list-container -->
										</li>
										
									</ul>
									<!-- END widget -->
							</div>
								<!-- END col-6 -->                   			
                    	</div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div><!-- /.col -->
@endsection