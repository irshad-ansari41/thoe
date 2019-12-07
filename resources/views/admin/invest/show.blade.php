@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('invest/title.investdetail')
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" href="{{ asset('assets/css/pages/invest.css') }}" />
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <!--section starts-->
    <h1>{!! $invest->title!!}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i>
                @lang('general.dashboard')
            </a>
        </li>
        <li> @lang('invest/title.invest')</li>
        <li class="active">@lang('invest/title.investdetail')</li>
    </ol>
</section>
<!--section ends-->
<section class="content">
    <!--main content-->
    <div class="row">
        <div class="col-sm-11 col-md-12 col-full-width-right">
            <div class="invest-detail-image">
                @if(!empty($invest->image))
                <img src="{{URL::to('uploads/invest/'.$invest->image)}}" class="img-responsive" alt="Image">
                @else
                <img data-src="holder.js/791x380/#6cc66c:#fff" class="img-responsive" alt="Image">
                @endif
                </div>
            <!-- /.invest-detail-image -->
            <div class="the-box no-border invest-detail-content">
                <p>
                    <span class="label label-danger square">{!! $invest->created_at!!}</span>
                </p>
                <p class="text-justify">
                {!! $invest->content !!}
                </p>
                <p><strong>Tags:</strong> {!! $invest->tagList !!}</p>
                <hr>
                    <p>
                        <span class="label label-success square">@lang('invest/title.comments')</span>
                    </p>
                    @if(!empty($comments))
                        <ul class="media-list media-sm media-dotted recent-post">
                            @foreach($comments as $comment)
                                <li class="media">
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="{!! $comment->website !!}">{!! $comment->name !!}</a>
                                        </h4>
                                        <p>
                                            {!! $comment->comment!!}
                                        </p>
                                        <p class="text-danger">
                                            <small> {!! $comment->created_at!!}</small>
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                <hr>
                <p>
                    <span class="label label-info square">@lang('invest/title.leavecomment')</span>
                </p>
                 {!! Form::open(array('url' => URL::to('admin/invest/'.$invest->id.'/storecomment'), 'method' => 'post', 'class' => 'bf', 'files'=> true)) !!}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    {!! Form::text('name', null, array('class' => 'form-control input-lg','required' => 'required', 'placeholder'=>trans('invest/form.ph-name'))) !!}
                    <span class="help-block">{{ $errors->first('name', ':message') }}</span>
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    {!! Form::text('email', null, array('class' => 'form-control input-lg','required' => 'required', 'placeholder'=>trans('invest/form.ph-email'))) !!}
                    <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                </div>
                <div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
                    {!! Form::text('website', null, array('class' => 'form-control input-lg', 'placeholder'=>trans('invest/form.ph-website'))) !!}
                        <span class="help-block">{{ $errors->first('website', ':message') }}</span>
                </div>
                <div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
                    {!! Form::textarea('comment', null, array('class' => 'form-control input-lg no-resize','required' => 'required', 'style'=>'height: 200px', 'placeholder'=>trans('invest/form.ph-comment'))) !!}
                    <span class="help-block">{{ $errors->first('comment', ':message') }}</span>
                </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-md"><i class="fa fa-comment"></i>
                            @lang('invest/form.save-comment')
                        </button>
                    </div>
                {!! Form::close() !!}
            </div>
            <!-- /the.box .no-border --> </div>
        <!-- /.col-sm-9 --></div>
    <!--main content ends-->
</section>
@stop