@extends ('layouts.admin')
@section ('contenido')
<div class='col-lg-8 col-sm-8 col-xs-12'>
	<h3> Tipo de Cambio <a href="config/create"> <button class="btn btn-success">Nuevo</button></a></h3></h3>
	
	@include('proforma.config.search')
</div>
<div class='row'>
	<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
		<div class="table-responsive">
			<table class=" table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					
					<th>Nombre</th>
					<th>Simbolo</th>
					<th>Valor</th>
                    
	              		
				</thead>

	
				@foreach ($monedas as $mo)
				
				<tr>

					
					
					<td>{{$mo->nombre_moneda}}</td>
					<td>{{$mo->simbolo}}</td>
					<td>{{$mo->tipo_cambio}}</td>
					
					
					<td>
					<a href="{{URL::action('ControllerConfiguracion@show',$mo->idTipo_moneda)}}"><button class="btn btn-info">ver</button>
					</a>
					<td>
					<a href="{{URL::action('ControllerConfiguracion@edit',$mo->idTipo_moneda)}}"><button class="btn btn-info">editar</button>
					</a>
					<a href="" data-target="#modal-delete-{{$mo->idTipo_moneda}}" data-toggle="modal"><button class="btn btn-danger">eliminar</button></a>
					</td>
					
				</tr>
				@include('proforma.config.modal')
             @endforeach
			</table>
		</div>
		{{$monedas->render()}}
	</div>
</div>

@endsection

