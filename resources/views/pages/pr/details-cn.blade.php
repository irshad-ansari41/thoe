
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
    li.a {
        list-style-type: disc !important; margin: 0px 20px;
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
                @if($banner!="")
                <img alt="{{ trim($press->alt) }}" src="{{ asset('assets/images/banner/') }}/{{ $banner }}" >
                @endif
            </div>
            <div class="col s12 center-align card tag-pro">
                <h1>{{$content->title_ch}}</h1>
            </div>
            
        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <?=generate_breadcrumb([
                        url("$locale") => trans('words.home'), 
                        url("/$locale/media-center") => trans('words.Media centre'), 
                        url("$locale/news-pr/")=>$content->title_ch, 
                        '' => $press->title_ch
                            
                    ]); ?>

                    
                </div>
            </div>
        </div>
    </div>

    <div class="container">


        <div class="row mb0 press-news-header">

            <div class="col s12 m12">
                <!--h5 class="m0">{!! $content->title_ch !!}</h5>            
                <div class="divider az-header-divider mb0"></div-->
                <p class="az-pcontent" style="    width: 90%;">
                    {!! $content->short_description_ch !!}
                </p>
                
            </div>            

        </div>

        <!-- header -->
        <div class="row">
            <div class="col s12 p0">                       
                <div class="col s12" style="margin-top: 2em;">
                    <!-- News -->
                    <div id="eventd">


                            <div class="row">
                                <div class="col s12 m4">
                                    <img alt="{{ trim($press->alt) }}" src="{{ asset('assets/images/100-blank-img.jpg') }}" data-src="{{ asset('assets/images/pressrelease/') }}/{{ $press->image or 'azizi.jpg' }}"
                                         class="responsive-img">
                                </div>

                                <div class="col s12 m8">

                                    <div class="col s12 mt0" style="margin: 1em 0em;">
                                        <div class="desig-person m0">

                                            <div class="person-name mt0" style="font-weight: 900;text-transform: capitalize;    width: 90%;">
                                                {!! $press->title_ch !!}    
                                            </div>
                                            <!--i>
                                                $date = date("d F Y", strtotime($press->date));
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
                                            </i-->
                                        </div> 

                                        <p class="az-pcontent">
                                            @if(!empty($press->description_long_ch)){!! $press->description_long_ch !!} @else {!! $press->description_ch !!}  @endif
                                        </p>

                                        <div class="col s12 p0">

                                            <div class="col s12 m6 p0">
                                                <?php
                                                $files = File::files(STORE_PATH . "/assets/images/pressrelease/download/" . $press->id . "/document");
                                                $files2 = File::files(STORE_PATH . "/assets/images/pressrelease/download/" . $press->id . "/image");

                                                $doc_path = !empty($files) ? $files[0] : STORE_PATH . "/assets/images/pressrelease/download/" . $press->id . "/doc.zip";
                                                $img_path = !empty($files2) ? $files2[0] : STORE_PATH . "/assets/images/pressrelease/download/" . $press->id . "/img.zip";

                                                $doc_flag = 0;
                                                $img_flag = 0;
                                                $doc_url = 'javascript:void(0)';
                                                $img_url = 'javascript:void(0)';


                                                if (File::exists($doc_path)) {
                                                    $doc_flag = 1;
                                                    $doc_url = url("/") . "/assets/images/pressrelease/download/" . $press->id . "/document/" . basename($doc_path);
                                                }

                                                if (File::exists($img_path)) {
                                                    $img_flag = 1;
                                                    $img_url = url("/") . "/assets/images/pressrelease/download/" . $press->id . "/image/" . basename($img_path);
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

                                                <?php
                                                $facebook_share_url = "https://www.facebook.com/dialog/feed?app_id=136745863654131&redirect_uri="
                                                        . urlencode(url("$locale/mediacenter-eventgallery-detail/{$press->slug}")) . "&link="
                                                        . urlencode(url("$locale/mediacenter-newspress-detail/{$press->id}")) . ".&picture="
                                                        . urlencode(asset("assets/images/pressrelease/{$press->image}")) . "&caption={$press->title_ch}&description={$press->title_ch}";

                                                $twitter_share_url = "https://twitter.com/share?url=" . urlencode(url("$locale/mediacenter-newspress-detail/{$press->id}")) . "&via=AZIZI Developments&text={$press->title_ch}";

                                                $google_plus_url = "https://plus.google.com/share?url=" . urlencode(url("$locale/mediacenter-newspress-detail/{$press->id}"));

                                                $linkedin_sahre_url = "https://www.linkedin.com/shareArticle?mini=true&url=" . url("$locale") . "&title={$press->title_ch}&summary=" . date("d F Y", strtotime($press->date)) . "&source=LinkedIn";
                                                ?>

                                                    <a href="{{$facebook_share_url}}" target="_blank">
                                                        <i class="ion-social-facebook"></i>
                                                    </a>

                                                    <a href="{{$twitter_share_url}}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter">
                                                        <i class="ion-social-twitter"></i>
                                                    </a>

                                                    <a href="https://www.youtube.com/channel/UCmUtuRMwJxaovjGBNSXx-Jw"  target="_blank"><i class="ion-social-youtube"></i></a>

                                                    <a href="{{$linkedin_sahre_url}}" target="_blank">
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
