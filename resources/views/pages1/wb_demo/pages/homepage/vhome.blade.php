@extends('layouts.newtemp.newapp')
@section('content')

@if(!empty($Sliders)) 
<!--Main Banner Slider / Extended-->
<section class="main-banner-slider extended">
    <div class="slider-container">
        <div class="main-slider">

            <!--Side Item-->
            @foreach($Sliders as $slide) 
            <div class="slide-item" 
                 style="background-image:url({{asset('assets/new_wb_layout/images/main-slider/1.jpg')}});">
                <div class="overlay-layer"></div>

                <div class="auto-container">
                    <div class="content-box bordered-layer">
                        <h2>Ready to move-in homes</h2> 
                        <div class="text-content">Accross our wide range of properties.</div>
                        <a href="#" class="theme-btn btn-style-slider">Explore more</a>
                        <a href="#" class="theme-btn btn-style-slider">Register Interest</a>
                    </div>

                    <!--Search Style One-->
                    <div class="search-style-one">
                        <div class="search-outer">
                            <div class="form-box search-form">
                                <form method="post" action="property-grid.html">
                                    <div class="row clearfix">
                                        <!--Form Group-->
                                        <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                            <div class="field-title">Full Name</div>
                                            <div class="field-inner">
                                                <input class="inputtext" type="text" name="username" 
                                                       value="" placeholder="John Carter" required>
                                            </div>
                                        </div>
                                        <!--Form Group-->
                                        <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                            <div class="field-title">Email Address</div>
                                            <div class="field-inner">
                                                <input class="inputtext" type="email" name="username" 
                                                       value="" placeholder="name@name.com" required>
                                            </div>
                                        </div>
                                        <!--Form Group-->
                                        <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                            <div class="field-title">Mobile Number</div>
                                            <div class="field-inner">
                                                <input class="inputtext" type="text" name="username" 
                                                       value="" placeholder="+97150" required>
                                            </div>
                                        </div>
                                        <!--Form Group-->
                                        <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                            <div class="field-title">Select Community</div>
                                            <div class="field-inner">
                                                <select class="custom-select-box">
                                                    <option>Meydan - Thoe Victoria</option>
                                                    <option>Meydan - Thoe Riveria</option>
                                                    <option>Al Furjan</option>
                                                    <option>Dubai Healthcare City</option>
                                                    <option>Palm Jumeirah</option>
                                                    <option>Jabel Ali</option>
                                                    <option>Sports City</option>
                                                    <option>Studio City</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--Form Group-->
                                        <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                            <div class="field-title">Apartment Type</div>
                                            <div class="field-inner">
                                                <select class="custom-select-box">
                                                    <option>Studio Apartment</option>
                                                    <option>One Bedroom Apartment</option>
                                                    <option>Two Bedroom Apartment</option>
                                                    <option>Three Bedroom Apartment</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--Form Group-->
                                        <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                            <div class="field-title">Your Budget</div>
                                            <div class="field-inner">
                                                <select class="custom-select-box">
                                                    <option>AED 400K - 900K</option>
                                                    <option>AED 1M - 1.5M</option>
                                                    <option>AED 1.5M - 2M</option>
                                                    <option>AED 2M - 2.5M</option>
                                                    <option>AED 2.5M - 3M</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--Form Group-->
                                        <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                            <div class="field-title">&nbsp;</div>
                                            <div class="field-inner text-right">
                                                <button class="theme-btn btn-style-six">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!--Search Style One-->

                </div>
            </div>
            <!--Side Item-->
            @endforeach 
        </div>
</section>
<!-- End Sliders-->
@endif

@if(!empty($FeatureBanner)) 
<!--Gallery Section Two-->
<section class="gallery-section-two">
    <div class="outer-container">
        <!--Title Style One-->
        <div class="title-style-one extended centered">
            <div class="title"><h2>Explore Our Projects</h2></div>
            <div class="sub-title">Dubai, United Arab Emirates</div>
        </div>
        <!--Fluid Gallery Carousel-->
        <div class="fluid-gallery-carousel">
            @foreach($FeatureBanner as $featurebanner)
            <!--Slide Item-->
            <div class="slide-item">
                <div class="inner-box">
                    <figure class="image-box">
                        <!--img src="{{asset('assets/images/home_banners/'.$featurebanner->banner_image) }}" alt=""-->
                        <img alt="gallery" src="{{asset('assets/new_wb_layout/images/gallery/victoria-01.png') }}" alt="">
                    </figure>
                    <div class="overlay"></div>
                    <!-- h2 class="big-title">Meydan</h2 -->
                    <div class="lower-content">
                        <h3>{{$featurebanner->banner_title_en}} <span class="theme_color"></span></h3>
                        <div class="text">{{$featurebanner->banner_short_description_en}} </div>
                    </div>
                    <!--a href="{{asset('assets/images/home_banners/'.$featurebanner->banner_image) }}" 
                       class="lightbox-image image-link" title="Image Caption" 
                       data-fancybox-group="full-gallery"><span class="fa fa-search"></span>
                    </a-->
                    <a href="{{asset('assets/new_wb_layout/images/gallery/7.jpg') }}" class="lightbox-image image-link" 
                    title="Image Caption" data-fancybox-group="full-gallery">
                        <span class="fa fa-search"></span>
                    </a>                    
                </div>
            </div>
            @endforeach
            
        </div>

    </div>

</section>
<!--end ImageGallery-->
@endif

@endsection
