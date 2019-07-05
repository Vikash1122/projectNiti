@extends('admin.layouts.test_layout')

@section('content')
<div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">Requested Survey</a> </li>
                </ul>

                <div class="page-title"> 
                    <a href="{{ url()->previous() }}">
                        <i class="icon-custom-left"></i>
                    </a>
                    <h3>Requested Survey  <span class="semi-bold">&nbsp;</span></h3>
                </div>

                <div class="content-box-main filtersDiv">
                    <div class="row">
                        <!-- <div class="col-md-3">
                            <div class="input-group"> 
                                <select class="form-control">
                                    <option value="">Distance</option>
                                    <option value="0-10">0-10 KM</option>
                                    <option value="11-20">11-20 KM</option>
                                    <option value="21-30">21-30 KM</option>
                                    <option value="31-40">31-40 KM</option>
                                    <option value="41-50">41-50 KM</option>
                                </select>
                            </div>
                        </div> -->

                        <div class="col-md-3">
                            <div class="input-group"> 
                                <select name="service_type" id="myserviceType" class="form-control">
                                    <option value="">Service Type</option>
                                    <option value="Emergency">Emergency</option>
                                    <option value="Regular">Regular</option>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="col-md-3">
                            <div class="input-group"> 
                                <select class="form-control">
                                    <option value="">Price</option>
                                    <option value="High">High</option>
                                    <option value="Low">Low</option>
                                </select>
                            </div>
                        </div> -->

                        <div class="col-md-offset-6 col-md-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn" type="button" style="background:transparent;"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                            <!-- <div class="dataTables_filter" id="example_filter">
                                <label>Search :  <input type="text" aria-controls="example" class="input-medium"></label>
                            </div> -->
                        </div>
                    </div>
                </div>

                <!--<div class="content-box-main">-->
                @if(Session::has('message')) 
                    <div class="alert alert-info">
                        {{Session::get('message')}} 
                    </div> 
                @endif
                    <div class="row">
                        <div class="col-md-4">
                            <div class="content-box-main">
                                <div id='calendar'></div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="content-box-main" id="CurrentJobdate7">
                                <h4 style="font-weight: 500;" id="jobDate3">Date : <span style="color: #039347;" id="jobdt2">{{ date('d-m-Y') }}</span></h4>
                                <div class="job_list_section_block" id="style-1">
                                    <div class="force-overflow">
                                        <div class="row" id="currentdateJobs">
                                          @if(isset($jobs[0]) && !empty($jobs[0]))
                                          @foreach($jobs as $jb)
                                          <div class="col-md-12">
                                                <div class="order_history_box req_sr_box_main">
                                                    <div class="row">
                                                        <div class="col-sm-4 jd_list_cust_img_box">
                                                            <div class="order_history_box">
                                                                <div class="job_desc_box_list">
                                                                    <div class="title">
                                                                        <h5>Job No. <span class="pull-right srv_name"> {{ $jb->id }} </span></h5>
                                                                    </div>       
                                                                </div>
                                                                <div class="widget_user_list req_sr_card">
                                                                    <div class="widget_img_box">
                                                                        <img src="{{ asset('public/img/defaultIcon.png') }}" class="">
                                                                    </div>
                                                                    <div class="bs_inf_jd">
                                                                        <h5 class="text-center">{{ $jb->firstname }} {{ $jb->lastname }}</h5>
                                                                        <p>({{ $jb->mobile }})</p>
                                                                    </div>
                                                                    
                                                                    <div class="job_desc_box_list">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-xs-12">
                                                                                <h5 class="textHead">Location</h5>
                                                                                <p>{{ $jb->address }}</p>
                                                                            </div>

                                                                            <div class="col-sm-12 col-xs-12">
                                                                                <h5 class="textHead">Distance <span class="pull-right req_sr_card_dis">25 KM</span> </h5>
                                                                            </div>
                                                                        </div>    
                                                                    </div>
                                                                </div>  
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-8 req_sr_card_dt_panel">
                                                            <div class="sub_ser_box_list">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="table-responsive">
                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Service Date</th>
                                                                                        <th>Slot</th>
                                                                                        <th>Time</th>
                                                                                    </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>{{ $jb->job_date }}</td>
                                                                                        <td>{{ $jb->slot_name }}</td>
                                                                                        <td>{{ $jb->slotstart_time }} - {{ $jb->slotend_time }}</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="job_desc_box_list">
                                                                <div class="sub_ser_box_list">
                                                                    <div class="title_new">
                                                                        <h5>Services 
                                                                            <span class="pending">{{ ucwords($jb->service_type) }} Service</span>
                                                                        </h5>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="jd_desc_blk" id="style-1">
                                                                                <div class="force-overflow">
                                                                                @if(isset($jb->services[0]) && !empty($jb->services[0]))
                                                                                <?php //prd($jb->services[0])?>
                                                                                @foreach($jb->services as $jbserv)
                                                                                    <div class="card_main_srv_lst">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <h5 class="textHead mar_bot nm_srv">Service Name : <span class="srv_name">{{ $jbserv->service_name }}</span></h5>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <h5 class="textHead">Job Services Details</h5>
                                                                                                <div class="list_sub_srv">
                                                                                                @if(isset($jbserv->jobServices) && !empty($jbserv->jobServices))
                                                                                                    <div class="problemText">
                                                                                                        <div class="pblIcon"><i class="fa fa-question-circle"></i></div>
                                                                                                        <div class="pblTxt">{{ $jbserv->jobServices->specify_problem }}</div>
                                                                                                    </div>

                                                                                                    <div class="additionalText">
                                                                                                        <div class="adtIcon"><i class="fa fa-info-circle"></i></div>
                                                                                                        <div class="adtTxt">{{ $jbserv->jobServices->additional_notes }}</div>
                                                                                                    </div>
                                                                                                @endif
                                                                                                </div>
                                                                                        </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                                @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="footer_bx">
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <div class="job_desc_box_list">
                                                                            <h5>Total Estimated Price <span class="pull-right">5000 AED</span></h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-7 text-right">
                                                                        <button type="button" class="hashtags asign_job_btn tp_mar_4" data-toggle="modal" data-target=".allotJob">Allot</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                          </div>
                                          @endforeach
                                          @else
                                          <div class="col-md-12">
                                                <div class="order_history_box req_sr_box_main">
                                                    <div class="row">
                                                        <p>No Record Found!</p>
                                                    </div>
                                                </div>
                                            </div>
                                          @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!--</div> -->          
            </div> 
             <!--Allot Surveyor modal start-->
    <div class="modal fade allotJob" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Job No - ECT001</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content-box-main">
                                <div class="title_modal">
                                    <h5>Allot Survey</h5>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="modal_form_block">
                                            <form action="{{ route('surveyers.post') }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="job_id" id="jobId" value="">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form_control_new date_picker">  
                                                            <div class="label_head">Survey Date</div>
                                                            <div class="input-append success date input-group"> 
                                                                <span class="input-group-addon add-on">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span> 
                                                                <input class="form-control" name="servey_date" id="servey_date1" placeholder="Salect Survey Date" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12" id="date_slots_div">
                                                        <div class="form_control_new">
                                                            <div class="sub_ser_box_header">
                                                                <div class="row">
                                                                    <div class="col-md-3">Day Slots</div>
                                                                    <div class="col-md-6">Slot Time</div>
                                                                    <div class="col-md-3">Status</div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="srv_dt_slot" id="srv_slot_datadt1">
                                                                <div class="sub_ser_box_list">
                                                                    <div class="row" id="slotMessage1">
                                                                        <div class="col-md-3">
                                                                            <div class="radio radio-primary">
                                                                                <input id="morning" type="radio" name="survey_slot_id" value="1" checked="checked">
                                                                                <label for="morning">Morning</label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="">  
                                                                                <div class="input-group"> 
                                                                                    <span class="input-group-addon" id="slot_time"><i class="fa fa-clock-o"></i></span> 
                                                                                    <input class="form-control" name="slot_time" id="slot_time" placeholder="9:00 AM - 12:00 PM"> 
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-3">
                                                                            <button type="button" class="availableSlot">Available</button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="sub_ser_box_list">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <div class="radio radio-primary">
                                                                                <input id="afternoon" type="radio" name="survey_slot_id" value="afternoon">
                                                                                <label for="afternoon">Afternoon</label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="">  
                                                                                <div class="input-group"> 
                                                                                    <span class="input-group-addon" id="slot_time"><i class="fa fa-clock-o"></i></span> 
                                                                                    <input class="form-control" name="slot_time" id="slot_time" placeholder="12:00 PM - 3:00 PM"> 
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-3">
                                                                            <button type="button" class="availableSlot">Available</button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="sub_ser_box_list">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <div class="radio radio-primary">
                                                                                <input id="evening" disabled="true" type="radio" name="survey_slot_id" value="evening">
                                                                                <label for="evening">Evening</label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="">  
                                                                                <div class="input-group"> 
                                                                                    <span class="input-group-addon" id="slot_time"><i class="fa fa-clock-o"></i></span> 
                                                                                    <input class="form-control" disabled="true" readonly name="slot_time" id="slot_time" placeholder="3:00 PM - 6:00 PM"> 
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-3">
                                                                            <button type="button" class="blockDate ">Block</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>     
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form_control_new">  
                                                            <div class="label_head">Surveyor</div>
                                                            <select name="surveyor_emp_id" id="surveyor_emp_id" style="width:100%" required>
                                                                <option value="">Select Surveyor</option>
                                                                @if(isset($surver_emp) && !empty($surver_emp))
                                                                @foreach($surver_emp as $surv)
                                                                    <option value="{{ $surv->id }}">{{ $surv->employee_name }}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>    
                                                </div>

                                                <hr />

                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <div class="form_control_new"> 
                                                            <button type="submit" name="" class="btn btn-cons btn-primary">Assign</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>  
                    </div>      
                </div>
            </div>
        </div>
    </div>
    <!--Allot Surveyor modal End-->
    @endsection