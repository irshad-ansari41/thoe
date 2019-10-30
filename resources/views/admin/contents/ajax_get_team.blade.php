<option value="0">Select</option>
@if(!empty($results))
	@foreach($results as $res)
		<option value="{{ $res->id }}">{{ $res->name }}</option>	
	@endforeach
@endif