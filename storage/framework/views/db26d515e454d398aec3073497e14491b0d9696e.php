

    <?php $__env->startSection('content'); ?>
        <style>
            .stockQty{
                width:auto;
                float:right;
            }
            .proDtl table thead{
                background: #e5e9ec;
            }
        </style>
        <div class="content">
            <div class="page-title"> 
                <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
                    <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
                </a>
                <h3>Product Details</h3>
            </div>

            <!-- <form action="" method=""> -->
                <div class="row">
                <?php if(isset($products) && !empty($products)): ?>
                    <div class="col-md-3">
                        <div class="content-box-main profile_img_sec">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="upProfile_sec">
                                            <div class="form-group form-md-line-input">
                                                <h4 class="headingH4">Product Image</h4>
                                                <div class="docMainBox productImgBox">
                                                <?php if(isset($products->product_img) && !empty($products->product_img)): ?>
                                                    <img src="<?php echo e(fileurlProduct().$products->product_img); ?>" class="img-responsive" />
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('public/img/no-preview-item.jpg')); ?>" class="img-responsive" />
                                                <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="text-uppercase text-center card-text-heading" style="color:#000 !important">
                                                <?php echo e($products->product_name); ?> - (<?php echo e($products->product_code); ?>)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="order_history_box">
                                            <h5>Description</h5>
                                            <p><?php echo e($products->text_content); ?></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <?php if(isset($products->brands[0]) && !empty($products->brands[0])): ?>
                            <?php $__currentLoopData = $products->brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bnd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="content-box-main">
                                    <div class="header_main_div_sec">
                                        <div class="title">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5 class="text-uppercase">Product Details</h5>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="stockQty">
                                                        <?php if($bnd->qty == 0): ?>
                                                            <div class="right_opt item_note">
                                                                <div class="st_opt  blink">
                                                                    <span class="">No Stock</span>
                                                                </div>
                                                            </div>
                                                        <?php elseif($bnd->qty < 5): ?>
                                                            <div class="right_opt item_note">
                                                                <div class="st_opt  blink">
                                                                    <span class="">Low Stock</span>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>       
                                    </div>   

                                    <!-- <div class="accordion" id="accordionExample">
                                        <div class="card"> -->
                                            <!-- <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card-header" id="headingOne">
                                                        <div class="stockQty">
                                                        <?php if($bnd->qty == 0): ?>
                                                            <div class="right_opt item_note">
                                                                <div class="title">&nbsp;</div>
                                                                <div class="st_opt  blink">
                                                                    <span class="">No Stock</span>
                                                                </div>
                                                            </div>
                                                        <?php elseif($bnd->qty < 5): ?>
                                                            <div class="right_opt item_note">
                                                                <div class="title">&nbsp;</div>
                                                                <div class="st_opt  blink">
                                                                    <span class="">Low Stock</span>
                                                                
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>         -->
                                                
                                            <div class="row proDtl">
                                                <div class="col-md-12">
                                                    <div class="order_history_box boxDetailsHeadings">
                                                        <div class="job_desc_box_list">
                                                            <div class="row">   
                                                                <div class="col-md-4">
                                                                    <h5>Brand Name</h5>
                                                                    <p class="text-capitalize"> <?php echo e($bnd->brand_name); ?></p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <h5>Available Qty</h5>
                                                                    <p><?php echo e($bnd->qty); ?></p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <h5>Price</h5>
                                                                    <p><?php echo e($bnd->price); ?></p>
                                                                </div>
                                                            </div>

                                                            <div class="row marginTop20"> 
                                                                <div class="col-md-12">
                                                                    <div class="header_main_div_sec">
                                                                        <div class="title">
                                                                            <h5>Venders</h5>
                                                                        </div>       
                                                                    </div>
                                                                </div>  
                                                                <div class="col-md-12">
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th></th>
                                                                                    <th>Vender Name </th>
                                                                                    <th>Rating </th>
                                                                                    <th>Location </th>
                                                                                    <th colspan="2">Distance </th>
                                                                                </tr>
                                                                            </thead>

                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <input  type="radio"  value="1">
                                                                                    </td>
                                                                                    <td> <?php echo e($bnd->vendor_id); ?></td>
                                                                                    <td> 4</td>
                                                                                    <td> DLF Phase 1</td>
                                                                                    <td> 5 KM
                                                                                        <button type="button" class="btn btn-primary btn-cons pull-right">Quick Order Now</button>
                                                                                    </td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>     
                                                            </div>
                                                        </div>

                                                        <!-- <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Brand Name </th>
                                                                        <th>Available Qty </th>
                                                                        <th>Price </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td> <?php echo e($bnd->brand_name); ?></td>
                                                                        <td> <?php echo e($bnd->qty); ?></td>
                                                                        <td> <?php echo e($bnd->price); ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div> -->
                                                    </div>
                                                </div>    

                                                <!-- <div class="col-md-12">
                                                    <div class="order_history_box">
                                                        <div class="header_main_div_sec">
                                                            <div class="title">
                                                                <h5>Venders</h5>
                                                            </div>       
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th></th>
                                                                                <th>Vender Name </th>
                                                                                <th>Rating </th>
                                                                                <th>Location </th>
                                                                                <th colspan="2">Distance </th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                            <tr>
                                                                            <td><input  type="radio"  value="1"></td>
                                                                                <td> <?php echo e($bnd->vendor_id); ?></td>
                                                                                <td> 4</td>
                                                                                <td> DLF Phase 1</td>
                                                                                <td> 5 KM
                                                                                <button type="button" class="btn btn-primary btn-cons pull-right">Quick Order Now</button>
                                                                                </td>
                                                                            </tr>
                                                                            
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->

                                            </div>
                                        <!-- </div>
                                    </div> -->
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                
                            </div>

                        </div>
                    </div>
                <?php endif; ?>
                </div>
                </div>
            <!-- </form> -->
        </div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.product_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>