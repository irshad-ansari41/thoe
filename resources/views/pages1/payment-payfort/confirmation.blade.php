@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<style>.select-dropdown{border:1px solid #e4e4e4!important;padding-left:1em!important;color:#b7b7b7!important;border-radius:0!important}</style>
@stop

@section('main_div_wrapper')
@stop
@section('section_content')
<section class="az-section">

    <div class="container">
        <div class="parallax-container valign-wrapper">
            <div class="parallax">
                <img alt="banner" src="<?=SITE_URL?>/assets/images/banner/1511172682.jpg">
            </div>
        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <ul>
                        <li>
                            <span class="ion-ios-arrow-left" style=""></span>
                            <a href="#" style="color: #5a5a5a;">Home / </a>
                            <a href="#" style="color: #5a5a5a;">E-Services / </a>
                            <a style="font-weight: 600;">Pay Online</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="col s12 m10">
                <h5 class="mt0 mb0">Payment Data</h5>
                <div class="divider az-header-divider"></div>

            </div>

        </div>


        <!-- Online payment -->
        <div class="row book-now">
            <div class="col s12 card-panel" style="margin: 1em;">
                <?php $cdate = date("d/M/Y", strtotime(date("Y-m-d"))); ?>
                <!-- Basic info -->
                <div class="col s12">
                    <h6 style="font-weight: 500;padding: 10px 10px;background: #f7f7f7;">Customer info</h6>
                    <!-- Today date -->
                    <h6 style="float: right;margin-top: -7rem;background: #2f2f2f;color: white;padding: 10px 15px;">Date: <span style="font-weight: 800;margin-left: 10px;text-transform: uppercase;">{!! $cdate !!}</span></h6>
                    <!-- End -->
                </div>
                <!-- Pay info -->
                <div class="col s12">
                    <ul class="col s12">

                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Name : </h6>
                            </div>
                            <div class="col s9">
                                <h6>{!! $record['first_name'] !!} {!! $record['last_name'] !!}</h6>
                            </div>
                        </li>
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Email : </h6>
                            </div>
                            <div class="col s9">
                                <h6>{!! $record['email_id'] !!}</h6>
                            </div>
                        </li>
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Mobile : </h6>
                            </div>
                            <div class="col s9">
                                <h6>{!! $record['country_code'] !!} {!! $record['mobile_number'] !!}</h6>
                            </div>
                        </li>

                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Alt Contact : </h6>
                            </div>
                            <div class="col s9">
                                <h6>{!! $record['area_code'] !!} {!! $record['landline_number'] !!}</h6>
                            </div>
                        </li>
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Address : </h6>
                            </div>
                            <div class="col s9">
                                <h6 style="line-height: 24px;">{!! $record['address'] !!}</h6>
                            </div>
                        </li>
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>City : </h6>
                            </div>
                            <div class="col s9">
                                <h6 style="line-height: 24px;">{!! $record['city'] !!}</h6>
                            </div>
                        </li>
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>State : </h6>
                            </div>
                            <div class="col s9">
                                <h6 style="line-height: 24px;">{!! $record['state'] !!}</h6>
                            </div>
                        </li>
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Country : </h6>
                            </div>
                            <div class="col s9">
                                <h6 style="line-height: 24px;">{!! $record['country'] !!}</h6>
                            </div>
                        </li>
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Postal Code : </h6>
                            </div>
                            <div class="col s9">
                                <h6 style="line-height: 24px;">{!! $record['post_code'] !!}</h6>
                            </div>
                        </li>
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Passport No : </h6>
                            </div>
                            <div class="col s9">
                                <h6>{!! $record['passport_number'] !!}</h6>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col s12">
                    <h6 style="font-weight: 500;padding: 10px 10px;background: #f7f7f7;">Payment details</h6>
                    <!-- Today date -->

                    <!-- End -->
                </div>

                <div class="col s12">
                    <ul class="col s12">

                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Project Name : </h6>
                            </div>
                            <div class="col s9">
                                <h6>{!! $ptitle !!}</h6>
                            </div>
                        </li>
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Floor/Block : </h6>
                            </div>
                            <div class="col s9">
                                <h6>{!! $record['floor_block'] !!}</h6>
                            </div>
                        </li>
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Unit No : </h6>
                            </div>
                            <div class="col s9">
                                <h6>{!! $record['unit_number'] !!}</h6>
                            </div>
                        </li>

                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Pay for : </h6>
                            </div>
                            <div class="col s9">
                                <h6>{!! $record['payment_for'] !!}</h6>
                            </div>
                        </li>

                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Payment Amount : </h6>
                            </div>
                            <div class="col s9">
                                <h6>AED {!! $record['payment_amount'] !!}</h6>
                            </div>
                        </li>
                    </ul>
                </div>

                <form id="payment_confirmation" action="{{ $gateway['url'] }}" method="post"/>
                <?php
                foreach ($gateway['params'] as $name => $value) {
                    echo "<input type=\"hidden\" id=\"" . $name . "\" name=\"" . $name . "\" value=\"" . $value . "\"/>\n";
                }
                ?>
                <input type="submit" class="inquire az-btn active" style="margin: 35px 0px;" value="Confirm Payment">
                </form>

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
$('input[type=submit]').click(function () {
    $(this).val('Redirecting to the Bank...');
});
</script>
@stop
