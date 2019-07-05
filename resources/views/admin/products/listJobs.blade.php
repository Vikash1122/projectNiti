@extends('admin.layouts.product_layout')
    @section('css')
    <style>
        @font-face {
        font-family: 'Nexa Bold';
        src: url('../../public/fonts/Nexa Bold.otf');
        }
        body{
            font-family: 'Nexa Bold';
        }
        h1,h2,h3,h4,h5,h6{
            font-family: 'Nexa Bold';
        }
        input, button, select, textarea{
            font-family: 'Nexa Bold';
        }  
        .page-content .breadcrumb{
            font-family: 'Nexa Bold';
        }
        .page-sidebar{
            font-family: 'Nexa Bold';
        }
        .btn{
            font-family: 'Nexa Bold';
        }

        .req_sr_card_dt_panel .jd_desc_blk {
            min-height: 120px;
        }
        .listSubSr{
            padding-left:10px;
            padding-right:10px;
        }
        .amc_inf{
            line-height:1.5 !important;
        }
    </style>
    @endsection

    @section('content')
        <div class="content">
            <div class="page-title"> 
                <a href="{{ url()->previous() }}" class="previousBtn">
                    <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
                </a>
                <h3>Issue Products <span class="semi-bold">&nbsp;</span></h3>                
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="content-box-main">
                        <div class="row">
                            <div class="col-md-offset-4 col-md-4">
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="content-box-main">
                        <div class="header_main_div_sec">
                            <div class="title">
                                <h5>Date : <span id="notASSIGNdate">{{ date('d-m-Y') }}</span> 
                                    <span class="pull-right" id="notAssignOrder">Total Orders : {{ count($alljobs) }}</span>
                                </h5>
                            </div>       
                        </div>
                        <div class="row" id="notAssigndata1">
                        @if(isset($alljobs[0]) && !empty($alljobs[0]))
                            @foreach($alljobs as $jobs)
                            <div class="col-md-12">
                                <div class="orderBox_ng">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h4>Job No. {{ $jobs['id'] }}</h4>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="odrInner">
                                                    <div class="labelText">Job Date</div>
                                                    <div class="labelValue">{{ $jobs['job_date'] }}</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="odrInner">
                                                        <div class="labelText">Customer Name</div>
                                                        <div class="labelValue"> {{ $jobs['firstname'] }} {{ $jobs['lastname'] }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="odrInner">
                                                        <div class="labelText">AMC Holder</div>
                                                        <div class="labelValue">AMC No. {{ $jobs['amc_id'] }}</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="odrInner">
                                                        <div class="labelText">Location</div>
                                                        <div class="labelValue">{{ $jobs['address'] }}</div>
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
                                                        <div class="labelValue">{{ $jobs['slotstart_time'] }}</div>
                                                    </div>

                                                    <div class="odrInner">
                                                        <div class="labelText">Job Status</div>
                                                        @if($jobs['status'] == 3)
                                                            <div class="text-orange">Requested</div>
                                                        @elseif($jobs['status'] == 4)
                                                            <div class="text-green">Service Team Alloted</div>
                                                        @elseif($jobs['status'] == 5)
                                                            <div class="text-light-blue">In Process</div>
                                                        @elseif($jobs['status'] == 6)
                                                            <div class="text-green-light">Proposed</div>
                                                        @elseif($jobs['status'] == 7)
                                                            <div class="text-megenta">Payment Done</div>
                                                        @elseif($jobs['status'] == 8)
                                                            <div class="">Completed</div>
                                                        @elseif($jobs['status'] == 9)
                                                            <div class="text-brown">Rejected</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                @if($jobs['status'] == 4 || $jobs['status'] == 5 || $jobs['status'] == 6 || $jobs['status'] == 7 || $jobs['status'] == 8 || $jobs['status'] == 9 )
                                                <div class="col-sm-6">
                                                    <div class="odrInner">
                                                        <div class="imgIconOdr">
                                                        @if(isset($jobs['group']->teamleader_image) && !empty($jobs['group']->teamleader_image))
                                                            <img src="{{ fileurlemp().$jobs['group']->teamleader_image }}" class="img-responsive">
                                                        @else
                                                            <img src="{{ asset('public/img/defaultIcon.png')}}" class="img-responsive" />
                                                        @endif
                                                        </div>
                                                    </div>
                                                    <div class="odrInner">
                                                        <div class="labelText">Team Leader</div>
                                                        <div class="labelValue">{{ $jobs['group']->teamleader }}</div>
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
                                                        @if($jobs['status'] == 4 || $jobs['status'] == 5 || $jobs['status'] == 6 || $jobs['status'] == 7 || $jobs['status'] == 8 || $jobs['status'] == 9 )
                                                        <div class="labelValue">{{ $jobs['group']->total_emp }}</div>
                                                        @else
                                                        <div class="labelValue">Not Assign</div>
                                                        @endif
                                                    </div>

                                                    <div class="odrInner">
                                                        <div class="labelText">Number</div>
                                                        @if($jobs['status'] == 4 || $jobs['status'] == 5 || $jobs['status'] == 6 || $jobs['status'] == 7 || $jobs['status'] == 8 || $jobs['status'] == 9 )
                                                        <div class="labelValue">{{ $jobs['group']->teamleader_mob }}</div>
                                                        @else
                                                        <div class="labelValue">Not Assign</div>
                                                        @endif
                                                    </div>

                                                    <div class="odrInner">
                                                        <div class="labelText">Service Type</div>
                                                        <div class="labelValue">{{ ucwords($jobs['service_type']) }}</div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-5">
                                                    <div class="odrInner">
                                                        <div class="labelText">Job Service</div>
                                                        <div class="orderServiceIcon">
                                                        @if(isset($jobs['services'][0]) && !empty($jobs['services'][0]))
                                                
                                                            @foreach($jobs['services'] as $service)
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

                                    <hr>
                                    <?php 
                                        $issueProduct = '';
                                        $admin = \Auth::user()->hasRole('admin');
                                        $team = \Auth::user()->hasRole('Service Team');
                                        $jobid = $jobs['id'];
                                        
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                        @if($team)
                                            @if($jobs['issueProduct'] != '' && $jobs['issueProduct'][0]->status == 2)
                                                <a href="#"><button class="btn btn-success btn-cons pull-right">Issued</button></a>
                                    
                                            @elseif($jobs['issueProduct'] != '' && $jobs['issueProduct'][0]->status == 1)
                                                <a href="#"><button class="btn btn-success btn-cons pull-right">Already Requested</button></a>
                                    
                                            @else
                                                <a href="{{ url('admin/inventry/products/requestInventory'.$jobs['id']) }}" class="btn btn-success btn-cons pull-right">Request Inventory</a>
                                            
                                            @endif
                                        @elseif($admin)
                                            @if($jobs['issueProduct'] != '' && $jobs['issueProduct'][0]->status == 2)
                                                <a href="#"><button class="btn btn-success btn-cons pull-right">Already Issue</button></a>
                                            @elseif($jobs['issueProduct'] != '' && $jobs['issueProduct'][0]->status == 1)
                                                <a href="{{ url('admin/inventry/products/issueProducts'.$jobs['id']) }}"><button class="btn btn-success btn-cons pull-right">Issue Products</button></a>
                                    
                                            @else
                                                <a href="#" class="btn btn-success btn-cons pull-right">No Product Required</a>
                                            
                                            @endif
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
    @endsection

    @section('js')
    <script>

    </script>
    @endsection