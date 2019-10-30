<!-- Trigger the modal with a button -->
<button id="popupSlider" type="button" class="btn btn-info btn-lg hidden" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="modelPopupSlider" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" style="margin: 80px auto 0!important">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="position: absolute; right: 0; top: 0; z-index: 9999; background: rgba(0,0,0,0.7); padding: 7px 12px; border: 0;">
                <button id="btn-popup" type="button" class="close" data-dismiss="modal" style="color: #fff;opacity: 1;">&times;</button>
            </div>

            <div class="modal-body" style="padding:0">
                <div class="videoWrapper">
                    <iframe id='videoURL' src="#" frameborder="0" allow="accelerometer; autoplay; loop; encrypted-media; gyroscope; picture-in-picture" allowfullscreen border="0" style="border:0"></iframe>
                </div>
                <div class="row">
                    <div class="col-sm-10" style="padding-right: 0">
                        <a id="learnMore" data-toggle="modal" data-target="#lead-form-model" class="btn btn-primary btn-block" href="#" style="height: 30px; border-radius: 0; padding: 5px; font-size: 12px;margin:0;">Learn More</a>
                    </div>
                    <div class="col-sm-2" style="padding-left: 0">
                        <button id="btn-popup" type="button" class="close btn btn-danger btn-block" style="background: #d9534f;height: 30px; border-radius: 0; padding: 5px; font-size: 12px;margin:0;color: #fff;opacity: 1;" data-dismiss="modal" style="">Close</button>
                    </div>
                </div>


            </div>

        </div>

    </div>
</div>