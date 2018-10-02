{!! Form::open(array('url'=>'proforma/familia','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
<!--la 'URL'-> es la direccion donde va enviar la informacion/ 'method'=>'GET' -> este el metodod e envio de dato /  'role'=>'search'-> este el rol que se le asigna-->
<div class="form-group">
	<div class="input-group">
	<input type="text" class="form-control" name="searchText" placeholder="buscar..." value="{{$searchText}}">
	<samp class="input-group-btn">
		<button type="sumbit" class="btn btn-primary">Buscar
		</button>
	</samp>
	</div>
</div>
{{Form::close()}}