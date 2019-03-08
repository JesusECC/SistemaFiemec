<html>
<head>
  <meta charset="UTF-8">
  <title>{{$proforma->serie_proforma}}  F000-{{$proforma->idProforma}}</title>
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
           COTIZACIÓN N° {{$proforma->serie_proforma}}  F000-{{$proforma->idProforma}} 
            </div>
          </th>     
    </table>
    <div class="datos" > 
      <div id="company">
        <div><span style="color: black !important;font-weight: bold;">EMAIL :</span> <span style="font-size: 11px !important;"><a href="{{$proforma->email}}">{{$proforma->email}}</a></span></div>
        <div><span style="color: black !important;font-weight: bold;"> FECHA :</span> <span style="font-size: 11px !important;color: black">{{$proforma->fecha_hora}}</span></div>
        <div><span style="color: black !important;font-weight: bold;">REPRESENTANTE :</span ><span class="cliente" style="font-size: 0.7em;color: black">{{$proforma->nombre_RE}}</span></div>
      </div>
    </div>
    <div id="project" class="clearfix">
        <div><span style="color: black !important;font-weight: bold;">CLIENTE :</span> <span class="cliente" style="font-size: 11px !important;color: black">{{$proforma->nombres_Rs.' '.$proforma->paternoC.' '.$proforma->maternoC}}</span></div>
        <div><span style="color: black !important;font-weight: bold;">RUC / DNI :</span> <span style="font-size: 11px !important;color: black">{{$proforma->ndoc}}</span></div>
        <div><span style="color: black !important;font-weight: bold;">DIRECCIÓN :</span> <span class="direccion" style="font-size: 11px !important;color: black">{{$proforma->Direccion}} {{$proforma->Departamento}} - {{$proforma->Distrito}}</span> </div>
    </div>
  </header> 

  <main> 
    <div id="main-container"> 
      <p style="text-align: center; color: black; font-size: 14px; border: 1px inset black; border-radius: 5px; " >Fabricado en plancha galvanizada LAC/LAF, Diseño Constructivo segun norma NEMA VE-1 y recomendacion de la NFPA-70.</p>
      <table class="principal" width="100%"> 
        <thead class="principal"> 
          <tr class="principal"> 
            <th class="principal">Item</th>     

            <th class="principal" style="width: 460px !important">Producto</th>
            <th class="principal" >UND</th>
            <th class="principal" >Cant. </th>
            <th class="principal" >P.UNT.</th>
            <th class="principal" >TOTAL</th>
           
          </tr>
        </thead>
        <tbody >
          
          {{$i=1}}

          @foreach($detalles as $det)

          <tr class="principal"> 
            <td class="principal" align="center" style="border: 1px solid black">{{$i++}}</td>
            <td class="principal" style="font-size: 11px !important;border: 1px solid black">COD: {{$det->nombre_producto}} {{$det->medidas}}, acabado en {{$det->nombreGalvanizado}}, Espesor de {{$det->espesor}} y tramo de {{$det->tramo}} metros. {{$det->descripcionDP}}, {{$det->tapa}} </td>
             <td class="principal" align="center" style="border: 1px solid black" >{{$det->dimenciones}}</td>
            <td class="principal" align="center" style="border: 1px solid black" >{{$det->cantidad}}</td>
            <td class="principal"  align="center" style="border: 1px solid black">S/.{{round($det->preciouniB,2)}}</td>
            <td class="principal" align="center" style="border: 1px solid black">S/.{{round($det->preciouniB*$det->cantidad,2)}}</td>
           
          </tr>
          @endforeach
          
        </tbody>

        <tfoot>
            <tr style="font-weight: bold;">
              <td colspan="3" style="border-bottom: 1px solid white !important;border-top:none !important;background-color: white !important" ></td>
              <td colspan="2" style="border:1px solid #323639;">Subtotal</td>
              <td colspan="1" align="center" style="border: 1px solid #323639;"> S/. {{$proforma->subtotal}}</td>
            </tr>
            <tr style="font-weight: bold;">
              <td colspan="3" style="border-bottom: 1px solid white !important;border-top:none !important;"></td>
              <td colspan="2" style="border:1px solid #323639; ">IGV 18%</td>
              <td colspan="1" align="center" style="border: 1px solid #323639"> S/. {{round(($proforma->subtotal)*($proforma->igv/100),2)}}</td>
            </tr>
            <tr style="font-weight: bold;">  
              <td colspan="3" style="background-color: white !important"></td>
              <td colspan="2" style="border:1px solid #323639;border-bottom: 1px solid #323639;">Total</td>
              <td colspan="1" align="center" style="border: 1px solid #323639;border-bottom: 1px solid #323639">S/. {{round($proforma->precio_total,2)}}</td>
            </tr> 
        </tfoot>

      </table>
    </div>
  </main>
  <footer> 
    <div style="width: 50%;float: left;display: inline-block !important;vertical-align: middle;">
      <h5 style="font-size: 8px !important;line-height:0.5px;">Forma de pago: {{$proforma->forma_de}}</h5>
      <h5 style="font-size: 8px !important;line-height:1pt;">Plazo de Fabricacion de Bandeja: {{$proforma->plaza_fabricacion}}  </h5>
      <h5 style="font-size: 8px !important;line-height:1pt;">Plazo de oferta hasta: {{$proforma->plazo_oferta}}  </h5> 
      <h5 style="font-size: 8px !important;line-height:1pt;">Garantia: {{$proforma->garantia}} </h5>
      <h5 style="font-size: 8px !important;line-height:1pt;">Forma de entrega: {{$proforma->incluye}} </h5>
      <h5 style="font-size: 8px !important;line-height:1pt;">Observaciones: {{$proforma->observacion_condicion}} </h5>
      <h5 style="font-size: 8px !important;line-height:1pt;">Realizado por:{{$proforma->nombres.' '.$proforma->paterno.' '.$proforma->materno.' | Telf. '.$proforma->telefono.' / '.$proforma->celular}}</h5>
    </div>
     
    <div style="width: 50%;float: right;">
      <h4 style="font-size: 8px !important;line-height:1px;margin-left: 5px;">Cuenta Corriente de FIEMEC S.A.C RUC: 20546979611</h4>
      <h5 style="font-size: 8px !important;line-height:1px;margin-left: 5px;">BBVA Soles: 0011 0339-0100014584   (CCI) : 011-339-000100014584-95</h5>
      <h5 style="font-size: 8px !important;line-height:1px;margin-left: 5px;">BCP Soles:   192-2324867-0-03        ( CCI) 00219200232486700338</h5>
      <h5 style="font-size: 8px !important;line-height:1px;margin-left: 5px;">BCP Dolares :   192-2288918-1-91     ( CCI) 00219200228891819137</h5>
      <h5 style="font-size: 8px !important;line-height:1px;margin-left: 5px;">Cta. Corriente  detracciones BN :   00-088-006879</h5>
    </div>
  </footer>
</body>
</html>