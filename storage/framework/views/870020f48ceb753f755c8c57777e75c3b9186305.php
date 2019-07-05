
<?php $__env->startSection('css'); ?>
<style>
    .invHead .title{
        display: block;
        width: 100%;
        float: left;
        border-bottom: 1px solid #e1e1e1;
        margin-bottom: 15px;
    }
    .invHead .title h5{
        color: #000;
        font-weight: 600;
        margin-bottom: 5px;
        margin-top: 10px;
    }
    .invDtl .widget_img_box{
        margin-top: 5px;
        width: 50px;
        height: 50px;
        margin-left: 0;
    }
    .marginTop0{
        margin-top:0px;
    }
    .marginTop10{
        margin-top:10px;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="page-title">
            <a href="<?php echo e(url()->previous()); ?>" class="previousBtn"> 
                <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
            </a>
            <h3>Completed Jobs  <span class="semi-bold">&nbsp;</span></h3>
        </div>

        <div class="content-box-main">
            <div class="row">
                <?php if(isset($complete_jobs[0]) && !empty($complete_jobs[0])): ?>
                <?php $__currentLoopData = $complete_jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-12">
                    <div class="orderBox_ng">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4>Job No. <?php echo e($job['id']); ?></h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="odrInner">
                                            <div class="labelText">Customer Mobile</div>
                                            <div class="labelValue"><?php echo e($job['mobile']); ?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="odrInner">
                                            <div class="labelText">Customer Name</div>
                                            <div class="labelValue"> <?php echo e($job['firstname']); ?> <?php echo e($job['lastname']); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="odrInner">
                                            <div class="labelText">AMC Holder </div>
                                            <div class="labelValue">AMC Id. <?php echo e($job['amc_id']); ?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="odrInner">
                                            <div class="labelText">Location</div>
                                            <div class="labelValue"><?php echo e($job['address']); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="odrInner">
                                            <div class="labelText">Start Time</div>
                                            <div class="labelValue"><?php echo e($job['slot_name']); ?> <?php echo e($job['slotstart_time']); ?></div>
                                        </div>
                                        <div class="odrInner">
                                            <div class="labelText">Completed Job Date</div>
                                            <div class="labelValue"><?php echo e(date('d-m-Y', strtotime($job['updated_at']))); ?></div>
                                        </div>
                                        <div class="odrInner">
                                            <div class="labelText">Payment Date</div>
                                            <div class="labelValue"><?php echo e(date('d-m-Y', strtotime($job['updated_at']))); ?></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="odrInner">
                                            <div class="imgIconOdr">
                                                <?php if(isset($job['group']->teamleader_image) && !empty($job['group']->teamleader_image)): ?>
                                                    <img src="<?php echo e(fileurlemp().$job['group']->teamleader_image); ?>" class="img-responsive">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="img-responsive">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="odrInner">
                                            <div class="labelText">Team Leader</div>
                                            <div class="labelValue"><?php echo e($job['group']->teamleader); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="odrInner">
                                            <div class="labelText">Alloted Team</div>
                                            <div class="labelValue"><?php echo e($job['group_name']); ?></div>
                                        </div>

                                        <div class="odrInner">
                                            <div class="labelText">Number</div>
                                            <div class="labelValue"><?php echo e($job['group']->teamleader_mobile); ?></div>
                                        </div>
                                        <div class="odrInner">
                                            <div class="labelText">Total Price</div>
                                            <div class="text-light-blue">3500</div>
                                        </div>
                                       
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="odrInner">
                                            <div class="labelText">Service Type</div>
                                            <div class="labelValue"><?php echo e(ucwords($job['service_type'])); ?></div>
                                        </div>
                                        <div class="odrInner">
                                            <div class="labelText">Services</div>
                                            <div class="orderServiceIcon">
                                            <?php if(isset($job['servc'][0]) && !empty($job['servc'][0])): ?>
                                                <?php $__currentLoopData = $job['servc']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(isset($service->service_icon) && !empty($service->service_icon)): ?>
                                                        <img src="<?php echo e(fileurlservice().$service->service_icon); ?>" class="img-responsive" />
                                                    <?php else: ?>
                                                        
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <a href="<?php echo e(url('admin/invoice/view/'.$job['id'])); ?>" class="orderMoreBtn">View Invoice <span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <div class="col-md-12">
                    <div class="order_history_box">
                        </p>No Record Found!</p>
                    </div>
                </div>
                <?php endif; ?>
            </div>

           
        </div>
        
    </div>   

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.service_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>