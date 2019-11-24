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
        <?= generate_breadcrumb([url("/$locale") => 'home', url("/$locale/media-gallery") => 'Media Gallery']) ?>
    </div>
</nav>
@stop

@section('content')
<div class="center">
    <div class="container">
        <div class="row">
            <div class="site">
                <header class="site__header">
                    <h1 class="site__title">Media Gallery</h1>
                </header>
                <div class="site__main">
                    <div class="widget js-widget widget--main widget--no-margin">
                        <div class="widget__content">
                            <!-- BEGIN PROPERTIES INDEX-->
                            <div class="tab tab--properties">
                                <!-- Nav tabs-->
                                <ul role="tablist" class="nav tab__nav">
                                    <li class="active"><a href="#tab-features" aria-controls="tab-popular" role="tab" data-toggle="tab" class="properties__btn js-pgroup-tab">Image Gallery</a></li>
                                    <li><a href="#tab-projects" aria-controls="tab-recent" role="tab" data-toggle="tab" class="properties__btn js-pgroup-tab">Video Gallery</a></li>
                                </ul>
                                <!-- Tab panes-->
                                <div class="tab-content">
                                    <div id="tab-features" class="tab-pane in active">
                                        <div class="listing listing--grid">
                                            <div class="listing__item">
                                                <div class="properties properties--grid">
                                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/01.jpg" alt=""/>
                                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                                            </figure></a>
                                                    </div>
                                                    <!-- end of block .properties__thumb-->
                                                    <div class="properties__details">
                                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Portofino Launch Event</span></a>
                                                            <div class="properties__offer">
                                                                <div class="properties__offer-column">
                                                                    <div class="properties__offer-label">20 November 2019</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end of block .properties__info-->
                                                </div>
                                                <!-- end of block .properties__item-->
                                            </div>
                                            <div class="listing__item">
                                                <div class="properties properties--grid">
                                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/02.jpg" alt=""/>
                                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                                            </figure></a>
                                                    </div>
                                                    <!-- end of block .properties__thumb-->
                                                    <div class="properties__details">
                                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Portofino Launch Event</span></a>
                                                            <div class="properties__offer">
                                                                <div class="properties__offer-column">
                                                                    <div class="properties__offer-label">20 November 2019</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end of block .properties__info-->
                                                </div>
                                                <!-- end of block .properties__item-->
                                            </div>
                                            <div class="listing__item">
                                                <div class="properties properties--grid">
                                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/03.jpg" alt=""/>
                                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                                            </figure></a>
                                                    </div>
                                                    <!-- end of block .properties__thumb-->
                                                    <div class="properties__details">
                                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Portofino Launch Event</span></a>
                                                            <div class="properties__offer">
                                                                <div class="properties__offer-column">
                                                                    <div class="properties__offer-label">20 November 2019</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end of block .properties__info-->
                                                </div>
                                                <!-- end of block .properties__item-->
                                            </div>
                                            <div class="listing__item">
                                                <div class="properties properties--grid">
                                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/04.jpg" alt=""/>
                                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                                            </figure></a>
                                                    </div>
                                                    <!-- end of block .properties__thumb-->
                                                    <div class="properties__details">
                                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Portofino Launch Event</span></a>
                                                            <div class="properties__offer">
                                                                <div class="properties__offer-column">
                                                                    <div class="properties__offer-label">20 November 2019</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end of block .properties__info-->
                                                </div>
                                                <!-- end of block .properties__item-->
                                            </div>
                                            <div class="listing__item">
                                                <div class="properties properties--grid">
                                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/05.jpg" alt=""/>
                                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                                            </figure></a>
                                                    </div>
                                                    <!-- end of block .properties__thumb-->
                                                    <div class="properties__details">
                                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Portofino Launch Event</span></a>
                                                            <div class="properties__offer">
                                                                <div class="properties__offer-column">
                                                                    <div class="properties__offer-label">20 November 2019</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end of block .properties__info-->
                                                </div>
                                                <!-- end of block .properties__item-->
                                            </div>
                                            <div class="listing__item">
                                                <div class="properties properties--grid">
                                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/06.jpg" alt=""/>
                                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                                            </figure></a>
                                                    </div>
                                                    <!-- end of block .properties__thumb-->
                                                    <div class="properties__details">
                                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Portofino Launch Event</span></a>
                                                            <div class="properties__offer">
                                                                <div class="properties__offer-column">
                                                                    <div class="properties__offer-label">20 November 2019</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end of block .properties__info-->
                                                </div>
                                                <!-- end of block .properties__item-->
                                            </div>
                                            <div class="listing__item">
                                                <div class="properties properties--grid">
                                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/02.jpg" alt=""/>
                                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                                            </figure></a>
                                                    </div>
                                                    <!-- end of block .properties__thumb-->
                                                    <div class="properties__details">
                                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Portofino Launch Event</span></a>
                                                            <div class="properties__offer">
                                                                <div class="properties__offer-column">
                                                                    <div class="properties__offer-label">20 November 2019</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end of block .properties__info-->
                                                </div>
                                                <!-- end of block .properties__item-->
                                            </div>
                                            <div class="listing__item">
                                                <div class="properties properties--grid">
                                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/03.jpg" alt=""/>
                                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                                            </figure></a>
                                                    </div>
                                                    <!-- end of block .properties__thumb-->
                                                    <div class="properties__details">
                                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Portofino Launch Event</span></a>
                                                            <div class="properties__offer">
                                                                <div class="properties__offer-column">
                                                                    <div class="properties__offer-label">20 November 2019</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end of block .properties__info-->
                                                </div>
                                                <!-- end of block .properties__item-->
                                            </div>
                                            <div class="listing__item">
                                                <div class="properties properties--grid">
                                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/04.jpg" alt=""/>
                                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                                            </figure></a>
                                                    </div>
                                                    <!-- end of block .properties__thumb-->
                                                    <div class="properties__details">
                                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Portofino Launch Event</span></a>
                                                            <div class="properties__offer">
                                                                <div class="properties__offer-column">
                                                                    <div class="properties__offer-label">20 November 2019</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end of block .properties__info-->
                                                </div>
                                                <!-- end of block .properties__item-->
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab-projects" class="tab-pane">
                                        <div class="listing listing--grid">
                                            <div class="listing__item">
                                                <div class="properties properties--grid">
                                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/01.jpg" alt=""/>
                                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                                            </figure></a>
                                                    </div>
                                                    <!-- end of block .properties__thumb-->
                                                    <div class="properties__details">
                                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Portofino Launch Event</span></a>
                                                            <div class="properties__offer">
                                                                <div class="properties__offer-column">
                                                                    <div class="properties__offer-label">20 November 2019</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end of block .properties__info-->
                                                </div>
                                                <!-- end of block .properties__item-->
                                            </div>
                                            <div class="listing__item">
                                                <div class="properties properties--grid">
                                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/02.jpg" alt=""/>
                                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                                            </figure></a>
                                                    </div>
                                                    <!-- end of block .properties__thumb-->
                                                    <div class="properties__details">
                                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Portofino Launch Event</span></a>
                                                            <div class="properties__offer">
                                                                <div class="properties__offer-column">
                                                                    <div class="properties__offer-label">20 November 2019</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end of block .properties__info-->
                                                </div>
                                                <!-- end of block .properties__item-->
                                            </div>
                                            <div class="listing__item">
                                                <div class="properties properties--grid">
                                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/03.jpg" alt=""/>
                                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                                            </figure></a>
                                                    </div>
                                                    <!-- end of block .properties__thumb-->
                                                    <div class="properties__details">
                                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Portofino Launch Event</span></a>
                                                            <div class="properties__offer">
                                                                <div class="properties__offer-column">
                                                                    <div class="properties__offer-label">20 November 2019</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end of block .properties__info-->
                                                </div>
                                                <!-- end of block .properties__item-->
                                            </div>
                                            <div class="listing__item">
                                                <div class="properties properties--grid">
                                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/04.jpg" alt=""/>
                                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                                            </figure></a>
                                                    </div>
                                                    <!-- end of block .properties__thumb-->
                                                    <div class="properties__details">
                                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Portofino Launch Event</span></a>
                                                            <div class="properties__offer">
                                                                <div class="properties__offer-column">
                                                                    <div class="properties__offer-label">20 November 2019</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end of block .properties__info-->
                                                </div>
                                                <!-- end of block .properties__item-->
                                            </div>
                                            <div class="listing__item">
                                                <div class="properties properties--grid">
                                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/05.jpg" alt=""/>
                                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                                            </figure></a>
                                                    </div>
                                                    <!-- end of block .properties__thumb-->
                                                    <div class="properties__details">
                                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Portofino Launch Event</span></a>
                                                            <div class="properties__offer">
                                                                <div class="properties__offer-column">
                                                                    <div class="properties__offer-label">20 November 2019</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end of block .properties__info-->
                                                </div>
                                                <!-- end of block .properties__item-->
                                            </div>
                                            <div class="listing__item">
                                                <div class="properties properties--grid">
                                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/06.jpg" alt=""/>
                                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                                            </figure></a>
                                                    </div>
                                                    <!-- end of block .properties__thumb-->
                                                    <div class="properties__details">
                                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Portofino Launch Event</span></a>
                                                            <div class="properties__offer">
                                                                <div class="properties__offer-column">
                                                                    <div class="properties__offer-label">20 November 2019</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end of block .properties__info-->
                                                </div>
                                                <!-- end of block .properties__item-->
                                            </div>
                                            <div class="listing__item">
                                                <div class="properties properties--grid">
                                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/02.jpg" alt=""/>
                                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                                            </figure></a>
                                                    </div>
                                                    <!-- end of block .properties__thumb-->
                                                    <div class="properties__details">
                                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Portofino Launch Event</span></a>
                                                            <div class="properties__offer">
                                                                <div class="properties__offer-column">
                                                                    <div class="properties__offer-label">20 November 2019</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end of block .properties__info-->
                                                </div>
                                                <!-- end of block .properties__item-->
                                            </div>
                                            <div class="listing__item">
                                                <div class="properties properties--grid">
                                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/03.jpg" alt=""/>
                                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                                            </figure></a>
                                                    </div>
                                                    <!-- end of block .properties__thumb-->
                                                    <div class="properties__details">
                                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Portofino Launch Event</span></a>
                                                            <div class="properties__offer">
                                                                <div class="properties__offer-column">
                                                                    <div class="properties__offer-label">20 November 2019</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end of block .properties__info-->
                                                </div>
                                                <!-- end of block .properties__item-->
                                            </div>
                                            <div class="listing__item">
                                                <div class="properties properties--grid">
                                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/04.jpg" alt=""/>
                                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                                            </figure></a>
                                                    </div>
                                                    <!-- end of block .properties__thumb-->
                                                    <div class="properties__details">
                                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Portofino Launch Event</span></a>
                                                            <div class="properties__offer">
                                                                <div class="properties__offer-column">
                                                                    <div class="properties__offer-label">20 November 2019</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end of block .properties__info-->
                                                </div>
                                                <!-- end of block .properties__item-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="site__footer">
                        <!-- BEGIN PAGINATION-->
                        <nav class="listing__pagination">
                            <ul class="pagination-custom">
                                <li><a href="#"><span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span><span class="sr-only">Previous</span></a></li>
                                <li><a href="#">1</a></li>
                                <li><span>...</span></li>
                                <li class="active-before"><a href="#">3</a></li>
                                <li class="active"><span>4</span></li>
                                <li class="active-after"><a href="#">5</a></li>
                                <li><span>...</span></li>
                                <li><a href="#">15</a></li>
                                <li><a href="#"><span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span><span class="sr-only">Next</span></a></li>
                            </ul>
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



