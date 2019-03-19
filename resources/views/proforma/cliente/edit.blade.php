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
                	{!!Form::model($Cliente,['method'=>'PATCH','route'=>['cliente.update',$Cliente->idCliente]])!!}
					{{Form::token()}}
				<div class="box-body bg-gray-c">
					<div class="row">
						<div class="col-md-12">
							<div class="nav-tabs-custom">
								<div class="tab-content">
									<div class="active tab-pane" id="dni">
										<div class="panel panel-default panel-shadow">
											<div class="panel-body">
												<div class="form-group">
													<label for="" class="control-label" style="font-size: 13px;color: #676a6c">
														Datos Generales
													</label>
												</div>
												<div class="row">
													<div class="col-sm-3">
														<div class="form-group">
															<input type="text" name="nro_documento" class="form-control" required value="{{$Cliente->nro_documento}}">
														</div> 												
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<input type="text" name="nombres_Rs" class="form-control" required value="{{$Cliente->nombres_Rs}}">
														</div>													
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<input type="text" name="paterno" class="form-control" required value="{{$Cliente->paterno}}">
														</div> 												
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<input type="text" name="materno" class="form-control" required value="{{$Cliente->materno}}">	
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-sm-3">
														<div class="form-group">
															<div class="input-group date">
																<div class="input-group-addon">
																	<i class="far fa-calendar-alt"></i>
																</div>
																<input type="date" name="fecha_nacimiento" class="form-control" required value="{{$Cliente->fecha_nacimiento}}">

															</div>
														</div>												
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<select name="sexo" class="form-control">
																@if($Cliente->sexo=='Masculino')
															   <option value="Masculino" selected>Masculino</option>
															   <option value="Femenino">Femenino</option>	
															   @elseif($Cliente->sexo=='Femenino')
															   <option value="Masculino">Masculino</option>
															   <option value="Femenino" selected>Femenino</option>
															   @endif
															</select>													
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">
														<input type="text" name="telefono" class="form-control" required value="{{$Cliente->telefono}}">
														
														</div>
	
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<input type="text" name="celular" class="form-control" required value="{{$Cliente->celular}}">	
														</div>   												
													</div>
												</div>
												<div class="row">
													
													<div class="col-sm-6">
														<div class="form-group">
															<input type="text" name="correo" class="form-control" required value="{{$Cliente->correo}}">	
														</div>  												
													</div>										
												</div>
												<div class="form-group">
													<label for="" class="control-label" style="font-size: 13px;color: #676a6c">
														Dirección de Cliente
													</label>
												</div>
												<div class="row">
													<div class="col-md-3">
														<div class="form-group">
															<input type="text" name="Departamento" class="form-control" required value="{{$Cliente->Departamento}}">
														</div>														
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<input type="text" name="Distrito" class="form-control" required value="{{$Cliente->Distrito}}">
														</div>
													</div>
												
													<div class="col-md-6">
														<div class="form-group">
															<input type="text" name="Direccion" class="form-control" required value="{{$Cliente->Direccion}}">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<input type="text" name="Referencia" class="form-control" required value="{{$Cliente->Referencia}}">
															
														</div>
													</div>
												</div>
												<div class="form-group">
													<label for="" class="control-label" style="font-size: 13px;color: #676a6c">
														Número de Cuentas
													</label>
												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<input type="text" name="cuenta_1" class="form-control" required value="{{$Cliente->cuenta_1}}">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<input type="text" name="cuenta_2" class="form-control" required value="{{$Cliente->cuenta_2}}">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<input type="text" name="cuenta_3" class="form-control" required value="{{$Cliente->cuenta_3}}">
														</div>
													</div>
												</div>
											</div>
										</div>										
									</div>
									<div class="tab-pane" id="ruc">
										RUC
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