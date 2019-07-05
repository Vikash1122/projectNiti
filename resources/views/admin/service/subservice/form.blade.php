@extends('admin.layouts.main-layout')
@section('css')
<style>
    @font-face {
        font-family: 'Nexa Bold';
        src: url('{{ asset("public/fonts/Nexa Bold.otf") }}');
    }
    @font-face {
        font-family: 'Arial';
        src: url('{{ asset("public/fonts/ARIALBD.TTF") }}');
    }
    .page-title{
        width:100%;
        float:left;
    }
    
    .page-title .sub_pages{
        width:auto;
        float:left;
    }
    
    .addSerBtn{
        background: #2f9247;
        padding: 8px 20px;
        font-size: 18px;
        color: #ffffff;
        font-family: 'Nexa Bold';
        letter-spacing: 1.5px;
    }
    .unitVar, .untPriceVar, .unitDuration{
        width: 100%;
        float: left;
    }
    .unitVar .form-control{
        width:calc(100% - 70px);
        float:right;
    }
    .unitVar .txtH{
        width: auto;
        float: left;
        font-family: 'Nexa Bold';
        font-size: 16px;
        color:#4D4D4D;
        margin-right:20px;
        letter-spacing: 1px;
        padding-top: 8px;
    }
    .untPriceVar .form-control{
        width:calc(100% - 150px);
        float:left; 
    }
    .unitDuration .form-control{
        width:calc(100% - 120px);
        float:left; 
    }
    .untPriceVar .txtH, .unitDuration .txtH{
        width: auto;
        float: left;
        font-family: 'Nexa Bold';
        font-size: 14px;
        color:#4D4D4D;
        margin-left:20px;
        letter-spacing: 1px;
        padding-top: 8px;
    }
    
    .form-control{
        height:40px;
    }
    .sub_service_form {
        box-shadow: 0px 3px 32px hsla(0, 0%, 54%, 0.3607843137);
        width: 100%;
        float: left;
    }
</style>
@endsection
@section('content')
    <div class="content">
        <div class="page-title"> 
            <a class="previousBtn" href="{{ url()->previous() }}">
                <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
            </a>

            <h3> Services </h3>
            <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Add Sub Service</h3></div>
        </div>

                
        <div class="clearfix"></div>
        @if(Session::has('message')) 
            <div class="alert alert-info">
                {{Session::get('message')}} 
            </div> 
        @endif  

        <div class="row">
            <div class="col-md-4 ">
                <div class="sub_service_form">
                <form action="{{ url('admin/services/'.$id.'/addSubService')}}" method="POST" id="main" novalidate>
                    {{ csrf_field() }}
                        <div class="content-box-main-ng marginBottom0">
                            <h3>Add New Sub Service</h3>
                            <div class="content-box-main marginBottom0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Select Service</div>
                                            <div class="form-group"> 
                                                <select name="" id="" class="form-control" style="width:100%" required="" disabled>
                                                    <option value="">Select Service</option>
                                                    @if(isset($services[0]) && !empty($services[0]))
                                                        @foreach($services as $ser)
                                                            <option value="{{ $ser->id }}" <?php if(isset($id) && !empty($id) && $id == $ser->id){echo "selected";}else{ echo "";}?> >{{ $ser->service_name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>    

                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Sub Service Name</div>
                                            <div class="form-group"> 
                                                <input class="form-control" name="sub_service_name" id="sub_service_name" placeholder="Enter Sub Service Name" required> 
                                                
                                            </div>
                                            <div class="messages"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Unit Variable</div>
                                            <div class="form-group unitVar"> 
                                            <div class="txtH"> Par / </div> <input class="form-control" name="unit_variable" id="unit_variable" placeholder="Enter unit e.g. hour or square meter" required> 
                                            
                                            </div>
                                            <div class="messages text-center"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Sub Service Unit Price</div>
                                            <div class="form-group untPriceVar"> 
                                                <input class="form-control" name="unit_price" id="unit_price" placeholder="Enter price per unit variable" required> 
                                                <div class="txtH">AED</div>
                                                
                                            </div>
                                            <div class="messages"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Sub Service Unit Duration</div>
                                            <div class="form-group unitDuration"> 
                                                <input class="form-control" name="unit_duration" id="unit_duration" placeholder="Enter estimated time for one unit" required> 
                                                <div class="txtH">Minutes</div>
                                                
                                            </div>
                                            <div class="messages"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="ng_save_btn_box">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn_success">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    

@endsection
@section('js')
<script src="{{ asset('public/js/validate.js') }}" type="text/javascript"></script>
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
            sub_service_name: {
              presence: true
            },

            unit_variable: {
              presence: true
            },
             unit_price: {
              presence: true,
              numericality: true
            },
             unit_duration: {
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

@endsection