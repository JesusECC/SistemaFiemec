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
    			<i class="far fa-sun"></i>  Ajustes</a>
    	</li>
    	<li class="active">Central de Ajustes</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border" style="padding: 10px !important">
					<h4>
						<strong style="font-weight: 400">
							<i class="fas fa-tachometer-alt"></i> Controla todos los ajustes del sistema desde este panel.
						</strong>
					</h4>
					<div class="ibox-title-buttons pull-right">
					</div>
				</div>
                <!-- /.box-header -->
				<div class="box-body">
					<div class="row">
					    <div class="col-sm-4">
					        <div class="ibox">
					            <div class="ibox-title">
					                <h5><i class="far fa-file-powerpoint"></i> Proforma</h5>
					            </div>
					            <div class="ibox-content no-padding">
					                <div class="list-group">
					                	<a class="list-group-item" href="{{url('proforma/tarea')}}">
					                        <h4 class="list-group-item-heading">Configuración Tarea</h4>
					                        <p class="list-group-item-text">Creación, modificación.</p>
					                    </a>
					                    <a class="list-group-item" href="{{url('proforma/marca')}}">
					                        <h4 class="list-group-item-heading">Configuración Marca</h4>
					                        <p class="list-group-item-text">Creación, modificación.</p>
					                    </a>
					                    <a class="list-group-item" href="{{url('proforma/familia')}}">
					                        <h4 class="list-group-item-heading">Configuración Familia y Descuento</h4>
					                        <p class="list-group-item-text">Creación, modificación.</p>
					                    </a>						              
					                    <a class="list-group-item" href="{{url('proforma/config')}}">
					                        <h4 class="list-group-item-heading">Configuración Tipo Cambio</h4>
					                        <p class="list-group-item-text">Creación, modificación.</p>
					                    </a>
					                    <a class="list-group-item" href="{{url('proforma/cargo')}}">
					                        <h4 class="list-group-item-heading">Configuración Cargo/Ocupacion</h4>
					                        <p class="list-group-item-text">Creación, modificación.</p>
					                    </a>
					                </div>
					            </div>
					        </div>
					    </div>
					    
					</div>
				</div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
</section><!-- /.content -->
@endsection