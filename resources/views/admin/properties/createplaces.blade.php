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
                            Edit Near by place
                            @else	
                            Add Near by place
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
                            <label class="col-md-3 control-label hidden-xs">Project</label>

                            <div class="col-md-8">
                                <select name="project_id" class="form-control">
                                    <option value="">Select</option>
                                    @if(!empty($projects))

                                    @foreach($projects as $project)
                                    <?php $class = ''; ?>
                                    @if($project->id==$id)			
                                    <?php $class = 'selected'; ?>
                                    @endif
                                    <option value="{{ $project->id }}" {!! $class !!}>{{ $project->title_en }}</option>	
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <?php
                        $j = 0;
                        ?>	
                        @for($i=1;$i<=count($near);$i++)	   
                        <b>{{ $i }} : Near by Location</b>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Title (English)</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="title_en[]"
                                       placeholder="Enter title" value="@if($near){{ $near[$j]->title_en }} @endif" />
                            </div>
                        </div>

                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label hidden-xs">Title (Arabic)</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" value="@if($near){{ $near[$j]->title_ar }} @endif" name="title_ar[]"
                                       placeholder="Enter title" />
                            </div>
                        </div>


                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Short Description (English)</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="description_en[]">@if($near){{ $near[$j]->description_en }} @else {{ old('description_en') }} @endif</textarea>
                            </div>
                        </div>

                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label hidden-xs">Short Description (Arabic)</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="description_ar[]">@if($near){{ $near[$j]->description_ar }} @else {{ old('description_ar') }} @endif</textarea>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-md-3 control-label" >Image <br><br></label>
                            <div class="col-md-8">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                        @if($type=="edit") 
                                        <img src="{{asset('assets/images/near')}}/{!! $near[$j]->image !!}" height="190" width="190" />
                                        >												
                                        @endif</div>

                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select Icon</span>
                                            <span class="fileinput-exists">Change</span>
                                            @if($near)
                                            <input type="file" name="image[]"></span>
                                        @else
                                        <input type="file" name="image[]" required></span>
                                        @endif
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @if($type=="edit") 
                        <input type="hidden" name="old_images[]" value="{{ $near[$j]->image }}">
                        @endif
                        <?php $j++; ?>		
                        @endfor		




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
<script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" ></script>
<script>
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
