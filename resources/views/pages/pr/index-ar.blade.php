<?php
$get = filter_input_array(INPUT_GET);
$keyword = !empty($get['keyword']) ? $get['keyword'] : '';
$from_date = !empty($get['from_date']) ? $get['from_date'] : '';
$sort = !empty($get['sort']) ? $get['sort'] : '';
$to_date = !empty($get['to_date']) ? $get['to_date'] : '';
$page = !empty($get['page']) ? $get['page'] : '';
?>
@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<style>
    .select-dropdown {
        border: none !important;
        border-radius: 0px !important;
        color: #b7b7b7 !important;
        border-bottom: 1px solid #e4e4e4 !important;
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
    /* New Style 26 Dec 2018 */
    .desig-person .person-name{font-size:1.30rem !important; margin: 0px;} 
    .desig-person i{font-size:0.8rem !important;}
    .Sharetext{margin-top:24px;}
    @media screen and (min-width: 769px){
        .parallax-container{ height: 400px !important;}
        .az-pcontent, p{text-align:right !important;}
    }
    @media screen and (max-width: 768px){
        .desig-person .person-name{font-size:0.9rem !important; letter-spacing:0px; margin-bottom: -6px;}  
        .desig-person i{font-size:0.7rem !important; letter-spacing:1px;}
        .az-pcontent{font-size:12px; line-height: 18px;}
        .btnstext{position: relative; bottom: 6px; right:10px;}
        .Sharetext{margin-top:15px;}
        .parallax-container{ height: 240px !important;}
        .ts{transform: translate3d(-50%, 0px, 0px) !important; width: 100% !important;}
        .searchhide{display:none;}
        .az-pcontent, p{text-align:right !important;}

    }

</style>
@stop

@section('main_div_wrapper')
@stop
@section('section_content')



<!-- Header -->
<section class="az-section">

    <div class="container">
        <div class="parallax-container valign-wrapper only-heading">
            <div class="parallax">
                @if($content->image!="")
                <img alt="{{ trim($content->alt) }}" src="{{ asset('assets/images/banner/') }}/{{ $content->image }}" class="ts">
                @endif
            </div>
            <div class="col s12 center-align card tag-pro-ar">
                <h1>{{$content->title_ar}}</h1>
            </div>

        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <?= generate_breadcrumb([url("$locale") => trans('words.home'), url("/$locale/media-center") => trans('words.Media centre'), '' => $content->title_ar], $locale) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row mb0 press-news-header">
            <div class="col s12 m12">
                <!--h5 class="m0">{!! $content->title_ar !!}</h5>
                <div class="divider az-header-divider mb0"></div-->
                <p class="az-pcontent" style="    width: 90%;">
                    {!! $content->short_description_ar !!}
                </p>
            </div>
            <div class="col s12 m8 searchhide" style="margin-top: 25px;">


                <!-- New filter design -->
                <!-- Search & Filter -->
                <div class="col s12 p0">
                    <form method="get" action="{{route('news-pr.index')}}" name="search" id="search"> 
                        <div class="col s4">
                            <p class="title-uppercase mb0 search-tt" style="display: inline-block;float: left;margin-top: 14px;font-style: normal;color: #4c4c4c;letter-spacing: 2px;font-size: 18px;position:absolute;">{{trans('words.search')}}:</p>
                            <div class="input-field" style="border-bottom: 1px solid #efefef;margin-left: 75px;">
                                <input type="text" autocomplete="off" name="keyword" id="autocomplete-input" class="autocomplete" style="width: 75%;border-bottom: none;line-height: 3rem;padding: 0px 10px;text-transform: capitalize;" placeholder="{{trans('words.Keyword...')}}" value="{{ $keyword }}">
                                <h4 style="margin: 0;text-align: right;position: absolute;top: 0;right: 0;"><a href="javascript:void(0);" id="sbutton"><span class="ion-ios-search-strong"></span></a></h4>
                            </div>                        
                        </div>
                        <div class="input-field col s2">
                            <select name="sort"  onchange="submitform()">
                                <option value="" disabled selected>{{trans('words.Sort By')}}</option>
                                <option value="new" {{$sort=="new"?'selected':''}}  >{{trans('words.Newest First')}}</option>
                                <option value="old" {{$sort=="old"?'selected':''}} >{{trans('words.Oldest First')}}</option>
                            </select>
                            <!-- <label>Sort by</label> -->
                        </div>
                        <div class="input-field col s2" style="border-bottom: 1px solid #efefef;line-height: 3rem;">
                            <input type="text" autocomplete="off" class="datepicker" placeholder="{{trans('words.From Date')}}" name="from_date" id="from_date" value="{{ $from_date }}" >
                        </div>
                        <div class="input-field col s2" style="border-bottom: 1px solid #efefef;line-height: 3rem;">
                            <input type="text" autocomplete="off" class="datepicker" placeholder="{{trans('words.To Date')}}" name="to_date" id="to_date" value="{{ $to_date }}" >
                        </div>
                        <div class="input-field col s2">
                            <a href="javascript:void(0);" class="az-btn active" style="min-width: 100%;max-width: 100%;border-radius: 0px;margin-top: 5px;" id="sbutton"><!-- {{trans('words.Filter')}} -->
                                <span style="font-size: 12px;">{{trans('words.Filter')}}</span>
                            </a>
                        </div>
                        <input type="hidden" name="page" value="">
                        <!--<input type="hidden" name="left" value="search">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />-->
                    </form>
                </div>
                <!-- End --> 




            </div>

        </div>


        <!-- header -->
        <div class="row">
            <div class="col s12 p0">                       
                <div class="col s12" style="margin-top: 2em;">
                    <!-- News -->
                    <div id="eventd">
                        @if(!empty($press))
                        @foreach($press as $pres)
                        <?php $urllinks = !empty($pres->title_ar) && !empty($pres->description_long_ar) ? url("/$locale/news-pr/{$pres->slug}") : "#" ?>
                        <div class="row">
                            <div class="col s12 m4">
                                <a href="<?=$urllinks?>" style="text-decoration:none;"> 
                                    <img alt="{{ trim($pres->alt) }}" src="{{ asset('assets/images/100-blank-img.jpg') }}" data-src="{{ asset('assets/images/pressrelease/') }}/{{ $pres->image or 'azizi.jpg' }}" class="responsive-img"> 
                                </a>
                            </div>

                            <div class="col s12 m8">

                                <div class="col s12 mt0" style="margin: 1em 0em;">
                                    <div class="desig-person m0">

                                        <div class="person-name mt0" style="font-weight: 400;text-transform: capitalize;    width: 100%;">
                                            <a href="<?=$urllinks?>" style="text-decoration:none;"> {!! $pres->title_ar !!}</a>
                                        </div>
                                        <i>
                                            <?php
                                            $date = date("d F Y", strtotime($pres->date));
                                            $Month = date("F", strtotime($date));
                                            $Day = date("d", strtotime($date));
                                            $Year = date("Y", strtotime($date));

                                            //echo "<br>--------------------------";
                                            $months = array(
                                                "Jan" => "يناير",
                                                "Feb" => "فبراير",
                                                "Mar" => "مارس",
                                                "Apr" => "أبريل",
                                                "May" => "مايو",
                                                "Jun" => "يونيو",
                                                "Jul" => "يوليو",
                                                "Aug" => "أغسطس",
                                                "Sep" => "سبتمبر",
                                                "Oct" => "أكتوبر",
                                                "Nov" => "نوفمبر",
                                                "Dec" => "ديسمبر"
                                            );
                                            //$your_date = "2012-12-25"; // for example
                                            $en_month = date("M", strtotime($date));
                                            $ar_month = $months[$en_month];
                                            $en_month . " = " . $ar_month;

                                            echo $Day . " " . $ar_month . " " . $Year;
                                            ?>
                                        </i>

                                    </div> 

                                    <p class="az-pcontent">
                                        <?= !empty($pres->description_long_ar) ? az_trim_words($pres->description_long_ar): az_trim_words($pres->description_ar); ?>
                                    </p>
                                    <a href="<?=$urllinks?>" style="font-size:12px;text-decoration:underline;color:grey;font-weight:bold;"> 
                                        {{trans('words.Read more')}}
                                    </a>


                                    <!--div class="col s12 p0">

                                        <div class="col s12 m6 p0">
                                    <?php
                                    $files = File::files(STORE_PATH . "/assets/images/pressrelease/download/" . $pres->id . "/document");
                                    $files2 = File::files(STORE_PATH . "/assets/images/pressrelease/download/" . $pres->id . "/image");

                                    $doc_path = !empty($files) ? $files[0] : STORE_PATH . "/assets/images/pressrelease/download/" . $pres->id . "/doc.zip";
                                    $img_path = !empty($files2) ? $files2[0] : STORE_PATH . "/assets/images/pressrelease/download/" . $pres->id . "/img.zip";

                                    $doc_flag = 0;
                                    $img_flag = 0;
                                    $doc_url = 'javascript:void(0)';
                                    $img_url = 'javascript:void(0)';


                                    if (File::exists($doc_path)) {
                                        $doc_flag = 1;
                                        $doc_url = url("/") . "/assets/images/pressrelease/download/" . $pres->id . "/document/" . basename($doc_path);
                                    }

                                    if (File::exists($img_path)) {
                                        $img_flag = 1;
                                        $img_url = url("/") . "/assets/images/pressrelease/download/" . $pres->id . "/image/" . basename($img_path);
                                    }
                                    ?>
                                            <a href="{!! $doc_url !!}" style="margin-left: 5em;font-size: 12px;" download>
                                                <p class="az-pcontent" style="display: inline-block; position: relative; top:12px;">
                                                    <span class="ion-document-text" style="font-size: 30px;margin-right: 5px;"></span>
                                                    <span class="btnstext">{{trans('words.Download press release')}}</span>
                                                </p>
                                            </a>
                                            <a href="{!! $img_url !!}" style="font-size: 12px;" download>
                                                <p class="az-pcontent" style="display: inline-block; position: relative; top:12px;">
                                                    <span class="ion-images" style="font-size: 30px;margin-right: 5px;"></span>
                                                    <span class="btnstext">{{trans('words.Download Images')}}</span>
                                                </p>
                                            </a>

                                        </div>

                                        <div class="col s12 m6 p0 Sharetext">

                                            <p class="az-pcontent social-share"><strong style="margin-right: 15px;font-size: 15px;">Share: </strong>


                                                <a href="https://www.facebook.com/dialog/feed?app_id=136745863654131&redirect_uri={{ url('/') }}/mediacenter-eventgallery-detail/{{ $pres->slug }}&link={{ url('/') }}/mediacenter-newspress-detail/{{ $pres->id }}&picture={{ asset('assets/images/pressrelease/') }}/{{ $pres->image }}&caption={{ $pres->title }}&description={{ $pres->title }}">
                                                    <i class="ion-social-facebook"></i>
                                                </a>

                                                <a href="https://twitter.com/share?url={{ url('/') }}/mediacenter-newspress-detail/{{ $pres->id }}&via=AZIZI Developments&text={{ $pres->title }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter">
                                                    <i class="ion-social-twitter"></i>
                                                </a>

                                                <a href="https://plus.google.com/share?url={{ url('/') }}/mediacenter-newspress-detail/{{ $pres->id }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                                    <i class="ion-social-googleplus"></i>
                                                </a>

                                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?=SITE_URL?>/&title={{ $pres->title }}&summary={{date("d F Y", strtotime($pres->date))}}&source=LinkedIn">
                                                    <i class="ion-social-linkedin" style="font-size: 20px;margin-right: 20px;color: initial;"></i>
                                                </a>


                                            </p>

                                        </div> 
                                    </div-->                


                                </div>

                            </div>
                            <!--col s12 m8-->

                            <div class="col s12" style="margin-bottom: 1em;">
                                <div class="divider"></div>
                            </div>
                        </div>
                        @endforeach
                        @endif	

                        <div class="row">
                            <div class="col s12 center-align p0">

                                {!! $press->render() !!}


                            </div>
                        </div>

                    </div>


                    <!-- End -->


                </div>
            </div>
        </div>
        <!-- end -->

    </div>

    <div class="container">

    </div>

</section>
<!-- End -->

@stop

@section('footer_main_scripts')

<script>
                                $(window).on('hashchange', function () {
                                    if (window.location.hash) {
                                        var page = window.location.hash.replace('#', '');
                                        if (page == Number.NaN || page <= 0) {
                                            return false;
                                        } else {
                                            //getData(page);
                                        }
                                    }
                                });
                                $(document).ready(function ()
                                {
                                    $(document).on('click', '#topsearch', function (event) {
                                        document.tform.submit();
                                    });

                                    $(document).on('click', '#sbutton', function (event) {
                                        document.search.submit();
                                    });

                                    $('.pagination li a').click(function (e) {
                                        e.preventDefault();
                                        $('input[name=page]').val($(this).text());
                                        $('form#search').submit();
                                    });


                                });


</script>
@stop
@section('footer_scripts')
<script>$(".datepicker").pickadate({selectMonths: !0, selectYears: 15, today: "Today", clear: "Clear", close: "Ok", closeOnSelect: !1});</script>
@stop
