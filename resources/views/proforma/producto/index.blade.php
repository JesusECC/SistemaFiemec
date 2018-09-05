
@extends ('layouts.admin')
@section ('contenido')
<div class='col-lg-12 col-sm-12 col-xs-12'>
	<h3> Control de Productos <a href="{{route('producto-create')}}"> <button class="btn btn-success">Nuevo</button></a></h3>
	
	@include('proforma.producto.search')
</div>
<div class="row">
  <div class="col-sm-12 col-md-12">
  	@foreach($productos as $pro)
	  <div class="col-sm-4 col-md-4">
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
  {{$productos->render()}}
</div>
@endsection

