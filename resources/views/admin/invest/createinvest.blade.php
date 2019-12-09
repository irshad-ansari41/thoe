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
    <h1>Invest</h1>
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
                            <?= $type == "edit" ? 'Edit Invest' : 'Add New Invest' ?>
                        </h3>
                    </div>
                    <div>
                        <div class="btn-group btn-group-xs"></div>
                    </div>
                </div>
                <!-- Panel panel Dangar end-->

                <div class="panel-body">
                    <form id="tryitForm" class="form-horizontal" method="post" enctype="multipart/form-data">

                        <div class="form-group en_field">

                            <label class="col-md-1  ">Title(English) </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="title_en" placeholder="" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)" value="<?= $invest ? $invest->title_en : '' ?>" />
                            </div>

                            <label class="col-md-1  ">Title(Arabic) </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control arabicFont" name="title_ar" placeholder="" value="<?= $invest ? $invest->title_en : '' ?>" />
                            </div>

                        </div>

                        <div class="form-group ">
                            <label class="col-md-1  ">Photo alt</label>
                            <div class="col-md-11">
                                <input type="text" class="form-control" name="alt" value="<?= $invest ? $invest->alt : '' ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 " name="description">Photo <br><br> </label>
                            <div class="col-md-3">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                        <?php if ($invest) { ?> 
                                            <img src="<?= asset('assets/images/invest') ?>/<?= $invest->image ?>" height="190" width="190" /> 
                                        <?php } ?>
                                    </div>
                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select</span>
                                            <span class="fileinput-exists">Change</span>
                                            <?= $invest ? '<input type="file" name="image"></span>' : '<input type="file" name="image" required></span>' ?>
                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-1 " name=""> Description (English)</label>
                            <div class="col-md-5">
                                <textarea id="ckeditor_standard" name="description_en"><?= $invest ? $invest->description_en : '' ?></textarea>
                            </div>
                            <label class="col-md-1 " name=""> Description (Arabic)</label>
                            <div class="col-md-5">
                                <textarea id="ckeditor_standard" name="description_ar" class="arabicFont" ><?= $invest ? $invest->description_ar : '' ?></textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-6">
                                <label class="col-md-12">Section (English)</label>
                                <?php
                                $section_en = unserialize($invest->section_en);
                                for ($i = 0; $i <= 3; $i++) {
                                    ?>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="section_en[<?= $i ?>][title]" placeholder="Section Title" value="<?= !empty($section_en[$i]['title']) ? $section_en[$i]['title'] : '' ?>" />
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="section_en[<?= $i ?>][icon]" placeholder="Section Title" value="<?= $section_en[$i]['icon'] ? $section_en[$i]['icon'] : '' ?>" />
                                    </div>
                                    <div class="col-md-12"><br/>
                                        <textarea name="section_en[<?= $i ?>][desc]"  class="form-control" placeholder="Section Description" ><?= $section_en[$i]['desc'] ? $section_en[$i]['desc'] : '' ?></textarea><br/><br/>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-12">Section (Arabic)</label>
                                <?php
                                $section_ar = unserialize($invest->section_ar);
                                for ($i = 0; $i <= 3; $i++) {
                                    ?>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="section_ar[<?= $i ?>][title]" placeholder="Section Title" value="<?= !empty($section_ar[$i]['title']) ? $section_ar[$i]['title'] : '' ?>" />
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="section_ar[<?= $i ?>][icon]" placeholder="Section Title" value="<?= $section_ar[$i]['icon'] ? $section_ar[$i]['icon'] : '' ?>" />
                                    </div>
                                    <div class="col-md-12"><br/>
                                        <textarea name="section_ar[<?= $i ?>][desc]"  class="form-control" placeholder="Section Description" ><?= $section_ar[$i]['desc'] ? $section_ar[$i]['desc'] : '' ?></textarea><br/><br/>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>



                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="<?= url('/admin/invest') ?>" class="btn btn-warning">Back</a>
                            </div>
                        </div>

                        <input type="hidden" id="form_lang" name="form_lang" value="1">
                        <input type="hidden" name="type" value="<?= $type ? $type : '' ?>">
                        <input type="hidden" name="id" value="<?= $type == 'edit' ? $invest->id : '' ?>">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    </form>


                </div>
            </div>
        </div>
    </div>
    <!--panel-body row ends-->
</section>
<!-- content -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')

<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<!--<script src="{{ asset('assets/js/pages/validation.js') }}" type="text/javascript"></script>-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<script>
                                    $(function () {
                                        $("#date").datepicker({
                                            dateFormat: "yy-mm-dd"
                                        });
                                    });
</script>

<script>

    $(document).ready(function () {


    });

    function delete_value(id) {
        var ids = id;
        //alert(ids);
        var url = "{{route('admin.news.deletecoverage')}}";
        var r = confirm("Are You Sure Want to Delete This ?");
        if (r == true) {
            //txt = "You pressed OK!";
            $.ajax({
                url: url,
                method: "POST",
                data: {id: id},
                success: function (data)
                {
                    $('#msgbox').html(data);
                    setTimeout(function () {
                        $('#msgbox').hide(data)
                    }, 2000);
                    setTimeout(function () {
                        location.reload()
                    }, 1000);
                }
            });
        }
    }
    // Delete News  

    /* Encode string to slug */
    function convertToSlug(str) {

        //replace all special characters | symbols with a space
        str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();

        // trim spaces at start and end of string
        str = str.replace(/^\s+|\s+$/gm, '');

        // replace space with dash/hyphen
        str = str.replace(/\s+/g, '-');
        document.getElementById("slug-text").innerHTML = str;
        //return str;
    }

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
