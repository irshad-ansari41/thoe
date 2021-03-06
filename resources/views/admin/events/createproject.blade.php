@extends('admin/layouts/default')

{{-- page level styles --}}
@section('header_styles')

<link href="<?= asset('assets/css/pages/form2.css') ?>" rel="stylesheet"/>
<link href="<?= asset('assets/css/pages/form3.css') ?>" rel="stylesheet"/>
<link href="<?= asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') ?>" rel="stylesheet"/>
<link href="<?= asset('assets/vendors/intl-tel-input/build/css/intlTelInput.css') ?>" rel="stylesheet"/>
<link href="<?= asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') ?>" rel="stylesheet"/>
<link href="<?= asset('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') ?>"  rel="stylesheet" media="screen"/>
<link href="<?= asset('assets/css/pages/editor.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?= asset('assets/css/pages/buttons.css') ?>" rel="stylesheet"/>
<link href="<?= asset('assets/css/timepicki.css') ?>" rel="stylesheet">
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<style>
    input.timepicki-input
    {
        padding-bottom:0px;
    }
</style>
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <h1>Event</h1>
</section>
<!--section ends-->
<section class="content">
    <!--main content-->
    <div class="row">
        <div class="col-md-12">
            @includeIf('admin.common.errors')

            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
                @endforeach
            </div>

            <!--image upload -->
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div style="float:left;width:70%;">
                        <h3 class="panel-title">
                            @if($type=="edit")
                            Edit Event
                            @else   
                            Add Event
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

                        <div class="row form-group en_field">

                            <div class="col-md-4">
                                <label >Title(English) </label><br/>
                                <input type="text" class="form-control" name="event_title" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)" 
                                       placeholder="" value="{{ !empty($project->event_title_en)?$project->event_title_en : old('event_title_en') }}" />
                            </div>
                            <div class="col-md-4">
                                <label >Slug(English)</label>
                                <textarea id="slug-text" class="form-control" name="slug">{{ !empty($project)?$project->slug: old('slug') }}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label >Title(Arabic) </label>
                                <input type="text" class="form-control" name="event_title_ar"
                                       placeholder="" value="{{ !empty($project->event_title_ar)?$project->event_title_ar: old('event_title_ar') }}" />
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-3">
                                <label  >Thumbnail photo (English) </label><br>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                        <img src="{{asset('assets/images/events')}}/{{ !empty($project->event_photo_en)?$project->event_photo_en:'100-blank-img.jpg' }}" height="190" width="190" /> </div>
                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image" ></span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <label  >Thumbnail photo (Arabic) </label><br>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                        <img src="{{asset('assets/images/events')}}/{{!empty($project->event_photo_ar)?$project->event_photo_ar:'100-blank-img.jpg'}}" height="190" width="190" /> </div>
                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">Select</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image_ar"></span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <?php
                            $images_en = !empty($project->event_main_photo_en) ? explode(',', $project->event_main_photo_en) : [];
                            for ($i = 0; $i <= 3; $i++) {
                                ?>
                                <div class="col-md-3">
                                    <label >Main Photo (English) <?= $i + 1 ?> </label><br>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                            <?php if (!empty($images_en[$i])) { ?> 
                                                <img src="<?= asset('assets/images/events') ?>/<?= $images_en[$i] ?>" height="190" width="190" /> 
                                            <?php } ?>
                                        </div>
                                        <div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileinput-new">Select</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type=file name="event_main_photo_en_<?= $i ?>"></span>
                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="row form-group">
                            <?php
                            $images_ar = !empty($project->event_main_photo_ar) ? explode(',', $project->event_main_photo_ar) : [];
                            for ($i = 0; $i <= 3; $i++) {
                                ?>
                                <div class="col-md-3">
                                    <label >Main Photo (Arabic) <?= $i + 1 ?></label><br>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                            <?php if (!empty($images_ar[$i])) { ?> 
                                                <img src="<?= asset('assets/images/events') ?>/<?= $images_ar[$i] ?>" height="190" width="190" /> 
                                            <?php } ?>
                                        </div>
                                        <div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileinput-new">Select</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type=file name="event_main_photo_ar_<?= $i ?>"></span>
                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>


                        <div class="row form-group en_field">
                            <div class="col-md-6"><label  name="">Short Description(English) </label><br/>
                                <textarea id="" class="form-control"  name="extra_desc_en" rows="5">{{ !empty($project->extra_desc_en)?$project->extra_desc_en: old('extra_desc_en') }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label  name="">Short Description(Arabic) </label><br/>
                                <textarea id="" class="form-control"  name="extra_desc_ar" rows="5">{{ !empty($project->extra_desc_ar)?$project->extra_desc_ar: old('extra_desc_ar') }}</textarea>
                            </div>
                        </div>



                        <div class="row form-group en_field">
                            <div class="col-md-6">
                                <label  name="">Long Description(English) </label><br/>
                                <textarea id="ckeditor_standard" name="long_desc_en">{{ !empty($project->long_desc_en)?$project->long_desc_en: old('long_desc_en') }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label  name="">Long Description(Arabic) </label><br/>
                                <textarea id="ckeditor_standard1" name="long_desc_ar">{{ !empty($project->long_desc_ar)?$project->long_desc_ar: old('long_desc_ar') }}</textarea>
                            </div>
                        </div>


                        <div class="form-group en_field">
                            <label class="col-md-3 control-label ">Starting From</label>
                            <div class="col-md-2">
                                <select class="form-control" name="currency_type">
                                    <option value="">--</option>
                                    <option value="AED" <?= !empty($project->currency_type) && $project->currency_type == "AED" ? 'selected' : '' ?>>AED</option>
                                    <option value="£" <?= !empty($project->currency_type) && $project->currency_type == "£" ? 'selected' : '' ?>  >£</option>
                                    <option value="$" <?= !empty($project->currency_type) && $project->currency_type == "$" ? 'selected' : '' ?>  >$</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input id="" value="{{ !empty($project->starting_from)?$project->starting_from: old('starting_from') }}" type="text" class="form-control" name="starting_from">
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label ">Booking Fees</label>

                            <div class="col-md-8">
                                <input id="" value="{{ !empty($project->booking_fees)?$project->booking_fees: old('booking_fees') }}" type="text" class="form-control" name="booking_fees">
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label ">Payment Plan(English)</label>

                            <div class="col-md-8">
                                <input id="" value="{{ !empty($project->payment_plan)?$project->payment_plan: old('payment_plan') }}" type="text" class="form-control" name="payment_plan">
                            </div>
                        </div>

                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label ">Payment Plan(Arabic)</label>
                            <div class="col-md-8">
                                <input id="" value="{{ !empty($project->payment_plan_ar)?$project->payment_plan_ar: old('payment_plan_ar') }}" type="text" class="form-control" name="payment_plan_ar">
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label ">Mortgage Starting</label>
                            <div class="col-md-8">
                                <input id="" value="{{ !empty($project->mortgage_starting)?$project->mortgage_starting: old('mortgage_starting') }}" type="text" class="form-control" name="mortgage_starting">
                            </div>
                        </div>
                        <div class="form-group en_field">
                            <label class="col-md-3 control-label" name="">Visit Us (English) </label>
                            <div class="col-md-8">
                                <textarea id="" class="form-control"  name="visit_us_at">{{ !empty($project->visit_us_at_en)?$project->visit_us_at_en: old('visit_us_at') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group en_field">
                            <label class="col-md-3 control-label" name="">Visit Us (Arabic) </label>
                            <div class="col-md-8">
                                <textarea id="" class="form-control"  name="visit_us_at_ar">{{ !empty($project->visit_us_at_ar)?$project->visit_us_at_ar: old('visit_us_at_ar') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label ">Event Date</label>

                            <div class="col-md-7">
                                <input id="date" value="{{ !empty($project->event_date)?$project->event_date: old('date') }} " type="text" class="form-control" name="date">
                            </div>
                            <div class="col-md-1">
                                <input id="symbols" value="{{ !empty($project->symbols)?$project->symbols: old('symbols') }} " type="text" class="form-control" name="symbols">
                            </div>                            
                        </div>
                        <div class="form-group en_field">
                            <label class="col-md-3 control-label ">Last Day For Event</label>

                            <div class="col-md-8">
                                <input id="date1" value="{{ !empty($project->levent_date)?$project->levent_date: old('ldate') }} " type="text" class="form-control" name="ldate">
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-3 control-label ">Event Start Time</label>
                            <div class="col-md-8">
                                <input id="timepicker1" value="{{ !empty($project->event_start_time)?$project->event_start_time: old('event_start_time') }} " type="text" class="form-control" name="event_start_time" style="padding-bottom:0px;">
                            </div>
                        </div>
                        <div class="form-group en_field">
                            <label class="col-md-3 control-label ">Event End Time</label>
                            <div class="col-md-8">
                                <input id="timepicker2"  value="{{ !empty($project->event_end_time)?$project->event_end_time: old('event_end_time') }} " type="text" class="form-control" name="event_end_time" style="padding-bottom:0px;">
                            </div>
                        </div>
                        <div class="form-group en_field">
                            <label class="col-md-3 control-label ">Event Location (English)</label>

                            <div class="col-md-8">
                                <input id="" value="{{ !empty($project->event_location_en)?$project->event_location_en: old('event_location') }}" type="text" class="form-control" name="event_location">
                            </div>
                        </div>

                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label ">Event Location (Arabic)</label>

                            <div class="col-md-8">
                                <input id="" value="{{ !empty($project->event_location_ar)?$project->event_location_ar: old('event_location_ar') }}" type="text" class="form-control" name="event_location_ar">
                            </div>
                        </div>



                        <div class="form-group en_field">
                            <label class="col-md-3 control-label ">Event Place (English)</label>

                            <div class="col-md-8">
                                <input id="" value="{{ !empty($project->event_place_en)?$project->event_place_en: old('event_place') }}" type="text" class="form-control" name="event_place">
                            </div>
                        </div>

                        <div class="form-group ar_field">
                            <label class="col-md-3 control-label ">Event Place (Arabic)</label>

                            <div class="col-md-8">
                                <input id="" value="{{ !empty($project->event_place_ar)?$project->event_place_ar:old('event_place_ar') }}" type="text" class="form-control" name="event_place_ar">
                            </div>
                        </div>

                        <div class="form-group en_field">
                            <label class="col-md-1 control-label hidden-xs">Youtube URL</label>
                            <div class="col-md-11">
                                <input type="text" name="youtube" class="form-control" value="<?= $project ? $project->youtube : '' ?>">
                            </div>
                        </div>


                        <div class="form-group ">
                            <label class="col-md-3 control-label ">Meta keyword</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="meta_keyword">{{ !empty($project->meta_keyword)?$project->meta_keyword: old('meta_keyword') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-md-3 control-label ">Meta Description</label>

                            <div class="col-md-8">
                                <textarea class="form-control" name="meta_desc">{{ !empty($project->meta_desc)?$project->meta_desc: old('meta_desc') }}</textarea>
                            </div>
                        </div>  

                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-8">
                                <button type="submit" class="btn btn-primary"><?= $type == "add" ? 'Submit' : 'Update' ?></button>
                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?= url('/admin/events') ?>" class="btn btn-danger">Back</a>
                            </div>
                        </div>

                        <input type="hidden" id="form_lang" name="form_lang" value="1">
                        <input type="hidden" name="type" value="<?= $type ?>">
                        <input type="hidden" name="id" value="<?= $type == "edit" ? $project->id : '' ?>">
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

<script src="<?= asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') ?>"type="text/javascript"></script>
<script src="<?= asset('assets/js/pages/validation.js') ?>" type="text/javascript"></script>
<script src="<?= asset('assets/vendors/tinymce/tinymce.min.js') ?>" type="text/javascript"></script>
<script  src="<?= asset('assets/vendors/ckeditor/js/ckeditor.js') ?>"  type="text/javascript"></script>
<script  src="<?= asset('assets/vendors/ckeditor/js/jquery.js') ?>"  type="text/javascript" ></script>
<script  src="<?= asset('assets/vendors/ckeditor/js/config.js') ?>"  type="text/javascript"></script>
<script  src="<?= asset('assets/js/pages/editor.js') ?>"  type="text/javascript"></script>
<script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
<script src="<?= asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') ?>" ></script>
<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/js/timepicki.js') ?>"></script>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

                                    CKEDITOR.replace('ckeditor_standard');
                                    CKEDITOR.replace('ckeditor_standard1');
                                    CKEDITOR.replace('ckeditor_standard2');

                                    jQuery(function () {
                                        jQuery("#date").datepicker({
                                            dateFormat: "yy-mm-dd"
                                        });
                                    });
</script>
<script>
    $('#timepicker1').timepicki();
    $('#timepicker2').timepicki();

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
@stop
