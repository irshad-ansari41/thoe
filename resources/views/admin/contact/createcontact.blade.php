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
                        <h3 class="panel-title"><?= $type == "edit" ? 'Edit Contact' : 'Add Contact' ?></h3>
                    </div>
                    <div>
                        <div class="btn-group btn-group-xs">

                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <form id="tryitForm" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label ">Address Type </label>
                            <div class="col-md-8">
                                <select id="example-select" name="address_type" class="form-control" size="1">
                                    <option value="1" <?= !empty($contacts) && $contacts->address_type == 1 ? 'selected' : '' ?>>Dubai</option>
                                    <option value="2" <?= !empty($contacts) && $contacts->address_type == 2 ? 'selected' : '' ?>>International</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label ">Address Title(English) </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="address_title_en" placeholder="" value="<?= !empty($contacts) ? $contacts->address_title_en : old('address_title_en') ?>" />
                            </div>
                        </div>
                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label ">Address Title(Arabic) </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="address_title_ar" placeholder="" value="<?= !empty($contacts) ? $contacts->address_title_ar : old('address_title_ar') ?>" />
                            </div>
                        </div>


                        <div class="form-group en_field">
                            <label class="col-md-3 control-label ">Phone Number </label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="phone_no" placeholder="" value="<?= !empty($contacts) ? $contacts->phone_no : old('phone_no') ?>" />
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label ">Address(English) </label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="address_en" rows="4"><?= !empty($contacts) ? $contacts->address_en : old('address_en') ?></textarea>
                            </div>
                        </div>
                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label ">Address(Arabic) </label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="address_ar" rows="4"><?= !empty($contacts) ? $contacts->address_ar : old('address_ar') ?></textarea>
                            </div>
                        </div>


                        <div class="form-group en_field">
                            <label class="col-md-3 control-label "> Title(English) </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="title_en" placeholder="" value="<?= !empty($contacts) ? $contacts->title_en : old('title_en') ?>" />
                            </div>
                        </div>
                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label "> Title(Arabic) </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="title_ar" placeholder="" value="<?= !empty($contacts) ? $contacts->title_ar : old('title_ar') ?>" />
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label ">Description(English) </label>
                            <div class="col-md-8">
                                <textarea class="form-control" id="ckeditor_standard" name="description_en" rows="4"><?= !empty($contacts) ? $contacts->description_en : old('description_en') ?></textarea>
                            </div>
                        </div>
                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label ">Description(Arabic) </label>
                            <div class="col-md-8">
                                <textarea class="form-control" id="ckeditor_standard1" name="description_ar" rows="4"><?= !empty($contacts) ? $contacts->description_ar : old('description_ar') ?></textarea>
                            </div>
                        </div>


                        <div class="form-group en_field">
                            <label class="col-md-3 control-label ">Fax Number </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="fax_no" placeholder="" value="<?= !empty($contacts) ? $contacts->fax_no : old('fax_no') ?>" />
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label ">Email Address </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="email_id" placeholder="" value="<?= !empty($contacts) ? $contacts->email_id : old('email_id') ?>" />
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label ">Working Hours(English) </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="working_hours_en" placeholder="" value="<?= !empty($contacts) ? $contacts->working_hours_en : old('working_hours_en') ?>" />
                            </div>
                        </div>
                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label ">Working Hours(Arabic) </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="working_hours_ar" placeholder="" value="<?= !empty($contacts) ? $contacts->working_hours_ar : old('working_hours_ar') ?>" />
                            </div>
                        </div>
                        
                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label ">Google Map </label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="google_map" rows="4"><?= !empty($contacts) ? $contacts->google_map : old('google_map') ?></textarea>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-8">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                        <input type="hidden" id="form_lang" name="form_lang" value="1">
                        <input type="hidden" name="type" value="<?= $type ? $type : '' ?>">
                        <input type="hidden" name="id" value="<?= $type == "edit" ? $contacts->id : '' ?>">
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
<script>
CKEDITOR.replace('ckeditor_standard');
CKEDITOR.replace('ckeditor_standard1');
</script>

@stop
