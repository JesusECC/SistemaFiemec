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
                <i class="fas fa-file-signature"></i> Ingreso</a>
        </li>
        <li class="active">Nuevo Ingreso</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-7">
			<div class="box">
				<div class="box-header with-border" style="padding: 10px !important">
					<h4>
						<strong style="font-weight: 400">
							<i class="fas fa-list-ul"></i> Lista de Entradas
						</strong>
					</h4>
					
				</div>
                <!-- /.box-header -->
				<div class="box-body">
					<table class="table table-bordered">
				       <thead>
			                    <tr>
			                        <th>N° Guia</th>
			                        <th>Fecha</th>
			                        <th>Codigo</th>
			                        <th>Descripcion del Producto</th>
			                        <th>Cant.</th>
			                        <th>Quitar</th>
			                    </tr>
			            </thead>
			            <tbody id="body">
                        </tbody>
			        </table>
				</div>
			</div>
		</div>
		<div class="col-md-5">
						<div class="panel panel-default panel-shadow">
							<div class="box-body">
								<div class="row">
									<div class="col-sm-5">
										<div class="form-group">
											<label>N° de Orden</label>
											<input type="text" id="orden" name="orden" class="form-control">
										</div>
									</div>
									<div class="col-sm-7">
										<div class="form-group">
											<label>Buscar por Codigo</label>
											<input type="text" id="codigope" name="codigope" class="form-control">
										</div>
									</div>
									<div class="col-sm-12">
                                        <div class="form-group">
                                         	<label>Marca</label>
                                         	<select required id="marca" name="marca" class="form-control">
                                         		<option value="" disabled selected>Seleccione Marca</option>
                                         		@foreach($marcas as $ma)
                                         		<option value="{{$ma->idMarca}}">{{$ma->nombre_proveedor}}</option>
                                         		@endforeach
                                         	</select>
                                        </div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<label>Familia</label>
											<select required id="familia" name="familia" class="form-control">
											</select>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<label>Producto</label>
											<select required id="producto" name="producto" class="form-control">
											</select>
										</div>
									</div>
									<div class="col-sm-9">
										<div class="form-group">
											<label>Descripcion</label>
											<input type="text" id="descripcion" name="descripcion" class="form-control">
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Precio</label>
											<input type="text" id="precio" disabled name="precio" class="form-control">
											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label>Stock Actual</label>
											<input type="text" id="stockA" disabled name="stockA" class="form-control">
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label>Cantidad</label>
											<input type="number" id="cantidad" name="cantidad" class="form-control">
										</div>
									</div>
									<div class="col-sm-2" style="margin-top: 25px">
										<div class="form-group">
											<button  id="save" class="btn btn-primary btn-sm" type="button"><i class="far fa-save"></i> Agregar</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
	</div>
			
@push('scripts')
<script>

	$(document).ready(function(){
		
		$('#marca').change(function(){
	     var idmarca=$('#marca').val();
         familia(idmarca);
		});

		$('#codigope').keyup(function(){ 
        codigopedido=$('#codigope').val(); 
        busqueda(codigopedido);
        });

        $('#producto').change(function(){
          idProducto=$('#producto').val();
          asignarvalor(idProducto);
        });
 
        $(document).ready(function(){
          lista();
        });

        $('#save').click(function(){
         guardar();
         lista();
        });

	});
   

	function familia(marcas){

		console.log(marcas);
    
    $.ajax({
    	headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    	data:{marca:marcas},// datos que se envian a traves de ajax
    	url:'mar',// archivo que recibe la peticion
    	type:'post', //metodo de envio
    	dataType:"json", //tipo de dato que se envia
    	beforeSend: function() {

    		console.log('procesando');
    	},
    	success: function (response){//una vez que el archivo recibe el request lo procesa y lo devuelve
    		console.log(response);

    		if(response.veri==true){
    			var familias=response.familia;
                var va;
                var productos=response.producto;
                var va2;

    			console.log('aca',familias);
    			console.log('aca',productos);
    			

    			va = '<option value="" disabled="" selected=""> Selecione Familia</option>'
    			va2 = '<option value="" disabled="" selected=""> Selecione Familia</option>'
    			for(const i in familias){

    				va+='<option value="'+familias[i]['idFamilia']+'">'+familias[i]['nombre_familia']+'</option>';
    			}
    			$('#familia').html(va);

    			for(const i in productos){

    				va2+='<option value="'+productos[i]['idProducto']+'" >'+productos[i]['codigo_pedido']+' | '+productos[i]['nombre_producto']+' | '+productos[i]['descripcion_producto']+' | '+productos[i]['nombre_proveedor']+'</option>'
    			}
    			$("#producto").html(va2);


    		}else{
    			alert("problemas al enviar la informacion");
    		}


    	}

    });

    }

    function busqueda(codigopedido){
        console.log(codigopedido,'-----');
      $.ajax({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{codigop:codigopedido}, //datos que se envian a traves de ajax
            url:'busEn', //archivo que recibe la peticion
            type:'post', //método de envio
            dataType:"json",//tipo de dato que envio 
            beforeSend: function () {
                console.log('procesando');
                // $("#resultado").html("Procesando, espere por favor...");
            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                console.log(response);
                if(response.veri==true){
                    var codigoped=response.producto;
                    var va;
                    console.log('productowey',codigoped);
                    va='<option value="" disabled="" selected="">Seleccione</option>'
                    for(const i in codigoped){
                        va+='<option value="'+codigoped[i]['idProducto']+'">'+codigoped[i]['codigo_pedido']+' | '+codigoped[i]['nombre_producto']+' | '+codigoped[i]['marca_producto']+' | '+codigoped[i]['descripcion_producto']+'</option>';                 
                    }
                    $("#producto").html(va); 
                }else{
                    alert("problemas al enviar la informacion");
                }
            }
        });
    }

    function asignarvalor(idProducto){
    	console.log('valor',idProducto);
    	$.ajax({
    		headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    		data:{valores:idProducto},
    		url:'asig',
    		type:'post',
    		dataType:'json',
    		beforeSend: function() {
    			console.log('procesando');
    		},
    		success: function (response){

    			console.log(response);
    			if(response.veri==true){
    			var stockprecio = response.stockp;
                $('#precio').val(stockprecio[0]['precio_unitario']);
                $('#stockA').val(stockprecio[0]['stock']);

            }else{

            	alert("problemas al enviar la informacion");

            }

    	}
    });
}

	function lista(){
		$.ajax({
			headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			url:'list',
			type:'GET',
			dataType:'json',

			beforeSend: function() {
				console.log('procesando');

			},
			success: function (response){

				console.log(response);

				if(response.veri==true){
					var listar=response.entradas;
					var va;
					console.log('lista',listar);
					//va='<tr><td></td><td></td><td></td><td></td><td></td><td class=""><center><button type="" rel="" title="" class="" onclick=""><i class=""></i></button></center></td></tr>'
					for(const i in listar){
						va+='<tr>'+
						'<td>'+listar[i]['numero_comprobante']+'</td>'+
						'<td>'+listar[i]['fecha']+'</td>'+
						'<td>'+listar[i]['codigo_pedido']+'</td>'+
						'<td>'+listar[i]['nombre_producto']+' | '+listar[i]['descripcion_producto']+' | '+listar[i]['nombre_proveedor']+'</td>'+
						'<td>'+listar[i]['cantidad']+'</td>'+
						'<td>'+
                                '<center>'+
                                    '<button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs" onclick="eliminar('+listar[i]['idIngreso']+');">'+
                                            '<i class="fas fa-trash"></i>'+
                                    '</button>'+                                
                                '</center>'+

                            '</td>'+
						'</tr>';
					}
					$("#body").html(va);
				}else{
					 alert("problemas al enviar la informacion");
				}
			}

		});
    }

    function guardar(){
    	var numeroorden=$('#orden').val();
    	var idProducto=$('#producto').val();
    	var descripcion=$('#descripcion').val();
    	var cantidad=$('#cantidad').val();
    	var iduser={!! Auth::user()->id !!}

    	console.log(numeroorden,idProducto,descripcion,cantidad,iduser);

         $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
              data:{numero:numeroorden,idProducto:idProducto,descripcion:descripcion,cantidad:cantidad,uss:iduser},
              url:'save',
              type:'post',
              datatype:'json'
         });

    }

    function eliminar(idIngreso){
    	console.log(idIngreso);



       $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
              data:{dato:idIngreso},
              url:'delete',
              type:'post',
              datatype:'json'
         });

       lista();

    }

	
				
</script>
@endpush
</section><!-- /.content -->
@endsection