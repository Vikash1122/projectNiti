@extends('admin.layouts.main-layout')

@section('content')
    <div class="content">
        <div class="page-title"> 
            <a href="{{ url()->previous() }}" class="previousBtn">
                <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
            </a>
            <h3>Categories </h3>
            <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Add Category</h3></div>
        </div>

        <div class="row">
            <div class="col-md-4 ">
                <div class="sub_service_form">
                    <form action="{{ route('categories.post') }}" method="POST" enctype="multipart/form-data" id="main" novalidate>
                        {{ csrf_field() }}
                        <div class="content-box-main-ng marginBottom0">
                            <h3>Add New Category</h3>
                            <div class="content-box-main marginBottom0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Service Type</div>
                                            <div class="form-group">
                                                <select class="form-control" name="service_id" id="serviceIid123" required> 
                                                    <option value="">Select Service Type</option>
                                                    @if(isset($services) && !empty($services))
                                                        @foreach($services as $ser)
                                                        <option value="{{ $ser->id }}">{{ $ser->service_name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="messages"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Sub Service Type</div>
                                            <div class="form-group"> 
                                                <select class="form-control" name="sub_service_id" id="sub_serviceIid123" required> 
                                                    <option value="">Select Sub Service Type</option>
                                                    @if(isset($subservices) && !empty($subservices))
                                                        @foreach($subservices as $sub)
                                                        <option value="{{ $sub->id }}">{{ $sub->sub_service_name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="messages"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Category Name</div>
                                            <div class="form-group"> 
                                                <input class="form-control" name="name" id="name" placeholder="Category Name" required> 
                                            </div>
                                            <div class="messages"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Category Code</div>
                                            <div class="form-group"> 
                                                <input class="form-control" name="code" id="code" placeholder="Category Code" required> 
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
                                                        <img alt="" id="brand_icon" src="http://3.16.87.53/public/img/Icons_upload.png" class="center-block userImg img-responsive">
                                                        <div class="uploadProfile">
                                                            <div class="btn default btn-file btn-uploadnew">
                                                                <input type="file" name="brand_icon" onchange="getpic('brand_icon_copy','brand_icon','dl_text',event),OpenFile('brand_icon_copy')" class="form-control imgPrv" id="brand_icon_copy">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="messages text-left"></div>
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

@endsection
@section('js')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function(){
	$('#serviceIid123').on('change',function(){
		var serID = $(this).val();
		alert(serID);
		if(serID){
		$.ajax({
			type : "get",
           	url:"{{ url('admin/categories/getajaxSubServicedata') }}?service_id="+serID,

			success:function(data){
				console.log(data);
				if(data){
					var json = $.parseJSON(data);
					$('#sub_serviceIid123').empty();
					$('#sub_serviceIid123').append('<option value="">select Sub Service</option>');
					$.each(json,function(index,value){
						$('#sub_serviceIid123').append('<option value="'+value.id+'">'+value.sub_service_name+'</oprion>');
					});
				}else{
					$('#sub_serviceIid123').empty();
				}
			}
		});
	}else{
		$('$sub_serviceIid123').empty();
		$('#sub_serviceIid123').append('<option value="">select Sub Service</option>');
	}
	});
});	
</script>
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
            service_id: {
              presence: true
            },

            sub_service_id: {
              presence: true
            },
            name: {
              presence: true
            },
            code: {
              presence: true
            },
             brand_icon: {
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