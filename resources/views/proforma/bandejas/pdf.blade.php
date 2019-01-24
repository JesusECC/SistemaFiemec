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
  font-size: 0.6em;
}
#project span {
  color: #5D6975;
  text-align: left;
  width: 60px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.6em;
}
#project span.direccion
{
  color: #5D6975;
  text-align: left;
  width: 300px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.6em;
}
#project span.cliente
{
  color: #5D6975;
  text-align: left;
  width: 100px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.6em;
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
table tbody tr:nth-child(2n-1) td {
  background: #DADADA;
} 
table tfoot tr:nth-child(2n-1) td {
  background: #DADADA;
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
  color: #5D6975;
  width: 100%;
  height: 49px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
}

</style>
<body>
  <header class="clearfix">  
    <table width="100%"> 
          <tr align="center" valign="middle"> 
            <th colspan="5" align="left">
                <img src="img/img-pdf.png" alt="" width="200px">
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
        <div><span>EMAIL :</span> <span><a href="{{$proforma->email}}">{{$proforma->email}}</a></span></div>
        <div><span>FECHA :</span> <span style="font-size: 0.7em;color: black">{{$proforma->fecha_hora}}</span></div>
        <div><span>CLIENTE EMPLEADO :</span><span style="font-size: 0.7em;color: black">{{$proforma->nombre_RE}}</span></div>
      </div>
      <div id="project" class="clearfix">
        <div><span>CLIENTE :</span> <span class="cliente" style="font-size: 0.7em;color: black">{{$proforma->nombres_Rs}} {{$proforma->paterno}} {{$proforma->materno}}</span></div>
        <div><span>RUC / DNI :</span> <span style="font-size: 0.7em;color: black">{{$proforma->ndoc}}</span></div>
        <div><span>DIRECCIÓN :</span> <span class="direccion" style="font-size: 0.7em;color: black">{{$proforma->direccion}}</span> </div>
      </div>
    </div>
  </header> 
  <main> 
    <div id="main-container"> 
      <table class="principal" width="100%"> 
        <tr class="principal" style="background-color: #00709A;border: 1px solid black ">
          <th colspan="6" style="text-align: center;color: white;padding: 5px ; font-size: 13px;">Fabricado en plancha galvanizada LAC/LAF, Diseño Constructivo segun norma NEMA VE-1 y recomendacion de la NFPA-70.</th>
        </tr>
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
        <tbody>
          
          {{$i=1}}

          @foreach($detalles as $det)
          

          <tr class="principal"> 
            <td>{{$i++}}</td>
            <td class="principal" style="font-size: 11px !important;"> {{$det->nombre_producto}} {{$det->medidas}}, acabado en {{$det->nombreGalvanizado}}, Espesor de {{$det->espesor}} y tramo de {{$det->tramo}} metros. {{$det->descripcionDP}}, {{$det->tapa}} </td>
            <td class="principal" align="center" >{{$det->dimenciones}}</td>
            <td class="principal" align="center" >{{$det->cantidad}}</td>
            <td class="principal" align="center" >{{(((($det->precioGal + $det->precioPin)*$det->tramo)+$det->precioTap)-10)}}</td>
            <td class="principal" align="center" >{{(((($det->precioGal + $det->precioPin)*$det->tramo)+$det->precioTap)-10)*$det->cantidad}}</td>
            
            
            
          </tr>
          @endforeach
          
        </tbody>
        <tfoot>
            <tr style="font-weight: bold;">
              <td colspan="4" style="border-bottom: 1px solid white !important;border-top:none !important;background-color: white !important" ></td>
              <td colspan="1" style="border-left:1px solid #323639; ">Subtotal</td>
              <td align="center" style="border-right: 1px solid #323639"> S/. {{$proforma->subtotal}}</td>
            </tr>
            <tr style="font-weight: bold;">
              <td colspan="4" style="border-bottom: 1px solid white !important;border-top:none !important;"></td>
              <td colspan="1" style="border-left:1px solid #323639; ">IGV 18%</td>
              <td align="center" style="border-right: 1px solid #323639"> S/. {{round(($proforma->subtotal)*($proforma->igv/100),2)}}</td>
            </tr>
            <tr style="font-weight: bold;">  
              <td colspan="4" style="background-color: white !important"></td>
              <td colspan="1" style="border-left:1px solid #323639;border-bottom: 1px solid #323639 ">Precio Total</td>
              <td align="center" style="border-right: 1px solid #323639;border-bottom: 1px solid #323639">S/. {{round($proforma->precio_total,2)}}</td>
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