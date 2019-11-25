@extends('layouts/default')

@section('title')
Events
@parent
@stop

@section('header_styles')
<link rel="stylesheet" href="{{asset('frontend-assets/css/jquery.circliful.css')}}">
<style>
    .card {
        position: relative;
        margin: .5rem 0 1rem 0;
        background-color: #fff;
        -webkit-transition: -webkit-box-shadow .25s;
        transition: -webkit-box-shadow .25s;
        transition: box-shadow .25s;
        transition: box-shadow .25s, -webkit-box-shadow .25s;
        border-radius: 2px;
        text-align: center;
        -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
        box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
    }
    h4{margin: 0}
    .delivery-section{height: 250px;}
    .delivery-section span{background: #9E844E;
                           margin: 10px;font-size: 22px;display: block;
                           color: #fff;}
    </style>
    @stop

    @section('breadcrumbs')
    <nav class="breadcrumbs">
    <div class="container">
        <?= generate_breadcrumb([url("/$locale") => 'home', url("/$locale/construction-updates") => 'Construction Update', url("/$locale/construction-updates/$project->slug") => $project['title_' . $locale], '' => $property['title_' . $locale]]) ?>
    </div>
</nav>
@stop

@section('content')
<?php
$month = date_format(date_create($property['plan_end_date']), 'M');
$day = date_format(date_create($property['plan_end_date']), 'd');
$year = date_format(date_create($property['plan_end_date']), 'Y');
?>
<div class="center">
    <div class="container">
        <div class="row">
            <div class="site">
                <header class="site__header">
                    <h1 class="site__title"><?= $property['title_' . $locale] ?></h1>
                </header>
                <div class="site__main">
                    <div class="widget js-widget widget--main widget--no-margin">
                        <div class="widget__content">
                            </br></br>
                            <div class="block-grid-md-5">
                                <div class="block-grid-item">
                                    <div class="article article--grid card">
                                        <div class="progress-circle-mobilization"></div>
                                        <h4>Mobilization</h4><br/>
                                    </div>
                                </div>

                                <div class="block-grid-item ">
                                    <div class="article article--grid card">
                                        <div class="progress-circle-mep"></div>
                                        <h4>MEP</h4><br/>
                                    </div>
                                </div>

                                <div class="block-grid-item ">
                                    <div class="article article--grid card">
                                        <div class="progress-circle-finishes"></div>
                                        <h4>Finishes</h4><br/>
                                    </div>
                                </div>

                                <div class="block-grid-item ">
                                    <div class="article article--grid card">
                                        <div class="progress-circle-overall"></div>
                                        <h4>Overall</h4><br/>
                                    </div>
                                </div>

                                <div class="block-grid-item">
                                    <div class="article article--grid card">
                                        <div class="delivery-section">
                                            <br/>
                                            <span>Delivery<br/> Date</span>
                                            <br/>
                                            <span><?= $day ?> <?= $month ?> <?= $year ?></span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="listing listing--list listing--article">

                                <div class="listing__item">
                                    <article class="article--list">

                                        <div class="article__preview">
                                            <div class="slider slider--small slider--small js-slick-blog">
                                                <div class="slider__block js-slick-slider">
                                                    <?php
                                                    foreach ($galleries as $gal) {
                                                        $src = asset('assets/images/properties/') . '/' . $project->gallery_location . '/' . $property->gallery_location . '/construction-update/' . $gal->image
                                                        ?>
                                                        <div class="slider__item">
                                                            <a href="<?= $src ?>" data-size="1168x550" class="slider__img js-gallery-item">
                                                                <img data-lazy="<?= asset('frontend-assets/media-demo/properties/1740x960/02.jpg') ?>" src="<?= $src ?>" alt="">
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="slider__controls">
                                                    <button type="button" class="slider__control slider__control--prev js-slick-prev">
                                                        <svg class="slider__control-icon">
                                                        <use xlink:href="#icon-arrow-left"></use>
                                                        </svg>
                                                    </button><span class="slider__current js-slick-current">1 /</span><span class="slider__total js-slick-total">3</span>
                                                    <button type="button" class="slider__control slider__control--next js-slick-next">
                                                        <svg class="slider__control-icon">
                                                        <use xlink:href="#icon-arrow-right"></use>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="site__footer">
                        <!-- BEGIN PAGINATION-->
                        <nav class="listing__pagination">

                        </nav>
                        <!-- END PAGINATION-->
                    </div>
                </div>
            </div>
            <!-- END Site-->
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- END CENTER SECTION-->
@stop


@section('footer_scripts')
<script src="{{asset('frontend-assets/js/jquery.circliful.js')}}"></script>
<script>
$(document).ready(function () {

    $('.progress-circle-mobilization').empty();
    $('.progress-circle-mobilization').circliful({
        animation: 1,
        animationStep: 5,
        foregroundBorderWidth: 15,
        backgroundBorderWidth: 15,
        percent: '<?= $property->mobilization_percentage ?>',
        textSize: 28,
        textStyle: 'font-size: 12px;',
        textColor: '#666',
    }
    );
    $('.progress-circle-structure').empty();
    $('.progress-circle-structure').circliful({
        animation: 1,
        animationStep: 5,
        foregroundBorderWidth: 15,
        backgroundBorderWidth: 15,
        percent: '<?= $property->structure_percentage ?>',
        textSize: 28,
        textStyle: 'font-size: 12px;',
        textColor: '#666',
    }
    );
    $('.progress-circle-mep').empty();
    $('.progress-circle-mep').circliful({
        animation: 1,
        animationStep: 5,
        foregroundBorderWidth: 15,
        backgroundBorderWidth: 15,
        percent: '<?= $property->mep_percentage ?>',
        textSize: 28,
        textStyle: 'font-size: 12px;',
        textColor: '#666',
    }
    );
    $('.progress-circle-finishes').empty();
    $('.progress-circle-finishes').circliful({
        animation: 1,
        animationStep: 5,
        foregroundBorderWidth: 15,
        backgroundBorderWidth: 15,
        percent: '<?= $property->finishes_percentage ?>',
        textSize: 28,
        textStyle: 'font-size: 12px;',
        textColor: '#666',
    }
    );
    $('.progress-circle-overall').empty();
    $('.progress-circle-overall').circliful({
        animation: 1,
        animationStep: 5,
        foregroundBorderWidth: 15,
        backgroundBorderWidth: 15,
        percent: '<?= $property->total_completion ?>',
        textSize: 28,
        textStyle: 'font-size: 12px;',
        textColor: '#666',
    }
    );
});
</script>
@stop



