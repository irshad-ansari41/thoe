@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<style>
    @media only screen and (max-width: 1000px) {
        .row.mc-content .col.m9{width:100%;margin-left:auto;left:auto;right:auto}
        .row.mc-content .col.m3{width:100%!important;margin-top:4rem}
        .scrollbar{margin-left:30px;float:left;overflow-y:initial;margin-bottom:25px}
        .scrollbar-holder{height:auto!important}
        .style-1::-webkit-scrollbar{width:0!important;background-color:#F5F5F5}
        .scrollbar .col.s6{width:20%;margin-left:auto;left:auto;right:auto}
    }
    @media only screen and (max-width: 750px) {
        .scrollbar .col.s6{width:35%;margin-left:auto;left:auto;right:auto}
    }
    .az-footer{margin-bottom:0;margin-top:0}
    .sp-bottom-thumbnails .sp-thumbnail-container,.sp-top-thumbnails .sp-thumbnail-container{margin-left:2px;margin-right:2px;width:150px!important}
    .tabs .tab a:hover,.tabs .tab a.active{background-color:#000;color:#fff}
    .tabs .tab a{color:#000;display:block;width:initial;height:100%;padding:0 24px;font-size:initial;text-overflow:ellipsis;overflow:hidden;-webkit-transition:color .28s ease;transition:color .28s ease}
    .tabs{position:initial;overflow-x:auto;overflow-y:auto;height:auto;width:auto;background-color:transparent;margin:auto;white-space:nowrap}
    .tabs .indicator{background-color:transparent}
    .tabs .tab{display:inline-block;text-align:center;line-height:inherit;height:auto;padding:0;margin:0;text-transform:uppercase}
    .tabs{display:block!important}
    .mc-content .tabs .tab a:hover,.mc-content .tabs .tab a.active{background-color:transparent;color:#000;font-weight:800}
    .mc-content .tabs .tab a{color:#b4b4b4;font-weight:600;padding-left:0;margin-top:10px}
    .slider-pro .sp-selected-thumbnail{border:4px solid rgba(66,66,66,0.66)}
    .scrollbar{margin-left:30px;float:left;overflow-y:scroll;margin-bottom:25px;max-height:550px}
    .style-1::-webkit-scrollbar-track{border-radius:10px;background-color:#F5F5F5}
    .style-1::-webkit-scrollbar{width:5px;background-color:#F5F5F5}
    .style-1::-webkit-scrollbar-thumb{border-radius:10px;-webkit-box-shadow:inset 0 0 6px rgba(0,0,0,.3);background-color:#F5F5F5}
    .sp-bottom-thumbnails{margin-top:4px;width:initial!important}
    .select-dropdown{border:none!important;border-radius:0!important;color:#b7b7b7!important;border-bottom:1px solid rgba(228,228,228,0.35)!important}
    .select-wrapper input.select-dropdown{line-height:2rem!important;padding:0 5px}
    .select-wrapper+label{position:absolute;top:-35px;font-size:.9rem;text-transform:uppercase;letter-spacing:1px;font-weight:700}
</style>
<!-- End -->
<!-- Slider gallery -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/slider-vertical/dist/css/slider-pro.min.css')}}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/slider-vertical/css/examples.css')}}" media="screen" />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="{{asset('assets/slider-vertical/libs/jquery-1.11.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/slider-vertical/dist/js/jquery.sliderPro.min.js')}}"></script>

<script type="text/javascript">
$(document).ready(function ($) {
    $('.slider-pro').sliderPro({
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
@stop

@section('main_div_wrapper')
@stop

@section('section_content')
<!-- Header -->
<section class="az-section">

    <div class="container">
        <div class="parallax-container valign-wrapper only-heading">
            <div class="parallax">
                @if($content->image!="")
                <img alt="{{ trim($content->alt) }}" src="{{asset('assets/images/banner/')}}/{{ $content->image }}" >
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
                        $links = [url("$locale") => trans('words.home'), url("$locale/media-center") => trans('words.Media_Center'), '' => $content->title_en];
                    } elseif ($locale == 'cn') {
                        $links = [url("$locale") => '主页', url("$locale/media-center") => '媒体中心', '' => $content->title_ch];
                    } elseif ($locale == 'ar') {
                        $links = [url("$locale") => trans('words.home'), url("$locale/media-center") => trans('words.Media_Center'), '' => $content->title_ar];
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
        <!--row end-->

        <!-- /////////Content//////////////////////// -->
        <div id="video-container" class="col s12 imagealbum-content">
            <div class="row">
                <div class="col s12 p0">
                    @if($locale=='en')
                    <ul class="tabs">
                        <li class="tab col s12 m3"><a class="az-btn {{$type=='corporate'?'active':''}}" href="{{route('video-gallery.index')}}/corporate"> {{trans('words.corporate')}} </a></li>
                        <li class="tab col s12 m3"><a class="az-btn {{$type=='events'?'active':''}}" href="{{route('video-gallery.index')}}/events"> {{trans('words.events')}} </a></li>
                        <li class="tab col s12 m3"><a class="az-btn {{$type=='commercial'?'active':''}}" href="{{route('video-gallery.index')}}/commercial">  {{trans('words.commercial')}} </a></li>
                    </ul>
                    @endif

                    @if($locale=='ar')
                    <ul class="tabs">
                        <li class="tab col s12 m3" style="float:right"><a class="az-btn {{$type=='corporate'?'active':''}}" href="{{route('video-gallery.index')}}/corporate"> {{trans('words.corporate')}} </a></li>
                        <li class="tab col s12 m3" style="float:right"><a class="az-btn {{$type=='events'?'active':''}}" href="{{route('video-gallery.index')}}/events"> {{trans('words.events')}} </a></li>
                        <li class="tab col s12 m3" style="float:right"><a class="az-btn {{$type=='commercial'?'active':''}}" href="{{route('video-gallery.index')}}/commercial">  {{trans('words.commercial')}} </a></li>
                    </ul>
                    @endif

                    @if($locale=='cn')
                    <ul class="tabs">
                        <li class="tab col s12 m3"><a class="az-btn {{$type=='corporate'?'active':''}}" href="{{route('video-gallery.index')}}/corporate"> {{trans('words.corporate')}}  合作企业</a></li>
                        <li class="tab col s12 m3"><a class="az-btn {{$type=='events'?'active':''}}" href="{{route('video-gallery.index')}}/events"> {{trans('words.events')}} 活动 </a></li>
                        <li class="tab col s12 m3"><a class="az-btn {{$type=='commercial'?'active':''}}" href="{{route('video-gallery.index')}}/commercial">  {{trans('words.commercial')}}  商业 </a></li>
                    </ul>
                    @endif
                </div>
                <!--tabs END-->

                <!-- Corporate -->
                <div class="col s12">
                    <!-- Corporate Content -->
                    <div class="row mc-content" style="margin-top: 30px;">
                        @if($galleries)
                        <?php
                        $img = explode("v=", $gallery->image);
                        ?>
                        @if(!empty($gallery))
                        <div class="col s12 m12">
                            <!-- Loaded album descrp: -->
                            <div style="margin-bottom: 2rem;">
                                <h5 class="m0" >
                                    <?= showTextByLocale($locale, ['en' => $gallery->gallery_title, 'ar' => $gallery->gallery_title_ar, 'cn' => $gallery->gallery_title_ch,]) ?>
                                </h5>
                                <p class="az-pcontent">
                                    <?= showTextByLocale($locale, ['en' => $gallery->short_description, 'ar' => $gallery->short_description_ar, 'cn' => $gallery->short_description_ch,]) ?>
                                </p>
                            </div>
                            <!-- End -->
                        </div>

                        <div class="col s12 m9">
                            <div class="media-video">
                                <div class="video-container">
                                    <iframe width="853" height="480" src="https://www.youtube.com/embed/{{trim(!empty($img[1])?$img[1]:'')}}?rel=0" allow="autoplay; encrypted-media"  frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>

                        @else

                        <div class="col s12 m9">
                            <div class="media-video">
                                No Video Found!
                            </div>
                        </div>

                        @endif

                        @else

                        <div class="col s12 m9">
                            <div class="media-video">
                                No Video Gallery Found!
                            </div>
                        </div>

                        @endif


                        <div class="col s12 m3">
                            <div class="col s12 p0">
                                <div class="input-field year-filter">
                                    <form action="{{url($locale.'/video-gallery')}}/{{$type}}">
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

                            <!-- Images -->

                            <div class="col s12 p0 scrollbar style-1">
                                <div class="col s12 p0 scrollbar-holder" style="height:490px">
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
                                        $img = explode("v=", $gallery->image)
                                        ?>
                                        <a  title="{{ $gallery->gallery_title }}" href="{{route('video-gallery.index')}}/{{$type}}/{{$gallery->slug}}#video-container">
                                            <div class="col s12 p0 mt0" style="border-bottom: 1px solid #efefef;">
                                                <div class="col s6" style="padding-top: 10px;">
                                                    <img alt="{{ $gallery->gallery_title }}" src="https://img.youtube.com/vi/{{trim(!empty($img[1])?$img[1]:'')}}/1.jpg" class="responsive-img">
                                                </div>
                                                <div class="col s6 p0" style="padding-top: 10px !important;">
                                                    <h6 class="mb0 capitalize" >
                                                        <?= showTextByLocale($locale, ['en' => $gallery->gallery_title, 'ar' => $gallery->gallery_title_ar, 'cn' => $gallery->gallery_title_ch,]) ?>
                                                    </h6>
                                                    <small>{{trans('words.view_more')}}</small>
                                                </div>
                                            </div>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- End -->
                </div>


               

            </div>
            <!-- Corporate End -->
        </div>
        <!-- rows End -->



        <!-- Identity
        <div id="iden" class="col s12">
        
        </div>
        <div id="events" class="col s12">
        
        </div>
        <!-- End -->
    </div>
    <!--col s12 imagealbum-content-->
    <!-- //////////////////////////////// -->

</div>

</section>
<!-- End -->

@stop
@section('footer_main_scripts')

@stop
@section('footer_scripts')
<script>
                                            $(document).ready(function () {
                                                $('.az-btn').click(function () {
                                                    window.location.href = $(this).attr('href');
                                                });
                                                setTimeout(function () {
                                                    scrollHg = $("#corporate").height() - 230;
                                                    $(".scrollbar-holder").css("height", scrollHg + "px");
                                                }, 3000);
                                            });
</script>

@stop
