@extends('admin.layouts.service_layout')
@section('css')
<style>
    .invHead .title{
        display: block;
        width: 100%;
        float: left;
        border-bottom: 1px solid #e1e1e1;
        margin-bottom: 15px;
    }
    .invHead .title h5{
        color: #000;
        font-weight: 600;
        margin-bottom: 5px;
        margin-top: 10px;
    }
    .invDtl .widget_img_box{
        margin-top: 5px;
        width: 50px;
        height: 50px;
        margin-left: 0;
    }
    .marginTop0{
        margin-top:0px;
    }
    .marginTop10{
        margin-top:10px;
    }
</style>
@endsection
@section('content')

    <div class="content">
        <div class="page-title">
            <a href="{{ url()->previous() }}" class="previousBtn"> 
                <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
            </a>
            <h3>Completed Jobs  <span class="semi-bold">&nbsp;</span></h3>
        </div>

        <div class="content-box-main">
            <div class="row">
                @if(isset($complete_jobs[0]) && !empty($complete_jobs[0]))
                @foreach($complete_jobs as $job)
                <div class="col-md-12">
                    <div class="orderBox_ng">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4>Job No. {{ $job['id'] }}</h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="odrInner">
                                            <div class="labelText">Customer Mobile</div>
                                            <div class="labelValue">{{ $job['mobile'] }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="odrInner">
                                            <div class="labelText">Customer Name</div>
                                            <div class="labelValue"> {{ $job['firstname'] }} {{ $job['lastname'] }}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="odrInner">
                                            <div class="labelText">AMC Holder </div>
                                            <div class="labelValue">AMC Id. {{ $job['amc_id']}}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="odrInner">
                                            <div class="labelText">Location</div>
                                            <div class="labelValue">{{ $job['address'] }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="odrInner">
                                            <div class="labelText">Start Time</div>
                                            <div class="labelValue">{{ $job['slot_name'] }} {{ $job['slotstart_time'] }}</div>
                                        </div>
                                        <div class="odrInner">
                                            <div class="labelText">Completed Job Date</div>
                                            <div class="labelValue">{{ date('d-m-Y', strtotime($job['updated_at'])) }}</div>
                                        </div>
                                        <div class="odrInner">
                                            <div class="labelText">Payment Date</div>
                                            <div class="labelValue">{{ date('d-m-Y', strtotime($job['updated_at'])) }}</div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="odrInner">
                                            <div class="imgIconOdr">
                                                @if(isset($job['group']->teamleader_image) && !empty($job['group']->teamleader_image))
                                                    <img src="{{ fileurlemp().$job['group']->teamleader_image }}" class="img-responsive">
                                                @else
                                                    <img src="{{ asset('public/img/defaultIcon.png') }}" class="img-responsive">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="odrInner">
                                            <div class="labelText">Team Leader</div>
                                            <div class="labelValue">{{ $job['group']->teamleader }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="odrInner">
                                            <div class="labelText">Alloted Team</div>
                                            <div class="labelValue">{{ $job['group_name'] }}</div>
                                        </div>

                                        <div class="odrInner">
                                            <div class="labelText">Number</div>
                                            <div class="labelValue">{{ $job['group']->teamleader_mobile }}</div>
                                        </div>
                                        <div class="odrInner">
                                            <div class="labelText">Total Price</div>
                                            <div class="text-light-blue">3500</div>
                                        </div>
                                       
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="odrInner">
                                            <div class="labelText">Service Type</div>
                                            <div class="labelValue">{{ ucwords($job['service_type']) }}</div>
                                        </div>
                                        <div class="odrInner">
                                            <div class="labelText">Services</div>
                                            <div class="orderServiceIcon">
                                            @if(isset($job['servc'][0]) && !empty($job['servc'][0]))
                                                @foreach($job['servc'] as $service)
                                                    @if(isset($service->service_icon) && !empty($service->service_icon))
                                                        <img src="{{ fileurlservice().$service->service_icon}}" class="img-responsive" />
                                                    @else
                                                        
                                                    @endif
                                                @endforeach
                                            @endif

                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <a href="{{ url('admin/invoice/view/'.$job['id']) }}" class="orderMoreBtn">View Invoice <span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-md-12">
                    <div class="order_history_box">
                        </p>No Record Found!</p>
                    </div>
                </div>
                @endif
            </div>

           
        </div>
        
    </div>   

@endsection
@section('js')

@endsection