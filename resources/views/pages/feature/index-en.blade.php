@extends('layouts/default')

@section('title')
About us
@parent
@stop

@section('header_styles')

@stop

@section('breadcrumbs')
<nav class="breadcrumbs">
    <div class="container">
        <?= generate_breadcrumb([url("/$locale") => 'home', '' => 'Features',]) ?>
    </div>
</nav>
@stop

@section('content')
<div class="center">
    <div class="container">
        <div class="row">
            <div class="site site--main">
                <header class="site__header">
                    <h1 class="site__title">Features</h1>
                </header>
                <div class="site__main">
                    <div class="widget js-widget widget--main widget--no-margin">
                        <div class="widget__content">
                            <br/>
                            <div class="listing listing--grid">
                                <?php
                                foreach ($features as $feature) {
                                    $feature = (array) $feature;
                                    ?>
                                    <div class="listing__item">
                                        <div class="properties properties--grid">
                                            <div class="properties__thumb"><a href="<?= url("$locale/features/{$feature['slug']}") ?>" class="item-photo">
                                                    <img src="<?= asset("uploads/feature/{$feature['image']}") ?>" alt=""/>
                                                    <figure class="item-photo__hover item-photo__hover--params">
                                                        <!--<span class="properties__intro"><?= str_limit($feature['content'], 35) ?> Read more!</span>-->
                                                    </figure></a>
                                            </div>
                                            <!-- end of block .properties__thumb-->
                                            <div class="properties__details">
                                                <div class="properties__info">
                                                    <a href="<?= url("$locale/features/{$feature['slug']}") ?>" class="properties__address">
                                                        <span class="properties__address-street"><?= $feature['title'] ?></span>
                                                        <span class="properties__intro"><?= str_limit($feature['content'], 35) ?> Read more!</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- end of block .properties__info-->
                                        </div>
                                        <!-- end of block .properties__item-->
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END site-->
            </div>
            <!-- END Site-->

            @include('pages.feature.sidebar')

            <div class="clearfix"></div>
        </div>
    </div>
</div>
@stop


@section('footer_scripts')

@stop

