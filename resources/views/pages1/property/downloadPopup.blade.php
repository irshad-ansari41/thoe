
<?php
$modal_id = "$type";
$form_id = "$type-form";
$week = date('i') + 4;
?>
<!-- Enquire Now -->
<!--<a href="#<?= $modal_id ?>" class="waves-effect waves-light btn modal-trigger">?</a>-->
<div id="<?= $modal_id ?>" class="modal modal1 small" style="max-height: 100%; top:0.5%; max-width: 340px">
    <div class="modal-content book-now">
        <div class="modal-header" style="border: none;">
            <a href="#" class="modal-close waves-effect waves-green btn-flat " style="width: 14px; position: absolute; right: 0px; font-size: 30px; top: 0;">&times;</a>
        </div>
        <form id="<?= $form_id ?>" method="post">
            <div class="row">
                <div class="col s12">
                    <div class="input-field col s12" style="border: 1px solid #e4e4e4;border-radius: 2px;">
                        <input type="text" autocomplete="off" autocomplete="off" class="autocomplete"  placeholder="Name*" name="name" required>
                    </div>
                </div>

                <div class="col s12">
                    <div class="input-field col s12" style="border: 1px solid #e4e4e4;border-radius: 2px;">
                        <input type="email" id="autocomplete-input" class="autocomplete" placeholder="Email*" name="email" required>
                    </div>
                </div>

                <div class="col s12">
                    <div class="input-field col s12" style="border: 1px solid #e4e4e4;border-radius: 2px;margin-bottom:0">
                        <input type="text" id="autocomplete-input" class="autocomplete" placeholder="Phone*" minlength="8" maxlength="15" name="phone" pattern="\d*" required>
                    </div>
                    <small style='color:red'>Please write country code  with phone number.</small>
                </div>
                <br/><br/><br/>
                <div class="col s12">
                    <button type="submit" class="inquire az-btn active" style="margin: 7px 0px;" >Submit</button>
                    <input type="hidden" name='source' value="Website Download" />
                    <input type="hidden" name='campaign' id="dp-campaign" value="" />
                    {{ csrf_field() }}
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End -->
@push('scripts')

$("#<?= $form_id ?>").on("submit", function () {
$('#dp-campaign').val(sessionStorage.getItem("utm_campaign"));
var formData = $(this).serialize();
var fileUrl = "<?= $link ?>";
var pageUrl = "<?= Request::url() ?>";
$(".inquire").text("Please wait...").prop("disabled", true);
$.ajax({
type: "POST",
data: formData,
url: "<?=SITE_URL?>/save-lead",
datatype: "json",
success: function (data) {
if (data.status === "success") {
$(".inquire").text("Done");
localStorage.setItem("hide_popup","<?=$week?>");
window.open(fileUrl, "_blank");
setTimeout(function () {
window.top.location.href = pageUrl;
}, 3000);
} else {
$(".inquire").text("Download");
return false;
}
}
});
return false;
});

$("input[name=phone]").keyup(function () {
if ($(this).val().length >= 6) {
$(this).val(parseInt($(this).val()));
}
});



@endpush