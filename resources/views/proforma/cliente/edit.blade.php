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
													<div class="col-sm-4">
                                                      <div class="form-group">
                                                      <label for="nombre_familia">Tipo Documento</label>
                                                      <select required name="tipodoc" class="form-control selectpicker" id="tipodoc" data-live-search="true">
                                                      <option value="">Seleccione Tipo</option>
                                                      @if($Cliente->tipo_documento=='DNI')
                                                      <option value="DNI" selected>DNI</option>
                                                      <option value="RUC">RUC</option>   
                                                      @elseif($Cliente->tipo_documento=='RUC')
                                                      <option value="DNI">DNI</option>
                                                      <option value="RUC" selected>RUC</option>
                                                      @endif
                                                      </select> 
                                                    </div>
                                                </div>

												<div class="col-sm-3">
													<div class="form-group">
													    <label>
														Numero de Documento
													    </label>
															<input type="text" name="nro_documento" class="form-control"   value="{{$Cliente->nro_documento}}">
														</div> 							
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<label>
														    Nombre
													        </label>
															<input type="text" name="nombres_Rs" class="form-control"   value="{{$Cliente->nombres_Rs}}">
														</div>													
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<label>
														    Apell. Paterno
													        </label>
															<input type="text" name="paterno" class="form-control"   value="{{$Cliente->paterno}}">
														</div> 												
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<label>
														    Apell. Materno
													        </label>
															<input type="text" name="materno" class="form-control"   value="{{$Cliente->materno}}">	
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-sm-3">
														<div class="form-group">
															<label>
														    Fecha de Nacimiento
													        </label>
															<div class="input-group date">
																<div class="input-group-addon">
																	<i class="far fa-calendar-alt"></i>
																</div>
																<input type="date" name="fecha_nacimiento" class="form-control"   value="{{$Cliente->fecha_nacimiento}}">

															</div>
														</div>												
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<label>
														    Genero
													        </label>
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
															<label>
														    Num. de Telefono
													        </label>
														<input type="text" name="telefono" class="form-control"   value="{{$Cliente->telefono}}">
														
														</div>
	
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<label>
														    Num. de Celular
													        </label>
															<input type="text" name="celular" class="form-control"   value="{{$Cliente->celular}}">	
														</div>   												
													</div>
												</div>
												<div class="row">
													
													<div class="col-sm-6">
														<div class="form-group">
															<label>
														    Correo
													        </label>
															<input type="text" name="correo" class="form-control"   value="{{$Cliente->correo}}">	
														</div>  												
													</div>										
												</div>
												<div class="form-group">
													<label for="" class="control-label" style="font-size: 13px;color: #676a6c">
														Dirección de Cliente
													</label>
												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label>
														    Departamento
													        </label>
															<input type="text" name="Departamento" class="form-control"   value="{{$Cliente->Departamento}}">
														</div>														
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>
														    Provincia
													        </label>
															<input type="text" name="Provincia" class="form-control"   value="{{$Cliente->Provincia}}">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>
														    Distrito
													        </label>
															<input type="text" name="Distrito" class="form-control"   value="{{$Cliente->Distrito}}">
														</div>
													</div>
												
													<div class="col-md-6">
														<div class="form-group">
															<label>
														    Direccion
													        </label>
															<input type="text" name="Direccion" class="form-control"   value="{{$Cliente->Direccion}}">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>
														    Referencia
													        </label>
															<input type="text" name="Referencia" class="form-control"   value="{{$Cliente->Referencia}}">
															
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
															<label>
														    Num. de Cuenta 1
													        </label>
															<input type="text" name="cuenta_1" class="form-control"   value="{{$Cliente->cuenta_1}}">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>
														    Num. de Cuenta 2
													        </label>
															<input type="text" name="cuenta_2" class="form-control"   value="{{$Cliente->cuenta_2}}">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label>
														    Num. de Cuenta 3
													        </label>
															<input type="text" name="cuenta_3" class="form-control"   value="{{$Cliente->cuenta_3}}">
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