<div class="modal fade in" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal-show-{{$cli->idCliente}}" style="padding-left: 17px;border-radius:0px !important;">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header mh-v" style="border:1px solid #1A7BB9 !important;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-user-tie modal-icon"></i>
      </div>
      <div class="modal-body">
      	<div class="box box-primary">
      		<div class="box-header with-border" style="padding: 10px !important">
      			<center><h4 class="box-title" style="font-size: 14px !important;text-align: center;color: #676a6c !important;">{{$cli->nombres_Rs.' '.$cli->paterno.' '.$cli->materno }}</h4></center> 
      		</div>
      		<div class="box-body">
      			<ul class="list-group list-group-unbordered">
      				<li class="list-group-item" style="font-size: 10px !important;color: #676a6c !important;">
      					<b style="font-weight: 400 !important">
      						<i class="fas fa-barcode"></i> Tipo Documento :
      					</b>
      					<a href="" class="pull-right" style="text-decoration: none;">
      						{{$cli->tipo_documento}}
      					</a>
      				</li>
      				<li class="list-group-item" style="font-size: 10px !important;color: #676a6c !important;">
      					<b style="font-weight: 400 !important">
      						<i class="fas fa-hashtag"></i> Número Documento :
      					</b>
      					<a href="" class="pull-right" style="text-decoration: none;">
      						{{$cli->nro_documento}}
      					</a>
      				</li>
      				<li class="list-group-item" style="font-size: 10px !important;color: #676a6c !important;">
      					<b style="font-weight: 400 !important">
      						<i class="far fa-calendar-alt"></i> Fecha Nacimiento :
      					</b>
      					<a href="" class="pull-right" style="text-decoration: none;">
      						{{$cli->fecha_nacimiento}}   
      					</a>
      				</li>
      				<li class="list-group-item" style="font-size: 10px !important;color: #676a6c !important;">
      					<b style="font-weight: 400 !important">
      						<i class="fas fa-phone"></i> Telefono :
      					</b>
      					<a href="" class="pull-right" style="text-decoration: none;">
      						{{$cli->telefono}}
      					</a>
      				</li>
      				<li class="list-group-item" style="font-size: 10px !important;color: #676a6c !important;">
      					<b style="font-weight: 400 !important">
      						<i class="fas fa-mobile-alt"></i> Celular :
      					</b>
      					<a href="" class="pull-right" style="text-decoration: none;">
      						{{$cli->celular}}
      					</a>
      				</li>
      				<li class="list-group-item" style="font-size: 10px !important;color: #676a6c !important;">
      					<b style="font-weight: 400 !important">
      						<i class="fas fa-at"></i> Correo :
      					</b>
      					<a href="" class="pull-right" style="text-decoration: none;">
      						{{$cli->correo}}
      					</a>
      				</li>
      				<strong style="font-size: 10px !important;font-weight: 400;margin-top: 20px;">
      					<i class="fas fa-map-marker-alt"></i> Ubicación
      				</strong>
      				<p class="text-muted" style="font-size: 10px !important;font-weight: 400 !important">
      					{{$cli->Departamento.' - '.$cli->Distrito.' - '.$cli->Direccion }}
      				</p>
      				<strong style="font-size: 10px !important;font-weight: 400;">
      					<i class="far fa-credit-card"></i> Número Cuentas
      				</strong>
      				<p class="text-muted" style="font-size: 10px !important;font-weight: 400 !important">
      					{{$cli->cuenta_1.' - '.$cli->cuenta_2.' - '.$cli->cuenta_3 }}
      				</p>
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









