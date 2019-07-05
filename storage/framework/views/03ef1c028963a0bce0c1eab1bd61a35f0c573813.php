<?php $__env->startSection('content'); ?>
<div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">Personal Information</a> </li>
                </ul>

                <div class="page-title"> <i class="icon-custom-left"></i>
                    <h3>Personal Information  <span class="semi-bold">&nbsp;</span></h3>
                </div>
            <?php if(isset($employee) && !empty($employee)): ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-box-main">
                            <div class="box">
                                <div class="row">
                                    <div class="col-xl-3 col-md-3">
                                        <div class="widget_user_list">
                                            <div class="widget_img_box">
                                                <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="">
                                            </div>

                                            <div class="widget-title">
                                                <h4><?php echo e($employee->employee_name); ?> 
                                                <!--<span>Anuragi</span>-->
                                                </h4>
                                                <h5><span>Primary Service</span>
                                                    <span class="pri_service_main">
                                                    <span class="pri_service_name"># <?php echo e($employee->emp_role); ?> </span>
                                                    </span>
                                                </h5>
                                            </div>

                                            <div class="widget-user-details view_us">
                                                <div class="tiles-body">
                                                    <div class="card_box_opt">
                                                        <div class="tiles-title text-uppercase card-text-heading">Secondary Skill</div>
                                                        <div class="skills_list">
                                                            <span>#<?php echo e($employee->emp_role); ?></span> 
                                                            
                                                            <?php if(!empty($employee->service_name)): ?>
                                                            <?php $dt = explode(',',$employee->service_name);
                                                            //print_r($dt);die();
                                                            ?>
                                                            <?php $__currentLoopData = $dt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            , <span> 
                                                            <?php echo "#".$d; ?>
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
                                                                <div class="title">Vehicle No.</div>
                                                                <div class="st_opt">ADC-254 </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="widget-action-block">
                                                    <a href="emp_order_history.php" class="hashtags transparent">Order History</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-9 col-md-9">
                                        <div class="box-body boxDetailsHeadings">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="headSec">
                                                        <h3 class="profile-username text-capitalize pull-left">Personal Information</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">   
                                                <div class="col-md-4">
                                                    <h5>Email</h5>
                                                    <p><?php echo e($employee->email_id); ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h5>Mobile</h5>
                                                    <p><?php echo e($employee->emp_mobile); ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h5>Date Of Birth</h5>
                                                    <p><?php echo e(date("d-M-Y", strtotime($employee->date_of_birth))); ?></p>
                                                </div>
                                            </div> 
                                            
                                            <div class="row">  
                                                

                                                <div class="col-md-4">
                                                    <h5>Nationality</h5>
                                                    <p><?php echo e($employee->nationality); ?></p>
                                                </div>

                                                <div class="col-md-4">
                                                    <h5>Country</h5>
                                                    <p><?php echo e($employee->country); ?></p>
                                                </div>

                                                <div class="col-md-4">
                                                    <h5>City</h5>
                                                    <p><?php echo e($employee->city); ?></p>
                                                </div>
                                            </div> 

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5>Local Address </h5>
                                                    <p><?php echo e($employee->local_address); ?></p>
                                                </div>

                                                <div class="col-md-4">
                                                    <h5>Permanent Address </h5>
                                                    <p><?php echo e($employee->permanent_address); ?></p>
                                                </div>
                                            </div> 

                                            <div class="row">   
                                            
                                            </div> 

                                            <div class="clearfix"></div>
                                            
                                            <div class="row marginTop20">
                                                <div class="col-md-12">
                                                    <div class="headSec">
                                                        <h3 class="profile-username text-capitalize pull-left">Document Information</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">    
                                                <div class="col-md-4">
                                                    <h5>Passport Number</h5>
                                                    <p><?php echo e($employee->passport_number); ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h5>Passport expiration</h5>
                                                    <p><?php echo e(date("d-M-Y", strtotime($employee->passport_exp_date))); ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h5>Visa expiry date</h5>
                                                    <p><?php echo e(date("d-M-Y", strtotime($employee->visa_expiration))); ?></p>
                                                </div>
                                            </div>

                                            <div class="row">    
                                                <div class="col-md-4">
                                                    <h5>Emirates Id</h5>
                                                    <p><?php echo e($employee->emirates_id); ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h5>Emirates expiration</h5>
                                                    <p><?php echo e(date("d-M-Y", strtotime($employee->emirates_exp_date))); ?></p>
                                                </div>
                                            </div>


                                            <div class="row marginTop20">
                                                <div class="col-md-12">
                                                    <div class="headSec">
                                                        <h3 class="profile-username text-capitalize pull-left">Driver Information</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">   
                                                <div class="col-md-4">
                                                    <h5>Driving Licence Number</h5>
                                                    <p>hk125152</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h5>Driving Licence expiry</h5>
                                                    <p>hk125152</p>
                                                </div>

                                                <div class="col-md-4">
                                                    <h5>Vehicle Type</h5>
                                                    <p>2 Wheeler</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="content-box-main">
                            <div class="box">
                                <div class="row boxDetailsHeadings ">
                                    <div class="col-md-12">
                                        <div class="headSec">
                                            <h3 class="profile-username text-capitalize pull-left">Documents Copy</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="docImg">
                                            <h4>Pancard</h4>  
                                            <div class="img_box">  
                                                <img src="<?php echo e(asset('public/img/pan-card.jpg')); ?>" class="img-responsive">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="docImg">
                                            <h4>Passport</h4>  
                                            <div class="img_box">  
                                                <img src="<?php echo e(asset('public/img/passport.png')); ?>" class="img-responsive">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="docImg">
                                            <h4>Emirates Id</h4>  
                                            <div class="img_box">  
                                                <img src="<?php echo e(asset('public/img/emirates.jpg')); ?>" class="img-responsive">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="docImg">
                                            <h4>Driving Licence</h4> 
                                            <div class="img_box">   
                                                <img src="<?php echo e(asset('public/img/licence.jpg')); ?>" class="img-responsive">
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