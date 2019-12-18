
@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<!-- Owl car -->
<link rel="stylesheet" href="{{asset('assets/owlcarousel/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/owlcarousel/owl.theme.default.min.css')}}">
<!-- End -->

<!-- Live chat -->
<!--<script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="https://mylivechat.com/chatinline.aspx?hccid=17242661"></script>-->

<!-- Slide show gallery -->
<link href="{{asset('assets/gallery-slideshow/css/jquery.desoslide.min.css')}}" rel="stylesheet">
<!-- End -->

<!-- Slider gallery -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/slider-vertical/dist/css/slider-pro.min.css')}}" media="screen"/>
<link rel="stylesheet" type="text/css" href="{{asset('assets/slider-vertical/css/examples.css')}}" media="screen"/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet" type="text/css">

<script type="text/javascript" src="{{asset('assets/slider-vertical/libs/jquery-1.11.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/slider-vertical/dist/js/jquery.sliderPro.min.js')}}"></script>
<!-- script src='https://www.google.com/recaptcha/api.js'></script -->
<script type="text/javascript">
$(document).ready(function ($) {
    $('#example3').sliderPro({
        width: 960,
        height: 500,
        fade: true,
        arrows: true,
        buttons: false,
        fullScreen: true,
        shuffle: true,
        smallSize: 500,
        mediumSize: 1000,
        largeSize: 3000,
        thumbnailArrows: true,
        autoplay: false
    });
});
</script>
<!-- End -->


<style>
    p{line-height:1.714;font-weight:100}
    .modal-body{padding:5px;width:100%;border:1px solid #e6e6e6;margin-bottom:0}

    .btn-enquire{top:20em;z-index:99}
    .modal-overlay{opacity:.9!important;z-index:999!important}
    .book-now .select-wrapper input.select-dropdown{position:relative;cursor:pointer;background-color:transparent;border:none!important;border-bottom:1px solid #9e9e9e;outline:none;height:auto;line-height:inherit}
    .form-group input{padding:5px!important;width:90%!important;border:1px solid #e6e6e6!important;margin-bottom:0!important}
    .form-group label{font-size:13px;color:#7b7b7b;font-weight:400}
    .bv-form .help-block{margin-bottom:0}
    .bv-form .tooltip-inner{text-align:left}
    .nav-tabs li.bv-tab-success>a{color:#3c763d}
    .nav-tabs li.bv-tab-error>a{color:#a94442}
    .bv-form .bv-icon-no-label{top:0}
    .bv-form .bv-icon-input-group{top:0;z-index:100}
    .has-error .help-block,.has-error .control-label,.has-error .radio,.has-error .checkbox,.has-error .radio-inline,.has-error .checkbox-inline{color:#a94442;display:inline-block}
    .project-detail{margin-top:0!important}
    .FRMBOX{margin-top:30px}
    .MyFrmGpbtn{padding:15px 0 30px 20px;width:50%}
    .MyFrmGp{padding:0 15px}
    .frmnbtn{background:#000;color:#fff;cursor:pointer;font-weight:700;text-transform:uppercase;letter-spacing:2px;transition-duration:.4s;margin-left:0;font-family:'Lato',sans-serif;font-size:13px}
    .MyFrmGpbtn{padding:15px 0 30px 20px;width:50%}
    .FrmLbls{color:#989898!important;font-size:13px!important;letter-spacing:1px!important;font-family:'Lato',sans-serif!important}
    .Frminput{height:26px!important;border-radius:1px!important}
    .Frmselect{height:35px}
    .select-wrapper input.select-dropdown{line-height:26px!important;border-radius:1px!important;font-size:13px;font-weight:700;padding-left:15px;color:#666!important}
    .select-wrapper span.caret{display:none}
    ::-webkit-input-placeholder{font-size:13px;font-weight:700;padding-left:15px;color:#666}
    :-moz-placeholder{font-size:13px;font-weight:700;padding-left:15px;color:#666}
    :-ms-input-placeholder{font-size:13px;font-weight:700;padding-left:15px;color:#666}
    .ERS{color:red;font-weight:700}
    .lead_lang{width:20px!important;height:20px!important;display:inline;vertical-align:middle;padding:0!important;margin:3px 0!important;opacity:1!important;position:unset!important}
    .az-btn1{min-width:8rem!important;} 

    @media screen and (min-width: 769px){
        .enq-now{display: none;}
        .az-btns{ display: none;}
    }
    @media screen and (max-width: 768px){
        .mobileds{display: none;}
        .enq-now{display: none;}
    }
    #stick-form{background:rgba(21, 88, 149, 0.8) !important;height: 330px;padding: 10px 0px;border:2px solid #dadada;position: absolute;right: 35px;top:35px}
    .modal{background-color: #fff;}

</style>

@stop

@section('main_div_wrapper')
@stop

@section('section_content')

<!-- Header banner -->

<?php
$imagepath = '';
?>
<section class="az-section">

    <div class="container">

        <div class="parallax-container valign-wrapper">
            <div class="parallax">
                <?php if ($property->header_image != "") { ?>
                    <img alt="{!!  trim($property->header_alt) !!}" src="{{ asset('assets/images/properties/') }}/{{ $project->gallery_location }}/{{ $property->gallery_location }}/{{ $property->header_image }}">
                <?php } else { ?>
                    <img alt="{!! trim($property->header_alt) !!}" src="<?=SITE_URL?>/public/assets/images/projects/15126440201188405583.jpg">                 
                <?php } ?>
            </div>


            <div class="col s12 center-align card tag-pro">
                <h1>{{showTextByLocale($locale,[$property->title_en,$property->title_ar,$property->title_ch])}} </h1>
                <?php if (trim($property->slug) == "Thoe Victoria" || trim($property->slug) == "عزيزي فيكتوريا") { ?>
                    <p><i class="ion ion-ios-location-outline" style="font-weight: 900;"></i> {{trans('words.MEYDAN')}}</p>
                <?php } else { ?>
                    <p><i class="ion ion-ios-location-outline" style="font-weight: 900;"></i> {{showTextByLocale($locale,[$project->title_en,$project->title_ar,$project->title_ch])}}</p>
                <?php } ?>

            </div>

            <div id='stick-form' class="mobileds">
                <h5 class="info-color white-text text-center" style="text-transform: uppercase; font-size: 24px!important; text-align: center; margin: 10px;display: block;">
                    <strong>ENQUIRE NOW</strong>
                </h5> 
                <iframe src="<?=SITE_URL?>/<?= $locale ?>/lead-form" class="iframe-lead-form" border="0" style="width:349px;height:330px;border:none;" scrolling="No"></iframe>                             
            </div>

        </div>

        <div class="row m0">
            <div class="col s12 p0">
                <div class="col l9 xl9 p0" <?= $locale == 'ar' ? "style=float:right;" : '' ?> >
                    <?php
                    if ($locale == 'en') {
                        $links = [
                            url("$locale") => trans('words.home'),
                            url("$locale/dubai") => trans('words.Projects'),
                        ];
                        if (in_array($project->slug, ['victoria', 'riviera', 'avenue'])) {
                            $links[url("$locale/dubai/meydan")] = trans('words.MEYDAN');
                        }
                        $links[url("$locale/dubai/meydan/{$project->slug}")] = $project->title_en;
                        $links[''] = $property->title_en;
                    } elseif ($locale == 'ar') {
                        $links = [
                            url("$locale") => trans('words.home'),
                            url("$locale/dubai") => trans('words.Projects'),
                        ];
                        if (in_array($project->slug, ['victoria', 'riviera', 'avenue'])) {
                            $links[url("$locale/dubai/meydan")] = trans('words.MEYDAN');
                        }
                        $links[url("$locale/dubai/meydan/{$project->slug}")] = $project->title_ar;
                        $links[''] = $property->title_ar;
                    } elseif ($locale == 'cn') {
                        $links = [
                            url("$locale") => trans('words.home'),
                            url("$locale/dubai") => trans('words.Projects'),
                        ];
                        if (in_array($project->slug, ['victoria', 'riviera', 'avenue'])) {
                            $links[url("$locale/dubai/meydan")] = trans('words.MEYDAN');
                        }
                        $links[url("$locale/dubai/meydan/{$project->slug}")] = $project->title_ch;
                        $links[''] = $property->title_ch;
                    }
                    ?>
                    <?= generate_breadcrumb($links, $locale) ?>
                </div>

                <div class="col l3 xl3 p0" <?= $locale == 'ar' ? "style=float:left;" : '' ?>>
                    <div class="sharebtn<?= $locale == 'ar' ? "-ar" : '' ?>">
                        <a href="#"><strong><?= trans('words.Share') ?></strong></a>
                        <a href="#"><i class="ion-social-facebook"></i></a>
                        <a href="#"><i class="ion-social-twitter"></i></a>
                        <a href="#"><i class="ion-social-instagram"></i></a>
                        <a href="https://www.youtube.com/channel/UCmUtuRMwJxaovjGBNSXx-Jw"  target="_blank"><i class="ion-social-youtube"></i></a>
                    </div>

                </div>
            </div>
        </div>               
    </div>

            <!-- <a href="projectdetail-unit"><h6 class="btn-booknow"><strong style="font-size: 20px;margin-right: 5px;"><i class="ion-bag"></i></strong> Book Now</h6></a>  -->

    <?php if ($locale == 'en') { ?>
        <a class="enq-now" id="#register-with-us"><h6 class="btn-enquire"><strong style="font-size: 20px;margin-right: 5px;"><i class="ion-ios-paperplane-outline"></i></strong>{{trans('words.Enquire Now')}}</h6></a>
        <a href="#enquire-now"  class="az-btns active modal-trigger"><h6 class="btn-enquire"><strong style="font-size: 20px;margin-right: 5px;"><i class="ion-ios-paperplane-outline"></i></strong>{{trans('words.Enquire Now')}}</h6></a>

    <?php } else if ($locale == 'cn') { ?>
        <a class="enq-now" id="#register-with-us"><h6 class="btn-enquire" style="right: -3em"><strong style="font-size: 20px;margin-right: 5px;"><i class="ion-ios-paperplane-outline"></i></strong>立即咨询</h6></a>
    <?php } else if ($locale == 'ar') { ?>
        <a class="enq-now" id="#register-with-us"><h6 class="btn-enquire"><strong style="font-size: 20px;margin-right: 5px;"><i class="ion-ios-paperplane-outline"></i></strong>{{trans('words.Enquire Now')}}</h6></a>
        <a href="#enquire-now"  class="az-btns active modal-trigger"><h6 class="btn-enquire"><strong style="font-size: 20px;margin-right: 5px;"><i class="ion-ios-paperplane-outline"></i></strong>{{trans('words.Enquire Now')}}</h6></a>
    <?php } ?>


</div>

<!-- End -->
<div class="container">
    <div class="row">
        <div class="col s12 m8">

            <!-- Description -->
            <div class="col s12 p0">
                <!-- <h2 class="m0">{{trans('words.Description')}}</h2> -->
                <!--
                <?php if ($locale == 'en') { ?> <h2 class="m0">Description</h2> <?php } ?>
                <?php if ($locale == 'ar') { ?> <h2 class="m0">الوصف</h2> <?php } ?>
                <?php if ($locale == 'cn') { ?> <h2 class="m0">描述</h2> <?php } ?>



                <div class="divider az-header-divider mb0"></div-->

                <p class="az-pcontent">{!!showTextByLocale($locale,[$property->long_description_en,$property->long_description_ar,$property->long_description_ch])!!}</p>
            </div>
            <!-- End -->

            <!-- Gallery -->



            <div class="col s12 p0 pbottom">
                <h2 class="mb0">{{trans('words.Gallery')}}</h2>
                <div class="divider az-header-divider"></div>
                <!-- <p class="az-pcontent">Project image gallery</p> -->
            </div>


            <?php if ($locale == 'en') { ?>
                <div class="col s12 m12 p0">
                <?php } else if ($locale == 'ar') { ?>
                    <div class="col s12 m12 p0">
                    <?php } else if ($locale == 'cn') { ?>
                        <div class="col s12 m12 p0">
                        <?php } ?>


                        <div id="example3" class="slider-pro" style="margin-top: 15px;">
                            <div class="sp-slides">
                                <?php
                                if (!empty($galleries)) {
                                    $k = 0;
                                    foreach ($galleries as $gallery) {
                                        if ($gallery->image != "") {
                                            ?>
                                            <div class="sp-slide">
                                                <img alt="{{ trim($property->title_en) }}- Gallery <?php echo $k; ?>" class="sp-image" src="{{ url("/") }}/blank.gif" 
                                                     data-src="{{asset('assets/images/properties')}}/{{ $project->gallery_location }}/{{ $property->gallery_location }}/{{ $gallery->image }}"
                                                     data-small="{{asset('assets/images/properties/')}}/{{ $project->gallery_location }}/{{ $property->gallery_location }}/{{ $gallery->image }}"
                                                     data-medium="{{asset('assets/images/properties/')}}/{{ $project->gallery_location }}/{{ $property->gallery_location }}/{{ $gallery->image }}"
                                                     data-large="{{asset('assets/images/properties/')}}/{{ $project->gallery_location }}/{{ $property->gallery_location }}/{{ $gallery->image }}"
                                                     data-retina="{{asset('assets/images/properties/')}}/{{ $project->gallery_location }}/{{ $property->gallery_location }}/{{ $gallery->image }}" />
                                            </div>
                                            <?php
                                        }
                                        $k++;
                                    }
                                }
                                ?>
                            </div>

                            <div class="sp-thumbnails">
                                <?php
                                if (!empty($galleries)) {
                                    $k = 0;
                                    foreach ($galleries as $gallery) {
                                        if ($gallery->image != "") {
                                            ?>
                                            <img alt="{{ trim($property->title_en) }}- Gallery <?php echo $k; ?>" class="sp-thumbnail" src="{{asset('assets/images/properties')}}/{{ $project->gallery_location }}/{{ $property->gallery_location }}/{{ $gallery->image }}"/>
                                            <?php
                                        } $k++;
                                    }
                                }
                                ?>
                            </div>
                        </div>



                    </div>



                </div>

                <div class="col s12 m4 project-detail">
                    <ul>

                        <li style="border-bottom: 1px solid #d5d5d5;">
                            <?php if (trim($property->title_en) == "Thoe Victoria" || trim($property->title_en) == "عزيزي فيكتوريا") { ?>
                                <p><strong style="margin-right: 15px;">{{trans('words.Area')}} : </strong> {{trans('words.MEYDAN')}}</p>
                            <?php } else { ?>
                                <p><strong style="margin-right: 15px;">{{ trans('words.Area') }} : </strong>
                                    {{ showTextByLocale($locale,['en'=>$property->title_en,'ar'=>$property->title_ar,'cn'=>$property->title_ch]) }}</p>
                            <?php } ?>
                        </li>
                        <?php if ($property->get_category_detail) { ?>
                            <li style="border-bottom: 1px solid #d5d5d5;">
                                <p class="az-pcontent"><strong style="margin-right: 15px;">{{ trans('words.Category') }} :</strong>
                                    <?php if ($property->get_category_detail->status == "1") { ?>
                                        {{showTextByLocale($locale,[$property->get_category_detail->title_en,$property->get_category_detail->title_ar,$property->get_category_detail->title_ch])}}
                                    <?php } ?>
                                </p>
                            </li>
                        <?php } ?>

                        <li style="border-bottom: 1px solid #d5d5d5;">
                            <p class="az-pcontent"><strong style="margin-right: 15px;">{{ showTextByLocale($locale,['Total Apartments',' إجمالي عدد الشقق','公寓数量']) }} : </strong>
                                <span>{{ $property->total_apartment }}</span></p>
                        </li>
                        <li style="border-bottom: 1px solid #d5d5d5;">
                            <p class="az-pcontent"><strong style="margin-right: 15px;">{{trans('words.Building Height')}}  : </strong> <span>
                                    {{showTextByLocale($locale,[$property->building_height,$property->building_height_ar,$property->building_height_ch])}}
                                </span></p>
                        </li>
                        <li>
                                <!-- <p class="az-pcontent m0" style="padding-top: 1em;"><strong style="margin-right: 15px;">{{trans('words.Amenities')}}:</strong></p> -->

                            <?php if ($locale == 'en') { ?>
                                <p class="az-pcontent m0" style="padding-top: 1em;"><strong style="margin-right: 15px;">{{trans('words.Amenities')}} :</strong></p>
                            <?php } else if ($locale == 'ar') { ?>
                                <p class="az-pcontent m0" style="padding-top: 1em;"><strong style="margin-right: 15px;">{{trans('words.Amenities')}} : </strong></p>
                            <?php } else { ?>
                                <p class="az-pcontent m0" style="padding-top: 1em;"><strong style="margin-right: 15px;">配套设施 : </strong></p> 
                            <?php } ?>



                            <!-- aminities -->
                            <div class="col s12 center-align project-amenities p0">
                                <?php
                                if (!empty($aminities)) {
                                    foreach ($aminities as $amin) {
                                        ?>
                                        <div class="col s3">
                                            <img alt="{{ trim($amin->title_en) }}" src="{{asset('assets/images/icon/')}}/{{ $amin->icon }}" class="responsive-img">
                                            <p class="m0">{{showTextByLocale($locale,[$amin->title_en,$amin->title_ar,$amin->title_ch])}}</p>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>

                            </div>
                            <!-- end -->
                        </li>

                        <li style="display:none">
                            <span class="az-pcontent">
                                <strong style="width: 100px; display: inline-block; ">{{trans('words.Brochure')}}: </strong> 
                                <span style="">
                                    <?php
                                    if (File::files(STORE_PATH . "/assets/images/properties/" . $project->gallery_location . '/' . $property->gallery_location . '/brochures')) {
                                        $downloadBrochure = url("$locale/download/$property->id?type=b&action=download");
                                        echo '<a href="#dbrochure" class="az-btn az-btn1 waves-effect waves-light modal-trigger" >' . trans('words.Download') . '</a>';
                                    }
                                    ?>
                                </span>
                                <span style="">
                                    <?php
                                    if (File::files(STORE_PATH . "/assets/images/properties/" . $project->gallery_location . '/' . $property->gallery_location . '/brochures')) {
                                        $viewBrochure = url("$locale/download/$property->id?type=b&action=view");
                                        echo '<a href="#vbrochure" class="az-btn az-btn1 waves-effect waves-light modal-trigger">' . trans('words.View') . '</a>';
                                    }
                                    ?>
                                </span>
                            </span>
                        </li>

                        <li style="display:none">
                            <span class="az-pcontent">
                                <strong style="width: 100px; display: inline-block; ">{{trans('words.Floor Plans')}}: </strong> 
                                <span style="">
                                    <?php
                                    if (File::files(STORE_PATH . "/assets/images/properties/" . $project->gallery_location . '/' . $property->gallery_location . '/floor-plans')) {
                                        $downloadFloorPlan = url("$locale/download/$property->id?type=f&action=download");
                                        echo '<a href="#dfloorplan" class="az-btn az-btn1 waves-effect waves-light modal-trigger" >' . trans('words.Download') . '</a>';
                                    }
                                    ?>
                                </span>
                                <span style="">
                                    <?php
                                    if (File::files(STORE_PATH . "/assets/images/properties/" . $project->gallery_location . '/' . $property->gallery_location . '/floor-plans')) {
                                        $viewFloorPlan = url("$locale/download/$property->id?type=f&action=view");
                                        echo '<a href="#vfloorplan" class="az-btn az-btn1 waves-effect waves-light modal-trigger" >' . trans('words.View') . '</a>';
                                    }
                                    ?>
                                </span>
                            </span>
                        </li>

                    </ul>
                    <?php
                    $view360 = $viewBrochure = $viewFloorPlan = '';
                    if (File::files(STORE_PATH . "/assets/images/properties/" . $project->gallery_location . '/' . $property->gallery_location . '/brochures')) {
                        $viewBrochure = url("$locale/download/$property->id?type=b&action=view");
                        echo '<a id="vbrochureFile" href="#enquire-now" class="az-btn btncs waves-effect waves-light modal-trigger" data-fileurl="' . $viewBrochure . '" target="_blank">' . trans('words.View') . ' ' . trans('words.Brochure') . '</a>';
                    }
                    if (File::files(STORE_PATH . "/assets/images/properties/" . $project->gallery_location . '/' . $property->gallery_location . '/floor-plans')) {
                        $viewFloorPlan = url("$locale/download/$property->id?type=f&action=view");
                        echo '<a id="floorplanFile" href="#enquire-now" class="az-btn btncs waves-effect waves-light modal-trigger"  data-fileurl="' . $viewFloorPlan . '" target="_blank">' . trans('words.View') . ' ' . trans('words.Floor Plans') . '</a>';
                    }
                    if (!empty($property->views_360)) {
                        $view360 = $property->views_360;
                        // echo '<a href="#view360" class="az-btn btncs waves-effect waves-light modal-trigger">' . trans('words.360 View') . '</a>';
                        echo '<a href="' . $property->views_360 . '" class="az-btn btncs waves-effect waves-light modal-trigger" target="_blank">' . trans('words.360 View') . '</a>';
                    }
                    if ($property->constrution_show == 'Yes' && $property->completed == 0) {
                        $community = in_array($project->slug, ['victoria', 'riviera', 'avenue']) ? 'meydan/' : '';
                        echo '<a href="' . url("$locale/dubai/{$community}$project->slug/$property->slug/construction-updates") . '" class="az-btn btncs" >' . trans('words.Construction Updates') . '</a>';
                    }
                    ?>

                </div>

                <!-- Available units -->
                <div class="col s12 p0" style="margin-top: 3em;">
                    <div class="col s12 m3 pbottom">
                        <h2 class="m0">{{showTextByLocale($locale,[trans('words.Available unit'),trans('words.Available unit'),'在售房源'])}}</h2> 
                        <div class="divider az-header-divider mb0"></div>                       
<!--                        <p class="az-pcontent">{{showTextByLocale($locale,[trans('words.All available units in this project'),trans('words.All available units in this project'),'该项目在售房源'])}}</p> -->
                    </div>
                    <div class="col s12 m9 p0">

                        <?php
                        if ($units) {
                            foreach ($units as $unit) {
                                ?>
                                <div class="col s6 m3 center-align">
                                    <div class="col s12 card" style="padding: 1em;">
                                        <div><span class="ion-ios-photos-outline" style="font-size:3rem;"></span></div>
                                        <h3 style="font-size: 1.2rem !important; margin: 0;letter-spacing:0;">{{showTextByLocale($locale,[$unit->title_en,$unit->title_ar,$unit->title_ch])}}</h3>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>   
                </div>
                <!-- End -->





                <!-- Project Video -->
                <!-- <div class="col s12 vdotur p0" style="margin-top: 1em;"> -->
                <?php
                $string = preg_replace('/\s+/', '', $property->video_url);
                echo "<p style='display:none;'>" . $string . "</p>";


                if ($string != "") {
                    ?>
                    <div class="col s12 vdotur p0 yes" style="margin-top: 1em;">
                        <div class="col s12 m3 ">
                            <h2 class="m0 pspaceing">{{trans('words.Video Tour')}}</h2>
                            <div class="divider az-header-divider mb0"></div>
    <!--                            <p class="az-pcontent">{{trans('words.A detail in video')}}</p>-->
                        </div>
                        <div class="col s12 m9">
                            <div class="col s12 p0">
                                <?php if ($property->video_url != "") { ?>
                                    <iframe src="{{ $property->video_url }}" frameborder="0" allowfullscreen style="width: 100%;height: 400px;"></iframe>
                                <?php } else { ?>
                                    <iframe src="https://www.youtube.com/embed/WM1HbkCCmZ8" frameborder="0" allowfullscreen style="width: 100%;height: 400px;"></iframe>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- End -->
                <?php } ?>




                <!-- Nearby -->
                <!-- Min-max 5 places -->
                <div class="col s12 near-by p0">
                    <div class="col s12 m3 pbottom">
                        <h2 class="mb0">
                            {{trans('words.Nearby')}}
                        </h2>
                        <div class="divider az-header-divider mb0"></div>
<!--                            <p class="az-pcontent">
                            {{trans('words.Places near by to this project')}}
                        </p>-->
                    </div>
                    <div class="col s12 m9" style="padding-top: 2rem;">
                        <div class="col s12 bg-vert" style="background: url('{{asset('assets/images/vert1.jpg')}}');min-height: 500px;background-size: cover;background-position: center;" id="vert1">

                            <div class="row" style="padding-top: 5em;">
                                <div class="col m4" style="padding: 0;">
                                    <?php
                                    if ($nears) {
                                        $i = 1;
                                        $class = "";
                                        foreach ($nears as $near) {
                                            if ($i == 1) {
                                                $class = "active-vert";
                                            }
                                            ?>
                                            <div class="col m12 vert-tab card " imgvert="{{asset('assets/images/near')}}/{{ $near->image }}" style="margin: 0;background: #155895;color: white;cursor:pointer;" id="vert<?php echo $i; ?>">
                                                <p>{{showTextByLocale($locale,[$near->title_en,$near->title_ar,$near->title_ch])}}<span class="right"><i class="ion-ios-arrow-right"></i></span></p>
                                            </div>
                                            <?php
                                            $i++;
                                        }
                                    }
                                    ?>

                                </div>

                                <div class="col m8">
                                    <?php if ($nears) { ?>
                                        <?php
                                        $i = 1;
                                        ?>
                                        <?php foreach ($nears as $near) { ?>
                                            <?php if ($i == 1) { ?>
                                                <div class="col m12 cnt-vert<?php echo $i; ?>" style="padding-left: 125px;padding-top: 5em;">
                                                <?php } else { ?>
                                                    <div class="col m12 cnt-vert<?php echo $i; ?>" style="padding-left: 125px;padding-top: 5em;display:none;">  
                                                    <?php } ?>
                                                    <h5 class="az-title" style="font-weight: 800;color: white;">{{showTextByLocale($locale,[$near->title_en,$near->title_ar,$near->title_ch])}}</h5>
                                                </div>
                                                <?php
                                                $i++;
                                            }
                                        }
                                        ?>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End -->
                    <!-- Project loc -->
                    <div class="col s12 prjlctn p0">
                        <div class="col s12 m3 pbottom-15">
                            <h2 class="mb0">{{trans('words.Project Location')}}</h2>
                            <div class="divider az-header-divider mb0"></div>
<!--                                <p class="az-pcontent">
                                {{trans('words.View project location map')}}
                            </p>-->
                        </div>
                        <div class="col s12 m9 fcpinfo">
                            <div class="col s12 p0">
                                <div id="map"></div>
                            </div>
                        </div>
                    </div>
                    <!-- End -->

                    <!--div class="col s12">
                        <div class="row">
                        <div class="col s3 m3 l12 xl12"> 1 </div>    
                        <div class="col s3 m3 l12 xl12"> 2 </div>    
                        <div class="col s3 m3 l12 xl12"> 3 </div>    
                        <div class="col s3 m3 l12 xl12"> 4 </div> 
                        </div>
                    </div-->

                    <!-- Enquire now --
                    <div class="col s12 offset-0 p0" style="margin-top: 1em;" >
                        <div class="col s12 m3">
                            <h2 class="mb0">{{trans('words.Enquire Now')}}</h2>
                            <div class="divider az-header-divider mb0"></div>
<!--                                <p class="az-pcontent">{{trans('words.Drop a line here')}}</p>
                            --                            </div>
                        <div class="col s12 m12" style="margin-top: 1rem;">
                            <div class="col s12 card">

                                <div class="col m5 s12 offset-0 FRMBOX">
                                    <iframe src="<?=SITE_URL?>/<?= $locale ?>/lead-form/" border="0" style="width:100%;height:270px;border:none;"></iframe>
                                </div>

                                <div class="col m6 offset-m1 fcpinfo">
                                    <div class="col m10 offset-0" style="direction: ltr;">
                                        <div class="row" style="border-bottom: 1px solid #f0f0f0;">
                                            <div class="col s2" style="text-align: center;">
                                                <span style="margin: 15px 0;"><i class="ion-iphone" style="color: initial; font-size: 2.52rem !important;"></i></span>
                                            </div>
                                            <div class="col s10">

                    <?php if ($locale == 'en') { ?>
                                                                                                            <p class="az-pcontent"><strong style="margin-right: 15px;">Call Us</strong><br>
                                                                                                                UAE : 800 THOE (29494) <br>
                                                                                                                International: +971 4 359 6673 
                    <?php } else if ($locale == 'ar') { ?>
                                                                                                            <p class="az-pcontent" style=" direction: rtl; "><strong style="margin-right: 15px;">اتصل بنا</strong><br>
                                                                                                                الإمارات: 800 عزيزي (29494) <br>
                                                                                                                الهاتف: 97143596673+
                    <?php } else if ($locale == 'cn') { ?>
                                                                                                            <p class="az-pcontent"><strong style="margin-right: 15px;">致电我们</strong><br>
                                                                                                                阿联酋：800 THOE（29494） <br>
                                                                                                                国际：+971 4 359 6673
                    <?php } ?>





                                                </p>
                                            </div>
                                        </div>
                                        <div class="row" style="border-bottom: 1px solid #f0f0f0;">
                                            <div class="col s2" style="text-align: center;">
                                                <span style="margin: 15px 0;"><i class="ion-ios-location" style="color: initial; font-size: 2.52rem !important;"></i></span>
                                            </div>
                                            <div class="col s10">
                                                    <!-- <p class="az-pcontent"><strong style="margin-right: 15px;">{{trans('words.Address')}}</strong><br>{!! $property->enquire_address !!}</p> --
                    <?php if ($locale == 'en') { ?>
                                                                                                            <p class="az-pcontent"><strong style="margin-right: 15px;">Address</strong><br>
                        <!--Suite No. 902 / 904, API World Tower, Sheikh Zayed Road, Dubai, UAE--
                        {!! $property->enquire_address !!}
                    <?php } else if ($locale == 'ar') { ?>
                    <p class="az-pcontent" style=" direction: rtl; "><strong style="margin-right: 15px;">العنوان</strong><br>
                        جناح رقم 805 ، فندق كونراد ، شارع الشيخ زايد ، دبي ، الإمارات العربية المتحدة
                    <?php } else if ($locale == 'cn') { ?>
                    <p class="az-pcontent"><strong style="margin-right: 15px;">地址</strong><br>
                        阿联酋，迪拜，谢赫扎伊德路，API World Tower，902/904号办公室
                    <?php } ?>
</div>
</div>
<div class="row" style="border-bottom: 1px solid #f0f0f0;">
<div class="col s2" style="text-align: center;">
<span style="margin: 15px 0;"><i class="ion-ios-email" style="color: initial; font-size: 2.52rem !important;"></i></span>
</div>
<div class="col s10">
<p class="az-pcontent"><strong  style="margin-right: 15px;">{{trans('words.Email')}}</strong><br><span class="num-fo">{{ $property->enquire_email }}</span></p>
</div>
</div>
</div>
</div>
</div>
</div>
                    <!-- End --
                    </div-->
                </div>


                </section>
                <!-- End -->


            </div>


            <!-- Enquire Now -->
            <div id="enquire-now-frm" class="modal" style="max-height: 100%; top:0.5%; max-width: 475px">
                <div class="modal-content book-now">
                    <div class="modal-header" style="border: none;">
                        <a href="#" class="modal-close waves-effect waves-green btn-flat " style="width: 33px; position: absolute; right: 2px; font-size: 30px; top: 2px;">&times;</a>
                        <h4 class="modal-title" style="margin: 5px 5px 0;">{{trans('words.ENQUIRE NOW')}}</h4>
                    </div>
                    <div class="row m0">
                        <div class="col s12" style="padding: 0;">
                            <iframe src="<?=SITE_URL?>/<?= $locale ?>/lead-form" class="iframe-lead-form" border="0" style="width:100%;height:250px;border:none;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End -->

            {{--@includeIf('/pages/property/downloadPopup', ['name'=>'View Brochure','type' => 'vbrochure','link'=>$viewBrochure]) --}}
            {{-- @includeIf('/pages/property/downloadPopup', ['name'=>'View Floor Plan','type' => 'vfloorplan','link'=>$viewFloorPlan]) --}}
            {{-- @includeIf('/pages/property/downloadPopup', ['name'=>'View 360','type' => 'view360','link'=>$view360]) --}}

            @stop



            @section('footer_main_scripts')
            
            <?php if ($property) { ?>
                <script>
    var lat = <?= $property->latitude ?>;
    var lng = <?= $property->longitude ?>;
    function initMap() {
        var uluru = {lat: lat, lng: lng};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: uluru,
            styles: [
                {
                    "featureType": "administrative",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": "-100"
                        }
                    ]
                },
                {
                    "featureType": "administrative.province",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 65
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": "50"
                        },
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": "-100"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "all",
                    "stylers": [
                        {
                            "lightness": "30"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "all",
                    "stylers": [
                        {
                            "lightness": "40"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "hue": "#ffff00"
                        },
                        {
                            "lightness": -25
                        },
                        {
                            "saturation": -97
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "lightness": -25
                        },
                        {
                            "saturation": -100
                        }
                    ]
                }
            ]
        });
        var contentString = '{{ $property->location }}';
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
        marker.addListener('click', function () {
            infowindow.open(map, marker);
            infowindow.setContent(contentString);
        });
    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9Wr9zSssUdao0Zxt1Ow4VYgozpT9h1Vg&callback=initMap"></script>
            <?php } ?>
            @stop

            @section('footer_scripts')
            <!-- Gallery -->
            <script type="text/javascript" src="{{asset('assets/galleryview/inc/mbGallery.js')}}"></script>
            <script type="text/javascript" src="{{asset('assets/galleryview/inc/jquery.exif.js')}}"></script>
            <!-- end -->

            <!-- Nearby mouse hover -->
            <script>
$(".vert-tab").mouseover(function () {
    $(".vert-tab").removeClass("active-vert"), $(this).addClass("active-vert"), getvertImage = $(this).attr("id"), "vert1" == getvertImage ? ($(".cnt-vert1").css("display", "block"), $(".cnt-vert2").css("display", "none"), $(".cnt-vert3").css("display", "none"), $(".cnt-vert4").css("display", "none"), $(".cnt-vert5").css("display", "none")) : "vert2" == getvertImage ? ($(".cnt-vert1").css("display", "none"), $(".cnt-vert2").css("display", "block"), $(".cnt-vert3").css("display", "none"), $(".cnt-vert4").css("display", "none"), $(".cnt-vert5").css("display", "none")) : "vert3" == getvertImage ? ($(".cnt-vert1").css("display", "none"), $(".cnt-vert2").css("display", "none"), $(".cnt-vert3").css("display", "block"), $(".cnt-vert4").css("display", "none"), $(".cnt-vert5").css("display", "none")) : "vert4" == getvertImage ? ($(".cnt-vert1").css("display", "none"), $(".cnt-vert2").css("display", "none"), $(".cnt-vert3").css("display", "none"), $(".cnt-vert4").css("display", "block"), $(".cnt-vert5").css("display", "none")) : "vert5" == getvertImage && ($(".cnt-vert1").css("display", "none"), $(".cnt-vert2").css("display", "none"), $(".cnt-vert3").css("display", "none"), $(".cnt-vert4").css("display", "none"), $(".cnt-vert5").css("display", "block")), $(".bg-vert").css("background", "url(" + $(this).attr("imgvert") + ")"), $(".bg-vert").css("background-size", "cover"), $(".bg-vert").css("background-position", "center")
});
            </script>
            <script>

                $(document).scroll(function () {

                    var w = $(window).width();
                    if (w >= 769) {
                        var y = $(this).scrollTop();
                        if (y > 200) {
                            $('.enq-now').fadeIn();
                        } else {
                            $('.enq-now').fadeOut();
                        }
                        // end scrool
                    } else {
                        $('.az-btn').fadeIn();
                    }
                });

//                $('.enq-now').click(function () {
//                    $('html, body').animate({
//                        scrollTop: $("#enquire-now").offset().top
//                    }, 2000)
//                });

                $('.map_move').click(function () {
                    $('html, body').animate({
                        scrollTop: $("#map").offset().top
                    }, 2000);
                });

                sessionStorage.setItem("utm_campaign", "<?= $property->title_en ?>");
                var hide_popup = localStorage.getItem("hide_popup");
                console.log(hide_popup);
                if (hide_popup === '<?= date('i') + 4 ?>') {
                    $('#vbrochureFile').attr('href', $('#vbrochureFile').data('fileurl')).removeClass('modal-trigger');
                    $('#floorplanFile').attr('href', $('#floorplanFile').data('fileurl')).removeClass('modal-trigger');
                }

                $('#vbrochureFile,#floorplanFile').click(function () {
                    sessionStorage.setItem("file_url", $(this).data('fileurl'));
                    sessionStorage.setItem("utm_source", 'Website');
//                    $('iframe').each(function () {
//                        this.contentWindow.location.reload(true);
//                    });
                });



            </script>



            @stop
