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
                        <h3 class="panel-title">
                            @if($type=="edit")
                            Edit gallery into property
                            @else	
                            Add gallery into property
                            @endif
                        </h3>
                    </div>

                </div>
                <div class="panel-body">
                    <form id="tryitForm" class="form-horizontal" method="post" enctype="multipart/form-data">

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Project</label>
                            <div class="col-md-8">
                                <select name="title_en" class="form-control" id="project">
                                    <option value="">Select</option>
                                    @if(!empty($projects))

                                    @foreach($projects as $project)
                                    <?php $class = ''; ?>
                                    @if($project->id==$project_id)			
                                    <?php $class = 'selected'; ?>
                                    @endif
                                    <option value="{{ $project->id }}" {!! $class !!}>{{ $project->title_en }}</option>	
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div id="pajax">
                            <div class="form-group en_field">
                                <label class="col-md-3 control-label hidden-xs">Properties</label>
                                <div class="col-md-8">
                                    <select name="pid" class="form-control" id="property">
                                        <option value="">Select</option>
                                        @if(!empty($props))
                                        @foreach($props as $res)
                                        <?php $class = ''; ?>
                                        @if($res->id==$id)	
                                        <?php $class = 'selected'; ?>
                                        @endif
                                        <option value="{{ $res->id }}" {!! $class !!}>{{ $res->title_en }}</option>	
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div id="pimages">

                            @if($type=="add")

                            @else

                            @if(!empty($results))
                            @foreach($results as $res)
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Upload photo <br><br></label>
                                <div class="col-md-8">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                            <img src="{{asset('assets/images/properties')}}/{!! $project_location !!}/{!! $prop_location !!}/{!! $res->image !!}" height="190" width="190" />
                                        </div>

                                        <div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileinput-new">Select</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="image[]"></span>
                                            <a href="#" class="btn btn-default remove">Remove</a>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="old_images[]" value="{{ $res->image }}">
                                <input type="hidden" name="old_id[]" value="{{ $res->id }}">
                            </div>
                            @endforeach
                            @endif

                            @endif	
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" >&nbsp; <br><br></label>
                            <div class="col-md-8">
                                <a href="javascript:void(0)" class="btn btn-primary" id="add">Add Gallery</a>
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    @if($type=="edit")
                                    Update
                                    @else	
                                    Save
                                    @endif	
                                </button>
                            </div>
                        </div>

                        <input type="hidden" id="form_lang" name="form_lang" value="1">
                        <input type="hidden" name="type" value="@if($type){{$type}}@endif">
                        <input type="hidden" name="id" value="@if($type=="edit"){{ $id }}@endif">
                               @if($type=="edit")
                               <input type="hidden" name="project_id" value="{!! $project_id !!}">
                        @endif
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!--row ends-->
</section>
<!-- content -->
<div class="form-group" id="one" style="display:none;">
    <label class="col-md-3 control-label" >Upload photo <br><br></label>
    <div class="col-md-8">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">

            </div>

            <div>
                <span class="btn btn-default btn-file">
                    <span class="fileinput-new">Select</span>
                    <span class="fileinput-exists">Change</span>
                    <input type="file" name="image[]"></span>
                <a href="#" class="btn btn-default remove" >Remove</a>
            </div>
        </div>
    </div>
    <input type="hidden" name="old_images[]" value="">
    <input type="hidden" name="old_id[]" value="">
</div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}"
type="text/javascript"></script>
{{--<script src="{{ asset('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js') }}"></script>--}}
<script src="{{ asset('assets/js/pages/validation.js') }}" type="text/javascript"></script>
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
