@extends ('layouts.admin')
@section ('contenido')
<div class='col-lg-8 col-sm-8 col-xs-12'>
	<h3> Control de Trabajadores <a href="empleado/create"> <button class="btn btn-success">Nuevo</button></a></h3></h3>
	
	@include('proforma.empleado.search')
</div>
<div class='row'>
	<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
		<div class="table-responsive">
			<table class=" table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Tipo Documento</th>
					<th>Nro Documento</th>
					<th>Nombres</th>
					<th>Paterno</th>
                    <th>Materno</th>
                    <th>Cargo</th>

                    <th>Telefono</th>
					 <th>Celular</th>
					  <th>Correo</th>
	                
	                  <th>Estado</th>
				</thead>

	
				@foreach ($Empleados as $empl)
				
				<tr>

					
					<td>{{$empl->tipo_documento}}</td>
					<td>{{$empl->nro_documento}}</td>
					<td>{{$empl->nombres}}</td>
					<td>{{$empl->paterno}}</td>
					<td>{{$empl->materno}}</td>
					<td>{{$empl->cargo}}</td>
					<td>{{$empl->telefono}}</td>
					<td>{{$empl->celular}}</td>
					<td>{{$empl->correo}}</td>
					<td>{{$empl->estado}}</td>
					
					<td>
					<a href="{{URL::action('ControllerEmpleados@show',$empl->id)}}"><button class="btn btn-info">ver</button>
					</a>
					<td>
					<a href="{{URL::action('ControllerEmpleados@edit',$empl->id)}}"><button class="btn btn-info">editar</button>
					</a>
					<a href="" data-target="#modal-delete-{{$empl->id}}" data-toggle="modal"><button class="btn btn-danger">eliminar</button></a>
					</td>
				</tr>
				@include('proforma.empleado.modal')
             @endforeach
			</table>
		</div>
		{{$Empleados->render()}}
	</div>
</div>

@endsection

