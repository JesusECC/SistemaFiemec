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
        <li class="active">Nueva Proforma Tableros</li>
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
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <select required name="idClientes" class="form-control selectpicker" id="idClientes" data-live-search="true">
                                                    <option value="">Seleccione Cliente</option>
                                                    @foreach($clientes as $cliente)
                                                    <option value="{{$cliente->idCliente}}_{{$cliente->direccion}}_{{$cliente->nro_documento}}">{{$cliente->nombres_Rs.' '.$cliente->paterno.' '.$cliente->materno}}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="button" id="bt_add_Cliente" class="btn btn-create"><a style="color: white!important;text-decoration: none" href="{{url('cliente/create')}}"><i class="fas fa-user-plus"></i> Add Cliente</button></a>
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
                                                <select required name="cliente_empleado" class="form-control selectpicker" id="cliente_empleado" data-live-search="true">
                                                    <option value="">Seleccione Representante</option>
                                                    @foreach($representante as $re)
                                                    <option value="{{$re->idCR}}">{{$re->nombre_RE}}</option>
                                                    @endforeach
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
                                            Ingresar el Nombre de Tablero
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="NomTablerop" id="NomTablerop" placeholder="Ingresar nombre del tablero...">
                                                <samp class="input-group-btn">
                                                    <button id="bt_add_tablero" class="btn btn-primary" >
                                                        <i class="fas fa-plus"></i> Agregar
                                                    </button>
                                                </samp>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="producto-crear-oculto" style="display:none;margin-top:20px">
                                        <div class="col-sm-12">
                                            <div class="">
                                                <label for="" class="control-label">Producto</label>
                                                <select name="pidProducto" class="form-control selectpicker" id="pidProducto" data-live-search="true">
                                                    <option value="" selected="" disabled="">Seleccione Producto</option>
                                                    @foreach($productos as $producto)
                                                    <option value="{{ $producto->idProducto }}_{{ $producto->nombre_producto }}_{{ $producto->precio_unitario }}_{{$producto->descuento_familia}}">{{ $producto->codigo_producto.' | '.$producto->nombre_producto.' | '.$producto->marca_producto.' | '.$producto->descripcion_producto}}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="col-lg-3" style="margin-top:20px">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Descripcion</label>
                                                <input type="textarea"  id="descripcionp" class="form-control" name="descripcionp"  >
                                            </div>
                                        </div> 
                                        <div class="col-lg-2" style="margin-top:20px">
                                            <div class="form-group label-floating">
                                                <label class="control-label">P. UNIT.</label>
                                                <input type="number"  id="precio_uni" class="form-control" name="precio_uni"  disabled>
                                            </div>
                                        </div> 
                                        <div class="col-lg-1" style="margin-top:20px">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Cantidad</label>
                                                <input type="number" id="Pcantidad" class="form-control" name="Pcantidad" >
                                            </div>
                                        </div> 
                                        <div class="col-sm-2" style="margin-top:20px">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Descuento %</label>
                                                <input type="number" id="pdescuento" class="form-control" name="pdescuento" step="any" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2" style="margin-top:20px">
                                            <div class="form-group">
                                                <label class="control-label">Nom.Tablero</label>
                                                <!-- <input type="text" id="NomTablero" class="form-control" name="NomTablero" > -->
                                                <div id="select-pro" ></div>
                                            </div>
                                        </div> 
                                        <div class="col-sm-1" style="margin-top:20px">
                                            <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                                <button type="button" id="bt_add_produc" class="btn btn-primary">Agregar</button>
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
                                                        <p> Proforma de Tablero: </p>
                                                            <div class="box-tools pull-right">
                                                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="box-body">
                                                            <div class="row">
                                                                <div class="col-md-12 table-responsive">
                                                                    <table id="detalle_tablero_Principal" class="table table-striped table-bordered table-condensed table-hover">
                                                                        <thead style="background-color:#A9D0F5;text-align: center;color: black !important" >
                                                                            <th class="text-center">Tarea</th>
                                                                            <th class="text-center">Descripción</th>
                                                                            <th class="text-center">Opciones</th>
                                                                        </thead>
                                                                        <tbody id="tablero_unitario">
                                                                            <tr>
                                                                                <th colspan="7" align="text-center"> 
                                                                                    <div class="panel panel-transparent panel-dashed tip-sales text-center" >
                                                                                        <div class="row">
                                                                                             <div class="col-sm-8 col-sm-push-2">
                                                                                        <i class="fas fa-exclamation-triangle fa-3x text-warning"></i>
                                                                                        <h3 class="ich m-t-none">
                                                                                            No hay detalles de servicios
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
                                                                        <h4 class="form-control" id="subtotal">    </h4>
                                                                        <input type="hidden" name="subtotal" id="subtotal">
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
                                                                    <label for="    " class="control-label"> Total Dolares</label>
                                                                    <div class="input-group date">
                                                                        <h4 class="form-control" id="total_dolares">    
                                                                        </h4>
                                                                        <input type="hidden" name="tota_dolares" id="tota_dolares">
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
                                                                    <textarea name="observacion_proforma" id="observacion" cols="30" rows="2" class="form-control">Ninguna</textarea>
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
                                        <button  class="btn btn-success btn-sm " type="button"><a style="color: white!important;text-decoration: none" href="{{url('tableros')}}"><i class="fas fa-reply-all"></i> Volver</a></button>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</section>

@push('scripts')
<script>
    
    $(document).ready(function(){
        $('#bt_add_tablero').click(function(){
            agregarTablero();
            valoresFinales();
            mostrarcampos();
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
    var nomTablero;
    var idcliente;
    var totalt;
    var valorventa;
    var iduser={!! Auth::user()->id !!}
    $("#pidProducto").change(MostarProducto);
    

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
    
        tipoCambio=document.getElementById('idTipo_moneda').value.split('_');
        $("#simbolo").val(tipoCambio[2]);
        $("#valorcambio").val(tipoCambio[1]);
        $("#igv_tipocambio").val(tipoCambio[3]+ " %");

    }
    function mostrarcampos(){
        document.getElementById('producto-crear-oculto').style.display = 'block';
        //document.getElementById('producto-oculto').style.display = 'block';
        // $("#producto-crear-oculto").style.display='block';
        // $("#producto-oculto").style.display='block';
    } 

    function saveProforma(){
        // se enviar los datos al controlador proforma tableros
        // console.log(idcliente);
        tipoCambio=document.getElementById('idTipo_moneda').value.split('_');
        var idtipocam=tipoCambio[0];
        var valorcambio=tipoCambio[1];
        var simbolo=$("#simbolo").val();
        var vVenta=$("#valorVenta").val();        
        var tl=$("#total").val();
         var forma=$("#forma_de").val();
        var clienteemp=$("#cliente_empleado").val();
        var plazo=$("#plazo_oferta").val();
        var observacion=$("#observacion").val();
        console.log(tablero,filaob);
        console.log(iduser);
        if(valorventa>0 && totalt>0 && idtipocam!='' && valorcambio!='' && typeof(idcliente)!='undefined' && idcliente!='null' ){
            var dat=[{idcliente:idcliente,valorVenta:valorventa,total:totalt,simbolo:simbolo,idTipoCambio:idtipocam,valorTipoCambio:valorcambio,forma:forma,plazo:plazo,observacion:observacion,userid:iduser,clienteemp:clienteemp}];
            // console.log(dat,tablero,filaob);
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:  {tableros:tablero,filas:filaob,datos:dat}, //datos que se envian a traves de ajax
                url:   'guardar', //archivo que recibe la peticion
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
        }else {
            alert('ingrese productos al tablero!!');
        }
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
                    table='<div id="'+nomTablero+'_'+cont+'" style="color: #f5f5f5 !important;">'+
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
                                                        '<div class="col-md-12 table-responsive">'+
                                                            '<table id="detalle_'+nomTablero+'_Principal" class="table table-striped table-bordered table-condensed table-hover" >'+
                                                                '<thead style="background-color:#A9D0F5;color: black !important;">'+
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
                                                                    '<th style="color:black !important;" >Total</th>'+
                                                                    '<th></th>'+
                                                                    '<th></th>'+
                                                                    '<th></th>'+
                                                                    '<th></th>'+
                                                                    '<th style="color:black !important;"><h4 id="total_'+nomTablero+'">s/. 0.00</h4>'+
                                                                    '<input style="color:black !important;" type="hidden" name="precio_subtotal_'+nomTablero+'" id="precio_subtotal_'+nomTablero+'">'+
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
                var ta={nombre:nomTablero,posi:cont,tablero:table,estado:1};
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
            document.getElementById('totales-general').style.display = 'block';
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
                            var dat={idProducto:idProd,producto:pname,descripcionP:pdescripcion,prec_uniP:puni,cantidadP:pcant,descuentoP:descuento,nomTablero:nomTablero,posiP:contp,estado:1,fila:""};
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
                if (tablero.hasOwnProperty(key)) {
                    // $("#detalle_"+tablero[key]['nombre']).load();
                    for (const fila in filaob) {
                        if (filaob.hasOwnProperty(fila)) {                            
                            var cantidad=parseFloat(filaob[fila]['cantidadP']);
                            var precio=parseFloat(filaob[fila]['prec_uniP']);
                            var descuento=parseFloat(filaob[fila]['descuentoP']);
                            var subt=(cantidad*precio)-((precio*(descuento/100)*cantidad));
                            if(tablero[key]['nombre']==filaob[fila]['nomTablero']){
                                filas=
                                    '<tr class="selected" id="fila_'+filaob[fila]['nomTablero']+'_'+filaob[fila]['posiP']+'">'+
                                        '<td style="color:black !important;"> '+ 
                                            '<input type="hidden" name="idpod_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['idProducto']+'">'+filaob[fila]['producto']+
                                        '</td>'+
                                        '<td style="color:black !important;"> '+ 
                                            '<input type="hidden" name="descri_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['descripcionP']+'">'+filaob[fila]['descripcionP']+
                                        '</td>'+
                                        '<td style="color:black !important;"> '+ 
                                            '<input type="number" disabled name="pcant'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['cantidadP']+'">'+
                                        '</td>'+
                                        '<td style="color:black !important;"> '+   
                                            '<input type="number" disabled name="preuni'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['prec_uniP']+'" >'+
                                        '</td>'+
                                        '<td style="color:black !important;"> '+   
                                            '<input type="number" disabled name="pdescu'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['descuentoP']+'" >'+
                                        '</td>'+
                                        '<td style="color:black !important;"> '+   
                                            '<input type="number" disabled name="ptotal'+filaob[fila]['nomTablero']+'[]" value="'+subt +'">'+
                                        '</td>'+
                                        '<td style="color:black !important;">'+
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
            }
        }
    }    
    function ListaSelect(){
        // realiza el listado de todas los tableros que se añaden
        var tab;    
        var selectop;
        if(tablero.length>0){
            for (const pro in tablero) {
                if (tablero.hasOwnProperty(pro)) {
                    selectop+='<option value="'+tablero[pro]['nombre']+'">'+tablero[pro]['nombre'].replace(/_/gi," ")+'</option>';                            
                }
            }
            var selec='<select name="prod-selec" id="prod-selec" class="form-control input-sm" >'+
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
                    if (filaob.hasOwnProperty(key)) {
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
                if (tablero.hasOwnProperty(key)) {
                    for (const fila in filaob) {
                        if (filaob.hasOwnProperty(fila)) {
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
            if (filaob.hasOwnProperty(fila)) {
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
            if (filaob.hasOwnProperty(fila)) {
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
            if (filaob.hasOwnProperty(fila)) {
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
                    filaob.splice(key,1);
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
                                filaob.splice(k,1);
                            }
                        }
                    }   
                    $("#"+tablero[key]['nombre']+'_'+tablero[key]['posi']).remove();                      
                    tablero.splice(key,1);                 
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