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
    <h1>About Us</h1>
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
                    Timeline
					&nbsp;
                </h4>
            </div>
            <br />
			<a href="{{ URL::to('admin/content/createtimeline') }}"><button type="button" class="btn btn-danger" style="margin-left: 30px;">Add new timeline</button></a>
            <div class="panel-body">
                <table class="table table-bordered " id="table">
                    <thead>
                        <tr class="filters">
                            <th>Year</th>
							<th>Title</th>
							<th>Status</th>
							<th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($timelines as $content)
                    	<tr>
                            <td>{!! $content->year !!}</td>
							<td>{!! $content->title_en !!}</td>
							<td>
								@if($content->status=='0')
									Inactive
								@else
									Active
								@endif
							</td>
                    		<td>
								<a href="timeline/{!! $content->id !!}/edit"><i class="livicon" data-name="edit"
																					data-size="18" data-loop="true"
																					data-c="#428BCA"
																					data-hc="#428BCA"
																					title="update user"></i></a>
							
								<a href="timeline/{!! $content->id !!}/delete_timeline" onclick="return confirm('Are you sure you want to delete this timeline?');">
								<i class="glyphicon glyphicon-remove removepanel clickable"></i></a>
								
								@if($content->status=='0')
								 <a href="{!! $content->id !!}/contentstatus/1">  
								  <i class="fa fa-lock"></i>
								 </a>
								@else
								 <a href="{!! $content->id !!}/contentstatus/0">  
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
$(document).ready(function() {
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