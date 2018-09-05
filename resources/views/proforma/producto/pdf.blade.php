@extends ('layouts.admin')
@section ('contenido')

<div class="row">
    	<div class="panel panel-primary">
            <div class="panel-body">
    	   

            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            	<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
            		<thead style="background-color:#A9D0F5">

            			
            			<th>Producto</th>
            			<th>cantidad</th>
            		
            		</thead>


            		<tfoot>
            			
            			<th></th>
            			<th></th>
            			<th></th>
            			<th></th>
            			<th>

            		</tfoot>
            		<tbody>
            			@foreach($productos as $det)
                        <tr>
                            <td>{{$det->idProducto}}</td>
                            <td>{{$det->nombre}}</td>
                          
                        </tr>

                        @endforeach

            		</tbody>


            		
            	</table>


         
               </div>
            </div>
      </div>
</div>
</div>    
   



@endsection

