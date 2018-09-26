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
    		 Editar</a>
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
							<i class="fas fa-dolly"></i> Editar Datos Productos Fiemec
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
                	{!!Form::model($producto,['method'=>'PATCH','route'=>['producto.update',$producto->id]])!!}
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
												<label for="serie_producto">Numero de serie</label>
												<input type="text" name="serie_producto" class="form-control" required value="{{$producto->serie_producto}}">
											</div> 												
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label for="codigo_pedido">Codigo de Pedido</label>
												<input type="text" name="codigo_pedido" class="form-control" required value="{{$producto->codigo_pedido}}">		
											</div>													
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label for="codigo_producto">Codigo producto</label>
												<input type="text" name="codigo_producto" class="form-control" required value="{{$producto->codigo_producto}}">		
											</div> 												
										</div>
									</div>
									<div class="row">
										<div class="col-sm-8">
											<div class="form-group">
												<label for="nombre_producto">Nombre producto</label>
												<input type="text" name="nombre_producto" class="form-control" required value="{{$producto->nombre_producto}}">		
											</div>												
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label>Marca</label>
												<select name="marca_producto" class="form-control">
													@if($producto->marca_producto=='FIEMEC')
												   <option value="FIEMEC" selected>FIEMEC</option>
												   <option value="ABB">ABB</option>
												   <option value="SCHNEIDER">SCHNEIDER</option>	
												   @elseif($producto->marca_producto=='ABB')
												   <option value="FIEMEC">FIEMEC</option>
												   <option value="ABB" selected>ABB</option>
												   <option value="SCHNEIDER">SCHNEIDER</option>
												   @else($producto->marca_producto=='SCHNEIDER')
												   <option value="FIEMEC">FIEMEC</option>
												   <option value="ABB">ABB</option>
												   <option value="SCHNEIDER" selected>SCHNEIDER</option>
												   @endif
												</select>													
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<label for="stock">stock</label>
												<input type="number" name="stock" class="form-control"  value="{{$producto->stock}}">	
											</div>   												
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label for="precio_unitario">Precio</label>
												<input type="text" name="precio_unitario" class="form-control" required value="{{$producto->precio_unitario}}">
											</div>  												
										</div>
										<div class="col-sm-4">
											<div class="from-group">
												<label>Categoria</label>
												<select name="categoria_producto" class="form-control">
													@if($producto->categoria_producto=='Catalogo')
												   <option value="Catalogo" selected>Catalogo</option>
												   <option value="Producto Fiemec">Producto Fiemec</option>
												   @else($producto->categoria_producto=='Producto Fiemec')
												   <option value="Catalogo">Catalogo</option>
												   <option value="Producto Fiemec" selected>Producto Fiemec</option>
												   @endif
												</select>
											</div>  												
										</div>											
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label for="descripcion_producto">Descripcion</label>
												<input type="text" name="descripcion_producto" class="form-control" required value="{{$producto->descripcion_producto}}">
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
