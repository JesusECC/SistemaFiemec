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
                    <th>Cargo</th>
                    <th>Telefono/Celular</th>
					 
					  <th>Correo</th>
	                
	                  <th>Estado</th>
				</thead>

	
				@foreach ($Empleados as $empl)
				
				<tr>

					
					<td>{{$empl->tipo_documento}}</td>
					<td>{{$empl->nro_documento}}</td>
					<td>{{$empl->nombres}} {{$empl->paterno}} {{$empl->paterno}}</td>
					<td>{{$empl->cargo}}</td>
					<td>{{$empl->telefono}} / {{$empl->celular}}</td>
					
					<td>{{$empl->correo}}</td>
					<td>{{$empl->estado}}</td>
					
					<td>
					<a href="{{URL::action('ControllerEmpleados@show',$empl->idEmpleado)}}"><button class="btn btn-info">ver</button>
					</a>
					<td>
					<a href="{{URL::action('ControllerEmpleados@edit',$empl->idEmpleado)}}"><button class="btn btn-info">editar</button>
					</a>
					<a href="" data-target="#modal-delete-{{$empl->idEmpleado}}" data-toggle="modal"><button class="btn btn-danger">eliminar</button></a>
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

