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
                    <h3 class="panel-title">
                        Add Menu
                    </h3>
                </div>
                <div class="panel-body">
                    <form id="tryitForm" class="form-horizontal" method="post" enctype="multipart/form-data">


                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Select Menu Type</label>
                            <div class="col-md-8">
                                <select name="type" class="form-control">
                                    <option value="">Select</option>
                                    <option value="1" <?= $type == 1 ? 'selected="selected"' : 'disabled' ?>>Header</option>
                                    <option value="2" <?= $type == 2 ? 'selected="selected"' : 'disabled' ?>>Footer</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Select Parent Menu</label>
                            <div class="col-md-8">
                                <select name="parent_id" class="form-control">
                                    <option value="0">No Parent</option>
                                    @foreach ($parents as $parent)
                                    <option value="{!! $parent->id !!}">{!! $parent->title_en !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Title (english)</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="title_en"
                                       placeholder="Enter Title" value="{{ old('title_en') }}" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Title (arabic)</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" value="{{ old('title_en') }}" name="title_ar" placeholder="Enter Title" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Slug</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" value="{{ old('slug') }}" name="slug" placeholder="Enter Slug" />
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Order</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" value="{{ old('ordering') }}" name="ordering"
                                       placeholder="Enter Order" />
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-8">
                                <button type="submit" class="btn btn-primary">Submit</button>
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

<script src="{{asset('assets/vendors/tinymce/tinymce.min.js')}}" type="text/javascript"></script>
<script  src="{{ asset('assets/vendors/ckeditor/js/ckeditor.js') }}"  type="text/javascript"></script>
<script  src="{{ asset('assets/vendors/ckeditor/js/jquery.js') }}"  type="text/javascript" ></script>
<script  src="{{ asset('assets/vendors/ckeditor/js/config.js') }}"  type="text/javascript"></script>
<script  src="{{ asset('assets/js/pages/editor.js') }}"  type="text/javascript"></script>
<script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" ></script>
@stop
