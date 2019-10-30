@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Page List
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
<style>
    textarea{width:100%;min-height:75px}
    input[type='text'],input[type='submit']{width:100%}
</style>
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>SEO Tools</h1>
</section>
<?php
$get = filter_input_array(INPUT_GET);

$source = !empty($get['source']) ? $get['source'] : '';
$destination = !empty($get['destination']) ? $get['destination'] : '';
$status = !empty($get['status']) ? $get['status'] : '';
$url_match = !empty($get['url_match']) ? $get['url_match'] : '';
$limit = !empty($get['limit']) ? $get['limit'] : '';
?>
<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Meta Tags <span>[<?= $count ?>]</span>
                </h4>

            </div>
            <br/>
            <br/>
            <div class="panel-body">
                <form>
                    <table class="table table-bordered " id="table">
                        <tr>
                            <td>
                                <select name="limit" class="form-control">
                                    <option value="10" {{$limit=='10'?'selected':''}}>10</option>
                                    <option value="20" {{$limit=='20'?'selected':''}}>20</option>
                                    <option value="30" {{$limit=='30'?'selected':''}}>30</option>
                                    <option value="50" {{$limit=='50'?'selected':''}}>50</option>
                                    <option value="100" {{$limit=='100'?'selected':''}}>100</option>
                                    <option value="200" {{$limit=='200'?'selected':''}}>200</option>
                                    <option value="300" {{$limit=='300'?'selected':''}}>300</option>
                                    <option value="500" {{$limit=='500'?'selected':''}}>500</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="source" class="form-control" value="{{$source}}" placeholder="Source Url">
                            </td>
                            <td>
                                <input type="text" name="destination"  class="form-control"  value="{{$destination}}" placeholder="Destination Url">
                            </td>
                            <td>
                                <select name="url_match" class="form-control">
                                    <option value="Contain" {{$url_match=='Contain'?'selected':''}}>Contain</option>
                                    <option value="Exact" {{$url_match=='Exact'?'selected':''}}>Exact</option>
                                </select>
                            </td>
                            <td>
                                <select name='status' class="form-control">
                                    <option value="">Select</option>
                                    <option value="Active" <?= $status == 'Active' ? 'selected' : '' ?>>Active</option>
                                    <option value="Inactive" <?= $status == 'Inactive' ? 'selected' : '' ?>>Inactive</option>
                                </select>
                            </td>

                            <td>
                                <input type="submit" name="filter" class="btn btn-success"  value="Filter">
                            </td>
                            <td>
                                <a href="<?= url('admin/url-redirect/list') ?>" class="btn btn-danger" >Reset</a>
                            </td>
                        </tr>
                    </table>
                </form>
                <form method="post">
                    <!--redirect name="csrf-token" content="{{ csrf_token() }}"-->
                        {{ csrf_field() }}
                        <table class="table table-bordered " id="table">
                            <thead>
                                <tr class="filters">
                                    <th width="20"><label><input type="checkbox" id="checkAll"></label></th>
                                    <th>Source URL</th>
                                    <th>Destination URL</th>
                                    <td style="width: 175px;">Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php for ($i = 0; $i == 0; $i++) { ?>
                                    <tr style="background: #eee;">
                                        <td><input type="checkbox" ></td>
                                        <td><input type="text" name='redirect[<?= $i ?>][source]' class="form-control"  placeholder="Source Url"></td>
                                        <td><input type="text" name='redirect[<?= $i ?>][destination]' class="form-control" placeholder="Destination Url"></td>
                                        <td style="width: 175px;"><label><input type="radio" name='redirect[<?= $i ?>][status]' value="Active"> &nbsp;&nbsp;Active</label>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                                            <label><input type="radio" name='redirect[<?= $i ?>][status]' value="Inactive"> &nbsp;&nbsp;Inactive</label>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php
                                if (!empty($redirect)) {
                                    foreach ($redirect as $value) {
                                        ?>
                                        <tr>
                                            <td><input type="checkbox"  name='redirect[{{$value->id}}][del_id]' value="{{$value->id}}">
                                                <input type="hidden" name='redirect[{{$value->id}}][id]' class="form-control"  value="{{$value->id}}"></td>
                                            <td><input type="text" name='redirect[{{$value->id}}][source]' class="form-control"  value="{{ $value->source }}"></td>
                                            <td><input type="text" name='redirect[{{$value->id}}][destination]' class="form-control"  value="{{ $value->destination }}" ></td>
                                            <td style="width: 175px;">
                                                <label><input type="radio" name='redirect[{{$value->id}}][status]' value="Active" <?= $value->status == 'Active' ? 'checked' : '' ?>> &nbsp;&nbsp;Active</label>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                                                <label><input type="radio" name='redirect[{{$value->id}}][status]' value="Inactive" <?= $value->status == 'Inactive' ? 'checked' : '' ?>> &nbsp;&nbsp;Inactive</label>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        {!! $redirect->appends(['source' => $source,$url_match=>$url_match,'destination' => $destination,'status' => $status,])->render() !!}
                        <button type="submit" name="submit" class="btn btn-primary btn-block" value="Submit">Submit</button>
                </form>
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
    //$('#table').DataTable();
});
</script>

<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>
<script>
    $(function () {
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
            if ($(this).val() == 'on') {
                $('button[type=submit]').text('Delete').addClass('btn-danger').removeClass('btn-primary');
            }
        });
        $('input[type=checkbox]').click(function () {
            if (this.checked) {
                $('button[type=submit]').text('Delete').addClass('btn-danger').removeClass('btn-primary');
            }
        });
    });
</script>
@stop