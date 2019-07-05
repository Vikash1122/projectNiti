<?php $__env->startSection('css'); ?>
<style>
   
    .has-error .form-control1{
        border-color: #f35958 !important; 
     }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="page-title"> 
        <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
            <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
        </a>
        <h3>Edit Vendor  <span class="semi-bold">&nbsp;</span></h3>
        <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Edit Vendor</h3></div>
    </div>

    <div class="content-box-main-ng marginBottom0">
        <h3 class="text-center">Edit Vendor</h3>
        <form id="msform" method="post" action="<?php echo e(url('admin/vendors/edit/'.$id)); ?>" enctype=multipart/form-data novalidate>
            <?php echo e(csrf_field()); ?> 
            <div class="content-box-main-vdr">
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <h4 class="text-center paddingBottom30">Upload Image</h4>
                        <div class="row">
                            <div class="col-md-6 vdrDiv">
                                <div class="upProfile_sec">
                                    <div class="form-group form-md-line-input">
                                        <div class="docMainBox profileImgBox borderVdrProfile">
                                            <?php if(isset($vendor->profile_img) && !empty($vendor->profile_img)): ?>
                                                <img alt="" id="profile_copy" src="<?php echo e(fileurlVendor().$vendor->profile_img); ?>" class="center-block userImg img-responsive">
                                            <?php else: ?>
                                                <img alt="" id="profile_copy" src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="center-block userImg img-responsive">
                                            <?php endif; ?>
                                            
                                            <div class="up_img_pro" style="width:60px;margin:10px auto;display:block;">
                                                <!-- <img alt="" id="profile_copy" src="<?php echo e(asset('public/img/upload-icon.png')); ?>" class="center-block userImg img-responsive"> -->
                                                <div class="uploadProfile">
                                                    <div class="btn default btn-file btn-uploadnew">
                                                    <input type="file" name="profile_img" onChange="getpic('profile_pic_copy','profile_copy','dl_text',event),OpenFile('profile_pic_copy')" class="form-control imgPrv" id="profile_pic_copy">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h5>Contact Person Photo</h5>
                                    </div>    
                                </div>
                            </div>

                            <div class="col-md-6 vdrDiv">
                                <div class="upProfile_sec">
                                    <div class="form-group form-md-line-input">
                                        <div class="docMainBox profileImgBox greenBg borderVdrLogo">
                                            <?php if(isset($vendor->company_logo) && !empty($vendor->company_logo)): ?>
                                            <img alt="" id="company_logo" src="<?php echo e(fileurlVendor().'logo/'.$vendor->company_logo); ?>" class="center-block userImg img-responsive">
                                            <?php else: ?>
                                            <img alt="" id="company_logo" src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="center-block userImg img-responsive">
                                            <?php endif; ?>
                                            
                                            <div class="up_img_pro" style="width:60px;margin:10px auto;display:block;">
                                                <!-- <img alt="" id="profile_copy" src="<?php echo e(asset('public/img/upload-icon.png')); ?>" class="center-block userImg img-responsive"> -->
                                                <div class="uploadProfile">
                                                    <div class="btn default btn-file btn-uploadnew">
                                                    <input type="file" name="company_logo" onChange="getpic('company_logo_copy','company_logo','dl_text',event),OpenFile('company_logo_copy')" class="form-control imgPrv" id="company_logo_copy">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="greenColor">Company Logo</h5>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <h4 class="text-center paddingBottom30">Contact Person Details</h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="form_control_new">  
                                    <div class="label_head">Person’s Name</div>
                                    <input class="form-control focus1" name="contact_person_name" value="<?php echo e($vendor->contact_person_name); ?>" id="contact_person_name" placeholder="Enter Contact Person’s Name" required> 
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                    <div class="messages"></div>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <div class="form_control_new">  
                                    <div class="label_head">Designation</div>
                                    <input class="form-control focus1" name="designation" value="<?php echo e($vendor->designation); ?>" id="designation" placeholder="Enter Designation"> 
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                    <div class="messages"></div>                                   
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="form_control_new">  
                                    <div class="label_head">Mobile Number</div>
                                    <input class="form-control focus1" name="mobile" value="<?php echo e($vendor->mobile); ?>" id="mobile" placeholder="Enter Mobile Number" required> 
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div> 
                                    <div class="messages"></div>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <div class="form_control_new">  
                                    <div class="label_head">Email</div>
                                    <input class="form-control focus1" name="contact_person_email" value="<?php echo e($vendor->contact_person_email); ?>" id="contact_person_email" placeholder="Enter Email Address" required> 
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                    <div class="messages"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">   
                            <div class="col-md-6">
                                <div class="form_control_new">  
                                    <div class="label_head">Emirates ID Number</div>
                                    <input class="form-control" name="emirates_id" value="<?php echo e($vendor->emirates_id); ?>" id="emirates_id" placeholder="Enter Emirates ID Number" required>
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                    <!-- <div class="messages"></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <h4 class="text-center paddingBottom30">Company Details</h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="form_control_new">  
                                    <div class="label_head">Company Name</div>
                                    <input class="form-control focus1" name="company_name" value="<?php echo e($vendor->company_name); ?>" id="company_name" placeholder="Enter Company Name" required>
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                    <div class="messages"></div>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <div class="form_control_new">  
                                    <div class="label_head">Registration No</div>
                                    <input class="form-control focus1" name="registration_no" value="<?php echo e($vendor->registration_no); ?>" id="registration_no" placeholder="Enter Number" required>
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                    <div class="messages"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="form_control_new">  
                                    <div class="label_head">Owner Name</div>
                                    <input class="form-control focus1" name="owner_name" value="<?php echo e($vendor->owner_name); ?>" id="owner_name" placeholder="Enter Owner Name" required> 
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                    <div class="messages"></div>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <div class="form_control_new">  
                                    <div class="label_head">Email</div>
                                    <input type="email" class="form-control focus1" name="email" value="<?php echo e($vendor->email); ?>" id="email" placeholder="Enter Email Address" required>
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                    <div class="messages"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form_control_new">  
                                    <div class="label_head">Fax Number</div>
                                    <input class="form-control" name="fax_no" value="<?php echo e($vendor->fax_no); ?>" id="fax_no" placeholder="Enter Fax Number"> 
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                   <!--  <div class="messages"></div> -->
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <div class="form_control_new">  
                                    <div class="label_head">Company Mobile Number</div>
                                    <input class="form-control focus1" name="company_mobile" value="<?php echo e($vendor->company_mobile); ?>" id="company_mobile" placeholder="Enter Number" required> 
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                    <div class="messages"></div>
                                </div>
                            </div>
                        </div> 

                        <div class="row">  
                            <div class="col-md-6 form-group">
                                <div class="form_control_new">  
                                    <div class="label_head">Company Address</div>
                                    <textarea name="address" rows="4" class="form-control focus1" placeholder="Enter Company Address" style="height:auto !important;" required><?php echo e($vendor->address); ?></textarea>
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                    <div class="messages"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form_control_new">  
                                    <div class="label_head">Warehouse  Address</div>
                                    <textarea rows="4" name="warehouse_addr" class="form-control" placeholder="Enter Warehouse Address" style="height:auto !important;"><?php echo e($vendor->warehouse_addr); ?></textarea>
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                  <!--   <div class="messages"></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <h4 class="text-center paddingBottom30 marginTop40">Service Information</h4>
                        <div id="appendDtata">
                            <?php if(isset($vendor->selected_services[0]) && !empty($vendor->selected_services[0])): ?>
                            <?php $__currentLoopData = $vendor->selected_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$serv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <div class="form_control_new">
                                    <div class="row marginBottom20">
                                        <div class="col-md-6  form-group fff">
                                            <div class="form_control_new">  
                                            <div class="label_head">Select Service</div>
                                                <select name="service_id[]" id="sService_type"  class="form-control" required>
                                                    <option value="">Select Services</option>
                                                    <?php if(isset($services) && !empty($services)): ?>
                                                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($ser->id); ?>" <?php if($serv->service_id == $ser->id){ echo "selected";}else{ echo "";}?>><?php echo e($ser->service_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                                <div class="iconDiv greenq">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </div>
                                                <div class="messages1"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form_control_new">  
                                                <div class="label_head">Select Sub Service</div>
                                                <select name="sub_service_id[]" id="subService_type"  class="form-control" required>
                                                    <option value="">Select Sub Service</option>
                                                    <?php if(isset($subservices) && !empty($subservices)): ?>
                                                    <?php $__currentLoopData = $subservices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($sub->id); ?>" <?php if($serv->sub_service_id == $sub->id){ echo "selected";}else{ echo "";}?>><?php echo e($sub->sub_service_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                                <div class="iconDiv">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form_control_new"> 
                                                <div class="label_head">Select Category</div>
                                                <select class="multiselect<?=$k;?> form-control form-control1" name="category_id_0[]" id="category_id"  multiple required>
                                                    <option value="">Select Product Type</option>
                                                    <?php $arr = array();
                                                    $arr = explode(',',$serv->category_id); 
                                                    ?>
                                                    <?php if(isset($categories) && !empty($categories)){
                                                    foreach($categories as $cat){
                                                        $selected = (in_array($cat->id, $arr) == 0) ? '' : 'selected="selected"' ; 
                                                        ?> 
                                                        <option <?= $selected; ?> value="<?php echo e($cat->id); ?>" ><?php echo e($cat->name); ?></option>
                                                    <?php }} ?>
                                                </select> 
                                                <div class="iconDiv">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </div>
                                            </div>    
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form_control_new">
                                                <div class="label_head">&nbsp;</div>
                                                <button type="button" onclick="addServ();" class="btn btn-cons greenBg textWhite">Add More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?> 
                                <div class="form_control_new">
                                    <div class="row marginBottom20">
                                        <div class="col-md-6 form-group fff">
                                            <div class="form_control_new">  
                                            <div class="label_head">Select Service</div>
                                                <select name="service_id[]" id="sService_type"  class="form-control" required>
                                                    <option value="">Select Services</option>
                                                    <?php if(isset($services) && !empty($services)): ?>
                                                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($ser->id); ?>"><?php echo e($ser->service_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                                <div class="iconDiv greenq">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </div>
                                                <div class="messages1"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form_control_new">  
                                                <div class="label_head">Select Sub Service</div>
                                                <select name="sub_service_id[]" id="subService_type"  class="form-control" >
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
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form_control_new"> 
                                                <div class="label_head">Select Category</div>
                                                <select class="multiselect form-control form-control1" name="category_id_0[]" id="category_id"  multiple required>
                                                    <option value="">Select Product Type</option>
                                                    <?php if(isset($categories) && !empty($categories)): ?>
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select> 
                                                <div class="iconDiv greenq1">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </div>
                                               <!--  <div class="messages11"></div> -->
                                            </div>    
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form_control_new">
                                                <div class="label_head">&nbsp;</div>
                                                <button type="button" onclick="addServ();" class="btn btn-cons greenBg textWhite">Add More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>        
                <hr>

                <div class="row">
                    <div class="col-md-offset-2 col-md-8 paddingBottom30">
                        <h4 class="text-center paddingBottom30">Payment Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form_control_new">  
                                    <div class="label_head">Select Payment Terms</div>
                                    <select name="payment_term" id="payment_term"  class="form-control">
                                        <option <?php if(isset($vendor->payment_term) && !empty($vendor->payment_term) && $vendor->payment_term == "15 Days"){echo "selected";}else{echo "";}?> value="15 Days">15 Days</option>
                                        <option <?php if(isset($vendor->payment_term) && !empty($vendor->payment_term) && $vendor->payment_term == "30 Days"){echo "selected";}else{echo "";}?> value="30 Days">30 Days</option>
                                        <option <?php if(isset($vendor->payment_term) && !empty($vendor->payment_term) && $vendor->payment_term == "Others"){echo "selected";}else{echo "";}?> value="Others">Others</option>
                                    </select>
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                   <!--  <div class="messages"></div> -->
                                </div>    
                            </div>

                            <div class="col-md-6">
                                <div class="form_control_new">  
                                    <div class="label_head">Select Payment Method</div>
                                    <select name="payment_method" id="payment_method"  class="form-control" placeholder="Select Payment Method">
                                        <option <?php if(isset($vendor->payment_method) && !empty($vendor->payment_method) && $vendor->payment_method == "Cash"){echo "selected";}else{echo "";}?> value="Cash">Cash</option>
                                        <option <?php if(isset($vendor->payment_method) && !empty($vendor->payment_method) && $vendor->payment_method == "DD"){echo "selected";}else{echo "";}?> value="DD">DD</option>
                                        <option <?php if(isset($vendor->payment_method) && !empty($vendor->payment_method) && $vendor->payment_method == "Both"){echo "selected";}else{echo "";}?> value="Both">Both</option>
                                    </select>
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                    <!-- <div class="messages"></div> -->
                                </div> 
                            </div>

                            <div class="col-md-6 form-group">
                                <div class="form_control_new">  
                                    <div class="label_head">Enter Tax Registration Number</div>
                                    <input name="tax_reg_number" id="tax_reg_number" value="<?php echo e($vendor->tax_reg_number); ?>" class="form-control focus1" placeholder="Enter Tax Number">
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                    <div class="messages"></div>
                                </div> 
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="form_control_new">  
                                    <div class="label_head">Bank Name</div>
                                    <input class="form-control focus1" name="bank_name" value="<?php echo e($vendor->bank_name); ?>" id="bank_name" placeholder="Bank Name"> 
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                    <div class="messages"></div>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <div class="form_control_new">  
                                    <div class="label_head">IFSC Code</div>
                                    <input class="form-control focus1" name="ifsc_code" value="<?php echo e($vendor->ifsc_code); ?>" id="ifsc_code" placeholder="IFSC Code"> 
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                    <div class="messages"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="form_control_new">  
                                    <div class="label_head">Branch Code</div>
                                    <input class="form-control focus1" name="branch_code" value="<?php echo e($vendor->branch_code); ?>" id="branch_code" placeholder="Branch Code">
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                    <div class="messages"></div>
                                </div>
                            </div>
                    
                            <div class="col-md-6 form-group">
                                <div class="form_control_new">  
                                    <div class="label_head">Account Number</div>
                                    <input class="form-control focus1" name="account_no" value="<?php echo e($vendor->account_no); ?>" id="account_no" placeholder="Account Number"> 
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                    <div class="messages"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="form_control_new">  
                                    <div class="label_head">Account Holder Name</div>
                                    <input class="form-control focus1" name="account_holder_name" value="<?php echo e($vendor->account_holder_name); ?>" id="account_holder_name" placeholder="Account Holder Name" required>
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                    <div class="messages"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form_control_new"> 
                                    <div class="label_head">Billing Address</div>
                                    <textarea rows="4" class="form-control" name="biling_address" style="height:auto !important;" placeholder="Billing Address" required><?php echo e($vendor->account_holder_name); ?></textarea>
                                    <div class="iconDiv">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                    <!-- <div class="messages"></div> -->
                                </div>
                            </div>
                        </div> 
                        
                    </div>
                </div>
            </div>

            <div class="content-box-main-footer-ng">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <input type="button" name="" class="btn-large actionBtn redBg" value="Reset"/>
                        <!-- <button type="submit" class="submit btn-large actionBtn greenBg" >Submit</button> -->
                        <button type="submit" class="btn-large actionBtn greenBg">Update</button>
                    </div>
                </div>
            </div>
        </form>    
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('public/js/validate.js')); ?>" type="text/javascript"></script>
<script type="text/javascript">
    (function() {
        //alert("aflasdkf");

         validate.extend(validate.validators.datetime, {
        // The value is guaranteed not to be null or undefined but otherwise it
        // could be anything.
        parse: function(value, options) {
          return +moment.utc(value);
        },
        // Input is a unix timestamp
        format: function(value, options) {
          var format = options.dateOnly ? "YYYY-MM-DD" : "YYYY-MM-DD hh:mm:ss";
          return moment.utc(value).format(format);
        }
      });

        var constraints = {
            contact_person_name: {
              presence: true
            },

            mobile: {
              presence: true,
              format: {
                 pattern: "\\d{10}"
               }
            },

            email: {
              presence: true,
              email: true
            },
            contact_person_email: {
              presence: true,
              email: true
            },

             company_name: {
              presence: true
            },

             registration_no: {
              presence: true
            },
            owner_name: {
              presence: true
            },

            designation: {
              presence: true
            },

            company_mobile: {
              presence: true,
              format: {
                 pattern: "\\d{10}"
               }
            },

            address: {
              presence: true,
              length: {
                   
                    maximum: 500
                }
            },
            payment_term: {
              presence: true,
            },

            payment_method: {
              presence: true,
          
            },

            tax_reg_number: {
              presence: true,
            },
            bank_name: {
              presence: true,
            },
            ifsc_code: {
              presence: true,
              length: {
                    minimum: 11,
                    maximum: 11
                }
            },
            branch_code: {
              presence: true,
            },
            account_no: {
              presence: true,
            },
            account_holder_name: {
              presence: true,
            }

        };

     
       var inputs = document.querySelectorAll("input, textarea, select")
       //alert(inputs);
      for (var i = 0; i < inputs.length; ++i) {
        inputs.item(i).addEventListener("change", function(ev) {
          var errors = validate(form, constraints) || {};
          showErrorsForInput(this, errors[this.name])
        });
      }

      // Hook up the form so we can prevent it from being posted
        var form=document.querySelector("form#msform");
         document.querySelector("form#msform")
        .addEventListener("submit", function(ev) {
         ev.preventDefault();
         handleFormSubmit(this);
        });

  function handleFormSubmit(form) {
    // First we gather the values from the form
    var values = validate.collectFormValues(form);
    // then we validate them against the constraints
    var errors = validate(values, constraints);
    //alert("aldsfjkas");
    // then we update the form to reflect the results
    showErrors(form, errors || {});
    // And if all constraints pass we let the user know
    if (!errors) { 
         var abc = $('#sService_type').val();
        if(abc==null || abc=="") {
            $('.greenq').removeClass('successGreen');
             $('.fff').removeClass('has-success');
              $('.fff').addClass('has-error');
             var block = document.createElement("span");
                block.innerHTML = '<span  class="help-block error">Service Type cannot be blank</span>';
                $('.messages1').html(block);
                $('#sService_type').focus();
                return  false;
        }

        document.getElementById('msform').submit();
       
    }else{

       var abc = $('#sService_type').val();
        if(abc==null || abc=="") {
            $('.greenq').removeClass('successGreen');
             $('.fff').removeClass('has-success');
              $('.fff').addClass('has-error');
             var block = document.createElement("span");
                block.innerHTML = '<span  class="help-block error">Service Type cannot be blank</span>';
                $('.messages1').html(block);
                //return  false;
            }
              var emptyAreas = $('.focus1').filter(function(index, element) {
              return $.trim($(element).val()) === '';
            });
            emptyAreas.first().focus();
       
        console.log(errors);
    }
  }
  // Updates the inputs with the validation errors
  function showErrors(form, errors) {
    // We loop through all the inputs and show the errors for that input
    _.each(form.querySelectorAll("input[name], select[name], textarea[name]"), function(input) {
      // Since the errors can be null if no errors were found we need to handle
      // that
      showErrorsForInput(input, errors && errors[input.name]);
    });
  }

  // Shows the errors for a specific input
  function showErrorsForInput(input, errors) {
    //alert(errors);
    // This is the root of the input
    var formGroup = closestParent(input.parentNode, "form-group");
      // Find where the error messages will be insert into
    if(formGroup!=null){
     var  messages = formGroup.querySelector(".messages");
    // First we remove any old messages and resets the classes
        var messages1 = formGroup.querySelector(".iconDiv");
    resetFormGroup(formGroup);
    // If we have errors
    if (errors) {
      // we first mark the group has having errors
      formGroup.classList.add("has-error");
      // then we append all the errors
      _.each(errors, function(error) {
        addError(messages,messages1, error);
      });
    } else {
      // otherwise we simply mark it as success
       $(messages).removeClass("has-error");
         // $(messages1).removeClass("redBg");
          formGroup.classList.add("has-success");
         $(messages1).addClass("successGreen");
    }
    }
  }

  // Recusively finds the closest parent that has the specified class
  function closestParent(child, className) {
    if (!child || child == document) {
      return null;
    }
    if (child.classList.contains(className)) {
      return child;
    } else {
      return closestParent(child.parentNode, className);
    }
  }

  function resetFormGroup(formGroup) {
    // Remove the success and error classes
    formGroup.classList.remove("has-error");
    formGroup.classList.remove("has-success");
    // and remove any old messages
    _.each(formGroup.querySelectorAll(".help-block.error"), function(el) {
      el.parentNode.removeChild(el);
    });
  }

  // Adds the specified error with the following markup
  // <p class="help-block error">[message]</p>
  function addError(messages,messages1, error) {
    var block = document.createElement("span");
    block.classList.add("help-block");
    block.classList.add("error");
    block.innerHTML = error;
    messages.appendChild(block);
    $(messages1).removeClass("successGreen");
    //$(messages1).addClass("redBg");
        
  }

  function showSuccess() {
    // We made it \:D/
    alert("Success!");
  }
})();

$('#sService_type').on('change', function() {
    var abc = $('#sService_type').val();
    //alert(abc);
    if(abc==null || abc=="") {
        $('.greenq').removeClass('successGreen');
            $('.fff').removeClass('has-success');
            $('.fff').addClass('has-error');
            var block = document.createElement("span");
        block.innerHTML = '<span  class="help-block error">Service Type cannot be blank</span>';
            $('.messages1').html(block);
    }else{
            $('.greenq').addClass('successGreen');
        $('.messages1').html('');
    }
});

$('#sService_type').on('change', function() {
    var abc = $('#sService_type').val();
    if(abc==null || abc=="") {
        $('.greenq').removeClass('successGreen');
            $('.fff').removeClass('has-success');
            $('.fff').addClass('has-error');
            var block = document.createElement("span");
        block.innerHTML = '<span  class="help-block error">Service Type cannot be blank</span>';
            $('.messages1').html(block);
    }else{
        $('.messages1').html('');
    }
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.vendor_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>