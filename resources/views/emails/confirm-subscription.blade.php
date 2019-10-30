@extends('layouts.email-master')

@section('content')

<p style='font-size: 16px;padding: 0 10px;'>Hi <?= $data['name'] ?>,</p><br/>
<p style='font-size: 16px;padding: 0 10px;'></p>
<p style="font-size: 16px;padding: 0 10px;">We have received a request from this email address to get our regular newsletter updates. To complete the subscription process please <a href="<?= $data['nl_url'] ?>">click here</a> to confirm.</p>
<br/>
<p style="font-size: 16px;padding: 0 10px;">If you cannot click the link above, please copy and paste the following link to your browser.<br/><br/>
    <a href="<?= $data['nl_url'] ?>"><?= $data['nl_url'] ?></a><br/><br/>
<p style="font-size: 16px;padding: 0 10px;">If you did not make this subscription request, just ignore this message.</p><br/><br/>
<p style="font-size: 16px;padding: 0 10px;">Thank you!<br/><br/><strong>The Azizi Developments Team</strong><br/><?= $data['site_url'] ?></p><br/><br/>

@stop 