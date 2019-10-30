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
    textarea{width:100%;min-height:100px}
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

$page_url = !empty($get['page_url']) ? $get['page_url'] : '';
$meta_title = !empty($get['meta_title']) ? $get['meta_title'] : '';
$meta_desc = !empty($get['meta_desc']) ? $get['meta_desc'] : '';
$meta_key = !empty($get['meta_key']) ? $get['meta_key'] : '';
$url_match = !empty($get['url_match']) ? $get['url_match'] : '';
$dup = !empty($get['dup']) ? $get['dup'] : '';
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
                                <input type="text" name="page_url" class="form-control" value="{{$page_url}}" placeholder="URL keyword...">
                            </td>
                            <td>
                                <select name="url_match" class="form-control">
                                    <option value="Contain" {{$url_match=='Contain'?'selected':''}}>Contain</option>
                                    <option value="Exact" {{$url_match=='Exact'?'selected':''}}>Exact</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="meta_title"  class="form-control"  value="{{$meta_title}}" placeholder="Title keyword...">
                            </td>
                            <td>
                                <input type="text" name="meta_desc"  class="form-control"  value="{{$meta_desc}}" placeholder="Desc keyword...">
                            </td>
                            <td>
                                <input type="text" name="meta_key"  class="form-control"  value="{{$meta_key}}" placeholder="Key keyword...">
                            </td>
                            <td>
                                <label><input type="checkbox" name="dup"  class="checkbox" value="1"  style=" float: left; " {{$dup?'checked':''}} >&nbsp;&nbsp;Only Duplicate</label>
                            </td>
                            <td>
                                <input type="submit" name="filter" class="btn btn-success"  value="Filter">
                            </td>
                            <td>
                                <a href="<?= url('admin/meta/list') ?>" class="btn btn-danger" >Reset</a>
                            </td>
                        </tr>
                    </table>
                </form>
                <form method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <table class="table table-bordered " id="table">
                        <thead>
                            <tr class="filters">
                                <th width="20"><label><input type="checkbox" id="checkAll"></label></th>
                                <th>Page URL</th>
                                <th>Meta Title</th>
                                <th>Meta Description</th>
                                <th>Meta Keyword</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php for ($i = 1; $i <= 1; $i++) { ?>
                                <tr style="background: #eee;">
                                    <td><input type="checkbox" ></td>
                                    <td><textarea name='meta[<?= $i ?>][page_url]' class="form-control"  placeholder="Page Url"></textarea></td>
                                    <td><textarea name='meta[<?= $i ?>][meta_title]' class="form-control" placeholder="Meta Title"></textarea></td>
                                    <td><textarea name='meta[<?= $i ?>][meta_desc]' class="form-control" placeholder="Meta Description"></textarea></td>
                                    <td><textarea name='meta[<?= $i ?>][meta_key]' class="form-control" placeholder="Meta Keyword"></textarea></td>
                                </tr>
                            <?php } ?>
                            <?php
                            if (!empty($meta)) {
                                foreach ($meta as $value) {
                                    ?>
                                    <tr>
                                        <td><input type="checkbox"  name='meta[{{$value->id}}][del_id]' value="{{$value->id}}">
                                            <input type="hidden" name='meta[{{$value->id}}][id]' class="form-control"  value="{{$value->id}}"></td>
                                        <td><textarea name='meta[{{$value->id}}][page_url]' class="form-control"  value="">{{ $value->page_url }}</textarea></td>
                                        <td><textarea name='meta[{{$value->id}}][meta_title]' class="form-control"  value="" >{{ $value->meta_title }}</textarea></td>
                                        <td><textarea name='meta[{{$value->id}}][meta_desc]' class="form-control"  value="" >{{ $value->meta_desc }}</textarea></td>
                                        <td><textarea name='meta[{{$value->id}}][meta_key]' class="form-control"  value="">{{ $value->meta_key }}</textarea></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    {!! $meta->appends(['page_url' => $page_url,$url_match=>$url_match,'meta_title' => $meta_title,'meta_desc' => $meta_desc,'meta_key' => $meta_key,'dup' => $dup])->render() !!}
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