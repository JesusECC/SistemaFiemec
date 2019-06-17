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
        <li class="active">Editar Proforma Tablero</li>
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
                        <a style="color: white!important;text-decoration: none" href="{{url('tableros')}}"><button  class="btn btn-success btn-sm " type="button"><i class="fas fa-reply-all"></i> Volver</button></a>
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
                                                <input type="text" disabled name="nombreclie" id="nombreclie" class="form-control" placeholder="nombreclie">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="" class="control-label">Dirección Cliente</label>
                                                <input type="text" disabled name="cdireccion" id="cdireccion" class="form-control" placeholder="direccion">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label for="" class="control-label"> Documento</label>
                                                <input type="text" disabled name="cnro_documento" id="cnro_documento" class="form-control" placeholder="numero documento">
                                            </div>
                                            <div class="col-md-8">
                                                <label for="" class="control-label">Representante </label>
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
                    <!--Tablero-->
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
                                                     <button type="button" id="bt_add_tablero" class="btn btn-primary">
                                                         Agregar
                                                     </button>
                                                 </samp>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="producto-oculto" style="margin-top:20px">

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
                                         <div class="col-lg-8" style="margin-top:20px">
                                            <div class="form-group label-floating">
                                                <label for="" class="control-label">Tarea</label>
                                                <select name="pidTarea" class="form-control selectpicker" id="pidTarea" data-live-search="true">
                                                    <option value="" selected="" disabled="">Seleccione Tarea</option>
                                                    @foreach($Tareas as $ta)
                                                    <option value="{{ $ta->idTarea }}_{{ $ta->nombre_tarea }}_{{ $ta->precioT }}">{{$ta->nombre_tarea}}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="col-sm-2" style="margin-top:20px">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Unidadess</label>
                                                <input type="text" id="punidad" class="form-control" name="punidad" step="any" >
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
                                        <div class="col-lg-2" style="margin-top:20px">
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
                                        <div class="col-sm-1" style="margin-top:44px">
                                            <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                                <button type="button" id="bt_add_produc" class="btn btn-primary">Agregar</button>
                                            </div>
                                        </div>                                                                                 
                                    </div>
                                </div>
                            </div>
                                <div class="panel-footer">
                                    <div id="tablerosn" style="color: #f5f5f5 !important;">
                                    </div>
                                    <div class="content" id="totales-general" style='display:none;'>
                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="panel panel-default panel-shadow"> 
                                                    <div class="panel-body">
                                                        <div class="row">   
                                                            <div class="col-sm-2">
                                                                <div class="form-group display-flex dec">
                                                                    <label for="" class="control-label">Subtotal</label>
                                                                    <div class="input-group date">
                                                                        <h4 class="form-control" id="subtotal">    </h4>
                                                                        <input type="hidden" name="subtotal" id="subtotal">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            <div class="col-sm-2">
                                                                <div class="form-group display-flex dec">
                                                                    <label for="" class="control-label">Valor Venta</label>
                                                                    <div class="input-group ">
                                                                        <h4 class="form-control" id="valorVenta">    </h4>
                                                                        <input type="hidden" name="valorVenta" id="valorVenta">
                                                                    </div>
                                                                </div>
                                                            </div>                               
                                                            <div class="col-sm-2">
                                                                <div class="form-group display-flex dec">  
                                                                    <label for="    " class="control-label"> IGV %</label>
                                                                    <div class="input-group ">
                                                                        <h4 class="form-control" id="igv">    
                                                                        </h4>
                                                                        <input type="hidden" name="igv" id="igv" >
                                                                    </div> 
                                                                   
                                                                </div>  
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <div class="form-group display-flex dec">  
                                                                    <label for="    " class="control-label"> Total Soles</label>
                                                                    <div class="input-group ">
                                                                        <h4 class="form-control" id="total">    </h4>
                                                                        <input type="hidden" name="precio_subtotal" id="precio_subtotal">
                                                                    </div> 
                                                                   
                                                                </div>  
                                                            </div>   
                                                             <div class="col-sm-2">
                                                                <div class="form-group display-flex dec">  
                                                                    <label for="    " class="control-label"> Total Dolares</label>
                                                                    <div class="input-group date">
                                                                        <h4 class="form-control" id="total_dolares">    
                                                                        </h4>
                                                                        <input  type="hidden" name="tota_dolares" id="tota_dolares">
                                                                    </div> 
                                                                   
                                                                </div>  
                                                            </div>                          
                                                        </div> 
                                                       
                                                        <hr>    
                                                        <div class="row">   
                                                         
                                                            <div class="col-sm-3">
                                                                <div class="form-group display-flex dec">
                                                                    <label for="" class="control-label">Añadir Desc%</label>
                                                                    <div class="form-group label-floating">
                                                                        <input class="form-control" style="margin-top:10px" type="number" name="pdesc" id="pdesc"  >
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
                                                                    <label for="" class="control-label">Obsercaviones:</label>
                                                                    <textarea type="text" name="observacion_proforma" id="observacion_proforma" class="form-control"></textarea>
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
             agregarTablero();
             valoresFinales();

             
         });
         $('#save').click(function(){
            // console.log("asd");
            saveProforma();
        });
        $('#btnagregar').click(function(){
            agregarprorducto();
        
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
       //  $('#pdescuento').keyup(function (){
          //   this.value = (this.value + '').replace(/[^0-9/^\d*\.?\d*$/]/g, '');
        // });
        // $('#pdescuento').click(function (){
           //  this.value = (this.value + '').replace(/[^0-9/^\d*\.?\d*$/]/g, '');
        // });
     });
     $("#idClientes").change(MostrarCliente);
     $("#idTipo_moneda").change(mostrarTipoCambio);

var pro={!! $proforma !!};
var editarval=true;
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
     var tipocam;
     var simbolo;
     var totaldolares=0;
     var idProfo;
     var idtipocam;
     
     $("#pidTarea").change(MostarProducto);
     $("#idTipo_moneda").change(cambioMoneda);
    // variables para asignar valores    
    
    asignarValores();
    function agregarprorducto(){
        document.getElementById('agregar_producto').style.display ='block';
        document.getElementById('quitar_btn').style.display='none';
    } 
    function asignarValores(){
        var pro={!! $proforma !!};
        var tabl={!! $Servicios !!};
        var nombreClie;
        var apellidoP;
        var apellidoM;
        var direccion;
        var documento;
        var cotiza;
        var formade;
        var nombproyecto;
        var plazpOf;
        var obser;
       //console.log(tabl);
       //console.log(pro);
        if (editarval==true) {
            for (const key in pro) {
                if (pro.hasOwnProperty(key)) {
                    idProforma=pro[key]['idProforma'];
                    nombreClie=pro[key]['nombres_Rs'];
                    apellidoP=pro[key]['paterno'];
                    apellidoM=pro[key]['materno'];
                    direccion=pro[key]['Direccion'];
                    nombreClieRe=pro[key]['nombre_RE'];
                    documento=pro[key]['nro_documento'];
                    var idProd=pro[key]['idProducto'];
                    var pname=pro[key]['nombre_producto'];

                    var idTar=pro[key]['idTarea'];
                    var tname=pro[key]['nombre_tarea'];

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
                    var pcant=pro[key]['cantidad'];
                    var descuento=pro[key]['descuento'];     
                    var estado=parseInt(pro[key]['estadoDP']);  
                    var idDetalleProforma=pro[key]['idDetalle_proforma']; //revisar 
                    formade=pro[key]['forma_de'];
                    nombproyect=pro[key]['proyecto']
                    plazpOf=pro[key]['plazo_oferta'];
                    obser=pro[key]['observacion_proforma'];
                    obser=pro[key]['observacion_proforma']; 
                    descuen=pro[key]['descuento'];
                    // var dat={idProducto:idProd,producto:pname,descripcionP:pdescripcion,prec_uniP:puni,cantidadP:pcant,descuentoP:descuento,nomTablero:nomTablero,posiP:contp,fila:"",estado:estado,idDetalleProforma:idDetalleProforma};
                    // filaob.push(dat);  
                    // fila();
                    contp++;    
                    // console.log(var);           
                }
            }
            // console.log(pro);
            editarval=false;
            document.getElementById('totales-general').style.display = 'block';
            // cotizador
            $("#nombreclie").val(nombreClie+" "+apellidoP+" "+apellidoM);
            $("#cotizador").val(nombreClieRe);
            $("#cdireccion").val(direccion);
            $("#cnro_documento").val(documento);
           // $("#cotizador").val(cotiza);

            $("#simbolo").val(simbolo);
            $("#valorcambio").val(tipocam);
            $("#forma_de").val(formade);
            $("#nombproyecto").val(nombproyect);
            $("#plazo_oferta").val(plazpOf);
            $("#observacion_proforma").val(obser);
            $("#pdesc").val(descuen);

            
        }         
         for (const tab in tabl) {

             nomTablero=tabl[tab]['nombre_servicio'];
             var esta=tabl[tab]['estadoT'];
             var idser=tabl[tab]['idServicios'];

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
                                                                     '<th>Item</th>'+
                                                                     '<th>Descripción</th>'+
                                                                     '<th>Detalles</th>'+
                                                                     '<th>Unds.</th>'+
                                                                     '<th>Cant.</th>'+
                                                                     '<th>P. Unit</th>'+
                                                                     '<th>P. Importe</th>'+
                                                                     '<th>Quitar</th>'+
                                                                     //'<th></th>'+
                                                                 '</thead>'+
                                                                 '<tbody id="detalle_'+nomTablero+'">'+
                                                                 '</tbody>'+ 
                                                                 '<tr>'+
                                                                    '<th style="color:black !important; border-right:1px solid white !important;" >Total</th>'+
                                                                    '<th style="color:black !important; border-right:1px solid white !important;" ></th>'+
                                                                    '<td style="border-right:1px solid white !important;"></th>'+
                                                                    '<td style="border-right:1px solid white !important;" ></td>'+
                                                                    '<td style="border-right:1px solid white !important;" ></td>'+
                                                                    '<td style="border-right:1px solid white !important;" ></td>'+
                                                                    '<td colspan="2" style="color:black !important; text-align: center;"><h4 id="total_'+nomTablero+'">s/. 0.00</h4>'+
                                                                    '<input style="color:black !important;" type="hidden" name="precio_subtotal_'+nomTablero+'" id="precio_subtotal_'+nomTablero+'">'+         
                                                                     '</td>'+

                                                                     
                                                                '</tr>'+
                                                             '</table>'+
                                                         '</div>'+
                                                     '<div>'+
                                                 '</div>'+                                
                                             '</div>'+
                                         '</div>'+
                                     '</div>'+
                                 '</section>'+
                             '</div>';
             
             var ta={nombre:nomTablero,posi:cont,tablero:table,estado:esta,idServicio:idser}
             tablero.push(ta);
             console.log(tablero);
             cont++;
         }
         nomTablero="";
         ListaSelect();
        console.log(pro); 
         for (const dtp in pro) {
             idprofo=pro[dtp]['idProforma'];
             idProforma=pro[dtp]['idProforma'];
            nombreClie=pro[dtp]['nombres_Rs'];
            apellidoP=pro[dtp]['paterno'];
            apellidoM=pro[dtp]['materno'];
            direccion=pro[dtp]['Direccion'];
            documento=pro[dtp]['nro_documento'];

            var idServic=pro[dtp]['idSer'];
            var idProd=pro[dtp]['idProducto'];
            var pname=pro[dtp]['nombre_producto'];
            var unid=pro[dtp]['unidades'];

            var idTar=pro[dtp]['idTarea'];
            var tname=pro[dtp]['nombre_tarea'];
            var it=pro[dtp]['item'];
            var it2=pro[dtp]['item2'];
            var subtt=pro[dtp]['subtitulo'];



            var pdescripcion;
            tipocam=pro[dtp]['tipocambio'];
            simbolo=pro[dtp]['simboloP'];
            cotiza=pro[dtp]['nombre_RE'];
            if(pro[dtp]['descripcionDP']==null){
                pdescripcion='';
            }else{
                pdescripcion=pro[dtp]['descripcionDP'];
            }
            var nombre_servicio=pro[dtp]['nombre_servicio'];
            var puni=pro[dtp]['precio_venta'];
            var pcant=pro[dtp]['cantidad'];     
            var estado=parseInt(pro[dtp]['estadoDP']);  
            var idDetalleProforma=pro[dtp]['idDetalle_proforma']; //revisar 
            formade=pro[dtp]['forma_de'];
            plazpOf=pro[dtp]['plazo_oferta'];
            obser=pro[dtp]['observacion_proforma'];
            descu=pro[dtp]['descuento']; 
             var dat={idDetalleProforma:idDetalleProforma,idProducto:idProd,producto:pname,idTarea:idTar,tarea:tname,item:it,item2:it2,subtitulo:subtt,descripcionP:pdescripcion,prec_uniP:puni,cantidadP:pcant,nomTablero:nombre_servicio,posiP:contp,estado:estado,idservicios:idServic,unidades:unid,desc:descu,fila:""};
             filaob.push(dat);
             fila();
             contp++;
         }
         valoresFinales();  
         

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
         Tarea=document.getElementById('pidTarea').value.split('_');
         // $("#idProd").val(Producto[0]);
         // $("#Productoname").val(Producto[1]);
         $("#precio_uni").val(Tarea[2]);
         
         // descuentoP -->para emostar el 
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
     // function mostrarcampos(){
     //     document.getElementById('producto-crear-oculto').style.display = 'block';
     //     document.getElementById('producto-oculto').style.display = 'block';
     //     // $("#producto-crear-oculto").style.display='block';
     //     // $("#producto-oculto").style.display='block';
     // } 
 
     function saveProforma(){
         // se enviar los datos al controlador proforma tableros
         // console.log(idcliente);
         // tipoCambio=document.getElementById('idTipo_moneda').value.split('_');
         var formade=$("#forma_de").val();
         var plazoofer=$("#plazo_oferta").val();
         var obserprof=$("#observacion_proforma").val();
         var descuento=$("#pdesc").val();
         var nombrproyecto=$("#nombproyecto").val();
         // var valorcambio=tipoCambio[1];
         // var vVenta=$("#valorVenta").val();
         // var tl=$("#total").val();
         // console.log(tablero,filaob);
         // if(valorventa>0 && totalt>0 && idtipocam!='' && valorcambio!='' && typeof(idcliente)!='undefined' && idcliente!='null' ){
             var dat=[{idProforma:idprofo,idcliente:idcliente,valorVenta:valorventa,total:totalt,forma_de:formade,nombproyect:nombrproyecto,plazo_oferta:plazoofer,obspro:obserprof,desc:descuento}];
             //console.log(dat,tablero,filaob);

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
         //console.log(nomTablero); 
         bool=false;  
         // if(tabl!='' && $("#simbolo").val()!='' && $("#valorcambio").val()!='' && $("#igv_tipocambio").val()!='' ){
             // mostrarcampos(tabl);
             // fila();
             //console.log(tablero);
             if(tablero.length>=0 && nomTablero!=""){
                 //for para evitar tablas con el  mismo nombre sin iportar las mayusculas o minisculas
                 for (const key in tablero) {
                     if (tablero.hasOwnProperty(key)) {
                         if(tablero[key]['nombre'].toLowerCase()==nomTablero.toLowerCase()){
                             // tablero[key]['estado']=1;
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
                                                                 '<thead style="background-color:#A9D0F5;color: black !important;">'+
                                                                     '<th>Item</th>'+
                                                                     '<th>Descripción</th>'+
                                                                     '<th>Detalles</th>'+
                                                                     '<th>Unds.</th>'+
                                                                     '<th>Cant.</th>'+
                                                                     '<th>P. Unit</th>'+
                                                                     '<th>P. Importe</th>'+
                                                                     '<th>Quitar</th>'+
                                                                 '</thead>'+
                                                                 '<tbody id="detalle_'+nomTablero+'">'+
                                                                 '</tbody>'+ 
                                                                 '<tr>'+
                                                                    '<th style="color:black !important; border-right:1px solid white !important;" >Total</th>'+
                                                                    '<th style="color:black !important; border-right:1px solid white !important;" ></th>'+
                                                                    '<td style="border-right:1px solid white !important;"></th>'+
                                                                    '<td style="border-right:1px solid white !important;" ></td>'+
                                                                    '<td style="border-right:1px solid white !important;" ></td>'+
                                                                    '<td style="border-right:1px solid white !important;" ></td>'+
                                                                    '<td colspan="2" style="color:black !important; text-align: center;"><h4 id="total_'+nomTablero+'">s/. 0.00</h4>'+
                                                                    '<input style="color:black !important;" type="hidden" name="precio_subtotal_'+nomTablero+'" id="precio_subtotal_'+nomTablero+'">'+         
                                                                     '</td>'+

                                                                     
                                                                '</tr>'+
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

             //console.log(table,filaob);
             nomTablero="";
             // realiza el listado de todas los tableros que se añaden
             ListaSelect()
             // mantiene en la vista las filas cuando se agrega una nueva tabla
             detalleFilas();
             // fila();
             //nomtablero="";
         // }else{
         //     // (tabl!='' && $("#simbolo").val()!='' && $("#valorcambio").val()!='' && $("#igv_tipocambio").val()!=''
         //     if($("#simbolo").val()=='' && $("#valorcambio").val()=='' && $("#igv_tipocambio").val()==''){
         //         alert("seleccione un tipo de Moneda");
         //     }else if(tabl==''){
         //         alert("ingrese nombre del Tablero");
         //     }            
         // }
         
     }
     function agregarProductosTablero(){    
         Tarea=document.getElementById('pidTarea').value.split('_');
         var idProd=Tarea[0];
         var pname=Tarea[1];
         var pdescripcion=$("#descripcionp ").val();
         var subti=$("#subti").val();
        var puni=$('#precio_uni').val();
        var pit=$('#pitem').val();
        var pit2=$('#pitem2').val();
         var pcant=$('#Pcantidad').val();
         var unid=$('#punidad').val();
         var sel=$('#prod-selec').val();
         
         // console.log(descuento);
         nomTablero=$('#prod-selec').val();
         var filas;
         // console.log(idProd,pname);
         if(tablero.length>=0 && nomTablero!="" && idProd!="" && pname!="" && puni!="" && pcant!="" && nomTablero!="" ){
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
                                     filaob[fil]['estado']=1;
                                     fila();
                                     boolfila=true;
                                     //console.log("Actualizar producto");                      
                                 }                
                             }
                         }
                         if(boolfila==false){
                            // console.log("produc nuevoo",contp);
                             var dat={idTarea:idProd,tarea:pname,item:pit,item2:pit2,subtitulo:subti,descripcionP:pdescripcion,prec_uniP:puni,cantidadP:pcant,nomTablero:nomTablero,posiP:contp,estado:2,unidades:unid,fila:""};
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
             alert("aletaaaaaaaaaaaaaaaa");
         }
     }
     function fila(){
         // realiza la insercion de las filas agregadas actualizando los importes y las cantidaddes
         if(filaob.length>0){
             var filas;
             // console.log(filaob.length+ " --> ");
             for (const key in tablero) {
                 if (tablero.hasOwnProperty(key) && tablero[key]['estado']!=0) {
                     // $("#detalle_"+tablero[key]['nombre']).load();
                     for (const fila in filaob) {
                         if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']!=0) {                            
                             var cantidad=parseFloat(filaob[fila]['cantidadP']);
                             var precio=parseFloat(filaob[fila]['prec_uniP']);
                             
                             var subt=(cantidad*precio);
                             if(tablero[key]['nombre']==filaob[fila]['nomTablero']){
                                 filas=
                                     '<tr class="selected" id="fila_'+filaob[fila]['nomTablero']+'_'+filaob[fila]['posiP']+'">'+
                                         '<td style="color:black !important;text-align: center"> '+ 
                                             '<p style="text-align: center; background-color: #E5EAEA">'+'<input type="hidden" name="idpod_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['item2']+'">'+filaob[fila]['item2']+'</p>'+
                                             '<input type="hidden" name="idpod_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['item']+'">'+filaob[fila]['item']+
                                         '</td>'+
                                         '<td style="color:black !important;"> '+
                                         '<p style="text-align: center; background-color: #E5EAEA">'+'<input type="hidden" name="idpod_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['subtitulo']+'">'+filaob[fila]['subtitulo']+'</p>'+
                                             '<input type="hidden" name="idpod_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['idTarea']+'">'+filaob[fila]['tarea']+
                                         '</td>'+
                                         '<td style="color:black !important;"> '+ '</br>'+
                                             '<input type="hidden" name="descri_'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['descripcionP']+'">'+filaob[fila]['descripcionP']+
                                         '</td>'+
                                         '<td style="color:black !important;"> '+ '</br>'+
                                             '<input type="hidden" disabled name="pcant'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['unidades']+'">'+filaob[fila]['unidades']+
                                         '</td>'+
                                         '<td style="color:black !important;"> '+ '</br>'+  
                                             '<input type="hidden" disabled name="pcant'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['cantidadP']+'">'+filaob[fila]['cantidadP']+
                                         '</td>'+
                                         '<td style="color:black !important;"> '+   '</br>'+
                                             '<input type="hidden" disabled name="preuni'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['prec_uniP']+'" >'+filaob[fila]['prec_uniP']+
                                         '</td>'+
                                         '<td style="color:black !important;"> '+  '</br>'+ 
                                             '<input type="hidden" disabled name="ptotal'+filaob[fila]['nomTablero']+'[]" value="'+subt +'">'+subt +
                                         '</td>'+
                                         '<td style="color:black !important;">'+
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
                 if (tablero.hasOwnProperty(pro) && tablero[pro]['estado']!=0) {
                    selectop+='<option value="'+tablero[pro]['nombre']+'">'+tablero[pro]['nombre'].replace(/_/gi," ")+'</option>';                            
                }
            }
            var selec='<select name="prod-selec" id="prod-selec" class="form-control input-sm" >'+
                            // '<option value="">Seleccione...</option>'+
                            selectop+
                      '</select>';
             $('#select-pro').html(selec);
             for (var keyt in tablero) {
                 if( tablero[keyt]['estado']!=0){
                     tab+=tablero[keyt]['tablero'];
                 }                
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
                     if (filaob.hasOwnProperty(key) && filaob[key]['estado']!=0 ) {
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
                 if (tablero.hasOwnProperty(key) && tablero[key]['estado']!=0) {
                     for (const fila in filaob) {
                         if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']!=0) {
                             if(tablero[key]['nombre']==filaob[fila]['nomTablero']){
                                 // (cantidad*precio)-((cantidad*precio)*(cantidad*(descuento/100)));
                                 var precio=parseFloat(filaob[fila]['prec_uniP']);
                                 var cantidad=parseFloat(filaob[fila]['cantidadP']);
                                 
                                 sub+=(cantidad*precio);
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
             if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']!=0) {
                 var precio=parseFloat(filaob[fila]['prec_uniP']);
                 var cantidad=parseFloat(filaob[fila]['cantidadP']);
                 
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
             if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']!=0) {
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
             if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']!=0) {
                 var precio=parseFloat(filaob[fila]['prec_uniP']);
                 var cantidad=parseFloat(filaob[fila]['cantidadP']);
                 
                 // var subt=(cantidad*precio)-((precio*(descuento/100)*cantidad));
                 venta+=(cantidad*precio);
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
             if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']!=0) {
                 var precio=parseFloat(filaob[fila]['prec_uniP']);
                 var cantidad=parseFloat(filaob[fila]['cantidadP']);
                 // var subt=(cantidad*precio)-((precio*(descuento/100)*cantidad));
                 venta+=(cantidad*precio);
                 // console.log(sub);                        
             }
         }
         ig=venta*0.18;
         // console.log(sub);
         $("#igv").html("s/. " + ig.toFixed(2));
     }
     var boolean_dolar=false;
     function total(){
         var venta=0;   
         var igv=0;  
         var tota=0;   
         for (const fila in filaob) {
             if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']!=0) {
                 var precio=parseFloat(filaob[fila]['prec_uniP']);
                 var cantidad=parseFloat(filaob[fila]['cantidadP']);
                 
                 // var subt=(cantidad*precio)-((precio*(descuento/100)*cantidad));
                 venta+=(cantidad*precio);
                 totaldolares=(tota/tipocam).toFixed(2);
                 // console.log(sub);                        
             }
         }
         igv=venta*0.18;
         tota=venta+igv;
         totalt=tota.toFixed(2);
         totaldolares=(tota/tipocam).toFixed(2);
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
         cambioMoneda();
         
     }
    function cambioMoneda(){
        //console.log(contp);
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
         // console.log(filaob,"eliminar",index);
         for (var key in filaob) {
             if (filaob.hasOwnProperty(key)) {
                 if(index==filaob[key]['posiP']){
                     //console.log(filaob[key]['nomTablero'],"eliminar");
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
 </script>
 @endpush
 @endsection