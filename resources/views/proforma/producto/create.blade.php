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
    		 Nuevo</a>
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
							<i class="fas fa-dolly"></i> Datos Productos Fiemec
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
                	{!!Form::open(array('url'=>'proforma/producto','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}

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
												<input type="text" name="serie_producto" class="form-control" {{old('serie_producto')}} placeholder="Número Serie ...">	
											</div> 												
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<input type="text" name="codigo_pedido" class="form-control" {{old('codigo_pedido')}} placeholder="Código Pedido ...">	
											</div>													
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<input type="text" name="codigo_producto" class="form-control" {{old('odigo_producto')}} placeholder="Código Producto ...">	
											</div> 												
										</div>
									</div>
									<div class="row">
										<div class="col-sm-8">
											<div class="form-group">
												<input type="text" name="nombre_producto" class="form-control"  {{old('nombre_producto')}} placeholder="Nombre Producto ...">	
											</div>												
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												   <select name="marca_producto" class="form-control">
												    <option ></option>
												    <option value="FIEMEC">FIEMEC</option>
													<option value="ABB">ABB</option>
													<option value="Schneider">Schneider</option>
												</select>													
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<input type="text" name="stock" class="form-control" placeholder="Stock ...">	
											</div>   												
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<input type="text" name="precio_unitario" class="form-control" placeholder="Precio ...">	
											</div>  												
										</div>
										<div class="col-sm-4">
											<div class="from-group">
												<select name="categoria_producto" class="form-control" >
													    <option value="">Seleccione Categoria</option>
														<option value="Catalogo">Catalogo</option>
														<option value="Producto Fiemec">Producto Fiemec</option>
												</select>
											</div>  												
										</div>											
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<input type="text" name="descripcion_producto" class="form-control" placeholder="Descripción...">
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="panel panel-default panel-shadow">
								<div class="panel-body">
									<div class="form-group">
										<label for="" class="control-label" style="font-size: 13px;color: #676a6c">
											Imagen Producto Fiemec
										</label>
			                			<input type="file" id="files" name="foto[]" class="form-control">
										<br>
										<output id="list">
										</output>
									</div>
						<script>
							function archivo(evt) {
      							var foto = evt.target.files; // FileList object
       
        						//Obtenemos la imagen del campo "file". 
      							for (var i = 0, f; f = foto[i]; i++) {         
           						//Solo admitimos imágenes.
           						if (!f.type.match('image.*')) {
                					continue;
           						}
       
           						var reader = new FileReader();
           
           						reader.onload = (function(theFile) {
               					return function(e) {
               					// Creamos la imagen.
                      			document.getElementById("list").innerHTML = ['<img class="thumb img-responsive" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
               					};
          					 })(f);
 
           					reader.readAsDataURL(f);
      					 }
					}
             
      				document.getElementById('files').addEventListener('change', archivo, false);

					</script>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<div class="text-right">
			    		<button class="btn btn-primary btn-sm" type="submit"><i class="far fa-save"></i> Guardar</button>
						<button class="btn btn-danger btn-sm" type="reset"><i class="far fa-times-circle"></i> Cancelar</button>
						<button  class="btn btn-success btn-sm " type="button"><a style="color: white!important;text-decoration: none" href="{{url('productos')}}"><i class="fas fa-reply-all"></i> Volver</a></button>
					</div>
				</div>
              </div><!-- /.box -->
              {!!Form::close()!!}
            </div><!-- /.col -->
          </div><!-- /.row -->
</section><!-- /.content -->
@endsection