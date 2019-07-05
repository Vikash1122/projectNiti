@extends('admin.layouts.test_layout')

@section('content')
<div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">Schedule Survey</a> </li>
                </ul>

                <div class="page-title"> 
                    <a href="{{ url()->previous() }}">
                        <i class="icon-custom-left"></i>
                    </a>
                    <h3>Schedule Survey  <span class="semi-bold">&nbsp;</span></h3>
                </div>

                
                <div class="row">
                    <div class="col-md-4">
                        <div class="content-box-main">
                            <div id='calendar1'></div>
                        </div>
                        
                    </div>

                    <div class="col-md-8">
                        <div class="content-box-main" id="scheduleData">
                            <div class="calenderHeading" style="margin-bottom: 20px;">
                                <h5 class="date_selected pull-left" style="width:100%">Date : <span>{{ date('d-m-Y') }}</span> <span class="pull-right greenColor">Total Survey : {{ count($surveyors) }} </span></h5>
                            </div>
                            @if(isset($surveyors) && !empty($surveyors))
                            @foreach($surveyors as $surv)
                            <div class="order_history_box">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="job_desc_box_list">
                                            <div class="title">
                                                <h5>Surveyor<span class="pull-right srv_name"></span></h5>
                                            </div>       
                                        </div>
                                        <div class="widget_user_list surveyor_dtl">
                                            <div class="widget_img_box">
                                            @if(isset($surv->emp_profile) && !empty($surv->emp_profile))
                                                <img src="{{ fileurlemp().$surv->emp_profile }}" class="img-responsive">
                                            @else
                                                <img src="{{ asset('public/img/defaultIcon.png') }}" class="img-responsive">
                                            @endif
                                            </div>
                                            <div class="bs_inf_jd">
                                                <h5 class="text-center">{{ $surv->employee_name }}</h5>
                                                <p>( {{ $surv->emp_mobile }} )</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="sdl_srv" id="style-1">
                                            <div class="force-overflow">
                                            @if(isset($surv->jobs[0]) && !empty($surv->jobs[0]))
                                            @foreach($surv->jobs as $job)
                                                <div class="sub_ser_box_list">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="job_desc_box_list">
                                                                <div class="title">
                                                                    <h5>Job No. <span class="srv_name">{{ $job->id }}</span></h5>
                                                                </div>       
                                                            </div>
                                                        </div>
                                                    </div>  

                                                    <div class="row">
                                                        <div class="col-md-12 job_desc_box_list">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="jb_list_bl">
                                                                        <p>Customer</p>
                                                                        @if(isset($job->profile_pic) && !empty($job->profile_pic))
                                                                        <img src="{{ fileurlUser().$job->profile_pic }}" alt="" data-src="{{ fileurlUser().$job->profile_pic }}" width="35" height="35">
                                                                        @else
                                                                        <img src="{{ asset('public/img/profiles/avatar_small.jpg') }}" alt="" data-src="{{ asset('public/img/profiles/avatar_small.jpg') }}" width="35" height="35">
                                                                        @endif
                                                                        <h5>{{ $job->firstname }} {{ $job->lastname }}</h5> 
                                                                        <p>( {{ $job->mobile }} )</p>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-9">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <h5 class="textHead">Slot Time</h5>
                                                                            <p>{{ $job->slot_name }} : <br /> {{ $job->slotstart_time }} - {{ $job->slotend_time }}</p>
                                                                        </div>
                                                                        @if($job->status == 1)
                                                                        <div class="col-sm-4">
                                                                            <h5 class="textHead">Estimate Price</h5>
                                                                            <p>Nill</p>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <h5 class="textHead">Estimate Time</h5>
                                                                            <p>Nill</p>
                                                                        </div>
                                                                        @endif
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <h5 class="textHead">Location</h5>
                                                                            <p>{{ $job->address }}</p>
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <h5 class="textHead">Distance</h5>
                                                                            <p>30 KM</p>
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <h5 class="textHead">Status</h5>
                                                                            @if($job->status == 0)
                                                                            <span class="bold pending">Requested</span>
                                                                            @elseif($job->status == 1)
                                                                            <span class="bold pending">Scheduled</span>
                                                                            @elseif($job->status == 2)
                                                                            <span class="bold pending">Proposed</span>
                                                                            @elseif($job->status == 3)
                                                                            <span class="bold pending">Accepted</span>
                                                                            @elseif($job->status == 4)
                                                                            <span class="bold pending">In Process</span>
                                                                            @elseif($job->status == 5)
                                                                            <span class="bold pending">Completed</span>
                                                                            @elseif($job->status == 6)
                                                                            <span class="bold pending">Rejected</span>
                                                                            @else

                                                                            @endif
                                                                        </div>

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 text-right">
                                                                        <a href="{{ url('admin/surveyers/jobs/'.$job->id) }}" class="btn btn-primary">Add Report</a>
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
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="order_history_box">
                                <div class="row">
                                    <p>No Record Found!</p>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>  
@endsection