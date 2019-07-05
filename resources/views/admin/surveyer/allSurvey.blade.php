@extends('admin.layouts.test_layout')

@section('content')
<div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">All Survey</a> </li>
                </ul>

                <div class="page-title"> <i class="icon-custom-left"></i>
                    <h3>All Survey  <span class="semi-bold">&nbsp;</span></h3>
                </div>

                <div class="content-box-main">
                    <div class="job_list_section_block" id="style-1">
                        <div class="force-overflow">
                            <div class="row">
                                <div id="exTab1">   
                                <ul class="nav nav-pills">
                                    <li class="active">
                                    <a href="#1a" data-toggle="tab">All Serveys</a>
                                    </li>
                                    <li>
                                    <a href="#2a" id="statusSurveys" data-status_id="1" data-toggle="tab">In Negotiations</a>
                                    </li>
                                    <li>
                                    <a href="#3a" id="statusSurveys1" data-status_id="2" data-toggle="tab">Cancelled </a>
                                    </li>
                                    <li>
                                    <a href="#4a" id="statusSurveys2"  data-status_id="6" data-toggle="tab">Rejected</a>
                                    </li>
                                </ul>

                                <div class="tab-content clearfix">
                                    <div class="tab-pane active" id="1a">
                                        <div class="row">
                                        @if(isset($jobs[0]) && !empty($jobs[0]))
                                        @foreach($jobs as $jb)
                                            <div class="col-md-6">
                                                <div class="order_history_box req_sr_box_main">
                                                    <div class="row">
                                                        <div class="col-sm-4 jd_list_cust_img_box">
                                                            <div class="order_history_box">
                                                                <div class="job_desc_box_list">
                                                                    <div class="title">
                                                                        <h5>Job No. <span class="pull-right srv_name">{{ $jb->id }}</span></h5>
                                                                    </div>       
                                                                </div>
                                                                <div class="widget_user_list req_sr_card">
                                                                    <div class="widget_img_box">
                                                                    @if(isset($jb->profile_pic) && !empty($jb->profile_pic))
                                                                        <img src="{{ fileurlUser().$jb->profile_pic }}" class="">
                                                                    @else
                                                                        <img src="{{ asset('public/img/defaultIcon.png') }}" class="">
                                                                    @endif
                                                                    </div>
                                                                    <div class="bs_inf_jd">
                                                                        <h5 class="text-center"> {{ $jb->firstname }} {{ $jb->lastname }}</h5>
                                                                        <p><i class="fa fa-phone"> {{ $jb->mobile }}</i></p>
                                                                    </div>
                                                                    
                                                                    <div class="job_desc_box_list">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-xs-12">
                                                                                <h5 class="textHead">Location</h5>
                                                                                <p>{{ substr($jb->address, 0, 38) . '...' }}</p>
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
                                                        @if(isset($jb->surveyerdetail) && !empty($jb->surveyerdetail))
                                                            <div class="sub_ser_box_list">
                                                            
                                                                <div class="row">
                                                                    <!-- <a href="view_emp_details.php"> -->
                                                                        <div class="col-md-12">
                                                                            <h6 class="textHead mar_bot nm_srv bold text-black">Surveyor</h6>
                                                                        </div>
                                                                        <div class="col-md-2 col-sm-2">
                                                                            <div class="profile-img-wrapper pull-left m-l-10">
                                                                                <div class=" p-r-10">
                                                                                @if(isset($jb->surveyerdetail->emp_profile) && !empty($jb->surveyerdetail->emp_profile))
                                                                                <img src="{{ fileurlemp().$jb->surveyerdetail->emp_profile }}" alt="" data-src="{{ fileurlemp().$jb->surveyerdetail->emp_profile }}" >
                                                                                @else
                                                                                    <img src="{{ asset('public/img/profiles/avatar_small.jpg') }}" alt="" data-src="{{ asset('public/img/profiles/avatar_small.jpg') }}" >
                                                                                @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-10 col-sm-10">
                                                                            <div style="line-height: 9px;padding-top:5px;" class="user-name text-black bold large-text"> {{ $jb->surveyerdetail->employee_name }} </div>
                                                                            <div><span class="bold">{{ $jb->surveyerdetail->emp_mobile }}</span></div>
                                                                        </div>
                                                                    <!-- </a> -->
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="table-responsive">
                                                                            <table class="table tb-ped sr_dt_tbl">
                                                                                <thead>
                                                                                    <tr>
                                                                                        
                                                                                        <th>Survey Date</th>
                                                                                        <th>Estimate time</th>
                                                                                        <th>Status</th>
                                                                                    </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                    <tr>
                                                                                        
                                                                                        <td>{{ date("F d, Y", strtotime($jb->surveyerdetail->servey_date)) }}</td>
                                                                                        @if($jb->status == 1)
                                                                                        <td>Nill</td>       
                                                                                        @endif                                                                     
                                                                                        <td class="text-bold text-green">
                                                                                            @if($jb->status == 0)
                                                                                                Requested
                                                                                            @elseif($jb->status == 1)
                                                                                                Scheduled
                                                                                            @elseif($jb->status == 2)
                                                                                                Proposed
                                                                                            @elseif($jb->status == 3)
                                                                                                Accepted
                                                                                            @elseif($jb->status == 4)
                                                                                                In Process
                                                                                            @elseif($jb->status == 5)
                                                                                                Completed
                                                                                            @elseif($jb->status == 6)
                                                                                                Rejected
                                                                                            @else

                                                                                            @endif
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            
                                                            </div>
                                                        @endif
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
                                                                                @foreach($jb->services as $serv)
                                                                                    <div class="card_main_srv_lst">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <h5 class="textHead mar_bot nm_srv">Service Name : <span class="srv_name">{{ $serv->service_name }}</span></h5>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <h5 class="textHead theadBorder">Job Services Details</h5>
                                                                                                <div class="list_sub_srv">
                                                                                                <div class="problemText">
                                                                                                    <div class="pblIcon">
                                                                                                            <i class="fa fa-question-circle"></i></div>
                                                                                                            <div class="pblTxt">{{ $serv->jobServices->specify_problem }}</div>
                                                                                                    </div>

                                                                                                    <div class="additionalText">
                                                                                                        <div class="adtIcon"><i class="fa fa-info-circle"></i></div>
                                                                                                        <div class="adtTxt">{{ $serv->jobServices->additional_notes }}</div>
                                                                                                    </div>
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

                                                                <!-- <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <button type="button" class="hashtags asign_job_btn" data-toggle="modal" data-target=".allotJob">Allot</button>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="footer_bx">
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <div class="job_desc_box_list">
                                                                            <h5>Total Estimated Price <span class="pull-right">40.00 AED</span></h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-7 text-right">
                                                                        <a href="{{ route('detail.view') }}" class="hashtags asign_job_btn tp_mar_4">View</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @endif
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="2a">
                                        <div class="row" id="proposedDataSurv">
                                             
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="3a">
                                        <div class="row" id="proposedDataSurv1">
                                            
                                        </div>    
                                    </div>

                                    <div class="tab-pane " id="4a">
                                        <div class="row" id="proposedDataSurv2">
                                            
                                        </div>
                                    </div>

                                </div>  
                            </div>    
                        </div>
                    </div> 
                </div>  


            </div> 
@endsection