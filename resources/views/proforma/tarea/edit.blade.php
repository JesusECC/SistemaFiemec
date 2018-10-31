

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
    		<i class="fas fa-user-edit"></i> Marcas</a>
    	</li>
    	<li class="active">Editar Marca</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box" style="border-top: 3px solid #18A689">
				<div class="box-header with-border" style="padding: 10px !important">
					<h4>
						<strong style="font-weight: 400">
							<i class="fas fa-users"></i> Editar Datos de Marca
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

    {!!Form::model($tarea,['method'=>'PATCH','route'=>['tarea.update',$tarea->idTarea]])!!}
    {{Form::token()}}
<div class="box-body bg-gray-c">
                  <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default panel-shadow">
                                    	<div class="row">


									<div class="col-sm-12">
                                        <div class="panel-body">
                                      <div class="form-group">
										<label for="" class="control-label" style="font-size: 14px;color: #676a6c">
											Tarea
										</label>
<div class="row">

 <div class="col-sm-6">
<div class="form-group">
	<label for="" class="control-label" style="font-size: 12px;color: #676a6c">
											Descripcion de la tarea
										</label>
	<input type="text"     name="nombre_tarea" class="form-control"  value="{{$tarea->nombre_tarea}}">
	</div>								
	</div>

 <div class="col-sm-3">
	<div class="form-group">
		<label for="" class="control-label" style="font-size: 12px;color: #676a6c">
											Precio de la tarea
										</label>
	<input type="text"     name="precioT" class="form-control" value="{{$tarea->precioT}}">
	</div>								
	</div>

  <div class="col-sm-3">
<div class="box-footer">
<div class="text-right">
			    		<button class="btn btn-primary btn-sm" type="submit"><i class="far fa-save"></i> Guardar</button>
						<button class="btn btn-danger btn-sm" type="reset"><i class="far fa-times-circle"></i> Cancelar</button>
						<button  class="btn btn-success btn-sm " type="button"><a style="color: white!important;text-decoration: none" href="{{url('proforma/tarea')}}"><i class="fas fa-reply-all"></i> Volver</a></button>
					           </div>
				             </div>
	                       </div>
                         </div>
                       </div>
                     </div>
                   </div>                             
                 </div>                            
                                   </div>
                                  </div>
                                 </div>
							    </div>
							   </div>
						      </div>
					         </div>
				            </div>

				
              </div><!-- /.box -->
              {!!Form::close()!!}
            </div><!-- /.col -->
          </div><!-- /.row -->
</section><!-- /.content -->
@endsection