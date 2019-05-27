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
    			<i class="fas fa-dolly"></i> Productos</a>
    	</li>
    	<li class="active">Fiemec</li>
    	<li>
    		<a href="#">
    		 Editar</a>
    	</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box" style="border-top: 3px solid #18A689">
				<div class="box-header with-border" style="padding: 10px !important">
					<h4>
						<strong style="font-weight: 400">
							<i class="fas fa-dolly"></i> Editar Datos Productos Fiemec
						</strong>
					</h4>
				    @if(count($errors)>0)
					<div class="alert-alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							    <li>{{$error}}</li>
							@endforeach 
						</ul>	
				    </div>
				    @endif

				</div>
                <!-- /.box-header -->
                	{!!Form::model($productobandejas,['method'=>'PATCH','route'=>['productobandejas.update',$productobandejas->idProducto]])!!}
		    		{{Form::token()}}
				<div class="box-body bg-gray-c">
					<div class="row">
						<div class="col-md-8">
							<div class="panel panel-default panel-shadow">
								<div class="panel-body">
									<div class="form-group">
										<label for="" class="control-label" style="font-size: 13px;color: #676a6c">
											Producto Fiemec
										</label>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
                       					 <label>Nombre Accesorio</label>  
												<input type="text" name="nombre_producto" id="nombre_producto" class="form-control" value="{{$productobandejas->nombre_producto}}">
											</div> 												
										</div>
										<div class="col-sm-4">
											<div class="form-group">
                      				  <label>Promedio</label>
												<input  type="number" id="promedio" name="promedio" class="form-control"  value="{{$productobandejas->promedio}}">	
									</div>													
				<div class="box-footer">
					<div class="text-right">
			    		<button class="btn btn-primary btn-sm" type="submit"><i class="far fa-save"></i>Guardar</button>
						<button class="btn btn-danger btn-sm" type="reset"><i class="far fa-times-circle"></i> Cancelar</button>
					</div>
				</div>
              </div><!-- /.box -->
              {!!Form::close()!!}
            </div><!-- /.col -->
          </div><!-- /.row -->
</section><!-- /.content -->
@endsection
