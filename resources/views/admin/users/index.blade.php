@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Users List
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
    <h1>Users</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Users</a></li>
        <li class="active">Users List</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Users List ({{$count}})
                </h4>
                <div class="pull-right">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-default">Reset</a>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-default">Add New User</a>
                </div>
            </div>
            <br />
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        $get = filter_input_array(INPUT_GET);
                        ?>
                        <form id="filters">
                            <div class="well well-sm">
                                <div class="row">
                                    <div class="col-lg-1">
                                        <label><input type="checkbox" name="not" value=1 onchange="this.form.submit()" {{!empty($get['not'])&&$get['not']=='1'?'checked':''}}> !(Not) </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="search" id="search"  placeholder="Search Users ..." id="property-search-input" autofocus="true" class="form-control" name="str" value="{{!empty($get['str'])?$get['str']:''}}">
                                    </div>
                                    <div class="col-lg-2">
                                        <select name="role" class="form-control" onchange="this.form.submit()">
                                            <option value="">----Select Role----</option>
                                            <option value="1" {{!empty($get['role'])&&$get['role']=='1'?'selected':''}}>Admin</option>
                                            <option value="4" {{!empty($get['role'])&&$get['role']=='4'?'selected':''}}>Super Admin</option>
                                            <option value="2" {{!empty($get['role'])&&$get['role']=='2'?'selected':''}}>User</option>
                                            <option value="3" {{!empty($get['role'])&&$get['role']=='3'?'selected':''}}>Property Admin</option>
                                            <option value="5" {{!empty($get['role'])&&$get['role']=='5'?'selected':''}}>Property Consultant</option>
                                            <option value="6" {{!empty($get['role'])&&$get['role']=='6'?'selected':''}}>Airport</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <select name="status" class="form-control"  onchange="this.form.submit()">
                                            <option value="">----Select----</option>
                                            <option value="1" {{!empty($get['status'])&&$get['status']=='1'?'selected':''}}>Activated</option>
                                            <option value="0" {{isset($get['status'])&&$get['status']=='0'?'selected':''}}>Pending</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <select name="sb" class="form-control"  onchange="this.form.submit()">
                                            <option value="">----Sort By----</option>
                                            <option value="created_at" {{!empty($get['sb'])&&$get['sb']=='created_at'?'selected':''}}>Created At</option>
                                            <option value="updated_at" {{!empty($get['sb'])&&$get['sb']=='updated_at'?'selected':''}}>Last Updated</option>
                                            <option value="last_login" {{!empty($get['sb'])&&$get['sb']=='last_login'?'selected':''}}>Last Login</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <select name="st" class="form-control"  onchange="this.form.submit()">
                                            <option value="">----Sort Type----</option>
                                            <option value="asc" {{!empty($get['st'])&&$get['st']=='asc'?'selected':''}}>Acending</option>
                                            <option value="desc" {{!empty($get['st'])&&$get['st']=='desc'?'selected':''}}>Decending</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-1">
                                        <input type="submit" value="Submit" class="btn btn-primary">
                                    </div>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <table class="table table-responsive" id="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>E-mail</th>
                            <th>Phone & PWD</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Last Login</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($users as $user)
                        <tr>
                            <td><a href="{{ route('admin.users.edit', $user->id) }}">{!! $user->id !!}</a></td>
                            <td>{!! $user->first_name !!}</td>
                            <td>{!! $user->last_name !!}</td>
                            <td>{!! $user->email !!}<br/>{!! $user->p_email !!}</td>
                            <td>
                                {!! $user->country_code !!}-{!! $user->phone !!}<br/>Pwd - {!! $user->pwd !!}<br/>
                                <a href="https://api.whatsapp.com/send?phone={{ $user->country_code}}{{ $user->phone}}&text=Hi {{$user->first_name}}, Your Azizi Availability List account is active now. Please try to login." target="_blank">Send WhatsApp</a>
                            </td>
                            <td>{!!$user->role!!}</td>
                            <td>{!! $user->status=='1'?"<span class='activeItem'>Active</span>":"<span class='inactiveItem'>Inactive</span>" !!}</td>
                            <td>{{  \Carbon\Carbon::createFromTimeStamp(strtotime($user->created_at))->diffForHumans() }}</td>
                            <td>{{  \Carbon\Carbon::createFromTimeStamp(strtotime($user->last_login))->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('admin.users.show', $user->id) }}" style="color:black">
                                    <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view availabilityList"></i>View
                                </a>&nbsp;|&nbsp;
                                <a href="{{ route('admin.users.edit', $user->id) }}" target="_blank">
                                    <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit availabilityList"></i>Edit
                                </a>&nbsp;|&nbsp;
                                <a href="{{ route('admin.users.confirm-delete', $user->id) }}" data-toggle="modal" data-target="#delete_confirm" style="color:red">
                                    <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete availabilityList"></i>Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->appends([
  'str' => !empty($get['str'])?$get['str']:'',
  'not' => !empty($get['not'])?$get['not']:'',
  'role' => !empty($get['role'])?$get['role']:'',
  'status' => !empty($get['status'])?$get['status']:'',
  'sb' => !empty($get['sb'])?$get['sb']:'',
  'st' => !empty($get['st'])?$get['st']:'',
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
                                                $('#sendEmail').change(function () {
                                                    if (confirm("Are you sure you want to send email.") === true) {
                                                        window.location = $(this).val();
                                                    }
                                                });
//                                                $('#search').on('keyup keypress blur', function () {
//                                                    if ($(this).val() !== '') {
//                                                        setTimeout(function () {
//                                                            $('#filters').submit();
//                                                        }, 10000);
//                                                    }
//                                                });
                                            });

</script>
@stop
