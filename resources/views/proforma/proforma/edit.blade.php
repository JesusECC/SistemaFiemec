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
                        <button  class="btn btn-success btn-sm " type="button"><a style="color: white!important;text-decoration: none" href="{{url('proformas')}}"><i class="fas fa-reply-all"></i> Volver</a></button>
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
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <select name="pidProducto" class="form-control selectpicker" id="pidProducto" data-live-search="true" style="font-size: 10px !important">
                                                    <option value="">Seleccione Producto</option>
                                                    @foreach($productos as $producto)
                                                        <option value="{{ $producto->idProducto }}_{{ $producto->nombre_producto }}_{{ $producto->precio_unitario }}_{{$producto->descuento_familia}}">{{ $producto->nombre_producto }}</option>
                                                    @endforeach
                                                </select>     
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="textarea"  id="descripcionp" class="form-control" name="descripcionp"  placeholder="Ingrese una Descripción" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="input-group">
                                                <span class="input-group-addon">S/.</span>
                                                <input type="number"  id="precio_uni" class="form-control" name="precio_uni"  disabled placeholder="Precio Unitario">
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="number" id="Pcantidad" class="form-control" name="Pcantidad" placeholder="Cant.">
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="number" id="pdescuento" class="form-control" name="pdescuento" step="any" placeholder="Desc.">
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
                                                            <p> Proforma Unitaria </p>
                                                                <div class="box-tools pull-right">
                                                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="box-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <table id="detalle_tablero_Principal" class="table table-striped table-bordered table-condensed table-hover">
                                                                            <thead style="background-color:#A9D0F5;text-align: center;" >
                                                                                <th class="text-center">Producto</th>
                                                                                <th class="text-center">Descripción</th>
                                                                                <th class="text-center">Cant.</th>
                                                                                <th class="text-center">P. Unit.</th>
                                                                                <th class="text-center">Desc.</th>
                                                                                <th class="text-center">Importe</th>
                                                                                <th class="text-center">Opcción</th>
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
                                                                    <label for="" class="control-label">Plazo de Oferta</label>
                                                                    <input type="date" name="plazo_oferta" id="plazo_oferta" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="" class="control-label">
                                                                        Observaciones
                                                                    </label>
                                                                    <textarea name="observacion_proforma" id="observacion_proforma" cols="30" rows="2" class="form-control">Ninguna</textarea>
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
    function MostarProducto(){
        Producto=document.getElementById('pidProducto').value.split('_');
        $("#precio_uni").val(Producto[2]);
        $("#pdescuento").val(Producto[3]);
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
        var idProd=Producto[0];
        var pname=Producto[1];
        var pdescripcion=$("#descripcionp ").val();
        var puni=parseFloat($('#precio_uni').val());
        var pcant=parseInt($('#Pcantidad').val());
        var descuento=parseFloat($('#pdescuento').val());
        var filas;
        if(nomTablero!="" && idProd!="" && pname!="" && puni!="" && pcant!="" && descuento!=""  ){
            document.getElementById('totales-general').style.display = 'block';
            var bool=false;
            var boolfila=false;
            bool=true;
            for (const fil in filaob) {
                if (filaob.hasOwnProperty(fil)) {
                    if(filaob[fil]['nomTablero']==nomTablero && filaob[fil]['idProducto']==idProd){
                        var su=parseInt(pcant);
                        var des=parseInt(descuento);
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
                var dat={idProducto:idProd,producto:pname,descripcionP:pdescripcion,prec_uniP:puni,cantidadP:pcant,descuentoP:descuento,nomTablero:nomTablero,posiP:contp,fila:"",estado:2,idDetalleProforma:''};
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
                    var descuento=parseFloat(filaob[fila]['descuentoP']);
                    var subt=(cantidad*precio)-((precio*(descuento/100)*cantidad));
                    filas=
                        '<tr class="selected text-center" id="fila_'+filaob[fila]['nomTablero']+'_'+filaob[fila]['posiP']+'" style="width:100%;">'+
                            '<td class="text-center"> '+ 
                                '<input style="width: 70px !important;" type="hidden" name="idpod_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['idProducto']+'">'+filaob[fila]['producto']+
                            '</td>'+
                            '<td class="text-center"> '+ 
                                '<input style="width:40px !important;" type="hidden" name="descri_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['descripcionP']+'">'+filaob[fila]['descripcionP']+
                            '</td>'+
                            '<td  class="text-center"> '+ 
                                '<input type="number" style="width:40px !important;" disabled name="pcant'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['cantidadP']+'">'+
                            '</td>'+
                            '<td  class="text-center"> '+   
                                '<input type="number" style="width:60px !important;" disabled name="preuni'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['prec_uniP']+'" >'+
                            '</td>'+
                            '<td  class="text-center"> '+   
                                '<input type="number"  style="width:40px !important;" disabled name="pdescu'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['descuentoP']+'" >'+
                            '</td>'+
                            '<td  class="text-center"> '+   
                                '<input type="number" style="width:60px !important;" width="40px" disabled name="ptotal'+filaob[fila]['nomTablero']+'[]" value="'+subt.toFixed(2) +'">'+
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
                    var pname=pro[key]['nombre_producto'];
                    var pdescripcion;
                    tipocam=pro[key]['tipocambio'];
                    simbolo=pro[key]['simboloP'];
                    cotiza=pro[key]['cliente_empleado'];
                    if(pro[key]['descripcionDP']==null){
                        pdescripcion='';
                    }else{
                        pdescripcion=pro[key]['descripcionDP'];
                    }
                    var puni=pro[key]['precio_venta'];
                    var pcant=pro[key]['cantidad'];
                    var descuento=pro[key]['descuento'];     
                    var estado=parseInt(pro[key]['estadoDP']);  
                    var idDetalleProforma=pro[key]['idDetalle_proforma'];
                    formade=pro[key]['forma_de'];
                    plazpOf=pro[key]['plazo_oferta'];
                    obser=pro[key]['observacion_proforma']; 
                    console.log(estado);
                    var dat={idProducto:idProd,producto:pname,descripcionP:pdescripcion,prec_uniP:puni,cantidadP:pcant,descuentoP:descuento,nomTablero:nomTablero,posiP:contp,fila:"",estado:estado,idDetalleProforma:idDetalleProforma};
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
            $("#observacion").val(obser);

            
        }
    }
    function subTotal(){
        // la suma de tosos los tableros        
        var sub=0;        
        for (const fila in filaob) {
            if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']==1 || filaob[fila]['estado']==2) {
                var precio=parseFloat(filaob[fila]['prec_uniP']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var descuento=parseFloat(filaob[fila]['descuentoP']);
                sub+=cantidad*precio;              
            }
        }
        $("#subtotal").html("s/. " + sub.toFixed(2));
    }
    function descuentos(){
        var desc=0;
        for (const fila in filaob) {
            if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']==1 || filaob[fila]['estado']==2) {
                var precio=parseFloat(filaob[fila]['prec_uniP']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var descuento=parseFloat(filaob[fila]['descuentoP']);
                desc+=((precio*(descuento/100)*cantidad));                       
            }
        }
        $("#descuentos").html("s/. "+desc.toFixed(2));
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
                totaldolares=(tota/tipocam).toFixed(2);
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







