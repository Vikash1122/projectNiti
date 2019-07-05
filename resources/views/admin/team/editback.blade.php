@extends('admin.layouts.main-layout')
@section('css')
<style>
    @font-face {
        font-family: 'Nexa Bold';
        src: url("{{ asset('public/fonts/Nexa Bold.otf') }}");
    }
    @font-face {
        font-family: 'Arial';
        src: url("{{ asset('public/fonts/ARIALBD.TTF') }}");
    }
    .page-title{
        width:100%;
        float:left;
    }
    
    .page-title h3{
        float: left;
        width: auto;
        font-size: 20px;
        font-family: 'Nexa Bold';
        color: rgba(69, 69, 69, 0.57);
        letter-spacing: 1px;
    }
    .page-title .sub_pages{
        width:auto;
        float:left;
    }
    .page-title .sub_pages h3{
        color: #454545;
    }
    
    .marginAuto{
        margin:10px auto 10px !important;
    }
    .newH{
        padding-top: 40px;
        margin-bottom: 20px;
    }
    .padd_25{
        padding:25px !important;
    }
    .sub_service_form .has-error .form-control{
    border-color: #f35958  !important;
    }
    .sub_service_form .has-success .form-control{
        border-color: #3c763d !important;
            } 
</style>
@endsection
@section('content')
    <div class="content">
        <div class="page-title"> 
            <a class="previousBtn" href="{{ url()->previous() }}">
                <img src="{{ asset('public/img/go_back.png' )}}" class="img-responsive">
            </a>
            <h3> Privilege </h3>
            <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Edit Privilege</h3></div>
        </div>

                
        <div class="clearfix"></div>
        @if(Session::has('message')) 
            <div class="alert alert-info">
                {{Session::get('message')}} 
            </div> 
        @endif

            <div class="row">
                <div class="col-md-12 ">
                    <div class="sub_service_form">
                   
                         <form action="{{ url('admin/teams/'.$id.'/edit') }}" enctype="multipart/form-data" method="POST" id="main" novalidate>
                            {{ csrf_field() }}

                            <div class="content-box-main-ng bg_white marginBottom0">
                                <h3 class="text-center">Privilege Details</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profileImg_ng">
                                            <h3 class="text-center backgroundNone">Upload Privilege Photo</h3>
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="upProfile_sec">
                                                            <div class="form-md-line-input">
                                                                <div class="docMainBox bannerImgBox">
                                                                    <div class="boxCircle">
                                                                        @if(isset($user->admin_profile) && !empty($user->admin_profile))
                                                                            <img alt="" id="service_icon" src="{{ fileurlAdmin().$user->admin_profile }}" class="center-block userImg img-responsive">
                                                                        @else
                                                                            <img alt="" id="service_icon" src="{{ asset('public/img/defaultIcon.png') }}" class="center-block userImg img-responsive">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="uploaBtn_ng">
                                                            <div class="text_ng">
                                                                <div class="form_control_new">  
                                                                    <div class="label_head">Upload Image</div>
                                                                </div>
                                                            </div>

                                                            <div class="img_ng">
                                                                <div class="up_img_pro">
                                                                    <img alt="" id="service_icon" src="{{ asset('public/img/Icons_upload_white.png') }}" class="center-block userImg img-responsive">
                                                                    <div class="uploadProfile">
                                                                        <div class="btn default btn-file btn-uploadnew">
                                                                            <input type="file" name="admin_profile" onChange="getpic('service_icon_copy','service_icon','dl_text',event),OpenFile('service_icon_copy')" class="form-control imgPrv" id="service_icon_copy">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                </div>

                                <hr />
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-center backgroundNone paddingBottom20">Privilege Personal Information</h3>
                                    </div>
                                    <div class="col-md-offset-2 col-md-8 createProfile">
                                        <div class="content-box-main">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form_control_new">  
                                                        <div class="label_head">First Name</div>
                                                        <div class="formGroup_ng">
                                                            <div class="form-group">
                                                                <input class="form-control" name="firstname" id="firstname" value="{{ $user->firstname }}" placeholder="First Name" required> 
                                                                {!! $errors->first('firstname', '<p class="help-block">:message</p>') !!}
                                                                <div class="messages"></div>
                                                            </div>
                                                            <div class="iconDiv">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form_control_new">  
                                                        <div class="label_head">Last Name</div>
                                                        <div class="formGroup_ng">
                                                            <div class="form-group">
                                                                <input class="form-control" name="lastname" value="{{ $user->lastname }}" id="lastname" placeholder="Last Name" > 
                                                                <div class="messages"></div>
                                                            </div>
                                                            <div class="iconDiv">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form_control_new">  
                                                        <div class="label_head">Email/Username</div>
                                                        <div class="formGroup_ng">
                                                            <div class="form-group">
                                                                <input type="email" class="form-control" name="email" value="{{ $user->email }}" id="email" placeholder="Email/Username" required> 
                                                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                                                <div class="messages"></div>
                                                            </div>
                                                            <div class="iconDiv">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form_control_new">  
                                                        <div class="label_head">Mobile</div>
                                                        <div class="formGroup_ng">
                                                            <div class="form-group">
                                                                <input type="tel" class="form-control" maxlength="10" name="mobile" value="{{ $user->mobile }}" id="mobile" placeholder="Mobile" required> 
                                                                {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                                                                <div class="messages"></div>
                                                            </div>
                                                            <div class="iconDiv">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form_control_new">  
                                                        {!! Form::label('password', 'Password ', ['class' => 'label_head']) !!}
                                                        <div class="formGroup_ng">
                                                            <div class="form-group">
                                                            {!! Form::password('password',array('class' => 'form-control','placeholder'=>'Password','required' => 'required')) !!}
                                                            {!! $errors->first('password', '<p class="help-block error">:message</p>') !!}
                                                            </div>
                                                            <div class="iconDiv">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form_control_new">
                                                        <label for="password-confirm" class="label_head">Confirm Password</label>
                                                        <div class="formGroup_ng">
                                                            <div class="form-group">
                                                                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
                                                            </div>
                                                            <div class="iconDiv">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->

                                            <div class="row">    
                                                <div class="col-md-6">
                                                    <div class="form_control_new">  
                                                        {!! Form::label('role', 'Role ', ['class' => 'label_head']) !!}
                                                        <div class="formGroup_ng">
                                                            <div class="form-group">
                                                            {!! Form::select('roles', $roles, isset($user_roles) ? $user_roles : [], ['placeholder' => 'Select Role','id'=>'rOleId','class' => 'form-control']) !!}
                                                            <div class="messages"></div>
                                                            </div>
                                                            <div class="iconDiv">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="groupDIv">
                                                    @if(isset($user->group_id) && !empty($user->group_id))
                                                    <div class="col-md-6">
                                                        <div class="form_control_new fff1">
                                                            <div class="label_head">Group</div>
                                                            <div class="formGroup_ng">
                                                                <div class="form-group">
                                                                    <select name="group_id" class="form-control" id="group_id" onchange="getVal(this.value)">
                                                                    <option value="">Please Select</option>
                                                                    @if(isset($groups) && !empty($groups))
                                                                        @foreach($groups as $grp)
                                                                            <option <?php if(isset($user->group_id) && !empty($user->group_id) && $user->group_id == $grp->id){echo "selected";}else{ echo "";}?> value="{{ $grp->id }}">{{ $grp->group_name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                    </select>
                                                                </div>
                                                                <div class="iconDiv greenq1">
                                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                                </div>
                                                            </div>    
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="footer_ng">
                                        <button type="submit" class="btn resetBtn_ng">Reset</button>
                                        <button type="submit" class="btn addSerBtn">Update</button>
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
            firstname: {
              presence: true
            },

            email: {
              presence: true,
              email:true
            },
            mobile: {
              presence: true,
              format: {
                 pattern: "\\d{10}"
               }
            },
             roles: {
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
        var abc1 = $('#rOleId').val();
        if(abc1==10){
            var abc11 = $("#group_id").val();
            //alert(abc11)
            if(abc11==null || abc11=="") {
                //alert(abc11);
                $('.greenq1').removeClass('successGreen');
                $('.fff1').removeClass('has-success');
                $('.fff1').addClass('has-error');
                var block = document.createElement("span");
                block.classList.add("help-block");
                block.classList.add("error");
                block.innerHTML = 'group id cannot be blank';
                $('.messages11').html(block);
                return false;
            }else{
                $('.fff1').removeClass('has-error');
                $('.greenq1').addClass('successGreen');
                $('.fff1').addClass('has-success');
                $('.messages11').html('');
            }
        }
            document.getElementById('main').submit();
        //return true;
      //showSuccess();
    }
    else{
        var abc1 = $('#rOleId').val();
        if(abc1==10){
            var abc11 = $("#group_id").val();
            if(abc11==null || abc11=="") {
                $('.greenq1').removeClass('successGreen');
                $('.fff1').removeClass('has-success');
                $('.fff1').addClass('has-error');
                var block = document.createElement("span");
                block.classList.add("help-block");
                block.classList.add("error");
                block.innerHTML = 'group id cannot be blank';
                $('.messages11').html(block);
            }else{
                $('.fff1').removeClass('has-error');
                $('.greenq1').addClass('successGreen');
                $('.fff1').addClass('has-success');
                $('.messages11').html('');
            }

        }
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

function getVal(val){
    var abc11 = val;
    if(abc11==null || abc11=="") {
        $('.greenq1').removeClass('successGreen');
        $('.fff1').removeClass('has-success');
        $('.fff1').addClass('has-error');
        var block = document.createElement("span");
        block.classList.add("help-block");
        block.classList.add("error");
        block.innerHTML = 'group id cannot be blank';
        $('.messages11').html(block);
    }else{
        $('.fff1').removeClass('has-error');
        $('.greenq1').addClass('successGreen');
        $('.fff1').addClass('has-success');
        $('.messages11').html('');
    }
}
</script>

@endsection