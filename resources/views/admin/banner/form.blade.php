@extends('admin.layouts.package_layout')

@section('content')
    <div class="content">
        <div class="page-title"> 
            <div class="row">
                <div class="col-md-12">
                    <a class="previousBtn" href="{{ url()->previous() }}">
                        <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
                    </a>
                    <h3> Banners </h3>
                    <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Add New Banner</h3></div>
                </div>
            </div>
        </div>

        <div class="row">
            @if(Session::has('message')) 
                <div class="alert alert-info">
                    {{Session::get('message')}} 
                </div> 
            @endif
                
            <div class="col-md-5">
                <div class="content-box-main-ng">
                    <h3 class="text-center">Add New Banner</h3>
                    <form action="{{ route('banners.post') }}" method="post" enctype="multipart/form-data" id="main" novalidate>
                        {{ csrf_field() }}
                        <div class="row"> 
                            <div class="col-md-12 sub_service_form">
                                <div class="content-box-main">
                                    <div class="row" id="ng_addBanner">
                                        <div class="col-md-12">
                                            <div class="bnrImg profile_img_sec">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="upProfile_sec">
                                                                <a href="javascript:;" onclick="deleteBanner();" class=" pull-right dlt_btn hidden" data-id="1" title="Delete Service"><i class="fa fa-times"></i></a>
                                                            
                                                                <div class="form-md-line-input">
                                                                    <div class="docMainBox bannerImgBox">
                                                                        <img alt="" id="banner_img" src="{{ asset('public/img/no-banner.png') }}" class="center-block userImg img-responsive">
                                                                    </div>
                                                                </div>    
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="uploaBtn_ng form_control_new">
                                                                <div class="text_ng">
                                                                    <div class="form_control_new">  
                                                                        <div class="label_head">Upload Image</div>
                                                                    </div>
                                                                </div>
                                                                <div class="img_ng">
                                                                    <div class="up_img_pro">
                                                                        <img alt="" id="banner_img" src="{{ asset('public/img/Icons_upload_white.png') }}" class="center-block userImg img-responsive">
                                                                        <div class="uploadProfile">
                                                                            <div class="btn default btn-file btn-uploadnew">
                                                                            <input type="file" name="banner_img" onChange="getpic('banner_pic_copy','banner_img','dl_text',event),OpenFile('banner_pic_copy')" class="form-control imgPrv" id="banner_pic_copy" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="messages"></div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                </div>    
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form_control_new">  
                                                <div class="label_head">Banner Title</div>
                                                <div class="form-group">
                                                    <input class="form-control" name="title" id="title" placeholder="Banner Title"> 
                                                </div>
                                                <div class="messages"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form_control_new">  
                                                <div class="label_head">Banner Url</div>
                                                <div class="form-group">
                                                    <input class="form-control" name="banner_url" id="banner_url" placeholder="Banner Url" required> 
                                                </div>
                                                <div class="messages"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form_control_new">  
                                                <div class="label_head">Sort Order</div>
                                                <div class="form-group">  
                                                    <select name="sort_order" class="form-control" id="sort_order" required>
                                                        <option value="">Please Select Sort Order</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </div>
                                                <div class="messages"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-offset-2 col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group text-center radio_ng">
                                                        <label for="activateInstantly">Activate Instantly</label>
                                                        <input id="activateInstantly" type="radio" name="activate_type" value="0" checked="checked">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group text-center radio_ng">
                                                        <label for="scheduleDate">Schedule Date</label>
                                                        <input id="scheduleDate" type="radio" name="activate_type" value="1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" id="sch_date_ng"></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="new_add_srv_btn_block">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="new_add_srv_btn">Submit</button>
                                </div>
                            </div>
                        </div>  
                    </form>  
                </div>
            </div>
        <div>
    </div>
  </div>


@endsection
 @section('js')
<!-- <script src="{{ asset('public/plugins/jquery/jquery-1.11.3.min.js') }}" type="text/javascript"></script>  -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>
    <script>

        $(document).ready(function(){
           
            $('#scheduleDate').click(function(){
                $('#sch_date_ng').empty();
                $('#sch_date_ng').append(`
                    <div class="form_control_new date_picker fff11">  
                        <div class="label_head">Registration expiration</div>
                        <div class="input-append success date input-group"> 
                            <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
                            <input class="form-control" name="schedule_date" id="date_schedule" placeholder="Schedule Date" onchange="myFunction11()" required>
                        </div>
                        <div class="messages111"></div>
                    </div>`
                );
                $("#date_schedule").datepicker();
            });

           

            $('#activateInstantly').click(function(){
                $('#sch_date_ng').empty();
            });
        });

        

        function deleteBanner(){
            $('.bannerImgBox img').attr("src","{{ asset('public/img/no-banner.png') }}");
        }
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
            title: {
              presence: true
            },
            banner_img: {
                presence: true
            },
            banner_url: {
              presence: true,
              url:true
            },
             sort_order: {
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
      var radioValue = $("input[name='activate_type']:checked").val();
      //alert(radioValue);
      if(radioValue==1){
        var abc1 = $('#date_schedule').val();
        if(abc1==null || abc1=="") {
           // $('.greenq11').removeClass('successGreen');
             $('.fff11').removeClass('has-success');
              $('.fff11').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Date cannot be blank';
            $('.messages111').html(block);
            $('#date_schedule').focus();
            return false;
        }else{
            $('.fff11').removeClass('has-error');
            $('.fff11').addClass('has-success');
            $('.messages111').html('');
        }
     }   
            document.getElementById('main').submit();
    } else {
       var radioValue = $("input[name='activate_type']:checked").val();
      //alert(radioValue);
      if(radioValue==1){
        var abc1 = $('#date_schedule').val();
        if(abc1==null || abc1=="") {
           // $('.greenq11').removeClass('successGreen');
             $('.fff11').removeClass('has-success');
              $('.fff11').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Date cannot be blank';
            $('.messages111').html(block);
            return false;
        }else{
            $('.fff11').removeClass('has-error');
            //$('.greenq11').addClass('successGreen');
            $('.fff11').addClass('has-success');
            $('.messages111').html('');
        }
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
    function myFunction11() {
        var abc1 = $('#date_schedule').val();
        if(abc1==null || abc1=="") {
             $('.fff11').removeClass('has-success');
              $('.fff11').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Date cannot be blank';
            $('.messages111').html(block);
            return false;
        }else{
            $('.fff11').removeClass('has-error');
            $('.fff11').addClass('has-success');
            $('.messages111').html('');
        }
       
}
</script>
@endsection