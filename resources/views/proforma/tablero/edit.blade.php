@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<h3>Nueva Proforma de tableros</h3>
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
                                    <input type="text" disabled name="NombreClie" id="NombreClie" class="form-control" placeholder="Nombre">
                                </div>                               
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group label-floating">
                                    <label for="cdireccion">Direccion</label>
                                    <input type="text" disabled name="cdireccion" id="cdireccion" class="form-control" placeholder="direccion">
                                </div>                               
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group label-floating">
                                    <label for="nro_documento">Numero de Documento</label>
                                    <input type="text" disabled name="cnro_documento" id="cnro_documento" class="form-control" placeholder="numero documento">
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
                            Ingresar Nombre de Tablero
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="NomTablerop" id="NomTablerop" placeholder="Ingresar nombre del tablero...">
                                <samp class="input-group-btn">
                                    <button type="button" id="bt_add_tablero" class="btn btn-primary">
                                        Agregar
                                    </button>
                                </samp>
                            </div>
                        </div>
                        <div class="form-group" id="producto-oculto">
                            <label class="control-label">Producto</label>
                            <select name="pidProducto" class="form-control selectpicker" id="pidProducto" data-live-search="true">
                                <option value="">Seleccione Producto</option>
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->idProducto }}_{{ $producto->nombre_producto }}_{{ $producto->precio_unitario }}_{{$producto->descuento_familia}}">{{ $producto->nombre_producto }}</option>
                                @endforeach
                            </select>                    
                        </div>
                        <div class="card" id="producto-crear-oculto">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
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
                                    <div class="col-sm-2">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nom.Tablero</label>
                                            <!-- <input type="text" id="NomTablero" class="form-control" name="NomTablero" > -->
                                            <div id="select-pro" ></div>
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
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Concepto
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div id="tablerosn">                            
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
                        <div id="totales-general">
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
                                            <th colspan="3" >Total</th>
                                            <th><h4 id="total">s/. 0.00</h4><input type="hidden" name="precio_subtotal" id="precio_subtotal"></th>
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
</div>
@push('scripts')
<script>    
    $(document).ready(function(){
        $('#bt_add_tablero').click(function(){
            agregarTablero();
            valoresFinales();
        });
        $('#save').click(function(){
            // console.log("asd");
            saveProforma();
        });
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
    });
    $("#idClientes").change(MostrarCliente);
    $("#idTipo_moneda").change(mostrarTipoCambio);
    var tablero=[];
    var filaob=[];
    var cont=0;
    var contp=0;
    var table;
    var subtotal=0;
    var nomTablero;
    var idcliente;
    var totalt;
    var valorventa;
    var idProfo;
    
    $("#pidProducto").change(MostarProducto);
    // variables para asignar valores    
    var editarval=true;
    asignarValores();
    function asignarValores(){
        var pro={!! $proforma !!};
        var tabl={!! $tablero !!};
        console.log(tabl);
        for (const tab in tabl) {
            nomTablero=tabl[tab]['nombre_tablero'];
            var esta=tabl[tab]['estadoT'];
            table='<div id="'+nomTablero+'_'+cont+'">'+
                                '<section class="content" style="min-height:0px !important">'+
                                    '<div class="row">'+
                                        '<div class="col-md-12">'+
                                            '<div class="box">'+
                                                '<div class="box-header with-border" style="padding:5px !important;">'+
                                                '<p> Tablero ' +nomTablero.replace(/_/gi," ")+'</p>'+
                                                    '<div class="box-tools pull-right">'+

                                                        '<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>'+
                                                        '<button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs" onclick="eliminarTablero('+cont+');">'+
                                                                        '<i class="fa fa-times"></i>'+
                                                                '</button>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="box-body">'+
                                                    '<div class="row">'+
                                                        '<div class="col-md-12">'+
                                                            '<table id="detalle_'+nomTablero+'_Principal" class="table table-striped table-bordered table-condensed table-hover">'+
                                                                '<thead style="background-color:#A9D0F5">'+
                                                                    '<th>Producto</th>'+
                                                                    '<th>Descripción</th>'+
                                                                    '<th>Cant.</th>'+
                                                                    '<th>P. Unit.</th>'+
                                                                    '<th>Descuento</th>'+
                                                                    '<th>Importe</th>'+
                                                                    //'<th></th>'+
                                                                '</thead>'+
                                                                '<tbody id="detalle_'+nomTablero+'">'+
                                                                '</tbody>'+ 
                                                                '<tfoot>'+
                                                                    '<th>Total</th>'+
                                                                    '<th></th>'+
                                                                    '<th></th>'+
                                                                    '<th></th>'+
                                                                    '<th></th>'+
                                                                    '<th><h4 id="total_'+nomTablero+'">s/. 0.00</h4><input type="hidden" name="precio_subtotal_'+nomTablero+'" id="precio_subtotal_'+nomTablero+'">'+
                                                                    '</th>'+
                                                                '</tfoot>'+
                                                            '</table>'+
                                                        '</div>'+
                                                    '<div>'+
                                                '</div>'+                                
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</section>'+
                            '</div>';
            
            var ta={nombre:nomTablero,posi:cont,tablero:table,estado:esta}
            tablero.push(ta);
            cont++;
        }
        nomTablero="";
        ListaSelect();
        // console.log(pro); 
        for (const dtp in pro) {
            idprofo=pro[dtp]['idProforma'];
            var idProd=pro[dtp]['idProducto'];
            var pname=pro[dtp]['nombre_producto'];
            var pdescripcion
            if(pro[dtp]['descripcionDP']==null){
                pdescripcion='';
            }else{
                pdescripcion=pro[key]['descripcionDP'];
            }
            var puni=pro[dtp]['precio_venta'];
            var pcant=pro[dtp]['cantidad'];
            var descuento=pro[dtp]['descuento'];
            var nomTabl=pro[dtp]['nombre_tablero'];
            var idDetaTab=pro[dtp]['idDetalle_tableros'];
            var estado=pro[dtp]['estadoDP'];
            var dat={idDetalleTablero:idDetaTab,idProducto:idProd,producto:pname,descripcionP:pdescripcion,prec_uniP:puni,cantidadP:pcant,descuentoP:descuento,nomTablero:nomTabl,posiP:contp,estado:estado,fila:""};
            filaob.push(dat);
            fila();
            contp++;
        }
        valoresFinales();  
        // console.log(pro); 
    }

    //$("#bt_add_tablero").change($("#total").html("s/. " + subtotal));
    function MostrarCliente(){
        // cdireccion/cnro_documentoidClientes
        Cliente=document.getElementById('idClientes').value.split('_');
        idcliente=Cliente[0];
        $("#cdireccion").val(Cliente[1]);
        $("#cnro_documento").val(Cliente[2]);
    }
    function MostarProducto(){
        Producto=document.getElementById('pidProducto').value.split('_');
        // $("#idProd").val(Producto[0]);
        // $("#Productoname").val(Producto[1]);
        $("#precio_uni").val(Producto[2]);
        $("#pdescuento").val(Producto[3]);
        // descuentoP -->para emostar el 
    }
    function mostrarTipoCambio(){
        $("#simbolo").val(tipoCambio[2]);
        $("#valorcambio").val(tipoCambio[1]);
        $("#igv_tipocambio").val(tipoCambio[3]+ " %");

    }
    function mostrarcampos(){
        document.getElementById('producto-crear-oculto').style.display = 'block';
        document.getElementById('producto-oculto').style.display = 'block';
        // $("#producto-crear-oculto").style.display='block';
        // $("#producto-oculto").style.display='block';
    } 

    function saveProforma(){
        // se enviar los datos al controlador proforma tableros
        // console.log(idcliente);
        // tipoCambio=document.getElementById('idTipo_moneda').value.split('_');
        // var idtipocam=tipoCambio[0];
        // var valorcambio=tipoCambio[1];
        // var vVenta=$("#valorVenta").val();
        // var tl=$("#total").val();
        // console.log(tablero,filaob);
        // if(valorventa>0 && totalt>0 && idtipocam!='' && valorcambio!='' && typeof(idcliente)!='undefined' && idcliente!='null' ){
            var dat=[{idProforma:idprofo,idcliente:idcliente,valorVenta:valorventa,total:totalt}];
            // console.log(dat,tablero,filaob);
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:  {tableros:tablero,filas:filaob,datos:dat}, //datos que se envian a traves de ajax
                url:   'update', //archivo que recibe la peticion
                type:  'post', //método de envio
                dataType: "json",//tipo de dato que envio 
                beforeSend: function () {
                    // console.log()
                        // $("#resultado").html("Procesando, espere por favor...");
                },
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
        // }else {
        //     alert('ingrese productos al tablero!!');
        // }
    }
    var bool;
    function agregarTablero(){    
        var tabl=$("#NomTablerop").val();
        nomTablero=tabl.replace(/ /gi,"_");  
        bool=false;  
        if(tabl!='' && $("#simbolo").val()!='' && $("#valorcambio").val()!='' && $("#igv_tipocambio").val()!='' ){
            mostrarcampos();
            // fila();
            if(tablero.length>=0 && nomTablero!=""){
                //for para evitar tablas con el  mismo nombre sin iportar las mayusculas o minisculas
                for (const key in tablero) {
                    if (tablero.hasOwnProperty(key)) {
                        if(tablero[key]['nombre'].toLowerCase()==nomTablero.toLowerCase()){
                            bool=true; 
                        }                                       
                    }
                }
                //if que compara e inserta la tabla contenedora de los produtos vacia.
                if(bool==false ){  
                    table='<div id="'+nomTablero+'_'+cont+'">'+
                                '<section class="content" style="min-height:0px !important">'+
                                    '<div class="row">'+
                                        '<div class="col-md-12">'+
                                            '<div class="box">'+
                                                '<div class="box-header with-border" style="padding:5px !important;">'+
                                                '<p> Tablero ' +nomTablero.replace(/_/gi," ")+'</p>'+
                                                    '<div class="box-tools pull-right">'+

                                                        '<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>'+
                                                        '<button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs" onclick="eliminarTablero('+cont+');">'+
                                                                        '<i class="fa fa-times"></i>'+
                                                                '</button>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="box-body">'+
                                                    '<div class="row">'+
                                                        '<div class="col-md-12">'+
                                                            '<table id="detalle_'+nomTablero+'_Principal" class="table table-striped table-bordered table-condensed table-hover">'+
                                                                '<thead style="background-color:#A9D0F5">'+
                                                                    '<th>Producto</th>'+
                                                                    '<th>Descripción</th>'+
                                                                    '<th>Cant.</th>'+
                                                                    '<th>P. Unit.</th>'+
                                                                    '<th>Descuento</th>'+
                                                                    '<th>Importe</th>'+
                                                                    //'<th></th>'+
                                                                '</thead>'+
                                                                '<tbody id="detalle_'+nomTablero+'">'+
                                                                '</tbody>'+ 
                                                                '<tfoot>'+
                                                                    '<th>Total</th>'+
                                                                    '<th></th>'+
                                                                    '<th></th>'+
                                                                    '<th></th>'+
                                                                    '<th></th>'+
                                                                    '<th><h4 id="total_'+nomTablero+'">s/. 0.00</h4><input type="hidden" name="precio_subtotal_'+nomTablero+'" id="precio_subtotal_'+nomTablero+'">'+
                                                                    '</th>'+
                                                                '</tfoot>'+
                                                            '</table>'+
                                                        '</div>'+
                                                    '<div>'+
                                                '</div>'+                                
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</section>'+
                            '</div>';
                var ta={nombre:nomTablero,posi:cont,tablero:table,estado:2 }
                tablero.push(ta);                        
                } cont++;       
            }
            // console.log(table);
            nomTablero="";
            // realiza el listado de todas los tableros que se añaden
            ListaSelect()
            // mantiene en la vista las filas cuando se agrega una nueva tabla
            detalleFilas();
            // fila();
            //nomtablero="";
        }else{
            // (tabl!='' && $("#simbolo").val()!='' && $("#valorcambio").val()!='' && $("#igv_tipocambio").val()!=''
            if($("#simbolo").val()=='' && $("#valorcambio").val()=='' && $("#igv_tipocambio").val()==''){
                alert("seleccione un tipo de Moneda");
            }else if(tabl==''){
                alert("ingrese nombre del Tablero");
            }            
        }
        
    }
    function agregarProductosTablero(){    
        Producto=document.getElementById('pidProducto').value.split('_');
        var idProd=Producto[0];
        var pname=Producto[1];
        var pdescripcion=$("#descripcionp ").val();
        var puni=$('#precio_uni').val();
        var pcant=$('#Pcantidad').val();
        var sel=$('#prod-selec').val();
        var descuento=$('#pdescuento').val();
        // console.log(descuento);
        nomTablero=$('#prod-selec').val();
        var filas;
        // console.log(idProd,pname);
        if(tablero.length>=0 && nomTablero!="" && idProd!="" && pname!="" && puni!="" && pcant!="" && nomTablero!="" && descuento!="" ){
            // document.getElementById('totales-general').style.display = 'block';
            var bool=false;
            var boolfila=false;
            for (const key in tablero) {
                if (tablero.hasOwnProperty(key)) {
                    if(tablero[key]['nombre']==nomTablero){
                        bool=true;
                        for (const fil in filaob) {
                            if (filaob.hasOwnProperty(fil)) {
                                if(filaob[fil]['nomTablero']==nomTablero && filaob[fil]['idProducto']==idProd && filaob[fil]['nomTablero']==tablero[key]['nombre']){
                                    var su=parseInt(pcant);
                                    var des=parseInt(descuento);
                                    filaob[fil]['cantidadP']=su;
                                    filaob[fil]['descuentoP']=des;
                                    filaob[fil]['descripcionP']=pdescripcion;
                                    fila();
                                    boolfila=true;
                                    console.log("Actualizar producto");                      
                                }                
                            }
                        }
                        if(boolfila==false){
                            console.log("produc nuevoo",contp);
                            var dat={idProducto:idProd,producto:pname,descripcionP:pdescripcion,prec_uniP:puni,cantidadP:pcant,descuentoP:descuento,nomTablero:nomTablero,posiP:contp,estado:2,fila:""};
                            filaob.push(dat);
                            fila();
                            contp++;
                            

                        }
                    }                    
                }
            }
            // detalleFilas();
            valoresFinales();
            // console.log(filaob);            
            nomtablero="";            
        }else{
            alert("Ingresar Datos del Producto!!");
        }
    }
    function fila(){
        // realiza la insercion de las filas agregadas actualizando los importes y las cantidaddes
        if(filaob.length>0){
            var filas;
            // console.log(filaob.length+ " --> ");
            for (const key in tablero) {
                if (tablero.hasOwnProperty(key) && tablero[key]['estado']==1) {
                    // $("#detalle_"+tablero[key]['nombre']).load();
                    for (const fila in filaob) {
                        if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']==1) {                            
                            var cantidad=parseFloat(filaob[fila]['cantidadP']);
                            var precio=parseFloat(filaob[fila]['prec_uniP']);
                            var descuento=parseFloat(filaob[fila]['descuentoP']);
                            var subt=(cantidad*precio)-((precio*(descuento/100)*cantidad));
                            if(tablero[key]['nombre']==filaob[fila]['nomTablero']){
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
                                            '<input type="number" disabled name="ptotal'+filaob[fila]['nomTablero']+'[]" value="'+subt +'">'+
                                        '</td>'+
                                        '<td>'+
                                            '<button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs" onclick="eliminar('+filaob[fila]['posiP']+');">'+
                                                    '<i class="fas fa-trash"></i>'+
                                            '</button>'+
                                        '</td>'+
                                    '</tr>';  
                                    filaob[fila]['fila']=filas;
                                    // console.log(filas);
                                    filas="";
                            }                                                         
                        }
                    }                    
                }
            }
        }
    }    
    function ListaSelect(){
        // realiza el listado de todas los tableros que se añaden
        var tab;    
        var selectop;
        if(tablero.length>0){
            for (const pro in tablero) {
                if (tablero.hasOwnProperty(pro) && tablero[pro]['estado']==1) {
                    selectop+='<option value="'+tablero[pro]['nombre']+'">'+tablero[pro]['nombre'].replace(/_/gi," ")+'</option>';                            
                }
            }
            var selec='<select name="prod-selec" id="prod-selec"  >'+
                            // '<option value="">Seleccione...</option>'+
                            selectop+
                      '</select>';
            $('#select-pro').html(selec);
            for (var keyt in tablero) {
                tab+=tablero[keyt]['tablero'];
            }
            $('#tablerosn').html(tab);
        }
    }
    function detalleFilas(){
        // mantiene en la vista las filas cuando se agrega una nueva tabla
        // var dat={idProducto:idProd,producto:pname,prec_uniP:puni,cantidadP:pcant,descuentoP:descuento,nomTablero:nomTablero,posiP:contp};
        // fila(); 
        var fil;
        if(tablero.length>0){
            for (var keyt in tablero) {
                //  $("#detalle_"+tablero[keyt]['nombre']).load();
                $("#detalle_"+tablero[keyt]['nombre']).val('');  
                for (var key in filaob) {                   
                    if (filaob.hasOwnProperty(key) && filaob[key]['estado']==1 ) {
                        if(tablero[keyt]['nombre']==filaob[key]['nomTablero']){
                            fil+=filaob[key]['fila'];
                        }
                    }
                }
                $('#detalle_'+tablero[keyt]['nombre']).html(fil);
                fil='';
            }
        }else{
            $('#detalle_'+tablero[keyt]['nombre']).html('');
        }
        // subTotalTable();
    }
    function subTotalTable(){
        // funcion para realizar la suma del sub total de todos los tableros que se declaran
        var sub=0;
        if(tablero.length>0){
            for (const key in tablero) {
                if (tablero.hasOwnProperty(key) && tablero[key]['estado']==1) {
                    for (const fila in filaob) {
                        if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']==1) {
                            if(tablero[key]['nombre']==filaob[fila]['nomTablero']){
                                // (cantidad*precio)-((cantidad*precio)*(cantidad*(descuento/100)));
                                var precio=parseFloat(filaob[fila]['prec_uniP']);
                                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                                var descuento=parseFloat(filaob[fila]['descuentoP']);
                                sub+=(cantidad*precio)-((precio*(descuento/100)*cantidad));
                                // console.log(sub,"---");
                            }                            
                        }
                    }   
                    // console.log(sub);
                    $("#total_"+tablero[key]['nombre']).html("s/. " + sub);                 
                }
                sub=0;
            }            
        }
    }
    function subTotal(){
        // la suma de tosos los tableros        
        var sub=0;        
        for (const fila in filaob) {
            if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']==1) {
                var precio=parseFloat(filaob[fila]['prec_uniP']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var descuento=parseFloat(filaob[fila]['descuentoP']);
                // var subt=(cantidad*precio)-((precio*(descuento/100)*cantidad));
                sub+=cantidad*precio;
                // console.log(sub);                        
            }
        }
        // console.log(sub);
        $("#subtotal").html("s/. " + sub.toFixed(2));
    }
    function descuentos(){
        var desc=0;
        for (const fila in filaob) {
            if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']==1) {
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
            if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']==1) {
                var precio=parseFloat(filaob[fila]['prec_uniP']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var descuento=parseFloat(filaob[fila]['descuentoP']);
                // var subt=(cantidad*precio)-((precio*(descuento/100)*cantidad));
                venta+=(cantidad*precio)-((precio*(descuento/100)*cantidad));
                // console.log(sub);                        
            }
        }
        valorventa=venta.toFixed(2);
        // console.log(sub);
        $("#valorVenta").html("s/. " + venta.toFixed(2));
    }
    function igv(){
        var venta=0;   
        var ig=0;     
        for (const fila in filaob) {
            if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']==1) {
                var precio=parseFloat(filaob[fila]['prec_uniP']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var descuento=parseFloat(filaob[fila]['descuentoP']);
                // var subt=(cantidad*precio)-((precio*(descuento/100)*cantidad));
                venta+=(cantidad*precio)-((precio*(descuento/100)*cantidad));
                // console.log(sub);                        
            }
        }
        ig=venta*0.18;
        // console.log(sub);
        $("#igv").html("s/. " + ig.toFixed(2));
    }
    function total(){
        var venta=0;   
        var igv=0;  
        var tota=0;   
        for (const fila in filaob) {
            if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']==1) {
                var precio=parseFloat(filaob[fila]['prec_uniP']);
                var cantidad=parseFloat(filaob[fila]['cantidadP']);
                var descuento=parseFloat(filaob[fila]['descuentoP']);
                // var subt=(cantidad*precio)-((precio*(descuento/100)*cantidad));
                venta+=(cantidad*precio)-((precio*(descuento/100)*cantidad));
                // console.log(sub);                        
            }
        }
        igv=venta*0.18;
        tota=venta+igv;
        totalt=tota.toFixed(2);
        // console.log(sub);
        $("#total").html("s/. " + tota.toFixed(2));
    }
    function valoresFinales(){
        if(filaob.length>0){
            detalleFilas();
        }
        subTotal();
        subTotalTable();
        descuentos();
        valorVenta();
        igv();
        total();
    }
    function eliminar(index){
        // elimina las filas de un tablero especifico 
        // console.log(filaob,"eliminar",index);
        for (var key in filaob) {
            if (filaob.hasOwnProperty(key)) {
                if(index==filaob[key]['posiP']){
                    console.log(filaob[key]['nomTablero'],"eliminar");
                    $("#fila_"+filaob[key]['nomTablero']+'_'+index).remove();
                    // filaob.splice(key,1);
                    filaob[key]['estado']=0;  
                    // console.log(filaob);                            
                }
            }
        } 
        valoresFinales();
    }
    function eliminarTablero(a){
    // elimina todo un tablero con todos los datos que contiene
        for (const key in tablero) {
            if (tablero.hasOwnProperty(key)) {
                if(a==tablero[key]['posi']){
                    //console.log(a);        
                    //console.log(tablero);
                    for (var k in filaob) {
                        if (filaob.hasOwnProperty(k)) {
                            if(tablero[key]['nombre']==filaob[k]['nomTablero']){
                                // console.log("encontrado");
                                // filaob.splice(k,1);
                                filaob[k]['estado']=0;  
                            }
                        }
                    }   
                    $("#"+tablero[key]['nombre']+'_'+tablero[key]['posi']).remove();                      
                    // tablero.splice(key,1);     
                    tablero[key]['estado']=0;              
                }              
            }
        }
        detalleFilas();
        ListaSelect();
        valoresFinales()
    }
    function ocultar(){
        tablero.length>0
        if (0<tablero.length && 0<filaob){
            
        }
    }
</script>
@endpush
@endsection