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
    <h1>Contact Us</h1>
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
                            Edit Contact
                            @else	
                            Add Contact
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
                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Address Type </label>
                            <div class="col-md-8">
                                <?php
                                $class = "";
                                $class2 = "";
                                ?>
                                <select id="example-select" name="address_type" class="form-control" size="1">
                                    @if($contacts)
                                    @if($contacts->address_type==1)
                                    <?php $class = "selected"; ?>	
                                    @endif
                                    @if($contacts->address_type==2)
                                    <?php $class2 = "selected"; ?>	
                                    @endif
                                    @endif
                                    <option value="1" <?php echo $class; ?>>Dubai</option>
                                    <option value="2" <?php echo $class2; ?>>International</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Address Title(English) </label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="address_title"
                                       placeholder="" value="@if($contacts){{ $contacts->address_title }} @endif" />
                            </div>
                        </div>
                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label hidden-xs">Address Title(Arabic) </label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="address_title_ar"
                                       placeholder="" value="@if($contacts){{ $contacts->address_title_ar }} @endif" />
                            </div>
                        </div>
                        

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Phone Number </label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="phone_no"
                                       placeholder="" value="@if($contacts){{ $contacts->phone_no }} @endif" />
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Address(English) </label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="address" rows="4">@if($contacts){{ $contacts->address }} @else {{ old('address') }} @endif</textarea>
                            </div>
                        </div>
                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label hidden-xs">Address(Arabic) </label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="address_ar" rows="4">@if($contacts){{ $contacts->address_ar }} @else {{ old('address_ar') }} @endif</textarea>
                            </div>
                        </div>
                       

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Fax Number </label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="fax_no"
                                       placeholder="" value="@if($contacts){{ $contacts->fax_no }} @endif" />
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Email Address </label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="email_id"
                                       placeholder="" value="@if($contacts){{ $contacts->email_id }} @endif" />
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Working Hours(English) </label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="working_hours"
                                       placeholder="" value="@if($contacts){{ $contacts->working_hours }} @endif" />
                            </div>
                        </div>
                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label hidden-xs">Working Hours(Arabic) </label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="working_hours_ar"
                                       placeholder="" value="@if($contacts){{ $contacts->working_hours_ar }} @endif" />
                            </div>
                        </div>
                        


                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-8">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                        <input type="hidden" id="form_lang" name="form_lang" value="1">
                        <input type="hidden" name="type" value="@if($type){{$type}}@endif">
                        <input type="hidden" name="id" value="@if($type=="edit"){{ $contacts->id }}@endif">
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
<!--<script>
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
</script>-->

@stop
