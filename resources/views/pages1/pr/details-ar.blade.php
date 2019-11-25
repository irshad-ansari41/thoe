
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
        p{font-size:12px; line-height: 18px;}
        .az-pcontent, p{text-align:right !important;}

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
            <div class="col s12 center-align card tag-pro-ar">
                <h1>{{$content->title_ar}}</h1>
            </div>

        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <?=
                    generate_breadcrumb([
                        url("$locale") => trans('words.home'),
                        url("/$locale/media-center") => trans('words.Media centre'),
                        url("$locale/news-pr/") => $content->title_ar,
                        '' => $press->title_ar
                            ], $locale);
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="col s12 m12">
            <!--h5 class="m0">{!! $content->title_ar !!}</h5>            
            <div class="divider az-header-divider mb0"></div-->
            <p class="az-pcontent" style="    width: 90%;">
                {!! $content->short_description_ar !!}
            </p>

        </div>            

        <!-- header -->
        <div class="row">
            <div class="col s12 p0">                       
                <div class="col s12" style="margin-top: 2em;">
                    <!-- News -->
                    <div id="eventd">

                        <div class="row">
                            <div class="col s12 m4">
                                <?php
                                $thumbnail = asset('assets/images/pressrelease/') . '/' . (!empty($press->image) ? $press->image : 'thoe.jpg');
                                ?>
                                <img alt="{{ trim($press->alt) }}" src="{{ asset('assets/images/100-blank-img.jpg') }}" data-src="{{ $thumbnail}}"
                                     class="responsive-img">
                            </div>

                            <div class="col s12 m8">

                                <div class="col s12 mt0" style="margin: 1em 0em;">

                                    <div class="desig-person m0">

                                        <div class="person-name mt0" style="font-weight: 400;text-transform: capitalize;    width: 90%;">
                                            {!! $press->title_ar !!}    
                                        </div>
                                        <!--i>
                                        <?php
                                        $date = date("d F Y", strtotime($press->date));
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
    
                                        </i-->

                                    </div> 

                                    <p class="az-pcontent">
                                        <?php
                                        if (!empty($press->description_long_ar)) {
                                            $description = $press->description_long_ar;
                                        } else {
                                            $description = $press->description_long_ar;
                                        }
                                        echo $description;
                                        ?>
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
                                                $social = social_share($press->title, $description, $thumbnail, Request::url());
                                                ?>

                                                <a href="#" id="social-link-1" title="Share on Facefook">
                                                    <i class="ion-social-facebook"></i>
                                                </a>

                                                <a href="#" id="social-link-2" title="Share on Twitter">
                                                    <i class="ion-social-twitter"></i>
                                                </a>

                                                <a href="https://www.youtube.com/channel/UCmUtuRMwJxaovjGBNSXx-Jw"  target="_blank"><i class="ion-social-youtube"></i></a>

                                                <a href="#" id="social-link-3" title="Share on LinkedIn">
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


@stop
@section('footer_scripts')
<script>$(".datepicker").pickadate({selectMonths: !0, selectYears: 15, today: "Today", clear: "Clear", close: "Ok", closeOnSelect: !1});</script>
<script>
    $(window).on('hashchange', () => {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                //getData(page);
            }
        }
    });
    $(document).ready(() => {
        $(document).on('click', '#topsearch', (event) => {
            document.tform.submit();
        });

        $(document).on('click', '#sbutton', (event) => {
            document.search.submit();
        });

        $('.pagination li a').click((e) => {
            e.preventDefault();
            $('input[name=page]').val($(this).text());
            $('form#search').submit();
        });

        $('#social-link-1').click((e) => {
            openInNewTab('<?= $social->facebook ?>');
        });
        $('#social-link-2').click((e) => {
            openInNewTab('<?= $social->twitter ?>');
        });
        $('#social-link-3').click((e) => {
            openInNewTab('<?= $social->linkedin ?>');
        });

    });

    function openInNewTab(url) {
        var win = window.open(url, '_blank');
        win.focus();
    }
</script>
@stop
