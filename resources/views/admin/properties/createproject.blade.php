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
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


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
                            Edit Project
                            @else	
                            Add Project
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

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Project Title (English)</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="title_en"
                                       placeholder="Enter Project title in English" value="@if($project){{ $project->title_en }} @endif" />
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-md-3 control-label hidden-xs">Slug</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="slug">@if($project){{ $project->slug }}@endif</textarea>
                            </div>
                        </div>

                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label hidden-xs">Project Title (Arabic)</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" value="@if($project){{ $project->title_ar }} @endif" name="title_ar"
                                       placeholder="Enter Project title in Arabic" />
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-md-3 control-label" name="description">Holder Photo <br><br> </label>
                            <div class="col-md-8">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">@if($project) <img src="{{asset('assets/images/projects')}}/{!! $project->image !!}" height="190" width="190" /> @endif</div>

                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select</span>
                                            <span class="fileinput-exists">Change</span>
                                            @if($project)
                                            <input type="file" name="image"></span>
                                        @else
                                        <input type="file" name="image"></span>
                                        @endif
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Holder Alt</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="holder_alt"
                                       placeholder="Enter alt" value="@if($project){{ $project->holder_alt }} @endif" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" name="description">Header Photo <br><br> </label>
                            <div class="col-md-8">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">@if($project) <img src="{{asset('assets/images/projects')}}/{!! $project->header_image !!}" height="190" width="190" /> @endif</div>

                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select</span>
                                            <span class="fileinput-exists">Change</span>
                                            @if($project)
                                            <input type="file" name="header_image"></span>
                                        @else
                                        <input type="file" name="header_image" ></span>
                                        @endif
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Header Alt</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="header_alt"
                                       placeholder="Enter alt" value="@if($project){{ $project->header_alt }} @endif" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" name="description">Construction Header Photo <br><br> </label>
                            <div class="col-md-8">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">@if($project) <img src="{{asset('assets/images/projects')}}/{!! $project->construction_header_image !!}" height="190" width="190" /> @endif</div>

                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select</span>
                                            <span class="fileinput-exists">Change</span>
                                            @if($project)
                                            <input type="file" name="construction_header_image"></span>
                                        @else
                                        <input type="file" name="construction_header_image"></span>
                                        @endif
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Construction Alt</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="construction_alt"
                                       placeholder="Enter alt" value="@if($project){{ $project->construction_alt }} @endif" />
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Project Sub Title (English)</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="subtitle_en"
                                       placeholder="Enter Project sub title in English" value="@if($project){{ $project->subtitle_en }} @endif" />
                            </div>
                        </div>


                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label hidden-xs">Project Sub Title (Arabic)</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" value="@if($project){{ $project->subtitle_ar }} @endif" name="subtitle_ar"
                                       placeholder="Enter Project sub title in Arabic" />
                            </div>
                        </div>


                        <div class="form-group en_field">
                            <label class="col-md-3 control-label" name="">Project Long Description (English)</label>

                            <div class="col-md-8">
                                <textarea id="ckeditor_standard" name="description_en">@if($project){{ $project->description_en }} @endif</textarea>
                            </div>
                        </div>
                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label" name="">Project Long Description (Arabic)</label>

                            <div class="col-md-8">
                                <textarea id="ckeditor_standard1" name="description_ar">@if($project){{ $project->description_ar }} @endif</textarea>
                            </div>
                        </div>


                        <div class="form-group ">
                            <label class="col-md-3 control-label hidden-xs">Total Completion</label>

                            <div class="col-md-8">
                                <input type="number" class="form-control" name="total_completion" value="{{ !empty($project->total_completion)?$project->total_completion:'' }}">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-md-3 control-label hidden-xs">Completion Date</label>

                            <div class="col-md-8">
                                <input type="date" class="form-control" name="completion_date" value="{{ !empty($project->completion_date)?$project->completion_date:'' }}">
                            </div>
                        </div>



                        <div class="form-group ">
                            <label class="col-md-3 control-label hidden-xs">Meta Title</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="meta_title">@if($project){{ $project->meta_title }}@endif</textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-md-3 control-label hidden-xs">Meta keyword</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="meta_keyword">@if($project){{ $project->meta_keyword }}@endif</textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-md-3 control-label hidden-xs">Meta Description</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="meta_desc">@if($project){{ $project->meta_desc }}@endif</textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-8">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                        <input type="hidden" id="form_lang" name="form_lang" value="1">
                        <input type="hidden" name="type" value="@if($type){{$type}}@endif">
                        <input type="hidden" name="id" value="@if($type=="edit"){{ $project->id }}@endif">
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

<script src="<?= asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') ?>" type="text/javascript"></script>
<script src="<?= asset('assets/js/pages/validation.js') ?>" type="text/javascript"></script>
<script src="<?= asset('assets/vendors/tinymce/tinymce.min.js') ?>" type="text/javascript"></script>
<script  src="<?= asset('assets/vendors/ckeditor/js/ckeditor.js') ?>"  type="text/javascript"></script>
<script  src="<?= asset('assets/vendors/ckeditor/js/jquery.js') ?>"  type="text/javascript" ></script>
<script  src="<?= asset('assets/vendors/ckeditor/js/config.js') ?>"  type="text/javascript"></script>
<script  src="<?= asset('assets/js/pages/editor.js') ?>"  type="text/javascript"></script>

<script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>

<script src="<?= asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') ?>" ></script>
<script>

                                CKEDITOR.replace('ckeditor_standard');
                                CKEDITOR.replace('ckeditor_standard1');
                                function displayLanguage(lang)
                                {
                                    if (lang == 1)
                                    {
                                        $(".en_field").show();
                                        $(".ar_field").hide();
                                        $("#form_lang").val(1);
                                    }
                                    if (lang == 2)
                                    {
                                        $(".en_field").hide();
                                        $(".ar_field").show();
                                        $("#form_lang").val(2);
                                    }

                                    if (lang == 0)
                                    {
                                        $(".en_field").show();
                                        $(".ar_field").show();
                                        $("#form_lang").val(0);
                                    }
                                }
                                $(".ar_field").hide();

</script>
@stop
