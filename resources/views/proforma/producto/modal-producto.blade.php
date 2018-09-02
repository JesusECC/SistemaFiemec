<div class="modal fade" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal-show-{{$pro->idProducto}}">


  <div class="modal-dialog" role="document">
    <style>
      .modal-header
      {
        border-top-left-radius: 5px !important;
        border-top-right-radius: 5px !important;
        border-bottom: 1px solid #1C4C6D;
        border-left: 2px solid #1C4C6D;
        border-right: 2px solid #1C4C6D;
        border-top: 2px solid #1C4C6D;
        color: white;
      }
    </style>

  	<div class="modal-content">
	      <div class="modal-header" style="background-color: #49AA9D">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" style="width: 60%;">¡Producto!</h4>
    		<input class="form-control text-center"  type="text" placeholder="codigo" value="{{$pro->codigo_producto}}" disabled="" style="width: 13%;float: right;margin: -25px 20px 0 10px !important;">
    		<label style="float: right;margin-top: -10px;">Código de Producto :</label>
	      </div>
	  <div class="modal-body">
	  	<div class="row">	
	  		<div class="col-lg-3">
	  			<img src="{{asset('fotos/productos/'.$pro->foto)}}" alt="{{$pro->nombre_producto}}" class="img-responsive img-thumbnail">
	  		</div><!--final de columna de foto-->
	  		<div class="col-lg-9">
	  			<h4 class="modal-title" id="myModalLabel" style="color: #0F7A87">{{$pro->nombre_producto}}</h4>

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
	  			<br>
	  			<span>
	  				{{$pro->descripcion_producto}}
	  			</span>
	  			<br>
	  			<span>
	  				{{$pro->marca_producto}}
	  			</span>
	  			<span>
	  				///
	  			</span>
	  			<span>
	  				{{$pro->categoria_producto}}
	  			</span>
	  		</div><!--final de cuerpo-->
	  	</div>	
	  </div>
  <div class="modal-footer">
       <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Cerrar</button>
  	   <button herf="" type="submit" class="btn btn-danger">Confirmar</button>
  			
  		</div>

  	</div>

  </div> 


</div>
<!-- Modal -->