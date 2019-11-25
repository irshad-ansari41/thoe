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
    <h1>Content Management</h1>
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
                            Edit Content
                        </h3>
                    </div>
                    <div>
                        <div class="btn-group btn-group-xs">
                            <button type="button" class="btn btn-success btn_sizes" onclick="displayLanguage(1)">English</button>
                            <button type="button" class="btn btn-danger btn_sizes" onclick="displayLanguage(2)">Arabic</button>

                            <button type="button" class="btn btn-primary btn_sizes" onclick="displayLanguage(0)">Show All</button>
                        </div>
                    </div>

                </div>
                <div class="panel-body">
                    <form id="tryitForm" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Title (english)</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="title_en"
                                       placeholder="Enter Title" value="{{ $contents->title_en }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Slug</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="slug"
                                       placeholder="Enter Slug" value="{{ $contents->slug }}" />
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Short Description (english)</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="short_description_en">{{ $contents->short_description_en }}</textarea>
                            </div>
                        </div>
                        <div class="form-group en_field">
                            <label class="col-md-3 control-label" name="description">Description (english)</label>

                            <div class="col-md-8">
                                <textarea id="ckeditor_standard" name="description_en">{{ $contents->description_en }}</textarea>
                            </div>
                        </div>

                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label hidden-xs">Title (arabic)</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" value="{{ $contents->title_ar }}" name="title_ar"
                                       placeholder="Enter Title" />
                            </div>
                        </div>
                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label hidden-xs">Short Description (arabic)</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="short_description_ar">{{ $contents->short_description_ar }}</textarea>
                            </div>
                        </div>
                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label" name="description">Description (arabic)</label>

                            <div class="col-md-8">
                                <textarea id="ckeditor_standard" name="description_ar">{{ $contents->description_ar }}</textarea>
                            </div>
                        </div>


                        <div class="form-group ">
                            <label class="col-md-3 control-label hidden-xs">Meta Title</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="meta_title">{{ $contents->meta_title }}</textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-md-3 control-label hidden-xs">Meta keyword</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="meta_keyword">{{ $contents->meta_keyword }}</textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-md-3 control-label hidden-xs">Meta Description</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="meta_desc">{{ $contents->meta_desc }}</textarea>
                            </div>
                        </div>


                        <div class="form-group">

                            <label class="col-md-3 control-label" name="description">Upload image <br><br> </label>
                            <div class="col-md-8">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">

                                        @if($contents->image!="")
                                        <img src="<?= url('/') ?>/assets/images/banner/{{ $contents->image }}" width="200" height="150">
                                        @endif

                                    </div>
                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image"></span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-3 control-label hidden-xs">Image Alt</label>

                                <div class="col-md-8">
                                    <textarea class="form-control" name="alt">{{ $contents->alt }}</textarea>
                                </div>
                            </div>

                            <!--<div class="form-group">
    <label class="col-md-3 control-label" name="image">File Upload</label>

    <div class="col-md-8">
                                            <input type="file" name="image">
                                            @if($contents->image!="")
                                                    <img src="{{ url('/') }}/banner/{{ $contents->image }}" width="100" height="100">
                                            @endif
                                    </div>
</div>-->

                            <div class="form-group">
                                <div class="col-md-offset-3 col-md-8">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ $contents->id }}" />
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
                                    if (lang == 1)
                                    {
                                        $(".en_field").show();
                                        $(".ar_field").hide();

                                        $("#form_lang").val(1);
                                    }
                                    if (lang == 2)
                                    {
                                        $(".en_field").hide();
                                        $(".ar_field").show();

                                        $("#form_lang").val(2);
                                    }

                                    if (lang == 0)
                                    {
                                        $(".en_field").show();
                                        $(".ar_field").show();

                                        $("#form_lang").val(0);
                                    }
                                }
                                $(".ar_field").hide();

</script>
@stop
