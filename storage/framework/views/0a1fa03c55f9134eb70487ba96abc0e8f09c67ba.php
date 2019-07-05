

<?php $__env->startSection('content'); ?>
<div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">All Survey</a> </li>
                </ul>

                <div class="page-title"> <i class="icon-custom-left"></i>
                    <h3>All Survey  <span class="semi-bold">&nbsp;</span></h3>
                </div>

                <div class="content-box-main">
                    <div class="job_list_section_block" id="style-1">
                        <div class="force-overflow">
                            <div class="row">
                                <div id="exTab1">   
                                <ul class="nav nav-pills">
                                    <li class="active">
                                    <a href="#1a" data-toggle="tab">All Serveys</a>
                                    </li>
                                    <li>
                                    <a href="#2a" id="statusSurveys" data-status_id="1" data-toggle="tab">In Negotiations</a>
                                    </li>
                                    <li>
                                    <a href="#3a" id="statusSurveys1" data-status_id="2" data-toggle="tab">Cancelled </a>
                                    </li>
                                    <li>
                                    <a href="#4a" id="statusSurveys2"  data-status_id="6" data-toggle="tab">Rejected</a>
                                    </li>
                                </ul>

                                <div class="tab-content clearfix">
                                    <div class="tab-pane active" id="1a">
                                        <div class="row">
                                        <?php if(isset($jobs[0]) && !empty($jobs[0])): ?>
                                        <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <div class="order_history_box req_sr_box_main">
                                                    <div class="row">
                                                        <div class="col-sm-4 jd_list_cust_img_box">
                                                            <div class="order_history_box">
                                                                <div class="job_desc_box_list">
                                                                    <div class="title">
                                                                        <h5>Job No. <span class="pull-right srv_name"><?php echo e($jb->id); ?></span></h5>
                                                                    </div>       
                                                                </div>
                                                                <div class="widget_user_list req_sr_card">
                                                                    <div class="widget_img_box">
                                                                    <?php if(isset($jb->profile_pic) && !empty($jb->profile_pic)): ?>
                                                                        <img src="<?php echo e(fileurlUser().$jb->profile_pic); ?>" class="">
                                                                    <?php else: ?>
                                                                        <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="">
                                                                    <?php endif; ?>
                                                                    </div>
                                                                    <div class="bs_inf_jd">
                                                                        <h5 class="text-center"> <?php echo e($jb->firstname); ?> <?php echo e($jb->lastname); ?></h5>
                                                                        <p><i class="fa fa-phone"> <?php echo e($jb->mobile); ?></i></p>
                                                                    </div>
                                                                    
                                                                    <div class="job_desc_box_list">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-xs-12">
                                                                                <h5 class="textHead">Location</h5>
                                                                                <p><?php echo e(substr($jb->address, 0, 38) . '...'); ?></p>
                                                                            </div>

                                                                            <div class="col-sm-12 col-xs-12">
                                                                                <h5 class="textHead">Distance <span class="pull-right req_sr_card_dis">25 KM</span> </h5>
                                                                            </div>
                                                                        </div>    
                                                                    </div>
                                                                </div>  
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-8 req_sr_card_dt_panel">
                                                        <?php if(isset($jb->surveyerdetail) && !empty($jb->surveyerdetail)): ?>
                                                            <div class="sub_ser_box_list">
                                                            
                                                                <div class="row">
                                                                    <!-- <a href="view_emp_details.php"> -->
                                                                        <div class="col-md-12">
                                                                            <h6 class="textHead mar_bot nm_srv bold text-black">Surveyor</h6>
                                                                        </div>
                                                                        <div class="col-md-2 col-sm-2">
                                                                            <div class="profile-img-wrapper pull-left m-l-10">
                                                                                <div class=" p-r-10">
                                                                                <?php if(isset($jb->surveyerdetail->emp_profile) && !empty($jb->surveyerdetail->emp_profile)): ?>
                                                                                <img src="<?php echo e(fileurlemp().$jb->surveyerdetail->emp_profile); ?>" alt="" data-src="<?php echo e(fileurlemp().$jb->surveyerdetail->emp_profile); ?>" >
                                                                                <?php else: ?>
                                                                                    <img src="<?php echo e(asset('public/img/profiles/avatar_small.jpg')); ?>" alt="" data-src="<?php echo e(asset('public/img/profiles/avatar_small.jpg')); ?>" >
                                                                                <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-10 col-sm-10">
                                                                            <div style="line-height: 9px;padding-top:5px;" class="user-name text-black bold large-text"> <?php echo e($jb->surveyerdetail->employee_name); ?> </div>
                                                                            <div><span class="bold"><?php echo e($jb->surveyerdetail->emp_mobile); ?></span></div>
                                                                        </div>
                                                                    <!-- </a> -->
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="table-responsive">
                                                                            <table class="table tb-ped sr_dt_tbl">
                                                                                <thead>
                                                                                    <tr>
                                                                                        
                                                                                        <th>Survey Date</th>
                                                                                        <th>Estimate time</th>
                                                                                        <th>Status</th>
                                                                                    </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                    <tr>
                                                                                        
                                                                                        <td><?php echo e(date("F d, Y", strtotime($jb->surveyerdetail->servey_date))); ?></td>
                                                                                        <?php if($jb->status == 1): ?>
                                                                                        <td>Nill</td>       
                                                                                        <?php endif; ?>                                                                     
                                                                                        <td class="text-bold text-green">
                                                                                            <?php if($jb->status == 0): ?>
                                                                                                Requested
                                                                                            <?php elseif($jb->status == 1): ?>
                                                                                                Scheduled
                                                                                            <?php elseif($jb->status == 2): ?>
                                                                                                Proposed
                                                                                            <?php elseif($jb->status == 3): ?>
                                                                                                Accepted
                                                                                            <?php elseif($jb->status == 4): ?>
                                                                                                In Process
                                                                                            <?php elseif($jb->status == 5): ?>
                                                                                                Completed
                                                                                            <?php elseif($jb->status == 6): ?>
                                                                                                Rejected
                                                                                            <?php else: ?>

                                                                                            <?php endif; ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            
                                                            </div>
                                                        <?php endif; ?>
                                                            <div class="job_desc_box_list">
                                                                <div class="sub_ser_box_list">
                                                                    <div class="title_new">
                                                                        <h5>Services 
                                                                            <span class="pending"><?php echo e(ucwords($jb->service_type)); ?> Service</span>
                                                                        </h5>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="jd_desc_blk" id="style-1">
                                                                                <div class="force-overflow">
                                                                                <?php if(isset($jb->services[0]) && !empty($jb->services[0])): ?>
                                                                                <?php $__currentLoopData = $jb->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <div class="card_main_srv_lst">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <h5 class="textHead mar_bot nm_srv">Service Name : <span class="srv_name"><?php echo e($serv->service_name); ?></span></h5>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <h5 class="textHead theadBorder">Job Services Details</h5>
                                                                                                <div class="list_sub_srv">
                                                                                                <div class="problemText">
                                                                                                    <div class="pblIcon">
                                                                                                            <i class="fa fa-question-circle"></i></div>
                                                                                                            <div class="pblTxt"><?php echo e($serv->jobServices->specify_problem); ?></div>
                                                                                                    </div>

                                                                                                    <div class="additionalText">
                                                                                                        <div class="adtIcon"><i class="fa fa-info-circle"></i></div>
                                                                                                        <div class="adtTxt"><?php echo e($serv->jobServices->additional_notes); ?></div>
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

                                                                <!-- <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <button type="button" class="hashtags asign_job_btn" data-toggle="modal" data-target=".allotJob">Allot</button>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="footer_bx">
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <div class="job_desc_box_list">
                                                                            <h5>Total Estimated Price <span class="pull-right">40.00 AED</span></h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-7 text-right">
                                                                        <a href="<?php echo e(route('detail.view')); ?>" class="hashtags asign_job_btn tp_mar_4">View</a>
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

                                    <div class="tab-pane" id="2a">
                                        <div class="row" id="proposedDataSurv">
                                             
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="3a">
                                        <div class="row" id="proposedDataSurv1">
                                            
                                        </div>    
                                    </div>

                                    <div class="tab-pane " id="4a">
                                        <div class="row" id="proposedDataSurv2">
                                            
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