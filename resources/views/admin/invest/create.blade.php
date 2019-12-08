@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
@lang('invest/title.create') :: @parent
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
<link href="{{ asset('assets/css/pages/buttons.css') }}" rel="stylesheet"/>

<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <!--section starts-->
    <h1>@lang('invest/title.add-invest')</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i>
                @lang('general.home')
            </a>
        </li>
        <li>
            <a href="#">@lang('invest/title.invest')</a>
        </li>
        <li class="active">@lang('invest/title.add-invest')</li>
    </ol>
</section>
<!--section ends-->
<section class="content paddingleft_right15">
    <!--main content-->
    <div class="row">
        <div class="the-box no-border">
            <!-- errors -->
            <div class="has-error">
                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
                {!! $errors->first('invest_category_id', '<span class="help-block">:message</span>') !!}
            </div>
            <form id="tryitForm" class="form-horizontal" method="post" enctype="multipart/form-data">

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



                <div class="form-group">
                    <div class="col-md-offset-3 col-md-8">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

                <input type="hidden" id="form_lang" name="form_lang" value="1">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            </form>
        </div>
    </div>
    <!--main content ends-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}"
type="text/javascript"></script>
{{--<script src="{{ asset('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js') }}"></script>--}}
<!--<script src="{{ asset('assets/js/pages/validation.js') }}" type="text/javascript"></script>-->
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
$(document).ready(function () {
    $("#project").change(function () {
//alert($(this).val());
        $.ajax({
            url: "ajax_get_properties",
            data: $('#tryitForm').serialize(),
            type: "POST",
            success: function (data) {
                $("#pajax").html(data);
            }
        });
    });

<?php if ($type == "add") { ?>
        $("#add").click(function () {
            $("#pimages").append($("#one").clone().attr({"style": "display:block", "id": ""}));
        })
<?php } else { ?>

        $("#add").click(function () {
            $("#pimages").append($("#one").clone().attr({"style": "display:block", "id": ""}));
        })

<?php } ?>

    $(document).on("click", ".remove", function () {
        $(this).parent().parent().parent().parent().remove();
    });
});
</script>
@stop