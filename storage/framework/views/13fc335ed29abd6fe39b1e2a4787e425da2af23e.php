<?php $__env->startSection('content'); ?>
<div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">Services</a> </li>
                </ul>

                <div class="page-title"> <i class="icon-custom-left"></i>
                    <h3>Services  <span class="semi-bold">&nbsp;</span></h3>
                </div>

                <div class="content-box-main">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="input-group"> 
                                <select class="form-control">
                                    <option value="">No. of Records</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-7">
                        
                        </div>

                        <div class="col-md-3">
                            <div class="dataTables_filter" id="example_filter">
                                <label>Search :  <input type="text" aria-controls="example" class="input-medium"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <?php if(Session::has('message')): ?> 
                    <div class="alert alert-info">
                        <?php echo e(Session::get('message')); ?> 
                    </div> 
                <?php endif; ?>
                <div class="row">
                
                <?php if(isset($services) && !empty($services)): ?>
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <div class="grid_box">
                            <div class="controller overlay right">
                                <!-- <a href="#" data-toggle="modal" class="addSubServices" data-target=".bs-example-modal-lg" title="Add Sub Services"><i class="fa fa-plus"></i></a> -->
                                <a href="javascript:;" data-toggle="modal" class="EditService editSub_btn" data-service_icon="<?php echo e($ser->service_icon); ?>" data-id="<?php echo e($ser->id); ?>" data-name="<?php echo e($ser->service_name); ?>" data-code="<?php echo e($ser->service_code); ?>" data-service_price="<?php echo e($ser->instant_service_price); ?>" data-target=".editNewService"><i class="fa fa-pencil"></i></a>
                                <a href="<?php echo e(url('admin/services/destroy',$ser->id)); ?>" data-id="<?php echo e($ser->id); ?>" onclick="return confirm('Are you sure you want to delete this record?');" title="Delete Service"><i class="fa fa-times"></i></a>

                            </div>
                            <div class="icon_div service_bg">
                            <?php if(isset($ser->service_icon) && !empty($ser->service_icon)): ?>
                                <img src="<?php echo e(fileurlservice().$ser->service_icon); ?>" class="img-responsive">
                            <?php else: ?>
                                <img id="service_icon" src="<?php echo e(asset('public/img/upload-icon_white.png')); ?>" class="img-responsive">
                            <?php endif; ?>
                            </div>
                            <div class="content_box">
                                <div class="title">
                                    <h4><?php echo e($ser->service_name); ?></h4>
                                </div>

                                <div class="content_opt">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="card_box_opt">
                                                <div class="card-text-heading">Service Code</div>
                                                <div class="service_code"><?php echo e($ser->service_code); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="action_box">
                                                <div class="card_box_opt">
                                                    <div class="card-text-heading">Status</div>
                                                    <div class="slide-primary">
                                                    <?php if($ser->status == 1): ?>
                                                        <input type="checkbox" name="switch" class="ios" checked="checked" style="display: none;">
                                                    <?php else: ?>
                                                    <input type="checkbox" name="switch" class="ios" checked="checked" style="display: none;">
                                                    <?php endif; ?>
                                                    </div>
                                                </div>                                                
                                            </div>    
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="card_box_opt">
                                                <div class="card-text-heading">Instant Service Price</div>
                                                <div class="service_code"><?php echo e($ser->instant_service_price); ?> AED</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="card_box_opt">
                                                <div class="card-text-heading">Total Sub Service</div>
                                                <div class="service_code">9</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="view_service_btn addSubService" data-toggle="modal" data-id="<?php echo e($ser->id); ?>" data-target=".bs-example-modal-lg" title="Add Sub Services"><span><i class="fa fa-plus"></i></span> Sub Services</div>
                                <a href="<?php echo e(url('admin/services/'.$ser->id.'/subServices')); ?>" class="add_service_btn" title="View Sub Services"><span><i class="fa fa-eye"></i></span> Sub Services</a>
                            </div>

                         
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </div>

                <div class="content-box-main">
                    <div class="row ">
                        <div class="col-md-12 dataTables_wrapper">
                            <div class="dataTables_paginate paging_bootstrap pagination">
                                <ul>
                                <li class="prev disabled"><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="next"><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                                </ul>
                            </div>
                            <div class="dataTables_info" id="example2_info">Showing <b>1 to 10</b> of 30 entries</div>
                        </div>
                    </div>
                </div>
            </div>

            
            <!---Add Edit Sub Services modal start -->
    <div class="modal fade sub_services_modal_main bs-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog" role="document" id="sub_services_modal_content">

            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Plumbing</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 sub_service_form">
                            <form action="<?php echo e(route('subservice.post')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="service_id" value="" id="serviceId" />
                                <div class="content-box-main">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="headingH4">Add New Sub Services</h4>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form_control_new">  
                                                <div class="label_head">Sub Service Name</div>
                                                <div class="input-group"> 
                                                    <span class="input-group-addon" id="sub_service_name"><i class="fa fa-cog"></i></span> 
                                                    <input class="form-control" name="sub_service_name" id="sub_service_name" placeholder="Sub Service Name"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form_control_new">  
                                                <div class="label_head">Sub Service Code</div>
                                                <div class="input-group"> 
                                                    <span class="input-group-addon" id="sub_service_code"><i class="fa fa-code"></i></span> 
                                                    <input class="form-control" name="sub_service_code" id="sub_service_code" placeholder="Sub Service Code"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form_control_new">  
                                                <div class="label_head">Estimate Price</div>
                                                <div class="input-group"> 
                                                    <span class="input-group-addon" id="estimate_price"><i class="fa fa-money"></i></span> 
                                                    <input class="form-control" name="estimate_price" id="estimate_price" placeholder="Estimate Price"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form_control_new">  
                                                <div class="label_head">Estimate Time</div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="input-group"> 
                                                            <span class="input-group-addon" id="estimate_hour"><i class="fa fa-clock-o"></i></span> 
                                                            <input class="form-control" name="estimate_hour" id="estimate_hour" placeholder="Enter Estimate Hours"> 
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="input-group"> 
                                                            <span class="input-group-addon" id="estimate_mints"><i class="fa fa-clock-o"></i></span> 
                                                            <input class="form-control" name="estimate_mints" id="estimate_mints" placeholder="Enter Estimate Minutes">
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
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
        </div>
    </div>
    <!---Add Edit Sub Services modal End -->
    

    <!---Add New Service modal End -->
    <div class="modal fade inventoryModal addNewService" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">New Service</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 sub_service_form">
                            <form action="<?php echo e(route('services.post')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                                <div class="content-box-main">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="headingH4">Add New Services</h4>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="service_icon_box">
                                                <div class="icon_div service_bg">
                                                    <img id="service_icon" src="<?php echo e(asset('public/img/upload-icon_white.png')); ?>" class="img-responsive">
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-offset-3 col-sm-6">
                                                        <div class="srv_icon_upload">
                                                            <div class="text">Upload Icon</div>
                                                            <div class="up_btn">
                                                                <div class="up_img_pro">
                                                                    <img alt="" id="service_icon" src="<?php echo e(asset('public/img/upload-icon.png')); ?>" class="center-block userImg img-responsive">
                                                                    <div class="uploadProfile">
                                                                        <div class="btn default btn-file btn-uploadnew">
                                                                        <input type="file" name="service_icon" onchange="getpic('service_icon_copy','service_icon','dl_text',event),OpenFile('service_icon_copy')" class="form-control imgPrv" id="service_icon_copy">
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
                                                <div class="label_head">Service Name</div>
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="service_code"><i class="fa fa-cog"></i></span>  
                                                    <input class="form-control" name="service_name" id="service_name" placeholder="Service Name"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form_control_new">  
                                                <div class="label_head">Service Code</div>
                                                <div class="input-group"> 
                                                    <span class="input-group-addon" id="service_code"><i class="fa fa-code"></i></span> 
                                                    <input class="form-control" name="service_code" id="service_code" placeholder="Service Code"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form_control_new">  
                                                <div class="label_head"> Instant Service Price</div>
                                                <div class="input-group"> 
                                                    <span class="input-group-addon" id="instant_service_price"><i class="fa fa-money"></i></span> 
                                                    <input class="form-control" name="instant_service_price" id="instant_service_price" placeholder="Instant Service Price"> 
                                                </div>
                                            </div>
                                        </div>

                                    </div>

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
        </div>
    </div>
    <!---Add New Service modal End -->
<!---Edit New Service modal End -->
<div class="modal fade inventoryModal editNewService" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel1">New Service</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="SUBeDIT"></div>
                    <div class="suberrord"></div>
                        <div class="col-md-12 sub_service_form">
                            <form id="edit_service_form" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
                            <input type="hidden" name="id" value="" id="ser_Id1" />
                                <div class="content-box-main">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="headingH4">Edit Services</h4>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="service_icon_box">
                                                <div class="icon_div service_bg">
                                                    <!--<img id="service_icon" src="<?php echo e(asset('public/img/upload-icon_white.png')); ?>" class="img-responsive">-->
                                                   
                                                        <img alt="" id="profile_copy" src="<?php echo e(asset('public/img/upload-icon_white.png')); ?>" class="center-block userImg img-responsive">
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-offset-3 col-sm-6">
                                                        <div class="srv_icon_upload">
                                                            <div class="text">Upload Icon</div>
                                                            <div class="up_btn">
                                                                <div class="up_img_pro">
                                                                    
                                                                <img alt="" id="profile_copy" src="<?php echo e(asset('public/img/upload-icon.png')); ?>" class="center-block userImg img-responsive">
                                                                    <div class="uploadProfile">
                                                                        <div class="btn default btn-file btn-uploadnew">
                                                                        <input type="file" name="service_icon" onChange="getpic('profile_pic_copy','profile_copy','dl_text',event),OpenFile('profile_pic_copy')" class="form-control imgPrv" id="profile_pic_copy">
                                                   
                                                                       <!-- <input type="file" name="service_icon" onchange="getpic('service_icon_copy','service_icon','dl_text',event),OpenFile('service_icon_copy')" class="form-control imgPrv" id="service_icon_copy">-->
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
                                                <div class="label_head">Service Name</div>
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="service_code"><i class="fa fa-cog"></i></span>  
                                                    <input class="form-control" name="service_name" value="" id="service_name1" placeholder="Service Name"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form_control_new">  
                                                <div class="label_head">Service Code</div>
                                                <div class="input-group"> 
                                                    <span class="input-group-addon" id="service_code"><i class="fa fa-code"></i></span> 
                                                    <input class="form-control" name="service_code" id="service_code1" value="" placeholder="Service Code"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form_control_new">  
                                                <div class="label_head"> Instant Service Price</div>
                                                <div class="input-group"> 
                                                    <span class="input-group-addon" id="instant_service_price"><i class="fa fa-money"></i></span> 
                                                    <input class="form-control" name="instant_service_price" value="" id="instant_service_price1" placeholder="Instant Service Price"> 
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <hr />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-danger">Cancel</button>
                                            <button type="submit" id="editSErviceSubmit1" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---Edit New Service modal End -->


    <a class="fixed-btn" href="javascript:;" data-toggle="modal" data-target=".addNewService">
        <img src="<?php echo e(asset('public/img/add.png')); ?>">
    </a>

    <!--Delete modal start-->
    <div class="modal fade alert_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content" >
                <div class="modal-body" style="background:#ffffff;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-center">Are you sure! You want to delete it.</p>
                            <p class="text-center">
                                <!-- <button type="button" class="btn-small">Cancel</button> -->
                                <button type="button" class="btn-small btn-success">Ok</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>