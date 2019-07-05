

<?php $__env->startSection('content'); ?>
<div class="content">
    <ul class="breadcrumb">
        <li>
            <p>YOU ARE HERE</p>
        </li>
        <li><a href="#" class="active">In Negotiation Jobs</a> </li>
    </ul>

    <div class="page-title"> 
        <div class="row">
            <div class="col-md-6">
                <i class="icon-custom-left"></i>
                <h3>In Negotiation Jobs<span class="semi-bold">&nbsp;</span></h3>
            </div>
            <!-- <div class="col-md-6">
                <a href="#" class="btn btn-success btn-cons pull-right">Job Report</a>
            </div> -->
        </div>
        
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="content-box-main">
                <div id='calendar'></div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="content-box-main">
                <div class="header_main_div_sec">
                    <div class="title">
                        <h5>Date : <span id="requestedJObsDtae"><?php echo e(date('d-m-Y')); ?></span> 
                        <span class="pull-right" id="requestedJObOrder">Total Orders : 4</span>
                        </h5>
                    </div>       
                </div>
                <div class="row" id="requestedJObsDt">
                <?php if(isset($alljobs[0]) && !empty($alljobs[0])): ?>
                <?php $__currentLoopData = $alljobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-12">
                        <div class="order_history_box req_sr_box_main">
                            <div class="row">
                                <div class="col-sm-4 jd_list_cust_img_box">
                                    <div class="order_history_box">
                                        <div class="job_desc_box_list">
                                            <div class="title">
                                                <h5>Job No. <span class="pull-right srv_name"><?php echo e($jobs['id']); ?></span></h5>
                                            </div>       
                                        </div>
                                        <div class="widget_user_list req_sr_card">
                                            <div class="widget_img_box">
                                                <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="">
                                            </div>
                                            <div class="bs_inf_jd">
                                                <h5 class="text-center"> <?php echo e($jobs['firstname']); ?> <?php echo e($jobs['lastname']); ?></h5>
                                                <p><i class="fa fa-phone"> <?php echo e($jobs['mobile']); ?></i></p>
                                            </div>
                                            
                                            <div class="job_desc_box_list">
                                                <div class="row">
                                                    <div class="col-sm-12 col-xs-12">
                                                        <h5 class="textHead">Location</h5>
                                                        <p><?php echo e($jobs['address']); ?></p>
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
                                <?php if(isset($jobs['group']) && !empty($jobs['group'])): ?>
                                    <div class="sub_ser_box_list">
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <h6 class="textHead mar_bot nm_srv bold text-black">Team Leader</h6>
                                                </div>
                                                <div class="col-md-2 col-sm-2">
                                                    <div class="profile-img-wrapper pull-left m-l-10">
                                                        <div class=" p-r-10">
                                                        <?php if(isset($jobs['group']->teamleader_image) && !empty($jobs['group']->teamleader_image)): ?>
                                                            <img src="<?php echo e(fileurlemp().$jobs['group']->teamleader_image); ?>" alt="" data-src="<?php echo e(asset('public/img/profiles/avatar_small.jpg')); ?>" > 
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('public/img/profiles/avatar_small.jpg')); ?>" alt="" data-src="<?php echo e(asset('public/img/profiles/avatar_small.jpg')); ?>" > 
                                                        <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div style="line-height: 9px;padding-top:5px;" class="user-name text-black bold large-text"> <?php echo e($jobs['group']->teamleader); ?> </div>
                                                    <div><span class="bold"><?php echo e($jobs['group']->teamleader_mob); ?></span></div>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <div style="line-height: 9px;padding-top:5px;" class="user-name text-black bold large-text">Product Handover Status</div>
                                                    <div><span class="bold pending">Not Issued</span></div>
                                                </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="table-responsive">
                                                    <table class="table tb-ped sr_dt_tbl">
                                                        <thead>
                                                            <tr>
                                                                <th>Day Slot</th>
                                                                <th>Order Start Time</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo e($jobs['slot_name']); ?></td>
                                                                <td><?php echo e($jobs['slotstart_time']); ?></td>                                                                              
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="sub_ser_box_list">
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <h6 class="textHead mar_bot nm_srv bold text-black">Team Leader</h6>
                                                </div>
                                                <div class="col-md-2 col-sm-2">
                                                    <div class="profile-img-wrapper pull-left m-l-10">
                                                        <div class=" p-r-10">
                                                        <?php if(isset($jobs['group->empIMG']) && !empty($jobs['group->empIMG'])): ?>
                                                            <img src="<?php echo e(fileurlemp().$jobs['group']->empIMG); ?>" alt="" data-src="<?php echo e(asset('public/img/profiles/avatar_small.jpg')); ?>" > 
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('public/img/profiles/avatar_small.jpg')); ?>" alt="" data-src="<?php echo e(asset('public/img/profiles/avatar_small.jpg')); ?>" > 
                                                        <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div style="line-height: 9px;padding-top:5px;" class="user-name text-black bold large-text"> <?php echo e($jobs['group']->empName); ?> </div>
                                                    <div><span class="bold"><?php echo e($jobs['group']->empMobile); ?></span></div>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <div style="line-height: 9px;padding-top:5px;" class="user-name text-black bold large-text">Product Handover Status</div>
                                                    <div><span class="bold pending">Not Issued</span></div>
                                                </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="table-responsive">
                                                    <table class="table tb-ped sr_dt_tbl">
                                                        <thead>
                                                            <tr>
                                                                
                                                                <th>Day Slot</th>
                                                                <th>Order Start Time</th>
                                                                
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr>
                                                                
                                                                <td><?php echo e($jobs['slot_name']); ?></td>
                                                                <td><?php echo e($jobs['slotstart_time']); ?></td>                                                                              
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(isset($jobs['services'][0]) && !empty($jobs['services'][0])): ?>
                                    <div class="job_desc_box_list">
                                        <div class="sub_ser_box_list">
                                            <div class="title_new">
                                                <h5>Services 
                                                    <span class="pending"><?php echo e(ucwords($jobs['service_type'])); ?> Service</span>
                                                </h5>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="jd_desc_blk" id="style-1">
                                                        <div class="force-overflow">
                                                        <?php $__currentLoopData = $jobs['services']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="card_main_srv_lst">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h5 class="textHead mar_bot nm_srv">Service Name : <span class="srv_name"><?php echo e($serv->service_name); ?></span></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h5 class="textHead">Sub Services</h5>
                                                                        <div class="list_sub_srv">
                                                                            <div class="problemText">
                                                                                <div class="pblIcon"><i class="fa fa-question-circle"></i></div>
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                </div>
                            </div>
                            <?php 
                            $admin = \Auth::user()->hasRole('admin');
                            $team = \Auth::user()->hasRole('Service Team');
                            
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="<?php echo e(url('/admin/newjobs/'.$jobs['id'].'/reports')); ?>" class="btn btn-success btn-cons pull-right">Job Report</a>
                                        <!-- <a href="#" class="btn btn-primary btn-cons pull-right">View Order</a> -->
                                
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.service_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>