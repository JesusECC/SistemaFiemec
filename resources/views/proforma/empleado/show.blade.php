<div class="modal fade in" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal-show-{{$emp->id}}" style="padding-left: 17px;border-radius:0px !important;">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header mh-v" style="border:1px solid #1A7BB9 !important;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-user-tie modal-icon"></i>
      </div>
      <div class="modal-body">
      	<div class="box box-primary">
      		<div class="box-header with-border" style="padding: 10px !important">
      			<center><h4 class="box-title" style="font-size: 14px !important;text-align: center;color: #676a6c !important;">{{$emp->nombre }}</h4></center> 
      		</div>
      		<div class="box-body">
      			<ul class="list-group list-group-unbordered">
      				<li class="list-group-item" style="font-size: 10px !important;color: #676a6c !important;">
      					<b style="font-weight: 400 !important">
      						<i class="fas fa-barcode"></i> Tipo Documento :
      					</b>
      					<a href="" class="pull-right" style="text-decoration: none;">
      						{{$emp->tipo_documento}}
      					</a>
      				</li>
      				<li class="list-group-item" style="font-size: 10px !important;color: #676a6c !important;">
      					<b style="font-weight: 400 !important">
      						<i class="fas fa-hashtag"></i> Número Documento :
      					</b>
      					<a href="" class="pull-right" style="text-decoration: none;">
      						{{$emp->nro_documento}}
      					</a>
      				</li>
      				<li class="list-group-item" style="font-size: 10px !important;color: #676a6c !important;">
      					<b style="font-weight: 400 !important">
      						<i class="far fa-calendar-alt"></i> Fecha Nacimiento :
      					</b>
      					<a href="" class="pull-right" style="text-decoration: none;">
      						{{$emp->fecha_nacimiento}}   
      					</a>
      				</li>
      				
      				<li class="list-group-item" style="font-size: 10px !important;color: #676a6c !important;">
      					<b style="font-weight: 400 !important">
      						<i class="fas fa-mobile-alt"></i> Celular :
      					</b>
      					<a href="" class="pull-right" style="text-decoration: none;">
      						{{$emp->fono}}
      					</a>
      				</li>
      				<li class="list-group-item" style="font-size: 10px !important;color: #676a6c !important;">
      					<b style="font-weight: 400 !important">
      						<i class="fas fa-at"></i> Correo :
      					</b>
      					<a href="" class="pull-right" style="text-decoration: none;">
      						{{$emp->email}}
      					</a>
      				</li>
      				<li class="list-group-item" style="font-size: 10px !important;color: #676a6c !important;">
      					<b style="font-weight: 400 !important">
      						<i class="fas fa-at"></i> Cargo :
      					</b>
      					<a href="" class="pull-right" style="text-decoration: none;">
      						{{$emp->nombre_cargo}}
      					</a>
      				</li>

      			</ul>
      		</div>
      	</div>
  </div>
  <div class="modal-footer">
       <button type="button" class="btn btn-danger"  data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> Cerrar</button>
      </div>
    </div>
  </div> 
</div>
</div>









