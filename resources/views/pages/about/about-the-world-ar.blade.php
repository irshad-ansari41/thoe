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
        <ul>
            <li class="breadcrumbs__item"><a href="" class="breadcrumbs__link">Home</a></li>
            <li class="breadcrumbs__item"><a href="" class="breadcrumbs__link">News & PR</a></li>
        </ul>
    </div>
</nav>
@stop

@section('content')
<div class="center">
    <div class="container">
        <div class="row">
            <div class="site site--main">
                <header class="site__header">
                    <h1 class="site__title">{!! $about->title !!}</h1>
                </header>
                <div class="site__main">
                    <div class="widget js-widget widget--main widget--no-margin">
                        <div class="widget__content">
                            <article class="article article--list article--details">
                                <div class="article__body">
                                    {!! $about->content !!}
                                </div>
                                <div class="article__footer">
                                    <div class="social social--article"><span>Share on social:</span><a href="#" class="social__item"><i class="fa fa-facebook"></i></a><a href="#" class="social__item"><i class="fa fa-twitter"></i></a></div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <!-- END site-->
            </div>
            <!-- END Site-->
            
            @include('pages.about.sidebar')
            
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@stop


@section('footer_scripts')

@stop

