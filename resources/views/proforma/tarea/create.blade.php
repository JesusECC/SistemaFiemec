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
                <i class="fas fa-book"></i> Tareas</a>
        </li>
        <li class="active">Fiemec</li>
        <li>
            <a href="#">
             Nuevo</a>
        </li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box" style="border-top: 3px solid #18A689">
                <div class="box-header with-border" style="padding: 10px !important">
                    <h4>
                        <strong style="font-weight: 400">
                            <i class="fas fa-users"></i> Registro de Tarea
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
            </div>
            <!-- /.box-header -->
            {!!Form::open(array('url'=>'proforma/tarea','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            <div class="box-body bg-gray-c">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="nav-tabs-custom">
                            <div class="tab-content">
                                <div class="active tab-pane" >
                                    <div class="panel panel-default panel-shadow">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label for="" class="control-label" style="color: #676a6c !important">
                                                    Tareas
                                                </label>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input type="text" id="pnombre_tarea" class="form-control" placeholder="Ingrese nueva tarea">
                                                        <samp class="input-group-btn">
                                                            <button type="button" id="bt_add" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar</button>
                                                        </samp>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 20px">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <input type="number" id="pprecioT" class="form-control" placeholder="Ingrese precio">   
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="nav-tabs-custom">
                            <div class="tab-content">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                            <thead style="background-color:#A9D0F5">
                                                <th>Tareas</th>
                                                <th>Precio</th>
                                                <th>Opciones</th>
                                            </thead>
                                            <tfoot>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tfoot>
                                        </table>
                                    </div>                                            
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div><!-- /.row -->
            </div>
            <div class="box-footer">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
                    <div class="from-group">
                        <input name"_token" value="{{ csrf_token() }}" type="hidden">
                        <button class="btn btn-primary btn-sm" type="submit"><i class="far fa-save"></i> Guardar</button>
                       <button class="btn btn-danger btn-sm" type="reset"><i class="far fa-times-circle"></i> Cancelar</button>
                        <button  class="btn btn-success btn-sm " type="button"><a style="color: white!important;text-decoration: none" href="{{url('proforma/tarea')}}"><i class="fas fa-reply-all"></i> Volver</a></button>
                    </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section><!-- /.content -->
 {!!Form::close()!!}

@push('scripts')
<script>
$(document).ready(function(){
    $('#bt_add').click(function(){
        agregar();
    });
});

var cont=0;


$("#guardar").show();

function agregar()
{
    
    tarea=$("#pnombre_tarea").val();
    precio=$("#pprecioT").val();
   

    if(tarea!="")
    {
       
       var fila='<tr class="selected" id="fila'+cont+'"><td><input type="hidden" name="nombre_tarea[]" value="'+tarea+'">'+tarea+'</td> <td><input type="hidden" name="precioT[]" value="'+precio+'">'+precio+'</td><td><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button></td></tr>';
       cont++;
       limpiar();
       evaluar();
       $('#detalles').append(fila);

    }
    else
    {
        alert("erros al ingresar el detale del ingreso, revise los datos del articulo");
    }
}


   
    function limpiar(){
        $("#pnombre_tarea").val("");
        
    }

    function evaluar()
    {
        if(cont<0)
        {
            $("#guardar").hide();
        }
        else
        {
            $("#guardar").show();
        }
    }
 function eliminar(index){
        
        $("#fila" + index).remove();
        evaluar();
    }

</script>

@endpush
@endsection