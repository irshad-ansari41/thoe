<!DOCTYPE>
<html>
    <head>
        <META HTTP-EQUIV='Content-Type' CONTENT='text/html; charset=UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Quick Survey</title>
        <link href='//fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="<?=SITE_URL?>/assets/favicon/apple-icon-57x57.png">
        <link rel="stylesheet prefetch" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <style>
            @import "//fonts.googleapis.com/css?family=Roboto:400,300,600,400italic";
            *{margin:0;padding:0;box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-webkit-font-smoothing:antialiased;-moz-font-smoothing:antialiased;-o-font-smoothing:antialiased;font-smoothing:antialiased;text-rendering:optimizeLegibility}
            body{font-family:'PT Sans',sans-serif;font-weight:100;font-size:14px;line-height:30px;color:#777;background:#1B619A}
            p{line-height:25px}
            a{color:#777;text-decoration:none}
            input[type='radio']{height:22px;width:20px;margin-left:-15px!important}
            .container{max-width:1000px;width:100%;margin:0 auto;position:relative;background:#fff}
            .frm-container1{width:50%;position:relative;float:left;border-right:2px solid #ccc}
            .frm-container2{width:50%;position:relative;float:left;border-right:2px solid #ccc}
            .contact-form input[type="text"],.contact-form input[type="email"],.contact-form input[type="tel"],.contact-form input[type="url"],.contact-form textarea,.contact-form button[type="submit"]{font:400 12px/16px Roboto,Helvetica,Arial,sans-serif}
            .contact-form{background:#F9F9F9;padding:0 25px;margin:0}
            .contact-form h3{display:block;font-size:20px;font-weight:300;margin-bottom:10px}
            .contact-form h4{margin:5px 0 15px;display:block;font-size:13px;font-weight:400}
            fieldset{border:medium none!important;margin:0 0 10px;min-width:100%;padding:0;width:100%}
            .contact-form input[type="text"],.contact-form input[type="email"],.contact-form input[type="tel"],.contact-form input[type="url"],.contact-form textarea{width:100%;border:1px solid #ccc;background:#FFF;margin:0 0 5px;padding:10px}
            .contact-form input[type="text"]:hover,.contact-form input[type="email"]:hover,.contact-form input[type="tel"]:hover,.contact-form input[type="url"]:hover,.contact-form textarea:hover{-webkit-transition:border-color .3s ease-in-out;-moz-transition:border-color .3s ease-in-out;transition:border-color .3s ease-in-out;border:1px solid #aaa}
            .contact-form textarea{height:150px;max-width:100%;resize:none}
            .contact-form button[type="submit"]{cursor:pointer;width:100%;border:none;background:#1B619A;color:#FFF;margin:0 0 5px;padding:10px;font-size:15px}
            .contact-form button[type="submit"]:hover{background:#43A047;-webkit-transition:background .3s ease-in-out;-moz-transition:background .3s ease-in-out;transition:background-color .3s ease-in-out}
            .contact-form button[type="submit"]:active{box-shadow:inset 0 1px 3px rgba(0,0,0,0.5)}
            .contact-form button[type="button"]{cursor:pointer;width:100%;border:none;background:rgba(99,99,99,0.5);color:#FFF;margin:0 0 5px;padding:0 10px;font-size:15px}
            .contact-form button[type="button"]:hover{background:#ef9027;-webkit-transition:background .3s ease-in-out;-moz-transition:background .3s ease-in-out;transition:background-color .3s ease-in-out}
            .copyright{text-align:center}
            .contact-form input:focus,.contact-form textarea:focus{outline:0;border:1px solid #aaa}
            ::-webkit-input-placeholder{color:#888}
            :-moz-placeholder{color:#888}
            ::-moz-placeholder{color:#888}
            :-ms-input-placeholder{color:#888}
            .nopadding{padding:0}
        </style>

    </head>
    <body><br/>
        <div class="container">  
            <div class="row" >
                <div class="col-lg-12">
                    <div style="position: fixed; height: 90px; width: 100%; background: #fff; top: 0; z-index: 9999; max-width: 1000px; margin-left: -15px;border-bottom: 1px solid #ddd;">
                        <a href="<?=SITE_URL?>/quick-survey">
                            <img alt="logo" src="//thoe.com/assets/images/logo-retina-light1.png" style="width: 150px;margin-top:10px;margin-left:10px;"></a>
                        <div class="progress hidden" style="margin-left:15px;margin-right:15px;margin-top:5px;">
                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="30" style="width:0%">
                                0% Complete (success)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">  

            <form id="clientForm" action="{{route('survey.store')}}" method="post" class="contact-form" style="margin-top: 40px;">
                <br/><h2 style=" margin-top: 0; ">Quick Survey</h2>

                <p>Dear Resident,<br/>To accommodate better living solutions Thoe developments invites you to complete the following survey to help improve our product. <br/>Please complete the survey before <strong>23<sup>rd</sup> June 2018</strong>.</p>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                @if(!empty($_GET['status']) && $_GET['status']=='success')
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Your details has sent successfully.
                    <div id="msg"></div>
                </div>
                @endif

                @if(!empty($_GET['status']) && $_GET['status']=='failed')
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Warning!</strong> Please select answer before submit.
                </div>
                @endif

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Building Name:</label>
                            <select name="building_name" class="form-control">
                                <option value="0">Select Building Name</option>
                                <option value="Thoe Daisy">Thoe Daisy</option>
                                <option value="Thoe Feirouz">Thoe Feirouz</option>
                                <option value="Thoe Freesia">Thoe Freesia</option>
                                <option value="Thoe Iris">Thoe Iris</option>
                                <option value="Thoe Liatris">Thoe Liatris</option>
                                <option value="Thoe Orchid">Thoe Orchid</option>
                                <option value="Thoe Tulip">Thoe Tulip</option>
                                <option value="Thoe Yasamine">Thoe Yasamine</option>
                                <option value="Royal Bay">Royal Bay</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Apartment#</label>
                            <input type="number" name="apartment" class="form-control" min="0" placeholder="Write Number Only">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Unit Type:</label>
                            <select name="unit_type" class="form-control">
                                <option value="0">Select Unit Type</option>
                                <option value="Studio">Studio</option>
                                <option value="1BR">1BR</option>
                                <option value="2BR">2BR</option>
                                <option value="3BR">3BR</option>
                                <option value="Penthouse">Penthouse</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Please circle:</label>
                            <label class="radio-inline">
                                &nbsp;<input type="radio" class="custom-radio" name="ownership" value="Owner" >&nbsp; Owner </label>
                            <label class="radio-inline">
                                <input type="radio" class="custom-radio" name="ownership" value="Tenant">&nbsp; Tenant</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Gender</label>
                            <label class="radio-inline">
                                &nbsp;<input type="radio" class="custom-radio" name="gender"  value="Male" >&nbsp; Male </label>
                            <label class="radio-inline">
                                <input type="radio" class="custom-radio" name="gender"  value="Female">&nbsp; Female</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="col-sm-3 nopadding">Age:</label>
                            <div class="col-sm-9 nopadding">
                                <select name="age" class="form-control">
                                    <option value="0">Select Age</option>
                                    <option value="16-24">16-24</option>
                                    <option value="25-34">25-34</option>
                                    <option value="35-44">35-44</option>
                                    <option value="45-64">45-64</option>
                                    <option value="65+">65+</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h3 style=" color: #000; ">Apartment</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>1. How satisfied are you with the functionality of your Living area?</label><br/>
                            <label class="radio-inline">
                                &nbsp;<input type="radio" class="custom-radio" name="que_1[ans]"  value="5">&nbsp; Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" class="custom-radio" name="que_1[ans]"  value="4">&nbsp; Very Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_1[ans]"  value="3">&nbsp; Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_1[ans]"  value="2">&nbsp; Below Average</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_1[ans]"  value="1">&nbsp; Unsatisfied</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Comment:</label>
                            <div class="col-sm-10 nopadding">
                                <input type="text" name="que_1[com]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>2. How satisfied are you with the functionality of your Dining area?</label><br/>
                            <label class="radio-inline">
                                &nbsp;<input type="radio" class="custom-radio" name="que_2[ans]"  value="5">&nbsp; Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" class="custom-radio" name="que_2[ans]"  value="4">&nbsp; Very Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_2[ans]"  value="3">&nbsp; Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_2[ans]"  value="2">&nbsp; Below Average</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_2[ans]"  value="1">&nbsp; Unsatisfied</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Comment:</label>
                            <div class="col-sm-10 nopadding">
                                <input type="text" name="que_2[com]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>3. How satisfied are you with the functionality of your Bedroom area?</label><br/>
                            <label class="radio-inline">
                                &nbsp;<input type="radio" class="custom-radio" name="que_3[ans]"  value="5">&nbsp; Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" class="custom-radio" name="que_3[ans]"  value="4">&nbsp; Very Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_3[ans]"  value="3">&nbsp; Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_3[ans]"  value="2">&nbsp; Below Average</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_3[ans]"  value="1">&nbsp; Unsatisfied</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Comment:</label>
                            <div class="col-sm-10 nopadding">
                                <input type="text" name="que_3[com]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>4. How satisfied are you with the functionality of your Bathroom area?</label><br/>
                            <label class="radio-inline">
                                &nbsp;<input type="radio" class="custom-radio" name="que_4[ans]"  value="5">&nbsp; Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" class="custom-radio" name="que_4[ans]"  value="4">&nbsp; Very Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_4[ans]"  value="3">&nbsp; Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_4[ans]"  value="2">&nbsp; Below Average</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_4[ans]"  value="1">&nbsp; Unsatisfied</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Comment:</label>
                            <div class="col-sm-10 nopadding">
                                <input type="text" name="que_4[com]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>5. How satisfied are you with the functionality of your Guest bathroom area? (if applicable) </label><br/>
                            <label class="radio-inline">
                                &nbsp;<input type="radio" class="custom-radio" name="que_5[ans]"  value="5">&nbsp; Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" class="custom-radio" name="que_5[ans]"  value="4">&nbsp; Very Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_5[ans]"  value="3">&nbsp; Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_5[ans]"  value="2">&nbsp; Below Average</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_5[ans]"  value="1">&nbsp; Unsatisfied</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Comment:</label>
                            <div class="col-sm-10 nopadding">
                                <input type="text" name="que_5[com]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>6. How satisfied are you with the functionality of your Kitchen area? </label><br/>
                            <label class="radio-inline">
                                &nbsp;<input type="radio" class="custom-radio" name="que_6[ans]"  value="5">&nbsp; Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" class="custom-radio" name="que_6[ans]"  value="4">&nbsp; Very Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_6[ans]"  value="3">&nbsp; Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_6[ans]"  value="2">&nbsp; Below Average</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_6[ans]"  value="1">&nbsp; Unsatisfied</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Comment:</label>
                            <div class="col-sm-10 nopadding">
                                <input type="text" name="que_6[com]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>7. How satisfied are you with the finishing of your apartment?</label><br/>
                            <label class="radio-inline">
                                &nbsp;<input type="radio" class="custom-radio" name="que_7[ans]"  value="5">&nbsp; Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" class="custom-radio" name="que_7[ans]"  value="4">&nbsp; Very Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_7[ans]"  value="3">&nbsp; Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_7[ans]"  value="2">&nbsp; Below Average</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_7[ans]"  value="1">&nbsp; Unsatisfied</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Comment:</label>
                            <div class="col-sm-10 nopadding">
                                <input type="text" name="que_7[com]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>8. How satisfied are you with the A/C and Cooling?</label><br/>
                            <label class="radio-inline">
                                &nbsp;<input type="radio" class="custom-radio" name="que_8[ans]"  value="5">&nbsp; Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" class="custom-radio" name="que_8[ans]"  value="4">&nbsp; Very Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_8[ans]"  value="3">&nbsp; Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_8[ans]"  value="2">&nbsp; Below Average</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_8[ans]"  value="1">&nbsp; Unsatisfied</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Comment:</label>
                            <div class="col-sm-10 nopadding">
                                <input type="text" name="que_8[com]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>9. How satisfied are you with the Lighting and Light Levels?</label><br/>
                            <label class="radio-inline">
                                &nbsp;<input type="radio" class="custom-radio" name="que_9[ans]"  value="5">&nbsp; Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" class="custom-radio" name="que_9[ans]"  value="4">&nbsp; Very Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_9[ans]"  value="3">&nbsp; Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_9[ans]"  value="2">&nbsp; Below Average</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_9[ans]"  value="1">&nbsp; Unsatisfied</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Comment:</label>
                            <div class="col-sm-10 nopadding">
                                <input type="text" name="que_9[com]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>10. How satisfied are you with the storage areas in your apartment?</label><br/>
                            <label class="radio-inline">
                                &nbsp;<input type="radio" class="custom-radio" name="que_10[ans]"  value="5">&nbsp; Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" class="custom-radio" name="que_10[ans]"  value="4">&nbsp; Very Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_10[ans]"  value="3">&nbsp; Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_10[ans]"  value="2">&nbsp; Below Average</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_10[ans]"  value="1">&nbsp; Unsatisfied</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Comment:</label>
                            <div class="col-sm-10 nopadding">
                                <input type="text" name="que_10[com]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>11. Overall, How satisfied are you with the apartment quality?</label><br/>
                            <label class="radio-inline">
                                &nbsp;<input type="radio" class="custom-radio" name="que_11[ans]"  value="5">&nbsp; Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" class="custom-radio" name="que_11[ans]"  value="4">&nbsp; Very Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_11[ans]"  value="3">&nbsp; Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_11[ans]"  value="2">&nbsp; Below Average</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_11[ans]"  value="1">&nbsp; Unsatisfied</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Comment:</label>
                            <div class="col-sm-10 nopadding">
                                <input type="text" name="que_11[com]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>12. Which areas do you believe should have been designed differently for your apartment?</label>( Please select two only )<br/>
                            <label class="radio-inline">
                                <input type="checkbox" class="custom-checkbox" name="que_12[ans][]"  value="Living Area" >&nbsp; Living Area</label>
                            <label class="radio-inline">
                                <input type="checkbox" class="custom-checkbox" name="que_12[ans][]"  value="Bedroom">&nbsp; Bedroom</label>
                            <label class="radio-inline">
                                <input type="checkbox"  class="custom-checkbox" name="que_12[ans][]"  value="Laundry">&nbsp; Laundry</label>
                            <label class="radio-inline">
                                <input type="checkbox"  class="custom-checkbox" name="que_12[ans][]"  value="Bathroom">&nbsp; Bathroom</label>
                            <label class="radio-inline">
                                <input type="checkbox"  class="custom-checkbox" name="que_12[ans][]"  value="Dining">&nbsp; Dining</label>
                            <label class="radio-inline">
                                <input type="checkbox"  class="custom-checkbox" name="que_12[ans][]"  value="Storage">&nbsp; Storage</label>
                            <label class="radio-inline">
                                <input type="checkbox"  class="custom-checkbox" name="que_12[ans][]"  value="Corridors">&nbsp; Corridors</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Other:</label>
                            <div class="col-sm-10 nopadding">
                                <input type="text" name="que_12[other]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>13. Do you like the provided appliances?</label><br/>
                            <label class="radio-inline">
                                &nbsp;<input type="radio" class="custom-radio" name="que_13"  value="Yes" >&nbsp; Yes</label>
                            <label class="radio-inline">
                                <input type="radio" class="custom-radio" name="que_13"  value="No">&nbsp; No</label>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <h3 style=" color: #000; ">Building and Common Areas</h3>
                    </div>
                </div>



                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>14. How do you feel about the architecture of the building?</label><br/>
                            <label class="radio-inline">
                                &nbsp;<input type="radio" class="custom-radio" name="que_14[ans]"  value="5">&nbsp; Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" class="custom-radio" name="que_14[ans]"  value="4">&nbsp; Very Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_14[ans]"  value="3">&nbsp; Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_14[ans]"  value="2">&nbsp; Below Average</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_14[ans]"  value="1">&nbsp; Unsatisfied</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Comment:</label>
                            <div class="col-sm-10 nopadding">
                                <input type="text" name="que_14[com]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>15. How do you feel about the accessibility of the carpark?</label><br/>
                            <label class="radio-inline">
                                &nbsp;<input type="radio" class="custom-radio" name="que_15[ans]"  value="5">&nbsp; Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" class="custom-radio" name="que_15[ans]"  value="4">&nbsp; Very Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_15[ans]"  value="3">&nbsp; Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_15[ans]"  value="2">&nbsp; Below Average</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_15[ans]"  value="1">&nbsp; Unsatisfied</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Comment:</label>
                            <div class="col-sm-10 nopadding">
                                <input type="text" name="que_15[com]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>16. How do you feel about the design of the reception?</label><br/>
                            <label class="radio-inline">
                                &nbsp;<input type="radio" class="custom-radio" name="que_16[ans]"  value="5">&nbsp; Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" class="custom-radio" name="que_16[ans]"  value="4">&nbsp; Very Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_16[ans]"  value="3">&nbsp; Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_16[ans]"  value="2">&nbsp; Below Average</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_16[ans]"  value="1">&nbsp; Unsatisfied</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Comment:</label>
                            <div class="col-sm-10 nopadding">
                                <input type="text" name="que_16[com]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>17. How do you feel about the landscape and garden of your building?</label><br/>
                            <label class="radio-inline">
                                &nbsp;<input type="radio" class="custom-radio" name="que_17[ans]"  value="5">&nbsp; Excellent</label>
                            <label class="radio-inline">
                                <input type="radio" class="custom-radio" name="que_17[ans]"  value="4">&nbsp; Very Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_17[ans]"  value="3">&nbsp; Satisfied</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_17[ans]"  value="2">&nbsp; Below Average</label>
                            <label class="radio-inline">
                                <input type="radio"  class="custom-radio" name="que_17[ans]"  value="1">&nbsp; Unsatisfied</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Comment:</label>
                            <div class="col-sm-10 nopadding">
                                <input type="text" name="que_17[com]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>18. Are you satisfied with the provided facilities in your building?  </label><br/>
                            <label class="radio-inline">
                                &nbsp;<input type="radio" class="custom-radio" name="que_18"  value="Yes" >&nbsp; Yes</label>
                            <label class="radio-inline">
                                <input type="radio" class="custom-radio" name="que_18"  value="No">&nbsp; No</label>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>19.	What type of facilities would you prefer additionally?   </label>( Please select two only )<br/>
                            <label class="radio-inline">
                                &nbsp;<input type="checkbox" class="custom-checkbox" name="que_19[ans][]"  value="Basketball Court" >&nbsp; Basketball Court</label>
                            <label class="radio-inline">
                                <input type="checkbox" class="custom-checkbox" name="que_19[ans][]"  value="Multi-Purpose Hall">&nbsp;Multi-Purpose Hall</label>
                            <label class="radio-inline">
                                <input type="checkbox" class="custom-checkbox" name="que_19[ans][]"  value="Prayer Room">&nbsp;Prayer Room</label>
                            <label class="radio-inline">
                                <input type="checkbox" class="custom-checkbox" name="que_19[ans][]"  value="Playground">&nbsp;Playground</label>
                            <label class="radio-inline">
                                <input type="checkbox" class="custom-checkbox" name="que_19[ans][]"  value="Nursery">&nbsp;Nursery</label>
                            <label class="radio-inline">
                                <input type="checkbox" class="custom-checkbox" name="que_19[ans][]"  value="Recycling Facilities ">&nbsp;Recycling Facilities </label>
                            <label class="radio-inline">
                                <input type="checkbox" class="custom-checkbox" name="que_19[ans][]"  value="Water Features ">&nbsp;Water Features </label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Other:</label>
                            <div class="col-sm-10 nopadding">
                                <input type="text" name="que_19[other]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>20. What do you like most about your apartment building?</label>
                            <input type="text" name="que_20" class="form-control">
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>21. What do you like least about your apartment building? </label>
                            <input type="text" name="que_21" class="form-control">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <h3 style=" color: #000; margin-bottom: 0;">Maintenance</h3>
                        <p>( Rate your experience 5= Excellent 4=Very Satisfied 3=Satisfied 2= Below Average 1= Unsatisfied)</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label  class="col-sm-6">a. Maintenance – Team Responsiveness</label>
                            <div class="col-sm-6">
                                <label class="radio-inline">
                                    &nbsp;<input type="radio" class="custom-radio" name="que_a"  value="5">&nbsp; 5</label>
                                <label class="radio-inline">
                                    <input type="radio" class="custom-radio" name="que_a"  value="4">&nbsp; 4</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_a"  value="3">&nbsp; 3</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_a"  value="2">&nbsp; 2</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_a"  value="1">&nbsp; 1</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label  class="col-sm-6">b.	Maintenance – Team Friendliness</label>
                            <div class="col-sm-6">
                                <label class="radio-inline">
                                    &nbsp;<input type="radio" class="custom-radio" name="que_b"  value="5">&nbsp; 5</label>
                                <label class="radio-inline">
                                    <input type="radio" class="custom-radio" name="que_b"  value="4">&nbsp; 4</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_b"  value="3">&nbsp; 3</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_b"  value="2">&nbsp; 2</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_b"  value="1">&nbsp; 1</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label  class="col-sm-6">c.	Maintenance – Team Competence </label>
                            <div class="col-sm-6">
                                <label class="radio-inline">
                                    &nbsp;<input type="radio" class="custom-radio" name="que_c"  value="5">&nbsp; 5</label>
                                <label class="radio-inline">
                                    <input type="radio" class="custom-radio" name="que_c"  value="4">&nbsp; 4</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_c"  value="3">&nbsp; 3</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_c"  value="2">&nbsp; 2</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_c"  value="1">&nbsp; 1</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="col-sm-6">d. Landscape/Garden Maintenance</label>
                            <div class="col-sm-6">
                                <label class="radio-inline">
                                    &nbsp;<input type="radio" class="custom-radio" name="que_d"  value="5">&nbsp; 5</label>
                                <label class="radio-inline">
                                    <input type="radio" class="custom-radio" name="que_d"  value="4">&nbsp; 4</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_d"  value="3">&nbsp; 3</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_d"  value="2">&nbsp; 2</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_d"  value="1">&nbsp; 1</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="col-sm-6">e.	Cleanliness of Hallways/Lobbies</label>
                            <div class="col-sm-6">
                                <label class="radio-inline">
                                    &nbsp;<input type="radio" class="custom-radio" name="que_e"  value="5">&nbsp; 5</label>
                                <label class="radio-inline">
                                    <input type="radio" class="custom-radio" name="que_e"  value="4">&nbsp; 4</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_e"  value="3">&nbsp; 3</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_e"  value="2">&nbsp; 2</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_e"  value="1">&nbsp; 1</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="col-sm-6">f.	On-Site Management – Competence</label>
                            <div class="col-sm-6">
                                <label class="radio-inline">
                                    &nbsp;<input type="radio" class="custom-radio" name="que_f"  value="5">&nbsp; 5</label>
                                <label class="radio-inline">
                                    <input type="radio" class="custom-radio" name="que_f"  value="4">&nbsp; 4</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_f"  value="3">&nbsp; 3</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_f"  value="2">&nbsp; 2</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_f"  value="1">&nbsp; 1</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="col-sm-6">g.	On-Site Management – Friendliness</label>
                            <div class="col-sm-6">
                                <label class="radio-inline">
                                    &nbsp;<input type="radio" class="custom-radio" name="que_g"  value="5">&nbsp; 5</label>
                                <label class="radio-inline">
                                    <input type="radio" class="custom-radio" name="que_g"  value="4">&nbsp; 4</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_g"  value="3">&nbsp; 3</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_g"  value="2">&nbsp; 2</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_g"  value="1">&nbsp; 1</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="col-sm-6">h.	On-Site Management – Responsiveness </label>
                            <div class="col-sm-6">
                                <label class="radio-inline">
                                    &nbsp;<input type="radio" class="custom-radio" name="que_h"  value="5">&nbsp; 5</label>
                                <label class="radio-inline">
                                    <input type="radio" class="custom-radio" name="que_h"  value="4">&nbsp; 4</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_h"  value="3">&nbsp; 3</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_h"  value="2">&nbsp; 2</label>
                                <label class="radio-inline">
                                    <input type="radio"  class="custom-radio" name="que_h"  value="1">&nbsp; 1</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <br/><br/>
                        <button name="submit" type="submit"  data-submit="...Sending" tabindex="12" >Submit</button> <br/><br/>
                    </div>
                </div>
            </form>
        </div>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!--script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script-->
        <script>

<?php if (!empty($_GET['status']) && $_GET['status'] == 'success') { ?>
    $('#msg').text('You are redirection to <?=DOMAIN_NAME?>');
    setTimeout(function () {
        window.location = '<?=SITE_URL?>';
    }, 7000);
<?php } ?>

$('input').keypress(function (event) {
    if (event.keyCode == '13') {
        event.preventDefault();
    }
});

        </script>
    </body>
</html>