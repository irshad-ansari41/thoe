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
                           Logos
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form id="tryitForm" class="form-horizontal" method="post" enctype="multipart/form-data" name="logoform">
                            <div class="form-group">
								
								<label class="col-md-3 control-label" name="description">Home page - Header Logo (English) <br><br> (Note : Logo size maximum 20kb and Height must not exceed 50px and Width must not exceed 200px.)</label>
								<div class="col-md-8">
									<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; background-color:#eee;">
													
													@if($setting->logo!="")
														<img src="{{ url('/') }}/assets/images/logo/{{ $setting->logo }}" >
													@endif
												
												</div>
												<div>
													<span class="btn btn-default btn-file">
														<span class="fileinput-new">Select Logo</span>
														<span class="fileinput-exists">Change</span>
														<input type="file" name="logo" id="fileUpload"   ></span>
													<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
									</div>
								</div>
							</div>
							
							</div>

							<div class="form-group">
								
								<label class="col-md-3 control-label" name="description">Home page - Header Logo (Arebic) <br><br> (Note : Logo size maximum 20kb and Height must not exceed 50px and Width must not exceed 200px.)</label>
								<div class="col-md-8">
									<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; background-color:#eee;">
													
													@if($setting->logo_ar!="")
														<img src="{{ url('/') }}/assets/images/logo/{{ $setting->logo_ar }}" >
													@endif
												
												</div>
												<div>
													<span class="btn btn-default btn-file">
														<span class="fileinput-new">Select Logo</span>
														<span class="fileinput-exists">Change</span>
														<input type="file" name="logo_ar" id="fileUpload"   ></span>
													<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
									</div>
								</div>
							</div>
							
							</div>

							<div class="form-group">
								
								<label class="col-md-3 control-label" name="description">Home page - Header Logo (chinese)  <br><br> (Note : Logo size maximum 20kb and Height must not exceed 50px and Width must not exceed 200px.)</label>
								<div class="col-md-8">
									<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; background-color:#eee;">
													
													@if($setting->logo_ch!="")
														<img src="{{ url('/') }}/assets/images/logo/{{ $setting->logo_ch }}" >
													@endif
												
												</div>
												<div>
													<span class="btn btn-default btn-file">
														<span class="fileinput-new">Select Logo</span>
														<span class="fileinput-exists">Change</span>
														<input type="file" name="logo_ch" id="fileUpload"   ></span>
													<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
									</div>
								</div>
							</div>
							
							</div>
							
							<div class="form-group">
								
								<label class="col-md-3 control-label" name="description">Inner page - Header Logo (English) <br><br> (Note : Logo size maximum 20kb and Height must not exceed 50px and Width must not exceed 200px.)</label>
								<div class="col-md-8">
									<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; background-color:#eee;">
													
													@if($setting->inner_logo!="")
														<img src="{{ url('/') }}/assets/images/logo/{{ $setting->inner_logo }}" >
													@endif
												
												</div>
												<div>
													<span class="btn btn-default btn-file">
														<span class="fileinput-new">Select Logo</span>
														<span class="fileinput-exists">Change</span>
														<input type="file" name="inner_logo" id="fileUpload3" ></span>
													<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
									</div>
								</div>
							</div>
							
							</div>
							
							<div class="form-group">
								
								<label class="col-md-3 control-label" name="description">Inner page - Header Logo (Arebic) <br><br> (Note : Logo size maximum 20kb and Height must not exceed 50px and Width must not exceed 200px.)</label>
								<div class="col-md-8">
									<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; background-color:#eee;">
													
													@if($setting->inner_logo_ar!="")
														<img src="{{ url('/') }}/assets/images/logo/{{ $setting->inner_logo_ar }}" >
													@endif
												
												</div>
												<div>
													<span class="btn btn-default btn-file">
														<span class="fileinput-new">Select Logo</span>
														<span class="fileinput-exists">Change</span>
														<input type="file" name="inner_logo_ar" id="fileUpload3" ></span>
													<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
									</div>
								</div>
							</div>
							
							</div>
							
							<div class="form-group">
								
								<label class="col-md-3 control-label" name="description">Inner page - Header Logo (chinese) <br><br> (Note : Logo size maximum 20kb and Height must not exceed 50px and Width must not exceed 200px.)</label>
								<div class="col-md-8">
									<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; background-color:#eee;">
													
													@if($setting->inner_logo_ch!="")
														<img src="{{ url('/') }}/assets/images/logo/{{ $setting->inner_logo_ch }}" >
													@endif
												
												</div>
												<div>
													<span class="btn btn-default btn-file">
														<span class="fileinput-new">Select Logo</span>
														<span class="fileinput-exists">Change</span>
														<input type="file" name="inner_logo_ch" id="fileUpload3" ></span>
													<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
									</div>
								</div>
							</div>
							
							</div>

							<div class="form-group">
								
								<label class="col-md-3 control-label" name="description">Footer Logo (English)<br><br> (Note : Logo size maximum 20kb and Height must not exceed 50px and Width must not exceed 200px.)</label>
								<div class="col-md-8">
									<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; background-color:#eee;">
													
													@if($setting->footer_logo!="")
														<img src="{{ url('/') }}/assets/images/logo/{{ $setting->footer_logo }}" >
													@endif
												
												</div>
												
												<div>
														<span class="btn btn-default btn-file">
														<span class="fileinput-new">Select Logo</span>
														<span class="fileinput-exists">Change</span>
														<input type="file" name="footer_logo" id="fileUpload2" ></span>
														<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
												</div>
								</div>
							</div>
							
							</div>
							
							<div class="form-group">
								
								<label class="col-md-3 control-label" name="description">Footer Logo (Arebic)<br><br> (Note : Logo size maximum 20kb and Height must not exceed 50px and Width must not exceed 200px.)</label>
								<div class="col-md-8">
									<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; background-color:#eee;">
													
													@if($setting->footer_logo_ar!="")
														<img src="{{ url('/') }}/assets/images/logo/{{ $setting->footer_logo_ar }}" >
													@endif
												
												</div>
												
												<div>
														<span class="btn btn-default btn-file">
														<span class="fileinput-new">Select Logo</span>
														<span class="fileinput-exists">Change</span>
														<input type="file" name="footer_logo_ar" id="fileUpload2" ></span>
														<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
												</div>
								</div>
							</div>
							
							</div>
							
							<div class="form-group">
								
								<label class="col-md-3 control-label" name="description">Footer Logo (Chinese)<br><br> (Note : Logo size maximum 20kb and Height must not exceed 50px and Width must not exceed 200px.)</label>
								<div class="col-md-8">
									<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; background-color:#eee;">
													
													@if($setting->footer_logo_ch!="")
														<img src="{{ url('/') }}/assets/images/logo/{{ $setting->footer_logo_ch }}" >
													@endif
												
												</div>
												
												<div>
														<span class="btn btn-default btn-file">
														<span class="fileinput-new">Select Logo</span>
														<span class="fileinput-exists">Change</span>
														<input type="file" name="footer_logo_ch" id="fileUpload2" ></span>
														<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
												</div>
								</div>
							</div>
							
							</div>
							
							
							<div class="form-group">
                                <div class="col-md-offset-3 col-md-8">
                                   <!-- <button type="button" class="btn btn-primary" onclick="checkLogoSize()">Update</button>-->
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
   <script>
   function checkLogoSize()
	{
        //Get reference of FileUpload.
        var fileUpload = $("#fileUpload")[0];
		
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
							if (height > 50 || width > 200) {
								alert("Home Page Header Logo : Height must not exceed 50px and Width must not exceed 200px.");
								return false;
							}
							else
							{
								//document.getElementById("tryitForm").submit();
								var fileUpload = $("#fileUpload2")[0];
								//document.getElementById("tryitForm").submit();
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
													if (height > 50 || width > 200) {
														alert("Footer Logo : Height must not exceed 50px and Width must not exceed 200px.");
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
										alert("Please select an image for footer logo.");
										return false;
									}
								}
								else
								{
									//document.getElementById("tryitForm").submit();
									 var fileUpload = $("#fileUpload2")[0];
							
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
														if (height > 50 || width > 200) {
															alert("Footer Logo : Height must not exceed 50px and Width must not exceed 200px.");
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
											alert("Please select an image for footer logo.");
											return false;
										}
									}
									else
									{
										document.getElementById("tryitForm").submit();
									}
								}
							}
						};
					}
				} else {
					alert("This browser does not support HTML5.");
					return false;
				}
			} else {
				alert("Please select an image for home page header logo.");
				return false;
			}
		}
		else
		{
			var fileUpload = $("#fileUpload3")[0];
			//document.getElementById("tryitForm").submit();
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
								if (height > 50 || width > 200) {
									alert("Inner Page Header Logo : Height must not exceed 50px and Width must not exceed 200px.");
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
					alert("Please select an image for inner page header logo.");
					return false;
				}
			}
			else
			{
				//document.getElementById("tryitForm").submit();
				 var fileUpload = $("#fileUpload2")[0];
		
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
									if (height > 50 || width > 200) {
										alert("Footer Logo : Height must not exceed 50px and Width must not exceed 200px.");
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
						alert("Please select an image for  logo.");
						return false;
					}
				}
				else
				{
					document.getElementById("tryitForm").submit();
				}
			}
		}
	}
	
	function checkLogoSize3()
	{
        //Get reference of FileUpload.
        var fileUpload = $("#fileUpload3")[0];
		
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
							if (height > 50 || width > 200) {
								alert("Inner Page Header Logo : Height must not exceed 50px and Width must not exceed 200px.");
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
				alert("Please select an image for inner page header logo.");
				return false;
			}
		}
		else
		{
			document.getElementById("tryitForm").submit();
		}
	}
	
	function checkLogoSize2()
	{
        //Get reference of FileUpload.
        var fileUpload = $("#fileUpload2")[0];
		
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
							if (height > 50 || width > 200) {
								alert("Footer Logo : Height must not exceed 50px and Width must not exceed 200px.");
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
				alert("Please select an image for footer logo.");
				return false;
			}
		}
		else
		{
			document.getElementById("tryitForm").submit();
		}
	}
   </script>
@stop
