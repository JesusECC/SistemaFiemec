

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
    		<i class="fas fa-user-edit"></i> Clientes</a>
    	</li>
    	<li class="active">Editar Cliente</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box" style="border-top: 3px solid #18A689">
				<div class="box-header with-border" style="padding: 10px !important">
					<h4>
						<strong style="font-weight: 400">
							<i class="fas fa-users"></i> Editar Datos Cliente
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
                	{!!Form::model($Empleado,['method'=>'PATCH','route'=>['empleado.update',$Empleado->id]])!!}
					{{Form::token()}}

             <div class="box-body bg-gray-c">
                  <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="panel panel-default panel-shadow">
                                        <div class="panel-body">
                                    <label for="" class="control-label" style="font-size: 13px;color: #676a6c">
														Datos Generales
													</label>
														<div class="row">
													<div class="col-sm-4">
														<div class="form-group">
														<label for="" class="control-label">Documento</label>
															<input type="text"   name="nro_documento" class="form-control" required value="{{$Empleado->nro_documento}}">
														</div> 												
													</div>
													 <div class="col-sm-8">
											<div class="form-group">
											<label for="" class="control-label">Nombre Completos </label>
												<input type="text"     name="nombres" class="form-control" required value="{{$Empleado->nombres.' '.$Empleado->paterno.' '.$Empleado->materno}}">
											</div>								
										  </div>
													
													</div>
													<div class="row">
													<div class="col-sm-5">
														<div class="form-group">
															<div class="input-group date">
																<div class="input-group-addon">
																	<i class="far fa-calendar-alt">	<label for="" class="control-label">Fecha Nacimiento</label></i>
																</div>
															
																<input type="date"   name="fecha_nacimiento" class="form-control" required value="{{$Empleado->fecha_nacimiento}}">
															</div>
														</div>												
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<label for="" class="control-label">Sexo</label>
															<input type="text"     name="sexo" class="form-control" required value="{{$Empleado->sexo}}">
														</div>		
													</div>
													<div class="col-sm-4">
															<label for="" class="control-label">Telefono</label>
														<input type="text"   name="telefono" class="form-control" required value="{{$Empleado->telefono}}">	
													</div>
												</div>
												<div class="row">
													<div class="col-sm-5">
														<div class="form-group">
														<label for="" class="control-label">Celular</label>
															<input type="text"   name="celular" class="form-control" required value="{{$Empleado->celular}}">	
														</div>   												
													</div>
													<div class="col-sm-7">
														<div class="form-group">
														<label for="" class="control-label">Correo</label>
															<input type="text"   name="correo" class="form-control" required value="{{$Empleado->correo}}">	
														</div>  												
													</div>										
												</div>
												<div class="form-group">
													<label for="" class="control-label" style="font-size: 13px;color: #676a6c">
														Dirección de Cliente
													</label>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
														<label for="" class="control-label">Direccion</label>
															<input type="text"   name="Departamento" class="form-control" required value="{{$Empleado->direccion}}">
														</div>														
													</div>

													<div class="col-md-3">
														<div class="form-group">
															<label for="" class="control-label">Fecha Inicio</label>
															<input type="date"   name="Distrito" class="form-control" required value="{{$Empleado->fecha_inicio}}">
														</div>
													</div>	
													<div class="col-md-3">
														<div class="form-group">
														<label for="" class="control-label">Fecha Final</label>
															<input type="date"   name="Distrito" class="form-control" required value="{{$Empleado->fecha_fin}}">
														</div>
													</div>												
													<div class="col-md-4">
														<div class="form-group">
															<label for="" class="control-label">Sueldo</label>
															<input type="text"   name="Direccion" class="form-control" required value="{{$Empleado->sueldo}}">
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

				<div class="box-footer">
					<div class="text-right">
			    		<button class="btn btn-primary btn-sm" type="submit"><i class="far fa-save"></i> Guardar</button>
						<button class="btn btn-danger btn-sm" type="reset"><i class="far fa-times-circle"></i> Cancelar</button>
						<button  class="btn btn-success btn-sm " type="button"><a style="color: white!important;text-decoration: none" href="{{route('clientes')}}"><i class="fas fa-reply-all"></i> Volver</a></button>
					</div>
				</div>
              </div><!-- /.box -->
              {!!Form::close()!!}
            </div><!-- /.col -->
          </div><!-- /.row -->
</section><!-- /.content -->
@endsection