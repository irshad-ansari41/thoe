@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Offer List
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
    <h1>Offer</h1>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Offer List
                </h4>

            </div>
            <br />
            <br />
            <a href="offer/add_offer"><button type="button" class="btn btn-danger" style="margin-left: 30px;">Add New Offer</button></a>
            <div class="panel-body">
                <table class="table table-bordered " id="table">
                    <thead>
                        <tr class="filters">
                            <th>Image</th>
                            <th>Title</th>
                            <th>Offer Release Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($offer as $new) {
                            $images = !empty($new->image) ? explode(',', $new->image) : [];
                            $image = !empty($images[0]) ? asset("assets/images/offer/{$images[0]}") : '';
                            ?>
                            <tr>
                                <td><?= !empty($image) ? "<img src='$image' width=100/>" : '' ?></td>
                                <td> <a href="offer/<?= $new->id ?>/edit"><?= $new->title_en ?></a></td>
                                <td><?= $new->date ?></td>
                                <td><?= $new->status == 1 ? 'Active' : 'Inactive'; ?></td>
                                <td>
                                    <a href="offer/<?= $new->id ?>/edit"><i class="fa fa-edit"></i></a>
                                    <a href="offer/<?= $new->id ?>/delete" onclick="return confirm('Are you sure you want to delete this record?');" ><i class="fa fa-trash"></i></a>
                                    @if($new->status=='0')
                                    <a href="<?= url('/') ?>/admin/offer/<?= $new->id ?>/status/1"><i class="fa fa-lock"></i></a>
                                    @else
                                    <a href="<?= url('/') ?>/admin/offer/<?= $new->id ?>/status/0"><i class="fa fa-unlock"></i></a>
                                    @endif
                                </td>
                            </tr>
                        <?php } ?>

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
                                        $('#table').DataTable();
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