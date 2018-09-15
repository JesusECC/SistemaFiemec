<html>
<head>
  <meta charset="UTF-8">
  <title> </title>
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
    background-color:#1C4C6D;
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
  width: 100px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.6em;
}
#project span {
  color: #5D6975;
  text-align: left;
  width: 50px;
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
    border-bottom:  1px solid #323639;
    font-size: 11px !important;
}
table tbody tr:nth-child(2n-1) td {
  background: #F5F5F5;
} 
table tfoot tr:nth-child(2n-1) td {
  background: #F5F5F5;
  }
table tfoot td {
  background: #FFFFFF;
  border-bottom: none;
  border-top: 1px solid #323639; 
  padding: 2px;
  font-size: 11px !important;
}

thead.principal{
    background-color: #072F3E;
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
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}

</style>
<body>
  <header class="clearfix">  
    <table width="100%"> 
          <tr align="center" valign="middle"> 
            <th colspan="5" align="left">
                <img src="img/img-pdf.png" alt="" width="180px">
            </th>
            <th colspan="5" valign="middle" >
                <img src="img/dir-pdf.png" alt="" width="180px">
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
        <div><span>EMAIL</span> <span><a href="{{$proforma->email}}">{{$proforma->email}}</a></span></div>
        <div><span>FECHA</span> <span style="font-size: 0.7em;color: black">{{$proforma->fecha_hora}}</span></div>
        <div><span>ASESOR COMERCIAL</span><span style="font-size: 0.7em;color: black">-----</span></div>
      </div>
      <div id="project" class="clearfix">
        <div><span>CLIENTE</span> <span class="cliente" style="font-size: 0.7em;color: black">{{$proforma->nombre}}</span></div>
        <div><span>RUC / DNI</span> <span style="font-size: 0.7em;color: black">{{$proforma->ndoc}}</span></div>
        <div><span>DIRECCIÓN</span> <span class="direccion" style="font-size: 0.7em;color: black">{{$proforma->direccion}}</span> </div>
      </div>
    </div>
  </header> 
  <main> 
    <div id="main-container"> 
      <table class="principal" width="100%"> 
        <thead class="principal"> 
          <tr class="principal"> 
            <th class="principal" style="width: 460px !important">Producto</th>
            <th class="principal" >Cant. </th>
            <th class="principal" >Precio</th>
            <th class="principal" >Desc. %</th>
            <th class="principal" >Valor V.</th>
          </tr>
        </thead>
        <tbody>
          @foreach($detalles as $det)
          <tr class="principal"> 
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
              <td colspan="3" style="border-bottom: 1px solid white !important;border-top:none !important;background-color: white !important" ></td>
              <td colspan="1" style="border-left:1px solid #323639; ">Subtotal</td>
              <td align="center" style="border-right: 1px solid #323639"> S/. {{$proforma->subtotal}}</td>
            </tr>
            <tr style="font-weight: bold;">
              <td colspan="3" style="border-bottom: 1px solid white !important;border-top:none !important;"></td>
              <td colspan="1" style="border-left:1px solid #323639; ">IGV 18%</td>
              <td align="center" style="border-right: 1px solid #323639"> S/. {{round(($proforma->precio_total)*($proforma->igv/100),2)}}</td>
            </tr>
            <tr style="font-weight: bold;">  
              <td colspan="3" style="background-color: white !important"></td>
              <td colspan="1" style="border-left:1px solid #323639;border-bottom: 1px solid #323639 ">Precio Total</td>
              <td align="center" style="border-right: 1px solid #323639;border-bottom: 1px solid #323639">S/. {{round($proforma->precio_total,2)}}</td>
            </tr> 
        </tfoot>
      </table>
    </div>
    <div style="margin-bottom: 5px;">
      <h5 style="font-size: 10px !important;line-height:1px">Forma de pago: {{$proforma->forma_de}}</h5>
      <h5 style="font-size: 10px !important;line-height:1px">Condición de venta: {{$proforma->observacion_condicion}} </h5>
      <h5 style="font-size: 10px !important;line-height:1px;">Plazo de oferta {{$proforma->plazo_oferta}}  </h5>      
    </div>
    <div style="">
      <h4 style="font-size: 10px !important;line-height:1px">Cuenta Corriente de FIEMEC S.A.C RUC: 20546979611</h4>
       <h5 style="font-size: 10px !important;line-height:1px">BBVA Soles: 0011 0339-0100014584   (CCI) : 011-339-000100014584-95</h5>
                          <h5 style="font-size: 10px !important;line-height:1px">BCP Soles:   192-2324867-0-03        ( CCI) 00219200232486700338</h5>
                          <h5 style="font-size: 10px !important;line-height:1px">BCP Dolares :   192-2288918-1-91     ( CCI) 00219200228891819137</h5>
                          <h5 style="font-size: 10px !important;line-height:1px">Cta. Corriente  detracciones BN :   00-088-006879</h5>      
    </div>


  </main>
  <footer>  
    La factura fue creada en una computadora y es válida sin la firma y el sello
  </footer>
</body>
</html>