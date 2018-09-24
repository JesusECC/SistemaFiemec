@extends ('layouts.admin')
@section ('contenido')

<div class="row">


    <div class="col-lg-3">
        <img src="{{asset('img/logo.jpg')}}" width="230" height="180">
    </div> 

	<div class="col-lg-3 col-sm-6 col-md-6 col-xs-6">
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

<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
<div class="form-group">
<p>P. P. N. Pachacutec Mz. W1 Lot. 7 Gru. Residencial E4 - Sector E Callao - Ventanilla</p>    
<p>Cel. 946398756 - 947342692  Tef. (01) 4808910- 7582351</p>    
<p>Email: ventas@jfiemec.pe</p>
<p>www.fiemec.pe  </p>
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

            			
            			<th>Poducto</th>
            			<th>Cantidad</th>
                        <th>medidas</th>
            			<th>Precio de Venta</th>
            			<th>Descuento x c/u</th>
            			<th>Total</th>
                        <th></th>
            		</thead>
            		<tfoot>
            			
                        
                        <th></th>
            			<th></th>
                        <th></th>
            			<th></th>
            			<th></th>


                        
            			<th>

                         <h4 id="total">Subtotal: {{$proforma->subtotal}}</h4>

                            <h4 type="number" id="total">IGV: {{round($proforma->subtotal*$proforma->igv/100,2)}}

                            <h4 id="total">Precio total: {{round($proforma->precio_total,2)}}</th><br>


            		</tfoot>
            		<tbody>
            			@foreach($detalles as $det)
                        <tr>
                            <td>{{$det->producto.'  | '.$det->descripcionDP}}</td>
                            <td>{{$det->cantidad}}</td>
                            <td>{{$det->medida}}</td>
                            <td>S/.{{$det->precio_venta}}</td>
                            <td>{{$det->descuento}}%</td>
                            <td>S/.{{($det->precio_venta*$det->cantidad)-(($det->cantidad*$det->precio_venta)*($det->descuento/100))}}</td>
                        </tr>

                        @endforeach

            		</tbody>


            		
            	</table>


                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">

            <div>
        <label>Forma de:  {{$proforma->forma_de}}</label>
        </div>
        <div>
        <label>Plazo de Oferta:  {{$proforma->plazo_oferta}}</label>
        </div>
        <div>
        <label>Observaciones:  {{$proforma->observacion_condicion}}</label>
        </div>
        --------------------------------------------------------------------
        <label>FIEMEC S.A.C  RUC: 20546979611</label>
        
        <label>Cta. Corriente  BBVA Soles: 0011 0339-0100014584   (CCI) : 011-339-000100014584-95 </label>
        <label>Cta. Corriente  BCP Soles:   192-2324867-0-03        ( CCI) 00219200232486700338</label>
        <label>Cta. Corriente  BCP Dolares :   192-2288918-1-91     ( CCI) 00219200228891819137</label>
        <label>Cta. Corriente  detracciones BN :   00-088-006879</label>

        </div> 
    </div>
            </div>
      </div>
</div>
</div>    
   



@endsection

