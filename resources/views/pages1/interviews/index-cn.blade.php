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
    .sectiontwo {
        background-color: #f3f3f3;
    }
</style>
@stop

@section('main_div_wrapper')
@stop
@section('section_content')



<!-- Header -->
<section class="az-section">

    <section>
        <div class="container">
            <div class="parallax-container valign-wrapper only-heading">
                <div class="parallax">
                    @if($content->image!="")
                    <img alt="{{ trim($content->alt) }}" src="{{ asset('assets/images/banner/') }}/{{ $content->image }}" class="ts" >
                    @else
                    <img alt="<?= trim($content->alt) ?>" src="https://pbs.twimg.com/media/DJnPBzPXkAAIvKI.jpg">
                    @endif
                </div>
                <div class="col s12 center-align card tag-pro">
                    <h1>{{$content->title_en}}</h1>
                </div>

            </div>
            <div class="row m0">
                <div class="col s12 p0">
                    <div class="col s12 p0">
                        <?= generate_breadcrumb([url("$locale") => trans('words.home'), url("/$locale/media-center") => trans('words.Media centre'), '' => $content->title_en]) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">

            <div class="row mb0 press-news-header">
                <div class="col s12 m11">
                    <!--h5 class="m0">{!! $content->title_en !!}</h5>
                    <div class="divider az-header-divider mb0"></div-->
                    <p class="az-pcontent" style=" width: 90%; text-transform: initial;">
                        {!! $content->description_en !!}
                    </p>
                </div>

            </div>

        </div>
    </section>

    <section>
        <div class="container">
            <?php
            $i = 1;
            if (!empty($interviews)) {
                foreach ($interviews as $pres) {
                    ?>
                    <div class="row <?= $a = ($i % 2 == 0) ? "" : 'sectiontwo' ?>" style="padding-top:30px;padding-bottom:30px">
                        <?php if ($pres->interview_photo) { ?>
                            <div class="col m4" >
                                <a href="<?= $pres->slug_en ?>"  target="_blank" style="text-decoration:none;"> 
                                    <img alt="<?= trim($pres->interview_title_en) ?>" src="<?= asset('assets/images/media/interviews') ?>/<?= $pres->interview_photo ?>" class="responsive-img">
                                </a>
                            </div>
                        <?php } ?>
                        <div class="col <?= $pres->interview_photo ? 'm8' : 'm12' ?>">
                            <h4 class="m0"><a href="<?= $pres->slug_en ?>" target="_blank" style="text-decoration:none;">  <?= $pres->interview_title_en ?> </a></h4>
                            <i><?= date("d F Y", strtotime($pres->interview_date)) ?></i><br/>
                            <?= strip_tags($pres->long_desc_en, '<p><br/>'); ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="<?= $pres->slug_en ?>" target="_blank" style="font-size:12px;color:grey;"><u><strong>Read full article here</strong></u></a>
                        </div>
                    </div>

                    <?php
                    $i++;
                }
            }
            ?>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col s12 center-align p0">
                    {!! $interviews->render() !!}
                </div>
            </div>
        </div>
    </section>

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
    /*$(document).on('click', '#topsearch', function (event) {
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
     */


});


</script>
<script>
    AOS.init({
        easing: 'ease-in-out-sine'
    });
</script>

@stop
@section('footer_scripts')
<script>$(".datepicker").pickadate({selectMonths: !0, selectYears: 15, today: "Today", clear: "Clear", close: "Ok", closeOnSelect: !1});</script>
@stop
