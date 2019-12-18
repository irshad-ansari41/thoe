<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form id="newsletter-form" action="<?= url("$locale/newsletter/subscribe") ?>"  class="subscribe__form js-subscribe-form">
    @csrf
    <h4 class="subscribe__title">Receive Updates</h4>
    <div class="subscribe__group form-group">
        <label class="sr-only">Newsletters</label>
        <input type="email" placeholder="Your e-mail" name="email" id='nl-email' required data-parsley-trigger="change" class="subscribe__field form-control js-subscribe-email">
    </div>
    <button type="submit" class="btn--action subscribe__submit js-subscribe-submit">SUBMIT</button>
</form>

@push('custom_script')
<script>
    $('#newsletter-form').on('submit', function () {
        $.ajax({
            type: 'POST',
            data: $(this).serialize(),
            url: $(this).attr('action'),
            datatype: 'json',
            success: function (data) {
                if (data.status === 'success') {
                    $('#response-msg').text(data.msg).removeClass('hidden').addClass('text-green');
                    setTimeout(function () {
                        $('#response-msg').addClass('hidden');
                        $("#inl-email").val("");
                    }, 3000);
                } else if (data.status === 'failed') {
                    $('#response-msg').text(data.error).removeClass('hidden').addClass('text-red');
                } else {
                    return false;
                }
            }
        });
        return false;
    });
</script>
@endpush