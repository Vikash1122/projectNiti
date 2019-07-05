@extends('admin.layouts.emp_layout')

@section('content')
    <div class="content">
        <div class="page-title"> 
            <a href="{{ url()->previous() }}" class="previousBtn">
                <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
            </a>
            <h3>Vehicle Registration<span class="semi-bold">&nbsp;</span></h3>
            <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Edit Vehicle</h3></div>
        </div>

        @if(Session::has('message')) 
            <div class="alert alert-info">
                {{Session::get('message')}} 
            </div> 
        @endif

        <div class="content-box-main-ng ">
            <h3 class="text-center">Edit Vehicle</h3>
            <form method="POST" action="{{ url('admin/vehicles/update/'.$id) }}" enctype="multipart/form-data" id="main" novalidate>   
            {{ csrf_field() }} 
                <div class="content-box-main-vdr">
                    <div class="row">
                        <div class="col-md-offset-4 col-md-4">
                            <h4 class="text-center paddingBottom30">Select Vehicle Type</h4>
                            <div class="form_control_new newForm-ng">  
                                <div class="radio_button_box">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-6">
                                            <input type="radio" name="vehicle_type" value="4 Wheeler" <?php if(isset($vehicle->vehicle_type) && !empty($vehicle->vehicle_type) && ($vehicle->vehicle_type == '4 Wheeler')){ echo 'checked="checked"';}else{ echo "";}?>  id="four_wheeler" class="input-hidden" />
                                            <label for="four_wheeler">
                                                <img 
                                                src="{{ asset('public/img/vehicleDefault1.png') }}" 
                                                alt="4 Wheeler" class="img-responsive" />
                                                <div class="label_head text-center"> 4 Wheeler </div>
                                            </label>
                                            
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <input type="radio" name="vehicle_type" value="2 Wheeler" <?php if(isset($vehicle->vehicle_type) && !empty($vehicle->vehicle_type) && ($vehicle->vehicle_type == '2 Wheeler')){ echo 'checked="checked"';}else{ echo "";}?> id="two_wheeler" class="input-hidden" />
                                            <label for="two_wheeler">
                                                <img 
                                                src="{{ asset('public/img/scooter1.png') }}" 
                                                alt="2 Wheeler" class="img-responsive" />
                                                <div class="label_head text-center"> 2 Wheeler </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-offset-2 col-md-8">
                            <h4 class="text-center paddingBottom30">Vehicle Information</h4>
                            <div class="row">
                                <div class="col-md-6 form-group hasVal">
                                    <div class="form_control_new">  
                                        <div class="label_head">Vehicle Manufacturer</div>
                                        <input class="form-control" name="manufacturer" value="{{ $vehicle->manufacturer }}" id="manufacturer" placeholder="Enter Manufacturer" required> 
                                        <div class="iconDiv">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </div>
                                        <div class="messages"></div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group hasVal">
                                    <div class="form_control_new">  
                                        <div class="label_head">Vehicle Number</div>
                                        <input class="form-control" name="vehicle_no" value="{{ $vehicle->vehicle_no }}" id="vehicle_no" placeholder="Enter Number" required> 
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
                                        <div class="label_head">Vehicle Modal Number</div>
                                        <input class="form-control" name="modal_no" value="{{ $vehicle->modal_no }}" id="modal_no" placeholder="Enter Modal Number" required> 
                                        <div class="iconDiv">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </div>
                                        <div class="messages"></div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 form-group">
                                    <div class="form_control_new date_picker">  
                                        <div class="label_head">Manufacturing Year</div>
                                        <input class="form-control" name="manufacturing_year" value="{{ date('d-m-Y', strtotime($vehicle->manufacturing_year)) }}"id="manufacturing_year" placeholder="Enter Manufacturing Year" autocomplete="off" required>
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
                                        <div class="label_head">Vehicle Partner</div>
                                        <input class="form-control" name="vehicle_partner" value="{{ $vehicle->vehicle_partner }}" id="vehicle_partner" placeholder="Enter Partner" required>
                                        <div class="iconDiv">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </div>
                                        <div class="messages"></div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <div class="form_control_new">  
                                        <div class="label_head">Vehicle Owner Name</div>
                                        <input class="form-control" name="owner_name" value="{{ $vehicle->owner_name }}" id="owner_name" placeholder="Enter Name" required> 
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
                                        <div class="label_head">Vehicle Color</div>
                                        <input class="form-control" value="{{ $vehicle->vehilce_color }}" name="vehilce_color" id="vehilce_color" placeholder="Enter Color" required> 
                                        <div class="iconDiv">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </div>
                                        <div class="messages"></div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <div class="form_control_new">  
                                        <div class="label_head">Registration number</div>
                                        <input class="form-control" name="registration_number" value="{{ $vehicle->registration_number }}" id="registration_number" placeholder="Enter Registration Number" required> 
                                        <div class="iconDiv">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </div>
                                        <div class="messages"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <div class="form_control_new date_picker ">  
                                        <div class="label_head">Registration expiration</div>
                                        <input class="form-control" name="registration_expiration" id="registration_expiration" value="{{ date('d-m-Y', strtotime($vehicle->registration_expiration)) }}" placeholder="Registration expiration" required> 
                                        <div class="iconDiv">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </div>
                                       <div class="messages"></div>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-offset-2 col-md-8">
                            <div class="row">
                                <div class="col-md-6 newEmp-ng form-group">
                                    <h4 class="text-center paddingBottom30">Upload Vehicle Registration Card</h4>
                                    <div class="upProfile_sec bgNone">
                                        <div class="form-group form-md-line-input">
                                            <div class="docMainBox profileImgBox">
                                                @if(isset($vehicle->registration_card) && !empty($vehicle->registration_card))
                                                <img alt="" id="reg_card_copy" src="{{ fileurlvehicle().$vehicle->registration_card }}" class="center-block userImg img-responsive">
                                                @else
                                                <img alt="" id="reg_card_copy" src="{{ asset('public/img/upload.png') }}" class="center-block userImg img-responsive">
                                            @endif
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="uploaBtn_ng">
                                        <div class="text_ng">
                                            <div class="form_control_new">  
                                                <div class="label_head">Upload Photo</div>
                                            </div>
                                        </div> 
                                        <div class="img_ng">
                                            <div class="up_img_pro">
                                                <img alt="" id="reg_card_copy" src="{{ asset('public/img/Icons_upload_white.png') }}" class="center-block userImg img-responsive">
                                                <div class="uploadProfile">
                                                    <div class="btn default btn-file btn-uploadnew">
                                                        <input type="file" name="registration_card" onChange="getpic('registration_card','reg_card_copy','dl_text',event),OpenFile('registration_card')" class="form-control imgPrv" id="registration_card">
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="messages text-center"></div>
                                </div>


                                <div class="col-md-6 newEmp-ng form-group">
                                    <h4 class="text-center paddingBottom30">Upload Vehicle Pictures</h4>
                                    <div class="upProfile_se bgNone">
                                        <div class="form-group form-md-line-input">
                                            <div class="docMainBox profileImgBox">
                                                 @if(isset($vehicle->vehicle_pic) && !empty($vehicle->vehicle_pic))
                                                <img alt="" id="reg_card_copy" src="{{ fileurlvehicle().$vehicle->vehicle_pic }}" class="center-block userImg img-responsive">
                                                @else
                                                <img alt="" id="vehicle_pic_copy" src="{{ asset('public/img/docVehicle.png') }}" class="center-block userImg img-responsive">
                                                @endif
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="uploaBtn_ng">
                                        <div class="text_ng">
                                            <div class="form_control_new">  
                                                <div class="label_head">Upload Photo</div>
                                            </div>
                                        </div> 
                                        <div class="img_ng">
                                            <div class="up_img_pro">
                                                <img alt="" id="vehicle_pic_copy" src="{{ asset('public/img/Icons_upload_white.png') }}" class="center-block userImg img-responsive">
                                                <div class="uploadProfile">
                                                    <div class="btn default btn-file btn-uploadnew">
                                                        <input type="file" name="vehicle_pic" onChange="getpic('vehicle_pic','vehicle_pic_copy','dl_text',event),OpenFile('vehicle_pic')" class="form-control imgPrv" id="vehicle_pic">
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="messages text-center"></div>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="content-box-main-footer-ng">
                    <div class="row">
                        <div class="col-md-offset-4 col-md-4">
                            <input type="button" name="reset" class="btn-large actionBtn redBg" value="Reset">
                            <button type="submit" class="btn-large actionBtn greenBg">Update</button>
                        </div>
                    </div>
                </div>

                
            </form>
        </div>    
     
    </div>  
@endsection
@section('js')
<script>
 $("#registration_expiration,#manufacturing_year").datepicker({
    autoclose: true,
    todayHighlight: true
});
</script>

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
            manufacturer: {
              presence: true
            },

            vehicle_no: {
              presence: true
            },

            modal_no: {
              presence: true
            },

            manufacturing_year: {
              presence: true
              // format: {
              //   pattern: "\\d{4}"
              // }
            },

            vehicle_partner: {
              presence: true
            },

             owner_name: {
              presence: true
            },

             vehilce_color: {
              presence: true
            },

            registration_number: {
              presence: true
            },

            vehicle_type: {
              presence: true,
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
        //return true;
      //showSuccess();
    }
    else{
         var emptyAreas = $('.form-control').filter(function(index, element) {
              return $.trim($(element).val()) === ''; // element .val() is '' after trimming white spaces = true
            });
            //alert(emptyAreas);
            emptyAreas.first().focus();
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
</script>
<!-- <script type="text/javascript">
    var abc = $("#manufacturer").val();
    //alert(abc);
    $('.hasVal').addClass("has-success");
    $('.iconDiv').addClass("successGreen");


</script> -->

@endsection