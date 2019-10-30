@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<!-- Chart -->
<link rel="stylesheet" href="{{asset('assets/chart/css/jquery.circliful.css')}}">
<!-- end -->
<!-- Slide show gallery -->
<link href="{{asset('assets/gallery-slideshow/css/jquery.desoslide.min.css')}}" rel="stylesheet">
<!-- End -->
<style>
    .responsive-img{ max-width: 100%; height: 300px !important; width: 100%;}
    div.row:empty{display: none;}
</style>
@stop

@section('main_div_wrapper')

@stop
@section('section_content')
<!-- Projects -->
<section class="az-section">



    <div class="container">
        <div class="parallax-container valign-wrapper">
            <div class="parallax">
                <img alt="Completed Projects" src="{{ asset('assets/images/projects/') }}/15397570101915874332.jpg">
            </div>
            <div class="col s12 center-align card tag-pro">
                <h1>{{trans('words.Completed-Projects')}}</h1>
                <p><i class="ion ion-ios-location-outline"></i> {{trans('words.explore_project_address1')}} {{trans('words.explore_project_address2')}}</p>
            </div>
        </div>
        <div class="">
            <div class="row m0">
                <div class="col s12 p0">

                    <?php
                    if ($locale == 'en') {
                        $links = [url("$locale") => trans('words.home'), url("$locale/dubai") => trans('words.Projects'),];
                        $links[''] = trans('words.Completed-Projects');
                    } elseif ($locale == 'cn') {
                        $links = [url("$locale") => '主页', url("$locale/dubai") => trans('words.Projects'),];
                        $links[''] = trans('words.Completed-Projects');
                    } elseif ($locale == 'ar') {
                        $links = [url("$locale") => trans('words.home'), url("$locale/dubai") => trans('words.Projects'),];
                        $links[''] = trans('words.Completed-Projects');
                    }
                    ?>
                    <?= generate_breadcrumb($links, $locale) ?>

                </div>
            </div>
        </div>
    </div>



    <div class="container">
        <!--<div class="row">-->
        <?php
        $i = 0;
        foreach ($completed as $complete) {
            echo '<div class="row">';
            $t = 0;
            foreach ($complete['properties'] as $property) {
                if ($property->holder_image != "") {
                    $path = asset('assets/images/properties');
                    $imagepath = $path . '/' . $complete['project']->gallery_location . '/' . $property->gallery_location . "/" . $property->holder_image;
                } else {
                    $path = asset('assets/images/properties/');
                    $imagepath = $path . '/' . "project-maydan.jpg";
                }
                if (in_array($complete['project']->slug, ['victoria', 'riviera', 'avenue'])) {
                    $property_url = url("{$locale}/dubai/meydan/{$complete['project']->slug}/{$property->slug}");
                } else {
                    $property_url = url("{$locale}/dubai/{$complete['project']->slug}/{$property->slug}");
                }
                //echo ($i % 4 == 0) ? '<div class="row">' : '';

                if (!empty($property) && empty($t)) {
                    $t = 1;
                    echo '<div class="col s12 m12"><a href="' . url("$locale/dubai/" . $complete['project']->slug) . '"><h3>' . ($locale == 'ar' ? $complete['project']->title_ar : ($locale == 'cn' ? $complete['project']->title_ar : $complete['project']->title_en)) . '</h3></a></div>';
                }
                ?>
                <div class="col s12 m3 pro-holder center-align <?= $property->completed ? 'Completed' : 'Under_Construction' ?>">
                    <a href="{{url($property_url) }}">
                        <div class="card col s12 p0">
                            <img alt="{{ trim($property->title_en) }}" src="<?= asset("assets/images/100-blank-img.jpg") ?>"  data-src="{{ $imagepath }}" class="responsive-img pro-image" >
                            <div class="col s12 title-holder">
                                <h5>{{ $locale=='ar'?$property->title_ar:($locale=='cn'?$property->title_ar:$property->title_en) }}</h5>                        
                                <h6>{{trans('words.view_more')}}</h6>
                            </div>
                        </div>
                    </a>
                </div>	
                <?php
                // echo ($i % 4 == 0) ? '</div>' : '';
            }
            echo '</div>';
        }
        ?>
        <!--</div>-->
    </div>



</div>

</section>
<!-- End -->
@stop
@section('footer_main_scripts')


@stop
@section('footer_scripts')
<!-- Gallery -->
<script type="text/javascript" src="{{asset('assets/galleryview/inc/mbGallery.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/galleryview/inc/jquery.exif.js')}}"></script>
<!-- end -->
<!-- Chart -->
<script src="{{asset('assets/chart/js/jquery.circliful.js')}}"></script>
<script>
$(document).ready(function () {

    $('#allProjects').click(function (e) {
        e.preventDefault();
        $('.Under_Construction').show();
        $('.Completed').show();
        $('#allProjects').addClass('active');
        $('#Under_Construction').removeClass('active');
        $('#Completed').removeClass('active');

    });
    $('#Under_Construction').click(function (e) {
        e.preventDefault();
        $('.Under_Construction').show();
        $('.Completed').hide();
        $('#allProjects').removeClass('active');
        $('#Under_Construction').addClass('active');
        $('#Completed').removeClass('active');

    });
    $('#Completed').click(function (e) {
        e.preventDefault();
        $('.Under_Construction').hide();
        $('.Completed').show();
        $('#allProjects').removeClass('active');
        $('#Under_Construction').removeClass('active');
        $('#Completed').addClass('active');

    });



});
sessionStorage.setItem("utm_source", 'Website');
sessionStorage.setItem("utm_campaign", 'Others');
</script>
<!-- End -->

@stop
