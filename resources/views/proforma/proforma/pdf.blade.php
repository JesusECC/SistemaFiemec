<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>


<div class="col-lg-3">
        <img src="img/logo.jpg" width="230" height="180">
    </div> 
----------------------la imagen esta biena aca --------------------

<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
<div class="form-group">
<p>P. P. N. Pachacutec Mz. W1 Lot. 7 Gru. Residencial E4 - Sector E Callao - Ventanilla</p>    
<p>Cel. 946398756 - 947342692  Tef. (01) 4808910- 7582351</p>    
<p>Email: ventas@jfiemec.pe</p>
<p>www.fiemec.pe  </p>
</div> 
</div>
-------------Datos de la empresa en la esquina superior derecha-------------------------------



<div class="col-lg-3 col-sm-6 col-md-6 col-xs-6">
        <div class="form-group">
            <label for="cliente">Cliente</label>
            <p>{{$proforma->nombre}}</p>
       </div>
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
        <label for="serie_proforma">Serie Proforma</label>
        <p>{{$proforma->serie_proforma}}</p>        
        </div>
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
         <div class="form-group">
        <label for="num_proforma">Numero Proforma</label>
        <p>f000-{{$proforma->idProforma}}</p>   
         </div> 
    </div>

    
    <div class="col-lg-9 col-sm-9 col-md-9 col-xs-12">
        <div class="form-group">
        <label for="direccion">Direccion</label>
        <p>{{$proforma->direccion}}</p>   
         </div> 
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
        <label for="fecha_hora">Fecha</label>
        <p>{{$proforma->fecha_hora}}</p>   
         </div> 
    </div>

       --
       --
       --
       el tamano de la letra de los producto,precio,etc tambine un poco mas pequeno pofavo
       --
       --        
    <div class=>
        <div class=>
            <div class="">
                <table class="table table-hover">
  <thead>
    <tr>
   <th>Producto</th>
   <th>Cantidad</th>
   <th>Precio</th>
   <th>Descuento x c/u</th>
   <th>Total</th>


    </tr>
  </thead>
  <tbody>
@foreach($detalles as $det)
    <tr>
      
    <td>{{$det->producto.' | '.$det->descripcionDP}}</td>
    <td>{{$det->cantidad}}</td>
    <td>S/.{{$det->precio_venta}}</td>
    <td>{{$det->descuento}}%</td>
    <td>S/.{{($det->precio_venta*$det->cantidad)-(($det->cantidad*$det->precio_venta)*($det->descuento/100))}}</td>
    </tr>
     @endforeach


  </tbody>
   <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div>
        <label>Subtotal:  {{$proforma->precio_total}}</label>
        </div>  
        <div>
        <label>IGV: {{round(($proforma->precio_total)*($proforma->igv/100),2)}}</label>
        </div> 
        <div> 
        <label>Precio total: {{round($proforma->precio_total+($proforma->precio_total)*($proforma->igv/100),2)}}</label>   
        </div> 
        <div>
        <label>Forma de:  {{$proforma->forma_de}}</label>
        </div>
        <div>
        <label>Plazo de Oferta:  {{$proforma->plazo_oferta}}</label>
        </div>
        <div>
        <label>Observaciones:  {{$proforma->observacion_condicion}}</label>
        </div>
    </div>
</table>



            </div>
        </div>
    </div> 
    -------------------------reduce el tamano de la infformaciond ela empresa------------------------- 
<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    <div>
        <label>FIEMEC S.A.C  RUC: 20546979611</label>
        </div>
         <div>
        <label>Cta. Corriente  BBVA Soles: 0011 0339-0100014584   (CCI) : 011-339-000100014584-95 </label>
         <div>
        <label>Cta. Corriente  BCP Soles:   192-2324867-0-03        ( CCI) 00219200232486700338</label>
         <div>
        <label>Cta. Corriente  BCP Dolares :   192-2288918-1-91     ( CCI) 00219200228891819137</label>
         <div>
        <label>Cta. Corriente  detracciones BN :   00-088-006879</label>
 <div>
        </div> 

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>