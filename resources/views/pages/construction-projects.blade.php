@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<!-- Chart -->
<link rel="stylesheet" href="{{asset('assets/chart/css/jquery.circliful.css')}}">
<!-- end -->
<!-- Slide show gallery -->
<link href="{{asset('assets/gallery-slideshow/css/jquery.desoslide.min.css')}}" rel="stylesheet">
<!-- End -->

<!-- Gallery preview -->
<style>
.wrapper {
	position: relative;
	font-family: Arial, Helvetica, sans-serif;
	padding-top: 90px;
	padding-left: 50px;
	width: 80%;
	margin: auto
}

.galleryCont {
	display: none;
}

.wrapper .text {
	font-family: Arial, Helvetica, sans-serif;
}

.wrapper h1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 26px;
}

.longText {
	margin-top: 20px;
	width: 600px;
	font: 18px/24px Arial, Helvetica, sans-serif;
	color: gray;
}

span.btn {
	padding: 10px;
	display: inline-block;
	cursor: pointer;
	font: 12px/14px Arial, Helvetica, sans-serif;
	color: #aaa;
	background-color: #eee;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	-moz-box-shadow: #999 2px 0px 3px;
	-webkit-box-shadow: #999 2px 0px 3px;
}

span.btn:hover {
	background-color: #000;
}

.mbGall_white.galleryScreen {
	/* overflow: hidden; */
	position: fixed;
	background: #fff;
	-moz-border-radius: 8px;
	-webkit-border-radius: 8px;
	-moz-box-shadow: #666 2px 2px 6px;
	-webkit-box-shadow: #666 2px 2px 6px;
	z-index: 9999;
}

.mb_overlay {
	z-index: 9999;
}

.mbGall_white .galleryTitle {
	height: 45px !important;
}

.mbGall_white .galleryTitle {
	font-weight: 400 !important;
	font-family: inherit !important;
}
 .side-nav li>a {
    color: rgba(255, 255, 255, 0.87);
  }

  .az-menu .icon {
    font-size: 45px;
    height: auto;
    line-height: normal;
    padding-top: 15px;
    color: #424242;
}
nav ul a {
    color: #656565;
}

.indicators{
  display: none;
}

.slider .slides {
    height: 510px !important;
}
.modal-overlay {
    opacity: 0.9 !important;
    z-index: 99 !important;
}
</style>
<!-- End -->
@stop

@section('main_div_wrapper')

@stop
@section('section_content')
  <!-- Projects -->
    <section class="az-section">



         <div class="container">
            <div class="parallax-container valign-wrapper">
              <div class="parallax">
                
				@if($project->construction_header_image!="")
					<img alt="{!! trim($project->construction_alt) !!}" src="{{ asset('assets/images/projects/') }}/{{ $project->construction_header_image }}" style="top: -5em;">
				@endif
              </div>
             
            </div>
            <div class="">
            <div class="row m0">
                    <div class="col s12 p0">
                        <ul>
                            <li>
                                @if(Session::get('lang')=='en')
                                    <span class="ion-ios-arrow-left" style=""></span>
                                    @endif

                                    @if(Session::get('lang')=='en')
                                    <a href="#" style="color: #5a5a5a;text-transform: capitalize;font-size: 14px;letter-spacing: 1px;font-weight: 100;text-shadow: 0px 0px 0px;">{{trans('words.home')}} / </a>
                                    <a href="{!! url("/") !!}/construction-updates" style="color: #5a5a5a;text-transform: capitalize;font-size: 14px;letter-spacing: 1px;font-weight: 100;text-shadow: 0px 0px 0px;">{{trans('words.Construction Updates')}} / </a>
                                    <a style="font-weight: 600;">{!! $project_t !!}</a>
                                    @elseif(Session::get('lang')=='cn')
                                    

                                        <a href="#" style="color: #5a5a5a;text-transform: capitalize;font-size: 14px;letter-spacing: 1px;font-weight: 100;text-shadow: 0px 0px 0px;">主页 / </a>
                                        <a href="{!! url("/") !!}/construction-updates" style="color: #5a5a5a;text-transform: capitalize;font-size: 14px;letter-spacing: 1px;font-weight: 100;text-shadow: 0px 0px 0px;">施工进展 / </a>
                                        <a style="font-weight: 600;">{!! $project_t !!}</a>
                                    @elseif(Session::get('lang')=='ar')
                                    <a href="#" style="color: #5a5a5a;text-transform: capitalize;font-size: 14px;letter-spacing: 1px;font-weight: 100;text-shadow: 0px 0px 0px;">{{trans('words.home')}} / </a>
                                    <a href="{!! url("/") !!}/construction-updates" style="color: #5a5a5a;text-transform: capitalize;font-size: 14px;letter-spacing: 1px;font-weight: 100;text-shadow: 0px 0px 0px;">{{trans('words.Construction Updates')}} / </a>
                                    <a style="font-weight: 600;">{!! $project_t !!}</a>
                                    @endif

                                
                                @if(Session::get('lang')=='ar')
                                <span class="ion-ios-arrow-left" style=""></span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>








      

         <div class="container" style="margin-top: 2em;">


          <div class="row">
            <div class="col s12">

             <h5 class="az-title" style="font-weight: 800;">
                @if(Session::get('lang')=='en')
                {{ $project->title_en }} {{trans('words.Projects')}}
                @elseif(Session::get('lang')=='ar')
               مشاريع {{ $project->title_ar }} 
                @elseif(Session::get('lang')=='ch')
                {{ $project->title_ch }} {{trans('words.Projects')}}
                @endif
                </h5>
                <div class="divider az-header-divider"></div>
			
            </div>              
          </div>




          <div class="row" style="margin-bottom: 5em;">                       
			
			@if($properties)
				@foreach($properties as $prop)
			
				<div class="col m3">
					  <div class="col s12 card p0">
              <a href="{{ url("/") }}/{{Session::get('lang')}}/{{ $prop['slug_updates'] }}">
						  <img alt="{{ trim($prop['alt']) }}" src="{{ $prop['imagepath'] }}" class="responsive-img" style="width: 100%;">
						 <h6 class="" style="padding: 0px 20px;">{{ $prop['title'] }}</h6>
             </a>
						  

						  <div class="col s12 center-align">
							  <a href="{{ url("/") }}/{{Session::get('lang')}}/{{ $prop['slug_updates'] }}" class="inquire az-btn pro-status" style="min-width: 5rem;margin-left: 0;margin-top: 1em;font-size: 12px;    margin-bottom: 2em;">{{trans('words.View Status')}}</a>
						  </div>
					  </div>
				  </div>	
				@endforeach	
			@endif

          </div>
       
          
          </div>

</section>
        <!-- End -->
@stop
@section('footer_main_scripts')


@stop
@section('footer_scripts')
<!-- Gallery -->
	<script type="text/javascript" src="{{asset('assets/galleryview/inc/mbGallery.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/galleryview/inc/jquery.exif.js')}}"></script>
<!-- end -->
<!-- Chart -->
<script src="{{asset('assets/chart/js/jquery.circliful.js')}}"></script>
<script>
    $( document ).ready(function() { 
      $('.pro-status').click(function(){
        $('.progress-circle-structure').empty();
        $('.progress-circle-structure').circliful({
            animation: 1,
            animationStep: 5,
            foregroundBorderWidth: 15,
            backgroundBorderWidth: 15,
            percent: 69,
            textSize: 28,
            textStyle: 'font-size: 12px;',
            textColor: '#666',
        });
        $('.progress-circle-mep').empty();
        $('.progress-circle-mep').circliful({
            animation: 1,
            animationStep: 5,
            foregroundBorderWidth: 15,
            backgroundBorderWidth: 15,
            percent: 38,
            textSize: 28,
            textStyle: 'font-size: 12px;',
            textColor: '#666',
        });
        $('.progress-circle-finishes').empty();
        $('.progress-circle-finishes').circliful({
            animation: 1,
            animationStep: 5,
            foregroundBorderWidth: 15,
            backgroundBorderWidth: 15,
            percent: 26,
            textSize: 28,
            textStyle: 'font-size: 12px;',
            textColor: '#666',
        });
        $('.progress-circle-overall').empty();
        $('.progress-circle-overall').circliful({
            animation: 1,
            animationStep: 5,
            foregroundBorderWidth: 15,
            backgroundBorderWidth: 15,
            percent: 50,
            textSize: 28,
            textStyle: 'font-size: 12px;',
            textColor: '#666',
        });
      });        
    });
</script>
<!-- End -->
<script>
$(document).ready(function(){
  $('.slider').slider();
});
</script>
@stop
