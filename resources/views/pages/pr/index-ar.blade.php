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
        <?= generate_breadcrumb([url("/$locale") => 'home', url("/$locale/news-pr") => 'News & PR']) ?>
    </div>
</nav>
@stop

@section('content')
<div class="center">
    <div class="container">
        <div class="row">
            <div class="site site--main">
                <header class="site__header">
                    <h1 class="site__title">News & PR</h1>
                </header>
                <div class="site__main">
                    <div class="widget js-widget widget--main widget--no-margin">
                        <div class="widget__content">
                            <div class="listing listing--list listing--article">
                                <?php
                                $press_arr = $presss->toArray();

                                foreach ($press_arr['data'] as $press) {
                                    $press = (array) $press;

                                    $month = date_format(date_create($press['date']), 'M');
                                    $day = date_format(date_create($press['date']), 'd');
                                    $year = date_format(date_create($press['date']), 'Y');
                                    $categories = get_category_name($press['category']);
                                    ?>
                                    <div class="listing__item">
                                        <article class="article--list">
                                            <div class="article__item-header">
                                                <time datetime="<?= $press['date'] ?>" class="article__time text-uppercase"><?= $month ?><strong><?= $day ?></strong></time>
                                                <div class="article__item-info">
                                                    <h3 class="article__item-title"><a href="<?= url("/$locale/news-pr/{$press['slug']}") ?>"><?= $press['title_' . $locale] ?></a></h3>
                                                    <div class="article__tags">Category:
                                                        <?php foreach ($categories as $category) { ?>
                                                            <a href="<?= url("/{$locale}/news-pr?category={$category->id}") ?>"><?= $category->title ?></a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <br/><?= $press['description_' . $locale] ?>
                                            <div class="clearfix"></div>
                                            <div class="article__preview">
                                                <?php
                                                $images = !empty($press['image']) ? explode(',', $press['image']) :  ['empty.png' ];
                                                if (!empty($press['youtube'])) {
                                                    ?>
                                                    <div><iframe width="853" height="480" src="<?= $press['youtube'] ?>" allowfullscreen></iframe></div>
                                                    <?php
                                                } else if (count($images) >= 1) {
                                                    ?>
                                                    <div class="slider slider--small slider--small js-slick-blog">
                                                        <div class="slider__block js-slick-slider">
                                                            <?php foreach (array_filter($images) as $image) { ?>
                                                                <div class="slider__item">
                                                                    <a href="<?= asset("/assets/images/pressrelease/{$image}") ?>" data-size="1168x550" class="slider__img js-gallery-item">
                                                                        <img data-lazy="<?= asset('assets/images/empty.png') ?>" src="<?= asset("/assets/images/pressrelease/{$image}") ?>" alt="">
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
                                                <?php } else if (!empty($images[0])) { ?>
                                                    <a href="#" class=""><img src="<?= asset("/assets/images/pressrelease/{$images[0]}") ?>" alt=""></a>
                                                <?php } ?>
                                            </div>
                                            <div class="article__intro">
                                                <p><?= str_limit($press['description_' . $locale], 65) ?></p>
                                            </div><a href="<?= url("/$locale/news-pr/{$press['slug']}") ?>" class="article__more">Read more</a>
                                        </article>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="site__footer">
                        <!-- BEGIN PAGINATION-->
                        <nav class="listing__pagination">
                            <?= $presss->links() ?>
                        </nav>
                        <!-- END PAGINATION-->
                    </div>
                </div>
            </div>
            <!-- END Site-->

            @includeIf('pages.pr.sidebar')

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- END CENTER SECTION-->
@stop


@section('footer_scripts')

@stop



