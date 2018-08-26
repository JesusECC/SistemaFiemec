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

    <div class="row">
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

    <div class="card">
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
                        <input type="text" id="NomTablero" class="form-control" name="NomTablero" >
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
        <div id="tablerosn" >
        </div>   
    <!-- JOSE CORRIGE EL MARGIN DEL BOTON VOLVER CTMR!!!! -->
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
    //var nomTablero;
    $("#pidProducto").change(MostarProducto);
    //$("#bt_add_tablero").change($("#total").html("s/. " + subtotal));

    function MostarProducto(){
        Producto=document.getElementById('pidProducto').value.split('_');
        $("#idProd").val(Producto[0]);
        $("#Productoname").val(Producto[1]);
        $("#precio_uni").val(Producto[2]);
    }

    function agregarProductosTablero(){    
        var idProd=$('#idProd').val();
        var pname=$("#Productoname ").val();
        var puni=$('#precio_uni').val();
        var pcant=$('#Pcantidad').val();
        var nomTablero=$("#NomTablero").val();
        var filas;
        
        if(tablero.length>=0 && nomTablero!="" && idProd!="" && pname!="" && puni!="" && pcant!="" && nomTablero!=""){
            var bool=Boolean(tablero.includes(nomTablero));
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
                                                '<i class="fa fa-times"></i>'+
                                        '</button>'+
                                    '</td>'+
                                '</tr>';
                            $('#detalle_'+nomTablero).append(filas);
                            // $("#total_"+nomTablero).html("s/. " + subtotal);
            }        
            //console.log(filas);
            var dat={nombre:nomTablero,fila:filas,subtotal:pcant*puni,posi:contp};
            filaob.push(dat);
            //console.log(filaob,contp)

        }
        nomtablero="";
    }
    function agregarTablero(){    
        var nomTablero=$("#NomTablerop").val();
        //console.log(nomTablero);
        
        if(tablero.length>=0 && nomTablero!=""){
            var bool=Boolean(tablero.includes(nomTablero));
            
            console.log(bool);
            if(bool!=true ){
                tablero[cont]=nomTablero;
                table+='<div class="panel panel-default">'+
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
                        '</div>'+
                        '<table class="table table-striped table-bordered table-condensed table-hover">'+
                            '</tbody>'+ 
                                '<tfoot>'+
                                    '<th colspan="3" >Total</th>'+
                                    '<th><h4 id="total">s/. 0.00</h4><input type="hidden" name="precio_subtotal" id="precio_subtotal"></th>'+
                                '</tfoot>'+
                            '</table>'+
                        '</table>';
            } cont++;       
        }
        
        $('#tablerosn').html(table);
        if(tablero.length>0){
            for (var i = 0; i < tablero.length; i++) {
                for (var key in filaob) {
                    if (filaob.hasOwnProperty(key)) {
                        if(tablero[i]==filaob[key]['nombre'])
                        $('#detalle_'+tablero[i]).append(filaob[key]['fila']);
                    }
                }
            }
        }
        //nomtablero="";
    }

    function eliminar(index){
            //$("#"+nomtab).remove();
            for (var key in filaob) {
                    if (filaob.hasOwnProperty(key)) {
                        if(index==filaob[key]['posi']){
                            $("#fila_"+filaob[key]['nombre']+'_'+index).remove();
                            filaob.splice(key,1);
                            
                    }
                }
            }  
    }
    function eliminarTablero(a){
        for (const key in tablero) {
            if (tablero.hasOwnProperty(key)) {
                console.log(tablero);

                console.log(tablero[key],a,key);
                
            }
        }
    }
</script>
@endpush
@endsection