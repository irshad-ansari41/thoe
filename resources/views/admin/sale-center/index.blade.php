@extends('admin./layouts/default')

@section('title')
Sale Center
@parent

@push('styles')
/*.table>thead>tr>th,.table>tbody>tr>td {
padding: 2px;
font-size: 12px;
}*/
@endpush

@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <h1>Sale Center</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Sale Center</li>
        <li class="active">Sale Center List</li>
    </ol>
</section>

<div class="row">
    @if($type=='locations')
    <div class="col-sm-12">
        <section class="content paddingleft_right15">
            <div class="row">
                @include('flash::message')
                <div class="panel panel-primary ">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Location List [{{count($locations)}}]
                        </h4>
                    </div>
                    <br />
                    <div class="panel-body table-responsive">
                        @include('admin.sale-center.table-location')
                    </div>
                </div>
            </div>
        </section>
    </div>
    @elseif($type=='communities')
    <div class="col-sm-12">
        <section class="content paddingleft_right15">
            <div class="row">
                @include('flash::message')
                <div class="panel panel-primary ">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Community List [{{count($communities)}}]
                        </h4>
                    </div>
                    <br />
                    <div class="panel-body table-responsive">
                        @include('admin.sale-center.table-community')
                    </div>
                </div>
            </div>
        </section>
    </div>
    @elseif($type=='properties')
    <div class="col-sm-12">
        <section class="content paddingleft_right15">
            <div class="row">
                @include('flash::message')
                <div class="panel panel-primary ">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Property List [{{$count}}]
                        </h4>
                    </div>
                    <br />
                    <div class="panel-body table-responsive">
                        @include('admin.sale-center.table-property')
                    </div>
                </div>
            </div>
        </section>
    </div>
    @elseif($type=='units')
    <div class="col-sm-12">
        @include('flash::message')
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Unit List [{{$count}}]
                </h4>
                <div class="pull-right">
                    <a class="btn btn-sm btn-default" href="{{route('admin.get-units')}}">Get Units From CRM</a>
                    <a class="btn btn-sm btn-default" href="http://thoe.com/read-json/index.php">Sync Units</a>
                    <a class="btn btn-sm btn-default" href="{{route('admin.sale-center.wishlist')}}">Wish List</a>
                </div>
            </div>
            <br />
            <div class="panel-body table-responsive">
                @include('admin.sale-center.table-unit')
            </div>
        </div>
    </div>
    @endif
</div>

@stop


{{-- page level scripts --}}
@section('footer_scripts')


<script>
    jQuery(document).ready(function () {
        $('#checkAll').click(function () {
            $(':checkbox.checkItem').prop('checked', this.checked);
        });
    });
</script>
@stop
