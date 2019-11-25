@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<style>.tabs .tab a{color:rgba(70,70,70,0.7);display:block;width:100%;height:100%;padding:0;font-size:14px;text-overflow:ellipsis;overflow:hidden;-webkit-transition:color .28s ease;transition:color .28s ease}
.tabs .tab a.active{background-color:#171717;color:#fff!important}
.tabs .tab a:hover{color:#000}
.tabs h6{margin:15px 0}
.select-dropdown{border:1px solid #fff!important;border-radius:25px!important;color:#b7b7b7!important}
.cd-tab-filter a{display:inline-block;padding:0 1em;width:auto;color:#9a9a9a;text-transform:capitalize;font-weight:400;font-size:.99rem}
.prof-img{max-width:200px!important;border:1px solid #e2e2e2;margin:0 auto;padding:1em}
.prof-img:hover + .edit-profile{display:block}
.edit-profile:hover{display:block}
.edit-profile{cursor:pointer;-webkit-transition-duration:.4s;transition-duration:.4s}</style>
@stop

@section('main_div_wrapper')
@stop
@section('section_content')
<!-- Header -->
<section class="az-section">

    <div class="container">
        <div class="parallax-container valign-wrapper">
            <div class="parallax">
                <img src="<?=SITE_URL?>/assets/images/banner/1512284846.jpg">
            </div>
        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <ul>
                        <li style="display: inline-block;">
                            @if($locale=='en')
                            <span class="ion-ios-arrow-left" style=""></span>
                            @endif

                            @if($locale=='en')
                            <a href="{{ url("/") }}" style="color: #5a5a5a;">{{trans('words.home')}} / </a>

                            <!--<a href="#" style="color: #5a5a5a;">Agent Login / </a>-->
                            <a style="font-weight: 600;">{{trans('words.Dashboard')}}</a>
                            @elseif($locale=='ar')
                            <a href="{{ url("/") }}" style="color: #5a5a5a;">{{trans('words.home')}} / </a>

                            <!--<a href="#" style="color: #5a5a5a;">Agent Login / </a>-->
                            <a style="font-weight: 600;">{{trans('words.Dashboard')}}</a>
                            @elseif($locale=='cn')
                            <a href="{{ url("/") }}" style="color: #5a5a5a;">主页 / </a>

                            <!--<a href="#" style="color: #5a5a5a;">Agent Login / </a>-->
                            <a style="font-weight: 600;">控制面板</a>

                            @endif


                            @if($locale=='ar')
                            <span class="ion-ios-arrow-left" style=""></span>
                            @endif
                        </li>
                        @if(!Sentinel::guest())
                        <li style="display: inline-block;float: right;">
                            <a class="az-btn active" href="{!! url("/") !!}/{{$locale}}/logout" style="min-width: auto;margin-right: 0;">{{trans('words.Logout')}}</a>
                        </li>
                        @if($locale=='ar')
                        <span class="ion-ios-arrow-left" style=""></span>
                        @endif
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container" style=" margin-top: 2rem;">

        <div class="row">
            <div class="col s12 m12">
                <h5 class="az-title" style="font-weight: 800;">{{trans('words.Hello')}}, {!! $username !!}</h5>
                <div class="divider az-header-divider"></div>
                <h6 class="az-title-sub">{{trans('words.agent_first_paragraph')}}</h6>
                <p class="az-pcontent az-pright">{{trans('words.agent_second_paragraph')}}</p>                       
            </div>  
            <div class="col s12 m4 center-align">  
                <!--<img src="assets/images/agent-default.png" alt="" class="circle responsive-img prof-img"> -->
                <div class="col s12 edit-profile">
                    <h6><span class="ion-edit"></span> {{trans('words.edit profile')}}</h6>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col s12 m12">
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs" style="border-bottom: 1px solid #e9e9e9;">
                            <li class="tab col s4"><a href="#tab-projects" class="active"><h6>{{trans('words.Projects')}}</h6></a></li>
                            <li class="tab col s4"><a href="#tab-assets" id="tass"><h6>{{trans('words.Assets')}}</h6></a></li>
                            <li class="tab col s4"><a href="#tab-commisions"><h6>{{trans('words.Commissions')}}</h6></a></li>

                        </ul>
                    </div>

                    <!-- Projects -->
                    <div id="tab-projects" class="col s12">
                        <main class="cd-main-content">
                            <div class="cd-tab-filter-wrapper">
                                <div class="cd-tab-filter">
                                    <ul class="cd-filters">
                                        <li class="placeholder">
                                            <a class="" data-type="all" href="#0">{{trans('words.All Projects')}}</a>
                                        </li>
                                        <li class="filter"><a class="selected " href="#0" data-type="all">{{trans('words.All Projects')}}</a></li>
                                        @if(!empty($adatas))
                                        @foreach($adatas as $agent)
                                        <li class="filter" data-filter=".{!! $agent['path'] !!}"><a class="" href="#0" data-type="{!! $agent['path'] !!}">{!! $agent['title'] or '' !!}</a></li>
                                        @endforeach
                                        @endif
                                        
                                        <h6 class="hide-on-med-and-up" style="position: absolute;top: 10px;right: -10px;"><span class="ion-chevron-down"></span></h6>

                                    </ul>
                                    <!-- cd-filters -->
                                </div>
                                <!-- cd-tab-filter -->
                            </div>
                            <!-- cd-tab-filter-wrapper -->

                            <section class="cd-gallery" style="padding-bottom:0;">
                                <ul>
                                    @if(!empty($adatas))
                                    @foreach($adatas as $agent)
                                    @if(!empty($agent['results']))
                                    @foreach($agent['results'] as $res)
                                    <li class="mix {!! $res['path'] !!} col m3" style='height: 420px'>
                                        <div class="col s12 pro-holder">
                                            <div class="card col s12 p0">
                                                <img src="{{ $res['imagepath'] }}" class="responsive-img pro-image">
                                                <div class="col s12 title-holder">
                                                    <h5 style="font-size: 17px;text-transform: capitalize;font-weight: 600;text-align: left;">{!! $res['title_en'] !!}</h5>
                                                    <a class="d-asset" style="cursor:pointer" onclick="setassets({!! $res['id'] !!})">{{trans('words.Download Assets')}} <i class="icon ion-ios-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                    @endif
                                    @endforeach
                                    @endif	
                                    <li class="gap"></li>
                                    <li class="gap"></li>
                                    <li class="gap"></li>
                                </ul>
                                <div class="cd-fail-message">{{trans('words.No results found')}}</div>
                            </section>
                            <!-- cd-gallery -->
                        </main>
                    </div>
                    <!--  -->

                    <!-- Assets -->
                    <div id="tab-assets" class="col s12">
                        <div class="col s12 p0 book-now" style="margin: 35px 0px;">
                            <form method="post" name="getbrochers" action="downloaddata" />
                            <div class="col s12">
                                <h6 class="az-title-sub mb0">{{trans('words.Select your asset and download')}}</h6>
                                <p class="az-pcontent az-pright" style="margin-bottom: 2rem;">{{trans('words.asset_desc')}}</p>                       
                            </div>
                            <div class="col s12 m4">
                                <div class="input-field col s12" style="padding-left: 0;" >
                                    <select name="agentdash_project" id="agentdash_project">
                                        <option value="">{{trans('words.Select Project')}}</option>
                                        @if($all_properties)
                                        @foreach($all_properties as $allproperties)
                                        <option value="{!! $allproperties->id !!}">{!! $allproperties->title_en !!}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <label>{{trans('words.Select Project')}}</label>
                                </div>
                            </div>
                            <div class="col s12 m4">
                                <div class="input-field col s12" style="padding-left: 0;">
                                    <select name="agentdash_project_asset">
                                        <option value="" disabled selected>{{trans('words.Select your asset')}}</option>
                                        <option value="1">{{trans('words.Brochure')}}</option>
                                        <option value="2">{{trans('words.Floor Plans')}}</option>
                                        <option value="3">{{trans('words.Renders')}}</option>
                                    </select>
                                    <label>{{trans('words.Asset type')}}</label>
                                </div>
                            </div>
                            <div class="col s12 m4">
                                <div class="col s12 m4">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <input type="submit" name="bdownload" id="bdownload" value="{{trans('words.Download Now')}}" class="inquire az-btn active p0" style="margin-top: 15px;" />
                                    <!--<a class="inquire az-btn active p0" style="margin-top: 15px;">Download Now</a>-->
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!--  -->

                    <!-- Commisions -->
                    <div id="tab-commisions" class="col s12">
                        <div class="col s12 p0 book-now" style="margin: 35px 0px;">
                            <div class="col s12">
                                <h6 class="az-title-sub mb0">{{trans('words.Download commission structure')}}</h6>
                                <p class="az-pcontent az-pright" style="margin-bottom: 2rem;">{{trans('words.download_note')}}</p>                       
                            </div>
                            <div class="col s12 m4">
                                <div class="input-field col s12" style="padding-left: 0;">
                                    <select>
                                        <option value="" disabled selected>{{trans('words.Select Project')}}</option>
                                        <option value="Aster Serviced">{{trans('words.Aster Serviced')}}</option>
                                        <option value="Thoe Aliyah Serviced">{{trans('words.Thoe Aliyah Serviced')}}</option>
                                        <option value="Thoe Freesia Residence">{{trans('words.Thoe Freesia Residence')}}</option>
                                    </select>
                                    <label>{{trans('words.Select Project')}}</label>
                                </div>
                            </div>

                            <div class="col s12 m4">
                                <div class="col s12 m4">
                                    <a class="inquire az-btn active p0" style="margin-top: 15px;">{{trans('words.Download Now')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->

                </div>
            </div>
        </div>
    </div>
    <!-- End -->
</div>

</section>
<input type="hidden" name="assetval" id="assetval" value="0" />
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />
@stop
@section('footer_main_scripts')

<script type="text/javascript" src="{{asset('assets/galleryview/inc/mbGallery.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/galleryview/inc/jquery.exif.js')}}"></script>

@stop
@section('footer_scripts')
<script src="{{asset('assets/js/jquery.mixitup.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script>
                                                        /* AJAX */
                                                        function setassets(id)
                                                        {
                                                        $('ul.tabs').tabs('select_tab', 'tab-assets');
                                                        $('#agentdash_project').val(id);
                                                        $('#agentdash_project').material_select();
                                                        }

                                                        $(window).on('hashchange', function() {
                                                        if (window.location.hash) {
                                                        var page = window.location.hash.replace('#', '');
                                                        if (page == Number.NaN || page <= 0) {
                                                        return false;
                                                        } else{
                                                        getData(page);
                                                        }
                                                        }
                                                        });
                                                        function getData(page){
                                                        $.ajax(
                                                        {
                                                        //url: '?page=' + page,
                                                        url: '?page=' + page + "&from_date={{ $from_date }}&to_date={{ $to_date }}&keyword={{ $keyword }}&sort={{ $sort }}",
                                                                type: "get",
                                                                datatype: "html",
                                                                // beforeSend: function()
                                                                // {
                                                                //     you can show your loader 
                                                                // }
                                                        })
                                                                .done(function(data)
                                                                {
                                                                //console.log(data);

                                                                $("#eventd").empty().html(data);
                                                                location.hash = page;
                                                                })
                                                                .fail(function(jqXHR, ajaxOptions, thrownError)
                                                                {
                                                                alert('No response from server');
                                                                });
                                                        }
                                                        $('.cd-gallery').mixItUp();

</script>
@stop
