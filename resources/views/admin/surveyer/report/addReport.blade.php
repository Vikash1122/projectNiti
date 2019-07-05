@extends('admin.layouts.header_layout')

@section('content')

<link href="{{ asset('public/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.css') }}" rel="stylesheet" type="text/css" media="screen" />

<div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">Add Survey Report</a> </li>
                </ul>

                <div class="page-title"> 
                    <a href="{{ url()->previous() }}">
                        <i class="icon-custom-left"></i>
                    </a>
                    <h3>Add Survey Report  <span class="semi-bold">&nbsp;</span></h3>
                </div>

                <div class="row">
                    <div class="col-md-12 sub_service_form">
                        <form action="{{ route('comment.post') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="job_id" id="jobID" value="{{ $id }}">
                            <div class="content-box-main">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="headingH4">Add Survey Report : &nbsp;<span> PBT001</span></h4>
                                    </div>
                                </div>
                                @if(isset($myarray[0]) && !empty($myarray[0]))
                                @foreach($myarray as $arr)
                                <input type="hidden" name="service_id[]" id="serviceID" value="{{ $arr->id }}">
                                <div class="order_history_box " id="srvListBlock_<?php echo $arr->id;?>">
                                
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="ser_rpt_heading">
                                                <span class="pull-left">{{ $arr->service_name }}</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="appendeddiv">
                                    <div class="row ">
                                        <div class="col-md-3">
                                            <div class="form_control_new">  
                                                <div class="label_head">Sub Service Name</div>
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="sub_service_name"><i class="fa fa-cog"></i></span>  
                                                    <input class="form-control" name="sub_service_name_<?php echo $arr->id;?>[]" id="sub_service_name" placeholder="Sub Service Name" required> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form_control_new">  
                                                <div class="label_head">Estimate Time</div>
                                                <div class="input-group clockpicker">
                                                    <span class="input-group-addon" id="estimate_time">
                                                        <span class="glyphicon glyphicon-time"></span>
                                                    </span>
                                                    <input type="text" class="form-control" name="estimate_time_<?php echo $arr->id;?>[]" id="estimate_time" placeholder="Estimate Time" required>
                                                </div>
                                                
                                                <!-- <div class="input-group">
                                                    <span class="input-group-addon" id="estimate_time"><i class="fa fa-cog"></i></span>  
                                                    <input class="form-control" name="estimate_time_<?php //echo $arr->id;?>[]" id="estimate_time" placeholder="Estimate Time" required> 
                                                </div> -->
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form_control_new">  
                                                <div class="label_head">Estimate Price</div>
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="estimate_price"><i class="fa fa-cog"></i></span>  
                                                    <input class="form-control" name="estimate_price_<?php echo $arr->id;?>[]" id="estimate_price" placeholder="Estimate Price" required> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 text-right">
                                            <div class="form_control_new">  
                                                <div class="label_head">&nbsp;</div>
                                                <div class="input-group">
                                                
                                                    <a type="button" class="btn btn-primary" data-serv_id="{{ $arr->id }}" id="addReportData_<?php echo $arr->id;?>" onclick="addServ(this.getAttribute('data-serv_id'))">Add More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form_control_new">  
                                                <div class="label_head">Special Message</div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="message"><i class="fa fa-cog"></i></span>  
                                                        <textarea class="form-control" name="message[]" id="message" placeholder="Special Message" required=""> </textarea>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="service_icon_box">
                                                <div class="icon_div service_bg">
                                                    <img id="service_icon_<?php echo $arr->id;?>" src="{{ asset('public/img/upload_icon22.png') }}" class="img-responsive">
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-offset-3 col-sm-6">
                                                        <div class="srv_icon_upload">
                                                            <div class="text">Upload Image</div>
                                                            <div class="up_btn">
                                                                <div class="up_img_pro">
                                                                    <img alt="" id="service_icon_<?php echo $arr->id;?>" src="{{ asset('public/img/upload-icon.png') }}" class="center-block userImg img-responsive">
                                                                    <div class="uploadProfile">
                                                                        <div class="btn default btn-file btn-uploadnew">
                                                                        <input type="file" name="service_icon[]" onchange="getpic('service_icon_copy_<?php echo $arr->id;?>','service_icon_<?php echo $arr->id;?>','dl_text',event),OpenFile('service_icon_copy_<?php echo $arr->id;?>')" class="form-control imgPrv" id="service_icon_copy_<?php echo $arr->id;?>">
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
                                @endforeach
                                @endif
                                <hr />
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-danger">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                       
                        </form>
                    </div>
                    </div>
                </div>

            </div> 

    <script src="{{ asset('public/plugins/jquery/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $('.clockpicker').clockpicker({
        //     placement: 'top',
        //     align: 'left',
            donetext: 'Done'
        });
        
    </script>
@endsection