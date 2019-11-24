<?php
$get = filter_input_array(INPUT_GET);
$today = date('Y-m-d') . '|' . date('Y-m-d');
$yesterday = date('Y-m-d', strtotime(date('Y-m-d') . " -1 day")) . '|' . date('Y-m-d', strtotime(date('Y-m-d') . " -1 day"));
$last7days = date('Y-m-d', strtotime(date('Y-m-d') . " -7 day")) . '|' . date('Y-m-d');
$start_date = !empty($get['start_date']) ? $get['start_date'] : '';
$end_date = !empty($get['end_date']) ? $get['end_date'] : '';
$password = !empty($get['password']) ? $get['password'] : '';
$keyword = !empty($get['keyword']) ? $get['keyword'] : '';
if (!empty($get['month'])) {
    $month_state = explode('|', $get['month']);
    $start_date = $month_state[0];
    $end_date = $month_state[1];
}
if (empty($end_date) && empty($start_date)) {
    $start_date = date('Y-m-d', strtotime(date('Y-m-d') . " -30 day"));
    $end_date = date('Y-m-d');
}
$stats = [];
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> Lead Report</title>
        <style>
            body{margin: 30px;font-size: 12px;font-family: "Lato","Helvetica Neue",helvetica,arial,sans-serif}
            .container{max-width:450px;margin:auto}
            .input{width: 96%;padding: 5px;margin-bottom: 10px;margin-top: 5px;}
            .submit1{width: 100%;background: yellow;padding: 7px;color: #000;border: 0;}
            .submit2{width: 100%;background: brown;padding: 7px;color: #fff;border: 0;}
            .submit3{width: 100%;background: red;padding: 7px;color: #fff;border: 0;}
            .submit4{width: 100%;background: yellowgreen;padding: 7px;color: #fff;border: 0;}
            .submit5{width: 100%;background: green;padding: 7px;color: #fff;border: 0;}
            form{padding: 10px;border: 1px solid #ccc;margin-bottom:20px;text-align: left;}
            input{height: 33px;width: 100%;    border-radius: 3px; 
                  border: 1px solid #999;}
            select{height: 35px;width: 100%;    border-radius: 3px;
                   border: 1px solid #999;}
            table tr td{padding: 5px;}
            table#leadReport tr td,table#leadSummary tr td {border-bottom:1px solid #0E5695!important; padding:3px !important;vertical-align:middle!important;text-align: left;}
            table#leadReport tr th,table#leadSummary tr th{border-bottom:1px solid #0E5695!important; padding-left:5px!important;vertical-align:middle!important;text-align: left;}
            table#leadReport tr:nth-child(even) ,table#leadSummary tr:nth-child(even) {background: #e1e1e1}
            table#leadReport tr:nth-child(odd),table#leadSummary tr:nth-child(odd) {background: #FFF}
        </style>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <form method="get" action="{{route('lead-report')}}" id="filter">
            <table style="width:100%">
                <tr>
                    <td>Period<br/><select id="month" name="month" class="form-control" onchange="this.form.submit()">
                            <option value="0">Period</option>
                            <option value="<?= $today ?>" <?= !empty($get['month']) && $get['month'] == $today ? 'selected' : ''; ?>>Today</option>
                            <option value="<?= $yesterday ?>" <?= !empty($get['month']) && $get['month'] == $yesterday ? 'selected' : ''; ?>>Yesterday</option>
                            <option value="<?= $last7days ?>" <?= !empty($get['month']) && $get['month'] == $last7days ? 'selected' : ''; ?>>Last 7 days</option>                    
                            <?php
                            for ($i = 0; $i <= 12; $i++) {
                                $startdaymonthyear = date("Y-m-d", strtotime(date('Y-m-01') . " -$i months"));
                                $enddaymonthyear = date("Y-m-t", strtotime(date('Y-m-01') . " -$i months"));
                                $monthname = date("F - Y", strtotime(date('Y-m-01') . " -$i months"));
                                //$months[]=[$startdaymonthyear,$enddaymonthyear,$month];
                                $select = $get['month'] == "$startdaymonthyear|$enddaymonthyear" ? 'selected' : '';
                                echo"<option value='$startdaymonthyear|$enddaymonthyear' $select>$monthname</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        Start Date<br/><input type="date" id='start_date' name='start_date' value="{{$start_date?$start_date:''}}" class="form-control">
                    </td>
                    <td>
                        End Date<br/><input type="date" id='end_date' name='end_date' value="{{$end_date?$end_date:''}}" class="form-control">
                    </td>

                    <td>Campaign<br/><select id="campaign" name="campaign" class="form-control" onchange="this.form.submit()"> 
                            <option value="0">Select Campaign</option>
                            <?php
                            if (!empty($campaign)) {
                                foreach ($campaign as $value) {
                                    ?>
                                    <option value="<?= $value->campaign ?>" <?= !empty($get['campaign']) && $get['campaign'] == $value->campaign ? 'selected' : ''; ?>><?= $value->campaign ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>

                    </td>
                    <td>Source<br/><select id="agent" name="source" class="form-control" onchange="this.form.submit()"> 
                            <option value="0">Select Source</option>
                            <?php
                            if (!empty($source)) {
                                foreach ($source as $value) {
                                    ?>
                                    <option value="<?= $value->source ?>" <?= !empty($get['source']) && $get['source'] == $value->source ? 'selected' : ''; ?>><?= $value->source ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Country<br/><select id="agent" name="country" class="form-control" onchange="this.form.submit()"> 
                            <option value="0">Select Country</option>
                            <?php
                            if (!empty($country)) {
                                foreach ($country as $value) {
                                    ?>
                                    <option value="<?= $value->country ?>" <?= !empty($get['country']) && $get['country'] == $value->source ? 'selected' : ''; ?>><?= $value->country ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td>Nationality<br/><select id="agent" name="nationality" class="form-control" onchange="this.form.submit()"> 
                            <option value="0">Select Nationality</option>
                            <?php
                            if (!empty($nationality)) {
                                foreach ($nationality as $value) {
                                    ?>
                                    <option value="<?= $value->nationality ?>" <?= !empty($get['nationality']) && $get['nationality'] == $value->nationality ? 'selected' : ''; ?>><?= $value->nationality ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td>Keyword<br/><textarea name="keyword" placeholder="enter keyword" style="padding-left:3px;width: 100%;" rows="2">{{$keyword?$keyword:''}}</textarea></td>
                    <td>Keyword Search In<br/><select id="type" name="type" class="form-control" onchange="this.form.submit()"> 
                            <option value="0">Select Type</option>
                            <option value="name" <?= !empty($get['type']) && $get['type'] == 'name' ? 'selected' : ''; ?>>Name</option>
                            <option value="email" <?= !empty($get['type']) && $get['type'] == 'email' ? 'selected' : ''; ?>>Email</option>
                            <option value="phone" <?= !empty($get['type']) && $get['type'] == 'phone' ? 'selected' : ''; ?>>Phone</option>
                            <option value="comment" <?= !empty($get['type']) && $get['type'] == 'comment' ? 'selected' : ''; ?>>Comment</option>
                            <option value="epms_status" <?= !empty($get['type']) && $get['type'] == 'epms_status' ? 'selected' : ''; ?>>Status</option>
                        </select></td>
                        <td>Access Key<br/><input type="password" name="password" class="form-control" placeholder="enter access key" style="padding-left:3px;border: 1px solid red;" value="{{$password?$password:''}}" autocomplete="off"></td>
                    <td><br/>
                        <input type="submit" value="Filter"  class="submit5" style="width: 100px"/>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{route('lead-report')}}" class="submit3" style="width: 100px"/>Reset</a></td>
                </tr>
            </table>
        </form>


        <?php
        $count1 = $count2 = $count3 = $count4 = [];
        $deatils = "<h3>Details</h3><table id='leadReport' border=1 style='width:100%;border-collapse: collapse'>
            <tr><th>Name</th><th>Email</th><th>Mobile</th><th>Phone</th><th>City</th><th>Country</th><th>Nationality</th><th>Language</th><th>Source</th><th>Campaign</th><th>EPMS Status</th><th>SF Status</th><th>Comment</th><th>Created At(GST)</th></tr>
            ";
        if (!empty($leads)) {
            foreach ($leads as $key => $value) {
                //$date = \Carbon\Carbon::createFromTimeStamp(strtotime($value->created_at))->diffForHumans();
                //$date = date($value->created_at,strtotime('+330 minutes', 0));  

                $date = new DateTime($value->created_at, new DateTimeZone('GMT'));
                $date->setTimezone(new DateTimeZone('GST'));

                $d = $date->format('d M, y h:i:s a');

                $deatils .= "<tr>
                <td>$value->name</td>
                <td>$value->email</td>
                <td>{$value->country_code}-{$value->mobile}</td>
                <td>{$value->phone_country_code}-{$value->phone}</td>
                <td>$value->city</td>
                <td>$value->country</td>
                <td>$value->nationality</td>
                <td>$value->language</td>
                <td>$value->source</td>
                <td>$value->campaign</td>
                <td>$value->epms_status</td>
                <td>$value->salesforce_status</td>
                <td style='width:250px'>$value->comment</td>
                <td  style='width:150px'>$d</td>
            </tr>";
                $source = !empty($value->source) ? $value->source : '<span style="color:red">Not Found</span>';
                $count1[$source][] = 1;
                $campaign = !empty($value->campaign) ? $value->campaign : '<span style="color:red">Not Found</span>';
                $count2[$campaign][] = 1;
                $country = !empty($value->country) ? $value->country : '<span style="color:red">Not Found</span>';
                $count3[$country][] = 1;
                $nationality = !empty($value->nationality) ? $value->nationality : '<span style="color:red">Not Found</span>';
                $count4[$nationality][] = 1;
            }
            $deatils .= "<tr><td><strong style='color:red;font-size: 14px'>Total</strong></td><td colspan=13 style='text-align: right;'><strong style='color:red;font-size: 14px'>" . count($leads) . "</strong></td></tr>";
        }
        $deatils .= "</table>";


        $countall1 = $countall2 = $countall3 = 0;
        $date = '';
        if (!empty($get['month']) && $get['month'] == $today) {
            $date = date('d-M-Y');
        } elseif (!empty($get['month']) && $get['month'] == $yesterday) {
            $date = date('d-M-Y', strtotime(date('d-M-Y') . " -1 day"));
        } elseif (!empty($get['month']) && $get['month'] == $last7days) {
            $date = date('d-M-Y', strtotime(date('d-M-Y') . " -7 day")) . ' To ' . date('d-M-Y');
        } elseif (!empty($get['month'])) {
            $month_state = explode('|', $get['month']);
            $date = date_format(date_create($month_state[0]), 'd-M-Y') . ' To ' . date_format(date_create($month_state[1]), 'd-M-Y');
        } elseif (!empty($get['start_date']) && !empty($get['end_date'])) {
            if ($get['start_date'] == $get['end_date']) {
                $date = date_format(date_create($get['start_date']), 'd-M-Y');
            } else {
                $date = date_format(date_create($get['start_date']), 'd-M-Y') . ' To ' . date_format(date_create($get['end_date']), 'd-M-Y');
            }
        } else {
            $date = 'Last 30 days';
        }


        $summary1 = summary($count1, $date, 'Source');
        $summary2 = summary($count2, $date, 'Campaign');
        $summary3 = summary($count3, $date, 'Country');
        $summary4 = summary($count4, $date, 'Nationality');

        echo $mainTable = "<h3>Summary</h3><table border=0 style='width:100%;border-collapse: collapse'><tr><td style='vertical-align:top'>$summary1</td><td style='vertical-align:top'>$summary2</td>"
        . "<td style='vertical-align:top'>$summary3</td><td style='vertical-align:top'>$summary4</td></tr></table>";

        echo ' <br/><br/>';

         echo $deatils;

        function summary($count, $date, $title) {
            $countall = 0;
            $summary = "<table id='leadSummary' border=1 style='width:100%;border-collapse: collapse'><tr><th>Date</th><th>$title</th><th>Count</th></tr>";
            foreach ($count as $key => $value) {
                $summary .= "<tr><td width=200>$date</td><td>" . $key . "</td><td>" . count($value) . "</td></tr>";
                $countall += count($value);
            }
            $summary .= "<tr><td colspan=2><strong style='color:red;font-size: 14px'>Total</strong></td><td><strong style='color:red;font-size: 14px'>" . $countall . "</strong></td></tr>";
            return $summary .= '</table>';
        }
        ?>
        <br/><br/>
        <div style="text-align: center;color:red"><?= !empty($msg) ? $msg : '' ?></div>
        <script  type="text/javascript"  src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

        <script>
                        $(function () {
                            $('#month').change(function () {
                                if ($(this).val() !== '0') {
                                    var month = $(this).val().split('|');
                                    $('#start_date').val(month[0]);
                                    $('#end_date').val(month[1]);
                                } else {
                                    $('#start_date').val('<?= date('Y-m-d') ?>');
                                    $('#end_date').val('<?= date('Y-m-d') ?>');
                                }
                                $('#filter').submit();
                            });
                        });
        </script>
    </body>
</html>
