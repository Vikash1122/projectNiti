

    <?php $__env->startSection('content'); ?>
        <div class="content">
            <div class="page-title"> 
                <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
                    <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
                </a>
                <h3>Edit Product</h3>
            </div>

            <div class="content-box-main-ng marginBottom0">
                <h3 class="text-center">Edit Product</h3>
           
                <form action="<?php echo e(url('admin/inventry/products/'.$id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>


                    <div class="content-box-main-vdr">
                        <div class="row">
                            <div class="col-md-offset-4 col-md-4 newEmp-ng">
                                <h4 class="text-center paddingBottom30">Upload Inventory Photo</h4>
                                <div class="upProfile_sec bgNone">
                                    <div class="form-group form-md-line-input">
                                        <div class="docMainBox profileImgBox">
                                        <?php if(isset($products->product_img) && !empty($products->product_img)): ?>
                                            <img alt="" id="product_copy" src="<?php echo e(fileurlProduct().$products->product_img); ?>" class="center-block img-responsive">
                                        <?php else: ?>
                                            <img alt="" id="product_copy" src="<?php echo e(asset('public/img/defaultInventory.png')); ?>" class="center-block img-responsive">
                                        <?php endif; ?>
                                        
                                        </div>
                                    </div> 
                                </div>
                                
                                <div class="uploaBtn_ng">
                                    <div class="text_ng">
                                        <div class="form_control_new">  
                                            <div class="label_head">Upload Image</div>
                                        </div>
                                    </div> 
                                    <div class="img_ng">
                                        <div class="up_img_pro">
                                            <img alt="" id="product_copy" src="<?php echo e(asset('public/img/Icons_upload_white.png')); ?>" class="center-block userImg img-responsive">
                                            <div class="uploadProfile">
                                                <div class="btn default btn-file btn-uploadnew">
                                                    <input type="file" name="emp_profile" onChange="getpic('product_pic_copy','product_copy','dl_text',event),OpenFile('product_pic_copy')" class="form-control imgPrv" id="product_pic_copy">
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                                <h4 class="text-center paddingBottom30">Inventory Information</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Service Type</div>   
                                            <select name="service_id" id="sService_type"  class="form-control" required>
                                                <option value="">Select Services</option>
                                                <?php if(isset($services) && !empty($services)): ?>
                                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if(isset($products->service_id) && !empty($products->service_id) && $ser->id == $products->service_id){echo "selected"; }else{ echo "";}?> value="<?php echo e($ser->id); ?>"><?php echo e($ser->service_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>

                                            <div class="iconDiv">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Sub Service Type</div>   
                                            <select name="sub_service_id" id="subService_type"  class="form-control" >
                                                <option value="">Select Sub Service</option>
                                                <?php if(isset($subservices) && !empty($subservices)): ?>
                                                <?php $__currentLoopData = $subservices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if(isset($products->sub_service_id) && !empty($products->sub_service_id) && $sub->id == $products->sub_service_id){echo "selected"; }else{ echo "";}?> value="<?php echo e($sub->id); ?>"><?php echo e($sub->sub_service_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                            <div class="iconDiv">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Product Category</div>
                                            <select name="category_id" id="category_id" class="form-control">
                                                <option value="">Select Product Type</option>
                                                <?php if(isset($categories) && !empty($categories)): ?>
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if(isset($products->category_id) && !empty($products->category_id) && $cat->id == $products->category_id){echo "selected"; }else{ echo "";}?> value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                            <div class="iconDiv">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                        <div class="label_head">Product Name</div>
                                            <input class="form-control" name="product_name" value="<?php echo e($products->product_name); ?>" id="product_name" placeholder="Product Name" required>   
                                            <div class="iconDiv">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div>                                          
                                        </div>
                                    </div>
                                </div>
                                    

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Product Code</div>
                                            <input class="form-control" name="product_code" value="<?php echo e($products->product_code); ?>" id="product_code" placeholder="Product Code" required> 
                                            <div class="iconDiv">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Use another Services</div>   
                                            <select class="multiselect form-control form-control1" name="another_servId[]" id="another_servId"  multiple>
                                                <option value="">Select another Services</option>
                                                <?php $arr = array();
                                                $arr = explode(',',$products->another_servId); ?>
                                                <?php if(isset($services) && !empty($services)){
                                                foreach($services as $ser){
                                                    $selected = (in_array($ser->id, $arr) == 0) ? '' : 'selected="selected"' ; 
                                                    ?> 
                                                    <option <?= $selected; ?> value="<?php echo e($ser->id); ?>" ><?php echo e($ser->service_name); ?></option>
                                                <?php }} ?>
                                            </select>
                                            <div class="iconDiv">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div> 
                                        </div>
                                    </div>
                                </div> 

                                <div id="appendDtata">
                                <?php if(isset($products->brands[0]) && !empty($products->brands[0])): ?>
                                <?php $__currentLoopData = $products->brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bnd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="order_history_box" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form_control_new">  
                                                    <div class="label_head">Brand Name </div>
                                                    <div class="form-group"> 
                                                        <select name="brand_id[]" id="brand_name1"  class="form-control" required>
                                                            <option value="">Select Brands</option>
                                                            <?php if(isset($brands) && !empty($brands)): ?>
                                                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option <?php if(isset($bnd->brand_id) && !empty($bnd->brand_id) && $bnd->brand_id ==$bd->id ){echo "selected";}else{ echo "";}?> value="<?php echo e($bd->id); ?>"><?php echo e($bd->brand_name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </select>
                                                        <div class="iconDiv">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form_control_new">  
                                                    <div class="label_head">Quantity</div>
                                                    <input class="form-control" name="qty[]" value="<?php echo e($bnd->qty); ?>" id="qty" placeholder="Quantity" required> 
                                                    <div class="iconDiv">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form_control_new">  
                                                    <div class="label_head"> Price</div>
                                                    <input class="form-control" name="price[]" value="<?php echo e($bnd->price); ?>" id="price" placeholder="Price" required> 
                                                    <div class="iconDiv">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </div> 
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form_control_new">  
                                                    <div class="label_head"> Selling Price</div>
                                                    <input class="form-control" name="selling_price[]" value="<?php echo e($bnd->selling_price); ?>" id="selling_price" placeholder="Selling Price" > 
                                                    <div class="iconDiv">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form_control_new">  
                                                    <div class="label_head"> Custom Price</div>
                                                    <input class="form-control" name="custom_price[]" value="<?php echo e($bnd->custom_price); ?>" id="custom_price" placeholder="Custom Price" > 
                                                    <div class="iconDiv">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </div> 
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form_control_new">  
                                                    <div class="label_head">Availability Days</div>
                                                    <input class="form-control" name="availability_days[]" value="<?php echo e($bnd->availability_days); ?>" id="availability_days" placeholder="Availability Days" required> 
                                                    <div class="iconDiv">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form_control_new">  
                                                    <div class="label_head">Vendors</div>
                                                    <select class="multiselect1 form-control form-control1" name="vendor_id[]" id="vendor_id" multiple required>
                                                        <option value="">Select Vendors</option>
                                                        <?php if(isset($vendors[0]) && !empty($vendors[0])): ?>
                                                            <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option <?php if(isset($bnd->brand_id) && !empty($bnd->brand_id) && $bnd->brand_id ==$vendr->id ){echo "selected";}else{ echo "";}?> value="<?php echo e($vendr->id); ?>"><?php echo e($vendr->company_name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </select>
                                                    <div class="iconDiv">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </div> 
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form_control_new">  
                                                    <div class="label_head">&nbsp;</div>
                                                    <div class="input-group"> 
                                                        <a type="button" class="btn btn-primary" onclick="addServ()">Add More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 marginTop20">
                                        <div class="form_control_new">
                                            <div class="label_head">Description</div>
                                            <textarea rows="5" name="text_content" class="form-control" placeholder="Enter Description" style="width:100%;height:auto;"><?php echo e($products->text_content); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-box-main-footer-ng">
                        <div class="row">
                            <div class="col-md-offset-4 col-md-4">
                                <input type="button" name="" class="btn-large actionBtn redBg" value="Reset">
                                <button type="submit" class="btn-large actionBtn greenBg">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>    
        </div> 
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.product_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>