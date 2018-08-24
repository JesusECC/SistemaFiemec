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

    <div class="row">
        <div class="col-sm-7">
            <div class="form-group label-floating">
                <label class="control-label">Producto</label>
                <select name="pidProducto" class="form-control selectpicker" id="pidProducto" data-live-search="true">
                    @foreach($productos as $producto)
                        <option value="{{ $producto->idProducto }}">{{ $producto->nombre_producto }}</option>
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
                        <input type="text" id="Productoname" class="form-control" name="Productoname" disabled>
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="form-group label-floating">
                        <label class="control-label">P. UNIT.</label>
                        <input type="number"  id="precio_uni" class="form-control" name="precio_uni" value="{{ old('price') }}" disabled>
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="form-group label-floating">
                        <label class="control-label">Cantidad</label>
                        <input type="number" id="Pcantidad" class="form-control" name="Pcantidad" value="{{ old('price') }}" >
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
                        <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            	<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">

            		<thead style="background-color:#A9D0F5">
            			<th>Item</th>
            			<th>Descripcion</th>
            			<th>Uni.</th>
                        <th>Cant.</th>
            			<th>P. Unit.</th>
            			<th>Importe</th>
            		</thead>
            		<tfoot>
            			<th>total</th>
            			<th></th>
            			<th></th>
            			<th></th>
            			<th></th>
            			<th><h4 id="total">s/. 0.00</h4><input type="hidden" name="precio_total" id="precio_total">
                        </th>

            		</tfoot>
            		   <tbody>
            	    </tbody>            		
            	</table>  

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
    $('#bt_add').click(function(){
        agregarTablero();
    });
});
var tablero=[];
var cont=0;
var table;
var nomTablero;
function agregarTablero(){
    
    nomTablero=$("#NomTablero").val();
    console.log(tablero.includes(nomTablero));
    var bool=Boolean(tablero.includes(nomTablero));
    if(tablero.length>=0 && nomTablero!=""){
        tablero[cont]=nomTablero;
        cont++;
        if(bool!=true ){
            table+='<div class="panel panel-default">'+
                    '<div class="panel-heading">'+
                        '<h3 class="panel-title">'+nomTablero+'</h3>'+
                    '</div>'+
                    '<div class="panel-body">'+
                        nomTablero+
                    '</div>'+
                '</div>';
        }else{
            console.log("anademe");
        }
    }
    nomtablero="";
    for (var i = 0; i < tablero.length; i++) {
        console.log(tablero[i]);
    }
    $('#tablerosn').html(table);
    // if(tablero.length >0){
    //     tablero.push(nomTablero);
    // }

}

    
</script>

@endpush

@endsection