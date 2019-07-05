

<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="page-title"> 
            <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
                <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
            </a>
            <h3>Edit Team  <span class="semi-bold">&nbsp;</span></h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="sub_service_form">
                    <!-- <div class="header_main_div_sec">
                        <div class="title">
                            <h5>Edit Group</h5>
                        </div>       
                    </div> -->
                    <?php if(Session::has('message')): ?> 
                        <div class="alert alert-info">
                            <?php echo e(Session::get('message')); ?> 
                        </div> 
                    <?php endif; ?>
                        
                    <form action="<?php echo e(url('admin/orders/groups/update/'.$id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                        <div class="content-box-main-ng editTeamForm">
                            <h3>Edit Team</h3>
                            <div class="content-box-main marginBottom0">
                                <div class="col-md-offset-2 col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form_control_new">  
                                                <div class="label_head">Group Name</div>
                                                <input class="form-control" value="<?php echo e($groupData[0]->group_name); ?>" name="group_name" id="group_name" placeholder="Enter Group Name" required> 
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-6"> 
                                            <div class="form_control_new date_picker">  
                                                <div class="label_head">Date</div>
                                                <div class="input-append success date input-group"> 
                                                    <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
                                                    <input class="form-control" value="<?php echo e(date('d-m-Y', strtotime($groupData[0]->group_date))); ?>" name="group_date" id="group_date" placeholder="Group Date " required>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="col-md-6">
                                            <div class="form_control_new" id="servicedt1">  
                                                <div class="label_head">Add Services</div>
                                                <?php if(isset($groupData[0]->serv) && !empty($groupData[0]->serv)): ?>
                                                <?php 
                                                $arr = array();
                                                foreach($groupData[0]->serv as $k=>$s){ 
                                                    $arr[] = $s;
                                                    
                                                ?>
                                                <?php } //prd(json_encode($arr));?>
                                                <?php endif; ?>
                                                <select class="multiselect form-control form-control1" name="group_service[]" id="group_service"  multiple required>
                                                    <option value="">Select services</option>
                                                    <?php $service = explode(',',$groupData[0]->group_service); ?>
                                                    <?php if(isset($services) && !empty($services)){
                                                    foreach($services as $ser){
                                                        $selected = (in_array($ser->id, $arr) == 0) ? '' : 'selected="selected"' ; 
                                                        ?> 
                                                        <option <?= $selected; ?> value="<?php echo e($ser->id); ?>" ><?php echo e($ser->service_name); ?></option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form_control_new">  
                                                <div class="label_head">Add Team Leader</div>
                                                <select name="team_leader" id="team_leader" class="form-control" required>
                                                    <option value="">Select Team Leader</option>
                                                    <?php if(isset($teamLead) && !empty($teamLead)): ?>
                                                    <?php $__currentLoopData = $teamLead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if(isset($groupData[0]->team_leader) && !empty($groupData[0]->team_leader) && $groupData[0]->team_leader ==$lead->id ){echo "selected";}else{ echo "";}?> value="<?php echo e($lead->id); ?>"><?php echo e($lead->employee_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form_control_new">  
                                                <div class="label_head">Add Driver</div>
                                                <select name="driver" id="driver" class="form-control" required>
                                                    <option value="">Select Driver</option>
                                                    <?php if(isset($driver) && !empty($driver)): ?>
                                                    <?php $__currentLoopData = $driver; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if(isset($groupData[0]->driver) && !empty($groupData[0]->driver) && $groupData[0]->driver == $dr->employee_name){echo "selected";}else{ echo "";}?> value="<?php echo e($dr->id); ?>"><?php echo e($dr->employee_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form_control_new">  
                                                <div class="label_head">Add Vehicle</div>
                                                <select name="group_vehicle" id="group_vehicle" class="form-control" required>
                                                    <option value="">Select Vehicle</option>
                                                    <?php if(isset($vehicle) && !empty($vehicle)): ?>
                                                    <?php $__currentLoopData = $vehicle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if(isset($groupData[0]->group_vehicle) && !empty($groupData[0]->group_vehicle) && $groupData[0]->group_vehicle == $vr->id){echo "selected";}else{ echo "";}?> value="<?php echo e($vr->id); ?>"><?php echo e($vr->registration_number); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form_control_new">  
                                                <div class="label_head">Add Employee</div>
                                                <?php if(isset($groupData[0]->group_emp) && !empty($groupData[0]->group_emp)): ?>
                                                <?php 
                                                $emp = explode(',',$groupData[0]->group_emp);
                                                
                                                $arr = array();
                                                $emparr = array();
                                                foreach($emp as $k=>$s){ 
                                                    $arr[] = $s;
                                                    $selectEmployee = App\Employee::select('id','employee_name','emp_role')->where('id',$s)->first();
                                                    array_push($emparr,$selectEmployee );
                                                    
                                                ?>
                                                <?php } //prd($emparr);?>
                                                <?php endif; ?>
                                                <select class="multiselect form-control form-control1" name="group_emp[]" id="group_emp" multiple required>
                                                    <option value="">Select Employee</option>
                                                    <?php if(isset($employee) && !empty($employee)){
                                                    foreach($employee as $emp){
                                                        $selected = (in_array($emp->id, $arr) == 0) ? '' : 'selected="selected"' ; 
                                                        ?>
                                                        <option <?= $selected;?> value="<?php echo e($emp->id); ?>"><?php echo e($emp->employee_name); ?></option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="empListTable marginTop20">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>&nbsp;</th>
                                                                <th>Employee Name</th>
                                                                <th>Team Leader</th>
                                                                <th>Driver</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if(isset($employee[0]) && !empty($employee[0])): ?>
                                                            <?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td>
                                                                    <a class="border_radius_left dlt_btn"><i class="fa fa-times"></i></a>
                                                                </td>

                                                                <td><?php echo e($emp->employee_name); ?></td>
                                                                
                                                                <td>
                                                                    <div class="iconDiv <?php if(isset($groupData[0]->team_leader) && !empty($groupData[0]->team_leader) && $groupData[0]->team_leader ==$emp->id ){echo "successGreen";}else{ echo "";}?>">
                                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="iconDiv <?php if(isset($groupData[0]->driver) && !empty($groupData[0]->driver) && $groupData[0]->driver == $emp->employee_name){ echo "successGreen";}else{ echo "";}?>">
                                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>

                                                            <!-- <tr>
                                                                <td>
                                                                    <a class="border_radius_left dlt_btn"><i class="fa fa-times"></i></a>
                                                                </td>

                                                                <td>Mohan Khatri</td>
                                                                
                                                                <td>
                                                                    <div class="iconDiv successGreen">
                                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="iconDiv">
                                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <a class="border_radius_left dlt_btn"><i class="fa fa-times"></i></a>
                                                                </td>

                                                                <td>Mohan Khatri</td>
                                                                
                                                                <td>
                                                                    <div class="iconDiv">
                                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="iconDiv">
                                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <a class="border_radius_left dlt_btn"><i class="fa fa-times"></i></a>
                                                                </td>

                                                                <td>Mohan Khatri</td>
                                                                
                                                                <td>
                                                                    <div class="iconDiv">
                                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="iconDiv">
                                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                                    </div>
                                                                </td>
                                                            </tr> -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="content-box-main-footer-ng">
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <button type="button" class="btn-large actionBtn redBg">cancel</button>
                                        <button type="submit" class="btn-large actionBtn greenBg">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>    
        </div>            
    </div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.emp_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>