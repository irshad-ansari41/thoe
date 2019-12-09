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
                        <h3 class="panel-title">{!! $result->title_en !!} construction update</h3>
                    </div>
                    <div>
                        <div class="btn-group btn-group-xs">

                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <form id="tryitForm" class="form-horizontal" method="post" enctype="multipart/form-data">

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">MOBILIZATION %</label>

                            <div class="col-md-8">
                                <input value="{!! $result->mobilization_percentage !!}" type="text" class="form-control" name="mobilization_percentage">
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">STRUCTURE %</label>

                            <div class="col-md-8">
                                <input value="{!! $result->structure_percentage !!}" type="text" class="form-control" name="structure_percentage">
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">MEP WORKS %</label>

                            <div class="col-md-8">
                                <input value="{!! $result->mep_percentage !!}" type="text" class="form-control" name="mep_percentage">
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">FINISHING %</label>

                            <div class="col-md-8">
                                <input value="{!! $result->finishes_percentage !!}" type="text" class="form-control" name="finishes_percentage">
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Total %</label>

                            <div class="col-md-8">
                                <input value="{!! $result->total_completion !!}" type="text" class="form-control" name="total_completion">
                            </div>
                        </div>


                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Plan Start Date</label>

                            <div class="col-md-8">
                                <input id="plan_start_date" value="{!! $result->plan_start_date !!}" type="text" class="form-control" name="plan_start_date">
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Plan End Date</label>

                            <div class="col-md-8">
                                <input id="plan_end_date" value="{!! $result->plan_end_date !!}" type="text" class="form-control" name="plan_end_date">
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Date Not Confirmed</label>

                            <div class="col-md-8">
                                <input id="nfcstatus" value="{!! $result->nfcstatus !!}" type="text" class="form-control" name="nfcstatus">
                            </div>
                        </div>


                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Call Us</label>

                            <div class="col-md-8">
                                <textarea name="enquire_call_us" class="form-control">{!! $result->enquire_call_us !!}</textarea>

                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Address</label>

                            <div class="col-md-8">
                                <textarea name="enquire_address" class="form-control">{!! $result->enquire_address !!}</textarea>

                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Email</label>

                            <div class="col-md-8">
                                <textarea name="enquire_email" class="form-control">{!! $result->enquire_email !!}</textarea>

                            </div>
                        </div>





                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-8">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                        <input type="hidden" id="form_lang" name="form_lang" value="1">
                        <input type="hidden" name="id" value="{!! $result->id !!}">
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
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" ></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script>
$(function () {
    $("#plan_start_date").datepicker({
        dateFormat: "yy-mm-dd"
    });
    $("#plan_end_date").datepicker({
        dateFormat: "yy-mm-dd"
    });
});
</script>
@stop
