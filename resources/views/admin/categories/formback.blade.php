@extends('admin.layouts.main-layout')

@section('content')
    <div class="content">
        <div class="page-title"> 
            <a href="{{ url()->previous() }}" class="previousBtn">
                <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
            </a>
            <h3>Categories </h3>
            <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Add Category</h3></div>
        </div>

        <div class="row">
            <div class="col-md-4 ">
                <div class="sub_service_form">
                    <form action="{{ route('categories.post') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="content-box-main-ng marginBottom0">
                            <h3>Add New Category</h3>
                            <div class="content-box-main marginBottom0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Service Type</div>
                                            <div class="form-group">
                                                <select class="form-control" name="service_id" id="serviceIid1" required> 
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

                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Sub Service Type</div>
                                            <div class="form-group"> 
                                                <select class="form-control" name="sub_service_id" id="sub_serviceIid1" required> 
                                                    <option value="">Select Sub Service Type</option>
                                                    @if(isset($subservices) && !empty($subservices))
                                                        @foreach($subservices as $sub)
                                                        <option value="{{ $sub->id }}">{{ $sub->sub_service_name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Category Name</div>
                                            <div class="form-group"> 
                                                <input class="form-control" name="name" id="name" placeholder="Category Name" required> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Category Code</div>
                                            <div class="form-group"> 
                                                <input class="form-control" name="code" id="code" placeholder="Category Code" required> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form_control_new srv_add_new">
                                            <div class="label_head">Upload Service Icon</div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="docMainBox">
                                                        <img alt="" id="brand_icon" src="http://3.16.87.53/public/img/Icons_upload.png" class="center-block userImg img-responsive">
                                                        <div class="uploadProfile">
                                                            <div class="btn default btn-file btn-uploadnew">
                                                                <input type="file" name="brand_icon" onchange="getpic('brand_icon_copy','brand_icon','dl_text',event),OpenFile('brand_icon_copy')" class="form-control imgPrv" id="brand_icon_copy">
                                                            </div>
                                                        </div>
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
                                        <button type="submit" class="btn new_add_srv_btn">Add</button>
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