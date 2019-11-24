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
        <div class="parallax-container valign-wrapper only-heading">
            <div class="parallax">
                <img alt="banner" src="<?=SITE_URL?>/assets/images/banner/1511172682.jpg">
            </div>
            <div class="col s12 center-align card tag-pro{{$locale=='ar'?'-ar':''}}">
                <h1>{{trans('words.Pay Online')}}</h1>
                <!--<p><i class="ion ion-ios-location-outline" class="text-bold-900"></i></p>-->
            </div>

        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <?php
                    if ($locale == 'en') {
                        $links = [url("$locale") => trans('words.home'), '' => trans('words.Pay Online')];
                    } elseif ($locale == 'cn') {
                        $links = [url("$locale") => '主页', '' => '在线支付'];
                    } elseif ($locale == 'ar') {
                        $links = [url("$locale") => trans('words.home'), '' => trans('words.Pay Online')];
                    }
                    ?>
                    <?= generate_breadcrumb($links, $locale) ?>                   
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row" hidden>
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
                        @if(!empty($record['area_code'])&&!empty($record['landline_number']))
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Alt Contact : </h6>
                            </div>
                            <div class="col s9">
                                <h6>{!! $record['area_code'] !!} {!! $record['landline_number'] !!}</h6>
                            </div>
                        </li>
                        @endif
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Address : </h6>
                            </div>
                            <div class="col s9">
                                <h6>{!! $record['address'] !!}</h6>
                            </div>
                        </li>
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>City : </h6>
                            </div>
                            <div class="col s9">
                                <h6>{!! $record['city'] !!}</h6>
                            </div>
                        </li>
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>State : </h6>
                            </div>
                            <div class="col s9">
                                <h6>{!! $record['state'] !!}</h6>
                            </div>
                        </li>
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Country : </h6>
                            </div>
                            <div class="col s9">
                                <h6>{!! $record['country'] !!}</h6>
                            </div>
                        </li>
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Postal Code : </h6>
                            </div>
                            <div class="col s9">
                                <h6>{!! $record['post_code'] !!}</h6>
                            </div>
                        </li>
                        @if(!empty($record['passport_number']))
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Passport No : </h6>
                            </div>
                            <div class="col s9">
                                <h6>{!! $record['passport_number'] !!}</h6>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>

                <div class="col s12">
                    <h6 style="font-weight: 500;padding: 10px 10px;background: #f7f7f7;">Payment details</h6>
                    <!-- Today date -->

                    <!-- End -->
                </div>

                <div class="col s12">
                    <ul class="col s12">
                        @if(!empty($ptitle))
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Project Name : </h6>
                            </div>
                            <div class="col s9">
                                <h6>{!! $ptitle !!}</h6>
                            </div>
                        </li>
                        @endif
                        @if(!empty($record['floor_block']))
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Floor/Block : </h6>
                            </div>
                            <div class="col s9">
                                <h6>{!! $record['floor_block'] !!}</h6>
                            </div>
                        </li>
                        @endif
                        @if(!empty($record['unit_number']))
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Unit No : </h6>
                            </div>
                            <div class="col s9">
                                <h6>{!! $record['unit_number'] !!}</h6>
                            </div>
                        </li>
                        @endif
                        @if(!empty($record['payment_for']))
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Pay for : </h6>
                            </div>
                            <div class="col s9">
                                <h6>{!! $record['payment_for'] !!}</h6>
                            </div>
                        </li>
                        @endif
                        @if(!empty($record['payment_amount']))
                        <li class="col s12" style="border-bottom: 1px solid #e8e8e8;">
                            <div class="col s3">
                                <h6>Payment Amount : </h6>
                            </div>
                            <div class="col s9">
                                <h6>AED {!! $record['payment_amount'] !!}</h6>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>




                <form id="payment_confirmation" action="{{ $gateway['requestUrl'] }}" method="post"/>


                <?php
                foreach ($gateway['params'] as $name => $value) {
                    echo "<input type=\"hidden\" id=\"" . $name . "\" name=\"" . $name . "\" value=\"" . $value . "\"/>\n";
                }
                echo "<input type=\"hidden\" id=\"signature\" name=\"signature\" value=\"" . $gateway['signature'] . "\"/>\n";
                ?>
                <div class="row">
                    <div class="col s6 m6">
                        <input type="button" class="inquire az-btn active"  value="Back" onclick="window.history.back()">
                    </div>
                    <div class="col s6 m6" style="text-align:right;">
                        <input type="submit" class="inquire az-btn active "  value="Proceed TO Payment" />
                    </div>
                </div>
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
