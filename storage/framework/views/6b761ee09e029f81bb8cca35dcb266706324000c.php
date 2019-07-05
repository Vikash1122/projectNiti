    <?php $__env->startSection('content'); ?>
        <div class="content">
            <div class="page-title"> 
                <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
                    <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
                </a>
                <h3>Package</h3>
                <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Add Package</h3></div>
            </div>

            <div class="row">
                <div class="col-md-4 ">
                    <div class="sub_service_form">
                        <form method="post" action="<?php echo e(route('package_form.post')); ?>"  id="main" novalidate>
                            <div class="content-box-main-ng marginBottom0">
                                <h3>Add New Package</h3>
                                <div class="content-box-main marginBottom0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php if(Session::has('message')): ?> 
                                                <div class="alert alert-info">
                                                    <?php echo e(Session::get('message')); ?> 
                                                </div> 
                                            <?php endif; ?>
                                           
                                            <div class="row srvLst">
                                            <?php echo e(csrf_field()); ?>

                                                <div class="col-md-12">
                                                    <div class="form_control_new">  
                                                        <div class="label_head">Package Title</div>
                                                        <div class="form-group">  
                                                            <input class="form-control" name="package_type" id="package_type" placeholder="Package Title" required> 
                                                        </div>
                                                        <div class="messages"></div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12"> 
                                                    <div class="form_control_new">  
                                                        <div class="label_head">Package Price</div>
                                                        <div class="form-group"> 
                                                            <input class="form-control" name="package_price" id="package_price" placeholder="Package Price" required> 
                                                        </div>
                                                        <div class="messages"></div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12"> 
                                                    <div class="form_control_new">  
                                                        <div class="label_head">No of Callouts</div>
                                                        <div class="form-group"> 
                                                            <input class="form-control" name="callouts" id="callouts" placeholder="No of Callouts " required> 
                                                        </div>
                                                        <div class="messages"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div> 
                                    </div>
                                </div>

                                <div class="new_add_srv_btn_block">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn new_add_srv_btn">Add</button>
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
            package_type: {
              presence: true
            },

            package_price: {
              presence: true,
              numericality: true
            },
             callouts: {
              presence: true,
              numericality: true
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
               
            
<?php echo $__env->make('admin.layouts.package_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>