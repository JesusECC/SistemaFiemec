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
                <i class="fas fa-dolly"></i>Cargos</a>
        </li>
        <li class="active">Fiemec</li>
        <li>
            <a href="#">
             Nuevo Cargo</a>
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
                            <i class="fas fa-dolly"></i> Registro de Cargos
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
 
    {!!Form::open(array('url'=>'proforma/cargo','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}

    {{Form::token()}}
 <div class="box-body bg-gray-c">
                  <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default panel-shadow">
                                      <div class="row">


                  <div class="col-sm-12">
                    <div class="panel-body">
                    <div class="form-group">
                    <label for="" class="control-label" style="font-size: 13px;color: #676a6c">
                      Cargo
                    </label>
                            
                  
                    
                  </div>
                       </div>
                      <div class="col-sm-6">
                      <div class="form-group">
                        <input type="text"     name="nombre_cargo" class="form-control" placeholder="Ingrese nuevo cargo...">
                      </div>                
                      </div>

                      <div class="col-sm-6">
                      <div class="box-footer">
          <div class="text-right">
              <button class="btn btn-primary btn-sm" type="submit"><i class="far fa-save"></i> Guardar</button>
            <button class="btn btn-danger btn-sm" type="reset"><i class="far fa-times-circle"></i> Cancelar</button>
            <button  class="btn btn-success btn-sm " type="button"><a style="color: white!important;text-decoration: none" href="{{url('proforma/marca')}}"><i class="fas fa-reply-all"></i> Volver</a></button>
          </div>
        </div>
      </div>

                                     </div>
                                  </div>
                                </div>
                                                 
                                    </div>                            
                                   </div>
                                  </div>
                                 </div>
                  </div>
                 </div>
                  </div>
                   </div>
                    </div>

        
              </div><!-- /.box -->
              {!!Form::close()!!}
            </div><!-- /.col -->
          </div><!-- /.row -->
</section><!-- /.content -->
@endsection
