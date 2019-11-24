@extends('admin/layouts/default')

{{-- Web site Title --}}
@section('title')
@lang('presscategory/title.management')
@parent
@stop
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- Content --}}
@section('content')
<section class="content-header">
    <h1>Press Category Management</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                @lang('general.dashboard')
            </a>
        </li>
        <li>@lang('presscategory/title.categories')</li>
        <li class="active">@lang('presscategory/title.categories')</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left"> <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Press Category List
                    </h4>
                    <div class="pull-right">
                        <a href="{{ URL::to('admin/presscategory/create') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    </div>
                </div>
                <br />
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Blogs</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($pressscategories))
                            @foreach ($pressscategories as $bcategory)
                            <tr>
                                <td>{{{ $bcategory->id }}}</td>
                                <td>{{{ $bcategory->title }}}</td>
                                <td>{{{ $bcategory->press()->count() }}}</td>
                                <td>{{{ $bcategory->created_at->diffForHumans() }}}</td>
                                <td>
                                    <a href="{{{ URL::to('admin/presscategory/' . $bcategory->id . '/edit' ) }}}"><i
                                            class="livicon" data-name="edit" data-size="18" data-loop="true"
                                            data-c="#428BCA" data-hc="#428BCA"
                                            title="Update"></i></a>

                                    @if($bcategory->press()->count())
                                    <a href="#" data-toggle="modal" data-target="#presscategory_exists" data-name="{!! $bcategory->title !!}" class="presscategory_exists">
                                        <i class="livicon" data-name="warning-alt" data-size="18"
                                           data-loop="true" data-c="#f56954" data-hc="#f56954"
                                           title="@lang('presscategory/form.presscategoryexists')"></i>
                                    </a>
                                    @else
                                    <a href="{{ route('admin.presscategory.confirm-delete', $bcategory->id) }}" data-toggle="modal" data-target="#delete_confirm">
                                        <i class="livicon" data-name="remove-alt" data-size="18"
                                           data-loop="true" data-c="#f56954" data-hc="#f56954"
                                           title="@lang('presscategory/form.deletepresscategory')"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    <!-- row-->
</section>

@stop
{{-- Body Bottom confirm modal --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>

<script>
$(document).ready(function () {
    $('#table').DataTable();
});
</script>
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="presscategory_delete_confirm_title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>
<div class="modal fade" id="presscategory_exists" tabindex="-2" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                @lang('presscategory/message.presscategory_have_blog')
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });
    });
    $(document).on("click", ".presscategory_exists", function () {

        var group_name = $(this).data('name');
        $(".modal-header h4").text(group_name + " blog category");
    });</script>
@stop
