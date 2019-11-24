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
                    <div style="float:left;width:60%;">
                        <h3 class="panel-title">
                            @if($type=="edit")
                            Edit Property
                            @else	
                            Add Property
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
                            <label class="col-md-3 control-label" for="example-select">Project (Area)</label>
                            <div class="col-md-4">
                                <select id="example-select" name="project_id" class="form-control" size="1">
                                    <option value="0">Select Project</option>
                                    @foreach($projects as $project)
                                    <?php
                                    $class = "";
                                    ?>
                                    @if($properties)
                                    @if($properties->project_id==$project->id)
                                    <?php $class = "selected"; ?>
                                    @endif
                                    @endif
                                    <option <?php echo $class; ?>  value="{!! $project->id !!}">{!! $project->title_en !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Property Name (English)</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="title_en" value="@if($properties){{ $properties->title_en }} @endif"
                                       placeholder="Enter property name"  />
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-md-3 control-label hidden-xs">Slug</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="slug">@if($properties){{ $properties->slug }}@endif</textarea>
                            </div>
                        </div>

                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label hidden-xs">Property Name (Arabic)</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control"  name="title_ar" value="@if($properties){{ $properties->title_ar }} @endif"
                                       placeholder="Enter property name" />
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label" name="description">Property Holder Image <br><br> </label>
                            <div class="col-md-8">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">@if($properties) <img src="{{asset('assets/images/properties')}}/{{ $selectedprojects->gallery_location }}/{{ $properties->gallery_location }}/{{ $properties->holder_image }}" height="190" width="190" /> @endif</div>

                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select</span>
                                            <span class="fileinput-exists">Change</span>
                                            @if($properties)
                                            <input type="file" name="image"></span>
                                        @else
                                        <input type="file" name="image" required></span>
                                        @endif
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Property Holder Alt</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="holder_alt"
                                       placeholder="Enter alt" value="@if($properties){{ $properties->holder_alt }} @endif" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" name="description">Property Header Banner <br><br> </label>
                            <div class="col-md-8">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">@if($properties) <img src="{{asset('assets/images/properties')}}/{!! $selectedprojects->gallery_location !!}/{!! $properties->gallery_location !!}/{!! $properties->header_image !!}" height="190" width="190" /> @endif</div>

                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select</span>
                                            <span class="fileinput-exists">Change</span>
                                            @if($properties)
                                            <input type="file" name="header_image"></span>
                                        @else
                                        <input type="file" name="header_image" required></span>
                                        @endif
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Property Header Banner Alt</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="header_alt"
                                       placeholder="Enter alt" value="@if($properties){{ $properties->header_alt }} @endif" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" name="description">Construction Header Banner <br><br> </label>
                            <div class="col-md-8">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">@if($properties && $properties->construction_header) <img src="{{asset('assets/images/properties')}}/{!! $selectedprojects->gallery_location !!}/{!! $properties->gallery_location !!}/{!! $properties->construction_header !!}" height="190" width="190" /> @endif</div>

                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select</span>
                                            <span class="fileinput-exists">Change</span>
                                            @if($properties)
                                            <input type="file" name="construction_header"></span>
                                        @else
                                        <input type="file" name="construction_header"></span>
                                        @endif
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Construction Header Banner Alt</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="construction_alt"
                                       placeholder="Enter alt" value="@if($properties){{ $properties->construction_alt }} @endif" />
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label" name="description">Property Footer Banner <br><br> </label>
                            <div class="col-md-8">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">@if($properties && $properties->footer_image) <img src="{{asset('assets/images/properties')}}/{!! $selectedprojects->gallery_location !!}/{!! $properties->gallery_location !!}/{!! $properties->footer_image !!}" height="190" width="190" /> @endif</div>

                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select</span>
                                            <span class="fileinput-exists">Change</span>
                                            @if($properties)
                                            <input type="file" name="footer_image"></span>
                                        @else
                                        <input type="file" name="footer_image" required></span>
                                        @endif
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Property Footer Banner Alt</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="footer_alt"
                                       placeholder="Enter alt" value="@if($properties){{ $properties->footer_alt }} @endif" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Footer Banner Link</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="footer_banner_link"
                                       value="@if($properties){{ $properties->footer_banner_link }} @endif" placeholder="Enter banner link" />
                            </div>
                        </div>


                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Short Description (English)</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="short_description_en" rows="4">@if($properties){{ $properties->short_description_en }} @else {{ old('short_description_en') }} @endif</textarea>
                            </div>
                        </div>

                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label hidden-xs">Short Description (Arabic)</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="short_description_ar" rows="4">@if($properties){{ $properties->short_description_ar }} @else {{ old('short_description_ar') }} @endif</textarea>
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label" name="">Long Description (English)</label>

                            <div class="col-md-8">
                                <textarea id="ckeditor_standard" name="long_description_en">@if($properties){{ $properties->long_description_en }} @endif</textarea>
                            </div>
                        </div>
                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label" name="">Long Description (Arabic)</label>

                            <div class="col-md-8">
                                <textarea id="ckeditor_standard1" name="long_description_ar">@if($properties){{ $properties->long_description_ar }} @endif</textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Location / Address</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="location" value="@if($properties){{ $properties->location }} @endif"
                                       placeholder="Enter Location of property" id="txtAutocomplete"  />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Featured Property</label>
                            <div class="col-md-9">

                                <label class="radio-inline " for="example-inline-radio1">
                                    <input type="radio" id="example-inline-radio1"  name="featured" value="1" @if($properties) @if($properties->featured==1) checked @endif @endif>YES</label>
                                <label class="radio-inline" for="example-inline-radio2">
                                    <input type="radio" id="example-inline-radio2" name="featured" value="0" @if($properties) @if($properties->featured==0) checked @endif @endif>NO</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Recent Property</label>
                            <div class="col-md-9">
                                <label class="radio-inline " for="example-inline-radio1">
                                    <input type="radio" id="example-inline-radio1" name="recent" value="1" @if($properties) @if($properties->recent==1) checked @endif @endif>YES</label>
                                <label class="radio-inline" for="example-inline-radio2">
                                    <input type="radio" id="example-inline-radio2" name="recent" value="0" @if($properties) @if($properties->recent==0) checked @endif @endif>NO</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Completed Property</label>
                            <div class="col-md-9">
                                <label class="radio-inline " for="example-inline-radio1">
                                    <input type="radio" id="example-inline-radio1" name="completed" value="1" @if($properties) @if($properties->completed==1) checked @endif @endif>YES</label>
                                <label class="radio-inline" for="example-inline-radio2">
                                    <input type="radio" id="example-inline-radio2" name="completed" value="0" @if($properties) @if($properties->completed==0) checked @endif @endif>NO</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ongoing Property</label>
                            <div class="col-md-9">
                                <label class="radio-inline " for="example-inline-radio1">
                                    <input type="radio" id="example-inline-radio1" name="ongoing" value="1" @if($properties) @if($properties->ongoing==1) checked @endif @endif>YES</label>
                                <label class="radio-inline" for="example-inline-radio2">
                                    <input type="radio" id="example-inline-radio2" name="ongoing" value="0" @if($properties) @if($properties->ongoing==0) checked @endif @endif>NO</label>
                            </div>
                        </div>

                        <div class="form-group striped-col">
                            <label class="col-md-3 control-label" for="example-select">Property type</label>
                            <div class="col-md-4">
                                <select id="example-select" name="project_type_id" class="form-control" size="1">
                                    <option value="0">Select Property type</option>
                                    @foreach($categories as $category)
                                    <?php
                                    $class = ""
                                    ?>
                                    @if($properties)
                                    @if($properties->property_type==$category->id)
                                    <?php $class = "selected"; ?>	
                                    @endif
                                    @endif
                                    <option <?php echo $class; ?> value="{!! $category->id !!}">{!! $category->title_en !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Total Appartments</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="total_apartment" value="@if($properties){{ $properties->total_apartment }} @endif"
                                       placeholder="Enter total appartments"  />
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label hidden-xs">Building Height (English)</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="building_height" value="@if($properties){{ $properties->building_height }} @endif"
                                       placeholder="Enter building height"  />
                            </div>
                        </div>

                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label hidden-xs">Building Height (Arebic)</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="building_height_ar" value="@if($properties){{ $properties->building_height_ar }} @endif"
                                       placeholder="Enter building height"  />
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Video URL</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="video_url" 
                                       value="@if($properties){{ $properties->video_url }} @endif" 
                                       placeholder="Enter property video url"  />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Latitude</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="latitude" 
                                       value="@if($properties){{ $properties->latitude }} @endif" 
                                       placeholder="Latitude"  />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Longitude</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="longitude" 
                                       value="@if($properties){{ $properties->longitude }} @endif" 
                                       placeholder="Longitude"  />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">360 View</label>
                            <div class="col-md-4">
                                <input type="url" class="form-control" name="views_360" 
                                       value="@if($properties){{ $properties->views_360 }} @endif" 
                                       placeholder="360 View"  />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">AMENITIES</label>
                            <div class="col-md-9">
                                @foreach($aminities as $aminity)
                                <?php
                                $class = ""
                                ?>
                                <div class="col-md-3">
                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
                                        @if($selectedaminities)
                                        @foreach($selectedaminities as $selectedaminity)
                                        @if($aminity->id==$selectedaminity->aminity_id)
                                        <?php
                                        $class = "checked"
                                        ?>
                                        @endif
                                        @endforeach
                                        @endif
                                        <input type="checkbox" id="example-inline-checkbox1" name="aminity_id[]" <?php echo $class ?> value="{!! $aminity->id !!}">
                                        {!! $aminity->title_en !!}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">AVAILABLE UNITS</label>
                            <div class="col-md-9">
                                @foreach($units as $unit)
                                <?php
                                $class = ""
                                ?>
                                <div class="col-md-3">
                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
                                        @if($selectedunits)
                                        @foreach($selectedunits as $selectedunit)
                                        @if($unit->id==$selectedunit->unit_id)
                                        <?php
                                        $class = "checked"
                                        ?>
                                        @endif
                                        @endforeach
                                        @endif
                                        <input type="checkbox" id="example-inline-checkbox1" name="unit_id[]" <?php echo $class ?> value="{!! $unit->id !!}">
                                        {!! $unit->title_en !!}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Enquire Phone Number</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="enquire_call_us" value="@if($properties){{ $properties->enquire_call_us }} @endif"
                                       placeholder="Enter enquire phone number"  />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Enquire Address</label>
                            <div class="col-md-4">
                                <textarea class="form-control" name="enquire_address" rows="2">@if($properties){{ $properties->enquire_address }} @else {{ old('short_description_en') }} @endif</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Enquire Email</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="enquire_email" value="@if($properties){{ $properties->enquire_email }} @endif"
                                       placeholder="Enter enquire email"  />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label hidden-xs">Sort Order</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="sort_order" value="@if($properties){{ $properties->sort_order }} @else{{ 0 }}@endif"
                                       placeholder="Sort Order"  />
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-md-3 control-label hidden-xs">Meta Title</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="meta_title">@if($properties){{ $properties->meta_title }}@endif</textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-md-3 control-label hidden-xs">Meta keyword</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="meta_keyword">@if($properties){{ $properties->meta_keyword }}@endif</textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-md-3 control-label hidden-xs">Meta Description</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="meta_desc">@if($properties){{ $properties->meta_desc }}@endif</textarea>
                            </div>
                        </div>	

                        <div class="form-group">
                            <label class="col-md-3 control-label" name="description">Brochure Upload Document/Image: For download brochure<br><br> </label>
                            <div class="col-md-8">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>

                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image1"></span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label" name="description">Upload Floor Plans Document/Image: For download floor plan<br><br> </label>
                            <div class="col-md-8">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>

                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="doc"></span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
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
                        <input type="hidden" name="type" value="@if($type){{$type}}@endif">
                        <input type="hidden" name="id" value="@if($type=="edit"){{ $properties->id }}@endif">
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
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJUBn23HnarOGe1LJlDC9DScN_AKe92LY&libraries=places"
></script>
<script type="text/javascript">
                                google.maps.event.addDomListener(window, 'load', initialize);
                                function initialize() {
                                    var autocomplete = new google.maps.places.Autocomplete(document.getElementById('txtAutocomplete'));
                                    google.maps.event.addListener(autocomplete, 'place_changed', function () {
// Get the place details from the autocomplete object.
                                        var place = autocomplete.getPlace();
                                        document.getElementById("latitude").value = place.geometry.location.lat();
                                        document.getElementById("longitude").value = place.geometry.location.lng();

                                    });
                                }
</script>

@stop
