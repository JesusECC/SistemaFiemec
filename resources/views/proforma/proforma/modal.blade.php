<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$prof->idProforma}}">

{{Form::Open(array('action'=>array('ControllerProformaUnitaria@destroy',$prof->idProforma),'method'=>'delete'))}}

  <div class="modal-dialog">
  	<div class="modal-content">
  		<div class="modal-header">
  	       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  	       	<samp aria-hidden="true">x</samp>
  	       </button>
  	       <h4 class="modal-title">cancelar venta</h4>
  </div>
  <div class="modal-body">
  			<p>Confirme si desea cancelar la venta</p>
  </div>
  <div class="modal-footer">
       <button type="button" class="btn btn-submit" data-dismiss="modal" aria-label="Close">Cerrar</button>
  	   <button herf="" type="submit" class="btn btn-primary">Confirmar</button>
  			
  		</div>

  	</div>

  </div> 

	{{Form::Close()}}

></div>