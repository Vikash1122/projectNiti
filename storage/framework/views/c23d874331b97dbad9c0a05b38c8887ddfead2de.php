<?php $__env->startSection('content'); ?>
<div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">Staff List</a> </li>
                </ul>

                <div class="page-title"> <i class="icon-custom-left"></i>
                    <h3>Staff List  <span class="semi-bold">&nbsp;</span></h3>
                </div>

                <div class="row">
                <?php if(Session::has('message')): ?> 
                    <div class="alert alert-info">
                        <?php echo e(Session::get('message')); ?> 
                    </div> 
                <?php endif; ?>
                <?php if(isset($employee) && !empty($employee)): ?>
                <?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <div class="widget_user_list">
                            <div class="widget-item ">
                                <div class="controller overlay right">
                                    <a href="<?php echo e(url('admin/employees/editEmployee/'.$emp->id)); ?>"><i class="fa fa-pencil"></i></a>
                                    <a href="<?php echo e(url('admin/employees/destroy',$emp->id)); ?>"><i class="fa fa-times"></i></a>
                                </div>
                            </div>

                            <div class="widget_img_box">
                            <?php if(isset($emp->emp_profile) && !empty($emp->emp_profile)): ?>
                                <img src="<?php echo e(fileurlemp().$emp->emp_profile); ?>" class="center-block userImg img-responsive">
                            <?php else: ?>
                                <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="center-block userImg img-responsive">
                            <?php endif; ?>
                            </div>

                            <div class="widget-title">
                                <h4><?php echo e($emp->employee_name); ?>

                                <!--<span>Anuragi</span>-->
                                </h4>
                                <h5><span>Primary Service</span>
                                    <span class="pri_service_main"><span class="pri_service_name"># <?php echo e($emp->emp_role); ?></span></span>
                                </h5>
                            </div>

                            <div class="widget-user-details rad_box">
                                <div class="tiles-body">
                                    <div class="card_box_opt">
                                        <div class="tiles-title text-uppercase card-text-heading">Secondary Skill</div>
                                        <div class="skills_list">
                                            <span>#<?php echo e($emp->emp_role); ?></span>  
                                            <?php if(!empty($emp->service_name)): ?>
                                            <?php $dt = explode(',',$emp->service_name);
                                            //print_r($dt);die();
                                            ?>
                                            <?php $__currentLoopData = $dt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span> 
                                            <?php echo ", #".$d; ?>
                                            </span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="card_loc">
                                        <div class="tiles-title text-uppercase card-text-heading">Job Details</div>
                                        <div class="job_st_details">
                                            <div class="left_opt">
                                                <div class="widget-stats">
                                                    <div class="wrapper transparent">
                                                        <a href="">
                                                            <span class="item-title">Total</span> 
                                                            <span class="item-count animate-number semi-bold" data-value="2415" data-animation-duration="700">2,415</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="widget-stats ">
                                                    <div class="wrapper last">
                                                        <a href="">
                                                            <span class="item-title">Monthly</span> 
                                                            <span class="item-count animate-number semi-bold" data-value="157" data-animation-duration="700">157</span>
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
                                                <div class="title">Vehicle No.</div>
                                                <div class="st_opt">ADC-254 </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="widget-action-block">
                                    <a href="<?php echo e(url('admin/employees/orderList',$emp->id)); ?>" class="hashtags transparent">Order History</a>
                                    <a href="<?php echo e(url('admin/employees/employeeProfile',$emp->id)); ?>" class="hashtags transparent">Personal Info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </div>
            </div>

            <a class="fixed-btn" href="<?php echo e(route('employee.form')); ?>">
        <img src="<?php echo e(asset('public/img/add.png')); ?>">
    </a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.emp_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>