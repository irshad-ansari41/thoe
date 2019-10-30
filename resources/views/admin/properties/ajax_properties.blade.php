<div class="form-group en_field">
	<label class="col-md-3 control-label hidden-xs">Properties</label>
	<div class="col-md-8">
		<select name="pid" class="form-control" id="property" required>
			<option value="">Select</option>
			@if(!empty($results))
				@foreach($results as $res)
					<option value="{{ $res->id }}">{{ $res->title_en }}</option>	
				@endforeach
			@endif
		</select>
	</div>
</div>