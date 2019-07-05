    <?php $__env->startSection('content'); ?>
        <style>
            @font-face {
            font-family: 'Nexa Bold';
            src: url('../../public/fonts/Nexa Bold.otf');
            }
            body{
                font-family: 'Nexa Bold';
            }
            h1,h2,h3,h4,h5,h6{
                font-family: 'Nexa Bold';
            }
            input, button, select, textarea{
                font-family: 'Nexa Bold';
            }  
            .page-content .breadcrumb{
                font-family: 'Nexa Bold';
            }
            .page-sidebar{
                font-family: 'Nexa Bold';
            }
            .btn{
                font-family: 'Nexa Bold';
            }

            .req_sr_card_dt_panel .jd_desc_blk {
                min-height: 120px;
            }
            .text-red{
                color: #F44336 !important;
            }
            .text-green{
                color: green !important;
            }
            .text-orange{
                color:#ffa72a !important;
            }
            .listSubSr{
                padding-left:10px;
                padding-right:10px;
            }
            .amc_inf{
               line-height:1.5 !important;
            }
        </style>

        <div class="content">
            <div class="page-title"> 
                <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
                    <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
                </a>
                <h3>Approved Orders  <span class="semi-bold">&nbsp;</span></h3>

            </div>

            <?php if(Session::has('message')): ?> 
                <div class="alert alert-info">
                    <?php echo e(Session::get('message')); ?> 
                </div> 
            <?php endif; ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="content-box-main">
                        <div class="row">
                            <div class="col-md-offset-4 col-md-4">
                                <div class="content-box-main">
                                    <div id='mycalendar2'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="content-box-main">
                        <div class="header_main_div_sec">
                            <div class="title">
                                <h5>Date : <span id="jobdt23"><?php echo e(date('d-m-Y')); ?></span> 
                                <span class="pull-right" id="totalapproved1">Total Orders : <?php echo e(count($orders)); ?></span>
                                </h5>
                            </div>       
                        </div>
<?php //prd($orders->toArray());?>
                        <div class="row" id="approvedJObsdata1">
                            <?php if(isset($orders[0]) && !empty($orders[0])): ?>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $odr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-12">
                                    <div class="orderBox_ng">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h4>Job No. <?php echo e($odr->id); ?></h4>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="odrInner">
                                                            <div class="labelText">Job Date</div>
                                                            <div class="labelValue"><?php echo e(date("d-m-Y", strtotime($odr->job_date))); ?></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="odrInner">
                                                            <div class="labelText">Customer Name</div>
                                                            <div class="labelValue"><?php echo e($odr->firstname); ?> <?php echo e($odr->lastname); ?></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="odrInner">
                                                            <div class="labelText">AMC Holder</div>
                                                            <div class="labelValue">AMC No.<?php echo e($odr->amc_id); ?></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="odrInner">
                                                            <div class="labelText">Location</div>
                                                            <div class="labelValue"><?php echo e($odr->address); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="odrInner">
                                                            <div class="labelText">Job Duration</div>
                                                            <div class="labelValue">45 minutes</div>
                                                        </div>
                                                        <div class="odrInner">
                                                            <div class="labelText">Estimated Start Time</div>
                                                            <div class="labelValue"><?php echo e($odr->slotstart_time); ?></div>
                                                        </div>
                                                        <div class="odrInner">
                                                            <div class="labelText">Job Status</div>
                                                            <?php if($odr->status == 3): ?>
                                                                <div class="text-orange">Requested</div>
                                                            <?php elseif($odr->status == 4): ?>
                                                                <div class="text-green">Service Team Alloted</div>
                                                            <?php elseif($odr->status == 5): ?>
                                                                <div class="text-light-blue">In Process</div>
                                                            <?php elseif($odr->status == 6): ?>
                                                                <div class="text-green-light">Proposed</div>
                                                            <?php elseif($odr->status == 7): ?>
                                                                <div class="text-megenta">Payment Done</div>
                                                            <?php elseif($odr->status == 8): ?>
                                                                <div class="">Completed</div>
                                                            <?php elseif($odr->status == 9): ?>
                                                                <div class="text-brown">Rejected</div>
                                                            <?php endif; ?>
                                                            
                                                        </div>
                                                    </div>

                                                    <?php if($odr->status == 4 || $odr->status == 5 || $odr->status == 6 || $odr->status == 7 || $odr->status == 8 || $odr->status == 9 ): ?>
                                                    <div class="col-sm-6">
                                                        <div class="odrInner">
                                                            <div class="imgIconOdr">
                                                            <?php if(isset($odr->group->teamleader_image) && !empty($odr->group->teamleader_image)): ?>
                                                                <img src="<?php echo e(fileurlemp().$odr->group->teamleader_image); ?>" class="img-responsive">
                                                            <?php else: ?>
                                                                <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="img-responsive" />
                                                            <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="odrInner">
                                                            <div class="labelText">Team Leader</div>
                                                            <div class="labelValue"><?php echo e($odr->group->teamleader); ?></div>
                                                        </div>
                                                    </div>
                                                    <?php else: ?>
                                                    <div class="col-sm-6">
                                                        <div class="odrInner">
                                                            <div class="imgIconOdr">
                                                            <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="img-responsive" />
                                                            </div>
                                                        </div>
                                                        <div class="odrInner">
                                                            <div class="labelText">Team Leader</div>
                                                            <div class="labelValue">Not Assign</div>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="odrInner">
                                                            <div class="labelText">Team Members</div>
                                                            <?php if($odr->status == 4 || $odr->status == 5 || $odr->status == 6 || $odr->status == 7 || $odr->status == 8 || $odr->status == 9): ?>
                                                            <div class="labelValue"><?php echo e($odr->group->total_emp); ?></div>
                                                            <?php else: ?>
                                                            <div class="labelValue">Not Assign</div>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="odrInner">
                                                            <div class="labelText">Number</div>
                                                            <?php if($odr->status == 4 || $odr->status == 5 || $odr->status == 6 || $odr->status == 7 || $odr->status == 8 || $odr->status == 9): ?>
                                                            <div class="labelValue"><?php echo e($odr->group->teamleader_mobile); ?></div>
                                                            <?php else: ?>
                                                            <div class="labelValue">Not Assign</div>
                                                            <?php endif; ?>  
                                                        </div>
                                                        <div class="odrInner">
                                                            <div class="labelText">Service Type</div>
                                                            <div class="labelValue"><?php echo e(ucwords($odr->service_type)); ?></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-5">
                                                        <div class="odrInner">
                                                            <div class="labelText">Job Service</div>
                                                            <div class="orderServiceIcon">
                                                            <?php if(isset($odr->services[0]) && !empty($odr->services[0])): ?>
                                                
                                                                <?php $__currentLoopData = $odr->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if(isset($service->service_icon) && !empty($service->service_icon)): ?>
                                                                        <img src="<?php echo e(fileurlservice().$service->service_icon); ?>" class="img-responsive" />
                                                                    <?php else: ?>
                                                                    <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="img-responsive" />
                                                                    <?php endif; ?>  
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <a href="" class="orderMoreBtn">more Details <span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                            <?php if(isset($odr->group_name) && !empty($odr->group_name)): ?>
                                                    <button type="button" class="btn btn-primary btn-cons" >Alloted Team: <?php echo e($odr->group_name); ?></button>
                                                <?php else: ?>
                                                    <button type="button" class="btn btn-primary btn-cons" data-toggle="modal" data-jobId="<?php echo e($odr->id); ?>" onclick="allotgroup(this.getAttribute('data-jobId'))"  data-target=".allotGroup">Allot Team</button>
                                                <?php endif; ?>

                                                <?php if($odr->status == 4): ?>
                                                    <a href="#" class="btn btn-danger btn-cons pull-right">No Job Card</a>
                                                <?php endif; ?>
                                                <?php if($odr->status == 5): ?>
                                                    <a href="<?php echo e(url('admin/orders/orderDetails/'.$odr->id)); ?>" class="btn btn-danger btn-cons pull-right">View Job Card</a>
                                                <?php endif; ?>
                                                <?php if($odr->status == 6): ?>
                                                    <a href="<?php echo e(url('admin/orders/viewProposal/'.$odr->id)); ?>" class="btn btn-danger btn-cons pull-right">Proposed</a>
                                                <?php endif; ?>
                                                <?php if($odr->status == 8): ?>
                                                    <a href="#" class="btn btn-success btn-cons pull-right">Completed</a>
                                                <?php endif; ?>
                                                <?php if($odr->status == 9): ?>
                                                    <a href="#" class="btn btn-danger btn-cons pull-right">Rejected</a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <div class="col-md-12">
                                    <div class="order_history_box req_sr_box_main">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="text-center">No Record Found!</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                           
                            <!-- <?php if(isset($orders[0]) && !empty($orders[0])): ?>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $odr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-12">
                                        <div class="order_history_box req_sr_box_main">
                                            <div class="row">
                                                <div class="col-sm-4 jd_list_cust_img_box">
                                                    <div class="order_history_box">
                                                        <div class="job_desc_box_list">
                                                            <div class="title">
                                                                <h5>Job No. <span class="pull-right srv_name"><?php echo e($odr->id); ?></span></h5>
                                                            </div>       
                                                        </div>
                                                        <div class="widget_user_list req_sr_card">
                                                            <div class="widget_img_box">
                                                            <?php if(isset($odr->profile_pic) && !empty($odr->profile_pic)): ?>
                                                                <img src="<?php echo e(fileurlUser().$odr->profile_pic); ?>" class="">
                                                                <?php else: ?>
                                                                <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="">
                                                                <?php endif; ?>
                                                                
                                                            </div>

                                                            <div class="bs_inf_jd">
                                                                <h5 class="text-center"> <?php echo e($odr->firstname); ?> <?php echo e($odr->lastname); ?></h5>
                                                                <p><i class="fa fa-phone"> <?php echo e($odr->mobile); ?></i></p>
                                                            </div>
                                                            
                                                            <div class="job_desc_box_list">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-xs-12">
                                                                        <h5 class="textHead">Location</h5>
                                                                        <p><?php echo e(substr($odr->address, 0, 38) . '...'); ?></p>
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
                                                
                                                    <div class="sub_ser_box_list">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="job_desc_box_list">
                                                                    <div class="title">
                                                                    <?php if($odr->amc_type == 0): ?>
                                                                        <h5>Non-AMC Holder <span class="pull-right srv_name"> </span></h5>
                                                                    <?php elseif($odr->amc_type == 1): ?>
                                                                        <h5>AMC Holder <span class="pull-right srv_name"> </span></h5>
                                                                    <?php endif; ?>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row amc_inf">
                                                            <div class="col-sm-6">
                                                                <h5 class="textHead">Nick Name</h5>
                                                                <p class="pending"> <?php echo e($odr->title); ?></p>
                                                            </div>
                                                            <div class="col-sm-6 text-right">
                                                                <h5 class="textHead">Job Status </h5>
                                                                <?php if($odr->status == 3): ?>
                                                                <p class="pending">Requested</p>
                                                                <?php elseif($odr->status == 4): ?>
                                                                    <p class="text-green">Service Team Alloted</p>
                                                                <?php elseif($odr->status == 5): ?>
                                                                    <p class="text-orange">In Process</p>
                                                                <?php elseif($odr->status == 6): ?>
                                                                    <p class="text-orange">Proposed</p>
                                                                <?php elseif($odr->status == 7): ?>
                                                                    <p class="text-green">Payment Done</p>
                                                                <?php elseif($odr->status == 8): ?>
                                                                    <p class="text-green">Completed</p>
                                                                <?php elseif($odr->status == 9): ?>
                                                                    <p class="text-red">Rejected</p>
                                                                <?php endif; ?>
                                                                </div>
                                                        </div>

                                                        <div class="row amc_inf">
                                                            <div class="col-sm-6">
                                                                <h5 class="textHead">Job Date</h5>
                                                                <p class="pending"> <?php echo e(date("d-m-Y", strtotime($odr->job_date))); ?></p>
                                                            </div>
                                                            <div class="col-sm-6 text-right">
                                                                <h5 class="textHead">Day Slot </h5>
                                                                <p class="pending"> <?php echo e($odr->slot_name); ?> </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <?php if(isset($odr->services[0]) && !empty($odr->services[0])): ?>
                                                        <div class="job_desc_box_list">
                                                            <div class="sub_ser_box_list">
                                                                <div class="title_new">
                                                                    <h5>Services 
                                                                        <span class="pending">Regular Service</span>
                                                                    </h5>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="jd_desc_blk" id="style-1">
                                                                            <div class="force-overflow">
                                                                            <?php $__currentLoopData = $odr->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php if(isset($serv->jobServices) && !empty($serv->jobServices)): ?>
                                                                                <div class="card_main_srv_lst">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <h5 class="textHead mar_bot nm_srv">Service Name : <span class="srv_name"><?php echo e($serv->service_name); ?></span></h5>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                        <div class="listSubSr">
                                                                                            <h5 class="textHead">Job Services Details</h5>
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
                                                                                </div>
                                                                            
                                                                            <?php endif; ?>
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

                                            <div class="row">
                                                <div class="col-md-12">
                                                <?php if(isset($odr->group_name) && !empty($odr->group_name)): ?>
                                                    <button type="button" class="btn btn-primary btn-cons" >Alloted Team: <?php echo e($odr->group_name); ?></button>
                                                <?php else: ?>
                                                    <button type="button" class="btn btn-primary btn-cons" data-toggle="modal" data-jobId="<?php echo e($odr->id); ?>" onclick="allotgroup(this.getAttribute('data-jobId'))"  data-target=".allotGroup">Allot Team</button>
                                                    <!-- <button type="button" class="btn btn-info btn-cons" data-toggle="modal" data-jobId="<?php echo e($odr->id); ?>" onclick="allotgroup(this.getAttribute('data-jobId'))" data-target=".individualOrders">Allot individual</button> --/>
                                                <?php endif; ?>

                                                <?php if($odr->status == 4): ?>
                                                    <a href="#" class="btn btn-danger btn-cons pull-right">No Job Card</a>
                                                <?php endif; ?>
                                                <?php if($odr->status == 5): ?>
                                                    <a href="<?php echo e(url('admin/orders/orderDetails/'.$odr->id)); ?>" class="btn btn-danger btn-cons pull-right">View Job Card</a>
                                                <?php endif; ?>
                                                <?php if($odr->status == 6): ?>
                                                    <a href="<?php echo e(url('admin/orders/viewProposal/'.$odr->id)); ?>" class="btn btn-danger btn-cons pull-right">Proposed</a>
                                                <?php endif; ?>
                                                <?php if($odr->status == 8): ?>
                                                    <a href="#" class="btn btn-success btn-cons pull-right">Completed</a>
                                                <?php endif; ?>
                                                <?php if($odr->status == 9): ?>
                                                    <a href="#" class="btn btn-danger btn-cons pull-right">Rejected</a>
                                                <?php endif; ?>
                                                    <!-- <a href="<?php echo e(url('admin/orders/orderDetails/'.$odr->id)); ?>" class="btn btn-danger btn-cons pull-right">View</a> --/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <div class="col-md-12">
                                    <div class="order_history_box req_sr_box_main">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="text-center">No Record Found!</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?> -->
                        </div>    
                    </div>
                </div> 
            </div> 
        </div> 

        <div class="modal fade inventoryModal allotGroup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content" >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Allot Team</h4>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 sub_service_form">
                                <form action="<?php echo e(route('orders.allotGroup')); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                    <div class="">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="headingH4">Allot Team</h4>
                                            </div>
                                        </div>

                                        <div class="row">
                                        <input type="hidden" name="job_id" id="jobID" value="">
                                            <div class="col-md-12">
                                                <div class="form_control_new">  
                                                    <div class="label_head">Select Team</div>
                                                    <select id="group_idmy" name="group_id" style="width:100%" required>
                                                        <option value="">Select Team</option>
                                                        <?php if(isset($groups) && !empty($groups)): ?>
                                                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($gp->id); ?>"><?php echo e($gp->group_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="order_history_box">

                                                    <div class="row" id="groupdetail1" >
                                                        
                                                    </div>

                                                    <div class="row marginTop20">
                                                        <div class="col-md-12 text-center">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>    
                                    </div>
                                </form>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.test_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>