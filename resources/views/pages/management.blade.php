@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<style>

    .parallax-container .parallax img {top: 0rem;}
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
        width: 100%;
        top: 0% !important;
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
    .desig-person .person-name {
        font-size: 1.5rem;
        font-weight: 800;
        margin: 1em 0;
    }
</style>
@stop

@section('main_div_wrapper')
@stop

@section('section_content')
<section class="az-section">
    <div class="container">
        <div class="parallax-container valign-wrapper">
            <div class="parallax">
                @if($executive['banner_image']!="")

                <img alt="{{ $executive['banner_alt'] }}" src="{{asset('assets/images/executives/')}}/{{ $executive['banner_image'] }}" style="top: -5rem;">
                @endif
            </div>
        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <ul>
                        <li>
                            <!-- <a href="{{ url('/') }}" style="color: #5a5a5a;">Home / </a>
                            <a style="font-weight: 600;">Corporate Executives</a> -->
                            @if($locale=='en')
                            <span class="ion-ios-arrow-left" style=""></span>
                            @endif

                            <!-- <a style="font-weight: 600;">Our founder</a> -->
                            @if($locale=='en')
                            <a href="{{ url('/') }}" style="color: #5a5a5a;">{{trans('words.home')}} / </a>
                            <a style="font-weight: 600;">Corporate Executives</a>
                            @elseif($locale=='ar')
                            <a href="{{ url('/') }}" style="color: #5a5a5a;">{{trans('words.home')}} / </a>
                            <a style="font-weight: 600;">مجلس الإدارة</a>
                            @elseif($locale=='cn')
                            <a href="{{ url('/') }}" style="color: #5a5a5a;">主页 / </a>
                            <a style="font-weight: 600;">管理团队</a>
                            @endif
                            @if($locale=='ar')
                            <span class="ion-ios-arrow-left" style=""></span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row" style="margin-bottom: 5em;">
            <div class="col s12 m12">
                <!-- <h5 class="title-uppercase">{{ $executive['title_en'] }}</h5> -->

                {!! $executive['description_en'] !!}

            </div>
        </div>

        <!-- Chairman -->
        <div class="row" style="margin-bottom: 5em;">
            <div class="col s12 m4">
                @if($executive['chairmen_image']!="")
                <img  alt="{{ $executive['chairment_alt'] }}"  src="{{asset('assets/images/executives/')}}/{{ $executive['chairmen_image'] }}" class="responsive-img">
                @endif
            </div>

            <div class="col s12 m7 offset-m1">
                <div class="desig-person mt0">
                    <div class="person-name">{{ $executive['chairmen_name_en'] }}</div>
                    <div class="divider az-header-divider"></div>
                    <!-- <i>Chairman, Azizi Group</i> -->


                    @if($locale=='en')
                    <i>Chairman, Azizi Group</i>
                    @endif
                    @if($locale=='ar')
                    <i>رئيس مجلس إدارة مجموعة عزيزي</i>
                    @endif
                    @if($locale=='cn')
                    <i>Azizi集团主席</i>
                    @endif



                </div>
                <p class="az-pcontent">{!! $executive['chairmen_description_en'] !!}</p>
            </div>
        </div>
        <!-- end -->

        <!-- Ceo -->
        <!--div class="row hide-on-small-and-down" style="margin-bottom: 5em;">
            <div class="col s12 m7">
                <div class="desig-person mt0">
                    <div class="person-name">{{ $executive['ceo_name_en'] }}</div>
                    <div class="divider az-header-divider"></div>
                    <i>CEO AZIZI DEVELOPMENTS</i>
                    @if($locale=='en')
                    <i>CEO AZIZI DEVELOPMENTS</i> 
                    @endif
                    @if($locale=='ar')
                    <i>الرئيس التنفيذي لشركة عزيزي للتطوير العقاري</i>
                    @endif
                    @if($locale=='cn')
                    <i>Azizi 地产公司首席执行官</i>
                    @endif

                </div>
                <p class="az-pcontent">{!! $executive['ceo_description_en'] !!}</p>
            </div>
            <div class="col s12 m4 offset-m1">
                @if($executive['ceo_image']!="")
                <img alt="{{ $executive['ceo_alt'] }}" src="{{asset('assets/images/executives/')}}/{{ $executive['ceo_image'] }}" class="responsive-img">
                @endif
            </div>
        </div-->
        <!-- end -->

        <!-- Ceo mob-->
        <!--div class="row hide-on-med-and-up" style="margin-bottom: 5em;">
            <div class="col s12 m4 offset-m1">
                @if($executive['ceo_image']!="")
                <img alt="{{ $executive['ceo_alt'] }}" src="{{asset('assets/images/executives/')}}/{{ $executive['ceo_image'] }}" class="responsive-img">
                @endif
            </div>

            <div class="col s12 m7 offset-m1">
                <div class="desig-person mt0">
                    <div class="person-name">{{ $executive['ceo_name_en'] }}</div>
                    <div class="divider az-header-divider"></div>
                    @if($locale=='en')
                    <i>CEO AZIZI DEVELOPMENTS</i>
                    @endif
                    @if($locale=='ar')
                    <i>الرئيس التنفيذي لشركة عزيزي للتطوير العقاري</i>
                    @endif
                    @if($locale=='cn')
                    <i>Azizi 地产公司首席执行官</i>
                    @endif
                </div>
                <p class="az-pcontent">{!! $executive['ceo_description_en'] !!}</p>
            </div>
        </div-->
        <!-- end -->

        <!-- Dep: Ceo -->
        <div class="row" style="margin-bottom: 5em;">

            <div class="col s12 m7 ">
                <div class="desig-person mt0">
                    <div class="person-name">{{ $executive['deputy_ceo_name_en'] }}</div>
                    <div class="divider az-header-divider"></div>
                    <!-- <i>Deputy CEO, Azizi Developments</i> -->
                    @if($locale=='en')
                    <i>Deputy CEO, Azizi Developments</i>
                    @endif
                    @if($locale=='ar')
                    <i>نائب الرئيس التنفيذي لشركة عزيزي للتطوير العقاري</i>
                    @endif
                    @if($locale=='cn')
                    <i>Azizi 地产公司首席执行官</i>
                    @endif
                </div>
                <p class="az-pcontent">{!! $executive['deputy_ceo_description_en'] !!}</p>
            </div>

            <div class="col s12 m4 offset-m1">
                @if($executive['deputy_ceo_image']!="")
                <img alt="{{ $executive['deputy_ceo_alt'] }}" src="{{asset('assets/images/executives/')}}/{{ $executive['deputy_ceo_image'] }}" class="responsive-img">
                @endif
        </div>

        </div>
        <!-- end -->
        <!-- Team Loop Starts-->		
        @if(!empty($teams))
        <?php
        $i = 0;
        ?>
        @foreach($teams as $team)
        @if($i==0)

        <div class="row m0">
            @endif
            <div class="col s12 m6 p0 co-exec-container" style="margin:1rem 0rem">
                <div class="col s12 team-tag p0" style="min-height: 1px !important;">
                    <div class="col s12 m5">
                        @if($team['image']!="")
                        <img alt="{{ $team['alt'] }}" src="{{asset('assets/images/team/')}}/{{ $team['image'] }}" class="responsive-img">
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
    <div id="co-exec-team-popup" class="modal" style="top: 1% !important;">
        
        <div class="modal-content" style="padding-bottom: 5rem;background: white;margin: 10px;border-radius: 5px;">
            
            <div class="col s12" style="position: relative;">
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

<script>
                                function call_team_member(id)
                                        {
                                        $.ajax({
                                        url:"ajax_get_team",
                                                data:{team_id:id},
                                                type:"GET",
                                                success:function(data) {
            $('#co-exec-team-popup').modal('open');
                                                $('#popup_row_id').html(data);
            
                                                //$('#co-exec-team-popup p.az-pcontent.mt0.mb0').css("display","none !important");
                                                //document.getElementById("unit_id").innerHTML = data;
                                                //$("select").material_select();
                                                }
                                        });
                                        }
                                /*$( document ).ready(function() {
                                 $("#mainteamid").change(function(){
                                 $.ajax({
                                 url:"ajax_get_team",
                                 data: $('#tryitForm').serialize(),
                                 type:"POST",
                                 success:function(data) {
                                 $("#pajax").html(data);
                                 }
                                 });
                                 });
                                 });*/
</script>

@stop
@section('footer_scripts')
@stop
