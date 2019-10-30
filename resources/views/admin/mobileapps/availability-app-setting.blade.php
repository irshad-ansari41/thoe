@extends('admin/layouts/default')

@section('title')
Availability list App
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Availability App Setting</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>availability-list</li>
        <li class="active">Option List</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Option List
                </h4>
                <div class="pull-right">
                    <a href="{{ URL::to('/admin/availability-app-setting') }}" class="btn btn-sm btn-default hidden">Reset</a>
                    <a href="{{ URL::to('/availability-list') }}" class="btn btn-sm btn-default"  target="_blank"><span class="glyphicon glyphicon-view"></span>View App Online</a>
                </div>
            </div>
            <br />
            <div class="panel-body table-responsive">
                {!! Form::open(['route' => 'availability-app-setting.store', 'id'=>'setting-form']) !!}
                <!-- Facts & Floor Plans Field -->
                <!-- Area Id Field -->
                <div class="row">
                    <!-- Property Type Id Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('AVL_APP_BASE_URL', 'BASE URL:') !!}
                        <?php $AVL_APP_BASE_URL = !empty($setting->AVL_APP_BASE_URL) ? $setting->AVL_APP_BASE_URL : 'http://azizidevelopments.in'; ?>
                        {!! Form::text('AVL_APP_BASE_URL', $AVL_APP_BASE_URL, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Property Type Id Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('AVL_APP_API_URL', 'API URL:') !!}
                        <?php $AVL_APP_API_URL = !empty($setting->AVL_APP_API_URL) ? $setting->AVL_APP_API_URL : 'http://azizidevelopments.in/api/v1'; ?>
                        {!! Form::text('AVL_APP_API_URL', $AVL_APP_API_URL, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Property Type Id Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('property_type_id', 'App Web URL:') !!}
                        <?php $AVL_APP_WEB_URL = !empty($setting->AVL_APP_WEB_URL) ? $setting->AVL_APP_WEB_URL : 'http://azizidevelopments.in/availability-list/'; ?>
                        {!! Form::text('AVL_APP_WEB_URL', $AVL_APP_WEB_URL, ['class' => 'form-control']) !!}
                    </div>


                    <!-- Property Type Id Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('AVL_APP_ONLINE_PAYMENT', 'Online Payment URL') !!}
                        <?php $AVL_APP_ONLINE_PAYMENT_URL = !empty($setting->AVL_APP_ONLINE_PAYMENT_URL) ? $setting->AVL_APP_ONLINE_PAYMENT_URL : 'https://azizidevelopments.com/online-payments'; ?>
                        {!! Form::text('AVL_APP_ONLINE_PAYMENT_URL', $AVL_APP_ONLINE_PAYMENT_URL, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Property Type Id Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('AVL_APP_PLAY_STORE_APP_URL', 'Play Store(Android) App URL:') !!}
                        <?php $AVL_APP_PLAY_STORE_APP_URL = !empty($setting->AVL_APP_PLAY_STORE_APP_URL) ? $setting->AVL_APP_PLAY_STORE_APP_URL : 'https://play.google.com/store/apps/details?id=com.phonegap.azizi.availabilitylist'; ?>
                        {!! Form::text('AVL_APP_PLAY_STORE_APP_URL', $AVL_APP_PLAY_STORE_APP_URL, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Property Type Id Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('AVL_APP_APP_STORE_APP_URL', 'App Store(iOS) App URL:') !!}
                        <?php $AVL_APP_APP_STORE_APP_URL = !empty($setting->AVL_APP_APP_STORE_APP_URL) ? $setting->AVL_APP_APP_STORE_APP_URL : 'https://itunes.apple.com/us/app/availability-list/id1294085749?ls=1&mt=8'; ?>
                        {!! Form::text('AVL_APP_APP_STORE_APP_URL', $AVL_APP_APP_STORE_APP_URL, ['class' => 'form-control']) !!}
                    </div>


                    <div class="form-group col-sm-12">
                        {!! Form::label('AVL_APP_ANDROID_APP_VERSION', 'App Version Play Store(Android):') !!}
                        <?php $AVL_APP_ANDROID_APP_VERSION = !empty($setting->AVL_APP_ANDROID_APP_VERSION) ? $setting->AVL_APP_ANDROID_APP_VERSION : '1.0.0'; ?>
                        {!! Form::text('AVL_APP_ANDROID_APP_VERSION', $AVL_APP_ANDROID_APP_VERSION,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::label('AVL_APP_IOS_APP_VERSION', 'App Version APP Store(iOS):') !!}
                        <?php $AVL_APP_IOS_APP_VERSION = !empty($setting->AVL_APP_IOS_APP_VERSION) ? $setting->AVL_APP_IOS_APP_VERSION : '1.0.0'; ?>
                        {!! Form::text('AVL_APP_IOS_APP_VERSION', $AVL_APP_IOS_APP_VERSION,['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('AVL_APP_ANDROID_AUTO_LOGIN', 'Android App Auto Login:') !!} &nbsp;
                        <?php $yes = !empty($setting->AVL_APP_ANDROID_AUTO_LOGIN) && $setting->AVL_APP_ANDROID_AUTO_LOGIN == 'Yes' ? true : false; ?>
                        <?php $no = !empty($setting->AVL_APP_ANDROID_AUTO_LOGIN) && $setting->AVL_APP_ANDROID_AUTO_LOGIN == 'No' ? true : false; ?>
                        {!! Form::radio('AVL_APP_ANDROID_AUTO_LOGIN','Yes', $yes,['class' => '']) !!} Yes&nbsp;&nbsp;&nbsp;
                        {!! Form::radio('AVL_APP_ANDROID_AUTO_LOGIN','No', $no,['class' => '']) !!} No 
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('AVL_APP_IOS_AUTO_LOGIN', 'iOS App Auto Login:') !!}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php $yes1 = !empty($setting->AVL_APP_IOS_AUTO_LOGIN) && $setting->AVL_APP_IOS_AUTO_LOGIN == 'Yes' ? true : false; ?>
                        <?php $no1 = !empty($setting->AVL_APP_IOS_AUTO_LOGIN) && $setting->AVL_APP_IOS_AUTO_LOGIN == 'No' ? true : false; ?>
                        {!! Form::radio('AVL_APP_IOS_AUTO_LOGIN','Yes', $yes1,['class' => '']) !!} Yes&nbsp;&nbsp;&nbsp;
                        {!! Form::radio('AVL_APP_IOS_AUTO_LOGIN','No', $no1,['class' => '']) !!} No  
                    </div>
                    <div class="form-group col-sm-12" style='color: orange;margin-bottom: 0;'>
                        {!! Form::label('AVL_APP_WHATSAPP_DETAILS', 'WhatsApp Details:') !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('AVL_APP_WHATSAPP_NAME', 'Person NAME:') !!}
                        <?php $AVL_APP_WHATSAPP_NAME = !empty($setting->AVL_APP_WHATSAPP_NAME) ? $setting->AVL_APP_WHATSAPP_NAME : 'IRSHAD'; ?>
                        {!! Form::text('AVL_APP_WHATSAPP_NAME', $AVL_APP_WHATSAPP_NAME,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-8">
                        {!! Form::label('AVL_APP_WHATSAPP_NUMBER', 'WhatsApp Number:') !!}
                        <?php $AVL_APP_WHATSAPP_NUMBER = !empty($setting->AVL_APP_WHATSAPP_NUMBER) ? $setting->AVL_APP_WHATSAPP_NUMBER : '+971564792286'; ?>
                        {!! Form::text('AVL_APP_WHATSAPP_NUMBER', $AVL_APP_WHATSAPP_NUMBER,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-12" style='color: orange;margin-bottom: 0;'>
                        {!! Form::label('AVL_APP_PHONE_DETALS', 'Phone Details:') !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('AVL_APP_PHONE_NAME', 'Person Name:') !!}
                        <?php $AVL_APP_PHONE_NAME = !empty($setting->AVL_APP_PHONE_NAME) ? $setting->AVL_APP_PHONE_NAME : 'IRSHAD'; ?>
                        {!! Form::text('AVL_APP_PHONE_NAME', $AVL_APP_PHONE_NAME,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-8">
                        {!! Form::label('AVL_APP_PHONE_NUMBER', 'Phone Number:') !!}
                        <?php $AVL_APP_PHONE_NUMBER = !empty($setting->AVL_APP_PHONE_NUMBER) ? $setting->AVL_APP_PHONE_NUMBER : '+971564792286'; ?>
                        {!! Form::text('AVL_APP_PHONE_NUMBER', $AVL_APP_PHONE_NUMBER,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-12" style='color: orange;margin-bottom: 0;'>
                        {!! Form::label('AVL_APP_EMAIL_DETAILS', 'Email Details:') !!}
                    </div>
                    <!-- Property Type Id Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('AVL_APP_EMAIL_NAME', 'Person Name:') !!}
                        <?php $AVL_APP_EMAIL_NAME = !empty($setting->AVL_APP_EMAIL_NAME) ? $setting->AVL_APP_EMAIL_NAME : 'Irshad'; ?>
                        {!! Form::text('AVL_APP_EMAIL_NAME', $AVL_APP_EMAIL_NAME, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-8">
                        {!! Form::label('property_type_id', 'Email Address:') !!}
                        <?php $AVL_APP_EMAIL_ADDRESS = !empty($setting->AVL_APP_EMAIL_ADDRESS) ? $setting->AVL_APP_EMAIL_ADDRESS : 'irshad.ansari@azizideveloments.com'; ?>
                        {!! Form::text('AVL_APP_EMAIL_ADDRESS', $AVL_APP_EMAIL_ADDRESS, ['class' => 'form-control']) !!}
                    </div>

                </div>
                <!-- Submit Field -->
                <div class="form-group col-sm-12"><br/><br/>
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{!! route('admin.availability-app-setting.index') !!}" class="btn btn-default">Cancel</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@stop


