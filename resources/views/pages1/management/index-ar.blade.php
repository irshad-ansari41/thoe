@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<style>

    .modal-overlay {
        opacity: 0.8 !important;
        z-index: 999 !important;
    }
    .co-exec-container {
        position: relative;
        width: 50%;
    }

    .az-header-divider {
        display: none !important;
    }

    .team-tag {
        opacity: 1;
        display: block;
        width: 100%;
        /*height: auto;*/
        transition: .5s ease;
        backface-visibility: hidden;
        min-height: 350px !important;
    }

    .co-exec-hover {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%)
    }

    .co-exec-container:hover .team-tag {
        /*opacity: 0.3;*/
    }

    /*.co-exec-container:hover .co-exec-hover {
      opacity: 1;
    }*/

    .text {
        background-color: #2d2d2d;
        color: white;
        font-size: 16px;
        padding: 0px 35px;
        cursor: pointer;
    }
    .modal {
        max-height: 100%;
        width: 75%;
        top: 10% !important;
        background: transparent;
    }
    .team-view{
        text-align: center;
        position: relative;
        opacity: 0;
        transition: .1s ease;

    }
    .co-exec-container:hover .team-view {
        opacity: 1;
    }
    .desig-person{ line-height: 0;}
    .desig-person .person-name {
        font-size: 1.1rem !important;
        font-weight: 800;
        margin:0.6rem 0rem 0.6rem 0rem !important;
    }
    .desig-person .person-name, .desig-person i{line-height: 15px !important;}
    img.responsive-img, video.responsive-video {
        border: 1px solid #eee;
    }
    @media only screen and (min-width: 767px) {
        .floatl{ float: left!important}
        .floatr{float: right!important}
    }
    @media only screen and (min-width: 1001px) {
        .big{display: block!important}
    }

    @media only screen and (max-width: 1000px) {
        .small{display: block!important}
    }
    .team-view{ opacity: 1;}
    .team-view .modal-trigger{opacity:1;}
    .team-view:hover .modal-trigger{
        opacity: 1;
    }
    .team-view img{
        position:relative;
        z-index:1;
    }    
    .overlay h4{ 
        text-align: center;
        margin-top: 50%;
    }
    .overlay{
        position: absolute;
        z-index: 2;
        top: 0;
        opacity: 0;
        color: #fff;
        width: 100%;
        height: 85%;
        align-content: transition: 0.5s ease;
        background-color:rgba(0, 0, 0, 0.52);
    }
    .team-view:hover .overlay{
        opacity:0.8;
    }
    
    .row{ margin-bottom: 0 !important;}
    .sectiontwo{background-color:#f3f3f3;}
    .rowgaps{ padding: 20px 0;}
    .gaps{padding: 1px 60px 50px 60px!important;}
    /* Gray Scale 
    .hover08 img {
            -webkit-filter: grayscale(100%);
            filter: grayscale(100%);
            -webkit-transition: .2s ease-in-out;
            transition: .2s ease-in-out;
    }
    .hover08:hover img {
            -webkit-filter: grayscale(0);
            filter: grayscale(0);
    }
    */
    .ReadProfile{
        cursor:pointer; background-color:#efefef;
        color:#4c4c4c; padding: 3px 10px;font-size: 13px;font-weight: bold;
        border-radius: 2px; text-transform: uppercase; display: inline-block;
        webkit-transition: .2s ease-in-out;
        transition: .2s ease-in-out;
        
    }
    .ReadProfile:hover{
        background-color:  rgb(21, 88, 149);
        color:#fff;
    }
    p, .az-pcontent{ text-align: right !important; font-size: 14.5px !important;}
    .TPara{ padding: 0px 0px 20px 60px; }
    .im-age{ /*transform: scale(1.1, 1.1);*/ }
    @media only screen and (max-width: 992px) { 
        /*.Sec-Team{ margin-top: 40px;}*/
        .TPara{ padding: 0px 0px 20px 0px; }
        .gaps{padding: 10px 17px !important;}
        .im-age{ /*transform: scale(1.0, 1.0);*/ }
        .modal { width: 100%; }
        
    }
    @media only screen and (max-width: 767px) {
        .modal { width: 100%; }
        .gaps{padding: 10px 17px!important;}
        .im-age{ /*transform: scale(1.0, 1.0);*/ }
        
    }
    
</style>
@stop

@section('main_div_wrapper')
@stop

@section('section_content')

<section class="az-section">
    <div class="container">
        <div class="parallax-container valign-wrapper only-heading">
            <div class="parallax">
                @if($executive['banner_image']!="")
                <img alt="{{ $executive['banner_alt'] }}" src="{{asset('assets/images/executives/')}}/{{ $executive['banner_image'] }}" >
                @endif
            </div>
            <div class="col s12 center-align card tag-pro-ar">
                <h1>{{trans('words.Corporate Executives')}}</h1>
            </div>
        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <?= generate_breadcrumb([url("$locale") => trans('words.home'), '' => trans('words.Corporate Executives')], $locale) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container-flud">
        <section>
            <div class="container">
                <div class="row rowgaps" >
                    <div class="col s12 m12 short-desc">
                        {!! $executive['description_ar'] !!}
                    </div>
                </div>
            </div>
        </section>
        <!--Company Intero -->
        
        <!--section  class="sectiontwo">
            <div class="container">    
                <!-- Mr. Thoe Chairman --
                <div class="row rowgaps" >
                    <div class="col s12 m12 l3 xl3" data-aos="fade-left" data-aos-once="true">
                        @if($executive['chairmen_image']!="")
                        <img  alt="{{ $executive['chairment_alt'] }}"  src="{{ asset('assets/images/100-blank-img.jpg') }}" data-src="{{asset('assets/images/executives/')}}/{{ $executive['chairmen_image'] }}" class="responsive-img">
                        @endif
                    </div>
                    <div class="col s12 m12 l9 xl9 gaps" data-aos="fade-in" data-aos-once="true">
                        <div class="desig-person mt0">
                            <div class="person-name">{{ $executive['chairmen_name_ar'] }}</div>
                            <div class="divider az-header-divider"></div>
                            <i>{{trans('words.Chairman, Thoe Group')}}</i>
                        </div>
                        <p class="az-pcontent">{!! $executive['chairmen_description_ar'] !!}</p>
                    </div>
                </div>
                <!-- end --
            </div>
        </section>
        <!--Chairman -->
        
        <!-- Farhad Thoe Ceo -->
        <section>
            <div class="container" >   
                <div class="row rowgaps">
                    <div class="col s12 m12 l3 xl3 " data-aos="fade-left" data-aos-once="true">
                        @if($executive['ceo_image']!="")
                        <img alt="{{ $executive['ceo_alt'] }}" src="{{ asset('assets/images/100-blank-img.jpg') }}" data-src="{{asset('assets/images/executives/')}}/{{ $executive['ceo_image'] }}" class="responsive-img">
                        @endif
                    </div>
                    <div class="col s12 m12 l9 xl9  gaps" data-aos="fade-in" data-aos-once="true">
                        <div class="desig-person mt0">
                            <div class="person-name">{{ $executive['ceo_name_ar'] }}</div>
                            <div class="divider az-header-divider"></div>
                            <i>{{trans('words.CEO THOE DEVELOPMENTS')}}</i> 
                        </div>
                        <p class="az-pcontent">{!! $executive['ceo_description_ar'] !!}</p>
                    </div>
                </div>
                <!-- end -->
            </div>
        </section>
        <!-- CEO -->
        
        <section class="sectiontwo">
            <div class="container" >   
                <!-- Fawad Thoe Dep: Ceo -->
                <div class="row rowgaps">
                    <div class="col s12 m12 l3 xl3 " data-aos="fade-left" data-aos-once="true">
                        @if($executive['deputy_ceo_image']!="")
                        <img alt="{{ $executive['deputy_ceo_alt'] }}" src="{{ asset('assets/images/100-blank-img.jpg') }}" data-src="{{asset('assets/images/executives/')}}/{{ $executive['deputy_ceo_image'] }}" class="responsive-img">
                        @endif
                    </div>
                    <div class="col s12 m12 l9 xl9 gaps" data-aos="fade-in" data-aos-once="true">
                        <div class="desig-person mt0">
                            <div class="person-name">{{ $executive['deputy_ceo_name_ar'] }}</div>
                            <div class="divider az-header-divider"></div>
                            <i>{{trans('words.Deputy CEO, Thoe Developments')}}</i> 
                        </div>
                        <p class="az-pcontent">{!! $executive['deputy_ceo_description_ar'] !!}</p>
                    </div>
                </div>
                <!-- end -->
            </div>
        </section>
        <!--Deputy CEO -->
        
        <section>
            <div class="container">
                <?php // '<pre>'; print_r($teams); echo '</pre>'; ?>
                <div class="row rowgaps">
                    <div class="col s12 m11">
                        <h3 style=" text-transform: uppercase; margin-bottom: 40px !important; font-weight: bold; color:#4c4c4c;">
                            {{trans('words.Senior Management Team')}}
                        </h3>
                    </div>
                    
                    <?php $i=1; foreach ($teams as $key => $team) {
                    if($team->cateteam =="SENIOR MANAGEMENT TEAM"){ ?>    
                    @if(!empty($team->description_ar))
                    <div class="col s12 m12 l6 xl6" style="margin:0 0 35px 0;">
                        <div class="row hover08">
                            <div class="col s12 m12 l4 xl4" data-aos="fade-in" data-aos-once="true">
                                <!--img src="<?=SITE_URL?>/assets/images/team/1547731627.jpg" width="250px" class="left"/-->
                                <img alt="{{ $team->alt }}" src="{{ asset('assets/images/100-blank-img.jpg') }}" data-src="{{asset('assets/images/team/')}}/{{ $team->image }}" class="responsive-img im-age">
                                
                            </div>
                            <div class="col s12 m12 l8 xl8 Sec-Team" data-aos="fade-out" data-aos-once="true">
                                <h5 class="person-name" style="margin:10px 0px;">{{ $team->name_ar }}</h5>
                                <h3 style="margin:0px 0px 15px 0px; font-size:11.5px; letter-spacing:1px; text-transform: uppercase; font-weight: bold;">{{ $team->designation_ar }}</h3>
                                <p class="TPara">
                                    {{ $team->description_ar }}
                                </p>
                                <?php if(!empty($team->long_description_ar)): ?>
                                    <a class="modal-trigger ffs-bs ReadProfile" onclick="call_team_member({{ $team->id }})" >
                                        <?=trans('words.Read Profile') ?>
                                    </a>
                                <?php endif;?>
                                <!--span class="right">
                                    Follow Us:
                                    <a href="#"class="socialIcon right"><i class="ion-social-facebook"></i></a>
                                    <a hre="#" class="socialIcon right"><i class="ion-social-linkedin"></i></a>
                                    <a hre="#" class="socialIcon right"><i class="ion-social-twitter"></i></a>
                                    <a hre="#" class="socialIcon right"><i class="ion-social-instagram"></i></a>
                                </span-->
                            </div>
                        </div>
                    </div>
                    @endif
                    <?php }} ?>
                </div>
                <!--end HODS Team Section-->

                <div class="col s12 m6">


                </div>
                <!--end HODS Team Section-->

            </div>
    </div>
</section>


<!-- HOD: Section -->

<!-- Team Loop Starts-->		
@if(!empty($teams))
<?php
$i = 0;
?>
@foreach($teams as $team)
@if($i==0)

<div class="row m0 " style="display:none">
    @endif
    <div class="col s12 m6 p0 co-exec-container" style="margin:1rem 0rem">
        <div class="col s12 team-tag p0" style="min-height: 1px !important;">
            <div class="col s12 m5">
                @if($team['image']!="")
                <img alt="{{ $team['alt'] }}" src="{{ asset('assets/images/100-blank-img.jpg') }}" data-src="{{asset('assets/images/team/')}}/{{ $team['image'] }}" class="responsive-img">
                <div class="col-md-12 team-view"> 
                    <a class="modal-trigger" onclick="call_team_member({{ $team['id'] }})" style="color: white;position: absolute;left: 0;right: 0;margin-top: -35px;">
                        <div class="text">
                            <!-- View Team -->
                            @if($locale=='en')
                            View Team
                            @elseif($locale=='ar')
                            عرض الفريق
                            @elseif($locale=='cn')
                            查看团队
                            @endif
                        </div>
                    </a>
                </div>
                @endif
            </div>
            <div class="col s12 m7">
                <div class="desig-person">
                    <!-- <div class="person-name">{{ $team['name'] }}</div> -->
                    @if($locale=='en')
                    <div class="person-name">{{ $team['name'] }}</div>
                    @elseif($locale=='ar')
                    <div class="person-name" style="margin-bottom: 0;">{{ $team['name'] }}</div>
                    @elseif($locale=='cn')
                    <div class="person-name" style="margin-bottom: 0;">{{ $team['name'] }}</div>
                    @endif
                    <div class="divider az-header-divider mb0"></div>
                    <!-- <i style="font-size: 10px;">{{ $team['designation'] }}</i> -->

                    @if($locale=='en')
                    <i style="font-size: 10px;">{{ $team['designation'] }}</i>
                    @elseif($locale=='ar')
                    <i style="font-size: 15px;">{{ $team['designation'] }}</i>
                    @elseif($locale=='cn')
                    <i style="font-size: 15px;">{{ $team['designation'] }}</i>
                    @endif
                </div>
                <!-- <p class="az-pcontent mt0 mb0" style="letter-spacing: initial;text-transform: capitalize;">{{ $team['description'] }}</p> -->
                @if($locale=='en')
                <p class="az-pcontent mt0 mb0" style="letter-spacing: initial;">{{ $team['description'] }}</p>
                @elseif($locale=='ar')
                <p class="az-pcontent  mb0" style="letter-spacing: initial;">{{ $team['description'] }}</p>
                @elseif($locale=='cn')
                <p class="az-pcontent  mb0" style="letter-spacing: initial;">{{ $team['description'] }}</p>
                @endif
            </div>
        </div>
        <!-- <div class="co-exec-hover">
                <a class="modal-trigger" href="#co-exec-team-popup" id="call_team_member({{ $team['image'] }})" style="color: white;">
                <a class="modal-trigger" onclick="call_team_member({{ $team['id'] }})" style="color: white;">
                        <div class="text">
                                View Team
                        </div>
                </a>
        </div> -->
    </div>
    <?php $i++; ?>
    @if($i==2)
</div>
<?php $i = 0; ?>
@endif
@endforeach
@endif
<!-- Team Loop Ends-->	
</div>

<!-- Model Popup -->
<div id="co-exec-team-popup" class="modal" style="top: 10% !important;">
    <div class="modal-content" style="background: white;margin: 10px;border-radius: 2px;">
        <div class="col s12 m12 l12 xl12" style="position: relative;">
        <!-- <h1 class="modal-action modal-close" style="position: absolute;right: 10px;top: -15px;cursor: pointer;"><span class="ion-ios-close-empty"></span></h1> -->
            @if($locale=='en')
            <h1 class="modal-action modal-close" style="position: absolute;right: 10px;top: -15px;cursor: pointer;"><span class="ion-ios-close-empty"></span></h1>
            @endif
            @if($locale=='ar')
            <h1 class="modal-action modal-close" style="position: absolute;left: 10px;top: -15px;cursor: pointer;"><span class="ion-ios-close-empty"></span></h1>
            @endif
            @if($locale=='cn')
            <h1 class="modal-action modal-close" style="position: absolute;right: 10px;top: -15px;cursor: pointer;"><span class="ion-ios-close-empty"></span></h1>
            @endif
        </div>
        <div class="row" id="popup_row_id"></div>
    </div>
</div>
<!-- Model popup Ends -->
</section>
@stop

@section('footer_main_scripts')

<script  type="text/javascript">
                        function call_team_member(id){

                        $.ajax({
                        url:"ajax_get_team",
                                data:{team_id:id},
                                type:"GET",
                                success:function(data) {
                                $('#co-exec-team-popup').modal('open');
                                $('#popup_row_id').html(data);
                                }
                        });
                        }

</script>
    <script>
      AOS.init({
        easing: 'ease-in-out-sine'
      });
    </script>

@stop
@section('footer_scripts')
@stop
