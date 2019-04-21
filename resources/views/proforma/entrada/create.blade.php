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

			<div class="box-body bg-gray-c">
				<div class="row">
					<div class="col-md-8">
						<div class="panel panel-default panel-shadow">
							<div class="box-body">
								<table id="example" class="table table-striped table-bordered table-hover" style="width:100%;font-size: 14px !important">
			                        	<thead>
			                        		<tr>
			                        			<th>N° Guia</th>
			                        			<th>Fecha</th>
			                        			<th>Codigo Producto</th>
			                        			<th>Descripcion</th>
			                        			<th>Cantidad</th>
			                        		</tr>
			                        	</thead>
			                        	<tbody>
			                        		                    		
			                        	</tbody>
			                    </table>
							</div>
						</div>
					</div>
					<div class="col-md-4">
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
											<input type="text" id="codigop" name="codigop" class="form-control">
										</div>
									</div>
									<div class="col-sm-12">
                                        <div class="form-group">
                                         	<label>Marca</label>
                                         	<select required name="marca" class="form-control">
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
											<select required name="familia" class="form-control">

											</select>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<label>Producto</label>
											<select required name="producto" class="form-control">
											</select>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<label>Descripcion</label>
											<input type="text" name="descripcion" class="form-control">
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Cantidad</label>
											<input type="text" name="cantidad" class="form-control">
										</div>
									</div>
									<div class="col-sm-6" style="margin-top: 25px">
										<div class="form-group">
											<button  id="save" class="btn btn-primary btn-sm" type="button"><i class="far fa-save"></i> Guardar</button>
										</div>
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

		$('#orden').keyup(function(){
         cambio();
		});

	});

	function cambio(){

		var v1=$('#orden').val();

		$('#codigop').val(v1);
	}
				
</script>
@endpush
@endsection