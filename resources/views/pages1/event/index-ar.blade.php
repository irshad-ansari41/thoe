
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
        <div class="parallax-container valign-wrapper only-heading">
            <div class="parallax">
                @if($content->image!="")
                <img alt="{{ trim($content->alt) }}" src="{{ asset('assets/images/banner/') }}/{{ $content->image }}" >
                @endif
            </div>
            <div class="col s12 center-align card tag-pro-ar">
                <h1>{{$content->title_ar}}</h1>
            </div>
            
        </div>

        <div class="row m0" style="padding:15px 0px;">
            <?=
            generate_breadcrumb([
                url("$locale") => trans('words.home'),
                url("/$locale/media-center") => trans('words.Media centre'),
                '' => $content->title_ar
                    ], $locale)
            ?>
        </div>
    </div>

    <div class="container">

        <div class="row mb0 mdacntrevntglry">
            <div class="col s12">
                <p class="az-pcontent">
                    <?= $content->short_description_ar ?>
                </p>
            </div>

        </div>


        <!-- header -->
        <div class="row">
            <div class="col s12 p0">                       
                <div class="col s12" style="margin-top: 2em;">

                    <!-- News -->
                    <div id="eventd">

                        @if(!empty($events)) 
                        @foreach($events as $event)
                        @if($event->status ==1)
                        <div class="row">
                            <div class="col s12 m4">
                                @if($event->event_photo_ar!="")
                                <a href="{{ url('/') }}/{{$locale}}/events/{{ $event->slug_ar }}">
                                    <img alt="{{ trim($event->event_photo_alt) }}"  src="{{ asset('assets/images/events/') }}/{{ $event->event_photo_ar }}" class="responsive-img"
                                </a>
                                @else
                                <a href="{{$locale}}/events/{{ $event->slug_ar }}"><img alt="{{ trim($event->event_photo_alt) }}"  src="{{ asset('assets/images/events/') }}/thoeaura.jpg" class="responsive-img">	</a>
                                @endif

                            </div>
                            <div class='col s12 m8 right-align'>
                                <div class="col s12 mt0" style="padding: 0;margin: 1em 0em;">
                                    <!-- <div class="col s12 mt0" style="padding: 0em 3em;margin: 1em 0em;"> -->
                                    <div class="desig-person m0">
                                        <a href="{{ url('/') }}/{{$locale}}/events/{{ $event->slug_ar }}">
                                            <div class="person-name mt0" style="font-weight: 400;text-transform: capitalize;">
                                                <?= $event->event_title_ar ?>
                                            </div>
                                            <i>

                                                <?php
                                                $date = $event->event_date;
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
                                        </a>
                                    </div>

                                    <p class="az-pcontent"> 
                                        <?= $event->extra_desc_ar ?>
                                    </p>

                                    <a href="{{ url('/') }}/{{$locale}}/events/{{ $event->slug_ar }}" style="font-size: 12px;text-decoration: underline;color: grey;font-weight: bold;">
                                        {{trans('words.Read more')}}
                                    </a>

                                    <div class="col s12 p0">
                                        <div class="col s12 m12 p0 right-align">
                                            <p class="az-pcontent social-share">
                                                <strong style="margin-right: 15px;font-size: 12px;">
                                                    {{trans('words.Share')}}
                                                </strong>

                                                <a href="https://www.facebook.com/dialog/feed?app_id=136745863654131&redirect_uri={{ url('/'.$locale.'/') }}/events/{{ $event->slug_ar }}&link={{ url('/'.$locale.'/') }}/events/{{ $event->slug_ar }}&picture={{ asset('assets/images/events/') }}/{{ $event->event_photo_ar }}&caption={{ $event->event_title_ar }}&description={{ $event->event_title_ar }}" target="_blank"><i class="ion-social-facebook"></i></a>

                                                <a href="https://twitter.com/share?url={{ url('/'.$locale.'/') }}/events/{{ $event->slug_ar }}&via=THOE Developments&text={{ $event->event_title_ar }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter" ><i class="ion-social-twitter"></i></a>

                                                <a href="https://www.youtube.com/channel/UCmUtuRMwJxaovjGBNSXx-Jw"  target="_blank"><i class="ion-social-youtube"></i></a>

                                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?=SITE_URL?>/&title={{ $event->event_title_ar }}&summary={{date("d F Y", strtotime( $event->event_date)) }}&source=LinkedIn" target="_blank"><i class="ion-social-linkedin"></i></a>


                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12" style="margin-bottom: 1em;">
                                <div class="divider"></div>
                            </div>
                        </div>
                        <?php
                        $schema_tag .= '<script type="application/ld+json">
                                                {
                                                  "@context": "http://schema.org",
                                                  "@type": "Event",
                                                  "name": "' . $event->event_title_ar . '",
                                                  "description": "' . $event->extra_desc_ar . '",
                                                  "image": "' . url('/') . "/assets/images/events/" . $event->event_photo_ar . '",
                                                  "startDate": "' . $event->event_date . ' T ' . $event->event_start_time . '",
                                                  "endDate": "' . $event->event_date . ' T ' . $event->event_end_time . '",
                                                  "performer": {
                                                        "@type": "Person",
                                                        "name": "Thoe Developments",
                                                   "telephone": "+97143596673"
                                                  },
                                                  "location": {
                                                        "@type": "Place",
                                                        "name": "' . $event->visit_us_at_ar . '",
                                                        "address": {
                                                          "@type": "PostalAddress",
                                                          "streetAddress": "' . $event->event_place_ar . '",
                                                          "addressLocality": "' . $event->event_location_ar . '",
                                                          "postalCode": "",
                                                          "addressCountry": "UAE"
                                                        }
                                                  }
                                                }
                                                </script>';
                        ?>
                        @endif
                        @endforeach 

                        @endif	

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
        var obj = {method: 'share', href: '<?=SITE_URL?>/events/85', picture: '<?=SITE_URL?>/assets/images/events/1512462314270004696.jpg', title: "himani", description: "thoe test"};
        function callback(response) {}
        FB.ui(obj, callback);
    }
    $('.btnShare').click(function () {
        elem = $(this);
        postToFeed(elem.data('title'), elem.data('desc'), elem.prop('href'), elem.data('image'));

        return false;
    });
    sessionStorage.setItem("utm_source", 'Website');
    sessionStorage.setItem("utm_campaign", 'Event');
</script>
@stop