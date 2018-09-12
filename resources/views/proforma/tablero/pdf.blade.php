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
  margin-top: 10px;
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
  width: 80px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}
#project span {
  color: #5D6975;
  text-align: left;
  width: 80px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}
#project {
  float: left;
  text-align: left;
  width: 50%;
}
    #main-container{
        margin-top: 15px;
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

th.principal, td.principal{
    padding: 5px;
}
td.principal
{
    border-bottom:  1px solid #323639;
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
  white-space: nowrap; 
  border-top: 1px solid #323639; 
  padding: 5px;
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
                <img src="img/img-pdf.png" alt="" >
            </th>
            <th colspan="5" valign="middle" >
                <img src="img/dir-pdf.png" alt="" >
            </th>
          </tr>
          <th colspan="10" class="cotizacion" align="center">
            <div class="proforma">
           COTIZACIÓN N° {{$proforma->serie_proforma}}  F000-{{$proforma->idProforma}} 
        </div>
    </th>     
    </table>
    <div class="datos"> 
      <div id="company">
        <div><span>EMAIL</span> <a href="{{$proforma->email}}">{{$proforma->email}}</a></div>
        <div><span>FECHA</span> {{$proforma->fecha_hora}}</div>
        
      </div>
      <div id="project" class="clearfix">
        <div><span>CLIENTE</span> {{$proforma->nombre}}</div>
        <div><span>DOCUMENTO</span> {{$proforma->ndoc}}</div>
        <div><span>DIRECCIÓN</span> {{$proforma->direccion}}</div>
      </div>
    </div>
  </header> 
  <main> 
    <div id="main-container"> 
      <table class="principal"> 
        <thead class="principal"> 
          <tr class="principal"> 
            <th class="principal">Nombre de tablero</th>
            <th class="principal">Producto</th>
            <th class="principal">Cantidad</th>
            <th class="principal">Precio</th>
            <th class="principal">Descuento U.</th>
            <th class="principal">Valor V.</th>
          </tr>
        </thead>
        <tbody>
          @foreach($detalles as $det)
          <tr class="principal"> 
            <td class="principal" style="font-size: 13px !important;"> {{$det->nombre_tablero}} </td>
            <td class="principal" style="font-size: 11px !important;"> {{$det->producto.' | '.$det->descripcionDP}} </td>
            <td class="principal" align="center">{{$det->cantidad}}</td>
            <td class="principal"  align="center">S/.{{$det->precio_venta}}</td>
            <td class="principal" align="center">{{$det->descuento}}%</td>
            <td class="principal" align="center">S/.{{($det->precio_venta*$det->cantidad)-(($det->cantidad*$det->precio_venta)*($det->descuento/100))}}</td>
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
    <h5 style="font-size: 12px !important;line-height:1px">Forma de pago: {{$proforma->forma_de}}</h5>
    <h5 style="font-size: 12px !important;line-height:1px">Condición de venta: {{$proforma->observacion_condicion}} </h5>
    <h5 style="font-size: 12px !important;line-height:1px">Plazo de oferta {{$proforma->plazo_oferta}}  </h5>
    <br>
    <h4 style="font-size: 13px !important;line-height:1px">Cuenta Corriente de FIEMEC S.A.C RUC: 20546979611</h4>
     <h5 style="font-size: 11px !important;line-height:1px">BBVA Soles: 0011 0339-0100014584   (CCI) : 011-339-000100014584-95</h5>
                        <h5 style="font-size: 11px !important;line-height:1px">BCP Soles:   192-2324867-0-03        ( CCI) 00219200232486700338</h5>
                        <h5 style="font-size: 11px !important;line-height:1px">BCP Dolares :   192-2288918-1-91     ( CCI) 00219200228891819137</h5>
                        <h5 style="font-size: 11px !important;line-height:1px">Cta. Corriente  detracciones BN :   00-088-006879</h5>

  </main>
  <footer>  
    La factura fue creada en una computadora y es válida sin la firma y el sello
  </footer>
</body>
</html>