@extends ('layouts.admin')
@section ('contenido')
<div class='col-lg-8 col-sm-8 col-xs-12'>
	<h3> Tipo de Cambio <a href="familias/create"> <button class="btn btn-success">Nuevo</button></a></h3></h3>
	
	@include('proforma.familia.search')
</div>
<div class='row'>
	<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
		<div class="table-responsive">
			<table class=" table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					
					<th>Nombre</th>
					<th>Valor de Descuento</th>
					
                    
	              		
				</thead>

	
				@foreach ($familias as $fa)
				
				<tr>

					
					
					<td>{{$fa->nombre_familia}}</td>
					
					<td>{{$fa->descuento_familia}}%</td>
					
					
					
					
					<td>
					<a href="{{URL::action('ControllerFamilia@edit',$fa->idFamilia)}}"><button class="btn btn-info">editar</button>
					</a>
					<a href="" data-target="#modal-delete-{{$fa->idFamilia}}" data-toggle="modal"><button class="btn btn-danger">eliminar</button></a>
					</td>
					
				</tr>
				@include('proforma.familia.modal')
             @endforeach
			</table>
		</div>
		{{$familias->render()}}
	</div>
</div>

@endsection

