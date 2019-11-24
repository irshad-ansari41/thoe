@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
@stop

@section('main_div_wrapper')

@stop
@section('section_content')

<section class="az-section">

    <div class="container">
        <div class="parallax-container valign-wrapper">
            <div class="parallax">
                @if($content->image!="")
                <img alt="banner" src="{{ url('/') }}/public/assets/images/banner/{{ $content->image }}" >
                @endif
            </div>
        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <ul>
                        <li>
                            <span class="ion-ios-arrow-left" style=""></span>
                            <a href="#" style="color: #5a5a5a;">Home / </a>
                            <a style="font-weight: 600;">{!! $content->title_en !!}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container">

        <div class="row">
            <div class="col s12 m10">
                <h5 class="title-uppercase">{!! $content->short_description_en !!}</h5>

                <p class="az-pcontent">{!! $content->description_en !!}</p>

            </div>
        </div>




        <!-- Initiative -->
        <div class="row" style="margin-top:3rem;">

            <div class="col s12">
                <div class="parallax-container">
                    <div class="parallax">
                        @if($content->banner_image!="")
                        <img alt="banner"  src="{{ url('/') }}/public/assets/images/banner/{{ $content->banner_image }}" alt="{{ $content->banner_image_alt }}">
                        @endif
                    </div>

                </div>
            </div>

            <div class="col s12">
                <h5>{!! $content->title_en !!}</h5>
                <div class="divider az-header-divider"></div>
                <p class="az-pcontent">{!! $content->description_en !!}</p>
            </div>
        </div>
        <!-- end -->




        <!-- Our process -->
        <div class="row">
            <div class="col s12 m2">
                <h5>{!! $content->recruitment_title_en !!}</h5>
                <div class="divider az-header-divider"></div>
                <p class="az-pcontent">{!! $content->recruitment_description_en !!}</p>
            </div>
            <div class="col s12 m9 offset-m1" style="margin-top: 3rem;">
                <!-- <p class="az-pcontent">At Azizi, we aim to be completely fair and consistent with every candidate. All applications are screened based on our job requirements and when we feel that the fit is right, we’ll contact you. </p> -->
                @if(!empty($steps))
                @foreach($steps as $step)
                <div class="row">
                    <div class="col s12">
                        <div class="desig-person m0">
                            <div class="person-name">{!! $step->title_en !!}</div>
                            <i>{!! $step->short_description_en !!}</i>
                            <p class="az-pcontent">{!! $step->long_description_en !!}</p>

                        </div>
                    </div>
                </div>
                @endforeach
                @endif


            </div>
        </div>
        <!-- end -->

        

        <!-- Current openings highlighted -->
        <div class="row" style="margin-bottom: 5em;">
            <div class="col s12 m2">
                <h5>{!! $content->opening_title_en !!}</h5>
                <div class="divider az-header-divider"></div>
                <p class="az-pcontent">{!! $content->opening_description_en !!}</p>
            </div>
            <div class="col s12 m10" style=" margin-top: 2rem;">

                @if(!empty($jobs))
                @foreach($jobs as $job)
                <div class="col s12 m3">
                    <div class="col s12 card" style="padding: 1em;">
                        <div class="desig-person m0">
                            <div class="person-name" style="font-size: 1.2rem;line-height: 20px;">{!! $job->title_en !!}</div>
                            <p class="az-pcontent" style="    font-size: 13px;">{!! $job->short_description_en !!}</p>
                            <a href="{!! $job->page_link !!}" style="font-size: 12px;text-decoration: underline;color: grey;">Read more</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

                <!-- view more jobs -->
                <div class="col s12 m3">
                    <div class="col s12" style="padding-top: 2em;">
                        <p class="az-pcontent">{!! $content->find_more_job_title_en !!}</p>
                        <a href="{!! $content->more_jobs_button_link !!}" class="inquire az-btn active" style="margin: 0;">{!! $content->more_jobs_button_text !!}</a>
                    </div>
                </div>
                <!-- end -->

            </div>
        </div>
        <!-- End -->

    </div>
    <!-- End -->

</section>
@stop
@section('footer_main_scripts')

@stop
@section('footer_scripts')
@stop
