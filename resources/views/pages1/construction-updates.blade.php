@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<!-- Time line css -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/timeline_style.css')}}">
<!-- End -->
<style>
    .side-nav li>a {
        color: rgba(255, 255, 255, 0.87);
    }

    .broucher.az-btn.line-through-span:hover:before {
        background: #2196F3;
        width: 50%;
        transition: width 0.5s cubic-bezier(0.22, 0.61, 0.36, 1);
        left: 16em;
    }

    .inquire.az-btn.line-through-span:before {
        left: 202px;
    }

    #map {
        width: 100%;
        height: 500px;
    }

    .tabs .indicator {
        background-color: rgba(150, 150, 150, 0.27);
    }

    .vert-tab:hover {
        -moz-transform: scale(1.1);
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
        z-index: 9;
        background: white !important;
        padding: 0px 0px;
        padding-left: 15px;
        color: grey !important;
    }

    .vert-tab.active-vert {
        -moz-transform: scale(1.1);
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
        z-index: 9;
        background: white !important;
        padding: 0px 0px;
        padding-left: 15px;
        color: grey !important;
    }

    .vert-tab:hover .card {
        box-shadow: 0 15px 15px 0 rgba(0, 0, 0, 0.14), 0 15px 15px 0 rgba(0, 0, 0, 0.12), 0 3px 15px 5px rgba(0, 0, 0, 0.2);
        background-color: #fff;
    }

    .vert-tab.active-vert .card {
        box-shadow: 0 15px 15px 0 rgba(0, 0, 0, 0.14), 0 15px 15px 0 rgba(0, 0, 0, 0.12), 0 3px 15px 5px rgba(0, 0, 0, 0.2);
        background-color: #fff;
    }

    .vert-tab:hover span {
        color: rgb(25, 148, 245);
        border: none !important;
        font-size: 40px;
        margin-top: -18px !important;
    }

    .vert-tab.active-vert span {
        color: rgb(25, 148, 245);
        border: none !important;
        font-size: 40px;
        margin-top: -18px !important;
    }

    .vert-tab {
        -moz-transition: all 0.3s;
        -webkit-transition: all 0.3s;
        transition: all 0.3s;
    }

    #modal2 {
        top: 0em !important;
    }

    .az-menu .icon {
        font-size: 45px;
        height: auto;
        line-height: normal;
        padding-top: 15px;
        color: #424242;
    }

    nav ul a {
        color: #656565;
    }

    .cd-filters {
        margin-top: -2em !important;
    }
    .cd-horizontal-timeline .events a {
        color: #ffffff;
    }
    .events-content .az-title{
        color: #ffffff;
    }
    .events-content .az-pcontent {
        color: #ffffff !important;
    }
    .events-content i {
        color: #ffffff !important;
    }
    .events-content .az-btn {
        border: 2px solid #ffffff;
        display: inline-block;
        padding: 10px 25px;
        color: #ffffff;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin: 3em 0em;
    }
</style>
<style>
    @media only screen and (min-width: 601px){.row .col.offset-m1 { margin-left: 12%; } }
    @media only screen and (min-width: 601px){.row .col.offset-m2 { margin-left: 23%; }}
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
                @if($himage!="")
                <img alt="{!! $construction_content->alt !!}" src="{{ asset('assets/images/projects/') }}/{{ $himage }}">
                @else
                @if($construction_content->image!="")
                <img alt="{!! $construction_content->alt !!}" src="{{ asset('assets/images/banner/') }}/{{ $construction_content->image }}">
                @endif
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
                            <a href="#" style="color: #5a5a5a;">{{trans('words.home')}} / </a>
                            @elseif($locale=='cn')
                            <a href="#" style="color: #5a5a5a;">主页 / </a>
                            @elseif($locale=='ar')
                            <a href="#" style="color: #5a5a5a;">{{trans('words.home')}} / </a>
                            @endif

                            @if($abc=="meydan-updates")
                            <a style="font-weight: 600;">{{trans('words.Meydan Updates')}}</a>
                            @else

                            @if($locale=='en')
                            <a style="font-weight: 600;">Construction Updates</a>
                            @elseif($locale=='ar')
                            <a style="font-weight: 600;">تحديثات أعمال الإنشاء</a>
                            @elseif($locale=='cn')
                            <a style="font-weight: 600;">施工进展</a>
                            @endif
                            @endif

                            @if($locale=='ar')
                            <span class="ion-ios-arrow-left" style=""></span>
                            @endif
                        </li>
                    </ul>
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
            <div class="col s12">
                <!--<h5 class="az-title" style="font-weight: 800;">{!! $construction_content->title_en !!}</h5>-->

                @if($abc=="meydan-updates")
                <h5 class="az-title" style="font-weight: 800;">{{trans('words.Meydan Updates')}}</h5>
                @else
                <h5 class="az-title" style="font-weight: 800;">
                    @if($locale=='en')
                    {!! $construction_content->title_en !!}
                    @elseif($locale=='ar')
                    {!! $construction_content->title_ar !!}
                    @elseif($locale=='cn')
                    {!! $construction_content->title_ch !!}
                    @endif
                </h5>
                @endif
                <div class="divider az-header-divider"></div>
                <h6 class="az-title-sub">
                    @if($locale=='en')
                    {!! $construction_content->short_description_en !!}
                    @elseif($locale=='ar')
                    {!! $construction_content->short_description_ar !!}
                    @elseif($locale=='cn')
                    {!! $construction_content->short_description_ch !!}
                    @endif</h6>
                <p class="az-pcontent az-pright">
                    @if($locale=='en')
                    {!! strip_tags($construction_content->description_en) !!}
                    @elseif($locale=='ar')
                    {!! strip_tags($construction_content->description_ar) !!}
                    @elseif($locale=='cn')
                    {!! strip_tags($construction_content->description_ch) !!}
                    @endif</p>
            </div>
        </div>
    </div>

    <div class="container">
        @if($abc=="meydan-updates")
        @if($projects)
        <?php
        $i = 0;
        ?>
        @foreach($projects as $project)
        @if($project['id']=="16" || $project['id']=="10"  || $project['id']=="17")
        <?php
        if ($i % 3 == 0) {
            if ($i == 0) {
                $class = "offset-m1";
            } else {
                $class = "offset-m1";
            }
            ?>


            <div class="row hide-on-small-and-down">
                <?php
            } else {
                $class = "";
            }
            ?>

            <div class="col s12 m3 pro-holder center-align <?php echo $class; ?> ">
                <!--<a href="construction-projects/{{ $project['id'] }}">-->
                @if($project['id']=="10")
                <a href="construction-projects/{{ $project['slug_updates'] }}">
                    @endif
                    @if($project['id']=="16" || $project['id']=="17")
                    <a href="construction-projects/{{ $project['slug_updates'] }}">
                        @endif

                        <div class="card col s12 p0">

                            @if($project['image']!="")
                            <img alt="{{ $project['alt'] }}" src="{{ asset('/assets/images/projects/') }}/{{ $project['image'] }}" class="responsive-img pro-image">
                            @endif

                            <div class="col s12 title-holder">
                                @if($project['id']=="10")
                                <h5>{{trans('words.Riviera')}}</h5>
                                @else
                                <h5>{{ $project['title_en'] }}</h5>
                                @endif
                                        <!-- <h6>{{trans('words.View projects')}} <i class="icon ion-ios-arrow-right"></i></h6> -->
                                @if($locale=='en')
                                <h6>{{trans('words.View projects')}} <i class="icon ion-ios-arrow-right"></i></h6>
                                @endif

                                @if($locale=='ar')
                                <h6>{{trans('words.View projects')}} <i class="icon ion-ios-arrow-left"></i></h6>
                                @endif

                                @if($locale=='cn')
                                <h6>{{trans('words.View projects')}} <i class="icon ion-ios-arrow-right"></i></h6>
                                @endif
                            </div>
                        </div>
                    </a>
            </div>

            <?php
            $i++;
            if ($i % 3 == 0) {
                ?>
            </div>
        <?php } ?>
        @endif
        @endforeach
        @endif 
        @endif 

        @if($abc=="construction-updates")
        @if($projects)
        <?php
        $i = 0;
        ?>
        @foreach($projects as $project)
        @if($project['id']!="16"  && $project['id']!="17")
        <?php
        if ($i % 3 == 0) {
            if ($i == 0) {
                $class = "offset-m1";
            } else {
                $class = "offset-m1";
            }
            ?>
            <div class="row hide-on-small-and-down">
                <?php
            } else {
                $class = "";
            }
            ?>
            <div class="col s12 m3 pro-holder center-align <?php echo $class; ?> ">
                <!--<a href="construction-projects/{{ $project['id'] }}">-->
                <a href="{{ $project['slug_updates'] }}">
                    <div class="card col s12 p0">

                        @if($project['image']!="")
                        <img alt="{{ $project['alt'] }}" src="{{ asset('/assets/images/projects/') }}/{{ $project['image'] }}" class="responsive-img pro-image">
                        @endif

                        <div class="col s12 title-holder">
                            <h5>{{ $project['title_en'] }}</h5>
                            <!-- <h6>{{trans('words.View projects')}} <i class="icon ion-ios-arrow-right"></i></h6> -->
                            @if($locale=='en')
                            <h6>{{trans('words.View projects')}} <i class="icon ion-ios-arrow-right"></i></h6>
                            @endif

                            @if($locale=='ar')
                            <h6>{{trans('words.View projects')}} <i class="icon ion-ios-arrow-left"></i></h6>
                            @endif


                            @if($locale=='cn')
                            <h6>{{trans('words.View projects')}} <i class="icon ion-ios-arrow-right"></i></h6>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
            <?php
            $i++;
            if ($i % 3 == 0) {
                ?>
            </div>
        <?php } ?>
        @endif
        @endforeach
        @endif 
        @endif 
    </div>
    <!-- Mobile -->

    <div class="row hide-on-large-only">

        @if($abc=="meydan-updates")
        @if($projects)
        @foreach($projects as $project)

        <div class="col s12 m3 pro-holder center-align">
            @if($project['id']=="10"  || $project['id']=="17")
            <a href="construction-projects/{{ $project['slug_updates'] }}">
                @endif
                @if($project['id']=="16" )
                <a href="{{ url("/") }}/thoe-victoria-updates">
                    @endif
                    <div class="card col s12 p0">  
                        @if($project['image']!="")
                        <img alt="{{ $project['alt'] }}" src="{{ asset('assets/images/projects/') }}/{{ $project['image'] }}" class="responsive-img pro-image">
                        @endif	                        
                        <div class="col s12 title-holder">
                            <h5>{{ $project['title_en'] }}</h5>
                            <!-- <h6>{{trans('words.View projects')}} <i class="icon ion-ios-arrow-right"></i></h6> -->
                            @if($locale=='en')
                            <h6>{{trans('words.View projects')}} <i class="icon ion-ios-arrow-right"></i></h6>
                            @endif

                            @if($locale=='ar')
                            <h6>{{trans('words.View projects')}} <i class="icon ion-ios-arrow-left"></i></h6>
                            @endif

                            @if($locale=='cn')
                            <h6>{{trans('words.View projects')}} <i class="icon ion-ios-arrow-right"></i></h6>
                            @endif
                        </div>
                    </div>
                </a>
        </div>  

        @endforeach
        @endif
        @endif

        @if($abc=="construction-updates")
        @if($projects)
        @foreach($projects as $project)
        @if($project['id']!="16")
        <div class="col s12 m3 pro-holder center-align">
            <a href="{{ $project['slug_updates'] }}">
                <div class="card col s12 p0">  
                    @if($project['image']!="")
                    <img alt="{{ $project['alt'] }}" src="{{ asset('assets/images/projects/') }}/{{ $project['image'] }}" class="responsive-img pro-image">
                    @endif	                        
                    <div class="col s12 title-holder">
                        <h5>{{ $project['title_en'] }}</h5>
                        <!-- <h6>{{trans('words.View projects')}} <i class="icon ion-ios-arrow-right"></i></h6> -->

                        @if($locale=='en')
                        <h6>{{trans('words.View projects')}} <i class="icon ion-ios-arrow-right"></i></h6>
                        @endif

                        @if($locale=='ar')
                        <h6>{{trans('words.View projects')}} <i class="icon ion-ios-arrow-left"></i></h6>
                        @endif


                        @if($locale=='cn')
                        <h6>{{trans('words.View projects')}} <i class="icon ion-ios-arrow-right"></i></h6>
                        @endif
                    </div>
                </div>
            </a>
        </div>  
        @endif	
        @endforeach
        @endif
        @endif
    </div>
    <!-- End -->


</section>
<!-- End -->

@stop
@section('footer_main_scripts')

@stop
@section('footer_scripts')
<!-- filter js -->
<script src="{{asset('assets/js/jquery.mixitup.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

<!-- Timeline -->
<script type="text/javascript" src="{{asset('assets/js/timeline-main.js')}}"></script>
@stop
