
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
<?php
if (!empty($results)) {

    $i = 0;
    foreach ($results as $result) {

        if ($locale == 'en') {
            $events['events'][$i]['event_title'] = $result->event_title;
            $events['events'][$i]['extra_desc'] = $result->extra_desc;
        } else if ($locale == 'ar') {
            $events['events'][$i]['event_title'] = !empty($result->event_title_ar) ?
                    $result->event_title_ar : $result->event_title;
            $events['events'][$i]['extra_desc'] = !empty($result->extra_desc_ar) ?
                    $result->extra_desc_ar : $result->extra_desc;
        } else if ($locale == 'cn') {
            $events['events'][$i]['event_title'] = !empty($result->event_title_ch) ?
                    $result->event_title_ch : $result->event_title;
            $events['events'][$i]['extra_desc'] = !empty($result->extra_desc_ch) ?
                    $result->extra_desc_ch : $result->extra_desc;
        }
        $events['events'][$i]['id'] = $result->id;
        $events['events'][$i]['event_photo'] = $result->event_photo;
        $events['events'][$i]['event_photo_ar'] = $result->event_photo_ar;
        $events['events'][$i]['event_photo_ch'] = $result->event_photo_ch;

        $events['events'][$i]['event_main_photo'] = $result->event_main_photo;

        $events['events'][$i]['slug'] = $result->slug;

        $events['events'][$i]['alt'] = $result->event_photo_alt;
        if (strlen($result->long_desc) <= 200) {
            if ($locale == 'en') {
                $events['events'][$i]['long_desc'] = $result->long_desc;
            } else if ($locale == 'ar') {
                $events['events'][$i]['long_desc'] = !empty($result->long_desc_ar) ? $result->long_desc_ar :
                        $result->long_desc;
            } else if ($locale == 'cn') {
                $events['events'][$i]['long_desc'] = !empty($result->long_desc_ch) ? $result->long_desc_ch :
                        $result->long_desc;
            }
        } else {
            if ($locale == 'en') {
                $events['events'][$i]['long_desc'] = substr($result->long_desc, 0, 200) . "...";
            } else if ($locale == 'ar') {
                $events['events'][$i]['long_desc'] = !empty($result->long_desc_ar) ?
                        substr($result->long_desc_ar, 0, 200) . "..." : substr($result->long_desc, 0, 200) . "...";
            } else if ($locale == 'cn') {
                $events['events'][$i]['long_desc'] = !empty($result->long_desc_ch) ?
                        substr($result->long_desc_ch, 0, 200) . "..." : substr($result->long_desc, 0, 200) . "...";
            }
        }

        $events['events'][$i]['starting_from'] = $result->starting_from;
        $events['events'][$i]['event_date'] = date("d F Y", strtotime($result->event_date));


        $event_photo_url = url('/') . "/assets/images/events/" . $result->event_photo;


        $schema_tag .= '<script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "Event",
          "name": "' . $result->event_title . '",
          "description": "' . $result->long_desc . '",
          "image": "' . $event_photo_url . '",
          "startDate": "2017-12-16T10:00",
          "endDate": "2018-03-16T10:00",
          "performer": {
                "@type": "Person",
                "name": "Thoe Developments",
           "telephone": "+97143596673"
          },
          "location": {
                "@type": "Place",
                "name": "The Mezzoon Ballroom",
                "address": {
                  "@type": "PostalAddress",
                  "streetAddress": "Jumeirah at Etihad Towers",
                  "addressLocality": "Abu Dhabi",
                  "postalCode": "",
                  "addressCountry": "AE"
                }
          }
        }
        </script>';

        $i++;
    }
}
?>


<section class="az-section">

    <div class="container">
        <div class="parallax-container valign-wrapper">
            <div class="parallax">
                @if($content->image!="")
                <img alt="{{ trim($content->alt) }}" src="{{ asset('assets/images/banner/') }}/{{ $content->image }}" >
                @endif
            </div>
        </div>

        <div class="row m0" style="padding:15px 0px;">
        
            @if($locale=='en')
                <span class="ion-ios-arrow-left" style=""></span>
            @endif

            @if($locale=='en')
                <a href="{{ url("/")}}/<?php echo $locale   ?>" style="color: #5a5a5a;">
                    {{trans('words.home')}} / 
                </a>
                <a href="{{ url("/")}}/<?php echo $locale   ?>/media-center" style="color: #5a5a5a;">
                    {{trans('words.Media centre')}} / 
                </a>
            @elseif($locale=='cn')

                <a href="{{ url("/")}}/<?php echo $locale   ?>" style="color: #5a5a5a;">
                    主页 / 
                </a>
                <a href="{{ url("/")}}/<?php echo $locale   ?>/media-center" style="color: #5a5a5a;">
                    媒体中心 / 
                </a>

            @elseif($locale=='ar')
                <a href="{{ url("/")}}/<?php echo $locale   ?>" style="color: #5a5a5a;">
                    {{trans('words.home')}} / 
                </a>
                <a href="{{ url("/")}}/<?php echo $locale   ?>/media-center" style="color: #5a5a5a;">
                    {{trans('words.Media centre')}} / 
                </a>
            @endif
                <a style="font-weight: 600;">
                    @if($locale=='en') {!! $content->title_en !!}
                    @elseif($locale=='ar') {!! $content->title_ar !!}
                    @elseif($locale=='cn') {!! $content->title_ch !!}
                    @endif
                </a>
            @if($locale=='ar')
                <span class="ion-ios-arrow-left" style=""></span>
            @endif

        </div>
    </div>

    <div class="container">

        <div class="row mb0 mdacntrevntglry">
            <div class="col s12 m12">
                <h5 class="m0">
                    @if($locale=='en') {!! $content->title_en !!}
                    @elseif($locale=='ar') {!! $content->title_ar !!}
                    @elseif($locale=='cn') {!! $content->title_ch !!}
                    @endif
                </h5>
                <div class="divider az-header-divider mb0"></div>
            </div>

            <div class="col s12">
                <p class="az-pcontent">
                    @if($locale=='en') {!! $content->short_description_en !!}
                    @elseif($locale=='ar') {!! $content->short_description_ar !!}
                    @elseif($locale=='cn') {!! $content->short_description_ch !!}
                    @endif
                </p>
            </div>

        </div>


        <!-- header -->
        <div class="row">
            <div class="col s12 p0">                       
                <div class="col s12" style="margin-top: 2em;">

                    <!-- News -->
                    <div id="eventd">


                        @if(!empty($events['events'])) @foreach($events['events'] as $event)
                        <?php
                        /* $start = strtotime($event['event_date']);
                          $now = date("Y-m-d");
                          $current_date = strtotime($now);
                          $days_between = ceil(abs($current_date - $start) / 86400); */
                        ?>
                        <div class="row">
                            <div class="col s12 m4">
                                @if($event['event_photo']!="")
                                <a href="{{ url('/') }}/{{$locale}}/mediacenter-eventgallery-detail/{{ $event['slug'] }}">
                                    @if($locale=='en')
                                    <img alt="{{ trim($event['alt']) }}"  src="{{ asset('assets/images/events/') }}/{{ $event['event_photo'] }}" class="responsive-img">
                                    @elseif($locale=='ar')
                                    <img alt="{{ trim($event['alt']) }}"  src="{{ asset('assets/images/events/') }}/{{ $event['event_photo_ar'] }}" class="responsive-img"
                                         @elseif($locale=='cn')
                                         <img alt="{{ trim($event['alt']) }}"  src="{{ asset('assets/images/events/') }}/{{ $event['event_photo_ch'] }}" class="responsive-img"
                                         @endif

                                </a>
                                @else
                                <a href="{{$locale}}/mediacenter-eventgallery-detail/{{ $event['slug'] }}"><img alt="{{ trim($event['alt']) }}"  src="{{ asset('assets/images/events/') }}/thoeaura.jpg" class="responsive-img">	</a>
                                @endif

                            </div>
                            <div @if ($locale == 'ar') class="col s12 m8 right-align" @else class="col s12 m8"  @endif>
                                @if($locale=='en')
                                <div class="col s12 mt0" style="padding: 0em 3em;margin: 1em 0em;">
                                    @endif
                                    @if($locale=='ar')
                                    <div class="col s12 mt0" style="padding: 0;margin: 1em 0em;">
                                        @endif
                                        @if($locale=='cn')
                                        <div class="col s12 mt0" style="padding: 0em 3em;margin: 1em 0em;">
                                            @endif
                                            <!-- <div class="col s12 mt0" style="padding: 0em 3em;margin: 1em 0em;"> -->
                                            <div class="desig-person m0">
                                                <a href="{{ url('/') }}/{{$locale}}/mediacenter-eventgallery-detail/{{ $event['slug'] }}">
                                                    <div class="person-name mt0" style="font-weight: 400;text-transform: capitalize;">{{ $event['event_title'] }}</div>
                                                    <!-- <i>{{ $event['event_date'] }}</i> -->
                                                    @if($locale=='en')
                                                    <i>{{ $event['event_date'] }}</i>
                                                    @endif
                                                    @if($locale=='cn')
                                                    <i><!--{{ $event['event_date'] }}-->
                                                        <?php
                                                        $date = $event['event_date'];
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
                                                    @endif
                                                    @if($locale=='ar')
                                                    <i>
                                                        <!-- {{ $event['event_date'] }} -->
                                                        <?php
                                                        $date = $event['event_date'];
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
                                                    @endif
                                                </a>
                                            </div>

                                            <p class="az-pcontent">{!! $event['long_desc'] !!}</p>


                                            <a href="{{ url('/') }}/{{$locale}}/mediacenter-eventgallery-detail/{{ $event['slug'] }}" style="font-size: 12px;text-decoration: underline;color: grey;">
                                                @if($locale == 'ar')قراءة المزيد  @else{{trans('words.Read more')}} @endif
                                            </a>

                                            <div class="col s12 p0">
                                                <div @if ($locale == 'ar') class="col s12 m12 p0 right-align" @else class="col s12 m6 p0"  @endif style="margin-top: 12px;">
                                                    <p class="az-pcontent social-share">
                                                        <strong style="margin-right: 15px;font-size: 12px;">
                                                            @if($locale == 'ar') مشاركة: @else{{trans('words.Share')}} @endif 
                                                        </strong>

                                                        <a href="https://www.facebook.com/dialog/feed?app_id=136745863654131&redirect_uri={{ url('/') }}/mediacenter-eventgallery-detail/{{ $event['slug'] }}&link={{ url('/') }}/mediacenter-eventgallery-detail/{{ $event['slug'] }}&picture={{ asset('assets/images/events/') }}/{{ $event['event_photo'] }}&caption={{ $event['event_title'] }}&description={{ $event['event_title'] }}"><i class="ion-social-facebook"></i></a>

                                                        <a href="https://twitter.com/share?url={{ url('/') }}/mediacenter-eventgallery-detail/{{ $event['slug'] }}&via=THOE Developments&text={{ $event['event_title'] }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter"><i class="ion-social-twitter"></i></a>

                                                        <a href="https://plus.google.com/share?url={{ url('/') }}/mediacenter-eventgallery-detail/{{ $event['slug'] }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="ion-social-googleplus"></i></a>

                                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?=SITE_URL?>/&title={{ $event['event_title'] }}&summary={!! $event['event_date'] !!}&source=LinkedIn"><i class="ion-social-linkedin"></i></a>

                                                        <!--	<a href="#"><i class="ion-social-instagram"></i></a> -->

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12" style="margin-bottom: 1em;">
                                        <div class="divider"></div>
                                    </div>
                                </div>

                                @endforeach @endif	

                                <!-- Pagination -->
                                <div class="row">
                                    <div class="col s12 center-align p0">
                                        {!! $render; !!}
                                    </div>
                                </div>
                                <!-- End -->
                                <script>
                                    function shareToDownload() {
                                        FB.ui({
                                            method: 'feed',
                                            name: "Share Title",
                                            link: 'Share Link',
                                            picture: 'Share Image',
                                            caption: "Share Caption",
                                            description: "Share Description",
                                            message: "Share Message"
                                        }, function (response) {
                                            if (response && !response.error_code) {
                                                /*Write your download code here*/
                                            }
                                        });
                                    }
                                </script>


                            </div>

                        </div>
                    </div>
                </div>
                <!-- end -->

            </div>

            <div class="container">

            </div>

            </section>
            <!-- End -->

            <!--<a href="https://www.facebook.com/sharer/sharer.php?u=URLENCODED_URL&t=TITLE" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook">FB</a>
            
            <a href="https://twitter.com/share?url=URLENCODED_URL&via=TWITTER_HANDLE&text=TEXT" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter">twitter</a>
            
            <a href="https://plus.google.com/share?url=URLENCODED_URL" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=350,width=480');return false;" target="_blank" title="Share on Google+">Gplus</a>-->

            <!--
            <a title="send to Facebook" href="http://www.facebook.com/sharer.php?s=100&p[title]=THOE event&p[summary]=YOUR_SUMMARY&p[url]=<?=SITE_URL?>/category/events&p[images][0]=YOUR_IMAGE_TO_SHARE_OBJECT" target="_blank">fb</a>
            
            <a href="http://twitter.com/share?text=An%20intersting%20blog&url=<?=SITE_URL?>/category/events" target="_blank" title="Click to post to Twitter">Tweet this</a>
            
            
            <a href="<?=SITE_URL?>" data-image="article-1.jpg" data-title="Article Title" data-desc="Some description for this article" class="btnShare">Share</a> 
            -->

            @stop
            @section('footer_main_scripts')
            

            <script>
                                    $(window).on('hashchange', function () {
                                        if (window.location.hash) {
                                            var page = window.location.hash.replace('#', '');
                                            if (page == Number.NaN || page <= 0) {
                                                return false;
                                            } else {
                                                getData(page);
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



                                        $(document).on('click', '.pagination a', function (event)
                                        {
                                            $('li').removeClass('active');
                                            $(this).parent('li').addClass('active');
                                            event.preventDefault();
                                            var myurl = $(this).attr('href');
                                            var page = $(this).attr('href').split('page=')[1];
                                            getData(page);
                                        });
                                    });
                                    function getData(page) {
                                        $.ajax(
                                                {
                                                    url: '?page=' + page + "&from_date={{ $from_date }}&to_date={{ $to_date }}&keyword={{ $keyword }}&sort={{ $sort }}",
                                                    type: "get",
                                                    datatype: "html",
                                                    // beforeSend: function()
                                                    // {
                                                    //     you can show your loader 
                                                    // }
                                                })
                                                .done(function (data)
                                                {
                                                    //console.log(data);

                                                    $("#eventd").empty().html(data);
                                                    location.hash = page;
                                                })
                                                .fail(function (jqXHR, ajaxOptions, thrownError)
                                                {
                                                    alert('No response from server');
                                                });
                                    }
                                    function submitform()
                                    {
                                        document.getElementById("autocomplete-input").value = "";
                                        document.getElementById("to_date").value = "";
                                        document.getElementById("from_date").value = "";
                                        document.search.submit();
                                    }
            </script>

            @stop
            @section('footer_scripts')
            <script>$(".datepicker").pickadate({selectMonths: !0, selectYears: 15, today: "Today", clear: "Clear", close: "Ok", closeOnSelect: !1});</script>
            <script>
                window.fbAsyncInit = function () {
                    FB.init({
                        appId: '136745863654131', status: true, cookie: true, xfbml: true});
                };
                (function (d, debug) {
                    var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
                    if (d.getElementById(id)) {
                        return;
                    }
                    js = d.createElement('script');
                    js.id = id;
                    js.async = true;
                    js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
                    ref.parentNode.insertBefore(js, ref);
                }(document, /*debug*/ false));
                function postToFeed(title, desc, url, image) {
                    var obj = {method: 'share', href: '<?=SITE_URL?>/mediacenter-eventgallery-detail/85', picture: '<?=SITE_URL?>/public/assets/images/events/1512462314270004696.jpg', title: "himani", description: "thoe test"};
                    function callback(response) {}
                    FB.ui(obj, callback);
                }
                $('.btnShare').click(function () {
                    elem = $(this);
                    postToFeed(elem.data('title'), elem.data('desc'), elem.prop('href'), elem.data('image'));

                    return false;
                });
            </script>
            @stop