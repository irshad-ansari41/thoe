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
</style>
@stop

@section('main_div_wrapper')
@stop
@section('section_content')



<!-- Header -->
<section class="az-section">

    <div class="container">
        <div class="parallax-container valign-wrapper">
            <div class="parallax">
                @if($content->image!="")
                <img alt="{{ trim($content->alt) }}" src="{{ asset('assets/images/banner/') }}/{{ $content->image }}" >
                @endif
            </div>
        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <ul>
                        <li>
                            @if($locale=='en')
                            <span class="ion-ios-arrow-left" style=""></span>
                            @endif

                            <span class="ion-ios-arrow-left" style=""></span>
                            @if($locale=='en')
                            <a href="{{ url("/") }}" style="color: #5a5a5a;">{{trans('words.home')}} / </a>
                            <a href="#" style="color: #5a5a5a;">{{trans('words.Media centre')}} / </a>
                            @elseif($locale=='cn')
                            <a href="{{ url("/") }}" style="color: #5a5a5a;">主页 / </a>
                            <a href="#" style="color: #5a5a5a;">媒体中心 / </a>

                            @elseif($locale=='ar')
                            <a href="{{ url("/") }}" style="color: #5a5a5a;">{{trans('words.home')}} / </a>
                            <a href="#" style="color: #5a5a5a;">{{trans('words.Media centre')}} / </a>
                            @endif


                            <a style="font-weight: 600;">@if($locale=='en')
                                {!! $content->title_en !!}
                                @elseif($locale=='ar')
                                {!! $content->title_ar !!}
                                @elseif($locale=='cn')
                                {!! $content->title_ch !!}
                                @endif</a>
                            @if($locale=='ar')
                            <span class="ion-ios-arrow-left" style=""></span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row mb0 press-news-header">
            <div class="col s12 m4">
                <h5 class="m0">
                    @if($locale=='en')
                    {!! $content->title_en !!}
                    @elseif($locale=='ar')
                    {!! $content->title_ar !!}
                    @elseif($locale=='cn')
                    {!! $content->title_ch !!}
                    @endif</h5>
                <div class="divider az-header-divider mb0"></div>
                <p class="az-pcontent" style="    width: 90%;">
                    @if($locale=='en')
                    {!! $content->short_description_en !!}
                    @elseif($locale=='ar')
                    {!! $content->short_description_ar !!}
                    @elseif($locale=='cn')
                    {!! $content->short_description_ch !!}
                    @endif
                </p>
            </div>
            <div class="col s12 m8" style="margin-top: 25px;">


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
                                @if($locale=='en')
                                {{trans('words.Filter')}}
                                @elseif($locale=='ar')
                                {{trans('words.Filter')}}
                                @elseif($locale=='cn')
                                <span style="font-size: 12px;">分类查找</span>
                                @endif

                            </a>
                        </div>
                        <input type="hidden" name="page" value="">
<!--                        <input type="hidden" name="left" value="search">
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

                        <?php
                        $getPRtitle = $locale == 'en' ? $pres->title : ($locale == 'ar' ? $pres->title_ar : $pres->title_ch);
                        $stripPRtitle = preg_replace('/\s+/', '', $getPRtitle);
                        if ($stripPRtitle != "") {
                            //echo "y";
                            ?>
                            <div class="row">
                                <div class="col s12 m4">
                                    <img alt="{{ trim($pres->alt) }}" src="{{ asset('assets/images/pressrelease/') }}/{{ $pres->image or 'azizi.jpg' }}"
                                         class="responsive-img">
                                </div>

                                <div class="col s12 m8">

                                    <div class="col s12 mt0" style="margin: 1em 0em;">
                                        @if($locale=='en')	
                                        <div class="desig-person m0">

                                            <div class="person-name mt0" style="font-weight: 400;text-transform: capitalize;    width: 90%;">
                                                {!! $pres->title !!}    
                                            </div>
                                            <i>{{ date("d F Y", strtotime($pres->date)) }}</i>

                                        </div> 

                                        <p class="az-pcontent">
                                            {!! $pres->description !!} 
                                        </p>
                                        @endif

                                        @if($locale=='ar')	
                                        <div class="desig-person m0">

                                            <div class="person-name mt0" style="font-weight: 400;text-transform: capitalize;    width: 90%;">
                                                {!! $pres->title_ar or '' !!}    
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
                                            {!! $pres->description_ar or '' !!} 
                                        </p>
                                        @endif

                                        @if($locale=='cn')	
                                        <div class="desig-person m0">
                                            @if(empty($pres->title_ch) and empty($pres->description_ch))
                                            Azizi Developments
                                            @endif
                                            <div class="person-name mt0" style="font-weight: 400;text-transform: capitalize;    width: 90%;">
                                                {!! $pres->title  or '' !!}    
                                            </div>
                                            <i>
                                                <?php
                                                $date = date("d F Y", strtotime($pres->date));
                                                $Month = date("F", strtotime($date));
                                                $Day = date("d", strtotime($date));
                                                $Year = date("Y", strtotime($date));

                                                //echo "<br>--------------------------";
                                                $months = array(
                                                    "Jan" => "1月",
                                                    "Feb" => "2月",
                                                    "Mar" => "3月",
                                                    "Apr" => "4月",
                                                    "May" => "5月",
                                                    "Jun" => "6月",
                                                    "Jul" => "7月",
                                                    "Aug" => "8月",
                                                    "Sep" => "9月",
                                                    "Oct" => "10月",
                                                    "Nov" => "11月",
                                                    "Dec" => "12月"
                                                );
                                                //$your_date = "2012-12-25"; // for example
                                                $en_month = date("M", strtotime($date));
                                                $ar_month = $months[$en_month];
                                                $en_month . " = " . $ar_month;

                                                echo $Year . " 年 " . $ar_month . " " . $Day . " 日 ";
                                                ?>
                                            </i>

                                        </div> 

                                        <p class="az-pcontent">
                                            {!! $pres->description  or '' !!} 
                                        </p>
                                        @endif


                                        <div class="col s12 p0">

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
                                                <a href="{!! $doc_url !!}" style="margin-right: 2em;font-size: 12px;" download>
                                                    <p class="az-pcontent" style="display: inline-block;">
                                                        <span class="ion-document-text" style="font-size: 30px;margin-right: 5px;"></span>
                                                        {{trans('words.Download press release')}}
                                                    </p>
                                                </a>
                                                <a href="{!! $img_url !!}" style="font-size: 12px;" download>
                                                    <p class="az-pcontent" style="display: inline-block;">
                                                        <span class="ion-images" style="font-size: 30px;margin-right: 5px;"></span>
                                                        {{trans('words.Download Images')}}
                                                    </p>
                                                </a>

                                            </div>

                                            <div class="col s12 m6 p0" style="margin-top: 12px;">

                                                <p class="az-pcontent social-share"><strong style="margin-right: 15px;font-size: 12px;">Share: </strong>


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
                                        </div>                


                                    </div>

                                </div>
                                <!--col s12 m8-->

                                <div class="col s12" style="margin-bottom: 1em;">
                                    <div class="divider"></div>
                                </div>
                            </div>
                            <?php
                        } else {
                            
                        }
                        ?>

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
