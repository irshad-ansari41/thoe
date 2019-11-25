@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<style>
    .select-dropdown {
        border: none !important;
        color: #a9a9a9 !important;
        border-bottom: 1px solid #ffffff !important;
    }

    .scrollbar {
        margin-left: 30px;
        float: left;
        overflow-y: scroll;
        margin-bottom: 25px;
    }

    .style-1::-webkit-scrollbar-track {
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    .style-1::-webkit-scrollbar {
        width: 5px;
        background-color: #F5F5F5;
    }

    .style-1::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #F5F5F5;
    }

    .modal-overlay {
        opacity: 0.9 !important;
        z-index: 999 !important;
    }

    .modal {
        background: white;
        width: 33%;
        min-width: 360px;
        max-width: 600px;
    }

    /* New Project Details Form Style Code Start Here */
    .project-detail{margin-top:0rem!important}
    .FRMBOX{margin-top: 30px;}
    .MyFrmGpbtn{
        padding: 15px 0px 30px 20px;width: 50%;
    }
    .MyFrmGp{
        padding: 0px 15px;
    }
    .frmnbtn{
        background: black; color: white; cursor: pointer;
        font-weight: 700; text-transform: uppercase;
        letter-spacing: 2px; transition-duration: 0.4s;
        margin-left: 0; font-family: 'Lato', sans-serif;
        font-size: 13px;
    }
    .MyFrmGpbtn{
        padding: 15px 15px 30px 15px;
        width: 100%;
    }
    .FrmLbls{
        color: #989898 ! important;
        font-size: 13px ! important;
        letter-spacing: 1px ! important;
        font-family: 'Lato', sans-serif ! important;

    }
    .Frminput  {
        height: 35px ! important;
        border-radius: 1px ! important;
        border: 1px solid #b1b1b1ee !important;    
    }

    .Frmselect {
        height: 35px;
    }
    .select-wrapper input.select-dropdown{
        line-height: 35px ! important;
        border-radius: 1px ! important;
        font-size:13px;
        font-weight: bold;
        color:#666 ! important;
        border: 1px solid #b1b1b1ee !important; 
    }
    .select-wrapper span.caret{ display: none;}

    ::-webkit-input-placeholder {
        font-size:13px;
        font-weight: bold;
        padding-left: 15px;
        color:#666;
    }
    :-moz-placeholder {
        font-size:13px;
        font-weight: bold;
        padding-left: 15px;
        color:#666;
    }
    :-ms-input-placeholder {
        font-size:13px;
        font-weight: bold;
        padding-left: 15px;
        color:#666;
    }
    .book-now label{ margin-left: 0px;}
    .modal .modal-content{ padding:7px;}
    .ERS{color:red; font-weight:bold;}
    button, html input[type="button"], input[type="reset"], input[type="submit"] {
        -webkit-appearance: button;
        cursor: pointer;
        border: 1px solid !important;
        width: 100%;
    }
    /* End Here Project Details */
    .lead_lang{width: 20px !important; height: 20px !important; display: inline; vertical-align: middle; padding: 0 !important; margin: 3px 0 3px !important; opacity: 1!important; position: unset!important;}
    select{display:none!important;border-radius: 0!important;}
    @media only screen and (min-width: 1001px) {
        .big{display: block!important}
    }

    @media only screen and (max-width: 1000px) {
        .small{display: block!important}
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
        <div class="row m0" style="padding-top: 6em !important; padding-bottom: 1em !important;">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <?=generate_breadcrumb([
                        url("$locale") => trans('words.home'), 
                        url("/$locale/media-center") => trans('words.Media centre'),
                        url("$locale/events")=> trans('words.events'),
                        '' => $content->event_title_en
                    ])?>
                </div>
            </div>
        </div>
        <!-- End -->
    </div>
    <br/>
    <div class="container">
        <div class="row" style="margin-bottom: 5rem;">            
            <div class="col s12 m8 event-image center-align small hide">
                <?php if ($content['event_main_photo_en'] != "") { ?>
                    <img alt="<?= trim($content['event_main_photo_alt']) ?>" src="<?= asset('assets/images/events/main/') ?>/<?= $content['event_main_photo_en'] ?>" class="responsive-img">
                <?php } else { ?>
                    <img alt="<?= trim($content['event_main_photo_alt']) ?>" src="https://d1pl9wrwxozm3b.cloudfront.net/wp-content/uploads/2017/10/CTA-16th-Oct-1024x889.jpg" class="responsive-img">
                <?php } ?>
            </div>

            <div class="col s12 m4">
                <div class="col s12 event-detail">
                    
                    <div class="col s12 p0" style="border-bottom: 1px solid #c3c3c3;margin-bottom: 20px;">
                        <h5 class="title-uppercase m0" style="text-transform:unset"><?=$content->event_title_en?></h5><br/>
                        <p class="az-pcontent m0" style="background: #3c3c3c;color: white;display: inline-block;float: right;padding: 0px 15px;"><!-- <?= $content->event_date ?> -->
                            <!--i style="font-style: initial;"><?= date_format(date_create($content->event_date), 'd F, Y') ?></i-->
                            <?php
                                $symbols = !empty($content->symbols) ? ' '.$content->symbols.' ' : '';
                                $cuday = date('jS', strtotime($content->event_date));
                                $Lsday =!empty($content->levent_date) ? $symbols.date('jS',strtotime($content->levent_date)) : '';
                                $MYear = date('F, Y',strtotime($content->event_date));
                            ?>   
                            <i style="font-style: initial;"><?php echo $cuday.$Lsday.' '.$MYear;?></i>
                        </p>
                    </div>
                    <div class="col s12 p0" style="margin-bottom: 25px;">
                        <?= $content->long_desc_en ?>
                    </div>
                    <div class="divider"></div>
                    <br>
                    <p class="az-pcontent">
                        <!--<b>Visit us at:</b>-->
                        <br> 
                        <?= $content->visit_us_at_en ?>
                    </p>
                    <p class="az-pcontent social-share"><strong style="margin-right: 15px;font-size: 12px;">Share: </strong>
                        <a href="https://www.facebook.com/dialog/feed?app_id=136745863654131&redirect_uri=<?= url('/') ?>/mediacenter-eventgallery-detail/<?= $content['slug_en'] ?>&link=<?= url('/') ?>/mediacenter-eventgallery-detail/<?= $content['slug_en'] ?>&picture=<?= asset('assets/images/events/main/') ?>/<?= $content['event_main_photo_en'] ?>&caption=<?= $content->event_title_en ?>&description=<?= $content->event_title_en ?>" target="_blank"><i class="ion-social-facebook"></i></a>
                        <a href="https://twitter.com/share?url=<?= url('/') ?>/mediacenter-eventgallery-detail/<?= $content['slug_en'] ?>&via=THOE Developments&text=<?= $content->event_title_en ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter"><i class="ion-social-twitter"></i></a>
                        <a href="https://www.youtube.com/channel/UCmUtuRMwJxaovjGBNSXx-Jw"  target="_blank" ><i class="ion-social-youtube"></i></a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?=SITE_URL?>/&title=<?= $content->event_title_en ?>&summary=<?= $content->event_date ?>&source=LinkedIn" target="_blank"><i class="ion-social-linkedin"></i></a>
                    </p>
                    <div class="divider"></div>
                    <div class="col s12 p0 center-align" style="border-bottom: 1px solid #e0e0e0;margin-bottom: 20px;">
                        <div class="col m12" style="margin: 20px 0px;">
                            <a href="#enquire-now" class="az-btn active modal-trigger"><?= trans('words.enquire_now') ?></a>
                            <a class="az-btn ace_btn dis"><?= trans('words.add_to_calender') ?></a>                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m8 event-image center-align big hide">
                <?php if ($content['event_main_photo_en'] != "") { ?>
                    <img alt="<?= trim($content['event_main_photo_alt']) ?>" src="<?= asset('assets/images/events/main/') ?>/<?= $content['event_main_photo_en'] ?>" class="responsive-img">
                <?php } else { ?>
                    <img alt="<?= trim($content['event_main_photo_alt']) ?>" src="https://d1pl9wrwxozm3b.cloudfront.net/wp-content/uploads/2017/10/CTA-16th-Oct-1024x889.jpg" class="responsive-img">
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- End -->


<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11&appId=136745863654131';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

@stop

@section('footer_main_scripts')

@stop

@section('footer_scripts')

<link href="<?= asset('assets/css/AddCalEvent.css') ?>" type="text/css" rel="stylesheet">
<script src="<?= asset('assets/js/AddCalEventZones.js') ?>"></script>
<script src="<?= asset('assets/js/AddCalEvent.js') ?>"></script>
<script>
// Test "UDPATE" functionality. The date and title of the first item should be updated.
    $(".ace_btn").addcalevent({
        'data': {
            "title": "<?= $content->event_title_en ?>",
            "desc": "<?= $content->event_title_en ?>",
            "location": "<?= $content->event_location_en ?>",,
            "url": "<?= url('/') ?>/mediacenter-eventgallery-detail/<?= $content['id'] ?>",
                        "time": {
                            "start": "<?= $content->event_date ?>",
                            "end": "<?= $content->event_date ?>",
                            "zone": "-07:00"
                        }
                    },
                    'ics': "http://url to ics generator"
                });


</script>

@stop
