@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<style>
    .select-dropdown {
        border: none !important;
        color: #a9a9a9 !important;
        border-bottom: 1px solid #ffffff !important;
    }
    .tabs .tab a:hover, .tabs .tab a.active {
        background-color: transparent;
        color: #565656;
        font-weight: 800;
        text-transform: capitalize;
    }
    .tabs .tab a {
        color: rgba(123, 123, 123, 0.7);
        display: block;
        width: 100%;
        height: 100%;
        padding: 0 24px;
        font-size: 14px;
        text-overflow: ellipsis;
        overflow: hidden;
        -webkit-transition: color .28s ease;
        transition: color .28s ease;
        text-transform: capitalize;
    }  
    .pagination li.active span{
        color: #fff;
        display: inline-block;
        font-size: 1.2rem;
        padding: 0 10px;
        line-height: 30px;
    }
    .pagination li
    {
        position: relative;
        cursor: pointer;
        display: inline-block;
        overflow: hidden;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-tap-highlight-color: transparent;
        z-index: 1;
        -webkit-transition: .3s ease-out;
        transition: .3s ease-out;
    }		
</style>
@stop

@section('main_div_wrapper')

@stop

@section('section_content')

<!-- Header -->
<section class="az-section">

    <div class="container">
        <!-- breadcrumbs-->
        <div class="row m0" style="padding-top: 8em !important;">
            <div class="col s12 m6 p0">
                <div class="col s12 p0">
                    <ul>
                        <li>
                            <span class="ion-ios-arrow-left" style=""></span>
                            <a href="#" style="color: #5a5a5a;">{{trans('words.home')}} / </a>
                            <a style="font-weight: 600;">{{trans('words.search')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col s12 m6">
                <p class="title-uppercase mb0" style="display: inline-block;float: left;margin-top: 14px;font-style: normal;color: #4c4c4c;letter-spacing: 2px;font-size: 18px;position:absolute;">{{trans('words.search')}}:</p>
                <form action="{{ url("$locale/search") }}" name="searchform" id="searchform" method="post" enctype="multipart/form-data">
                    <div class="input-field" style="border-bottom: 1px solid #efefef;margin-left: 75px;">
                        <input type="text" name="searchtext" id="autocomplete-input" class="autocomplete" style="width: 75%;border-bottom: none;line-height: 3rem;padding: 0px 10px;text-transform: capitalize;" placeholder="Keyword..." value="@if($searchtext) {!! $searchtext !!} @endif">
                        <h4 style="margin: 0;text-align: right;position: absolute;top: 0;right: 0;"><span class="ion-ios-search-strong"></span></h4>
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
                        <input type="submit" name="search" value="search"  style="position: absolute;right: 0px; background: transparent;color: transparent;border: none;"/>
                    </div> 
                </form>							
            </div>
        </div>
        <!-- End -->
    </div>

    @if(count($project_results)==0 && count($news_results)==0 && count($event_results)==0)
    <div class="container hide">
        @else
        <div class="container">
            @endif
            <!-- Search result -->
            <div class="row">
                <div class="col s12" style="margin: 20px 0px;">
                    <h4 class="m0" style="font-size: 1.5rem;padding: 15px;background: #f9f9f9;">Search result for "<span style="font-weight: 100;    font-style: italic;">@if($searchtext){!! $searchtext !!}@endif</span>"</h4>
                </div>


                <div class="col s12">
                    <div class="row">
                        <div class="col s12">
                            <ul class="tabs">
                                <li class="tab"><a class="active" href="#all">{{trans('words.All')}}</a></li>
                                <li class="tab"><a href="#events">{{trans('words.events')}}</a></li>
                                <li class="tab"><a href="#news">{{trans('words.News')}}</a></li>
                                <li class="tab"><a href="#projects">{{trans('words.Projects')}}</a></li>
                            </ul>
                        </div>

                        <!-- All -->
                        <div id="all" class="col s12">
                            <div class="row" id="allId">
                                @include('ajax-all-search')
                            </div>
                            <!-- Pagination -->
                            <!--<div class="row">
                                <div class="col s12 center-align p0">
                                    <ul class="pagination">
                                        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                                        <li class="active"><a href="#!">1</a></li>
                                        <li class="waves-effect"><a href="#!">2</a></li>
                                        <li class="waves-effect"><a href="#!">3</a></li>
                                        <li class="waves-effect"><a href="#!">4</a></li>
                                        <li class="waves-effect"><a href="#!">5</a></li>
                                        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                                    </ul>

                                </div>
                            </div>-->
                            <!-- End -->
                        </div>
                        <!-- End -->

                        <!-- Events -->
                        <div id="events" class="col s12">
                            <div class="row"  id="eventd">
                                @include('ajax-event-search')
                            </div>
                        </div>
                        <!-- End -->

                        <!-- News -->
                        <div id="news" class="col s12">
                            <div class="row" id="newsId">
                                @include('ajax-news-search')
                            </div>
                        </div>
                        <!-- End -->

                        <!-- Projects -->
                        <div id="projects" class="col s12" >
                            <div class="row" id="projectsId">
                                @include('ajax-project-search')
                            </div>
                        </div>
                        <!-- End -->

                    </div>
                </div>


            </div>              
        </div>
        <!-- End -->

        <!-- No result -->
        @if(count($project_results)==0 && count($news_results)==0 && count($event_results)==0)
        <div class="container">
            @else
            <div class="container hide">
                @endif
                <div class="row">
                    <div class="col s12" style="margin: 20px 0px;">
                        <h4 class="m0" style="font-size: 1.5rem;padding: 15px;background: #f9f9f9;">No result for "<span style="font-weight: 100;    font-style: italic;">Offers in AZIZI</span>"</h4>
                    </div>

                    <div class="col s12 center-align" style="margin: 5rem 0rem;">
                        <img alt="search" src="{{ asset('assets/images/icon_noresult.png') }}" class="responsive-img">
                        <p>We cannot find the words you are searching<br>for, maybe a little spelling mistake?</p>
                    </div>

                </div>
            </div>
            <!-- End -->



            </section>
            <!-- End -->
            @stop

            @section('footer_main_scripts')
            
            <script>
/*$(window).on('hashchange', function() {
 if (window.location.hash) {
 var page = window.location.hash.replace('#', '');
 if (page == Number.NaN || page <= 0) {
 return false;
 }else{
 getData(page);
 }
 }
 });*/
$(document).ready(function ()
{
    $(document).on('click', '.pagination a', function (event)
    {
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        event.preventDefault();
        var myurl = $(this).attr('href');
        var page = $(this).attr('href').split('page=')[1];
        var parent_id = $(this).parent().parent().parent().attr('id');
        getData(page, parent_id);
    });
});
function getData(page, parent_id) {
    var token = document.getElementById("_token").value;
    var searchtext = $("#autocomplete-input").val();
    $.ajax(
            {
                url: '?page=' + page + "&_token=" + token + "&parent_id=" + parent_id + "&searchtext=" + searchtext,
                type: "post",
                datatype: "html",
            })
            .done(function (data)
            {
                var arr = data.split('#####');

                if (arr[1].indexOf("event_pagination") >= 0)
                {
                    $("#eventd").empty().html(data);
                }
                if (arr[1].indexOf("news_pagination") >= 0)
                {
                    $("#newsId").empty().html(data);
                }
                if (arr[1].indexOf("projects_pagination") >= 0)
                {
                    $("#projectsId").empty().html(data);
                }

                location.hash = page;
            })
            .fail(function (jqXHR, ajaxOptions, thrownError)
            {
                alert('No response from server');
            });
}
            </script>
            @stop
            @section('footer_scripts')
            <!-- Timeline -->
            <script type="text/javascript" src="{{asset('assets/js/timeline-main.js')}}"></script>
            @stop
