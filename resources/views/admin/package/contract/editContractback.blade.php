@extends('admin.layouts.package_layout')
    @section('content')
        <div class="content">
            <div class="page-title"> 
                <a href="{{ url()->previous() }}" class="previousBtn">
                    <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
                </a>

                <h3>Add Package</h3>
                <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Edit Package</h3></div>
            </div>

            <div class="row">
                <div class="col-md-4 ">
                    <div class="sub_service_form">
                        <form method="post" action="{{ url('admin/contracts/editContract/'.$id) }}" >
                            <div class="content-box-main-ng marginBottom0">
                                <h3>Edit Package</h3>
                                <div class="content-box-main marginBottom0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if(Session::has('message')) 
                                                <div class="alert alert-info">
                                                    {{Session::get('message')}} 
                                                </div> 
                                            @endif
                                            
                                            <div class="row srvLst">
                                                {{ csrf_field() }}
                                                <div class="col-md-12">
                                                    <div class="form_control_new">  
                                                        <div class="label_head">Package Title</div>
                                                        <div class="form-group"> 
                                                            <input class="form-control" name="package_type" value="{{ $package->package_type }}" id="package_type" placeholder="Package Title" required> 
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12"> 
                                                    <div class="form_control_new">  
                                                        <div class="label_head">Package Price</div>
                                                        <div class="form-group">  
                                                            <input class="form-control" name="package_price" value="{{ $package->package_price }}" id="package_price" placeholder="Package Price" required> 
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12"> 
                                                    <div class="form_control_new">  
                                                        <div class="label_head">No of Callouts</div>
                                                        <div class="form-group"> 
                                                            <input class="form-control" name="callouts" value="{{ $package->callouts }}" id="callouts" placeholder="No of Callouts " required> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div> 
                                </div>

                                <div class="new_add_srv_btn_block">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn new_add_srv_btn">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </form>     
                    </div>
                </div>
            </div>      
        </div> 
    @endsection   
            