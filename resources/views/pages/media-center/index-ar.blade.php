@extends('layouts/default')

<!-- page level styles -->
@section('header_styles')

@stop

@section('main_div_wrapper')
@stop

@section('section_content')
<!-- Header -->
<section class="az-section">
    <div class="container">
        <div class="parallax-container valign-wrapper only-heading">
            <div class="parallax">
                @if($content['image']!="")
                <img alt="<?= trim($content['alt']) ?>" src="<?= asset('assets/images/banner/') ?>/<?= $content['image'] ?>" >
                @else
                <img alt="<?= trim($content['alt']) ?>" src="https://pbs.twimg.com/media/DJnPBzPXkAAIvKI.jpg">
                @endif
            </div>
            <div class="col s12 center-align card tag-pro-ar ">
                <h1><?= $content->short_description_ar ?></h1>
                <!--<p><i class="ion ion-ios-location-outline" class="text-bold-900"></i></p>-->
            </div>
        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <?= generate_breadcrumb([url("$locale") => trans('words.home'), '' => 'المركز الاعلامي']) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Title heading -->
        <div class="row">
            <div class="col s12 m12 short-desc">
                <?= $content->description_ar ?>
            </div>
        </div>
        <!-- end -->

        <!-- Media -->
         <div class="row margin-b-5rem">
            @if($medias)
            @foreach($medias as $media)
            <div class="col s12 m3 pro-holder center-align">
                <div class="card col s12 p0">
                    <a href="<?= url("/") ?>/<?php echo $locale ?>/<?= $media['link'] ?>">
                        <img alt="<?= $media['title'] ?>" src="<?= asset('assets/images/media/') ?>/<?= $media['image'] ?>" 
                             class="responsive-img pro-image">
                        <div class="col s12 title-holder">                           
                            <h5><?= trans('words.' . trim($media['title'])) ?></h5>
                            <h6><?= trans('words.view_more') ?></h6>
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
