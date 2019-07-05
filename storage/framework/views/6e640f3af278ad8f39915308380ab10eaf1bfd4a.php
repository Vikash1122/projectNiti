

    <?php $__env->startSection('content'); ?>
       
        <div class="content">
            <div class="page-title"> 
                <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
                    <img src="<?php echo e(asset ('public/img/go_back.png')); ?>" class="img-responsive">
                </a>
                <h3>Alloted Orders</h3>
                <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>View Orders Details</h3></div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="content-box-main">
                        <div class="header_main_div_sec">
                            <div class="title">
                                <h5>Job No :<span class="text-green"><?php echo e($job->id); ?></span></h5>
                            </div>       
                        </div>

                        <div class="row job_desc_box_list">
                            <div class="col-md-3">
                                <div class="widget_user_list req_sr_card">
                                    <div class="widget_img_box">
                                    <?php if(isset($job->profile_pic) && !empty($job->profile_pic)): ?>
                                        <img src="<?php echo e(fileurlUser().$job->profile_pic); ?>" class="">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('public/img/defaultCustomer.png')); ?>" class="">
                                    <?php endif; ?>
                                    </div>
                                </div>  
                            </div>

                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5 class="textHead">Customer Name</h5>
                                        <p><?php echo e($job->firstname); ?> <?php echo e($job->lastname); ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="textHead">Mobile No</h5>
                                        <p><?php echo e($job->mobile); ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="textHead">AMC holder</h5>
                                        <p>AMC No. <?php echo e($job->amc_id); ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="textHead">Service Type</h5>
                                        <p><?php echo e($job->service_type); ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="textHead">Job Date</h5>
                                        <p><?php echo e($job->job_date); ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="textHead">Estimated Start Time</h5>
                                        <p><?php echo e($job->slotstart_time); ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="textHead">Job Duration</h5>
                                        <p>45 minutes</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="textHead">Job Status</h5>
                                        <?php if($job->status == 3): ?>
                                            <p class="text-orange">Requested</p>
                                        <?php elseif($job->status == 4): ?>
                                            <p class="text-green">Service Team Alloted</p>
                                        <?php elseif($job->status == 5): ?>
                                            <p class="text-light-blue">In Process</p>
                                        <?php elseif($job->status == 6): ?>
                                            <p class="text-green-light">Proposed</p>
                                        <?php elseif($job->status == 7): ?>
                                            <p class="text-green">Payment Done</p>
                                        <?php elseif($job->status == 8): ?>
                                            <p class="">Completed</p>
                                        <?php elseif($job->status == 9): ?>
                                            <p class="text-brown">Rejected</p>
                                        <?php endif; ?>
                                    </div>

                                    <div class="col-md-3">
                                        <h5 class="textHead">Services</h5>
                                        <p><?php echo e($job->service); ?></p>
                                    </div>

                                    <div class="col-md-3">
                                        <h5 class="textHead">Team Name</h5>
                                        <p><?php echo e($job->group_name); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="textHead">Location</h5>
                                <div style="padding: 10px;border: 5px solid #e1e1e1;">
                                    <div class="mapouter">
                                        <div class="gmap_canvas">
                                            <iframe width="100%" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo e($job->address); ?>&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                        </div>
                                        <style>.mapouter{text-align:right;height:300px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:300px;width:100%;}</style>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="header_main_div_sec marginTop40">
                            <div class="title">
                                <h5>Team Members</h5>
                            </div>       
                        </div>

                        <div class="row">
                        <?php if(isset($job->teamMember[0]) && !empty($job->teamMember[0])): ?>
                        <?php $__currentLoopData = $job->teamMember; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3">
                                <div class="order_history_box">
                                    <div class="team_members team_members-ng">
                                        <div class="widget_img_box">
                                        <?php if(isset($team->emp_profile) && !empty($team->emp_profile)): ?>
                                            <img src="<?php echo e(fileurlemp().$team->emp_profile); ?>" class="img-responsive">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('public/img/defaultCustomer.png')); ?>" class="img-responsive">
                                        <?php endif; ?>
                                        </div>
                                        <div class="widget-title">
                                            <h4><?php echo e($team->employee_name); ?></h4>
                                            <h5>( <?php echo e($team->emp_mobile); ?> )</h5>
                                            <p class="text-green"><?php echo e($team->emp_role); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <div class="col-md-12">
                            <div class="order_history_box">
                                <h4 class="text-center">Team Not Assign</h4>
                            </div>
                        </div>
                        <?php endif; ?>
                        </div>

                        <div class="row">
                            <div class="col-md-12 marginTop40">
                                <div class="header_main_div_sec">
                                    <div class="title">
                                        <h5>Services</h5>
                                    </div>       
                                </div>
                            </div> 

                            <div class="col-md-12 viewOrderDetail-ng">
                                <div class="jd_desc_blk" id="style-1">
                                    <div class="force-overflow">
                                    <?php if(isset($job->services[0]) && !empty($job->services[0])): ?>
                                    <?php $__currentLoopData = $job->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="card_main_srv_lst">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5 class="textHead mar_bot nm_srv">Service Name : <span class="srv_name"><?php echo e($servc->service_name); ?></span></h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="listSubSr">
                                                        <h5 class="textHead">Sub Services</h5>
                                                        <div class="list_sub_srv">
                                                            <div class="problemText">
                                                                <div class="pblIcon">
                                                                    <i class="fa fa-question-circle"></i>
                                                                </div>
                                                                <div class="pblTxt"><?php echo e($servc->jobServices->specify_problem); ?></div>
                                                            </div>
                                                            <div class="additionalText">
                                                                <div class="adtIcon">
                                                                    <i class="fa fa-info-circle"></i>
                                                                </div>
                                                                <div class="adtTxt"><?php echo e($servc->jobServices->additional_notes); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <div class="card_main_srv_lst">
                                            <h4 class="text-center">No Record Found!</h4>
                                        </div>
                                    <?php endif; ?>
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

    <?php $__env->stopSection(); ?>        
<?php echo $__env->make('admin.layouts.test_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>