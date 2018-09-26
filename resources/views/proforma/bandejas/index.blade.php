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
    			<i class="fas fa-clipboard-list"></i> Proforma</a>
    	</li>
    	<li class="active">Lista Proforma Bandejas</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border" style="padding: 10px !important">
					<h4>
						<strong style="font-weight: 400">
							<i class="fas fa-list-ul"></i> Lista de Productos Fiemec
						</strong>
					</h4>
					<div class="ibox-title-buttons pull-right">
						<a href="{{route('bandejas-create')}}" style="text-decoration: none !important">
							<button class="btn btn-block btn-success" style="background-color: #18A689 !important;border: 1px solid #18A689 !important ">
								<i class="fas fa-plus-circle"></i> Nuevo Proforma Bandeja
							</button></a>
					</div>
				</div>
                <!-- /.box-header -->
				<div class="box-body">
					<table id="example" class="table table-striped table-bordered table-hover" style="width:100%;font-size: 11px !important">
				       <thead>
				            <tr>
				                <th>Fecha</th>
				                <th>Comprobante</th>
				                <th>Nombre</th>
				                <th>Acciones</th>
				            </tr>
				        </thead>
				        <tbody>
				        	@foreach ($proformas as $prof)
				        	<tr>
				        		<td>
				        			{{$prof->fecha_hora}}
				        		</td>
				        		<td>
				        			{{$prof->serie_proforma.' /  f000-'.$prof->idProforma}}
				        		</td>
				        		<td>
				        			{{$prof->nombre}}
				        		</td>
				        		<td align="center">
				        			<a  href="{{route('bandejas-show',$prof->idProforma)}}"  class="btn btn-primary btn-xs" title="Ver Bandejas"><i class="far fa-eye"></i> </a>
									<a href="{{route('producto-edit',$prof->idProforma)}}" class="btn btn-success btn-xs" role="button"><i class="fas fa-edit" title="Editar Producto"></i> </a>
									<a href="" data-target="#modal-delete-{{$prof->idProforma}}"  data-toggle="modal" class="btn btn-danger btn-xs" title="Anular Bandeja"><i class="fas fa-trash-alt"></i> </a>
								</td>
							</tr>
							@include('proforma.bandejas.modal')
							@endforeach
				        </tbody>
    				</table>
				</div>
				{{$proformas->render()}}
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
</section><!-- /.content -->
@endsection