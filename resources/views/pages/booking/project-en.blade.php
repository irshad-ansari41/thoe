@extends('layouts/booking')

@section('styles')
<style>
    .img-full-width{width: 100%;height: 500px}
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
<section class="py-5">
    <div class="container">
        <div class="row bg-white">
            <div class="col-12 col-sm-7 section-border-right"><br/>
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('/assets/images/projects/') }}/{{ $project->image }}" alt="Los Angeles" class="img-fluid img-full-width">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('/assets/images/projects/') }}/{{ $project->image }}" alt="Chicago" class="img-fluid img-full-width">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('/assets/images/projects/') }}/{{ $project->image }}" alt="New York" class="img-fluid img-full-width">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>

                <br/><br/>
            </div>
            <div class="col-12 col-sm-5 section-border-left"><br/>
                <h5>{{ $locale=='ar'?$project->title_ar:($locale=='cn'?$project->title_ch:$project->title_en) }}</h5>
                <h6>Maydan One, Dubai</h6>
                <hr/>
                <p><small><strong>Project type:</strong> RESIDENTIAL APARTMENTS</small><br/>
                    <small><strong>Units type:</strong> <?= $unitTypes ?></small><br/>
                    <small><strong>Amenities:</strong> <?= $amenity ?></small><br/>
                    <small><strong>Nearby:</strong> <?= $nearby ?></small><br/>
                    <small><strong>Flexibility to change after booking</strong></small><br/>
                    <small><strong>Best price guaranteed online!</strong></small>
                </p>
                <a href="" class="text-secondary">View Map</a><br/><br/>
                <div style="width: 100%"><iframe width="100%" height="150" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=Dubai+(Azizi%20Developements)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/map-my-route/">Draw map route</a></iframe></div><br />
                <br/>
                <a class="btn btn-primary btn-block" data-target="#project-units-list" href="{{url($locale.'/booking/'.$project->slug.'/book') }}"> <strong class="float-left">&GT; |</strong> Book a unit for AED 20,000</a>
            </div>
            <br/>
        </div>
        <br/>
        <br/>

        <div class="row bg-white">
            <div class="col-12 col-sm-7 section-border-right"><br/>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                <h6>About the project <span class="open">+</span><span class="close">-</span></h6>
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                <p>{!! $locale=='ar'?$project->description_en:($locale=='cn'?$project->description_ch:$project->description_en) !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                <h6>Community info<span class="open">+</span><span class="close">-</span></h6>
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                <h6>Amenities<span class="open">+</span><span class="close">-</span></h6>
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                            <div class="card-body project-aminities">
                                <div class="row">
                                    <?php
                                    $amenities = explode(',', $amenity);
                                    foreach ($amenities as $value) {
                                        ?>
                                        <div class="col-3 col-sm-3"><div class="amenity"><label class="form-check-label"><input type="checkbox" checked readonly="true">{{$value}}</label></div></div>
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

@section('script')
<script>

</script>
@stop