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
                                            Nombre del Proyecto
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="text"  name="nombproyecto" id="nombproyecto" class="form-control" >
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
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="NomTablerop" id="NomTablerop" placeholder="Ingresar nombre del tablero...">
                                                 <samp class="input-group-btn">
                                                     <button type="button" id="bt_add_tablero" class="btn btn-primary">
                                                         Agregar
                                                     </button>
                                                 </samp>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                
                                                <input type="number"  id="canTT" class="form-control" placeholder="Cant. Tab">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="producto-crear-oculto" style="margin-top:20px">



                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="" class="control-label">Marca Producto</label>
                                                <select  name="pidMarca" class="form-control selectpicker" id="pidMarca" data-live-search="true">
                                                    <option value="" disabled="" selected="">Marca producto</option>
                                                    @foreach($marcas as $ma)                
                                                        <option value="{{$ma->idMarca}}_{{$ma->nombre_proveedor}}">{{$ma->nombre_proveedor}}</option>
                                                    @endforeach  
                                                </select>                                                
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="" class="control-label">Familia</label>
                                                <select required name="pfamilia" class="form-control " id="pfamilia" >
                                               </select> 
                                            </div>
                                        </div>
                                         <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="" class="control-label">Buscar Producto</label>
                                                <input type="text"  id="busqueda" class="form-control" name="busqueda"  placeholder="Buscar por codigo Pedido" >
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="" class="control-label">Producto</label>
                                                <select required name="pproduc" class="form-control" id="pproduc" data-live-search="true">
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
                                                <input type="hidden"  id="nombreproducto" class="form-control" name="nombreproducto"  disabled>
                                                <input type="hidden"  id="tipopro" class="form-control" name="tipopro"  disabled>
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
                                    </div>
                                    <div class="content" id="totales-general" style='display:none;'>
                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="panel panel-default panel-shadow"> 
                                                    <div class="panel-body">
                                                        <div class="row">   
                                                           
                                                            
                                                            
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
                                                            <div class="col-sm-2">
                                                                <div class="form-group display-flex dec">  
                                                                    <label for="    " class="control-label"> TotalxCantTab</label>
                                                                    <div class="input-group date">
                                                                        <h4 class="form-control" id="total_dolares">    
                                                                        </h4>
                                                                        <input  type="hidden" name="totalxtab" id="totalxtab">
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

                                                                      <h4 disabled id="descuentos1" class="form-control">    </h4>
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

     var selectMarca = document.getElementById('pidMarca');
    selectMarca.addEventListener('change',function(){
        var selectedOptionF = this.options[selectMarca.selectedIndex];
        var selctedidF=selectedOptionF.value.split('_');
        familia(selctedidF[0]);
        
    });

    var selectFamilia = document.getElementById('pfamilia');
    selectFamilia.addEventListener('change',function(){
        var selectedOptionP = this.options[selectFamilia.selectedIndex];
        var selctedidP=selectedOptionP.value;
        producto(selctedidP);
        
    });

    var selectPD= document.getElementById('pproduc');
    selectPD.addEventListener('change',function(){
        var selectedOptionPD = this.options[selectPD.selectedIndex];
        var selctedidPD=selectedOptionPD.value;
        preciodescuento(selctedidPD);
        
    });


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

        $('#bt_alicar').click(function(){
             aplicadescuento();
            
         });

        $('#busqueda').keyup(function(){ 
        codigopedido=$('#busqueda').val(); 
        busqueda(codigopedido);
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
     
     $("#pidProducto").change(MostarProducto);
     $("#idTipo_moneda").change(cambioMoneda);
    // variables para asignar valores    
    
    asignarValores();
    function agregarprorducto(){
        document.getElementById('agregar_producto').style.display ='block';
        document.getElementById('quitar_btn').style.display='none';
    } 


    function asignarValores(){
        var pro={!! $proforma !!};
        var tabl={!! $tablero !!};
        var nombreClie;
        var apellidoP;
        var apellidoM;
        var direccion;
        var documento;
        var cotiza;
        var formade;
        var nombproyect;
        var plazpOf;
        var obser;
         console.log(tabl);
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
                    var pname=pro[key]['producto2'];
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
                    nombproyect=pro[key]['proyecto'];
                    plazpOf=pro[key]['plazo_oferta'];
                    obser=pro[key]['observacion_proforma']; 
                    descuen=pro[key]['des'];
                    // var dat={idProducto:idProd,producto:pname,descripcionP:pdescripcion,prec_uniP:puni,cantidadP:pcant,descuentoP:descuento,nomTablero:nomTablero,posiP:contp,fila:"",estado:estado,idDetalleProforma:idDetalleProforma};
                    // filaob.push(dat);  
                    // fila();
                    contp++;               
                }
            }
            editarval=false;
            document.getElementById('totales-general').style.display = 'block';
            // cotizador
            $("#nombreclie").val(nombreClie+" "+apellidoP+" "+apellidoM);
            $("#cdireccion").val(direccion);
            $("#cnro_documento").val(documento);
            $("#cotizador").val(cotiza);

            $("#simbolo").val(simbolo);
            $("#valorcambio").val(tipocam);
            $("#forma_de").val(formade);
            $("#nombproyecto").val(nombproyect);///***************************** */
            $("#plazo_oferta").val(plazpOf);
            $("#observacion_proforma").val(obser);
            $("#pdesc").val(descuen);

            
        }         
         for (const tab in tabl) {
             nomTablero=tabl[tab]['nombre_tablero'];
             cantxtabs=tabl[tab]['cantidadTab'];
             var idtable=tabl[tab]['idTableros'];
             var esta=tabl[tab]['estadoT'];
            
             table='<div id="'+nomTablero+'_'+cont+'">'+
                                 '<section class="content" style="min-height:0px !important">'+
                                     '<div class="row">'+
                                         '<div class="col-md-12">'+
                                             '<div class="box">'+
                                                 '<div class="box-header with-border" style="padding:5px !important;">'+
                                                 '<p> Tablero ' +nomTablero.replace(/_/gi," ")+"<br> Cantidad Tab: "+cantxtabs+'</p>'+
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
                                                                     '<th>Quitar</th>'+
                                                                 '</thead>'+
                                                                 '<tbody id="detalle_'+nomTablero+'">'+
                                                                 '</tbody>'+ 
                                                                 '<tr>'+
                                                                    '<th style="color:black !important; border-right:1px solid white !important;" >Total</th>'+
                                                                    '<td style="border-right:1px solid white !important;"></th>'+
                                                                    '<td style="border-right:1px solid white !important;" ></td>'+
                                                                    '<td style="border-right:1px solid white !important;" ></td>'+
                                                                    '<td style="border-right:1px solid white !important;" ></td>'+
                                                                    '<td colspan="2" style="color:black !important; text-align: center;"><h4 id="total_'+nomTablero+'">s/. 0.00</h4>'+
                                                                    '<input style="color:black !important;" type="hidden" name="precio_subtotal_'+nomTablero+'" id="precio_subtotal_'+nomTablero+'">'+         
                                                                     '</td>'+
                                                                '</tr>'+
                                                                '<tr>'+
                                                                     '<th style="color:black !important; border-right:1px solid white !important;" >Total x Cant. de tableros</th>'+
                                                                    '<td style="border-right:1px solid white !important;" ></td>'+
                                                                    '<td style="border-right:1px solid white !important;" ></td>'+
                                                                    '<td style="border-right:1px solid white !important;"></td>'+
                                                                    '<td style="border-right:1px solid white !important;"></td>'+
                                                                     '<td colspan="2" style="color:black !important; text-align: center;"><h4 id="total2_'+nomTablero+'">s/. 0.00</h4>'+
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
             
             var ta={nombre:nomTablero,posi:cont,tablero:table,cantt:cantxtabs,estado:esta,idtablero:idtable}

             
             tablero.push(ta);
             cont++;
         }
         nomTablero="";

         console.log('aca esta ',tablero);

         ListaSelect();

         // console.log(pro); 
         for (const dtp in pro) {
             idprofo=pro[dtp]['idProforma'];
             var idProd=pro[dtp]['idProducto'];
             var pname=pro[dtp]['producto2'];
             var idTablero=pro[dtp]['idTAB'];
             var pdescripcion
             if(pro[dtp]['descripcionDP']==null){
                 pdescripcion='';
             }else{
                 pdescripcion=pro[dtp]['descripcionDP'];
             }
             var puni=pro[dtp]['precio_venta'];
             var pcant=pro[dtp]['cantidad'];
             var descuento=pro[dtp]['descuento'];
             var nomTabl=pro[dtp]['nombre_tablero'];
             var cantiTabl=pro[dtp]['cantidadTab'];
             var idDetaTab=pro[dtp]['idDetalle_tableros'];
             var estado=pro[dtp]['estadoDP'];
             descu=pro[dtp]['des'];

             var dat={idDetalleTablero:idDetaTab,idProducto:idProd,producto:pname,descripcionP:pdescripcion,prec_uniP:puni,cantidadP:pcant,descuentoP:descuento,nomTablero:nomTabl,cantidadTa:cantiTabl,posiP:contp,estado:estado,idTableros:idTablero,desc:descu,fila:""};
             filaob.push(dat);
             fila();
             contp++;
         }
         valoresFinales();  
         console.log(filaob); 
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
     function cambiaropcion(){
        Producto=document.getElementById('pidProducto').value.split('_');
        var tipo_producto=Producto[5];
        var preciouni=Producto[2];
       if(tipo_producto=="Tableros" || preciouni==0.00){
            $('#precio_uni').attr("disabled", false);
        }
        else{
           $('#precio_uni').attr("disabled", true); 
        }
   }
   function mostrarcampos(){
        document.getElementById('producto-crear-oculto').style.display = 'block';
        //document.getElementById('producto-oculto').style.display = 'block';
        // $("#producto-crear-oculto").style.display='block';
        // $("#producto-oculto").style.display='block';
    } 

   function familia(idMarca){
        console.log(idMarca,'-----');
      $.ajax({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{marca:idMarca}, //datos que se envian a traves de ajax
            url:'famT', //archivo que recibe la peticion
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
                    var familia=response.marca;
                    var productos=response.producto;
                    var va;
                    var va2;
                    console.log(familia);
                    va='<option value="" disabled="" selected="">Seleccione</option>'
                    va2='<option value="" disabled="" selected="">Seleccione</option>'
                    for(const i in familia){
                        va+='<option value="'+familia[i]['idFamilia']+'">'+familia[i]['nombre_familia']+'</option>';                
                    }
                    $("#pfamilia").html(va);

                    for(const i in productos){
                    va2+='<option value="'+productos[i]['idProducto']+'">'+productos[i]['codigo_pedido']+' | '+productos[i]['nombre_producto']+' | '+productos[i]['codigo_producto']+' | '+productos[i]['marca_producto']+' | '+productos[i]['descripcion_producto']+'</option>';                 
                    }
                    $("#pproduc").html(va2); 
                }else{
                    alert("problemas al enviar la informacion");
                }
            }
        });
    }
    
//obtener el producto la cual pertenece tanto la familia y obteniendo el precio y decuento
    function producto(idFamilia){
        console.log(idFamilia,'-----');
      $.ajax({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{familia:idFamilia}, //datos que se envian a traves de ajax
            url:'prodT', //archivo que recibe la peticion
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
                    var producto=response.familia;
                    var va;
                    console.log('productowey',producto);
                    va='<option value="" disabled="" selected="">Seleccione</option>'
                    for(const i in producto){
                        va+='<option value="'+producto[i]['idProducto']+'">'+productos[i]['codigo_pedido']+' | '+producto[i]['nombre_producto']+' | '+producto[i]['codigo_producto']+' | '+producto[i]['marca_producto']+' | '+producto[i]['descripcion_producto']+'</option>';                 
                    }
                    $("#pproduc").html(va); 
                }else{
                    alert("problemas al enviar la informacion");
                }
            }
        });
    }


    function preciodescuento(idProducto){
        console.log(idProducto,'-----');
      $.ajax({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{producto:idProducto}, //datos que se envian a traves de ajax
            url:'predesT', //archivo que recibe la peticion
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
                    var preciodescuento=response.producto;
                   
                    
                    console.log('preciounitarioooooooooo',preciodescuento);
                   
                  
                    for(const i in preciodescuento){
                      
                                       
                    }
                    console.log('preciounitarioooooooooo',preciodescuento[0]['producto2']);
                    //$("#pproduc").html(va);
                    $("#precio_uni").val(preciodescuento[0]['precio_unitario']);
                    $("#pdescuento").val(preciodescuento[0]['descuento_familia']);
                    $("#nombreproducto").val(preciodescuento[0]['producto2']); 
                    $("#tipopro").val(preciodescuento[0]['tipo_producto']); 

                    //validacion de cambios de formulario de proecio unitario

                    if(preciodescuento[0]['tipo_producto']=='Tableros' || preciodescuento[0]['precio_unitario']==0.00){

                    $('#precio_uni').attr("disabled", false);

                    }else{

                    $('#precio_uni').attr("disabled", true); 

                         } 
                }else{
                    alert("problemas al enviar la informacion");
                }
            }
        });
    }
     
     function busqueda(codigopedido){

          
        console.log(codigopedido,'-----');
      $.ajax({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{codigop:codigopedido}, //datos que se envian a traves de ajax
            url:'busET', //archivo que recibe la peticion
            type:'post', //método de envio
            dataType:"json",//tipo de dato que envio 
            beforeSend: function () {
                console.log('procesando');
                // $("#resultado").html("Procesando, espere por favor...");
            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                console.log(response);
                if(response.veri==true){
                    var codigoped=response.producto;
                    var va;
                    console.log('productowey',codigoped);
                    va='<option value="" disabled="" selected="">Seleccione</option>'
                    for(const i in codigoped){
                        va+='<option value="'+codigoped[i]['idProducto']+'">'+codigoped[i]['codigo_pedido']+' | '+codigoped[i]['nombre_producto']+' | '+codigoped[i]['codigo_producto']+' | '+codigoped[i]['marca_producto']+' | '+codigoped[i]['descripcion_producto']+'</option>';                 
                    }
                    $("#pproduc").html(va); 
                }else{
                    alert("problemas al enviar la informacion");
                }
            }
        });
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

         var formade=$("#forma_de").val();
         var nombproyect=$("#nombproyecto").val();
         var plazoofer=$("#plazo_oferta").val();
         var obserprof=$("#observacion_proforma").val();
         var descuento=$("#pdesc").val();
         var simb=$("#simbolo").val();
         var tipocam=$("#valorcambio").val();



             var dat=[{idProforma:idprofo,idcliente:idcliente,valorVenta:valorventa,total:totalt,forma_de:formade,nombproyecto:nombproyect,plazo_oferta:plazoofer,desc:descuento,obspro:obserprof,simbolo:simb,valorTipoCambio:tipocam}];
             console.log(dat,tablero,filaob);

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
        var cantt=$("#canTT").val();
        nomTablero=tabl.replace(/ /gi,"_");  
        bool=false;  
        if(tabl!='' && $("#simbolo").val()!='' && $("#valorcambio").val()!='' && $("#igv_tipocambio").val()!='' ){
            mostrarcampos();
            // fila();
            if(tablero.length>=0 && nomTablero!="" && cantt!=""){
                //for para evitar tablas con el  mismo nombre sin iportar las mayusculas o minisculas
                for (const key in tablero) {
                    if (tablero.hasOwnProperty(key)) {
                        if(tablero[key]['nombre'].toLowerCase()==nomTablero.toLowerCase()){  
                            tablero[key]['cantt']=$("#canTT").val();
                            table=tablerosView(nomTablero,cont,cantt);
                            tablero[key]['tablero']=table;
                            bool=true; 
                        }                                       
                    }
                }
                //if que compara e inserta la tabla contenedora de los produtos vacia.
                if(bool==false ){  
                    table=tablerosView(nomTablero,cont,cantt);
                    var ta={nombre:nomTablero,posi:cont,tablero:table,estado:2,cantt:cantt};
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

    function tablerosView(nomTablero,cont,cantt){
        table='<div id="'+nomTablero+'_'+cont+'" style="color: #f5f5f5 !important;">'+
            '<section class="content" style="min-height:0px !important">'+
                '<div class="row">'+
                    '<div class="col-md-12">'+
                        '<div class="box">'+
                            '<div class="box-header with-border" style="padding:5px !important;">'+
                            '<p> Tablero: ' +nomTablero.replace(/_/gi," ")+"<br> Cantidad Tab: "+cantt+'</p>'+
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
                                                '<th>Quitar</th>'+
                                                //'<th></th>'+
                                            '</thead>'+
                                            '<tbody id="detalle_'+nomTablero+'">'+
                                            '</tbody>'+ 
                                            '<tr>'+
                                                '<th style="color:black !important; border-right:1px solid white !important;" >Total</th>'+
                                                '<td style="border-right:1px solid white !important;"></th>'+
                                                '<td style="border-right:1px solid white !important;" ></td>'+
                                                '<td style="border-right:1px solid white !important;" ></td>'+
                                                '<td style="border-right:1px solid white !important;" ></td>'+
                                                '<td colspan="2" style="color:black !important; text-align: center;"><h4 id="total_'+nomTablero+'">s/. 0.00</h4>'+
                                                '<input style="color:black !important;" type="hidden" name="precio_subtotal_'+nomTablero+'" id="precio_subtotal_'+nomTablero+'">'+         
                                                 '</td>'+                                                                     
                                            '</tr>'+
                                                 '<tr>'+
                                                 '<th style="color:black !important; border-right:1px solid white !important;" >Total x Cant. de tableros</th>'+
                                                '<td style="border-right:1px solid white !important;" ></td>'+
                                                '<td style="border-right:1px solid white !important;" ></td>'+
                                                '<td style="border-right:1px solid white !important;"></td>'+
                                                '<td style="border-right:1px solid white !important;"></td>'+
                                                 '<td colspan="2" style="color:black !important; text-align: center;"><h4 id="total2_'+nomTablero+'">s/. 0.00</h4>'+
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
        return table;
    }
     function agregarProductosTablero(){    
         var idProd=$("#pproduc").val();
        var pname=$("#nombreproducto ").val();
         var pdescripcion=$("#descripcionp ").val();
         var puni=$('#precio_uni').val();
         var pcant=$('#Pcantidad').val();
         var sel=$('#prod-selec').val();
         var descuento=$('#pdescuento').val();
         var cantiTabl=$('#canTT').val();
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
                                     var cxtb=parseInt(cantiTabl);
                                     var precuni=parseFloat(puni);
                                     filaob[fil]['cantidadP']=su;
                                     filaob[fil]['descuentoP']=des;
                                     filaob[fil]['cantidadTa']=cxtb;
                                     filaob[fil]['descripcionP']=pdescripcion;
                                     filaob[fil]['prec_uniP']=precuni;
                                     filaob[fil]['estado']=1;
                                     fila();
                                     boolfila=true;
                                     console.log("Actualizar producto"); 
                    
                                 }                
                             }
                         }
                         if(boolfila==false){
                             console.log("produc nuevoo",contp);
                             var dat={idProducto:idProd,producto:pname,descripcionP:pdescripcion,prec_uniP:puni,cantidadP:pcant,descuentoP:descuento,nomTablero:nomTablero,cantidadTa:cantiTabl,posiP:contp,estado:2,fila:""};
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
                 if (tablero.hasOwnProperty(key) && tablero[key]['estado']!=0) {
                     // $("#detalle_"+tablero[key]['nombre']).load();
                     for (const fila in filaob) {
                         if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']!=0) {                            
                             var cantidad=parseFloat(filaob[fila]['cantidadP']);
                             var precio=parseFloat(filaob[fila]['prec_uniP']);
                             var descuento=parseFloat(filaob[fila]['descuentoP']);
                             var cantidadTab=parseFloat(filaob[fila]['cantidadTa']);

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
                                             '<input type="hidden" disabled name="pcant'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['cantidadP']+'">'+filaob[fila]['cantidadP']+
                                         '</td>'+
                                         '<td style="color:black !important;"> '+   
                                             '<input type="hidden" disabled name="preuni'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['prec_uniP']+'" >'+filaob[fila]['prec_uniP']+
                                         '</td>'+
                                         '<td style="color:black !important;"> '+   
                                             '<input type="hidden" disabled name="pdescu'+filaob[fila]['nomTablero']+'[]" value="'+filaob[fila]['descuentoP']+'" >'+filaob[fila]['descuentoP']+
                                         '</td>'+
                                         '<td style="color:black !important;"> '+   
                                             '<input type="hidden" disabled name="ptotal'+filaob[fila]['nomTablero']+'[]" value="'+subt +'">'+subt.toFixed(2)+
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
         var sub2=0;
         if(tablero.length>0){
             for (const key in tablero) {
                 if (tablero.hasOwnProperty(key) && tablero[key]['estado']!=0) {
                     for (const fila in filaob) {
                         if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']!=0) {
                             if(tablero[key]['nombre']==filaob[fila]['nomTablero']){
                                 // (cantidad*precio)-((cantidad*precio)*(cantidad*(descuento/100)));
                                 var precio=parseFloat(filaob[fila]['prec_uniP']);
                                 var cantidad=parseFloat(filaob[fila]['cantidadP']);
                                 var descuento=parseFloat(filaob[fila]['descuentoP']);
                                 var cantidadTab=parseFloat(filaob[fila]['cantidadTa']);

                                 sub+=(cantidad*precio)-((precio*(descuento/100)*cantidad));
                                 sub2+=((cantidad*precio)-((precio*(descuento/100)*cantidad)))*cantidadTab;
                                 // console.log(sub,"---");
                             }                            
                         }
                     }   
                     // console.log(sub);
                     $("#total_"+tablero[key]['nombre']).html("s/. " + sub.toFixed(2));
                     $("#total2_"+tablero[key]['nombre']).html("s/. " + sub2.toFixed(2));                 
                 }
                 sub=0;
                 sub2=0;
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
             if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']!=0) {
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
     var boolean_dolar=false;

     function total(){
         var venta=0;   
         var igv=0;  
         var tota=0;   
         for (const fila in filaob) {
             if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']!=0) {
                 var precio=parseFloat(filaob[fila]['prec_uniP']);
                 var cantidad=parseFloat(filaob[fila]['cantidadP']);
                 var descuento=parseFloat(filaob[fila]['descuentoP']);
                 // var subt=(cantidad*precio)-((precio*(descuento/100)*cantidad));
                 venta+=(cantidad*precio)-((precio*(descuento/100)*cantidad));
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
         totalxtableros();
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
     function aplicadescuento(){       
        var venta=0;   
         var igv=0;  
         var tota=0;
        var descu=0;  
         
         for (const fila in filaob) {
             if (filaob.hasOwnProperty(fila) && filaob[fila]['estado']!=0) {
                 var precio=parseFloat(filaob[fila]['prec_uniP']);
                 var cantidad=parseFloat(filaob[fila]['cantidadP']);
                 var descuento=parseFloat(filaob[fila]['descuentoP']);
                 var descuento2=$('#pdesc').val();
                 // var subt=(cantidad*precio)-((precio*(descuento/100)*cantidad));
                venta+=(cantidad*precio)-((precio*(descuento/100)*cantidad));
                 // console.log(sub);                        
             }
         }
         tota2=venta-(venta*(descuento2/100));
         igv=venta*0.18;
         tota=(venta+igv)-((venta+igv)*(descuento2/100));
         
         

         $("#descuentos1").html("s/. " + tota2.toFixed(2));
        $("#descuentos2").html("s/. " + tota.toFixed(2));

                 
     }

     function ocultar(){
         tablero.length>0
         if (0<tablero.length && 0<filaob){
             
         }
     }
      function totalxtableros(){
        var venta=0;   
        var igv=0;  
        var tota=0;   
        for (const fila in filaob) {
            if (filaob.hasOwnProperty(fila)) {
               var precio=parseFloat(filaob[fila]['prec_uniP']);
               var cantidad=parseFloat(filaob[fila]['cantidadP']);
               var descuento=parseFloat(filaob[fila]['descuentoP']);
               var cantidadTab=parseFloat(filaob[fila]['cantidadT']);


                
                venta+=((cantidad*precio)-((precio*(descuento/100)*cantidad)))*cantidadTab;
                        
            }
        }

        
        tota=venta;
        totalt2=tota.toFixed(2);

        $("#totalxtab").html("s/. " + tota.toFixed(2));
    }
 </script>
 @endpush
 @endsection