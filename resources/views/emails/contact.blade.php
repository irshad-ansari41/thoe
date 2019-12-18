@extends('emails/layouts/default')

@section('content')

<p>Dear Team,</p>

<br/>

<p>Following are the details of user who wants to contact you.</p>

<p>The contact details are:</p>

<p>Name: <strong>{{ !empty($data['first_name'])?$data['first_name']:'' }} {{ !empty($data['last_name'])?$data['last_name']:'' }}</strong></p>

<p>Email: <strong>{{ !empty($data['email'])?$data['email']:'' }}</strong></p>

<p>Phone: <strong>{{ !empty($data['phone'])?$data['phone']:'' }}</strong></p>

<?= !empty($data['country']) ? '<p>Country: <strong>' . $data['country'] . '</strong></p>' : '' ?>

<?= !empty($data['intention']) ? '<p>Intention: <strong>' . $data['intention'] . '</strong></p>' : '' ?>

<?= !empty($data['message']) ? '<p>Message: <strong>' . $data['message'] . '</strong></p>' : '' ?>

<br/><br/>

<p>Thanks<br/>
    Thoe Development Team <br/>
</p>

@stop
