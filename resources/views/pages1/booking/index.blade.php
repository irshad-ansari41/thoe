@extends('layouts/booking')
<input type="submit" value="" />




@section('content')

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <img src="<?=SITE_URL?>/booking/images/1150.png" class="img-fluid">
            </div>

        </div>
    </div>
</section>

<!-- Content section -->
<section class="py-5">
    <div class="container bg-white">
        <br/>
        <div class="row">
            <div class="col"><img src="<?=SITE_URL?>/assets/images/projects/15119942461219838370.jpg" class="img-fluid"></div>
            <div class="col">
                <h6>Thoe Riviera</h6>
                <h6>Maydan One, Dubai</h6>
                <p><span></span>Project type: RESIDENTIAL APARTMENTS
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo voluptatem quae delectus odit vel itaque amet.</p>
            </div>
        </div>
        <br/>
    </div>
    <br/>
    <div class="container">

        <div class="row">
            <div class="col-6 bg-white">
                <br/>
                <div class="row">
                    <div class="col-sm-6"><img src="<?=SITE_URL?>/assets/images/projects/project-maydan.jpg" class="img-fluid"></div>
                    <div class="col-sm-6">
                        <h6>Thoe Riviera</h6>
                        <h6>Maydan One, Dubai</h6>
                        <hr/>
                        <p><small><span>Project type:</span> RESIDENTIAL APARTMENTS</small><br/>
                            <small><span>Units type:</span>, consectetur adipisicing elit.</small><br/>
                            <small><span>Nearby:</span>, Expo 2020, Al Maktoum International Airport, Near Mall of the Emirates.</small>
                        </p>
                        <p>
                            <span>From<br/>AED</span>
                            <span>667,000</span>
                        </p>
                    </div>
                </div>
                <br/>
            </div>
            <div class="col-6 bg-white">
                <br/>
                <div class="row">
                    <div class="col-sm-6"><img src="<?=SITE_URL?>/assets/images/projects/project-maydan.jpg" class="img-fluid"></div>
                    <div class="col-sm-6">
                        <h6>Thoe Riviera</h6>
                        <h6>Maydan One, Dubai</h6>
                        <hr/>
                        <p><small><span>Project type:</span> RESIDENTIAL APARTMENTS</small><br/>
                            <small><span>Units type:</span>, consectetur adipisicing elit.</small><br/>
                            <small><span>Nearby:</span>, Expo 2020, Al Maktoum International Airport, Near Mall of the Emirates.</small>
                        </p>
                        <div class="row">
                            <div class="col-6 pull-left"> <span>From<br/>AED</span>
                                <span>667,000</span></div>
                            <div class="col-6 pull-right"><button>Choose Unit</button></div>
                        </div>
                    </div>
                </div>
                <br/>
            </div>


        </div>


    </div>
</section>


@stop