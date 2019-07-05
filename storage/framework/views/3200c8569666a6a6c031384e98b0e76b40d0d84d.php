
    <?php $__env->startSection('content'); ?>

        <div class="content">
            <div class="page-title"> 
                <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
                    <img src="<?php echo e(asset('public/img//go_back.png')); ?>" class="img-responsive">
                </a>
                <h3>Job Details  <span class="semi-bold">&nbsp;</span></h3>
            </div>

            <?php if(isset($employee) && !empty($employee)): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="content-box-main">
                        <div class="box">
                            <div class="row">
                                <div class="col-xl-3 col-md-3">
                                    <div class="mainWidget_ng ">
                                        <div class="head_ng borderBottomNone ng_listEmp">
                                            <div class="icon_div">
                                                <?php if(isset($employee->emp_profile) && !empty($employee->emp_profile)): ?>
                                                    <img src="<?php echo e(fileurlemp().$employee->emp_profile); ?>" class="center-block userImg img-responsive">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('public/img/vendorDefault.png')); ?>" class="">
                                                <?php endif; ?>
                                            </div>
                                            <h4 class="text-center"><?php echo e($employee->employee_name); ?> </h4>
                                            <p class="text-center"><?php echo e($employee->emp_role); ?></p>
                                        </div>

                                        <div class="title listEmp">
                                            <div class="service_title">
                                                <h5>Skills</h5>
                                                <p>
                                                    <?php $serv = explode(',',$employee->service_name);?>
                                                    <span><?php echo e($employee->service_name); ?></span>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="content_opt borderTop_none"> 
                                            <div class="card_loc">
                                                <div class="row">
                                                    <div class="col-md-7 col-sm-7 col-xs-7">
                                                        <div class="tiles-title card-text-heading">Mobile Number</div>
                                                        <div class="job_st_details">+971-<?php echo e($employee->emp_mobile); ?></div>
                                                    </div>

                                                    <div class="col-md-5 col-sm-5 col-xs-5">
                                                        <div class="tiles-title card-text-heading">Team</div>
                                                        <?php if(isset($employee->group) && !empty($employee->group)): ?>
                                                        <div class="job_st_details"><?php echo e($employee->group); ?></div>
                                                        <?php else: ?>
                                                        <div class="job_st_details">Not Assign</div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card_loc">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="tiles-title card-text-heading">Current Status</div>
                                                        <div class="job_st_details"><?php echo e($employee->currentStatus); ?></div>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <div class="newActBtn_ng">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="<?php echo e(url('admin/employees/orderList/'.$employee->id)); ?>" class="btn btn-block">Order History</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- <div class="widget_user_list">
                                        <div class="widget_img_box">
                                            <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="">
                                        </div>

                                        <div class="widget-title">
                                            <h4><?php echo e($employee->employee_name); ?> </h4>
                                            <h5><span>Primary Service</span>
                                                <span class="pri_service_main"><span class="pri_service_name"> <?php echo e($employee->emp_role); ?></span></span>
                                            </h5>
                                        </div>

                                        <div class="widget-user-details view_us">
                                            <div class="tiles-body">
                                                <div class="card_box_opt">
                                                    <div class="tiles-title text-uppercase card-text-heading">Secondary Skill</div>
                                                    <div class="skills_list">
                                                        <span><?php echo e($employee->service_name); ?></span>
                                                    </div>
                                                </div>

                                                <div class="card_loc">
                                                    <div class="tiles-title text-uppercase card-text-heading">Job Details</div>
                                                    <div class="job_st_details">
                                                        <div class="left_opt">
                                                            <div class="widget-stats">
                                                                <div class="wrapper transparent">
                                                                    <a href="">
                                                                        <span class="item-title">Total</span> <span class="item-count animate-number semi-bold" data-value="<?php echo e($employee->total_jobs->total_jobs); ?>" data-animation-duration="700"><?php echo e($employee->total_jobs->total_jobs); ?></span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="widget-stats ">
                                                                <div class="wrapper last">
                                                                    <a href="">
                                                                        <span class="item-title">Current Month Job</span> <span class="item-count animate-number semi-bold" data-value="<?php echo e($employee->currentmonth_jobs->currentmonth_jobs); ?>" data-animation-duration="700"><?php echo e($employee->currentmonth_jobs->currentmonth_jobs); ?></span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="right_opt">
                                                            <div class="title">Current Status</div>
                                                            <div class="st_opt"><a href="#"><?php echo e($employee->currentStatus); ?> </a></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php if(isset($employee->job) && !empty($employee->job)): ?>
                                                <div class="card_loc">
                                                    <div class="tiles-title text-uppercase card-text-heading">Current Job</div>
                                                        <div class="job_st_details">
                                                            <div class="left_opt">
                                                                <div class="title">Location</div>
                                                                <div class="st_opt"><?php echo e(substr($employee->job->address, 0, 10) . '...'); ?> </div>
                                                            </div>
                                                            <div class="right_opt">
                                                                <div class="title">Vehicle No.</div>
                                                                <?php if(isset($employee->job->vehicle_no) && !empty($employee->job->vehicle_no)): ?>
                                                                <div class="st_opt"><?php echo e($employee->job->vehicle_no); ?> </div>
                                                                <?php else: ?>
                                                                <div class="st_opt">Not Assign </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                <div class="card_loc">
                                                    <div class="tiles-title text-uppercase card-text-heading">Current Job</div>
                                                        <div class="job_st_details">
                                                            <div class="left_opt">
                                                                <div class="title">Location</div>
                                                                <div class="st_opt">Not Assign </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="widget-action-block">
                                                <a href="<?php echo e(url('admin/employees/employeeProfile',$employee->id)); ?>" class="hashtags transparent">Personal Info</a>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>

                                <?php if(isset($employee->alljobs) && !empty($employee->alljobs)): ?>
                                <div class="col-xl-9 col-md-9 order_history_box_main">
                                    <div class="box-body boxDetailsHeadings">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="headSec ">
                                                    <h3 class="profile-username text-capitalize pull-left">Job Status - 
                                                    <?php if($employee->alljobs->status == 0): ?>
                                                    <span class="complete">Requested</span>
                                                    <?php elseif($employee->alljobs->status == 1): ?>
                                                    <span class="complete">Scheduled</span>
                                                    <?php elseif($employee->alljobs->status == 2): ?>
                                                    <span class="complete">Proposed</span>
                                                    <?php elseif($employee->alljobs->status == 3): ?>
                                                    <span class="complete">Accepted</span>
                                                    <?php elseif($employee->alljobs->status == 4): ?>
                                                    <span class="complete">In Process</span>
                                                    <?php elseif($employee->alljobs->status == 5): ?>
                                                    <span class="complete">Completed</span>
                                                    <?php elseif($employee->alljobs->status == 6): ?>
                                                    <span class="complete">Rejected</span>
                                                    <?php else: ?>

                                                    <?php endif; ?>
                                                    </h3>
                                                    <h4 class="jdHead pull-right">Final Cost -<span> $ 1000/-</span></h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="order_history_box">
                                            <div class="row">   
                                                <div class="col-md-12">
                                                    <div class="dtl_order-hd">
                                                        <h5 class="pull-left">Customer Details</h5>
                                                    </div>
                                                </div>
                                            </div>   

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="order_history_box">
                                                        <div class="dtl_order-hd">
                                                            <h5 class="pull-left">Basic Information</h5>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 cst_dtl">
                                                                <div class="dtl_order_box_n">
                                                                    <div class="widget_user_list">
                                                                        <div class="jd_emp_name">
                                                                            <h4><?php echo e($employee->alljobs->firstname); ?> <span><?php echo e($employee->alljobs->lastname); ?></span></h4>
                                                                        </div>      
                                                                        <div class="widget_img_box">
                                                                            <?php if(isset($employee->alljobs->profile_pic) && !empty($employee->alljobs->profile_pic)): ?>
                                                                                <img src="<?php echo e(fileurlUser().$employee->alljobs->profile_pic); ?>" class="">
                                                                            <?php else: ?>
                                                                                <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="">
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <div class="widget-title">
                                                                            <!-- <h4>Hemraj <span>Anuragi</span></h4> -->
                                                                            <div class="bs_inf_jd">
                                                                                <h5>Mobile : <?php echo e($employee->alljobs->mobile); ?></h5>
                                                                                <p>Email-id : <?php echo e($employee->alljobs->email); ?></p>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-sm-12">
                                                                <div class="dtl_cst">
                                                                    <div class="form-group">
                                                                        <h5>Mobile Number</h5>
                                                                        <p>9988774411</p>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <h5>Email Id</h5>
                                                                        <p>hemraj@gmail.com</p>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="order_history_box">
                                                        <div class="dtl_order-hd">
                                                            <h5 class="pull-left">Queries</h5>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12"> 
                                                                <div class="queries_cst" id="style-1">
                                                                    <ul class="force-overflow">
                                                                    <?php if(isset($employee->alljobs->jobServices[0]) && !empty($employee->alljobs->jobServices[0])): ?>
                                                                    <?php $__currentLoopData = $employee->alljobs->jobServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li>
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <div class="dtl_cst">
                                                                                        <h5>Query Title</h5>
                                                                                        <p><?php echo e($services->service_name); ?></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <div class="dtl_cst">
                                                                                        <h5>Cost</h5>
                                                                                        <p>$ 500/-</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <div class="dtl_cst">
                                                                                        <h5>Query Date</h5>
                                                                                        <p><?php echo e(date("d/m/Y", strtotime($services->created_at))); ?></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>    
                                                                            <div class="row">
                                                                                <div class="col-sm-8">
                                                                                    <div class="dtl_cst">
                                                                                        <h5>Description</h5>
                                                                                        <p><?php echo e($services->specify_problem); ?></p>
                                                                                        <p><?php echo e($services->additional_notes); ?></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <div class="dtl_cst">
                                                                                        <h5>Status</h5>
                                                                                        <?php if($employee->alljobs->status == 0): ?>
                                                                                        <p>Requested</p>
                                                                                        <?php elseif($employee->alljobs->status == 1): ?>
                                                                                        <p>Scheduled</p>
                                                                                        <?php elseif($employee->alljobs->status == 2): ?>
                                                                                        <p>Proposed</p>
                                                                                        <?php elseif($employee->alljobs->status == 3): ?>
                                                                                        <p>Accepted</p>
                                                                                        <?php elseif($employee->alljobs->status == 4): ?>
                                                                                        <p>In Process</p>
                                                                                        <?php elseif($employee->alljobs->status == 5): ?>
                                                                                        <p>Completed</p>
                                                                                        <?php elseif($employee->alljobs->status == 6): ?>
                                                                                        <p>Rejected</p>
                                                                                        <?php else: ?>

                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                    </ul>
                                                                </div>
                                                            </div>         
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="order_history_box">
                                            <div class="row">   
                                                <div class="col-md-12">
                                                    <div class="dtl_order-hd">
                                                        <h5 class="pull-left">Surveyor Details</h5>
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="serveor_dt" id="style-1" >
                                                        <div class="force-overflow">
                                                        <?php if(isset($employee->alljobs->surveyerdetail) && !empty($employee->alljobs->surveyerdetail)): ?>
                                                            <div class="order_history_box">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="dtl_order-hd">
                                                                            <h5 class="">Survey - <span>1</span></h5>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="widget_img_box">
                                                                            <?php if(isset($employee->alljobs->emp_profile) && !empty($employee->alljobs->emp_profile)): ?>
                                                                                <img src="<?php echo e(fileurlemp().$employee->alljobs->emp_profile); ?>" class="">
                                                                            <?php else: ?>
                                                                                <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="">
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <h5>Name</h5>
                                                                        <p><?php echo e($employee->alljobs->surveyerdetail->employee_name); ?></p>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <h5>Survey Date</h5>
                                                                        <p><?php echo e($employee->alljobs->surveyerdetail->servey_date); ?></p>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <h5>Status</h5>
                                                                        <?php if(isset($employee->alljobs->reportservice[0]) && !empty($employee->alljobs->reportservice[0])): ?>
                                                                        <p>Complete</p>
                                                                        <?php else: ?>
                                                                        <p>Pending</p>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div> 
                                                                <?php if(isset($employee->alljobs->reportservice[0]) && !empty($employee->alljobs->reportservice[0])): ?>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h5 style="margin-bottom:10px;">Footage</h5>
                                                                    </div>
                                                                    <?php $__currentLoopData = $employee->alljobs->reportservice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="col-md-4">
                                                                            <div class="ser_footage">
                                                                            <?php if(isset($report->service_img) && !empty($report->service_img)): ?>
                                                                                <img src="<?php echo e(fileurlReport().$report->service_img); ?>" class="img-responsive" />
                                                                            
                                                                            <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                                <?php else: ?>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h5 style="margin-bottom:10px;">Footage</h5>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="ser_footage">
                                                                            No Image Found!
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        </div>
                                                    </div>

                                                    
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="clearfix"></div>
                                    <?php if(isset($employee->vehicle_detail) && !empty($employee->vehicle_detail)): ?>
                                        <div class="order_history_box">
                                            <div class="row">   
                                                <div class="col-md-12">
                                                    <div class="dtl_order-hd">
                                                        <h5>Vehicle Information</h5>
                                                    </div>  

                                                    <div class="row dtl_order_box_n">
                                                        <div class="col-xl-3 col-md-3">
                                                            <div class="widget_user_list">
                                                                <div class="widget_img_box">
                                                                    <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="">
                                                                </div>
                                                                <div class="widget-title">
                                                                    <h4><?php echo e($employee->vehicle_detail->employee_name); ?> </h4>
                                                                    <h5>( Driver )</h5>
                                                                </div>
                                                            </div>        
                                                        </div>

                                                        <div class="col-xl-9 col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <h5>Driver Licence</h5>
                                                                    <p>cdsdjflsdj</p>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <h5>Vehicle Type</h5>
                                                                    <p><?php echo e($employee->vehicle_detail->vehicle_type); ?></p>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <h5>Plate Number</h5>
                                                                    <p><?php echo e($employee->vehicle_detail->vehicle_no); ?></p>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <h5>Vehicle Modal</h5>
                                                                    <p><?php echo e($employee->vehicle_detail->modal_no); ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    <?php else: ?> 
                                        <div class="order_history_box">
                                            <div class="row">   
                                                <div class="col-md-12">
                                                    <div class="dtl_order-hd">
                                                        <h5>Vehicle Information</h5>
                                                    </div> 
                                                    <div class="row dtl_order_box_n">
                                                        <div class="col-md-12 text-center">Vehicle Not Assign!</div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>                              
                                    <?php endif; ?>
                                        <div class="clearfix"></div>
                                    <?php if((isset($employee->alljobs->surveyerdetail) && !empty($employee->alljobs->surveyerdetail)) || (isset($employee->vehicle_detail) && !empty($employee->vehicle_detail)) || (isset($employee->team_member) && !empty($employee->team_member))): ?>
                                        <div class="order_history_box">
                                            <div class="row">   
                                                <div class="col-md-12">
                                                    <div class="dtl_order-hd">
                                                        <h5 class="pull-left">Team Members</h5>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="row">
                                                    <?php if(isset($employee->alljobs->surveyerdetail) && !empty($employee->alljobs->surveyerdetail)): ?>
                                                        <div class="col-md-3">
                                                            <div class="order_history_box">
                                                                <div class="team_members">
                                                                    <div class="widget_img_box">
                                                                    <?php if(isset($employee->alljobs->surveyerdetail->emp_profile) && !empty($employee->alljobs->surveyerdetail->emp_profile)): ?>
                                                                        <img src="<?php echo e(fileurlemp().$employee->alljobs->surveyerdetail->emp_profile); ?>" class="img-responsive">
                                                                    <?php else: ?>
                                                                        <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="img-responsive">
                                                                    <?php endif; ?>
                                                                    </div>
                                                                    <div class="widget-title">
                                                                        <h4><?php echo e($employee->alljobs->surveyerdetail->employee_name); ?></h4>
                                                                        <h5>( <?php echo e($employee->alljobs->surveyerdetail->emp_mobile); ?> )</h5>
                                                                        <p><?php echo e($employee->alljobs->surveyerdetail->emp_role); ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if(isset($employee->vehicle_detail) && !empty($employee->vehicle_detail)): ?>
                                                        <div class="col-md-3">
                                                            <div class="order_history_box">
                                                                <div class="team_members">
                                                                    <div class="widget_img_box">
                                                                    <?php if(isset($employee->vehicle_detail->emp_profile) && !empty($employee->vehicle_detail->emp_profile)): ?>
                                                                        <img src="<?php echo e(fileurlemp().$employee->vehicle_detail->emp_profile); ?>" class="img-responsive">
                                                                    <?php else: ?>
                                                                        <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="img-responsive">
                                                                    <?php endif; ?>
                                                                    </div>
                                                                    <div class="widget-title">
                                                                        <h4><?php echo e($employee->vehicle_detail->employee_name); ?></h4>
                                                                        <h5>( <?php echo e($employee->vehicle_detail->emp_mobile); ?> )</h5>
                                                                        <p><?php echo e($employee->vehicle_detail->emp_role); ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if(isset($employee->team_member) && !empty($employee->team_member)): ?>
                                                    <?php $__currentLoopData = $employee->team_member; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="col-md-3">
                                                            <div class="order_history_box">
                                                                <div class="team_members">
                                                                    <div class="widget_img_box">
                                                                    <?php if(isset($team->emp_profile) && !empty($team->emp_profile)): ?>
                                                                        <img src="<?php echo e(fileurlemp().$team->emp_profile); ?>" class="img-responsive">
                                                                    <?php else: ?>
                                                                        <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="img-responsive">
                                                                    <?php endif; ?>
                                                                    </div>
                                                                    <div class="widget-title">
                                                                        <h4><?php echo e($team->employee_name); ?></h4>
                                                                        <h5>( <?php echo e($team->emp_mobile); ?> )</h5>
                                                                        <p><?php echo e($team->emp_role); ?></p>
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
                                    <?php endif; ?>
                                        <div class="clearfix"> </div>

                                        <!-- <div class="order_history_box">
                                            <div class="row">   
                                                <div class="col-md-12">
                                                    <div class="dtl_order-hd">
                                                        <h5 class="pull-left">Inventories</h5>
                                                        <h5 class="pull-right job_sts">Order No - #15424</h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="invt_list_clock" id="style-1">
                                                        <div class="force-overflow">
                                                            <div class="list_emp_dt">
                                                                <ul>
                                                                    <li>
                                                                        <div class="row">
                                                                            <div class="col-md-4 col-sm-4">
                                                                                <div class="order_history_box">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="int_dt">
                                                                                                <div class="img_intv">
                                                                                                    <img  src="<?php echo e(asset('public/img/hamber.jpg')); ?>" class="img-responsive" />
                                                                                                </div> 
                                                                                                <h4 class="text-center"> HAMBER </h4>
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-6 col-xs-6">
                                                                                                        <h5>Inventory Type</h5>
                                                                                                        <p>Plastic</p>
                                                                                                    </div>
                                                                                                    <div class="col-sm-6 col-xs-6">
                                                                                                        <h5>Quantity</h5>
                                                                                                        <p>50</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>    
                                                                            </div>

                                                                            <div class="col-md-8 col-sm-8">
                                                                                <div class="order_history_box">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="dtl_order-hd">
                                                                                                <h5>Issue Inventories</h5>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-md-4">
                                                                                                    <h5>Counter No.</h5>
                                                                                                    <p>5</p>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <h5>Provider Name</h5>
                                                                                                    <p>Prem</p>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <h5>Receiver Name</h5>
                                                                                                    <p>Nishikant</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <div class="dtl_order-hd">
                                                                                                <h5>Return Inventories</h5>
                                                                                            </div> 
                                                                                            <div class="row">
                                                                                                <div class="col-md-4">
                                                                                                    <h5>Counter No.</h5>
                                                                                                    <p>5</p>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <h5>Provider Name</h5>
                                                                                                    <p>Prem</p>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <h5>Receiver Name</h5>
                                                                                                    <p>Nishikant</p>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <h5>Quantity</h5>
                                                                                                    <p>15</p>
                                                                                                </div>
                                                                                            </div>   
                                                                                        </div>
                                                                                    </div>
                                                                                </div>            
                                                                            </div>
                                                                        </div>
                                                                    </li>

                                                                    <li>
                                                                        <div class="row">
                                                                            <div class="col-md-4 col-sm-4">
                                                                                <div class="order_history_box">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="int_dt">
                                                                                                <div class="img_intv">
                                                                                                    <img  src="<?php echo e(asset('public/img/hamber.jpg')); ?>" class="img-responsive" />
                                                                                                </div> 
                                                                                                <h4 class="text-center"> HAMBER </h4>
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-6 col-xs-6">
                                                                                                        <h5>Inventory Type</h5>
                                                                                                        <p>Plastic</p>
                                                                                                    </div>
                                                                                                    <div class="col-sm-6 col-xs-6">
                                                                                                        <h5>Quantity</h5>
                                                                                                        <p>50</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>    
                                                                            </div>
                                                                            
                                                                            <div class="col-md-8 col-sm-8">
                                                                                <div class="order_history_box">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="dtl_order-hd">
                                                                                                <h5>Issue Inventories</h5>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-md-4">
                                                                                                    <h5>Counter No.</h5>
                                                                                                    <p>5</p>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <h5>Provider Name</h5>
                                                                                                    <p>Prem</p>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <h5>Receiver Name</h5>
                                                                                                    <p>Nishikant</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <div class="dtl_order-hd">
                                                                                                <h5>Return Inventories</h5>
                                                                                            </div> 
                                                                                            <div class="row">
                                                                                                <div class="col-md-4">
                                                                                                    <h5>Counter No.</h5>
                                                                                                    <p>5</p>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <h5>Provider Name</h5>
                                                                                                    <p>Prem</p>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <h5>Receiver Name</h5>
                                                                                                    <p>Nishikant</p>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <h5>Quantity</h5>
                                                                                                    <p>15</p>
                                                                                                </div>
                                                                                            </div>   
                                                                                        </div>
                                                                                    </div>
                                                                                </div>            
                                                                            </div>
                                                                        </div>
                                                                    </li>

                                                                    <li>
                                                                        <div class="row">
                                                                            <div class="col-md-4 col-sm-4">
                                                                                <div class="order_history_box">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="int_dt">
                                                                                                <div class="img_intv">
                                                                                                    <img  src="<?php echo e(asset('public/img/hamber.jpg')); ?>" class="img-responsive" />
                                                                                                </div> 
                                                                                                <h4 class="text-center"> HAMBER </h4>
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-6 col-xs-6">
                                                                                                        <h5>Inventory Type</h5>
                                                                                                        <p>Plastic</p>
                                                                                                    </div>
                                                                                                    <div class="col-sm-6 col-xs-6">
                                                                                                        <h5>Quantity</h5>
                                                                                                        <p>50</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>    
                                                                            </div>
                                                                            
                                                                            <div class="col-md-8 col-sm-8">
                                                                                <div class="order_history_box">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="dtl_order-hd">
                                                                                                <h5>Issue Inventories</h5>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-md-4">
                                                                                                    <h5>Counter No.</h5>
                                                                                                    <p>5</p>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <h5>Provider Name</h5>
                                                                                                    <p>Prem</p>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <h5>Receiver Name</h5>
                                                                                                    <p>Nishikant</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <div class="dtl_order-hd">
                                                                                                <h5>Return Inventories</h5>
                                                                                            </div> 
                                                                                            <div class="row">
                                                                                                <div class="col-md-4">
                                                                                                    <h5>Counter No.</h5>
                                                                                                    <p>5</p>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <h5>Provider Name</h5>
                                                                                                    <p>Prem</p>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <h5>Receiver Name</h5>
                                                                                                    <p>Nishikant</p>
                                                                                                </div>
                                                                                                <div class="col-md-4">
                                                                                                    <h5>Quantity</h5>
                                                                                                    <p>15</p>
                                                                                                </div>
                                                                                            </div>   
                                                                                        </div>
                                                                                    </div>
                                                                                </div>            
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                                            </div>
                                        </div> -->
                                        
                                    </div>    
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            <?php endif; ?>                  
        </div>    

        <!-----------------modal start------------>
        <div class="modal fade videoModalMainDiv videoModal" id="videoModal1" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="closeBtnMain">
                <button type="button" class="close closeBtnN" data-dismiss="modal" onclick="closedestroy()" aria-label="Close">
                    <span aria-hidden="true"><img src="<?php echo e(asset('public/img/closebtn.png')); ?>"  /></span>
                </button>
            </div>
            <div class="modal-dialog largeModalDiv">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="videoModalDiv" >
                            <div id="player"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.emp_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>