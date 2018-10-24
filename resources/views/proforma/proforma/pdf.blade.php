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
  width: 200px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.6em;
}
#company span.cliente
{
  color: #5D6975;
  text-align: left;
  width: 200px;
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
  height: 35px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  
}

</style>
<body>
  <header class="clearfix" style="margin-top: -20px;">  
    <table width="100%"> 
          <tr align="center" valign="middle"> 
            <th colspan="5" align="left">
                <img src="img/img-pdf2.jpg" alt="" width="230px">
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
        <div><span>CLIENTE REPRESENTANTE :</span ><span class="cliente" style="font-size: 0.7em;color: black">{{$proforma->cliente_empleado}}</span></div>
      </div>
      <div id="project" class="clearfix">
        <div><span>CLIENTE :</span> <span class="cliente" style="font-size: 0.7em;color: black">{{$proforma->nombres_Rs.' '.$proforma->paterno.' '.$proforma->materno}}</span></div>
        <div><span>RUC / DNI :</span> <span style="font-size: 0.7em;color: black">{{$proforma->ndoc}}</span></div>
        <div><span>DIRECCIÓN :</span> <span class="direccion" style="font-size: 0.7em;color: black">{{$proforma->direccion}}</span> </div>
      </div>
    </div>
  </header> 
  <main> 
    <div id="main-container"> 
      <table class="principal" width="100%"> 
        <thead class="principal"> 
          <tr class="principal"> 
            <th class="principal">Item</th>
            <th class="principal" style="width: 460px !important">Producto</th>
            <th class="principal" >Cant. </th>
            <th class="principal" >Precio</th>
            <th class="principal" >Desc. %</th>
            <th class="principal" >Valor V.</th>
          </tr>
        </thead>
        <tbody>
          
          {{$i=1}}

          @foreach($detalles as $det)
          
          <tr class="principal"> 
            <td>{{$i++}}</td>
            <td class="principal" style="font-size: 11px !important;"> {{$det->producto.' | '.$det->descripcionDP}} </td>
            <td class="principal" align="center" >{{$det->cantidad}}</td>
            <td class="principal"  align="center">S/.{{$det->precio_venta}}</td>
            <td class="principal" align="center" >{{$det->descuento}} % </td>
            <td class="principal" align="center" >S/.{{($det->precio_venta*$det->cantidad)-(($det->cantidad*$det->precio_venta)*($det->descuento/100))}}</td>
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
    <div style="width: 50%;float: left;display: inline-block !important;vertical-align: middle;border-right:  2px solid #C1CED9">

      <h5 style="font-size: 10px !important;line-height:0.5px;">Forma de pago: {{$proforma->forma_de}}</h5>
      <h5 style="font-size: 10px !important;line-height:2pt;">Plazo de oferta {{$proforma->plazo_oferta}}  </h5> 
      <h5 style="font-size: 10px !important;line-height:0.3cm;margin-top: -10px !important">Condición de venta: {{$proforma->observacion_proforma}} </h5>
      <h5 style="font-size: 10px !important;line-height:0.3cm;margin-top: -10px !important">Realizado por:{{$proforma->nameE}}</h5>
    </div>
     
    <div style="width: 50%;float: right;">
      <h4 style="font-size: 10px !important;line-height:1px;margin-left: 5px;">Cuenta Corriente de FIEMEC S.A.C RUC: 20546979611</h4>
      <h5 style="font-size: 10px !important;line-height:1px;margin-left: 5px;">BBVA Soles: 0011 0339-0100014584   (CCI) : 011-339-000100014584-95</h5>
      <h5 style="font-size: 10px !important;line-height:1px;margin-left: 5px;">BCP Soles:   192-2324867-0-03        ( CCI) 00219200232486700338</h5>
      <h5 style="font-size: 10px !important;line-height:1px;margin-left: 5px;">BCP Dolares :   192-2288918-1-91     ( CCI) 00219200228891819137</h5>
      <h5 style="font-size: 10px !important;line-height:1px;margin-left: 5px;">Cta. Corriente  detracciones BN :   00-088-006879</h5>
    </div>
  </footer>
</body>
</html>