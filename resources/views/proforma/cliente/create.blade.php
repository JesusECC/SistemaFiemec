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
                	{!!Form::open(array('url'=>'proforma/cliente','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}

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
										    	<label>
														Tipo Persona
													</label>
												<select id="tipo_persona" name="tipo_persona" class="form-control">
												 <option value="" disabled selected >Selecione Tipo de Persona</option>
												<option value="1">Persona Natural</option>
												<option value="2">Empresa</option>
												
												
												</select>
										    </div>
									    </div>	
										<div class="col-sm-4">				
										    <div class="form-group">
										    	<label>
														Tipo de Documento
													</label>
												<select id="tipo_documento" name="tipo_documento" class="form-control">
												 <option value="" disabled selected >Selecione Tipo de Documento</option>
												<option value="DNI">DNI</option>
												<option value="RUC">RUC</option>
												
												
												</select>
										    </div>
									    </div>	
										<div class="col-sm-4">
											<div class="form-group">
												<label>
														Numero de Documento
													</label>
												<input type="text" id="nro_documento" name="nro_documento" required="" class="form-control" placeholder="Ingrese numero de Documento...">
											</div> 												
										</div>
										
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<label>
														Nombre
													</label>
												<input type="text" name="nombres_RS" class="form-control" placeholder="Ingrese Nombre" {{old('nombres_RS')}}>
											</div>													
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label>
														Apell. Paterno
													</label>
												<input type="text" id="paterno" name="paterno" class="form-control" placeholder="Ingrese Apellido Paterno" {{old('paterno')}}>
											</div> 												
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label>
														Apell. Materno
													</label>
												<input type="text" id="materno" required name="materno" class="form-control" placeholder="Ingrese Apellido Materno" {{old('materno')}}>
											</div>
					    				</div>
									</div>
									<div class="row">
											<div class="col-sm-5">
												<div class="form-group">
													<label>
														Fecha de Nacimiento
													</label>
													<div class="input-group date">
													    <div class="input-group-addon">
															<i class="far fa-calendar-alt"></i>
														</div>
												<input  id="fecha_nacimiento" type="date" class="form-control pull-right" name="fecha_nacimiento">	
												    </div>
											    </div>										
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<label>
														Genero
													</label>
													<select id="sexo" disabled name="sexo" class="form-control">
														<option value="" selected>Seleccione</option>
														<option value="Masculino">Masculino</option>
													    <option value="Femenino">Femenino</option>
													</select>													
												</div>
											</div>
											<div class="col-sm-4">
												<label>
														Num. de telefono
													</label>
												<input type="text" name="telefono" class="form-control" placeholder="Ingrese Teléfono">
											</div>
										</div>
										<div class="row">
											<div class="col-sm-5">
												<div class="form-group">
													<label>
														Num. de Celular
													</label>
													<input type="text" name="celular" class="form-control" placeholder="Ingrese Celular">
												</div>	   												
											</div>
											<div class="col-sm-7">
												<div class="form-group">
													<label>
														Correo
													</label>
													<input type="email" name="correo" class="form-control" placeholder="Ingrese Correo">	
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
													<input type="text" name="Departamento" class="form-control" placeholder="Ingrese Departamento">	
												</div>
														
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>
														Provincia
													</label>
													<input type="text" name="Provincia" class="form-control" placeholder="Ingrese Provincia">	
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>
														Distrito
													</label>
													<input type="text" name="Distrito" class="form-control" placeholder="Ingrese Distrito">	
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>
														Direccion
													</label>
													<input type="text" name="Direccion" class="form-control" placeholder="Ingrese Direccion">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>
														Referncia de Direccion
													</label>
													<input type="text" name="Referencia" class="form-control" placeholder="Ingrese la referencia">
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
														Numero de Cuenta 1
													</label>
													<input type="text" name="cuenta_1" class="form-control" placeholder="Ingrese la cuenta">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>
														Numero de Cuenta 2
													</label>
													<input type="text" name="cuenta_2" class="form-control" placeholder="Ingrese la cuenta">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>
														Numero de Cuenta 3
													</label>
													<input type="text" name="cuenta_3" class="form-control" placeholder="Ingrese la cuenta">
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
			    <button class="btn btn-primary btn-sm" type="submit" id="save"><i class="far fa-save"></i> Guardar</button>
				<button class="btn btn-danger btn-sm" type="reset"><i class="far fa-times-circle"></i> Cancelar</button>
				<button  class="btn btn-success btn-sm " type="button" ><a style="color: white!important;text-decoration: none" href="{{route('clientes')}}"><i class="fas fa-reply-all"></i> Volver</a></button>
			</div>
		</div>
    </div><!-- /.box -->
    {!!Form::close()!!}
    </div><!-- /.col -->
</div><!-- /.row -->
@push('scripts')
<!-- -->
<script type="text/javascript">
	//Metodo para llamar a la funcion 
	$(document).ready(function(){
		$('#tipo_documento').change(function(){
			validarCampo();
			limpiar ();
		});
	//Metodo para llamar a tipo persona
	$('#tipo_persona').click(function(){
			ValidacionEmpresa ();
	
		});
	});
	//Funcion para validar la cantidad de digitos Tanto DNI  Como  RUC

	function validarCampo(){
	
	tipodocumento = document.getElementById('tipo_documento').value;
	if(tipodocumento == 'DNI'){
		$("input#nro_documento").attr('maxlength','8');

	}else if (tipodocumento == 'RUC'){
			$("input#nro_documento").attr('maxlength','11');
	}



}


	 function limpiar (){
			$("input#nro_documento").val("");

	 }

//Funcion bloquear algunos campos

 function ValidacionEmpresa (){
tipocliente = document.getElementById('tipo_persona').value;

	if (tipocliente == '2'){
		// document.getElementById("paterno").disabled;materno
			$("input#paterno").attr('disabled',true);
			$("input#materno").attr('disabled',true);
			$("select#sexo").attr('disabled',true);
			$("input#fecha_nacimiento").attr('disabled',true);
		
		
	}else if(tipocliente == '1'){
			$("input#paterno").attr('disabled',false);
			$("input#materno").attr('disabled',false);
			$("select#sexo").attr('disabled',false);
			$("input#fecha_nacimiento").attr('disabled',false);

	}


 }


</script>

</section><!-- /.content -->
@endpush
@endsection
