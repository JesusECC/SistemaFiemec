<div class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$c->idCargo}}" style="padding-left: 17px;border-radius:0px !important;">

{{Form::Open(array('action'=>array('ControllerCargo@destroy',$c->idCargo),'method'=>'delete'))}}

  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header mh-p" style="border:1px solid #EC5565 !important;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="far fa-trash-alt modal-icon"></i>
      </div>
      <div class="modal-body">
        <center>
          <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-transparent text-center p-md">
                <i class="fas fa-exclamation-triangle fa-3x text-warning"></i>
                <h3 class="m-t-none m-b-sm text-warning">Advertencia</h3>
                <p class="p-text-delete">Al eliminar el siguiente Cargo <span style="color: red">{{$c->nombre_cargo}}</span>  no volvera a verlo en la lista </p>
              </div>
            </div>
            <h3>¿Desea eliminar el cargo?</h3>
          </div>         
      </center>
  </div>
  <div class="modal-footer">
       <button type="button" class="btn btn-danger"  data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> Cancelar</button>
       <button herf="" type="submit" class="btn " style="background-color: #18A689 !important;border: 1px solid #18A689 !important;color: white !important"><i class="far fa-check-square"></i> Aceptar</button>
        
      </div>

    </div>

  </div>

	{{Form::Close()}}

></div>