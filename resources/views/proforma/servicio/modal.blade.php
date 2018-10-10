<div class="modal fade in" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal-delete-{{$prof->idProforma}}" style="padding-left: 17px;border-radius:0px !important;">
 
{{Form::Open(array('action'=>array('ControllerProformaServicio@destroy',$ser->idProforma),'method'=>'delete'))}}

  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header mh-p" style="border:1px solid #EC5565 !important;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		<h4 class="modal-title">cancelar Servicio</h4>
		</button>
        
      </div>
      <div class="modal-body">
        <center>
          <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-transparent text-center p-md">
                <i class="fas fa-exclamation-triangle fa-3x text-warning"></i>
                <h3 class="m-t-none m-b-sm text-warning">Advertencia</h3>
                      
                <p class="p-text-delete">Al eliminar el siguiente producto <span style="color: red">{{$prof->serie_proforma.' /  f000-'.$prof->idProforma}}</span>  no volvera a verlo en la lista </p>
              </div>
            </div>
            <h3>¿Desea eliminar el servicio?</h3>
          </div>
          
        </center>
  </div>
  <div class="modal-footer">
       <button type="button" class="btn btn-danger"  data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> Cerrar</button>
       <button herf="" type="submit" class="btn " style="background-color: #18A689 !important;border: 1px solid #18A689 !important;color: white !important"><i class="far fa-check-square"></i>Confirmar</button>
        
      </div>

    </div>

  </div> 

  {{Form::Close()}}

</div>
<!-- Modal -->




