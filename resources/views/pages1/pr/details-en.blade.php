
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
                <h1>{{$content->title_en}}</h1>
            </div>

        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <?=
                    generate_breadcrumb([
                        url("$locale") => trans('words.home'),
                        url("/$locale/media-center") => trans('words.Media centre'),
                        url("$locale/news-pr/") => $content->title_en,
                        '' => $press->title
                    ]);
                    ?>

                </div>
            </div>
        </div>
    </div>

    <div class="container">


        <div class="row mb0 press-news-header">

            <div class="col s12 m12">
                <!--h5 class="m0">{!! $content->title_en !!}</h5>            
                <div class="divider az-header-divider mb0"></div-->
                <p class="az-pcontent" style="    width: 90%; text-transform: initial;">
                    {!! $content->short_description_en !!}
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
                                <?php
                                $thumbnail = asset('assets/images/pressrelease/') . '/' . (!empty($press->image) ? $press->image : 'azizi.jpg');
                                ?>
                                <img alt="{{ trim($press->alt) }}" src="{{ asset('assets/images/100-blank-img.jpg') }}" data-src="{{$thumbnail}}"
                                     class="responsive-img">
                                
                                <?php if(!empty($press->youtube)):?>
                                <br/>
                                <div class="col s12 m12" style="padding:25px 0px 0px 0px;">
                                    <iframe width="412" height="274" src="https://www.youtube.com/embed/<?=trim($press->youtube)?>/?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <?php endif;?>
                            </div>

                            <div class="col s12 m8">

                                <div class="col s12 mt0" style="margin: 1em 0em;">

                                    <div class="desig-person m0">

                                        <div class="person-name mt0" style="font-weight: 900;text-transform: capitalize;    width: 100%;">
                                            {!! $press->title !!}    
                                        </div>
                                        <!--i>{{ date("d F Y", strtotime($press->date)) }}</i-->
                                    </div> 

                                    <p class="az-pcontent">
                                        <?php
                                        if (!empty($press->description_long)) {
                                            $description = $press->description_long;
                                        } else {
                                            $description = $press->description;
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

                                                <a href="#" id="social-link-2"  title="Share on Twitter">
                                                    <i class="ion-social-twitter"></i>
                                                </a>

                                                <a href="https://www.youtube.com/channel/UCmUtuRMwJxaovjGBNSXx-Jw"><i class="ion-social-youtube"></i></a>

                                                <a href="#" id="social-link-3"  data-href="<?= $social->linkedin ?>" >
                                                    <i class="ion-social-linkedin" style="font-size: 20px;margin-right: 20px;color: initial;"></i>
                                                </a>


                                            </p>

                                        </div>

                                        <?php if (!empty(count($coverage))): ?>
                                            <div class="col s12 m12 p0 pspaceing"> 
                                                <div class="pspaceing">
                                                    <div class="divider az-header-divider mb0"></div>
                                                    <strong>Coverage Highlights: </strong>
                                                </div>
                                                <?php foreach ($coverage as $rows): ?>
                                                    <span  class="bklink-span">
                                                        <a href="<?= $rows->newsurl ?>" target="_coverage" style="text-decoration:none;"/>
                                                        {{$rows->newstitle}}
                                                        </a>
                                                    </span> 
                                                <?php endforeach; ?>
                                            </div>
                                            <!--News Refreance End-->
                                        <?php endif; ?>
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
<script>$(".datepicker").pickadate({selectMonths: !0, selectYears: 15, today: "Today", clear: "Clear", close: "Ok", closeOnSelect: !1});</script>
@stop
