@extends('admin.layouts.test_layout')

@section('content')
       
    <div class="content">
        <div class="page-title"> 
            <a href="{{ url()->previous() }}" class="previousBtn">
                <img src="{{asset ('public/img/go_back.png') }}" class="img-responsive">
            </a>
            <h3>Alloted Orders  <span class="semi-bold">&nbsp;</span></h3>
            <div class="form-filter">
                <div class="flt">
                    <select class="" onchange="jsFunctionservice(this.value);" name="service_type" id="serviceType1">
                        <option value="">Select : Service Type</option>
                        <option value="All">All</option>
                        <option value="Regular">Regular</option>
                        <option value="Emergency">Emergency</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="content-box-main">
                    <div class="row">
                        <div class="col-md-offset-4 col-md-4">
                            <div class="form_control_new">
                                <div id='calendarallot'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="content-box-main">
                    <div class="header_main_div_sec">
                        <div class="title">
                            <h5>Date : <span id="allotedDate6">{{ date('d-m-Y') }}</span> 
                            <span class="pull-right" id="totalalloted1">Total Orders : {{ count($orders) }}</span>
                            </h5>
                        </div>       
                    </div>

                    <!-- <div class="order_history_box">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form_control_new">
                                    <div class="label_head">Alloted Type</div>
                                    <select class="" name="group_type" onchange="jsFunction(this.value);" id="groupType14my">
                                        <option value="">Select</option>
                                        <option value="All">All</option>
                                        <option value="1">By Group</option>
                                        <option value="0">By Indivisual</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form_control_new">
                                    <div class="label_head">Service Type</div>
                                    <select class="" onchange="jsFunctionservice(this.value);" name="service_type" id="serviceType1">
                                    <option value="">Select</option>
                                        <option value="All">All</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Emergency">Emergency</option>
                                    </select>
                                </div>
                            </div>
                        </div>    
                    </div>     -->

                    <div id="groupbydatafilter">                      
                        @if(isset($orders) && !empty($orders))
                            @foreach($orders as $ordr)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="orderBox_ng">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h4>Job No. {{ $ordr->id }}</h4>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="odrInner">
                                                                <div class="labelText">Job Date</div>
                                                                <div class="labelValue">{{ date("d-m-Y", strtotime($ordr->job_date)) }}</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="odrInner">
                                                                <div class="labelText">Customer Name</div>
                                                                <div class="labelValue">{{ $ordr->firstname }} {{ $ordr->lastname }}</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="odrInner">
                                                                <div class="labelText">AMC Holder</div>
                                                                <div class="labelValue">AMC No.{{$ordr->amc_id}}</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="odrInner">
                                                                <div class="labelText">Location</div>
                                                                <div class="labelValue">{{ $ordr->address }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="odrInner">
                                                                <div class="labelText">Job Duration</div>
                                                                <div class="labelValue">45 minutes</div>
                                                            </div>
                                                            <div class="odrInner">
                                                                <div class="labelText">Estimated Start Time</div>
                                                                <div class="labelValue">{{ $ordr->slotstart_time }}</div>
                                                            </div>
                                                            <div class="odrInner">
                                                                <div class="labelText">Job Status</div>
                                                                @if($ordr->status == 3)
                                                                    <div class="text-orange">Requested</div>
                                                                @elseif($ordr->status == 4)
                                                                    <div class="text-green">Service Team Alloted</div>
                                                                @elseif($ordr->status == 5)
                                                                    <div class="text-light-blue">In Process</div>
                                                                @elseif($ordr->status == 6)
                                                                    <div class="text-green-light">Proposed</div>
                                                                @elseif($ordr->status == 7)
                                                                    <div class="text-megenta">Payment Done</div>
                                                                @elseif($ordr->status == 8)
                                                                    <div class="">Completed</div>
                                                                @elseif($ordr->status == 9)
                                                                    <div class="text-brown">Rejected</div>
                                                                @endif
                                                                
                                                            </div>
                                                        </div>

                                                        @if($ordr->status == 4 || $ordr->status == 5 || $ordr->status == 6 || $ordr->status == 7 || $ordr->status == 8 || $ordr->status == 9 )
                                                        <div class="col-sm-6">
                                                            <div class="odrInner">
                                                                <div class="imgIconOdr">
                                                                @if(isset($ordr->group->teamleader_image) && !empty($ordr->group->teamleader_image))
                                                                    <img src="{{ fileurlemp().$ordr->group->teamleader_image }}" class="img-responsive">
                                                                @else
                                                                    <img src="{{ asset('public/img/defaultIcon.png')}}" class="img-responsive" />
                                                                @endif
                                                                </div>
                                                            </div>
                                                            <div class="odrInner">
                                                                <div class="labelText">Team Leader</div>
                                                                <div class="labelValue">{{ $ordr->group->teamleader }}</div>
                                                            </div>
                                                        </div>
                                                        @else
                                                        <div class="col-sm-6">
                                                            <div class="odrInner">
                                                                <div class="imgIconOdr">
                                                                <img src="{{ asset('public/img/defaultIcon.png')}}" class="img-responsive" />
                                                                </div>
                                                            </div>
                                                            <div class="odrInner">
                                                                <div class="labelText">Team Leader</div>
                                                                <div class="labelValue">Not Assign</div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="odrInner">
                                                                <div class="labelText">Team Members</div>
                                                                @if($ordr->status == 4 || $ordr->status == 5 || $ordr->status == 6 || $ordr->status == 7 || $ordr->status == 8 || $ordr->status == 9)
                                                                <div class="labelValue">{{ $ordr->group->total_emp }}</div>
                                                                @else
                                                                <div class="labelValue">Not Assign</div>
                                                                @endif
                                                            </div>
                                                            <div class="odrInner">
                                                                <div class="labelText">Number</div>
                                                                @if($ordr->status == 4 || $ordr->status == 5 || $ordr->status == 6 || $ordr->status == 7 || $ordr->status == 8 || $ordr->status == 9)
                                                                <div class="labelValue">{{ $ordr->group->teamleader_mobile }}</div>
                                                                @else
                                                                <div class="labelValue">Not Assign</div>
                                                                @endif  
                                                            </div>
                                                            <div class="odrInner">
                                                                <div class="labelText">Service Type</div>
                                                                <div class="labelValue">{{ ucwords($ordr->service_type) }}</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-5">
                                                            <div class="odrInner">
                                                                <div class="labelText">Job Service</div>
                                                                <div class="orderServiceIcon">
                                                                @if(isset($ordr->services[0]) && !empty($ordr->services[0]))
                                                    
                                                                    @foreach($ordr->services as $service)
                                                                        @if(isset($service->service_icon) && !empty($service->service_icon))
                                                                            <img src="{{ fileurlservice().$service->service_icon }}" class="img-responsive" />
                                                                        @else
                                                                        <img src="{{ asset('public/img/defaultIcon.png')}}" class="img-responsive" />
                                                                        @endif  
                                                                    @endforeach
                                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <a href="" class="orderMoreBtn">more Details <span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="order_history_box req_sr_box_main">
                                        <p>No Record Found on Current Date!</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>    
            </div>
        </div>
    </div> 
            
    <div class="modal fade largeModal routePlan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Prem Maurya</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 sub_service_form">
                            <form action="" method="">
                                <div class="content-box-main">
                                    <div class="allotOrderScroller" id="style-1">
                                        <div class="force-overflow">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="content-box-main"> 
                                                        <div class="header_main_div_sec">
                                                            <div class="title">
                                                                <h5>Route Plan</h5>
                                                            </div>       
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="order_history_box">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form_control_new">
                                                                                <div class="sub_ser_box_header" style="background: #e2e5e7;color: #000;">
                                                                                    <div class="row">
                                                                                        <div class="col-md-2">Job No</div>
                                                                                        <div class="col-md-3">Arriving Time</div>
                                                                                        <div class="col-md-3">Location</div>
                                                                                        <div class="col-md-2">Distance</div>
                                                                                        <div class="col-md-2">Navigate</div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="srv_dt_slot">
                                                                                    <div class="sub_ser_box_list">
                                                                                        <div class="row">
                                                                                            <div class="col-md-2">PLB001</div>

                                                                                            <div class="col-md-3">
                                                                                                <div class="">Morning - 9:40 AM </div>
                                                                                            </div>

                                                                                            <div class="col-md-3">
                                                                                                <div class=""> A-25 DLF Phase-5 Gurugram</div>
                                                                                            </div>

                                                                                            <div class="col-md-2">
                                                                                                <div class="">10 KM</div>
                                                                                            </div>

                                                                                            <div class="col-md-2">
                                                                                                <button type="button" class="btn btn-primary btn-sm btn-small" >Navigate</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="sub_ser_box_list">
                                                                                        <div class="row">
                                                                                            <div class="col-md-2">NGB002</div>

                                                                                            <div class="col-md-3">
                                                                                                <div class="">Afternoon - 12:45 PM </div>
                                                                                            </div>

                                                                                            <div class="col-md-3">
                                                                                                <div class=""> Noida Sector 15</div>
                                                                                            </div>

                                                                                            <div class="col-md-2">
                                                                                                <div class="">20 KM</div>
                                                                                            </div>

                                                                                            <div class="col-md-2">
                                                                                                <button type="button" class="btn btn-primary btn-sm btn-small" >Navigate</button>
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

                                                       
                                                    </div>
                                                </div>
                                            </div>   
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
@endsection