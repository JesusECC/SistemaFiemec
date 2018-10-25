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
            <i class="fas fa-user-plus"></i> Moneda</a>
        </li>
        <li class="active">Nueva Moneda</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box" style="border-top: 3px solid #18A689">
                <div class="box-header with-border" style="padding: 10px !important">
                    <h4>
                        <strong style="font-weight: 400">
                            <i class="fas fa-users"></i> Datos de la Moneda
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
                <!-- /.box-header -->
                    {!!Form::open(array('url'=>'proforma/config','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}

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
                                                            <input type="number" name="impuesto" class="form-control" placeholder="Ingrese Impuesto">
                                                        </div>                                              
                                                    </div>  
                                    
                                    
                                                    
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                             <label for="" class="control-label" style="font-size: 13px;color: #676a6c">
                                                        Nombre Moneda
                                                    </label>
                                                            <input type="text" name="nombre_moneda" class="form-control" placeholder="Ingrese Nombre ">
                                                        </div>                                                  
                                                    </div>
                                                
                                                
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                             <label for="" class="control-label" style="font-size: 13px;color: #676a6c">
                                                        Simbolo
                                                    </label>
                                                            <input type="text" name="simbolo" class="form-control" placeholder="Ingrese Simbolo">
                                                        </div>                                              
                                                    </div>
                                                        
                                                        
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                             <label for="" class="control-label" style="font-size: 13px;color: #676a6c">
                                                        Valor
                                                    </label>
                                                            <input type="text" name="tipo_cambio" class="form-control" placeholder="Ingrese Valor de Cambio"{{old('paterno')}}>
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
                        
                    </div>
                </div>
              </div><!-- /.box -->
              {!!Form::close()!!}
            </div><!-- /.col -->
          </div><!-- /.row -->
</section><!-- /.content -->
@endsection