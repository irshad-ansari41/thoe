@extends('layouts/booking')

@section('styles')
<style>
    .img-full-width{width: 100%;min-height: 250px;max-height: 400px}
    @media only screen and (min-width: 768px) {
        .section-border-left {
            border-left:7.5px solid #dedede;
        }
        .section-border-right {
            border-right:7.5px solid #dedede;
        }
    }
    .project-aminities .amenity {
        line-height: 50px;
        border-bottom: 1px solid #c7c7c7;
        font-family: "content-regular";
        position: relative;
    }
    .card .card-header .open,.card .card-header .close{float:right;}
    .card .card-header a[aria-expanded="false"] .close{display:none}
    .card .card-header a[aria-expanded="true"] .open{display:none}
</style>
@stop


@section('content')
<!-- Content section -->
<section class="py-3">

    <div class="container">
        <div id="bannerImg" class="row extend-row">
            <div class="col-12 col-sm-6 block0">
                <div class="block1 bg-azizi-blue">
                    <h5 class="text-white">Best Price</h5>
                    <span class="text-white">Guaranteed Online</span>
                </div><br/>
            </div>
            <div class="col-12 col-sm-6 block0">
                <div class="block1 bg-azizi-blue">
                    <h5 class="text-white">Flexibility to Change</h5>
                    <span class="text-white">After Booking</span>
                </div><br/>
            </div>
        </div>
    </div>
    

    <div class="container">


        <div class="row bg-white">
            <div class="col-12 col-sm-12"><br/>
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <?php foreach ($images as $key => $image) { ?>
                            <li data-target="#demo" data-slide-to="<?= $key ?>" class="<?= $key ? '' : 'active' ?>"></li>
                        <?php } ?>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <?php foreach ($images as $key => $image) { ?>
                            <div class="carousel-item <?= $key ? '' : 'active' ?>">
                                <img src="{{ $image }}" alt="{{$project->title_en}}" class="img-fluid img-full-width">
                            </div>
                        <?php } ?>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
                <br/>
            </div>




            <div class="col-12 col-sm-12">
                <ul class="breadcrumb">
                    <li><a href="<?= url("/$locale") ?>" class="text-azizi-blue">Home</a></li>
                    <li><a href="<?= url("/$locale/online-booking") ?>"  class="text-azizi-blue">&nbsp; &Rang; Booking</a></li>
                    <li>&nbsp; &Rang; Projects</li>
                </ul>
            </div>



            <div class="col-12 col-sm-12"><br/>
                <h5>{{ $locale=='ar'?$project->title_ar:($locale=='cn'?$project->title_ch:$project->title_en) }}</h5>
                <h6>Maydan One, Dubai</h6>
                <hr/>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <p><small><strong>Project type:</strong> RESIDENTIAL APARTMENTS</small><br/>
                            <small><strong>Units type:</strong> <?= $unitTypes ?></small><br/>
                            <small><strong>Amenities:</strong> <?= $amenity ?></small><br/>
                            <small><strong>Nearby:</strong> <?= $nearby ?></small><br/>
                            <small><strong>Flexibility to change after booking</strong></small><br/>
                            <small><strong>Best price guaranteed online!</strong></small>
                        </p>
                    </div>
                    <div class="col-12 col-sm-6">
                        <a href="" class="text-secondary">View Map</a><br/><br/>
                        {!!$map!!}
                    </div>
                </div>
                <hr/>
                <a class="btn btn-azizi-blue btn-block" data-target="#project-units-list" href="{{url($locale.'/online-booking/'.$project->slug.'/book') }}"> Book a unit for AED 20,000</a>
                <br/>
            </div>
        </div>
        <br/>
        <br/>

        <div class="row bg-white">
            <div class="col-12 col-sm-7 section-border-right"><br/>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <h6>About the project </h6>
                        </div>
                        <div class="card-body">
                            <p>{!! $locale=='ar'?$project->description_en:($locale=='cn'?$project->description_ch:$project->description_en) !!}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h6>Amenities</h6>
                        </div>
                        <div class="card-body">
                            <div class="card-body project-aminities">
                                <div class="row">
                                    <?php
                                    $amenities = explode(',', $amenity);
                                    foreach ($amenities as $value) {
                                        ?>
                                        <div class="col-6 col-sm-4"><div class="amenity"><label class="form-check-label"><input type="checkbox" checked readonly="true"> {{$value}}</label></div></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-5 section-border-left"><br/>
                <h5>Payment plan</h5><br/>
                <table id="installments" class="table table-striped">
                    <tbody>
                        <tr>
                            <th><span>Description / Milestone</span></th>
                            <th width="50">Percent(%)</th>
                        </tr>
                        <tr class="payment">
                            <td>
                                <div class="text-dark">Deposit</div>
                                <small class="text-secondary">Immediate</small>
                            </td>
                            <td class="value">10%*</td>
                        </tr>
                        <tr class="payment">
                            <td>
                                <div class="text-dark">1st Instalment</div>
                                <small class="text-secondary">Within 120 days of sale date</small>
                            </td>
                            <td class="value">10%</td>
                        </tr>
                        <tr class="payment">
                            <td>
                                <div class="text-dark">2nd Instalment</div>
                                <small class="text-secondary">Within 360 days of Sale Date</small>
                            </td>
                            <td class="value">10%</td>
                        </tr>
                        <tr class="payment">
                            <td>
                                <div class="text-dark">3rd &nbsp;instalment</div>
                                <small class="text-secondary">On Completion</small>
                            </td>
                            <td class="value">20%</td>
                        </tr>
                        <tr class="payment">
                            <td>
                                <div class="text-dark">4th &nbsp;instalment</div>
                                <small class="text-secondary">Per month for 23 months</small>
                            </td>
                            <td class="value">2%</td>
                        </tr>
                        <tr class="payment">
                            <td>
                                <div class="text-dark">Final Instalment</div>
                                <small class="text-secondary">Within 720 days from Completion</small>
                            </td>
                            <td class="value">4%</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <small class="text-secondary">*Plus 4% Registration Fees payable to DLD.</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br/>
        </div>
        <br/>
        <br/>

    </div>
    <br/>
</section>


@stop

@section('scripts')
<script>
    
</script>
@stop