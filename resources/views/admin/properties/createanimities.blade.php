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
        <h1>Property Management</h1>
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
										Edit Aminity
									@else	
										Add Aminity
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
                            
							<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">Title (English)</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="title_en"
                                           placeholder="Enter title" value="@if($aminitie){{ $aminitie->title_en }} @endif" />
                                </div>
                            </div>
                          
							<div class="form-group ar_field">
                                <label class="col-md-3 control-label hidden-xs">Title (Arabic)</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="@if($aminitie){{ $aminitie->title_ar }} @endif" name="title_ar"
                                           placeholder="Enter title" />
                                </div>
                            </div>
                          
							<div class="form-group ch_field">
                                <label class="col-md-3 control-label hidden-xs">Title (Chinese)</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="@if($aminitie){{ $aminitie->title_ch }} @endif" name="title_ch"
                                           placeholder="Enter title" />
                                </div>
                            </div>
							
							<div class="form-group hn_field">
                                <label class="col-md-3 control-label hidden-xs">Title (Hindi)</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="@if($aminitie){{ $aminitie->title_hn }} @endif" name="title_hn"
                                           placeholder="Enter title" />
                                </div>
                            </div>
							
							<div class="form-group ur_field">
                                <label class="col-md-3 control-label hidden-xs">Title (Urdu)</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="@if($aminitie){{ $aminitie->title_ur }} @endif" name="title_ur"
                                           placeholder="Enter title" />
                                </div>
                            </div>
							<div class="form-group">
							<label class="col-md-3 control-label" name="description">Icon <br><br> (Note : Icon size maximum 10kb)</label>
								<div class="col-md-8">
									<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">@if($aminitie) <img src="{{asset('assets/images/icon')}}/{!! $aminitie->icon !!}" height="190" width="190" /> @endif</div>
											
												<div>
													<span class="btn btn-default btn-file">
														<span class="fileinput-new">Select Icon</span>
														<span class="fileinput-exists">Change</span>
														@if($aminitie)
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
							<input type="hidden" name="id" value="@if($type=="edit"){{ $aminitie->id }}@endif">
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
@stop
