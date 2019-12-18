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
    <h1>Agents</h1>
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
                            Edit Contact
                            @else	
                            Add Agent
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
                            <label class="col-md-3 control-label hidden-xs">First Name </label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="first_name"
                                       placeholder="" value="@if($agents){{ $agents->first_name }} @endif" />
                            </div>
                        </div>

                        @if($type)
                        @if($type=="add")
                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Email Address </label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="email"
                                       placeholder="" value="@if($agents){{ $agents->email }} @endif" />
                            </div>
                        </div>
                        @endif
                        @endif							
                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Contact Number </label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="contact_no"
                                       placeholder="" value="@if($agents){{ $agents->contact_no }} @endif" />
                            </div>
                        </div>


                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Company </label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="company"
                                       placeholder="" value="@if($agents){{ $agents->company }} @endif" />
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Comment </label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="comment" rows="4">@if($agents){{ $agents->comment }} @else {{ old('comment') }} @endif</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-8">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                        <input type="hidden" id="form_lang" name="form_lang" value="1">
                        <input type="hidden" name="type" value="@if($type){{$type}}@endif">
                        <input type="hidden" name="id" value="@if($type=="edit"){{ $agents->id }}@endif">
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
<!--<script src="{{ asset('assets/js/pages/validation.js') }}" type="text/javascript"></script>-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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


@stop
