@extends('admin.layouts.header_layout')
    @section('content')
        <div class="content">
            <div class="page-title"> 
                <a class="previousBtn" href="{{ url()->previous() }}">
                    <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
                </a>
                <h3>Add New Order</h3>
            </div>

            <div class="content-box-main-ng ctContainer">
                <h3 class="text-center">Add New Order</h3>

                <form action="" method>
                    <div class="content-box-main marginBottom0">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Select Customer</div>
                                            <select class="form-control">
                                                <option value="">Please Select Customer</option>
                                                <option value="Pritika">Pritika</option>
                                                <option value="Annu">Annu</option>
                                                <option value="Nishikant">Nishikant</option>
                                            </select>
                                            <div class="iconDiv">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Select AMC</div>
                                            <select class="form-control" id="amcName" onchange="getAmcName()">
                                                <option value="">Please Select AMC</option>
                                                <option value="House">House</option>
                                                <option value="Office">Office</option>
                                                <option value="Farm House">Farm House</option>
                                            </select>
                                            <div class="iconDiv">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                   
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new newOrder-ng">  
                                            <div class="label_head">Order Type</div>
                                            <div class="radio radio-primary">
                                                <input id="ppmp" type="radio" name="orderType" value="PPMP" checked="checked">
                                                <label for="ppmp">PPMP</label>
                                                <input id="job" type="radio" name="orderType" value="Job">
                                                <label for="job">Job</label>
                                                <input id="project" type="radio" name="orderType" value="Project">
                                                <label for="project">Project</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new newOrder-ng">  
                                            <div class="label_head">Payment Type</div>
                                            <div class="radio radio-primary">
                                                <input id="dd" type="radio" name="paymentType" value="DD" checked="checked">
                                                <label for="dd">DD</label>
                                                <input id="cash" type="radio" name="paymentType" value="Case">
                                                <label for="cash">Case</label>
                                                <input id="both" type="radio" name="paymentType" value="Both">
                                                <label for="both">Both</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="" id="newOrderAddress">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form_control_new">  
                                                <div class="label_head">Enter Villa/ Apartment no.</div>
                                                <input class="form-control" type="text" name="" placeholder="Enter Villa/ Apartment no.">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form_control_new">  
                                                <div class="label_head">Building Name/ Nickname</div>
                                                <input class="form-control" type="text" name="" placeholder="Building Name/ Nickname">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form_control_new">  
                                                <div class="label_head">Area</div>
                                                <input class="form-control" type="text" name="" placeholder="Enter Villa/ Apartment no.">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form_control_new">  
                                                <div class="label_head">Street No.</div>
                                                <input class="form-control" type="text" name="" placeholder="Street No.">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new newOrder-ng"> 
                                            <div class="label_head">Job Date</div>
                                            <input class="form-control" name="add_job_date" id="add_job_date" placeholder="Job Date">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new newOrder-ng">  
                                            <div class="label_head">Service Type</div>
                                            <div class="radio radio-primary">
                                                <input id="regular" type="radio" name="serviceType" value="Regular" checked="checked">
                                                <label for="regular">Regular</label>
                                                <input id="emergency" type="radio" name="serviceType" value="Emergency">
                                                <label for="emergency">Emergency</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new newOrder-ng">  
                                            <div class="label_head">Time Slot</div>
                                            <div class="radio radio-primary">
                                                <input id="morning" type="radio" name="jobTimeSlot" value="Morning" checked="checked">
                                                <label for="morning">Morning</label>
                                                <input id="afternoon" type="radio" name="jobTimeSlot" value="Afternoon">
                                                <label for="afternoon">Afternoon</label>
                                                <input id="evening" type="radio" name="jobTimeSlot" value="Evening">
                                                <label for="evening">Evening</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="serviceDetailsBox-ng">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form_control_new">  
                                                        <div class="label_head">Select Service</div>
                                                        <select name="serviceName" id="serviceName" class="form-control" >
                                                            <option value="">Please Select Service</option>
                                                            <option value="Plumbing">Plumbing</option>
                                                            <option value="Painting">Painting</option>
                                                            <option value="Electrical">Electrical</option>
                                                        </select>
                                                        <div class="iconDiv">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form_control_new">  
                                                        <div class="label_head">Select Service</div>
                                                        <textarea class="form-control" row="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 form_control_new marginBottom0">
                                                    <div class="label_head">Upload Images</div>
                                                </div>
                                                
                                                <div class="col-md-3 form-group">
                                                    <div class="form-group form-md-line-input ">
                                                        <div class="docMainBox servicePicMain_ng">
                                                            <img alt="" id="orderJobPic1_copy" src="{{ asset('public/img/upload_image.png') }}" class="center-block userImg img-responsive">
                                                            <div class="uploadProfile">
                                                                <div class="btn default btn-file btn-uploadnew">
                                                                    <input type="file" name="jobPic1" onChange="getpic('jobPic1','orderJobPic1_copy','dl_text',event),OpenFile('jobPic1')" class="form-control imgPrv" id="jobPic1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="messages text-center"></div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3 form-group">
                                                    <div class="form-group form-md-line-input ">
                                                        <div class="docMainBox servicePicMain_ng">
                                                            <img alt="" id="orderJobPic11_copy" src="{{ asset('public/img/upload_image.png') }}" class="center-block userImg img-responsive">
                                                            <div class="uploadProfile">
                                                                <div class="btn default btn-file btn-uploadnew">
                                                                    <input type="file" name="jobPic11" onChange="getpic('jobPic11','orderJobPic11_copy','dl_text',event),OpenFile('jobPic11')" class="form-control imgPrv" id="jobPic11">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="messages text-center"></div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3 form-group">
                                                    <div class="form-group form-md-line-input ">
                                                        <div class="docMainBox servicePicMain_ng">
                                                            <img alt="" id="orderJobPic12_copy" src="{{ asset('public/img/upload_image.png') }}" class="center-block userImg img-responsive">
                                                            <div class="uploadProfile">
                                                                <div class="btn default btn-file btn-uploadnew">
                                                                    <input type="file" name="jobPic12" onChange="getpic('jobPic12','orderJobPic12_copy','dl_text',event),OpenFile('jobPic12')" class="form-control imgPrv" id="jobPic12">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="messages text-center"></div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3 form-group">
                                                    <div class="form-group form-md-line-input ">
                                                        <div class="docMainBox servicePicMain_ng">
                                                            <img alt="" id="orderJobPic13_copy" src="{{ asset('public/img/upload_image.png') }}" class="center-block userImg img-responsive">
                                                            <div class="uploadProfile">
                                                                <div class="btn default btn-file btn-uploadnew">
                                                                    <input type="file" name="jobPic13" onChange="getpic('jobPic13','orderJobPic13_copy','dl_text',event),OpenFile('jobPic13')" class="form-control imgPrv" id="jobPic13">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="messages text-center"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form_control_new">  
                                                <div class="label_head">&nbsp;</div>
                                                <button type="button" class="btn actionBtn greenBg" style="color:#fff;" name="" onclick="addMoreService()">Add More</button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div> 
                        </div>
                    </div>

                    <div class="content-box-main-footer-ng">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <button type="button" class="btn-large actionBtn redBg">Cancel</button>
                                <button type="submit" class="btn-large actionBtn greenBg">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>    

    @endsection