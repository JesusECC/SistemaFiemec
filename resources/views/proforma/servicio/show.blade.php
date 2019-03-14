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
          <i class="fas fa-clipboard-check"></i> Proforma</a>
      </li>
      <li class="active"> Proformas Servicios</li>
    </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="callout callout-info">
        <h5 >
          <i class="fa fa-info">
            
          </i>
          Nota
        </h5>
          Esta página ha sido mejorada para la impresión. Haga clic en el botón Imprimir en la parte inferior de la factura para probar.     
      </div>
      <div class="box">
        <div class="box-header with-border" style="padding: 10px !important">
          <h4>
            <strong style="font-weight: 400">
              <i class="fas fa-list-ul"></i> Proforma Servicios
            </strong>
          </h4>
        </div><!-- /.box-header -->
        <div class="box-body" style="background-color: #4A4B49 !important;">
          <div class="container-fluid" style="background-color: white !important;">
            <div class="row">
              <div class="col-md-12">
                <img class="float-left" src="{{asset('img/logo-invoce.jpg')}}" alt="" style="width: 150px;">
                <h5 class="float-left mr-t-1">Fabricaciones e Instalaciones Electro Mecánicas del Perú S.A.C</h5>
                <small class="float-right mr-t-1"><span class="negrita">Fecha y Hora</span> {{$td->fecha_hora}}</small>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                  <center><strong>Cliente</strong></center> 
                <address>
                  <strong style="font-weight: 400 !important;">
                    Nombre: {{$td->nombres_Rs.' '.$td->paterno.' '.$td->materno}}
                  </strong>
                  <br>
                  <strong style="font-weight: 400 !important;">
                    Documento: {{$td->nro_documento}}
                  </strong>  
                  <br>
                  <strong style="font-weight: 400 !important;">
                    Dirección: {{$td->direccion}}
                  </strong> 
                  <br>
                  <strong style="font-weight: 400 !important;">
                    Correo: {{$td->correo}}
                  </strong>                                   

                </address>
              </div>
              <div class="col-sm-4">
                <center><strong>Atendido por</strong></center>
                <address>
                  <strong style="font-weight: 400 !important;">Nombre: {{$td->cliente_empleado}}</strong>
                  <br>
                  <strong style="font-weight: 400 !important;">Dirección: P. P. N. Pachacutec Mz. W1 Lot. 7 Gru. Residencial E4 - Sector E Callao - Ventanilla</strong>
                  <br>
                   <strong style="font-weight: 400 !important;">Teléfono: (01) 480 8910 - 758 2351</strong>
                   <br>
                   <strong style="font-weight: 400 !important;">Celular: 946398756 - 947342692 </strong>
                   <br>
                   <strong style="font-weight: 400 !important;">Correo: ventas@jfiemec.pe </strong>
                   <br>
                   <strong style="font-weight: 400 !important;">Página Web: www.fiemec.pe </strong>
                </address>
              </div>
              <div class="col-sm-4">
                <b>Serie de Proforma: <strong style="font-weight: 400 !important;">{{$td->serie_proforma}}</strong> </b>
                <br>
                <b>Número de Proforma: <strong style="font-weight: 400 !important;">F000-{{$td->idProforma}}</strong></b>
                <br>
                <b>Fecha y hora emitida: <strong style="font-weight: 400 !important;">{{$td->fecha_hora}}</strong> </b>
              </div>
            </div>

          </div>
        </div>
        <div class="box-footer">
          <div class="row">
          @foreach($servicio as $s)
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border" style="padding: 5px !important;">
                  <p>Servicio {{$s->nombre_servicio }}</p>
                </div>  
                <div class="box-body">
                  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                      <div class="col-sm-6"></div>
                      <div class="col-sm-6"></div>
                    </div>
                    <div class="row" >
                      <div class="col-sm-12" style="color: white">
                        <table  class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" style="color: black">
                          <thead>
                            <tr role="row">
                              <th>Item</th>
                              <th >Descripcion</th>
                              <th >Detalles</th>
                              <th >Unds.</th>
                              <th >Cant.</th>
                              <th >P Unit.</th>
                              <th >Importe</th>
                            </tr>
                          </thead>
                          <tbody>
                          {{$i=1}}
                          {{$sub=0}}
                          {{$igv=0}}
                          @foreach($proforma as $p)
                            @if($s->nombre_servicio==$p->nombre_servicio)
                            <tr role="row" class="odd">
                              <td align="center"><p style="background-color: #E5EAEA">{{$p->item2}}</p><p>{{$p->item}}</p></td>
                              <td align="center"><p style="text-align: center;background-color: #E5EAEA" > {{ $p->subtitulo}}</p><p>{{ $p->nombre_tarea }}</p></td>
                              <td align="center">{{$p->descripcionDP}}</td>
                              <td align="center">{{$p->unidades}}</td>
                              <td align="center">{{$p->cantidad}}</td>
                              <td align="center">{{$p->precio_venta}}</td>
                              <td align="center">{{$p->precio_venta*$p->cantidad}}</td>
                            </tr>
                          {{$sub+=($p->precio_venta*$p->cantidad)}}
                            @endif
                          @endforeach
                          </tbody>
                          <tfoot>
                            <tr style="font-weight: bold;">
                              <td colspan="5" style="border-bottom: 1px solid white !important;border-top:none !important;background-color: white !important" ></td>
                              <td colspan="1" style="border-left:1px solid #323639; ">Subtotal</td>
                              <td align="center" style="border-right: 1px solid #323639"> S/.{{$sub}}</td>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                  </div>                 
                </div>              
              </div>
            </div>
            @endforeach
          </div>

          <div class="row" style="color: white">
{{$sub_tableros=0}}
      {{$igv_tableros=0}}
      {{$pt=0}}
      @foreach($proforma as $p)
        {{$sub_tableros=$p->subtotal}}
        {{$igv_tableros=$p->igv}}
        {{$pt=$p->precio_total}}
      @endforeach
              <div class="col-sm-9" style="color: white">
                <p style="color: black !important;">Forma de:  {{$td->forma_de}}</p>
                <p style="color: black !important;">Plazo de Oferta:  {{$td->plazo_oferta}}</p>
                <p style="color: black !important;">Observaciones:  {{$td->observacion_proforma}}</p>
              </div> 
              <div class="col-sm-3">
                <div class="table-responsive">
                  <table class="table" style="color: black">
                    <tbody>
                      <tr>
                        <th>Sub Total</th>
                        <td>S/. {{$sub_tableros}}</td>
                      </tr>
                      <tr>
                        <th>IGV (18%)</th>
                        <td>S/. {{round(($sub_tableros)*($igv_tableros/100),2)}}</td>
                      </tr>
                      <tr>
                        <th>Precio total</th>
                        <td>S/. {{round($pt,2)}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>                         
          </div>
        <div class="box-footer">
          <div class="row">
            <div class="col-sm-12">
              <a class="btn btn-default" href="{{URL::action('ControllerProformaTableros@pdf',$td->idProforma)}}" target="_blank">
                <i class="fa fa-print"></i>
                Imprimir
              </a>
            </div>
          </div>
        </div>
        </div>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
@endsection
