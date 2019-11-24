@extends('layouts/default')

<!-- page level styles -->
@section('header_styles')

<style>.parallax-container .parallax img {top: auto !important;}</style>

@stop

@section('main_div_wrapper')
@stop

@section('section_content')
<!-- Header -->
<section class="az-section">

    <div class="container">
        <div class="parallax-container valign-wrapper">
            <div class="parallax">
                @if($content['image']!="")
                <img alt="<?= trim($content['alt']) ?>" src="<?= asset('assets/images/banner/') ?>/<?= $content['image'] ?>" >
                @else
                <img alt="<?= trim($content['alt']) ?>" src="https://pbs.twimg.com/media/DJnPBzPXkAAIvKI.jpg">
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
                            <a href="#" style="color: #5a5a5a;"><?= trans('words.home') ?> / </a>
                            @elseif($locale=='ar')
                            <a href="#" style="color: #5a5a5a;"><?= trans('words.home') ?> / </a>
                            @elseif($locale=='cn')
                            <a href="#" style="color: #5a5a5a;">主页 / </a>
                            @endif

                            @if($locale=='en')
                            <a style="font-weight: 600;"><?= $content['title_en'] ?></a>
                            @elseif($locale=='ar')
                            <a style="font-weight: 600;">المركز الاعلامي</a>
                            @elseif($locale=='cn')
                            <a style="font-weight: 600;">媒体中心</a>
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

        <!-- Title heading -->

        <div class="row">
            <div class="col s12 m12">
                <h5 class="title-uppercase mt0"><?= $content['short_description_en'] ?></h5>
                <p class="az-pcontent"><?= $content['description_en'] ?></p>

            </div>
        </div>
        <!-- end -->

        <!-- Media -->
        <div class="row" style="margin-bottom: 5em;">
            @if($medias)
            @foreach($medias as $media)
            <div class="col s12 m3 pro-holder center-align">
                <div class="card col s12 p0">
                    <a href="<?= url("/") ?>/<?php echo $locale ?>/<?= $media['link'] ?>">
                        <img alt="<?= $media['title'] ?>" src="<?= asset('assets/images/media/') ?>/<?= $media['image'] ?>" 
                             class="responsive-img pro-image">
                        <div class="col s12 title-holder">
                            <h5><?= $media['title'] ?></h5>
                            <h6 style="font-size:13px;"><?= trans('words.view_more') ?><i class="icon ion-ios-arrow-right"></i></h6>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            @endif	

        </div>
        <!-- end -->

    </div>

</section>
<!-- End -->
@stop
@section('footer_main_scripts')

@stop
@section('footer_scripts')
@stop
