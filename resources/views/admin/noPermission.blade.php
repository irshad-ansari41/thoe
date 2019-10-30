@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Permission Denied
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/pages/news.css') }}"/>
    <!-- end of page level css -->
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <!--section starts-->
        <h1>Permission Denied</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">permission Denied</a>
            </li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <!--main content-->
        <div class="row">
            <div class="col-md-12">
                <div class="flash-message">
                      <p class="alert alert-danger">Permission Denied! </p>
                </div>
            </div>
        </div>
        <!--main content ends-->
    </section>
    <!-- content -->

    @stop

    {{-- page level scripts --}}
    @section('footer_scripts')

            <!--tags-->
    <script src="{{ asset('assets/vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>

@stop
