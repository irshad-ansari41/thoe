<div class="form-group">
	<label class="col-md-3 control-label">Available Units</label>
	<div class="col-md-9">
	@if($results)
		<?php $i = 0; ?>
		@foreach($results as $res)
			<?php
				$class="";
			?>
			<div class="col-md-12">
				<label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
				<input type="checkbox" id="example-inline-checkbox1" name="avail_unit_name[]" value="{{ $allunitsids[$i] }}" />
				{{ $allunits[$i] }} <input type="text" name="avail_unit_price[{{ $allunitsids[$i] }}]]" value="" placeholder="Add Price for {{ $allunits[$i] }}" style="padding-bottom:0px; width:300px;" />
				</label>
				
				<input type="hidden" name="merge_unit_array[]" value="{{ $res->id }}" />
			</div>
			<?php $i++; ?>
		@endforeach
	@endif
	</div>
</div>