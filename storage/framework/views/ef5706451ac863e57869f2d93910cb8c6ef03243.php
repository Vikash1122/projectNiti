    <?php $__env->startSection('content'); ?>

        <link href="<?php echo e(asset('public/plugins/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet" type="text/css" />

        <div class="content">
            <div class="page-title"> 
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
                            <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
                        </a>
                        <h3> Packages </h3>
                        
                        <?php if(hasPermissionThroughRole('access_contracts')): ?>
                        <a href="<?php echo e(route('contracts.fp')); ?>" class="new_btn_add_service"><i class="fa fa-plus"></i> Add New Packages </a>
                        <?php endif; ?>

                        <div class="serchBarDiv">
                            <div class="searchContainer">
                                <input class="searchBox" type="search" id="search" name="search" placeholder="Search">
                                <i class="fa fa-search searchIcon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            <?php if(Session::has('message')): ?> 
                <div class="alert alert-info">
                    <?php echo e(Session::get('message')); ?> 
                </div> 
            <?php endif; ?>

            <?php if(isset($packages[0]) && !empty($packages[0])): ?>
                <div class="content-box-main-ng">                            
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive tableDiv_ng">
                                <!-- <table class="table table-condensed" id="example"> -->
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Package Title</th>
                                            <th>Package Price</th>
                                            <th>No. Of Callouts</th>
                                            <?php if(hasPermissionThroughRole('edit_contract')): ?>
                                            <th>Action</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php   $i = 1; ?>
                                            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pack): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i); ?></td>
                                            <td><?php echo e($pack->package_type); ?></td>
                                            <td><?php echo e($pack->package_price); ?> AED</td>
                                            <td><?php echo e($pack->callouts); ?></td>
                                            
                                            <?php if(hasPermissionThroughRole('edit_contract') ): ?>
                                            <td>
                                            <?php if(hasPermissionThroughRole('edit_contract')): ?>
                                            <button type="button" title="Edit Packages" class="edit_btn tableEditBtn">
                                                <a href="<?php echo e(url('admin/contracts/editContract/'.$pack->id)); ?>" style="color:#ffffff;">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </button>
                                            <?php endif; ?>
                                            
                                            </td>
                                            <?php endif; ?>
                                        </tr>

                                        <?php  $i++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>         
                </div> 
            <?php endif; ?>

            <?php if(isset($packages[0]) && !empty($packages[0])): ?>
                <div class="innerWrapper1">
                    <div class="row">
                        <?php   $i = 1; ?>
                        <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pack): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3">
                                <div class="package-ng">
                                    <div class="header-ng">
                                        <div class="controller overlay">
                                            <a href="#" class="EditService editSub_btn pull-left dlt_btn" title="Delete Package"><i class="fa fa-times"></i></a>
                                            <a href="#" class=" pull-right edt_btn " title="">
                                                <img src="<?php echo e(asset('public/img/chain.png')); ?>" class="img-responsive">
                                            </a>                                                     
                                        </div>
                                        <h3><?php echo e($pack->package_type); ?></h3>
                                    </div>

                                    <div class="count-num-ng">
                                        <h3 class="marginBottom0">223</h3>
                                        <h4 class="marginTop5">Subscribers</h4>
                                    </div>

                                    <div class="contentDiv-ng">
                                        <h3 class="marginBottom0"><?php echo e($pack->package_price); ?> AED</h3>
                                        <h4 class="marginTop5">Average Price</h4>
                                        <h4 class="contract-time-ng">12 Month Contact</h4>
                                    </div>

                                    <div class="footer-ng">
                                        <div class="row">
                                            <?php if(hasPermissionThroughRole('edit_contract') ): ?>
                                                <div class="col-md-12 text-center">
                                                    <?php if(hasPermissionThroughRole('edit_contract')): ?>
                                                    <a href="<?php echo e(url('admin/contracts/editContract/'.$pack->id)); ?>" class="new_add_srv_btn">Edit Package</a>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php  $i++; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

        
        </div>
   
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>