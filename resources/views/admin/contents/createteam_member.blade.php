@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Add Team Member
@parent
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

@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <h1>THOE Team</h1>
</section>
<!--section ends-->
<section class="content">
    <!--main content-->
    <div class="row">
        <div class="col-md-12">
            <!--image upload -->
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div style="float:left;width:70%;">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="pacman" data-size="16" data-loop="true" data-c="#fff"
                               data-hc="white"></i>
                            @if($type=="add")   
                            Add New Team Member
                            @else
                            Edit New Team Member
                            @endif	
                        </h3>
                    </div>
                    <div>
                        <div class="btn-group btn-group-xs">
                            <button type="button" class="btn btn-success btn_sizes" onclick="displayLanguage(1)">English</button>
                            <button type="button" class="btn btn-danger btn_sizes" onclick="displayLanguage(2)">Arabic</button>
                            
                            <button type="button" class="btn btn-primary btn_sizes" onclick="displayLanguage(0)">Show All</button>
                        </div>
                    </div>
                </div>


                <div class="panel-body">
                    <form id="tryitForm" class="form-horizontal" method="post" enctype="multipart/form-data">

                        <div class="form-group striped-col">
                            <label class="col-md-3 control-label" for="example-select">Main Team</label>
                            <div class="col-md-4">
                                <select id="mainteamid" name="team_id" class="form-control" size="1" >
                                    <option value="0">Select Team</option>
                                    @foreach($parent_teams as $parent_team)
                                    <?php
                                    $class = "";
                                    ?>
                                    @if($main_team_id!=0)
                                    @if($parent_team->id==$main_team_id)
                                    <?php $class = "selected"; ?>
                                    @endif
                                    @endif
                                    <option <?php echo $class; ?>  value="{!! $parent_team->id !!}">{!! $parent_team->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <div class="form-group striped-col">
                                <label class="col-md-3 control-label" for="example-select">Sub Team</label>
                                <div class="col-md-4">
                                    <select name="sub_team_id" class="form-control" size="1"  id="pajax">
                                        <option value="0">Select Sub Team</option>
                                        @if(!empty($sub_team))
                                        @foreach($sub_team as $sub_tm)
                                        <?php $class = ''; ?>
                                        @if($sub_tm->id==$sub_team_id)	
                                        <?php $class = 'selected'; ?>
                                        @endif
                                        <option value="{{ $sub_tm->id }}" {!! $class !!}>{{ $sub_tm->name }}</option>	
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Team Member Name(English)</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name"
                                       placeholder="Enter Name" value="@if($team){{ $team->name }} @else {{ old('name') }} @endif" />
                            </div>
                        </div>
                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label hidden-xs">Team Member Name(Arabic)</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name_ar"
                                       placeholder="Enter Name" value="@if($team){{ $team->name_ar }} @else {{ old('name_ar') }} @endif" />
                            </div>
                        </div>
                       


                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Designation(English)</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" value="@if($team){{ $team->designation }} @else {{ old('designation') }} @endif" name="designation"
                                       placeholder="Enter Designation" />
                            </div>
                        </div>
                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label hidden-xs">Designation(Arabic)</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" value="@if($team){{ $team->designation_ar }} @else {{ old('designation_ar') }} @endif" name="designation_ar"
                                       placeholder="Enter Designation" />
                            </div>
                        </div>
                        

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Short Description (English)</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="description_en" rows="3">@if($team){{ $team->description_en }} @else {{ old('description_en') }} @endif</textarea>
                            </div>
                        </div>

                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label hidden-xs">Short Description (Arabic)</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="description_ar" rows="3">@if($team){{ $team->description_ar }} @else {{ old('description_ar') }} @endif</textarea>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-md-3 control-label" name="description">Photo <br><br> (Note : Image Dimension Minimum Should be 230*230)</label>
                            <div class="col-md-8">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">

                                        @if($team)	
                                        @if($team->image!="")
                                        <img src="<?= url('/') ?>/assets/images/team/{{ $team->image }}" width="200" height="150">
                                        @endif
                                        @endif
                                    </div>
                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image"></span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Photo Alt</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" value="@if($team){{ $team->alt }}@else{{ old('alt') }}@endif" name="alt"
                                       placeholder="Enter Alt" />
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-8">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                        @if($type=="add")
                        <input type="hidden" name="type" value="add">
                        @else
                        <input type="hidden" name="type" value="edit">
                        @endif
                        <input type="hidden" name="id" value="@if($team){{ $team->id }} @endif" />
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
{{--<script src="{{ asset('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js') }}"></script>--}}
<script src="{{ asset('assets/js/pages/validation.js') }}" type="text/javascript"></script>

<script src="{{asset('assets/vendors/tinymce/tinymce.min.js')}}" type="text/javascript"></script>
<script  src="{{ asset('assets/vendors/ckeditor/js/ckeditor.js') }}"  type="text/javascript"></script>
<script  src="{{ asset('assets/vendors/ckeditor/js/jquery.js') }}"  type="text/javascript" ></script>
<script  src="{{ asset('assets/vendors/ckeditor/js/config.js') }}"  type="text/javascript"></script>
<script  src="{{ asset('assets/js/pages/editor.js') }}"  type="text/javascript"></script>
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" ></script>
<script>
                                function displayLanguage(lang)
                                {
                                    if (lang == 1)
                                    {
                                        $(".en_field").show();
                                        $(".ar_field").hide();
                                        $(".ch_field").hide();
                                        $(".hn_field").hide();
                                        $(".ur_field").hide();
                                        $("#form_lang").val(1);
                                    }
                                    if (lang == 2)
                                    {
                                        $(".en_field").hide();
                                        $(".ar_field").show();
                                        $(".ch_field").hide();
                                        $(".hn_field").hide();
                                        $(".ur_field").hide();
                                        $("#form_lang").val(2);
                                    }
                                    if (lang == 3)
                                    {
                                        $(".en_field").hide();
                                        $(".ar_field").hide();
                                        $(".ch_field").show();
                                        $(".hn_field").hide();
                                        $(".ur_field").hide();
                                        $("#form_lang").val(3);
                                    }
                                    if (lang == 4)
                                    {
                                        $(".en_field").hide();
                                        $(".ar_field").hide();
                                        $(".ch_field").hide();
                                        $(".hn_field").show();
                                        $(".ur_field").hide();
                                        $("#form_lang").val(4);
                                    }
                                    if (lang == 5)
                                    {
                                        $(".en_field").hide();
                                        $(".ar_field").hide();
                                        $(".ch_field").hide();
                                        $(".hn_field").hide();
                                        $(".ur_field").show();
                                        $("#form_lang").val(5);
                                    }
                                    if (lang == 0)
                                    {
                                        $(".en_field").show();
                                        $(".ar_field").show();
                                        $(".ch_field").show();
                                        $(".hn_field").show();
                                        $(".ur_field").show();
                                        $("#form_lang").val(0);
                                    }
                                }
                                $(".ar_field").hide();
                                $(".ch_field").hide();
                                $(".hn_field").hide();
                                $(".ur_field").hide();

                                $(document).ready(function () {
                                    $("#mainteamid").change(function () {

                                        $.ajax({
                                            url: "ajax_get_team",
                                            data: $('#tryitForm').serialize(),
                                            type: "POST",
                                            success: function (data) {
                                                $("#pajax").html(data);
                                            }
                                        });
                                    });
                                });
</script>
@stop
