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
<style>select[multiple], select[size]{height:30px!important}</style>
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

                        <div class="col-md-12">
                            <label class="control-label" for="example-select">Project (Area)</label>
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





                        <div class="col-md-12">
                            <label class="control-label">Property Name (English)</label>
                            <input type="text" class="form-control" name="title_en" value="@if($properties){{ $properties->title_en }} @endif"
                                   placeholder="Enter property name"  />
                        </div>

                        <div class="col-md-12">
                            <label class="control-label">Slug</label>
                            <textarea class="form-control" name="slug">@if($properties){{ $properties->slug }}@endif</textarea>
                        </div>

                        <div class="col-md-12">
                            <label class=" control-label hidden-xs">Property Name (Arabic)</label>
                            <input type="text" class="form-control"  name="title_ar" value="@if($properties){{ $properties->title_ar }} @endif"
                                   placeholder="Enter property name" />
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label" name="description">Property Holder Image <br><br> </label>
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

                            <div class="col-md-3">
                                <label class="control-label" name="description">Property Header Banner <br><br> </label>
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

                            <div class="col-md-3">
                                <label class="control-label" name="description">Construction Header Banner <br><br> </label>
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

                            <div class="col-md-3">
                                <label class="control-label" name="description">Property Footer Banner <br><br> </label>
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
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label hidden-xs">Property Holder Alt</label>
                                <input type="text" class="form-control" name="holder_alt"
                                       placeholder="Enter alt" value="@if($properties){{ $properties->holder_alt }} @endif" />
                            </div>

                            <div class="col-md-6">
                                <label class="control-label hidden-xs">Property Header Banner Alt</label>
                                <input type="text" class="form-control" name="header_alt"
                                       placeholder="Enter alt" value="@if($properties){{ $properties->header_alt }} @endif" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label hidden-xs">Construction Header Banner Alt</label>
                                <input type="text" class="form-control" name="construction_alt"
                                       placeholder="Enter alt" value="@if($properties){{ $properties->construction_alt }} @endif" />
                            </div>
                            <div class="col-md-6">
                                <label class="control-label hidden-xs">Property Footer Banner Alt</label>
                                <input type="text" class="form-control" name="footer_alt"
                                       placeholder="Enter alt" value="@if($properties){{ $properties->footer_alt }} @endif" />
                            </div>
                        </div>


                        <div class="col-md-12">
                            <label class="control-label hidden-xs">Footer Banner Link</label>
                            <input type="text" class="form-control" name="footer_banner_link"
                                   value="@if($properties){{ $properties->footer_banner_link }} @endif" placeholder="Enter banner link" />
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label hidden-xs">Short Description (English)</label>
                                <textarea class="form-control" name="short_description_en" rows="4">@if($properties){{ $properties->short_description_en }} @else {{ old('short_description_en') }} @endif</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label hidden-xs">Short Description (Arabic)</label>
                                <textarea class="form-control" name="short_description_ar" rows="4">@if($properties){{ $properties->short_description_ar }} @else {{ old('short_description_ar') }} @endif</textarea>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label" name="">Long Description (English)</label>
                                <textarea id="ckeditor_standard" name="long_description_en">@if($properties){{ $properties->long_description_en }} @endif</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label" name="">Long Description (Arabic)</label>
                                <textarea id="ckeditor_standard1" name="long_description_ar">@if($properties){{ $properties->long_description_ar }} @endif</textarea>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-3">
                                <label class=" control-label">Featured Property</label><br/>
                                <label class="radio-inline " for="example-inline-radio1">
                                    <input type="radio" id="example-inline-radio1"  name="featured" value="1" @if($properties) @if($properties->featured==1) checked @endif @endif>YES</label>
                                <label class="radio-inline" for="example-inline-radio2">
                                    <input type="radio" id="example-inline-radio2" name="featured" value="0" @if($properties) @if($properties->featured==0) checked @endif @endif>NO</label>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Recent Property</label><br/>
                                <label class="radio-inline " for="example-inline-radio1">
                                    <input type="radio" id="example-inline-radio1" name="recent" value="1" @if($properties) @if($properties->recent==1) checked @endif @endif>YES</label>
                                <label class="radio-inline" for="example-inline-radio2">
                                    <input type="radio" id="example-inline-radio2" name="recent" value="0" @if($properties) @if($properties->recent==0) checked @endif @endif>NO</label>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Completed Property</label><br/>
                                <label class="radio-inline " for="example-inline-radio1">
                                    <input type="radio" id="example-inline-radio1" name="completed" value="1" @if($properties) @if($properties->completed==1) checked @endif @endif>YES</label>
                                <label class="radio-inline" for="example-inline-radio2">
                                    <input type="radio" id="example-inline-radio2" name="completed" value="0" @if($properties) @if($properties->completed==0) checked @endif @endif>NO</label>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Ongoing Property</label><br/>
                                <label class="radio-inline " for="example-inline-radio1">
                                    <input type="radio" id="example-inline-radio1" name="ongoing" value="1" @if($properties) @if($properties->ongoing==1) checked @endif @endif>YES</label>
                                <label class="radio-inline" for="example-inline-radio2">
                                    <input type="radio" id="example-inline-radio2" name="ongoing" value="0" @if($properties) @if($properties->ongoing==0) checked @endif @endif>NO</label>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label" for="example-select">Property type</label>
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
                            <div class="col-md-4">
                                <label class="control-label hidden-xs">Building Height (English)</label>
                                <input type="text" class="form-control" name="building_height" value="@if($properties){{ $properties->building_height }} @endif"
                                       placeholder="Enter building height"  />
                            </div>
                            <div class="col-md-4">
                                <label class="control-label hidden-xs">Total Apartments</label>
                                <input type="text" class="form-control" name="total_apartment" value="@if($properties){{ $properties->total_apartment }} @endif"
                                       placeholder="Enter total appartments"  />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label hidden-xs">Video URL</label>
                                <input type="text" class="form-control" name="video_url" 
                                       value="@if($properties){{ $properties->video_url }} @endif" 
                                       placeholder="Enter property video url"  />
                            </div>
                            <div class="col-md-6">
                                <label class="control-label hidden-xs">360 View</label>
                                <input type="url" class="form-control" name="views_360" 
                                       value="@if($properties){{ $properties->views_360 }} @endif" 
                                       placeholder="360 View"  />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="control-label hidden-xs">Location / Address</label>
                                <input type="text" class="form-control" name="location" value="@if($properties){{ $properties->location }} @endif"
                                       placeholder="Enter Location of property" id="txtAutocomplete"  />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label hidden-xs">Latitude</label>
                                <input type="text" class="form-control" name="latitude" 
                                       value="@if($properties){{ $properties->latitude }} @endif" 
                                       placeholder="Latitude"  />
                            </div>
                            <div class="col-md-6">
                                <label class="control-label hidden-xs">Longitude</label>
                                <input type="text" class="form-control" name="longitude" 
                                       value="@if($properties){{ $properties->longitude }} @endif" 
                                       placeholder="Longitude"  />
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-12">
                                <label class="control-label">AMENITIES</label><br/>
                                @foreach($aminities as $aminity)
                                <?php
                                $class = ""
                                ?>
                                <div class="col-md-3">
                                    @if($selectedaminities)
                                    @foreach($selectedaminities as $selectedaminity)
                                    @if($aminity->id==$selectedaminity->aminity_id)
                                    <?php
                                    $class = "checked"
                                    ?>
                                    @endif
                                    @endforeach
                                    @endif
                                    <label class="checkbox-inline mar-left5">
                                        <input type="checkbox" name="aminity_id[]" <?php echo $class ?> value="{!! $aminity->id !!}">
                                        {!! $aminity->title_en !!}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="control-label">AVAILABLE UNITS</label><br/>
                                @foreach($units as $unit)
                                <?php
                                $class = ""
                                ?>
                                <div class="col-md-3">

                                    @if($selectedunits)
                                    @foreach($selectedunits as $selectedunit)
                                    @if($unit->id==$selectedunit->unit_id)
                                    <?php
                                    $class = "checked"
                                    ?>
                                    @endif
                                    @endforeach
                                    @endif
                                    <label class="checkbox-inline mar-left5">
                                        <input type="checkbox" name="unit_id[]" <?php echo $class ?> value="{!! $unit->id !!}">
                                        {!! $unit->title_en !!}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                $extra_details = unserialize($properties['extra_details']);
                                ?>
                                <label class="control-label hidden-xs">Extra Details</label>
                                <table border="1" style="border-collapse:collapse;width: 100%" cellpadding=5 cellspacing=5>
                                    <thead><tr><td style="width:200px"><label>Key Name</label></td><td style="width:200px"><label>Value</label></td><td><label>Icon</label></td></tr></thead>
                                    <tbody>
                                        <?php for ($i = 0; $i <= 6; $i++) { ?>
                                            <tr>
                                                <td><input type="text" class="form-control" placeholder="Key" name="extra_details[<?= $i ?>][key]" 
                                                           value="<?= $extra_details[$i]['key'] ?>" ></td>
                                                <td><input type="text" class="form-control" placeholder="Value" name="extra_details[<?= $i ?>][value]" 
                                                           value="<?= $extra_details[$i]['value'] ?>"></td>
                                                <td><input type="text" class="form-control" placeholder="Icon" name="extra_details[<?= $i ?>][icon]" 
                                                           value="<?= htmlspecialchars($extra_details[$i]['icon']) ?>"></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label hidden-xs">Sort Order</label>
                                <input type="number" class="form-control" name="sort_order" value="@if($properties){{ $properties->sort_order }} @else{{ 0 }}@endif"
                                       placeholder="Sort Order"  />
                            </div>
                            <div class="col-md-4">
                                <label class="control-label hidden-xs">Enquire Phone Number</label>
                                <input type="text" class="form-control" name="enquire_call_us" value="@if($properties){{ $properties->enquire_call_us }} @endif"
                                       placeholder="Enter enquire phone number"  />
                            </div>
                            <div class="col-md-4">
                                <label class="control-label hidden-xs">Enquire Email</label>
                                <input type="text" class="form-control" name="enquire_email" value="@if($properties){{ $properties->enquire_email }} @endif"
                                       placeholder="Enter enquire email"  />
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <label class=" control-label hidden-xs">Enquire Address</label>
                                <textarea class="form-control" name="enquire_address" rows="2">@if($properties){{ $properties->enquire_address }} @else {{ old('short_description_en') }} @endif</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="control-label hidden-xs">Meta Title</label>
                                <textarea class="form-control" name="meta_title">@if($properties){{ $properties->meta_title }}@endif</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="control-label hidden-xs">Meta keyword</label>
                                <textarea class="form-control" name="meta_keyword">@if($properties){{ $properties->meta_keyword }}@endif</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="control-label hidden-xs">Meta Description</label>
                                <textarea class="form-control" name="meta_desc">@if($properties){{ $properties->meta_desc }}@endif</textarea>
                            </div>
                        </div>	



                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label" name="description">Brochure Upload Document/Image: For download brochure </label><br><br>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                        <?php
                                        $brochures = glob(PUBLIC_PATH . '/assets/images/properties' . "/{$selectedprojects->gallery_location}/{$properties->gallery_location}/brochures/*");
                                        echo!empty($brochures) ? "<iframe src='" . str_replace(PUBLIC_PATH, SITE_URL, $brochures[0]) . "' height=190 width=190></iframe>" : '';
                                        ?>
                                    </div>

                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image1"></span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label" name="description">Upload Floor Plans Document/Image: For download floor plan </label><br><br>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                        <?php
                                        $floorplans = glob(PUBLIC_PATH . '/assets/images/properties' . "/{$selectedprojects->gallery_location}/{$properties->gallery_location}/floor-plans/*");
                                        echo!empty($floorplans) ? "<iframe src='" . str_replace(PUBLIC_PATH, SITE_URL, $brochures[0]) . "' height=190 width=190></iframe>" : '';
                                        ?>
                                    </div>

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

                        <br/><br/>

                        <div class="row">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary btn-block">
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


                                $(document).ready(function () {
                                    $(".add-row").click(function () {
                                        var name = $("#name").val();
                                        var email = $("#email").val();
                                        var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + name + "</td><td>" + email + "</td></tr>";
                                        $("table tbody").append(markup);
                                    });

                                    // Find and remove selected table rows
                                    $(".delete-row").click(function () {
                                        $("table tbody").find('input[name="record"]').each(function () {
                                            if ($(this).is(":checked")) {
                                                $(this).parents("tr").remove();
                                            }
                                        });
                                    });
                                });

</script>

@stop
