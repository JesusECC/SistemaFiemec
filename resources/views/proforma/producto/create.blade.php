@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
		<div class="panel panel-primary">
		  <div class="panel-heading">
		    <h2 class="panel-title">Nuevo Producto</h2>
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
	{!!Form::open(array('url'=>'producto-store','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}

    {{Form::token()}}
		  <div class="panel-body">
		    <div class="col-lg-8 col-md-8 col-sm-12 col-xl-12">
		    	<div class="box">
	                <div class="box-header with-border" style="padding:5px !important;">
	                 <h4>Ingrese datos del producto</h4>
	                  <div class="box-tools pull-right">

	                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                    
	                  </div>
	                </div>	
                <div class="box-body">
                  	<div class="row">
                      <div class="col-md-12">
                      	<div class="row">
	                      	<div class="col-lg-4">
								<div class="form-group">
									<label for="serie_producto">Numero de serie</label>
									<input type="text" name="serie_producto" class="form-control" {{old('serie_producto')}} placeholder="Nº serie...">	
								</div>                     		
	                      	</div>
	                      	<div class="col-lg-4">
								<div class="form-group">
									<label for="codigo_pedido">Codigo de Pedido</label>
									<input type="text" name="codigo_pedido" class="form-control" placeholder="codigo pedido...">	
								</div>	                      		
	                      	</div> 
	                      	<div class="col-lg-4">
								<div class="form-group">
									<label for="codigo_producto">Codigo producto</label>
									<input type="text" name="codigo_producto" class="form-control" placeholder="codigo...">	
								</div>  	                      		
	                      	</div>                     		
                      	</div>
                      	<div class="row">
                      		<div class="col-lg-8">
								<div class="form-group">
									<label for="nombre_producto">Nombre producto</label>
									<input type="text" name="nombre_producto" class="form-control" placeholder="nombre...">	
								</div>	
                      		</div>
                      		<div class="col-lg-4">
								<div class="from-group">
								    <label>Marca</label>
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
                      		<div class="col-lg-4">
								<div class="form-group">
									<label for="stock">stock</label>
									<input type="text" name="stock" class="form-control" placeholder="stock...">	
								</div>                      			
                      		</div>
                      		<div class="col-lg-4">
								<div class="form-group">
									<label for="precio_unitario">Precio</label>
									<input type="text" name="precio_unitario" class="form-control" placeholder="precio...">	
								</div>                      			
                      		</div>
                      		<div class="col-lg-4">
								<div class="from-group">
									<label>Categoria</label>
									<select name="categoria_producto" class="form-control">
									    	<option ></option>
											<option value="Catalogo">Catalogo</option>
											<option value="Producto Fiemec">Producto Fiemec</option>
									</select>
								</div>                      			
                      		</div>              
                      	</div>
                      	<div class="row">
                      		<div class="col-lg-12">
								<div class="form-group">
									<label for="descripcion_producto">Descripcion</label>
									<input type="text" name="descripcion_producto" class="form-control" placeholder="descripcion...">
								</div>
                      		</div>
                      	</div>
                      </div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->	    		
		    	</div>
		    </div>
		    <div class="col-lg-4 col-md-4 col-sm-12 col-xl-12">
		    	<div class="box">
		    		<label for="foto">Imagen</label>
					<input type="file" name="foto" class="form-control">
		    	</div>		    	
		    </div>
		  </div>
		  <div style="margin-top: 20px" class="from-group ">
		  	<button class="btn btn-primary" type="submit">guardar</button>
		  	<button class="btn btn-danger" type="reset">Limpiar</button>
		  	<button style="margin-left: 300px" class="btn btn-success " type="button"><a style="color: white!important" href="{{url('proforma/producto')}}">volver</a></button>
		  </div>
		</div>
    </div>
{!!Form::close()!!}

</div>


@endsection