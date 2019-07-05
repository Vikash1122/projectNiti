<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="page-title"> 
            <a class="previousBtn" href="<?php echo e(url()->previous()); ?>">
                <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
            </a>

            <h3>Banners  </h3>

            <?php if(hasPermissionThroughRole('add_banners')): ?>
            <a href="<?php echo e(route('banners.add')); ?>" class="new_btn_add_service" title="Add New Banner">
                <i class="fa fa-plus"></i> Add New Banner 
            </a>
            <?php endif; ?>
        
        </div>

        <div class="row">
            <?php if(Session::has('message')): ?> 
                <div class="alert alert-info">
                    <?php echo e(Session::get('message')); ?> 
                </div> 
            <?php endif; ?>
                
            <div class="col-md-12">
                <div class="content-box-main-ng">
                    <div class="row"> 
                        <div class="col-md-12">
                            <div class="table-responsive tableDiv_ng">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Active Banners</td>
                                            <td class="text-center">Title</td>
                                            <!-- <td>Banner Url</td> -->
                                            <td class="text-center">Active Date</td>
                                            <?php if(hasPermissionThroughRole('edit_banners') || hasPermissionThroughRole('delete_banners')): ?>
                                            <td class="text-right" colspan="2">Action</td>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>

                                    <tbody class="bannerTbody">
                                    <?php if(isset($instant_banners) && !empty($instant_banners)): ?>
                                        <?php $__currentLoopData = $instant_banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bann): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <img src="<?php echo e(fileurlbanner().$bann->banner_img); ?>" class="img-responsive" />
                                                </td>
                                                <td class="text-center"><?php echo e($bann->title); ?></td>
                                                <!-- <td><?php echo e($bann->banner_url); ?></td> -->
                                                <td class="text-center">Active</td>
                                                <?php if(hasPermissionThroughRole('edit_banners') || hasPermissionThroughRole('delete_banners')): ?>
                                                <td class="text-right">
                                                    <?php if(hasPermissionThroughRole('edit_banners')): ?>
                                                        <a href="<?php echo e(url('admin/banners/editBanner/'.$bann->id)); ?>" class="editbanner_btn12 tableEditBtn padding5" style="color: #ffffff">
                                                        <i class="fa fa-pencil"></i></a>
                                                    <?php endif; ?>
                                                    <?php if(hasPermissionThroughRole('delete_banners')): ?>
                                                        <a href="<?php echo e(url('admin/banners/destroy/'.$bann->id)); ?>" class="tableDeleteBtn padding5" onclick="return confirm('Are you sure you want to delete this banner?');" style="color: #ffffff"><i class="fa fa-times"></i></a>
                                                       
                                                    <?php endif; ?>
                                                </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="content-box-main-ng">
                    <div class="row"> 
                        <div class="col-md-12">
                            <div class="table-responsive tableDiv_ng">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Scheduled Banners</td>
                                            <td class="text-center">Title</td>
                                            <td class="text-center">Scheduled Date</td>
                                            <td class="text-right" colspan="2">Action</td>
                                        </tr>
                                    </thead>

                                    <tbody class="bannerTbody">
                                    <?php if(isset($schedule_banners[0]) && !empty($schedule_banners[0])): ?>
                                        <?php $__currentLoopData = $schedule_banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <img src="<?php echo e(fileurlbanner().$schedule->banner_img); ?>" class="img-responsive" />
                                            </td>
                                            <td class="text-center"><?php echo e($schedule->title); ?></td>
                                            <td class="text-center"><?php if(!empty($schedule->schedule_date) && isset($schedule->schedule_date)){ echo date('d/m/Y', strtotime($schedule->schedule_date));}else{ echo "";}?></td>
                                            <?php if(hasPermissionThroughRole('edit_banners') || hasPermissionThroughRole('delete_banners')): ?>
                                            <td class="text-right">
                                                <?php if(hasPermissionThroughRole('edit_banners')): ?>
                                                        <a href="<?php echo e(url('admin/banners/editBanner/'.$schedule->id)); ?>" class="editbanner_btn12 tableEditBtn padding5" style="color: #ffffff">
                                                        <i class="fa fa-pencil"></i></a>
                                                <?php endif; ?>
                                                <?php if(hasPermissionThroughRole('delete_banners')): ?>
                                                    <a href="<?php echo e(url('admin/banners/destroy/'.$schedule->id)); ?>" class="tableDeleteBtn padding5" onclick="return confirm('Are you sure you want to delete this banner?');" style="color: #ffffff"><i class="fa fa-times"></i></a>
                                                <?php endif; ?>
                                            </td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            <h4>No Record Found!</h4>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                        
                                    </tbody>
                                </table>  
                            </div>
                        </div> 
                    </div>     
                </div>
            </div>
        <div>
    </div>  


    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.package_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>