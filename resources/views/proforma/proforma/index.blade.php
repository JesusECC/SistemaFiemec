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
					<th>Cliente</th>
					<th>Empleado</th>
					<th>impuesto</th>
					<th>total</th>
					
					<th>opciones</th>
				</thead>

				@foreach ($proformas as $prof)
				

				<tr>

					<td>{{$prof->fecha_hora}}</td>
					<td>{{$prof->serie_comprobante.' /  f000-'.$prof->id_Proforma}}</td>
					<td>{{$prof->nombres_Rs}}</td>
					<td>{{$prof->nombres}}</td>
					<td>{{$prof->impuesto}}</td>
					<td>{{$prof->precio_total}}</td>
					
					<td>
					<a href="{{URL::action('ControllerProformaUnitaria@show',$prof->idProforma)}}"><button class="btn btn-primary">detalles</button>
					</a>
					</td>
				</tr>
             @endforeach
            
			</table>
		</div>
		{{$proformas->render()}}
	</div>
</div>

@endsection