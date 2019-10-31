@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<!-- Chart -->
<link rel="stylesheet" href="{{asset('assets/chart/css/jquery.circliful.css')}}">
<!-- end -->
<link rel="stylesheet" href="{{asset('assets/owlcarousel/owl.carousel.min.css')}}">
<style>
    .slide-cont {
        display: block;
        margin: 0 auto;
    }

    .owl-carouse div {
        width: 100%;
    } 
    .owl-carousel .owl-controls .owl-dot {
        float: left;
        background-size: cover;
        margin-top: 10px;
    }

    .owl-carousel .owl-dot {
        float: left;
        background-size: cover;
    }

    .owl-dot.active {
        width: 15px;
        height: 15px;
        border-radius: 0;
        margin: 0;
        border: 2px solid #797979;
    }

    .owl-dot {
        width: 75px !important;
        height: 75px !important;
        background: rgba(255, 255, 255, 0);
        border-radius: 0;
        display: inline-block;
        margin: 0px 3px;
        border: 1px solid white;
    }

    .owl-dots {
        min-height: auto;
        z-index: 999;
        width: 100%;
        text-align: center;
        position: initial;
        top: -weblot-calc(90%);
        top: -ms-calc(90%);
        top: -moz-calc(90%);
        top: inherit;
        margin-top: 1em;
    }
    .delivered .circle {
        border-radius: 50%;
        stroke: #8BC34A;
    }

    /*.side-nav li>a {color: rgba(255, 255, 255, 0.87); }*/

    .az-menu .icon {
        font-size: 45px;
        height: auto;
        line-height: normal;
        padding-top: 15px;
        color: #424242;
    }

    .indicators {
        display: none;
    }

    .slider .slides {
        height: 510px !important;
    }

    .modal-overlay {
        opacity: 0.9 !important;
        z-index: 99 !important;
    }

</style>
@stop

@section('main_div_wrapper')
@stop

@section('section_content')
<?php
if ($property->plan_start_date != "" && $property->plan_end_date != "") {
    if ($property->plan_end_date > date("Y-m-d")) {
        $datediff = '';
        $text = 'On Going';
        $flag = '2';
    } else {
        $date1 = $property->plan_start_date;
        $date2 = $property->plan_end_date;
        $datediff = strtotime($date2) - strtotime($date1);
        $days = floor($datediff / (60 * 60 * 24));
        $text = 'Completed';
        $flag = '1';
    }
} else if ($property->plan_start_date != "" && $property->plan_end_date == "") {
    //$text = 'No data';
    $text = $property->nfcstatus;
    $flag = '3';
} else if ($property->plan_start_date == "" && $property->plan_end_date == "") {
    //$text = 'No data';
    $text = $property->nfcstatus;
    $flag = '3';
}
?>
<!-- Projects -->
<section class="az-section">



    <div class="container">
        <div class="parallax-container valign-wrapper">
            <div class="parallax">
                @if($property->construction_header!="")
                <img alt="{!!  trim($property->construction_alt) !!}" src="{{ asset('assets/images/properties/') }}/{{ $project->gallery_location }}/{{ $property->gallery_location }}/{{ $property->construction_header }}"/>
                @else
                <img alt="{!! trim($property->construction_alt) !!}" src="<?= SITE_URL ?>/public/assets/images/projects/15126440201188405583.jpg"/>                 
                @endif
            </div>

            <div class="col s12 center-align card tag-pro{{$locale == 'ar'?'-ar':''}}">
                <h1>{{showTextByLocale($locale,[$property->title_en,$property->title_ar,$property->title_ch])}}</h1>
                <?php if (trim($property->slug) == "Azizi Victoria" || trim($property->slug) == "عزيزي فيكتوريا") { ?>
                    <p><i class="ion ion-ios-location-outline"></i> {{trans('words.MEYDAN')}}</p>
                <?php } else { ?>
                    <p><i class="ion ion-ios-location-outline"></i>   {{ $project->title_en }}</p>
                <?php } ?>

            </div>



        </div>
        <div class="">
            <div class="row m0">
                <div class="col s12 p0">

                    <?php
                    if ($locale == 'en') {
                        $links = [
                            url("$locale") => trans('words.home'),
                            url("$locale/dubai/construction-updates") => trans('words.Construction Updates'),
                        ];
                        if (in_array($project->slug, ['victoria', 'riviera', 'avenue'])) {
                            $links[url("$locale/dubai/meydan/construction-updates")] = trans('words.MEYDAN');
                        }
                        $links[url("$locale/dubai/meydan/{$project->slug}/construction-updates")] = $project->title_en;
                        $links[''] = $property->title_en;
                    } elseif ($locale == 'ar') {
                        $links = [
                            url("$locale") => trans('words.home'),
                            url("$locale/dubai/construction-updates") => trans('words.Construction Updates'),
                        ];
                        if (in_array($project->slug, ['victoria', 'riviera', 'avenue'])) {
                            $links[url("$locale/dubai/meydan/construction-updates")] = trans('words.MEYDAN');
                        }
                        $links[url("$locale/dubai/meydan/{$project->slug}/construction-updates")] = $project->title_ar;
                        $links[''] = $property->title_ar;
                    } elseif ($locale == 'cn') {
                        $links = [
                            url("$locale") => trans('words.home'),
                            url("$locale/dubai/construction-updates") => trans('words.Construction Updates'),
                        ];
                        if (in_array($project->slug, ['victoria', 'riviera', 'avenue'])) {
                            $links[url("$locale/dubai/meydan/construction-updates")] = trans('words.MEYDAN');
                        }
                        $links[url("$locale/dubai/meydan/{$project->slug}/construction-updates")] = $project->title_ch;
                        $links[''] = $property->title_ch;
                    }
                    ?>
                    <?= generate_breadcrumb($links, $locale) ?>
                </div>
            </div>
        </div>
    </div>


    <div class="container" style="margin-top: 2em;">
        <?php $ar =['Riviera Phase 1','Riviera Phase 2','Riviera Phase 3']; ?>
        <div class="row">
            <div class="col s12 p0">
                <?php if (!in_array($property->title_en, $ar)): ?>
                <div class="col s12 m2">
                    <div class="col s12 card {{$property->mobilization_percentage=='100'?'delivered':''}}">
                        <div class="progress-circle-mobilization"></div>
                        <h6 class="az-title center-align">
                            @if($locale=='en')
                            {{trans('words.Mobilization')}}
                            @elseif($locale=='cn')
                            地基工作
                            @elseif($locale=='ar')
                            {{trans('words.Mobilization')}}
                            @endif
                        </h6>
                    </div>
                </div>
                
                <div class="col s12 m2">
                    <div class="col s12 card {{$property->structure_percentage=='100'?'delivered':''}}">
                        <div class="progress-circle-structure"></div>
                        <h6 class="az-title center-align">
                            @if($locale=='en')
                            {{trans('words.Structure')}}
                            @elseif($locale=='cn')
                            地基工作
                            @elseif($locale=='ar')
                            {{trans('words.Structure')}}
                            @endif
                        </h6>
                    </div>
                </div>
                <div class="col s12 m2">
                    <div class="col s12 card {{$property->mep_percentage=='100'?'delivered':''}}">
                        <div class="progress-circle-mep"></div>
                        <h6 class="az-title center-align">
                            @if($locale=='en')
                            {{trans('words.MEP Works')}}
                            @elseif($locale=='cn')
                            建筑结构
                            @elseif($locale=='ar')
                            {{trans('words.MEP Works')}}
                            @endif
                        </h6>

                    </div>
                </div>
                <div class="col s12 m2">
                    <div class="col s12 card {{$property->finishes_percentage=='100'?'delivered':''}}">
                        <div class="progress-circle-finishes"></div>
                        <h6 class="az-title center-align">
                            @if($locale=='en')
                            {{trans('words.Services & Finishing')}}
                            @elseif($locale=='cn')
                            服务设施和收尾
                            @elseif($locale=='ar')
                            {{trans('words.Services & Finishing')}}
                            @endif
                        </h6>

                    </div>
                </div>
                
                <div class="col s12 m2">
                    <div class="col s12 card {{$property->total_completion=='100'?'delivered':''}}">
                        <div class="progress-circle-overall"></div>
                        <h6 class="az-title center-align">
                            @if($locale=='en')
                            {{trans('words.Overall Progress')}}
                            @elseif($locale=='cn')
                            服务设施和收尾
                            @elseif($locale=='ar')
                            {{trans('words.Overall Progress')}}
                            @endif
                        </h6>

                    </div>
                </div>
                <div class="col s12 m2 card center-align">
                    <div class="col s12" style="    margin-top: 1.8rem;">
                        <!-- <div class="progress-circle-overall"></div> -->
                        <?php if ($flag == "3") { ?>
                            <div class="col s12" style="">
                                <?php if (!empty($text)) { ?>
                                    <h6 style="text-transform: uppercase;letter-spacing: 4px;font-size: 14px !important;background: black;color: white;border-radius: 0px;padding: 10px 0px;margin-bottom: 0;">
                                        @if($locale=='en')
                                        {{trans('words.Delivery date')}}
                                        @elseif($locale=='cn')
                                        预计交工日期
                                        @elseif($locale=='ar')
                                        {{trans('words.Delivery date')}}
                                        @endif
                                    </h6>

                                    <h4 style="margin-top: 3rem;border: 1px dashed grey;padding: 15px 0px;border-bottom: 10px solid black;"><?= $text ?></h4>
                                <?php } ?>
                            </div>        
                        <?php } elseif ($flag != '3') { ?>
                            <div class="col s12" style="margin-top: 2.2rem;">

                                <?php if ($flag == "1") { ?>
                                    <h4 style="text-transform: uppercase;letter-spacing: 4px;font-size: 16px;background: black;color: white;border-radius: 0px;padding: 10px 0px;margin-bottom: 0;line-height: 23px;">
                                        @if($locale=='en')
                                        Delivered on <br><?php echo date('j F Y', strtotime($property->plan_end_date)); ?>
                                        @elseif($locale=='cn')
                                        预计交工日期
                                        @elseif($locale=='ar')
                                        {{trans('words.Delivery date')}}
                                        @endif
                                    </h4>

                                    <h3 style=""> <span class="ion-ios-time-outline"></span><br></h3>
                                    <h4 style="line-height: 25px;text-transform: uppercase;margin: 0;">{{ $days }} <br>
                                        @if($locale=='en')
                                        <span style="font-size: 15px;font-weight: 100;">{{trans('words.days of construction')}}</span></h4>
                                    @elseif($locale=='cn')
                                    <span style="font-size: 15px;font-weight: 100;">施工天数</span></h4>
                                    @elseif($locale=='ar')
                                    <span style="font-size: 15px;font-weight: 100;">{{trans('words.days of construction')}}</span></h4>
                                    @endif
                                <?php } elseif ($flag == "2") { ?>
                                    <h4 style="text-transform: uppercase;letter-spacing: 4px;font-size: 18px;background: black;color: white;border-radius: 0px;padding: 10px 0px;margin-bottom: 0;">
                                        @if($locale=='en')
                                        {{trans('words.Delivery date')}}
                                        @elseif($locale=='cn')
                                        预计交工日期
                                        @elseif($locale=='ar')
                                        {{trans('words.Delivery date')}}
                                        @endif
                                    </h4>

                                    <p style="margin: 5px 0px;"><?php echo date("d-m-Y", strtotime($property->plan_end_date)); ?></p>
                                    <h5 style="margin-bottom: 10px;font-size: 4rem;margin-top: 15px;"><span class="ion-ios-timer-outline"></span></h5>
                                    <h6 id="demo" style="font-size: 20px;text-transform: uppercase;margin-top: 10px;"><span style="font-weight: 600;font-size: 2.5rem"></h6>
                                    <h4 style="line-height: 25px;text-transform: uppercase;margin: 0;"><span style="font-size: 15px;font-weight: 100;">{{trans('words.to complete')}}</span></h4>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <!-- @if($locale=='en')
                        <a href="<?= !empty($booklink) ? $booklink : '' ?>">
                            <h6 class="btn-enquire" style="right: -4.3rem;"><strong style="font-size: 20px;margin-right: 5px;"><i class="ion-ios-paperplane-outline"></i></strong>{{trans('words.BOOK NOW')}}</h6>
                        </a>

                        @elseif($locale=='ar')
                        <a href="<?= !empty($booklink) ? $booklink : '' ?>">
                            <h6 class="btn-enquire" style="right: -4.3rem;"><strong style="font-size: 20px;margin-right: 5px;"><i class="ion-ios-paperplane-outline"></i></strong>{{trans('words.BOOK NOW')}}</h6>
                        </a>

                        @elseif($locale=='cn')

                        <a href="<?= !empty($booklink) ? $booklink : '' ?>">
                            <h6 class="btn-enquire" style="right: -3rem;"><strong style="font-size: 20px;margin-right: 5px;"><i class="ion-ios-paperplane-outline"></i></strong>{{trans('words.BOOK NOW')}}</h6>
                        </a>


                        @endif
                        -->


                    </div>
                </div>
                <?php else: ?>
                <div class="col s12 m2"></div>
                <div class="col s12 m2"></div>
                
                <div class="col s12 m2">
                    <div class="col s12 card {{$property->total_completion=='100'?'delivered':''}}">
                        <div class="progress-circle-overall"></div>
                        <h6 class="az-title center-align">
                            @if($locale=='en')
                            {{trans('words.Overall Progress')}}
                            @elseif($locale=='cn')
                            服务设施和收尾
                            @elseif($locale=='ar')
                            {{trans('words.Overall Progress')}}
                            @endif
                        </h6>

                    </div>
                </div>
                
                <div class="col s12 m2 card center-align">
                    <div class="col s12" style="    margin-top: 1.8rem;">
                        <!-- <div class="progress-circle-overall"></div> -->
                        <?php if ($flag == "3") { ?>
                            <div class="col s12" style="">
                                <?php if (!empty($text)) { ?>
                                    <h6 style="text-transform: uppercase;letter-spacing: 4px;font-size: 14px !important;background: black;color: white;border-radius: 0px;padding: 10px 0px;margin-bottom: 0;">
                                        @if($locale=='en')
                                        {{trans('words.Delivery date')}}
                                        @elseif($locale=='cn')
                                        预计交工日期
                                        @elseif($locale=='ar')
                                        {{trans('words.Delivery date')}}
                                        @endif
                                    </h6>

                                    <h4 style="margin-top: 3rem;border: 1px dashed grey;padding: 15px 0px;border-bottom: 10px solid black;"><?= $text ?></h4>
                                <?php } ?>
                            </div>        
                        <?php } elseif ($flag != '3') { ?>
                            <div class="col s12" style="margin-top: 2.2rem;">

                                <?php if ($flag == "1") { ?>
                                    <h4 style="text-transform: uppercase;letter-spacing: 4px;font-size: 16px;background: black;color: white;border-radius: 0px;padding: 10px 0px;margin-bottom: 0;line-height: 23px;">
                                        @if($locale=='en')
                                        Delivered on <br><?php echo date('j F Y', strtotime($property->plan_end_date)); ?>
                                        @elseif($locale=='cn')
                                        预计交工日期
                                        @elseif($locale=='ar')
                                        {{trans('words.Delivery date')}}
                                        @endif
                                    </h4>

                                    <h3 style=""> <span class="ion-ios-time-outline"></span><br></h3>
                                    <h4 style="line-height: 25px;text-transform: uppercase;margin: 0;">{{ $days }} <br>
                                        @if($locale=='en')
                                        <span style="font-size: 15px;font-weight: 100;">{{trans('words.days of construction')}}</span></h4>
                                    @elseif($locale=='cn')
                                    <span style="font-size: 15px;font-weight: 100;">施工天数</span></h4>
                                    @elseif($locale=='ar')
                                    <span style="font-size: 15px;font-weight: 100;">{{trans('words.days of construction')}}</span></h4>
                                    @endif
                                <?php } elseif ($flag == "2") { ?>
                                    <h4 style="text-transform: uppercase;letter-spacing: 4px;font-size: 18px;background: black;color: white;border-radius: 0px;padding: 10px 0px;margin-bottom: 0;">
                                        @if($locale=='en')
                                        {{trans('words.Delivery date')}}
                                        @elseif($locale=='cn')
                                        预计交工日期
                                        @elseif($locale=='ar')
                                        {{trans('words.Delivery date')}}
                                        @endif
                                    </h4>

                                    <p style="margin: 5px 0px;"><?php echo date("d-m-Y", strtotime($property->plan_end_date)); ?></p>
                                    <h5 style="margin-bottom: 10px;font-size: 4rem;margin-top: 15px;"><span class="ion-ios-timer-outline"></span></h5>
                                    <h6 id="demo" style="font-size: 20px;text-transform: uppercase;margin-top: 10px;"><span style="font-weight: 600;font-size: 2.5rem"></h6>
                                    <h4 style="line-height: 25px;text-transform: uppercase;margin: 0;"><span style="font-size: 15px;font-weight: 100;">{{trans('words.to complete')}}</span></h4>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <!-- @if($locale=='en')
                        <a href="<?= !empty($booklink) ? $booklink : '' ?>">
                            <h6 class="btn-enquire" style="right: -4.3rem;"><strong style="font-size: 20px;margin-right: 5px;"><i class="ion-ios-paperplane-outline"></i></strong>{{trans('words.BOOK NOW')}}</h6>
                        </a>

                        @elseif($locale=='ar')
                        <a href="<?= !empty($booklink) ? $booklink : '' ?>">
                            <h6 class="btn-enquire" style="right: -4.3rem;"><strong style="font-size: 20px;margin-right: 5px;"><i class="ion-ios-paperplane-outline"></i></strong>{{trans('words.BOOK NOW')}}</h6>
                        </a>

                        @elseif($locale=='cn')

                        <a href="<?= !empty($booklink) ? $booklink : '' ?>">
                            <h6 class="btn-enquire" style="right: -3rem;"><strong style="font-size: 20px;margin-right: 5px;"><i class="ion-ios-paperplane-outline"></i></strong>{{trans('words.BOOK NOW')}}</h6>
                        </a>


                        @endif
                        -->


                    </div>
                </div>
                <div class="col s12 m2"></div>
                <div class="col s12 m2"></div>
                
                
                <?php endif; ?>
                
            </div>
        </div>

        <?php if (!empty($property->csuyoutubelink)): ?>
            <section>
                <div class="row">
                    <div class="col s12 vdotur p0 yes" style="margin-top: 1em;">
                        <div class="col s12 m12">
                            <div class="col s12 p0">
                                <!--h2>{{showTextByLocale($locale,[$property->title_en,$property->title_ar,$property->title_ch])}}</h2-->
                                <iframe src="https://www.youtube.com/embed/{{ $property->csuyoutubelink }}" frameborder="0" allowfullscreen style="width: 100%;height: 450px;"></iframe>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 vdotur p0 yes" style="padding-bottom: 1.8em !important;"></div>

                </div>
            </section>
        <?php endif; ?>

        @if($galleries)
        <?php if ($flag == "3" || $flag == "2") { ?>
            <div class="row" style="margin-top: 2em;">
                <div class="col s12" style="margin-bottom: 2em;">
                    <h2 class="az-title left-align" style="font-weight: 800;">
                        @if($locale=='en')
                        {{trans('words.Project gallery')}}
                        @elseif($locale=='cn')
                        施工进度更新
                        @elseif($locale=='ar')
                        {{trans('words.Project gallery')}}
                        @endif  
                    </h2>
                    <div class="divider az-header-divider" style="margin-bottom: 0;"></div>

                </div><br>



                <div class="col s12 p0">
                    <div class="col s12">
                        <div class="slide-cont">
                            <div class="owl-carousel">

                                @foreach($galleries as $gal)
                                <div>
                                    <img alt="{{ trim($gal->caption) }}" src="{{ asset('assets/images/100-blank-img.jpg') }}" data-src="{{ asset('assets/images/properties/') }}/{{ $project->gallery_location }}/{{ $property->gallery_location }}/construction-update/{!! $gal->image !!}">
                                    <h6 style="background: rgba(0, 0, 0, 0.09);position: absolute;top: -7px;color: white;padding: 10px 15px;width: 100%;font-size: 15px;text-align: right;">{{ $gal->caption }}</h6>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        @endif
    </div>




</div>

</section>
<!-- End -->
@stop
@section('footer_main_scripts')

@stop
@section('footer_scripts')
<script src="{{asset('assets/owlcarousel/owl.carousel.min.js')}}"></script>
<script>

$(document).ready(function () {
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({

            items: 1,
        });
    });
// the following to the end is whats needed for the thumbnails.
    jQuery(document).ready(function () {


        // 1) ASSIGN EACH 'DOT' A NUMBER
        dotcount = 1;
        jQuery('.owl-dot').each(function () {
            jQuery(this).addClass('dotnumber' + dotcount);
            jQuery(this).attr('data-info', dotcount);
            dotcount = dotcount + 1;
        });
        // 2) ASSIGN EACH 'SLIDE' A NUMBER
        slidecount = 1;
        jQuery('.owl-item').not('.cloned').each(function () {
            jQuery(this).addClass('slidenumber' + slidecount);
            slidecount = slidecount + 1;
        });
        // SYNC THE SLIDE NUMBER IMG TO ITS DOT COUNTERPART (E.G SLIDE 1 IMG TO DOT 1 BACKGROUND-IMAGE)
        jQuery('.owl-dot').each(function () {

            grab = jQuery(this).data('info');
            slidegrab = jQuery('.slidenumber' + grab + ' img').attr('data-src');
            jQuery(this).css("background-image", "url(" + encodeURI(slidegrab) + ")");
        });
        // THIS FINAL BIT CAN BE REMOVED AND OVERRIDEN WITH YOUR OWN CSS OR FUNCTION, I JUST HAVE IT
        // TO MAKE IT ALL NEAT 
        amount = jQuery('.owl-dot').length;
        gotowidth = 100 / amount;
        jQuery('.owl-dot').css("width", gotowidth + "%");
        newwidth = jQuery('.owl-dot').width();
        jQuery('.owl-dot').css("height", newwidth + "px");
    });
});</script>



<!-- Chart -->
<script src="{{asset('assets/chart/js/jquery.circliful.js')}}"></script>
@if($locale=='en')
<script>
$(document).ready(function () {

    $('.progress-circle-mobilization').empty();
    $('.progress-circle-mobilization').circliful({
        animation: 1,
        animationStep: 5,
        foregroundBorderWidth: 15,
        backgroundBorderWidth: 15,
        percent: '<?= $property->mobilization_percentage ?>',
        textSize: 28,
        textStyle: 'font-size: 12px;',
        textColor: '#666',
    }
    );
    $('.progress-circle-structure').empty();
    $('.progress-circle-structure').circliful({
        animation: 1,
        animationStep: 5,
        foregroundBorderWidth: 15,
        backgroundBorderWidth: 15,
        percent: '<?= $property->structure_percentage ?>',
        textSize: 28,
        textStyle: 'font-size: 12px;',
        textColor: '#666',
    }
    );
    $('.progress-circle-mep').empty();
    $('.progress-circle-mep').circliful({
        animation: 1,
        animationStep: 5,
        foregroundBorderWidth: 15,
        backgroundBorderWidth: 15,
        percent: '<?= $property->mep_percentage ?>',
        textSize: 28,
        textStyle: 'font-size: 12px;',
        textColor: '#666',
    }
    );
    $('.progress-circle-finishes').empty();
    $('.progress-circle-finishes').circliful({
        animation: 1,
        animationStep: 5,
        foregroundBorderWidth: 15,
        backgroundBorderWidth: 15,
        percent: '<?= $property->finishes_percentage ?>',
        textSize: 28,
        textStyle: 'font-size: 12px;',
        textColor: '#666',
    }
    );
        $('.progress-circle-overall').empty();
        $('.progress-circle-overall').circliful({
            animation: 1,
            animationStep: 5,
            foregroundBorderWidth: 15,
            backgroundBorderWidth: 15,
            percent: '<?= $property->total_completion ?>',
            textSize: 28,
            textStyle: 'font-size: 12px;',
            textColor: '#666',
        }
        );



//Count down

// Set the date we're counting down to
    var countDownDate = new Date("{{ $property->plan_end_date }}").getTime();
// Update the count down every 1 second
    var x = setInterval(function () {

        // Get todays date and time
        var now = new Date().getTime();
        // Find the distance between now an the count down date
        var distance = countDownDate - now;
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        // Display the result in the element with id="demo"
        document.getElementById("demo").innerHTML = "<span style='font-weight: 600;font-size: 2.5rem'>" + days + "days </span><br>" + hours + "h " + minutes + "m " + seconds + "s ";
        // If the count down is finished, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
//Count down end //

});</script>
@elseif($locale=='ar')
<script>
    $(document).ready(function () {

        $('.progress-circle-mobilization').empty();
        $('.progress-circle-mobilization').circliful({
            animation: 1,
            animationStep: 5,
            foregroundBorderWidth: 15,
            backgroundBorderWidth: 15,
            percent: '<?= $property->mobilization_percentage ?>',
            textSize: 28,
            textStyle: 'font-size: 12px;',
            textColor: '#666',
        }
        );


        $('.progress-circle-structure').empty();
        $('.progress-circle-structure').circliful({
            animation: 1,
            animationStep: 5,
            foregroundBorderWidth: 15,
            backgroundBorderWidth: 15,
            percent: '<?= $property->structure_percentage ?>',
            textSize: 28,
            textStyle: 'font-size: 12px;',
            textColor: '#666',
        }
        );
        $('.progress-circle-mep').empty();
        $('.progress-circle-mep').circliful({
            animation: 1,
            animationStep: 5,
            foregroundBorderWidth: 15,
            backgroundBorderWidth: 15,
            percent: '<?= $property->mep_percentage ?>',
            textSize: 28,
            textStyle: 'font-size: 12px;',
            textColor: '#666',
        }
        );
        $('.progress-circle-finishes').empty();
        $('.progress-circle-finishes').circliful({
            animation: 1,
            animationStep: 5,
            foregroundBorderWidth: 15,
            backgroundBorderWidth: 15,
            percent: '<?= $property->finishes_percentage ?>',
            textSize: 28,
            textStyle: 'font-size: 12px;',
            textColor: '#666',
        }
        );
        $('.progress-circle-overall').empty();
        $('.progress-circle-overall').circliful({
            animation: 1,
            animationStep: 5,
            foregroundBorderWidth: 15,
            backgroundBorderWidth: 15,
            percent: '<?= $property->total_completion ?>',
            textSize: 28,
            textStyle: 'font-size: 12px;',
            textColor: '#666',
        }
        );



        //Count down

        // Set the date we're counting down to
        var countDownDate = new Date("{{ $property->plan_end_date }}").getTime();
        // Update the count down every 1 second
        var x = setInterval(function () {

            // Get todays date and time
            var now = new Date().getTime();
            // Find the distance between now an the count down date
            var distance = countDownDate - now;
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML = "<span style='font-weight: 600;font-size: 2.5rem'> " + days + " يوم  </span><br>" + hours + " س  " + minutes + " د " + seconds + " ث ";
            // If the count down is finished, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
        //Count down end //

    });</script>
@elseif($locale=='cn')
<script>
    $(document).ready(function () {

        $('.progress-circle-mobilization').empty();
        $('.progress-circle-mobilization').circliful({
            animation: 1,
            animationStep: 5,
            foregroundBorderWidth: 15,
            backgroundBorderWidth: 15,
            percent: '<?= $property->mobilization_percentage ?>',
            textSize: 28,
            textStyle: 'font-size: 12px;',
            textColor: '#666',
        }
        );


        $('.progress-circle-structure').empty();
        $('.progress-circle-structure').circliful({
            animation: 1,
            animationStep: 5,
            foregroundBorderWidth: 15,
            backgroundBorderWidth: 15,
            percent: '<?= $property->structure_percentage ?>',
            textSize: 28,
            textStyle: 'font-size: 12px;',
            textColor: '#666',
        }
        );
        $('.progress-circle-mep').empty();
        $('.progress-circle-mep').circliful({
            animation: 1,
            animationStep: 5,
            foregroundBorderWidth: 15,
            backgroundBorderWidth: 15,
            percent: '<?= $property->mep_percentage ?>',
            textSize: 28,
            textStyle: 'font-size: 12px;',
            textColor: '#666',
        }
        );
        $('.progress-circle-finishes').empty();
        $('.progress-circle-finishes').circliful({
            animation: 1,
            animationStep: 5,
            foregroundBorderWidth: 15,
            backgroundBorderWidth: 15,
            percent: '<?= $property->finishes_percentage ?>',
            textSize: 28,
            textStyle: 'font-size: 12px;',
            textColor: '#666',
        }
        );
        $('.progress-circle-overall').empty();
        $('.progress-circle-overall').circliful({
            animation: 1,
            animationStep: 5,
            foregroundBorderWidth: 15,
            backgroundBorderWidth: 15,
            percent: '<?= $property->total_completion ?>',
            textSize: 28,
            textStyle: 'font-size: 12px;',
            textColor: '#666',
        }
        );

        //Count down

        // Set the date we're counting down to
        var countDownDate = new Date("{{ $property->plan_end_date }}").getTime();
        // Update the count down every 1 second
        var x = setInterval(function () {

            // Get todays date and time
            var now = new Date().getTime();
            // Find the distance between now an the count down date
            var distance = countDownDate - now;
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML = "<span style='font-weight: 600;font-size: 2.5rem'>" + days + "天 </span><br>" + hours + "小时 " + minutes + "分钟 " + seconds + "秒 ";
            // If the count down is finished, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
        //Count down end //

    });</script>
@endif




<!-- End -->
<script>
    $(document).ready(function () {
        $('.slider').slider();
    });
    sessionStorage.setItem("utm_source", 'Website');
    sessionStorage.setItem("utm_campaign", 'Others');

</script>
@stop
