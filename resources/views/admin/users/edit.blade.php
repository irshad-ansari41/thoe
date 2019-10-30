@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Edit User
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}"  rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Edit user</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li><a href="{{ URL::to('admin/users') }}">Users</a></li>
        <li class="active">Edit User</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"> <i class="livicon" data-name="users" data-size="16" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                        Editing user : <p class="user_name_max">{!! $user->first_name!!} {!! $user->last_name!!}</p>
                    </h3>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <!--main content-->
                    <div class="row">

                        <div class="col-md-12">
                            <form id="commentForm" action="{{ route('admin.users.update', $user) }}"
                                  method="POST" id="wizard-validation" enctype="multipart/form-data" class="form-horizontal">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_method" value="PATCH"/>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <div id="rootwizard">

                                    <div class="tab-content">


                                        <div class="row">
                                            <div class="col-sm-6 form-group {{ $errors->first('first_name', 'has-error') }}">
                                                <label for="first_name" class="col-sm-4">First Name *</label>
                                                <div class="col-sm-8">
                                                    <input id="first_name" name="first_name" type="text"
                                                           placeholder="First Name" class="form-control required"
                                                           value="{!! old('first_name', $user->first_name) !!}"/>
                                                </div>
                                                {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                            </div>
                                            <div class="col-sm-6 form-group {{ $errors->first('last_name', 'has-error') }}">
                                                <label for="last_name" class="col-sm-4">Last Name *</label>
                                                <div class="col-sm-8">
                                                    <input id="last_name" name="last_name" type="text" placeholder="Last Name"
                                                           class="form-control required"
                                                           value="{!! old('last_name', $user->last_name) !!}"/>
                                                </div>
                                                {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 form-group {{ $errors->first('email', 'has-error') }}">
                                                <label for="email" class="col-sm-2">Email *</label>
                                                <div class="col-sm-10">
                                                    <input id="email" name="email" placeholder="E-Mail" type="text"
                                                           class="form-control required email"
                                                           value="{!! old('email', $user->email) !!}"/>
                                                </div>
                                                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p class="text-warning txt-center">If you don't want to change password... please leave them empty.
                                                    <span style="display:inline-block"><a href="" id='autopwd' style="background:#f89a14;padding: 5px;">Generate New Password: </a>
                                                        <span id="randpwd" style="padding:5px 10px;">{{substr(mt_rand(),0,6)}}</span> 
                                                        <span id='usepwd' style="border:1px;cursor:pointer;background:blue;padding: 5px;color:#fff;">Use This Password</span></span>
                                                    <span class="view-pwd" style="border:1px;cursor:pointer;background:red;padding: 5px;color:#fff;">Show Password</span></span>
                                                </p>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-6 form-group {{ $errors->first('password', 'has-error') }}">

                                                <label for="password" class="col-sm-4">Password </label>
                                                <div class="col-sm-8">
                                                    <input id="password" name="password" type="password" placeholder="Password"
                                                           class="form-control" value="{!! old('password') !!}"/>
                                                </div>
                                                {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                            </div>
                                            <div class="col-sm-6 form-group {{ $errors->first('password_confirm', 'has-error') }}">
                                                <label for="password_confirm" class="col-sm-4">Confirm Password </label>
                                                <div class="col-sm-8">
                                                    <input id="password_confirm" name="password_confirm" type="password"
                                                           placeholder="Confirm Password " class="form-control"
                                                           value="{!! old('password_confirm') !!}"/>
                                                </div>
                                                {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
                                            </div> 
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 form-group {{ $errors->first('country_code', 'has-error') }}">
                                                <label for="country_code" class="col-sm-4">Phone Number</label>
                                                <div class="col-sm-2">
                                                    <input id="country_code" name="country_code" type="text" class="form-control"
                                                           value="{!! old('country_code', $user->country_code) !!}" />
                                                </div>
                                                <div class="col-sm-6">
                                                    <input id="phone" name="phone" type="text" class="form-control"
                                                           value="{!! old('phone', $user->phone) !!}" />
                                                </div>
                                                {!! $errors->first('phone', '<span class="help-block">:message</span>') !!}
                                            </div>
                                            <div class="col-sm-6 form-group {{ $errors->first('dob', 'has-error') }}">
                                                <label for="dob" class="col-sm-4">Date of Birth</label>
                                                <div class="col-sm-8">
                                                    <input id="dob" name="dob" type="text" class="form-control"
                                                           data-date-format="YYYY-MM-DD" value="{!! old('dob', $user->dob) !!}"
                                                           placeholder="yyyy-mm-dd"/>
                                                </div>
                                                {!! $errors->first('dob', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 form-group {{ $errors->first('pic_file', 'has-error') }}">
                                                <label for="pic" class="col-sm-4">Profile picture</label>
                                                <div class="col-sm-8">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;">
                                                            @if($user->pic)
                                                            <img src="{!! url('/').'/uploads/users/'.$user->pic !!}" alt="profile pic">
                                                            @else
                                                            <img src="http://placehold.it/100x100" alt="profile pic">
                                                            @endif
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100px; max-height: 100px;"></div>
                                                        <div>
                                                            <span class="btn btn-default btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input id="pic" name="pic_file" type="file"
                                                                       class="form-control"/>
                                                            </span>
                                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput" style="color: black !important;">Remove</a>
                                                        </div>
                                                    </div>
                                                    {!! $errors->first('pic_file', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group  {{ $errors->first('bio', 'has-error') }}">
                                                <label for="bio" class="col-sm-4">Bio <small>(brief intro)</small></label>
                                                <div class="col-sm-8">
                                                    <textarea name="bio" id="bio" class="form-control resize_vertical"
                                                              rows="5">{!! old('bio', $user->bio) !!}</textarea>
                                                </div>
                                                {!! $errors->first('bio', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6 form-group {{ $errors->first('gender', 'has-error') }}">
                                                <label for="email" class="col-sm-4">Gender </label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" title="Select Gender..." name="gender">
                                                        <option value="">Select</option>
                                                        <option value="male" @if($user->gender === 'male') selected="selected" @endif >MALE</option>
                                                        <option value="female" @if($user->gender === 'female') selected="selected" @endif >FEMALE</option>
                                                        <option value="other" @if($user->gender === 'other') selected="selected" @endif >OTHER</option>

                                                    </select>
                                                </div>
                                                {!! $errors->first('gender', '<span class="help-block">:message</span>') !!}
                                            </div>


                                            <div class="col-md-6 form-group required {{ $errors->first('country', 'has-error') }}">
                                                <label for="country" class="col-sm-4">Country </label>
                                                <div class="col-sm-8">
                                                    {!! Form::select('country', $countries,old('country',$user->country),array('class' => 'form-control')) !!}
                                                    
                                                </div>
                                                {!! $errors->first('country', '<span class="help-block">:message</span>') !!}
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 form-group {{ $errors->first('state', 'has-error') }}">
                                                <label for="state" class="col-sm-4">State </label>
                                                <div class="col-sm-8">
                                                    <input id="state" name="state" type="text" class="form-control"
                                                           value="{!! old('state', $user->state) !!}"/>
                                                </div>
                                                {!! $errors->first('state', '<span class="help-block">:message</span>') !!}
                                            </div>

                                            <div class="col-md-6 form-group {{ $errors->first('city', 'has-error') }}">
                                                <label for="city" class="col-sm-4">City </label>
                                                <div class="col-sm-8">
                                                    <input id="city" name="city" type="text" class="form-control"
                                                           value="{!! old('city', $user->city) !!}"/>
                                                </div>
                                                {!! $errors->first('city', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 form-group {{ $errors->first('address', 'has-error') }}">
                                                <label for="address" class="col-sm-4">Address </label>
                                                <div class="col-sm-8">
                                                    <input id="address" name="address" type="text" class="form-control"
                                                           value="{!! old('address', $user->address) !!}"/>
                                                </div>
                                                {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
                                            </div>

                                            <div class="col-md-6 form-group {{ $errors->first('postal', 'has-error') }}">
                                                <label for="postal" class="col-sm-4">Postal/zip</label>
                                                <div class="col-sm-8">
                                                    <input id="postal" name="postal" type="text" class="form-control"
                                                           value="{!! old('postal', $user->postal) !!}"/>
                                                </div>
                                                {!! $errors->first('postal', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 form-group {{ $errors->first('group', 'has-error') }}">
                                                <label for="group" class="col-sm-4">Group *</label>
                                                <div class="col-sm-8">
                                                    <p class="text-danger"><strong>Be careful with group selection, Don't give admin access</strong></p>
                                                    <select class="form-control " title="Select group..." name="groups[]" id="groups" required>
                                                        <?php
                                                        foreach ($roles as $role) {
                                                            if (array_key_exists($role->id, $userRoles) || viewMenuByRole(['admin', 'super-admin'])) {
                                                                ?>
                                                                <option value="{!! $role->id !!}" {{ (array_key_exists($role->id, $userRoles) ? ' selected="selected"' : '') }}>{{ $role->name }}</option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div
                                                {!! $errors->first('group', '<span class="help-block">:message</span>') !!}>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="activate" class="col-sm-4"> Activate User</label>
                                                <div class="col-sm-8">
                                                    <p class="text-danger"><strong>Make User account Active</strong></p>
                                                    <label><input id="activate" name="activate" type="checkbox" class="pos-rel p-l-30 custom-checkbox" value="1" <?php !empty($status) ? "checked=checked" : ''; ?> >
                                                        <span>To activate your account click the check box</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-primary" style="width:100%">Update</button>
                                            </div>
                                        </div>

                                       

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--main content end-->
                </div>
            </div>
        </div>
    </div>
    <!--row end-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script>
<script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
<script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/edituser.js') }}"></script>
<script>
$(document).ready(function () {
    $('#usepwd').click(function () {
        $('#password').val($('#randpwd').text());
        $('#password_confirm').val($('#randpwd').text());
    });
    $('.view-pwd').click(function () {
        $('input[type=password]').attr('type', 'text');
    });
});
</script>
@stop
