<div class="modal fade in" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal-show-{{$pro->idProducto}}" style="border-radius:0px !important;">
  <div class="modal-dialog " role="document">
  	<div class="modal-content">
	    <div class="modal-header mh-c" >
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
	        <i class="far fa-eye modal-icon"></i>
	      </div>
	  <div class="modal-body">
	  	<div class="row" style="margin-bottom: 10px;">
	  		<div class="col-sm-12">
	  			<p class="modal-title" id="myModalLabel" style="color: #0F7A87;font-size: 16px;text-align: center;">{{$pro->nombre_producto}}</p>
	  		</div>
	  	</div>
	  	<div class="row">	
	  		<div class="col-lg-4">
	  			<img src="{{asset('fotos/productos/'.$pro->foto)}}" alt="{{$pro->nombre_producto}}" class="img-responsive img-thumbnail">
	  		</div><!--final de columna de foto-->
	  		<div class="col-lg-8">
	  			<p>
	  				<span><i class="fas fa-barcode"></i> Código de pedido : {{$pro->codigo_pedido}}</span> 
	  			</p>
	  			<p>
	  				<span><i class="fas fa-barcode"></i> Código de producto : {{$pro->codigo_producto}}</span>
	  			</p>
	  			<p>
	  				<span><i class="fas fa-pen-alt"></i> Descripción : {{$pro->descripcion_producto}}</span>
	  			</p>	
	  			<p>
	  				<span><i class="fas fa-money-bill"></i> Precio : S/. {{$pro->precio_unitario}}</span>
	  			</p>
	  			<p>
	  				<span>
	  					<i class="fas fa-book"></i> Marca : {{$pro->marca_producto}}
	  				</span>
	  			</p>
	  			<p>
	  				<span>
	  					<i class="far fa-bookmark"></i> Categoría : {{$pro->categoria_producto}}
	  				</span>
	  			</p>
	  			<p>
	  				<span>
	  					<i class="fas fa-calendar-alt"></i> Fecha : {{$pro->fecha_sistema}}
	  				</span>
	  			</p>
	  			<p>
	  				<span>
	  					<i class="fas fa-hashtag"></i> Estado : {{$pro->estado}}		
	  				</span>
	  			</p>
	  		</div><!--final de cuerpo-->
	  	</div>	
	  </div>
  <div class="modal-footer">
       <button type="button" class="btn btn-danger"  data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> Cerrar</button>
  		</div>

  	</div>

  </div> 


</div>
<!-- Modal -->