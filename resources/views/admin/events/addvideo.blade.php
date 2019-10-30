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
        <h1>Event Management</h1>
    </section>
    <!--section ends-->
    <section class="content">
        <!--main content-->
        <div class="row">
            <div class="col-md-12">
				@include('admin.common.errors')
                <!--image upload -->
                <div class="panel panel-danger">
                    <div class="panel-heading">
					<div style="float:left;width:70%;">
                        <h3 class="panel-title">
									@if($type=="edit")
										Edit video
									@else	
										Add video
									@endif
                        </h3>
					</div>
					<div>
						<div class="btn-group btn-group-xs">
							
						</div>
					</div>
                    </div>
                    <div class="panel-body">
                        <form id="tryitForm" class="form-horizontal" method="post" enctype="multipart/form-data">
						
						
						<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">Year</label>
						        <div class="col-md-8">
                                    <select name="year" class="form-control">
											<option value="">Select</option>
										@for($i=$year;$i>=1980;$i--)
											<?php $class=''; ?>
											<option value="{!! $i !!}"
											
											@if($results)
												@if($results->year==$i)
													<?php $class='selected'; ?>
												@endif
											@endif
											{!! $class !!} >{!! $i !!}</option>
										@endfor
									</select>
                                </div>
                        </div>
						
						<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">Type</label>
						        <div class="col-md-8">
                                    <select name="gallery_type" class="form-control">
										<option value="">Select</option>
										<option value="1"
										<?php $class=''; ?>
										@if($results)
											@if($results->gallery_type=="1")
												<?php $class='selected'; ?>
											@endif
										@endif
										{!! $class !!}>Corporate</option>
										<option value="2"
										
										<?php $class=''; ?>
										@if($results)
											@if($results->gallery_type=="2")
												<?php $class='selected'; ?>
											@endif
										@endif
										{!! $class !!}>Promotional</option>
										<option value="3"
										<?php $class=''; ?>
										@if($results)
											@if($results->gallery_type=="3")
												<?php $class='selected'; ?>
											@endif
										@endif
										{!! $class !!}>Events</option>
									</select>
                                </div>
                        </div>
						
						<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">Title(English)</label>
						        <div class="col-md-8">
                                    <input type="text" name="title_en" class="form-control" value="@if($results){{ $results->gallery_title }} @endif">
                                </div>
                        </div>
                        <div class="form-group ar_field">
                                <label class="col-md-3 control-label hidden-xs">Title(Arabic)</label>
						        <div class="col-md-8">
                                    <input type="text" name="title_ar" class="form-control" value="@if($results){{ $results->gallery_title_ar }} @endif">
                                </div>
                        </div>
                        <div class="form-group ch_field">
                                <label class="col-md-3 control-label hidden-xs">Title(Chinese)</label>
						        <div class="col-md-8">
                                    <input type="text" name="title_ch" class="form-control" value="@if($results){{ $results->gallery_title_ch }} @endif">
                                </div>
                        </div>
						
						<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">Long Title(English)</label>
						        <div class="col-md-8">
                                    <textarea name="gallery_long_title" class="form-control">@if($results){{ $results->gallery_long_title }} @endif</textarea>
                                </div>
                        </div>
                        <div class="form-group ar_field">
                                <label class="col-md-3 control-label hidden-xs">Long Title(Arabic)</label>
						        <div class="col-md-8">
                                    <textarea name="gallery_long_title_ar" class="form-control">@if($results){{ $results->gallery_long_title_ar }} @endif</textarea>
                                </div>
                        </div>
                        <div class="form-group ch_field">
                                <label class="col-md-3 control-label hidden-xs">Long Title(Chinese)</label>
						        <div class="col-md-8">
                                    <textarea name="gallery_long_title_ch" class="form-control">@if($results){{ $results->gallery_long_title_ch }} @endif</textarea>
                                </div>
                        </div>
						
						
						<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">Short Description(English)</label>
						        <div class="col-md-8">
                                    <textarea name="short_description" class="form-control">@if($results){{ $results->short_description }} @endif</textarea>
                                </div>
                        </div>
                        <div class="form-group ar_field">
                                <label class="col-md-3 control-label hidden-xs">Short Description(Arabic)</label>
						        <div class="col-md-8">
                                    <textarea name="short_description_ar" class="form-control">@if($results){{ $results->short_description_ar }} @endif</textarea>
                                </div>
                        </div>
                        <div class="form-group ch_field">
                                <label class="col-md-3 control-label hidden-xs">Short Description(Chinese)</label>
						        <div class="col-md-8">
                                    <textarea name="short_description_ch" class="form-control">@if($results){{ $results->short_description_ch }} @endif</textarea>
                                </div>
                        </div>
						
						<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">Youtube URL</label>
						        <div class="col-md-8">
                                    <input type="text" name="image" class="form-control" value="@if($results){{ $results->image }} @endif">
                                </div>
                        </div>
						
						
						<div class="form-group" id="one">
								<label class="col-md-3 control-label" >Holder Image
								
								<br><br></label>
									<div class="col-md-8">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
											@if($results)
												@if($results->holder_image!="")
												<img src="<?= url("/") ?>/assets/images/video/{!! $results->holder_image !!}">
												@endif
											@endif
											</div>
											
											<div>
												<span class="btn btn-default btn-file">
													<span class="fileinput-new">Select</span>
													<span class="fileinput-exists">Change</span>
													<input type="file" name="holder_image"></span>
												<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
											</div>
										</div>
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
							
							<input type="hidden" id="form_lang" name="form_lang" value="1">
							<input type="hidden" name="type" value="@if($type){{$type}}@endif">
							<input type="hidden" name="id" value="@if($type=="edit"){{ $id }}@endif">
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        <!--row ends-->
    </section>
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
			 url:"ajax_get_properties",
			 data: $('#tryitForm').serialize(),
			 type:"POST",
			 success:function(data) {
				$("#pajax").html(data);
			 }
			});
		});
		
		<?php if($type=="add"){ ?>
		$("#add").click(function(){
			$("#pimages").append($("#one").clone().attr({"style":"display:block","id":""}));
		})
		<?php }else{ ?>
		
		$("#add").click(function(){
			$("#pimages").append($("#one").clone().attr({"style":"display:block","id":""}));
		})
		
		<?php } ?>
		
		$(document).on("click",".remove",function(){
			$(this).parent().parent().parent().parent().remove();
		});
	});
	</script>
	
@stop
