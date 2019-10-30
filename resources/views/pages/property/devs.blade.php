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
    .az-p{font-size:14.5px !important;}
    @media screen and (min-width: 769px){
        .enq-now{display: none;}
        .az-btns{ display: none;}
    }
    @media screen and (min-width:900px){
        .az-p{color: #fff; font-size:1.1em !important; word-spacing: -1px;}
        .Fbtn{position:absolute; right: 100px; font-weight: bold; margin-top:-3px; font-size: 26px !important;}
    }
    @media screen and (max-width:899px){
        .az-p{color: #fff; font-size:1.1em !important; word-spacing: -1px; }
        .Fbtn{position:absolute; right: 30px; font-weight: bold; margin-top:-3px; font-size: 26px !important;}
    }
    @media screen and (max-width: 768px){
        .mobileds{display: none;}
        .enq-now{display: none;}
    }
    #stick-form{background:rgba(21, 88, 149, 0.8) !important;height: 345px;padding: 10px 0px;border:2px solid #dadada;position: absolute;right: 35px;top:35px}
    .modal{background-color: #fff;}

</style>

@stop

@section('main_div_wrapper')

@stop
@section('section_content')
<!-- Header -->
<section class="az-section">    
    <div class="container">
        <div class="parallax-container valign-wrapper">
            <div class="parallax">
                @if($construction_content->image!="")
                <img alt="{{ $construction_content->alt }}" src="{{ asset('assets/images/banner/') }}/{{ $construction_content->image }}">
                @endif
            </div>
            <div class="col s12 center-align card tag-pro">
                <h1>{{showTextByLocale($locale, ['en'=>$construction_content->title_en,'ar'=>$construction_content->title_ar,'cn'=>$construction_content->title_ch,])}}</h1>
                <p><i class="ion ion-ios-location-outline"></i> {{trans('words.explore_project_address1')}} {{trans('words.explore_project_address2')}}</p>
            </div>
        </div>

        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <?php
                    if ($locale == 'en') {
                        $links = [url("$locale") => trans('words.home'), '' => trans('words.Projects')];
                    } elseif ($locale == 'cn') {
                        $links = [url("$locale") => '主页', '' => '施工进展'];
                    } elseif ($locale == 'ar') {
                        $links = [url("$locale") => trans('words.home'), '' => 'تحديثات أعمال الإنشاء'];
                    }
                    ?>
                    <?= generate_breadcrumb($links) ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End -->


<!-- Projects Construction -->
<section class="az-section">
    <div class="container">
        <div class="row">
            <div class="col s12 short-desc">
                <h6 class="az-title-sub">
                    {{showTextByLocale($locale, ['en'=>$construction_content->short_description_en,'ar'=>$construction_content->short_description_ar,'cn'=>$construction_content->short_description_ch,])}}
                </h6>
                {!! showTextByLocale($locale, ['en'=>$construction_content->description_en,'ar'=>$construction_content->description_ar,'cn'=>$construction_content->description_ch,]) !!}
            </div>
        </div>
    </div>

    <div class="container">
        <?php
        if ($projects) {
            $i = 0;
            foreach ($projects as $project) {
                if (!in_array($project->id, [10])) {
                    echo ($i % 4 == 0) ? '<div class="row">' : '';
                    if (in_array($project->id, [15, 16, 17])) {
                        $url = url($locale . '/dubai/meydan/' . $project->slug);
                    } else {
                        $url = url($locale . '/dubai/' . $project->slug);
                    }
                    ?>
                    <div class="col s12 m3 pro-holder center-align">
                        <a href="{{$url}}">
                            <div class="card col s12 p0">
                                @if($project->image!="")
                                <img alt="{{ $project->alt }}" src="<?= asset("assets/images/100-blank-img.jpg") ?>"  data-src="{{ asset('/assets/images/projects/') }}/{{ $project->image }}" class="responsive-img pro-image">
                                @endif
                                <div class="col s12 title-holder">
                                    <h5>{{ $locale=='ar'?$project->title_ar:($locale=='cn'?$project->title_ch:$project->title_en) }}</h5>
                                    <h6>{{trans('words.View projects')}} </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                    $i++;
                    echo ($i % 4 == 0) ? '</div>' : '';
                }
            }
        }
        ?>
    </div>

    <div class="row"></div>

    <!-- Desktop View Community Unit Start -->
    <?php if($agent->isDesktop() && $locale =='en'):?>
    <div class="row">
        
        <div class="col s12 near-by p0">

            <div class="col s12 m12" style="padding-top: 2rem;">
                <div class="col s12 bg-vert" style="background: url('{{asset('assets/images/vert1.jpg')}}');min-height: 500px;background-size: cover;background-position: center;" id="vert1">

                    <div class="row" style="padding-top: 5em;">
                        <div class="col m4" style="padding: 0;">

                            <?php
                            if ($Community) {
                                $i = 1;
                                $class = "";
                                foreach ($Community as $near) {
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

                            <?php if ($Community) { ?>
                                <?php
                                $i = 1;
                                ?>
                                <?php foreach ($Community as $near) { ?>
                                    <?php if ($i == 1) { ?>
                                        <div class="col m12 cnt-vert<?php echo $i; ?>" style="padding-left: 60px; padding-right: 65px; padding-top: 0.5em;">
                                        <?php } else { ?>
                                            <div class="col m12 cnt-vert<?php echo $i; ?>" style="padding-left: 60px; padding-right: 65px; padding-top: 0.5em;display:none;">  
                                            <?php } ?>
                                            <h5 class="az-title" style="font-weight: 800;color: white;">{{showTextByLocale($locale,[$near->sub_title_en,$near->title_ar,$near->title_ch])}}</h5>
                                            <br/>
                                            <div style="color:#fff; ">
                                                {!! showTextByLocale($locale,[$near->description_en,$near->title_ar,$near->title_ch]) !!}

                                            </div>

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
        </div>
    </div>
    <!-- Desktop View Community Unit End-->
    <?php endif; ?>
    
    <?php if($agent->isMobile() && $locale =='en'):?>
    <!-- Mobile View Community Unit End-->
    <div class="row mobile-near-by" style="padding:0px 13px;">
        <ul class="collapsible">
            <?=$active = !empty($rows->id) ? 'active': '';?>
            <?php if(!empty($Community)): foreach($Community as $rows): ?>
            <li class=""active>
                <div class="collapsible-header">
                    <b>{{showTextByLocale($locale,[$rows->title_en,$rows->title_ar,$rows->title_ch])}}</b>
                    <i class="material-icons Fbtn">keyboard_arrow_down</i>
                </div>
                <div class="collapsible-body" style="background:linear-gradient( rgba(21,88,149,0.5),  rgba(21,88,149,0.5) ), url('{{asset('assets/images/near')}}/{{ $rows->image }}'); width: 100%; padding:0px 10px;">
                    <h3 style="color:#fff; font-size: 1.2em; margin: 0px; padding-top: 20px;">{{showTextByLocale($locale,[$rows->sub_title_en,$rows->title_ar,$rows->title_ch])}}</h3>
                    {!! showTextByLocale($locale,[$rows->description_en,$rows->title_ar,$rows->title_ch]) !!}

                </div>
            </li>
            <?php endforeach; endif; ?>

        </ul>
    </div>
    <!-- Mobile View Community Unit End-->
    <?php endif;?>


</section>
<!-- End -->


@stop
@section('footer_main_scripts')

@stop

@section('footer_scripts')

<!-- Gallery -->
<script type="text/javascript" src="{{asset('assets/galleryview/inc/mbGallery.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/galleryview/inc/jquery.exif.js')}}"></script>
<!-- end -->
<!-- Nearby mouse hover -->
<!-- Nearby mouse hover -->
<script>
$(".vert-tab").mouseover(function () {
    $(".vert-tab").removeClass("active-vert"), $(this).addClass("active-vert"), getvertImage = $(this).attr("id"), "vert1" == getvertImage ? ($(".cnt-vert1").css("display", "block"), $(".cnt-vert2").css("display", "none"), $(".cnt-vert3").css("display", "none"), $(".cnt-vert4").css("display", "none"), $(".cnt-vert5").css("display", "none")) : "vert2" == getvertImage ? ($(".cnt-vert1").css("display", "none"), $(".cnt-vert2").css("display", "block"), $(".cnt-vert3").css("display", "none"), $(".cnt-vert4").css("display", "none"), $(".cnt-vert5").css("display", "none")) : "vert3" == getvertImage ? ($(".cnt-vert1").css("display", "none"), $(".cnt-vert2").css("display", "none"), $(".cnt-vert3").css("display", "block"), $(".cnt-vert4").css("display", "none"), $(".cnt-vert5").css("display", "none")) : "vert4" == getvertImage ? ($(".cnt-vert1").css("display", "none"), $(".cnt-vert2").css("display", "none"), $(".cnt-vert3").css("display", "none"), $(".cnt-vert4").css("display", "block"), $(".cnt-vert5").css("display", "none")) : "vert5" == getvertImage && ($(".cnt-vert1").css("display", "none"), $(".cnt-vert2").css("display", "none"), $(".cnt-vert3").css("display", "none"), $(".cnt-vert4").css("display", "none"), $(".cnt-vert5").css("display", "block")), $(".bg-vert").css("background", "url(" + $(this).attr("imgvert") + ")"), $(".bg-vert").css("background-size", "cover"), $(".bg-vert").css("background-position", "center")
});

$(document).ready(function () {
    $('.collapsible').collapsible();
});
</script>


<script>
    $(document).ready(function () {
        sessionStorage.setItem("utm_campaign", '<?= $project->title_en ?>');
    });
</script>
@stop

