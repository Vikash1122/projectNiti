

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-title"> 
            <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
                <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
            </a>
            <h3>Brands</h3>
            <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Edit Brand</h3></div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="sub_service_form">
                    <div class="content-box-main-ng marginBottom0">
                        <h3>Edit Brand</h3>
                        <form action="<?php echo e(url('admin/brands/edit/'.$id)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="content-box-main marginBottom0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Brand Name</div>
                                            <div class="form-group"> 
                                                <input class="form-control" name="brand_name" value="<?php echo e($brand->brand_name); ?>" id="brand_name" placeholder="Brand Name" required> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Brand Code</div>
                                            <div class="form-group"> 
                                                <input class="form-control" name="brand_code" value="<?php echo e($brand->brand_code); ?>"  id="brand_code" placeholder="Brand Code" required> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form_control_new srv_add_new">
                                            <div class="label_head">Upload Service Icon</div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="docMainBox">
                                                    <?php if(isset($brand->brand_icon) && !empty($brand->brand_icon)): ?>
                                                        <img alt="" id="brand_icon" src="<?php echo e(fileurlbrand().$brand->brand_icon); ?>" class="center-block userImg img-responsive">
                                                    <?php else: ?>
                                                        <img alt="" id="brand_icon" src="<?php echo e(asset('public/img/Icons_upload.png')); ?>" class="center-block userImg img-responsive">
                                                    <?php endif; ?>
                                                        <div class="uploadProfile">
                                                            <div class="btn default btn-file btn-uploadnew">
                                                                <input type="file" name="brand_icon" onchange="getpic('brand_icon_copy','brand_icon','dl_text',event),OpenFile('brand_icon_copy')" class="form-control imgPrv" id="brand_icon_copy">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>    
                                    </div>
                                </div>
                            </div>
                            
                            <div class="new_add_srv_btn_block">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn new_add_srv_btn">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>    
                    </div>    
                </div>
            </div>
        </div>
    </div>    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>