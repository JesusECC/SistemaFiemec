@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div class="form-group">
	        <label for="cliente">Cliente</label>
	        <p>{{$venta->nombre}}</p>
  </div>
</div>
<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
	<div class="from-group">
	    <label>Tipo Comprobante</label>
	    <p>{{$venta->tipo_comprobante}}</p>
	</div>
</div>

<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
	<div class="form-group">
		<label for="serie_comprobante">Serie Comprobante</label>
		<p>{{$venta->serie_comprobante}}</p>		
	</div>
</div>


<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
	<div class="form-group">
		<label for="num_comprobante">Numero Comprobante</label>
		<p>{{$venta->num_comprobante}}</p>	
     </div>	
   </div>
</div>
<div class="row">
    	<div class="panel panel-primary">
            <div class="panel-body">
    	   

            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            	<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
            		<thead style="background-color:#A9D0F5">
            			
            			<th>Producto</th>
            			<th>cantidad</th>
            			<th>precio venta</th>
            			<th>descuento</th>
            			<th>subtotal</th>
            		</thead>
            		<tfoot>
            			
            			<th></th>
            			<th></th>
            			<th></th>
            			<th></th>
            			<th><h4 id="total">{{$venta->total_venta}}</h4></th>

            		</tfoot>
            		<tbody>
            			@foreach($detalles as $det)
                        <tr>
                            <td>{{$det->producto}}</td>
                            <td>{{$det->cantidad}}</td>
                            <td>{{$det->precio_venta}}</td>
                            <td>{{$det->descuento}}</td>
                            <td>{{$det->cantidad*$det->precio_venta-$det->descuento}}</td>
                        </tr>

                        @endforeach

            		</tbody>


            		
            	</table>
                <font SIZE=4 COLOR="white">---------------------------------------------------------------------------------------------------------------------------------------------------*---------</font><a href="{{url('ventas/venta')}}"><button class="btn btn-success"><font FACE="Arial" SIZE=3 COLOR="white">volver</font></button></a></h3>
            </div>
      </div>
</div>
</div>    
   



@endsection