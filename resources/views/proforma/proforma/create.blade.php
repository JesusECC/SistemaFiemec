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
<div class="row"><!--div contenedor sobresaliente-->
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    Datos Clientes
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group label-floating">
                                            <label>Cliente</label>
                                            <select required name="idCliente" class="form-control selectpicker" id="idCliente" data-live-search="true">

                                                <option value=""></option>
                                               @foreach($clientes as $cliente)
                                               
                                               <option value="{{$cliente->idCliente}}_{{$cliente->direccion}}_{{$cliente->nro_documento}}">{{$cliente->nombre}}</option>
                                               @endforeach  
                                           </select>
                                        </div> 
                                    </div> 
                                    <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
                                        <div class="from-group label-floating">
                                            <label for="direccion">Direccion</label>
                                            <input type="text" disabled name="direccion" id="pdireccion" class="form-control" placeholder="direccion">
                                        </div>
                                    </div>  
                                    <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                                        <div class="from-group">
                                            <label for="nro_documento">Numero de Documento</label>
                                            <input type="text" disabled name="nro_documento" id="pnro_documento" class="form-control" placeholder="numero documento">
                                        </div>
                                    </div>                             
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    Datos Productos
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Producto</label>
                                            <select name="pidProducto" class="form-control selectpicker" id="pidProducto" data-live-search="true">
                                                <option value=""></option>
                                                @foreach($productos as $pro)
                                                
                                                <option value="{{$pro->idProducto}}_{{$pro->precio_unitario}}_{{$pro->descuentoP}}">{{$pro->codigo_producto.' '.$pro->nombre_producto}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <label for="precio_unitario">Precio unitario</label>
                                            <input type="number" disabled name="pprecio_unitario" id="pprecio_unitario" class="form-control" placeholder="precio unitario">
                                        </div>                                        
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <label for="cantidad">Cantidad</label>
                                            <input type="number"  name="pcantidad" id="pcantidad" class="form-control" placeholder="cantidad">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <label for="descuentoP">Descuento en %</label>
                                            <input type="number"  name="pdescuentoP" id="pdescuentoP" class="form-control" placeholder="descuento">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Tipo de cambio</label>
                                        <select required name="idTipo_moneda" class="form-control selectpicker" id="pidTipo_moneda" data-live-search="true">
                                             <option value=""></option>
                                           @foreach($monedas as $mo)
                                           
                                           <option value="{{$mo->idTipo_moneda}}_{{$mo->tipo_cambio}}">{{$mo->nombre_moneda.' '.$mo->simbolo}}</option>
                                           @endforeach  
                                       </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <label for="tipo_cambio"></label>
                                            <input type="number" disabled name="tipo_cambio" id="ptipo_cambio" class="form-control" >
                                            
                                         </div>                                        
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group" style="margin-top: 10px;">
                                           <button type="button" id="bt_add" class="btn btn-primary active btn-block ">Agregar</button> 
                                        </div>
                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    Importe
                                </h3>
                            </div>
                            <div class="panel-body">
                                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">

                                    <thead style="background-color:#A9D0F5">
                                        <th>opciones</th>
                                        <th>Producto</th>
                                        <th>cantidad</th>

                                        <th>precio venta</th>
                                        <th>Descuento</th>
                                       
                                        <th>total</th>
                                    </thead>


                                    <tfoot>
                                        <th>total</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                               
                                        <th><h4 id="total">s/. 0.00</h4><input type="hidden" name="precio_total" id="precio_total">
                                        </th>
                                        <th><h4 id="toca">0.00</h4><input type="hidden" name="precio_totalC" id="precio_totalC">
                                        </th>

                                    </tfoot>
                                       <tbody>
                                    </tbody>                    
                                </table>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="container-fluid" id="guardar">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-4">
                                        <label for="forma_de">
                                            Forma de Pago:
                                        </label>
                                        <input type="text" name="forma_de" id="forma_de" class="form-control">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="plazo_oferta">
                                            Plazo de oferta:
                                        </label>
                                        <input type="date" name="plazo_oferta" id="plazo_oferta" class="form-control">
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row" >
                                <div class="form-group">
                                    <div class="col-lg-6">
                                      <input name"_token" value="{{ csrf_token() }}" type="hidden">
                                      <label for="observacion_condicion">Observaciones</label>
                                      <textarea name="observacion_condicion" id="observacion_condicion" class="form-control">
                                        </textarea>                                 
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="col-lg-5"  style="padding: 10px">
                                            <button class="btn btn-primary" type="submit">guardar</button>

                                            <button class="btn btn-danger" type="reset">cancelar</button>
                                        </div>         
                                     </div>                             
                                </div>
                            </div>
                        </div>                                            
                    </div>
                </div>
            </div> 
        </div>
    </div>
 </div>
{!!Form::close()!!}


@push('scripts')
<script>
$(document).ready(function(){
    $('#bt_add').click(function(){
        agregar();
    });
});


var cont=0;
total=0;
toca=0;
subtotal=[];
subcambio=[];

$("#guardar").hide();
$("#pidProducto").change(mostrarValores);
$("#idCliente").change(mostrarValor);
$("#pidTipo_moneda").change(mostrarV);


function mostrarValores()
{
    datosProducto=document.getElementById('pidProducto').value.split('_');
    $("#pdescuentoP").val(datosProducto[2]);
    $("#pprecio_unitario").val(datosProducto[1]);
}
function mostrarValor()
{
    datos=document.getElementById('idCliente').value.split('_');
    $("#pnro_documento").val(datos[2]);
    $("#pdireccion").val(datos[1]);
}
function mostrarV()
{
    datosm=document.getElementById('pidTipo_moneda').value.split('_');
    $("#ptipo_cambio").val(datosm[1]);
}

function agregar()
{
    datosProducto=document.getElementById('pidProducto').value.split('_');

    idProducto=datosProducto[0];
    producto=$("#pidProducto option:selected").text();
    cantidad=$("#pcantidad").val();
    moneda=$("#ptipo_cambio").val();
    descuento=$("#pdescuentoP").val();
    precio_venta=$("#pprecio_unitario").val();
    

    //alert(datosProducto);

    if(idProducto!="" && cantidad!="" && cantidad>0 && descuento!="" && precio_venta!="" && moneda!="")
    {


        if(cantidad>0)
        {

       subcambio[cont]=((precio_venta-(descuento/100*precio_venta))*cantidad/moneda);
       toca=toca+subcambio[cont];

       subtotal[cont]=((precio_venta-(descuento/100*precio_venta))*cantidad);
       total=total+subtotal[cont];


       var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td> <td><input type="hidden" name="idProducto[]" value="'+idProducto+'">'+producto+'</td><td><input type="number"  name="cantidad[]"  value="'+cantidad+'"></td> <td><input type="number"  name="precio_venta[]"   value="'+precio_venta+'"></td> <td><input type="number"  name="descuento[]"  value="'+descuento+'"></td> <td>'+subtotal[cont]+'</td> </tr>';
       cont++;
       
       limpiar();
       //soles
       $("#total").html("s/." + total);
       $("#precio_total").val(total);
       //cambio
       $("#toca").html(+ toca);
       $("#precio_total").val(toca);
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
    toca=0;
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
       //soles
        total=total-subtotal[index];
        $("#total").html("s/. "+total);
        $("#precio_total").val(total);
       //cambio
       toca=toca-subcambio[index];
        $("#toca").html(+ toca);
        $("#precio_total").val(toca);

        $("#fila" + index).remove();
        evaluar();
    }

</script>

@endpush
@endsection