<html>
<head>
  <meta charset="UTF-8">
  <title>{{$td->serie_proforma}}  F000-{{$td->idProforma}}</title>
</head>
<style type="text/css"> 
  .clearfix:after 
  {
      content: "";
      display: table;
      clear: both;
  }  
  th.cotizacion
  {
    color: white;
    border-radius: 10px;
  } 
  th.cotizacion div.proforma
  {
    border-radius: 5px;
    border: 1px inset black;
    background-color:#00709A;
    padding: 2.5px;
    margin-top: 6px;
    margin-bottom: 6px;
  }
.col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {

position: relative;
min-height: 1px;
padding-right: 15px;
padding-left: 15px;

}
.datos
{
  display: table;
  height: auto;
  width: 100%;
}
#company {
  float: right;
  width: 50%;
}

#company span {
  color: #5D6975;
  text-align: left;
  width: 110px;
  margin-right: 10px;
  display: inline-block;
  font-size: 9px;
}
#project span {
  color: #5D6975;
  text-align: left;
  width: 60px;
  margin-right: 10px;
  display: inline-block;
  font-size: 9px;
}
#project span.direccion
{
  color: #5D6975;
  text-align: left;
  width: 300px;
  margin-right: 10px;
  display: inline-block;
  font-size: 9px;
}
#project span.cliente
{
  color: #5D6975;
  text-align: left;
  width: 200px;
  margin-right: 10px;
  display: inline-block;
  font-size: 9px;
}
#company span.cliente
{
  color: #5D6975;
  text-align: left;
  width: 230px;
  margin-right: 10px;
  display: inline-block;
  font-size: 9px;
}
#project {
  float: left;
  text-align: left;
  width: 50%;
}
    #main-container{
        margin-top: 0px;
      }

#project div,
#company div {       
}
table.principal{
    background-color: white;
    text-align: left;
    border-collapse: collapse;
    width: 100%;
}

th.principal{
    padding: 2px;

}
th.principal
{
  font-size: 12px !important;
}
td.principal
{
    border-bottom:  1px solid #7D7D7D;
    font-size: 11px !important;
}

table tfoot td {
  background: #FFFFFF;
  border-bottom: none;
  border-top: 1px solid #323639; 
  padding: 2px;
  font-size: 11px !important;
}

thead.principal{
    background-color: #7D7D7D;
    border-bottom: solid 5px #323639;
    color: white;
    text-align: center;
}
td.foot
{
    background-color: #072F3E;
    border-bottom: solid 5px #323639;
    color: white;
    text-align: center;
}
footer {
  color: black;
  width: 100%;
  height: 60px !important;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 2px 0;
 
}

.box {
position: relative;
border-radius: 3px;
background: #ffffff;
border-top: 3px solid #d2d6de;
margin-bottom: 20px;
width: 100%;
box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
}
.box-header.with-border {

border-bottom: 1px solid #f4f4f4;

}
.box-header {

color: #444;
display: block;
padding: 20px;
position: relative;

}
p {

margin: 0 0 10px;

}
.box-body {

border-top-left-radius: 0;
border-top-right-radius: 0;
border-bottom-right-radius: 3px;
border-bottom-left-radius: 3px;
padding: 10px;

}
.row {

margin-right: -20px;
margin-left: -20px;

}
.col-xs-6 {

width: 50%;

}
.col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {

float: left;

}
.col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {

position: relative;
min-height: 1px;
padding-right: 15px;
padding-left: 15px;

}
.lead {

font-size: 21px;

}
.lead {

margin-bottom: 20px;
font-size: 16px;
font-weight: 300;
line-height: 1.4;

}
.table-responsive {

min-height: .01%;
overflow-x: auto;

}
.table {

width: 100%;
max-width: 100%;
margin-bottom: 20px;

}
table {

background-color: transparent;

}
table {

border-spacing: 0;
border-collapse: collapse;

}
</style>
<body>
  <header class="clearfix" style="margin-top: -20px;margin-bottom: 20px">  
    <table width="100%" > 
          <tr align="center" valign="middle"> 
            <th colspan="5" align="left">
                <img src="img/LogoFinal24.png" alt="" width="230px">
            </th>
            <th colspan="5" align="right"  >
                <img src="img/dir-pdf.png" alt="" width="200px">
            </th>
          </tr>
          <th colspan="10" class="cotizacion" align="center">
            <div class="proforma">
           COTIZACIÓN N° {{$td->serie_proforma}}  F000-{{$td->idProforma}} 
            </div>
          </th>     
    </table>
    <div class="datos" > 
      <div id="company">
        <div><span style="color: black !important;font-weight: bold;">EMAIL :</span> <span style="font-size: 11px !important;"><a href="{{$td->correo}}">{{$td->correo}}</a></span></div>
        <div><span style="color: black !important;font-weight: bold;"> FECHA :</span> <span style="font-size: 11px !important;color: black">{{$td->fecha_hora}}</span></div>
        <div><span style="color: black !important;font-weight: bold;">REPRESENTANTE :</span ><span class="cliente" style="font-size: 0.7em;color: black">{{$td->nombre_RE .' | Tlf: '.$td->telefonoRE.' / '.$td->CelularRE}}</span></div>
      </div>
    </div>
    <div id="project" class="clearfix">
      <div><span style="color: black !important;font-weight: bold;">CLIENTE :</span> <span class="cliente" style="font-size: 11px !important;color: black">{{$td->nombres_Rs.' '.$td->paterno.' '.$td->materno}}</span></div>
      <div><span style="color: black !important;font-weight: bold;">RUC / DNI :</span> <span style="font-size: 11px !important;color: black">{{$td->nro_documento}}</span></div>
      <div><span style="color: black !important;font-weight: bold;">DIRECCIÓN :</span> <span class="direccion" style="font-size: 11px !important;color: black">{{$td->direccion}}</span> </div>
    </div>
  </header> 
  <main>
  @foreach($tablero as $t)
 <div class="col-md-12">
  <div class="box">
    <div class="box-header with-border" style="padding: 5px !important;">
      <p>Tablero {{$t->nombre_tablero }}</p>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <div id="main-container">
            <table class="principal" width="100%">
              <thead class="principal"> 
                  <tr class="principal"> 
                    <th class="principal">Item</th>
                    <th class="principal">Cod.</th>
                    <th class="principal" style="width: 460px !important">Producto</th>
                    <th class="principal" >Cant. </th>
                    <th class="principal" >Precio</th>
                    <th class="principal" >Desc. %</th>
                    <th class="principal" >Valor V.</th>
                  </tr>
                </thead>
                <tbody>
                {{$i=1}}
                {{$sub=0}}
                {{$igv=0}}
                {{$precio=0}}
                @foreach($proforma as $p)
                  @if($t->nombre_tablero==$p->nombre_tablero)
                  {{$precio= (round((($p->precio_venta*$p->cantidad)-(($p->cantidad*$p->precio_venta)*($p->descuento/100)))/$p->cambioDPT,2))}}
                  <tr class="principal"> 
                    <td class="principal" style="border:1px solid #323639;text-align: center !important;" >{{$i++}}</td>
                    <td class="principal" width="10" style="border:1px solid #323639;text-align: center !important;"> {{$p->codigo_producto}}</td>
                    <td class="principal" style="border:1px solid #323639;text-align: center !important;" > {{ $p->producto.' | '.$p->descripcionDP }}</td>
                    <td class="principal" width="10" style="border:1px solid #323639;text-align: center !important;">{{$p->cantidad}}</td>
                    <td class="principal" style="width: 60px !important;border:1px solid #323639;text-align: center;">{{$p->simboloDPT}} {{round($p->precio_venta/$p->cambioDPT,2)}}</td>
                    <td class="principal" align="center" width="10" style="border:1px solid #323639;text-align: center;">{{$p->descuento}} % </td>
                    <td class="principal" align="center" width="30" style="border:1px solid #323639;text-align: center;">{{$p->simboloDPT}} {{$precio}}</td>
                  </tr>
                  {{$sub+=($p->precio_venta*$p->cantidad)-(($p->cantidad*$p->precio_venta)*($p->descuento/100))}}
                  {{$igv=$p->igv}}
                  @endif
                @endforeach
                </tbody>
                <tfoot>
                    <tr style="font-weight: bold;">
                      <td colspan="3" style="border-bottom: 1px solid white !important;border-top:none !important;background-color: white !important" ></td>
                      <td colspan="2" style="border: 1px solid black !important;text-align: center; ">Subtotal</td>
                      <td colspan="2" align="center" style="border: 1px solid black !important;"> {{$td->simboloP}} {{round($sub/$td->tipocambio,2)}}</td>
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
<div class="col-xs-6">

</div>
<table align="right" border="1"  >
  <thead align="right" style="color: white">
      {{$sub_tableros=0}}
      {{$igv_tableros=0}}
      {{$pt=0}}
      @foreach($proforma as $p)
        {{$sub_tableros=$p->subtotal}}
        {{$igv_tableros=$p->igv}}
        {{$pt=$p->precio_total}}
      @endforeach
    <tr style="color: black !important;text-align: center !important;">
      <th>SUB TOTAL</th>
      <th>IGV 18%</th>
      <th>TOTAL</th>
    </tr>
  </thead>
  <tbody>
    <tr style="text-align: center !important;">
      <td>{{$p->simboloDPT}} {{$sub_tableros}} </td>
      <td>{{$p->simboloDPT}} {{round(($sub_tableros)*($igv_tableros/100),2)}} </td>
      <td>{{$p->simboloDPT}} {{round($pt,2)}} </td>
    </tr>
  </tbody>
</table>
</main>
  <footer> 
        <div style="width: 50%;float: initial;display: block;">
          <h5 style="font-size: 10px !important;line-height:1px">Forma de pago: {{$td->forma_de}}</h5>
          <h5 style="font-size: 10px !important;line-height:1px">Plazo de oferta {{$td->plazo_oferta}}  </h5>
          <h5 style="font-size: 10px !important;line-height:1px">Condición de venta: {{$td->observacion_proforma}} </h5>
      <h5 style="font-size: 10px !important;line-height:0.3cm;margin-top: -10px !important">Realizado por:{{$td->nameE.' | Tlf:'.$td->telefonoU.' / '.$td->celularU}}</h5>
    </div>
<div style="width: 50%; float: right;display: block;">
          <h4 style="font-size: 12px !important;line-height:1px">Cuenta Corriente de FIEMEC S.A.C RUC: 20546979611</h4>
          <h5 style="font-size: 10px !important;line-height:1px">BBVA Soles: 0011 0339-0100014584   (CCI) : 011-339-000100014584-95</h5>
          <h5 style="font-size: 10px !important;line-height:1px">BCP Soles:   192-2324867-0-03        ( CCI) 00219200232486700338</h5>
          <h5 style="font-size: 10px !important;line-height:1px">BCP Dolares :   192-2288918-1-91     ( CCI) 00219200228891819137</h5>
          <h5 style="font-size: 10px !important;line-height:1px">Cta. Corriente  detracciones BN :   00-088-006879</h5>          
        </div> 
  </footer>
</body>
</html>