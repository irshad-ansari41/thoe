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
        <?= generate_breadcrumb([url("/$locale") => 'home', url("/$locale/media-gallery") => 'Media Gallery', url("/$locale/media-gallery/image-gallery") => 'Image Gallery']) ?>
    </div>
</nav>
@stop

@section('content')
<div class="center">
    <div class="container">
        <div class="row">
            <div class="site">
                <header class="site__header">
                    <h1 class="site__title">Image Gallery</h1>
                </header>
                <div class="site__main">
                    <div class="widget js-widget widget--main widget--no-margin">
                        <div class="widget__content">
                            <!-- BEGIN PROPERTIES INDEX-->
                            <div class="tab tab--properties">
                                <!-- Nav tabs-->
                                <br/>
                                <p><?= $content['description_' . $locale] ?></p>
                                <br/>
                                <!-- Tab panes-->
                                <div class="tab-content">
                                    <div id="tab-features" class="tab-pane in active">

                                        <div class="listing listing--grid">
                                            <?php
                                            $image_galleries_arr = $image_galleries->toArray();
                                            foreach ($image_galleries_arr['data'] as $gallery) {
                                                $gallery = (array) $gallery;
                                                ?>
                                                <div class="listing__item">
                                                    <div class="properties properties--grid">
                                                        <div class="properties__thumb"><a href="<?= url("/$locale/image-gallery/{$gallery['slug']}") ?>" class="item-photo"><img src="<?= asset("assets/images/media/{$gallery['path']}/{$gallery['holder_image']}") ?>" alt=""/>
                                                                <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro"><?= str_limit($gallery['short_description_' . $locale], 35) ?></span>
                                                                </figure></a>
                                                        </div>
                                                        <!-- end of block .properties__thumb-->
                                                        <div class="properties__details">
                                                            <div class="properties__info"><a href="<?= url("/$locale/image-gallery/{$gallery['slug']}") ?>" class="properties__address"><span class="properties__address-street"><?= $gallery['gallery_title_' . $locale] ?></span></a>
                                                                <div class="properties__offer">
                                                                    <div class="properties__offer-column">
                                                                        <div class="properties__offer-label"><?= date_format(date_create($gallery['created']), 'd F Y') ?></div>
                                                                    </div>
                                                                </div>
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
                        </div>
                    </div>
                    <div class="site__footer">
                        <!-- BEGIN PAGINATION-->
                        <nav class="listing__pagination">
                            <?= $image_galleries->links() ?>
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



