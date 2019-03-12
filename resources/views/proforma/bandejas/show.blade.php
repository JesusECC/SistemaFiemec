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
          <i class="fas fa-clipboard-check"></i> Proforma </a>
      </li>
      <li class="active"> Proformas Bandejas</li>
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
              <i class="fas fa-list-ul"></i> Proforma Bandejas
            </strong>
          </h4>
        </div>

                <!-- /.box-header -->
        <div class="box-body" style="background-color: #4A4B49 !important;">
          <div class="container-fluid" style="background-color: white !important;">
            <div class="row">
              <div class="col-md-12">
                <img class="float-left" src="{{asset('img/logo-invoce.jpg')}}" alt="" style="width: 150px;">
                <h5 class="float-left mr-t-1">Fabricaciones e Instalaciones Electro Mecánicas del Perú S.A.C</h5>
                <small class="float-right mr-t-1"><span class="negrita">Fecha y Hora</span> {{$proforma->fecha_hora}}</small>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                  <center><strong>Cliente</strong></center> 
                <address>
                  <strong style="font-weight: 400 !important;">
                    Nombre: {{$proforma->nombres_Rs.' '.$proforma->paterno.' '.$proforma->materno}}
                  </strong>
                  <br>
                  <strong style="font-weight: 400 !important;">
                    Documento: {{$proforma->ndoc}}
                  </strong>  
                  <br>
                  <strong style="font-weight: 400 !important;">
                    Dirección: {{$proforma->Direccion}} {{$proforma->Departamento}} {{$proforma->Distrito}}
                  </strong> 
                  <br>
                  <strong style="font-weight: 400 !important;">
                    Correo: {{$proforma->email}}
                  </strong>                                   

                </address>
              </div>
              <div class="col-sm-4">
                <center><strong>Atendido por</strong></center>
                <address>
                  <strong style="font-weight: 400 !important;">Nombre:{{$proforma->name}} {{$proforma->up}} {{$proforma->um}} | {{$proforma->telefonoU}}/{{$proforma->celularU}}</strong>
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
                <b>Serie de Proforma: <strong style="font-weight: 400 !important;">{{$proforma->serie_proforma}}</strong> </b>
                <br>
                <b>Número de Proforma: <strong style="font-weight: 400 !important;">F000-{{$proforma->idProforma}}</strong></b>
                <br>
                <b>Fecha y hora emitida: <strong style="font-weight: 400 !important;">{{$proforma->fecha_hora}}</strong> </b>
              </div>
            </div>
            <div class="row" style="padding-left:  30px !important;padding-right: 30px !important">
              <div class="col-12 table-responsive">
                <th colspan="6" style="text-align: center;color: black;padding: 5px ; font-size: 13px; background-color: grey !important;">Fabricado en plancha galvanizada LAC/LAF, Diseño Constructivo segun norma NEMA VE-1 y recomendacion de la NFPA-70.</th>
                <table class="table table-striped">
                     
        </tr>
                  <thead>
                    <tr>
                      <th>Producto</th>
                      <th>UND</th>
                      <th>Cant.</th>
                      <th>P.UNT.</th>
                      <th>TOTAL</th>                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($detalles as $det)
                        <tr>
                            <td>{{$det->nombre_producto}} {{$det->medidas}}, acabado en {{$det->nombreGalvanizado}}, Espesor de {{$det->espesor}} y tramo de {{$det->tramo}} metros. {{$det->descripcionDP}}, {{$det->tapa}} </td>
                            <td>{{$det->dimenciones}}</td>
                            <td>{{$det->cantidad}}</td>
                            <td>S/.{{round($det->preciouniB,2)}}</td>
                            <td>S/.{{round($det->preciouniB*$det->cantidad,2)}}</td>
                        </tr>
                      
                        @endforeach
                      }
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-9">
                <p>Forma de pago:  {{$proforma->forma_de}}</p>
                <p>Plazo de Fabricacion de Bandeja:  {{$proforma->plaza_fabricacion}}</p>
                <p>Plazo de oferta hasta:  {{$proforma->plazo_oferta}}</p>
                <p>Garantia:  {{$proforma->garantia}}</p>
                <p>Forma de entrega:  {{$proforma->incluye}}</p>
                <p>Observaciones:  {{$proforma->observacion_condicion}}</p>
                

              </div>
              <div class="col-sm-3">
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <th>Sub Total</th>
                        <td>S/. {{$proforma->subtotal}}</td>
                      </tr>
                      <tr>
                        <th>IGV (18%)</th>
                        <td>S/. {{round(($proforma->subtotal)*($proforma->igv/100),2)}}</td>
                      </tr>
                      <tr>
                        <th>Precio total</th>
                        <td>S/. {{round($proforma->precio_total,2)}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="row">
            <div class="col-sm-12">
              <a class="btn btn-default" href="{{URL::action('ControllerProformaUnitaria@pdf',$proforma->idProforma)}}" target="_blank">
                <i class="fa fa-print"></i>
                Imprimir
              </a>
            </div>
          </div>
        </div>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
@endsection

