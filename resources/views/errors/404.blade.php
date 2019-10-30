<?php
if (!in_array(Request::segment(1), ['en', 'ar', 'cn'])) {
    $newUrl = str_replace('https://azizidevelopments.com/', 'https://azizidevelopments.com/en/', Request::fullurl());
    header("Location: " . $newUrl, 301);
    exit();
}

$content = [
    'alt' => 'alt',
    'image' => 'image',
    'title_en' => 'title_en',
    'meta_title' => '404 page | Welcome to Azizi Developments | ' . time(),
    'og_title' => '404 page | Welcome to Azizi Developments | ' . time(),
    'locale' => 'en',
    'alt' => 'alt',
];

extract($content);
?>

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
                <img alt="<?= trim($content['alt']) ?>" src="<?= asset('assets/images/page-not-found.jpg') ?>">
            </div>
        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <ul>
                        <li>
                            <a href="#" style="color: #5a5a5a;">Home / </a> 404
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="hgroup">
            <h1>Oops! That page can’t be found</h1>
            <p>It looks like you’ve ended up in the wrong place. Don’t worry, though. Just hit that big orange button to go back to our homepage and resume your search for great properties.</p>
            <a href="//azizidevelopments.com">
                <button type="button" class="btn btn-primary button-alignment" style="background: #ef9027;padding:0 20px;color:#fff;text-transform: capitalize;">Back To Home</button>
            </a>
        </div>
        <br/><br/><br/>
    </div>

</section>
<!-- End -->
@stop


@section('footer_main_scripts')
@stop


@section('footer_scripts')

@stop
