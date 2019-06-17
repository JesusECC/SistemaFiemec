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
									
										
								<div class="row">
									<div class="col-sm-6">				
										<div class="form-group">
                      <label>Tipo Producto</label>
												<select id="a" name="tipo_producto" class="form-control">
												 <option value="" disabled selected >Selecione Tipo de Producto</option>
												<option value="CAS">Catalogo</option>
												<option value="Bandejas">Bandejas</option>
												<option value="Tableros">Tableros</option>
												<option value="Accesorios">Accesorios</option>
												
												</select>
										</div>
									</div>	

								<div class="col-sm-6">
                    <div class="form-group label-floating">  
                    <label>Nombre de Familia</label>                                     
                                      <select required name="idFamilia" class="form-control selectpicker" id="b" data-live-search="true">

                                 <option value="" disabled selected>Seleccione Familia</option>
                                      @foreach($familia as $fa)
                                               
                                <option value="{{$fa->idFamilia}}_{{$fa->nombre_familia}}">{{$fa->nombre_familia}}</option>
                                               @endforeach  
                                           </select>
                                        </div> 
                                    </div> 
								</div>

									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
                        <label>Serie Producto</label>  
                        <input id="nombreMarca" type="hidden" name="nombreMarca" class="form-control">
												<input id="c" type="text" name="serie_producto" class="form-control" {{old('serie_producto')}} placeholder="Número Serie ...">	
											</div> 												
										</div>
										<div class="col-sm-4">
											<div class="form-group">
                        <label>Codigo Pedido</label>
												<input id="d" type="text" name="codigo_pedido" class="form-control" {{old('codigo_pedido')}} placeholder="Código Pedido ...">	
											</div>													
										</div>
										<div class="col-sm-4">
											<div class="form-group">
                        <label>Codigo Producto</label>
												<input id="e" type="text" name="codigo_producto" class="form-control">	
											</div> 												
										</div>
									</div>
									<div class="row">
										<div class="col-sm-8">
											<div class="form-group">
                        <label>Nombre Producto</label>
												<input id="f" type="text" name="nombre_producto" class="form-control"  {{old('nombre_producto')}} placeholder="Nombre Producto ...">	
											</div>												
										</div>
										<div class="col-sm-4">
                                      <div class="form-group label-floating"> 
                                      <label>Marca Producto</label>                                      
                                      <select name="idMarca" id="idMarca" class="form-control selectpicker" id="idMarca" data-live-search="true">

                                 <option value="" disabled selected>Seleccione Marca</option>
                                      @foreach($marca as $fa)
                                               
                                <option value="{{$fa->idMarca}}_{{$fa->nombre_proveedor}}">{{$fa->nombre_proveedor}}</option>
                                               @endforeach  
                                           </select>
                                        </div> 
                                    </div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
                        <label>Stock</label> 
												<input id="h" type="text" name="stock" class="form-control" placeholder="Stock ...">	
											</div>   												
										</div>
										<div class="col-sm-4">
											<div class="form-group">
                        <label>Precio</label> 
												<input id="i" type="text" name="precio_unitario" class="form-control" placeholder="Precio ...">	
											</div>  												
										</div>
										<div class="col-sm-4">
											<div class="from-group">
                        <label>Categoria</label> 
												<select id="j" name="categoria_producto" class="form-control" >
													    <option value="" disabled selected>Categoria</option>
														<option value="Catalogo">Catalogo</option>
														<option value="Producto Fiemec">Producto Fiemec</option>
												</select>
											</div>  												
										</div>											
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
                        <label>Descripcion</label> 
												<input id="k" type="text" name="descripcion_producto" class="form-control" placeholder="Descripción...">
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
			                			<input  type="file" id="files" name="foto[]" class="form-control">
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
                        /*document.getElementById("list").innerHTML = ['<img class="thumb img-responsive" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');*/
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
                        <th>Tipo</th>
                        <th>Familia</th>                      
                        <th>N serie</th>
                        <th>Cod Pedido</th>
                        <th>Cod Producto</th>
                        <th>Nombre Producto</th>
                        <th>Marca</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Categoria</th>
                        <th>descripcion</th>
                        
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
     $('#idMarca').change(function(){
        MostrarMarca();
    });
});

var cont=0;


$("#guardar").show();

$("#a").change(cambiaropcion);

function cambiaropcion(){
        tipoP=$("#a").val();

       if(tipoP=="Bandejas"){
            $('#d').attr("disabled", true);
            $('#h').attr("disabled", true);
            $('#i').attr("disabled", true);
        }
      else if(tipoP=="Tableros"){
            $('#d').attr("disabled", true);
            $('#h').attr("disabled", true);
            $('#i').attr("disabled", true);
        }
        else if(tipoP=="Accesorios"){
            $('#d').attr("disabled", true);
            $('#h').attr("disabled", true);
            $('#i').attr("disabled", true);
        }
        else{
           $('#d').attr("disabled", false);
           $('#h').attr("disabled", false); 
           $('#i').attr("disabled", false);  
        }
   }

function MostrarMarca(){
       
        Marca=document.getElementById('idMarca').value.split('_');
        Nommarca=Marca[1];
        $("#nombreMarca").val(Marca[1]);
      
}

function agregar()
{

	datosFamilia=document.getElementById('b').value.split('_');
   Marca=document.getElementById('idMarca').value.split('_');
    

    idFamilia=datosFamilia[0];
    idM=Marca[0];
    tipoP=$("#a").val();
    familia=$("#b option:selected").text();
    numserie=$("#c").val();
    codpedido=$("#d").val();
    codproducto=$("#e").val();
    nomproducto=$("#f").val();
   // marca=$("#g").val();
    stock1=$("#h").val();

    if(stock1!=""){
      stock=stock1;
    }else{
      stock=0;
    }
    
    precio=$("#i").val();
    cat=$("#j").val();
    descripcion=$("#k").val();
    foto=$("#files").val();
    nombreM=$("#nombreMarca").val();
   

    if(idFamilia!="" && idM!="" && cat!="")
    {
       

       var fila='<tr class="selected" id="fila'+cont+'"> <td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td> <td><input type="hidden" name="tipo_producto[]" value="'+tipoP+'">'+tipoP+'</td> <td><input type="hidden" name="idFamilia[]" value="'+idFamilia+'">'+idFamilia+'</td> <td><input type="hidden" name="serie_producto[]" value="'+numserie+'">'+numserie+'</td>  <td><input type="hidden" name="codigo_pedido[]" value="'+codpedido+'">'+codpedido+'</td> <td><input type="hidden" name="codigo_producto[]" value="'+codproducto+'">'+codproducto+'</td> <td><input type="hidden" name="nombre_producto[]" value="'+nomproducto+'">'+nomproducto+'</td> <td><input type="hidden" name="idMarca[]" value="'+idM+'">'+nombreM+'</td><td><input type="hidden" name="stock[]" value="'+stock+'">'+stock+'</td> <td><input type="hidden" name="precio_unitario[]" value="'+precio+'">'+precio+'<input type="hidden" name="marca_producto[]" value="'+nombreM+'">'+'</td> <td><input type="hidden" name="categoria_producto[]" value="'+cat+'">'+cat+'</td> <td><input type="hidden" name="descripcion_producto[]" value="'+descripcion+'">'+descripcion+'</td> <td><input type="hidden" name="foto[]" value="'+foto+'">'+foto+'</td> </tr>';

      

       cont++;
       limpiar();
       evaluar();
       $('#detalles').append(fila);

    }
    else
    {
        alert("error al ingresar el producto, revise los datos del producto");
    }
}


   
    function limpiar(){
        $("#a").val("");
      
        $("#c").val("");
        $("#d").val("");
        $("#e").val("");
        $("#f").val("");
        $("#g").val("");
        $("#h").val("");
        $("#i").val("");
        $("#j").val("");
        $("#k").val("");
        
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