<?php $__env->startSection('css'); ?>
<style>
    .gr_container .controller{
        position: absolute;
        top: 0;
        right: 0;
        z-index: 1;
        padding: 5px 10px;
        width:100%;
    }
    .gr_container .controller a, .gr_container .controller a:hover{
        color:#ffffff;
        text-decoration:none;
        padding-left: 10px;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="page-title"> 
        <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
            <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
        </a>
        <h3>Packages  <span class="semi-bold">&nbsp;</span></h3>
    </div>

    <div class="content-box-main">
        <div class="order_history_box mar_btm30">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <h3 class="text-center amc">ANNUAL MAINTENANCE PACKAGES</h3>
                    <p class="text-center">Having your property covered under our Annual Maintenance Packages gives you round the clock 24/7 365 days access to our team with an emergency* response time of 60 Minutes for any maintenance issue you may face. AMC assures you complete peace of mind. We have tailored our AMC into 3 different packages to fit your various requirements being the owner or the tenant of the property.</p>
                </div>
            </div>
        </div>


        <!-- <div class="order_history_box"> -->
            <div class="row">
            <?php if(isset($packages) && !empty($packages)): ?>
            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="pc-price pc-price-29 text-center gr_container">
                        <div class="controller overlay"> 
                            <?php if(hasPermissionThroughRole('edit_contract_service')): ?>
                                <a href="<?php echo e(url('admin/contracts/editContractServices/'.$pkg['id'])); ?>" data-toggle="modal" class="pull-left" ><i class="fa fa-pencil"></i></a> 
                            <?php endif; ?>
                            <?php if(hasPermissionThroughRole('delete_contract')): ?>
                                <a class="pull-right" href="<?php echo e(url('admin/contracts/destroy/'.$pkg['id'])); ?>" onclick="return confirm('Are you sure you want to delete this package?');"  title="Delete Service"><i class="fa fa-times"></i></a> 
                            <?php endif; ?>
                        </div> 
                        <div class="price-title">
                            <h3><?php echo e($pkg['package_type']); ?></h3>
                            
                            <h6><?php echo e($pkg['package_category']); ?></h6>
                        </div>
                        <div class="pricing">
                            <div class="price-inner">
                                <span class="currency">$</span>
                                <span class="value"><?php echo e($pkg['package_price']); ?></span>
                                <span class="period">/year</span>
                            </div>
                        </div>

                        <div class="price-body">
                            <div class="srvBody" id="style-1">
                            <?php if(isset($pkg['packcat'][0]) && !empty($pkg['packcat'][0])): ?>
                            
                                <div class="tab-content">
                                <?php $__currentLoopData = $pkg['packcat']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo e($cat->title); ?></p>
                                    <div role="tabpanel" class="tab-pane active" id="preventative_<?php echo $cat['title'];?>">
                                        <ul>
                                        <?php $__currentLoopData = $cat['pc']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($ser->pkg_service_name); ?>

                                                <span><?php echo e($ser->pkg_service_desc); ?></span>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                </div>
                                <?php endif; ?>
                            </div> 
                            <?php if(hasPermissionThroughRole('add_contract_services')): ?>
                            <a class="pc-btn pc-btn-7" href="<?php echo e(route('contracts.form')); ?>">Add More Package Services</a>
                            <?php endif; ?>
                        </div>
                    </div>    
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </div>
        <!-- </div>     -->
    </div>        
</div>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.package_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>