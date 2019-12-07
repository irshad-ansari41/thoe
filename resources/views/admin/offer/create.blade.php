@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
@lang('offer/title.create') :: @parent
@stop

{{-- page level styles --}}
@section('header_styles')

<link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/offer.css') }}" rel="stylesheet" type="text/css">

<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <!--section starts-->
    <h1>@lang('offer/title.add-offer')</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i>
                @lang('general.home')
            </a>
        </li>
        <li>
            <a href="#">@lang('offer/title.offer')</a>
        </li>
        <li class="active">@lang('offer/title.add-offer')</li>
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
                {!! $errors->first('offer_category_id', '<span class="help-block">:message</span>') !!}
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
<!-- begining of page level js -->
<!--edit offer-->
<script src="{{ asset('assets/vendors/summernote/summernote.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}" type="text/javascript" ></script>
<script src="{{ asset('assets/js/pages/add_newoffer.js') }}" type="text/javascript"></script>
@stop