<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form id="get-in-touch" action="<?= url("$locale/get-in-touch") ?>"  class="form form--flex form--search js-search-form form--sidebar">
    @csrf
    <div class="row">
        <div class="form-group">
            <label for="in-keyword" class="control-label">Full Name</label>
            <input type="text" id="in-keyword" placeholder="John Carter" class="form-control" required="required">
        </div>
        <div class="form-group">
            <label for="in-keyword" class="control-label">Mobile</label>
            <input type="text" id="in-keyword" placeholder="+97150" class="form-control" required="required">
        </div>
        <div class="form-group">
            <label for="in-keyword" class="control-label">Email</label>
            <input type="email" id="in-keyword" placeholder="name@name.com" class="form-control" required="required">
        </div>
        <div class="form-group">
            <label for="in-keyword" class="control-label">Intention</label>
            <select id="in-contract-type" data-placeholder="Register interest for" class="form-control" required="required">
                <option label=""></option>
                <option>Investments</option>
                <option>Real Estate Brokers</option>
                <option>Suppliers</option>
                <option>Careers</option>
            </select>
        </div>
        <div id="response-msg" class="hiddedn"></div>
        <div class="form__buttons">
            <button type="submit" class="button__action ui__button ui__button--3">Register Interest</button>
        </div>
    </div>
</form>

@push('custom_script')
<script>
    $('#get-in-touch').on('submit', function () {
        $.ajax({
            type: 'POST',
            data: $(this).serialize(),
            url: $(this).attr('action'),
            datatype: 'json',
            success: function (data) {
                if (data.status === 'success') {
                    $('.form__submit').text('Sent');
                    $('#response-msg').text(data.msg).removeClass('hidden').addClass('text-green');
                    setTimeout(function () {
                        $('.submit-btn').text('Register Interest');
                        $('#response-msg').addClass('hidden');
                        $('#get-in-touch').reset();
                    }, 3000);
                } else if (data.status === 'failed') {
                    $('#response-msg').text(data.error).removeClass('hidden').addClass('text-red');
                    $('.form__submit').text('Register Interest').removeProp("disabled");
                } else {
                    $('.submit-btn').text('Register Interest');
                    return false;
                }
            }
        });
        return false;
    });
</script>
@endpush