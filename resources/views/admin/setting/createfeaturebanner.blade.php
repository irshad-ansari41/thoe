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
        <h1>Website Management</h1>
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
					<div style="float:left;width:60%;">
                        <h3 class="panel-title">
						@if($type=="add")
                            Add Explore Our Projects
						@else
							Edit Explore Our Projects
						@endif	
                        </h3>
					</div>
					<div>
						<div class="btn-group btn-group-xs">
							<button type="button" class="btn btn-success btn_sizes" onclick="displayLanguage(1)">English</button>
							<button type="button" class="btn btn-warning btn_sizes" onclick="displayLanguage(2)">Arabic</button>
							<button type="button" class="btn btn-warning btn_sizes" onclick="displayLanguage(3)">Chinese</button>
							<button type="button" class="btn btn-warning btn_sizes" onclick="displayLanguage(4)">Hindi</button>
							<button type="button" class="btn btn-warning btn_sizes" onclick="displayLanguage(5)">Urdu</button>
							<button type="button" class="btn btn-primary btn_sizes" onclick="displayLanguage(0)">Show All</button>
						</div>
					</div>
                    </div>
                    <div class="panel-body">
                        <form id="tryitForm" class="form-horizontal" method="post" enctype="multipart/form-data">
                            
							<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">Title (English)</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="banner_title_en"
                                           placeholder="Enter banner title in English" value="@if($bannerslider){{ $bannerslider->banner_title_en }} @else {{ old('banner_title_en') }} @endif" maxlength="70" required />
                                </div>
                            </div>
							
							
							<div class="form-group ar_field">
                                <label class="col-md-3 control-label hidden-xs">Title (Arabic)</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="@if($bannerslider){{ $bannerslider->banner_title_ar }} @else {{ old('banner_title_ar') }} @endif" name="banner_title_ar"
                                           placeholder="Enter banner title in Arabic" maxlength="70"/>
                                </div>
                            </div>
                          
							<div class="form-group ch_field">
                                <label class="col-md-3 control-label hidden-xs">Title (Chinese)</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="@if($bannerslider){{ $bannerslider->banner_title_ch }} @else {{ old('banner_title_ch') }} @endif" name="banner_title_ch"
                                           placeholder="Enter banner title in Chinese" maxlength="70"/>
                                </div>
                            </div>
							
							<div class="form-group hn_field">
                                <label class="col-md-3 control-label hidden-xs">Title (Hindi)</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="@if($bannerslider){{ $bannerslider->banner_title_hn }} @else {{ old('banner_title_hn') }} @endif" name="banner_title_hn"
                                           placeholder="Enter banner title in Hindi" maxlength="70"/>
                                </div>
                            </div>
							
							<div class="form-group ur_field">
                                <label class="col-md-3 control-label hidden-xs">Title (Urdu)</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="@if($bannerslider){{ $bannerslider->banner_title_ur }} @else {{ old('banner_title_ur') }} @endif" name="banner_title_ur"
                                           placeholder="Enter banner title in Urdu" maxlength="70"/>
                                </div>
                            </div>
							
							<div class="form-group en_field">
                                <label class="col-md-3 control-label" name="banner_short_description_en">Subtitle  (English)</label>

                                <div class="col-md-8">
									<textarea name="banner_short_description_en" id="inputContent2" rows="3" class="form-control resize_vertical ">@if($bannerslider){{ $bannerslider->banner_short_description_en }} @else {{ old('banner_short_description_en') }} @endif</textarea> 
								</div>
                            </div>
							<div class="form-group ar_field">
                                <label class="col-md-3 control-label" name="banner_short_description_ar">Subtitle (Arabic)</label>

                                <div class="col-md-8">
									<textarea name="banner_short_description_ar" id="inputContent2" rows="3" class="form-control resize_vertical ">@if($bannerslider){{ $bannerslider->banner_short_description_ar }} @else {{ old('banner_short_description_ar') }} @endif</textarea> 
								</div>
                            </div>
							<div class="form-group ch_field">
                                <label class="col-md-3 control-label" name="banner_short_description_ch">Subtitle (Chinese)</label>

                                <div class="col-md-8">
									<textarea name="banner_short_description_ch" id="inputContent2" rows="3" class="form-control resize_vertical ">@if($bannerslider){{ $bannerslider->banner_short_description_ch }} @else {{ old('banner_short_description_ch') }} @endif</textarea> 
								</div>
                            </div>
							
							<div class="form-group hn_field">
                                <label class="col-md-3 control-label" name="banner_short_description_hn">Subtitle (Hindi)</label>

                                <div class="col-md-8">
									<textarea name="banner_short_description_hn" id="inputContent2" rows="3" class="form-control resize_vertical ">@if($bannerslider){{ $bannerslider->banner_short_description_hn }} @else {{ old('banner_short_description_hn') }} @endif</textarea> 
								</div>
                            </div>
							
							<div class="form-group ur_field">
                                <label class="col-md-3 control-label" name="banner_short_description_ur">Subtitle (Urdu)</label>

                                <div class="col-md-8">
									<textarea name="banner_short_description_ur" id="inputContent2" rows="3" class="form-control resize_vertical ">@if($bannerslider){{ $bannerslider->banner_short_description_ur }} @else {{ old('banner_short_description_ur') }} @endif</textarea> 
								</div>
                            </div>
							
							<div class="form-group en_field">
                                <label class="col-md-3 control-label">Short Description (English)</label>

                                <div class="col-md-8">
									<textarea name="banner_long_description_en" rows="3" class="form-control resize_vertical ">@if($bannerslider){{ $bannerslider->banner_long_description_en }} @endif</textarea>
								</div>
                            </div>
							<div class="form-group ar_field">
                                <label class="col-md-3 control-label" name="banner_long_description_ar" class="form-control resize_vertical ">Banner Long Description (Arabic)</label>

                                <div class="col-md-8">
									<textarea name="banner_long_description_ar" rows="3">@if($bannerslider){{ $bannerslider->banner_long_description_ar }} @else {{ old('banner_long_description_ar') }} @endif</textarea>
								</div>
                            </div>
							<div class="form-group ch_field">
                                <label class="col-md-3 control-label" name="banner_long_description_ch" class="form-control resize_vertical ">Banner Long Description (Chinese)</label>

                                <div class="col-md-8">
									<textarea name="banner_long_description_ch" rows="3">@if($bannerslider){{ $bannerslider->banner_long_description_ch }} @else {{ old('banner_long_description_ch') }} @endif</textarea>
								</div>
                            </div>
							
							<div class="form-group hn_field">
                                <label class="col-md-3 control-label" name="banner_long_description_hn" class="form-control resize_vertical ">Banner Long Description (Hindi)</label>

                                <div class="col-md-8">
									<textarea name="banner_long_description_hn" rows="3">@if($bannerslider){{ $bannerslider->banner_long_description_hn }} @else {{ old('banner_long_description_hn') }} @endif</textarea>
								</div>
                            </div>
							
							<div class="form-group ur_field">
                                <label class="col-md-3 control-label" name="banner_long_description_ur" class="form-control resize_vertical ">Banner Long Description (Urdu)</label>

                                <div class="col-md-8">
									<textarea name="banner_long_description_ur" rows="3">@if($bannerslider){{ $bannerslider->banner_long_description_ur }} @else {{ old('banner_long_description_ur') }} @endif</textarea>
								</div>
                            </div>
							
							<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">Explore more Link</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="explore_link"
                                           placeholder="Enter banner title in English" value="@if($bannerslider){{ $bannerslider->explore_link }} @else {{ old('explore_link') }} @endif" />
                                   <p style="color:red;">Note : Please write 'domain.com/{lang}/' as prefix while adding link</p>

                                </div>
                            </div>
                            
							
							<!--<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">Starting From</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="banner_starting_at"
                                           placeholder="Enter banner title in English" value="@if($bannerslider){{ $bannerslider->banner_starting_at }} @else {{ old('banner_starting_at') }} @endif" />
                                </div>
                            </div>-->
							
							<div class="form-group" id="itype" style="display:block;" >
								<label class="col-md-3 control-label" name="description">Photo <br><br> (Note : Photo size minimum 800kb and maximum 2mb)</label>
									<div class="col-md-8">
										<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
													
													@if($bannerslider) <img src="{{asset('assets/images/home_banners')}}/{!! $bannerslider->banner_image !!}" height="190" width="190" /> 
													@endif</div>
												
													<div>
														<span class="btn btn-default btn-file">
															<span class="fileinput-new">Select Photo</span>
															<span class="fileinput-exists">Change</span>
															@if($bannerslider)
															<input type="file" name="banner_image" id="fileUpload" required></span>
															@else
															<input type="file" name="banner_image" id="fileUpload"></span>
															@endif
														<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
													</div>
													
										</div>
									</div>
							</div>
							
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Photo Alt</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="alt"
                                           placeholder="Enter alt" value="@if($bannerslider){{ $bannerslider->alt }} @else {{ old('alt') }} @endif" maxlength="70" />
                                </div>
                            </div>
							
							<div class="form-group" id="vtype" 
								
							@if($type=="edit") 
									@if($bannerslider->type=="2")
										style="display:block;"
									@else
										style="display:none;"	
									@endif
							@else		
									style="display:none;"
							@endif
							>
								<div class="form-group">
									<label class="col-md-3 control-label" name="banner_long_description_hn">Youtube URL</label>

									<div class="col-md-8">
										<input type="text" class="form-control" value="@if($bannerslider && $bannerslider->type=="2"){{ $bannerslider->banner_image }} @endif" name="youtubeurl"
                                           placeholder="" />
									</div>
								</div>
							</div>
							
                            
                            <div class="form-group">
                                <div class="col-md-offset-3 col-md-8">
									<button type="button" class="btn btn-primary" onclick="checkLogoSize()">
									@if($type=="add")
										Submit
									@else
										Update
									@endif
									</button>
                                </div>
                            </div>
							<input type="hidden" id="form_lang" name="form_lang" value="1">
							<input type="hidden" name="type" value="@if($type){{$type}}@endif" id="action_type">
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
		<script src="{{ asset('assets/js/pages/validation1.js') }}" type="text/javascript"></script>
	
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
		$(".type1").change(function(){
			
			if($(this).val()=="1"){
				$("#itype").show();
				$("#vtype").hide();
			}else{
				$("#itype").hide();
				$("#vtype").show();
			}
		});
	});
   
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
   
   <script>
   function checkLogoSize()
	{
		
        //Get reference of FileUpload.
        var fileUpload = $("#fileUpload")[0];
		var imgVal = $('#fileUpload').val();
		var flag = 1;
		
		if(document.getElementById("action_type").value=="add")
		{
			if(imgVal=='')
			{
				flag = 2;
			}
		}
		
		if(flag==1)
		{
			if(fileUpload.files[0]!=undefined)
			{
				//Check whether the file is valid Image.
				var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
				if (regex.test(fileUpload.value.toLowerCase())) {
					//Check whether HTML5 is supported.
					if (typeof (fileUpload.files) != "undefined") {
						//Initiate the FileReader object.
						var reader = new FileReader();
						//Read the contents of Image File.
						reader.readAsDataURL(fileUpload.files[0]);
						reader.onload = function (e) {
							//Initiate the JavaScript Image object.
							var image = new Image();
							//Set the Base64 string return from FileReader as source.
							image.src = e.target.result;
							image.onload = function () {
								//Determine the Height and Width.
								var height = this.height;
								var width = this.width;
								if (height > 2000 || width > 2000) {
									alert("Banner Photo : Height must not exceed 1087px and Width must not exceed 1920px.");
									return false;
								}
								else
								{
									document.getElementById("tryitForm").submit();
								}
							};
						}
					} else {
						alert("This browser does not support HTML5.");
						return false;
					}
				} else {
					alert("Please select an image for banner photo.");
					return false;
				}
			}
			else
			{
				document.getElementById("tryitForm").submit();
			}
		}
		else{
			alert("Required : Please select banner photo");
			return false;
		}
	}
   </script>
@stop
