{!! Form::open(array('url'=>'proforma/proforma','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}

<div class="form-group">
	<div class="input-group">
	<input type="text" class="form-control" name="searchText" placeholder="buscar..." required value="{{$searchText}}">
	
	<samp class="input-group-btn">
		<button type="sumbit" class="btn btn-primary">Buscar
		</button>
	</samp>
	</div>
</div>
{{Form::close()}}