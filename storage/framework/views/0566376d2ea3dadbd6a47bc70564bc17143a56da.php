<?php $__env->startSection('content'); ?>
<div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">Order History</a> </li>
                </ul>

                <div class="page-title"> <i class="icon-custom-left"></i>
                    <h3>Order History  <span class="semi-bold">&nbsp;</span></h3>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="content-box-main">
                            <div class="box">
                                <div class="row">
                                    <div class="col-xl-3 col-md-3">
                                        <div class="widget_user_list vehicle_listing">
                
                                            <div class="widget_img_box">
                                                <img src="<?php echo e(asset('public/img/car.png')); ?>" class="img-responsive" />
                                            </div>
                
                                            <div class="widget-title">
                                                <h4><?php echo e($vehicle->manufacturer); ?> </h4>
                                                <h5><span>Vehicle No</span>
                                                    <span class="pri_service_main">
                                                        <span class="pri_service_name"><?php echo e($vehicle->vehicle_no); ?></span>
                                                    </span>
                                                </h5>
                                            </div>
                
                                            <div class="widget-user-details rad_box">
                                                <div class="tiles-body">
                                                    <div class="card_box_opt">
                                                        <div class="tiles-title text-uppercase card-text-heading">Registration number</div>
                                                        <div class="skills_list">
                                                            <span><?php echo e($vehicle->registration_number); ?></span>
                                                        </div>
                                                    </div>
                
                                                    <div class="card_loc">
                                                        <div class="tiles-title text-uppercase card-text-heading">Job Details</div>
                                                        <div class="job_st_details">
                                                            <div class="left_opt">
                                                                <div class="widget-stats">
                                                                    <div class="wrapper transparent">
                                                                        <a href="">
                                                                            <span class="item-title">Total</span> <span class="item-count animate-number semi-bold" data-value="2415" data-animation-duration="700">2,415</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-stats ">
                                                                    <div class="wrapper last">
                                                                        <a href="">
                                                                            <span class="item-title">Monthly</span> <span class="item-count animate-number semi-bold" data-value="157" data-animation-duration="700">157</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="right_opt">
                                                                <div class="title">Current Status</div>
                                                                <div class="st_opt"><a href="#">Unavailable </a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                
                                                    <div class="card_loc">
                                                        <div class="tiles-title text-uppercase card-text-heading">Current Job</div>
                                                        <div class="job_st_details">
                                                            <div class="left_opt">
                                                                <div class="title">Location</div>
                                                                <div class="st_opt">Dubai </div>
                                                            </div>
                                                            <div class="right_opt">
                                                                <div class="title">Registration expiration</div>
                                                                <div class="st_opt">25/02/2020 </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-action-block">
                                                    <a href="view_vehicle_details.php" class="hashtags transparent">Personal Info</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-9 col-md-9 order_history_box_main">
                                        <div class="box-body boxDetailsHeadings">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="headSec">
                                                        <h3 class="profile-username text-capitalize pull-left">Order List</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="order_history_box">
                                                <div class="row">   
                                                    <div class="col-md-12">
                                                        <div class="dtl_order-hd">
                                                            <h5 class="pull-left">Job Code - <span>#0001</span></h5>
                                                            <h5 class="pull-right job_sts"> Pending</h5>
                                                        </div>
                                                    </div>
                                                </div>    

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <h5>Job Name</h5>
                                                        <p>Plumbing</p>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <h5>Job Date</h5>
                                                        <p>23/5/2018</p>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <h5>Total working day</h5>
                                                        <p>5 Days</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h5>Team size</h5>
                                                        <p class="odr-tm-count"><a href="javascript:;" data-toggle="modal" data-target=".bs-example-modal-lg">5 Members</a></p>
                                                    </div>
                                                </div> 

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5>Job Location</h5>
                                                        <p>45/54 DLF phase-1 , Gurugram</p>
                                                    </div>

                                                    <div class="col-md-6 text-right">
                                                        <h5>&nbsp;</h5>
                                                        <span class="odr-tm-count"><a href="javascript:;" data-toggle="modal" data-target="#myModal">Inventories</a></span>
                                                        <span class="odr-tm-dt"><a href="#" >View Job Details</a></span>
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="clearfix"></div>

                                            <div class="order_history_box">
                                                <div class="row">   
                                                    <div class="col-md-12">
                                                        <div class="dtl_order-hd">
                                                            <h5 class="pull-left">Job Code - <span>#0002</span></h5>
                                                            <h5 class="pull-right job_sts_complete"> Complete</h5>
                                                        </div>
                                                    </div>
                                                </div>    

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <h5>Job Name</h5>
                                                        <p>Plumbing</p>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <h5>Job Date</h5>
                                                        <p>23/5/2018</p>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <h5>Total working day</h5>
                                                        <p>5 Days</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h5>Team size</h5>
                                                        <p class="odr-tm-count"><a href="javascript:;" data-toggle="modal" data-target=".bs-example-modal-lg">5 Members</a></p>
                                                    </div>
                                                </div> 

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5>Job Location</h5>
                                                        <p>45/54 DLF phase-1 , Gurugram</p>
                                                    </div>

                                                    <div class="col-md-6 text-right">
                                                        <h5>&nbsp;</h5>
                                                        <span class="odr-tm-count"><a href="javascript:;" data-toggle="modal" data-target="#myModal">Inventories</a></span>
                                                        <span class="odr-tm-dt"><a href="job_details.php" >View Job Details</a></span>
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="clearfix"></div>

                                            <div class="order_history_box">
                                                <div class="row">   
                                                    <div class="col-md-12">
                                                        <div class="dtl_order-hd">
                                                            <h5 class="pull-left">Job Code - <span>#0003</span></h5>
                                                            <h5 class="pull-right job_sts_complete"> Complete</h5>
                                                        </div>
                                                    </div>
                                                </div>    

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <h5>Job Name</h5>
                                                        <p>Plumbing</p>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <h5>Job Date</h5>
                                                        <p>23/5/2018</p>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <h5>Total working day</h5>
                                                        <p>5 Days</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h5>Team size</h5>
                                                        <p class="odr-tm-count"><a href="javascript:;" data-toggle="modal" data-target=".bs-example-modal-lg">5 Members</a></p>
                                                    </div>
                                                </div> 

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5>Job Location</h5>
                                                        <p>45/54 DLF phase-1 , Gurugram</p>
                                                    </div>

                                                    <div class="col-md-6 text-right">
                                                        <h5>&nbsp;</h5>
                                                        <span class="odr-tm-count"><a href="javascript:;" data-toggle="modal" data-target="#myModal">Inventories</a></span>
                                                        <span class="odr-tm-dt"><a href="job_details.php" >View Job Details</a></span>
                                                    </div>
                                                </div> 
                                            </div>

                                            <!-------------- Team Member modal ---------------->
                                            <div class="modal fade bs-example-modal-lg teamSize" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                                <div class="modal-dialog" role="document"> 
                                                    <div class="modal-content"> 
                                                        <div class="modal-header"> 
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button> 
                                                            <h4 class="modal-title" id="myLargeModalLabel">Job Code - JD4040</h4> 
                                                        </div> 
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h4>Team Members</h4>
                                                                    <ul>
                                                                        <li>
                                                                            <a href="view_emp_details.php">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                        <div class="profile-img-wrapper pull-left m-l-10">
                                                                                            <div class=" p-r-10">
                                                                                                <img src="<?php echo e(asset('public/img/profiles/avatar_small.jpg')); ?>" alt="" data-src="<?php echo e(asset('public/img/profiles/avatar_small.jpg')); ?>" width="35" height="35"> 
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-10">
                                                                                        <div class="user-name text-black bold large-text"> Kamath <span class="semi-bold">Smith</span> </div>
                                                                                        <div class="preview-wrapper"><span class="bold">9878299874</span></div>
                                                                                    </div>
                                                                                </div>  
                                                                            </a>
                                                                        </li>

                                                                        <li>
                                                                            <a href="view_emp_details.php">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                        <div class="profile-img-wrapper pull-left m-l-10">
                                                                                            <div class=" p-r-10">
                                                                                                <img src="<?php echo e(asset('public/img/profiles/avatar_small.jpg')); ?>" alt="" data-src="<?php echo e(asset('public/img/profiles/avatar_small.jpg')); ?>" width="35" height="35"> 
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-10">
                                                                                        <div class="user-name text-black bold large-text"> NishiKant <span class="semi-bold">Chaurasia</span> </div>
                                                                                        <div class="preview-wrapper"><span class="bold">9878299874</span></div>
                                                                                    </div>
                                                                                </div>  
                                                                            </a>
                                                                        </li>

                                                                        <li>
                                                                            <a href="view_emp_details.php">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                        <div class="profile-img-wrapper pull-left m-l-10">
                                                                                            <div class=" p-r-10">
                                                                                                <img src="<?php echo e(asset('public/img/profiles/avatar_small.jpg')); ?>" alt="" data-src="<?php echo e(asset('public/img/profiles/avatar_small.jpg')); ?>" width="35" height="35"> 
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-10">
                                                                                        <div class="user-name text-black bold large-text"> Hemu <span class="semi-bold">Smith</span> </div>
                                                                                        <div class="preview-wrapper"><span class="bold">9878299874</span></div>
                                                                                    </div>
                                                                                </div>  
                                                                            </a>
                                                                        </li>

                                                                        <li>
                                                                            <a href="view_emp_details.php">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                        <div class="profile-img-wrapper pull-left m-l-10">
                                                                                            <div class=" p-r-10">
                                                                                                <img src="<?php echo e(asset('public/img/profiles/avatar_small.jpg')); ?>" alt="" data-src="<?php echo e(asset('public/img/profiles/avatar_small.jpg')); ?>" width="35" height="35"> 
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-10">
                                                                                        <div class="user-name text-black bold large-text"> Prem <span class="semi-bold">Smith</span> </div>
                                                                                        <div class="preview-wrapper"><span class="bold">9800000001</span></div>
                                                                                    </div>
                                                                                </div>  
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>

                                            <!------------------------------>

                                            <div class="modal fade inventoryModal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Job Code - JD4040</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h4>Inventory Product List <a href="" class="pull-right">Order No. - ( #JD40401545 )</a></h4>
                                                                <ul>
                                                                    <li>
                                                                        <a href="view_emp_details.php">
                                                                            <div class="row">
                                                                                <div class="col-md-2">
                                                                                    <div class="profile-img-wrapper pull-left m-l-10">
                                                                                        <div class=" p-r-10">
                                                                                            <img src="<?php echo e(asset('public/img/no-preview-item.jpg')); ?>" alt="" data-src="<?php echo e(asset('public/img/no-preview-item.jpg')); ?>" width="35" height="35"> 
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="user-name text-black bold large-text"> Wire </div>
                                                                                    <div class="preview-wrapper"><span class="bold">Type - .2mm</span></div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="user-name text-black "> Quantity </div>
                                                                                    <div class="preview-wrapper"><span class="bold">5 M</span></div>
                                                                                </div>
                                                                            </div>  
                                                                        </a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="view_emp_details.php">
                                                                            <div class="row">
                                                                                <div class="col-md-2">
                                                                                    <div class="profile-img-wrapper pull-left m-l-10">
                                                                                        <div class=" p-r-10">
                                                                                            <img src="<?php echo e(asset('public/img/no-preview-item.jpg')); ?>" alt="" data-src="<?php echo e(asset('public/img/no-preview-item.jpg')); ?>" width="35" height="35"> 
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="user-name text-black bold large-text"> HAMBER </div>
                                                                                    <div class="preview-wrapper"><span class="bold">Type - Plastic</span></div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="user-name text-black "> Quantity </div>
                                                                                    <div class="preview-wrapper"><span class="bold">3</span></div>
                                                                                </div>
                                                                            </div>  
                                                                        </a>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        </div>        
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!------------------------------>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.emp_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>