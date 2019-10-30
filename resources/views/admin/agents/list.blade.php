@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Content List
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Property Management</h1>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
        @endforeach
    </div>
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                Properties
            </div>
            <br />

            <div class="panel-body">
                <table class="table table-striped table-bordered table-advance table-hover" id="table">
                    <thead>
                        <tr class="filters">
                            <th>Project Area</th>
                            <th>Property</th>
                            <th>Location</th>
                            <th>Total Unit</th>
                            <th>Total Aminities</th>
                            <th>Property Type</th>
                            <th>Total Apartment</th>
                            <th>Building Hieght</th>
                            <th>Featured</th>
                            <th>Recent</th>
                            <th>Completed</th>
                            <th>Ongoing</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($properties as $prop)
                        <tr>
                            <td>{!! $prop->get_project_detail->title_en !!}</td>
                            <td>{!! $prop->title_en !!}</td>
                            <td>{!! $prop->location !!}</td>
                            <td>
                                @if($prop->get_unit)
                                @foreach($prop->get_unit as $unit)
                                <span>{{ $unit->unit->title_en }}</span>,
                                @endforeach
                                @endif	
                            </td>
                            <td>
                                @if($prop->get_aminities)
                                @foreach($prop->get_aminities as $amin1)
                                <span>{{ $amin1->amin->title_en }}</span>,
                                @endforeach
                                @endif	
                            </td>
                            <td>{!! $prop->property_type !!}</td>
                            <td>{!! $prop->total_apartment !!}</td>
                            <td>{!! $prop->building_height !!}</td>
                            <td>
                                @if($prop->featured=='1')
                                <span class="label label-sm label-success">Yes</span>
                                @else
                                <span class="label label-sm label-danger">No</span>
                                @endif
                            </td>
                            <td>
                                @if($prop->recent=='1')
                                <span class="label label-sm label-success">Yes</span>
                                @else
                                <span class="label label-sm label-danger">No</span>
                                @endif
                            </td>
                            <td>
                                @if($prop->completed=='1')
                                <span class="label label-sm label-success">Yes</span>
                                @else
                                <span class="label label-sm label-danger">No</span>
                                @endif
                            </td>
                            <td>
                                @if($prop->ongoing=='1')
                                <span class="label label-sm label-success">Yes</span>
                                @else
                                <span class="label label-sm label-danger">No</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>    <!-- row-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>

<script>
$(document).ready(function () {
    $('#table').DataTable();
});
</script>
@stop