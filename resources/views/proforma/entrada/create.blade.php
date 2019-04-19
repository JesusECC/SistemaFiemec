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
                <i class="fas fa-file-signature"></i> Ingreso</a>
        </li>
        <li class="active">Nuevo Ingreso</li>
    </ol>
</section>
<section class="content">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="box" style="border-top: 3px solid #18A689">
	                <div class="box-header with-border" style="padding: 10px !important">
	                    <h4>
	                        <strong style="font-weight: 400">
	                            <i class="fas fa-dolly"></i> Ingreso de Inventario
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

	                    {!!Form::open(array('url'=>'proforma/inventario','method'=>'POST','autocomplete'=>'off'))!!}

	                    {{Form::token()}}

	                    <div class="box-body bg-gray-c">
	                        <div class="row">
	                            <div class="col-md-8">
	                                <div class="panel panel-default panel-shadow">
	                                    <div class="panel-body">
	                                        <div class="form-group">
	                                            <label for="" class="control-label" style="color: #676a6c !important">
	                                            Producto
	                                            </label>
                                                

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
			<div class="ibox-title-buttons pull-right">
				<button  id="save" class="btn btn-primary btn-sm" type="button"><i class="far fa-save"></i> Guardar</button>
				<button class="btn btn-danger btn-sm" type="reset"><i class="far fa-times-circle"></i> Cancelar</button>
				<button  class="btn btn-success btn-sm " type="button"><a style="color: white!important;text-decoration: none" href="{{url('proformas')}}"><i class="fas fa-reply-all"></i> Volver</a></button>
			</div>
		</div>
				    
</section>
@endsection