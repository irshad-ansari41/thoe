@extends('emails/layouts/default')

@section('content')
    <p>Dear Agency Dept ,</p>
    <p>Please find client details below.</p>
    <div style="padding-left: 20px">
    
    <p>Client Name: {{$client_name}}</p>
    <p>Client Email: {{$client_email}}</p>
    <p>Client Phone Number: {{$client_phone}}</p>
    <p>Client Passport ID: {{$client_passport_id}}</p>
    <p>Client Emirates ID: {{$client_emirates_id}}</p>
    <p></p>
    <p>Agency Name: {{$agency_name}}</p>
    <p>Agent Name: {{$agent_name}}</p>
    <p>Agent Email: {{$agent_email}}</p>
    <p>Agent Phone Number: {{$agent_phone}}</p>
    </div>
    <p>Thanks</p>
    <p>Azizi Developments</p>

@stop
