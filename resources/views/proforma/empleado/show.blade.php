@extends ('layouts.admin')
@section ('contenido')
<div class="container" id="Empleado">
	@foreach($Empleado as $Empl)
	<div class="row">
		<div class="col-lg-11">
			<blockquote>
				<h2>{{$Empl->nombres.' '.$Empl->paterno.' '.$Empl->materno}}</h2>
			</blockquote>
			<hr>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<form>
						<fieldset disabled>	
							<div class="col-lg-4">
					<img src="http://www.repairservo.com/images/abb-img.jpg" alt="..." class="img-thumbnail">
				</div>					
						  <div class="form-group col-lg-3">
						    <label for="exampleInputEmail1">Tipo Documento</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$Empl->tipo_documento}}">
						  </div>
						  <div class="form-group col-lg-3">
						    <label for="exampleInputEmail1">Numero Documento</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$Empl->nro_documento}}">
						  </div>
						  <div class="form-group col-lg-6">
						    <label for="exampleInputEmail1">Nombre</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$Empl->nombres.' '.$Empl->paterno.' '.$Empl->materno}}">
						  </div>

						  </div>
						  <div class="form-group col-lg-3">
						    <label for="exampleInputEmail1">Fecha de nacimiento</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$Empl->fecha_nacimiento}}">
						  </div>
						  <div class="form-group col-lg-3">
						    <label for="exampleInputEmail1">Sexo</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$Empl->sexo}}">
						  </div>
						  <div class="form-group col-lg-5">
						    <label for="exampleInputEmail1">Telefono / Celular</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$Empl->telefono.' / '.$Empl->celular}}">
						  </div>
						  
						  
						  <div class="form-group col-lg-11">
						    <label for="exampleInputEmail1">direccion</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$Empl->direccion}}">
						  </div>
						  <div class="form-group col-lg-4">
						    <label for="exampleInputEmail1">correo</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$Empl->correo}}">
						  </div>
						  <div class="form-group col-lg-3">
						    <label for="exampleInputEmail1">cargo</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$Empl->cargo}}">
						  </div>
						  <div class="form-group col-lg-2">
						    <label for="exampleInputEmail1">sueldo</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="S/. {{$Empl->sueldo}}">
						  </div>
						  <div class="form-group col-lg-2">
						    <label for="exampleInputEmail1">Fecha de inicio</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$Empl->fecha_inicio}}">
						  </div>
						  <div class="form-group col-lg-2">
						    <label for="exampleInputEmail1">fecha de fin</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$Empl->fecha_fin}}">
						  </div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection