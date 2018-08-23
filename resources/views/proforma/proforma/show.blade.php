@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
        <div class="form-group">
	        <label for="cliente">Cliente</label>
	        <p>{{$proforma->nombre}}</p>
       </div>
    </div>


    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
	    <div class="form-group">
		<label for="serie_proforma">Serie Proforma</label>
		<p>{{$proforma->serie_proforma}}</p>		
	    </div>
    </div>


    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
	     <div class="form-group">
		<label for="num_proforma">Numero Proforma</label>
		<p>f000-{{$proforma->idProforma}}</p>	
         </div>	
    </div>

    <div class="col-lg-9 col-sm-9 col-md-9 col-xs-12">
        <div class="form-group">
        <label for="direccion">Direccion</label>
        <p>{{$proforma->direccion}}</p>   
         </div> 
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
        <label for="fecha_hora">Fecha</label>
        <p>{{$proforma->fecha_hora}}</p>   
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
            			<th>total</th>
            		</thead>
            		<tfoot>
            			
            			<th></th>
            			<th></th>
            			<th></th>
            			<th></th>
            			<th>
                        <!-- <h4 id="total">Subtotal: {{$proforma->precio_total/(1+$proforma->igv/100)}}</h4>-->

                            <h4 type="number" id="total">IGV:{{round($proforma->precio_total/(1+$proforma->igv/100)*($proforma->igv/100),2)}}

                            <h4 id="total">Precio total:    {{round(($proforma->precio_total/(1+$proforma->igv/100)*($proforma->igv/100) + $proforma->precio_total),2)}}</th><br>


            		</tfoot>
            		<tbody>
            			@foreach($detalles as $det)
                        <tr>
                            <td>{{$det->producto}}</td>
                            <td>{{$det->cantidad}}</td>
                            <td>S/.{{$det->precio_venta}}</td>
                            <td>{{$det->descuento}} x c/u</td>
                            <td>{{$det->cantidad*$det->precio_venta-$det->cantidad*$det->descuento}}</td>
                        </tr>

                        @endforeach

            		</tbody>


            		
            	</table>
                
            </div>
      </div>
</div>
</div>    
   



@endsection

