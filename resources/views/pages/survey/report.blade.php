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

            .Excellent{background: #168873;color:#fff}
            .Very-Satisfied{background: #6cbe78;color:#fff}
            .Satisfied{background: #e4d648;color:#000}
            .Below-Average{background: #f59b50;color:#000}
            .Unsatisfied{background: #ef4149;color:#fff}
            .pagination li.active {background-color: #155895;}
            .pagination li.active span{color:#fff;display:inline-block;font-size:1.2rem;padding:0 10px;line-height:30px}
            .pagination li a{display:inline-block;font-size:1.2rem;padding:0 10px;line-height:30px}
            .pagination li{position:relative;cursor:pointer;display:inline-block;overflow:hidden;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;-webkit-tap-highlight-color:transparent;z-index:1;-webkit-transition:.3s ease-out;transition:.3s ease-out}
        </style>
    </head>
    <body>

        <form method="get" action="{{route('survey.report')}}" id="filter">
            <table style="width:100%">
                <tr>

                    <td>List<br/><select id="agent" name="list" class="form-control" onchange="this.form.submit()">
                            <option value="10" <?= !empty($get['list']) && $get['list'] == 10 ? 'selected' : ''; ?>>10</option>
                            <option value="30" <?= !empty($get['list']) && $get['list'] == 30 ? 'selected' : ''; ?>>30</option>
                            <option value="50" <?= !empty($get['list']) && $get['list'] == 50 ? 'selected' : ''; ?>>50</option>
                            <option value="100" <?= !empty($get['list']) && $get['list'] == 100 ? 'selected' : ''; ?>>100</option>
                        </select>

                    </td>

                    <td>Question<br/><select id="agent" name="question" class="form-control" onchange="this.form.submit()">
                            <option value="0">Select Question</option>
                            <?php foreach ($questions as $key => $value) { ?>
                                <option value="<?= $key ?>" <?= !empty($get['question']) && $get['question'] == $key ? 'selected' : ''; ?>><?= $value ?></option>
                            <?php } ?>
                        </select>

                    </td>

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
                                $select = !empty($get['month']) && $get['month'] == "$startdaymonthyear|$enddaymonthyear" ? 'selected' : '';
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
                    <td>Keyword<br/><input type="text" name="keyword" placeholder="enter keyword" style="padding-left:3px" value="{{$keyword?$keyword:''}}"></td>



                    <td>Access Key<br/><input type="text" name="password" placeholder="enter access key" style="padding-left:3px;border: 1px solid red;" value="{{$password?$password:''}}"></td>
                    <td><br/>
                        <input type="hidden" value=""  name='page'/>
                        <input type="submit" value="Filter"  class="submit5" style="width: 100px"/>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{route('survey.report')}}" class="submit3" style="width: 100px"/>Reset</a></td>
                </tr>
            </table>
        </form>
        <br/><br/>
        <div style="text-align: center;color:red"><?= !empty($msg) ? $msg : '' ?></div>
        <?php
        if (!empty($surveys)) {

            echo $surveys->render();

            $html = '<table id="serveyReport" class="" border=1 style="width:100%;border-collapse:collapse;">
            <tr style="background:#1B619A;color:#fff"><th>Question</th><th>Answer</th><th>Comment</th></tr>';
            $i = 0;
            foreach ($surveys as $key => $value) {

                $datetime = \Carbon\Carbon::createFromTimeStamp(strtotime($value->created_at))->diffForHumans();
                $html .= '<tr style="background:#9ccaef;color:#fff"><td>Survey - ' . ( ++$i) . ' | ' . $datetime . ' | ' . (date_format(date_create($value->created_at), 'd-m-Y h:i:a')) . '</td><td>Unique Survey ID - ' . $value->id . '</td><td><a href="#"></a></td></tr>';



                foreach ($value as $k => $v) {


                    if (in_array($k, ['building_name', 'apartment', 'unit_type', 'ownership', 'gender', 'age',]) && !empty($v)) {
                        $html .= "<tr><td style='width:50%'>" . ucwords(str_replace('_', ' ', $k)) . "</td>";
                        $html .= "<td>$v</td><td>&nbsp;</td></tr>";
                    } elseif (in_array($k, ['que_20', 'que_21']) && !empty($v)) {
                        $html .= "<tr><td style='width:50%'>" . $questions[$k] . "</td>";
                        $html .= "<td>$v</td><td>&nbsp;</td></tr>";
                    } elseif (in_array($k, ['que_12', 'que_19']) && !empty($v)) {
                        $ans = explode('|', $v);
                        $html .= "<tr><td style='width:50%'>" . $questions[$k] . "</td>";
                        $html .= "<td>" . str_replace('-', ',', $ans[0]) . "</td>";
                        $html .= "<td>" . (!empty($ans[1]) ? $ans[1] : '') . "</td></tr>";
                    } elseif (in_array($k, ['que_a', 'que_b', 'que_c', 'que_d', 'que_e', 'que_f', 'que_g', 'que_h']) && !empty($v)) {
                        $ans = !empty($answers[$v]) ? $answers[$v] : '';
                        $html .= "<tr><td style='width:50%'>" . $questions[$k] . "</td>";
                        $html .= "<td  class='" . (str_replace(' ', '-', $ans)) . "'>$ans</td><td>&nbsp;</td></tr>";
                        $counts[$k][$ans][] = 1;
                    } elseif (in_array($k, ['que_13', 'que_18']) && !empty($v)) {
                        $html .= "<tr><td style='width:50%'>" . $questions[$k] . "</td>";
                        $html .= "<td>$v</td><td>&nbsp;</td></tr>";
                        $counts[$k][$v][] = 1;
                    } elseif (in_array($k, ['que_1', 'que_2', 'que_3', 'que_4', 'que_5', 'que_6', 'que_7', 'que_8', 'que_9', 'que_10', 'que_11', 'que_14', 'que_15', 'que_16', 'que_17']) && !empty($v)) {
                        $ans = explode('|', $v);
                        $a = !empty($answers[$ans[0]]) ? $answers[$ans[0]] : $ans[0];
                        $html .= "<tr><td style='width:50%'>" . $questions[$k] . "</td>";
                        $html .= "<td class='" . (str_replace(' ', '-', $a)) . "'>" . $a . "</td>";
                        $html .= "<td>" . (!empty($ans[1]) ? $ans[1] : '') . "</td></tr>";
                        $counts[$k][$a][] = 1;
                    }
                }
            }

            $html .= ' </table>';
            if (!empty($counts)) {
                $summary = '<table id="summaryReport" class="" border=1 style="width:100%; border-collapse:collapse;">
            <tr style="background:#1B619A;color:#fff"><th>Question</th><th>Excellent</th><th>Very Satisfied</th><th>Satisfied</th><th>Below Average</th><th>Unsatisfied</th><th>Yes</th><th>No</th></tr>';
                $e2 = $v2 = $s2 = $b2 = $u2 = $y2 = $n2 = 0;
                //natsort($counts);
                array_multisort(array_keys($counts), SORT_NATURAL, $counts);

                foreach ($counts as $k => $v) {
                    $e2 += $e1 = (!empty($v['Excellent']) ? count($v['Excellent']) : '');
                    $v2 += $v1 = (!empty($v['Very Satisfied']) ? count($v['Very Satisfied']) : '');
                    $s2 += $s1 = (!empty($v['Satisfied']) ? count($v['Satisfied']) : '');
                    $b2 += $b1 = (!empty($v['Below Average']) ? count($v['Below Average']) : '');
                    $u2 += $u1 = (!empty($v['Unsatisfied']) ? count($v['Unsatisfied']) : '');
                    $y2 += $y1 = (!empty($v['Yes']) ? count($v['Yes']) : '');
                    $n2 += $n1 = (!empty($v['No']) ? count($v['No']) : '');
                    $summary .= "<tr><td>{$questions[$k]}</td><td>$e1</td><td>$v1</td><td>$s1</td><td>$b1</td><td>$u1</td><td>$y1</td><td>$n1</td></tr>";
                }
                $summary .= "<tr><td>Total</td><td>$e2</td><td>$v2</td><td>$s2</td><td>$b2</td><td>$u2</td><td>$y2</td><td>$n2</td></tr>";


                $summary .= '</table>';
                echo $summary;
                echo '<br/><br/><br/>';
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
