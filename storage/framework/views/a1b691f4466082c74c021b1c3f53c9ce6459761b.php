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
                        
                    <form action="<?php echo e(url('admin/orders/groups/update/'.$id)); ?>" method="POST" enctype="multipart/form-data"   id="main" novalidate>
                    <?php echo e(csrf_field()); ?>

                        <div class="content-box-main-ng editTeamForm ctContainer">
                            <h3>Edit Team</h3>
                            <div class="content-box-main marginBottom0">
                                <div class="col-md-offset-2 col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form_control_new">  
                                                <div class="label_head">Group Name</div>
                                               
                                                <input class="form-control" value="<?php echo e($groupData[0]->group_name); ?>" name="group_name" id="group_name" placeholder="Enter Group Name" required> 
                                            
                                                <div class="iconDiv">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </div>
                                                <div class="messages"></div>
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
                                            <div class="form_control_new  fff1" id="servicedt1">  
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
                                                <div class="iconDiv greenq11">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </div>
                                                <div class="messages11"></div>
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
                                                    <?php //prd($teamLead);?>
                                                    <?php $__currentLoopData = $teamLead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if(isset($groupData[0]->team_leader) && !empty($groupData[0]->team_leader) && $groupData[0]->team_leader ==$lead['id'] ){echo "selected";}else{ echo "";}?> value="<?php echo e($lead['id']); ?>"><?php echo e($lead['employee_name']); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                                 <div class="iconDiv">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </div>
                                                <div class="messages"></div>
                                            </div>
                                        </div>
<?php //print_r("askdj");die;?>
                                        <div class="col-md-6">
                                            <div class="form_control_new">  
                                                <div class="label_head">Add Driver</div>
                                                <select name="driver" id="driver" class="form-control" required>
                                                    <option value="">Select Driver</option>
                                                    <?php if(isset($driver) && !empty($driver)): ?>
                                                    <?php $__currentLoopData = $driver; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php //print_r($dr['id']);die;?>
                                                        <option <?php if(isset($groupData[0]->driver) && !empty($groupData[0]->driver) && $groupData[0]->driver == $dr['employee_name']){echo "selected";}else{ echo "";}?> value="<?php echo e($dr['id']); ?>"><?php echo e($dr['employee_name']); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
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
                                                <div class="label_head">Add Vehicle</div>
                                                <select name="group_vehicle" id="group_vehicle" class="form-control" required>
                                                    <option value="">Select Vehicle</option>
                                                    <?php if(isset($vehicle) && !empty($vehicle)): ?>
                                                    <?php $__currentLoopData = $vehicle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if(isset($groupData[0]->group_vehicle) && !empty($groupData[0]->group_vehicle) && $groupData[0]->group_vehicle == $vr->id){echo "selected";}else{ echo "";}?> value="<?php echo e($vr->id); ?>"><?php echo e($vr->registration_number); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                                <div class="iconDiv">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </div>
                                                <div class="messages"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form_control_new qty1">  
                                                <div class="label_head">Add Employee</div>
                                                <?php if(isset($groupData[0]->employee) && !empty($groupData[0]->employee)): ?>
                                                <?php 
                                               // $emp = explode(',',$groupData[0]->group_emp);
                                                //prd($employee);
                                                $arr = array();
                                                $emparr = array();
                                                foreach($groupData[0]->employee as $k=>$s){ 
                                                    $arr[] = $s->id;
                                                    
                                                    
                                                ?>
                                                <?php } //prd($arr);?>
                                                <?php endif; ?>
                                                <select class="multiselect form-control form-control1" name="group_emp[]" id="group_emp" multiple required>
                                                    <option value="">Select Employee</option>
                                                    <?php if(isset($employee) && !empty($employee)){
                                                   // prd($employee);
                                                    foreach($employee as $emp){
                                                        //prd($emp);
                                                        $selected = (in_array($emp['id'],$arr) == 0) ? '' : 'selected="selected"' ; 
                                                        ?>

                                                        <option <?= $selected;?> value="<?php echo e($emp['id']); ?>"><?php echo e($emp['employee_name']); ?></option>
                                                    <?php }} ?>
                                                </select>
                                                <div class="iconDiv greenq1">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </div>
                                                <div class="messages12"></div>
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
                                                            <?php if(isset($employeewithdt[0]) && !empty($employeewithdt[0])): ?>
                                                            <?php $__currentLoopData = $employeewithdt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td>
                                                                    <a class="border_radius_left dlt_btn"><i class="fa fa-times"></i></a>
                                                                </td>

                                                                <td><?php echo e($emp['employee_name']); ?></td>
                                                                
                                                                <td>
                                                                    <div class="iconDiv <?php if(isset($groupData[0]->team_leader) && !empty($groupData[0]->team_leader) && $groupData[0]->team_leader ==$emp['id'] ){echo "successGreen";}else{ echo "";}?>">
                                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="iconDiv <?php if(isset($groupData[0]->driver) && !empty($groupData[0]->driver) && $groupData[0]->driver == $emp['employee_name']){ echo "successGreen";}else{ echo "";}?>">
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
    <?php $__env->startSection('js'); ?>

<script src="<?php echo e(asset('public/js/validate.js')); ?>" type="text/javascript"></script>
<script type="text/javascript">
    (function() {

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
            group_name: {
              presence: true
            },
            team_leader: {
              presence: true
            },
            driver: {
              presence: true
            },
            group_vehicle: {
              presence: true
            }
        };

     var form=document.querySelector("form#main");
       var inputs = document.querySelectorAll("input, textarea, select")
      for (var i = 0; i < inputs.length; ++i) {
        inputs.item(i).addEventListener("change", function(ev) {
          var errors = validate(form, constraints) || {};
          showErrorsForInput(this, errors[this.name])
        });
      }

      // Hook up the form so we can prevent it from being posted
  document.querySelector("form#main")
    .addEventListener("submit", function(ev) {
      ev.preventDefault();
      handleFormSubmit(this);
    });

  function handleFormSubmit(form) {
    // First we gather the values from the form
    var values = validate.collectFormValues(form);
    // then we validate them against the constraints
    var errors = validate(values, constraints);
    // then we update the form to reflect the results
    showErrors(form, errors || {});
    // And if all constraints pass we let the user know
    if (!errors) { 
       // alert("asldfjsdalf");
       var abc2 = $('#group_emp').val();
        var abc1 = $('#group_service').val();
        if(abc1==null || abc1=="" || abc2==null || abc2==""){
        if(abc1==null || abc1=="") {
            $('.greenq11').removeClass('successGreen');
             $('.fff1').removeClass('has-success');
              $('.fff1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Group Services cannot be blank';
            $('.messages11').html(block);
                 //return  false;
        }else{
            $('.fff1').removeClass('has-error');
            $('.greenq11').addClass('successGreen');
            $('.fff1').addClass('has-success');
            $('.messages11').html('');
        }
       // var abc2 = $('#group_emp').val();
        if(abc2==null || abc2=="") {
            $('.greenq1').removeClass('successGreen');
            $('.qty1').removeClass('has-success');
            $('.qty1').addClass('has-error');
            var block = document.createElement("span");
            block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Group Employee cannot be blank';
            $('.messages12').html(block);
                 //return  false;
        }else{
            $('.qty1').removeClass('has-error');
            //$('.greenq11').addClass('successGreen');
            $('.greenq11').removeClass('successGreen');
            $('.qty1').addClass('has-success');
            $('.messages12').html('');
        }
          var emptyAreas = $('.form-control').filter(function(index, element) {
              return $.trim($(element).val()) === '';
            });
            emptyAreas.first().focus();
        return false;
       } 

        document.getElementById('main').submit();
      //   return true;
      // showSuccess();
    }
     else{
        var abc1 = $('#group_service').val();
        if(abc1==null || abc1=="") {
            $('.greenq11').removeClass('successGreen');
            $('.fff1').removeClass('has-success');
            $('.fff1').addClass('has-error');
            var block = document.createElement("span");
            block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Group Services cannot be blank';
            $('.messages11').html(block);
            $('.qty1').removeClass('has-success');
            $('.greenq1').removeClass('successGreen');
            //return  false;
        }else{
            $('.fff1').removeClass('has-error');
            $('.greenq11').addClass('successGreen');
            $('.fff1').addClass('has-success');
            $('.messages11').html('');
        }

        var abc2 = $('#group_emp').val();
        if(abc2==null || abc2=="") {
            $('.greenq1').removeClass('successGreen');
            $('.qty1').removeClass('has-success');
            $('.qty1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Group Employee cannot be blank';
            $('.messages12').html(block);
           //return  false;
        }else{
            $('.greenq1').addClass('successGreen');
            $('.qty1').removeClass('has-error');
            $('.qty1').addClass('has-success');
            $('.messages12').html('');
        }
          var emptyAreas = $('.form-control').filter(function(index, element) {
              return $.trim($(element).val()) === '';
            });
            emptyAreas.first().focus();
        console.log(errors);
    }
  }

  // Updates the inputs with the validation errors
  function showErrors(form, errors) {
    // We loop through all the inputs and show the errors for that input
    _.each(form.querySelectorAll("input[name], select[name]"), function(input) {
      // Since the errors can be null if no errors were found we need to handle
      // that
      showErrorsForInput(input, errors && errors[input.name]);
    });
  }

  // Shows the errors for a specific input
  function showErrorsForInput(input, errors) {
    // This is the root of the input
    var formGroup = closestParent(input.parentNode, "form_control_new");
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
  function showSuccess() {
    // We made it \:D/
    alert("Success!");
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
})();
</script>
<script type="text/javascript">
    $('#group_service').on('change', function() {
        var abc1 = $('#group_service').val();
        if(abc1==null || abc1=="") {
             $('.greenq11').removeClass('successGreen');
             $('.fff1').removeClass('has-success');
             $('.fff1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
             block.classList.add("error");
             block.innerHTML = 'group service cannot be blank';
             $('.messages11').html(block);
        }else{
            $('.fff1').removeClass('has-error');
            $('.greenq11').addClass('successGreen');
            $('.fff1').addClass('has-success');
            $('.messages11').html('');
        }
});

$('#group_emp').on('change', function() {
        var abc2 = $('#group_emp').val();
        //var regex=/^[0-9]+$/;
        if(abc2==null || abc2=="") {
            $('.qty1').removeClass('has-success');
            $('.greenq1').removeClass('successGreen');
            $('.qty1').addClass('has-error');
            var block = document.createElement("span");
            block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Group Employee cannot be blank';
                $('.messages12').html(block);
        }else{
            $('.qty1').removeClass('has-error');
            $('.greenq1').addClass('successGreen');
            $('.qty1').addClass('has-success');
            $('.messages12').html('');
        }
});
</script>
<?php $__env->stopSection(); ?>   
<?php echo $__env->make('admin.layouts.emp_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>