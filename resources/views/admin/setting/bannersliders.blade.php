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
    <h1>Website Management</h1>
</section>

<?php
$get = filter_input_array(INPUT_GET);
?>

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
                Banner Slider
                <a href="0/add_banner" class="pull-right"><button type="button" class="btn btn-danger" style="margin-left: 30px;">Add New Banner</button></a>
            </div>
            <br />

            <form>
                <table>
                    <tr>
                        <td><input type="text" name="str" class="form-control" value="<?= !empty($get['str'])?$get['str']:'' ?>"></td>
                        <td><input type="submit" class="btn btn-success"></td>
                    </tr>
                </table>
            </form>

            <div class="panel-body">
                <table class="table table-striped table-bordered table-advance table-hover" id="table">
                    <thead>
                        <tr class="filters">
                            <th>Banner Photo</th>
                            <th>Banner Title</th>
                            <th>Short Description</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bannersliders as $bannerslider)

                        <tr>
                            <td>@if($bannerslider->banner_image!='' && $bannerslider->type=="1")<img src="{{asset('assets/images/home_banners')}}/{!! $bannerslider->banner_image !!}" height="60" width="60" />@endif</td>
                            <td>{!! $bannerslider->banner_title_en !!}</td>
                            <td>{!! $bannerslider->banner_short_description_en !!}</td>
                            </td>
                            <td>{!! $bannerslider->created_on !!}</td>
                            <td>
                                @if($bannerslider->status=='0')
                                Inactive
                                @else
                                Active
                                @endif
                            </td>
                            <td>
                                <a href="{!! $bannerslider->id !!}/add_banner"><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Banner"></i></a>
                                <a href="{!! $bannerslider->id !!}/deleteh" onclick="return confirm('Are you sure you want to delete this banner?');" >
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i></a>
                                @if($bannerslider->status=='0')
                                <a href="{!! $bannerslider->id !!}/bannerstatus/1">  
                                    <i class="fa fa-lock"></i>
                                </a>
                                @else
                                <a href="{!! $bannerslider->id !!}/bannerstatus/0">  
                                    <i class="fa fa-unlock"></i>
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $bannersliders->appends([
  'str' => !empty($get['str'])?$get['str']:'',
  ])->links() }}
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
//                                        $('#table').DataTable({
//                                            "ordering": false
//                                        });
                                    });
</script>
@stop