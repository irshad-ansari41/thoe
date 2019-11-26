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
                Construction Update
            </div>
            <br />


            <div class="panel-body">
                <table class="table table-striped table-bordered table-advance table-hover" id="table">
                    <thead>
                        <tr class="filters">
                            <th>Property</th>
                            <th>GROUND WORK</th>
                            <th>STRUCTURE</th>
                            <th>SERVICES & FINISHING</th>
                            <!--th>Total completion percentage</th-->
                            <th>Plan start date</th>
                            <th>Plan end date</th>
                            <th>NCF</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $res)
                        <tr>
                            <td>{!! $res['title_en'] !!}</td>
                            <td>{!! $res['structure_percentage'] !!} %</td>
                            <td>{!! $res['mep_percentage'] !!} %</td>
                            <td>{!! $res['finishes_percentage'] !!} %</td>
                            <!--td>{!! $res['total_completion'] !!} %</td-->
                            <td>{!! $res['plan_start_date'] !!}</td>
                            <td>{!! $res['plan_end_date'] !!}</td>
                            <td>{!! $res['nfcstatus'] !!}</td>
                            <td>
                                <a href="construction/{!! $res['id'] !!}/edit"><i class="fa fa-edit"></i></a>


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