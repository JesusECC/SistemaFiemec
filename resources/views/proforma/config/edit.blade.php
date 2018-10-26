@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<h3>Modificar Trabajador:{{$moneda->nombre_moneda.' '.$moneda->paterno.' '.$moneda->materno }}</h3>
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

    {!!Form::model($moneda,['method'=>'PATCH','route'=>['config.update',$moneda->idTipo_moneda]])!!}
    {{Form::token()}}

<div class="box-body bg-gray-c">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="nav-tabs-custom">
                                
                                <div class="tab-content">
                                    <div class="active tab-pane" id="dni">
                                        <div class="panel panel-default panel-shadow">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="" class="control-label" style="font-size: 13px;color: #676a6c">
                                                        Datos Generales
                                                    </label>
                                                </div>
                                <div class="row">
                                                
                                        

                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="" class="control-label" style="font-size: 13px;color: #676a6c">
                                                        Impuesto
                                                    </label>
                                                            <input type="number" name="impuesto" class="form-control"  value="{{$moneda->impuesto}}">
                                                        </div>                                              
                                                    </div>  
                                    
                                    
                                                    
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                             <label for="" class="control-label" style="font-size: 13px;color: #676a6c">
                                                        Nombre Moneda
                                                    </label>
                                                            <input type="text" name="nombre_moneda" class="form-control" value="{{$moneda->nombre_moneda}}">
                                                        </div>                                                  
                                                    </div>
                                                
                                                
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                             <label for="" class="control-label" style="font-size: 13px;color: #676a6c">
                                                        Simbolo
                                                    </label>
                                                            <input type="text" name="simbolo" class="form-control" value="{{$moneda->simbolo}}">
                                                        </div>                                              
                                                    </div>
                                                        
                                                        
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                             <label for="" class="control-label" style="font-size: 13px;color: #676a6c">
                                                        Valor
                                                    </label>
                                                            <input type="text" name="tipo_cambio" class="form-control" value="{{$moneda->tipo_cambio}}">
                                                        </div>                                              
                                                    </div>
                                                    </div>                                              
                                            </div>
                                        </div>                                      
                                    </div>
                                    <div class="tab-pane" id="ruc">
                                        RUC
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="text-right">
                        <button class="btn btn-primary btn-sm" type="submit"><i class="far fa-save"></i> Guardar</button>
                        <button class="btn btn-danger btn-sm" type="reset"><i class="far fa-times-circle"></i> Cancelar</button>
                        <button  class="btn btn-success btn-sm " type="button"><a style="color: white!important;text-decoration: none" href="{{url('proforma/config')}}"><i class="fas fa-reply-all"></i> Volver</a></button>
                        
                    </div>
                </div>
              </div><!-- /.box -->
{!!Form::close()!!}



@endsection