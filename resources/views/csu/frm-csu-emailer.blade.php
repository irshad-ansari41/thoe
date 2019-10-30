<?php
$get = filter_input_array(INPUT_GET);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Construction Update <?= date('d-F-Y') ?></title>
        <style type="text/css">
            *{ padding:0; margin:0 auto;}
            ::-webkit-input-placeholder{ text-align: center; }
            
        </style>
    </head>

    <body style="background:#b3b3b3; background-color:#b3b3b3;width:595px;margin:0 auto;" bgcolor="#b3b3b3">

        <table style="background:#004483; background-color:#004483;width:595px;margin:0 auto" align="center" bgcolor="#004483" 
               width="595" border="0">
            <form method="GET" action="{{ route('csu.csu-emailer') }}">
                <tr>
                    <td colspan="4" style="padding:10px 10px; color:#fff;">
                        <h1 style="color:#fff;font-family: tahoma;font-size: 20px;text-align: center;">Construction Update <?= date('d-F-Y') ?></h1>
                </tr>


                <tr>
                    <td colspan="2" style="padding:10px 10px; color:#fff;">
                        <select name="title" style="width:100%; padding:0px 20px; height: 30px;" required="required">
                            <option value="" >---Select Title---</option>
                            <?php if (!empty($title)):foreach ($title as $key => $value): ?>
                                    <option value="{{$key}}" {{ !empty($_GET['title']) && $_GET['title'] == $key ? 'selected' : ''}}>{{$value}}</option>
                                <?php endforeach;
                            endif; ?>
                        </select>

                        @if($errors->first('title'))<p style="font-size:14px; text-align: right;">{{ $errors->first('title') }}</p>@endif
                    </td>
                    <td colspan="2" align="right" style="padding:10px 10px; color:#fff;">
                        <input type="text" value="{{!empty($_GET['customername']) ? $_GET['customername']:''}}"name="customername" placeholder="Enter Customer Name" style="width:100%; height: 25px; border-radius:0;" required="required"/>
                        @if($errors->first('customername'))<p style="font-size:14px; text-align: right;">{{ $errors->first('customername') }}</p>@endif
                    </td>

                </tr>
                <tr>
                    <td colspan="2" style="padding:10px 10px; color:#fff;">
                        <select name="projectname" id="projectname" style="width:100%; padding:0px 20px; height: 30px; " required="required">
                            <option value="">---Select Project---</option>
                            <?php if (!empty($Project)): foreach ($Project as $project_rows): ?>
                                    <option value="<?= $project_rows->id ?>" {{ !empty($_GET['projectname']) && $_GET['projectname'] == $project_rows->id ? 'selected' : ''}}>
                                        <?= $project_rows->title_en ?>
                                    </option>
                                <?php endforeach;
                            endif; ?>
                        </select>
                        @if($errors->first('projectname'))<p style="font-size:14px; text-align: right;">{{ $errors->first('projectname') }}</p>@endif
                    </td>
                    <td colspan="2" align="right" style="padding:10px 10px; color:#fff;">
                        <select name="buildingname" id="buildingname" style="width:100%; padding:0px 20px; height: 30px; " required="required">
                            <option value="">---Select Building Name---</option>
                                <?php if (!empty($Properties)): foreach ($Properties as $Properties_rows): ?>
                                    <option value="<?= $Properties_rows->id ?>" data-projectid="<?= $Properties_rows->project_id ?>" {{ !empty($_GET['buildingname']) && $_GET['buildingname'] == $Properties_rows->id ? 'selected' : ''}}>
                                    <?= $Properties_rows->title_en ?>
                                    </option>
                                    <?php
                                    if (!empty($_GET['buildingname']) && $_GET['buildingname'] == $Properties_rows->id) {
                                        $get['PropertyName'] = $Properties_rows->title_en;
                                        $get['MOBILIZATION'] = $Properties_rows->mobilization_percentage;
                                        $get['STRUCTURE'] = $Properties_rows->structure_percentage;
                                        $get['MEP_WORKS'] = $Properties_rows->mep_percentage;
                                        $get['FINISHING'] = $Properties_rows->finishes_percentage;
                                        $get['NFCSStatus'] = $Properties_rows->nfcstatus;
                                    }
                                    ?>
                            <?php endforeach;endif; ?>
                        </select>
                        @if($errors->first('buildingname'))<p style="font-size:14px; text-align: right;">{{ $errors->first('buildingname') }}</p>@endif
                    </td>

                </tr>

                <tr>

                    <td style="padding:10px 10px; color:#fff; font-family: tahoma; font-size:13px;" align="center">
                        <input type="checkbox" value="MOBILIZATION" name="MOBILIZATION" <?= !empty($_GET['MOBILIZATION']) && $_GET['MOBILIZATION'] == 'MOBILIZATION' ? 'checked' : 'checked' ?>/>&nbsp; &nbsp; MOBILIZATION 
                    </td>
                    <td style="padding:10px 10px; color:#fff; font-family: tahoma; font-size:13px;" align="center">
                        <input type="checkbox" value="STRUCTURE" name="STRUCTURE" <?= !empty($_GET['STRUCTURE']) && $_GET['STRUCTURE'] == 'STRUCTURE' ? 'checked' : 'checked' ?> />&nbsp; &nbsp; STRUCTURE 
                    </td>
                    <td style="padding:10px 10px; color:#fff; font-family: tahoma; font-size:13px;" align="center">
                        <input type="checkbox" value="MEP WORKS" name="MEP_WORKS" <?= !empty($_GET['MEP_WORKS']) && $_GET['MEP_WORKS'] == 'MEP_WORKS' ? 'checked' : 'checked' ?> />&nbsp; &nbsp; MEP WORKS 
                    </td>
                    <td style="padding:10px 10px; color:#fff; font-family: tahoma; font-size:13px;" align="center">
                        <input type="checkbox" value="FINISHING" name="FINISHING" <?= !empty($_GET['FINISHING']) && $_GET['FINISHING'] == 'FINISHING' ? 'checked' : 'checked' ?> /> &nbsp; &nbsp; FINISHING
                    </td>

                </tr>
                <tr> 
                    <td colspan="4" style="padding:10px 10px;">
                        <input type="submit" value="Submit Info" name="Submit"/>
                    </td>
                </tr>
                
            </form>
           
            <form method="Post" action="{{ route('csu.send-emailer') }}"><form>
               <tr> <td colspan="4" style="padding:10px 10px;"></td></tr>
                <tr>
                    <td colspan="3" align="right" style="padding:10px 10px; color:#fff;">
                        <input type="email" name="email" required="required" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" style="width:100%;"/>
                        @if($errors->first('email'))<p style="font-size:14px; text-align: right;">{{ $errors->first('email') }}</p>@endif
                        <input type="hidden" value="<?=!empty($get['title'])?$get['title']:''?>" name="title"/>
                        <input type="hidden" value="<?=!empty($get['customername'])?$get['customername']:''?>" name="customername"/>
                        <input type="hidden" value="<?=!empty($get['projectname'])?$get['projectname']:''?>" name="projectid"/>
                        <input type="hidden" value="<?=!empty($get['buildingname'])?$get['buildingname']:''?>" name="buildingid"/>
                        <input type="hidden" value="<?=!empty($get['MOBILIZATION'])? $get['MOBILIZATION']:''?>" name="MOBILIZATION"/>
                        <input type="hidden" value="<?=!empty($get['MEP_WORKS'])? $get['MEP_WORKS']:''?>" name="MEP_WORKS"/>
                        <input type="hidden" value="<?=!empty($get['STRUCTURE'])? $get['STRUCTURE'] :''?>" name="STRUCTURE"/>
                        <input type="hidden" value="<?=!empty($get['FINISHING']) ? $get['FINISHING']:'' ?>" name="FINISHING"/>
                        
                    </td>
                    <td style="padding:10px 10px;">
                        <input type="submit" value="Send Email" name="Send"/>
                    </td>
                </tr>
                <tr> <td colspan="4" style="padding:10px 10px;"></td></tr> 
                
            </form>
        </table>
        <br/><br/>
        <table style="background:#b3b3b3; background-color:#b3b3b3;;width:595px;margin:0 auto" align="center" bgcolor="#b3b3b3" 
               width="595">
            <tr>
                <td>
                    <table width="595" border="0" align="center" style="background:#f6f6f6; width:595px; background-color:#f6f6f6f;" 
                           bgcolor="#f6f6f6"  cellpadding="0" cellspacing="0">

                        <tr valign="top">
                            <td colspan="2">

                                <a target="_blank" href="https://azizidevelopments.com/en" style="text-decoration: none; color: #001F5B;
                                   font-family:Helvetica; font-size:12px;">
                                    <img src="https://azizidevelopments.com/assets/images/constructions-updates-progress-bars/construction-mailer-v3-top.jpg"  width="595"/>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding:10px 40px;font-family: tahoma;font-size: 16px;">
                                <strong>
                                    Dear <?= !empty($get['title']) && !empty($get['customername']) ? $get['title']. ' ' .$get['customername'] :'Mr Bukhari';?>,
                                </strong>
                            </td>

                        </tr>

                        <tr>
                            <td style="padding:10px 40px;font-family: tahoma;font-size: 16px;">
                                <p> 
                                    Thank you for investing in Azizi Developments and for purchasing a property from us. 
                                </p>
                            </td>

                        </tr>

                        <tr>
                            <td style="padding:10px 40px;font-family: tahoma;font-size: 16px;">
                                <p> 
                                    We would like to keep you updated on the progress of our many constructions and appreciate your support always.
                                </p>
                            </td>

                        </tr>


                        <tr>
                            <td style="padding:10px 40px;font-family: tahoma;font-size: 16px;">
                                <p> 
                                    Please see below the construction update for <?=$get['PropertyName']?> which is due for completion in <?=$get['NFCSStatus']?>
                                </p>
                            </td>

                        </tr>


                        <tr>
                            <td style="padding:10px 50px;font-family: tahoma;font-size: 16px;">
                                <table style="background:##f2f2f2; background-color:##f2f2f2; ;margin:0 auto" 
                                       bgcolor="#f2f2f2" width="90%" border="0">

                                    <tr>
                                        @if(!empty($_GET['MOBILIZATION']))
                                        <td style="border:1px solid #e6e5e5;">
                                            <img src="https://azizidevelopments.com/assets/images/constructions-updates-progress-bars/mobilization/{{$get['MOBILIZATION']}}.jpg" width="110">
                                        </td>
                                        @endif
                                        @if(!empty($_GET['STRUCTURE']))
                                        <td style="border:1px solid #e6e5e5;">
                                            <img src="https://azizidevelopments.com/assets/images/constructions-updates-progress-bars/structure/{{$get['STRUCTURE']}}.jpg" width="110">
                                        </td>
                                        @endif
                                        @if(!empty($_GET['MEP_WORKS']))
                                        <td style="border:1px solid #e6e5e5;">
                                            <img src="https://azizidevelopments.com/assets/images/constructions-updates-progress-bars/mep-works/{{$get['MEP_WORKS']}}.jpg" width="110">
                                        </td>
                                        @endif
                                        @if(!empty($_GET['FINISHING']))
                                        <td style="border:1px solid #e6e5e5;">
                                            <img src="https://azizidevelopments.com/assets/images/constructions-updates-progress-bars/finishing/{{$get['FINISHING']}}.jpg" width="110">
                                        </td>
                                        @endif
                                    </tr>

                                </table>
                            </td>

                        </tr>

                        <tr>
                            <td style="padding:10px 40px;font-family: tahoma;font-size: 16px;">
                                <p> 
                                    We look forward to handing over the keys to your new home.
                                </p>
                            </td>

                        </tr>


                        <tr>
                            <td style="padding:10px 40px;font-family: tahoma;font-size: 14px;">
                                <strong>
                                    Best regards,<br/>
                                    Azizi Developments
                                </strong>
                            </td>

                        </tr>
                        <tr>
                            <td style="padding:10px 40px;font-family: tahoma;font-size: 16px;"></td>

                        </tr>



                        <tr valign="top">
                            <td colspan="2">
                                <img src="https://azizidevelopments.com/assets/images/constructions-updates-progress-bars/construction-mailer-v3_bottom.jpg" width="595" height="52" />
                            </td>
                        </tr>

                    </table>

                </td>

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
