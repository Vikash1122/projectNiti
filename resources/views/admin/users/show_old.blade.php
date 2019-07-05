@extends('admin.layouts.header_layout')

@section('content')
<div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <!-- <li><a href="#" class="active">Users</a> </li> -->
                    <li><a href="#" class="active">Customer Details</a> </li>
                </ul>

                <div class="page-title"> 
                <a href="{{ url()->previous() }}">
                    <i class="icon-custom-left">
                    
                    </i>
                </a>
                    <h3>Customer Details<span class="semi-bold">&nbsp;</span></h3>
                </div>

                <div class="row">
                    <div class="col-md-12">
                            <div class="row">
                            @if(isset($users) && !empty($users))
                                <div class="col-md-3">
                                    <div class="content-box-main">
                                        <div class="order_history_box userCard">
                                            <div class="widget_user_list">
                                                <div class="widget_usr_img_blk">
                                                    <div class="widget_img_box">
                                                    @if(isset($users->profile_pic) && !empty($users->profile_pic))
                                                    <img src="{{ fileurlUser().$users->profile_pic }}" class="">
                                                    @else
                                                        <img src="{{ asset('public/img/defaultIcon.png') }}" class="">
                                                    @endif 
                                                    </div>
                                                    <h4>{{ $users->firstname }} <span>{{ $users->lastname }}</span></h4>
                                                </div>
                                            </div>

                                            <div class="widget_user_content_main">
                                                <div class="widget_content">
                                                    <div class="inr_ct job_desc_box_list">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h5 class="textHead">Email</h5>
                                                                <p>{{ $users->email }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h5 class="textHead">Phone No</h5>
                                                                <p>{{ $users->mobile }}</p>
                                                            </div>
                                                        </div>
                                                    @if(isset($users->contact_no) && !empty($users->contact_no) && $users->contact_no != 'NA')
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h5 class="textHead">Contact No</h5>
                                                                <p>{{ $users->contact_no }}</p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h5 class="textHead">Total Amc's</h5>
                                                                <p class="amcCountBox">{{ count($amcs) }}</p>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-9">
                                @if(isset($amcs) && !empty($amcs))
                                    @foreach($amcs as $amc)
                                    <div class="content-box-main">
                                        <div class="header_main_div_sec">
                                            <div class="title">
                                                <h5 class="pull-left">AMC : <span>{{ $amc->title }}</span> </h5>
                                                
                                            </div>       
                                        </div>

                                        <div class="job_desc_box_list">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="order_history_box">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h5 class="textHead">Address</h5>
                                                                <p>{{ $amc->address }}</p>
                                                            </div>
                                                        </div> 

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h5 class="textHead">Start Date</h5>
                                                                <p>{{ date("d-m-Y", strtotime($amc->start_date)) }}</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h5 class="textHead">End Date</h5>
                                                                <p>{{ date("d-m-Y", strtotime($amc->end_date)) }}</p>
                                                            </div>
                                                        </div> 

                                                          
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="order_history_box">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h5 class="textHead">Package Name</h5>
                                                                <p>{{ $amc->package_type }}</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h5 class="textHead">Call Outs</h5>
                                                                <p>{{ $amc->callouts }}</p>
                                                            </div>
                                                        </div> 
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h5 class="textHead">Remaining Call Outs</h5>
                                                                <p>{{ $amc->remaining_callouts }}</p>
                                                            </div>
                                                            <?php 
                                                            // $daate = explode('-',$d->end_date);
                                                            // $year = $daate[0];
                                                            // $month = $date[1];
                                                            // $day = $date[2];

                                                            // $daate1 = explode('-',date('d-m-Y'));
                                                            // $year1 = $daate1[0];
                                                            // $month1 = $daate1[1];
                                                            // $day1 = $daate1[2];

                                                            // if(($year1 > $year) && ($month1 > $month) && ($day1 > $day))
                                                            // {
                                                            //     $d['reniew_button'] = 'Reniew';
                                                            // }else{
                                                            //     $d['reniew_button'] = '';
                                                            // }
                                                            ?>
                                                            <div class="col-md-6">
                                                                <h5 class="textHead">Amc Status</h5>
                                                                
                                                                <p>{{ $amc->amc_button }}</p>
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
                            @else

                            @endif
                            </div>                          
                        
                    </div>
                </div>    
            </div>  
@endsection