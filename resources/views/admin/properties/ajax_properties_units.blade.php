<option value="">Select</option>
@if(!empty($results))
	@foreach($results as $res)
		<option value="{{ $res->id }}">{{ $res->title_en }}</option>	
	@endforeach
@endif