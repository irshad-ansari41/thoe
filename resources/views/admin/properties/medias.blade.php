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
                Construction Gallery
            </div>
            <br />
			<a href="add_media"><button type="button" class="btn btn-danger" style="margin-left: 30px;">Add Photo</button></a>
			
            <div class="panel-body">
                <table class="table table-striped table-bordered table-advance table-hover" id="table">
                    <thead>
                        <tr class="filters">
							<th>Property</th>
							<th>Status</th>
							<th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($response as $res)
                    	<tr>
							<td>{!! $res['title'] !!}</td>
							<td>
								@if($res['status']==1)
									Active
								@else
									Inactive
								@endif
							</td>
							<td>
								<a href="medias/{!! $res['prop_id'] !!}/edit"><i class="fa fa-edit"></i></a>
							
								<a href="medias/{!! $res['prop_id'] !!}/delete" onclick="return confirm('Are you sure you want to delete this record?');" >
								<i class="fa fa-trash"></i></a>
								
								@if($res['status']=='0')
									<a href="{!! $res['prop_id'] !!}/statusc/1">		
										<i class="fa fa-lock"></i>
									</a>
								@else
									<a href="{!! $res['prop_id'] !!}/statusc/0">		
										<i class="fa fa-unlock"></i>
									</a>
								@endif
								<a href="medias/{!! $res['prop_id'] !!}/addcaption">Add Captions</a>
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
	$('#table').DataTable();
});
</script>
@stop