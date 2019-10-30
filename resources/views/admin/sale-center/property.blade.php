
@extends('admin/layouts/default')

@section('title')
Sale Center
@parent

@push('styles')
/*.table>thead>tr>th,.table>tbody>tr>td {
padding: 2px;
font-size: 12px;
}*/
@endpush

@stop

{{-- Page content --}}
@section('content')
<?php
$propertiesList = "<select name='pmap' onchange='this.form.submit()' style='width:150px'><option value='0'>Map Property</option>";
foreach ($old_properties as $value) {
    $propertiesList .= "<option value='{$value->id}'>{$value->title_en}</option>";
    $old_property[$value->id] = $value->title_en;
}
$propertiesList .= "</select>";
$communitiesList = "<select name='cmap' onchange='this.form.submit()' style='width:150px'><option value='0'>Map Community</option>";
foreach ($communities as $value) {
    $communitiesList .= "<option value='{$value->id}'>{$value->CommunityName}</option>";
}
$communitiesList .= "</select>";
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
        <section class="content paddingleft_right15">
            <div class="row">
                <div class="panel panel-primary ">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Property List [{{$count}}]
                        </h4>
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
                                                <input type="search" placeholder="Search property items..."  class="form-control" name="str" value="{{!empty($get['str'])?$get['str']:''}}">
                                            </div>

                                            <div class="col-lg-2">
                                                <select name="community_id" class="form-control" onchange="this.form.submit()">
                                                    <option value="">Community</option>
                                                    @foreach($communities as $key=>$value)
                                                    <option value="{{$value->id}}" {{!empty($get['community_id'])&&$get['community_id']==$value->id?'selected':''}}>{{$value->CommunityName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-lg-2">
                                                <select name="property_id" class="form-control"  onchange="this.form.submit()">
                                                    <option value="">Property</option>
                                                    @foreach($properties as $key=>$value)
                                                    <option value="{{$value->id}}" {{!empty($get['property_id'])&&$get['property_id']==$value->id?'selected':''}}>{{$value->PropertyName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-lg-6">
                                                <input type="submit" value="Filter" class="btn btn-primary">&nbsp;&nbsp;&nbsp;
                                                <a href="{{route('admin.sale-center.properties')}}" class="btn btn-default">Reset</a>&nbsp;&nbsp;&nbsp;
                                                <a href="{!! route('admin.sale-center.units') !!}" class="btn btn-warning">Units</a>&nbsp;&nbsp;&nbsp;
                                                <a href="{!! route('admin.sale-center.wishlist') !!}" class="btn btn-success">Wishlist</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <form method="post">
                            <span id="result"></span>
                            <table class="table table-responsive" id="amenities-table">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>LocationName</th>
                                        <th>CommunityName</th>
                                        <th>SubCommunity</th>
                                        <th>PropertyName</th>
                                        <th>Map Property</th>
                                        <th>Status</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                </thead>        
                                <tbody>
                                    @foreach($properties as $property)
                                    <tr>
                                        <td>
                                            Bayut&nbsp;&&nbsp;Dubizzle<br/>
                                            <br/>Property&nbsp;Finder
                                        </td>
                                        <td>
                                            <input list="city" name="city" class="form-control city" value="{{$property->city}}"  data-prop_id="{{$property->id}}" placeholder="City" />
                                            <datalist id="city">
                                                <?php foreach ($city as $c) { ?>
                                                    <option value="<?= $c->city ?>"><?= $c->city ?></option>
                                                <?php } ?>
                                            </datalist><br/>
                                            Permit No
                                            <input type="number" name="permit_no" id="permit_no" class="form-control permit_no" value="{{$property->permit_no}}" data-prop_id="{{$property->id}}" placeholder="Permit No" />
                                        </td>
                                        <td>
                                            <input list="bayut_locality" name="bayut_locality" class="form-control bayut_locality" value="{{$property->bayut_locality}}"  data-prop_id="{{$property->id}}" placeholder="Bayut Locality"  />
                                            <datalist id="bayut_locality">
                                                <?php foreach ($bayut_locality as $l) { ?>
                                                    <option value="<?= $l->bayut_locality ?>"><?= $l->bayut_locality ?></option>
                                                <?php } ?>
                                            </datalist>
                                            <input list="pf_locality" name="pf_locality" class="form-control pf_locality" value="{{$property->pf_locality}}"  data-prop_id="{{$property->id}}" placeholder="PF Locality" />
                                            <datalist id="pf_locality">
                                                <?php foreach ($pf_locality as $l) { ?>
                                                    <option value="<?= $l->pf_locality ?>"><?= $l->pf_locality ?></option>
                                                <?php } ?>
                                            </datalist>
                                            <input list="diz_locality" name="diz_locality" class="form-control diz_locality" value="{{$property->diz_locality}}"  data-prop_id="{{$property->id}}" placeholder="Dubizzle Locality" />
                                            <datalist id="pf_locality">
                                                <?php foreach ($diz_locality as $l) { ?>
                                                    <option value="<?= $l->diz_locality ?>"><?= $l->diz_locality ?></option>
                                                <?php } ?>
                                            </datalist>

                                        </td>
                                        <td>
                                            <input list="bayut_sub_locality" name="bayut_sub_locality" class="form-control bayut_sub_locality" value="{{$property->bayut_sub_locality}}"  data-prop_id="{{$property->id}}" placeholder="Bayut Sub Locality"  />
                                            <datalist id="bayut_sub_locality">
                                                <?php foreach ($bayut_sub_locality as $sl) { ?>
                                                    <option value="<?= $sl->bayut_sub_locality ?>"><?= $sl->bayut_sub_locality ?></option>
                                                <?php } ?>
                                            </datalist>
                                            <input list="pf_sub_locality" name="pf_sub_locality" class="form-control pf_sub_locality" value="{{$property->pf_sub_locality}}"  data-prop_id="{{$property->id}}" placeholder="PF Sub Locality"  />
                                            <datalist id="pf_sub_locality">
                                                <?php foreach ($pf_sub_locality as $sl) { ?>
                                                    <option value="<?= $sl->pf_sub_locality ?>"><?= $sl->pf_sub_locality ?></option>
                                                <?php } ?>
                                            </datalist>
                                            <input list="diz_sub_locality" name="diz_sub_locality" class="form-control diz_sub_locality" value="{{$property->diz_sub_locality}}"  data-prop_id="{{$property->id}}" placeholder="Dubizzle Sub Locality"  />
                                            <datalist id="diz_sub_locality">
                                                <?php foreach ($diz_sub_locality as $sl) { ?>
                                                    <option value="<?= $sl->diz_sub_locality ?>"><?= $sl->diz_sub_locality ?></option>
                                                <?php } ?>
                                            </datalist>

                                        </td>
                                        <td>
                                            <input name="bayut_tower_name" class="form-control bayut_tower_name" value="{{$property->bayut_tower_name}}"  data-prop_id="{{$property->id}}" placeholder="Bayut Tower Name"  />
                                            <datalist id="bayut_tower_name">
                                                <?php foreach ($bayut_tower_name as $tn) { ?>
                                                    <option value="<?= $tn->bayut_tower_name ?>"><?= $tn->bayut_tower_name ?></option>
                                                <?php } ?>
                                            </datalist>
                                            <input name="pf_tower_name" class="form-control pf_tower_name" value="{{$property->pf_tower_name}}" data-prop_id="{{$property->id}}" placeholder="PF Tower Name" />
                                            <datalist id="pf_tower_name">
                                                <?php foreach ($pf_tower_name as $tn) { ?>
                                                    <option value="<?= $tn->pf_tower_name ?>"><?= $tn->pf_tower_name ?></option>
                                                <?php } ?>
                                            </datalist>
                                            <input name="diz_tower_name" class="form-control diz_tower_name" value="{{$property->diz_tower_name}}" data-prop_id="{{$property->id}}" placeholder="Dubizzle Tower Name" />
                                            <datalist id="diz_tower_name">
                                                <?php foreach ($diz_tower_name as $tn) { ?>
                                                    <option value="<?= $tn->diz_tower_name ?>"><?= $tn->diz_tower_name ?></option>
                                                <?php } ?>
                                            </datalist>
                                        </td>
                                        <td>{!! !empty($old_property[$property->property_old_id])?$old_property[$property->property_old_id]:'' !!}</td>
                                        <td>{!! $property->status!!}</td>
                                        <td>
                                        <td width="200">
                                            <form>
                                                <input type="hidden" name="id" value="{{$property->id}}" />
                                                <input type="hidden" name="str" value="{{!empty($get['str'])?$get['str']:''}}" />
                                                <input type="hidden" name="community_id" value="{{!empty($get['community_id'])?$get['community_id']:''}}" />
                                                <input type="hidden" name="property_id" value="{{!empty($get['property_id'])?$get['property_id']:''}}" />
                                                {!!$propertiesList!!}
                                                {!!$communitiesList!!}
                                            </form>
                                        </td>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                            {{-- $properties->vendor() --}}
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@stop


{{-- page level scripts --}}
@section('footer_scripts')


<script>

    jQuery(document).ready(function () {

        jQuery('.city').blur(function () {
            save_property_details({city: jQuery(this).val(), prop_id: jQuery(this).data('prop_id')});
        });

        jQuery('.bayut_locality').blur(function () {
            save_property_details({bayut_locality: jQuery(this).val(), prop_id: jQuery(this).data('prop_id')});
        });
        jQuery('.bayut_sub_locality').blur(function () {
            save_property_details({bayut_sub_locality: jQuery(this).val(), prop_id: jQuery(this).data('prop_id')});
        });
        jQuery('.bayut_tower_name').blur(function () {
            save_property_details({bayut_tower_name: jQuery(this).val(), prop_id: jQuery(this).data('prop_id')});
        });

        jQuery('.pf_locality').blur(function () {
            save_property_details({pf_locality: jQuery(this).val(), prop_id: jQuery(this).data('prop_id')});
        });
        jQuery('.pf_sub_locality').blur(function () {
            save_property_details({pf_sub_locality: jQuery(this).val(), prop_id: jQuery(this).data('prop_id')});
        });
        jQuery('.pf_tower_name').blur(function () {
            save_property_details({pf_tower_name: jQuery(this).val(), prop_id: jQuery(this).data('prop_id')});
        });

        jQuery('.diz_locality').blur(function () {
            save_property_details({diz_locality: jQuery(this).val(), prop_id: jQuery(this).data('prop_id')});
        });
        jQuery('.diz_sub_locality').blur(function () {
            save_property_details({diz_sub_locality: jQuery(this).val(), prop_id: jQuery(this).data('prop_id')});
        });
        jQuery('.diz_tower_name').blur(function () {
            save_property_details({diz_tower_name: jQuery(this).val(), prop_id: jQuery(this).data('prop_id')});
        });

        jQuery('.permit_no').blur(function () {
            save_property_details({permit_no: jQuery(this).val(), prop_id: jQuery(this).data('prop_id')});
        });

    });

    function save_property_details(data) {
        console.log(data);
        jQuery.ajax({
            url: "<?= route('admin.sale-center.save-property-details') ?>",
            type: "POST",
            data: data,
            cache: false,
            success: function (html) {
                jQuery('#result').text('Record updated successfully.');
            }
        }
        );
    }

</script>
@stop

