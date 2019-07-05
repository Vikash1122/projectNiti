<?php $__env->startSection('content'); ?>
<div class="content">
    <ul class="breadcrumb">
        <li>
        </li>
        <li><a href="#" class="active">Add Employee</a> </li>
     </ul>

                <div class="page-title"> <i class="icon-custom-left"></i>
                    <h3>Add New Employee  <span class="semi-bold">&nbsp;</span></h3>
                </div>
                <?php if(Session::has('message')): ?> 
                    <div class="alert alert-info">
                        <?php echo e(Session::get('message')); ?> 
                    </div> 
                <?php endif; ?>
                <form action="<?php echo e(route('employee.post')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="content-box-main profile_img_sec">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="upProfile_sec">
                                                <div class="form-group form-md-line-input">
                                                    <h4 class="headingH4">Upload Profile Pic</h4>
                                                    <div class="docMainBox profileImgBox">
                                                        <img alt="" id="profile_copy" src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="center-block userImg img-responsive">
                                                    </div>
                                                </div>    
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form_control_new">  
                                                <div class="label_head">Status</div>
                                                <div class="radio radio-primary">
                                                    <input id="Active" type="radio" name="status" value="Active" checked="checked">
                                                    <label for="Active">Active</label>
                                                    <input id="Inactive" type="radio" name="status" value="Inactive" >
                                                    <label for="Inactive">Inactive</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="up_img_pro">
                                                <img alt="" id="profile_copy" src="<?php echo e(asset('public/img/upload-icon.png')); ?>" class="center-block userImg img-responsive">
                                                <div class="uploadProfile">
                                                    <div class="btn default btn-file btn-uploadnew">
                                                    <input type="file" name="emp_profile" onChange="getpic('profile_pic_copy','profile_copy','dl_text',event),OpenFile('profile_pic_copy')" class="form-control imgPrv" id="profile_pic_copy">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="content-box-main">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Employee Role</div>
                                            <select name="emp_role" id="emp_role" style="width:100%" >
                                                <option value="">Select Role</option>
                                                <option value="Surveyor">Surveyor</option>
                                                <option value="Team Leader">Team Leader</option> 
                                                <option value="Driver">Driver</option>
                                                <option value="Helper">Helper</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Service Type</div>
                                            <select class="multiselect" name="service_type[]"  id="staff_type" style="width:100%" multiple>
                                                <option value="">Select Service Type</option>
                                                <?php if(isset($services) && !empty($services)): ?>
                                                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($ser->id); ?>"><?php echo e($ser->service_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div> 
                                </div>  

                                <div class="row">    
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Employee Code</div>
                                            <div class="input-group"> 
                                                <span class="input-group-addon" id="employee_code"><i class="fa fa-user"></i></span> 
                                                <input class="form-control" name="employee_code" id="employee_code" placeholder="Employee Code" aria-describedby="employee_code"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Employee Name</div>
                                            <div class="input-group"> 
                                                <span class="input-group-addon" id="employee_name"><i class="fa fa-user"></i></span> 
                                                <input class="form-control" name="employee_name" id="employee_name" placeholder="Employee Name" aria-describedby="employee_name"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Mobile No.</div>
                                            <div class="input-group "> 
                                                <span class="input-group-addon" id="emp_mobile"><i class="fa fa-phone"></i></span> 
                                                <input class="form-control" type="tel" maxlength="10" minlength="10" name="emp_mobile" id="emp_mobile" placeholder="Mobile No."> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new date_picker">  
                                            <div class="label_head">Date Of Birth</div>
                                            <div class="input-append success date input-group"> 
                                                <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
                                                <input class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Date Of Birth">
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Age</div>
                                            <div class="input-group "> 
                                                <span class="input-group-addon" id="age"><i class="fa fa-arrows-h"></i></span> 
                                                <input class="form-control" name="age" id="age" placeholder="Employee Age"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Email-id</div>
                                            <div class="input-group"> 
                                                <span class="input-group-addon" id="email_id"><i class="fa fa-envelope"></i></span> 
                                                <input class="form-control" name="email_id" id="email_id" placeholder="Email-Id"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>  

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Country</div>
                                            <select name="country" onchange="getCountry()" id="country" name="country" style="width:100%" >
                                                <option value="">Select Country</option>
                                                <?php if(isset($country) && !empty($country)): ?>
                                                    <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cntry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($cntry->name); ?>"><?php echo e($cntry->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">City</div>
                                            <div class="input-group"> 
                                                <span class="input-group-addon" id="city">
                                                    <i class="fa fa-map-pin"></i>
                                                </span> 
                                                <input class="form-control" name="city" id="city" placeholder="Enter City"> 
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Nationality</div>
                                            <select name="nationality" id="nationality" style="width:100%" >
                                                <option value="">Select Nationality</option>
                                                <option value="Indian">Indian</option>
                                                <option value="American">American</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Local Address</div>
                                            <textarea rows="5" name="local_address" class="form-control" placeholder="Enter Local Address"></textarea>
                                        </div>    
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Permanent Address</div>
                                            <textarea rows="5" name="permanent_address" class="form-control" placeholder="Enter Permanent Address"></textarea>
                                        </div>    
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="adBox bg_white hidden" id="driverInfo">
                        <div class="row">    
                            <div class="col-md-12"> 
                                <h4 class="headingH4">Driver Information</h4>
                            </div>
                        </div>  

                        <div class="row">    
                            <div class="col-md-6">
                                <div class="form_control_new">
                                    <label for="vehicle_type" class="label_head">Select Vehicle Type</label>
                                    <div class="input-group"> 
                                        <span class="input-group-addon" id="vehicle_type"><i class="fa fa-rocket"></i></span> 
                                        <select class="form-control" name="vehicle_type" id="vehicle_type" aria-describedby="vehicle_type">
                                            <option value="">Select Vehicle Type</option>
                                            <option value="4 Wheeler">4 Wheeler</option>
                                            <option value="2 Wheeler">2 Wheeler</option>
                                            <option value="Both">Both</option>
                                        </select>
                                    </div>
                                </div>
                            </div>  

                            <div class="col-md-6">
                                <div class="form_control_new">
                                    <label for="licence_type " class="label_head">Select Licence Type</label>
                                    <div class="input-group"> 
                                        <span class="input-group-addon" id="licence_type"><i class="fa fa-file" aria-hidden="true"></i></span> 
                                            <select class="form-control" name="licence_type" id="licence_type" aria-describedby="licence_type">
                                            <option value="">Select Licence Type</option>
                                            <option value="light Vehicle">light Vehicle</option>
                                            <option value="Heavy Vehicle">Heavy Vehicle</option>
                                            <option value="Internation">Internation</option>
                                        </select>
                                    </div>
                                </div>
                            </div> 

                        </div>    

                        <div class="row">
                            

                            <div class="col-md-6">
                                <div class="form_control_new">  
                                    <div class="driving_licence_number label_head">Driving Licence Number</div>
                                    <div class="input-group"> 
                                        <span class="input-group-addon" id="driving_licence_number">
                                            <i class="fa fa-file" aria-hidden="true"></i>
                                        </span> 
                                        <input class="form-control" name="driving_licence_number" id="driving_licence_number" placeholder="Enter Driving Licence Number" aria-describedby="driving_licence_number"> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form_control_new">  
                                    <div class="driving_licence_exp_date label_head">Licence expiry date</div>
                                    <div class="input-group"> 
                                        <span class="input-group-addon" id="driving_licence_exp_date"><i class="fa fa-calendar"></i></span> 
                                        <input class="form-control date-picker" name="licence_exp_date" id="driving_licence_exp_date" placeholder="Enter Driving Licence Number" aria-describedby="driving_licence_exp_date"> 
                                    </div>
                                </div>
                            </div>
                        </div>   
   
                    </div>

                    <div class="adBox bg_white hidden" id="int_Doc">  
                        <div class="row">    
                            <div class="col-md-12"> 
                                <h4 class="headingH4">Additional Information</h4>
                            </div>
                        </div>  

                        <div class="row">    
                            <div class="col-md-6">
                                <div class="form_control_new">  
                                    <div class="driving_licence_exp_date label_head">Passport Number</div>
                                    <div class="input-group"> 
                                        <span class="input-group-addon" id="passport_number"><i class="fa fa-file" aria-hidden="true"></i></span> 
                                        <input class="form-control" name="passport_number" id="passport_number" placeholder="Enter Passport Number"> 
                                    </div>
                                </div>
                            </div>  

                            <div class="col-md-6">
                                <div class="form_control_new date_picker">  
                                    <div class="date_of_birth label_head">Passport expiration</div>
                                    <div class="input-append success date input-group"> 
                                        <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
                                        <input class="form-control" name="passport_exp_date" id="passport_exp_date" placeholder="Enter Passport expiration">
                                    </div>
                                </div>
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form_control_new date_picker">  
                                    <div class="date_of_birth label_head">Visa expiry date</div>
                                    <div class="input-append success date input-group"> 
                                        <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
                                        <input class="form-control" name="visa_expiration" id="visa_expiration" placeholder="Enter Visa expiry date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form_control_new">  
                                    <div class="driving_licence_exp_date label_head">Emirates Id</div>
                                    <div class="input-group"> 
                                        <span class="input-group-addon" id="emirates_id"><i class="fa fa-file" aria-hidden="true"></i></span> 
                                        <input class="form-control" name="emirates_id" id="emirates_id" placeholder="Enter Emirates Id"> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form_control_new">  
                                    <div class="driving_licence_exp_date label_head">Emirates expiration</div>
                                    <div class="input-group"> 
                                        <span class="input-group-addon" id="emirates_exp_date"><i class="fa fa-calendar"></i></span> 
                                        <input class="form-control" name="emirates_exp_date" id="emirates_exp_date" placeholder="Enter Emirates expiration"> 
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>

                    <div class="content-box-main">
                        <div class="doc_up_box">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="headingH4">Upload Documents</h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group form-md-line-input">
                                        <label for="passport_doc">Passport copy </label>
                                        <div class="docMainBox">
                                            <img alt="" id="passport" src="<?php echo e(asset('public/img/upload.png')); ?>" class="center-block userImg img-responsive">
                                            <div class="uploadProfile">
                                                <div class="btn default btn-file btn-uploadnew">
                                                    <input type="file" name="passport_doc" onChange="getpic('passport_doc','passport','passport_doc_text',event),OpenFile('passport_doc')" class="form-control imgPrv" id="passport_doc" placeholder="upload passport copy">
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-md-line-input">
                                        <label for="visa_doc">Visa copy</label>
                                        <div class="docMainBox">
                                            <img alt="" id="visa" src="<?php echo e(asset('public/img/upload.png')); ?>" class="center-block userImg img-responsive">
                                            <div class="uploadProfile">
                                                <div class="btn default btn-file btn-uploadnew">
                                                   <input type="file" name="visa_doc" onChange="getpic('visa_doc','visa','visa_doc_text',event),OpenFile('visa_doc')" class="form-control imgPrv" id="visa_doc">
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-md-line-input">
                                        <label for="emirates_id_copy">Emirates copy</label>
                                        <div class="docMainBox">
                                            <img alt="" id="emirates" src="<?php echo e(asset('public/img/upload.png')); ?>" class="center-block userImg img-responsive">
                                            <div class="uploadProfile">
                                                <div class="btn default btn-file btn-uploadnew">
                                                    <input type="file" name="emirates_id_copy" onChange="getpic('emirates_id_copy','emirates','emirates_text',event),OpenFile('emirates_id_copy')" class="form-control imgPrv" id="emirates_id_copy">
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-md-line-input">
                                        <label for="profile_pic">Driving Licence copy</label>
                                        <div class="docMainBox">
                                            <img alt="" id="dl_copy" src="<?php echo e(asset('public/img/upload.png')); ?>" class="center-block userImg img-responsive">
                                            <div class="uploadProfile">
                                                <div class="btn default btn-file btn-uploadnew">
                                                <input type="file" name="driving_licence_copy" onChange="getpic('driving_licence_copy','dl_copy','dl_text',event),OpenFile('driving_licence_copy')" class="form-control imgPrv" id="driving_licence_copy" placeholder="upload passport copy">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-danger">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.emp_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>