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
        <h1>Available Units for Booking Management</h1>
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
					<div>
                        <h3 class="panel-title">
									@if($type=="edit")
										Edit available units for property
									@else	
										Add available units for property
									@endif
                        </h3>
					</div>
					
                    </div>
                    <div class="panel-body">
                        <form id="tryitForm" class="form-horizontal" method="post" enctype="multipart/form-data">
						
						<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">Project</label>
						        <div class="col-md-8">
								@if($type=="edit")
                                    <select name="title_en" class="form-control" id="project" required disabled>
								@elseif($type=="add")
									<select name="title_en" class="form-control" id="project" required>
								@endif
										<option value="">Select</option>
										@if(!empty($projects))
											
											@foreach($projects as $project)
												<?php $class=''; ?>
												@if($project->id==$project_id)			
													<?php $class='selected'; ?>
												@endif
												<option value="{{ $project->id }}" {!! $class !!}>{{ $project->title_en }}</option>	
											@endforeach
										@endif
									</select>
                                </div>
                        </div>
						@if($type=="edit")
							<input name="title_en" type="hidden" value="{{ $project_id }}" />
							<input name="pid" type="hidden" value="{{ $id }}" />
						@endif
						<div id="pajax">
						<div class="form-group en_field">
							<label class="col-md-3 control-label hidden-xs">Properties</label>
							<div class="col-md-8">
							@if($type=="edit")
                                    <select name="pid" class="form-control" id="property" required disabled>
							@elseif($type=="add")
								<select name="pid" class="form-control" id="property" required>
							@endif
								
									<option value="">Select</option>
									@if(!empty($props))
										@foreach($props as $res)
												<?php $class=''; ?>
												@if($res->id==$id)	
													<?php $class='selected'; ?>
												@endif
											<option value="{{ $res->id }}" {!! $class !!}>{{ $res->title_en }}</option>	
										@endforeach
									@endif
								</select>
							</div>
						</div>
						</div>
						<div id="unitajax">
							@if($type=="edit")
								<div class="form-group">
									<label class="col-md-3 control-label">Available Units</label>
									<div class="col-md-9">
									@if($allunitsforprop)
										<?php $i = 0; ?>
										@foreach($allunitsforprop as $allunitsforpr)
											<?php
												$class="";
												$price = "0";
												for($j=0;$j<count($unit_ids);$j++)
												{
													if($allunitsforpr->unit_id==$unit_ids[$j])
													{ 
														$class = "checked";
														$price = $availableunitprice[$j];
													}
												}
											?>
											
											<div class="col-md-12">
												<label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
												<input type="checkbox" id="example-inline-checkbox1" name="avail_unit_name[]" value="{{ $allunitsforpr->unit_id }}" <?php echo $class; ?> />
												{{ $availableunitname[$i] }} <input type="text" name="avail_unit_price[{{ $allunitsforpr->unit_id }}]" value="{{ $price }}" placeholder="Add Price for {{ $availableunitname[$i] }}" style="padding-bottom:0px; width:300px;" /></label>
												<input type="hidden" name="merge_unit_array[]" value="{{ $allunitsforpr->id }}" />
											</div>
											<?php $i++; ?>
										@endforeach
									@endif
									</div>
								</div>
							@endif
						</div>
						<div>&nbsp;</div>
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
							
							<input type="hidden" id="form_lang" name="form_lang" value="1">
							<input type="hidden" name="type" value="@if($type){{$type}}@endif">
							<input type="hidden" name="id" value="@if($type=="edit"){{ $id }}@endif">
							@if($type=="edit")
								<input type="hidden" name="project_id" value="{!! $project_id !!}">
							@endif
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
	$( document ).ready(function() {
		$("#project").change(function(){
			//alert($(this).val());
			$.ajax({
			 url:"ajax_get_properties_unit",
			 data: $('#tryitForm').serialize(),
			 type:"POST",
			 success:function(data) {
				$("#property").html(data);
				$("#unitajax").html(" ");
			 }
			});
		});
		$("#property").change(function(){
			$.ajax({
			 url:"ajax_get_units",
			 data: $('#tryitForm').serialize(),
			 type:"POST",
			 success:function(data) {
				$("#unitajax").html(data);
			 }
			});
		});
		$(document).on("click",".remove",function(){
			$(this).parent().parent().parent().parent().remove();
		});
	});
	</script>
	
@stop
