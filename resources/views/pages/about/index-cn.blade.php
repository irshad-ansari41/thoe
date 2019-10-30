@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<!-- Time line css -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/timeline_style.css')}}">
<style>.parallax-container .parallax img {    top: initial;}.cd-horizontal-timeline .timeline {position: relative;height: 100px;margin: 0 auto;width: 60%;}
</style>

<!-- End -->
@stop

@section('main_div_wrapper')

@stop

@section('section_content')

<!-- Header -->
<section class="az-section">
    <div class="container">
        <div class="parallax-container valign-wrapper only-heading">
            <div class="parallax">
                @if($about->banner_image!="")
                <img alt="{{ $about->banner_image_alt }}" src="{{asset('assets/images/about/')}}/{{ $about->banner_image }}">
                @endif
            </div>
            <div class="col s12 center-align card tag-pro">
                <h1> <?= $about->title_ch ?></h1>
            </div>
        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <?= generate_breadcrumb([url("$locale") => '主页', '' => '关于AZIZI地产公司']) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="margin-bottom: 3em;">
            <p class="about-title-text short-desc">
                <?= $about->description_ch ?>
            </p>
        </div>
        <div class="row" style="margin-bottom: 5rem;">
            <div class="col s12 m4" style="margin-right: 3em;">
                @if($about->chairmen_image!="")
                <img alt="{{ $about->chairment_image_alt }}" src="{{asset('assets/images/about/')}}/{{ $about->chairmen_image }}" class="responsive-img">
                @endif
            </div>
            <div class="col s12 m6 about-chairman-sec">
                <h5 class="m0">董事长寄语</h5>
                <div class="divider az-header-divider"></div>
                <p class="az-pcontent">
                    <?= $about->chairment_description_ch ?>
                </p>
                <div class="desig-person" style="margin-top: 3em;">
                    <div class="person-name" style="font-size: 15px;margin: 0;">{{ trans('words.mirwais_azizi')}}</div>
                    <i style="font-size: 12px;">{{ trans('words.chirman_azizi_group') }}</i>
                </div>
            </div>
        </div>
    </div>
    <div class="about-timeline">
        <div class="container">
            <div class="row m0">
                <div class="cols 12 center-align">
                    <h5 class="white">
                        AZIZI地产公司一览
                    </h5>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <section class="cd-horizontal-timeline m0">
                        <div class="timeline">
                            <div class="events-wrapper">
                                <div class="events">
                                    <ol style="list-style: none;" class="p0">
                                        <?php
                                        if (!empty($years)) {
                                            foreach ($years as $key => $value) {
                                                ?>
                                                <li><a href="#0" data-date="01/01/<?= $value['year'] ?>" class="<?= $key == 0 ? 'selected' : '' ?>"><?= $value['year'] ?></a></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ol>
                                    <span class="filling-line" aria-hidden="true"></span>
                                </div>
                            </div>
                            <ul class="cd-timeline-navigation">
                                <li><a href="#0" class="prev inactive">Prev</a></li>
                                <li><a href="#0" class="next">Next</a></li>
                            </ul>
                        </div>
                        <div class="events-content">
                            <ol style="list-style: none;margin:0;" class="p0">
                                <?php if (!empty($timelines)) {
                                    foreach ($years as $k => $v) {
                                        ?>
                                        <li data-date="01/01/<?= $v['year'] ?>" class="<?= $k == 0 ? 'selected' : '' ?> roffset-0">
                                            <div class="row">
                                                <?php
                                                foreach ($timelines as $key => $value) {
                                                    if (array_count_values(array_column($timelines, 'year'))[$v['year']] == "1" && $value['year'] == $v['year']) {
                                                        ?>
                                                        <div class="col s12 roffset-0">
                                                            <div class="col s12 m6">
                                                                @if($value['image']!="")
                                                                <img alt="<?= $value['alt'] ?>" src="<?= asset('assets/images/timeline/') ?>/<?= $value['image'] ?>" class="responsive-img">
                                                                @endif
                                                            </div>
                                                            <div class="col s12 m6">
                                                                <h5 class="az-title" style="font-weight: 800;font-size: 13px;height: 4em;overflow: hidden;text-overflow: ellipsis;width: 100%;">
                <?= !empty($value['title_ch']) ? $value['title_ch'] : '' ?></h5>
                                                                <div class="divider az-header-divider mb0" style="background: white;"></div>
                                                                <p class="az-pcontent az-pright"><?= !empty($value['description_ch']) ? $value['description_ch'] : '' ?></p>
                                                            </div>
                                                        </div>
            <?php } elseif (array_count_values(array_column($timelines, 'year'))[$v['year']] == "2" && $value['year'] == $v['year']) { ?>
                                                        <div class="col s12 m6">
                                                            <div class="col s12">
                                                                @if($value['image']!="")
                                                                <img alt="<?= $value['alt'] ?>" src="<?= asset('assets/images/timeline/') ?>/<?= $value['image'] ?>" class="responsive-img">
                                                                @endif
                                                            </div>
                                                            <div class="col s12 ">
                                                                <h5 class="az-title" style="font-weight: 800;font-size: 13px;height: 4em;overflow: hidden;text-overflow: ellipsis;width: 100%;">
                <?= !empty($value['title_ch']) ? $value['title_ch'] : '' ?></h5>
                                                                <div class="divider az-header-divider mb0" style="background: white;"></div>
                                                                <p class="az-pcontent az-pright"><?= !empty($value['description_ch']) ? $value['description_ch'] : '' ?></p>
                                                            </div>
                                                        </div>
            <?php } elseif (array_count_values(array_column($timelines, 'year'))[$v['year']] == "3" && $value['year'] == $v['year']) { ?>
                                                        <div class="col s12 m4 p0">
                                                            <div class="col s12">
                                                                @if($value['image']!="")
                                                                <img alt="<?= $value['alt'] ?>" src="<?= asset('assets/images/timeline/') ?>/<?= $value['image'] ?>" class="responsive-img">
                                                                @endif
                                                            </div>
                                                            <div class="col s12" style="margin-top: 2em;">
                                                                <h5 class="az-title" style="font-weight: 800;font-size: 13px;height: 4em;overflow: hidden;text-overflow: ellipsis;width: 100%;">
                <?= !empty($value['title_ch']) ? $value['title_ch'] : '' ?></h5>
                                                                <div class="divider az-header-divider mb0" style="background: white;"></div>
                                                                <p class="az-pcontent az-pright"><?= !empty($value['description_ch']) ? $value['description_ch'] : '' ?></p>
                                                            </div>
                                                        </div>
            <?php } elseif (array_count_values(array_column($timelines, 'year'))[$v['year']] == "4" && $value['year'] == $v['year']) { ?>

                                                        <div class="col s12 m3 p0">
                                                            <div class="col s12">
                                                                @if($value['image']!="")
                                                                <img alt="<?= $value['alt'] ?>" src="<?= asset('assets/images/timeline/') ?>/<?= $value['image'] ?>" class="responsive-img">
                                                                @endif
                                                            </div>
                                                            <div class="col s12" style="margin-top: 2em;">
                                                                <h5 class="az-title" style="font-weight: 800;font-size: 13px;height: 4em;overflow: hidden;text-overflow: ellipsis;width: 100%;">
                <?= !empty($value['title_ch']) ? $value['title_ch'] : '' ?></h5>
                                                                <div class="divider az-header-divider mb0" style="background: white;"></div>
                                                                <p class="az-pcontent az-pright"><?= !empty($value['description_ch']) ? $value['description_ch'] : '' ?></p>
                                                            </div>
                                                        </div>
                                                    <?php } ?>

        <?php } ?>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ol>
                        </div>

                    </section>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End -->
@stop

@section('footer_main_scripts')

@stop
@section('footer_scripts')
<!-- Timeline -->
<script type="text/javascript" src="{{asset('assets/js/timeline-main.js')}}"></script>
<script> sessionStorage.setItem("utm_source", 'Website');sessionStorage.setItem("utm_campaign", 'Others');</script>

@stop
