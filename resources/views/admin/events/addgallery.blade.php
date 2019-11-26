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
    <h1>Event Management</h1>
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
                        <h3 class="panel-title">{{$type=="edit"?'Edit gallery':'Add gallery'}}</h3>
                    </div>
                    <div>
                        <div class="btn-group btn-group-xs">

                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <form id="tryitForm" class="form-horizontal" method="post" enctype="multipart/form-data">


                        <div class="form-group en_field hide">
                            <label class="col-md-3 control-label hidden-xs">Year</label>
                            <div class="col-md-8">
                                <select name="year" class="form-control">
                                    <option value="">Select</option>
                                    @for($i=$year;$i>=1980;$i--)
                                    <?php $class = ''; ?>
                                    <option value="{{ $i }}" <?= !empty($results) && $results->year == $i ? 'selected' : '' ?>>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="form-group en_field hide">
                            <label class="col-md-3 control-label hidden-xs">Type</label>
                            <div class="col-md-8">
                                <select name="gallery_type" class="form-control">
                                    <option value="">Select</option>
                                    <option value="1" <?= !empty($results) && $results->gallery_type == "1" ? 'selected' : '' ?>>Corporate</option>
                                    <option value="2" <?= !empty($results) && $results->gallery_type == "2" ? 'selected' : '' ?>>Identity</option>
                                    <option value="3" <?= !empty($results) && $results->gallery_type == "3" ? 'selected' : '' ?>>Events</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Title(English)</label>
                            <div class="col-md-8">
                                <input type="text" name="gallery_title_en" id="gallery_title_en" class="form-control" value="{{!empty($results)?$results->gallery_title_en:''}}">
                            </div>
                        </div>
                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Slug</label>
                            <div class="col-md-8">
                                <input type="text" name="slug" id="slug" class="form-control" value="{{!empty($results)?$results->slug:''}}">
                            </div>
                        </div>
                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label hidden-xs">Title(Arabic)</label>
                            <div class="col-md-8">
                                <input type="text" name="gallery_title_ar" class="form-control" value="{{!empty($results)?$results->gallery_title_ar:''}}">
                            </div>
                        </div>


                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Long Title(English)</label>
                            <div class="col-md-8">
                                <textarea name="gallery_long_title_en" class="form-control">{{!empty($results)?$results->gallery_long_title_en:''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label hidden-xs">Long Title(Arabic)</label>
                            <div class="col-md-8">
                                <textarea name="gallery_long_title_ar" class="form-control">{{!empty($results)?$results->gallery_long_title_ar:''}}</textarea>
                            </div>
                        </div>


                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Short Description(English)</label>
                            <div class="col-md-8">
                                <textarea id="ckeditor_standard" name="short_description_en" class="form-control">{{!empty($results)?$results->short_description_en:''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs ar_field">Short Description(Arabic)</label>
                            <div class="col-md-8">
                                <textarea id="ckeditor_standard1" name="short_description_ar" class="form-control">{{!empty($results)?$results->short_description_ar:''}}</textarea>
                            </div>
                        </div>


                        <div class="form-group" id="one">
                            <label class="col-md-3 control-label" >Holder Image
                                (NOTE : Minimum dimension of  image should be 390*253)
                                <br><br></label>
                            <div class="col-md-8">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                        @if($results)
                                        <img src="{{ url("/") }}/assets/images/media/{{ $results->path }}/{{ $results->holder_image }}">
                                        @endif
                                    </div>

                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image"></span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group ">
                            <label class="col-md-3 control-label hidden-xs">Meta Title</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="meta_title">{{!empty($results)?$results->meta_title:''}}</textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-md-3 control-label hidden-xs">Meta keyword</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="meta_keyword">{{!empty($results)?$results->meta_keyword:''}}</textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-md-3 control-label hidden-xs">Meta Description</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="meta_desc">{{!empty($results)?$results->meta_desc:''}}</textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-8">
                                <button type="submit" class="btn btn-primary">{{$type=="edit"?'Update':'Save'}}</button>
                            </div>                                                 
                        </div>

                        <input type="hidden" id="form_lang" name="form_lang" value="1">
                        <input type="hidden" name="type" value="{{$type}}">
                        <input type="hidden" name="id" value="{{$type== "edit"?$id:'' }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!--row ends-->
</section>
@stop

{{-- page level scripts --}}

@section('footer_scripts')

<script src="<?= asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') ?>" type="text/javascript"></script>
<!--<script src="<?= asset('assets/js/pages/validation.js') ?>" type="text/javascript"></script>-->
<script src="<?= asset('assets/vendors/tinymce/tinymce.min.js') ?>" type="text/javascript"></script>
<script  src="<?= asset('assets/vendors/ckeditor/js/ckeditor.js') ?>"  type="text/javascript"></script>
<script  src="<?= asset('assets/vendors/ckeditor/js/jquery.js') ?>"  type="text/javascript" ></script>
<script  src="<?= asset('assets/vendors/ckeditor/js/config.js') ?>"  type="text/javascript"></script>
<script  src="<?= asset('assets/js/pages/editor.js') ?>"  type="text/javascript"></script>
<script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
<script src="<?= asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') ?>" ></script>
<script>
CKEDITOR.replace('ckeditor_standard');
CKEDITOR.replace('ckeditor_standard1');
$(document).ready(function () {
    $("#project").change(function () {
        $.ajax({
            url: "ajax_get_properties",
            data: $('#tryitForm').serialize(),
            type: "POST",
            success: function (data) {
                $("#pajax").html(data);
            }
        });
    });
    $(document).on("click", ".remove", function () {
        $(this).parent().parent().parent().parent().remove();
    });
    $("#slug").click(function () {
        $(this).val($('#title_en').val().replace(/\s+/g, '-').toLowerCase() + '-<?= $id ?>');
    });
});
</script>  
<?php if ($type == "add") { ?>
    <script>
        $("#add").click(function () {
            $("#pimages").append($("#one").clone().attr({"style": "display:block", "id": ""}));
        });
    </script>  
<?php } else { ?>
    <script>
        $("#add").click(function () {
            $("#pimages").append($("#one").clone().attr({"style": "display:block", "id": ""}));
        });
<?php } ?>
</script>  
@stop
