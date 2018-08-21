@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<h3>Nueva Proforma</h3>
	@if (count($errors)>0)
	<div class="alert-alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			    <li>{{$error}}</li>
			@endforeach 
		</ul>	
    </div>
    @endif
    </div>
 </div>

    {!!Form::open(array('url'=>'proforma/proforma','method'=>'POST','autocomplete'=>'off'))!!}

    {{Form::token()}}


<div class="row">
	<div class="form-group" >
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
	        <label>Cliente</label>
	        <select required name="idCliente" class="form-control selectpicker" id="idCliente" data-live-search="true">
                <option value=""></option>
		       @foreach($clientes as $cliente)
               
		       <option value="{{$cliente->idCliente}}_{{$cliente->direccion}}_{{$cliente->nro_documento}}">{{$cliente->nombre}}</option>
		       @endforeach	
           </select>
        </div>
              <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                <div class="from-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" disabled name="direccion" id="pdireccion" class="form-control" placeholder="direccion">
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="from-group">
                    <label for="nro_documento">Numero de Documento</label>
                    <input type="text" disabled name="nro_documento" id="pnro_documento" class="form-control" placeholder="numero documento">
                </div>
            </div>
        
    </div>
    <div class="row">
    	<div class="panel panel-primary">
    	   <div class="panel-body">
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                	<label>Producto</label>
                	<select name="pid" class="form-control selectpicker" id="pid" data-live-search="true">
                        <option value=""></option>
                		@foreach($productos as $pro)
                        
                        <option value="{{$pro->id}}_{{$pro->precio_unitario}}">{{$pro->codigo_producto.' '.$pro->nombre_producto}}</option>
                        @endforeach
                	</select>
                  </div>
    		   </div>


               <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="from-group">
                    <label for="pcantidad">Cantidad</label>
                    <input type="number"  name="cantidad" id="pcantidad" class="form-control" placeholder="cantidad">
                    

                </div>
            </div>


                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="from-group">
                    <label for="precio_unitario">Precio unitario</label>
                    <input type="number" disabled name="pprecio_unitario" id="pprecio_unitario" class="form-control" placeholder="precio unitario">
                    

                </div>
            </div>

            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="from-group">
                    <label for="descuento">Descuento</label>
                    <input type="number" name="pdescuento" id="pdescuento" class="form-control" placeholder="descuento">

                </div>
            </div>
            <div  class="container-fluid">
                <div class="row">
                    <div class="col-lg-11">
                        
                    </div>
                    <div class="col-lg-1">
                         <button type="button" id="bt_add" class="btn btn-primary active btn-block " style="margin-bottom: 10px">agregar</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            	<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">

            		<thead style="background-color:#A9D0F5">
            			<th>opciones</th>
            			<th>Producto</th>
            			<th>cantidad</th>
                        <th>precio venta</th>
            			<th>Descuento</th>
            			<th>subtotal</th>
            		</thead>
            		<tfoot>
            			<th>total</th>
            			<th></th>
            			<th></th>
            			<th></th>
            			<th></th>
            			<th><h4 id="total">s/. 0.00</h4><input type="hidden" name="precio_total" id="precio_total">
                        </th>

            		</tfoot>
            		   <tbody>
            	    </tbody>            		
            	</table>
            </div>
      </div>
</div>
</div>
<div class="container-fluid" id="guardar">
    <div class="row">
        <div class="form" class="col-lg-6">
            <!--<div class="col-lg-6">
              <input name"_token" value="{{ csrf_token() }}" type="hidden">
              <label for="cantidad">Observaciones</label>
              <textarea name="pcantidad" id="pcantidad" class="form-control">
                </textarea>           
            </div>-->
              @csrf
            <div class="col-lg-8">
                <div class="col-lg-3"  style="padding: 10px">
                    <button class="btn btn-primary" type="submit">guardar</button>

                    <button class="btn btn-danger" type="reset">cancelar</button>
                </div>         
             </div>           
          </div>
       </div>
    </div>
    
</div>
{!!Form::close()!!}
</div>



@push('scripts')
<script>
$(document).ready(function(){
    $('#bt_add').click(function(){
        agregar();
    });
});

var cont=0;
total=0;
subtotal=[];
$("#guardar").hide();
$("#pid").change(mostrarValores);
$("#idCliente").change(mostrarValor);


function mostrarValores()
{
    datosProducto=document.getElementById('pid').value.split('_');
    $("#pprecio_unitario").val(datosProducto[1]);
}

function mostrarValor()
{
    datos=document.getElementById('idCliente').value.split('_');
    $("#pnro_documento").val(datos[2]);
    $("#pdireccion").val(datos[1]);
}

function agregar()
{
    datosProducto=document.getElementById('pid').value.split('_');

    idProducto=datosProducto[0];
    producto=$("#pid option:selected").text();
    cantidad=$("#pcantidad").val();

    descuento=$("#pdescuento").val();
    precio_venta=$("#pprecio_unitario").val();
    stock=$("#pstock").val();

    alert(datosProducto);

    if(idProducto!="" && cantidad!="" && cantidad>0 && descuento!="" && precio_venta!="")
    {

        if(cantidad>0)
        {

       subtotal[cont]=((precio_venta-descuento)*cantidad);
       total=total+subtotal[cont];

       var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td> <td><input type="hidden" name="idProducto[]" value="'+idProducto+'">'+producto+'</td><td><input type="number"  name="cantidad[]" value="'+cantidad+'"></td> <td><input type="number"  name="precio_venta[]" value="'+precio_venta+'"></td> <td><input type="number"  name="descuento[]" value="'+descuento+'"></td> <td>'+subtotal[cont]+'</td></tr>';
       cont++;
       limpiar();
       $("#total").html("s/. " + total);
       $("#precio_total").val(total);
       evaluar();
       $('#detalles').append(fila);

        }
       else
       {
          alert ('la cantidad a vender supera el stock')
       }
    }
    else
    {
        alert("erros al ingresar el detale de la venta, revise los datos del articulo");
    }
}


    total=0;
    function limpiar(){
        $("#pcantidad").val("");
        $("#pdescuento").val("");
        $("#pprecio_venta").val("");
    }

    function evaluar()
    {
        if(total>0)
        {
            $("#guardar").show();
        }
        else
        {
            $("#guardar").hide();
        }
    }
    function eliminar(index){
        total=total-subtotal[index];
        $("#total").html("s/. "+total);
        $("#precio_total").val(total);
        $("#fila" + index).remove();
        evaluar();
    }

</script>

@endpush
@endsection