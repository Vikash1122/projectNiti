<?php $__env->startSection('content'); ?>
            <div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">Vehicles</a> </li>
                </ul>

                <div class="page-title"> <i class="icon-custom-left"></i>
                    <h3>Vehicles  <span class="semi-bold">&nbsp;</span></h3>
                </div>
                <?php if(Session::has('message')): ?> 
                    <div class="alert alert-info">
                        <?php echo e(Session::get('message')); ?> 
                    </div> 
                <?php endif; ?>
                <div class="row">
                <?php if(isset($vehicles) && !empty($vehicles)): ?>
                <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $veh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <div class="widget_user_list vehicle_listing">
                            <div class="widget-item ">
                                <div class="controller overlay right">
                                    <a href="<?php echo e(url('admin/vehicles/editVehicle/'.$veh->id)); ?>"><i class="fa fa-pencil"></i></a>
                                    <a href="<?php echo e(url('admin/vehicles/destroy/'.$veh->id)); ?>"><i class="fa fa-times"></i></a>
                                </div>
                            </div>

                            <div class="widget_img_box">
                                <img src="<?php echo e(fileUrl().$veh->registration_card); ?>" class="img-responsive" />
                            </div>

                            <div class="widget-title">
                                <h4><?php echo e($veh->manufacturer); ?> </h4>
                                <h5><span>Vehicle No</span>
                                    <span class="pri_service_main">
                                        <span class="pri_service_name"><?php echo e($veh->vehicle_no); ?></span>
                                    </span>
                                </h5>
                            </div>

                            <div class="widget-user-details rad_box">
                                <div class="tiles-body">
                                    <div class="card_box_opt">
                                        <div class="tiles-title text-uppercase card-text-heading">Registration number</div>
                                        <div class="skills_list">
                                            <span><?php echo e($veh->registration_number); ?></span>
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
                                    <a href="<?php echo e(url('admin/vehicles/vehicleOrderList/'.$veh->id)); ?>" class="hashtags transparent">Order History</a>
                                    <a href="<?php echo e(url('admin/vehicles/viewVehicle/'.$veh->id)); ?>" class="hashtags transparent">Vehicle Info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </div>    
            </div>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>