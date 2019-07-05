<?php $__env->startSection('content'); ?>
<div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">Slot Management</a> </li>
                </ul>
                <div class="page-title"> 
                <a href="<?php echo e(url()->previous()); ?>">
                    <i class="icon-custom-left">
                    
                    </i>
                </a>
                    <h3>Slot Management  <span class="semi-bold">&nbsp;</span></h3>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="content-box-main">
                            <div class="slotForm">
                                <form action="<?php echo e(route('slots.post')); ?>" method="POST" id="main" novalidate>
                                    <?php echo e(csrf_field()); ?>

                                        <div class="row">
                                    <div class="col-md-12">
                                                <div class="sub_ser_box_list1">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form_control_new">  
                                                                        <div class="label_head">Day Slots</div>
                                                                        <div class="input-group"> 
                                                                            <span class="input-group-addon" id="slot_timename"></span> 
                                                                            <input class="form-control" name="slot_timename" id="slot_timename" placeholder="Morning"> 
                                                                        </div>
                                                                        <div class="messages"></div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-3">
                                                                    <div class="form_control_new">  
                                                                        <div class="label_head">Slot Start Time</div>
                                                                        <div class="input-group"> 
                                                                            <span class="input-group-addon" id="slotstart_time"><i class="fa fa-clock-o"></i></span> 
                                                                            <input class="form-control" name="slotstart_time" id="slotstart_time" placeholder="9:00 AM"> 
                                                                        </div>
                                                                        <div class="messages"></div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="form_control_new">  
                                                                        <div class="label_head">Slot End Time</div>
                                                                        <div class="input-group"> 
                                                                            <span class="input-group-addon" id="slotend_time"><i class="fa fa-clock-o"></i></span> 
                                                                            <input class="form-control" name="slotend_time" id="slotend_time" placeholder="12:00 PM"> 
                                                                        </div>
                                                                        <div class="messages"></div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="form_control_new">  
                                                                        <div class="label_head">Limit Request</div>
                                                                        <div class="input-group"> 
                                                                            <span class="input-group-addon" id="limit_request"><i class="fa fa-code"></i></span> 
                                                                            <input class="form-control" name="limit_request" id="limit_request" placeholder="Limit Request Number"> 
                                                                        </div>
                                                                        <div class="messages"></div>
                                                                    </div>    
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2" style="top:45px">
                                                            <div class="form_control_new"> 
                                                                <button type="submit" class="btn btn-primary btn-cons">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div> 
                                    </form>
                            </div>
                        </div>
                    </div> 
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="content-box-main">
                            <div style="padding: 10px 28px;">
                                <div class="row"> 
                                    <div class="col-md-3">
                                        <div id='calendar'></div>
                                    </div>
                                    <div class="col-md-9" id="databind">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>
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
            slot_timename: {
              presence: true
            },

            slotstart_time: {
              presence: true
            },
             slotend_time: {
              presence: true
            },
            limit_request: {
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
            document.getElementById('main').submit();
    }
    else{
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.slot_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>