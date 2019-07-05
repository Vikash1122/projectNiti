<?php $__env->startSection('content'); ?>
<div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">Create Group</a> </li>
                </ul>

                <div class="page-title"> <i class="icon-custom-left"></i>
                    <h3>Create Group  <span class="semi-bold">&nbsp;</span></h3>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="content-box-main">
                            <div class="header_main_div_sec">
                                <div class="title">
                                    <h5>Create Group</h5>
                                </div>       
                            </div>
                            <?php if(Session::has('message')): ?> 
                                <div class="alert alert-info">
                                    <?php echo e(Session::get('message')); ?> 
                                </div> 
                            <?php endif; ?>
                            <form action="<?php echo e(route('groups.post')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form_control_new">  
                                        <div class="label_head">Group Name</div>
                                        <div class="input-group"> 
                                            <span class="input-group-addon" id="group_name"><i class="fa fa-user"></i></span> 
                                            <input class="form-control" name="group_name" id="group_name" placeholder="Enter Group Name" required> 
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6"> 
                                    <div class="form_control_new date_picker">  
                                        <div class="label_head">Date</div>
                                        <div class="input-append success date input-group"> 
                                            <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
                                            <input class="form-control" name="group_date" id="group_date" placeholder="Group Date " required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form_control_new">  
                                        <div class="label_head">Add Services</div>
                                        <select class="multiselect" name="group_service[]" id="group_service" style="width:100%" multiple required>
                                            <option value="">Select services</option>
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
                                        <div class="label_head">Add Team Leader</div>
                                        <select name="team_leader" id="team_leader" style="width:100%" required>
                                            <option value="">Select Team Leader</option>
                                            <?php if(isset($teamLead) && !empty($teamLead)): ?>
                                            <?php $__currentLoopData = $teamLead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($lead->id); ?>"><?php echo e($lead->employee_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form_control_new">  
                                        <div class="label_head">Add Driver</div>
                                        <select name="driver" id="driver" style="width:100%" required>
                                            <option value="">Select Driver</option>
                                            <?php if(isset($driver) && !empty($driver)): ?>
                                            <?php $__currentLoopData = $driver; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($dr->id); ?>"><?php echo e($dr->employee_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form_control_new">  
                                        <div class="label_head">Add Vehicle</div>
                                        <select name="group_vehicle" id="group_vehicle" style="width:100%" required>
                                            <option value="">Select Vehicle</option>
                                            <?php if(isset($vehicle) && !empty($vehicle)): ?>
                                            <?php $__currentLoopData = $vehicle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($vr->id); ?>"><?php echo e($vr->registration_number); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form_control_new">  
                                        <div class="label_head">Add Employee</div>
                                        <select class="multiselect" name="group_emp[]" id="group_emp" style="width:100%" multiple required>
                                            <option value="">Select Employee</option>
                                            <?php if(isset($employee) && !empty($employee)): ?>
                                            <?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($emp->id); ?>"><?php echo e($emp->employee_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="order_history_box marginTop20">
                                        <div class="job_desc_box_list">
                                            <div class="title" style="margin-bottom: 25px">
                                                <h5>Group Employee List</h5>
                                            </div>    
                                        </div>

                                        <div class="row" id="emp_group_add">
                                           
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12" id="dataslotbindnew">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      
                            <hr />

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-danger">cancel</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div>
                </div>            
            </div> 
            <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.emp_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>