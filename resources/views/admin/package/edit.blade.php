@extends('admin.layouts.package_layout')

    @section('content')
        <style>
            /* @font-face {
                font-family: 'Nexa Bold';
                src: url('../../../public/fonts/Nexa Bold.otf');
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
            } */
            .dltBtnImg{
                background: transparent;
                border: none;
                text-align: right;
            }
            .mar_bt_20{
                margin-bottom: 20px;
            }
        </style>

        <div class="content">
            <div class="page-title"> 
                <a href="{{ url()->previous() }}" class="previousBtn">
                    <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
                </a>

                <h3>Package  <span class="semi-bold">&nbsp;</span></h3>
                <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Edit Package</h3></div>
            </div>

            @if(Session::has('message')) 
                <div class="alert alert-info">
                    {{Session::get('message')}} 
                </div> 
            @endif

            <div class="row">
                <div class="col-md-12">
                    <div class="sub_service_form">
                        <form method="post" action="{{ url('admin/contracts/editContractServices/'.$id) }}">
                            {{ csrf_field() }}
                            <div class="content-box-main-ng marginBottom0">
                                <input type="hidden" name="package_id" value="{{ $package->id }}" >
                                <h3>{{ $package->package_type }}</h3>

                                <!-- <div class="header_main_div_sec">
                                    <div class="title">
                                        <input type="hidden" name="package_id" value="{{ $package->id }}" >
                                        <h5>{{ $package->package_type }}</h5>
                                    </div>       
                                </div> -->

                                <div class="content-box-main marginBottom0">
                                    @if(isset($package->packcat[0]) && !empty($package->packcat[0]))
                                        @foreach($package->packcat as $cate)
                                            <div class="order_history_box">
                                                <div class="row srvLst mar_bt_20">
                                                    <div class="col-md-6"> 
                                                        <div class="form_control_new">  
                                                            <div class="label_head">Package Category</div>
                                                            <select id="package_category" name="package_cat_id[]" style="width:100%">
                                                                <option value="" selected>Select Package Category</option>
                                                                @if(isset($category[0]) && !empty($category[0]))
                                                                    @foreach($category as $ct)
                                                                        <option <?php if(isset($cate->id) && !empty($cate->id) && $cate->id == $ct->id){ echo "selected";}else{ echo "";}?> value="{{ $ct->id }}">{{ $ct->title }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if(isset($cate->pc[0]) && !empty($cate->pc[0]))
                                                
                                                    <div class="row" id="serviceListPkg">
                                                        @foreach($cate->pc as $sub)
                                                            <div class="col-md-6">
                                                                <div class="order_history_box">
                                                                    <div class="form_control_new">  
                                                                        <div class="label_head">Service Name 
                                                                            <span class="pull-right">
                                                                            @if(hasPermissionThroughRole('delete_contract_service'))
                                                                                <a href="{{ url('admin/contracts/deleteContactServices/'.$sub->id) }}">
                                                                                    <button type="button" class="dltBtnImg">
                                                                                        <img src="/public/img/cancel.png" />
                                                                                    </button>
                                                                                </a>
                                                                            @endif
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group"> 
                                                                            <input class="form-control" name="pkg_service_name_{{ $cate->id }}[]" value="{{ $sub->pkg_service_name }}" id="pkg_service_name" placeholder="Enter Service Name" /> 
                                                                        </div>
                                                                    </div>

                                                                    <div class="form_control_new">  
                                                                        <div class="label_head">Service Description</div>
                                                                        <div class="form-group"> 
                                                                            <textarea class="form-control" id="pkg_service_desc" name="pkg_service_desc_{{ $cate->id }}[]" placeholder="Enter Service Description">{{ $sub->pkg_service_desc }}</textarea>
                                                                            <!-- <span class="input-group-addon" id="pkg_service_desc"><i class="fa fa-user"></i></span> 
                                                                            <input class="form-control" name="pkg_service_name" id="pkg_service_name" placeholder="Enter Service Name" />  -->
                                                                        </div>
                                                                    </div> 
                                                                </div>   
                                                            </div>

                                                            <!-- <div class="col-md-6">
                                                                <div class="form_control_new">  
                                                                    <div class="label_head">Service Description</div>
                                                                    <div class="form-group"> 
                                                                        <textarea class="form-control" id="pkg_service_desc" name="pkg_service_desc_{{ $cate->id }}[]" placeholder="Enter Service Description">{{ $sub->pkg_service_desc }}</textarea>
                                                                        <span class="input-group-addon" id="pkg_service_desc"><i class="fa fa-user"></i></span> 
                                                                        <input class="form-control" name="pkg_service_name" id="pkg_service_name" placeholder="Enter Service Name" />  --/>
                                                                    </div>
                                                                </div>    
                                                            </div> -->

                                                                <!-- <div class="col-md-2">
                                                                    <div class="form_control_new text-right">  
                                                                        <div class="label_head">&nbsp;</div>
                                                                        <button type="button" class="btn btn-primary btn-cons" onclick="addServicesPkg()">Add More Service</button>
                                                                    </div>
                                                                </div> -->
                                                            <!-- </div>  -->
                                                        @endforeach
                                                    </div>
                                                
                                                @endif
                                            </div>
                                        @endforeach
                                    @endif
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
        
        <script>
            function addServicesPkg(){
                $("#serviceListPkg").append(
                    '<div class="col-md-6">'+
                        '<div class="order_history_box">'+
                            '<div class="row" >'+
                                '<div class="col-md-10">'+
                                    '<div class="form_control_new">  '+
                                        '<div class="label_head">Service Name</div>'+
                                        '<div class="form-group"> '+
                                            '<input class="form-control" name="pkg_service_name[]" id="pkg_service_name" placeholder="Enter Service Name" /> '+
                                        '</div>'+
                                    '</div>   '+

                                    '<div class="form_control_new">  '+
                                        '<div class="label_head">Service Description</div>'+
                                        '<div class="form-group"> '+
                                            '<textarea class="form-control" name="pkg_service_desc[]" id="pkg_service_desc" placeholder="Enter Service Description"></textarea>'+
                                        '</div>'+
                                    '</div>'+ 

                                '</div>'+

                                // '<div class="col-md-5">'+
                                //     '<div class="form_control_new">  '+
                                //         '<div class="label_head">Service Description</div>'+
                                //         '<div class="form-group"> '+
                                //             '<textarea class="form-control" name="pkg_service_desc[]" id="pkg_service_desc" placeholder="Enter Service Description"></textarea>'+
                                //         '</div>'+
                                //     '</div>'+  
                                // '</div>'+

                                '<div class="col-md-2">'+
                                    '<div class="form_control_new text-right">'+  
                                        '<div class="label_head">&nbsp;</div>'+
                                        '<button type="button" class="btn btn-danger btn-cons" onclick="removeServicesPkg($(this))">Remove</button>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                        '</div>'+
                    '</div>'

                    // '<div class="row" >'+
                    //     '<div class="col-md-5">'+
                    //         '<div class="form_control_new">  '+
                    //             '<div class="label_head">Service Name</div>'+
                    //             '<div class="input-group"> '+
                    //                 '<span class="input-group-addon" id="pkg_service_name"><i class="fa fa-user"></i></span>'+ 
                    //                 '<input class="form-control" name="pkg_service_name[]" id="pkg_service_name" placeholder="Enter Service Name" /> '+
                    //             '</div>'+
                    //         '</div>   '+
                    //     '</div>'+

                    //     '<div class="col-md-5">'+
                    //         '<div class="form_control_new">  '+
                    //             '<div class="label_head">Service Description</div>'+
                    //             '<div class="form-group"> '+
                    //                 '<textarea class="form-control" name="pkg_service_desc[]" id="pkg_service_desc" placeholder="Enter Service Description"></textarea>'+
                    //             '</div>'+
                    //         '</div>'+  
                    //     '</div>'+

                    //     '<div class="col-md-2">'+
                    //         '<div class="form_control_new text-right">'+  
                    //             '<div class="label_head">&nbsp;</div>'+
                    //             '<button type="button" class="btn btn-danger btn-cons" onclick="removeServicesPkg($(this))">Remove</button>'+
                    //         '</div>'+
                    //     '</div>'+
                    // '</div>'
            )
            }

            function removeServicesPkg(caller){
            //console.log(caller);
            $(caller).closest('.row').remove();
            }
        </script>
    @endsection