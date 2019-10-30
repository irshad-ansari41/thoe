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
        <META HTTP-EQUIV='Content-Type' CONTENT='text/html; charset=UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Survey Report</title>
        <link href='//fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="<?=SITE_URL?>/assets/favicon/apple-icon-57x57.png">
        <link rel="stylesheet prefetch" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
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
            table#summaryReport tr td{border-bottom:1px solid #0E5695!important; padding:3px !important;vertical-align:middle!important;}
            table#summaryReport tr th{border-bottom:1px solid #0E5695!important; padding-left:5px!important;vertical-align:middle!important;}
            table#summaryReport tr:nth-child(even) {background: #e1e1e1}
            table#summaryReport tr:nth-child(odd) {background: #FFF}

            table#serveyReport tr td{border-bottom:1px solid #0E5695!important; padding:3px !important;vertical-align:middle!important;}
            table#serveyReportn tr th{border-bottom:1px solid #0E5695!important; padding-left:5px!important;vertical-align:middle!important;}
            table#serveyReport tr:nth-child(even) {background: #e1e1e1}
            table#serveyReport tr:nth-child(odd) {background: #FFF}

            .Excellent{background: #8ec640;color:#fff;padding: 3px 10px;}
            .Good{background: #f3ce10;color:#fff;padding: 3px 10px;}
            .Neutral{background: #f79520;color:#000;padding: 3px 10px;}
            .Poor{background: #f1592c;color:#fff;padding: 3px 10px;}
            .Very-Poor{background: #ec1f27;color:#fff;padding: 3px 10px;}

            .pagination li.active {background-color: #155895;}
            .pagination li.active span{color:#fff;display:inline-block;font-size:1.2rem;padding:0 10px;line-height:30px}
            .pagination li a{display:inline-block;font-size:1.2rem;padding:0 10px;line-height:30px}
            .pagination li{position:relative;cursor:pointer;display:inline-block;overflow:hidden;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;-webkit-tap-highlight-color:transparent;z-index:1;-webkit-transition:.3s ease-out;transition:.3s ease-out}
        </style>
    </head>
    <body>
        <?php
        $source = ['1' => 'Online', '2' => 'Radio', '3' => 'Print', '4' => 'Outdoor', '5' => 'Social Media', '6' => 'Friend/Referral'];
        ?>
        <form method="get" action="{{route('quick-survey.report')}}" id="filter">
            <table style="width:100%">
                <tr>

                    <td  style=" width: 60px;">List<br/><select id="agent" name="list" class="form-control" onchange="this.form.submit()">
                            <option value="10" <?= !empty($get['list']) && $get['list'] == 10 ? 'selected' : ''; ?>>10</option>
                            <option value="30" <?= !empty($get['list']) && $get['list'] == 30 ? 'selected' : ''; ?>>30</option>
                            <option value="50" <?= !empty($get['list']) && $get['list'] == 50 ? 'selected' : ''; ?>>50</option>
                            <option value="100" <?= !empty($get['list']) && $get['list'] == 100 ? 'selected' : ''; ?>>100</option>
                            <option value="300" <?= !empty($get['list']) && $get['list'] == 300 ? 'selected' : ''; ?>>300</option>
                            <option value="500" <?= !empty($get['list']) && $get['list'] == 500 ? 'selected' : ''; ?>>500</option>
                            <option value="1000" <?= !empty($get['list']) && $get['list'] == 1000 ? 'selected' : ''; ?>>1000</option>
                        </select>

                    </td>

                    <td style=" width: 300px;">Question<br/><select id="agent" name="question" class="form-control" onchange="this.form.submit()">
                            <option value="0">Question</option>
                            <?php foreach ($questions as $key => $value) { ?>
                                <option value="<?= $key ?>" <?= !empty($get['question']) && $get['question'] == $key ? 'selected' : ''; ?>><?= $value ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <?php if (!empty($get['question']) && $get['question'] == 'que_5') { ?>
                        <td style=" width: 120px;">Nationality<br/><select id="nationality" name="nationality" class="form-control" onchange="this.form.submit()">
                                <option value="0">Nationality</option>
                                <?php foreach ($nationalities as $value) { ?>
                                    <option value="<?= $value->nationality ?>" <?= !empty($get['nationality']) && $get['nationality'] == $value->nationality ? 'selected' : ''; ?>><?= $value->nationality ?></option>
                                <?php } ?>
                            </select>
                        </td>

                        <td style=" width: 100px;">Source<br/><select id="source" name="source" class="form-control" onchange="this.form.submit()">
                                <option value="0">Source</option>
                                <?php foreach ($source as $value) { ?>
                                    <option value="<?= $value ?>" <?= !empty($get['source']) && $get['source'] == $value ? 'selected' : ''; ?>><?= $value ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    <?php } ?>

                    <td  style=" width: 100px;">Period<br/><select id="month" name="month" class="form-control" onchange="this.form.submit()">
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
                                $select = !empty($get['month']) && $get['month'] == "$startdaymonthyear|$enddaymonthyear" ? 'selected' : '';
                                echo"<option value='$startdaymonthyear|$enddaymonthyear' $select>$monthname</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td style=" width: 80px;">
                        Start Date<br/><input type="date" id='start_date' name='start_date' value="{{$start_date?$start_date:''}}" class="form-control">
                    </td>
                    <td style=" width: 80px;">
                        End Date<br/><input type="date" id='end_date' name='end_date' value="{{$end_date?$end_date:''}}" class="form-control">
                    </td>
                    <td style=" width: 100px;">Access Key<br/><input type="text" name="password" placeholder="enter access key" style="padding-left:3px;border: 1px solid red;" value="{{$password?$password:''}}"></td>
                    <td><br/>
                        <input type="hidden" value=""  name='page'/>
                        <input type="submit" value="Filter"  class="submit5" style="width: 100px"/>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{route('quick-survey.report')}}" class="submit3" style="width: 100px"/>Reset</a></td>
                </tr>
            </table>
        </form>
        <div style="text-align: center;color:red"><?= !empty($msg) ? $msg : '' ?></div>
        <strong>Total Surveys: {{!empty($count)?$count:0}}</strong> <br/>
        <?php
        if (!empty($surveys)) {
            echo $surveys->render();

            $html = '<table id="serveyReport" class="" border=1 style="min-width: 1000px;margin: auto;border-collapse:collapse;">
            <tr style="background:#1B619A;color:#fff"><th>Question</th><th>Answer</th></tr>';
            $i = 0;
            foreach ($surveys as $key => $value) {

                $html .= '<tr style="background:#9ccaef;color:#fff"><td colspan=2>Survey - ' . ( ++$i) . ' | ' . (date_format(date_create($value->created_at), 'd-m-Y h:i:a')) . '</td></tr>';

                $html .= "<tr><td style='width:50%'>Name</td><td class=''>" . $value->name . "</td>";
                $html .= "<tr><td style='width:50%'>Email</td><td class=''>" . $value->email . "</td>";
                $html .= "<tr><td style='width:50%'>Phone</td><td class=''>" . $value->phone . "</td>";
                $html .= "<tr><td style='width:50%'>Nationality</td><td class=''>" . $value->nationality . "</td>";
                $html .= !empty($value->que_1) ? "<tr><td style='width:50%'>" . $questions['que_1'] . "</td><td><span  class='" . (str_replace(' ', '-', $answers[$value->que_1])) . "'>" . $answers[$value->que_1] . "</span></td>" : '';
                $html .= !empty($value->que_2) ? "<tr><td style='width:50%'>" . $questions['que_2'] . "</td><td><span  class='" . (str_replace(' ', '-', $answers[$value->que_2])) . "'>" . $answers[$value->que_2] . "</span></td>" : '';
                $html .= !empty($value->que_3) ? "<tr><td style='width:50%'>" . $questions['que_3'] . "</td><td><span  class='" . (str_replace(' ', '-', $answers[$value->que_3])) . "'>" . $answers[$value->que_3] . "</span></td>" : '';
                $html .= !empty($value->que_4) ? "<tr><td style='width:50%'>" . $questions['que_4'] . "</td><td><span  class='" . (str_replace(' ', '-', $answers[$value->que_4])) . "'>" . $answers[$value->que_4] . "</span></td>" : '';
                $html .= !empty($value->que_5) ? "<tr><td style='width:50%'>" . $questions['que_5'] . "</td><td class=''>" . $value->que_5 . "</td>" : '';
                $html .= "<tr><td colspan=2 style='background:#fff'><br/><br/></td>";
                if (!empty($value->que_1)) {
                    $counts['que_1'][$answers[$value->que_1]][] = 1;
                }
                if (!empty($value->que_2)) {
                    $counts['que_2'][$answers[$value->que_2]][] = 1;
                }
                if (!empty($value->que_3)) {
                    $counts['que_3'][$answers[$value->que_3]][] = 1;
                }
                if (!empty($value->que_4)) {
                    $counts['que_4'][$answers[$value->que_4]][] = 1;
                }
                if (!empty($value->que_5)) {
                    $counts['que_5'][$value->nationality][$value->que_5][] = 1;
                }
            }

            $html .= ' </table>';
            if (!empty($counts)) {
                $summary1 = '<table id="summaryReport" class="" border=1 style="min-width: 1000px;margin: auto; border-collapse:collapse;">
            <tr style="background:#1B619A;color:#fff"><th>Question</th><th>Excellent</th><th>Good</th><th>Neutral</th><th>Poor</th><th>Very Poor</th><th>Total</th></tr>';
                $t2 = $e2 = $vg2 = $g2 = $p2 = $vp2 = 0;
                array_multisort(array_keys($counts), SORT_NATURAL, $counts);

                foreach ($counts as $k => $v) {
                    if ($k != 'que_5') {
                        $e2 += $e1 = (!empty($v['Excellent']) ? count($v['Excellent']) : 0);
                        $vg2 += $vg1 = (!empty($v['Good']) ? count($v['Good']) : 0);
                        $g2 += $g1 = (!empty($v['Neutral']) ? count($v['Neutral']) : 0);
                        $p2 += $p1 = (!empty($v['Poor']) ? count($v['Poor']) : 0);
                        $vp2 += $vp1 = (!empty($v['Very Poor']) ? count($v['Very Poor']) : 0);
                        $t2 += $t1 = $e1 + $vg1 + $g1 + $p1 + $vp1;
                        $summary1 .= "<tr><td>{$questions[$k]}</td><td>$e1</td><td>$vg1</td><td>$g1</td><td>$p1</td><td>$vp1</td><td>$t1</td></tr>";
                    }
                }
                $summary1 .= "<tr><td><strong>Total</strong></td><td>$e2</td><td>$vg2</td><td>$g2</td><td>$p2</td><td>$vp2</td><td>$t2</td></tr>";
                $summary1 .= '</table>';
                $summary2 = '';
                if (!empty($counts['que_5'])) {
                    $summary2 = '<br/><table id="summaryReport" class="" border=1 style="min-width: 1000px;margin: auto; border-collapse:collapse;"><tr><td colspan=8 align=left>' . $questions['que_5'] . '</td></tr>
            <tr style="background:#1B619A;color:#fff"><th>Nationality</th><th>Online</th><th>Radio</th><th>Print</th><th>Outdoor</th><th>Social Media</th><th>Friend/Referral</th><th>Total</th></tr>';
                    $t4 = $on2 = $r2 = $p2 = $ou2 = $sm2 = $fr2 = $vp2 = 0;
                    foreach ($counts['que_5'] as $k => $v) {
                        $on2 += $on1 = (!empty($v['Online']) ? count($v['Online']) : 0);
                        $r2 += $r1 = (!empty($v['Radio']) ? count($v['Radio']) : 0);
                        $p2 += $p1 = (!empty($v['Print']) ? count($v['Print']) : 0);
                        $ou2 += $ou1 = (!empty($v['Outdoor']) ? count($v['Outdoor']) : 0);
                        $sm2 += $sm1 = (!empty($v['Social Media']) ? count($v['Social Media']) : 0);
                        $fr2 += $fr1 = (!empty($v['Friend/Referral']) ? count($v['Friend/Referral']) : 0);
                        $t4 += $t3 = $on1 + $r1 + $p1 + $ou1 + $sm1 + $fr1;
                        $summary2 .= "<tr><td>{$k}</td><td>$on1</td><td>$r1</td><td>$p1</td><td>$ou1</td><td>$sm1</td><td>$fr1</td><td>$t3</td></tr>";
                    }
                    $summary2 .= "<tr><td><strong>Total</strong></td><td>$on2</td><td>$r2</td><td>$p2</td><td>$ou2</td><td>$sm2</td><td>$fr2</td><td>$t4</td></tr>";
                    $summary2 .= '</table>';
                }
                echo!empty($t2) ? $summary1 : '';
                echo '<br/><br/><br/>';
                echo $summary2;
                echo '<br/><br/><br/>';
                echo $html;
            } elseif ($surveys) {
                echo $html;
            } else {
                echo "No Record Found!";
            }
        }
        ?>
        <script  type="text/javascript"  src="//code.jquery.com/jquery-3.3.1.min.js"></script>

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
                            $('.pagination li a').click(function (e) {
                                e.preventDefault();
                                $('input[name=page]').val($(this).text());
                                $('#filter').submit();
                            });
                        });
        </script>
    </body>
</html>
