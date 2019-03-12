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
    		<i class="fas fa-dolly"></i> Productos</a>
    	</li>
    	<li class="active">Catálogo</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border" style="padding: 10px !important">
					<h4>
						<strong style="font-weight: 400">
							<i class="fas fa-list-ul"></i> Catalogo de Productos
						</strong>
					</h4>
				</div>
                <!-- /.box-header -->
				<div class="box-body">
					<div class="row">
						<div class="col-lg-4"></div>
						<div class='col-lg-8 col-sm-8 col-xs-12'>
                            
                            

							@include('proforma.catalogo.search')
						</div>	
					</div>
					<div class="row">
						@foreach($catalogos as $pro)
						<div class="col-sm-3">
							<div class="box box-success">
								<div class="box-header with-border" style="padding-top: 20px !important;padding-bottom: 10px !important;padding-left: 10px  !important;padding-right: 10px !important">
									<h5 style="font-size: 12px; ">{{$pro->nombre_producto}}</h5>
									<!--<div class="box-tools pull-right">
										<button  type="button" class="btn btn-box-tool" data-widget="collapse">
											<i class="fa fa-minus"></i>
										</button>
									</div>-->
								</div>
								<div class="box-body">
									<img src="{{asset('img/'.$pro->foto)}}"  alt="180px" width="180px">
									<br>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon" style="padding: 5px 5px !important;font-size: 12px !important">
														S/. 
													</span>
													<input type="text" class="form-control" disabled="" value="{{$pro->precio_unitario}}" style="height: 30px !important;padding: 6px 4px !important;font-size: 11px !important;text-align: center;">
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon" style="padding: 5px 5px !important;font-size: 12px !important">
														$. 
													</span>
													<input type="text" class="form-control" disabled="" value="{{round($pro->precio_unitario/$tipomenda[0]->tipo_cambio,2)}}" style="height: 30px !important;padding: 6px 4px !important;font-size: 11px !important;text-align: center;">
												</div>
											</div>											
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<i class="fas fa-boxes"></i> Stock : {{$pro->stock}}
										</div>
										<div class="col-sm-6">
											<i class="fas fa-barcode"></i> Código : {{$pro->codigo_producto}} 
											

										</div>
									</div>
								</div>
								<div class="box-footer" style="text-align: center;" >
									<a  href=""  data-target="#modal-show-{{$pro->idProducto}}"  data-toggle="modal" class="btn btn-primary btn-sm text-center" style="background-color: #18A689;border:1px solid #18A689"><i class="far fa-eye"></i> Ver</a>
								</div>
							</div>
						</div>
						@include('proforma.catalogo.modal-catalogo')
						@endforeach
					</div>
				</div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          {{$catalogos->render()}}
</section><!-- /.content -->

@endsection