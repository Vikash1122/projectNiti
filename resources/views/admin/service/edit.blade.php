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
    .page-title i{
        padding-left: 15px;
        top: 9px;
    }
    
    .page-title .sub_pages{
        width:auto;
        float:left;
    }
    .page-title .sub_pages h3{
        color: #454545;
    }

    .sub_service_form{
        box-shadow: 0px 3px 32px hsla(0, 0%, 54%, 0.3607843137);
        width: 100%;
        float: left;
    }

    .form-control::placeholder{
        color: rgba(77, 77, 77, .34);
        font-weight: 100 !important;
        font-size:20px;
    }
    .form-control:-ms-input-placeholder{
        color: rgba(77, 77, 77, .34);
        font-weight: 100 !important;
        font-size:20px;
    }
    .form-control::-ms-input-placeholder{
        color: rgba(77, 77, 77, .34);
        font-weight: 100 !important;
        font-size:20px;
    }
    
    .srv_add_new .docMainBox .userImg {
        /* width: 76.55px !important;
        height: 69.89px !important;
        margin: 6px 6px !important; */
        width: 60px !important;
        height: 52px !important;
        margin: 9px 9px !important;
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
            <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Edit Service</h3></div>
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
                    <form action="{{ url('admin/services/'.$id) }}" method="POST" enctype="multipart/form-data" id="main" novalidate>
                    {{ csrf_field() }}
                        <div class="content-box-main-ng marginBottom0">
                            <h3>Edit Service</h3>
                            <div class="content-box-main marginBottom0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Service Name</div>
                                            <div class="form-group">
                                                <input class="form-control" value="{{ $services->service_name }}" name="service_name" id="service_name" placeholder="Service Name" required>
                                                 
                                            </div>
                                            <div class="messages"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Service Code</div>
                                            <div class="form-group"> 
                                                <input class="form-control" value="{{ $services->service_code }}" name="service_code" id="service_code" placeholder="Service Code" required>
                                                
                                            </div>
                                            <div class="messages"></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form_control_new srv_add_new">
                                            <div class="label_head">Upload Service Icon</div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="docMainBox">
                                                        @if(isset($services->service_icon) && !empty($services->service_icon))
                                                            <img alt="" id="service_icon" src="{{ fileurlservice().$services->service_icon }}" class="center-block userImg img-responsive">
                                                        @else
                                                            <img alt="" id="service_icon" src="{{ asset('public/img/uploadimage.png') }}" class="center-block userImg img-responsive">
                                                        @endif
                                                        
                                                        <div class="uploadProfile">
                                                            <div class="btn default btn-file btn-uploadnew">
                                                            <input type="file" name="service_icon" onChange="getpic('service_icon_copy','service_icon','dl_text',event),OpenFile('service_icon_copy')" class="form-control imgPrv" id="service_icon_copy">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                            </div>

                            <div class="new_add_srv_btn_block">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn new_add_srv_btn">Save Changes</button>
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
            service_name: {
              presence: true
            },
             service_code: {
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

@endsection