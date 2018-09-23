@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<h3>Nueva Proforma </h3>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Datos de Cliente
                        </h3>
                    </div>
                    <div class="panel-body">        
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre del Cliente</label>
                                    <select required name="idClientes" class="form-control selectpicker" id="idClientes" data-live-search="true">
                                        <option value="">Seleccione Cliente</option>
                                        @foreach($clientes as $cliente)
                                            <option value="{{$cliente->idCliente}}_{{$cliente->direccion}}_{{$cliente->nro_documento}}">{{$cliente->nombre}}</option>
                                        @endforeach
                                    </select> 
                                    <button type="button" id="bt_add_Cliente" class="btn btn-primary">Agregar Cliente</button>
                                </div>                               
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group label-floating">
                                    <label for="cdireccion">Direccion</label>
                                    <input type="text" disabled name="cdireccion" id="cdireccion" class="form-control" placeholder="direccion">
                                </div>                               
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group label-floating">
                                    <label for="nro_documento">Numero de Documento</label>
                                    <input type="text" disabled name="cnro_documento" id="cnro_documento" class="form-control" placeholder="numero documento">
                                </div>                               
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group label-floating">
                                    <label for="cliente_empleado">Cliente Empleado</label>
                                    <input type="text"  name="cliente_empleado" id="cliente_empleado"  class="form-control" placeholder="ingrese Empleado">
                                </div>                               
                            </div>
                        </div>
                    </div>            
                </div>
            </div> 
            <div class="col-lg-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Tipo de Cambio
                        </h3>
                    </div>
                    <div class="panel-body">         
                        <div class="col-lg-6">
                            <label>Tipo de cambio</label>
                            <select  name="idTipo_moneda" class="form-control selectpicker" id="idTipo_moneda" data-live-search="true">
                                <option value=""></option>
                                @foreach($monedas as $mo)                
                                    <option value="{{$mo->idTipo_moneda}}_{{$mo->tipo_cambio}}_{{$mo->simbolo}}_{{$mo->impuesto}}">{{$mo->nombre_moneda}}</option>
                                @endforeach  
                            </select>
                        </div>

                        <div class="col-lg-4">
                            <div class="from-group">
                                <label for="simbolo">Simbolo</label>
                                <input type="text" disabled name="simbolo" id="simbolo" class="form-control" >                                                
                            </div>                                        
                        </div>

                        <div class="col-lg-4" >                                            
                            <div class="from-group">
                                <label for="valorcambio">Valor</label>
                                <input type="text" disabled id="valorcambio" class="form-control">                    
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="from-group">
                                <label for="igv_tipocambio">IGV</label>
                                <input type="text" disabled id="igv_tipocambio" class="form-control">                                
                            </div>                                        
                        </div>
                    </div>         
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Ingresar Producto
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group" id="producto-oculto" >
                            <label class="control-label">Producto</label>
                            <select name="pidProducto" class="form-control selectpicker" id="pidProducto" data-live-search="true">
                                <option value="">Seleccione Producto</option>
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->idProducto }}_{{ $producto->productos}}_{{ $producto->precio_unitario }}_{{$producto->descuento_familia}}_{{$producto->codigo_pedido}}">{{ $producto->productos }}</option>
                                @endforeach
                            </select>                    
                        </div>
                        <!-- {!!Form::open(array(route('tablero-store'),'method'=>'POST','autocomplete'=>'off'))!!}
                        @csrf -->
                        <div class="card" id="producto-crear-oculto" >
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- <div class="col-lg-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nombre de Producto</label>
                                            <input type="hidden" id="idProd" name="idProd" disabled>
                                            <input type="text" id="Productoname" class="form-control" name="Productoname" disabled>
                                        </div>                               
                                    </div> -->
                                    <div class="col-lg-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Descripcion</label>
                                            <input type="textarea"  id="descripcionp" class="form-control" name="descripcionp"  >
                                            <!-- <textarea rows="4" cols="50">
                                            
                                            </textarea> -->
                                        </div>
                                    </div> 
                                    <div class="col-lg-2">
                                        <div class="form-group label-floating">
                                            <label class="control-label">P. UNIT.</label>
                                            <input type="number"  id="precio_uni" class="form-control" name="precio_uni"  disabled>
                                        </div>
                                    </div> 
                                    <div class="col-lg-1">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Cantidad</label>
                                            <input type="number" id="Pcantidad" class="form-control" name="Pcantidad" >
                                        </div>
                                    </div> 
                                    <div class="col-sm-2">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Descuento %</label>
                                            <input type="number" id="pdescuento" class="form-control" name="pdescuento" step="any" >
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group label-floating">
                                        <label class="control-label"></label>
                                            <button type="button" id="bt_add_produc" class="btn btn-primary">Agregar</button>
                                        </div>
                                    </div>                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Datos del Vendedor
                        </h3>
                    </div>
                    <div class="panel-body">              
                    </div>            
                </div>
            </div> -->
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Concepto
                        </h3>
                    </div>
                    <div class="panel-body">
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
                                                        <button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs" onclick="eliminarTablero('+cont+');">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <table id="detalle_tablero_Principal" class="table table-striped table-bordered table-condensed table-hover">
                                                                <thead style="background-color:#A9D0F5">
                                                                    <th>Producto</th>
                                                                    <th>Descripción</th>
                                                                    <th>Cant.</th>
                                                                    <th>P. Unit.</th>
                                                                    <th>Descuento</th>
                                                                    <th>Importe</th>
                                                                    <th></th>
                                                                </thead>
                                                                <tbody id="tablero_unitario">
                                                                </tbody>
                                                                <!-- <tfoot>
                                                                    <th>Total</th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th><h4 id="total">s/. 0.00</h4><input type="hidden" name="precio_subtotal_'+nomTablero+'" id="precio_subtotal_'+nomTablero+'">
                                                                    </th>
                                                                </tfoot> -->
                                                            </table>
                                                        </div>
                                                    <div>
                                                </div>                            
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>                
                    </div>            
                </div>
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
                        <div id="totales-general" style='display:none;'>
                            <table class="table table-striped table-bordered table-condensed table-hover">
                                    <tfoot>
                                        <tr>
                                            <th colspan="3" >Sub Total</th>
                                            <th><h4 id="subtotal">s/. 0.00</h4><input type="hidden" name="subtotal" id="subtotal"></th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" >Descuentos</th>
                                            <th><h4 id="descuentos">s/. 0.00</h4><input type="hidden" name="descuentos" id="descuentos"></th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" >Valor Venta</th>
                                            <th><h4 id="valorVenta">s/. 0.00</h4><input type="hidden" name="valorVenta" id="valorVenta"></th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" >I.G.V. 18%</th>
                                            <th><h4 id="igv">s/. 0.00</h4><input type="hidden" name="igv" id="igv"></th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" >Total Soles</th>
                                            <th><h4 id="total">s/. 0.00</h4><input type="hidden" name="precio_subtotal" id="precio_subtotal"></th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" >Total Dolares</th>
                                            <th><h4 id="total_dolares">s/. 0.00</h4><input type="hidden" name="tota_dolares" id="tota_dolares"></th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" >Forma de:</th>
                                            <th>
                                            <h4><input type="text" name="forma_de" id="forma_de" class="form-control"></h4>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" >Plazo de Oferta:</th>
                                            <th>
                                            <h4><input type="date" name="plazo_oferta" id="plazo_oferta" class="form-control"></h4>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" >Observacion:</th>
                                            <th>
                                            <textarea name="observacion_condicion" id="observacion_condicion" class="form-control"></textarea>
                                            </th>
                                        </tr>
                                        
                                    </tfoot>
                            </table>                            
                        </div>
                    </div>                     
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">  
    <div style="margin-top: 20px" class="from-group ">

        <button class="btn btn-primary" id="save" type="button">Guardar</button>
        <button class="btn btn-danger" type="reset">Limpiar</button>
        <button style="margin-left: 300px" class="btn btn-success " type="button"><a style="color: white!important" href="">volver</a></button>


    </div>

    </div>


    <!-- {!!Form::close()!!} -->

</div>

@push('scripts')
<script>
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
    $("#pidProducto").change(MostarProducto);

    $("#idTipo_moneda").change(cambioMoneda);

    function cambiaropcion(){
        Producto=document.getElementById('pidProducto').value.split('_');
        var codigo_pedido=Producto[4];
       if(codigo_pedido=="t1"){
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
        $("#precio_uni").val(Producto[2]);
        $("#pdescuento").val(Producto[3]);
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
        var observacion=$("#observacion_condicion").val();
        
        if(valorventa>0 && totalt>0 && idtipocam!='' && valorcambio!='' && typeof(idcliente)!='undefined' && idcliente!='null' ){
            var dat=[{nomTablero:nomTablero,idcliente:idcliente,valorVenta:valorventa,total:totalt,totaldolares:totaldolares,idTipoCambio:idtipocam,valorTipoCambio:valorcambio,forma:forma,plazo:plazo,observacion:observacion,clienteemp:clienteemp,simbolo:simbolo}];
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
        var idProd=Producto[0];
        var pname=Producto[1];
        var pdescripcion=$("#descripcionp ").val();
        var puni=$('#precio_uni').val();
        var pcant=$('#Pcantidad').val();
        var descuento=$('#pdescuento').val();
        var filas;
        if(nomTablero!="" && idProd!="" && pname!="" && puni!="" && pcant!="" && descuento!="" && typeof(tipocam)!='undefined' && tipocam!='null' && tipocam!='' ){
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
                var dat={idProducto:idProd,producto:pname,descripcionP:pdescripcion,prec_uniP:puni,cantidadP:pcant,descuentoP:descuento,nomTablero:nomTablero,posiP:contp,fila:""};
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
                        '<tr class="selected" id="fila_'+filaob[fila]['nomTablero']+'_'+filaob[fila]['posiP']+'">'+
                            '<td> '+ 
                                '<input type="hidden" name="idpod_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['idProducto']+'">'+filaob[fila]['producto']+
                            '</td>'+
                            '<td> '+ 
                                '<input type="hidden" name="descri_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['descripcionP']+'">'+filaob[fila]['descripcionP']+
                            '</td>'+
                            '<td> '+ 
                                '<input type="number" disabled name="pcant'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['cantidadP']+'">'+
                            '</td>'+
                            '<td> '+   
                                '<input type="number" disabled name="preuni'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['prec_uniP']+'" >'+
                            '</td>'+
                            '<td> '+   
                                '<input type="number" disabled name="pdescu'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['descuentoP']+'" >'+
                            '</td>'+
                            '<td> '+   
                                '<input type="number" disabled name="ptotal'+filaob[fila]['nomTablero']+'[]" value="'+subt.toFixed(2) +'">'+
                            '</td>'+
                            '<td>'+
                                '<button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs" onclick="eliminar('+filaob[fila]['posiP']+');">'+
                                        '<i class="fas fa-trash"></i>'+
                                '</button>'+
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
            if (filaob.hasOwnProperty(fila)) {
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
            if (filaob.hasOwnProperty(fila)) {
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
            if (filaob.hasOwnProperty(fila)) {
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
            if (filaob.hasOwnProperty(fila)) {
                var precio=parseFloat(filaob[fila]['prec_uniP']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var descuento=parseFloat(filaob[fila]['descuentoP']);
                venta+=(cantidad*precio)-((precio*(descuento/100)*cantidad));
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
            if (filaob.hasOwnProperty(fila)) {
                var precio=parseFloat(filaob[fila]['prec_uniP']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var descuento=parseFloat(filaob[fila]['descuentoP']);
                venta+=(cantidad*precio)-((precio*(descuento/100)*cantidad));
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
        descuentos();
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







