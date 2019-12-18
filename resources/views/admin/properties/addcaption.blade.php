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
            @includeIf('admin.common.errors')
            <!--image upload -->
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div style="float:left;width:70%;">
                        <h3 class="panel-title">
                            @if($type=="edit")
                            Edit captions into construction
                            @else	
                            Add captions into construction
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


                        @if(!empty($results))
                        <?php $i = 0; ?>
                        @foreach($results as $res)
                        <div class="form-group">



                            <div class="row">

                                <div class="col-md-2">
                                    <label class="col-md-1 control-label" ><img name="" src="{{asset('assets/images/properties')}}/{!! $project_location !!}/{!! $prop_location !!}/Construction_update/{!! $res->image !!}" height="60" width="60"/></label>
                                </div>

                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="imagecaption[]" value="{{ $res->caption }}" />
                                </div>

                                <div class="col-md-5">
                                    <input id="date-{{ $i }}" value="@if($res){{ $res->caption_date }} @endif" type="text" class="form-control date" name="caption_date[]">
                                </div>

                            </div>
                        </div>
                        <input type="hidden" name="images_ids[]" value="{{ $res->id }}">


                        <?php $i++; ?>
                        @endforeach
                        @endif

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
@stop

{{-- page level scripts --}}
@section('footer_scripts')

<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}"
type="text/javascript"></script>
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@if(!empty($results))
<?php
$i = 0;
$datestring = "";
?>
@foreach($results as $res)
<?php
if ((count($results) - 1) == $i) {
    $datestring .= "#date-" . $i;
} else {
    $datestring .= "#date-" . $i . ",";
}
$i++;
?>
@endforeach
@endif
<script>
$(function () {
    $('<?php echo $datestring; ?>').datepicker({
        dateFormat: "yy-mm-dd"
    });
});
</script>

@stop
