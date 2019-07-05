@extends('admin.layouts.test_layout')

    @section('content')
       
        <div class="content">
            <div class="page-title"> 
                <a href="{{ url()->previous() }}" class="previousBtn">
                    <img src="{{asset ('public/img/go_back.png') }}" class="img-responsive">
                </a>
                <h3>Alloted Orders</h3>
                <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>View Orders Details</h3></div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="content-box-main">
                        <div class="header_main_div_sec">
                            <div class="title">
                                <h5>Job No :<span class="text-green">{{ $job->id }}</span></h5>
                            </div>       
                        </div>

                        <div class="row job_desc_box_list">
                            <div class="col-md-3">
                                <div class="widget_user_list req_sr_card">
                                    <div class="widget_img_box">
                                    @if(isset($job->profile_pic) && !empty($job->profile_pic))
                                        <img src="{{ fileurlUser().$job->profile_pic }}" class="">
                                    @else
                                        <img src="{{ asset('public/img/defaultCustomer.png') }}" class="">
                                    @endif
                                    </div>
                                </div>  
                            </div>

                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5 class="textHead">Customer Name</h5>
                                        <p>{{ $job->firstname }} {{ $job->lastname }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="textHead">Mobile No</h5>
                                        <p>{{ $job->mobile }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="textHead">AMC holder</h5>
                                        <p>AMC No. {{ $job->amc_id}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="textHead">Service Type</h5>
                                        <p>{{ $job->service_type }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="textHead">Job Date</h5>
                                        <p>{{ $job->job_date }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="textHead">Estimated Start Time</h5>
                                        <p>{{ $job->slotstart_time }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="textHead">Job Duration</h5>
                                        <p>45 minutes</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="textHead">Job Status</h5>
                                        @if($job->status == 3)
                                            <p class="text-orange">Requested</p>
                                        @elseif($job->status == 4)
                                            <p class="text-green">Service Team Alloted</p>
                                        @elseif($job->status == 5)
                                            <p class="text-light-blue">In Process</p>
                                        @elseif($job->status == 6)
                                            <p class="text-green-light">Proposed</p>
                                        @elseif($job->status == 7)
                                            <p class="text-green">Payment Done</p>
                                        @elseif($job->status == 8)
                                            <p class="">Completed</p>
                                        @elseif($job->status == 9)
                                            <p class="text-brown">Rejected</p>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <h5 class="textHead">Services</h5>
                                        <p>{{ $job->service }}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h5 class="textHead">Team Name</h5>
                                        <p>{{ $job->group_name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="textHead">Location</h5>
                                <div style="padding: 10px;border: 5px solid #e1e1e1;">
                                    <div class="mapouter">
                                        <div class="gmap_canvas">
                                            <iframe width="100%" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q={{ $job->address }}&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                        </div>
                                        <style>.mapouter{text-align:right;height:300px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:300px;width:100%;}</style>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="header_main_div_sec marginTop40">
                            <div class="title">
                                <h5>Team Members</h5>
                            </div>       
                        </div>

                        <div class="row">
                        @if(isset($job->teamMember[0]) && !empty($job->teamMember[0]))
                        @foreach($job->teamMember as $team)
                            <div class="col-md-3">
                                <div class="order_history_box">
                                    <div class="team_members team_members-ng">
                                        <div class="widget_img_box">
                                        @if(isset($team->emp_profile) && !empty($team->emp_profile))
                                            <img src="{{ fileurlemp().$team->emp_profile }}" class="img-responsive">
                                        @else
                                            <img src="{{ asset('public/img/defaultCustomer.png') }}" class="img-responsive">
                                        @endif
                                        </div>
                                        <div class="widget-title">
                                            <h4>{{ $team->employee_name }}</h4>
                                            <h5>( {{ $team->emp_mobile }} )</h5>
                                            <p class="text-green">{{ $team->emp_role }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else
                        <div class="col-md-12">
                            <div class="order_history_box">
                                <h4 class="text-center">Team Not Assign</h4>
                            </div>
                        </div>
                        @endif
                        </div>

                        <div class="row">
                            <div class="col-md-12 marginTop40">
                                <div class="header_main_div_sec">
                                    <div class="title">
                                        <h5>Services</h5>
                                    </div>       
                                </div>
                            </div> 

                            <div class="col-md-12 viewOrderDetail-ng">
                                <div class="jd_desc_blk" id="style-1">
                                    <div class="force-overflow">
                                    @if(isset($job->services[0]) && !empty($job->services[0]))
                                    @foreach($job->services as $servc)
                                        <div class="card_main_srv_lst">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5 class="textHead mar_bot nm_srv">Service Name : <span class="srv_name">{{ $servc->service_name }}</span></h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="listSubSr">
                                                        <h5 class="textHead">Sub Services</h5>
                                                        <div class="list_sub_srv">
                                                            <div class="problemText">
                                                                <div class="pblIcon">
                                                                    <i class="fa fa-question-circle"></i>
                                                                </div>
                                                                <div class="pblTxt">{{ $servc->jobServices->specify_problem }}</div>
                                                            </div>
                                                            <div class="additionalText">
                                                                <div class="adtIcon">
                                                                    <i class="fa fa-info-circle"></i>
                                                                </div>
                                                                <div class="adtTxt">{{ $servc->jobServices->additional_notes }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @else
                                        <div class="card_main_srv_lst">
                                            <h4 class="text-center">No Record Found!</h4>
                                        </div>
                                    @endif
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

    @endsection        