@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Content List
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
<style type="text/css">
    @media screen {
        #printSection {
            display: none;
        }
    }

    @media print {
        body > *:not(#printSection) {
            display: none;
        }
        #printSection, #printSection * {
            visibility: visible;
        }
        #printSection {
            position:absolute;
            left:0;
            top:0;
        }
    }
</style>
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Booking & Payment Management</h1>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
        @endforeach
    </div>
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                Online Payments
            </div>

            <div class="panel-body">
                <form action="{!! url('/') !!}/admin/payment/search_booking" method="post">
                    <table class="table table-striped table-bordered table-advance table-hover">
                        <tr>
                            <td><input type="text" name="order_no" value="{{ $sdata['order_no'] }}" placeholder="Order Number"></td>
                            <td><input type="text" name="email" value="{{ $sdata['email'] }}" placeholder="Email"></td>
                            <td>
                                <select name="status">
                                    <option value="">Select</option>
                                    <option value="0" @if($sdata['status']=="0") selected @endif>Pending</option>
                                    <option value="1" @if($sdata['status']=="1") selected @endif>Completed</option>
                                    <option value="2" @if($sdata['status']=="2") selected @endif>Failed</option>
                                </select>
                            </td>
                            <td>
                                <select name="payment">
                                    <option value="">Payment Status</option>
                                    <option value="0-1000" @if($sdata['payment']=="0-1000") selected @endif>0-1000</option>
                                    <option value="1001-5000" @if($sdata['payment']=="1001-5000") selected @endif>1001-5000</option>
                                    <option value="5001" @if($sdata['payment']=="5001") selected @endif>5001 > More</option>
                                </select>
                            </td>
                            <td><input id="datepicker" type="text" name="from_date" value="{{ $sdata['from_date'] }}" placeholder="From Date"></td>
                            <td><input id="datepicker1" type="text" name="to_date" value="{{ $sdata['to_date'] }}" placeholder="To Date"></td>
                            <td><input type="submit" name="search" value="Search"></td>
                        </tr>
                    </table>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                </form>

                <!--<form action="{{ url('/admin/payment/fetch_booking_transactions') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="submit" name="submit" value="Fetch All Transaction Status" class="btn btn-primary btn_sizes" /> 
                </form>-->
            </div>
           
            <?php $i = 0; ?>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-advance table-hover" id="table" style="width:200px!important;">
                        <thead>
                            <tr class="filters">
                                <th>ViewDetail</th>
                                <th>Order Number</th>
                                <th>Customer Payment Status</th>
                                <th>Capture Authorization</th>
                                <th>Merchant Payment Status</th>
                                <th>Currency</th>
                                <th>PaymentAmount</th>
                                <th>FirstName</th>
                                <th>LastName</th>
                                <th>BillingAddress</th>
                                <th>City</th>
                                <th>State</th>
                                <th>PostCode</th>
                                <th>Country</th>
                                <th>Email</th>
                                <th>PhoneNumber</th>
                                <th>LandlinePhoneNumber</th>
                                <th>PassportNo</th>
                                <th>ProjectName</th>
                                <th>Unit</th>
                                <th>UnitFloor</th>
                                <th>UnitFeature</th>
                                <th>PaymentBookingDate</th>
                                <!--<th>Payment Message</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $result)
                            <?php
                            $i++;
                            $date = date("d-m-Y", strtotime($result->payment_date));
                            $time = date("h:i:s", strtotime($result->payment_date));
                            ?>
                            <tr>
                                <td><button type="button" class="btn btn-primary btn_sizes" data-toggle="modal" data-target="#myModal-<?php echo $i; ?>">ViewDetail</button></td>
                                <td>#{!! $result->order_id !!}</td>
                                <td>
                                    @if($result->payment_status==0)
                                    <span class="label label-sm label-danger">Pending / Failed</span>
                                    @else
                                    <span class="label label-sm label-success">Completed</span>
                                    @endif
                                </td>
                                <td>
                                    @if($result->verified==0)
                                    <span class="label label-sm label-danger">Not Confirmed</span>
                                    @else
                                    <span class="label label-sm label-success">Confirmed</span>
                                    @endif
                                </td>
                                <td>
                                    @if($result->merchant_payment_status==0)
                                    <span class="label label-sm label-danger">Pending</span>
                                    @else
                                    <span class="label label-sm label-success">Completed</span>
                                    @endif
                                </td>
                                <td>{!! $result->merchant_currency !!}</td>
                                <td>{!! $result->payment_amount !!}</td>
                                <td>{!! $result->first_name !!}</td>
                                <td>{!! $result->last_name !!}</td>
                                <td>{!! $result->address !!}</td>

                                <td>{!! $result->city !!}</td>
                                <td>{!! $result->state !!}</td>
                                <td>{!! $result->post_code !!}</td>
                                <td>{!! $result->country !!}</td>
                                <td>{!! $result->email_id !!}</td>
                                <td>{!! $result->mobile_number !!}</td>
                                <td>{!! $result->landline_number !!}</td>

                                <td>{!! $result->passport_number !!}</td>
                                <td>
                                    @if($result->get_property)
                                    <span>{{ $result->get_property->title_en }}</span>
                                    @endif	
                                </td>
                                <td>
                                    @if($result->get_unit)
                                    <span>{{ $result->get_unit->title_en }}</span>
                                    @endif	
                                </td>
                                <td>
                                    @if($result->get_unit_floors)
                                    <span>{{ $result->get_unit_floors->title_en }}</span>
                                    @endif	
                                </td>
                                <td>
                                    @if($result->get_unit_features)
                                    <span>{{ $result->get_unit_features->title_en }}</span>
                                    @endif	
                                </td>
                                <td>{!! date("d-m-Y h:i:s",strtotime($result->created)) !!}</td>
                                <!--<td>{!! $date !!} {!! $result->payment_desc !!}</td>-->
                            </tr>

                            <!-- Modal Start-->
                        <div class="modal fade" id="myModal-<?php echo $i; ?>" role="dialog">
                            <div class="modal-dialog" style="width:75%;">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div id="myModalprint-<?php echo $i; ?>" class="col-md-12">
                                        <div class="modal-header col-md-12" style="border: none;">
                                            <button type="button" class="close" data-dismiss="modal" style="color: white;margin: 5px;opacity: 1;">&times;</button>
                                            <h4 class="modal-title" style="background: grey;padding: 5px 10px;color: white;">Payment Details</h4>
                                        </div>
                                        <div class="modal-body col-md-12" style="">
                                            <div class="col-md-12" style="border: 1px solid #dedede;padding: 25px 10px;">

                                                <!-- Payment Details -->
                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>Order Number :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">{!! $result->order_id !!}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>Payment Date & Time :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;"><?php echo date("d-m-Y h:i:s", strtotime($result->created)); ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>Payment Amount :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">{!! $result->payment_amount !!} {!! $result->merchant_currency !!}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>Project by area :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">@if($result->get_project) {{ $result->get_project->title_en }} @endif</p>
                                                    </div>
                                                </div>

                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>Property :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">@if($result->get_property) {{ $result->get_property->title_en }} @endif</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>Unit :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">@if($result->get_unit) {{ $result->get_unit->title_en }} @endif</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>Unit Floor :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">@if($result->get_unit_floors) {{ $result->get_unit_floors->title_en }} @endif</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>Unit Feature :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">@if($result->get_unit_features) {{ $result->get_unit_features->title_en }} @endif</p>
                                                    </div>
                                                </div>

                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>First Name :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">{!! $result->first_name !!}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>Last Name :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">{!! $result->last_name !!}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>Email :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">{!! $result->email_id !!}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>Mobile Number :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">{!! $result->mobile_number !!}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>Landline Phone Number :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">{!! $result->landline_number !!}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>Passport No. :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">{!! $result->passport_number !!}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>Address :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">{!! $result->address !!}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>City :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">{!! $result->city !!}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>State :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">{!! $result->state !!}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>Country :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">{!! $result->country !!}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>Post Code :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">{!! $result->post_code !!}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>Payment Status :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">@if($result->payment_status=="0")
                                                            <span class="label label-sm label-danger">Pending</span>
                                                            @endif

                                                            @if($result->payment_status=="1")
                                                            <span class="label label-sm label-success">Completed</span>
                                                            @endif  

                                                            @if($result->payment_status=="2")
                                                            <span class="label label-sm label-danger">Failed</span>
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>Confirmed by admin :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">@if($result->verified=="0")
                                                            <span class="label label-sm label-danger">Not confirmed</span>
                                                            @endif
                                                            @if($result->verified=="1")
                                                            <span class="label label-sm label-success">Confirmed</span>
                                                            @endif  
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>Sales Code :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">{!! $result->sales_code !!}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="border-bottom: 1px solid #e4e4e4;padding: 5px 0px;">
                                                    <div class="col-md-3">
                                                        <p style="margin-bottom: 0;"><b>Comments :</b></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p style="margin-bottom: 0;">{!! $result->comments !!}</p>
                                                    </div>
                                                </div>

                                            </div>	
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="printDiv('myModalprint-<?php echo $i; ?>')">Print</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Modal End-->
                        @endforeach

                        </tbody>
                    </table>
                    {{ $results->appends([
//    'str' => !empty($get['str'])?$get['str']:'',
//    'area' => !empty($get['area'])?$get['area']:'',
//    'community' => !empty($get['community'])?$get['community']:'',
//    'type' => !empty($get['type'])?$get['type']:'',
//    'completed' => !empty($get['completed'])?$get['completed']:'',
//    'featured' => !empty($get['featured'])?$get['featured']:'',
//    'status' => !empty($get['status'])?$get['status']:'',
        ])->links() }}
                </div>
            </div>
        </div>
    </div>    <!-- row-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js" ></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.5.0/js/buttons.flash.min.js" ></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js" ></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js" ></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.5.0/js/buttons.html5.min.js" ></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.5.0/js/buttons.print.min.js" ></script>
<link href="https://cdn.datatables.net/buttons/1.5.0/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script>
                                            $(document).ready(function () {
                                                $("#datepicker").datepicker({dateFormat: 'yy-mm-dd'});
                                                $("#datepicker1").datepicker({dateFormat: 'yy-mm-dd'});

                                                $('#table').DataTable({
                                                    dom: 'Bfrtip',
                                                    buttons: [
                                                        {
                                                            extend: 'excelHtml5',
                                                            title: 'THOE_payment_data'
                                                        },
                                                        {
                                                            extend: 'pdfHtml5',
                                                            title: 'THOE_payment_data'
                                                        }
                                                    ],
                                                    "ordering": false,
                                                    "columnDefs": [
                                                        {"width": "100px", "targets": 0}
                                                    ]
                                                });
                                            });
                                            $(document).on('click', '.modal-close', function () {
                                                $("#formp").show();
                                                $("#msgp").hide();
                                                $("#errorp").hide();
                                            })

                                            function printDiv(div) {
                                                // Create and insert new print section
                                                var elem = document.getElementById(div);
                                                var domClone = elem.cloneNode(true);
                                                var $printSection = document.createElement("div");
                                                $printSection.id = "printSection";
                                                $printSection.appendChild(domClone);
                                                document.body.insertBefore($printSection, document.body.firstChild);

                                                window.print();

                                                // Clean up print section for future use
                                                var oldElem = document.getElementById("printSection");
                                                if (oldElem != null) {
                                                    oldElem.parentNode.removeChild(oldElem);
                                                }
                                                //oldElem.remove() not supported by IE

                                                return true;
                                            }
</script>
@stop