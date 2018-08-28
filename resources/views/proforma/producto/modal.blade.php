<div class="modal fade" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal-delete-{{$pro->idProducto}}">

{{Form::Open(array('action'=>array('ControllerProducto@destroy',$pro->idProducto),'method'=>'delete'))}}

  <div class="modal-dialog" role="document">
    <style>
      .modal-content
      {
        border-radius: 5px !important;
      }
    </style>
  	<div class="modal-content">
  		<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar</h4>

      </div>
  <div class="modal-body">
  			<p>Confirme si desea Eliminar el siguiente Producto: <h4>{{$pro->nombre_producto}}</h4> </p>
  </div>
  <div class="modal-footer">
       <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Cerrar</button>
  	   <button herf="" type="submit" class="btn btn-danger">Confirmar</button>
  			
  		</div>

  	</div>

  </div> 

	{{Form::Close()}}

</div>
<!-- Modal -->
