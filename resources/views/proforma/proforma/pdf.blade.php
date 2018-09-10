<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<style type="text/css">
    body{
        width: 100%;
        height: 100%;
    }
    .header
    {
        height: 16%;
        width: 100%;
    }
    .cuerpo
    {
        height: 76%;
        width: 100%;
    }
    .footer
    {
        height: 5%;
        width: 100%;
        margin-bottom: -150px;
        border-top:1px solid black;
    }
      .contenedor-tabla{

        display: table;
        border: 1px solid black;
        border-radius: 10px;
        width: 100%;
        height: auto;

        }

        .contenedor-fila{

        display: table-row;


        }

        .contenedor-columna{

        display: table-cell;
        padding-top: 5px;
        padding-left: 10px;
        padding-bottom: 5px;
        padding-right: 10px;

        }
    #main-container{
        margin-top: 15px;
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
    border: 1px solid #323639;
}

thead.principal{
    background-color: #072F3E;
    border-bottom: solid 5px #323639;
    color: white;
    text-align: center;
}
</style>
<body>
    <div class="header">
        <table width="100%">
          <tr align="center" valign="middle"> 
            <th colspan="5" align="left">
                <img src="img/img-pdf.png" alt="" >
            </th>
            <td colspan="5" valign="middle" >
                <img src="img/dir-pdf.png" alt="" >
            </td>
          </tr>
          <th colspan="10" style="color: white;border-radius: 10px" align="center">
            <div style="border-radius: 5px;border: 1px inset black;background-color:#1C4C6D;padding: 2.5px;margin-top: 6px;margin-bottom: 6px;" >
           COTIZACIÓN N° {{$proforma->serie_proforma}}  F000-{{$proforma->idProforma}} 
        </div>
    </th>          
        </table>
    </div>
    <div class="cuerpo">
        <div class="contenedor-tabla">
            <div class="contenedor-fila">
                <div class="contenedor-columna">
                      <p><span style="font-weight: bold;font-size: 13px">Fecha :</span><span style="font-size: 12px !important" >  {{$proforma->fecha_hora}}</span> </p>
                      <p><span style="font-weight: bold;font-size: 13px">Señores :</span><span style="font-size: 12px !important" >  {{$proforma->nombre}}</span></p>
                      <p><span style="font-weight: bold;font-size: 13px">RUC :</span><span style="font-size: 12px !important" >  {{$proforma->direccion}}</span></p>
                      <p><span style="font-weight: bold;font-size: 13px">Dirección :</span><span style="font-size: 12px !important" >  {{$proforma->direccion}}</span></p>


                 </div>

                <div class="contenedor-columna">
                     <p><span style="font-weight: bold;font-size: 13px">Fecha :</span><span style="font-size: 12px !important" >  {{$proforma->fecha_hora}}</span> </p>
                     <p><span style="font-weight: bold;font-size: 13px">Forma de Pago :</span><span style="font-size: 12px !important" >  {{$proforma->forma_de}}</span></p>
                     <p><span style="font-weight: bold;font-size: 13px">Condición de Venta :</span><span style="font-size: 12px !important" >{{$proforma->observacion_condicion}}</span></p>
                     <p><span style="font-weight: bold;font-size: 13px">Validez de Oferta :</span><span style="font-size: 12px !important" >{{$proforma->plazo_oferta}}</span></p>
                </div>
            </div>
        </div>
            <div id="main-container">
            <table class="principal">
            <thead class="principal">
                <tr class="principal">
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
                <td class="principal" >{{$det->producto.' | '.$det->descripcionDP}}</td>
                <td class="principal" align="center">{{$det->cantidad}}</td>
                <td class="principal" align="center">S/.{{$det->precio_venta}}</td>
                <td class="principal" align="center">{{$det->descuento}}%</td>
                <td class="principal" align="center">S/.{{($det->precio_venta*$det->cantidad)-(($det->cantidad*$det->precio_venta)*($det->descuento/100))}}</td>
            </tr> 
             @endforeach
            </tbody>

           
        </table>  
        </div>
        <div style="width: 100%;height: auto; display: table;padding-top: 10px !important; ">
                <div style="display: table-row;">
                    <!--<div style="display: table-cell;width: 20%;padding: 10px;">
                        <div style="width: 100%;height: auto;border: 1px solid black;text-align: center;border-top-left-radius: 5px;border-top-right-radius: 5px; ">
                            Ejecutivo de Ventas
                        </div>
                        <div style="width: 100%;height: auto;border: 1px solid black;padding: 5px;text-align: center;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;">
                            <p>Alan Panduro</p>
                            <p>Cel. 947342692</p>
                        </div>
                    </div>-->
                    <div style="display: table-cell;width: 60%;">
                        <h4>Cuenta Corriente </h4>
                        <h5>BBVA Soles: 0011 0339-0100014584   (CCI) : 011-339-000100014584-95</h5>
                        <h5>BCP Soles:   192-2324867-0-03        ( CCI) 00219200232486700338</h5>
                        <h5>BCP Dolares :   192-2288918-1-91     ( CCI) 00219200228891819137</h5>
                        <h5>Cta. Corriente  detracciones BN :   00-088-006879</h5>


                    </div>
                    <div style="display: table-cell;width: 40%;">
                        <div style="display: table;width: 100%;">
                            <div style="display: table-row;">
                                <div style="display: table-cell;width: 33%;height: auto;">
                                    <div style="width: 100%;height: auto; background-color: #072F3E;    border-bottom: solid 5px #323639;
    color: white;
    text-align: center;border-top-left-radius: 5px;">
                                        Subtotal
                                    </div>
                                    <div style="width: 100%;height: auto;border: 1px solid #323639;
    text-align: center;border-bottom-left-radius: 5px">
                                        <p> S/. {{$proforma->precio_total}}</p>
                                    </div>
                                </div>
                                <div style="display: table-cell;width: 33%;height: auto;">
                                    <div style="width: 100%;height: auto;background-color: #072F3E;    border-bottom: solid 5px #323639;
    color: white;
    text-align: center;">
                                        IGV
                                    </div>
                                    <div style="width: 100%;height: auto;border: 1px solid #323639;
    text-align: center;">
                                        <p> S/. {{round(($proforma->precio_total)*($proforma->igv/100),2)}}</p>
                                    </div>
                                </div>
                                <div style="display: table-cell;width: 33%;height: auto;">
                                    <div style="width: 100%;height: auto;background-color: #072F3E;    border-bottom: solid 5px #323639;
    color: white;
    text-align: center;border-top-right-radius: 5px">
                                        Precio total
                                    </div>
                                    <div style="width: 100%;height: auto;border: 1px solid #323639;
    text-align: center;border-bottom-right-radius: 5px">
                                        <p> S/. {{round($proforma->precio_total+($proforma->precio_total)*($proforma->igv/100),2)}}</p>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>







    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>