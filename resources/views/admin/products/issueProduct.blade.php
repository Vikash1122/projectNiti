@extends('admin.layouts.product_layout')

@section('content')
<style>
    .content-box-main table thead{
        background: #e5e9ec;
    }
    .radio_button_box input[type=radio] + label>img{
        padding:0px;
    }
    .radio_button_box input[type=radio]:checked + label>img{
        transform: inherit;
    }
    /* address{
        width:80%;
        margin:auto;
        padding:15px;
        text-align:center;
    } */
</style>

<div class="content">
    <ul class="breadcrumb">
        <li>
            <p>YOU ARE HERE</p>
        </li>
        <li><a href="#" class="active">Issue Products</a> </li>
    </ul>

    <div class="page-title"> 
        <div class="row">
            <div class="col-md-6">
                <a href="{{ url()->previous() }}">
                    <i class="icon-custom-left"></i>
                </a>
                <h3>Issue Products<span class="semi-bold">&nbsp;</span></h3>
            </div>
            <!-- <div class="col-md-6">
                <div class="form_control_new">  
                    <div class="label_head">Search Order No.</div>   
                    <select class="multiselect" name="Order_type" id="Order_type"  style="width:100%">
                    <option value="">Select Order No.</option>
                        <option value="JB-001">JB-001</option>
                        <option value="JB-041">JB-041</option>
                        <option value="JB-011">JB-011</option>
                        <option value="JB-055">JB-055</option>
                    </select>
                </div>
            </div> -->
        </div>
    </div>

    <div class="row">
        <form method="post" action="{{ url('admin/inventry/products/issueProducts/'.$id) }}" >
        {{ csrf_field() }}
        @if(isset($jobs) && !empty($jobs))
            <div class="col-md-4">
                <div class="content-box-main">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="req_sr_box_main">
                                <div class="row">
                                    <div class="col-sm-12 jd_list_cust_img_box">
                                        <div class="job_desc_box_list">
                                            <div class="title">
                                                <h5>Customer Order Details <span class="pull-right srv_name" style="color:#000 !important">Job No. {{ $jobs->id }}</span></h5>
                                            </div>       
                                        </div>

                                        <div class="widget_user_list req_sr_card">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="widget_img_box">
                                                        <img src="{{ asset('public/img/defaultIcon.png') }}" class="">
                                                    </div>
                                                    <div class="bs_inf_jd">
                                                        <h5 class="text-center"> {{ $jobs->firstname }} {{ $jobs->lastname }}</h5>
                                                        <p><i class="fa fa-phone"> {{ $jobs->mobile }}</i></p>
                                                        <!-- <address>{{ $jobs->address }}</address> -->
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="job_desc_box_list">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-xs-6">
                                                                <h5 class="textHead">Alloted To 
                                                                    <!-- <span class="pull-right req_sr_card_dis" style="color:#039347 !important">Group</span>  -->
                                                                </h5>
                                                                <p class="inv_text pending" >Group</p>
                                                            </div>

                                                            <div class="col-sm-6 col-xs-6 text-right">
                                                                <h5 class="textHead">Team Size 
                                                                    <!-- <span class="pull-right req_sr_card_dis">{{ $jobs->total_emp }}</span>  -->
                                                                </h5>
                                                                <p class="inv_text pending" >{{ $jobs->total_emp }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="row">    
                                                            <div class="col-sm-6 col-xs-6">
                                                                <h5 class="textHead">Order Date 
                                                                <!-- <span class="pull-right req_sr_card_dis" style="color:#039347 !important">14 Sep 2018</span>  -->
                                                                </h5>
                                                                <p class="inv_text pending" >14 Sep 2018</p>
                                                            </div>
                                                            <div class="col-sm-6 col-xs-6 text-right">
                                                                <h5 class="textHead">Day Slot
                                                                    <!-- <span class="pull-right req_sr_card_dis">{{ $jobs->slot_name }}</span>  -->
                                                                </h5>
                                                                <p class="inv_text pending" >{{ $jobs->slot_name }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="row">    
                                                            <div class="col-sm-12 col-xs-12">
                                                                <h5 class="textHead">Start Time
                                                                <!-- <span class="pull-right req_sr_card_dis">{{ $jobs->slotstart_time }}</span>  -->
                                                                </h5>
                                                                <p class="inv_text pending" >{{ $jobs->slotstart_time }}</p>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-sm-9 col-xs-9">
                                                            <h5 class="textHead">Location</h5>
                                                            <p>{{ $jobs->address }}</p>
                                                        </div>

                                                        <div class="col-sm-3 col-xs-3 text-right">
                                                            <h5 class="textHead">Distance</h5>
                                                            <p> <span class="req_sr_card_dis">25 KM</span> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if(isset($jobs->services[0]) && !empty($jobs->services[0]))
                                    <div class="col-sm-12 req_sr_card_dt_panel">
                                        <div class="job_desc_box_list">
                                            <div class="sub_ser_box_list">
                                                <div class="title_new">
                                                    <h5>Services 
                                                        <span class="pending">{{ ucwords($jobs->service_type) }} Service</span>
                                                    </h5>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="jd_desc_blk" id="style-1">
                                                            <div class="force-overflow">
                                                            @foreach($jobs->services as $ser)
                                                                <div class="card_main_srv_lst">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <h5 class="textHead mar_bot nm_srv">Service Name : <span class="srv_name">{{ $ser->service_name}}</span></h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="lssMain">
                                                                                <h5 class="textHead theadBorder">Sub Services</h5>
                                                                                <div class="list_sub_srv">
                                                                                    <div class="problemText">
                                                                                        <div class="pblIcon"><i class="fa fa-question-circle"></i></div>
                                                                                        <div class="pblTxt">{{ $ser->jobServices->specify_problem }}</div>
                                                                                    </div>

                                                                                    <div class="additionalText">
                                                                                        <div class="adtIcon"><i class="fa fa-info-circle"></i></div>
                                                                                        <div class="adtTxt">{{ $ser->jobServices->additional_notes }}</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            @endif

                @if(isset($jobs->group) && !empty($jobs->group))
                <div class="content-box-main">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="req_sr_box_main">
                                <div class="row" style="padding-bottom: 120px !important;">
                                    <div class="col-sm-12 jd_list_cust_img_box">
                                        <div class="">
                                            <div class="job_desc_box_list">
                                                <div class="title">
                                                    <h5>Products Assigned To : Member
                                                        <span class="pull-right srv_name" style="color:#000 !important">Job No. {{ $jobs->id }}</span>
                                                    </h5>
                                                </div>       
                                            </div>
                                            
                                            <div class="radio_button_box">
                                                <div class="row">
                                                    @if(isset($jobs->group->teamleader) && !empty($jobs->group->teamleader))
                                                    <div class="col-sm-3 col-xs-3">
                                                        <input type="radio" name="employee_id" checked="checked" value="{{ $jobs->group->team_leader }}" id="{{ $jobs->group->team_leader }}" class="input-hidden" required>
                                                        <label for="{{ $jobs->group->team_leader }}">
                                                        @if(isset($jobs->group->teamleader_image) && !empty($jobs->group->teamleader_image))
                                                            <img src="{{ fileurlemp().$jobs->group->teamleader_image }}" alt="4 Wheeler" class="img-responsive">
                                                        @else
                                                            <img src="{{ asset('public/img/defaultIcon.png') }}" alt="Team Leader" class="img-responsive">
                                                        @endif
                                                            <div class="label_head text-center">{{ $jobs->group->teamleader }} <p>(Team Leader)</p> </div>
                                                        </label>
                                                    </div>
                                                    @endif
                                                    @if(isset($jobs->group->drivername) && !empty($jobs->group->drivername))
                                                    <div class="col-sm-3 col-xs-3">
                                                        <input type="radio" name="employee_id" value="{{ $jobs->group->driver }}" id="{{ $jobs->group->driver }}" class="input-hidden">
                                                        <label for="{{ $jobs->group->driver }}">
                                                        @if(isset($jobs->group->driver_image) && !empty($jobs->group->driver_image))
                                                            <img src="{{ fileurlemp().$jobs->group->driver_image }}" alt="Driver" class="img-responsive">
                                                        @else
                                                            <img src="{{ asset('public/img/defaultIcon.png') }}" alt="Driver" class="img-responsive">
                                                        @endif
                                                            <div class="label_head text-center"> {{ $jobs->group->drivername }} <p>(Driver)</p></div>
                                                        </label>
                                                    </div>
                                                    @endif
                                                    @if(isset($jobs->team_member[0]) && !empty($jobs->team_member[0]))
                                                    @foreach($jobs->team_member as $member)
                                                    <div class="col-sm-3 col-xs-3">
                                                        <input type="radio" name="employee_id" id="{{ $member->emp_id }}" value="{{ $member->emp_id }}" class="input-hidden">
                                                        <label for="{{ $member->emp_id }}">
                                                        @if(isset($member->emp_profile) && !empty($member->emp_profile))
                                                            <img src="{{ fileurlemp().$member->emp_profile }}" alt="{{ $member->emp_role }}" class="img-responsive">
                                                        @else
                                                            <img src="{{ asset('public/img/defaultIcon.png') }}" alt="{{ $member->emp_role }}" class="img-responsive">
                                                        @endif
                                                            <div class="label_head text-center"> {{ $member->employee_name }} <p>({{ $member->emp_role }})</p></div>
                                                        </label>
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
                        <div class="col-md-12 text-right">
                            <button type="button" class="btn btn-primary ">Issue</button>
                            <button type="button" class="btn btn-danger ">Already Issued</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            
            <div class="col-md-8">
                <div class="content-box-main">
                    <div class="header_main_div_sec">
                        <div class="title">
                            <h5>Job Date : <span>{{ date('d F Y', strtotime($jobs->job_date)) }}</span> 
                            </h5>
                        </div>       
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="job_desc_box_list">
                                <div class="title">
                                    <h5>Reqested Products</h5>         
                                </div>       
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="10">Product Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Brand</th>
                                    <th scope="col">Specifications</th>
                                    <th scope="col">Product Qty</th>
                                    
                                    </tr>
                                </thead>
                                <tbody id="slotbind">
                                
                                    @if(isset($jobs->requestedInventory[0]) && !empty($jobs->requestedInventory[0]))
                                    @foreach($jobs->requestedInventory as $inv)
                                    <tr>
                                    <th scope="row">
                                        <input id="morning" type="checkbox" value="1">
                                    </th>
                                    <td>
                                    @if(isset($inv->product_img) && !empty($inv->product_img))
                                        <img src="{{ fileurlProduct().$inv->product_img }}" class="img-responsive" style="width: 80px !important; height: 80px;">
                                    @else
                                        <img src="{{ asset('public/img/no-preview-item.jpg') }}" class="img-responsive" style="width: 80px !important; height: 80px;">
                                    @endif
                                    </td>
                                    <td>{{ $inv->product_name }}</td>
                                    <td>{{ $inv->brand_name }}</td>
                                    <td>{{ $inv->specification }} </td>
                                    <td>{{ $inv->qty }}</td>
                                                                        
                                    </tr>
                                    @endforeach
                                    @endif
                                                                       
                                </tbody>
                            </table>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-danger">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>  
                </div>
            </div> 
        </form>
    </div> 
</div> 
@endsection