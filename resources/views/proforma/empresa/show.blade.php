@extends ('layouts.admin')
@section ('contenido')
<div class="container" id="cliente">
	@foreach($empresa as $em)
	<div class="row">
		<div class="col-lg-11">
			<blockquote>
				<h2>{{$em->nombres_Rs}}</h2>
			</blockquote>
			<hr>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<form>
						<fieldset disabled>	
										
						  
						  <div class="form-group col-lg-3">
						    <label for="exampleInputEmail1">Numero Documento</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$em->tipo_documento.' : '.$em->nro_documento}}">
						  </div>
						  <div class="form-group col-lg-5">
						    <label for="exampleInputEmail1">Nombre</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$em->nombres_Rs.' '.$em->paterno.' '.$em->materno}}">
						  </div>
						  
						  <div class="form-group col-lg-3">
						    <label for="exampleInputEmail1">Telefono / Celular</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$em->telefono.' / '.$em->celular}}">
						  </div>
						  
						  <div class="form-group col-lg-4">
						    <label for="exampleInputEmail1">correo</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$em->correo}}">
						  </div>

						  <div class="form-group col-lg-3">
						    <label for="exampleInputEmail1">Cuenta Nº1</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$em->cuenta_1}}">
						  </div>
						  
						  <div class="form-group col-lg-3">
						    <label for="exampleInputEmail1">Cuenta Nº2</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$em->cuenta_2}}">
						  </div>
						  
						  <div class="form-group col-lg-3">
						    <label for="exampleInputEmail1">Cuenta Nº3</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$em->cuenta_3}}">
						  </div>
						  <div class="form-group col-lg-2">
						    <label for="exampleInputEmail1">Estado</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{$em->estado}}">
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