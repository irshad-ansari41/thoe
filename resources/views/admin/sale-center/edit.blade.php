@extends('admin/layouts/default')

@section('title')
Edit Unit Details
@parent
@stop

@section('content')

<section class="content-header">
    <h1>Unit Edit</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Unit</li>
        <li class="active">Edit Unit </li>
    </ol>
</section>
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Edit  Unit
                </h4></div>
            <br />
            <div class="panel-body">
                <table class="table">
                    <?php
                    echo "<tr><td>UnitID</td><td>$unit->UnitID</td></tr>";
                    echo "<tr><td>UnitNo</td><td>$unit->UnitNo</td></tr>";
                    echo "<tr><td>RefNo</td><td>$unit->RefNo</td></tr>";
                    echo "<tr><td>PropertyName</td><td>$unit->PropertyName</td></tr>";
                    echo "<tr><td>Type</td><td>$unit->Type</td></tr>";
                    echo "<tr><td>Category</td><td>$unit->Category</td></tr>";
                    echo "<tr><td>View</td><td>$unit->View</td></tr>";
                    echo "<tr><td>Floor</td><td>$unit->Floor</td></tr>";
                    echo "<tr><td>Bedrooms</td><td>$unit->Bedrooms</td></tr>";
                    echo "<tr><td>Bathrooms</td><td>$unit->Bathrooms</td></tr>";
                    echo "<tr><td>UnitArea</td><td>$unit->UnitArea</td></tr>";
                    echo "<tr><td>BalconyArea</td><td>$unit->BalconyArea</td></tr>";
                    echo "<tr><td>TotalArea</td><td>" . ($unit->UnitArea + $unit->BalconyArea) . "</td></tr>";
                    echo "<tr><td>Price</td><td>$unit->Price</td></tr>";
                    echo "<tr><td>Status</td><td>$unit->Status</td></tr>";
                    ?>
                </table>
                <form method="post" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $unit->id }}">
                    <!-- Name Field -->
                    
                    <label>Amenities:</label>
                    <ul>
                        <?php
                        $unit_amenity = explode('|', $unit->amenities);
                        foreach ($amenities as $value) {
                            ?>
                            <li style="padding: 3px ; list-style: none; display: inline-block;">
                                <label><input type='checkbox' name='amenities[]' value='<?= $value ?>' <?= in_array($value, $unit_amenity) ? 'checked' : '' ?> >&nbsp;&nbsp;<?= $value ?></label>
                            </li>
                        <?php } ?>
                    </ul>
                    <small style="color:red">Please select at least one option</small><br/>

                    <label>NearBy:</label>
                    <ul>
                        <?php
                        $unit_nearby = explode('|', $unit->nearby);
                        foreach ($nearby as $value) {
                            ?>
                            <li style="padding: 3px ; list-style: none; display: inline-block;">
                                <label><input type='checkbox' name='nearby[]' value='<?= $value ?>' <?= in_array($value, $unit_nearby) ? 'checked' : '' ?> >&nbsp;&nbsp;<?= $value ?></label>
                            </li>
                        <?php } ?>
                    </ul>
                    <small style="color:red">Please select at least one option</small><br/>

                    <!-- Name Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('title', 'Title:') !!}
                        {!! Form::text('title', $unit->title, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Slug Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::textarea('description',$unit->description, ['class' => 'form-control','rows'=>'10']) !!}
                    </div>

                    <!-- Name Field -->
                    <div class="form-group col-sm-12">
                        <label>Video Url:</label>
                        <input type="url" name="video" class="form-control" value="{{!empty($unit->video)?$unit->video:$property->video_url}}" />
                    </div>

                    <!-- Name Field -->
                    <div class="form-group col-sm-12">
                        <label>View 360 Url:</label>
                        <input type="url" name="view360" class="form-control" value="{{!empty($unit->view360)?$unit->view360:$property->views_360}}" />
                    </div>

                    <!-- Status Field -->
                    <div class="form-group col-sm-12">
                        <ul id="sortable" style="padding: 0;">
                            <?php foreach ($images as $k => $image) { ?>
                                <li style="padding: 5px; list-style: none; display: inline-block;"><input type='hidden' name='images[<?= $k ?>]' value='<?= $image ?>'><img src='<?= $image ?>' width='100'></li>
                            <?php } ?>
                        </ul>                       
                    </div>

                    <!-- Submit Field -->
                    <div class="form-group col-sm-12 text-center">
                        <input type="hidden" name="property_id" value="{{$unit->property_id}}"/>
                        <button type="submit" name="submit" value="Update" class="btn btn-primary">Update</button>
                        <a href="{!! route('admin.sale-center.wishlist') !!}" class="btn btn-default">Back</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
@stop



{{-- page level scripts --}}
@section('footer_scripts')


<script>
    jQuery(document).ready(function () {
        $('#sortable').sortable();
    });
</script>
@stop

