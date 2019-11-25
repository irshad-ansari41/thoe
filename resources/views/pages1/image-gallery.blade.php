@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<style>
    @media only screen and (max-width: 1000px) {
        .row.mc-content .col.m9{width:100%;margin-left:auto;left:auto;right:auto}
        .row.mc-content .col.m3{width:100%!important;margin-top:4rem}
        .scrollbar{margin-left:30px;float:left;overflow-y:initial;margin-bottom:25px;max-height:550px}
        .scrollbar-holder{height:auto!important}
        .style-1::-webkit-scrollbar{width:0!important;background-color:#F5F5F5}
        .scrollbar .col.s6{width:20%;margin-left:auto;left:auto;right:auto}
    }
    @media only screen and (max-width: 750px) {
        .scrollbar .col.s6{width:35%;margin-left:auto;left:auto;right:auto}
    }
    .az-footer{margin-bottom:0;margin-top:0}
    .sp-bottom-thumbnails .sp-thumbnail-container,.sp-top-thumbnails .sp-thumbnail-container{margin-left:2px;margin-right:2px}

    .mc-content .tabs .tab a:hover,.mc-content .tabs .tab a.active{background-color:transparent;color:#000;font-weight:800}
    .mc-content .tabs .tab a{color:#b4b4b4;font-weight:600;padding-left:0;margin-top:10px}
    .slider-pro .sp-selected-thumbnail{border:1px solid rgba(66,66,66,0.66)}
    .scrollbar{margin-left:30px;float:left;overflow-y:scroll;margin-bottom:25px}
    .style-1::-webkit-scrollbar-track{border-radius:10px;background-color:#F5F5F5}
    .style-1::-webkit-scrollbar{width:5px;background-color:#F5F5F5}
    .style-1::-webkit-scrollbar-thumb{border-radius:10px;-webkit-box-shadow:inset 0 0 6px rgba(0,0,0,.3);background-color:#F5F5F5}
    .sp-bottom-thumbnails{margin-top:4px;width:initial!important}
    .select-dropdown{border:none!important;border-radius:0!important;color:#b7b7b7!important;border-bottom:1px solid rgba(228,228,228,0.35)!important}
    .select-wrapper input.select-dropdown{line-height:2rem!important;padding:0 5px}
    .select-wrapper+label{position:absolute;top:-35px;font-size:.9rem;text-transform:uppercase;letter-spacing:1px;font-weight:700}
    .sp-grab{margin: auto;}
</style>
<!-- End -->
<!-- Slider gallery -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/slider-vertical/dist/css/slider-pro.min.css')}}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/slider-vertical/css/examples.css')}}" media="screen" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="{{asset('assets/slider-vertical/libs/jquery-1.11.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/slider-vertical/dist/js/jquery.sliderPro.min.js')}}"></script>

<script type="text/javascript">
$(document).ready(function ($) {
    $('.slider-pro').sliderPro({width: 960, height: 500, fade: true, arrows: true, buttons: false, fullScreen: true, shuffle: false, smallSize: 500, mediumSize: 1000, largeSize: 3000, thumbnailArrows: true, autoplay: false});
});</script>
<!-- End -->
@stop

@section('main_div_wrapper')
@stop
@section('section_content')

<div class="row preloader none">
    <div class="col s12">
        <img class="" alt="THOE Preloader" src="<?= SITE_URL ?>/assets/images/thoe-loading.gif">
    </div>
</div>
<!-- Header -->
<section class="az-section">

    <div class="container">
        <div class="parallax-container valign-wrapper only-heading">
            <div class="parallax">
                @if($content->image!="")
                <img alt="{{ $content->alt }}" src="{{ asset('assets/images/banner/') }}/{{ $content->image }}" >
                @endif
            </div>
            <div class="col s12 center-align card tag-pro{{$locale=='ar'?'-ar':''}}">
                <h1>{{showTextByLocale($locale, ['en'=>$content->short_description_en,'ar'=>$content->short_description_ar,'cn'=>$content->short_description_ch,])}}</h1>
                <!--<p><i class="ion ion-ios-location-outline" class="text-bold-900"></i></p>-->
            </div>
        </div>
        <!--parallax-container valign-wrapper end-->

        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <?php
                    if ($locale == 'en') {
                        $links = [url("$locale") => trans('words.home'), url("$locale/media-center") => 'Media Cente', '' => 'Image gallery'];
                    } elseif ($locale == 'cn') {
                        $links = [url("$locale") => '主页', url("$locale/media-center") => '媒体中心', '' => '图片库'];
                    } elseif ($locale == 'ar') {
                        $links = [url("$locale") => trans('words.home'), url("$locale/media-center") => 'المركز الاعلامي', '' => 'معرض الصور'];
                    }
                    ?>
                    <?= generate_breadcrumb($links) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m12 short-desc">
                <?= showTextByLocale($locale, ['en' => $content->description_en, 'ar' => $content->description_ar, 'cn' => $content->description_ch,]) ?>
            </div>
        </div>


        <div id="image-container" class="col s12 imagealbum-content">
            <div class="row">
                <div class="col s12 p0">
                    @if($locale=='en')
                    <ul class="tabs">
                        <li class="tab col s12 m3" >
                            <a alt="1-{{ $lastyear }}" class="az-btn {{$type=='corporate'?'active':''}}" href="{{route('image-gallery.index')}}/corporate">{{trans('words.corporate')}}</a>
                        </li>
                        <li class="tab col s12 m3">
                            <a alt="3-{{ $lastyear }}" class="az-btn {{$type=='events'?'active':''}}" href="{{route('image-gallery.index')}}/events">{{trans('words.events')}}</a>
                        </li>
                        <li class="tab col s12 m3">
                            <a alt="2-{{ $lastyear }}" class="az-btn {{$type=='identity'?'active':''}}" href="{{route('image-gallery.index')}}/identity">{{trans('words.identity')}}</a>
                        </li>
                    </ul>
                    @endif


                    @if($locale=='ar')
                    <ul class="tabs">
                        <li class="tab col s12 m3 floatRight">
                            <a alt="1-{{ $lastyear }}" class="az-btn {{$type=='corporate'?'active':''}}" href="{{route('image-gallery.index')}}/corporate">{{trans('words.corporate')}}</a>
                        </li>
                        <li class="tab col s12 m3 floatRight" >
                            <a alt="3-{{ $lastyear }}" class="az-btn {{$type=='events'?'active':''}}" href="{{route('image-gallery.index')}}/events">{{trans('words.events')}}</a>
                        </li>
                        <li class="tab col s12 m3 floatRight" >
                            <a alt="2-{{ $lastyear }}" class="az-btn {{$type=='identity'?'active':''}}" href="{{route('image-gallery.index')}}/identity">{{trans('words.identity')}}</a>
                        </li>
                    </ul>
                    @endif

                    @if($locale=='cn')
                    <ul class="tabs">
                        <li class="tab col s12 m3" >
                            <a alt="1-{{ $lastyear }}" class="az-btn {{$type=='corporate'?'active':''}}" href="{{route('image-gallery.index')}}/corporate">合作企业</a>
                        </li>
                        <li class="tab col s12 m3" >
                            <a alt="3-{{ $lastyear }}" class="az-btn {{$type=='events'?'active':''}}" href="{{route('image-gallery.index')}}/events">活动</a>
                        </li>
                        <li class="tab col s12 m3" >
                            <a alt="2-{{ $lastyear }}" class="az-btn {{$type=='identity'?'active':''}}" href="{{route('image-gallery.index')}}/identity">品牌标识</a>
                        </li>
                    </ul>
                    @endif


                </div>

                <div id="maind">


                    <!-- Corporate -->
                    <div  class="col s12">
                        <!-- Corporate Content -->
                        <div class="row mc-content" style="margin-top: 30px;">
                            <?php
                            if ($galleries) {
                                if (!empty($gallery)) {
                                    ?>
                                    <div class="col s12 m9">
                                        <div class="col s12 p0">
                                            <h5 class="m0" >
                                                <?= showTextByLocale($locale, ['en' => $gallery->gallery_title, 'ar' => $gallery->gallery_title_ar, 'cn' => $gallery->gallery_title_ch,]) ?>
                                            </h5>
                                            <p class="az-pcontent">
                                                <?= showTextByLocale($locale, ['en' => $gallery->short_description, 'ar' => $gallery->short_description_ar, 'cn' => $gallery->short_description_ch,]) ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                            <div class="col s12 m9">		
                                <div class="slider-pro block">
                                    <div class="sp-slides">
                                        <?php
                                        if (!empty($gallery->images)) {
                                            foreach (explode(',', $gallery->images) as $img) {
                                                ?>
                                                <?php $img_url = asset('assets/images/media/') . '/' . $gallery->path . '/images/' . $img; ?>
                                                <div class="sp-slide">
                                                    <img alt="{!! trim($gallery->alt) !!}"  class="sp-image" src="{{ asset("assets/images/100-blank-img.jpg") }}" data-src="{{$img_url}}" data-small="{{$img_url}}" data-medium="{{ $img_url}}" data-large="{{$img_url}}" data-retina="{{$img_url}}" />
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <div>No Record Found</div>
                                        <?php } ?>
                                    </div>

                                    <div class="sp-thumbnails block" >
                                        <?php
                                        if (!empty($gallery->images)) {
                                            foreach (explode(',', $gallery->images) as $img) {
                                                ?>
                                                <?php $img_url = asset('assets/images/media/') . '/' . $gallery->path . '/images/' . $img; ?>
                                                <img alt="{!! trim($gallery->alt) !!}"  class="sp-thumbnail" src="{{ asset("assets/images/100-blank-img.jpg") }}" data-src="{{$img_url}}" />
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>


                            <div class="col s12 m3 ">
                                <div class="col s12 p0">
                                    <div class="input-field year-filter">
                                        <form action="{{url($locale.'/image-gallery')}}/{{$type}}">
                                            <select name="year" onchange="this.form.submit()" class="{{empty($galleries)?'block':''}}">
                                                <option value="0" selected>{{trans('words.sort_by_year')}}</option>
                                                @foreach($years as $value)
                                                <option  value="{{ $value->year }}" {{$value->year==$year?'selected':''}}>{{ $value->year }}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </div>
                                    <hr/>
                                </div>

                                <?php if (!empty($galleries)) { ?>
                                    <!-- Images -->
                                    <div class="col s12 p0 scrollbar style-1">

                                        <div class="col s12 p0 scrollbar-holder" style="height:540px !important; border-bottom: 1px solid #efefef;">

                                            <!-- Loaded album descrp: -->
                                            <?php
                                            if (!empty($gallery_id)) {
                                                foreach ($galleries as $key => $value) {
                                                    if ($value->id == $gallery_id || $value->slug == $gallery_id) {
                                                        $first = $galleries[$key];
                                                        unset($galleries[$key]);
                                                        $shift = (array) $galleries;
                                                        array_unshift($shift, $first);
                                                    }
                                                }
                                            }
                                            foreach ($galleries as $gallery) {
                                                ?>
                                                <a href="{{route('image-gallery.index')}}/{{$type}}/{{$gallery->slug}}#image-container" class="view-video pointer" >	
                                                    <div class="col s12 p0 mt0" >
                                                        <div class="col s6" >
                                                            <img alt="{{$gallery->gallery_title}}" 
                                                                 src="{{ asset("assets/images/100-blank-img.jpg") }}" data-src="{{ asset('assets/images/media/') }}/{{ $gallery->path }}/{{ $gallery->holder_image }}" 
                                                                 class="responsive-img">
                                                        </div>
                                                        <div class="col s6 p0">
                                                            <h6 class="mb0 text-capitalize">
                                                                <?= showTextByLocale($locale, ['en' => $gallery->gallery_title, 'ar' => $gallery->gallery_title_ar, 'cn' => $gallery->gallery_title_ch,]) ?>
                                                            </h6>
                                                            <small>
                                                                {{ trans('words.view_more')}}
                                                            </small>
                                                        </div>
                                                    </div>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                                <!-- End -->
                            </div>
                        </div>
                        <!-- End -->
                    </div>
                    <!-- End -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End -->

@stop


@section('footer_main_scripts')
<!--  -->
@stop
@section('footer_scripts')

<script>
    $(document).ready(function () {

        $('.az-btn').click(function () {
            window.location.href = $(this).attr('href');
        });

        setTimeout(function () {
            scrollHg = $(".imagealbum-content").height() - 270;
            $(".scrollbar-holder").css("height", scrollHg + "px");
        }, 100);
        setInterval(function () {
            $('.slider-pro').sliderPro({
                width: 960,
                height: 500,
                fade: true,
                arrows: true,
                buttons: false,
                fullScreen: true,
                shuffle: false,
                smallSize: 1000,
                mediumSize: 3000,
                largeSize: 5000,
                thumbnailArrows: true,
                autoplay: false
            });
        }, 5000);

        $(".scrollbar-holder").css("height", $(".sp-horizontal").height() + "px");
    });

</script>

@stop
