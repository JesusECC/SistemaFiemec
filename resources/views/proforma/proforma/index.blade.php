@extends ('layouts.admin')
@section ('contenido')

<div class='col-lg-8 col-sm-8 col-xs-12'>
	<h3> Lista de Proformas    <a href="proforma/create"><button class="btn btn-success">Nuevo</button></a></h3>
	@include('proforma.proforma.search')
</div>
<div class='row'>
	<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
		<div class="table-responsive">
			<table class=" table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>fecha</th>
					<th>Comprobante</th>
					<th>Nombre</th>
					
					
					
					<th>opciones</th>
				</thead>

				@foreach ($proformas as $prof)
				

				<tr>

					<td>{{$prof->fecha_hora}}</td>
					<td>{{$prof->serie_proforma.' /  f000-'.$prof->idProforma}}</td>
					<td>{{$prof->nombre}}</td>
					
					
					
					<td>
					<a href="{{URL::action('ControllerProformaUnitaria@show',$prof->idProforma)}}"><button class="btn btn-primary">detalles</button>
					</a>
					<a href="" data-target="#modal-delete-{{$prof->idProforma}}" data-toggle="modal"><button class="btn btn-danger">eliminar</button></a>
					</td>
				</tr>
				@include('proforma.proforma.modal')
             @endforeach
            
			</table>
		</div>
		{{$proformas->render()}}
	</div>
</div>

@endsection