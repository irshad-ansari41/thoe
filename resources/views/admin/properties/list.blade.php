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
            <a href="add_property"><button type="button" class="btn btn-danger" style="margin-left: 30px;">Add New Property</button></a>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-advance table-hover" id="table">
                    <thead>
                        <tr class="filters">
                            <th>Photo</th>
                            <th>Property</th>
                            <th>Project</th>
                            <th width="150px;">Units</th>
                            <th width="200px;">Unit Gallery</th>
                            <th width="200px;">Floor Plan Gallery</th>
                            <th width="100px">Last Updated</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($properties as $prop)
                        
                        <?php //echo '<pre>'; print_r($prop->get_project_detail); echo '</pre>'; die; ?>
                        <tr>
                            <td>
                                <img src="{{ asset('assets/images/properties') }}/{{ $prop->get_project_detail->gallery_location or '' }}/{{ $prop->gallery_location or '' }}/{{$prop->holder_image }}" height="100" width="100"/>
                            </td>
                            <td>{!! $prop->title_en !!}</td>
                            <td>{{$prop->get_project_detail->title_en or '' }}</td>

                            <td>
                                @if($prop->get_unit)
                                @foreach($prop->get_unit as $unit)
                                <a href="units/{{ $unit->id }}/edit_units_detail"><span>{{ $unit->unit->title_en }}</span></a>,<br/>
                                @endforeach
                                @endif	
                            </td>
                            <td>
                                @if($prop->get_unit)
                                @foreach($prop->get_unit as $unit)
                                <a href="units/{{ $unit->id }}/addphotos"><span>{{ $unit->unit->title_en }} Gallery</span></a>,<br/>
                                @endforeach
                                @endif	
                            </td>
                            <td>
                                @if($prop->get_unit)
                                @foreach($prop->get_unit as $unit)
                                <a href="units/{{ $unit->id }}/addphotosfloorplan"><span>{{ $unit->unit->title_en }} Floor Plan Gallery</span></a>,<br/>
                                @endforeach
                                @endif	
                            </td>
                            <td>{{ date('j M Y',strtotime($prop->updated_at)) }}</td>
                            <td>
                                <a href="{!! $prop->id !!}/edit_property"><i class="fa fa-edit"></i></a>

                                <a href="{!! $prop->id !!}/delete" onclick="return confirm('Are you sure you want to delete this property?');" >
                                    <i class="fa fa-trash"></i></a>

                                @if($prop->status=='0')
                                <a href="{!! $prop->id !!}/status_property/1">		
                                    <i class="fa fa-lock"></i>
                                </a>
                                @else
                                <a href="{!! $prop->id !!}/status_property/0">		
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
@stop