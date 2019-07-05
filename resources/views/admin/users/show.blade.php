@extends('admin.layouts.header_layout')

@section('content')
    <style>
        @font-face {
            font-family: 'Nexa Bold';
            src: url("{{ asset('public/fonts/Nexa Bold.otf') }}");
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
        .page-content .breadcrumb, .page-title, .btn, .page-sidebar{
            font-family: 'Nexa Bold';
        }

        .widget_user_content_main{
            border-bottom: 1px solid #ccc;
        }
    </style>
    <div class="content"> 
        <div class="page-title"> 
            <a href="{{ url()->previous() }}" class="previousBtn">
                <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
            </a>
            <h3>Customer</h3>
            <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Customer Details</h3></div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @if(isset($users) && !empty($users))
                        <div class="col-md-4">
                            <div class="">
                                <div class="new_srv_box userList_ng content-box-main">
                                    <div class="userInf_ng">
                                        <div class="userImg_ng">
                                            @if(isset($users->profile_pic) && !empty($users->profile_pic))
                                                <img src="{{ fileurlUser().$users->profile_pic }}" class="">
                                            @else
                                                <img src="{{ asset('public/img/defaultCustomer.png') }}" class="">
                                            @endif 
                                        </div>

                                        <h4 class="text-center">{{ $users->firstname }}  
                                        @if($users->lastname != '' && $users->lastname != 'NULL' && $users->lastname != 'N/A')
                                        <span>{{ $users->lastname }}</span>
                                        @endif
                                        </h4>
                                        <p class="text-center">&nbsp;</p>
                                    </div>

                                    <div class="userCaption_ng">
                                        <div class="caption_ng1">
                                            <div class="col-md-12">
                                                <div class="label_ng">Email</div>
                                                <div class="value_ng">{{ $users->email }}</div>
                                            </div>
                                        </div>

                                        <div class="caption_ng1">
                                            <div class="col-md-12">
                                                <div class="label_ng">Mobile Number</div>
                                                <div class="value_ng">{{ $users->mobile }}</div>
                                            </div>
                                        </div>

                                        @if(isset($users->contact_no) && !empty($users->contact_no) && $users->contact_no != 'NA')
                                        <div class="caption_ng1">
                                            <div class="col-md-12">
                                                <h5 class="label_ng">Contact No</h5>
                                                <p>{{ $users->contact_no }}</p>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="caption_ng1">
                                            <div class="col-md-12">
                                                <h5 class="label_ng">Total Amc's</h5>
                                                <p class="amcCountBox">{{ count($amcs) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-8">
                        @if(isset($amcs[0]) && !empty($amcs[0]))
                            @foreach($amcs as $amc)
                            <div class="content-box-main">
                                <div class="header_main_div_sec">
                                    <div class="title">
                                        <h5 class="pull-left">AMC : <span>{{ $amc->title }}</span> </h5>
                                        
                                    </div>       
                                </div>

                                <div class="job_desc_box_list">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="order_history_box">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h5 class="textHead">Package Name</h5>
                                                        <p>{{ $amc->package_type }}</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h5 class="textHead">Start Date</h5>
                                                        <p>{{ date("d-m-Y", strtotime($amc->start_date)) }}</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h5 class="textHead">End Date</h5>
                                                        <p>{{ date("d-m-Y", strtotime($amc->end_date)) }}</p>
                                                    </div>
                                                    
                                                </div> 

                                                <div class="row">
                                                    
                                                    <div class="col-md-4">
                                                        <h5 class="textHead">Call Outs</h5>
                                                        <p>{{ $amc->callouts }}</p>
                                                    </div>

                                                    <div class="col-md-4">
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
                                                    <div class="col-md-4">
                                                        <h5 class="textHead">Amc Status</h5>
                                                        
                                                        <p>{{ $amc->amc_button }}</p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5 class="textHead">Address</h5>
                                                        <p>{{ $amc->address }}</p>
                                                    </div>
                                                </div> 
                                                    
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="content-box-main">
                                <h4 class="text-center">No Amc Record Found!</h4>
                            </div>
                        @endif
                            
                        </div>
                    @else
                        
                    @endif
                    </div>                          
                
            </div>
        </div>    
    </div>  
@endsection