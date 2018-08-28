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

    {!!Form::open(array('url'=>'proforma/servicio','method'=>'POST','autocomplete'=>'off'))!!}

    {{Form::token()}}
<div>
    <div>
        <div class="form-group">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <label>Cliente</label>
                <select required name="idCliente" class="form-control selectpicker" id="idCliente" data-live-search="true">

                    <option value=""></option>
                   @foreach($clientes as $cliente)
                   
                   <option value="{{$cliente->idCliente}}_{{$cliente->direccion}}_{{$cliente->nro_documento}}">{{$cliente->nombre}}</option>
                   @endforeach  
               </select>
            </div>
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
              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label>Producto</label>
                    <select name="pidProducto" class="form-control selectpicker" id="pidProducto" data-live-search="true">
                        <option value=""></option>
                        @foreach($productos as $pro)
                        
                        <option value="{{$pro->idProducto}}">{{$pro->codigo_producto.' '.$pro->nombre_producto}}</option>
                        @endforeach
                    </select>
                  </div>
               </div>


               <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
                <div class="from-group">
                    <label for="descripcionDP">Descripcion de Servicio</label>
                    <input type="text"  name="descripcionDP" id="descripcionDP" class="form-control" placeholder="Descripcion">
                    

                </div>
            </div>


                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="from-group">
                    <label for="precio_venta">Costo</label>
                    <input type="number" name="pprecio_venta" id="pprecio_venta" class="form-control" placeholder="costo">
                    

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

            <div class="table-responsive">
                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">

                    <thead style="background-color:#A9D0F5">
                        <th>opciones</th>
                        <th>Tipo de Sercicio</th>
                        <th>Descripcion</th>
                        <th>Costo</th>
                    
                        <th>total</th>
                    </thead>
                    <tfoot>
                        <th>total</th>
                        <th></th>
                        <th></th>
                       
                        <th></th>
                        <th><h4 id="total">s/. 0.00</h4><input type="hidden" name="precio_total" id="precio_total">
                        </th>

                    </tfoot>
                       <tbody>
                    </tbody>                    
                </table>
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
                            <div class="col-lg-4">
                                <label for="garantia">
                                    Plazo de Garantia
                                </label>
                                <input type="date" name="garantia" id="garantia" class="form-control">
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
subtotal=[];
$("#guardar").hide();

$("#idCliente").change(mostrarValor);

function mostrarValor()
{
    datos=document.getElementById('idCliente').value.split('_');
    $("#pnro_documento").val(datos[2]);
    $("#pdireccion").val(datos[1]);
}

function agregar()
{
    datosProducto=document.getElementById('pidProducto').value.split('_');

    idProducto=datosProducto[0];
    producto=$("#pidProducto option:selected").text();
    
    descripcion=$("#descripcionDP").val();

   
    precio_venta=$("#pprecio_venta").val();
    

    //alert(datosProducto);

    if(idProducto!="" && precio_venta!="")
    {

        if(precio_venta>0)
        {

       subtotal[cont]=precio_venta*1;
       total=total+subtotal[cont];

      var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td> <td><input type="hidden" name="idProducto[]" value="'+idProducto+'">'+producto+'</td>  <td><input  type="hidden"  name="descripcionDP[]"  value="'+descripcion+'">'+descripcion+'</td>  <td><input type="number"  name="precio_venta[]"   value="'+precio_venta+'"></td>    <td>'+subtotal[cont]+'</td></tr>';
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
        $("#descripcionDP").val("");
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