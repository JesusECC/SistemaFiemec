{!! Form::open(array('url'=>'productos','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}

<div class="form-group" >
	<div class="input-group">
	<input type="search" class="form-control" name="searchText" placeholder="buscar..." value="{{$searchText}}" aria-controls="example">
	<samp class="input-group-btn">
		<button type="sumbit" class="btn btn-primary" style="background-color: #18A689 !important;border:1px solid #18A689 !important"><i class="fas fa-search"></i>
		</button>
	</samp>
	</div>
</div>
{{Form::close()}}