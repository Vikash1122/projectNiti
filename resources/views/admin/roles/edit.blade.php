@extends('admin.layouts.main-layout')

@section('content')
    <style>
        @font-face {
            font-family: 'Nexa Bold';
            src: url('../../../public/fonts/Nexa Bold.otf');
        }
        @font-face {
            font-family: 'Arial';
            src: url('../../../public/fonts/ARIALBD.TTF');
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
        .form_control_new .label_head {
            margin-bottom: 0;
            letter-spacing: 1px;
            color: #4D4D4D;
            font-size: 16px;
            font-weight: 500;
            font-family: 'Nexa Bold';
        }
        .addSerBtn{
            background: #2f9247;
            padding: 8px 20px;
            font-size: 18px;
            color: #ffffff;
            font-family: 'Nexa Bold';
            letter-spacing: 1.5px;
        }
        .error {
            color: #a94442;
        }
    </style>
    <div class="content">
        <div class="page-title"> 
            <a href="{{ url()->previous() }}" class="previousBtn">
                <img src="{{asset('public/img/go_back.png')}}" class="img-responsive">
            </a>
            <h3> User </h3>
            <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Edit User</h3></div>
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
                   
                    @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($role, [
                            'method' => 'PATCH',
                            'url' => ['/admin/privileges', $role->id],
                            'class' => 'form-horizontal', 'id' => 'main', 'novalidate' => 'novalidate'
                        ]) !!}

                        @include ('admin.roles.editform', ['formMode' => 'edit'])

                        {!! Form::close() !!}

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
            name: {
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
        var checked=false;
        var elements = document.getElementsByName("permissions[]");
        for(var i=0; i < elements.length; i++){
            $(".messages1").html("");
            if(elements[i].checked) {
                checked = true;
                }
            }
        if (!checked) {
            $(".messages1").addClass("help-block error")
           $(".messages1").html("please select Checkbox");
            return false;
        }
                document.getElementById('main').submit();
    }
    else{
        var checked=false;
        var elements = document.getElementsByName("permissions[]");
        for(var i=0; i < elements.length; i++){
             $(".messages1").html("");
            if(elements[i].checked) {
                checked = true;
                }
            }
        if (!checked) {
            $(".messages1").addClass("help-block error");
            $(".messages1").html("please select Checkbox");
            return false;
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
    //$(messages1).removeClass("successGreen");
    //$(messages1).addClass("redBg");     
  }
})();
</script>
<script type="text/javascript">
$('input[type=checkbox]').on('change', function() {
    var checked=false;
    var elements = document.getElementsByName("permissions[]");
   // alert(elements.length);
    for(var i=0; i < elements.length; i++){
        $(".messages1").html("");
        if(elements[i].checked) {
            checked = true;
        }
    }
    if (!checked) {
        $(".messages1").addClass("help-block error");
        $(".messages1").html("please select Checkbox");
    }
});
</script>

@endsection
