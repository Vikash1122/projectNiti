@extends('admin.layouts.package_layout')

@section('content')
    <div class="content">
        <div class="page-title"> 
            <div class="row">
                <div class="col-md-12">
                    <a class="previousBtn" href="{{ url()->previous() }}">
                        <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
                    </a>
                    <h3> Banners </h3>
                    <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Edit Banner</h3></div>
                </div>
            </div>
        </div>

        <div class="row">
            @if(Session::has('message')) 
                <div class="alert alert-info">
                    {{Session::get('message')}} 
                </div> 
            @endif
                
            <div class="col-md-5">
                <div class="content-box-main-ng">
                    <h3 class="text-center">Edit Banner</h3>
                    <form action="{{ url('admin/banners/editBanner/'.$id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row"> 
                            <div class="col-md-12 sub_service_form">
                                <div class="content-box-main">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="bnrImg profile_img_sec">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="upProfile_sec">
                                                                <a href="javascript:;" onclick="deleteBanner();" class=" pull-right dlt_btn" data-id="1" title="Delete Service"><i class="fa fa-times"></i></a>
                                                            
                                                                <div class="form-md-line-input">
                                                                    <div class="docMainBox bannerImgBox">
                                                                    @if(isset($banner->banner_img) && !empty($banner->banner_img))
                                                                        <img alt="" id="banner_img" src="{{ fileurlbanner().$banner->banner_img }}" class="center-block userImg img-responsive">
                                                                    @else
                                                                        <img alt="" id="banner_img" src="{{ asset('public/img/dubai_new.png') }}" class="center-block userImg img-responsive">
                                                                    @endif
                                                                    </div>
                                                                </div>    
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="uploaBtn_ng">
                                                                <div class="text_ng">
                                                                    <div class="form_control_new">  
                                                                        <div class="label_head">Upload Image</div>
                                                                    </div>
                                                                </div>
                                                                <div class="img_ng">
                                                                    <div class="up_img_pro">
                                                                        <img alt="" id="banner_img" src="{{ asset('public/img/Icons_upload_white.png') }}" class="center-block userImg img-responsive">
                                                                        <div class="uploadProfile">
                                                                            <div class="btn default btn-file btn-uploadnew">
                                                                            <input type="file" name="banner_img" onChange="getpic('banner_pic_copy','banner_img','dl_text',event),OpenFile('banner_pic_copy')" class="form-control imgPrv" id="banner_pic_copy" required>
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

                                        <div class="col-md-12">
                                            <div class="form_control_new">  
                                                <div class="label_head">Banner Title</div>
                                                <div class="form-group">
                                                    <input class="form-control" name="title" value="{{ $banner->title }}" id="title" placeholder="Banner Title"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form_control_new">  
                                                <div class="label_head">Banner Url</div>
                                                <div class="form-group">
                                                    <input class="form-control" name="banner_url" value="{{ $banner->banner_url }}" id="banner_url" placeholder="Banner Url" required> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form_control_new">  
                                                <div class="label_head">Sort Order</div>
                                                <div class="form-group">  
                                                    <select name="sort_order" class="form-control" id="sort_order" required>
                                                        <option value="">Please Select Sort Order</option>
                                                        <option <?php if(isset($banner->sort_order) && !empty($banner->sort_order) && $banner->sort_order == 1){ echo "selected";}else{ echo "";} ?> value="1">1</option>
                                                        <option <?php if(isset($banner->sort_order) && !empty($banner->sort_order) && $banner->sort_order == 2){ echo "selected";}else{ echo "";} ?> value="2">2</option>
                                                        <option <?php if(isset($banner->sort_order) && !empty($banner->sort_order) && $banner->sort_order == 3){ echo "selected";}else{ echo "";} ?> value="3">3</option>
                                                        <option <?php if(isset($banner->sort_order) && !empty($banner->sort_order) && $banner->sort_order == 4){ echo "selected";}else{ echo "";} ?>value="4">4</option>
                                                        <option <?php if(isset($banner->sort_order) && !empty($banner->sort_order) && $banner->sort_order == 5){ echo "selected";}else{ echo "";} ?> value="5">5</option>
                                                        <option <?php if(isset($banner->sort_order) && !empty($banner->sort_order) && $banner->sort_order == 6){ echo "selected";}else{ echo "";} ?> value="6">6</option>
                                                        <option <?php if(isset($banner->sort_order) && !empty($banner->sort_order) && $banner->sort_order == 7){ echo "selected";}else{ echo "";} ?> value="7">7</option>
                                                        <option <?php if(isset($banner->sort_order) && !empty($banner->sort_order) && $banner->sort_order == 8){ echo "selected";}else{ echo "";} ?> value="8">8</option>
                                                        <option <?php if(isset($banner->sort_order) && !empty($banner->sort_order) && $banner->sort_order == 9){ echo "selected";}else{ echo "";} ?> value="9">9</option>
                                                        <option <?php if(isset($banner->sort_order) && !empty($banner->sort_order) && $banner->sort_order == 10){ echo "selected";}else{ echo "";} ?> value="10">10</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-offset-2 col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group text-center radio_ng">
                                                        <label for="activateInstantly">Activate Instantly</label>
                                                        <input id="activateInstantly" type="radio" name="activate_type" value="0" <?php if($banner->activate_type == 0){ echo "checked";}else{echo "";} ?>>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group text-center radio_ng">
                                                        <label for="scheduleDate">Schedule Date</label>
                                                        <input id="scheduleDate" type="radio" name="activate_type" value="1" <?php if($banner->activate_type == 1){ echo "checked";}else{echo "";} ?>>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 " id="sch_date_ng">
                                            <div class="form_control_new date_picker">  
                                                <div class="label_head">Registration expiration</div>
                                                <div class="input-append success date input-group"> 
                                                    <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
                                                    <input class="form-control" value="<?php if(!empty($banner->schedule_date) && isset($banner->schedule_date)){ echo date('d-m-Y', strtotime($banner->schedule_date));}else{ echo "";}?>" name="schedule_date" id="date_schedule" placeholder="Schedule Date">
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
                                    <button type="submit" class="new_add_srv_btn">Submit</button>
                                </div>
                            </div>
                        </div>  
                    </form>  
                </div>
            </div>
        <div>
    </div>

    <script src="{{ asset('public/plugins/jquery/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
    
    <script>
        $(document).ready(function(){
            var type = <?php echo $banner->activate_type;?> 

            if(type == 0){
                $('#sch_date_ng').addClass('hidden');
            }

            $('#scheduleDate').click(function(){
                $('#sch_date_ng').removeClass('hidden');
            });
            $('#activateInstantly').click(function(){
                $('#sch_date_ng').addClass('hidden');
            });

            // $("#date_schedule").datepicker();
        });

        function deleteBanner(){
            $('.bannerImgBox img').attr("src","{{ asset('public/img/no-banner.png') }}");
        }

            

    </script>
    @endsection