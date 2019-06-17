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
        <li class="active">Nueva Proforma Servicio</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box" style="border-top: 3px solid #18A689">
                <div class="box-header with-border" style="padding: 10px !important">
                    <h4>
                        <strong style="font-weight: 400">
                            <i class="fas fa-dolly"></i> Datos Proforma Servicios Fiemec
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
                                                    <option value="{{$cliente->idCliente}}_{{$cliente->direccion}}_{{$cliente->nro_documento}}_{{$cliente->idU}}_{{$cliente->nombres_Rs}}_{{$cliente->paterno}}_{{$cliente->materno}}_{{$cliente->user}}">{{$cliente->nombres_Rs.' '.$cliente->paterno.' '.$cliente->materno}}</option>
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
                                <div class="col-md-12">
                                    <div class="panel panel-default panel-shadow">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label for="" class="control-label" style="color: #676a6c !important">
                                                   Nombre del proyecto
                                                </label>
                                            </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <input type="text"  name="nombproyecto" id="nombproyecto" class="form-control" placeholder="Ingrese el nombre del proyecto">
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
                                            Ingresar el Nombre del Servicio
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="NomTablerop" id="NomTablerop" placeholder="Ingresar nombre del tablero...">
                                                <samp class="input-group-btn">
                                                    <button id="bt_add_tablero" class="btn btn-primary" >
                                                        <i class="fas fa-plus"></i> Agregar
                                                    </button>
                                                </samp>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <input type="radio" name="subtitulo" id="subtitulo" value="Sub titulo"> Sub titulo
                                        </div>
                                    </div>
                                    <div class="row" id="producto-crear-oculto" style="display:none;margin-top:20px">
                                        <div class="col-lg-2" style="margin-top:20px">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Nom. Item de Subtitulo</label>
                                                <input type="text" id="pitem2" class="form-control" name="pitem2" >
                                            </div>
                                        </div>
                                        <div class="col-lg-10" style="margin-top:20px">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Subtitulo</label>
                                                <input type="text"  id="subti" class="form-control" name="subti"  >
                                            </div>
                                        </div> 
                                        <div class="col-lg-2" style="margin-top:20px">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Nom. Item de Producto</label>
                                                <input type="text" id="pitem" class="form-control" name="item" >
                                            </div>
                                        </div>
                                         <div class="col-sm-8" style="margin-top:20px">
                                            <div class="">
                                                <label for="" class="control-label">Tarea</label>
                                                <select name="pidTarea" class="form-control selectpicker" id="pidTarea" data-live-search="true">
                                                    <option value="" selected="" disabled="">Seleccione Tarea</option>
                                                    @foreach($tarea as $ta)
                                                    <option value="{{ $ta->idTarea }}_{{ $ta->nombre_tarea }}_{{ $ta->precioT }}">{{$ta->nombre_tarea}}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="col-sm-2" style="margin-top:20px">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Unidadess</label>
                                                <input type="text" id="pdescuento" class="form-control" name="pdescuento" step="any" >
                                            </div>
                                        </div>
                                        <div class="col-lg-3" style="margin-top:20px">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Detalles</label>
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
                                    <div class="row" id="subtitulos" style="display:none;margin-top:20px">
                                        <div class="col-sm-2" style="margin-top:20px">
                                            <div class="form-group">
                                                <label class="control-label">Ingresar el Nombre de Tablero</label>
                                                <div id="select-subtitle" ></div>
                                            </div>
                                        </div> 
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Ingresar sub titulo">
                                                <samp class="input-group-btn">
                                                    <button id="bt_add_subtitle" class="btn btn-primary" >
                                                        <i class="fas fa-plus"></i> Agregar
                                                    </button>
                                                </samp>
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
                                                        <p> Proforma Servicio: </p>
                                                            <div class="box-tools pull-right">
                                                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="box-body">
                                                            <div class="row">
                                                                <div class="col-md-12 table-responsive">
                                                                    <table id="detalle_tablero_Principal" class="table table-striped table-bordered table-condensed table-hover">
                                                                        <thead style="background-color:#A9D0F5;text-align: center;color: black !important" >
                                                                            <th class="text-center">Item</th>
                                                                            <th class="text-center">Descripcion</th>
                                                                            <th class="text-center">Detalles</th>
                                                                            <th class="text-center">Unds.</th>
                                                                            <th class="text-center">Cant.</th>
                                                                            <th class="text-center">P. Unit.</th>
                                                                            <th class="text-center">Importe</th>
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
                                                        
                                                            <div class="col-sm-3">
                                                                <div class="form-group display-flex dec">
                                                                    <label for="" class="control-label">Valor Venta</label>
                                                                    <div class="input-group ">
                                                                        <h4 class="form-control" id="valorVenta">    </h4>
                                                                        <input type="hidden" name="valorVenta" id="valorVenta">
                                                                    </div>
                                                                </div>
                                                            </div>                                                            
                                                         
                                                            
                                                          
                                                            <div class="col-sm-3">
                                                                <div class="form-group display-flex dec">  
                                                                    <label for="    " class="control-label"> IGV %</label>
                                                                    <div class="input-group ">
                                                                        <h4 class="form-control" id="igv">    
                                                                        </h4>
                                                                        <input type="hidden" name="igv" id="igv" >
                                                                    </div> 
                                                                   
                                                                </div>  
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group display-flex dec">  
                                                                    <label for="    " class="control-label"> Total Soles</label>
                                                                    <div class="input-group ">
                                                                        <h4 class="form-control" id="total">    </h4>
                                                                        <input type="hidden" name="precio_subtotal" id="precio_subtotal">
                                                                    </div> 
                                                                   
                                                                </div>  
                                                            </div>
                                                            
                                                        </div> 
                                                         <div class="row">   
                                                         
                                                            <div class="col-sm-3">
                                                                <div class="form-group display-flex dec">
                                                                    <label for="" class="control-label">Añadir Desc%</label>
                                                                    <div class="form-group label-floating">
                                                                        <input class="form-control" style="margin-top:10px" type="number" name="pdesc" id="pdesc" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group display-flex dec">
                                                                    <label for="" class="control-label">Valor venta Final</label>
                                                                    <div class="form-group label-floating">

                                                                      <h4 disabled id="descuentos" class="form-control">    </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group display-flex dec">
                                                                    <label for="" class="control-label">Total Soles Final</label>
                                                                    <div class="form-group label-floating">

                                                                      <h4 disabled id="descuentos2" class="form-control">    </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3" style="margin-top:35px">
                                                             <div class="form-group label-floating">
                                                         <label class="control-label"></label>
                                                          <button type="button" id="bt_alicar" class="btn btn-primary">Aplicar Desc.</button>
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

    var selectCliente = document.getElementById('idClientes');
    selectCliente.addEventListener('change',function(){
        var selectedOption = this.options[selectCliente.selectedIndex];
        var selctedid=selectedOption.value.split('_');
        representante(selctedid[0]);
        
    });
    
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
        $('#bt_alicar').click(function(){
             aplicadescuento();
            
         });
        //logica para colocar los subtitulos
        $('#subtitulo').click(function(){
            console.log("aaaa");
            document.getElementById('producto-crear-oculto').style.display = 'none';
            document.getElementById('subtitulos').style.display = 'block';
            ListaSelect();
        });

        
       /* $('#pdescuento').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9/^\d*\.?\d*$/]/g, '');
        });
        $('#pdescuento').click(function (){
            this.value = (this.value + '').replace(/[^0-9/^\d*\.?\d*$/]/g, '');
        });*/
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
    $("#pidTarea").change(MostarTarea);
    
    function MostrarAlertaCliente(){

        Cliente=document.getElementById('idClientes').value.split('_');
        idU=Cliente[3];
        nombre=Cliente[4];
        paterno=Cliente[5];
        matero=Cliente[6];
        user=Cliente[7];
        
        if(iduser!=idU){

           alert("El Cliente "+nombre+" "+paterno+" "+matero+"esta asignadado al Usuario "+user);

        }   
    }
    //$("#bt_add_tablero").change($("#total").html("s/. " + subtotal));
    function MostrarCliente(){
        // cdireccion/cnro_documentoidClientes
        Cliente=document.getElementById('idClientes').value.split('_');
        idcliente=Cliente[0];
        $("#cdireccion").val(Cliente[1]);
        $("#cnro_documento").val(Cliente[2]);
        MostrarAlertaCliente();
    }

    function MostarTarea(){
        Tarea=document.getElementById('pidTarea').value.split('_');
        // $("#idProd").val(Producto[0]);
        // $("#Productoname").val(Producto[1]);
        $("#precio_uni").val(Tarea[2]);
       // $("#pdescuento").val(Tarea[3]);
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
        document.getElementById('subtitulos').style.display = 'none';
        //document.getElementById('producto-oculto').style.display = 'block';
        // $("#producto-crear-oculto").style.display='block';
        // $("#producto-oculto").style.display='block';
    } 


    function representante(idCliente){
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
        var descuento=$("#pdesc").val();
        var nombproyecto=$("#nombproyecto").val();

        
        if(valorventa>0 && totalt>0 && idtipocam!='' && valorcambio!='' && typeof(idcliente)!='undefined' && idcliente!='null' ){
            var dat=[{idcliente:idcliente,valorVenta:valorventa,total:totalt,simbolo:simbolo,idTipoCambio:idtipocam,valorTipoCambio:valorcambio,forma:forma,nombproyect:nombproyecto,plazo:plazo,observacion:observacion,userid:iduser,clienteemp:clienteemp,desc:descuento}];
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
                                                '<p> Servicio ' +nomTablero.replace(/_/gi," ")+'</p>'+
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
                                                                    '<th>Item</th>'+
                                                                    '<th>Descripción</th>'+
                                                                    '<th>Detalles</th>'+
                                                                    '<th>Unds.</th>'+
                                                                    '<th>Cant.</th>'+
                                                                    '<th>P. Unit.</th>'+
                                                                    '<th>Importe</th>'+
                                                                    '<th>Quitar</th>'+
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
        Tarea=document.getElementById('pidTarea').value.split('_');
        var idTa=Tarea[0];
        var tname=Tarea[1];
        var pdescripcion=$("#descripcionp").val();
        var subti=$("#subti").val();
        var puni=$('#precio_uni').val();
        var pit=$('#pitem').val();
        var pit2=$('#pitem2').val();
        var pcant=$('#Pcantidad').val();
        var sel=$('#prod-selec').val();
        var descuento=$('#pdescuento').val();
        
        nomTablero=$('#prod-selec').val();
        var filas;
        
        if(tablero.length>=0 && nomTablero!="" && pit!="" && idTa!="" && tname!="" && puni!="" && pcant!="" && nomTablero!="" ){
            document.getElementById('totales-general').style.display = 'block';
            var bool=false;
            var boolfila=false;
            for (const key in tablero) {
                if (tablero.hasOwnProperty(key)) {
                    if(tablero[key]['nombre']==nomTablero){
                        bool=true;
                        if(boolfila==false){
                          // console.log("produc nuevoo",contp); 
                            var dat={idTarea:idTa,tarea:tname,descripcionP:pdescripcion,prec_uniP:puni,cantidadP:pcant,descuentoP:descuento,nomTablero:nomTablero,posiP:contp,subtit:subti,estado:1,itemP:pit,itemP2:pit2,fila:""};
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
                            var descuento=parseFloat([fila]['descuentoP']);
                            var subt=cantidad*precio;
                            if(tablero[key]['nombre']==filaob[fila]['nomTablero']){
                                filas=
                                    '<tr class="selected" id="fila_'+filaob[fila]['nomTablero']+'_'+filaob[fila]['posiP']+'">'+

                                    '<td style="color:black !important;"> '+ 
                                            '<input type="hidden" disabled name="pit'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['itemP2']+'">'+filaob[fila]['itemP2']+'</br>'+

                                            '<input type="hidden" disabled name="pit'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['itemP']+'">'+filaob[fila]['itemP']+
                                        '</td>'+

                                        '<td style="color:black !important;"> '+ 
                                            '<input type="hidden" style="font-size:5em" name="stit_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['subtit']+'">'+filaob[fila]['subtit']+'</br>'+

                                            '<input type="hidden" name="idpod_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['idTarea']+'">'+filaob[fila]['tarea']+
                                        '</td>'+
                                        '<td style="color:black !important;"> '+ '</br>'+
                                            '<input type="hidden" name="descri_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['descripcionP']+'">'+filaob[fila]['descripcionP']+
                                        '</td>'+
                                        '<td style="color:black !important;"> '+   '</br>'+
                                            '<input type="hidden" disabled name="pdescu'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['descuentoP']+'" >'+filaob[fila]['descuentoP']+
                                        '</td>'+
                                        '<td style="color:black !important;"> '+ '</br>'+
                                            '<input type="hidden" disabled name="pcant'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['cantidadP']+'">'+filaob[fila]['cantidadP']+
                                        '</td>'+
                                        '<td style="color:black !important;"> '+   '</br>'+
                                            '<input type="hidden" disabled name="preuni'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['prec_uniP']+'" >'+filaob[fila]['prec_uniP']+
                                        '</td>'+
                                        '<td style="color:black !important;"> '+   '</br>'+
                                            '<input type="hidden" disabled name="ptotal'+filaob[fila]['nomTablero']+'[]" value="'+subt +'">'+subt+
                                        '</td>'+
                                        '<td style="color:black !important;">'+
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
            }
        }
    }    
    function limpiar(){
       
        //$("#ppreciog").val("");
        
        $("#pitem2").val("");
        $("#subti").val("");
    }
    function ListaSelect(){
        // realiza el listado de todas los tableros que se añaden
            
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
            
            listarTableros('select-pro',selec);
            listarTableros('select-subtitle',selec);
            
            

        }
    }
    //funcion para realizar la lista de tableros
    function listarTableros(idiv,selec){
        var tab;
        $('#'+idiv).html(selec);
            for (var keyt in tablero) {
                tab+=tablero[keyt]['tablero'];
            }
        $('#tablerosn').html(tab);
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
                                sub+=cantidad*precio;
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
                desc+=precio*cantidad;                       
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
                venta+=cantidad*precio;
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
                venta+=cantidad*precio;
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
                venta+=cantidad*precio;
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
    function aplicadescuento(){       
        var venta=0;   
         var igv=0;  
         var tota=0;
        var descu=0;  
         for (const fila in filaob) {
             if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']!=0) {
                 var precio=parseFloat(filaob[fila]['prec_uniP']);
                 var cantidad=parseFloat(filaob[fila]['cantidadP']);
                 var descuento=$('#pdesc').val();
                 
      
                 venta+=(cantidad*precio);
                 
                                        
             }
         }
         tota2=venta-(venta*(descuento/100));
         igv=venta*0.18;
         tota=(venta+igv)-((venta+igv)*(descuento/100));
         
         

         $("#descuentos").html("s/. " + tota2);
         $("#descuentos2").html("s/. " + tota);
     }

    $('#bt_add_subtitle').click(function(){
        var nomt=$("#prod-selec").val();
        var subtitl=$("#subtitle").val();
        var tname=subtitl;
        console.log(tname);
        var dat={idTarea:'.',tarea:tname,descripcionP:'.',prec_uniP:'.',cantidadP:'.',descuentoP:'.',nomTablero:nomt,posiP:'.',estado:1,itemP:'.',fila:""};
        console.log(dat);
        filaob.push(dat);
        fila();
        contp++;
        console.log(filaob);
        valoresFinales();
        document.getElementById('producto-crear-oculto').style.display = 'block';
        document.getElementById('subtitulos').style.display = 'none';
        });
</script>
@endpush
@endsection