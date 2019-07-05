<?php $__env->startSection('content'); ?>
            <div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">Edit Employee Details</a> </li>
                </ul>

                <div class="page-title"> <i class="icon-custom-left"></i>
                    <h3>Edit Employee Details  <span class="semi-bold">&nbsp;</span></h3>
                </div>
                <form action="<?php echo e(url('admin/employees/update/'.$id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                <?php if(Session::has('message')): ?> 
                    <div class="alert alert-info">
                        <?php echo e(Session::get('message')); ?> 
                    </div> 
                <?php endif; ?>
                    <div class="col-md-3">
                        <div class="content-box-main profile_img_sec">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="upProfile_sec">
                                            <div class="form-group form-md-line-input">
                                                <h4 class="headingH4">Upload Profile Pic</h4>
                                                <div class="docMainBox profileImgBox">
                                                <?php if(isset($employee->emp_profile) && !empty($employee->emp_profile)): ?>
                                                    <img alt="" id="profile_copy" src="<?php echo e(fileurlemp().$employee->emp_profile); ?>" class="center-block userImg img-responsive">
                                                <?php else: ?>
                                                    <img alt="" id="profile_copy" src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="center-block userImg img-responsive">
                                                <?php endif; ?>
                                                 <!-- <div class="uploadProfile">
                                                        <div class="btn default btn-file btn-uploadnew">
                                                        <input type="file" onChange="getpic('profile_pic_copy','profile_copy','dl_text',event),OpenFile('profile_pic_copy')" class="form-control imgPrv" id="profile_pic_copy">
                                                        </div>
                                                    </div> -->
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
                                                <input id="Active" type="radio" name="status" value="Active" <?php if(isset($employee->status) && !empty($employee->status) && $employee->status == 'Active'){echo "checked"; }else{ echo "";}?> >
                                                <label for="Active">Active</label>
                                                <input id="Inactive" type="radio" name="status" <?php if(isset($employee->status) && !empty($employee->status) && $employee->status == 'Inactive'){echo "checked"; }else{ echo "";}?> value="Inactive" >
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
                                            <select name="emp_role" id="emp_role" style="width:100%" required>
                                                <option <?php if(isset($employee->emp_role) && !empty($employee->emp_role) && $employee->emp_role == ''){echo "selected"; }else{ echo "";}?> value="">Select Role</option>
                                                <option <?php if(isset($employee->emp_role) && !empty($employee->emp_role) && $employee->emp_role == 'Surveyor'){echo "selected"; }else{ echo "";}?> value="Surveyor">Surveyor</option>
                                                <option <?php if(isset($employee->emp_role) && !empty($employee->emp_role) && $employee->emp_role == 'Team Leader'){echo "selected"; }else{ echo "";}?> value="Team Leader">Team Leader</option> 
                                                <option <?php if(isset($employee->emp_role) && !empty($employee->emp_role) && $employee->emp_role == 'Driver'){echo "selected"; }else{ echo "";}?> value="Driver">Driver</option>
                                                <option <?php if(isset($employee->emp_role) && !empty($employee->emp_role) && $employee->emp_role == 'Helper'){echo "selected"; }else{ echo "";}?> value="Helper">Helper</option>
                                            </select>
                                        </div>
                                    </div>
                             
                                <div class="col-md-6">
                                    <div class="form_control_new">  
                                        <div class="label_head">Service Type</div>
                                        <?php if(isset($employee->empSer[0]) && !empty($employee->empSer[0])): ?>
                                        <?php $__currentLoopData = $employee->empSer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="select2-search-choice">    
                                        <div>Plumbing</div>    
                                        <a href="#" onclick="return false;" class="select2-search-choice-close" tabindex="-1"></a>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <select class="multiselect" name="service_type[]" id="staff_type" style="width:100%" multiple required>
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
                                            <input class="form-control"  name="employee_code" id="employee_code" required value="<?php echo e($employee->employee_code); ?>" aria-describedby="employee_code"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form_control_new">  
                                        <div class="label_head">Employee Name</div>
                                        <div class="input-group"> 
                                            <span class="input-group-addon" id="employee_name"><i class="fa fa-user"></i></span> 
                                            <input class="form-control" name="employee_name" id="employee_name" required Value="<?php echo e($employee->employee_name); ?>" aria-describedby="employee_name"> 
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
                                            <input class="form-control" minlength="10" maxlength="10" name="emp_mobile" required id="emp_mobile" value="<?php echo e($employee->emp_mobile); ?>"> 
                                        </div>
                                    </div>
                                </div> 

                                <div class="col-md-6">
                                    <div class="form_control_new date_picker">  
                                        <div class="label_head">Date Of Birth</div>
                                        <div class="input-append success date input-group"> 
                                            <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
                                            <input class="form-control" name="date_of_birth" id="date_of_birth" required value="<?php echo e(date('d-m-Y', strtotime($employee->date_of_birth))); ?>">
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
                                            <input class="form-control" name="age" id="age" required value="<?php echo e($employee->age); ?>"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form_control_new">  
                                        <div class="label_head">Email-id</div>
                                        <div class="input-group"> 
                                            <span class="input-group-addon" id="email_id"><i class="fa fa-envelope"></i></span> 
                                            <input class="form-control" name="email_id" id="email_id" required value="<?php echo e($employee->email_id); ?>"> 
                                        </div>
                                    </div>
                                </div>
                                
                            </div> 

                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Country</div>
                                            <select name="country" id="country" name="country" required style="width:100%" >
                                                <option value="">Select Country</option>
                                                <?php if(isset($country) && !empty($country)): ?>
                                                    <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cntry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php //if(isset($employee->country) && !empty($employee->country) && ($employee->country == $cntry->name )){echo "selected"; }else{ echo "";}?> value="<?php echo e($cntry->name); ?>"><?php echo e($cntry->name); ?></option>
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
                                                <input class="form-control" name="city" required id="city" value="<?php echo e($employee->city); ?>" placeholder="Enter City"> 
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Nationality</div>
                                            <select name="nationality" id="nationality" required style="width:100%" >
                                                <option <?php if(isset($employee->nationality) && !empty($employee->nationality) && ($employee->nationality == '')){echo "selected"; }else{ echo "";}?> value="">Select Nationality</option>
                                                <option <?php if(isset($employee->nationality) && !empty($employee->nationality) && ($employee->nationality == 'Indian')){echo "selected"; }else{ echo "";}?> value="Indian">Indian</option>
                                                <option <?php if(isset($employee->nationality) && !empty($employee->nationality) && ($employee->nationality == 'American')){echo "selected"; }else{ echo "";}?> value="American">American</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Local Address</div>
                                            <textarea rows="5" name="local_address" required class="form-control" placeholder="Enter Local Address"><?php echo e($employee->local_address); ?></textarea>
                                        </div>    
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Permanent Address</div>
                                            <textarea rows="5" name="permanent_address" required class="form-control" placeholder="Enter Permanent Address"><?php echo e($employee->permanent_address); ?></textarea>
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
                                        <option <?php if(isset($employee->vehicle_type) && !empty($employee->vehicle_type) && ($employee->vehicle_type == '')){echo "selected"; }else{ echo "";}?> value="">Select Vehicle Type</option>
                                        <option <?php if(isset($employee->vehicle_type) && !empty($employee->vehicle_type) && ($employee->vehicle_type == '4 Wheeler')){echo "selected"; }else{ echo "";}?> value="4 Wheeler">4 Wheeler</option>
                                        <option <?php if(isset($employee->vehicle_type) && !empty($employee->vehicle_type) && ($employee->vehicle_type == '2 Wheeler')){echo "selected"; }else{ echo "";}?> value="2 Wheeler">2 Wheeler</option>
                                        <option <?php if(isset($employee->vehicle_type) && !empty($employee->vehicle_type) && ($employee->vehicle_type == 'Both')){echo "selected"; }else{ echo "";}?> value="Both">Both</option>
                                    </select>
                                </div>
                            </div>
                        </div>  

                        <div class="col-md-6">
                            <div class="form_control_new">
                                <label for="vehicle_name" class="label_head">Select Vehicle Name</label>
                                <div class="input-group"> 
                                    <span class="input-group-addon" id="vehicle_name"><i class="fa fa-rocket"></i></span> 
                                    <select class="form-control" name="vehicle_name" id="vehicle_name" aria-describedby="vehicle_name">
                                        <option <?php if(isset($employee->vehicle_name) && !empty($employee->vehicle_name) && ($employee->vehicle_name == '')){echo "selected"; }else{ echo "";}?> value="">Vehicle Name</option>
                                        <option <?php if(isset($employee->vehicle_name) && !empty($employee->vehicle_name) && ($employee->vehicle_name == 'BMW')){echo "selected"; }else{ echo "";}?> value="BMW">BMW</option>
                                        <option <?php if(isset($employee->vehicle_name) && !empty($employee->vehicle_name) && ($employee->vehicle_name == 'Audi')){echo "selected"; }else{ echo "";}?> value="Audi">Audi</option>
                                        <option <?php if(isset($employee->vehicle_name) && !empty($employee->vehicle_name) && ($employee->vehicle_name == 'Skoda')){echo "selected"; }else{ echo "";}?> value="Skoda">Skoda</option>
                                        <option <?php if(isset($employee->vehicle_name) && !empty($employee->vehicle_name) && ($employee->vehicle_name == 'Honda')){echo "selected"; }else{ echo "";}?> value="Honda">Honda</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>    

                    <div class="row">
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

                        <div class="col-md-6">
                            <div class="form_control_new">  
                                <div class="driving_licence_number label_head">Driving Licence Number</div>
                                <div class="input-group"> 
                                    <span class="input-group-addon" id="driving_licence_number"><i class="fa fa-file" aria-hidden="true"></i></span> 
                                    <input class="form-control" name="driving_licence_number" id="driving_licence_number" placeholder="Enter Driving Licence Number" aria-describedby="driving_licence_number"> 
                                </div>
                            </div>
                        </div>
                    </div>   

                    <div class="row">
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
                                    <input class="form-control" name="passport_number" id="passport_number" value="<?php echo e($employee->passport_number); ?>" placeholder="Enter Passport Number"> 
                                </div>
                            </div>
                        </div>  

                        <div class="col-md-6">
                            <div class="form_control_new date_picker">  
                                <div class="date_of_birth label_head">Passport expiration</div>
                                <div class="input-append success date input-group"> 
                                    <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
                                    <input class="form-control" name="passport_exp_date" id="passport_exp_date" value="<?php echo e($employee->passport_exp_date); ?>" placeholder="Enter Passport expiration">
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
                                    <input class="form-control" name="visa_expiration" value="<?php echo e($employee->visa_expiration); ?>" id="visa_expiration" placeholder="Enter Visa expiry date">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form_control_new">  
                                <div class="driving_licence_exp_date label_head">Emirates Id</div>
                                <div class="input-group"> 
                                    <span class="input-group-addon" id="emirates_id"><i class="fa fa-file" aria-hidden="true"></i></span> 
                                    <input class="form-control" value="<?php echo e($employee->emirates_id); ?>" name="emirates_id" id="emirates_id" placeholder="Enter Emirates Id"> 
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
                                    <input class="form-control" value="<?php echo e($employee->emirates_exp_date); ?>" name="emirates_exp_date" id="emirates_exp_date" placeholder="Enter Emirates expiration"> 
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
                                    <?php if(isset($employee->passport_doc) && !empty($employee->passport_doc)): ?>
                                        <img alt="" id="passport" src="<?php echo e(fileurlempdoc().$employee->passport_doc); ?>" class="center-block userImg img-responsive">
                                    <?php else: ?>
                                        <img alt="" id="passport" src="<?php echo e(asset('public/img/upload.png')); ?>" class="center-block userImg img-responsive">
                                    <?php endif; ?>
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
                                    <?php if(isset($employee->visa_doc) && !empty($employee->visa_doc)): ?>
                                        <img alt="" id="visa" src="<?php echo e(fileurlempdoc().$employee->visa_doc); ?>" class="center-block userImg img-responsive">
                                    <?php else: ?>
                                        <img alt="" id="visa" src="<?php echo e(asset('public/img/upload.png')); ?>" class="center-block userImg img-responsive">
                                    <?php endif; ?>
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
                                    <?php if(isset($employee->emirates_id_copy) && !empty($employee->emirates_id_copy)): ?>
                                        <img alt="" id="emirates" src="<?php echo e(fileurlempdoc().$employee->emirates_id_copy); ?>" class="center-block userImg img-responsive">
                                    <?php else: ?>
                                        <img alt="" id="emirates" src="<?php echo e(asset('public/img/upload.png')); ?>" class="center-block userImg img-responsive">
                                    <?php endif; ?>
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
                                    <?php if(isset($employee->driving_licence_copy) && !empty($employee->driving_licence_copy)): ?>
                                        <img alt="" id="dl_copy" src="<?php echo e(fileurlempdoc().$employee->driving_licence_copy); ?>" class="center-block userImg img-responsive">
                                    <?php else: ?>
                                        <img alt="" id="dl_copy" src="<?php echo e(asset('public/img/upload.png')); ?>" class="center-block userImg img-responsive">
                                    <?php endif; ?>
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
                                <button type="submit" id="edittEmp" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                        
                    </div>
                </div>
                </form>
            </div>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.emp_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>