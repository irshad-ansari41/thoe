<?php
$get = filter_input_array(INPUT_GET);
$dlogourl = 'https://gallery.mailchimp.com/287c3c06b2b84c4cf85b63fef/images/2229ab84-fda6-4fab-9d05-ad5a0e80713c.png';
$slogourl = SITE_URL . '/assets/images/cusicon/logos/';
$progressurl = SITE_URL . '/assets/images/cusicon/';
$victorialogo = [60, 61, 81, 82, 83, 84, 85, 86,];
$rivieralogo = [25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 65, 66, 67, 68, 69, 70, 71, 72, 74, 75, 77, 78, 79];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Construction Updates</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body style="background:#172c5b; background-color:#172c5b; width:595px; margin:0 auto; font-family:Helvetica; font-size:13px;" bgcolor="#172c5b">


        <form>

            <table width="595" border="0" align="center" style="background:#e9ecef; background-color:#e9ecef;" bgcolor="#e9ecef" 
                   cellpadding="0" cellspacing="0" >
                <tr>
                    <td colspan='4'>
                        <h1 style="font-size: 20px; text-align: center; padding: 10px 20px; margin: 0px auto; font-family:Helvetica;">
                            Construction Updates - <?= date('j F Y') ?>
                        </h1>
                        <p style="padding:15px 20px; margin:0px;">
                            Read more about the details and the latest construction updates and news of all projects that are currently being developed by Thoe Developments. 
                        </p> 
                    </td>
                </tr>

                <tr>
                    <td style="padding-left:20px;">
                        @if(!empty($Project))
                        <select name="projectname" id="projectname" class="form-control" required>
                            <option value="0">---Select Project---</option>
                            @foreach($Project as $key => $value)
                            <option value="{{$value->id}}" {{!empty($get['projectname']) && $value->id == $get['projectname'] ? 'selected':''}}>
                                {{trim($value->title_en)== 'Meydan'?'Thoe Riviera':trim($value->title_en)}}
                            </option>
                            <?php
                            if ($get['projectname'] == $value->id) {
                                $gallery_location_area = $value->gallery_location;
                                $header_image = SITE_URL . '/assets/images/properties/' . $gallery_location_area;
                                $holder_image = SITE_URL . '/assets/images/properties/' . $gallery_location_area;
                            }
                            ?>

                            @endforeach 
                        </select>
                        @endif
                    </td>

                    <td colspan="2"></td>

                    <td align="right" style="padding-right:20px;">

                        @if(!empty($Properties))
                        <select name="buildingname" id="buildingname" class="form-control" required>
                            <option value="Select Building">---Select Project---</option>
                            @foreach($Properties as $key => $value)
                            <option value="{{$value->id}}" {{!empty($get['buildingname']) && $value->id == $get['buildingname'] ? 'selected':''}} 
                                data-projectid="{{$value->project_id}}">{{trim($value->title_en)}}
                            </option>
                            <?php
                            if ($get['buildingname'] == $value->id) {
                                $structure_percentage = $value->structure_percentage;
                                $mep_percentage = $value->mep_percentage;
                                $finishes_percentage = $value->finishes_percentage;
                                $gallery_location = $value->gallery_location;
                                $header_image .= '/' . $gallery_location . '/' . $value->header_image;
                                $holder_image .= '/' . $gallery_location . '/' . $value->holder_image;
                            }
                            ?>
                            @endforeach 
                        </select>
                        @endif

                    </td>

                </tr>

                <tr>

                    <td style="padding:10px 0px 10px 15px;">
                        <label class="form-check-label" for="check1">
                            <input type="checkbox" class="form-check-input" id="check1" name="MOBILIZATION" value="MOBILIZATION" {{!empty($get['MOBILIZATION']) ? 'checked':'checked'}}>
                            MOBILIZATION
                        </label>
                    </td>

                    <td style="padding:10px 0px 10px 15px;">
                        <label class="form-check-label" for="check1">
                            <input type="checkbox" class="form-check-input" id="check1" name="GROUND" value="GROUND WORK" {{!empty($get['GROUND']) ? 'checked':'checked'}}>
                            STRUCTURE
                        </label>
                    </td>

                    <td style="padding:10px 0px;" align="center">
                        <label class="form-check-label" for="check2">
                            <input type="checkbox" class="form-check-input" id="check2" name="STRUCTURE" value="STRUCTURE" {{!empty($get['STRUCTURE']) ? 'checked':'checked'}}>
                            MEP WORKS
                        </label>
                    </td>

                    <td style="padding:10px 40px 10px 0px;" align="right">

                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="check3" name="FINISHING" value="SERVICES & FINISHING" {{!empty($get['FINISHING'])? 'checked':'checked'}}>
                            FINISHING
                        </label>

                    </td>


                </tr>


                <tr>
                    <td colspan="4" align="center">
                        <br>
                        <button type="submit"  class="btn btn-primary">Submit</button>
                        <br/><br/>
                    </td>
                </tr>

            </table>

        </form>

        <form action="{{route('csu.csusend')}}" method="Post">
            {{csrf_field()}}
            <table width="595" border="0" align="center" style="background:#e9ecef; background-color:#e9ecef;" bgcolor="#e9ecef" 
                   <tr>
                    <td style="padding:15px 20px; margin:0px;">Email Address:</td>
                    <td align='left' style="padding:15px 20px; margin:0px;">
                        <input type="email" name="email" required />
                        <input type="hidden" value="<?= !empty($get['projectname']) ? $get['projectname'] : '' ?>" name="projectid"/>
                        <input type="hidden" value="<?= !empty($get['buildingname']) ? $get['buildingname'] : '' ?>" name="buildingid"/>
                        <input type="hidden" value="<?= !empty($get['MOBILIZATION']) ? $get['MOBILIZATION'] : '' ?>" name="FMOBILIZATION"/>
                        <input type="hidden" value="<?= !empty($get['GROUND']) ? $get['GROUND'] : '' ?>" name="fGROUND"/>
                        <input type="hidden" value="<?= !empty($get['STRUCTURE']) ? $get['STRUCTURE'] : '' ?>" name="fSTRUCTURE"/>
                        <input type="hidden" value="<?= !empty($get['FINISHING']) ? $get['FINISHING'] : '' ?>" name="fFINISHING"/>
                    </td>
                    <td style="padding:15px 20px; margin:0px;">
                        <input type="submit" name="Send" Value="Send Mail"/> 
                    </td>
                </tr>
                @if ($errors->any())
                <tr>
                    @foreach ($errors->all() as $error)
                    <td style="padding:5px 20px; margin:0px; text-align: center; color:red;">{{ $error }}</td>
                    @endforeach
                </tr>
                @endif   
            </table>
        </form>

        <br><br><br><br>


        <table width="595" border="0" align="center" style="background:#e9ecef; background-color:#e9ecef;" bgcolor="#e9ecef"  
               cellpadding="0" cellspacing="0" >
            <tr>
                <td style="padding:20px 20px;">
                    <img src="<?= $dlogourl ?>" width="100px"/>
                </td>

                <td colspan="2"></td>
                <?php if (in_array($get['buildingname'], $victorialogo)): ?>
                    <td align='right' style="padding:20px 20px;"> 
                        <img src="<?= !empty($get['buildingname']) ? $slogourl . '60.png' : $dlogourl; ?>" width='100px' />                    
                    </td>
                <?php elseif (in_array($get['buildingname'], $rivieralogo)): ?>
                    <td align='right' style="padding:20px 20px;"> 
                        <img src="<?= !empty($get['buildingname']) ? $slogourl . '34.png' : $dlogourl; ?>" width='100px' />                    
                    </td>
                <?php else: ?>
                    <td align='right' style="padding:20px 20px;"> 
                        <img src="<?= !empty($get['buildingname']) ? $slogourl . $get['buildingname'] . '.png' : $dlogourl; ?>" width='100px' />                    
                    </td>
                <?php endif; ?>
            </tr>

            <tr>
                <td colspan="4" style="padding:10px 20px;">
                    <h1 style="line-height:20px">Great Living</h1>
                    <span style="font-size:15px; line-height:0px">In The Heart Of Dubai</span>

                    <h1 style="line-height:20px;direction:rtl;font-family:tahoma;font-size: 18px;">أسلوب العيش الرائع</h1>
                    <p style="font-size:13px; line-height:0px; direction:rtl; font-family:tahoma;">في قلب دبي</p>
                </td>
            </tr>

            <tr>
                <td colspan="4" style="padding:10px 20px;"> 

                    <p style ="line-height: 25px;">
                        Dear Thoe Home Owner,
                    </p>

                    <p style ="line-height: 22px;">
                        It gives us great pleasure to present the construction progress of your Thoe home. Thoe Developments follows 
                        a construction-driven strategy and focuses on providing timely updates on all our projects under construction across 
                        Dubai, so you are well informed about the progress.
                    </p>

                    <p style ="line-height: 25px;">
                        Given below are the latest images of the construction at the site of the Thoe Developments:
                    </p>

                    <p style ="line-height: 25px; direction:rtl; font-family:tahoma;">
                        أعزاءنا المتملكين
                    </p>

                    <p style ="line-height: 22px; direction:rtl; font-family:tahoma;">
                        يسرنا تقديم آخر المستجدات عن تقدم سير الأعمال في منزلك من عزيزي. تتبنى عزيزي للتطوير العقاري خطة بناء إستراتيجية وتضمن في الوقت المحدد تقديم آخر أخبار مشاريعها قيد الإنشاء في دبي، لإبقائك على اطلاع دائم بوتيرة سير الأعمال.
                    </p>

                    <p style ="line-height: 25px; direction:rtl; font-family:tahoma;">
                        يمكنك الاطلاع فيما يلي على أحدث صور مواقع البناء في مشاريع عزيزي للتطوير العقاري:
                    </p>


                </td>
            </tr>
            <?php if (!empty($get['MOBILIZATION']) || !empty($get['GROUND']) || !empty($get['STRUCTURE']) || !empty($get['FINISHING'])): ?>
                <tr>

                    <?php if (!empty($get['MOBILIZATION'])): ?>
                        <td align="center" width="149">

                            <img src="<?= !empty($mobilization_percentage) ? $progressurl . $mobilization_percentage : $progressurl . '0' ?>.png" width="90"/>
                            <h2 style="line-height:20px;margin: 0px;font-size:13px;text-align: center;padding-top: 10px;"><b>MOBILIZATION</b></h2>
                            <h2 style="line-height:20px;margin: 0px;font-size:13px;text-align: center;padding-top: 7px; font-family:tahoma;">الأعمال الأرضية</h2>
                        </td>
                    <?php endif; ?>

                    <?php if (!empty($get['GROUND'])): ?>
                        <td align="center">

                            <img src="<?= !empty($structure_percentage) ? $progressurl . $structure_percentage : $progressurl . '0' ?>.png" width="90"/>
                            <h2 style="line-height:20px;margin: 0px;font-size:13px;text-align: center;padding-top: 10px;"><b>STRUCTURE</b></h2>
                            <h2 style="line-height:20px;margin: 0px;font-size:13px;text-align: center;padding-top: 7px; font-family:tahoma;">الأعمال الأرضية</h2>
                        </td>
                    <?php endif; ?>

                    <?php if (!empty($get['STRUCTURE'])): ?>
                        <td align="center" style="padding:0px 0px 0px 25px;">

                            <img src="<?= !empty($mep_percentage) ? $progressurl . $mep_percentage : $progressurl . '0' ?>.png" width="90"/>
                            <h2 style="line-height:20px;margin: 0px;font-size:13px;text-align: center; padding-top: 10px;"><b>MEP WORKS</b></h2>
                            <h2 style="line-height:20px;margin: 0px;font-size:13px;text-align: center;padding-top: 7px; font-family:tahoma;">الهيكل</h2>
                        </td>
                    <?php endif; ?>

                    <?php if (!empty($get['FINISHING'])): ?>
                        <td align="center" width="149">

                            <img src="<?= !empty($finishes_percentage) ? $progressurl . $finishes_percentage : $progressurl . '0' ?>.png" width="90"/>
                            <h2 style="line-height:20px;margin: 0px;font-size:13px;text-align: center;padding-top: 10px;"><b>FINISHING</b></h2>
                            <h2 style="line-height:20px;margin: 0px;font-size:13px;text-align: center;padding-top: 7px; font-family:tahoma;">
                                <b>  الخدمات والتشطيبات   </b>
                            </h2>
                        </td>
                    <?php endif; ?>

                </tr>
            <?php endif; ?>

            <?php if (!empty($header_image)): ?>
                <tr>
                    <td colspan="4"> 
                        <br/>
                        <!--img src="https://gallery.mailchimp.com/287c3c06b2b84c4cf85b63fef/images/b7d9bd51-0327-4bb3-be04-b18c6eac874a.png" 
                        width="595px" /-->
                        <img src="<?= $header_image ?>" height="331" width="595" style="height:331px; width:595px; max-width: 595px; min-width:595px;" />
                        <!--img src="<?= $holder_image ?>" height="298" width="595" style="height:298px; width:595px; max-width: 595px; min-width:595px;" /-->
                        <br/><br/>

                    </td>
                </tr>
            <?php endif; ?>

            <tr>
                <td style="padding-left:20px;">
                    <a href="" style="text-decoration: none; color: #000; font-family:Helvetica; font-size:12px;">
                        www.<?=DOMAIN_NAME?>
                    </a>
                </td>

                <td colspan="2" align="right" > 
                    <span>
                        <a href="https://www.facebook.com/ThoeGroup" target="_blank">
                            <img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-facebook-48.png" 
                                 style="display:inline;" height="24" width="24" class="">
                        </a>
                    </span>

                    <span>
                        <a href="https://twitter.com/thoegroup" target="_blank">
                            <img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-twitter-48.png"
                                 style="display:inline;" height="24" width="24" class=""></a>
                    </span>

                    <span>
                        <a href="https://www.linkedin.com/company/thoe-developments" target="_blank">
                            <img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-linkedin-48.png" 
                                 style="display:inline;" height="24" width="24" class="">
                        </a>
                    </span>

                    <span>
                        <a href="https://www.youtube.com/channel/UCmUtuRMwJxaovjGBNSXx-Jw/featured" target="_blank">
                            <img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-youtube-48.png" 
                                 style="display:inline;" height="24" width="24" class=""></a>
                    </span>

                </td>

                <td align="right"  style="padding-right:20px;">
                    <!--img src="https://gallery.mailchimp.com/287c3c06b2b84c4cf85b63fef/images/a9573693-e90e-485c-bb46-25384e5bd8e2.png" 
                    width="50px" style="width:50px; max-width:50px; min-width:50px;" /-->

                    <?php if (in_array($get['buildingname'], $victorialogo)): ?>
                        <img src="<?= !empty($get['buildingname']) ? $slogourl . '60.png' : $dlogourl; ?>" width="100px" style="width:100px; max-width:100px; min-width:100px;" />
                    <?php elseif (in_array($get['buildingname'], $rivieralogo)): ?>
                        <img src="<?= !empty($get['buildingname']) ? $slogourl . '34.png' : $dlogourl; ?>" width="100px" style="width:100px; max-width:100px; min-width:100px;" />
                    <?php else: ?>    
                        <img src="<?= !empty($get['buildingname']) ? $slogourl . $get['buildingname'] . '.png' : $dlogourl; ?>" width="50px" style="width:100px; max-width:100px; min-width:100px;" />
                    <?php endif; ?>
                </td>


            </tr>

            <tr>

                <td colspan='3' style='padding-left:20px; color: #000; font-family:Helvetica; font-size:9px; width:250px;'>
                    <p>In line with our commitment to continually improve our customer service, Thoe Developments has launched its new Customer Care Program. Contact our dedicated team of Care professionals in case of any issue with your Thoe unit:</p>
                </td>

                <td align='right' style='padding-right:20px;'>
                    <a href="#" class="telephone" data-telephone ='80022737' style="text-decoration: none; color: #000; font-family:Helvetica; font-size:12px;">
                        <b>800 CARES (22737)</b>
                    </a>
                </td>

            <br/><br/>

        </tr>


    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">
//alert('dsfsfd');

/*$("#projectname").change(function() { 
 var projectid = $(this).val();
 var options = $(this).data('projectid').filter(projectid);
 $('#buildingname').html(options);
 alert(options);
 });*/

$("#projectname").change(function () {
    if (typeof $(this).data('options') === "undefined") {
        $(this).data('options', $('#buildingname option').clone());
    }
    var id = $(this).val();
    var options = $(this).data('options').filter('[data-projectid=' + id + ']');
    $('#buildingname').html(options);
    console.log('1');
});
$("#projectname").trigger('change');

    </script>

</body>
</html>

<?php
//echo '<pre>'; print_r($Content);
?>