@extends('layouts/default')

@section('title')
Events
@parent
@stop

@section('header_styles')

@stop

@section('breadcrumbs')
<nav class="breadcrumbs">
    <div class="container">
        <?= generate_breadcrumb([url("/$locale") => 'home', url("/$locale/media-gallery") => 'Media Gallery', url("/$locale/video-gallery") => 'Video Gallery', '' => $gallery['gallery_title_' . $locale],]) ?>
    </div>
</nav>
@stop

@section('content')
<?php
$gallery = (array) $gallery;
?>
<div class="center">
    <div class="container">
        <div class="row">
            <div class="site">
                <header class="site__header">
                    <h1 class="site__title"><?= $gallery['gallery_title_' . $locale] ?></h1>
                </header>
                <div class="site__main">
                    <div class="widget js-widget widget--main widget--no-margin">
                        <div class="widget__content">
                            <article class="article article--list article--details">
                                <div class="article__body">
                                    <?= $gallery['short_description_' . $locale] ?><br/>
                                    <?php $img = explode("v=", $gallery['image']); ?>
                                    <iframe width="853" height="480" src="https://www.youtube.com/embed/<?= trim(!empty($img[1]) ? $img[1] : '') ?>?rel=0" allow="autoplay; encrypted-media"  frameborder="0" allowfullscreen></iframe><br/>
                                    <br/>
                                    <?= $gallery['gallery_long_title_' . $locale] ?>
                                </div>
                                <div class="article__footer">
                                    <div class="social social--article"><span>Share on social:</span><a href="#" class="social__item"><i class="fa fa-facebook"></i></a><a href="#" class="social__item"><i class="fa fa-twitter"></i></a></div>
                                </div>
                            </article>
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

@stop



