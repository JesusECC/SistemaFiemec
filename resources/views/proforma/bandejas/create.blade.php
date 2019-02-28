@extends ('layouts.admin')
@section ('contenido')
<section class="content-header">
    <h1 style="margin-top: 55px;">
        Panel de Administrador
        <small>Version 2.3.0</small>
    </h1>
    <ol class="breadcrumb" style="margin-top: 55px;">
        <li>
            <a href="#">
                <i class="fas fa-file-signature"></i> Proforma</a>
        </li>
        <li class="active">Nueva Proforma Bandejas</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box" style="border-top: 3px solid #18A689">
                <div class="box-header with-border" style="padding: 10px !important">
                    <h4>
                        <strong style="font-weight: 400">
                            <i class="fas fa-dolly"></i> Datos Proforma Tableros Fiemec
                        </strong>
                    </h4>
                    @if(count($errors)>0)
                    <div class="alert-alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach 
                        </ul>   
                        
                    </div>
                    @endif
                    
                </div>
                <div class="box-body bg-gray-c">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-default panel-shadow">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="" class="control-label" style="color: #676a6c !important">
                                            Cliente
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-9 ">
                                            <div class="form-group ">
                                                <select required name="idClientes" class="form-control selectpicker" id="idClientes" data-live-search="true">
                                                    <option value="">Seleccione Cliente</option>
                                                    @foreach($clientes as $cliente)
                                                    <option value="{{$cliente->idCliente}}_{{$cliente->direccion}}_{{$cliente->nro_documento}}">{{$cliente->nombres_Rs}} {{$cliente->paterno}} {{$cliente->materno}}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="button" id="bt_add_Cliente" class="btn btn-create"><i class="fas fa-user-plus"></i> Nuevo</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" disabled name="cdireccion" id="cdireccion" class="form-control" placeholder="Dirección del cliente">
                                            </div>
                                                
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" disabled name="cnro_documento" id="cnro_documento" class="form-control" placeholder="Número de Documento">
                                            </div>
                                        </div>
                                         <div class="col-sm-6">
                                            <div class="form-group">
                                                <select required name="cliente_empleado" class="form-control " id="cliente_empleado" >
                                               </select> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default panel-shadow">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="" class="control-label" style="color: #676a6c !important">
                                            Tipo de Moneda
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select  name="idTipo_moneda" class="form-control selectpicker" id="idTipo_moneda" data-live-search="true">
                                                    <option value="" disabled="" selected="">Moneda</option>
                                                    @foreach($monedas as $mo)                
                                                        <option value="{{$mo->idTipo_moneda}}_{{$mo->tipo_cambio}}_{{$mo->simbolo}}_{{$mo->impuesto}}">{{$mo->nombre_moneda}}</option>
                                                    @endforeach  
                                                </select>                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" disabled name="simbolo" id="simbolo" class="form-control" placeholder="Simbolo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" disabled id="valorcambio" class="form-control" placeholder="Cambio">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" disabled id="igv_tipocambio" class="form-control" placeholder="% IGV">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default panel-shadow">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="" class="control-label" style="color: #676a6c !important;">
                                            Ingresar Bandejas
                                        </label>
                                    </div>
                                    <div class="row"  style="margin-top:20px">
                                        <div class="col-sm-8">
                                            <div class="" id="producto-oculto">
                                                <label for="" class="control-label">Producto</label>
                                                <select name="pidProducto" class="form-control selectpicker" id="pidProducto" data-live-search="true">
                                                    <option value="" selected="" disabled="">Seleccione Producto</option>
                                                    @foreach($productos as $producto)
                                                   <option value="{{ $producto->idProducto }}_{{ $producto->nombre_producto}}_{{ $producto->precio_unitario }}_{{$producto->descuento_familia}}_{{$producto->promedio}}">{{$producto->codigo_producto}} | {{$producto->nombre_producto}}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group label-floating">
                                                <label for="" class="control-label">Acc. %</label>
                                                <input type="text"  id="pacc" class="form-control" name="pacc"  >  
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group label-floating">
                                                <label for="" class="control-label">Espesor</label>
                                                <input type="text"  id="pespesor" class="form-control" name="pespesor"  >  
                                            </div>
                                        </div>
                                         
                                         <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="" class="control-label">Tramo</label> 
                                                 <select name="ptramo" class="form-control selectpicker" id="ptramo" data-live-search="true">
                                                    <option value="" disabled="" selected="">Seleccione Tramo</option>
                                                    <option value="1">sin tramo</option>
                                                    <option value="2.4">2400mm</option>
                                                    <option value="3">3000mm</option>
                                                   
                                                </select>                                                  
                                            </div>
                                        </div>
                                          

                                         <div class="col-sm-3">
                                            <div class="" id="producto-oculto">
                                                <label for="" class="control-label">Galvanizado</label>
                                                <select name="pgalvanizado" class="form-control selectpicker" id="pgalvanizado" data-live-search="true">
                                                    <option value="" disabled="" selected="">Seleccione Galvanizado</option>
                                                    @foreach($galvanizado as $gal)                
                                                        <option value="{{$gal->idGalvanizado}}_{{$gal->nombreGalvanizado}}">{{$gal->nombreGalvanizado}}</option>
                                                    @endforeach  
                                                   
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="" class="control-label">Precio Gal.</label>
                                                 <input type="number"  id="ppreciog" class="form-control" name="ppreciog">                                                   
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <div class="" id="producto-oculto">
                                                <label for="" class="control-label">Pintado</label>
                                                <select name="idPintado" class="form-control selectpicker" id="idPintado" data-live-search="true">
                                                    <option value="" selected="" disabled="">Seleccione Tipo de Pintado</option value="" disabled="" selected="">Seleccione Pintado</option>
                                                    @foreach($pintado as $pin)                
                                                        <option value="{{$pin->idPintado}}">{{$pin->nombrePintado}}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="" class="control-label">Precio Pin.</label>
                                                 <input type="number"  id="ppreciop" class="form-control" name="ppreciop"> 
                                            </div>
                                        </div>

                                        <div class="col-lg-4" style="margin-top:20px">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Medidas</label>
                                                <input type="text"  id="medidasp" class="form-control" name="medidasp"  >
                                            </div>
                                        </div>

                                        <div class="col-lg-3" style="margin-top:20px">
                                            <div class="form-group">
                                                <label for="" class="control-label">Dimenciones</label> 
                                                 <select name="pdimencion" class="form-control selectpicker" id="pdimencion" data-live-search="true">
                                                    <option value="" disabled="" selected="">Seleccione Dimenciones</option>
                                                    <option value="unds">Unidades</option>
                                                    <option value="mtrs">Metros</option>
                                                    <option value="cm">Centimentros</option>
                                                    <option value="mm">Milimetros</option>
                                                </select>                                                  
                                            </div>
                                        </div>
                                         

                                         <div class="col-lg-3" style="margin-top:20px">
                                            <div class="form-group">
                                                <label for="" class="control-label">Tapa</label> 
                                                  <select name="ptapa" class="form-control selectpicker" id="ptapa" data-live-search="true">
                                                    <option value="" disabled="" selected="">Seleccione Tapa</option>
                                                    <option value="Con tapa" >Con tapa</option>
                                                    <option value="Sin tapa" >Sin tapa</option>
                                                </select>                                                        
                                            </div>
                                        </div>

                                         <div class="col-lg-2" style="margin-top:20px">
                                            <div class="form-group">
                                                <label for="" class="control-label">Precio de Tapa</label>
                                                 <input type="number"  id="ppreciot" class="form-control" name="ppreciot">                                                   
                                            </div>
                                        </div>
                                        <div class="col-sm-2" style="margin-top:19px">
                                            <div class="" id="producto-oculto">
                                                <label for="" class="control-label">Promedio</label>
                                                    <select name="ppromedio" class="form-control selectpicker" id="ppromedio" data-live-search="true">
                                                    <option value="" disabled="" selected="">Seleccione Promedio</option>
                                                    <option value="0" >Sin Promedio</option>
                                                    <option value="1" >Menos 10%</option>
                                                    <option value="2" >Mas 10%</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2" style="margin-top:20px">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Cantidad</label>
                                                 <input type="number" id="Pcantidad" class="form-control" name="Pcantidad" >
                                            </div>
                                        </div> 
                                        
                                         

                                        <div class="col-lg-6" style="margin-top:20px">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Descripcion</label>
                                                <input type="textarea"  id="descripcionp" class="form-control" name="descripcionp"  >
                                            </div>
                                        </div> 
                                        <div class="col-sm-2" style="margin-top:45px">
                                            <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                                <button type="button" id="bt_add_produc" class="btn btn-primary"><i class="fas fa-cart-plus"></i> Agregar</button>
                                            </div>
                                        </div>                                                                                 
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div id="tablerosn" style="color: #f5f5f5 !important;">
                                        <section class="content" style="min-height:0px !important">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="box">
                                                        <div class="box-header with-border" style="padding:5px !important;">
                                                        <p> Proforma de Bandejas </p>
                                                            <div class="box-tools pull-right">
                                                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="box-body">
                                                            <div class="row">
                                                                <div class="col-md-12 table-responsive">
                                                                    <table id="detalle_tablero_Principal" class="table table-striped table-bordered table-condensed table-hover">
                                                                        <thead style="background-color:#A9D0F5;text-align: center;color: black !important" >
                                                                            
                                                                            <th>Producto</th>
                                                                            <th>Unds.</th>
                                                                            <th>Cant.</th>
                                                                            <th>P. Unit.</th>
                                                                            <th>total</th>
                                                                            <th>Opciones</th>
                                                                        </thead>
                                                                        <tbody id="tablero_unitario">
                                                                            <tr>
                                                                                <th colspan="8" align="text-center"> 
                                                                                    <div class="panel panel-transparent panel-dashed tip-sales text-center" >
                                                                                        <div class="row">
                                                                                             <div class="col-sm-8 col-sm-push-2">
                                                                                        <i class="fas fa-exclamation-triangle fa-3x text-warning"></i>
                                                                                        <h3 class="ich m-t-none">
                                                                                            No hay detalles de Bandejas
                                                                                        </h3>
                                                                                    </div>
                                                                                </div>
                                                                            </div> 
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            <div>
                                                        </div>                            
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="content" id="totales-general" style='display:none;'>
                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="panel panel-default panel-shadow"> 
                                                    <div class="panel-body">
                                                        <div class="row">   
                                                            <div class="col-sm-3">
                                                                <div class="form-group display-flex dec">
                                                                    <label for="" class="control-label">Subtotal</label>
                                                                    <div class="input-group date">
                                                                        <h4 id="subtotal">s/. 0.00</h4><input type="hidden" name="subtotal" id="subtotal">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-1 hidden-xs text-center p-t-xs"> 
                                                                <i class="fa fa-minus m-t-lg"> 
                                                                </i>  
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group display-flex dec">
                                                                    <label for="" class="control-label">Descuento</label>
                                                                    <div class="input-group ">
                                                                        <h4 id="descuentos">s/. 0.00</h4><input type="hidden" name="descuentos" id="descuentos">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group display-flex dec">
                                                                    <label for="" class="control-label">Valor Venta</label>
                                                                    <div class="input-group ">
                                                                        <h4 id="valorVenta">s/. 0.00</h4><input type="hidden" name="valorVenta" id="valorVenta"></th>
                                                                    </div>
                                                                </div>
                                                            </div>                                                            
                                                        </div> 
                                                        <hr>    
                                                        <div class="row">   
                                                            <div class="col-sm-4">
                                                                <div class="form-group display-flex dec">  
                                                                    <label for="    " class="control-label"> IGV %</label>
                                                                    <div class="input-group ">   
                                                                        <h4 id="igv">s/. 0.00</h4><input type="hidden" name="igv" id="igv">
                                                                    </div> 
                                                                   
                                                                </div>  
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group display-flex dec">  
                                                                    <label for="    " class="control-label"> Total Soles</label>
                                                                    <div class="input-group ">
                                                                        <h4 id="total">s/. 0.00</h4><input type="hidden" name="precio_subtotal" id="precio_subtotal">
                                                                    </div> 
                                                                   
                                                                </div>  
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group display-flex dec">  
                                                                    <label for="    " class="control-label"> Total Dolares</label>
                                                                    <div class="input-group date">
                                                                        <h4 id="total_dolares">s/. 0.00</h4><input type="hidden" name="tota_dolares" id="tota_dolares">
                                                                    </div> 
                                                                   
                                                                </div>  
                                                            </div>
                                                        </div>  
                                                    </div>  
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="panel panel-default panel-shadow bg-gray-c">
                                                    <div class="panel-body">    
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="" class="control-label">Forma de Pago:</label>
                                                                    <input type="text" name="forma_de" id="forma_de" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="" class="control-label">
                                                                        Plaza de Fabricación de bandejas
                                                                    </label>
                                                                    <input type="text" name="plaza_fabricacion" id="plaza_fabricacion" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="" class="control-label">Plazo de Oferta</label>
                                                                    <input type="date" name="plazo_oferta" id="plazo_oferta" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="" class="control-label">
                                                                        Garantia
                                                                    </label>
                                                                    <input type="text" name="garantia" id="garantia" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="" class="control-label">
                                                                        Forma de entrega
                                                                    </label>
                                                                    <textarea name="incluye" id="incluye" class="form-control"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="" class="control-label">
                                                                        Observaciones
                                                                    </label>
                                                                    <textarea name="observacion_condicion" id="observacion_condicion" class="form-control"></textarea>
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
                    </div>
                </div>
                <div class="box-footer">
                    <div class="ibox-title-buttons pull-right">
                        <button  id="save" class="btn btn-primary btn-sm" type="button"><i class="far fa-save"></i> Guardar</button>
                        <button class="btn btn-danger btn-sm" type="reset"><i class="far fa-times-circle"></i> Cancelar</button>
                        <button  class="btn btn-success btn-sm " type="button"><a style="color: white!important;text-decoration: none" href="{{url('proformas')}}"><i class="fas fa-reply-all"></i> Volver</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.row -->
</section><!-- /.content -->

@push('scripts')

<script>


    var selectCliente = document.getElementById('idClientes');
    selectCliente.addEventListener('change',function(){
        var selectedOption = this.options[selectCliente.selectedIndex];
        var selctedid=selectedOption.value.split('_');
        representante(selctedid[0]);
        
    });
    

    $(document).ready(function(){
        $('#bt_add_tablero').click(function(){
            valoresFinales();
        });
        $('#save').click(function(){
            saveProforma();
        });
        // boton agregar producto
        $('#bt_add_produc').click(function(){
            agregarProductosTablero();
            valoresFinales();
           
        });
        $('#Pcantidad').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '1');
        });
        $('#Pcantidad').click(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '1');
        });
        $('#pdescuento').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9/^\d*\.?\d*$/]/g, '');
        });
        $('#pdescuento').click(function (){
            this.value = (this.value + '').replace(/[^0-9/^\d*\.?\d*$/]/g, '');
        });
        // Actualizar
       

    });
    $("#idClientes").change(MostrarCliente);
    $("#idTipo_moneda").change(mostrarTipoCambio);
    var tablero=[];
    var filaob=[];
    var cont=0;
    var contp=0;
    var table;
    var subtotal=0;
    var nomTablero='unitaria';
    var idcliente;
    var totalt;
    var valorventa;
    var tipocam;
    var simbolo;
    var totaldolares=0;
    var iduser={!! Auth::user()->id !!}
    $("#pidProducto").change(MostarProducto);

    $("#idTipo_moneda").change(cambioMoneda);

    function cambiaropcion(){
        Producto=document.getElementById('pidProducto').value.split('_');
        var precio_unitario=Producto[2];
       if(precio_unitario==0.00 || precio_unitario==null){
            $('#precio_uni').attr("disabled", false);
        }
        else{
           $('#precio_uni').attr("disabled", true); 
        }
   }

    
    function MostrarCliente(){
       
        Cliente=document.getElementById('idClientes').value.split('_');
        idcliente=Cliente[0];
        $("#cdireccion").val(Cliente[1]);
        $("#cnro_documento").val(Cliente[2]);
    }
    function MostarProducto(){
        Producto=document.getElementById('pidProducto').value.split('_');
        $("#pacc").val(Producto[4]);
        cambiaropcion();
    }
    function mostrarTipoCambio(){
        tipoCambio=document.getElementById('idTipo_moneda').value.split('_');
        $("#simbolo").val(tipoCambio[2]);
        $("#valorcambio").val(tipoCambio[1]);
        $("#igv_tipocambio").val(tipoCambio[3]+ " %");
        tipocam=tipoCambio[1];
        simbolo=tipoCambio[2];

    }
    function mostrarcampos(){
        document.getElementById('producto-crear-oculto').style.display = 'block';
        document.getElementById('producto-oculto').style.display = 'block';
    } 


    function representante(idCliente){
        console.log(idCliente,'-----');
      $.ajax({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{cliente:idCliente}, //datos que se envian a traves de ajax
            url:'cli', //archivo que recibe la peticion
            type:'post', //método de envio
            dataType:"json",//tipo de dato que envio 
            beforeSend: function () {
                console.log('procesando');
                // $("#resultado").html("Procesando, espere por favor...");
            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                console.log(response);
                if(response.veri==true){

                    // var urlBase=window.location.origin;
                    // var url=urlBase+'/'+response.data;
                    // document.location.href=url;
                    var representante=response.cliente;
                    var va;
                    console.log(representante);
                    va='<option value="" disabled="" selected="">Seleccione</option>'
                    for(const i in representante){
                        va+='<option value="'+representante[i]['idCR']+'">'+representante[i]['nombre_RE']+'</option>';                 
                    }
                    $("#cliente_empleado").html(va); 
                }else{
                    alert("problemas al enviar la informacion");
                }
            }
        });
    }

    function saveProforma(){
        // se enviar los datos al controlador proforma tableros
        tipoCambio=document.getElementById('idTipo_moneda').value.split('_');
        var idtipocam=tipoCambio[0];
        var valorcambio=tipoCambio[1];
        var vVenta=$("#valorVenta").val();
        var tl=$("#total").val();
        var forma=$("#forma_de").val();
        var clienteemp=$("#cliente_empleado").val();
        var plazo=$("#plazo_oferta").val();
        var plazoF=$("#plaza_fabricacion").val();
        var incl=$("#incluye").val();
        var observacion=$("#observacion_condicion").val();
        var garant=$("#garantia").val();
        var simbolop=$("#simbolo").val();
        console.log(iduser);
        if(valorventa>0 && totalt>0 && idtipocam!='' && valorcambio!='' && typeof(idcliente)!='undefined' && idcliente!='null' ){
            var dat=[{nomTablero:nomTablero,idcliente:idcliente,valorVenta:valorventa,total:totalt,totaldolares:totaldolares,idTipoCambio:idtipocam,valorTipoCambio:valorcambio,forma:forma,plazo:plazo,observacion:observacion,incluye:incl,plazofabri:plazoF,clienteemp:clienteemp,garantias:garant,simbolo:simbolop,userid:iduser}];
            // var dat=[{nomTablero:nomTablero,idcliente:idcliente,valorVenta:valorventa,total:totalt,totaldolares:totaldolares,idTipoCambio:idtipocam,valorTipoCambio:valorcambio,forma:forma,plazo:plazo,observacion:observacion,clienteemp:clienteemp}];
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:  {tableros:tablero,filas:filaob,datos:dat}, //datos que se envian a traves de ajax
                url:   'guardar', //archivo que recibe la peticion
                type:  'post', //método de envio
                dataType: "json",//tipo de dato que envio 
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    if(response.veri==true){
                        var urlBase=window.location.origin;
                        var url=urlBase+'/'+response.data;
                        document.location.href=url;
                    }else{
                        alert("problemas al guardar la informacion");
                    }
                }
            });
        }else {
            alert('ingrese productos al tablero!!');
        }
    }
    var bool;
    function agregarProductosTablero(){    
        Producto=document.getElementById('pidProducto').value.split('_');
        Galvanizado=document.getElementById('pgalvanizado').value.split('_');
        var idProd=Producto[0];
        var pname=Producto[1];
        var idGal=Galvanizado[0];
        var gname=Galvanizado[1];
        var pdescripcion=$("#descripcionp ").val();
        var puni=$('#precio_uni').val();
        var preciog=$('#ppreciog').val();
        var idPin=$('#idPintado').val();
        var preciop=$('#ppreciop').val();
        var preciot=$('#ppreciot').val();
        var tra=$('#ptramo').val();
        var pro=$('#ppromedio').val();
        var pcant=$('#Pcantidad').val();
        var med=$('#medidasp').val();
        var tap=$('#ptapa').val();
        var esp=$('#pespesor').val();
        var dim=$('#pdimencion').val();
        var descuento=$('#pdescuento').val();
        var cambioB=$('#valorcambio').val();
        var simboloB=$('#simbolo').val();
        var proacc=$('#pacc').val();
        var filas;
        if(nomTablero!="" && idProd!=""  && pcant!=""  && typeof(tipocam)!='undefined' && tipocam!='null' && tipocam!='' ){

            if(pcant!=0){
                document.getElementById('totales-general').style.display = 'block';
            var bool=false;
            var boolfila=false;
            bool=true;
            for (const fil in filaob) {
                if (filaob.hasOwnProperty(fil)) {
                    if(filaob[fil]['nomTablero']==nomTablero && filaob[fil]['idProducto']==idProd && filaob[fil]['medidasp']==med){
                        var su=parseInt(pcant);
                        var des=parseInt(descuento);
                        var descr=parseFloat(pdescripcion);
                        var medid=parseFloat(med);
                        filaob[fil]['cantidadP']=su;
                        filaob[fil]['descuentoP']=des;
                        filaob[fil]['descripcionP']=descr;
                        filaob[fil]['medidasp']=medid;
                        fila();
                        boolfila=true;                
                    }                
                }
            }
            if(boolfila==false){
                // console.log("produc nuevo",contp);
                var dat={idProducto:idProd,producto:pname,idGalvanizado:idGal,idPintado:idPin,galvanizado:gname,descripcionP:pdescripcion,prec_uniP:puni,prec_gal:preciog,prec_pin:preciop,prec_tap:preciot,tramo:tra,promed:pro,cantidadP:pcant,medi:med,tapa:tap,espesor:esp,descuentoP:descuento,dimencion:dim,nomTablero:nomTablero,posiP:contp,tipocambio:cambioB,porcentajeacc:proacc,simbolocambio:simboloB,fila:""};
                filaob.push(dat);
                fila();
                contp++;            
            }
            valoresFinales();            
            }else{
            
            alert("La cantidad no puede ser '0' ");


            }
        }else{
            alert("Ingresar Datos del Producto!! o datos del tipo de cambio");
        }
    }

    function fila(){
        // realiza la insercion de las filas agregadas actualizando los importes y las cantidaddes
        if(filaob.length>0){
            var filas;
            for (const fila in filaob) {
                if (filaob.hasOwnProperty(fila)) {                            
                    var cantidad=parseFloat(filaob[fila]['cantidadP']);
                    var precio=parseFloat(filaob[fila]['prec_uniP']);
                    var precioga=parseFloat(filaob[fila]['prec_gal']);
                    var preciope=parseFloat(filaob[fila]['prec_pin']);
                    var preciota=parseFloat(filaob[fila]['prec_tap']);
                    var tram=parseFloat(filaob[fila]['tramo']);
                    var promedio=parseFloat(filaob[fila]['promed']);
                    var medidas=parseFloat(filaob[fila]['medi']);
                    var tapas=String(filaob[fila]['tapa']);
                    var dimenciones=parseFloat(filaob[fila]['dimencion']);
                    var descuento=parseFloat(filaob[fila]['descuentoP']);
                    var procentaje=parseFloat(filaob[fila]['porcentajeacc']);

                    
                if(precioga>0 && procentaje>0 && tram>0 && tapas=='Con tapa' && promedio==1){

                        var subt2=((precioga*tram)*(procentaje/100)+preciota)-(((precioga*tram)*(procentaje/100)+preciota)*0.1);

                        var subt=(((precioga*tram)*(procentaje/100)+preciota)-(((precioga*tram)*(procentaje/100)+preciota)*0.1))*cantidad;

                }else if(precioga>0 && procentaje>0 && tram>0 && tapas=='Con tapa' && promedio==2){

                        var subt2=((precioga*tram)*(procentaje/100)+preciota)+(((precioga*tram)*(procentaje/100)+preciota)*0.1);

                        var subt=(((precioga*tram)*(procentaje/100)+preciota)+(((precioga*tram)*(procentaje/100)+preciota)*0.1))*cantidad;

                }else if(precioga>0 && procentaje>0 && tram>0 && tapas=='Sin tapa' && promedio==1){

                        var subt2=((precioga*tram)*(procentaje/100))-(((precioga*tram)*(procentaje/100))*0.1);

                        var subt=(((precioga*tram)*(procentaje/100))-(((precioga*tram)*(procentaje/100))*0.1))*cantidad;

                }else if(precioga>0 && procentaje>0 && tram>0 && tapas=='Sin tapa' && promedio==2){

                        var subt2=((precioga*tram)*(procentaje/100))+(((precioga*tram)*(procentaje/100))*0.1);

                        var subt=(((precioga*tram)*(procentaje/100))+(((precioga*tram)*(procentaje/100))*0.1))*cantidad;

                }else if(precioga>0 && procentaje>0 && tram>0 && tapas=='Con tapa'){

                        var subt2=((precioga*tram)*(procentaje/100)+preciota);

                        var subt=(((precioga*tram)*(procentaje/100))+preciota)*cantidad;

                }else if(precioga>0 && promedio==1 && tapas=='Con tapa'){

                        var subt2=(precioga+preciota)-((precioga+preciota)*0.1);

                        var subt=((precioga+preciota)-((precioga+preciota)*0.1))*cantidad;

                }else if(precioga>0 && promedio==2 && tapas=='Con tapa'){

                        var subt2=(precioga+preciota)+((precioga+preciota)*0.1);

                        var subt=((precioga+preciota)((precioga+preciota)*0.1))*cantidad;

                }else if(precioga>0 && promedio==1 && tapas=='Sin tapa'){

                        var subt2=(precioga)-(precioga*0.1);

                        var subt=((precioga)-(precioga*0.1))*cantidad;

                }else if(precioga>0 && promedio==2 && tapas=='Sin tapa'){

                        var subt2=(precioga)+(precioga*0.1);

                        var subt=((precioga)+(precioga*0.1))*cantidad;

                }else if(precioga>0 && procentaje>0 && tram>0){

                        var subt2=(precioga*tram)*(procentaje/100);

                        var subt=((precioga*tram)*(procentaje/100))*cantidad;

                }else if(precioga>0 && promedio==1){

                        var subt2=(precioga-(precioga*0.1));

                        var subt=(precioga-(precioga*0.1))*cantidad;

                }else if(precioga>0 && promedio==2){

                        var subt2=(precioga+(precioga*0.1));

                        var subt=(precioga+(precioga*0.1))*cantidad;

                }else if(precioga>0 && tapas=='Con tapa'){

                        var subt2=precioga+preciota;

                        var subt=(precioga+preciota)*cantidad;

                }else if(precioga>0 && tapas=='Sin tapa'){

                        var subt2=precioga;

                        var subt=precioga*cantidad;

                }else if(precioga>0){

                        var subt2=precioga;

                        var subt=precioga*cantidad;

                }
                                   
                    filas=
                        '<tr class="selected text-center" id="fila_'+filaob[fila]['nomTablero']+'_'+filaob[fila]['posiP']+'" style="width:100%; color:black !important">'+
                            '<td class="text-center"> '+ 
                                '<input style="width: 70px !important;" type="hidden" name="idpod_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['idProducto']+'">'+filaob[fila]['producto']+ ' de ' +

                               '<input  type="hidden" name="medi_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['medi']+'">'+filaob[fila]['medi']+' fabricado en plancha galvanizada LAC/LAF acabado '+

                               '<input style="width: 70px !important;" type="hidden" name="idgal_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['idGalvanizado']+'">'+filaob[fila]['galvanizado']+', Espesor de '+

                               '<input  type="hidden" name="esp_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['espesor']+'">'+filaob[fila]['espesor']+', Tramo de'+

                                '<input  type="hidden" name="tram_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['tramo']+'">'+filaob[fila]['tramo']+' metros. Fabricado bajo la norma NEMA V-1 y recomendacion de la NFPA-70. '+

                                '<input  type="hidden" name="descri_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['descripcionP']+'">'+filaob[fila]['descripcionP']+'. '+

                                '<input  type="hidden" name="tap_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['tapa']+'">'+filaob[fila]['tapa']+
                            '</td>'+

                            '<td  class="text-center"> '+ 
                                '<input  type="hidden" name="dem_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['dimencion']+'">'+filaob[fila]['dimencion']+
                            '</td>'+
                            
                            '<td  class="text-center"> '+ 
                                '<input  type="hidden" name="cant_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['cantidadP']+'">'+filaob[fila]['cantidadP']+
                            '</td>'+

                            '<td class="text-center"> '+   
                                '<input style="width:60px !important;" width="40px" type="hidden" disabled name="preuni'+filaob[fila]['nomTablero']+'[]" value="'+subt2.toFixed(2)+'" >'+subt2.toFixed(2)+
                            '</td>'+
                            
                            '<td class="text-center"> '+   
                                '<input style="width:40px !important;" width="40px" type="hidden" disabled name="ptotal'+filaob[fila]['nomTablero']+'[]" value="'+subt.toFixed(2) +'">'+subt.toFixed(2)+
                            '</td>'+
                            '<td class="text-center">'+
                                '<center>'+
                                    '<button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs" onclick="eliminar('+filaob[fila]['posiP']+');">'+
                                            '<i class="fas fa-trash"></i>'+
                                    '</button>'+                                
                                '</center>'+

                            '</td>'+
                        '</tr>';  
                    filaob[fila]['fila']=filas;
                    filas="";   
                    limpiar(); 

            }
         }                    
     }
}   

    function limpiar(){
       
       // $("#ppreciog").val("");
       // $("#ppreciop").val("");
        $("#Pcantidad").val("");
        $("#descripcionp").val("");
    } 
    function detalleFilas(){
        // mantiene en la vista las filas cuando se agrega una nueva tabla
        var fil='';
        for (var key in filaob) {                   
            if (filaob.hasOwnProperty(key)) {
                    fil+=filaob[key]['fila'];
            }
        }
        $('#tablero_unitario').html(fil);
        fil='';
    }
    function subTotal(){
        // la suma de tosos los tableros
         

        var sub=0;  

        for (const fila in filaob) {

            var promedio=parseFloat(filaob[fila]['promed']);
            var tapas=String(filaob[fila]['tapa']);

            if (filaob.hasOwnProperty(fila) && promedio==1 && tapas=='Con tapa') {

                var precioga=parseFloat(filaob[fila]['prec_gal']);
                var preciope=parseFloat(filaob[fila]['prec_pin']);
                var tram=parseFloat(filaob[fila]['tramo']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var preciota=parseFloat(filaob[fila]['prec_tap']);
                
                sub+=((((precioga+preciope)*tram)+preciota))*cantidad; 

                      
            }else if(filaob.hasOwnProperty(fila) && promedio==1 && tapas=='Sin tapa'){

                var precioga=parseFloat(filaob[fila]['prec_gal']);
                var preciope=parseFloat(filaob[fila]['prec_pin']);
                
                var tram=parseFloat(filaob[fila]['tramo']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var preciota=parseFloat(filaob[fila]['prec_tap']);
    
                sub+=((precioga+preciope)*tram)*cantidad;
 

            }else if(filaob.hasOwnProperty(fila) && promedio==2 && tapas=='Con tapa'){

                var precioga=parseFloat(filaob[fila]['prec_gal']);
                var preciope=parseFloat(filaob[fila]['prec_pin']);
                
                var tram=parseFloat(filaob[fila]['tramo']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var preciota=parseFloat(filaob[fila]['prec_tap']);
    
                sub+=((((precioga+preciope)*tram)+preciota))*cantidad; 
 

            }else if(filaob.hasOwnProperty(fila) && promedio==2 && tapas=='Sin tapa'){

                var precioga=parseFloat(filaob[fila]['prec_gal']);
                var preciope=parseFloat(filaob[fila]['prec_pin']);
                
                var tram=parseFloat(filaob[fila]['tramo']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var preciota=parseFloat(filaob[fila]['prec_tap']);
    
                sub+=((precioga+preciope)*tram)*cantidad;
 

            }

        }
        $("#subtotal").html("s/. " + sub.toFixed(2));
    }


    function valorVenta(){
        var venta=0;        
        for (const fila in filaob) {
            var tapas=String(filaob[fila]['tapa']);
            var promedio=parseFloat(filaob[fila]['promed']);

             if (filaob.hasOwnProperty(fila) && promedio==1 && tapas=='Con tapa') {

                var precioga=parseFloat(filaob[fila]['prec_gal']);
                var preciope=parseFloat(filaob[fila]['prec_pin']);
                var tram=parseFloat(filaob[fila]['tramo']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var preciota=parseFloat(filaob[fila]['prec_tap']);
                
                venta+=((((precioga+preciope)*tram)+preciota))*cantidad; 

                      
            }else if(filaob.hasOwnProperty(fila) && promedio==1 && tapas=='Sin tapa'){

                var precioga=parseFloat(filaob[fila]['prec_gal']);
                var preciope=parseFloat(filaob[fila]['prec_pin']);
                
                var tram=parseFloat(filaob[fila]['tramo']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var preciota=parseFloat(filaob[fila]['prec_tap']);
    
                venta+=((precioga+preciope)*tram)*cantidad;
 

            }else if(filaob.hasOwnProperty(fila) && promedio==2 && tapas=='Con tapa'){

                var precioga=parseFloat(filaob[fila]['prec_gal']);
                var preciope=parseFloat(filaob[fila]['prec_pin']);
                
                var tram=parseFloat(filaob[fila]['tramo']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var preciota=parseFloat(filaob[fila]['prec_tap']);
    
                venta+=((((precioga+preciope)*tram)+preciota))*cantidad;
 

            }else if(filaob.hasOwnProperty(fila) && promedio==2 && tapas=='Sin tapa'){

                var precioga=parseFloat(filaob[fila]['prec_gal']);
                var preciope=parseFloat(filaob[fila]['prec_pin']);
                
                var tram=parseFloat(filaob[fila]['tramo']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var preciota=parseFloat(filaob[fila]['prec_tap']);
    
                venta+=((precioga+preciope)*tram)*cantidad;
 

            }

        }
        valorventa=venta.toFixed(2);
        $("#valorVenta").html("s/. " + venta.toFixed(2));
    }
    function igv(){
        var venta=0;   
        var ig=0;     
        for (const fila in filaob) {
            var tapas=String(filaob[fila]['tapa']);
           var promedio=parseFloat(filaob[fila]['promed']);

             if (filaob.hasOwnProperty(fila) && promedio==1 && tapas=='Con tapa') {

                var precioga=parseFloat(filaob[fila]['prec_gal']);
                var preciope=parseFloat(filaob[fila]['prec_pin']);
                var tram=parseFloat(filaob[fila]['tramo']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var preciota=parseFloat(filaob[fila]['prec_tap']);
                
                venta+=((((precioga+preciope)*tram)+preciota))*cantidad; 

                      
            }else if(filaob.hasOwnProperty(fila) && promedio==1 && tapas=='Sin tapa'){

                var precioga=parseFloat(filaob[fila]['prec_gal']);
                var preciope=parseFloat(filaob[fila]['prec_pin']);
                
                var tram=parseFloat(filaob[fila]['tramo']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var preciota=parseFloat(filaob[fila]['prec_tap']);
    
                venta+=((precioga+preciope)*tram)*cantidad;
 

            }else if(filaob.hasOwnProperty(fila) && promedio==2 && tapas=='Con tapa'){

                var precioga=parseFloat(filaob[fila]['prec_gal']);
                var preciope=parseFloat(filaob[fila]['prec_pin']);
                
                var tram=parseFloat(filaob[fila]['tramo']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var preciota=parseFloat(filaob[fila]['prec_tap']);
    
               venta+=((((precioga+preciope)*tram)+preciota))*cantidad;
 

            }else if(filaob.hasOwnProperty(fila) && promedio==2 && tapas=='Sin tapa'){

                var precioga=parseFloat(filaob[fila]['prec_gal']);
                var preciope=parseFloat(filaob[fila]['prec_pin']);
                
                var tram=parseFloat(filaob[fila]['tramo']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var preciota=parseFloat(filaob[fila]['prec_tap']);
    
                venta+=((precioga+preciope)*tram)*cantidad;
 

            }
        }
        ig=venta*0.18;
        $("#igv").html("s/. " + ig.toFixed(2));
    }

    
    function total(){
        var venta=0;   
        var igv=0;  
        var tota=0;   
        
        for (const fila in filaob) {
            var tapas=String(filaob[fila]['tapa']);
           var promedio=parseFloat(filaob[fila]['promed']);

             if (filaob.hasOwnProperty(fila) && promedio==1 && tapas=='Con tapa') {

                var precioga=parseFloat(filaob[fila]['prec_gal']);
                var preciope=parseFloat(filaob[fila]['prec_pin']);
                var tram=parseFloat(filaob[fila]['tramo']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var preciota=parseFloat(filaob[fila]['prec_tap']);
                
                venta+=((((precioga+preciope)*tram)+preciota))*cantidad; 

                      
            }else if(filaob.hasOwnProperty(fila) && promedio==1 && tapas=='Sin tapa'){

                var precioga=parseFloat(filaob[fila]['prec_gal']);
                var preciope=parseFloat(filaob[fila]['prec_pin']);
                
                var tram=parseFloat(filaob[fila]['tramo']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var preciota=parseFloat(filaob[fila]['prec_tap']);
    
                venta+=((precioga+preciope)*tram)*cantidad;
 

            }else if(filaob.hasOwnProperty(fila) && promedio==2 && tapas=='Con tapa'){

                var precioga=parseFloat(filaob[fila]['prec_gal']);
                var preciope=parseFloat(filaob[fila]['prec_pin']);
                
                var tram=parseFloat(filaob[fila]['tramo']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var preciota=parseFloat(filaob[fila]['prec_tap']);
    
                venta+=((((precioga+preciope)*tram)+preciota))*cantidad;
 

            }else if(filaob.hasOwnProperty(fila) && promedio==2 && tapas=='Sin tapa'){

                var precioga=parseFloat(filaob[fila]['prec_gal']);
                var preciope=parseFloat(filaob[fila]['prec_pin']);
                
                var tram=parseFloat(filaob[fila]['tramo']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var preciota=parseFloat(filaob[fila]['prec_tap']);
    
                venta+=((precioga+preciope)*tram)*cantidad;
 

            }
        }
        igv=venta*0.18;
        tota=venta+igv;
        totalt=tota.toFixed(2);
        totaldolares=(tota/tipocam).toFixed(2);
        $("#total").html("s/. " + tota.toFixed(2));
    }
    function valoresFinales(){
        if(filaob.length>0){
            detalleFilas();
        }
        subTotal();
        valorVenta();
        igv();
        total();
        cambioMoneda();
    }
    function cambioMoneda(){
        if(filaob.length>0){
            if("$"==simbolo){    
                totaldolares=(totalt/tipocam).toFixed(2);        
                $("#total_dolares").html(simbolo+" " + totaldolares);
            }else{
                $("#total_dolares").html(0);
            }
        }
    }
    function eliminar(index){
        // elimina las filas de un tablero especifico 
        for (var key in filaob) {
            if (filaob.hasOwnProperty(key)) {
                if(index==filaob[key]['posiP']){
                    $("#fila_"+filaob[key]['nomTablero']+'_'+index).remove();
                    filaob.splice(key,1);                      
                }
            }
        } 
        valoresFinales();
    }    
    function ocultar(){
        tablero.length>0
        if (0<tablero.length && 0<filaob){
            
        }
    }
</script>
@endpush
@endsection








