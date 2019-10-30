<?php

function check_lead($data) {
    if (!empty($data['email'])) {
        $exist = DB::table('tbl_leads')->where('email', $data['email'])->where('campaign', $data['campaign'])->where('source', $data['source'])->first();
        $days = dateDiff(!empty($exist->created_at) ? $exist->created_at : '');
        if (!empty($exist->email) && $exist->source == $data['source'] && $exist->campaign == $data['campaign'] && $days <= 7) {
            DB::table('tbl_leads')->where('email', $data['email'])->update($data);
            return 0;
        }
    }
}

function dateDiff($date) {
    if (!empty($date)) {
        $now = time();
        $your_date = strtotime($date);
        $datediff = $now - $your_date;
        return round($datediff / (60 * 60 * 24));
    }
    return 0;
}
?>
@extends('admin/layouts/default')

@section('title')
Leads
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Leads</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li><a href="{{ route('admin.leads.index') }}">Leads</a></li>
        <li class="active"> Leads </li>
    </ol>
</section>
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Import Leads
                </h4>
                <div class="pull-right">
                    <a href="{{ route('admin.leads.index') }}" class="btn btn-sm btn-default">Back</a>
                </div>
            </div>
            <br />
            <div class="panel-body">

                {!! Form::open(['route' => 'leads.import','files'=>true]) !!}

                <div class="form-group col-sm-2">{!! Form::label('file', 'Upload Lead File:') !!}</div>
                <div class="form-group col-sm-4">
                    {!! Form::file('file[]', ['class' => 'form-control','multiple'=>true,'required'=>'required']) !!}
                    <p style='color:red'>Note: Lead file should be .xlsx format</p>
                </div>



                <!-- Submit Field -->
                <div class="form-group col-sm-2 text-right">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{!! route('admin.leads.import') !!}" class="btn btn-default">Cancel</a>
                </div>

                {!! Form::close() !!}



                <div class="row">
                    <div class="col-md-12">
                        <h3><?= !empty($data) ? 'Leads Records' : 'Sample Lead Excel File' ?> </h3>
                        <table style="width: 100%;border-collapse: collapse;text-align: center;" border="1">
                            <tr>
                                <td>Name</td><td>Email</td><td>Phone</td><td>City</td><td>Country</td><td>Nationality</td><td>Source</td><td>Campaign</td><td>Mobile</td><td>Created</td><td>Comment</td>
                            </tr>
                            <?php
//DB::statement('update tbl_leads set created = created_at where created is null');
                            $html = '';
                            $records = [];
                            $filename = "daily-leads-" . date('d-m-Y') . ".csv";
                            if (!empty($data)) {

                                foreach ($data as $key => $value) {
                                    foreach ($value as $v) {

                                        $name = !empty($v['Name']) ? trim($v['Name']) : '';
                                        $email = !empty($v['Email']) ? trim($v['Email']) : '';
                                        $phone = !empty($v['Phone']) ? trim($v['Phone']) : '';
                                        $city = !empty($v['City']) ? trim($v['City']) : '';
                                        $country = !empty($v['Country']) ? trim($v['Country']) : '';
                                        $nationality = !empty($v['Nationality']) ? trim($v['Nationality']) : '';
                                        $source = !empty($v['Source']) ? trim($v['Source']) : '';
                                        $campaign = !empty($v['Campaign']) ? trim($v['Campaign']) : '';
                                        $mobile = !empty($v['Mobile']) ? trim($v['Mobile']) : '';
                                        $created = date('Y-m-d');
                                        $created_at = date('Y-m-d h:i:s');
                                        $comment = !empty($v['Comment']) ? trim($v['Comment']) : '';


                                        $dataArr = ['name' => $name, 'email' => $email, 'phone' => $phone, 'city' => $city, 'country' => $country, 'nationality' => $nationality,
                                            'source' => $source, 'campaign' => $campaign, 'mobile' => $mobile, 'comment' => $comment];



                                        $ins = 0;
                                        if (check_lead($dataArr)) {
                                            $dataArr['created'] = $created;
                                            $dataArr['created_at'] = $created_at;
                                            //$id = DB::table('tbl_leads')->insertGetId($dataArr);
                                            $ins = 1;
                                        }


                                        $c = $ins ? '#95ef95' : '#f39c9c';
                                        $html .= "<tr style='background:$c'>";
                                        $html .= "<td style='padding:5px'>$name</td>";
                                        $html .= "<td style='padding:5px'>$email</td>";
                                        $html .= "<td style='padding:5px'>$phone</td>";
                                        $html .= "<td style='padding:5px'>$city</td>";
                                        $html .= "<td style='padding:5px'>$country</td>";
                                        $html .= "<td style='padding:5px'>$nationality</td>";
                                        $html .= "<td style='padding:5px'>$source</td>";
                                        $html .= "<td style='padding:5px'>$campaign</td>";
                                        $html .= "<td style='padding:5px'>$mobile</td>";
                                        $html .= "<td style='padding:5px'>$created</td>";
                                        $html .= "<td style='padding:5px'>$comment</td>";
                                        $html .= "</tr>";
                                    }
                                }
                                echo $html .= '';
                            } else {
                                echo "<div  style='color:red;text-align:center'>" . (!empty($msg) ? $msg : '') . "</div>";
                            }
                            ?>
                        </table>
                        <br/><br/><a href="http://azizidevelopments.in/leads/ <?= $filename ?>" download>Export as CSV</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


@stop

<?php
if (!empty($records)) {
    @unlink(UPLOAD_PATH . "/$filename");
    $file = fopen(UPLOAD_PATH . "/$filename", 'w');
    fputcsv($file, $colunm);
    foreach ($records as $row) {
        fputcsv($file, $row);
    }
    fclose($file);
}
?>
