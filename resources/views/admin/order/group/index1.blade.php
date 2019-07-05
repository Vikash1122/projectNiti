@extends('admin.layouts.slot_layout')

@section('content')
<div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">Group List</a> </li>
                </ul>

                <div class="page-title"> <i class="icon-custom-left"></i>
                    <h3>Group List  <span class="semi-bold">&nbsp;</span></h3>
                </div>
                @if(Session::has('message')) 
                    <div class="alert alert-info">
                        {{Session::get('message')}} 
                    </div> 
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <div class="content-box-main">
                            <div id='calendar1'></div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="content-box-main">
                            <div class="header_main_div_sec">
                                <div class="title">
                                    <h5>Date : <span>15/9/2018</span> 
                                    <span class="pull-right">Total Group : {{ count($groups) }}</span>
                                    </h5>
                                </div>       
                            </div>

                            <div class="row">
                            @if(isset($groups) && !empty($groups))
                            @foreach($groups as $grp)
                            <?php if(isset($grp->group_emp) && !empty($grp->group_emp)){
                                $emp = explode(',',$grp->group_emp);
                                $totalEmp = count($emp);

                                $groupser = explode(',',$grp->group_service);
                                $ser = App\Service::select('service_name')->whereIn('id',$groupser)->get();

                                $teamleader = App\Employee::getTeamLeader($grp->team_leader);
                                $driver = App\Employee::getDriver($grp->driver);
                                //print_r( $driver);
                               // print_r($grp->group_service);
                                ?>
                                <div class="col-md-6">
                                    <div class="order_history_box">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-sm-8 col-xs-8">
                                                        <div class="groupListDiv">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <h5 class="fontWeight600">{{ $grp->group_name }}</h5>
                                                                    <p class="tm_role"> {{ $teamleader->employee_name }} <span> (Team Leader)</span></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-4 col-xs-4">
                                                        <div class="jd_list_cust_img_box">
                                                            <div class="widget_img_box">
                                                            @if(isset($teamleader->emp_profile) && !empty($teamleader->emp_profile))
                                                                <img src="{{ fileurlemp().$teamleader->emp_profile }}" class="img-responsive">
                                                            @else
                                                             <img src="{{ asset('public/img/defaultIcon.png') }}" class="img-responsive">
                                                            @endif 
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="groupListCardDiv">
                                                            <h5>Start Time</h5>
                                                            <p class="tm_role">Morning 9:30 AM</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="groupListCardDiv">
                                                            <h5>Services</h5>
                                                            <p class="tm_role">
                                                            @if(isset($ser[0]) && !empty($ser[0]))
                                                            @foreach($ser as $s)
                                                                {{ $s->service_name }},
                                                            @endforeach
                                                            @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <div class="groupListCardDiv">
                                                            <h5>Team Size</h5>
                                                            <div class="teamSize">{{ $totalEmp }}</div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                
                                                <hr />

                                                <div class="row">
                                                    <div class="col-sm-3 col-xs-3">
                                                        <div class="drv_outer_img_box">
                                                            <div class="widget_img_box">
                                                            @if(isset($driver->emp_profile) && !empty($driver->emp_profile))
                                                                <img src="{{ fileurlemp().$driver->emp_profile }}" class="img-responsive">
                                                            @else
                                                             <img src="{{ asset('public/img/defaultIcon.png') }}" class="img-responsive">
                                                            @endif
                                                                </div>
                                                        </div>    
                                                    </div>
                                                    <div class="col-sm-9 col-xs-9">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="groupListDivNew">
                                                                    <p class="tm_role">{{ $driver->employee_name }} <span> (Driver)</span></p>
                                                                    <p class="vhl_inf">Vehicle No :  {{ $grp->vehicle_no }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            @endforeach
                            <?php //die(); ?>
                            @endif
                               
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>  
@endsection