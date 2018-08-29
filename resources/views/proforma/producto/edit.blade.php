@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="panel-title">Modificar Producto: {{$producto->nombre_producto}}</h2>
				@if(count($errors)>0)
				<div class="alert-alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
						@endforeach 
					</ul>
				</div>
				 @endif
			</div><!--finaliza el panel-heading-->
		    {!!Form::model($producto,['method'=>'PATCH','route'=>['producto.update',$producto->id]])!!}
		    {{Form::token()}}	
		    <div class="panel-body" style="background-color: #ECF0F5 !important">
		    	<div class="col-lg-8 col-md-8 col-sm-12 col-xl-12">
		    		<div class="box"  style="border-radius: 7px !important;">
		                <div class="box-header with-border" style="padding:5px !important;background-color: rgb(82, 86, 97);color: white;border-top-left-radius: 2px !important;border-top-right-radius: 2px !important;">
		                 <h4>Ingrese datos del producto</h4>
		                  <div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		                    
		                  </div>
		                </div><!--finaliza el box-header-->	
			            <div class="box-body" >
			                <div class="row">
			                    <div class="col-md-12">
			                      	<div class="row">
				                      	<div class="col-lg-4">
											<div class="form-group">
												<label for="serie_producto">Numero de serie</label>
												<input type="text" name="serie_producto" class="form-control" required value="{{$producto->serie_producto}}">	
											</div>                     		
				                      	</div>
				                      	<div class="col-lg-4">
											<div class="form-group">
												<label for="codigo_pedido">Codigo de Pedido</label>
												<input type="text" name="codigo_pedido" class="form-control" required value="{{$producto->codigo_pedido}}">	
											</div>	                      		
				                      	</div> 
				                      	<div class="col-lg-4">
											<div class="form-group">
												<label for="codigo_producto">Codigo producto</label>
												<input type="text" name="codigo_producto" class="form-control" required value="{{$producto->codigo_producto}}">		
											</div>  	                      		
				                      	</div>                     		
			                      	</div>
			                      	<div class="row">
			                      		<div class="col-lg-8">
											<div class="form-group">
												<label for="nombre_producto">Nombre producto</label>
												<input type="text" name="nombre_producto" class="form-control" required value="{{$producto->nombre_producto}}">	
											</div>	
			                      		</div>
			                      		<div class="col-lg-4">
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
			                      		<div class="col-lg-4">
											<div class="form-group">
												<label for="stock">stock</label>
												<input type="number" name="stock" class="form-control"  value="{{$producto->stock}}">	
											</div>                      			
			                      		</div>
			                      		<div class="col-lg-4">
											<div class="form-group">
												<label for="precio_unitario">Precio</label>
												<input type="text" name="precio_unitario" class="form-control" required value="{{$producto->precio_unitario}}">
											</div>                      			
			                      		</div>
			                      		<div class="col-lg-4">
											<div class="form-group">
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
			                      		<div class="col-lg-12">
											<div class="form-group">
												<label for="descripcion_producto">Descripcion</label>
												<input type="text" name="descripcion_producto" class="form-control" required value="{{$producto->descripcion_producto}}">
											</div>
			                      		</div>
			                      	</div>
			                    </div>
			                </div><!-- /.row -->
			            </div><!-- /.box-body -->		               	    			
		    		</div><!--finaliza el box del panel izquierdo-->
		    	</div><!--finaliza el panel izquierdo-->
		    	<div class="col-lg-4 col-md-4 col-sm-12 col-xl-12">
			    	<div class="box">
		                <div class="box-header with-border" style="padding:5px !important;background-color: rgb(82, 86, 97);color: white;border-top-left-radius: 2px !important;border-top-right-radius: 2px !important;">
		                 <h4>Ingrese imagen </h4>
		                  <div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		                    
		                  </div>
		                </div>
		                <div class="box-body">
		                	<div class="row">
		                		<div class="col-lg-12">
		                			<label for="foto">Imagen</label>
									<input type="file" id="files" name="foto[]"  class="form-control">
	
									<br>
									<output id="list">
									@if(($producto->foto)!="")
										<img  src="{{asset('/fotos/productos/'. $producto->foto)}}" alt="" >
									@endif
									</output>
		                		</div>
		                	</div>
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
		    	</div><!--finaliza el panel derecho-->
				<div class="container">
				   	<div class="row">
				    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				    		<div style="margin-top: 20px" class="from-group ">
				    			<button class="btn btn-primary" type="submit">guardar</button>
								<button class="btn btn-danger" type="reset">Cancelar</button>
								<button style="margin-left: 300px" class="btn btn-success " type="button"><a style="color: white!important" href="{{url('productos')}}">volver</a></button>
							</div>
						</div>
					</div>
				</div>		    	
		    </div><!--finaliza el body-->	
		</div><!--finaliza el panel-primary-->
	</div><!--finaliza la colummna-->
	{!!Form::close()!!}
</div><!--finaliza el row-->
@endsection
