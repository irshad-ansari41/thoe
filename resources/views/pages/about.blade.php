@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<!-- Time line css -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/timeline_style.css')}}">
<style>.parallax-container .parallax img {    top: initial;}.cd-horizontal-timeline .timeline {position: relative;height: 100px;margin: 0 auto;width: 60%;}
</style>
@if($locale=='ar')
<style>body{text-align:right!important}
    .az-nav-header{text-align:left!important}
    .about-title-text{width:100%!important}
    .about-chairman-sec{width:62%!important}
    .az-footer p{padding-right:0!important}
    .az-footer i{float:right!important}
    .az-footer .ion-ios-email-outline{font-size:30px;float:left;margin-top:-15px;margin-right:9px;float:initial;margin-left:10px}</style>
@endif
<!-- End -->
@stop

@section('main_div_wrapper')

@stop

@section('section_content')

<!-- Header -->
<section class="az-section">

    <div class="container">
        <div class="parallax-container valign-wrapper">
            <div class="parallax">
                @if($about->banner_image!="")
                <img alt="{{ $about->banner_image_alt }}" src="{{asset('assets/images/about/')}}/{{ $about->banner_image }}" style="max-width: 200px;">
                @endif
            </div>
        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <ul>
                        <li>
                            @if($locale=='en')
                            <span class="ion-ios-arrow-left" style=""></span>
                            @endif


                            @if($locale=='en')
                            <a href="{{ url('/') }}" style="color: #5a5a5a;">{{trans('words.home')}} / </a>
                            <a style="font-weight: 600;">{{trans('words.About Us')}}</a>
                            @elseif($locale=='cn')
                            <a href="{{ url('/') }}" style="color: #5a5a5a;">主页 / </a>
                            <a style="font-weight: 600;">关于AZIZI地产公司</a>
                            @elseif($locale=='ar')
                            <a href="{{ url('/') }}" style="color: #5a5a5a;">{{trans('words.home')}} / </a>
                            <a style="font-weight: 600;">{{trans('words.About Us')}}</a>
                            @endif

                            <!-- <a href="{{ url('/') }}" style="color: #5a5a5a;">{{trans('words.home')}} / </a>
                            <a style="font-weight: 600;">{{trans('words.About Us')}}</a> -->
                            @if($locale=='ar')
                            <span class="ion-ios-arrow-left" style=""></span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="margin-bottom: 3em;">
            <div class="col s12 m10 about-title-text">
                <h5 class="title-uppercase mb0" style="font-weight: 400;    text-transform: initial;">
                    <?= showTextByLocale($locale, ['en' => $about->title_en, 'ar' => $about->title_ar, 'cn' => $about->title_ch]) ?>
                </h5>
                <p class="az-pcontent">
                    <?= showTextByLocale($locale, ['en' => $about->description_en, 'ar' => $about->description_ar, 'cn' => $about->description_ch]) ?>
                </p>

            </div>
        </div>

        <div class="row" style="margin-bottom: 5rem;">
            <div class="col s12 m4" style="margin-right: 3em;">
                @if($about->chairmen_image!="")
                <img alt="{{ $about->chairment_image_alt }}" src="{{asset('assets/images/about/')}}/{{ $about->chairmen_image }}" class="responsive-img">
                @endif
            </div>

            <div class="col s12 m6 about-chairman-sec">

                <!-- <h5 class="m0">{{ trans('words.chairman_message') }}</h5> -->
                @if($locale=='en')
                <h5 class="m0">{{ trans('words.chairman_message') }}</h5>
                @elseif($locale=='cn')
                <h5 class="m0">董事长寄语</h5>
                @elseif($locale=='ar')
                <h5 class="m0">{{ trans('words.chairman_message') }}</h5>
                @endif


                <div class="divider az-header-divider"></div>
                <p class="az-pcontent">
                    <?= showTextByLocale($locale, ['en' => $about->chairment_description_en, 'ar' => $about->chairment_description_ar, 'cn' => $about->chairment_description_ch]) ?>
                </p>

                <div class="desig-person" style="margin-top: 3em;">
                    <div class="person-name" style="font-size: 15px;margin: 0;">{{ trans('words.mirwais_azizi')}}</div>
                    <i style="font-size: 12px;">{{ trans('words.chirman_azizi_group') }}</i>
                </div>
            </div>
        </div>

    </div>

    <div class="about-timeline">
        <div class="container">

            <div class="row m0">
                <div class="cols 12 center-align">
                    <h5 class="white">

                        @if($locale=='en')
                        {{ trans('words.azizi_development_at_glance') }}
                        @elseif($locale=='cn')
                        AZIZI地产公司一览
                        @elseif($locale=='ar')
                        {{ trans('words.azizi_development_at_glance') }}
                        @endif

                    </h5>
                    <!-- <h6 class="az-title white">Azizi Group was founded in 1989</h6> -->
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <section class="cd-horizontal-timeline m0">
                        <div class="timeline">
                            <div class="events-wrapper">
                                <div class="events">
                                    <ol style="list-style: none;" class="p0">
                                        @if(!empty($timeline))
                                        @foreach($timeline as $time)
                                        <li>
                                            @if($time['flag']=="0")
                                            <a href="#0" data-date="01/01/{{ $time['year'] }}" class="selected">
                                                @else
                                                <a href="#0" data-date="01/01/{{ $time['year'] }}">
                                                    @endif
                                                    {{ $time['year'] }}</a>
                                        </li>
                                        @endforeach
                                        @endif

                                    </ol>

                                    <span class="filling-line" aria-hidden="true"></span>
                                </div>

                            </div>


                            <ul class="cd-timeline-navigation">
                                <li><a href="#0" class="prev inactive">Prev</a></li>
                                <li><a href="#0" class="next">Next</a></li>
                            </ul>

                        </div>


                        <div class="events-content">
                            <ol style="list-style: none;margin:0;" class="p0">

                                @if(!empty($timeline))
                                @foreach($timeline as $time)
                                @if($time['flag']=="0")
                                <li data-date="01/01/{{ $time['year'] }}" class="selected roffset-0">
                                    @else
                                <li data-date="01/01/{{ $time['year'] }}">
                                    @endif
                                    @if(!empty($time['results']))
                                    <div class="row">
                                        @foreach($time['results'] as $res)
                                        @if($time['count']=="1")
                                        <div class="col s12 roffset-0">
                                            <div class="col s12 m6">
                                                @if($res['image']!="")
                                                <img alt="{{ $res['alt'] }}" src="{{asset('assets/images/timeline/')}}/{{ $res['image'] }}" class="responsive-img">

                                                @endif
                                            </div>
                                            <div class="col s12 m6" style="margin-top: 2em;">	
                                                @elseif($time['count']=="2")
                                                <div class="col s12 m6">
                                                    <div class="col s12">
                                                        @if($res['image']!="")
                                                        <img alt="{{ $res['alt'] }}" src="{{asset('assets/images/timeline/')}}/{{ $res['image'] }}" class="responsive-img">
                                                        @endif
                                                    </div>
                                                    <div class="col s12" style="margin-top: 2em;">
                                                        @else
                                                        <div class="col s12 m4 p0">
                                                            <div class="col s12">
                                                                @if($res['image']!="")
                                                                <img alt="{{ $res['alt'] }}" src="{{asset('assets/images/timeline/')}}/{{ $res['image'] }}" class="responsive-img">
                                                                @endif
                                                            </div>
                                                            <div class="col s12" style="margin-top: 2em;">
                                                                @endif

                                                                <h5 class="az-title" style="font-weight: 800;font-size: 13px;height: 4em;overflow: hidden;text-overflow: ellipsis;width: 100%;">{{ $res['title'] or '' }}</h5>
                                                                <div class="divider az-header-divider mb0" style="background: white;"></div>
                                                                <p class="az-pcontent az-pright">{{ $res['description'] or '' }}</p>

                                                            </div>
                                                        </div>	

                                                        @endforeach
                                                    </div>
                                                    @endif
                                                    </li>
                                                    @endforeach
                                                    @endif
                                                    </ol>

                                                </div>

                                                </section>
                                            </div>
                                        </div>

                                    </div>
                                    </div>

                                    </div>

                                    </section>
                                    <!-- End -->
                                    @stop

                                    @section('footer_main_scripts')
                                    
                                    @stop
                                    @section('footer_scripts')
                                    <!-- Timeline -->
                                    <script type="text/javascript" src="{{asset('assets/js/timeline-main.js')}}"></script>
                                    @stop
