

<?php $__env->startSection('content'); ?>
<style>
    .input-group{
        width:100%;
        display:block;
    }
    .ser_rpt_heading span{
        color: #000;
        font-weight: 600;
        margin-bottom: 5px;
        margin-top: 10px;
        border-bottom: 1px solid #ccc;
        display: block;
        width: 100%;
        padding-bottom: 5px;
        margin-bottom: 20px;
    }
    .listSev{
        width:100%;
        float:left;
        margin-top: 10px;
        padding-left: 20px;
    }
    .listSev ul li{
        font-size: 14px;
        padding-bottom: 10px;
        list-style-type: decimal;
    }
</style>
<div class="content">
    <div class="page-title"> 
        <div class="row">
            <div class="col-md-6">
                <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
                    <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
                </a>
                <h3>View Job Card  <span class="semi-bold">&nbsp;</span></h3>
            </div>
            <!-- <div class="col-md-6">
                <a href="#" class="btn btn-success btn-cons pull-right">Job Report</a>
            </div> -->
        </div>
        
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="content-box-main">
                <div class="header_main_div_sec">
                    <div class="title">

                        <h5 class="text-left textHead">Job No : <span><?php echo e($id); ?></span></h5>
                        
                    </div>     
                </div>
                <?php if(isset($jobcard[0]) && !empty($jobcard[0])): ?>
                <?php $__currentLoopData = $jobcard; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="order_history_box">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="ser_rpt_heading">
                                <span class="pull-left"><?php echo e($card->service_name); ?></span>
                            </h5>
                        </div>
                    </div>

                    
                    <?php if(isset($card->serviceData[0]) && !empty($card->serviceData[0])): ?>
                    <?php $__currentLoopData = $card->serviceData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($sub->text_content) && !empty($sub->text_content)): ?>
                            <div class="listSev">
                                <ul>
                                    <li><?php echo e($sub->text_content); ?></li>
                                </ul>
                            </div>
                        
                        <?php else: ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5 class="textHead">Sub Service Name</h5>
                                    <p><?php echo e($sub->sub_service_name); ?></p>
                                </div>
                                <div class="col-md-3">
                                    <h5 class="textHead">Product Type</h5>
                                    <p><?php echo e($sub->product_name); ?></p>
                                </div>
                                <div class="col-md-3">
                                    <h5 class="textHead">Quantity</h5>
                                    <p><?php echo e($sub->qty); ?></p>
                                </div>
                                <div class="col-md-3">
                                    <h5 class="textHead">Unit Variable Par /</h5>
                                    <p><?php echo e($sub->unit_variable); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    

                    
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>  
</div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.service_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>