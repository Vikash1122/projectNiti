

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-title"> 
            <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
                <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
            </a>
            <h3>Product  <span class="semi-bold">&nbsp;</span></h3>
            <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Add New Product</h3></div>
        </div>

        <div class="content-box-main-ng marginBottom0">
            <h3 class="text-center">Add New Product</h3>
                
            <form action="<?php echo e(route('products.post')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>


                    <div class="content-box-main-vdr">
                        <div class="row">
                            <div class="col-md-offset-4 col-md-4 newEmp-ng">
                                <h4 class="text-center paddingBottom30">Upload Inventory Photo</h4>
                                <div class="upProfile_sec bgNone">
                                    <div class="form-group form-md-line-input">
                                        <div class="docMainBox profileImgBox">
                                            <img alt="" id="product_copy" src="<?php echo e(asset('public/img/defaultInventory.png')); ?>" class="center-block userImg img-responsive">
                                        
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
                                                    <option value="<?php echo e($ser->id); ?>"><?php echo e($ser->service_name); ?></option>
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
                                                    <option value="<?php echo e($sub->id); ?>"><?php echo e($sub->sub_service_name); ?></option>
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
                                                        <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
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
                                            <input class="form-control" name="product_name" id="product_name" placeholder="Product Name" required>   
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
                                            <input class="form-control" name="product_code" id="product_code" placeholder="Product Code" required> 
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
                                                <?php if(isset($services) && !empty($services)): ?>
                                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($ser->id); ?>"><?php echo e($ser->service_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                            <div class="iconDiv">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div> 
                                        </div>
                                    </div>
                                </div> 

                                <div id="appendDtata">
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
                                                                <option value="<?php echo e($bd->id); ?>"><?php echo e($bd->brand_name); ?></option>
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
                                                    <input class="form-control" name="qty[]" id="qty" placeholder="Quantity" required> 
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
                                                    <input class="form-control" name="price[]" id="price" placeholder="Price" required> 
                                                    <div class="iconDiv">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </div> 
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form_control_new">  
                                                    <div class="label_head"> Selling Price</div>
                                                    <input class="form-control" name="selling_price[]" id="selling_price" placeholder="Selling Price" required> 
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
                                                    <input class="form-control" name="custom_price[]" id="custom_price" placeholder="Custom Price" required> 
                                                    <div class="iconDiv">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </div> 
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form_control_new">  
                                                    <div class="label_head">Availability Days</div>
                                                    <input class="form-control" name="availability_days[]" id="availability_days" placeholder="Availability Days" required> 
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
                                                                <option value="<?php echo e($vendr->id); ?>"><?php echo e($vendr->company_name); ?></option>
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
                                </div>

                                <div class="row">
                                    <div class="col-md-12 marginTop20">
                                        <div class="form_control_new">
                                            <div class="label_head">Description</div>
                                            <textarea rows="5" name="text_content" class="form-control" placeholder="Enter Description" style="width:100%;height:auto;"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="row">
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-danger">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div> -->

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


                    <!-- <div class="row"> -->
                        <!-- <div class="col-md-3"> -->
                            <!-- <div class="content-box-main profile_img_sec">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="upProfile_sec">
                                                <div class="form-group form-md-line-input">
                                                    <h4 class="headingH4">Upload Product Image</h4>
                                                    <div class="docMainBox productImgBox">
                                                        <img alt="" id="product_copy" src="<?php echo e(asset('public/img/default_icon.png')); ?>" class="center-block img-responsive">
                                                    </div>
                                                </div>    
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-offset-4 col-md-4">
                                            <div class="up_img_pro product_img">
                                                <img alt="" id="product_copy" src="<?php echo e(asset('public/img/upload-icon.png')); ?>" class="center-block userImg img-responsive">
                                                <div class="uploadProfile">
                                                    <div class="btn default btn-file btn-uploadnew">
                                                    <input type="file" name="product_img" onChange="getpic('product_pic_copy','product_copy','dl_text',event),OpenFile('product_pic_copy')" class="form-control imgPrv" id="product_pic_copy">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div> -->
                        <!-- </div> -->

                        <!-- <div class="col-md-9"> -->
                            <!-- <div class="content-box-main"> -->
                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Service Type</div>   
                                            <select name="service_id" id="sService_type"  style="width:100%" required>
                                                <option value="">Select Services</option>
                                                <?php if(isset($services) && !empty($services)): ?>
                                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($ser->id); ?>"><?php echo e($ser->service_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Sub Service Type</div>   
                                            <select name="sub_service_id" id="subService_type"  style="width:100%" >
                                                <option value="">Select Sub Service</option>
                                                <?php if(isset($subservices) && !empty($subservices)): ?>
                                                <?php $__currentLoopData = $subservices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($sub->id); ?>"><?php echo e($sub->sub_service_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Product Category</div>
                                                <select name="category_id" id="category_id" style="width:100%" >
                                                    <option value="">Select Product Type</option>
                                                <?php if(isset($categories) && !empty($categories)): ?>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                </select>
                                        </div> 
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                        <div class="label_head">Product Name</div>
                                            <div class="input-group"> 
                                                <span class="input-group-addon" id="product_name"><i class="fa fa-user"></i></span> 
                                                <input class="form-control" name="product_name" id="product_name" placeholder="Product Name" style="width:100%" required> 
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                    

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Product Code</div>
                                            <div class="input-group"> 
                                                <span class="input-group-addon" id="product_code"><i class="fa fa-user"></i></span> 
                                                <input class="form-control" name="product_code" id="product_code" placeholder="Product Code" required>  
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Use another Services</div>   
                                            <select class="multiselect" name="another_servId[]" id="another_servId"  style="width:100%" multiple>
                                                <option value="">Select another Services</option>
                                                <?php if(isset($services) && !empty($services)): ?>
                                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($ser->id); ?>"><?php echo e($ser->service_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>    -->
                                
                                <!-- <div class="row"> 
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Use another Services</div>   
                                            <select class="multiselect" name="another_servId[]" id="another_servId"  style="width:100%" multiple>
                                                <option value="">Select another Services</option>
                                                <?php if(isset($services) && !empty($services)): ?>
                                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($ser->id); ?>"><?php echo e($ser->service_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>

                                        </div>
                                    </div>

                                    
                                </div>   -->

                                <!-- <div id="appendDtata">
                                    <div class="order_history_box" >
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form_control_new">  
                                                    <div class="label_head">Brand Name </div>
                                                    <div class="form-group"> 
                                                        <select name="brand_id[]" id="brand_name1"  style="width:100%" required>
                                                            <option value="">Select Brands</option>
                                                            <?php if(isset($brands) && !empty($brands)): ?>
                                                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($bd->id); ?>"><?php echo e($bd->brand_name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </select>
                                                        <!-- <span>Havells</span>  --/>
                                                    
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form_control_new">  
                                                    <div class="label_head">Quantity</div>
                                                    <div class="input-group"> 
                                                        <span class="input-group-addon" id="qty"><i class="fa fa-user"></i></span> 
                                                        <input class="form-control" name="qty[]" id="qty" placeholder="Quantity" required> 
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form_control_new">  
                                                    <div class="label_head"> Price</div>
                                                    <div class="input-group"> 
                                                        <span class="input-group-addon" id="price"><i class="fa fa-user"></i></span> 
                                                        <input class="form-control" name="price[]" id="price" placeholder="Price" required> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form_control_new">  
                                                    <div class="label_head">Availability Days</div>
                                                    <div class="input-group"> 
                                                        <span class="input-group-addon" id="availability_days"><i class="fa fa-user"></i></span> 
                                                        <input class="form-control" name="availability_days[]" id="availability_days" placeholder="Availability Days" required> 
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form_control_new">  
                                                    <div class="label_head">Vendors</div>
                                                    <select class="multiselect1" name="vendor_id[]" id="vendor_id" style="width:100%" multiple required>
                                                        <option value="">Select Vendors</option>
                                                        <?php if(isset($vendors[0]) && !empty($vendors[0])): ?>
                                                            <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($vendr->id); ?>"><?php echo e($vendr->company_name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form_control_new">  
                                                    <div class="label_head">&nbsp;</div>
                                                    <div class="input-group"> 
                                                        <a type="button" class="btn btn-primary" onclick="addServ()">Add More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form_control_new">
                                            <div class="label_head">Description</div>
                                            <textarea rows="5" name="text_content" class="form-control" placeholder="Enter Description"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <hr /> -->

                                <!-- <div class="row">
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-danger">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div> -->
                        <!-- </div> -->
                        <!-- </div> -->



                        <!-- <div class="row">

                                <div class="col-md-2">
                                    <div class="form_control_new">  
                                        <div class="label_head">Brand Name </div>
                                        <div class="form-group"> 
                                            <span>Voltes</span> 
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form_control_new">  
                                        <div class="label_head">Quantity</div>
                                        <div class="input-group"> 
                                            <span class="input-group-addon" id="qty"><i class="fa fa-user"></i></span> 
                                            <input class="form-control" name="qty[]" id="qty" placeholder="Quantity"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form_control_new">  
                                        <div class="label_head"> Price</div>
                                        <div class="input-group"> 
                                            <span class="input-group-addon" id="price"><i class="fa fa-user"></i></span> 
                                            <input class="form-control" name="price[]" id="price" placeholder="Price"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form_control_new">  
                                        <div class="label_head">Availability Days</div>
                                        <div class="input-group"> 
                                            <span class="input-group-addon" id="availability_days"><i class="fa fa-user"></i></span> 
                                            <input class="form-control" name="availability_days[]" id="availability_days" placeholder="Availability Days"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form_control_new">  
                                        <div class="label_head">Vendors</div>
                                        <select class="multiselect" name="vendor_id[]" id="vendor_name2"  style="width:100%" multiple>
                                        
                                            <option value="">Select Vendors</option>
                                            <option value="Ashish">Ashish</option>
                                            <option value="Amandeep">Amandeep</option>
                                            <option value="Abid">Abid</option>                                                
                                            <option value="Sanesh">Sanesh</option>
                                        </select>
                                    </div>
                                </div>
                        </div> -->


                                
                                
                                
                        
                    <!-- </div> -->
                <!-- </div> -->
            <!-- </div> -->
            </form>
        </div>    
               
    </div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.product_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>