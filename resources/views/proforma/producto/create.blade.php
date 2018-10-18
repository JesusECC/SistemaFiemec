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
									
										
										
										<label for="" class="control-label" style="font-size: 13px;color: #676a6c">
											Tipo Producto
										</label>
										<div class="form-group">
												<select id="e" name="marca_producto" class="form-control">
												 <option value="" disabled selected >Selecione Tipo de Producto</option>
												<option value="CABB">ABB</option>
												<option value="Cschneider">Schneider</option>
												<option value="Bandejas">Bandejas</option>
												<option value="Tableros">Tableros</option>
												<option value="Accesorios">Accesorios</option>
												
												</select>
											</div> 	
									
								

									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<input id="a" type="text" name="serie_producto" class="form-control" {{old('serie_producto')}} placeholder="Número Serie ...">	
											</div> 												
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<input id="b" type="text" name="codigo_pedido" class="form-control" {{old('codigo_pedido')}} placeholder="Código Pedido ...">	
											</div>													
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<input id="c" type="text" name="codigo_producto" class="form-control" {{old('odigo_producto')}} placeholder="Código Producto ...">	
											</div> 												
										</div>
									</div>
									<div class="row">
										<div class="col-sm-8">
											<div class="form-group">
												<input id="d" type="text" name="nombre_producto" class="form-control"  {{old('nombre_producto')}} placeholder="Nombre Producto ...">	
											</div>												
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												   <select id="e" name="marca_producto" class="form-control" placeholder="ingresa tipo producto" >
												     <option value="" disabled selected>Seleccione Marca</option>
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
												<input id="f" type="text" name="stock" class="form-control" placeholder="Stock ...">	
											</div>   												
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<input id="g" type="text" name="precio_unitario" class="form-control" placeholder="Precio ...">	
											</div>  												
										</div>
										<div class="col-sm-4">
											<div class="from-group">
												<select id="h" name="categoria_producto" class="form-control" >
													    <option value="" disabled selected>Seleccione Categoria</option>
														<option value="Catalogo">Catalogo</option>
														<option value="Producto Fiemec">Producto Fiemec</option>
												</select>
											</div>  												
										</div>											
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<input id="i" type="text" name="descripcion_producto" class="form-control" placeholder="Descripción...">
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
			                			<input id="" type="file" id="files" name="foto[]" class="form-control">
										<br>
										<output id="list">
										</output>
									</div>
                                    <div class="col-sm-4" >
								
                                        </div>
									<div class="col-sm-3" >
										<center>
                                    <button  type="button" id="bt_add" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar Producto</button>
                                    </center>
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
						<div class="col-md-12">
							<div class="panel panel-default panel-shadow">
								<div class="panel-body">
									<div class="form-group">
										<label for="" class="control-label" style="font-size: 13px;color: #676a6c">
											Lista
										</label>
			                			<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
            		<thead style="background-color:#A9D0F5">
            			<th>opciones</th>
            			<th>N serie</th>
            			<th>Cod Pedido</th>
            			<th>Cod Producto</th>
            			<th>Nombre Producto</th>
            			<th>Marca</th>
            			<th>Tipo</th>
            			<th>Familia</th>
            			<th>Stock</th>
            			<th>Precio</th>
            			<th>Categoria</th>
            			<th>descripcion</th>
            			<th>Precio Unitario</th>
            			

            			
            		</thead>
            		<tfoot>
            			
            			<th></th>
            			<th></th>
            			<th></th>
            			<th></th>
            			<th></th>
            			<th></th>
            			<th></th>
            			<th></th>
            			<th></th>
            			<th></th>
            			<th></th>
            			<th></th>
            			<th></th>

            			
            			

            		</tfoot>
            		
            	</table>
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
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</section>


@push('scripts')
<script>
$(document).ready(function(){
    $('#bt_add').click(function(){
        agregar();
    });
});

var cont=0;


$("#guardar").show();

function agregar()
{
    
    numserie=$("#a").val();
    codpedido=$("#b").val();
    codproducto=$("#c").val();
    nomproducto=$("#d").val();
    stock=$("#e").val();
    precio=$("#f").val();
    cat=$("#g").val();
    descripcion=$("#h").val();
    tipoP=$("#i").val();
    familia=$("#j").val();
   

    if(tarea!="")
    {
       

       var fila='<tr class="selected" id="fila'+cont+'"> <td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td> <td><input type="hidden" name="nombre_tarea[]" value="'+tarea+'">'+tarea+'</td>  <td><input type="hidden" name="nombre_tarea[]" value="'+tarea+'">'+tarea+'</td> <td><input type="hidden" name="nombre_tarea[]" value="'+tarea+'">'+tarea+'</td> <td><input type="hidden" name="nombre_tarea[]" value="'+tarea+'">'+tarea+'</td> <td><input type="hidden" name="nombre_tarea[]" value="'+tarea+'">'+tarea+'</td> <td><input type="hidden" name="nombre_tarea[]" value="'+tarea+'">'+tarea+'</td> <td><input type="hidden" name="nombre_tarea[]" value="'+tarea+'">'+tarea+'</td> <td><input type="hidden" name="nombre_tarea[]" value="'+tarea+'">'+tarea+'</td> <td><input type="hidden" name="nombre_tarea[]" value="'+tarea+'">'+tarea+'</td></tr>';
       cont++;
       limpiar();
       evaluar();
       $('#detalles').append(fila);

    }
    else
    {
        alert("erros al ingresar el detale del ingreso, revise los datos del articulo");
    }
}


   
    function limpiar(){
        $("#pnombre_tarea").val("");
        
    }

    function evaluar()
    {
        if(cont<0)
        {
            $("#guardar").hide();
        }
        else
        {
            $("#guardar").show();
        }
    }
 function eliminar(index){
        
        $("#fila" + index).remove();
        evaluar();
    }

</script>

@endpush
@endsection