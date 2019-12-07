@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
@lang('invest/title.investlist')
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
    <h1>@lang('invest/title.invests')</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                @lang('general.dashboard')
            </a>
        </li>
        <li>@lang('invest/title.invest')</li>
        <li class="active">@lang('invest/title.invests')</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    @lang('invest/title.investlist')
                </h4>
                <div class="pull-right">
                    <a href="{{ URL::to('admin/invest/create') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                </div>
            </div>
            <br />
            <div class="panel-body">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr class="filters">
                            <th>@lang('invest/table.id')</th>
                            <th>@lang('invest/table.title')</th>
                            <th>@lang('invest/table.created_at')</th>
                            <th>@lang('invest/table.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($invests))
                        @foreach ($invests as $invest)
                        <tr>
                            <td>{{ $invest->id }}</td>
                            <td>{{ $invest->title_en }}</td>
                            <td><?php  //$invest->created_at->diffForHumans() ?></td>
                            <td>
                                <a href="{{ URL::to('admin/invest/' . $invest->id . '/show' ) }}"><i class="livicon"
                                                                                                   data-name="info"
                                                                                                   data-size="18"
                                                                                                   data-loop="true"
                                                                                                   data-c="#428BCA"
                                                                                                   data-hc="#428BCA"
                                                                                                   title="@lang('invest/table.view-invest-comment')"></i></a>
                                <a href="{{ URL::to('admin/invest/' . $invest->id . '/edit' ) }}"><i class="livicon"
                                                                                                   data-name="edit"
                                                                                                   data-size="18"
                                                                                                   data-loop="true"
                                                                                                   data-c="#428BCA"
                                                                                                   data-hc="#428BCA"
                                                                                                   title="@lang('invest/table.update-invest')"></i></a>
                                <!--                                    <a href="{{ URL::to('admin/invest/' . $invest->id . '/confirm-delete') }}" data-toggle="modal"
                                                                       data-target="#delete_confirm"><i class="livicon" data-name="remove-alt"
                                                                                                        data-size="18" data-loop="true" data-c="#f56954"
                                                                                                        data-hc="#f56954"
                                                                                                        title="@lang('invest/table.delete-invest')"></i></a>-->
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>    <!-- row-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>

<script>
$(document).ready(function () {
    $('#table').DataTable();
});
</script>

<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>
<script>
    $(function () {
        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });
    });
</script>
@stop