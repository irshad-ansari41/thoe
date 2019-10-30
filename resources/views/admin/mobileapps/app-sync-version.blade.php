@extends('admin/layouts/default')

@section('title')
Availability list App
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Azizi Developments App Sync</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Azizi-Developments</li>
        <li class="active">Option List</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Sync Details
                </h4>
            </div>
            <br />
            <div class="panel-body table-responsive">
                <form method="post" action="{{route('admin.app-sync-version.store')}}" id="filter">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-3">
                            App Type<br/>
                            <select name="type" class="form-control">
                                <option value="avl">Availability List</option>
                                <option value="azd">Azizi Development</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            New Version<br/>
                            <input type="text" name="version" class="form-control" required="required" placeholder="1.0.0">
                        </div>
                        <div class="col-lg-3">
                            Last Created Date<br/>
                            <input type="date" name="date"  class="form-control" required="required">
                        </div>
                        <div class="col-lg-2">
                            Action<br/>
                            <input type="submit" value="Create Sync Version" class="btn btn-primary">
                        </div>
                    </div>
                    <br/><br/>

                    <table class="table table-hover">
                        <tr>
                            <td>Type</td>
                            <td>Version</td>
                            <td>Files</td>
                            <td>File Size</td>
                            <td>Created Date</td>
                            <td>Created At</td>
                            <td>Action</td>
                        </tr>
                        @foreach($versions as $value)
                        <tr>
                            <td>{{$value->type=='avl'?'Availability List':'Azizi Developments'}}</td>
                            <td>{{$value->version}}</td>
                            <td>{{$value->files}}</td>
                            <td>{{$value->size}} MB</td>
                            <td>{{ date_format(date_create($value->updated_at),'d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($value->updated_at))->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('admin.app-sync-version.delete', $value->id) }}" onclick="return confirm('Are you sure?')">
                                    Delete
                                </a></td>
                        </tr>
                        @endforeach

                    </table>

                </form>
            </div>
        </div>
    </div>
</section>
@stop


