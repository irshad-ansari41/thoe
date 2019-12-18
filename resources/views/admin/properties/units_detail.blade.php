@extends('admin/layouts/default')

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/css/pages/form2.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/pages/form3.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/intl-tel-input/build/css/intlTelInput.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') }}"  rel="stylesheet" media="screen"/>
    <link href="{{ asset('assets/css/pages/editor.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('assets/css/pages/buttons.css') }}" rel="stylesheet"/>

@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Unit Management</h1>
    </section>
    <!--section ends-->
    <section class="content">
        <!--main content-->
        <div class="row">
            <div class="col-md-12">
				@includeIf('admin.common.errors')
                <!--image upload -->
                <div class="panel panel-danger">
                    <div class="panel-heading">
					<div style="float:left;width:60%;">
                        <h3 class="panel-title">
									@if($type=="edit")
										Add Unit Details for {{ $property_data->title_en }}
									@else	
										Add Property
									@endif
                        </h3>
					</div>
					<div>
						<div class="btn-group btn-group-xs">
							<button type="button" class="btn btn-success btn_sizes" onclick="displayLanguage(1)">English</button>
							<button type="button" class="btn btn-danger btn_sizes" onclick="displayLanguage(2)">Arabic</button>
							<button type="button" class="btn btn-warning btn_sizes" onclick="displayLanguage(3)">Chinese</button>
							<button type="button" class="btn btn-warning btn_sizes" onclick="displayLanguage(4)">Hindi</button>
							<button type="button" class="btn btn-warning btn_sizes" onclick="displayLanguage(5)">Urdu</button>
							<button type="button" class="btn btn-primary btn_sizes" onclick="displayLanguage(0)">Show All</button>
						</div>
					</div>
                    </div>
                    <div class="panel-body">
                        <form id="tryitForm" class="form-horizontal" method="post" enctype="multipart/form-data">
							<div class="form-group striped-col">
								<label class="col-md-3 control-label" for="example-select">Property : </label>
								<div class="col-md-4">
									<input type="text" class="form-control" name="proid" placeholder="{{ $property_data->title_en }}" readonly />
									<input type="hidden" class="form-control" name="pid" value="{{ $property_data->id }}" />
								</div>
							</div>
							<div class="form-group striped-col">
								<label class="col-md-3 control-label" for="example-select">Unit : </label>
								<div class="col-md-4">
									<input type="text" class="form-control" name="unid" placeholder="{{ $unit_data->title_en }}" readonly />
									<input type="hidden" class="form-control" name="uid" value="{{ $unit_data->id }}" />
								</div>
							</div>
							<input type="hidden" name="pmuid" value="{{ $id }}" />
							
							<div class="form-group">
								<label class="col-md-3 control-label">Available Floors</label>
								<div class="col-md-9">
								@if($unitfloors)
									@foreach($unitfloors as $unitfloor)
										<?php
											$class="";
										?>
										
										@if($unit_detail_data)
											@foreach($unitmergefloor as $unitmergeflr)
												@if($unitfloor->id==$unitmergeflr->unit_floor_id)
													<?php $class="checked"; ?>
												@endif
											@endforeach
										@endif
										<div class="col-md-12">
											<label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
											<input type="checkbox" id="example-inline-checkbox1" name="floor_name[]" value="{{ $unitfloor->id }}" <?php echo $class; ?> />
											{{ $unitfloor->title_en }}</label>
										</div>
									@endforeach
								@endif
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Unit Features</label>
								<div class="col-md-9">
								@if($unitfeatures)
									@foreach($unitfeatures as $unitfeature)
										<?php
											$class="";
										?>
										@if($unit_detail_data)
											@foreach($unitmergefeature as $unitmergeftr)
												@if($unitfeature->id==$unitmergeftr->unit_feature_id)
													<?php $class="checked"; ?>
												@endif
											@endforeach
										@endif
										<div class="col-md-12">
											<label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
											<input type="checkbox" id="example-inline-checkbox1" name="unit_feature[]" value="{{ $unitfeature->id }}" <?php echo $class; ?> />
											{{ $unitfeature->title_en }}</label>
										</div>
									@endforeach
								@endif
								</div>
							</div>
						
							
							<div class="form-group">
							<label class="col-md-3 control-label" name="description">Unit Banner : <br><br> </label>
								<div class="col-md-8">
									<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
											<?php 
											if(count($unit_detail_data)>0)
											{
											?>
												<img src="{{asset('assets/images/properties')}}/{!! $project_data->gallery_location !!}/{!! $property_data->gallery_location !!}/Unit/{!! $unit_detail_data->unit_banner !!}" height="190" width="190" />
											<?php
											}
											?>
											
											</div>
											
												<div>
													<span class="btn btn-default btn-file">
														<span class="fileinput-new">Select</span>
														<span class="fileinput-exists">Change</span>
														@if($unit_detail_data)
														<input type="file" name="image"></span>
														@else
														<input type="file" name="image" required></span>
														@endif
													<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
												</div>
												
									</div>
								</div>
							</div>
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Unit banner Alt : </label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="unit_banner_alt"
                                            value="@if(count($unit_detail_data)>0){{ $unit_detail_data->unit_banner_alt }} @endif" />
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Unit Description (English) : </label>
                                <div class="col-md-8">
                                   <textarea class="form-control" name="unit_description" rows="4">@if(count($unit_detail_data)>0){{ $unit_detail_data->unit_description }} @else {{ old('unit_description') }} @endif</textarea>
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Price Starts at : </label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="price_starts_at"
                                          value="@if(count($unit_detail_data)>0){{ $unit_detail_data->price_starts_at }} @endif" />
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Price / Sqft Starts at : </label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="price_sqft_starts_at"
                                          value="@if(count($unit_detail_data)>0){{ $unit_detail_data->price_sqft_starts_at }} @endif" />
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Reference : </label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="reference"
                                          value="@if(count($unit_detail_data)>0){{ $unit_detail_data->reference }} @endif" />
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Bedrooms : </label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="bedrooms"
                                          value="@if(count($unit_detail_data)>0){{ $unit_detail_data->bedrooms }} @endif" />
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Bathrooms  : </label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="bathrooms"
                                          value="@if(count($unit_detail_data)>0){{ $unit_detail_data->bathrooms }} @endif" />
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Area  : </label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="area"
                                          value="@if(count($unit_detail_data)>0){{ $unit_detail_data->area }} @endif" />
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Virtual tour link  : </label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="virtual_tour_link"
                                          value="@if(count($unit_detail_data)>0){{ $unit_detail_data->virtual_tour_link }} @endif" />
                                </div>
                            </div>
							
							<div class="form-group ">
                                <label class="col-md-3 control-label hidden-xs">Slug : </label>

                                <div class="col-md-8">
                                    <textarea class="form-control" name="slug">@if(count($unit_detail_data)>0){{ $unit_detail_data->slug }}@endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group ">
                                <label class="col-md-3 control-label hidden-xs">Meta Title : </label>

                                <div class="col-md-8">
                                    <textarea class="form-control" name="meta_title">@if(count($unit_detail_data)>0){{ $unit_detail_data->meta_title }}@endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group ">
                                <label class="col-md-3 control-label hidden-xs">Meta keyword : </label>

                                <div class="col-md-8">
                                    <textarea class="form-control" name="meta_keyword">@if(count($unit_detail_data)>0){{ $unit_detail_data->meta_keyword }}@endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group ">
                                <label class="col-md-3 control-label hidden-xs">Meta Description : </label>

                                <div class="col-md-8">
                                    <textarea class="form-control" name="meta_desc">@if(count($unit_detail_data)>0){{ $unit_detail_data->meta_desc }}@endif</textarea>
                                </div>
                            </div>

							<div class="form-group">
                                <div class="col-md-offset-3 col-md-8">
                                    <button type="submit" class="btn btn-primary">
									@if($type=="edit")
										Update
									@else	
										Save
									@endif	
									</button>
                                </div>
                            </div>
							<input type="hidden" id="latitude" name="latitude" value="">
							<input type="hidden" id="longitude" name="longitude" value="">
							<input type="hidden" name="type" value="@if($type){{$type}}@endif">
							<?php $udid = ""; ?>
							@if($type=='edit')
								@if(count($unit_detail_data)>0)
									<?php $udid = $unit_detail_data->id; ?>
								@endif 
							@endif
							<input type="hidden" name="id" value="<?php echo $udid ; ?>">
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />							
							
						</form>
                    </div>
                </div>
                
            </div>
        </div>
        <!--row ends-->
    </section>
    <!-- content -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')

	<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}"
            type="text/javascript"></script>
    {{--<script src="{{ asset('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js') }}"></script>--}}
		<script src="{{ asset('assets/js/pages/validation.js') }}" type="text/javascript"></script>
	
	<script src="{{asset('assets/vendors/tinymce/tinymce.min.js')}}" type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/ckeditor/js/ckeditor.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/ckeditor/js/jquery.js') }}"  type="text/javascript" ></script>
    <script  src="{{ asset('assets/vendors/ckeditor/js/config.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('assets/js/pages/editor.js') }}"  type="text/javascript"></script>
	  <script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
	  <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
	  <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
   <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" ></script>
   <script>
	function displayLanguage(lang)
	{
		if(lang==1)
		{
			$(".en_field").show();
			$(".ar_field").hide();
			$(".ch_field").hide();
			$(".hn_field").hide();
			$(".ur_field").hide();
			$("#form_lang").val(1);
		}
		if(lang==2)
		{
			$(".en_field").hide();
			$(".ar_field").show();
			$(".ch_field").hide();
			$(".hn_field").hide();
			$(".ur_field").hide();
			$("#form_lang").val(2);
		}
		if(lang==3)
		{
			$(".en_field").hide();
			$(".ar_field").hide();
			$(".ch_field").show();
			$(".hn_field").hide();
			$(".ur_field").hide();
			$("#form_lang").val(3);
		}
		if(lang==4)
		{
			$(".en_field").hide();
			$(".ar_field").hide();
			$(".ch_field").hide();
			$(".hn_field").show();
			$(".ur_field").hide();
			$("#form_lang").val(4);
		}
		if(lang==5)
		{
			$(".en_field").hide();
			$(".ar_field").hide();
			$(".ch_field").hide();
			$(".hn_field").hide();
			$(".ur_field").show();
			$("#form_lang").val(5);
		}
		if(lang==0)
		{
			$(".en_field").show();
			$(".ar_field").show();
			$(".ch_field").show();
			$(".hn_field").show();
			$(".ur_field").show();
			$("#form_lang").val(0);
		}
	}
	$(".ar_field").hide();
	$(".ch_field").hide();
	$(".hn_field").hide();
	$(".ur_field").hide();
   </script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJUBn23HnarOGe1LJlDC9DScN_AKe92LY&libraries=places"
        ></script>
<script type="text/javascript">
google.maps.event.addDomListener(window, 'load', initialize);
function initialize() {
var autocomplete = new google.maps.places.Autocomplete(document.getElementById('txtAutocomplete'));
google.maps.event.addListener(autocomplete, 'place_changed', function () {
// Get the place details from the autocomplete object.
var place = autocomplete.getPlace();
document.getElementById("latitude").value=place.geometry.location.lat();
document.getElementById("longitude").value=place.geometry.location.lng();

});
}
</script>

@stop
