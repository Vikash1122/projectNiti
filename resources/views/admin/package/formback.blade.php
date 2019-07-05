@extends('admin.layouts.package_layout')

@section('content')
            <div class="content">
                <div class="page-title"> 
                    <a href="{{ url()->previous() }}" class="previousBtn">
                        <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
                    </a>
                    <h3>Add Package  <span class="semi-bold">&nbsp;</span></h3>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="content-box-main-ng marginBottom0">
                            <h3 class="text-center">Add New Package</h3>
                            <form method="post" action="{{ route('contracts.post') }}" id="main" novalidate>
                                {{ csrf_field() }}
                                
                                @if(Session::has('message')) 
                                    <div class="alert alert-info">
                                        {{Session::get('message')}} 
                                    </div> 
                                @endif

                                <div class="content-box-main-vdr">
                                    <div class="content-box-main marginBottom0">
                                        <div class="row srvLst">
                                            <div class="col-md-5">
                                                <div class="form_control_new">  
                                                    <div class="label_head">Package Type</div>
                                                    <select id="package_type" name="package_id" class="form-control">
                                                        <option value="" selected>Select Package Type</option>
                                                        @if(isset($packages) && !empty($packages))
                                                        @foreach($packages as $pack)
                                                            <option value="{{ $pack->id }}">{{ $pack->package_type }}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                    <div class="messages"></div>
                                                </div>
                                            </div>

                                            <div class="col-md-5"> 
                                                <div class="form_control_new">  
                                                    <div class="label_head">Package Category</div>
                                                    <select id="package_category" name="package_cat_id" class="form-control">
                                                        <option value="" selected>Select Package Category</option>
                                                        @if(isset($cat) && !empty($cat))
                                                        @foreach($cat as $c)
                                                            <option value="{{ $c->id }}">{{ $c->title }}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                    <div class="messages"></div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div id="serviceListPkg">
                                            <div class="row" >
                                                <div class="col-md-5">
                                                    <div class="form_control_new fff1">  
                                                        <div class="label_head">Service Name</div>
                                                        <div class="form-group"> 
                                                            <input class="form-control" name="pkg_service_name[]" id="pkg_service_name" placeholder="Enter Service Name" /> 
                                                        </div>
                                                        <div class="messages messages11"></div>
                                                    </div>   
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="form_control_new fff2">  
                                                        <div class="label_head">Service Description</div>
                                                        <div class="form-group"> 
                                                            <textarea class="form-control" id="pkg_service_desc" name="pkg_service_desc[]" placeholder="Enter Service Description"></textarea>
                                                            <!-- <span class="input-group-addon" id="pkg_service_desc"><i class="fa fa-user"></i></span> 
                                                            <input class="form-control" name="pkg_service_name" id="pkg_service_name" placeholder="Enter Service Name" />  -->
                                                        </div>
                                                        <div class="messages messages14"></div>
                                                    </div>    
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form_control_new text-right">  
                                                        <div class="label_head">&nbsp;</div>
                                                        <button type="button" class="btn btn-primary btn-cons" onclick="addServicesPkg()">Add More Service</button>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>

                                <hr />
                                <div class="content-box-main-footer-ng">
                                    <div class="row" >
                                        <div class="col-md-offset-4 col-md-4">
                                            <button type="button" name="" class="btn-large actionBtn redBg">cancel</button>
                                            <button type="submit" name="" class="btn-large actionBtn greenBg">Save</button>
                                        </div>
                                    </div>
                                </div>  
                            </form>
                        </div>
                       
                    </div> 
                </div>            
            </div>    
       
    <script>
       function addServicesPkg(){
            $("#serviceListPkg").append(
                '<div class="row" >'+
                    '<div class="col-md-5">'+
                        '<div class="form_control_new">  '+
                            '<div class="label_head">Service Name</div>'+
                            '<div class="form-group"> '+
                                '<input class="form-control" name="pkg_service_name[]" id="pkg_service_name" placeholder="Enter Service Name" /> '+
                            '</div>'+
                        '</div>   '+
                    '</div>'+

                    '<div class="col-md-5">'+
                        '<div class="form_control_new">  '+
                            '<div class="label_head">Service Description</div>'+
                            '<div class="form-group"> '+
                                '<textarea class="form-control" name="pkg_service_desc[]" id="pkg_service_desc" placeholder="Enter Service Description"></textarea>'+
                            '</div>'+
                        '</div>'+  
                    '</div>'+

                    '<div class="col-md-2">'+
                        '<div class="form_control_new text-right">'+  
                            '<div class="label_head">&nbsp;</div>'+
                            '<button type="button" class="btn btn-danger btn-cons" onclick="removeServicesPkg($(this))">Remove</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'
           )
        }

        function removeServicesPkg(caller){
           //console.log(caller);
           $(caller).closest('.row').remove();
        }
    </script>
@endsection
@section('js')
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>
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
            package_id: {
              presence: true
            },
            package_cat_id: {
              presence: true
            }
        };

     
       var inputs = document.querySelectorAll("input, textarea, select");
      
      for (var i = 0; i < inputs.length; ++i) {
        inputs.item(i).addEventListener("change", function(ev) {
          var errors = validate(form, constraints) || {};
          showErrorsForInput(this, errors[this.name])
        });
      }

      // Hook up the form so we can prevent it from being posted
        var form=document.querySelector("form#main");
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
        var abc1 = $('#pkg_service_name').val();
        var abc2 = $('#pkg_service_desc').val();
      
    if(abc1==null || abc1=="" || abc2==null || abc2==""){ 
        if(abc1==null || abc1=="") {
            $('.fff1').removeClass('has-success');
            $('.fff1').addClass('has-error');
            var block = document.createElement("span");
            block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Package Service Name cannot be blank';
            $('.messages11').html(block);
                 //return  false;
        }else{
            $('.fff1').removeClass('has-error');
            $('.fff1').addClass('has-success');
            $('.messages11').html('');
        }
        
        if(abc2==null || abc2=="") {
             $('.fff2').removeClass('has-success');
              $('.fff2').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Package Service cannot be blank';
                $('.messages14').html(block);
        }else{
            $('.fff2').removeClass('has-error');
            $('.fff2').addClass('has-success');
            $('.messages14').html('');
        }
       return false;
       } 
        document.getElementById('main').submit();
      //   return true;
      // showSuccess();
    }
     else{
        var abc1 = $('#pkg_service_name').val();
         
        if(abc1==null || abc1=="") {
            //$('.greenq1').removeClass('successGreen');
             $('.fff1').removeClass('has-success');
              $('.fff1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Package Service Name cannot be blank';
            $('.messages11').html(block);
        }else{
            $('.fff1').removeClass('has-error');
            $('.fff1').addClass('has-success');
            $('.messages11').html('');
        }

       var abc2 = $('#pkg_service_desc').val();
        if(abc2==null || abc2=="") {
             $('.fff2').removeClass('has-success');
              $('.fff2').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Package Service cannot be blank';
            $('.messages14').html(block);
        }else{
            $('.fff2').removeClass('has-error');
            $('.fff2').addClass('has-success');
            $('.messages14').html('');
        }
        console.log(errors);
    }
  }

  // Updates the inputs with the validation errors
  function showErrors(form, errors) {
    // We loop through all the inputs and show the errors for that input
    _.each(form.querySelectorAll("input[name], select[name] , textarea[name]"), function(input) {
      // Since the errors can be null if no errors were found we need to handle
      // that
      showErrorsForInput(input, errors && errors[input.name]);
    });
  }

  // Shows the errors for a specific input
  function showErrorsForInput(input, errors) {
    //alert(errors);
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
<script type="text/javascript">
    $('#pkg_service_name').on('change', function() {
        var abc1 = $('#pkg_service_name').val();
        if(abc1==null || abc1=="") {
             $('.fff1').removeClass('has-success');
              $('.fff1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Package Service Name cannot be blank';
                $('.messages11').html(block);
        }else{
            $('.fff1').removeClass('has-error');
            $('.fff1').addClass('has-success');
            $('.messages11').html('');
        }
});
 $('#pkg_service_desc').on('change', function() {
        var abc1 = $('#pkg_service_desc').val();
        if(abc1==null || abc1=="") {
             $('.fff2').removeClass('has-success');
              $('.fff2').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Package Service cannot be blank';
                $('.messages14').html(block);
        }else{
            $('.fff2').removeClass('has-error');
            $('.fff2').addClass('has-success');
            $('.messages14').html('');
        }
 });      
</script>
@endsection