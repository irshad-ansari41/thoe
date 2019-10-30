@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<style>
    .form-group{margin: 10px 0 0 0;}
    .form-control{border: 1px solid #eee!important;padding: 10px!important;width: 95%!important;font-weight: 100;}
    #mortgageCalculatorInput input{width: 100%; height: auto; margin-bottom: 5px; border: 1px solid #999; border-radius: 3px;}
    #mortgageCalculatorInput select{width: 100%; height: 40px; margin-bottom: 5px; border: 1px solid #999; border-radius: 3px;}
    #mortgageCalculatorInput button{width: 150px; height: auto; margin-right: 8px; float: right; margin-bottom: 15px; background: #666; color: #fff;}
    .txtBlack{color: #000;}
    #mortgage-calculator-result{margin-top:20px;}
    #mortgageCalculatorSummary{border:1px solid #aaa;border-collapse:collapse;margin-top:10px;}
    #mortgageCalculatorSummary tr td{border:1px solid #aaa;border: 1px solid #aaa;padding: 5px;}
    #mortgageCalculatorDetails{border:1px solid #aaa;border-collapse:collapse;margin-top:10px;}
    #mortgageCalculatorDetails tr th,#mortgageCalculatorDetails tr td{border:1px solid #aaa;border: 1px solid #aaa;padding: 5px;}
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
                <img alt="" src="{{ asset('assets/images/banner/1512169993.jpg') }}">
            </div>
            <div class="col s12 center-align card tag-pro only-heading">
                <h1>Mortgage Calculator</h1>
            </div>
        </div>

        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <?php
                    if ($locale == 'en') {
                        $links = [url("$locale") => trans('words.home'), '' => 'Mortgage Calculator'];
                    } elseif ($locale == 'cn') {
                        $links = [url("$locale") => '主页', '' => 'Mortgage Calculator'];
                    } elseif ($locale == 'ar') {
                        $links = [url("$locale") => trans('words.home'), '' => 'Mortgage Calculator'];
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

        <div class="col s12 m12 pro-holder center-align">
            <form id="mortgageCalculatorInput" action="#" method="POST">
                <div class="row txtLeft">
                    <!-- Each "cell" has col-[widht in percents] class --></p>
                    <div class="col s12 m12 form-group">
                        <div class="item-input">
                            <span class="txtBlack">Loan amount:</span><br />
                            <input type="number" name="loan_amount" id="loan_amount" placeholder="Loan amount" step=0.01 value="500000" class="form-control">
                        </div>
                    </div>
                    <div class="col s12 m12 form-group">
                        <div class="item-input">
                            <span class="txtBlack">Annual interest rate:</span><br />
                            <input type="number" name="interest_rate" id="interest_rate" placeholder="Annual interest rate" step=0.01 value="4.99" class="form-control">
                        </div>
                    </div>
                    <div class="col s12 m12 form-group">
                        <div class="item-input">
                            <span class="txtBlack">Loan period in years:</span><br />
                            <select id="loan_period_years" name="loan_period_years" class="form-control" style="display:block"><option value="12">1 Years</option><option value="24">2 Years</option><option value="36">3 Years</option><option value="48">4 Years</option><option value="60">5 Years</option><option value="72">6 Years</option><option value="84">7 Years</option><option value="96">8 Years</option><option value="108">9 Years</option><option value="120">10 Years</option><option value="132">11 Years</option><option value="144">12 Years</option><option value="156">13 Years</option><option value="168">14 Years</option><option value="180">15 Years</option><option value="192">16 Years</option><option value="204">17 Years</option><option value="216">18 Years</option><option value="228">19 Years</option><option value="240">20 Years</option></select>
                        </div>
                    </div>
                    <div class="col s12 m12 form-group">
                        <div class="item-input">
                            <span class="txtBlack">Start date of loan:(mm/dd/yyyy)</span><br />
                            <input type="date" id="loan_start_date" name="loan_start_date" placeholder="Start date of loan" class="form-control">
                        </div>
                    </div>
                    <p>                            <!--div class="col-100 tablet-100">


<div class="item-input">
    <a id="advanceOption" href="#">Advance Option</a>
</div>


</div>




<div class="col s12 m12 advanceOption">


<div class="item-input">
    <span>Property Tax Rate:</span><br />
    <input type="number" id="propertyTaxRate" name="propertyTaxRate" step=0.01 value="0" class="form-control">
</div>


</div>





<div class="col s12 m12 advanceOption">


<div class="item-input">
    <span>Adjust Fixed Rate Months:</span><br />
    <input type="number" id="adjustFixedRateMonths" name="adjustFixedRateMonths" step=0.01 value="0" class="form-control">
</div>


</div>





<div class="col s12 m12 advanceOption">


<div class="item-input">
    <span>Adjust Initial Cap:</span><br />
    <input type="number" id="adjustInitialCap" name="adjustInitialCap" step=0.01 value="0">
</div>


</div>





<div class="col s12 m12 advanceOption">


<div class="item-input">
    <span>Adjust Periodic Cap:</span><br />
    <input type="number" id="adjustPeriodicCap" name="adjustPeriodicCap" step=0.01 value="0">
</div>


</div-->
                    <div class="col s12 m12 form-group">
                        <div class="contact-button">
                            <button type="button" class="button button-big button-fill color-gray">CALCULATE</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="reset" class="button button-big button-fill color-black">CLEAR</button>
                        </div></div></div>
                <div class="status-search"></div>
            </form>

            <div id="mortgage-calculator-result"></div>
        </div>
    </div>

</section>
<!-- End -->


@stop
@section('footer_main_scripts')

@stop

@section('footer_scripts')
<script type="text/javascript" src="<?= asset('assets/js/mortgage-calculator.js') ?>"></script>
@stop

