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
    <h1>Admin Users</h1>
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
                    <div style="float:left;width:70%;">
                        <h3 class="panel-title">
                            @if($type=="edit")
                            Edit Admin User
                            @else	
                            Add Admin User
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
                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label hidden-xs">First Name </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="first_name"
                                       placeholder="" value="@if($users){{ $users->first_name }} @endif" required />
                            </div>
                        </div>
                        <div class="form-group ch_field">
                            <label class="col-md-3 control-label hidden-xs">Last Name </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="last_name"
                                       placeholder="" value="@if($users){{ $users->last_name }} @endif" required />
                            </div>
                        </div>
                        @if($type=="add")
                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Email </label>
                            <div class="col-md-8">
                                <input type="email" class="form-control" name="email"
                                       placeholder="" value="@if($users){{ $users->email }} @endif" required />
                            </div>
                        </div>
                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Password </label>
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="password"
                                       placeholder="" value="@if($users){{ $users->password }} @endif" required />
                            </div>
                        </div>
                        @endif
                        <div class="form-group ch_field">
                            <label class="col-md-3 control-label hidden-xs">Contact Number </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="contact_no"
                                       placeholder="" value="@if($users){{ $users->contact_no }} @endif" />
                            </div>
                        </div>

                        <div class="form-group ch_field">
                            <label class="col-md-3 control-label hidden-xs">Module Access </label>
                            <div class="col-md-9">
                                <?php
                                $gs = '';
                                $hm = '';
                                $ab = '';
                                $tm = '';
                                $sp = '';
                                $pr = '';
                                $pu = '';
                                $cu = '';
                                $ns = '';
                                $es = '';
                                $me = '';
                                $cu = '';
                                $ag = '';
                                $ca = '';
                                $bp = '';
                                $us = '';
                                if (!empty($modules)) {
                                    if ($modules->general_settings == 1) {
                                        $gs = 'checked';
                                    }
                                    if ($modules->home == 1) {
                                        $hm = 'checked';
                                    }
                                    if ($modules->about_us == 1) {
                                        $ab = 'checked';
                                    }
                                    if ($modules->team == 1) {
                                        $tm = 'checked';
                                    }
                                    if ($modules->static_pages == 1) {
                                        $sp = 'checked';
                                    }
                                    if ($modules->properties == 1) {
                                        $pr = 'checked';
                                    }
                                    if ($modules->property_units == 1) {
                                        $pu = 'checked';
                                    }
                                    if ($modules->construction_updates == 1) {
                                        $cu = 'checked';
                                    }
                                    if ($modules->news == 1) {
                                        $ns = 'checked';
                                    }
                                    if ($modules->events == 1) {
                                        $es = 'checked';
                                    }
                                    if ($modules->media == 1) {
                                        $me = 'checked';
                                    }
                                    if ($modules->contact_us == 1) {
                                        $cu = 'checked';
                                    }
                                    if ($modules->agents == 1) {
                                        $ag = 'checked';
                                    }
                                    if ($modules->careers == 1) {
                                        $ca = 'checked';
                                    }
                                    if ($modules->booking_payments == 1) {
                                        $bp = 'checked';
                                    }
                                    if ($modules->users == 1) {
                                        $us = 'checked';
                                    }
                                }
                                ?>

                                <div class="col-md-3">
                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
                                        <input type="checkbox" id="example-inline-checkbox1" {!! $gs !!} name="module_id[]" value="1">
                                        General Settings </label>
                                </div>
                                <div class="col-md-3">
                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
                                        <input type="checkbox" id="example-inline-checkbox1" {!! $hm !!} name="module_id[]" value="2">
                                        Home </label>
                                </div>
                                <div class="col-md-3">
                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
                                        <input type="checkbox" id="example-inline-checkbox1" {!! $ab !!} name="module_id[]" value="3">
                                        About Us </label>
                                </div>
                                <div class="col-md-3">
                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
                                        <input type="checkbox" id="example-inline-checkbox1" {!! $tm !!} name="module_id[]" value="4">
                                        Team </label>
                                </div>
                                <div class="col-md-3">
                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
                                        <input type="checkbox" id="example-inline-checkbox1" {!! $sp !!} name="module_id[]" value="5">
                                        Static Pages </label>
                                </div>
                                <div class="col-md-3">
                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
                                        <input type="checkbox" id="example-inline-checkbox1" {!! $pr !!} name="module_id[]" value="6">
                                        Properties </label>
                                </div>
                                <div class="col-md-3">
                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
                                        <input type="checkbox" id="example-inline-checkbox1" {!! $pu !!} name="module_id[]" value="7">
                                        Property Units </label>
                                </div>
                                <div class="col-md-3">
                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
                                        <input type="checkbox" id="example-inline-checkbox1" {!! $cu !!} name="module_id[]" value="8">
                                        Construction Updates </label>
                                </div>
                                <div class="col-md-3">
                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
                                        <input type="checkbox" id="example-inline-checkbox1" {!! $ns !!} name="module_id[]" value="9">
                                        News </label>
                                </div>
                                <div class="col-md-3">
                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
                                        <input type="checkbox" id="example-inline-checkbox1" {!! $es !!} name="module_id[]" value="10">
                                        Events </label>
                                </div>
                                <div class="col-md-3">
                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
                                        <input type="checkbox" id="example-inline-checkbox1" {!! $me !!} name="module_id[]" value="11">
                                        Media </label>
                                </div>
                                <div class="col-md-3">
                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
                                        <input type="checkbox" id="example-inline-checkbox1" {!! $cu !!} name="module_id[]" value="12">
                                        Contact Us </label>
                                </div>
                                <div class="col-md-3">
                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
                                        <input type="checkbox" id="example-inline-checkbox1" {!! $ag !!} name="module_id[]" value="13">
                                        Agents </label>
                                </div>
                                <div class="col-md-3">
                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
                                        <input type="checkbox" id="example-inline-checkbox1" {!! $ca !!} name="module_id[]" value="14">
                                        Careers </label>
                                </div>
                                <div class="col-md-3">
                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
                                        <input type="checkbox" id="example-inline-checkbox1" {!! $bp !!} name="module_id[]" value="15">
                                        Booking Payments </label>
                                </div>
                                <div class="col-md-3">
                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
                                        <input type="checkbox" id="example-inline-checkbox1" {!! $us !!} name="module_id[]" value="16">
                                        Users </label>
                                </div>
                            </div>
                        </div>
                        @if($type=="edit")
                        <div class="form-group ch_field">
                            <label class="col-md-3 control-label hidden-xs"><a onclick="showchangepass()" style="cursor:pointer;">Change Password</a></label>
                            <div class="col-md-8" id="passwordedit"  style="display:none;">
                                <input type="password" class="form-control" name="password"
                                       placeholder="" value="" />
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-8">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                        <input type="hidden" id="form_lang" name="form_lang" value="1">
                        <input type="hidden" name="type" value="@if($type){{ $type }}@endif">
                        <input type="hidden" name="id" value="@if($type=="edit"){{ $users->id }}@endif">
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

<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<!--<script src="{{ asset('assets/js/pages/validation.js') }}" type="text/javascript"></script>-->

<script>
                                $(function () {
                                    $("#date").datepicker({
                                        dateFormat: "yy-mm-dd"
                                    });
                                });
</script>
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
                                function showchangepass()
                                {
                                    document.getElementById("passwordedit").style.display = "block";
                                }
</script>

@stop
