<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<article>
    <h3><?= trans('words.Newsletter Sign Up') ?></h3>
    <form id="nl-form" method="post" action="{{route('newsletter-subscribe')}}">
        {{ csrf_field() }}
        <table id="nl" style="width:100%">
            <tr>
                <td style="padding-right: 8px!important;"><input class="form-control nl-name" type="text" name="first_name" id="first-name" size="30" placeholder="<?= trans('words.firstname_validation_msg') ?>" >
                    <small  class="txt-red valid" id='msg-first-name'><?= trans('words.firstname_validation_msg') ?>.</small></td>
                <td style="padding-left: 8px!important;"><input class="form-control nl-name" type="text" name="last_name" id="last-name" size="30" placeholder="<?= trans('words.lastname_validation_msg') ?>" >
                    <small  class="txt-red valid" id='msg-last-name'><?= trans('words.lastname_validation_msg') ?>.</small></td>
            </tr>
            <tr>
                <td colspan="2"><input class="form-control nl-email" type="email" name="email" id="email" size="30" placeholder="<?= trans('words.email_address_validation_msg') ?>"  pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$">
                    <small  class="txt-red valid" id='msg-email'><?= trans('words.email_address_validation_msg') ?>.</small></td>
            </tr>
            <tr>
                <td colspan="2"><button class="nl-submit btn btn-primary" type="submit" value="Subscribe"><?= trans('words.Subscribe') ?></button></td>
            </tr>
        </table>
    </form>
    <div id='sub-msg'></div>
</article>

@push('scripts')

$('#first-name,#last-name,#email').on('keyup change', function () {
if ($('#first-name').val() !== '') {
$('#msg-first-name').removeClass('invalid').addClass('valid');
}
if ($('#last-name').val() !== '') {
$('#msg-last-name').removeClass('invalid').addClass('valid');
}
if ($('#email').val() !== '') {
$('#msg-email').removeClass('invalid').addClass('valid');
}

});

$('#nl-form').on('submit', function () {

if ($('#first-name').val() === '') {
$('#msg-first-name').addClass('invalid');
return false;
}else if ($('#last-name').val() === '') {
$('#msg-last-name').addClass('invalid');
return false;
} else if ($('#email').val() === '') {
$('#msg-email').addClass('invalid');
return false;
} 

var formData = $(this).serialize();

$('.nl-submit').text('Sending...').prop("disabled", true);
sendMyAjax('<?= SITE_URL ?>/en/newsletter/subscribe', formData);
return false;
});

function sendMyAjax(URL_address, formData) {
$.ajax({
type: 'POST',
data: formData,
url: URL_address,
datatype: 'json',
success: function (data) {
if (data.status === 'success') {
$('.nl-submit').text('Sent');
$('#nl-form').hide();
$('#sub-msg').html(data.msg);
} else {
$('.nl-submit').text('Subscribe');
return false;
}
}
});
}

@endpush