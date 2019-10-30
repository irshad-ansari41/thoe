@extends('admin/layouts/default')

@section('title')
Azizi App
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Azizi App Setting</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>azizi-app</li>
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
                    <a href="{{ URL::to('/admin/azizi-app-setting') }}" class="btn btn-sm btn-default hidden">Reset</a>
                    <a href="{{ URL::to('/azizidevelopments') }}" class="btn btn-sm btn-default"  target="_blank"><span class="glyphicon glyphicon-view"></span>View App Online</a>
                </div>
            </div>
            <br />
            <div class="panel-body table-responsive">
                {!! Form::open(['route' => 'azizi-app-setting.store', 'id'=>'setting-form']) !!}
                <!-- Facts & Floor Plans Field -->
                <!-- Area Id Field -->
                <div class="row">
                    <!-- Property Type Id Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('AZD_APP_BASE_URL', 'BASE URL:') !!}
                        <?php $AZD_APP_BASE_URL = !empty($setting->AZD_APP_BASE_URL) ? $setting->AZD_APP_BASE_URL : 'http://azizidevelopments.in'; ?>
                        {!! Form::text('AZD_APP_BASE_URL', $AZD_APP_BASE_URL, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Property Type Id Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('AZD_APP_API_URL', 'API URL:') !!}
                        <?php $AZD_APP_API_URL = !empty($setting->AZD_APP_API_URL) ? $setting->AZD_APP_API_URL : 'http://azizidevelopments.in/api/v1'; ?>
                        {!! Form::text('AZD_APP_API_URL', $AZD_APP_API_URL, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Property Type Id Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('property_type_id', 'App Web URL:') !!}
                        <?php $AZD_APP_WEB_URL = !empty($setting->AZD_APP_WEB_URL) ? $setting->AZD_APP_WEB_URL : 'http://azizidevelopments.in/azizidevelopments/'; ?>
                        {!! Form::text('AZD_APP_WEB_URL', $AZD_APP_WEB_URL, ['class' => 'form-control']) !!}
                    </div>


                    <!-- Property Type Id Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('AZD_APP_ONLINE_PAYMENT', 'Online Payment URL') !!}
                        <?php $AZD_APP_ONLINE_PAYMENT_URL = !empty($setting->AZD_APP_ONLINE_PAYMENT_URL) ? $setting->AZD_APP_ONLINE_PAYMENT_URL : 'https://azizidevelopments.com/online-payments'; ?>
                        {!! Form::text('AZD_APP_ONLINE_PAYMENT_URL', $AZD_APP_ONLINE_PAYMENT_URL, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Property Type Id Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('AZD_APP_PLAY_STORE_APP_URL', 'Play Store(Android) App URL:') !!}
                        <?php $AZD_APP_PLAY_STORE_APP_URL = !empty($setting->AZD_APP_PLAY_STORE_APP_URL) ? $setting->AZD_APP_PLAY_STORE_APP_URL : 'https://play.google.com/store/apps/details?id=com.azizi.developments'; ?>
                        {!! Form::text('AZD_APP_PLAY_STORE_APP_URL', $AZD_APP_PLAY_STORE_APP_URL, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Property Type Id Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('AZD_APP_APP_STORE_APP_URL', 'App Store(iOS) App URL:') !!}
                        <?php $AZD_APP_APP_STORE_APP_URL = !empty($setting->AZD_APP_APP_STORE_APP_URL) ? $setting->AZD_APP_APP_STORE_APP_URL : 'https://itunes.apple.com/us/app/azizi-developments/id1287021117?ls=1&mt=8'; ?>
                        {!! Form::text('AZD_APP_APP_STORE_APP_URL', $AZD_APP_APP_STORE_APP_URL, ['class' => 'form-control']) !!}
                    </div>


                    <div class="form-group col-sm-12">
                        {!! Form::label('AZD_APP_ANDROID_APP_VERSION', 'App Version Play Store(Android):') !!}
                        <?php $AZD_APP_ANDROID_APP_VERSION = !empty($setting->AZD_APP_ANDROID_APP_VERSION) ? $setting->AZD_APP_ANDROID_APP_VERSION : '1.0.0'; ?>
                        {!! Form::text('AZD_APP_ANDROID_APP_VERSION', $AZD_APP_ANDROID_APP_VERSION,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::label('AZD_APP_IOS_APP_VERSION', 'App Version APP Store(iOS):') !!}
                        <?php $AZD_APP_IOS_APP_VERSION = !empty($setting->AZD_APP_IOS_APP_VERSION) ? $setting->AZD_APP_IOS_APP_VERSION : '1.0.0'; ?>
                        {!! Form::text('AZD_APP_IOS_APP_VERSION', $AZD_APP_IOS_APP_VERSION,['class' => 'form-control']) !!}
                    </div>


                    <div class="form-group col-sm-12">
                        {!! Form::label('AZD_APP_ANDROID_AUTO_LOGIN', 'Android App Auto Login:') !!} &nbsp;
                        <?php $yes = !empty($setting->AZD_APP_ANDROID_AUTO_LOGIN) && $setting->AZD_APP_ANDROID_AUTO_LOGIN == 'Yes' ? true : false; ?>
                        <?php $no = !empty($setting->AZD_APP_ANDROID_AUTO_LOGIN) && $setting->AZD_APP_ANDROID_AUTO_LOGIN == 'No' ? true : false; ?>
                        {!! Form::radio('AZD_APP_ANDROID_AUTO_LOGIN','Yes', $yes,['class' => '']) !!} Yes&nbsp;&nbsp;&nbsp;
                        {!! Form::radio('AZD_APP_ANDROID_AUTO_LOGIN','No', $no,['class' => '']) !!} No 
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('AZD_APP_IOS_AUTO_LOGIN', 'iOS App Auto Login:') !!}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php $yes1 = !empty($setting->AZD_APP_IOS_AUTO_LOGIN) && $setting->AZD_APP_IOS_AUTO_LOGIN == 'Yes' ? true : false; ?>
                        <?php $no1 = !empty($setting->AZD_APP_IOS_AUTO_LOGIN) && $setting->AZD_APP_IOS_AUTO_LOGIN == 'No' ? true : false; ?>
                        {!! Form::radio('AZD_APP_IOS_AUTO_LOGIN','Yes', $yes1,['class' => '']) !!} Yes&nbsp;&nbsp;&nbsp;
                        {!! Form::radio('AZD_APP_IOS_AUTO_LOGIN','No', $no1,['class' => '']) !!} No  
                    </div>
                    <div class="form-group col-sm-12" style='color: orange;margin-bottom: 0;'>
                        {!! Form::label('AZD_APP_WHATSAPP_DETAILS', 'WhatsApp Details:') !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('AZD_APP_WHATSAPP_NAME', 'Person NAME:') !!}
                        <?php $AZD_APP_WHATSAPP_NAME = !empty($setting->AZD_APP_WHATSAPP_NAME) ? $setting->AZD_APP_WHATSAPP_NAME : 'IRSHAD'; ?>
                        {!! Form::text('AZD_APP_WHATSAPP_NAME', $AZD_APP_WHATSAPP_NAME,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-8">
                        {!! Form::label('AZD_APP_WHATSAPP_NUMBER', 'WhatsApp Number:') !!}
                        <?php $AZD_APP_WHATSAPP_NUMBER = !empty($setting->AZD_APP_WHATSAPP_NUMBER) ? $setting->AZD_APP_WHATSAPP_NUMBER : '+971564792286'; ?>
                        {!! Form::text('AZD_APP_WHATSAPP_NUMBER', $AZD_APP_WHATSAPP_NUMBER,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-12" style='color: orange;margin-bottom: 0;'>
                        {!! Form::label('AZD_APP_PHONE_DETALS', 'Phone Details:') !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('AZD_APP_PHONE_NAME', 'Person Name:') !!}
                        <?php $AZD_APP_PHONE_NAME = !empty($setting->AZD_APP_PHONE_NAME) ? $setting->AZD_APP_PHONE_NAME : 'IRSHAD'; ?>
                        {!! Form::text('AZD_APP_PHONE_NAME', $AZD_APP_PHONE_NAME,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-8">
                        {!! Form::label('AZD_APP_PHONE_NUMBER', 'Phone Number:') !!}
                        <?php $AZD_APP_PHONE_NUMBER = !empty($setting->AZD_APP_PHONE_NUMBER) ? $setting->AZD_APP_PHONE_NUMBER : '+971564792286'; ?>
                        {!! Form::text('AZD_APP_PHONE_NUMBER', $AZD_APP_PHONE_NUMBER,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-12" style='color: orange;margin-bottom: 0;'>
                        {!! Form::label('AZD_APP_EMAIL_DETAILS', 'Email Details:') !!}
                    </div>
                    <!-- Property Type Id Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('AZD_APP_EMAIL_NAME', 'Person Name:') !!}
                        <?php $AZD_APP_EMAIL_NAME = !empty($setting->AZD_APP_EMAIL_NAME) ? $setting->AZD_APP_EMAIL_NAME : 'Irshad'; ?>
                        {!! Form::text('AZD_APP_EMAIL_NAME', $AZD_APP_EMAIL_NAME, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-8">
                        {!! Form::label('property_type_id', 'Email Address:') !!}
                        <?php $AZD_APP_EMAIL_ADDRESS = !empty($setting->AZD_APP_EMAIL_ADDRESS) ? $setting->AZD_APP_EMAIL_ADDRESS : 'irshad.ansari@azizideveloments.com'; ?>
                        {!! Form::text('AZD_APP_EMAIL_ADDRESS', $AZD_APP_EMAIL_ADDRESS, ['class' => 'form-control']) !!}
                    </div>

                </div>
                <!-- Submit Field -->
                <div class="form-group col-sm-12"><br/><br/>
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{!! route('admin.azizi-app-setting.index') !!}" class="btn btn-default">Cancel</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@stop


