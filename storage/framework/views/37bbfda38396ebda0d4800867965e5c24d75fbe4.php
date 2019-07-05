

<?php $__env->startSection('content'); ?>
<style>
    .content-box-main table thead{
        background: #e5e9ec;
    }
    .radio_button_box input[type=radio] + label>img{
        padding:0px;
    }
    .radio_button_box input[type=radio]:checked + label>img{
        transform: inherit;
    }
    /* address{
        width:80%;
        margin:auto;
        padding:15px;
        text-align:center;
    } */
</style>

<div class="content">
    <ul class="breadcrumb">
        <li>
            <p>YOU ARE HERE</p>
        </li>
        <li><a href="#" class="active">Issue Products</a> </li>
    </ul>

    <div class="page-title"> 
        <div class="row">
            <div class="col-md-6">
                <a href="<?php echo e(url()->previous()); ?>">
                    <i class="icon-custom-left"></i>
                </a>
                <h3>Issue Products<span class="semi-bold">&nbsp;</span></h3>
            </div>
            <!-- <div class="col-md-6">
                <div class="form_control_new">  
                    <div class="label_head">Search Order No.</div>   
                    <select class="multiselect" name="Order_type" id="Order_type"  style="width:100%">
                    <option value="">Select Order No.</option>
                        <option value="JB-001">JB-001</option>
                        <option value="JB-041">JB-041</option>
                        <option value="JB-011">JB-011</option>
                        <option value="JB-055">JB-055</option>
                    </select>
                </div>
            </div> -->
        </div>
    </div>

    <div class="row">
        <form method="post" action="<?php echo e(url('admin/inventry/products/issueProducts/'.$id)); ?>" >
        <?php echo e(csrf_field()); ?>

        <?php if(isset($jobs) && !empty($jobs)): ?>
            <div class="col-md-4">
                <div class="content-box-main">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="req_sr_box_main">
                                <div class="row">
                                    <div class="col-sm-12 jd_list_cust_img_box">
                                        <div class="job_desc_box_list">
                                            <div class="title">
                                                <h5>Customer Order Details <span class="pull-right srv_name" style="color:#000 !important">Job No. <?php echo e($jobs->id); ?></span></h5>
                                            </div>       
                                        </div>

                                        <div class="widget_user_list req_sr_card">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="widget_img_box">
                                                        <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="">
                                                    </div>
                                                    <div class="bs_inf_jd">
                                                        <h5 class="text-center"> <?php echo e($jobs->firstname); ?> <?php echo e($jobs->lastname); ?></h5>
                                                        <p><i class="fa fa-phone"> <?php echo e($jobs->mobile); ?></i></p>
                                                        <!-- <address><?php echo e($jobs->address); ?></address> -->
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="job_desc_box_list">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-xs-6">
                                                                <h5 class="textHead">Alloted To 
                                                                    <!-- <span class="pull-right req_sr_card_dis" style="color:#039347 !important">Group</span>  -->
                                                                </h5>
                                                                <p class="inv_text pending" >Group</p>
                                                            </div>

                                                            <div class="col-sm-6 col-xs-6 text-right">
                                                                <h5 class="textHead">Team Size 
                                                                    <!-- <span class="pull-right req_sr_card_dis"><?php echo e($jobs->total_emp); ?></span>  -->
                                                                </h5>
                                                                <p class="inv_text pending" ><?php echo e($jobs->total_emp); ?></p>
                                                            </div>
                                                        </div>

                                                        <div class="row">    
                                                            <div class="col-sm-6 col-xs-6">
                                                                <h5 class="textHead">Order Date 
                                                                <!-- <span class="pull-right req_sr_card_dis" style="color:#039347 !important">14 Sep 2018</span>  -->
                                                                </h5>
                                                                <p class="inv_text pending" >14 Sep 2018</p>
                                                            </div>
                                                            <div class="col-sm-6 col-xs-6 text-right">
                                                                <h5 class="textHead">Day Slot
                                                                    <!-- <span class="pull-right req_sr_card_dis"><?php echo e($jobs->slot_name); ?></span>  -->
                                                                </h5>
                                                                <p class="inv_text pending" ><?php echo e($jobs->slot_name); ?></p>
                                                            </div>
                                                        </div>

                                                        <div class="row">    
                                                            <div class="col-sm-12 col-xs-12">
                                                                <h5 class="textHead">Start Time
                                                                <!-- <span class="pull-right req_sr_card_dis"><?php echo e($jobs->slotstart_time); ?></span>  -->
                                                                </h5>
                                                                <p class="inv_text pending" ><?php echo e($jobs->slotstart_time); ?></p>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-sm-9 col-xs-9">
                                                            <h5 class="textHead">Location</h5>
                                                            <p><?php echo e($jobs->address); ?></p>
                                                        </div>

                                                        <div class="col-sm-3 col-xs-3 text-right">
                                                            <h5 class="textHead">Distance</h5>
                                                            <p> <span class="req_sr_card_dis">25 KM</span> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if(isset($jobs->services[0]) && !empty($jobs->services[0])): ?>
                                    <div class="col-sm-12 req_sr_card_dt_panel">
                                        <div class="job_desc_box_list">
                                            <div class="sub_ser_box_list">
                                                <div class="title_new">
                                                    <h5>Services 
                                                        <span class="pending"><?php echo e(ucwords($jobs->service_type)); ?> Service</span>
                                                    </h5>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="jd_desc_blk" id="style-1">
                                                            <div class="force-overflow">
                                                            <?php $__currentLoopData = $jobs->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="card_main_srv_lst">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <h5 class="textHead mar_bot nm_srv">Service Name : <span class="srv_name"><?php echo e($ser->service_name); ?></span></h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="lssMain">
                                                                                <h5 class="textHead theadBorder">Sub Services</h5>
                                                                                <div class="list_sub_srv">
                                                                                    <div class="problemText">
                                                                                        <div class="pblIcon"><i class="fa fa-question-circle"></i></div>
                                                                                        <div class="pblTxt"><?php echo e($ser->jobServices->specify_problem); ?></div>
                                                                                    </div>

                                                                                    <div class="additionalText">
                                                                                        <div class="adtIcon"><i class="fa fa-info-circle"></i></div>
                                                                                        <div class="adtTxt"><?php echo e($ser->jobServices->additional_notes); ?></div>
                                                                                    </div>
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
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            <?php endif; ?>

                <?php if(isset($jobs->group) && !empty($jobs->group)): ?>
                <div class="content-box-main">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="req_sr_box_main">
                                <div class="row" style="padding-bottom: 120px !important;">
                                    <div class="col-sm-12 jd_list_cust_img_box">
                                        <div class="">
                                            <div class="job_desc_box_list">
                                                <div class="title">
                                                    <h5>Products Assigned To : Member
                                                        <span class="pull-right srv_name" style="color:#000 !important">Job No. <?php echo e($jobs->id); ?></span>
                                                    </h5>
                                                </div>       
                                            </div>
                                            
                                            <div class="radio_button_box">
                                                <div class="row">
                                                    <?php if(isset($jobs->group->teamleader) && !empty($jobs->group->teamleader)): ?>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <input type="radio" name="employee_id" checked="checked" value="<?php echo e($jobs->group->team_leader); ?>" id="<?php echo e($jobs->group->team_leader); ?>" class="input-hidden" required>
                                                        <label for="<?php echo e($jobs->group->team_leader); ?>">
                                                        <?php if(isset($jobs->group->teamleader_image) && !empty($jobs->group->teamleader_image)): ?>
                                                            <img src="<?php echo e(fileurlemp().$jobs->group->teamleader_image); ?>" alt="4 Wheeler" class="img-responsive">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" alt="Team Leader" class="img-responsive">
                                                        <?php endif; ?>
                                                            <div class="label_head text-center"><?php echo e($jobs->group->teamleader); ?> <p>(Team Leader)</p> </div>
                                                        </label>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if(isset($jobs->group->drivername) && !empty($jobs->group->drivername)): ?>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <input type="radio" name="employee_id" value="<?php echo e($jobs->group->driver); ?>" id="<?php echo e($jobs->group->driver); ?>" class="input-hidden">
                                                        <label for="<?php echo e($jobs->group->driver); ?>">
                                                        <?php if(isset($jobs->group->driver_image) && !empty($jobs->group->driver_image)): ?>
                                                            <img src="<?php echo e(fileurlemp().$jobs->group->driver_image); ?>" alt="Driver" class="img-responsive">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" alt="Driver" class="img-responsive">
                                                        <?php endif; ?>
                                                            <div class="label_head text-center"> <?php echo e($jobs->group->drivername); ?> <p>(Driver)</p></div>
                                                        </label>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if(isset($jobs->team_member[0]) && !empty($jobs->team_member[0])): ?>
                                                    <?php $__currentLoopData = $jobs->team_member; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-sm-3 col-xs-3">
                                                        <input type="radio" name="employee_id" id="<?php echo e($member->emp_id); ?>" value="<?php echo e($member->emp_id); ?>" class="input-hidden">
                                                        <label for="<?php echo e($member->emp_id); ?>">
                                                        <?php if(isset($member->emp_profile) && !empty($member->emp_profile)): ?>
                                                            <img src="<?php echo e(fileurlemp().$member->emp_profile); ?>" alt="<?php echo e($member->emp_role); ?>" class="img-responsive">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" alt="<?php echo e($member->emp_role); ?>" class="img-responsive">
                                                        <?php endif; ?>
                                                            <div class="label_head text-center"> <?php echo e($member->employee_name); ?> <p>(<?php echo e($member->emp_role); ?>)</p></div>
                                                        </label>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                        
                                                </div>
                                    
                                            </div>

                                        </div>

                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="button" class="btn btn-primary ">Issue</button>
                            <button type="button" class="btn btn-danger ">Already Issued</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <div class="col-md-8">
                <div class="content-box-main">
                    <div class="header_main_div_sec">
                        <div class="title">
                            <h5>Job Date : <span><?php echo e(date('d F Y', strtotime($jobs->job_date))); ?></span> 
                            </h5>
                        </div>       
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="job_desc_box_list">
                                <div class="title">
                                    <h5>Reqested Products</h5>         
                                </div>       
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="10">Product Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Brand</th>
                                    <th scope="col">Specifications</th>
                                    <th scope="col">Product Qty</th>
                                    
                                    </tr>
                                </thead>
                                <tbody id="slotbind">
                                
                                    <?php if(isset($jobs->requestedInventory[0]) && !empty($jobs->requestedInventory[0])): ?>
                                    <?php $__currentLoopData = $jobs->requestedInventory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                    <th scope="row">
                                        <input id="morning" type="checkbox" value="1">
                                    </th>
                                    <td>
                                    <?php if(isset($inv->product_img) && !empty($inv->product_img)): ?>
                                        <img src="<?php echo e(fileurlProduct().$inv->product_img); ?>" class="img-responsive" style="width: 80px !important; height: 80px;">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('public/img/no-preview-item.jpg')); ?>" class="img-responsive" style="width: 80px !important; height: 80px;">
                                    <?php endif; ?>
                                    </td>
                                    <td><?php echo e($inv->product_name); ?></td>
                                    <td><?php echo e($inv->brand_name); ?></td>
                                    <td><?php echo e($inv->specification); ?> </td>
                                    <td><?php echo e($inv->qty); ?></td>
                                                                        
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                                                       
                                </tbody>
                            </table>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-danger">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>  
                </div>
            </div> 
        </form>
    </div> 
</div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.product_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>