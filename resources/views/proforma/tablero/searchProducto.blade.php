<!--{!! Form::open(array('url'=>'tableros/create','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!} -->

<div class="form-group">
	<div class="input-group">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<label for="searchText">Buscar producto</label>
		<input type="text" class="form-control" id="searchText" name="searchText" placeholder="buscar..." value="{{$searchText}}">
		
	</div>
</div>
<!--{{Form::close()}}-->