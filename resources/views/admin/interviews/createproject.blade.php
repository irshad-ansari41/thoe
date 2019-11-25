@extends('admin/layouts/default')

{{-- page level styles --}}
@section('header_styles')

<link href="<?= asset('assets/css/pages/form2.css') ?>" rel="stylesheet"/>
<link href="<?= asset('assets/css/pages/form3.css') ?>" rel="stylesheet"/>
<link href="<?= asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') ?>" rel="stylesheet"/>
<link href="<?= asset('assets/vendors/intl-tel-input/build/css/intlTelInput.css') ?>" rel="stylesheet"/>
<link href="<?= asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') ?>" rel="stylesheet"/>
<link href="<?= asset('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') ?>"  rel="stylesheet" media="screen"/>
<link href="<?= asset('assets/css/pages/editor.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?= asset('assets/css/pages/buttons.css') ?>" rel="stylesheet"/>
<link href="<?= asset('assets/css/timepicki.css') ?>" rel="stylesheet">
<style>
    input.timepicki-input
    {
        padding-bottom:0px;
    }
</style>
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <h1>Event</h1>
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
                        <h3 class="panel-title"><?= $type == "edit" ? 'Edit Interview' : 'Add Interview' ?></h3>
                    </div>
                    <div>
                        <div class="btn-group btn-group-xs">

                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <form id="tryitForm" class="form-horizontal" method="post" enctype="multipart/form-data">

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Title(English) </label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="event_title"
                                       placeholder="" value="<?= !empty($project->interview_title_en) ? $project->interview_title_en : '' ?>" />
                            </div>
                        </div>
                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label hidden-xs">Title(Arabic) </label>

                            <div class="col-md-8">
                                <input type="text" class="form-control arabicFont" name="event_title_ar"
                                       placeholder="" value="<?= !empty($project->interview_title_ar) ? $project->interview_title_ar : '' ?>" />
                            </div>
                        </div>
                        

                        <div class="form-group ">
                            <label class="col-md-3 control-label hidden-xs en_field">Slug(English)</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="slug"><?= !empty($project->slug_en) ? $project->slug_en : '' ?></textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-md-3 control-label hidden-xs ar_field">Slug(Arabic)</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="slug_ar"><?= !empty($project->slug_ar) ? $project->slug_ar : '' ?></textarea>
                            </div>
                        </div>
                       

                        <div class="form-group">
                            <label class="col-md-3 control-label" name="description">Thumbnail photo <br><br> </label>
                            <div class="col-md-8">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"><img src="{{asset('assets/images/media/interviews')}}/<?= !empty($project->interview_photo) ? $project->interview_photo : '' ?>" height="190" width="190" /> </div>

                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select</span>
                                            <span class="fileinput-exists">Change</span><input type="file" name="image"></span>

                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Thumbnail alt</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="event_photo_alt" value="<?= !empty($project->interview_photo_alt) ? $project->interview_photo_alt : '' ?>" />
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label" name="">Short Description(English) </label>

                            <div class="col-md-8">
                                <textarea id="" class="form-control"  name="extra_desc" rows="5"><?= !empty($project->long_desc_en) ? $project->long_desc_en : '' ?></textarea>
                            </div>
                        </div>
                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label" name="">Short Description(Arabic) </label>

                            <div class="col-md-8">
                                <textarea id="" class="form-control arabicFont"  name="extra_desc_ar" rows="5"><?= !empty($project->long_desc_ar) ? $project->long_desc_ar : '' ?></textarea>
                            </div>
                        </div>
                        

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Event Date</label>

                            <div class="col-md-8">
                                <input id="Ddate" value="<?= !empty($project->interview_date) ? $project->interview_date : '' ?>" type="text" class="form-control" name="date">
                            </div>
                        </div>


                        <div class="form-group ">
                            <label class="col-md-3 control-label hidden-xs">Meta Title</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="meta_title"><?= !empty($project->meta_title) ? $project->meta_title : '' ?></textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-md-3 control-label hidden-xs">Meta keyword</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="meta_keyword"><?= !empty($project->meta_keyword) ? $project->meta_keyword : '' ?></textarea>
                            </div>
                        </div>


                        <div class="form-group ">
                            <label class="col-md-3 control-label hidden-xs">Meta Description</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="meta_desc"><?= !empty($project->meta_desc) ? $project->meta_desc : '' ?></textarea>
                            </div>
                        </div>  

                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-8">
                                <button type="submit" class="btn btn-primary"><?= !empty($type == 'add') ? 'Submit' : 'Update' ?></button>   
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="<?= url('/admin/interviews/') ?>" class="btn btn-warning">Back</a>
                            </div>
                        </div>

                        <input type="hidden" id="form_lang" name="form_lang" value="1">
                        <input type="hidden" name="type" value="<?= !empty($type) ? $type : '' ?>">
                        <input type="hidden" name="id" value="<?= !empty($type == "edit") ? $project->id : '' ?>">
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

<script src="<?= asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') ?>"
type="text/javascript"></script>
<!--<script src="<?= asset('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js') ?>"></script>-->
<script src="<?= asset('assets/js/pages/validation.js') ?>" type="text/javascript"></script>

<script src="<?= asset('assets/vendors/tinymce/tinymce.min.js') ?>" type="text/javascript"></script>
<script  src="<?= asset('assets/vendors/ckeditor/js/ckeditor.js') ?>"  type="text/javascript"></script>
<script  src="<?= asset('assets/vendors/ckeditor/js/jquery.js') ?>"  type="text/javascript" ></script>
<script  src="<?= asset('assets/vendors/ckeditor/js/config.js') ?>"  type="text/javascript"></script>
<script  src="<?= asset('assets/js/pages/editor.js') ?>"  type="text/javascript"></script>
<script src="https://demo.itsolutionstuff.com/plugin/croppie.js"></script>
<link rel="stylesheet" href="https://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
<link rel="stylesheet" href="https://demo.itsolutionstuff.com/plugin/croppie.css">
<script src="<?= asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') ?>" ></script>
<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/js/timepicki.js') ?>"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--link rel="stylesheet" href="/resources/demos/style.css"-->

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

//CKEDITOR.replace( 'ckeditor_standard' );
//CKEDITOR.replace( 'ckeditor_standard1' );
//CKEDITOR.replace( 'ckeditor_standard2' );
$('#timepicker1').timepicki();
$('#timepicker2').timepicki();

jQuery(function () {
    jQuery("#Ddate").datepicker({dateFormat: "yy-mm-dd"});
});
</script>
@stop
