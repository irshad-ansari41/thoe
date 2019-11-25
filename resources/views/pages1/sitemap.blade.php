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
                <img alt="" src="https://d20sujmgffrs6.cloudfront.net/sakkini-projects/2016/11/06145932/aliyah-gallery-6.jpg" >
            </div>
        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <ul>
                        <li>                            
                            <span class="ion-ios-arrow-left" style=""></span>                                                      
                            <a href="#" style="color: #5a5a5a;"><?= trans('words.home') ?> / </a>                                                    
                            <a style="font-weight: 600;">Sitemap</a>                           
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">



        <!-- Media -->
        <div class="row" style="margin-bottom: 5em;">
            <div class="col s12 m3 pro-holder">
                <h5>Pages</h5>
                <ul>
                    <?php
                    if (!empty($pages)) {
                        foreach ($pages as $value) {
                            ?>
                            <li><a href="<?= $value['url'] ?>"><?= $value['title'] ?></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>

            <div class="col s12 m3 pro-holder">
                <h5>Projects</h5>
                <ul>
                    <?php
                    if (!empty($projects)) {
                        foreach ($projects as $value) {
                            if (url_segment($value['url'], 4) == 'Riviera') {
                                ?>
                                <li><a href="<?= $value['url'] ?>">Thoe Riviera</a></li>
                                <?php
                            } elseif (url_segment($value['url'], 4) == 'Victoria') {
                                ?>
                                <li><a href="<?= $value['url'] ?>">Thoe Victoria</a></li>
                                <?php
                            } else {
                                ?>
                                <li><a href="<?= $value['url'] ?>"><?= $value['title'] ?></a></li>
                                <?php
                            }
                        }
                    }
                    ?>
                </ul>
            </div>

            <div class="col s12 m3 pro-holder">
                <h5>Properties</h5>
                <ul>
                    <?php
                    if (!empty($properties)) {
                        foreach ($properties as $value) {
                            ?>
                            <li><a href="<?= $value['url'] ?>"><?= $value['title'] ?></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>

            <div class="col s12 m3 pro-holder">
                <h5>Construction Updates</h5>
                <ul>
                    <?php
                    if (!empty($cproperties)) {
                        foreach ($cproperties as $value) {
                            ?>
                            <li><a href="<?= $value['url'] ?>"><?= $value['title'] ?></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>

            <div class="col s12 m6 pro-holder">
                <h5>Image Gallery</h5>
                <ul>
                    <?php
                    if (!empty($igalleries)) {
                        foreach ($igalleries as $value) {
                            ?>
                            <li><a href="<?= $value['url'] ?>"><?= $value['title'] ?></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>

            <div class="col s12 m6 pro-holder">
                <h5>Video Gallery</h5>
                <ul>
                    <?php
                    if (!empty($vgalleries)) {
                        foreach ($vgalleries as $value) {
                            ?>
                            <li><a href="<?= $value['url'] ?>"><?= $value['title'] ?></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>

            <div class="col s12 m6 pro-holder">
                <h5>Events</h5>
                <ul>
                    <?php
                    if (!empty($events)) {
                        foreach ($events as $value) {
                            ?>
                            <li><a href="<?= $value['url'] ?>"><?= $value['title'] ?></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>

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
