@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Add New Content
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/css/pages/form2.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/pages/form3.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/intl-tel-input/build/css/intlTelInput.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') }}"  rel="stylesheet" media="screen"/>
    <link href="{{ asset('assets/css/pages/editor.css') }}" rel="stylesheet" type="text/css"/>

@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Careers page content</h1>
    </section>
    <!--section ends-->
    <section class="content">
        <!--main content-->
        <div class="row">
            <div class="col-md-12">
                <!--image upload -->
                <div class="panel panel-danger">
                    <div class="panel-heading">
						<div style="float:left;width:70%;">
							<h3 class="panel-title">
								<i class="livicon" data-name="pacman" data-size="16" data-loop="true" data-c="#fff"
								   data-hc="white"></i>
								Edit Careers content

							</h3>
						</div>
						<div>
							<div class="btn-group btn-group-xs">
								<button type="button" class="btn btn-success btn_sizes" onclick="displayLanguage(1)">English</button>
							
							</div>
						</div>
                    </div>
					
					
                    <div class="panel-body">
                        <form id="tryitForm" class="form-horizontal" method="post" enctype="multipart/form-data">
                             <div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">Title (English)</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="title_en"
                                           placeholder="Enter Title" value="@if($contents) {{ $contents->title_en }} @endif" />
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Slug</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="slug"
                                           placeholder="Enter Slug" value="@if($contents) {{ $contents->slug }} @endif" />
                                </div>
                            </div>
							<div class="form-group">
								<label class="col-md-3 control-label" name="description">Banner photo <br><br> </label>
								<div class="col-md-8">
									<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
													@if($contents)
														@if($contents->banner_image!="")
															<img src="<?= url('/') ?>/assets/images/banner/{{ $contents->banner_image }}" width="200" height="150">
														@endif
													@endif
												</div>
												<div>
													<span class="btn btn-default btn-file">
														<span class="fileinput-new">Select image</span>
														<span class="fileinput-exists">Change</span>
														<input type="file" name="banner_image"></span>
													<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
													
									</div>
								</div>
							</div>
							</div>
							
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Banner Photo Alt</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="banner_image_alt"
                                           placeholder="Enter alt" value="@if($contents) {{ $contents->banner_image_alt }} @endif" />
                                </div>
                            </div>
							
                            <div class="form-group en_field">
                                <label class="col-md-3 control-label" name="description">Description (English)</label>

                                <div class="col-md-8">
									<textarea id="ckeditor_standard" name="description_en">@if($contents) {{ $contents->description_en }} @endif</textarea>
								</div>
                            </div>
							
							<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">Recruitment Title (English)</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="recruitment_title_en"
                                           placeholder="Enter Recruitment Title" value="@if($contents) {{ $contents->recruitment_title_en }} @endif" />
                                </div>
                            </div>
							
							<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">Recruitment Description (English)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="recruitment_description_en">@if($contents){{ $contents->recruitment_description_en }} @else {{ old('recruitment_description_en') }} @endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">Opening Title (English)</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="opening_title_en"
                                           placeholder="Enter Title" value="@if($contents) {{ $contents->opening_title_en }} @endif" />
                                </div>
                            </div>
							
							<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">Opening Description (English)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="opening_description_en">@if($contents){{ $contents->opening_description_en }} @else {{ old('opening_description_en') }} @endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">Find More Jobs Title (English)</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="find_more_job_title_en"
                                           placeholder="Enter Title" value="@if($contents) {{ $contents->find_more_job_title_en }} @endif" />
                                </div>
                            </div>
							
							<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">More Jobs Button Title (English)</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="more_jobs_button_text"
                                           placeholder="Enter Title" value="@if($contents) {{ $contents->more_jobs_button_text }} @endif" />
                                </div>
                            </div>
							
							<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">More Jobs Link</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="more_jobs_button_link"
                                           placeholder="Enter Title" value="@if($contents) {{ $contents->more_jobs_button_link }} @endif" />
                                </div>
                            </div>
							<div class="form-group">
                                <div class="col-md-offset-3 col-md-8">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
							<input type="hidden" name="id" value="@if($contents) {{ $contents->id }} @endif" />
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
@stop
