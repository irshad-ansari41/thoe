



@extends('admin/layouts/default')

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

    <div class="col-sm-12">
        <section class="content paddingleft_right15">
            <div class="row">
                <div class="panel panel-primary ">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Community List [{{count($communities)}}]
                        </h4>
                    </div>
                    <br />
                    <div class="panel-body table-responsive">
                        <table class="table table-responsive" id="amenities-table">
                            <thead>
                                <tr>
                                    <th>CommunityID</th>
                                    <th>LocationID</th>
                                    <th>LocationName</th>
                                    <th>CommunityName</th>
                                    <th>Status</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($communities as $community)
                                <tr>
                                    <td>{!! $community->CommunityID !!}</td>
                                    <td>{!! $community->LocationID !!}</td>
                                    <td>{!! $community->LocationName !!}</td>
                                    <td>{!! $community->CommunityName !!}</td>
                                    <td>{!! $community->status !!}</td>
                                    <td>
                                        <a href="{{ route('admin.sale-center.communities.edit', [$community->id]) }}">
                                            <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit amenity"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

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

