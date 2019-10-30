@extends('admin/layouts/default')

@section('title')
Sale Center
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<style>
    .table>thead>tr>th,.table>tbody>tr>td {
        padding: 2px;
        font-size: 12px;
    }

    .Available{background: #65af65!important;color:#fff!important}
    .Blocked,.BLOCKED{background: #dada34!important;color:#666!important}
    .Sold,.Rwm{background:#e67474!important;color:#fff!important}
    .whislist{background:blue!important;color:#fff!important}
    .colorCode{padding: 5px;margin: 5px;}
</style>
@stop



{{-- Page content --}}
@section('content')
<?php
$get = filter_input_array(INPUT_GET);
?>
<section class="content-header">
    <h1>Sale Center</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Sale Center</li>
        <li class="active">Sale Center List</li>
    </ol>
</section>

<div class="row">

    <div class="col-sm-12">

        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Unit List [{{$count}}], Wishlist [{{$totalwishlist}}]
                </h4>
                <div class="pull-right">
                    <a class="btn btn-sm btn-default" href="{{route('admin.get-units')}}">Get Units From CRM</a>
                    <a class="btn btn-sm btn-default" href="https://azizidevelopments.com/read-json/index.php">Sync Units</a>
                    <a class="btn btn-sm btn-default" href="{{route('admin.sale-center.wishlist')}}">Wish List</a>
                </div>
            </div>
            <br />
            <div class="panel-body table-responsive">
                <form id="unitsForm">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="well well-sm">
                                <div class="row">
                                    <div class=                    "col-lg-2">
                                        <input type="search" placeholder="Building name..."  class="form-control" name="str" value="{{!empty($get['str'])?$get['str']:''}}">
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" placeholder="view keyword..."  class="form-control" name="view" value="{{!empty($get['view'])?$get['view']:''}}">
                                    </div>

                                    <div class="col-lg-2">
                                        <select name="sSort" class="form-control"  >
                                            <option value="">Size Sorting</option>
                                            <option value="ASC" {{!empty($get['sSort'])&&$get['sSort']=='ASC'?'selected':''}}>Smaller</option>
                                            <option value="DESC" {{!empty($get['sSort'])&&$get['sSort']=='DESC'?'selected':''}}>Bigger</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <select name="pSort" class="form-control"  >
                                            <option value="">Price Sorting</option>
                                            <option value="ASC" {{!empty($get['pSort'])&&$get['pSort']=='ASC'?'selected':''}}>Lowest</option>
                                            <option value="DESC" {{!empty($get['pSort'])&&$get['pSort']=='DESC'?'selected':''}}>Highest</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <select name="ptype" class="form-control"  >
                                            <option value="">Property Type</option>
                                            <option value="Residential" {{!empty($get['ptype'])&&$get['ptype']=='Residential'?'selected':''}}>Residential</option>
                                            <option value="Commercial" {{!empty($get['ptype'])&&$get['ptype']=='Commercial'?'selected':''}}>Commercial</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <select name="utype" class="form-control"  >
                                            <option value="">Unit Type</option>
                                            @foreach($unitTypes as $key=>$value)
                                            <option value="{{$value->Bedrooms}}" {{!empty($get['utype'])&&$get['utype']==$value->Bedrooms?'selected':''}}>{{$value->Bedrooms}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><br/>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <select name="community_id" class="form-control" >
                                            <option value="">Community</option>
                                            @foreach($communities as $key=>$value)
                                            <option value="{{$value->id}}" {{!empty($get['community_id'])&&$get['community_id']==$value->id?'selected':''}}>{{$value->CommunityName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <select name="property_id" class="form-control"  >
                                            <option value="">Property</option>
                                            @foreach($properties as $key=>$value)
                                            <option value="{{$value->id}}" {{!empty($get['property_id'])&&$get['property_id']==$value->id?'selected':''}}>{{$value->PropertyName}} - {{count_avl_unit($value->id)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <select name="status" class="form-control">
                                            <option value="">Unit Status All</option>
                                            @foreach($status as $key=>$value)
                                            <option value="{{$value->status}}" {{!empty($get['status'])&&$get['status']==$value->status?'selected':''}}>{{$value->status}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="submit" value="Filter" class="btn btn-primary">
                                        <a href="{{route('admin.sale-center.units')}}" class="btn btn-default">Reset</a>
                                    </div>
                                    <div class="col-lg-3">
                                        <button name="auto_generate" value="1" class="btn btn-danger">Auto Generate</button>
                                        <button type="submit" name="exportAutoUnits" value="exportAutoUnits" class="btn btn-warning float-right">Export Auto Unit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <table cellpadding="10" cellspacing="10">
                    <tr>
                        <td><span class="Available colorCode">Available</span></td>
                        <td><span class="Blocked colorCode">Blocked</span></td>
                        <td><span class="Sold colorCode">Sold</span></td>
                        <td><span class="whislist colorCode">Whislist</span></td>
                    </tr>
                </table>
                <br/>
                <form method="post" action="">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <table class="table table-responsive" id="units-table">
                        <thead>
                            <tr>
                                <th><input type='checkbox' id='checkAll' ></th>
                                <th>UnitID</th>
                                <th>CommunityName</th>
                                <th>PropertyName</th>
                                <th>UnitNo</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>View</th>
                                <th>Status</th>
                                <th>Floor</th>
                                <th>Bedrooms</th>
                                <th>UnitArea</th>
                                <th>BalconyArea</th>
                                <th>TotalArea</th>
                                <th>Price</th>
                                <th>Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($get['auto_generate'])) {
                                $i = 1;
                                foreach ($autounits as $key => $units) {
                                    foreach ($units as $k => $value) {
                                        $unit = $value[0];
                                        ?>
                                        <tr class="{{$unit->Status}} <?= $unit->wishlist ? 'whislist' : '' ?>">
                                            <td><?= $i++ ?>. <input type='checkbox' name='wishlist[]' class="checkItem" value="{{$unit->id}}" ></td>
                                            <td>{!! $unit->UnitID !!}</td>
                                            <td>{!! $unit->CommunityName !!}</td>
                                            <td>{!! $unit->PropertyName !!}</td>
                                            <td>{!! $unit->UnitNo!!}</td>
                                            <td>{!! $unit->Type!!}</td>
                                            <td>{!! $unit->Category!!}</td>
                                            <td>{!! $unit->View!!}</td>
                                            <td>{!! $unit->Status!!}</td>
                                            <td>{!! $unit->Floor!!}</td>
                                            <td>{!! $unit->Bedrooms!!}</td>
                                            <td>{!! $unit->UnitArea!!}</td>
                                            <td>{!! $unit->BalconyArea!!}</td>
                                            <td>{{$unit->UnitArea+$unit->BalconyArea}}</td>
                                            <td>{!! $unit->Price!!}</td>
                                            <td>{{  \Carbon\Carbon::createFromTimeStamp(strtotime($unit->updated_at))->diffForHumans() }}</td>
                                        </tr>
                                        <?php
                                    }
                                }
                            } else {
                                $i = !empty($get['num']) ? $get['num'] : '1';
                                foreach ($units as $unit) {
                                    ?>
                                    <tr class="{{$unit->Status}} <?= $unit->wishlist ? 'whislist' : '' ?>">
                                        <td><?= $i++ ?>. <input type='checkbox' name='wishlist[]' class="checkItem" value="{{$unit->id}}" ></td>
                                        <td>{!! $unit->UnitID !!}</td>
                                        <td>{!! $unit->CommunityName !!}</td>
                                        <td>{!! $unit->PropertyName !!}</td>
                                        <td>{!! $unit->UnitNo!!}</td>
                                        <td>{!! $unit->Type!!}</td>
                                        <td>{!! $unit->Category!!}</td>
                                        <td>{!! $unit->View!!}</td>
                                        <td>{!! $unit->Status!!}</td>
                                        <td>{!! $unit->Floor!!}</td>
                                        <td>{!! $unit->Bedrooms!!}</td>
                                        <td>{!! $unit->UnitArea!!}</td>
                                        <td>{!! $unit->BalconyArea!!}</td>
                                        <td>{{$unit->UnitArea+$unit->BalconyArea}}</td>
                                        <td>{!! $unit->Price!!}</td>
                                        <td>{{  \Carbon\Carbon::createFromTimeStamp(strtotime($unit->updated_at))->diffForHumans() }}</td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <button type="submit" name="addtowishlist" value="addtowishlist"  class="btn btn-primary float-right">Add to Wish List</button>
                </form>

                <?php
                if (empty($get['auto_generate'])) {
                    echo $units->appends([
                        'str' => !empty($get['str']) ? $get['str'] : '',
                        'view' => !empty($get['view']) ? $get['view'] : '',
                        'pSort' => !empty($get['pSort']) ? $get['pSort'] : '',
                        'sSort' => !empty($get['sSort']) ? $get['sSort'] : '',
                        'ptype' => !empty($get['ptype']) ? $get['ptype'] : '',
                        'utype' => !empty($get['utype']) ? $get['utype'] : '',
                        'community_id' => !empty($get['community_id']) ? $get['community_id'] : '',
                        'property_id' => !empty($get['property_id']) ? $get['property_id'] : '',
                        'status' => !empty($get['status']) ? $get['status'] : '',
                        'num' => !empty($get['num']) ? $get['num'] : '',
                    ])->render();
                }
                ?>


            </div>
        </div>
    </div>

</div>

@stop


{{-- page level scripts --}}
@section('footer_scripts')


<script>
    jQuery(document).ready(function () {
        $('#checkAll').click(function () {
            $(':checkbox.checkItem').prop('checked', this.checked);
        });
    });
</script>
@stop
