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
    <label class="control-label">Ingresar Nombre de tablero</label>
    <div class="form-group">
        <div class="input-group">
            <input type="text" class="form-control" name="NomTablerop" id="NomTablerop" placeholder="Ingresar nombre del tablero..." >
            <samp class="input-group-btn">
                <button type="button" id="bt_add_tablero" class="btn btn-primary">Agregar</button>
            </samp>
        </div>
    </div>

    <div class="row" id="producto-oculto" style='display:none;'>
        <div class="col-sm-7">
            <div class="form-group label-floating">
                <label class="control-label">Producto</label>
                <select name="pidProducto" class="form-control selectpicker" id="pidProducto" data-live-search="true">
                    @foreach($productos as $producto)
                        <option value="{{ $producto->idProducto }}_{{ $producto->nombre_producto }}_{{ $producto->precio_unitario }}">{{ $producto->nombre_producto }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    {!!Form::open(array(route('tablero-store'),'method'=>'POST','autocomplete'=>'off'))!!}
    @csrf

    <div class="card" id="producto-crear-oculto" style='display:none;'>
        <div class="card-header">
        Producto
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group label-floating">
                        <label class="control-label">Producto</label>
                        <input type="hidden" id="idProd" name="idProd" disabled>
                        <input type="text" id="Productoname" class="form-control" name="Productoname" disabled>
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="form-group label-floating">
                        <label class="control-label">P. UNIT.</label>
                        <input type="number"  id="precio_uni" class="form-control" name="precio_uni"  disabled>
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="form-group label-floating">
                        <label class="control-label">Cantidad</label>
                        <input type="number" id="Pcantidad" class="form-control" name="Pcantidad" >
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group label-floating">
                        <label class="control-label">Nombre Tablero</label>
                        <!-- <input type="text" id="NomTablero" class="form-control" name="NomTablero" > -->
                        <div id="select-pro" >s</div>
                    </div>
                </div

                <div class="col-sm-1">
                    <div class="form-group label-floating">
                    <label class="control-label"></label>
                        <button type="button" id="bt_add_produc" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div id="tablerosn">
        
        </div>   
        <div>
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
            </table>
        </div>
    <div style="margin-top: 20px" class="from-group ">

        <button class="btn btn-primary" type="submit">guardar</button>
        <button class="btn btn-danger" type="reset">Limpiar</button>
        <button style="margin-left: 300px" class="btn btn-success " type="button"><a style="color: white!important" href="">volver</a></button>


    </div>

    </div>


    {!!Form::close()!!}

</div>

@push('scripts')
<script>
    $(document).ready(function(){
        $('#bt_add_tablero').click(function(){
            agregarTablero();
            mostrarcampos();
        });
        $('#bt_add_produc').click(function(){
            agregarProductosTablero();
        });
    });
    var tablero=[];
    var filaob=[];
    var cont=0;
    var contp=0;
    var table;
    var subtotal=0;
    var nomTablero;
    $("#pidProducto").change(MostarProducto);
    //$("#bt_add_tablero").change($("#total").html("s/. " + subtotal));

    function MostarProducto(){
        Producto=document.getElementById('pidProducto').value.split('_');
        $("#idProd").val(Producto[0]);
        $("#Productoname").val(Producto[1]);
        $("#precio_uni").val(Producto[2]);
    }
    function mostrarcampos(){
        document.getElementById('producto-crear-oculto').style.display = 'block';
        document.getElementById('producto-oculto').style.display = 'block';
        // $("#producto-crear-oculto").style.display='block';
        // $("#producto-oculto").style.display='block';
    } 

    function agregarProductosTablero(){    
        var idProd=$('#idProd').val();
        var pname=$("#Productoname ").val();
        var puni=$('#precio_uni').val();
        var pcant=$('#Pcantidad').val();
        var sel=$('#prod-selec').val();
        nomTablero=$('#prod-selec').val();
        var filas;
        // console.log(nomTablero,sel);
        if(tablero.length>=0 && nomTablero!="" && idProd!="" && pname!="" && puni!="" && pcant!="" && nomTablero!=""){
            var bool=false;
            for (const key in tablero) {
                if (tablero.hasOwnProperty(key)) {
                    if(tablero[key]['nombre']==nomTablero){
                        bool=true;
                    }                    
                }
            }
            contp++;
            if(bool==true ){
                subtotal+=pcant*puni;
                        filas=
                                '<tr class="selected" id="fila_'+nomTablero+'_'+contp+'">'+
                                    '<td> '+ 
                                        '<input type="hidden" name="idpod_'+nomTablero+'[]" value="'+idProd+'">'+pname+
                                    '</td>'+
                                    '<td> '+ 
                                        '<input type="number" disabled name="pcant'+nomTablero+'[]" value="'+pcant+'">'+
                                    '</td>'+
                                    '<td> '+   
                                        '<input type="number" disabled name="preuni'+nomTablero+'[]" value="'+puni+'">'+
                                    '</td>'+
                                    '<td> '+   
                                        '<input type="number" disabled name="ptotal'+nomTablero+'[]" value="'+pcant*puni+'">'+
                                    '</td>'+
                                    '<td>'+
                                        '<button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs" onclick="eliminar('+contp+');">'+
                                                '<i class="fas fa-trash"></i>'+
                                        '</button>'+
                                    '</td>'+
                                '</tr>';
                            $('#detalle_'+nomTablero).append(filas);
                            // console.log(filas);
                            var dat={nombre:nomTablero,fila:filas,subtotal:pcant*puni,posi:contp};
                            filaob.push(dat);
                            subTotalTable();
                            subTotal();
            }        
        }
        nomtablero="";
    }
    var bool;
    function agregarTablero(){    
        var tabl=$("#NomTablerop").val();
        nomTablero=tabl.replace(/ /gi,"_");  
        bool=false;  
        if(tablero.length>=0 && nomTablero!=""){
            //for para evitar tablas con el  mismo nombre execto las cuando inicia con mayusculas   
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
                                                        '<table id="detalle_'+nomTablero+'" class="table table-striped table-bordered table-condensed table-hover">'+
                                                            '<thead style="background-color:#A9D0F5">'+
                                                                '<th>Producto</th>'+
                                                                '<th>Cant.</th>'+
                                                                '<th>P. Unit.</th>'+
                                                                '<th>Importe</th>'+
                                                                //'<th></th>'+
                                                            '</thead>'+
                                                            '<tbody>'+
                                                            '</tbody>'+ 
                                                            '<tfoot>'+
                                                                '<th>Total</th>'+
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
                        '</div>'
                
                            '<div class="panel-heading">'+
                                '<h3 class="panel-title">Tablero '+nomTablero+'</h3>'+
                                '<button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs" onclick="eliminarTablero('+cont+');">'+
                                                '<i class="fa fa-times"></i>'+
                                        '</button>'+
                            '</div>'+
                            '<div class="panel-body">'+
                                '<table id="detalle_'+nomTablero+'" class="table table-striped table-bordered table-condensed table-hover">'+
                                    '<thead style="background-color:#A9D0F5">'+
                                        '<th>Producto</th>'+
                                        '<th>Cant.</th>'+
                                        '<th>P. Unit.</th>'+
                                        '<th>Importe</th>'+
                                        //'<th></th>'+
                                    '</thead>'+
                                    '<tbody>'+
                                    '</tbody>'+ 
                                    // '<tfoot>'+
                                    //     '<th>Total</th>'+
                                    //     '<th></th>'+
                                    //     '<th></th>'+
                                    //     '<th><h4 id="total_'+nomTablero+'">s/. 0.00</h4><input type="hidden" name="precio_subtotal_'+nomTablero+'" id="precio_subtotal_'+nomTablero+'">'+
                                    //     '</th>'+
                                    // '</tfoot>'+
                                '</table>'+
                            '</div>'+
                        '</div>';
            var ta={nombre:nomTablero,posi:cont,tablero:table}
            tablero.push(ta);                        
            } cont++;       
        }
        // console.log(table);
        nomTablero="";
        // realiza el listado de todas los tableros que se añaden
        ListaSelect()
       // mantiene en la vista las filas cuando se agrega una nueva tabla
        detalleFilas();
        //nomtablero="";
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
            var selec='<select name="prod-selec" id="prod-selec"  >'+
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
        if(tablero.length>0){
            for (var keyt in tablero) {
                for (var key in filaob) {
                    if (filaob.hasOwnProperty(key)) {
                        if(tablero[keyt]['nombre']==filaob[key]['nombre'])
                        $('#detalle_'+tablero[keyt]['nombre']).append(filaob[key]['fila']);
                    }
                }
            }
        }
        subTotalTable();
    }
    function subTotalTable(){
        // funcion para realizar la suma del sub total de todos los tableros que se declaran
        var sub=0;
        if(tablero.length>0){
            for (const key in tablero) {
                if (tablero.hasOwnProperty(key)) {
                    for (const fila in filaob) {
                        if (filaob.hasOwnProperty(fila)) {
                            if(tablero[key]['nombre']==filaob[fila]['nombre']){
                                sub+=filaob[fila]['subtotal'];
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
        var sub=0;
        for (const fila in filaob) {
            if (filaob.hasOwnProperty(fila)) {
                sub+=filaob[fila]['subtotal'];                            
            }
        }   
        // console.log(sub);
        $("#subtotal").html("s/. " + sub);
    }

    function eliminar(index){
            //$("#"+nomtab).remove();
            for (var key in filaob) {
                    if (filaob.hasOwnProperty(key)) {
                        if(index==filaob[key]['posi']){
                            $("#fila_"+filaob[key]['nombre']+'_'+index).remove();
                            filaob.splice(key,1);
                            // console.log(filaob);
                            
                    }
                }
            }  
    }
    function eliminarTablero(a){

        // console.log(tablero,filaob);
        for (const key in tablero) {
            if (tablero.hasOwnProperty(key)) {
                if(a==tablero[key]['posi']){
                    //console.log(a);        
                    //console.log(tablero);
                    for (var k in filaob) {
                        if (filaob.hasOwnProperty(k)) {
                            if(tablero[key]['nombre']==filaob[k]['nombre']){
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
    }
</script>
@endpush
@endsection