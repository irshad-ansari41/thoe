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
    <h1>News</h1>
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
                            @if($type=="edit") Edit Press release @else Add New Press release @endif

                        </h3>
                    </div>
                    <div>
                        <div class="btn-group btn-group-xs">

                        </div>
                    </div>
                </div>
                <!-- Panel panel Dangar end-->

                <div class="panel-body">
                    <form id="tryitForm" class="form-horizontal" method="post" enctype="multipart/form-data">

                        <div class="form-group en_field">

                            <label class="col-md-1  hidden-xs">Title(English) </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="title_en"
                                       placeholder="" value="@if($project){{ $project->title_en }} @endif" />
                            </div>

                            <label class="col-md-1  hidden-xs">Title(Arabic) </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control arabicFont" name="title_ar"
                                       placeholder="" value="@if($project){{ $project->title_ar }} @endif" />
                            </div>

                        </div>

                        <div class="form-group ar_field">

                            <label class="col-md-1  hidden-xs">Title(Chinese) </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="title_ch"
                                       placeholder="" value="@if($project){{ $project->title_ch }} @endif" />
                            </div>

                            <label class="col-md-1  hidden-xs">Date</label>
                            <div class="col-md-5">
                                <input id="date" value="@if($project){{ $project->date }} @endif" type="text" class="form-control" name="date">
                            </div>

                        </div>

                        <div class="form-group ">
                            <label class="col-md-1  hidden-xs">Slug</label>
                            <div class="col-md-5">
                                <textarea class="form-control" name="slug">@if($project){{ $project->slug }}@endif</textarea>
                            </div>

                            <label class="col-md-1  hidden-xs">Meta Title</label>
                            <div class="col-md-5">
                                <textarea class="form-control" name="meta_title">@if($project){{ $project->meta_title }}@endif</textarea>
                            </div>

                        </div>

                        <div class="form-group ">
                            <label class="col-md-1  hidden-xs">Meta keyword</label>

                            <div class="col-md-5">
                                <textarea class="form-control" name="meta_keyword">@if($project){{ $project->meta_keyword }}@endif</textarea>
                            </div>

                            <label class="col-md-1  hidden-xs">Meta Description</label>
                            <div class="col-md-5">
                                <textarea class="form-control" name="meta_desc">@if($project){{ $project->meta_desc }}@endif</textarea>
                            </div>

                        </div>

                        <div class="form-group ">
                            <label class="col-md-1  hidden-xs">Photo alt</label>

                            <div class="col-md-11">
                                <textarea class="form-control" name="alt">@if($project){{ $project->alt }}@endif</textarea>
                            </div>
                        </div>

                        <div class="form-group">

                            <label class="col-md-1 " name="description">Photo <br><br> </label>
                            <div class="col-md-3">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">@if($project) <img src="{{asset('assets/images/pressrelease')}}/{!! $project->image !!}" height="190" width="190" /> @endif</div>

                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select</span>
                                            <span class="fileinput-exists">Change</span>
                                            @if($project)
                                            <input type="file" name="image"></span>
                                        @else
                                        <input type="file" name="image" required></span>
                                        @endif
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>

                                </div>
                            </div>


                            <label class="col-md-1 " name="description">Upload Image : Zip<br><br> </label>
                            <div class="col-md-3">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>

                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select</span>
                                            <span class="fileinput-exists">Change</span>
                                            @if($project)
                                            <input type="file" name="image1"></span>
                                        @else
                                        <input type="file" name="image1"></span>
                                        @endif
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>

                                </div>
                            </div>

                            <label class="col-md-1 " name="description">Upload Document : Zip<br><br> </label>
                            <div class="col-md-3">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>

                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select</span>
                                            <span class="fileinput-exists">Change</span>
                                            @if($project)
                                            <input type="file" name="doc"></span>
                                        @else
                                        <input type="file" name="doc"></span>
                                        @endif
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-1 " name="">Short Description (English)</label>

                            <div class="col-md-5">
                                <textarea id="ckeditor_standard" name="description_en">@if($project){{ $project->description_en }} @endif</textarea>
                            </div>

                            <label class="col-md-1 " name="">Long Description (English)</label>

                            <div class="col-md-5">
                                <textarea id="ckeditor_standard" name="description_long_en">@if($project){{ $project->description_long_en }} @endif</textarea>
                            </div>


                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-1 " name="">Short Description (Chinese)</label>

                            <div class="col-md-5">
                                <textarea id="ckeditor_standard" name="description_ch">@if($project){{ $project->description_ch }} @endif</textarea>
                            </div>

                            <label class="col-md-1 " name="">Long Description (Chinese)</label>

                            <div class="col-md-5">
                                <textarea id="ckeditor_standard" name="description_long_ch">@if($project){{ $project->description_long_ch }} @endif</textarea>
                            </div>

                        </div>

                        <div class="form-group en_field">

                            <label class="col-md-1 " name="">Short Description (Arabic)</label>

                            <div class="col-md-5">
                                <textarea id="ckeditor_standard" name="description_ar" class="arabicFont" >@if($project){{ $project->description_ar }} @endif</textarea>
                            </div>

                            <label class="col-md-1 " name="">Long Description (Arabic)</label>

                            <div class="col-md-5">
                                <textarea id="ckeditor_standard" name="description_long_ar" class="arabicFont" >@if($project){{ $project->description_long_ar }} @endif</textarea>
                            </div>

                        </div>

                        <div class="form-group en_field">

                            <label class="col-md-1 " name="">Categories</label>

                            <div class="col-md-11">
                                <?php
                                foreach ($pressscategories as $category) {
                                    $checked = in_array($category->id, explode('-', $project->category)) ? 'checked' : ''
                                    ?>
                                    <label><input type='checkbox' name="category[]" value="<?= $category->id ?>" <?= $checked ?>> <?= $category->title ?></label><br/>  
                                <?php } ?>
                            </div>



                        </div>

                        <div class="form-group en_field">
                            <br/>
                            <!-- News Coverage Area -->
                            <label class="col-md-1 " name="">Coverage Highlights</label>
                            <div class="col-md-11">

                                <div id="dispalybox" style="padding-bottom:10px;">
                                    <button type="button" name="add" id="add" class="btn btn-success btn-sm">Add More</button>
                                </div>

                                <table class="table table-hover" id="dynamic_field">
                                    <?php if (!empty($coverage)): foreach ($coverage as $rows): ?>
                                            <tr>
                                                <td>
                                                    <input type="hidden" value="<?= $rows->id ?>" name="ncarea_id[]" class='form-control name_list' />
                                                    <input type="text" value="<?= $rows->newstitle ?>" name="newstitle[]" required="required" class='form-control name_list'/>
                                                </td>
                                                <td>
                                                    <input type="url" value="<?= $rows->newsurl ?>" name="newsurl[]" required="required" class='form-control name_list'/>
                                                </td>
                                                <td>
                                                    <a onclick="delete_value(<?= $rows->id ?>)"  class="btn btn-danger"> 
                                                        Delete
                                                    </a>    
                                                </td>
                                            </tr>
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>

                                </table>

                                <div id='msgbox'></div>


                            </div>     
                            <!-- End News Coverage Area -->
                        </div>


                        <div class="form-group">
                            <div class="col-md-offset-1 col-md-11">
                                <button type="submit" class="btn btn-primary">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?= url('/admin/news') ?>" class="btn btn-warning">Back</a>
                            </div>
                        </div>

                        <input type="hidden" id="form_lang" name="form_lang" value="1">
                        <input type="hidden" name="type" value="@if($type){{$type}}@endif">
                        <input type="hidden" name="id" 
                               value="@if($type=='edit'){{ $project->id }}@endif">
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

<script>

    $(document).ready(function () {
        var i = 1;
        $('#add').click(function () {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="newstitle[]" placeholder="Enter News Title" class="form-control name_list" /></td><td><input type="text" name="newsurl[]" placeholder="Enter News URL" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Delete</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

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
</script>

<script src="{{asset('assets/vendors/tinymce/tinymce.min.js')}}" type="text/javascript"></script>
<script  src="{{ asset('assets/vendors/ckeditor/js/ckeditor.js') }}"  type="text/javascript"></script>
<script  src="{{ asset('assets/vendors/ckeditor/js/jquery.js') }}"  type="text/javascript" ></script>
<script  src="{{ asset('assets/vendors/ckeditor/js/config.js') }}"  type="text/javascript"></script>
<script  src="{{ asset('assets/js/pages/editor.js') }}"  type="text/javascript"></script>
<script src="https://demo.itsolutionstuff.com/plugin/croppie.js"></script>
<link rel="stylesheet" href="https://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
<link rel="stylesheet" href="https://demo.itsolutionstuff.com/plugin/croppie.css">
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" ></script>


@stop
