@extends('admin.layouts.emp_layout')

@section('content')
    <div class="content">
        <div class="page-title"> 
            <a href="{{ url()->previous() }}"  class="previousBtn">
                <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive" />
            </a>
            <h3>Vehicle</h3>
            <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Vehicle Information </h3></div>
        </div>
        @if(isset($vehicle) && !empty($vehicle))
            <div class="row">
                <div class="col-md-12">
                    <div class="content-box-main">
                        <div class="box">
                            <div class="row">
                                <div class="col-xl-3 col-md-3">
                                    <div class="mainWidget_ng listVehicle_ng">
                                        <div class="head_ng borderBottomNone">
                                            <div class="icon_div">
                                            @if(isset($vehicle->vehicle_pic) && !empty($vehicle->vehicle_pic))
                                                <img src="{{ fileurlvehicle().$vehicle->vehicle_pic }}" class="img-responsive">
                                            @else
                                                <img src="{{ asset('public/img/vehicleDefault.png') }}" class="img-responsive">
                                            @endif

                                                <!-- <img src="{{ asset('public/img/vehicleDefault1.png') }}" class="img-responsive padding0"> -->
                                            </div>
                                            <h4 class="text-center">{{ $vehicle->manufacturer }}</h4>
                                        </div>

                                        <div class="title history_order_ng_vnum">
                                            <h4>Vehicle No. <span>{{ $vehicle->vehicle_no }}</span></h4>
                                        </div>

                                        <div class="content_opt borderTop_none"> 
                                            <div class="card_loc">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="tiles-title card-text-heading">Registration Number</div>
                                                        <div class="job_st_details">{{ $vehicle->registration_number }}</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card_loc">
                                                <div class="row">
                                                    <div class="col-md-6 ">
                                                        <div class="tiles-title card-text-heading">Registration Expiration</div>
                                                        <div class="job_st_details">{{ date('d/m/y', strtotime($vehicle->registration_expiration)) }}</div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <div class="tiles-title card-text-heading">Current Status</div>
                                                        @if($vehicle->status == 1)
                                                        <div class="job_st_details">Available</div>
                                                        @elseif($vehicle->status == 2)
                                                        <div class="job_st_details">Ongoing</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card_loc">
                                                <div class="row">
                                                    <div class="col-md-6 ">
                                                        <div class="tiles-title card-text-heading">Vehicle Colour</div>
                                                        <div class="job_st_details">{{ $vehicle->vehilce_color }}</div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <div class="tiles-title card-text-heading">Vehicle Partner</div>
                                                        <div class="job_st_details">{{ $vehicle->vehicle_partner }}</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="newActBtn_ng">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        @if(hasPermissionThroughRole('view_order_history'))
                                                            <a href="{{ url('admin/vehicles/vehicleOrderList/'.$vehicle->id) }}" class="btn">Order History</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-9 col-md-9 order_history_box_main">
                                    <div class="box-body boxDetailsHeadings">
                                        <div class="order_history_box">
                                            <div class="row">   
                                                <div class="col-md-12">
                                                    <div class="headSec">
                                                        <h3 class="profile-username text-capitalize pull-left">Basic Information</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="docImg">
                                                        <p>Registration Card</p>  
                                                        <div class="img_box">  
                                                            @if(isset($vehicle->registration_card) && !empty($vehicle->registration_card))
                                                                <img src="{{ fileurlvehicle().$vehicle->registration_card }}" class="" />
                                                            @else
                                                                <img src="{{asset('public/img/defaultIcon.png') }}" class="" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="row">  
                                                        <div class="col-md-4">
                                                            <h5>Owner Name</h5>
                                                            <p>{{ $vehicle->owner_name }}</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h5>Manufacturing Year</h5>
                                                            <p>{{ date('Y', strtotime($vehicle->manufacturing_year)) }}</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h5>Partner</h5>
                                                            <p>{{ $vehicle->vehicle_partner }}</p>
                                                        </div>
                                                        
                                                    </div> 

                                                    <div class="row"> 
                                                        <div class="col-md-4">
                                                            <h5>Color</h5>
                                                            <p>{{ $vehicle->vehilce_color }}</p>
                                                        </div>   
                                                        <div class="col-md-4">
                                                            <h5>Registration Number</h5>
                                                            <p>{{ $vehicle->registration_number }}</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h5>Registration Expiration</h5>
                                                            <p>{{ date('d/m/y', strtotime($vehicle->registration_expiration)) }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row"> 
                                                        <div class="col-md-4">
                                                            <h5>Vehicle Type</h5>
                                                            <p>{{ $vehicle->vehicle_type }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                              
                                        </div>

                                        <div class="clearfix"></div>

                                        <div class="order_history_box">
                                            <div class="row">   
                                                <div class="col-md-12">
                                                    <div class="dtl_order-hd">
                                                        <h5 class="profile-username text-capitalize pull-left">Driver's</h5>
                                                    </div>
                                                </div>

                                                <div class="list_emp_dt">
                                                    <ul class="new_li_elements">
                                                    @if(isset($vehicle->drivers[0]) && !empty($vehicle->drivers[0]))
                                                    @foreach($vehicle->drivers as $driver)
                                                        <li>
                                                            <a href="view_emp_details.php">
                                                                <div class="list_emp_dt-ng">
                                                                    <div class="img-div-ng">
                                                                    @if(isset($driver->emp_profile) && !empty($driver->emp_profile))
                                                                        <img src="{{ fileurlvehicle().$driver->emp_profile }}" alt="" data-src="{{asset('public/img/profiles/avatar_small.jpg')}}" width="35" height="35">
                                                                    @else
                                                                        <img src="{{ asset('public/img/profiles/avatar_small.jpg') }}" alt="" data-src="{{asset('public/img/profiles/avatar_small.jpg')}}" width="35" height="35">
                                                                    @endif
                                                                    </div>
                                                                    <div class="list_emp-dtl-ng">
                                                                        <div class="lft">
                                                                            <div class="user-name"> {{ $driver->employee_name }} 
                                                                            <!-- <span class="semi-bold">Smith</span>  -->
                                                                            </div>
                                                                            <div class="preview-wrapper"><span class="bold">{{ $driver->emp_mobile }} </span></div>
                                                                        </div>

                                                                        <div class="rgt">
                                                                            <div class="user-name">Job Date </div>
                                                                            <div class="preview-wrapper"><span class="bold">{{ $driver->emp_mobile }}</span></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                    @else
                                                        <h4 class="text-center">No Driver Alloted!</h4>
                                                    @endif
                                                       
                                                    </ul>
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
        @endif 
    </div>
@endsection