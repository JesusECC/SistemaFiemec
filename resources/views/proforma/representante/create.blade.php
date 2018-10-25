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
    		<i class="fas fa-user-plus"></i> Clientes</a>
    	</li>
    	<li class="active">Nuevo Cliente</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box" style="border-top: 3px solid #18A689">
				<div class="box-header with-border" style="padding: 10px !important">
					<h4>
						<strong style="font-weight: 400">
							<i class="fas fa-users"></i> Datos Cliente
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
                	{!!Form::open(array('url'=>'proforma/representante','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}

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
												<div class="col-sm-5">
                                            <div class="form-group">
                                                <select required name="idClientes" class="form-control selectpicker" id="idClientes" data-live-search="true">
                                                    <option value="">Seleccione Cliente</option>
                                                    @foreach($cliente as $cli)
                                                    <option value="{{$cli->idCliente}}">{{$cli->nombres_Rs.' '.$cli->paterno.' '.$cli->materno}}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                        </div>
										<div class="col-sm-3">				
										<div class="form-group">
												<select id="tipo_documento" name="tipo_documento" class="form-control">
												 <option value="" disabled selected >Selecione Tipo de Documento</option>
												<option value="DNI">DNI</option>
												<option value="RUC">RUC</option>
												
												
												</select>
										</div>
									</div>

									<div class="col-sm-4">
														<div class="form-group">
															<input type="text" name="nro_documento" class="form-control" placeholder="Ingrese numero de Documento..."  value data-inputmask="'mask': '(999) 999-9999'" data-mask autocomplete="off" {{old('nro_documento')}}>
														</div> 												
													</div>	
									</div>
									<div class="row">
													
													<div class="col-sm-6">
														<div class="form-group">
															<input type="text" name="nombres_RS" class="form-control" placeholder="Ingrese Nombre" {{old('nombres_RS')}}>
														</div>													
													</div>
												
												
													<div class="col-sm-3">
														<div class="form-group">
															<input type="text" name="paterno" class="form-control" placeholder="Ingrese Apellido Paterno" {{old('paterno')}}>
														</div> 												
													</div>
														
													<div class="col-sm-3">
														<div class="form-group">
															<input type="text" name="paterno" class="form-control" placeholder="Ingrese Apellido Paterno" {{old('paterno')}}>
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