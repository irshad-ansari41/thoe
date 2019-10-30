@extends('admin/layouts/default')

@section('title')
Sale Center
@parent

@push('styles')
table tr th,table tr td {
padding: 1px;
font-size: 13px;
#result{color:green;}
}
@endpush

@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <h1>Sale Center</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Sale Center</li>
        <li class="active">Wish List</li>
    </ol>
</section>

<div class="row">

    <div class="col-sm-12">

        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Unit List [{{$count}}] | Bayut [{{$total_bayut}}] |Property Finder [{{$total_pf}}] | Dubizzle#1 [{{$total_dubizzle1}}] | Dubizzle#2 [{{$total_dubizzle2}}]
                </h4>
                <div class="pull-right">
                    <a class="btn btn-sm btn-warning" href="{{route('admin.sale-center.units')}}">Units List</a>
                    <a class="btn btn-sm btn-warning" href="http://azizidevelopments.in/copy-images.php" target="_copy">Copy Images</a>
                    <a class="btn btn-sm btn-default" href="<?= APP_URL . '/uploads/property-feed-bayut.xml' ?>" target="_feed">Bayut</a>
                    <a class="btn btn-sm btn-default" href="<?= APP_URL . '/uploads/property-feed-property-finder.xml' ?>" target="_feed">Property Finder</a>
                    <a class="btn btn-sm btn-default" href="<?= APP_URL . '/uploads/property-feed-dubizzle-1.xml' ?>" target="_feed">Dubizzle 1</a>
                    <a class="btn btn-sm btn-default" href="<?= APP_URL . '/uploads/property-feed-dubizzle-2.xml' ?>" target="_feed">Dubizzle 2</a>
                </div>
            </div>
            <br />
            <div class="panel-body table-responsive">
                <?php
                $get = filter_input_array(INPUT_GET);
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <form>
                            <div class="well well-sm">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <input type="search" placeholder="Search property name"  class="form-control" name="str" value="{{!empty($get['str'])?$get['str']:''}}">
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" placeholder="Search by View..."  class="form-control" name="view" value="{{!empty($get['view'])?$get['view']:''}}">
                                    </div>
                                    <div class="col-lg-2">
                                        <select name="community_id" class="form-control" >
                                            <option value="">Community</option>
                                            @foreach($communities as $key=>$value)
                                            <option value="{{$value->id}}" {{!empty($get['community_id'])&&$get['community_id']==$value->id?'selected':''}}>{{$value->CommunityName}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-lg-2">
                                        <select name="portals" class="form-control" >
                                            <option value="">Portal</option>
                                            <option value="bayut" {{!empty($get['portals'])&&$get['portals']=='bayut'?'selected':''}}>Bayut</option>
                                            <option value="pf" {{!empty($get['portals'])&&$get['portals']=='pf'?'selected':''}}>PF</option>
                                            <option value="dubizzle1" {{!empty($get['portals'])&&$get['portals']=='dubizzle1'?'selected':''}}>Dubizzle#1</option>
                                            <option value="dubizzle2" {{!empty($get['portals'])&&$get['portals']=='dubizzle2'?'selected':''}}>Dubizzle#2</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <select name="property_id" class="form-control"  >
                                            <option value="">Property</option>
                                            @foreach($properties as $key=>$value)
                                            <option value="{{$value->id}}" {{!empty($get['property_id'])&&$get['property_id']==$value->id?'selected':''}}>{{$value->PropertyName}} - {{ count_property($value->id)}}</option>
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
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <input type="search" placeholder="Ref No..."  class="form-control" name="refno" value="{{!empty($get['refno'])?$get['refno']:''}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Unit unique IDs"  class="form-control" name="unit_ids" value="{{!empty($get['unit_ids'])?$get['unit_ids']:''}}">
                                        <small class="text-danger">values should be comma separated</small>
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="submit" value="Filter" class="btn btn-block btn-primary">
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="{{route('admin.sale-center.wishlist')}}" class="btn btn-block btn-default">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label><input type='checkbox' id="unit-all-bayut"> Bayut </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type='checkbox' id="unit-all-pf"> PF </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type='checkbox' id="unit-all-dubizzle1"> Dubizzle#1</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type='checkbox' id="unit-all-dubizzle2"> Dubizzle#2</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="toggleToPortal btn btn-success" data-action="1" onclick="return confirm('Are you sure?')" >Add To Portal</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="toggleToPortal btn btn-warning"  data-action="0" onclick="return confirm('Are you sure?')" >Remove To Portal</button>
                        <div id="result"></div>
                    </div>
                </div>

                <hr/>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-responsive" id="amenities-table">
                    <thead>
                        <tr>
                            <th><input type='checkbox' id='checkAll' ></th>
                            <th>UnitID</th>
                            <th>Unit Details</th>
                            <th>Amenities & Nearby</th>
                            <th>Title & Description</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($units as $unit) {
                            ?>
                            <tr>
                                <td><?= $i ?>.&nbsp;&nbsp;<input type='checkbox' name='wishlist[]' class="checkItem" value="{{$unit->id}}" ></td>
                                <td><a href="{{route('admin.sale-center.wishlist.edit',['id'=>$unit->id])}}">{!! $unit->UnitID !!}</a><br/>
                                    <label><input type='checkbox' class="unit-bayut" name='portal[{{$unit->id}}][bayut]' {{$unit->bayut?'checked':''}} value='{{$unit->id}}'> Bayut </label><br/>
                                    <label><input type='checkbox' class="unit-pf"  name='portal[{{$unit->id}}][pf]' {{$unit->pf?'checked':''}} value='{{$unit->id}}'> PF </label><br/>
                                    <label><input type='checkbox' class="unit-dubizzle1"  name='portal[{{$unit->id}}][dubizzle1]' {{$unit->dubizzle1?'checked':''}} value='{{$unit->id}}'> Dubizzle#1</label><br/>
                                    <label><input type='checkbox' class="unit-dubizzle2"  name='portal[{{$unit->id}}][dubizzle2]' {{$unit->dubizzle2?'checked':''}} value='{{$unit->id}}'> Dubizzle#2</label>
                                </td>
                                <td>
                                    <table>
                                        <tr><td><strong>Unit Unique Id:</strong></td><td>{!! $unit->id !!}</td></tr>
                                        <tr><td><strong>LocationID:</strong></td><td>{!! $unit->LocationID !!}</td></tr>
                                        <tr><td><strong>CommunityID:</strong></td><td>{!! $unit->CommunityID!!}</td></tr>
                                        <tr><td><strong>PropertyID:</strong></td><td>{!! $unit->PropertyID!!}</td></tr>
                                        <tr><td><strong>LocationName:</strong></td><td>{!! $unit->LocationName!!}</td></tr>
                                        <tr><td><strong>CommunityName:</strong></td><td>{!! $unit->CommunityName!!}</td></tr>
                                        <tr><td><strong>PropertyName:</strong></td><td>{!! $unit->PropertyName !!}</td></tr>
                                        <tr><td><strong>UnitNo:</strong></td><td>{!! $unit->UnitNo!!}</td></tr>
                                        <tr><td><strong>RefNo:</strong></td><td>{!! $unit->RefNo!!}</td></tr>
                                        <tr><td><strong>Type:</strong></td><td>{!! $unit->Type!!}</td></tr>
                                        <tr><td><strong>Category:</strong></td><td>{!! $unit->Category!!}</td></tr>
                                        <tr><td><strong>View:</strong></td><td>{!! $unit->View!!}</td></tr>
                                        <tr><td><strong>Status:</strong></td><td>{!! $unit->Status!!}</td></tr>
                                        <tr><td><strong>Floor:</strong></td><td>{!! $unit->Floor !!}</td></tr>
                                        <tr><td><strong>Bedrooms:</strong></td><td>{!! $unit->Bedrooms!!}</td></tr>
                                        <tr><td><strong>Bathrooms:</strong></td><td>{!! $unit->Bathrooms!!}</td></tr>
                                        <tr><td><strong>UnitArea:</strong></td><td>{!! $unit->UnitArea!!}</td></tr>
                                        <tr><td><strong>BalconyArea:</strong></td><td>{!! $unit->BalconyArea!!}</td></tr>
                                        <tr><td><strong>TotalArea:</strong></td><td>{{ $unit->UnitArea+$unit->BalconyArea}}</td></tr>
                                        <tr><td><strong>Price:</strong></td><td>{!! $unit->Price!!}</td></tr>
                                    </table>
                                </td>
                                <td>
                                    <strong>Amenities:</strong>
                                    <ul style="padding:0">
                                        <?php
                                        $amenities = explode('|', $unit->amenities);
                                        foreach ($amenities as $amenity) {
                                            ?>
                                            <li style="padding: 0px 5px; list-style: none;">{{$amenity}}</li>
                                        <?php } ?>
                                    </ul>
                                    <strong>Nearby:</strong>
                                    <ul style="padding:0">
                                        <?php
                                        $nearby = explode('|', $unit->nearby);
                                        foreach ($nearby as $near) {
                                            ?>
                                            <li style="padding: 0px 5px; list-style: none;">{{$near}}</li>
                                        <?php } ?>
                                    </ul>
                                </td>


                                <td style="width:700px">
                                    <input name='portal[{{$unit->id}}][title]' type="text" value="{!! $unit->title !!}" class="form-control unit-title"  data-unit_id="{{$unit->id}}"><br/>
                                    <textarea name='portal[{{$unit->id}}][description]' rows="7" class="form-control unit-desc"  data-unit_id="{{$unit->id}}">{!! $unit->description !!}</textarea><br/>
                                    <ul  class="sortable" style="padding:0">
                                        <?php
                                        $images = getPropertiesImage($unit);
                                        shuffle($images);
                                        foreach ($images as $k => $image) {
                                            ?>
                                            <li style="padding: 5px; list-style: none; display: inline-block;">
                                                <input type='hidden' name='portal[{{$unit->id}}][images][<?= $k ?>]' value='<?= $image ?>' data-unit_id="{{$unit->id}}">
                                                <img src='<?= $image ?>' width='100'>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{route('admin.sale-center.wishlist.edit',['id'=>$unit->id])}}">
                                        <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit amenity"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>

                    </tbody>
                </table>
                <table style="width:100%">
                    <tr>
                        <td>
                            <button id="removefromwishlist" onclick="return confirm('Are you sure?')"  class="btn btn-danger">Remove From Wish List</button>
                        </td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" name="generatePropertyFeed" value="generatePropertyFeed" onclick="return confirm('Are you sure?')"  class="btn btn-warning">Generate Property Feed</button>
                            </form>
                        </td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" name="exportPropertyFeed" value="exportPropertyFeed" onclick="return confirm('Are you sure?')"  class="btn btn-success">Export Property Feed</button>
                            </form>
                        </td>
                    </tr>
                </table>

                <?php /*
                  echo $units->appends([
                  'str' => !empty($get['str']) ? $get['str'] : '',
                  'refno' => !empty($get['refno']) ? $get['refno'] : '',
                  'view' => !empty($get['view']) ? $get['view'] : '',
                  'price' => !empty($get['price']) ? $get['price'] : '',
                  'mode' => !empty($get['mode']) ? $get['mode'] : '',
                  'order' => !empty($get['order']) ? $get['order'] : '',
                  'community_id' => !empty($get['community_id']) ? $get['community_id'] : '',
                  'property_id' => !empty($get['property_id']) ? $get['property_id'] : '',
                  'status' => !empty($get['status']) ? $get['status'] : '',
                  ])->render(); */
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
        $('#unit-all-bayut').click(function () {
            $(':checkbox.unit-bayut').prop('checked', this.checked);
        });
        $('#unit-all-pf').click(function () {
            $(':checkbox.unit-pf').prop('checked', this.checked);
        });
        $('#unit-all-dubizzle1').click(function () {
            $(':checkbox.unit-dubizzle1').prop('checked', this.checked);
        });
        $('#unit-all-dubizzle2').click(function () {
            $(':checkbox.unit-dubizzle2').prop('checked', this.checked);
        });
        $(".sortable").sortable();
        $(".sortable").disableSelection();

    });

    jQuery('#removefromwishlist').click(function () {
        var searchIDs = $("input.checkItem:checkbox:checked").map(function () {
            return $(this).val();
        }).get();
        var unitIds = searchIDs.join();
        save_unit_details({unitIds: unitIds});
    });

    jQuery('.toggleToPortal').click(function () {
        var action = jQuery(this).data('action')
        var bayutUnitIds = $("input.unit-bayut:checkbox:checked").map(function () {
            return $(this).val();
        }).get();
        var pfUnitIds = $("input.unit-pf:checkbox:checked").map(function () {
            return $(this).val();
        }).get();
        var dubizzle1UnitIds = $("input.unit-dubizzle1:checkbox:checked").map(function () {
            return $(this).val();
        }).get();
        var dubizzle2UnitIds = $("input.unit-dubizzle2:checkbox:checked").map(function () {
            return $(this).val();
        }).get();

        save_unit_details({bayutIds: bayutUnitIds.join(), action: action});
        save_unit_details({pfIds: pfUnitIds.join(), action: action});
        save_unit_details({dubizzle1Ids: dubizzle1UnitIds.join(), action: action});
        save_unit_details({dubizzle2Ids: dubizzle2UnitIds.join(), action: action});
    });




    jQuery('.unit-title').blur(function () {
        save_unit_details({title: jQuery(this).val(), unitId: jQuery(this).data('unit_id')});
    });

    jQuery('.unit-desc').blur(function () {
        save_unit_details({description: jQuery(this).val(), unitId: jQuery(this).data('unit_id')});
    });

    jQuery('.unit-bayut').click(function () {
        var check = jQuery(this).is(":checked");
        save_unit_details({bayut: jQuery(this).val(), checked: check});
    });

    jQuery('.unit-pf').click(function () {
        var check = jQuery(this).is(":checked");
        save_unit_details({pf: jQuery(this).val(), checked: check});
    });

    jQuery('.unit-dubizzle1').click(function () {
        var check = jQuery(this).is(":checked");
        save_unit_details({dubizzle1: jQuery(this).val(), checked: check});
    });

    jQuery('.unit-dubizzle2').click(function () {
        var check = jQuery(this).is(":checked");
        save_unit_details({dubizzle2: jQuery(this).val(), checked: check});
    });

    function save_unit_details(data) {
        console.log(data);
        jQuery.ajax({
            url: "<?= route('admin.sale-center.save-unit-details') ?>",
            type: "POST",
            data: data,
            cache: false,
            success: function (html) {
                jQuery('#result').text('Request processed successfully.');
            }
        }
        );
    }

</script>
@stop
