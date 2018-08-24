@extends ('layouts.admin')
@section ('contenido')

<div class='col-lg-8 col-sm-8 col-xs-12'>
	<h3> Lista de Proformas    <a href="{{ route('proforma/create')}}"><button class="btn btn-success">Nuevo</button></a></h3>

	@include('proforma.servicio.search')
</div>
<div class='row'>
	<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
		<div class="table-responsive">
			<table class=" table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>fecha</th>
					<th>Comprobante</th>
					<th>Nombre</th>
					<th>impuesto</th>
					<th>total</th>
					
					<th>opciones</th>
				</thead>

				@foreach ($servicios as $ser)
				

				<tr>

					<td>{{$ser->fecha_hora}}</td>
					<td>{{$ser->serie_proforma.' /  f000-'.$ser->idProforma}}</td>
					<td>{{$ser->nombres_Rs}}</td>
					<td>{{$ser->igv}}</td>
					<td>{{$ser->precio_total}}</td>
					
					<td>
					<a href="{{URL::action('ControllerProformaServicio@show',$ser->idProforma)}}"><button class="btn btn-primary">detalles</button>
					</a>
					</td>
				</tr>
             @endforeach
            
			</table>
		</div>
		{{$servicios->render()}}
	</div>
</div>

@endsection