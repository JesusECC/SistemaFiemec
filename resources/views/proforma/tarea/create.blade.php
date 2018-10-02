@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<h3>Nuevo Ingreso</h3>
	@if (count($errors)>0)
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

    {!!Form::open(array('url'=>'proforma/tarea','method'=>'POST','autocomplete'=>'off'))!!}

    {{Form::token()}}



<div class="box-body bg-gray-c">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-default panel-shadow">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="" class="control-label" style="color: #676a6c !important">
                                            Tareas
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <input type="text" id="pnombre_tarea" class="form-control" placeholder="Ingrese nueva tarea">
                                                    
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="button" id="bt_add" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar</button>
                                        </div>
                                    
                                    
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                 </div>
  
             </div>
            

            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            	<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
            		<thead style="background-color:#A9D0F5">
            			<th>opciones</th>
            			<th>Tareas</th>
            			
            		</thead>
            		<tfoot>
            			
            			<th></th>
            			<th></th>
            			
            			

            		</tfoot>
            		
            	</table>
            	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
       <div class="from-group">
       	    <input name"_token" value="{{ csrf_token() }}" type="hidden"></input>
	       <button class="btn btn-primary" type="submit">guardar</button>
	       <button class="btn btn-danger" type="reset">cancelar</button>
        </div>
      </div>
</div>
            	
      </div>
            </div>
      </div>
</div>

    
   

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
   

    if(tarea!="")
    {
       

       var fila='<tr class="selected" id="fila'+cont+'"> <td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="nombre_tarea[]" value="'+tarea+'">'+tarea+'</td> </tr>';
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