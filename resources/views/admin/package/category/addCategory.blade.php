@extends('admin.layouts.package_layout')
    @section('content')
        <div class="content">
            <div class="page-title"> 
                <a href="{{ url()->previous() }}" class="previousBtn">
                    <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
                </a>
                <h3>Add Package Category<span class="semi-bold">&nbsp;</span></h3>
            </div>

            <div class="content-box-main-ng marginBottom0">
                <h3 class="text-center">Add Package Category</h3>
                <form method="post" action="{{ route('category.post') }}" id="main" novalidate>
                    <div class="row">
                        <div class="col-md-12">
                            @if(Session::has('message')) 
                                <div class="alert alert-info">
                                    {{Session::get('message')}} 
                                </div> 
                            @endif
                            <div class="content-box-main marginBottom0">
                                <div class="header_main_div_sec">
                                    <div class="title marginBottom40">
                                        <h5 class="pull-left">Add Category</h5>
                                        <button type="button" class="btn btn-primary pull-right" onclick="addCategory()">Add More Category</button>
                                    </div>       
                                </div>

                                <div class="row srvLst ">
                                {{ csrf_field() }}
                                    <div class="col-md-3">
                                        <div class="form_control_new">  
                                            <div class="label_head">Package Type</div>
                                            <select id="package_id" class="form-control" name="package_id" style="width:100%" required>
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

                                    <div class="col-md-9">
                                        <div class="row" id="boxCategory">
                                            <div class="col-md-4">
                                                <div class="form_control_new  fff1">  
                                                    <div class="label_head">Category Name</div>
                                                    <div class="form-group"> 
                                                        <input class="form-control" name="title[]" id="title" placeholder="Category Name" required> 
                                                    </div>
                                                    <div class="messages11"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-4"> 
                                        <div class="form_control_new">  
                                            <div class="label_head">Category Name</div>
                                            <div class="input-group"> 
                                                <span class="input-group-addon" id="category_name"><i class="fa fa-user"></i></span> 
                                                <input class="form-control" name="category_name" id="category_name" placeholder="Category Name"> 
                                            </div>
                                        </div>
                                    </div> -->
                                    
                                </div>                                
                            </div>

                            <div class="content-box-main-footer-ng">
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-4">
                                        <button type="button" name="" class="btn-large actionBtn redBg">cancel</button>
                                        <button type="submit" name="" class="btn-large actionBtn greenBg">Save</button>
                                    </div>
                                </div>
                            </div> 
                        </div> 
                    </div>    
                </form>   
            </div>     
        </div>    
           
        <script>

        function addCategory(){
            $("#boxCategory").append(
                '<div class="col-md-4">'+
                    '<div class="form_control_new">  '+
                        '<div class="label_head">Category Name <span class="pull-right" onclick="removeServicesPkg($(this))"><img src="{{ asset("public/img/cancel.png") }}" /></span></div>'+
                        '<div class="form-group">'+ 
                            '<input class="form-control" name="title[]" id="title" placeholder="Category Name"> '+
                        '</div>'+
                    '</div>'+
                '</div>'
            )
        }

        function removeServicesPkg(caller){
           $(caller).closest('.col-md-4').remove();
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
        var abc1 = $('#title').val();
        //alert(abc1);
        if(abc1==null || abc1=="") {
             $('.fff1').removeClass('has-success');
              $('.fff1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Brand Name cannot be blank';
            $('.messages11').html(block);
            var emptyAreas = $('.form-control').filter(function(index, element) {
              return $.trim($(element).val()) === '';
            });
            emptyAreas.first().focus();
            return false;
        }else{
            $('.fff1').removeClass('has-error');
            $('.fff1').addClass('has-success');
            $('.messages11').html('');
        }
            document.getElementById('main').submit();
    }
    else{
       var abc1 = $('#title').val();
        //alert(abc1);
        if(abc1==null || abc1=="") {
             $('.fff1').removeClass('has-success');
              $('.fff1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Brand Name cannot be blank';
                $('.messages11').html(block);
        }else{
            $('.fff1').removeClass('has-error');
            $('.fff1').addClass('has-success');
            $('.messages11').html('');
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
    $('#title').on('change', function() {
        var abc1 = $('#title').val();
        //alert(abc1);
        if(abc1==null || abc1=="") {
             $('.fff1').removeClass('has-success');
              $('.fff1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Brand Name cannot be blank';
                $('.messages11').html(block);
        }else{
            $('.fff1').removeClass('has-error');
            $('.fff1').addClass('has-success');
            $('.messages11').html('');
        }
});

</script>

@endsection   
