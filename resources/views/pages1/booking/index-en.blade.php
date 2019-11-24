@extends('layouts/booking')

@section('styles')
<style>
    .img-full-width{width: 100%}
    @media only screen and (min-width: 768px) {
        .section-border-left {
            border-left:7.5px solid #dedede;
        }
        .section-border-right {
            border-right:7.5px solid #dedede;
        }
    }
</style>
@stop


@section('content')

<!-- Content section -->
<section class="py-5">

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <img src="<?=SITE_URL?>/booking/images/1150.png" class="img-fluid">
            </div>
        </div>
    </div>
    <br/>
    <div class="container">
        <?php
        if (!empty($projects)) {
            foreach ($projects as $project) {
                if ($project->id != 10) {
                    ?>
                    <div class="row bg-white">
                        <div class="col-12 col-sm-3"><br/>
                            <img alt="" src="{{ asset('/assets/images/projects/') }}/{{ $project->image }}" class="img-fluid img-full-width"> <br/><br/>
                        </div>
                        <div class="col-12 col-sm-9"><br/>
                            <h5>{{ $locale=='ar'?$project->title_ar:($locale=='cn'?$project->title_ch:$project->title_en) }}</h5>
                            <h6>Dubai - United Arab Emirates</h6>
                            <hr/>
                            <p><small><strong>Project type:</strong> RESIDENTIAL APARTMENTS</small><br/>
                                <small><strong>Units type:</strong> <?= get_unit_types_project($project->id) ?></small><br/>
                                <small><strong>Amenities:</strong> <?= get_amenity_project($project->id) ?></small><br/>
                                <small><strong>Nearby:</strong> <?= get_nearby_project($project->id) ?></small>
                            </p>
                            <div class="row">
                                <div class="col-2 col-sm-2  col-md-1  col-lg-1"><span>From</span><br/><strong class="text-primary">AED</strong></div>
                                <div class="col-4 col-sm-4  col-md-3 col-lg-3"><h4 class="text-primary">667,000</h4></div>
                                <div class="col-6 col-sm-6  col-sm-8 col-lg-8 text-right"><a href='{{url($locale.'/booking/'.$project->slug) }}' class="btn btn-primary"> <span class="float-left"> &GT;| </span> &nbsp;Choose Unit</a></div>
                            </div>
                        </div>
                        <br/>
                    </div><br/><br/>
                    <?php
                }
            }
        }
        ?>
    </div>
    <br/>
    <?php if (!empty($remainging_projects)) { ?>
        <div class="container">
            <div class="row">
                <?php
                $i = 0;
                foreach ($remainging_projects as $key => $project) {
                    if ($project->id != 10) {
                        ?>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 <?= ($i % 2) == 0 ? 'section-border-right' : 'section-border-left' ?>">
                            <div class="row bg-white">
                                <div class="col-12 col-sm-5">
                                    <br/>
                                    <img alt="" src="{{ asset('/assets/images/projects/') }}/{{ $project->image }}" class="img-fluid img-full-width">
                                    <br/>
                                    <br/>
                                </div>
                                <div class="col-12 col-sm-7">
                                    <br/>
                                    <h5>{{ $locale=='ar'?$project->title_ar:($locale=='cn'?$project->title_ch:$project->title_en) }}</h5>
                                    <h6>Maydan One, Dubai</h6>
                                    <hr/>
                                    <p><small><strong>Project type:</strong> RESIDENTIAL APARTMENTS</small><br/>
                                        <small><strong>Units type:</strong> <?= get_unit_types_project($project->id) ?></small><br/>
                                        <small><strong>Amenities:</strong> <?= get_amenity_project($project->id) ?></small><br/>
                                        <small><strong>Nearby:</strong> <?= get_nearby_project($project->id) ?></small>
                                    </p>
                                    <div class="row">
                                        <div class="col-2 col-sm-2  col-md-1  col-lg-1"><span>From</span><br/><strong class="text-primary">AED</strong></div>
                                        <div class="col-4 col-sm-4  col-md-3 col-lg-3"><h4 class="text-primary">667,000</h4></div>
                                        <div class="col-6 col-sm-6  col-sm-8 col-lg-8 text-right"><a href='{{url($locale.'/booking/'.$project->slug) }}' class="btn btn-primary">Choose Unit</a></div>
                                    </div>
                                    <br/>
                                </div>
                            </div>
                            <br/>
                        </div>
                        <?php
                        $i++;
                    }
                }
                ?>
            </div>
        </div>
    <?php } ?>
</section>


@stop