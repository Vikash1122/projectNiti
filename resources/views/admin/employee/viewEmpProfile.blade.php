@extends('admin.layouts.emp_layout')

@section('content')
    <div class="content">
        <div class="page-title"> 
            <a href="{{ url()->previous() }}" class="previousBtn">
                <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
            </a>
            <h3>Employee List</h3>
            <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Personal Information </h3></div>
        </div>

        @if(isset($employee) && !empty($employee))
            <div class="row">
                <div class="col-md-12">
                    <div class="content-box-main">
                        <div class="box">
                            <div class="row">
                                <div class="col-xl-3 col-md-3">
                                    <div class="mainWidget_ng ">
                                        <div class="head_ng borderBottomNone ng_listEmp">
                                            <div class="icon_div">
                                                @if(isset($employee->emp_profile) && !empty($employee->emp_profile))
                                                    <img src="{{ fileurlemp().$employee->emp_profile }}" class="center-block userImg img-responsive">
                                                @else
                                                    <img src="{{ asset('public/img/vendorDefault.png') }}" class="">
                                                @endif
                                            </div>
                                            <h4 class="text-center">{{ $employee->employee_name }} </h4>
                                            <p class="text-center">{{ $employee->emp_role }}</p>
                                        </div>

                                        <div class="title listEmp">
                                            <div class="service_title">
                                                <h5>Skills</h5>
                                                <p>
                                                    <?php $serv = explode(',',$employee->service_name);?>
                                                    <span>{{ $employee->service_name }}</span>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="content_opt borderTop_none"> 
                                            <div class="card_loc">
                                                <div class="row">
                                                    <div class="col-md-7 col-sm-7 col-xs-7">
                                                        <div class="tiles-title card-text-heading">Mobile Number</div>
                                                        <div class="job_st_details">+971-{{ $employee->emp_mobile }}</div>
                                                    </div>

                                                    <div class="col-md-5 col-sm-5 col-xs-5">
                                                        <div class="tiles-title card-text-heading">Team</div>
                                                        @if(isset($employee->group) && !empty($employee->group))
                                                        <div class="job_st_details">{{ $employee->group }}</div>
                                                        @else
                                                        <div class="job_st_details">Not Assign</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card_loc">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="tiles-title card-text-heading">Current Status</div>
                                                        <div class="job_st_details">{{ $employee->currentStatus }}</div>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <!-- <div class="card_loc">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="tiles-title card-text-heading">Current Job Location</div>
                                                        @if(isset($employee->job) && !empty($employee->job))
                                                                <div class="job_st_details">{{ substr($employee->job->address, 0, 30) . '...' }} </div>
                                                            @else
                                                                <div class="job_st_details">Not Assign </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>     -->

                                            <div class="newActBtn_ng">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="{{ url('admin/employees/orderList/'.$employee->id) }}" class="btn btn-block">Order History</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- <div class="widget_user_list">
                                        <div class="widget_img_box">
                                        @if(isset($employee->emp_profile) && !empty($employee->emp_profile))
                                            <img src="{{ fileurlemp().$employee->emp_profile }}" class="">
                                        @else
                                            <img src="{{ asset('public/img/defaultIcon.png') }}" class="">
                                        @endif
                                        </div>

                                        <div class="widget-title">
                                            <h4>{{ $employee->employee_name }}</h4>
                                            <h5><span>Primary Service</span>
                                            <?php $serv = explode(',',$employee->service_name);?>
                                                <span class="pri_service_main"><span class="pri_service_name"> {{ $employee->emp_role }}</span></span>
                                            </h5>
                                        </div>

                                        <div class="widget-user-details view_us">
                                            <div class="tiles-body">
                                                <div class="card_box_opt">
                                                    <div class="tiles-title text-uppercase card-text-heading">Secondary Skill</div>
                                                    <div class="skills_list">
                                                        <span>{{ $employee->service_name }}</span>
                                                    </div>
                                                </div>

                                                <div class="card_loc">
                                                    <div class="tiles-title text-uppercase card-text-heading">Job Details</div>
                                                    <div class="job_st_details">
                                                        <div class="left_opt">
                                                            <div class="widget-stats">
                                                                <div class="wrapper transparent">
                                                                    <a href="">
                                                                        <span class="item-title">Total</span> <span class="item-count animate-number semi-bold" data-value="{{ $employee->total_jobs->total_jobs }}" data-animation-duration="700">{{ $employee->total_jobs->total_jobs }}</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="widget-stats ">
                                                                <div class="wrapper last">
                                                                    <a href="">
                                                                        <span class="item-title">Current Month Job</span> <span class="item-count animate-number semi-bold" data-value="{{ $employee->currentmonth_jobs->currentmonth_jobs }}" data-animation-duration="700">{{ $employee->currentmonth_jobs->currentmonth_jobs }}</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="right_opt">
                                                            <div class="title">Current Status</div>
                                                            <div class="st_opt"><a href="#">{{ $employee->currentStatus }} </a></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if(isset($employee->job) && !empty($employee->job))
                                                <div class="card_loc">
                                                    <div class="tiles-title text-uppercase card-text-heading">Current Job</div>
                                                        <div class="job_st_details">
                                                            <div class="left_opt">
                                                                <div class="title">Location</div>
                                                                <div class="st_opt">{{ substr($employee->job->address, 0, 10) . '...' }} </div>
                                                            </div>
                                                            <div class="right_opt">
                                                                <div class="title">Vehicle No.</div>
                                                                @if(isset($employee->job->vehicle_no) && !empty($employee->job->vehicle_no))
                                                                <div class="st_opt">{{ $employee->job->vehicle_no }} </div>
                                                                @else
                                                                <div class="st_opt">Not Assign </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                <div class="card_loc">
                                                    <div class="tiles-title text-uppercase card-text-heading">Current Job</div>
                                                        <div class="job_st_details">
                                                            <div class="left_opt">
                                                                <div class="title">Location</div>
                                                                <div class="st_opt">Not Assign </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="widget-action-block">
                                                <a href="{{ url('admin/employees/orderList/'.$employee->id) }}" class="hashtags transparent">Order History</a>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>

                                <div class="col-xl-9 col-md-9">
                                    <div class="box-body boxDetailsHeadings">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="headSec">
                                                    <h3 class="profile-username text-capitalize pull-left">Personal Information</h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">   
                                            <div class="col-md-4">
                                                <h5>Email</h5>
                                                <p>{{ $employee->email_id }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <h5>Mobile</h5>
                                                <p>{{ $employee->emp_mobile }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <h5>Date Of Birth</h5>
                                                <p>{{ date("d-M-Y", strtotime($employee->date_of_birth)) }}</p>
                                            </div>
                                        </div> 
                                        
                                        <div class="row">  
                                            

                                            <div class="col-md-4">
                                                <h5>Nationality</h5>
                                                <p>{{ $employee->nationality }}</p>
                                            </div>

                                            <div class="col-md-4">
                                                <h5>Country</h5>
                                                <p>{{ $employee->country }}</p>
                                            </div>

                                            <div class="col-md-4">
                                                <h5>City</h5>
                                                <p>{{ $employee->city }}</p>
                                            </div>
                                        </div> 

                                        <div class="row">
                                            <div class="col-md-4">
                                                <h5>Local Address </h5>
                                                <p>{{ $employee->local_address }}</p>
                                            </div>

                                            <div class="col-md-4">
                                                <h5>Permanent Address </h5>
                                                <p>{{ $employee->permanent_address }}</p>
                                            </div>
                                        </div> 

                                        <div class="row">   
                                        
                                        </div> 

                                        <div class="clearfix"></div>
                                        
                                        <div class="row marginTop20">
                                            <div class="col-md-12">
                                                <div class="headSec">
                                                    <h3 class="profile-username text-capitalize pull-left">Document Information</h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">    
                                            <div class="col-md-4">
                                                <h5>Passport Number</h5>
                                                <p>{{ $employee->passport_number }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <h5>Passport expiration</h5>
                                                <p>{{ date("d-M-Y", strtotime($employee->passport_exp_date)) }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <h5>Visa expiry date</h5>
                                                <p>{{ date("d-M-Y", strtotime($employee->visa_expiration)) }}</p>
                                            </div>
                                        </div>

                                        <div class="row">    
                                            <div class="col-md-4">
                                                <h5>Emirates Id</h5>
                                                <p>{{ $employee->emirates_id }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <h5>Emirates expiration</h5>
                                                <p>{{ date("d-M-Y", strtotime($employee->emirates_exp_date)) }}</p>
                                            </div>
                                        </div>


                                        <!-- <div class="row marginTop20">
                                            <div class="col-md-12">
                                                <div class="headSec">
                                                    <h3 class="profile-username text-capitalize pull-left">Driver Information</h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">   
                                            <div class="col-md-4">
                                                <h5>Driving Licence Number</h5>
                                                <p>hk125152</p>
                                            </div>
                                            <div class="col-md-4">
                                                <h5>Driving Licence expiry</h5>
                                                <p>hk125152</p>
                                            </div>

                                            <div class="col-md-4">
                                                <h5>Vehicle Type</h5>
                                                <p>2 Wheeler</p>
                                            </div>
                                        </div> -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-box-main">
                        <div class="box">
                            <div class="row boxDetailsHeadings ">
                                <div class="col-md-12">
                                    <div class="headSec">
                                        <h3 class="profile-username text-capitalize pull-left">Documents Copy</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-md-3">
                                    <div class="docImg">
                                        <h4>Pancard</h4>  
                                        <div class="img_box"> 
                                        @if(isset($employee->visa_doc) && !empty($employee->visa_doc))
                                            <img src="{{ fileurlempdoc().$employee->visa_doc }}" class="img-responsive">
                                        @else
                                            <img src="{{ asset('public/img/pan-card.jpg') }}" class="img-responsive">   
                                        @endif 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="docImg">
                                        <h4>Passport</h4>  
                                        <div class="img_box">  
                                        @if(isset($employee->passport_doc) && !empty($employee->passport_doc))
                                            <img src="{{ fileurlempdoc().$employee->passport_doc }}" class="img-responsive">
                                        @else
                                            <img src="{{ asset('public/img/passport.png') }}" class="img-responsive">   
                                        @endif 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="docImg">
                                        <h4>Emirates Id</h4>  
                                        <div class="img_box">  
                                        @if(isset($employee->emirates_id_copy) && !empty($employee->emirates_id_copy))
                                            <img src="{{ fileurlempdoc().$employee->emirates_id_copy }}" class="img-responsive">
                                        @else
                                            <img src="{{ asset('public/img/emirates.jpg') }}" class="img-responsive">   
                                        @endif 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="docImg">
                                        <h4>Driving Licence</h4> 
                                        <div class="img_box">   
                                        @if(isset($employee->driving_licence_copy) && !empty($employee->driving_licence_copy))
                                            <img src="{{ fileurlempdoc().$employee->driving_licence_copy }}" class="img-responsive">
                                        @else
                                            <img src="{{ asset('public/img/licence.jpg') }}" class="img-responsive">   
                                        @endif 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>    
            </div>   
        @endif 
    </div>
@endsection