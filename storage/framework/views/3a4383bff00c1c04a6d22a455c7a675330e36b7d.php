

<?php $__env->startSection('content'); ?>
<div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">Schedule Survey</a> </li>
                </ul>

                <div class="page-title"> 
                    <a href="<?php echo e(url()->previous()); ?>">
                        <i class="icon-custom-left"></i>
                    </a>
                    <h3>Schedule Survey  <span class="semi-bold">&nbsp;</span></h3>
                </div>

                
                <div class="row">
                    <div class="col-md-4">
                        <div class="content-box-main">
                            <div id='calendar1'></div>
                        </div>
                        
                    </div>

                    <div class="col-md-8">
                        <div class="content-box-main" id="scheduleData">
                            <div class="calenderHeading" style="margin-bottom: 20px;">
                                <h5 class="date_selected pull-left" style="width:100%">Date : <span><?php echo e(date('d-m-Y')); ?></span> <span class="pull-right greenColor">Total Survey : <?php echo e(count($surveyors)); ?> </span></h5>
                            </div>
                            <?php if(isset($surveyors) && !empty($surveyors)): ?>
                            <?php $__currentLoopData = $surveyors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="order_history_box">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="job_desc_box_list">
                                            <div class="title">
                                                <h5>Surveyor<span class="pull-right srv_name"></span></h5>
                                            </div>       
                                        </div>
                                        <div class="widget_user_list surveyor_dtl">
                                            <div class="widget_img_box">
                                            <?php if(isset($surv->emp_profile) && !empty($surv->emp_profile)): ?>
                                                <img src="<?php echo e(fileurlemp().$surv->emp_profile); ?>" class="img-responsive">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="img-responsive">
                                            <?php endif; ?>
                                            </div>
                                            <div class="bs_inf_jd">
                                                <h5 class="text-center"><?php echo e($surv->employee_name); ?></h5>
                                                <p>( <?php echo e($surv->emp_mobile); ?> )</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="sdl_srv" id="style-1">
                                            <div class="force-overflow">
                                            <?php if(isset($surv->jobs[0]) && !empty($surv->jobs[0])): ?>
                                            <?php $__currentLoopData = $surv->jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="sub_ser_box_list">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="job_desc_box_list">
                                                                <div class="title">
                                                                    <h5>Job No. <span class="srv_name"><?php echo e($job->id); ?></span></h5>
                                                                </div>       
                                                            </div>
                                                        </div>
                                                    </div>  

                                                    <div class="row">
                                                        <div class="col-md-12 job_desc_box_list">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="jb_list_bl">
                                                                        <p>Customer</p>
                                                                        <?php if(isset($job->profile_pic) && !empty($job->profile_pic)): ?>
                                                                        <img src="<?php echo e(fileurlUser().$job->profile_pic); ?>" alt="" data-src="<?php echo e(fileurlUser().$job->profile_pic); ?>" width="35" height="35">
                                                                        <?php else: ?>
                                                                        <img src="<?php echo e(asset('public/img/profiles/avatar_small.jpg')); ?>" alt="" data-src="<?php echo e(asset('public/img/profiles/avatar_small.jpg')); ?>" width="35" height="35">
                                                                        <?php endif; ?>
                                                                        <h5><?php echo e($job->firstname); ?> <?php echo e($job->lastname); ?></h5> 
                                                                        <p>( <?php echo e($job->mobile); ?> )</p>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-9">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <h5 class="textHead">Slot Time</h5>
                                                                            <p><?php echo e($job->slot_name); ?> : <br /> <?php echo e($job->slotstart_time); ?> - <?php echo e($job->slotend_time); ?></p>
                                                                        </div>
                                                                        <?php if($job->status == 1): ?>
                                                                        <div class="col-sm-4">
                                                                            <h5 class="textHead">Estimate Price</h5>
                                                                            <p>Nill</p>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <h5 class="textHead">Estimate Time</h5>
                                                                            <p>Nill</p>
                                                                        </div>
                                                                        <?php endif; ?>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <h5 class="textHead">Location</h5>
                                                                            <p><?php echo e($job->address); ?></p>
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <h5 class="textHead">Distance</h5>
                                                                            <p>30 KM</p>
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <h5 class="textHead">Status</h5>
                                                                            <?php if($job->status == 0): ?>
                                                                            <span class="bold pending">Requested</span>
                                                                            <?php elseif($job->status == 1): ?>
                                                                            <span class="bold pending">Scheduled</span>
                                                                            <?php elseif($job->status == 2): ?>
                                                                            <span class="bold pending">Proposed</span>
                                                                            <?php elseif($job->status == 3): ?>
                                                                            <span class="bold pending">Accepted</span>
                                                                            <?php elseif($job->status == 4): ?>
                                                                            <span class="bold pending">In Process</span>
                                                                            <?php elseif($job->status == 5): ?>
                                                                            <span class="bold pending">Completed</span>
                                                                            <?php elseif($job->status == 6): ?>
                                                                            <span class="bold pending">Rejected</span>
                                                                            <?php else: ?>

                                                                            <?php endif; ?>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 text-right">
                                                                        <a href="<?php echo e(url('admin/surveyers/jobs/'.$job->id)); ?>" class="btn btn-primary">Add Report</a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            </div>
                                        </div>        
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <div class="order_history_box">
                                <div class="row">
                                    <p>No Record Found!</p>
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.test_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>