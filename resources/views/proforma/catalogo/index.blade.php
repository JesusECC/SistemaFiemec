@extends ('layouts.admin')
@section ('contenido')
<div class='col-lg-8 col-sm-8 col-xs-12'>
	<h3> Catalogo de Productos</h3>
	
	@include('proforma.catalogo.search')
</div>
<!--
<div class="container-fluid">
	<div class="row">
		@foreach($catalogos as $pro)
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	      <img src="http://www.repairservo.com/images/abb-img.jpg" alt="...">
	      <div class="caption">
	        <h3>{{$pro->nombre_producto}}</h3>
	        <p>...</p>
	        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
	      </div>
	    </div>
	  </div>
	  @endforeach
	</div>	
</div>
-->


<div class='row'>
	<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
		<div class="table-responsive">
			<table class=" table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Nº Serie</th>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Marca</th>				
                    <th>Descripcion</th>
                    <th>Precio</th>
				</thead>

				@foreach ($catalogos as $pro)
				
				<tr>

					
					<td>{{$pro->serie_producto}}</td>
					<td>{{$pro->codigo_producto}}</td>
					<td>{{$pro->nombre_producto}}</td>
					<td>{{$pro->marca_producto}}</td>	
					<td>{{$pro->descripcion_producto}}</td>
					<td>S/. {{$pro->precio_unitario}}</td>
					
					
					
					<td>
					<a href="{{URL::action('ControllerCatalogo@show',$pro->idProducto)}}"><button class="btn btn-input">ver</button>
					</a>
					</td>

					
				</tr>
				
             @endforeach
			</table>
		</div>
		{{$catalogos->render()}}
	</div>
</div>

@endsection

<!-- COMENTARIOS
-Codigo de pedido ira en el detalle catalogo
-Foto ira en el detalle catalogo
-fecha de sistema de registro ira en el detalle catalogo
-Stock ira en el detalle catalogo
-categoria ira en el detalle catalogo
-estado ira en el detalle catalogo
 -->