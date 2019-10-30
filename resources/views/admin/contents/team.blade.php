@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Team Member List
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
    <h1>AZIZI Teams</h1>
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
                <h4 class="panel-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Teams
                </h4>
            </div>
            <br />
            <a href="{{ URL::to('admin/content/createteam') }}"><button type="button" class="btn btn-danger" style="margin-left: 30px;">Add New Team</button></a>
            <div class="panel-body">
                <table class="table table-bordered " id="table">
                    <thead>
                        <tr class="filters">
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <!--<th>Tags</th>
                            <th>Add Team Members</th>-->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teams as $content)
                        <tr>
                            <td>@if($content->image!="")<img src="<?= url('/') ?>/assets/images/team/{{ $content->image }}" width="100" height="100" style=" max-height:none;">@endif</td>
                            <td>{!! $content->name !!}</td>
                            <td>{!! $content->designation !!}</td>
                            <!--<td>{!! $content->tag1 !!} {!! $content->tag2 !!} {!! $content->tag3 !!} {!! $content->tag4 !!}{!! $content->tag5 !!}</td>
                            <td><a href="team/{!! $content->id !!}/addteam_member">Add team members under {!! $content->name !!}</a></td>-->
                            <td>
                                <a href="team/{!! $content->id !!}/edit"><i class="livicon" data-name="edit"
                                                                            data-size="18" data-loop="true"
                                                                            data-c="#428BCA"
                                                                            data-hc="#428BCA"
                                                                            title="update team"></i></a>

                                <a href="team/{!! $content->id !!}/delete_timeline" onclick="return confirm('Are you sure you want to delete this team member?');">
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i></a>

                                @if($content->status=='0')
                                <a href="{!! $content->id !!}/status_p/1">		
                                    <i class="fa fa-lock"></i>
                                </a>
                                @else
                                <a href="{!! $content->id !!}/status_p/0">		
                                    <i class="fa fa-unlock"></i>
                                </a>
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
                                        $('#table').DataTable({
                                            "ordering": false
                                        });
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