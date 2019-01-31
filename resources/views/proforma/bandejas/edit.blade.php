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
                <i class="far fa-edit"></i> Proforma</a>
        </li>
        <li class="active">Editar Proforma Unitaria</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box" style="border-top: 3px solid #18A689">
                <div class="box-header with-border" style="padding: 10px !important">
                    <h4>
                        <strong style="font-weight: 400">
                            <i class="fas fa-dolly"></i> Datos de Proforma Fiemec
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
                    <div class="ibox-title-buttons pull-right">
                        <button  id="save" class="btn btn-primary btn-sm" type="button"><i class="far fa-save"></i> Guardar</button>
                        <button class="btn btn-danger btn-sm" type="reset"><i class="far fa-times-circle"></i> Cancelar</button>
                        <button  class="btn btn-success btn-sm " type="button"><a style="color: white!important;text-decoration: none" href="{{url('bandejas')}}"><i class="fas fa-reply-all"></i> Volver</a></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="panel panel-default panel-shadow">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="" class="control-label" style="color: #676a6c !important">Cliente</label>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="" class="control-label">Nombre y Apellidos de Cliente</label>
                                                <input type="text" disabled name="nombreclie" id="nombreclie" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="" class="control-label">Dirección Cliente</label>
                                                <input type="text" disabled name="cdireccion" id="cdireccion" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label for="" class="control-label"> Documento</label>
                                                <input type="text" disabled name="cnro_documento" id="cnro_documento" class="form-control">
                                            </div>
                                            <div class="col-md-8">
                                                <label for="" class="control-label">Empleado </label>
                                                <input type="text" disabled name="cotizador" id="cotizador" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-default panel-shadow">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="" class="control-label" style="color: #676a6c !important">
                                            Tipo de Cambio
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <label for="" class="control-label">Símbolo</label>
                                                <input type="text" disabled name="simbolo" id="simbolo" class="form-control" >
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="" class="control-label">Valor</label>
                                                <input type="text" disabled id="valorcambio" class="form-control">
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
                                <div class="panel-body" id="agregar_producto" style="display:none !important">
                                    <div class="form-group">
                                        <label for="" class="control-label" style="color: #676a6c !important">
                                            Agregar Producto
                                        </label>
                                    </div>
                                    <div class="row" >
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
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <button type="button" id="bt_add_produc" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar</button>
                                            </div>  
                                        </div> 
                                    </div>
                                </div>
                                <div class="row" id="quitar_btn" style="display: block;">
                                        <div class="col-md-12">
                                            <div class="from-group ">
                                                <button id="btnagregar" style="margin: 20px;" class="btn btn-success " type="button">
                                                    <i class="fas fa-cart-plus"></i>Agregar Productos</button>
                                            </div>
                                        </div>
                                </div>
                                <div class="panel-footer">
                                    <div id="tablerosn">
                                        <div id="Tablero_unitaria">
                                            <section class="content" style="min-height:0px !important">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="box">
                                                            <div class="box-header with-border" style="padding:5px !important;">
                                                            <p> Proforma Bandejas </p>
                                                                <div class="box-tools pull-right">
                                                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="box-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
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
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
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
                                                                        <h4 class="form-control" id="subtotal">    </h4>
                                                                        <input type="hidden" name="subtotal" id="subtotal">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-1 hidden-xs text-center mr-t-1"> 
                                                                <i class="fa fa-minus "> 
                                                                </i>  
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group display-flex dec">
                                                                    <label for="" class="control-label">Descuento</label>
                                                                    <div class="input-group ">
                                                                        <h4 id="descuentos" class="form-control">    </h4>
                                                                        <input type="hidden" name="descuentos" id="descuentos"  >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group display-flex dec">
                                                                    <label for="" class="control-label">Valor Venta</label>
                                                                    <div class="input-group ">
                                                                        <h4 class="form-control" id="valorVenta">    </h4>
                                                                        <input type="hidden" name="valorVenta" id="valorVenta">
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
                                                                        <h4 class="form-control" id="igv">    
                                                                        </h4>
                                                                        <input type="hidden" name="igv" id="igv" >
                                                                    </div> 
                                                                   
                                                                </div>  
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group display-flex dec">  
                                                                    <label for="    " class="control-label"> Total Soles</label>
                                                                    <div class="input-group ">
                                                                        <h4 class="form-control" id="total">    </h4>
                                                                        <input type="hidden" name="precio_subtotal" id="precio_subtotal">
                                                                    </div> 
                                                                   
                                                                </div>  
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group display-flex dec">  
                                                                    <label for=" " class="control-label"> Total Dolares</label>
                                                                    <div class="input-group date">
                                                                        <h4 class="form-control" id="total_dolares">    
                                                                        </h4>
                                                                        <input type="hidden" name="tota_dolares" id="tota_dolares" value="">
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
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    $(document).ready(function(){
        $('#bt_add_tablero').click(function(){
            valoresFinales();
        });
        $('#save').click(function(){
            saveProforma();
        });
        $('#btnagregar').click(function(){
            agregarprorducto();
        
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
        // asignarValores();
    });
    $("#idClientes").change(MostrarCliente);
    $("#idTipo_moneda").change(mostrarTipoCambio);
    
    var pro={!! $proforma !!};
    var editarval=true;
    
    
    // console.log(pro);
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
    var idtipocam;
    var idProforma;
    $("#pidProducto").change(MostarProducto);
     $("#pidMedidas").change(MostrarMedida);
    $("#idTipo_moneda").change(cambioMoneda);
    asignarValores();

    function agregarprorducto(){
        document.getElementById('agregar_producto').style.display ='block';
        document.getElementById('quitar_btn').style.display='none';
    } 

    function MostrarCliente(){
       
        Cliente=document.getElementById('idClientes').value.split('_');
        idcliente=Cliente[0];
        $("#cdireccion").val(Cliente[1]);
        $("#cnro_documento").val(Cliente[2]);
    }
    function MostrarMedida(){
        Medidas=document.getElementById('pidMedidas').value.split('_');
        idmedidas=Medidas[0];
        $("#precio_uni").val(Medidas[1]);
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
        idtipocam=tipoCambio[0];
        valorcambio=tipoCambio[1];

    }
    function mostrarcampos(){
        document.getElementById('producto-crear-oculto').style.display = 'block';
        document.getElementById('producto-oculto').style.display = 'block';
    } 

    function saveProforma(){
        // se enviar los datos al controlador proforma tableros
        // tipoCambio=document.getElementById('idTipo_moneda').value.split('_');
        var forma=$("#forma_de").val();
        var plazo=$("#plazo_oferta").val();
        var observacion=$("#observacion_proforma").val();
        if(valorventa>0 && totalt>0 ){
            var dat=[{idProforma:idProforma,nomTablero:nomTablero,valorVenta:valorventa,total:totalt,totaldolares:totaldolares,idTipoCambio:idtipocam,valorTipoCambio:tipocam,forma:forma,plazo:plazo,observacion:observacion}];
           $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:  {tableros:tablero,filas:filaob,datos:dat}, //datos que se envian a traves de ajax
                url:   'modificar', //archivo que recibe la peticion
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
        var esp=$('#espesor').val();
        var puni=$('#precio_uni').val();
        var pcant=$('#Pcantidad').val();
        var descuento=$('#pdescuento').val();
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
        var filas;
        if(nomTablero!="" && idProd!=""  && pname!=""   ){
            document.getElementById('totales-general').style.display = 'block';
            var bool=false;
            var boolfila=false;
            bool=true;
            for (const fil in filaob) {
                if (filaob.hasOwnProperty(fil)) {
                    if(filaob[fil]['nomTablero']==nomTablero && filaob[fil]['idProducto']==idProd ){
                        var es=parseInt(esp);
                        var su=parseInt(pcant);
                        var des=parseInt(descuento);
                        filaob[fil]['espesor']=es;
                        filaob[fil]['cantidadP']=su;
                        filaob[fil]['descuentoP']=des;
                        filaob[fil]['descripcionP']=pdescripcion;
                        fila();
                        boolfila=true;                
                    }                
                }
            }
            if(boolfila==false){
                // console.log("produc nuevo",contp);
                var dat={idProducto:idProd,producto:pname,idGalvanizado:idGal,idPintado:idPin,galvanizado:gname,descripcionP:pdescripcion,prec_uniP:puni,prec_gal:preciog,prec_pin:preciop,prec_tap:preciot,tramo:tra,promed:pro,cantidadP:pcant,medidas:med,tapa:tap,espesor:esp,descuentoP:descuento,dimenciones:dim,nomTablero:nomTablero,posiP:contp,tipocambio:cambioB,simbolocambio:simboloB,fila:"",estado:2,idDetalleProforma:''};
                filaob.push(dat);
                fila();
                contp++;            
            }
            valoresFinales();            
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
                    var promedio=parseFloat(filaob[fila]['promedi']);
                    var medidas=parseFloat(filaob[fila]['medi']);
                    var tapas=String(filaob[fila]['tapa']);
                    var dimenciones=parseFloat(filaob[fila]['dimencion']);
                    var descuento=parseFloat(filaob[fila]['descuentoP']);

                    

                   if(promedio==1 && tapas=='Con tapa'){

                    var subt2=(((precioga+preciope)*tram)+preciota)-((((precioga+preciope)*tram)+preciota)*0.1);
                    var subt=((((precioga+preciope)*tram)+preciota)-((((precioga+preciope)*tram)+preciota)*0.1))*cantidad;

                }else if(promedio==1 && tapas=='Sin tapa'){

                    var subt2=((precioga+preciope)*tram)-((((precioga+preciope)*tram)+preciota)*0.1);
                    var subt=(((precioga+preciope)*tram)-(((precioga+preciope)*tram)*0.1))*cantidad;

                }else if(promedio==2 && tapas=='Con tapa'){

                    var subt2=(((precioga+preciope)*tram)+preciota)+((((precioga+preciope)*tram)+preciota)*0.1);
                    var subt=((((precioga+preciope)*tram)+preciota)+((((precioga+preciope)*tram)+preciota)*0.1))*cantidad;

                }else if(promedio==2 && tapas=='Sin tapa'){

                    var subt2=((precioga+preciope)*tram)+((((precioga+preciope)*tram)+preciota)*0.1);
                    var subt=(((precioga+preciope)*tram)+(((precioga+preciope)*tram)*0.1))*cantidad;


                }

               
                    filas=
                        '<tr class="selected text-center" id="fila_'+filaob[fila]['nomTablero']+'_'+filaob[fila]['posiP']+'" style="width:100%;">'+
                            '<td class="text-center"> '+ 
                                '<input style="width: 70px !important;" type="hidden" name="idpod_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['idProducto']+'">'+filaob[fila]['producto']+ ' de ' +

                               '<input  type="hidden" name="medi_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['medidas']+'">'+filaob[fila]['medidas']+' fabricado en plancha galvanizada LAC/LAF acabado '+

                               '<input style="width: 70px !important;" type="hidden" name="idgal_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['idGalvanizado']+'">'+filaob[fila]['galvanizado']+', Espesor de '+

                               '<input  type="hidden" name="esp_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['espesor']+'">'+filaob[fila]['espesor']+', Tramo de '+

                                '<input  type="hidden" name="tram_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['tramo']+'">'+filaob[fila]['tramo']+' metros. Fabricado bajo la norma NEMA V-1 y recomendacion de la NFPA-70. '+

                                '<input  type="hidden" name="descri_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['descripcionP']+'">'+filaob[fila]['descripcionP']+'. '+

                                '<input  type="hidden" name="tap_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['tapa']+'">'+filaob[fila]['tapa']+
                            '</td>'+
                            '<td  class="text-center"> '+   
                                '<input type="hidden" style="width:60px !important;" disabled name="preuni'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['dimenciones']+'" >'+filaob[fila]['dimenciones']+
                            '</td>'+
                            '<td  class="text-center"> '+ 
                                '<input type="hidden" style="width:40px !important;" disabled name="pcant'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['cantidadP']+'">'+filaob[fila]['cantidadP']+
                            '</td>'+
                             '<td class="text-center"> '+   
                                '<input style="width:60px !important;" width="40px" type="hidden" disabled name="preuni'+filaob[fila]['nomTablero']+'[]" value="'+subt2.toFixed(2)+'" >'+subt2.toFixed(2)+
                            '</td>'+
                            '<td class="text-center"> '+   
                                '<input style="width:40px !important;" width="40px" type="hidden" disabled name="ptotal'+filaob[fila]['nomTablero']+'[]" value="'+subt.toFixed(2) +'">'+subt.toFixed(2)+
                            '</td>'+
                            '<td  class="text-center">'+
                                '<button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs" onclick="eliminar('+filaob[fila]['posiP']+');">'+
                                        '<i class="fas fa-trash"></i>'+
                                '</button>'+
                            '</td>'+
                        '</tr>';  
                    filaob[fila]['fila']=filas;
                    filas="";                                  
                }
            }                    
        }
    }    

    function detalleFilas(){
        // mantiene en la vista las filas cuando se agrega una nueva tabla
        var fil='';
        for (var key in filaob) {                   
            if (filaob.hasOwnProperty(key)) {
                if (filaob[key]['estado']==1 || filaob[key]['estado']==2  ) {
                    fil+=filaob[key]['fila'];
                }
                    
            }
        }
        $('#tablero_unitario').html(fil);
        fil='';
    }
    
    function asignarValores(){
        var pro={!! $proforma !!};
        var nombreClie;
        var apellidoP;
        var apellidoM;
        var direccion;
        var documento;
        var cotiza;
        var formade;
        var plazpOf;
        var obser;
        // var descuento;
        console.log(pro);
        if (editarval==true) {
            for (const key in pro) {
                if (pro.hasOwnProperty(key)) {
                    idProforma=pro[key]['idProforma'];
                    nombreClie=pro[key]['nombres_Rs'];
                    apellidoP=pro[key]['paterno'];
                    apellidoM=pro[key]['materno'];
                    direccion=pro[key]['Direccion'];
                    documento=pro[key]['nro_documento'];
                    var idProd=pro[key]['idProducto'];
                    var idGal=pro[key]['idGalvanizado'];
                    var pname=pro[key]['nombre_producto'];
                    var gname=pro[key]['nombreGalvanizado'];
                    var pdescripcion;
                    tipocam=pro[key]['tipocambio'];
                    simbolo=pro[key]['simboloP'];
                    cotiza=pro[key]['nombre_RE'];
                    if(pro[key]['descripcionDP']==null){
                        pdescripcion='';
                    }else{
                        pdescripcion=pro[key]['descripcionDP'];
                    }
                    var puni=pro[key]['precio_venta'];
                    var preciog=pro[key]['precioGal'];
                    var precicp=pro[key]['precioPin'];
                    var precict=pro[key]['precioTap'];
                    var pcant=pro[key]['cantidad'];
                    var prom=pro[key]['promed'];
                    var esp=pro[key]['espesor'];
                    var me=pro[key]['medidas'];
                    var tra=pro[key]['tramo'];
                    var tap=pro[key]['tapa'];
                    var dim=pro[key]['dimenciones'];
                    var descuento=pro[key]['descuento'];     
                    var estado=parseInt(pro[key]['estadoDB']);  
                    var idDetalleProforma=pro[key]['idDetalle_bandejas'];
                    formade=pro[key]['forma_de'];
                    plazpOf=pro[key]['plazo_oferta'];
                    plazFa=pro[key]['plaza_fabricacion'];
                    obser=pro[key]['observacion_proforma'];
                    garan=pro[key]['garantia']; 
                    inc=pro[key]['incluye']; 
                    obc=pro[key]['observacion_condicion']; 
                    console.log(estado);
                    var dat={idProducto:idProd,idGalvanizado:idGal,producto:pname,galvanizado:gname,medidas:me,descripcionP:pdescripcion,prec_uniP:puni,espesor:esp,cantidadP:pcant,descuentoP:descuento,nomTablero:nomTablero,posiP:contp,fila:"",estado:estado,idDetalleProforma:idDetalleProforma,tramo:tra,tapa:tap,dimenciones:dim,prec_gal:preciog,prec_pin:precicp,prec_tap:precict,promedi:prom};
                    filaob.push(dat);  
                    fila();
                    contp++;               
                }
            }
            document.getElementById('totales-general').style.display = 'block';
            console.log(filaob);
            valoresFinales(); 
            editarval=false;
            // cotizador
            $("#nombreclie").val(nombreClie+" "+apellidoP+" "+apellidoM);
            $("#cdireccion").val(direccion);
            $("#cnro_documento").val(documento);
            $("#cotizador").val(cotiza);

            $("#simbolo").val(simbolo);
            $("#valorcambio").val(tipocam);
            $("#forma_de").val(formade);
            $("#plazo_oferta").val(plazpOf);
            $("#observacion_proforma").val(obser);
            $("#plaza_fabricacion").val(plazFa);
            $("#garantia").val(garan);
            $("#incluye").val(inc);
            $("#observacion_condicion").val(obc);

            
        }
    }
    function subTotal(){
        // la suma de tosos los tableros        
        var sub=0;        
        for (const fila in filaob) {
            if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']==1 || filaob[fila]['estado']==2 && promedio==1 && tapas=='Con tapa') {

                var precioga=parseFloat(filaob[fila]['prec_gal']);
                var preciope=parseFloat(filaob[fila]['prec_pin']);
                var tram=parseFloat(filaob[fila]['tramo']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var preciota=parseFloat(filaob[fila]['prec_tap']);
                
                
                sub+=(((precioga+preciope)*tram)+preciota)-((((precioga+preciope)*tram)+preciota)*0.1)*cantidad;
                
                              
            }else if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']==1 || filaob[fila]['estado']==2 && promedio==1 && tapas=='Sin tapa') {

               var precioga=parseFloat(filaob[fila]['prec_gal']);
                var preciope=parseFloat(filaob[fila]['prec_pin']);
                var tram=parseFloat(filaob[fila]['tramo']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                
                
                
                sub+=((precioga+preciope)*tram)*cantidad;


            }else if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']==1 || filaob[fila]['estado']==2 && promedio==2 && tapas=='Con tapa') {

               var precioga=parseFloat(filaob[fila]['prec_gal']);
                var preciope=parseFloat(filaob[fila]['prec_pin']);
                var tram=parseFloat(filaob[fila]['tramo']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                
                
                
                sub+=((precioga+preciope)*tram)*cantidad;


            }else if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']==1 || filaob[fila]['estado']==2 && promedio==2 && tapas=='Sin tapa') {

               var precioga=parseFloat(filaob[fila]['prec_gal']);
                var preciope=parseFloat(filaob[fila]['prec_pin']);
                var tram=parseFloat(filaob[fila]['tramo']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                
                
                
                sub+=((precioga+preciope)*tram)*cantidad;


            }

        }

        $("#subtotal").html("s/. " + sub.toFixed(2));
    }


   
    function valorVenta(){
        var venta=0;        
        for (const fila in filaob) {
            if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']==1 || filaob[fila]['estado']==2) {
                var precio=parseFloat(filaob[fila]['prec_uniP']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var descuento=parseFloat(filaob[fila]['descuentoP']);
                venta+=(cantidad*precio)-((precio*(descuento/100)*cantidad));
            }
        }
        valorventa=venta.toFixed(2);
        $("#valorVenta").html("s/. " + venta.toFixed(2));
    }
    function igv(){
        var venta=0;   
        var ig=0;     
        for (const fila in filaob) {
            if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']==1 || filaob[fila]['estado']==2) {
                var precio=parseFloat(filaob[fila]['prec_uniP']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var descuento=parseFloat(filaob[fila]['descuentoP']);
                venta+=(cantidad*precio)-((precio*(descuento/100)*cantidad));
            }
        }
        ig=venta*0.18;
        $("#igv").html("s/. " + ig.toFixed(2));
    }
    var boolean_dolar=false;
    function total(){
        var venta=0;   
        var igv=0;  
        var tota=0;   
        
        for (const fila in filaob) {
            if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']==1 || filaob[fila]['estado']==2) {
                var precio=parseFloat(filaob[fila]['prec_uniP']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var descuento=parseFloat(filaob[fila]['descuentoP']);
                venta+=(cantidad*precio)-((precio*(descuento/100)*cantidad));
                boolean_dolar=true;
            }
        }
        igv=venta*0.18;
        tota=venta+igv;
        totalt=tota.toFixed(2);
        totaldolares=(tota/tipocam).toFixed(2);
        // console.log($("#total").html("s/. " + tota.toFixed(2)));    
        $("#total").html("s/. " + tota.toFixed(2));
    }
    function valoresFinales(){
        if(filaob.length>0){
            detalleFilas();
        }
        subTotal();
        descuentos();
        valorVenta();
        igv();
        total();
        cambioMoneda();
    }
    function cambioMoneda(){
        console.log(contp);
        if(filaob.length>0 && boolean_dolar!=true){
            if("$"==simbolo){    
                totaldolares=(totalt/tipocam).toFixed(2);        
                $("#total_dolares").html(simbolo+" " + totaldolares);
            }else{
                $("#total_dolares").html(0);
            }
        }else{
            $("#total_dolares").val(0);
            $("#tota_dolares").val(0);
        }
    }
    function eliminar(index){
        // elimina las filas de un tablero especifico 
        for (var key in filaob) {
            if (filaob.hasOwnProperty(key)) {
                if(index==filaob[key]['posiP']){
                    $("#fila_"+filaob[key]['nomTablero']+'_'+index).remove();
                    // filaob.splice(key,1);         
                    filaob[key]['estado']=0;  
                }
            }
        } 
        console.log(filaob);
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







