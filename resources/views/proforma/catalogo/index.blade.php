@extends ('layouts.admin')
@section ('contenido')
<div class='col-lg-8 col-sm-8 col-xs-12'>
	<h3> Catalogo de Productos</h3>
	@include('proforma.catalogo.search')
</div>


<!-- COMENTARIOS
-Codigo de pedido ira en el detalle catalogo
-Foto ira en el detalle catalogo
-fecha de sistema de registro ira en el detalle catalogo
-Stock ira en el detalle catalogo
-categoria ira en el detalle catalogo
-estado ira en el detalle catalogo
 -->
 <div class="row">
  <div class="col-sm-12 col-md-12">
  	@foreach($catalogos as $pro)
	  <div class="col-lg-3 col-sm-4 col-md-3">
	    <div class="thumbnail">
	      <img src="{{asset('fotos/productos/'.$pro->foto)}}">
	      <div class="caption">
	        <h3>{{$pro->nombre_producto}}</h3>
	        <h4 style="color:#028039">S/. {{$pro->precio_unitario}} o </h4>
	        <p style="font-size: 20px">
	        	Stock: <span style="font">{{$pro->stock}}</span>
	        </p>
	        <p style="font-size: 20px">
	        	<span>
	        		Código <span style="font">{{$pro->codigo_producto}}</span>
	        	</span>
	        </p>
	        <p>
	        	<a  href=""  data-target="#modal-show-{{$pro->idProducto}}"  data-toggle="modal" class="btn btn-primary"><i class="far fa-eye"></i> Ver</a> 
	        	
	        	<a href="{{route('producto-edit',$pro->idProducto)}}" class="btn btn-success" role="button"><i class="fas fa-edit"></i> Editar</a> 
	        	
	        	<a href="" data-target="#modal-delete-{{$pro->idProducto}}"  data-toggle="modal" class="btn btn-danger" ><i class="fas fa-trash-alt"></i> Eliminar</a></p>
	      </div>
	    </div>
	  </div>
@include('proforma.producto.modal')
	  				@include('proforma.producto.modal-producto')	  
	 @endforeach
  </div>
</div>
{{$catalogos->render()}}
@endsection