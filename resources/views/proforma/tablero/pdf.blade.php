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
   
  </header> 
  <main>
 

  
    @foreach($tablero as $t)
    {{ $t->nombre_tablero }}
    <br>
      @foreach($proforma as $p)
        @if($t->nombre_tablero==$p->nombre_tablero )      
          {{ $p->nombre_producto }}
        <br>
        @endif
      @endforeach
    @endforeach



  </main>
  <footer>  
    La factura fue creada en una computadora y es válida sin la firma y el sello
  </footer>
</body>
</html>