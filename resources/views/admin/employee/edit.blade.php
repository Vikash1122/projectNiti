@extends('admin.layouts.emp_layout')

@section('content')
    <div class="content">
        <div class="page-title"> 
            <a href="{{ url()->previous() }}" class="previousBtn">
                <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
            </a>
            <h3>Employee List  <span class="semi-bold">&nbsp;</span></h3>
            <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Edit Employee</h3></div>
        </div>

        @if(Session::has('message')) 
            <div class="alert alert-info">
                {{Session::get('message')}} 
            </div> 
        @endif

        <div class="content-box-main-ng marginBottom0">
            <h3 class="text-center">Employee Details</h3>

            <form action="{{ url('admin/employees/update/'.$id) }}" method="POST" enctype="multipart/form-data" id="main" novalidate>
                {{ csrf_field() }}
                <div class="content-box-main-vdr">
                    <div class="row">
                        <div class="col-md-offset-4 col-md-4 newEmp-ng">
                            <h4 class="text-center paddingBottom30">Upload Employee Photo</h4>
                            <div class="upProfile_sec bgNone">
                                <div class="form-group form-md-line-input">
                                    <div class="docMainBox profileImgBox">
                                        @if(isset($employee->emp_profile) && !empty($employee->emp_profile))
                                            <img alt="" id="profile_copy" src="{{ fileurlemp().$employee->emp_profile }}" class="center-block userImg img-responsive">
                                        @else
                                        <img alt="" id="profile_copy" src="{{ asset('public/img/vendorDefault.png') }}" class="center-block userImg img-responsive">
                                        @endif
                                        
                                    </div>
                                </div> 
                            </div>
                            
                            <div class="uploaBtn_ng">
                                <div class="text_ng">
                                    <div class="form_control_new">  
                                        <div class="label_head">Upload Image</div>
                                    </div>
                                </div> 
                                <div class="img_ng">
                                    <div class="up_img_pro">
                                        <img alt="" id="profile_copy" src="{{ asset('public/img/Icons_upload_white.png') }}" class="center-block userImg img-responsive">
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
                    <hr>

                    <div class="row">
                        <div class="col-md-offset-2 col-md-8">
                            <h4 class="text-center paddingBottom30">Employee Personal Information</h4>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <div class="form_control_new">  
                                        <div class="label_head">Employee Name</div>
                                        <input class="form-control focus1" name="employee_name" value="{{ $employee->employee_name }}" id="employee_name" placeholder="Employee Name" aria-describedby="employee_name"> 
                                        <div class="iconDiv">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </div>
                                        <div class="messages"></div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <div class="form_control_new">  
                                        <div class="label_head">Mobile Number</div>
                                        <input class="form-control focus1" type="tel" maxlength="10" minlength="10"  value="{{ $employee->emp_mobile }}" name="emp_mobile" id="emp_mobile" placeholder="Enter Number"> 
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
                                        <div class="label_head">Age</div>
                                        <input class="form-control focus1" name="age" value="{{ $employee->age }}" id="age" placeholder="Employee Age"> 
                                        <div class="iconDiv">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </div>
                                        <div class="messages"></div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <div class="form_control_new date_picker">  
                                        <div class="label_head">Date Of Birth</div>
                                        <input class="form-control focus1" name="date_of_birth" value="{{ date('d-m-Y', strtotime($employee->date_of_birth)) }}" id="date_of_birth" placeholder="Date Of Birth">
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
                                        <div class="label_head">Email-id</div>
                                        <input class="form-control focus1" name="email_id" value="{{ $employee->email_id }}" id="email_id" placeholder="Email-Id"> 
                                        <div class="iconDiv">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </div>
                                        <div class="messages"></div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <div class="form_control_new">  
                                        <div class="label_head">Nationality</div>
                                        <select class="form-control focus1" name="nationality" id="nationality">
                                            <option <?php if(isset($employee->nationality) && !empty($employee->nationality) && ($employee->nationality == '')){echo "selected"; }else{ echo "";}?> value="">Select Nationality</option>
                                            <option <?php if(isset($employee->nationality) && !empty($employee->nationality) && ($employee->nationality == 'Indian')){echo "selected"; }else{ echo "";}?> value="Indian">Indian</option>
                                            <option <?php if(isset($employee->nationality) && !empty($employee->nationality) && ($employee->nationality == 'American')){echo "selected"; }else{ echo "";}?> value="American">American</option>
                                        </select>
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
                                        <div class="label_head">Country</div>
                                        <select class="form-control form-control1 focus1" name="country" onchange="getCountry()" id="country" name="country">
                                            <option value="">Select Country</option>
                                            @if(isset($country) && !empty($country))
                                                @foreach($country as $cntry)
                                                    <option <?php if(isset($employee->country) && !empty($employee->country) && ($employee->country == $cntry->name )){echo 'selected="selected"'; }else{ echo 'selected=""';}?> value="{{ $cntry->name  }}">{{ $cntry->name }}</option>
                                                @endforeach
                                            @endif
                                        </select> 
                                        <div class="iconDiv">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </div>
                                        <div class="messages"></div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <div class="form_control_new">  
                                        <div class="label_head">City</div>
                                        <input class="form-control focus1" name="city" value="{{ $employee->city }}" id="city" placeholder="Enter City"> 
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
                                        <div class="label_head">Local Address</div>
                                        <textarea rows="5" name="local_address" class="form-control heightAuto" placeholder="Enter Local Address">{{ $employee->local_address }}</textarea>
                                        <div class="iconDiv">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </div>
                                        <div class="messages"></div>
                                    </div>    
                                </div>

                                <div class="col-md-6 form-group">
                                    <div class="form_control_new">  
                                        <div class="label_head">Permanent Address</div>
                                        <textarea rows="5" name="permanent_address" class="form-control heightAuto focus1" placeholder="Enter Permanent Address">{{ $employee->permanent_address }}</textarea>
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
                    @if(isset($employee->country) && !empty($employee->country))
                    <div class="adBox bg_white boxshadowNone" id="int_Doc">  
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                                <div class="row">    
                                    <div class="col-md-12"> 
                                        <h4 class="text-center paddingBottom30">Additional Information</h4>
                                    </div>
                                </div>  

                                <div class="row">    
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="driving_licence_exp_date label_head">Passport Number</div>
                                            <input class="form-control" name="passport_number" value="{{ $employee->passport_number }}" id="passport_number" placeholder="Enter Passport Number"> 
                                            <div class="iconDiv">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>  

                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="date_of_birth label_head">Passport expiration</div>
                                            <input class="form-control" name="passport_exp_date" value="{{ date('d-m-Y', strtotime($employee->passport_exp_date)) }}" id="passport_exp_date" placeholder="Enter Passport expiration">
                                            <div class="iconDiv">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div> 
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new date_picker">  
                                            <div class="date_of_birth label_head">Visa expiry date</div>
                                            <input class="form-control" name="visa_expiration" value="{{ date('d-m-Y', strtotime($employee->visa_expiration)) }}" id="visa_expiration" placeholder="Enter Visa expiry date">
                                            <div class="iconDiv">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="driving_licence_exp_date label_head">Emirates Id</div>
                                            <input class="form-control" name="emirates_id" value="{{ $employee->emirates_id }}" id="emirates_id" placeholder="Enter Emirates Id"> 
                                            <div class="iconDiv">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new date_picker">  
                                            <div class="driving_licence_exp_date label_head">Emirates expiration</div>
                                            <input class="form-control" name="emirates_exp_date" value="{{ date('d-m-Y', strtotime($employee->emirates_exp_date)) }}" id="emirates_exp_date" placeholder="Enter Emirates expiration"> 
                                            <div class="iconDiv">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <hr> 
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8">
                            <h4 class="text-center paddingBottom30">Employee Job Information</h4>
                            <div class="row">    
                                <div class="col-md-6 form-group">
                                    <div class="form_control_new">  
                                        <div class="label_head">Employee Code</div>                                           
                                        <input class="form-control" name="employee_code" value="{{ $employee->employee_code }}" id="employee_code" placeholder="Employee Code" aria-describedby="employee_code"> 
                                        <div class="iconDiv">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </div> 
                                        <div class="messages"></div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group fff1">
                                    <div class="form_control_new">  
                                        <div class="label_head">Service Type</div>
                                        @if(isset($employee->empSer[0]) && !empty($employee->empSer[0]))
                                        <?php 
                                        $arr = array();
                                        foreach($employee->empSer as $k=>$s){ 
                                            $arr[] = $s['service_id'];
                                            
                                        ?>
                                        <?php } ?>
                                        @endif
                                        <select class="multiselect form-control form-control1" name="service_type[]"  id="staff_type" required multiple>
                                            <option value="">Select Service Type</option>
                                            <?php if(isset($services) && !empty($services)){
                                                foreach($services as $ser) {
                                                   $selected = (in_array($ser->id, $arr) == 0) ? '' : 'selected="selected"' ; 
                                                ?> 
                                                <option <?= $selected; ?> value="{{ $ser->id }}">{{ $ser->service_name }}</option>
                                            <?php } } ?>

                                        </select>
                                        <div class="iconDiv greenq1">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </div> 
                                        <div class="messages11"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <div class="form_control_new">  
                                        <div class="label_head">Employee Role</div>
                                        <select name="emp_role" id="emp_role" class="form-control focus1">
                                            <option <?php if(isset($employee->emp_role) && !empty($employee->emp_role) && $employee->emp_role == ''){echo "selected"; }else{ echo "";}?> value="">Select Role</option>
                                            <option <?php if(isset($employee->emp_role) && !empty($employee->emp_role) && $employee->emp_role == 'Surveyor'){echo "selected"; }else{ echo "";}?> value="Surveyor">Surveyor</option>
                                            <option <?php if(isset($employee->emp_role) && !empty($employee->emp_role) && $employee->emp_role == 'Team Leader'){echo "selected"; }else{ echo "";}?> value="Team Leader">Team Leader</option> 
                                            <option <?php if(isset($employee->emp_role) && !empty($employee->emp_role) && $employee->emp_role == 'Driver'){echo "selected"; }else{ echo "";}?> value="Driver">Driver</option>
                                            <option <?php if(isset($employee->emp_role) && !empty($employee->emp_role) && $employee->emp_role == 'Helper'){echo "selected"; }else{ echo "";}?> value="Helper">Helper</option>
                                        </select>
                                        <div class="iconDiv">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </div>
                                        <div class="messages"></div> 
                                    </div>
                                </div>

                                <div class="col-md-6 form-group newCheckBox">
                                    <div class="form_control_new">  
                                        <div class="label_head">&nbsp;</div>
                                        <div class="checkbox check-primary">
                                            <input id="isdriver" type="checkbox" value="1">
                                            <label for="isdriver">Is Driver</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div> 
                    
                    <hr>
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8">
                            <h4 class="text-center paddingBottom30">Upload Documents</h4>
                            <div class="row marginBtoom100">
                                <div class="col-md-3">
                                    <div class="form-group form-md-line-input docDiv-ng">
                                        <div class="docMainBox upDoc-ng docVarified">
                                        @if(isset($employee->passport_doc) && !empty($employee->passport_doc))
                                            <img alt="" id="passport" src="{{ fileurlempdoc().$employee->passport_doc }}" class="center-block userImg img-responsive">
                                        @else
                                            <img alt="" id="passport" src="{{ asset('public/img/passportCopy.png') }}" class="center-block userImg img-responsive">
                                        @endif
                                            <div class="uploadProfile">
                                                <div class="btn default btn-file btn-uploadnew">
                                                    <input type="file" name="passport_doc" onChange="getpic('passport_doc','passport','passport_doc_text',event),OpenFile('passport_doc')" class="form-control imgPrv" id="passport_doc" placeholder="upload passport copy">
                                                </div>
                                            </div>
                                        </div>

                                        <label for="passport_doc" class="text-green">Passport Copy </label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-md-line-input docDiv-ng">
                                        <div class="docMainBox upDoc-ng">
                                        @if(isset($employee->visa_doc) && !empty($employee->visa_doc))
                                            <img alt="" id="visa" src="{{ fileurlempdoc().$employee->visa_doc }}" class="center-block userImg img-responsive">
                                        @else
                                        <img alt="" id="visa" src="{{ asset('public/img/visaCopy.png') }}" class="center-block userImg img-responsive">
                                        @endif
                                            <div class="uploadProfile">
                                                <div class="btn default btn-file btn-uploadnew">
                                                    <input type="file" name="visa_doc" onChange="getpic('visa_doc','visa','visa_doc_text',event),OpenFile('visa_doc')" class="form-control imgPrv" id="visa_doc">
                                                </div>
                                            </div>    
                                        </div>
                                        <label for="visa_doc">Visa Copy</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-md-line-input docDiv-ng">
                                        <div class="docMainBox upDoc-ng">
                                        @if(isset($employee->emirates_id_copy) && !empty($employee->emirates_id_copy))
                                            <img alt="" id="emirates" src="{{ fileurlempdoc().$employee->emirates_id_copy }}" class="center-block userImg img-responsive">
                                        @else
                                        <img alt="" id="emirates" src="{{ asset('public/img/emirateIdCopy.png') }}" class="center-block userImg img-responsive">
                                        @endif
                                            <div class="uploadProfile">
                                                <div class="btn default btn-file btn-uploadnew">
                                                    <input type="file" name="emirates_id_copy" onChange="getpic('emirates_id_copy','emirates','emirates_text',event),OpenFile('emirates_id_copy')" class="form-control imgPrv" id="emirates_id_copy">
                                                </div>
                                            </div> 
                                        </div>
                                        <label for="emirates_id_copy">Emirates copy</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-md-line-input docDiv-ng">
                                        <div class="docMainBox upDoc-ng">
                                        @if(isset($employee->driving_licence_copy) && !empty($employee->driving_licence_copy))
                                            <img alt="" id="dl_copy" src="{{ fileurlempdoc().$employee->driving_licence_copy }}" class="center-block userImg img-responsive">
                                        @else
                                            <img alt="" id="dl_copy" src="{{ asset('public/img/dlCopy.png') }}" class="center-block userImg img-responsive">
                                        @endif
                                            <div class="uploadProfile">
                                                <div class="btn default btn-file btn-uploadnew">
                                                <input type="file" name="driving_licence_copy" onChange="getpic('driving_licence_copy','dl_copy','dl_text',event),OpenFile('driving_licence_copy')" class="form-control imgPrv" id="driving_licence_copy" placeholder="upload passport copy">
                                                </div>
                                            </div>
                                        </div>
                                        <label for="profile_pic">Driving Licence copy</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-offset-4 col-md-4">
                            <div class="formAction-ng">
                                <button type="button" class="btn-large actionBtn redBg">Cancel</button>
                                <button type="submit" class="btn-large actionBtn greenBg">Submit</button>
                            </div>
                        </div>
                    </div>    

                </div>    
            </form>
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
           employee_name: {
             presence: true
           },

           emp_mobile: {
             presence: true,
             format: {
                pattern: "\\d{10}"
              }
           },
           age: {
                presence: true,
                format: {
                pattern: "\\d{2}"
                }
            },
           date_of_birth: {
             presence: true
           },

           email_id: {
             presence: true,
             email: true
           },

            nationality: {
             presence: true
           },

            country: {
             presence: true
           },
           city: {
             presence: true
           },
           permanent_address: {
             presence: true,
           },
           employee_code: {
             presence: true,
           },
           emp_role: {
             presence: true,
           }

    };

    var form=document.querySelector("form#main");     
    var inputs = document.querySelectorAll("input, textarea, select")
       //alert(inputs);
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
        //alert("sldfjdsk");
        var abc1 = $('#staff_type').val();
        //alert('ajksldf');
        if(abc1==null || abc1=="") {
            $('.greenq1').removeClass('successGreen');
             $('.fff1').removeClass('has-success');
              $('.fff1').addClass('has-error');
             var block = document.createElement("span");
              block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Service Type cannot be blank';
                $('.messages11').html(block);
                $('#staff_type').focus();
                return  false;
            }else{
                $('.fff1').removeClass('has-error');
                $('.greenq1').addClass('successGreen');
                $('.fff1').addClass('has-success');
                $('.messages11').html('');
            }
        document.getElementById('main').submit();
      //   return true;
      // showSuccess();
    }else{
        var abc1 = $('#staff_type').val();
        //alert('ajksldf');
        if(abc1==null || abc1=="") {
            $('.greenq1').removeClass('successGreen');
             $('.fff1').removeClass('has-success');
              $('.fff1').addClass('has-error');
             var block = document.createElement("span");
              block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Service Type cannot be blank';
                $('.messages11').html(block);
                return  false;
            }else{
                $('.fff1').removeClass('has-error');
                $('.greenq1').addClass('successGreen');
                $('.fff1').addClass('has-success');
                $('.messages11').html('');
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

$('#staff_type').on('change', function() {
    var abc1 = $('#staff_type').val();
    if(abc1==null || abc1=="") {
        $('.greenq1').removeClass('successGreen');
            $('.fff1').removeClass('has-success');
            $('.fff1').addClass('has-error');
            var block = document.createElement("span");
            block.classList.add("help-block");
        block.classList.add("error");
        block.innerHTML = 'Service Type cannot be blank';
            $('.messages11').html(block);
    }else{
        $('.fff1').removeClass('has-error');
        $('.greenq1').addClass('successGreen');
        $('.fff1').addClass('has-success');
        $('.messages11').html('');
    }
});
</script>
@endsection