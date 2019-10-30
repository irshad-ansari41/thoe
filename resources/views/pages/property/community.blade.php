@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<!-- Time line css -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/timeline_style.css')}}">
<!-- End -->
<style>
    .responsive-img{ max-width: 100%; height: 300px !important; width: 100%;}
</style>

@stop

@section('main_div_wrapper')

@stop
@section('section_content')
<!-- Header -->
<section class="az-section">    
    <div class="container">
        <div class="parallax-container valign-wrapper">
            <div class="parallax">
                <img alt="{{ $content->alt }}" src="{{ asset('assets/images/projects/') }}/{{ '15119942461219838370.jpg' }}">
            </div>
            <div class="col s12 center-align card tag-pro">
                <h1>{{trans('words.MEYDAN')}}</h1>
                <p><i class="ion ion-ios-location-outline"></i> {{trans('words.explore_project_address1')}} {{trans('words.explore_project_address2')}}</p>
            </div>
        </div>

        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <?php
                    if ($locale == 'en') {
                        $links = [url("$locale") => trans('words.home'), url("$locale/dubai") => trans('words.Projects'), '' => trans('words.MEYDAN')];
                    } elseif ($locale == 'cn') {
                        $links = [url("$locale") => '主页', url("$locale/dubai") => trans('words.Projects'), '' => trans('words.MEYDAN')];
                    } elseif ($locale == 'ar') {
                        $links = [url("$locale") => trans('words.home'), url("$locale/dubai") => trans('words.Projects'), '' => trans('words.MEYDAN')];
                    }
                    ?>
                    <?= generate_breadcrumb($links) ?>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- End -->


<!-- Projects Construction -->
<section class="az-section">
    <div class="container">
        <div class="row">
            <div class="col s12 short-desc">
                <?php
                $short_description = showTextByLocale($locale, ['en' => $content->short_description_en,
                    'ar' => $content->short_description_ar,
                    'cn' => $content->short_description_ch,]);
                if ($short_description) {
                    ?>
                    <h6 class="az-title-sub">
                        {{$short_description}}
                    </h6>
                <?php } ?>
                {!! showTextByLocale($locale, ['en'=>$content->description_en,'ar'=>$content->description_ar,'cn'=>$content->description_ch,]) !!}
            </div>
        </div>
    </div>
    
    <div class="container">
        <?php
        if ($projects) {
            $i = 0;
            foreach ($projects as $project) {
                if (in_array($project->id, [16, 17, 15])) {
                    echo ($i % 4 == 0) ? '<div class="row">' : '';
                    ?>
                    <div class="col s12 m3 pro-holder center-align">
                        <a href="{{url($locale.'/dubai/meydan/'.$project->slug) }}">
                            <div class="card col s12 p0">
                                @if($project['image']!="")
                                <img alt="{{ $project['alt'] }}" src="<?= asset("assets/images/100-blank-img.jpg") ?>"  data-src="{{ asset('/assets/images/projects/') }}/{{ $project['image'] }}" class="responsive-img pro-image">
                                @endif

                                <div class="col s12 title-holder">
                                    @if($project['id']=="10")
                                    <h5>{{trans('words.Riviera')}}</h5>
                                    @else
                                    <h5>{{ $locale=='ar'?$project->title_ar:($locale=='cn'?$project->title_ch:$project->title_en) }}</h5>
                                    @endif
                                    <h6>{{trans('words.View projects')}}</h6>
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
<script>sessionStorage.setItem("utm_source", 'Website');sessionStorage.setItem("utm_campaign", 'Others');</script>
@stop
