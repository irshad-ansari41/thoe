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
    'meta_title' => '503 page | Welcome to Thoe Developments | ' . time(),
    'og_title' => '503 page | Welcome to Thoe Developments | ' . time(),
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
                <h2 class="widget__title">503 Error. Internal error.</h2>
                <h5 class="widget__headline">The Server Encountered an internal error or misconfiguration and was unable to complete your request. Please contact the server administrator, and inform them of the time the error occurred, and anything you might have done that may have caused the error.</h5>
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

