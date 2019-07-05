<?php $__env->startSection('content'); ?>
<div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">Vehicle Information</a> </li>
                </ul>

                <div class="page-title"> <i class="icon-custom-left"></i>
                    <h3>Vehicle Information  <span class="semi-bold">&nbsp;</span></h3>
                </div>
            <?php if(isset($vehicle) && !empty($vehicle)): ?>
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
                                                    <a href="view_vehicle_details.php" class="hashtags transparent">Vehicle Info</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-9 col-md-9">
                                        <div class="box-body boxDetailsHeadings">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="headSec">
                                                        <h3 class="profile-username text-capitalize pull-left">Vehicle Information</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">   
                                                <div class="col-md-4">
                                                    <h5>Model Number</h5>
                                                    <p><?php echo e($vehicle->modal_no); ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h5>Owner Name</h5>
                                                    <p><?php echo e($vehicle->owner_name); ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h5>Manufacturing Year</h5>
                                                    <p><?php echo e(date('d-M-Y', strtotime($vehicle->manufacturing_year))); ?></p>
                                                </div>
                                            </div> 
                                            
                                            <div class="row">  
                                                

                                                <div class="col-md-4">
                                                    <h5>Vehicle Partner</h5>
                                                    <p><?php echo e($vehicle->vehicle_partner); ?></p>
                                                </div>

                                                <div class="col-md-4">
                                                    <h5>Vehilce Color</h5>
                                                    <p><?php echo e($vehicle->vehilce_color); ?></p>
                                                </div>

                                                <div class="col-md-4">
                                                    <h5>Registration Expiration</h5>
                                                    <p><?php echo e(date('d-M-Y', strtotime($vehicle->registration_expiration))); ?></p>
                                                </div>
                                            </div>

                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>    
                </div>   
            <?php endif; ?> 
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.emp_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>