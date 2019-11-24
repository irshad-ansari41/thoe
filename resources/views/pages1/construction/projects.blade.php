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
</style>

<!-- Gallery preview -->

<!-- End -->
@stop

@section('main_div_wrapper')

@stop
@section('section_content')
<!-- Projects -->
<section class="az-section">



    <div class="container">
        <div class="parallax-container valign-wrapper">
            <div class="parallax">
                @if($project->construction_header_image!="")
                <img alt="{!! trim($project->construction_alt) !!}" src="{{ asset('assets/images/projects/') }}/{{ $project->construction_header_image }}">
                @endif
            </div>
            <div class="col s12 center-align card tag-pro">
                <h1>{{ $project->title_en }} {{trans('words.Projects')}}</h1>
                <p><i class="ion ion-ios-location-outline"></i> {{in_array($project->slug, ['victoria', 'riviera', 'avenue'])?trans('words.MEYDAN').',':''}} {{trans('words.explore_project_address1')}} {{trans('words.explore_project_address2')}}</p>
            </div>
        </div>
        <div class="">
            <div class="row m0">
                <div class="col s12 p0">
                    <?php
                    if ($locale == 'en') {
                        $links = [url("$locale") => trans('words.home'), url("$locale/dubai/construction-updates") => trans('words.Construction Updates'),];
                        if (in_array($project->slug, ['victoria', 'riviera', 'avenue'])) {
                            $links[url("$locale/dubai/meydan/construction-updates")] = trans('words.MEYDAN');
                        }
                        $links[''] = $project->title_en;
                    } elseif ($locale == 'cn') {
                        $links = [url("$locale") => '主页', url("$locale/dubai/construction-updates") => '施工进展',];
                        if (in_array($project->slug, ['victoria', 'riviera', 'avenue'])) {
                            $links[url("$locale/dubai/meydan/construction-updates")] = trans('words.MEYDAN');
                        }
                        $links[''] = $project->title_ch;
                    } elseif ($locale == 'ar') {
                        $links = [url("$locale") => trans('words.home'), url("$locale/dubai/construction-updates") => trans('words.Construction Updates'),];
                        if (in_array($project->slug, ['victoria', 'riviera', 'avenue'])) {
                            $links[url("$locale/dubai/meydan/construction-updates")] = trans('words.MEYDAN');
                        }
                        $links[''] = $project->title_ar;
                    }
                    ?>
                    <?= generate_breadcrumb($links, $locale) ?>

                </div>
            </div>
        </div>
    </div>


    <div class="container" style="margin-bottom:2em;">
        <?php
        $i = 0;
        if ($properties) {
            foreach ($properties as $prop) {
                if ($prop->holder_image != "") {
                    $path = asset('assets/images/properties');
                    $imagepath = $path . '/' . $project->gallery_location . '/' . $prop->gallery_location . "/" . $prop->holder_image;
                } else {
                    $path = asset('assets/images/properties/');
                    $imagepath = $path . '/' . "project-maydan.jpg";
                }

                if (in_array($project->slug, ['victoria', 'riviera', 'avenue'])) {
                    $url = url("{$locale}/dubai/meydan/{$area}/{$prop->slug}/construction-updates");
                } else {
                    $url = url("{$locale}/dubai/{$area}/{$prop->slug}/construction-updates");
                }
                ?>
                <?php
                if (!$prop->completed) {
                    echo ($i % 4 == 0) ? '<div class="row">' : '';
                    ?>
                    <div class="col s12 m3 pro-holder center-align">
                        <a href="{{ $url }}">
                            <div class="card col s12 p0">
                                <img alt="{{ trim($prop->alt) }}" src="{{ asset('assets/images/100-blank-img.jpg') }}" data-src="{{ $imagepath }}" class="responsive-img pro-image" />
                                <div class="col s12 title-holder">
                                    <h5>{{ $locale=='ar'?$prop->title_ar:($locale=='cn'?$prop->title_ar:$prop->title_en) }}</h5>                        
                                    <h6>{{trans('words.view_more')}}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                    $i++;
                    echo ($i % 4 == 0) ? '</div>' : '';
                }
            }
        }
        ?>
    </div>

</section>
<!-- End -->
@stop
@section('footer_main_scripts')


@stop
@section('footer_scripts')
<script> sessionStorage.setItem("utm_source", 'Website');sessionStorage.setItem("utm_campaign", 'Others');</script>

@stop
