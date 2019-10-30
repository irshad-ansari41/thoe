/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    $('.lead_source').val(sessionStorage.getItem("utm_source"));
    $('.lead_campaign').val(sessionStorage.getItem("utm_campaign"));
    $('.lead_url').val(sessionStorage.getItem("lead_url"));
});

$(document).ready(function () {

    // Chosen validation
    $('.chosen-select').chosen();

    $('.chosen-search-input').on('input', function () {
        if ($(this).val().length >= 3 && !isNaN($(this).val())) {
            $(this).val(parseInt($(this).val()));
        }
    });
});

$('input[name="mobile"]').keyup(function () {
    if ($(this).val().length >= 6) {
        $(this).val(parseInt($(this).val()));
    }
});


$('#country').chosen().change(changeCountry);
$('#country').change(changeCountry);

// this function is run when the country changes
function changeCountry() {
    var code = $('#country').find(':selected').attr('data-code');
    $(`#country_code option[value='${code}']`).attr('selected', true);
    $('#country_code').trigger("chosen:updated");
    var t = $('#country_code_chosen .chosen-single span').text().replace(/ *\([^)]*\) */g, "");
    $('#country_code_chosen .chosen-single span').text(t);
}

$('#country_code').chosen().change(changeCountryCode);
$('#country_code').change(function changeCountryCode() {
    var name = $('#country_code').find(':selected').attr('data-name');
    $(`#country option[value='${name}']`).attr('selected', true);
    $('#country').trigger("chosen:updated");
    var t = $('#country_code_chosen .chosen-single span').text().replace(/ *\([^)]*\) */g, "");
    $('#country_code_chosen .chosen-single span').text(t);
});

// this function is run when the country changes
function changeCountryCode() {
    var t = $('#country_code_chosen .chosen-single span').text().replace(/ *\([^)]*\) */g, "");
    $('#country_code_chosen .chosen-single span').text(t);
}

$('#name,#email,#nationality,#country,#country_code,#mobile,#language').on('keyup change', function () {
    inputValid('name'), inputValid('email'), selectValid('country_code'), inputValid('mobile') /*, selectValid('nationality'), selectValid('country'),  selectValid('language')*/;
});

$('#lead-form').on('submit', function () {
    if (inputInvalid('name') || inputInvalid('email') || selectInvalid('country_code') || inputInvalid('mobile') /* || selectInvalid('nationality') || selectInvalid('country') || selectInvalid('language') */) {
        return false;
    }

    var formData = $(this).serialize();

    $('.submit-btn').text('Sending...').prop("disabled", true);
    sendMyAjax('https://azizidevelopments.com/save-lead', formData);
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
                $('.submit-btn').text('Sent');
                $('.alert-success').removeClass('hidden');
                setTimeout(function () {
                    window.top.location.href = sessionStorage.getItem("thank_url");
                }, 3000);
            } else if (data.status === 'failed') {
                $('#msg-captcha').text(data.msg);
                $('.submit-btn').text('Register Now').removeProp("disabled");
            } else {
                $('.submit-btn').text('Register Now');
                return false;
            }
        }
    });
}
function capitalize(str) {
    strVal = '';
    str = str.split(' ');
    for (var chr = 0; chr < str.length; chr++) {
        strVal += str[chr].substring(0, 1).toUpperCase() + str[chr].substring(1, str[chr].length) + ' ';
    }
    return strVal;
}

function inputValid(id) {
    if ($('#' + id).val() !== '') {
        $('#msg-' + id).removeClass('invalid').addClass('valid');
    }
}
function selectValid(id) {
    if ($('#' + id).val() !== '') {
        $('#msg-' + id).removeClass('invalid').addClass('valid');
        $('#' + id + '_chosen .chosen-single span').addClass('txt-444');
        $('#' + id).addClass('txt-444').removeClass('txt-888');
    }
}

function inputInvalid(id) {
    if ($('#' + id).val() === '') {
        $('#msg-' + id).addClass('invalid');
        return true;
    }
}
function selectInvalid(id) {
    if ($('#' + id).val() === '') {
        $('#msg-' + id).addClass('invalid');
        $('#' + id + '_chosen .chosen-single span').removeClass('txt-444');
        $('#' + id).removeClass('txt-444').addClass('txt-888');
        return true;
    }
}