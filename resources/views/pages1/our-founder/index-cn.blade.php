@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<!-- Time line css -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/timeline_style.css')}}">
<style>.parallax-container .parallax img {    top: initial;}.cd-horizontal-timeline .timeline {position: relative;height: 100px;margin: 0 auto;width: 60%;}</style>
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
                <?php
                if ($og_pic != "") {
                    ?>
                    <img alt="Our-Founder" src="{{$og_pic}}">
                <?php } ?>		
            </div>
            <div class="col s12 center-align card tag-pro">
                <h1> <?= $content->title_ch ?></h1>
            </div>
        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <?= generate_breadcrumb([url("$locale") => '主页', '' => 'AZIZI地产公司创始人']) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col s12 m12 about-title-text short-desc">
                <p style="margin-bottom: 3em;">
                    {{$content->short_description_ch}}
                </p>
                {!! $content->description_ch !!}
                
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
@stop
