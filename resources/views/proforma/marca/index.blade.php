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
    			<i class="fas fa-dolly"></i> Empleados</a>
    	</li>
    	<li class="active">Lista Fiemec</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border" style="padding: 10px !important">
					<h4>
						<strong style="font-weight: 400">
							<i class="fas fa-list-ul"></i> Listado De Empleados Fiemec
						</strong>
					</h4>
					<div class="ibox-title-buttons pull-right">
						<a href="{{route('marca-create')}}" style="text-decoration: none !important">
							<button class="btn btn-block btn-success" style="background-color: #18A689 !important;">
								<i class="fas fa-plus-circle"></i> Nuevo Empleado
							</button></a>
					</div>
				</div>
                <!-- /.box-header -->
				<div class="box-body">
					<table id="example" class="table table-striped table-bordered table-hover" style="width:100%;font-size: 11px !important">
				       <thead>
				            <tr>
				                <th>Marca</th>
				                 <th>Familia</th>
				                 <th>Descuento</th>
				                 
				               
				            </tr>
				        </thead>
				        <tbody>
				        	@foreach($marcas as $m)
				        	<tr>
				        		<td>
				        			{{$m->nombre_proveedor}}
				        		</td>
                               <td>
				        			{{$m->nombre_familia}}
				        		</td>
				        		 <td>
				        			{{$m->descuento_familia}}
				        		</td>
				       
				        		<td align="center">
				      
									<a href="{{route('marca-edit',$m->idMarca)}}" class="btn btn-success btn-xs" role="button"><i class="fas fa-edit" title="Editar Producto"></i> </a>
									
								</td>
                            </tr>
                           
				        		
							@endforeach
				        </tbody>
    				</table>
    				{{$marcas->render()}}
				</div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
</section><!-- /.content -->
@endsection

