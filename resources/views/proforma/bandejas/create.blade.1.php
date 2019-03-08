@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h2>Nueva Proforma </h2>
    <hr />
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

                    <div style="margin-top: 15px" class="col-lg-9">
                        <div  class="panel panel-primary">
                            <div  class="panel-heading">
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
                                    <div class="col-lg-9 col-sm-9 col-md-9 col-xs-12">
                                        <div class="from-group label-floating">
                                            <label for="direccion">Direccion</label>
                                            <input type="text" disabled name="direccion" id="pdireccion" class="form-control" placeholder="direccion">
                                        </div>
                                    </div>  
                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                        <div class="from-group">
                                            <label for="nro_documento">Numero de Documento</label>
                                            <input type="text" disabled name="nro_documento" id="pnro_documento" class="form-control" placeholder="numero documento">
                                        </div>
                                    </div>                             
                                </div>
                            </div>
                        </div>
                    </div>




                    <div style="margin-top: 15px" class="col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    Tipo de Cambio
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    

                                    <div class="col-lg-6">
                                        <label>Tipo de cambio</label>
                                        <select  name="idTipo_moneda" class="form-control selectpicker" id="pidTipo_moneda" data-live-search="true">
                                             <option value=""></option>
                                           @foreach($monedas as $mo)
                                           
                                           <option value="{{$mo->idTipo_moneda}}_{{$mo->tipo_cambio}}_{{$mo->simbolo}}_{{$mo->impuesto}}">{{$mo->nombre_moneda}}</option>
                                           @endforeach  
                                       </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <label for="simbolo">Simbolo</label>
                                            <input type="text"  disabled id="psimbolo" class="form-control" >
                                            <input type="hidden" name="simboloP" id="psimbol" class="form-control">
                                            
                                         </div>                                        
                                    </div>

                                    <div style="margin-top: 15px" class="col-lg-4" >
                                        
                                        <div class="from-group">
                                            <label for="tipocambio">Valor</label>
                                            <input type="text" disabled id="ptipocambio" class="form-control">
                                            <input type="hidden" name="tipocambio" id="ptipo_cambio" class="form-control">
                                        </div>
                                    </div>

                                    <div style="margin-top: 15px" class="col-lg-4">
                                        <div class="from-group">
                                            <label for="tipocambio">Igv</label>
                                            <input type="number" disabled id="pimpuesto" class="form-control">
                                            
                                         </div>                                        
                                    </div>
                                    <div style="margin-top: 45px" class="col-lg-2">%</div>
                                </div>
                            </div>
                        </div>
                    </div>






                    <div class="col-lg-12">
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
                                            <select  required name="pidProducto" class="form-control selectpicker" id="pidProducto" data-live-search="true">
                                                <option value=""></option>
                                                @foreach($productos as $pro)
                                                
                                                <option value="{{$pro->idProducto}}_{{$pro->precio_unitario}}_{{$pro->descuento_familia}}_{{$pro->codigo_pedido}}">{{$pro->codigo_producto.' '.$pro->nombre_producto}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                     <div style="margin-top: 16px" class="col-lg-6">
                                        <div class="from-group">
                                            <label for="descripcionDP">Descripccion</label>
                                            <input type="text"  name="pdescripcionDP"  id="pdescripcionDP" class="form-control" placeholder="Agregar Descripcion del Producto">
                                        </div>
                                    </div>
                                    <div style="margin-top: 16px"  class="col-lg-2">
                                        <div class="from-group">
                                            <label for="precio_unitario">Precio unitario</label>
                                            <input type="number" disabled name="pprecio_unitario" id="pprecio_unitario" class="form-control" placeholder="precio unitario">
                                        </div>                                        
                                    </div>
                                    <div style="margin-top: 16px"  class="col-lg-2">
                                        <div class="from-group">
                                            <label for="cantidad">Cantidad</label>
                                            <input type="number"  name="pcantidad" id="pcantidad" class="form-control" placeholder="cantidad">
                                        </div>
                                    </div>
                                    <div style="margin-top: 15px"  class="col-lg-2">
                                        <div class="from-group">
                                            <label for="descuento_familia">Descuento en %</label>
                                            <input type="number"  name="descuento_familia" id="pdescuento_familia" class="form-control" placeholder="descuento">
                                        </div>
                                    </div>

                                   

                                    
                                    <div class="col-lg-2">
                                        <div class="form-group" style="margin-top: 20px;">
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
                                    Concepto
                                </h3>
                            </div>
                            <div class="panel-body">
                                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">

                                    <thead style="background-color:#cacfd2">
                                        <th>Opciones</th>
                                        <th>Producto</th>
                                        <th>Descripcion</th>
                                        <th>Cantidad</th>
                                        <th>Precio V.</th>
                                        <th>Descuento</th>
                                        <th>Total</th>
                                        <th>Cambio</th>
                                        
                                    </thead>


                                    <tfoot>
                                        <th></th>
                
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        
                                        

                                    </tfoot>
                                                           
                                </table>

</div>
                        </div>
                    </div>

<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Importe
                        </h3>
                    </div>
                    <div class="panel-body">   
                        <div id="guardar" style='display:none;'>
                            <table class="table table-striped table-bordered table-condensed table-hover">
                                    <tfoot>
                                        <tr>
                                            <th colspan="3" >Sub Total:</th>
                                            <th><h4 id="total">s/. 0.00</h4>
                                            <input type="hidden" name="subtotal" id="subtotal"></th>



                                            <th colspan="3" >Forma de:</th>
                                            <th><input type="text" name="forma_de" id="forma_de" class="form-control"></th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" >I.G.V:</th>
                                            <th><h4 id="igvC">s/. 0.00</h4>
                                                <input type="hidden" name="igv" id="igv"></th>

                                            <th colspan="3" >Plazo de Oferta:</th>
                                            <th><input type="date" name="plazo_oferta" id="plazo_oferta" class="form-control"></th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" >Total:</th>
                                           <th><h4 id="tota">s/. 0.00</h4>
                                            <input type="hidden" name="precio_total" id="precio_total"></th>

                                                <th colspan="3" >Observacion</th>
                                            <th><textarea name="observacion_condicion" id="observacion_condicion" class="form-control">
                                        </textarea>
                                        </tr>
                                         <tr>
                                            <th colspan="3" >Conversion al Tipo de cambio</th>
                                            <th><h4 id="toca2">0.00</h4>
                                            <input type="hidden" name="precio_totalC" id="precio_totalC"></th>
                                        </tr>
                                    </tfoot>
                            </table> 
                                                     
                        </div>
                    </div>                     
                </div>
            </div>
        </div>
    </div>
                    
                                    <div  class="col-lg-8">
                                        <div class="col-lg-5"  style="padding: 10px">
                                            <form class="form-inline" onsubmit="openModal()" id="myForm">
                                                <button class="btn btn-primary" type="submit">Generar Proforma</button>
                                            </form>
                                            
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
    $('#myForm').on('submit', function(e){
  $('#myModal').modal('show');
  e.preventDefault();
});
</script>

                                            <button class="btn btn-danger" type="reset">Cancelar Proforma</button>
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
tota=0;
toca=0;
toca2=0;

igvC=0;

subcambio2=[];
subtotal=[];
subcambio=[];
impuesto=[];
totall=[];

$("#guardar").hide();
$("#pidProducto").change(mostrarValores);
$("#idCliente").change(mostrarValor);
$("#pidTipo_moneda").change(mostrarV);

//guradar
function cambiaropcion(){
        Producto=document.getElementById('pidProducto').value.split('_');
        var codigo_pedido=Producto[3];
       if(codigo_pedido=="t1"){
            $('#pprecio_unitario').attr("disabled", false);
        }
        else{
           $('#pprecio_unitario').attr("disabled", true); 
        }
   }

function mostrarValores()
{
    datosProducto=document.getElementById('pidProducto').value.split('_');

    $("#pdescuento_familia").val(datosProducto[2]);
    $("#pprecio_unitario").val(datosProducto[1]);
    cambiaropcion();
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
    $("#pimpuesto").val(datosm[3]);
    $("#psimbolo").val(datosm[2]);
    $("#psimbol").val(datosm[2]);
    $("#ptipocambio").val(datosm[1]);
     $("#ptipo_cambio").val(datosm[1]);
}

function agregar()
{
    datosProducto=document.getElementById('pidProducto').value.split('_');

    idProducto=datosProducto[0];
    producto=$("#pidProducto option:selected").text();
    cantidad=$("#pcantidad").val();
    moneda=$("#ptipo_cambio").val();
    descuento=$("#pdescuento_familia").val();
    descripcion=$("#pdescripcionDP").val();
    precio_venta=$("#pprecio_unitario").val();
    igvT=$("#pimpuesto").val();
    s=$("#psimbolo").val();
    

    //alert(datosProducto);

    if(idProducto!="" && cantidad!="" && cantidad>0 && descuento!="" && precio_venta!="" && moneda!="" )
    {


        if(cantidad>0)
        {
             
        subtotal[cont]=((precio_venta-(descuento/100*precio_venta))*cantidad);
            total=total+subtotal[cont];

        impuesto[cont]=subtotal[cont]*igvT/100;
            igvC=igvC+impuesto[cont];

        totall[cont]=impuesto[cont]+subtotal[cont];
            tota=tota+totall[cont];

       subcambio2[cont]=totall[cont]/moneda;
            toca2=toca2+subcambio2[cont];


        subcambio[cont]=subtotal[cont]/moneda;
            toca=toca+subcambio[cont];

            
             


       var fila='<tr class="selected" id="fila'+cont+'">'+
       '<td>'+
       '<button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td>'+
       ' <td><input type="hidden" name="idProducto[]" value="'+idProducto+'">'+producto+'</td>'+
       ' <td><input  type="hidden"  name="descripcionDP[]"  value="'+descripcion+'">'+descripcion+'</td>'+
       ' <input  type="hidden"  name="cambioDP[]"  value="'+moneda+'">'+
       ' <input  type="hidden"  name="simboloDP[]"  value="'+s+'">'+
       ' <td><input type="hidden"  name="cantidad[]"  value="'+cantidad+'">'+cantidad+'</td> '+
       '<td><input type="hidden"  name="precio_venta[]"   value="'+precio_venta+'">S/. '+precio_venta+'</td>'+
       ' <td><input type="hidden"  name="descuento[]"  value="'+descuento+'">'+descuento+'%</td><td>S/. '+subtotal[cont]+'</td> <td>'+s+subcambio[cont]+'</td></tr>';
       cont++;
       
       limpiar();
       //soles
       $("#total").html("s/." + total);
       $("#subtotal").val(total);
       //cambio
       $("#toca2").html(s + toca2);
       $("#precio_totalC").val(toca2);

       //impuesto
      $("#igvC").html("s/." + igvC);
       $("#igv").val(igvC);
       //total
       $("#tota").html("s/." + tota);
       $("#precio_total").val(tota);
         
       evaluar();
       $('#detalles').append(fila);

        }
       
    }
    else
    {
        alert("Completar los datos de la Proforma");
    }
}


    total=0;
    toca=0;
    igv=0;
    function limpiar(){
        $("#pcantidad").val("");
       
        $("#pprecio_venta").val("");
        $("#pdescripcionDP").val("");
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
        $("#subtotal").val(total);
       //cambio
       toca=toca-subcambio[index];
        $("#toca2").html(+ toca2);
        $("#precio_total").val(toca2);
        //impuesto
        igvC=igvC-impuesto[index];
        $("#igvC").html(+ igvC);
        $("#precio_total").val(igvC);
        //total
        tota=tota-totall[index];
        $("#tota").html(+ tota);
        $("#precio_total").val(tota);

        $("#fila" + index).remove();
        evaluar();
    }

</script>

@endpush
@endsection