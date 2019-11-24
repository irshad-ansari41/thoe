@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')

@stop

@section('main_div_wrapper')

@stop
@section('section_content')
<!-- Projects -->
<section class="az-section">



    <div class="container">
        <div class="parallax-container valign-wrapper">
            <div class="parallax">
                @if($project->header_image!="")
                <img alt="{!! trim($project->construction_alt) !!}" src="{{ asset('assets/images/projects/') }}/{{ $project->header_image }}">
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
                        $links = [url("$locale") => trans('words.home'), url("$locale/dubai") => trans('words.Projects'),];
                        if (in_array($project->slug, ['victoria', 'riviera', 'avenue'])) {
                            $links[url("$locale/dubai/meydany")] = trans('words.MEYDAN');
                        }
                        $links[''] = $project->title_en;
                    } elseif ($locale == 'cn') {
                        $links = [url("$locale") => '主页', url("$locale/dubai") => trans('words.Projects'),];
                        if (in_array($project->slug, ['victoria', 'riviera', 'avenue'])) {
                            $links[url("$locale/dubai/meydan")] = trans('words.MEYDAN');
                        }
                        $links[''] = $project->title_ch;
                    } elseif ($locale == 'ar') {
                        $links = [url("$locale") => trans('words.home'), url("$locale/dubai") => trans('words.Projects'),];
                        if (in_array($project->slug, ['victoria', 'riviera', 'avenue'])) {
                            $links[url("$locale/dubai/meydan")] = trans('words.MEYDAN');
                        }
                        $links[''] = $project->title_ar;
                    }
                    ?>
                    <?= generate_breadcrumb($links) ?>

                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col s12">
                <ul class="tabs project-filter">
                    <li class="tab col s12 m3">
                        <a id="allProjects" class="az-btn active" ><?=trans('words.All Projects')?></a>
                    </li>
                    <li class="tab col s12 m3">
                        <a id="Under_Construction" class="az-btn " ><?=trans('words.Under Constructions')?></a>
                    </li>
                    <li class="tab col s12 m3">
                        <a id="Completed" class="az-btn" ><?=trans('words.Completed')?></a>
                    </li>
                    <li class="indicator" style="right: 809px; left: 188px;"></li>
                </ul>

            </div>            
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php
            $Ccout = $i = 0;
            if ($properties) {
                foreach ($properties as $prop) {
                    $Ccout += $prop->completed;
                    if (empty($Ccout) && $i == count($properties) - 1) {
                        echo '<style>.project-filter{ display:none !important;}</style>';
                    }
                    if ($prop->holder_image != "") {
                        $path = asset('assets/images/properties');
                        $imagepath = $path . '/' . $project->gallery_location . '/' . $prop->gallery_location . "/" . $prop->holder_image;
                    } else {
                        $path = asset('assets/images/properties/');
                        $imagepath = $path . '/' . "project-maydan.jpg";
                    }
                    if (in_array($project->slug, ['victoria', 'riviera', 'avenue'])) {
                        $property_url = url("{$locale}/dubai/meydan/{$area}/{$prop->slug}");
                    } else {
                        $property_url = url("{$locale}/dubai/{$area}/{$prop->slug}");
                    }
                    //echo ($i % 4 == 0) ? '<div class="row">' : '';
                    ?>
                    <div class="col s12 m3 pro-holder center-align <?= $prop->completed ? 'Completed' : 'Under_Construction' ?>">
                        <a href="{{url($property_url) }}">
                            <div class="card col s12 p0">
                                <img alt="{{ trim($prop->title_en) }}" src="<?= asset("assets/images/100-blank-img.jpg") ?>"  data-src="{{ $imagepath }}" class="responsive-img pro-image" >
                                <div class="col s12 title-holder">
                                    <h5>{{ $locale=='ar'?$prop->title_ar:($locale=='cn'?$prop->title_ar:$prop->title_en) }}</h5>                        
                                    <h6>{{trans('words.view_more')}}</h6>
                                </div>
                            </div>
                        </a>
                    </div>	
                    <?php
                    $i++;
                    //echo ($i % 4 == 0) ? '</div>' : '';
                }
            }
            ?>
        </div>
    </div>



</div>

</section>
<!-- End -->
@stop
@section('footer_main_scripts')


@stop

@section('footer_scripts')
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
    sessionStorage.setItem("utm_campaign", '<?= $project->title_en ?>');
    sessionStorage.setItem("utm_source", 'Website');
});
</script>
<!-- End -->

@stop
