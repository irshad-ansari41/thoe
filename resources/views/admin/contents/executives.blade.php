@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Update | Corporate Executives
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
        <h1>Corporate Executives</h1>
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
								Update Corporate executives page content

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
							<div class="form-group">
									<label class="col-md-3 control-label" name="description">Banner photo <br><br> (Note : Image Dimension Should be 1200*800)</label>
									<div class="col-md-8">
										<div class="fileinput fileinput-new" data-provides="fileinput">
													<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 680px; height: 150px;">
														@if($contents)
															@if($contents->banner_image!="")
																<img src="<?= url('/') ?>/assets/images/executives/{{ $contents->banner_image }}" width="680" height="150" style=" max-height:none;">
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
                                <label class="col-md-3 control-label hidden-xs">Banner Alt</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="banner_alt"
                                           placeholder="Enter Alt" value="@if($contents){{ $contents->banner_alt }}@else{{ old('banner_alt') }}@endif" />
                                </div>
                            </div>
							
							<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">Title or Short Description (English)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="title_en">@if($contents){{ $contents->title_en }} @else {{ old('title_en') }} @endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Slug</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="slug"
                                           placeholder="Enter Slug" value="@if($contents){{ $contents->slug }}@endif" />
                                </div>
                            </div>
							
							<div class="form-group ar_field">
                                <label class="col-md-3 control-label hidden-xs">Title or Short Description (Arabic)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="title_ar">@if($contents){{ $contents->title_ar }} @else {{ old('title_ar') }} @endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group ch_field">
                                <label class="col-md-3 control-label hidden-xs">Title or Short Description (Chinese)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="title_ch">@if($contents){{ $contents->title_ch }} @else {{ old('title_ch') }} @endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group hn_field">
                                <label class="col-md-3 control-label hidden-xs">Title or Short Description (Hindi)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="title_hn">@if($contents){{ $contents->title_hn }} @else {{ old('title_hn') }} @endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group ur_field">
                                <label class="col-md-3 control-label hidden-xs">Title or Short Description (Urdu)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="title_ur">@if($contents){{ $contents->title_ur }} @else {{ old('title_ur') }} @endif</textarea>
                                </div>
                            </div>
							
                            <div class="form-group en_field">
                                <label class="col-md-3 control-label" name="description">Long Description (english)</label>

                                <div class="col-md-8">
									<textarea id="ckeditor_standard" name="description_en">@if($contents){{ $contents->description_en }}@endif</textarea>
								</div>
                            </div>
							
							
                            <div class="form-group ar_field">
                                <label class="col-md-3 control-label" name="description">Long Description (arabic)</label>

                                <div class="col-md-8">
									<textarea id="ckeditor_standard" name="description_ar">@if($contents){{ $contents->description_ar }}@endif</textarea>
								</div>
                            </div>
							
							
                            <div class="form-group ch_field">
                                <label class="col-md-3 control-label" name="description">Long Description (chinese)</label>

                                <div class="col-md-8">
									<textarea id="ckeditor_standard" name="description_ch">@if($contents){{ $contents->description_ch }}@endif</textarea>
								</div>
                            </div>
							
							
							
                            <div class="form-group hn_field">
                                <label class="col-md-3 control-label" name="description">Long Description (hindi)</label>

                                <div class="col-md-8">
									<textarea id="ckeditor_standard" name="description_hn">@if($contents){{ $contents->description_hn }}@endif</textarea>
								</div>
                            </div>
							
							
							
                            <div class="form-group ur_field">
                                <label class="col-md-3 control-label" name="description">Long Description (urdu)</label>

                                <div class="col-md-8">
									<textarea id="ckeditor_standard" name="description_ur">@if($contents){{ $contents->description_ur }}@endif</textarea>
								</div>
                            </div>
							
							<!-- Chairmen Fields -->
							
							<div class="form-group">
								
								<label class="col-md-3 control-label" name="description">Chairmen photo <br><br> (Note : Image Dimension Should be 630*280)</label>
								<div class="col-md-8">
									<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
													@if($contents)
													@if($contents->chairmen_image!="")
														<img src="<?= url('/') ?>/assets/images/executives/{{ $contents->chairmen_image }}" width="200" height="150">
													@endif
													@endif
												
												</div>
												<div>
													<span class="btn btn-default btn-file">
														<span class="fileinput-new">Select image</span>
														<span class="fileinput-exists">Change</span>
														<input type="file" name="chairmen_image"></span>
													<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
													
									</div>
								</div>
							</div>
							</div>
							
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Chairmen Alt</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="chairment_alt"
                                           placeholder="Enter Alt" value="@if($contents){{ $contents->chairment_alt }}@else{{ old('chairment_alt') }}@endif" />
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Chairmen Name</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="chairmen_name_en"
                                           placeholder="Enter Chairmen Name" value="@if($contents){{ $contents->chairmen_name_en }}@endif" />
                                </div>
                            </div>
							
							<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">Chairmen Quote (English)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="chairmen_description_en" rows="8">@if($contents){{ $contents->chairmen_description_en }} @else {{ old('chairmen_description_en') }} @endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group ar_field">
                                <label class="col-md-3 control-label hidden-xs">Chairmen Quote (Arabic)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="chairmen_description_ar" rows="8">@if($contents){{ $contents->chairmen_description_ar }} @else {{ old('chairmen_description_ar') }} @endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group ch_field">
                                <label class="col-md-3 control-label hidden-xs">Chairmen Quote (Chinese)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="chairmen_description_ch" rows="8">@if($contents){{ $contents->chairmen_description_ch }} @else {{ old('chairmen_description_ch') }} @endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group hn_field">
                                <label class="col-md-3 control-label hidden-xs">Chairmen Quote (Hindi)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="chairmen_description_hn" rows="8">@if($contents){{ $contents->chairmen_description_hn }} @else {{ old('chairmen_description_hn') }} @endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group ur_field">
                                <label class="col-md-3 control-label hidden-xs">Chairmen Quote (Urdu)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="chairmen_description_ur" rows="8">@if($contents){{ $contents->chairmen_description_ur }} @else {{ old('chairmen_description_ur') }} @endif</textarea>
                                </div>
                            </div>
							
							<!-- Chairmen Fields End -->
							
							<!-- CEO Fields -->
							
							<div class="form-group">
								
								<label class="col-md-3 control-label" name="description">CEO photo <br><br> (Note : Image Dimension Should be 630*280)</label>
								<div class="col-md-8">
									<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
													@if($contents)
													@if($contents->ceo_image!="")
														<img src="<?= url('/') ?>/assets/images/executives/{{ $contents->ceo_image }}" width="200" height="150">
													@endif
													@endif
												
												</div>
												<div>
													<span class="btn btn-default btn-file">
														<span class="fileinput-new">Select image</span>
														<span class="fileinput-exists">Change</span>
														<input type="file" name="ceo_image"></span>
													<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
													
									</div>
								</div>
							</div>
							</div>
							
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">CEO Alt</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="ceo_alt"
                                           placeholder="Enter Alt" value="@if($contents){{ $contents->ceo_alt }}@else{{ old('ceo_alt') }}@endif" />
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">CEO Name</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="ceo_name_en"
                                           placeholder="Enter CEO Name" value="@if($contents){{ $contents->ceo_name_en }}@endif" />
                                </div>
                            </div>
							
							<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">CEO Quote (English)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="ceo_description_en" rows="8">@if($contents){{ $contents->ceo_description_en }} @else {{ old('ceo_description_en') }} @endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group ar_field">
                                <label class="col-md-3 control-label hidden-xs">Chairmen Quote (Arabic)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="ceo_description_ar" rows="8">@if($contents){{ $contents->ceo_description_ar }} @else {{ old('ceo_description_ar') }} @endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group ch_field">
                                <label class="col-md-3 control-label hidden-xs">Chairmen Quote (Chinese)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="ceo_description_ch" rows="8">@if($contents){{ $contents->ceo_description_ch }} @else {{ old('ceo_description_ch') }} @endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group hn_field">
                                <label class="col-md-3 control-label hidden-xs">Chairmen Quote (Hindi)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="ceo_description_hn" rows="8">@if($contents){{ $contents->ceo_description_hn }} @else {{ old('ceo_description_hn') }} @endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group ur_field">
                                <label class="col-md-3 control-label hidden-xs">Chairmen Quote (Urdu)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="ceo_description_ur" rows="8">@if($contents){{ $contents->ceo_description_ur }} @else {{ old('ceo_description_ur') }} @endif</textarea>
                                </div>
                            </div>
							
							<!-- CEO Fields End -->
							
							<!-- Deputy CEO Fields -->
							
							<div class="form-group">
								
								<label class="col-md-3 control-label" name="description">Deputy CEO photo <br><br> (Note : Image Dimension Should be 630*280)</label>
								<div class="col-md-8">
									<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
													@if($contents)
													@if($contents->deputy_ceo_image!="")
														<img src="<?= url('/') ?>/assets/images/executives/{{ $contents->deputy_ceo_image }}" width="200" height="150">
													@endif
													@endif
												
												</div>
												<div>
													<span class="btn btn-default btn-file">
														<span class="fileinput-new">Select image</span>
														<span class="fileinput-exists">Change</span>
														<input type="file" name="deputy_ceo_image"></span>
													<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
													
									</div>
								</div>
							</div>
							</div>
							
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Deputy CEO Alt</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="deputy_ceo_alt"
                                           placeholder="Enter Alt" value="@if($contents){{ $contents->deputy_ceo_alt }}@else{{ old('deputy_ceo_alt') }}@endif" />
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Deputy CEO Name</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="deputy_ceo_name_en"
                                           placeholder="Enter Deputy CEO Name" value="@if($contents){{ $contents->deputy_ceo_name_en }}@endif" />
                                </div>
                            </div>
							
							<div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">Deputy CEO Quote (English)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="deputy_ceo_description_en" rows="8">@if($contents){{ $contents->deputy_ceo_description_en }} @else {{ old('deputy_ceo_description_en') }} @endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group ar_field">
                                <label class="col-md-3 control-label hidden-xs">Deputy Chairmen Quote (Arabic)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="deputy_ceo_description_ar" rows="8">@if($contents){{ $contents->deputy_ceo_description_ar }} @else {{ old('deputy_ceo_description_ar') }} @endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group ch_field">
                                <label class="col-md-3 control-label hidden-xs">Deputy Chairmen Quote (Chinese)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="deputy_ceo_description_ch" rows="8">@if($contents){{ $contents->deputy_ceo_description_ch }} @else {{ old('deputy_ceo_description_ch') }} @endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group hn_field">
                                <label class="col-md-3 control-label hidden-xs">Deputy Chairmen Quote (Hindi)</label>
                                
								 <div class="col-md-8">
                                   <textarea class="form-control" name="deputy_ceo_description_hn" rows="8">@if($contents){{ $contents->deputy_ceo_description_hn }} @else {{ old('deputy_ceo_description_hn') }} @endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group ur_field">
                                <label class="col-md-3 control-label hidden-xs">Deputy Chairmen Quote (Urdu)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="deputy_ceo_description_ur" rows="8">@if($contents){{ $contents->deputy_ceo_description_ur }} @else {{ old('deputy_ceo_description_ur') }} @endif</textarea>
                                </div>
                            </div>
							
							<!-- CEO Fields End -->
							
							<div class="form-group ">
                                <label class="col-md-3 control-label hidden-xs">Meta Title</label>

                                <div class="col-md-8">
                                    <textarea class="form-control" name="meta_title">@if($contents){{ $contents->meta_title }} @endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group ">
                                <label class="col-md-3 control-label hidden-xs">Meta keyword</label>

                                <div class="col-md-8">
                                    <textarea class="form-control" name="meta_keyword">@if($contents){{ $contents->meta_keyword }} @endif</textarea>
                                </div>
                            </div>
							
							<div class="form-group ">
                                <label class="col-md-3 control-label hidden-xs">Meta Description</label>

                                <div class="col-md-8">
                                    <textarea class="form-control" name="meta_desc">@if($contents){{ $contents->meta_desc }} @endif</textarea>
                                </div>
                            </div>
							
							
							<div class="form-group">
                                <div class="col-md-offset-3 col-md-8">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
							<input type="hidden" name="id" value="@if($contents){{ $contents->id }}@endif" />
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
