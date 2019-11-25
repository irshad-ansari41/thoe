@extends('layouts/booking')

@section('styles')
<style>
    .img-full-width{width: 100%}
    .no-padding{padding: 0}
    @media only screen and (min-width: 768px) {
        .section-border-left {
            border-left:7.5px solid #dedede;
        }
        .section-border-right {
            border-right:7.5px solid #dedede;
        }
    }
    .bg-lightBlue{background: #aed8ff;}
</style>
@stop


@section('content')

<!-- Content section -->
<section class="py-3">
    <div class="container">
        <div id="bannerImg" class="row extend-row">
            <div class="col-12 col-sm-6">
                <div class="block1 bg-thoe-blue">
                    <h5 class="text-white">Best Price</h5>
                    <span class="text-white">Guaranteed Online</span>
                </div><br/>
            </div>
            <div class="col-12 col-sm-6 ">
                <div class="block1 bg-thoe-blue">
                    <h5 class="text-white">Flexibility to Change</h5>
                    <span class="text-white">After Booking</span>
                </div><br/>
            </div>
        </div>
    </div>
    


    <div class="container">

        <ul class="breadcrumb row">
            <li><a href="<?= url("/$locale") ?>" class="text-thoe-blue">Home</a></li>
            <li>&nbsp; &Rang; Booking</li>
        </ul>

        <?php
        if (!empty($projects)) {
            foreach ($projects as $project) {
                if ($project->id != 10) {
                    ?>
                    <div class="row bg-white">
                        <div class="col-12 col-sm-3"><br/>
                            <a href='{{url($locale.'/online-booking/'.$project->slug) }}'><img alt="" src="{{ asset('/assets/images/projects/') }}/{{ $project->image }}" class="img-fluid img-full-width"></a><br/><br/>
                        </div>
                        <div class="col-12 col-sm-9"><br/>
                            <a href='{{url($locale.'/online-booking/'.$project->slug) }}' class="text-body">
                                <h5>{{ $locale=='ar'?$project->title_ar:($locale=='cn'?$project->title_ch:$project->title_en) }}</h5>
                                <h6>Dubai - United Arab Emirates</h6></a>
                            <hr/>
                            <p><small><strong>Project type:</strong> RESIDENTIAL APARTMENTS</small><br/>
                                <small><strong>Units type:</strong> <?= get_unit_types_project($project->id) ?></small><br/>
                                <small><strong>Amenities:</strong> <?= get_amenity_project($project->id) ?></small><br/>
                                <small><strong>Nearby:</strong> <?= get_nearby_project($project->id) ?></small>
                            </p>
                            <div class="row">
                                <div class="col-2 col-sm-2  col-md-1  col-lg-1"><span>From</span> <strong class="text-thoe-blue">AED</strong></div>
                                <div class="col-4 col-sm-4  col-md-3 col-lg-3"><h4 class="text-thoe-blue">667,000</h4></div>
                                <div class="col-6 col-sm-6  col-md-8 col-lg-8 text-right"><a href='{{url($locale.'/online-booking/'.$project->slug) }}' class="btn btn-thoe-blue"> Choose Unit</a></div>
                            </div>
                            <br/>
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
</section>


@stop