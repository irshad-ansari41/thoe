@extends('admin/layouts/default')

{{-- page level styles --}}
@section('header_styles')

	
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/intl-tel-input/build/css/intlTelInput.css') }}" rel="stylesheet"/>
    
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
				 <div class="flash-message">
					@foreach (['danger', 'warning', 'success', 'info'] as $msg)
					  @if(Session::has('alert-' . $msg))

					  <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					  @endif
					@endforeach
				</div>
				@include('admin.common.errors')
                <!--image upload -->
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                           Footer
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form id="tryitForm" class="form-horizontal" method="post" enctype="multipart/form-data">
						
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Description (English)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="description_en">{{ $setting->description_en }}</textarea>
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Description (Arebic)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="description_ar">{{ $setting->description_ar }}</textarea>
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Description (Chinese)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="description_ch">{{ $setting->description_ch }}</textarea>
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Description (Hindi)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="description_hn">{{ $setting->description_hn }}</textarea>
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Description (Urdu)</label>

                                <div class="col-md-8">
                                   <textarea class="form-control" name="description_ur">{{ $setting->description_ur }}</textarea>
                                </div>
                            </div>
                            
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Contact E-mail</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="contact_email"
                                           placeholder="Enter Contact E-mail" value="{{ $setting->contact_email }}" />
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Youtube Link</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="linkedin_link"
                                           placeholder="Enter Linkedin Link" value="{{ $setting->linkedin_link  }}" />
                                </div>
                            </div>
					
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Facebook Link</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="facebook_link"
                                           placeholder="Enter Facebook Link" value="{{ $setting->facebook_link }}" />
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Twitter Link</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="twitter_link"
                                           placeholder="Enter Twitter Link" value="{{ $setting->twitter_link }}" />
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Instagram Link</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="instagram_link"
                                           placeholder="Enter Instagram Link" value="{{ $setting->instagram_link }}" />
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-md-3 control-label hidden-xs">Google+ Link</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="google_link"
                                           placeholder="Enter Google+ Link" value="{{ $setting->google_link  }}" />
                                </div>
                            </div>
							
							
							
							<div class="form-group">
                                <div class="col-md-offset-3 col-md-8">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
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
	  
   <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" ></script>
@stop
