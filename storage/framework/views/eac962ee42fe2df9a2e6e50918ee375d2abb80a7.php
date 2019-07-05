<?php $__env->startSection('content'); ?>
<div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">Brands</a> </li>
                </ul>

                <div class="page-title"> <i class="icon-custom-left"></i>
                    <h3>Brands  <span class="semi-bold">&nbsp;</span></h3>
                </div>


                <div class="content-box-main">
                    <div class="row">
                    <?php if(Session::has('message')): ?> 
                    <div class="alert alert-info">
                        <?php echo e(Session::get('message')); ?> 
                    </div> 
                <?php endif; ?>

                 <?php if(isset($brands) && !empty($brands)): ?>
                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $br): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3">
                            <div class="mainDivPartner">
                                <div class="widget-item ">
                                    <div class="controller overlay right">
                                        <a href="<?php echo e(url('admin/brands/destroy/'.$br->id)); ?>"><i class="fa fa-times"></i></a>
                                    </div>  
                                </div>  
                                <div class="brandLogo">
                                <?php if(isset($br->brand_icon) && !empty($br->brand_icon)): ?>
                                     <img src="<?php echo e(fileurlbrand().$br->brand_icon); ?>" style="">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('public/img/no-preview.jpg')); ?>" style="">
                                <?php endif; ?>
                                </div>
                                <div class="contentDivPartner">
                                    <h4><?php echo e($br->brand_name); ?></h4>
                                    <h5>( Code - <?php echo e($br->brand_code); ?> )</h5>
                                </div>
                            </div>
                        </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                    </div>
                </div> 

            </div> 
    <!---Add New Brand modal End -->
    <div class="modal fade inventoryModal addNewBrand" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">New Brand</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 sub_service_form">
                            <form action="<?php echo e(route('brands.post')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                                <div class="content-box-main">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="headingH4">Add New Brand</h4>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="service_icon_box">
                                                <div class="icon_div service_bg">
                                                    <img id="brand_icon" src="<?php echo e(asset('public/img/upload-icon_white.png')); ?>" class="img-responsive">
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-offset-3 col-sm-6">
                                                        <div class="srv_icon_upload">
                                                            <div class="text">Upload Icon</div>
                                                            <div class="up_btn">
                                                                <div class="up_img_pro">
                                                                    <img alt="" id="brand_icon" src="<?php echo e(asset('public/img/upload-icon.png')); ?>" class="center-block userImg img-responsive">
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

                                        <div class="col-md-12">
                                            <div class="form_control_new">  
                                                <div class="label_head">Brand Name</div>
                                                <div class="input-group"> 
                                                    <span class="input-group-addon" id="brand_name"><i class="fa fa-user"></i></span> 
                                                    <input class="form-control" name="brand_name" id="brand_name" placeholder="Brand Name" required> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form_control_new">  
                                                <div class="label_head">Brand Code</div>
                                                <div class="input-group"> 
                                                    <span class="input-group-addon" id="brand_code"><i class="fa fa-user"></i></span> 
                                                    <input class="form-control" name="brand_code" id="brand_code" placeholder="Brand Code" required> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-danger">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
    <!---Add New Brand modal End -->

    <a class="fixed-btn" href="javascript:;" data-toggle="modal" data-target=".addNewBrand">
        <img src="<?php echo e(asset('public/img/add.png')); ?>">
    </a>

   <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>