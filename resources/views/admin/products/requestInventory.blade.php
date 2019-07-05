@extends('admin.layouts.product_layout')

    @section('content')
        <div class="content">
            <div class="page-title"> 
                <a href="{{ url()->previous() }}" class="previousBtn">
                    <img src="{{ asset('public/img/go_back.png')}}" class="img-responsive">
                </a>
                <h3>Request Inventory<span class="semi-bold">&nbsp;</span></h3>  
            </div>

            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="content-box-main">
                        <div class="header_main_div_sec">
                            <div class="title">
                                <h5>Customer Order Details </h5>
                            </div>       
                        </div>

                        <div class="job_desc_box_list">
                            <div class="row">
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h5 class="textHead">Job No</h5>
                                            <p>PBL001</p>
                                        </div>
                                        <div class="col-md-3">
                                            <h5 class="textHead">Alloted To</h5>
                                            <p>Group</p>
                                        </div>
                                        <div class="col-md-3">
                                            <h5 class="textHead">Order Date</h5>
                                            <p>14 Sep 2018</p>
                                        </div>
                                        <div class="col-md-3">
                                            <h5 class="textHead">Day Slot</h5>
                                            <p>Morning</p>
                                        </div>
                                        <div class="col-md-3">
                                            <h5 class="textHead">Start Time</h5>
                                            <p>9:00 AM</p>
                                        </div>
                                        <div class="col-md-3">
                                            <h5 class="textHead">Team Size</h5>
                                            <p>5</p>
                                        </div>
                                        <div class="col-md-3">
                                            <h5 class="textHead">Service Type</h5>
                                            <p>Regular</p>
                                        </div>
                                    </div>
                                </div>

                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <h5 class="textHead">Location</h5>
                                    <div style="padding: 10px;border: 5px solid #e1e1e1;">
                                        <div class="mapouter">
                                            <div class="gmap_canvas">
                                                <iframe width="100%" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=DLF%20Phase%201%20Gurugram&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                            </div>
                                            <style>.mapouter{text-align:right;height:300px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:300px;width:100%;}</style>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="row">
                <form method="post" action="{{ url('admin/inventry/products/requestInventory/'.$id) }}" >
                {{ csrf_field() }}
                    @if(isset($jobs) && !empty($jobs))
                    <div class="col-md-4">
                        <div class="content-box-main">
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
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="job_desc_box_list">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-xs-6">
                                                                <h5 class="textHead">Alloted To </h5>
                                                                <p class="inv_text" >Group</p>
                                                            </div>

                                                            <div class="col-sm-6 col-xs-6 text-right">
                                                                <h5 class="textHead">Team Size 
                                                                    <p class="inv_text">{{ $jobs->total_emp }}</p>
                                                                </h5>
                                                            </div>
                                                        </div>

                                                        <div class="row">    
                                                            <div class="col-sm-6 col-xs-6">
                                                                <h5 class="textHead">Order Date </h5>
                                                                <p class="inv_text">14 Sep 2018</p>
                                                            </div>
                                                            <div class="col-sm-6 col-xs-6 text-right">
                                                                <h5 class="textHead">Day Slot</h5>
                                                                <p class="inv_text">{{ $jobs->slot_name }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">  
                                                            <div class="col-sm-6 col-xs-6">
                                                                <h5 class="textHead">Start Time</h5>
                                                                <p class="inv_text">{{ $jobs->slotstart_time }}</p>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>
                                                    
                                               
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-9 col-xs-9">
                                                            <h5 class="textHead">Location</h5>
                                                            <p>{{ $jobs->address }}</p>
                                                        </div>

                                                        <div class="col-md-3 col-xs-3 text-right">
                                                            <h5 class="textHead">Distance</h5>
                                                            <p> <span class="req_sr_card_dis">25 KM</span> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                @if(isset($jobs->services[0]) && !empty($jobs->services[0]))
                                <div class="row">
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
                                </div>
                                @endif
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
                                            <h5>Required Products</h5>         
                                        </div>       
                                    </div>
                                    <input name="group_id" id="group_id" type="hidden" value="{{ Auth::user()->group_id }}"/>
                                    <div id="appendDtata123">
                                        <div class="order_history_box" >
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form_control_new">  
                                                        <div class="label_head">Service Type </div>
                                                        <div class="form-group"> 
                                                            <select name="service_id[]" id="service_Ids"  style="width:100%" required>
                                                                <option value="">Select Service Type</option>
                                                                @if(isset($services) && !empty($services))
                                                                @foreach($services as $ser)
                                                                    <option value="{{ $ser->id }}">{{ $ser->service_name }}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form_control_new">  
                                                        <div class="label_head">Product Name </div>
                                                        <div class="form-group"> 
                                                            <select name="product_id[]" id="product_Ids"  style="width:100%" required>
                                                                <option value="">Select Product</option>
                                                                @if(isset($products) && !empty($products))
                                                                @foreach($products as $bd)
                                                                    <option value="{{ $bd->id }}">{{ $bd->product_name }}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form_control_new">  
                                                        <div class="label_head">Brand Name </div>
                                                        <div class="form-group"> 
                                                            <select name="brand_id[]" id="brand_nameId"  style="width:100%" required>
                                                                <option value="">Select Brands</option>
                                                                @if(isset($brands) && !empty($brands))
                                                                @foreach($brands as $bd)
                                                                    <option value="{{ $bd->id }}">{{ $bd->brand_name }}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form_control_new">  
                                                        <div class="label_head">Quantity</div>
                                                        <input class="form-control" name="qty[]" id="qty" placeholder="Quantity" required> 
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form_control_new">  
                                                        <div class="label_head">Product Specification</div>
                                                        <textarea class="form-control" name="specification[]" id="specification" placeholder="Product Specification"></textarea>                                                        
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form_control_new">  
                                                        <div class="label_head">&nbsp;</div>
                                                        <div class="input-group"> 
                                                            <a type="button" class="btn btn-primary" onclick="addServ1()">Add More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-danger">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>

                                </div>
                            </div>   

                        </div>
                    </div> 
                </form>
            </div> 
        </div> 
    @endsection