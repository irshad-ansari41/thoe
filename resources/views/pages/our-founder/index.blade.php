@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<!-- Time line css -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/timeline_style.css')}}">
<style>.parallax-container .parallax img {    top: initial;}.cd-horizontal-timeline .timeline {position: relative;height: 100px;margin: 0 auto;width: 60%;}</style>
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
                <?php
                if ($og_pic != "") {
                    ?>
                    <img alt="Our-Founder" src="{{$og_pic}}">
                <?php } ?>		
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

                            <!-- <a style="font-weight: 600;">Our founder</a> -->
                            @if($locale=='en')
                            <a href="{{ url('/') }}" style="color: #5a5a5a;">{{trans('words.home')}} / </a>
                            <a style="font-weight: 600;">Our founder</a>
                            @elseif($locale=='ar')
                            <a href="{{ url('/') }}" style="color: #5a5a5a;">{{trans('words.home')}} / </a>
                            <a style="font-weight: 600;">??????</a>
                            @elseif($locale=='cn')
                            <a href="{{ url('/') }}" style="color: #5a5a5a;">?? / </a>
                            <a style="font-weight: 600;">AZIZI???????</a>
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
    <div class="container">

        <div class="row" style="margin-bottom: 2em;">


            <div class="col s12 m12">
                <div class="desig-person m0" style="line-height: 30px;font-weight: 100;">


                    <div class="desig-person mt0">

                    </div>
                    <div class="">



                        <div class="row" style="margin-bottom: 2em;">


                            <div class="col s12 m12">
                                <div class="desig-person m0" style="line-height: 30px;font-weight: 100;">


                                    <div class="desig-person mt0">
                                        <div class="person-name">@if($locale=='en')
                                            {{$content->title_en}}
                                            @elseif($locale=='ar')
                                            {{$content->title_ar}}
                                            @elseif($locale=='cn')
                                            {{$content->title_ch}}
                                            @endif</div>
                                    </div>

                                    <i style="font-size: 17px;line-height: 0;letter-spacing: 1px;text-transform: inherit;color: black;">
                                        @if($locale=='en')
                                        {{$content->short_description_en}}
                                        @elseif($locale=='ar')
                                        {{$content->short_description_ar}}

                                        @elseif($locale=='cn')
                                        {{$content->short_description_ch}}

                                        @endif</i>
                                </div>


                            </div>
                        </div>
                        @if($locale=='en')
                        {!! $content->description_en !!}
                        @elseif($locale=='ar')
                        {!! $content->description_ar !!}

                        @elseif($locale=='cn')
                        {!! $content->description_ch !!}

                        @endif




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
