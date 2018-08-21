@extends ('layouts.admin')
@section ('contenido')
<div class="container" id="cliente">
	@foreach($cliente as $cli)
	<div class="row">
		<div class="col-lg-11">
			<blockquote>
				<h2>{{$cli->nombres_Rs.' '.$cli->paterno.' '.$cli->materno}}</h2>
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
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$cli->tipo_documento}}">
						  </div>
						  <div class="form-group col-lg-3">
						    <label for="exampleInputEmail1">Numero Documento</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$cli->nro_documento}}">
						  </div>
						  <div class="form-group col-lg-6">
						    <label for="exampleInputEmail1">Nombre</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$cli->nombres_Rs.' '.$cli->paterno.' '.$cli->materno}}">
						  </div>

						  </div>
						  <div class="form-group col-lg-3">
						    <label for="exampleInputEmail1">Fecha de nacimiento</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$cli->fecha_nacimiento}}">
						  </div>
						  <div class="form-group col-lg-3">
						    <label for="exampleInputEmail1">Sexo</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$cli->sexo}}">
						  </div>
						  <div class="form-group col-lg-5">
						    <label for="exampleInputEmail1">Telefono / Celular</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$cli->telefono.' / '.$cli->celular}}">
						  </div>
						  
						  <div class="form-group col-lg-4">
						    <label for="exampleInputEmail1">correo</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$cli->correo}}">
						  </div>

						  <div class="form-group col-lg-3">
						    <label for="exampleInputEmail1">Cuenta Nº1</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$cli->cuenta_1}}">
						  </div>
						  
						  <div class="form-group col-lg-3">
						    <label for="exampleInputEmail1">Cuenta Nº2</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$cli->cuenta_2}}">
						  </div>
						  
						  <div class="form-group col-lg-3">
						    <label for="exampleInputEmail1">Cuenta Nº3</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$cli->cuenta_3}}">
						  </div>
						  <div class="form-group col-lg-2">
						    <label for="exampleInputEmail1">Estado</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$cli->estado}}">
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