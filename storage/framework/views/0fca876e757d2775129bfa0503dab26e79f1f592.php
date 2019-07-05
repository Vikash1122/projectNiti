

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-title"> 
            <a href="<?php echo e(url()->previous()); ?>"  class="previousBtn">
                <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive" />
            </a>
            <h3>Vehicle</h3>
            <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Vehicle Information </h3></div>
        </div>
        <?php if(isset($vehicle) && !empty($vehicle)): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="content-box-main">
                        <div class="box">
                            <div class="row">
                                <div class="col-xl-3 col-md-3">
                                    <div class="mainWidget_ng listVehicle_ng">
                                        <div class="head_ng borderBottomNone">
                                            <div class="icon_div">
                                            <?php if(isset($vehicle->vehicle_pic) && !empty($vehicle->vehicle_pic)): ?>
                                                <img src="<?php echo e(fileurlvehicle().$vehicle->vehicle_pic); ?>" class="img-responsive">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('public/img/vehicleDefault.png')); ?>" class="img-responsive">
                                            <?php endif; ?>

                                                <!-- <img src="<?php echo e(asset('public/img/vehicleDefault1.png')); ?>" class="img-responsive padding0"> -->
                                            </div>
                                            <h4 class="text-center"><?php echo e($vehicle->manufacturer); ?></h4>
                                        </div>

                                        <div class="title history_order_ng_vnum">
                                            <h4>Vehicle No. <span><?php echo e($vehicle->vehicle_no); ?></span></h4>
                                        </div>

                                        <div class="content_opt borderTop_none"> 
                                            <div class="card_loc">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="tiles-title card-text-heading">Registration Number</div>
                                                        <div class="job_st_details"><?php echo e($vehicle->registration_number); ?></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card_loc">
                                                <div class="row">
                                                    <div class="col-md-6 ">
                                                        <div class="tiles-title card-text-heading">Registration Expiration</div>
                                                        <div class="job_st_details"><?php echo e(date('d/m/y', strtotime($vehicle->registration_expiration))); ?></div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <div class="tiles-title card-text-heading">Current Status</div>
                                                        <?php if($vehicle->status == 1): ?>
                                                        <div class="job_st_details">Available</div>
                                                        <?php elseif($vehicle->status == 2): ?>
                                                        <div class="job_st_details">Ongoing</div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card_loc">
                                                <div class="row">
                                                    <div class="col-md-6 ">
                                                        <div class="tiles-title card-text-heading">Vehicle Colour</div>
                                                        <div class="job_st_details"><?php echo e($vehicle->vehilce_color); ?></div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <div class="tiles-title card-text-heading">Vehicle Partner</div>
                                                        <div class="job_st_details"><?php echo e($vehicle->vehicle_partner); ?></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="newActBtn_ng">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <?php if(hasPermissionThroughRole('view_order_history')): ?>
                                                            <a href="<?php echo e(url('admin/vehicles/vehicleOrderList/'.$vehicle->id)); ?>" class="btn">Order History</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-9 col-md-9 order_history_box_main">
                                    <div class="box-body boxDetailsHeadings">
                                        <div class="order_history_box">
                                            <div class="row">   
                                                <div class="col-md-12">
                                                    <div class="headSec">
                                                        <h3 class="profile-username text-capitalize pull-left">Basic Information</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="docImg">
                                                        <p>Registration Card</p>  
                                                        <div class="img_box">  
                                                            <?php if(isset($vehicle->registration_card) && !empty($vehicle->registration_card)): ?>
                                                                <img src="<?php echo e(fileurlvehicle().$vehicle->registration_card); ?>" class="" />
                                                            <?php else: ?>
                                                                <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="" />
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="row">  
                                                        <div class="col-md-4">
                                                            <h5>Owner Name</h5>
                                                            <p><?php echo e($vehicle->owner_name); ?></p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h5>Manufacturing Year</h5>
                                                            <p><?php echo e(date('Y', strtotime($vehicle->manufacturing_year))); ?></p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h5>Partner</h5>
                                                            <p><?php echo e($vehicle->vehicle_partner); ?></p>
                                                        </div>
                                                        
                                                    </div> 

                                                    <div class="row"> 
                                                        <div class="col-md-4">
                                                            <h5>Color</h5>
                                                            <p><?php echo e($vehicle->vehilce_color); ?></p>
                                                        </div>   
                                                        <div class="col-md-4">
                                                            <h5>Registration Number</h5>
                                                            <p><?php echo e($vehicle->registration_number); ?></p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h5>Registration Expiration</h5>
                                                            <p><?php echo e(date('d/m/y', strtotime($vehicle->registration_expiration))); ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="row"> 
                                                        <div class="col-md-4">
                                                            <h5>Vehicle Type</h5>
                                                            <p><?php echo e($vehicle->vehicle_type); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                              
                                        </div>

                                        <div class="clearfix"></div>

                                        <div class="order_history_box">
                                            <div class="row">   
                                                <div class="col-md-12">
                                                    <div class="dtl_order-hd">
                                                        <h5 class="profile-username text-capitalize pull-left">Driver's</h5>
                                                    </div>
                                                </div>

                                                <div class="list_emp_dt">
                                                    <ul class="new_li_elements">
                                                    <?php if(isset($vehicle->drivers[0]) && !empty($vehicle->drivers[0])): ?>
                                                    <?php $__currentLoopData = $vehicle->drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <a href="view_emp_details.php">
                                                                <div class="list_emp_dt-ng">
                                                                    <div class="img-div-ng">
                                                                    <?php if(isset($driver->emp_profile) && !empty($driver->emp_profile)): ?>
                                                                        <img src="<?php echo e(fileurlvehicle().$driver->emp_profile); ?>" alt="" data-src="<?php echo e(asset('public/img/profiles/avatar_small.jpg')); ?>" width="35" height="35">
                                                                    <?php else: ?>
                                                                        <img src="<?php echo e(asset('public/img/profiles/avatar_small.jpg')); ?>" alt="" data-src="<?php echo e(asset('public/img/profiles/avatar_small.jpg')); ?>" width="35" height="35">
                                                                    <?php endif; ?>
                                                                    </div>
                                                                    <div class="list_emp-dtl-ng">
                                                                        <div class="lft">
                                                                            <div class="user-name"> <?php echo e($driver->employee_name); ?> 
                                                                            <!-- <span class="semi-bold">Smith</span>  -->
                                                                            </div>
                                                                            <div class="preview-wrapper"><span class="bold"><?php echo e($driver->emp_mobile); ?> </span></div>
                                                                        </div>

                                                                        <div class="rgt">
                                                                            <div class="user-name">Job Date </div>
                                                                            <div class="preview-wrapper"><span class="bold"><?php echo e($driver->emp_mobile); ?></span></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <h4 class="text-center">No Driver Alloted!</h4>
                                                    <?php endif; ?>
                                                       
                                                    </ul>
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
        <?php endif; ?> 
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.emp_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>