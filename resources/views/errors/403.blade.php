<?php
if (!in_array(Request::segment(1), ['en', 'ar', 'cn'])) {
    $newUrl = str_replace('https://thoe.com/', 'https://thoe.com/en/', Request::fullurl());
    header("Location: " . $newUrl, 301);
    exit();
}

$content = [
    'alt' => 'alt',
    'image' => 'image',
    'title_en' => 'title_en',
    'meta_title' => '403 page | Welcome to Thoe Developments | ' . time(),
    'og_title' => '403 page | Welcome to Thoe Developments | ' . time(),
    'locale' => 'en',
    'alt' => 'alt',
];

extract($content);
?>

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
        <?= generate_breadcrumb([url("/$locale") => 'home', '' => '404']) ?>
    </div>
</nav>
@stop

@section('content')

<!-- BEGIN CENTER SECTION-->
<div class="center">
    <div class="container">
        <div class="widget js-widget widget--landing">
            <div class="widget__content">
                <!-- BEGIN SEARCH-->
                <form class="form form--search form--error-status">
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label"></label>
                            <input type="text" placeholder="Please enter a search query" class="form-control">
                            <button class="form__lens"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </div>
                </form>
                <!-- END SEARCH-->
            </div>
        </div>
        <div class="widget js-widget widget--landing widget--sep">
            <div class="widget__header">
                <h2 class="widget__title">403 Error. Page Not Found.</h2>
                <h5 class="widget__headline">We are sorry but the page you are looking for cannot be found on the server. It may be deleted or replaced. You can try search by another term.</h5>
            </div>
            <div class="widget__content">
            </div>
        </div>
    </div>
</div>
<!-- END CENTER SECTION-->

@stop


@section('footer_scripts')

@stop

