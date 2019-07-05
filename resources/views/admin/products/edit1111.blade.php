@extends('admin.layouts.product_layout')

    @section('content')
        <div class="content">
            <div class="page-title"> 
                <a href="{{ url()->previous() }}" class="previousBtn">
                    <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
                </a>
                <h3>Edit Product</h3>
            </div>

            <div class="content-box-main-ng marginBottom0">
                <h3 class="text-center">Edit Product</h3>
           
                <form action="{{ url('admin/inventry/products/'.$id) }}" method="POST" enctype="multipart/form-data" id="main" novalidate>
                    {{ csrf_field() }}

                    <div class="content-box-main-vdr">
                        <div class="row">
                            <div class="col-md-offset-4 col-md-4 newEmp-ng">
                                <h4 class="text-center paddingBottom30">Upload Inventory Photo</h4>
                                <div class="upProfile_sec bgNone">
                                    <div class="form-group form-md-line-input">
                                        <div class="docMainBox profileImgBox">
                                        @if(isset($products->product_img) && !empty($products->product_img))
                                            <img alt="" id="product_copy" src="{{ fileurlProduct().$products->product_img }}" class="center-block img-responsive">
                                        @else
                                            <img alt="" id="product_copy" src="{{ asset('public/img/defaultInventory.png') }}" class="center-block img-responsive">
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
                                            <img alt="" id="product_copy" src="{{ asset('public/img/Icons_upload_white.png') }}" class="center-block userImg img-responsive">
                                            <div class="uploadProfile">
                                                <div class="btn default btn-file btn-uploadnew">
                                                    <input type="file" name="emp_profile" onChange="getpic('product_pic_copy','product_copy','dl_text',event),OpenFile('product_pic_copy')" class="form-control imgPrv" id="product_pic_copy">
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
                                <h4 class="text-center paddingBottom30">Inventory Information</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new form-group">  
                                            <div class="label_head">Service Type</div>   
                                            <select name="service_id" id="sService_type"  class="form-control" required>
                                                <option value="">Select Services</option>
                                                @if(isset($services) && !empty($services))
                                                @foreach($services as $ser)
                                                    <option <?php if(isset($products->service_id) && !empty($products->service_id) && $ser->id == $products->service_id){echo "selected"; }else{ echo "";}?> value="{{ $ser->id }}">{{ $ser->service_name }}</option>
                                                @endforeach
                                                @endif
                                            </select>

                                            <div class="iconDiv">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div>
                                            <div class="messages"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new form-group">  
                                            <div class="label_head">Sub Service Type</div>   
                                            <select name="sub_service_id" id="subService_type"  class="form-control" >
                                                <option value="">Select Sub Service</option>
                                                @if(isset($subservices) && !empty($subservices))
                                                @foreach($subservices as $sub)
                                                    <option <?php if(isset($products->sub_service_id) && !empty($products->sub_service_id) && $sub->id == $products->sub_service_id){echo "selected"; }else{ echo "";}?> value="{{ $sub->id }}">{{ $sub->sub_service_name }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            <div class="iconDiv">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div>
                                            <div class="messages"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Product Category</div>
                                            <select name="category_id" id="category_id" class="form-control">
                                                <option value="">Select Product Type</option>
                                                @if(isset($categories) && !empty($categories))
                                                    @foreach($categories as $cat)
                                                        <option <?php if(isset($products->category_id) && !empty($products->category_id) && $cat->id == $products->category_id){echo "selected"; }else{ echo "";}?> value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <div class="iconDiv">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div>
                                            <!-- <div class="messages"></div> -->
                                        </div> 
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new form-group">  
                                        <div class="label_head">Product Name</div>
                                            <input class="form-control" name="product_name" value="{{ $products->product_name }}" id="product_name" placeholder="Product Name" required>   
                                            <div class="iconDiv">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div>
                                            <div class="messages"></div>                                          
                                        </div>
                                    </div>
                                </div>
                                    

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new form-group">  
                                            <div class="label_head">Product Code</div>
                                            <input class="form-control" name="product_code" value="{{ $products->product_code }}" id="product_code" placeholder="Product Code" required> 
                                            <div class="iconDiv">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div>
                                            <div class="messages"></div> 
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Use another Services</div>   
                                            <select class="multiselect form-control form-control1" name="another_servId[]" id="another_servId"  multiple>
                                                <option value="">Select another Services</option>
                                                <?php $arr = array();
                                                $arr = explode(',',$products->another_servId); ?>
                                                <?php if(isset($services) && !empty($services)){
                                                foreach($services as $ser){
                                                    $selected = (in_array($ser->id, $arr) == 0) ? '' : 'selected="selected"' ; 
                                                    ?> 
                                                    <option <?= $selected; ?> value="{{ $ser->id }}" >{{ $ser->service_name }}</option>
                                                <?php }} ?>
                                            </select>
                                            <div class="iconDiv">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div> 
                                            <!-- <div class="messages"></div> -->
                                        </div>
                                    </div>
                                </div> 

                                <div id="appendDtata">
                                @if(isset($products->brands[0]) && !empty($products->brands[0]))
                                @foreach($products->brands as $bnd)
                                    <div class="order_history_box" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form_control_new">  
                                                    <div class="label_head">Brand Name </div>
                                                    <div class="form-group fff1"> 
                                                        <select name="brand_id[]" id="brand_name1"  class="form-control focus12" required>
                                                            <option value="">Select Brands</option>
                                                            @if(isset($brands) && !empty($brands))
                                                            @foreach($brands as $bd)
                                                                <option <?php if(isset($bnd->brand_id) && !empty($bnd->brand_id) && $bnd->brand_id ==$bd->id ){echo "selected";}else{ echo "";}?> value="{{ $bd->id }}">{{ $bd->brand_name }}</option>
                                                            @endforeach
                                                            @endif
                                                        </select>
                                                        <div class="iconDiv  greenq1">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </div> 
                                                        <div class="messages11"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 form-group qty1">
                                                <div class="form_control_new">  
                                                    <div class="label_head">Quantity</div>
                                                    <input class="form-control focus12" name="qty[]" value="{{ $bnd->qty }}" id="qty" placeholder="Quantity" required> 
                                                    <div class="iconDiv  qty11">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="messages messages12"></div>  
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6  form-group price1">
                                                <div class="form_control_new">  
                                                    <div class="label_head"> Price</div>
                                                    <input class="form-control focus12" name="price[]" value="{{ $bnd->price }}" id="price" placeholder="Price" required> 
                                                    <div class="iconDiv  price11">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="messages messages13"></div> 
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form_control_new">  
                                                    <div class="label_head"> Selling Price</div>
                                                    <input class="form-control" name="selling_price[]" value="{{ $bnd->selling_price }}" id="selling_price" placeholder="Selling Price" > 
                                                    <div class="iconDiv">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form_control_new">  
                                                    <div class="label_head"> Custom Price</div>
                                                    <input class="form-control" name="custom_price[]" value="{{ $bnd->custom_price }}" id="custom_price" placeholder="Custom Price" > 
                                                    <div class="iconDiv">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </div> 
                                                </div>
                                            </div>

                                            <div class="col-md-6 form-group availability_days1">
                                                <div class="form_control_new">  
                                                    <div class="label_head">Availability Days</div>
                                                    <input class="form-control focus12" name="availability_days[]" value="{{ $bnd->availability_days }}" id="availability_days" placeholder="Availability Days" required> 
                                                    <div class="iconDiv  availability_days11">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </div> 
                                                    <div class="messages messages15"></div> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form_control_new vendor_id1">  
                                                    <div class="label_head">Vendors</div>
                                                    <select class="multiselect1 form-control form-control1 focus12" name="vendor_id[]" id="vendor_id" multiple required>
                                                        <option value="">Select Vendors</option>
                                                        @if(isset($vendors[0]) && !empty($vendors[0]))
                                                            @foreach($vendors as $vendr)
                                                                <option <?php if(isset($bnd->brand_id) && !empty($bnd->brand_id) && $bnd->brand_id ==$vendr->id ){echo "selected";}else{ echo "";}?> value="{{ $vendr->id }}">{{ $vendr->company_name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <div class="iconDiv  vendor_id11">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </div> 
                                                    <div class="messages messages14"></div> 
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form_control_new">  
                                                    <div class="label_head">&nbsp;</div>
                                                    <div class="input-group"> 
                                                        <a type="button" class="btn btn-primary" onclick="addServ()">Add More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @endif
                                </div>

                                <div class="row">
                                    <div class="col-md-12 marginTop20">
                                        <div class="form_control_new">
                                            <div class="label_head">Description</div>
                                            <textarea rows="5" name="text_content" class="form-control" placeholder="Enter Description" style="width:100%;height:auto;">{{ $products->text_content }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-box-main-footer-ng">
                        <div class="row">
                            <div class="col-md-offset-4 col-md-4">
                                <input type="button" name="" class="btn-large actionBtn redBg" value="Reset">
                                <button type="submit" class="btn-large actionBtn greenBg">Submit</button>
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
            service_id: {
              presence: true
            },
            sub_service_id: {
              presence: true
            },
             product_name: {
              presence: true
            },
            //  emp_profile: {
            //   presence: true
            // },
            product_code: {
              presence: true
            }
        };

     
       var inputs = document.querySelectorAll("input, textarea, select")
       //alert(inputs);
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
        var abc1 = $('#brand_name1').val();
        var abc2 = $('#qty').val();
        var abc3 = $('#price').val();
        var abc4 = $('#vendor_id').val();
        var abc5 = $('#availability_days').val();
    if(abc1==null || abc1=="" || abc2==null || abc2=="" || !$.isNumeric(abc2) || abc3==null || abc3=="" || !$.isNumeric(abc3) || abc4==null || abc4=="" || abc5==null || abc5==""  || !$.isNumeric(abc5)){ 
        if(abc1==null || abc1=="") {
             $('.fff1').removeClass('has-success');
              $('.fff1').addClass('has-error');
               $('.greenq1').removeClass('successGreen');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Brand Name cannot be blank';
            $('.messages11').html(block);
            $('.qty11').removeClass('successGreen');
            $('.price11').removeClass('successGreen');
                 //return  false;
        }else{
            $('.greenq1').addClass('successGreen');
            $('.fff1').removeClass('has-error');
            $('.fff1').addClass('has-success');
            $('.messages11').html('');
        }
        //var abc2 = $('#qty').val();
        if(abc2==null || abc2=="" || !$.isNumeric(abc2)) {
            $('.qty11').removeClass('successGreen');
             $('.qty1').removeClass('has-success');
              $('.qty1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Quantity cannot be blank And Only Enter Numeric Value';
                $('.messages12').html(block);
                 //return  false;
        }else{
            $('.qty1').removeClass('has-error');
            $('.qty11').addClass('successGreen');
            $('.qty1').addClass('has-success');
            $('.messages12').html('');
        }

         //var abc3 = $('#price').val();
        if(abc3==null || abc3=="" || !$.isNumeric(abc3)) {
            $('.price11').removeClass('successGreen');
             $('.price1').removeClass('has-success');
              $('.price1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'price cannot be blank And Only Enter Numeric Value';
                $('.messages13').html(block);
                //return  false;
        }else{
            $('.price1').removeClass('has-error');
            $('.price11').addClass('successGreen');
            $('.price1').addClass('has-success');
            $('.messages13').html('');
        }
        //var abc1 = $('#vendor_id').val();
        if(abc4==null || abc4=="") {
            $('.vendor_id11').removeClass('successGreen');
             $('.vendor_id1').removeClass('has-success');
              $('.vendor_id1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Vendor ID cannot be blank';
                $('.messages14').html(block);
        }else{
            $('.vendor_id1').removeClass('has-error');
            $('.vendor_id11').addClass('successGreen');
            $('.vendor_id1').addClass('has-success');
            $('.messages14').html('');
        }
        if(abc5==null || abc5==""  || !$.isNumeric(abc5)) {
            $('.availability_days11').removeClass('successGreen');
             $('.availability_days1').removeClass('has-success');
              $('.availability_days1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Availability days cannot be blank And Only Enter Numeric Value';
                $('.messages15').html(block);
        }else{
            $('.availability_days1').removeClass('has-error');
            $('.availability_days11').addClass('successGreen');
            $('.availability_days1').addClass('has-success');
            $('.messages15').html('');
        }
        var emptyAreas1 = $('.focus12').filter(function(index, element) {
            return $.trim($(element).val()) === '';
            });
         emptyAreas1.first().focus();
       return false;
       } 
        document.getElementById('main').submit();
      //   return true;
      // showSuccess();
    }
     else{
        var abc1 = $('#brand_name1').val();
        if(abc1==null || abc1=="") {
            $('.greenq1').removeClass('successGreen');
             $('.fff1').removeClass('has-success');
              $('.fff1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Brand Name cannot be blank';
            $('.messages11').html(block);
            $('.qty11').removeClass('successGreen');
            $('.price11').removeClass('successGreen');
             $('.qty1').removeClass('has-success');
              $('.price1').removeClass('has-success');
                 //return  false;
        }else{
            $('.greenq1').addClass('successGreen');
            $('.fff1').removeClass('has-error');
            $('.fff1').addClass('has-success');
            $('.messages11').html('');
        }

        var abc2 = $('#qty').val();
        if(abc2==null || abc2=="" || !$.isNumeric(abc2)) {
            $('.qty11').removeClass('successGreen');
            $('.qty1').removeClass('has-success');
            $('.qty1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Quantity cannot be blank  And Only Enter Numeric Value';
            $('.messages12').html(block);
            $('.price11').removeClass('successGreen');
            $('.price1').removeClass('has-success');
             //return  false;
        }else{
            $('.qty1').removeClass('has-error');
            $('.qty11').addClass('successGreen');
            $('.qty1').addClass('has-success');
            $('.messages12').html('');
        }

        var abc3 = $('#price').val();
        if(abc3==null || abc3=="" || !$.isNumeric(abc3)) {
            $('.price11').removeClass('successGreen');
             $('.price1').removeClass('has-success');
              $('.price1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'price cannot be blank And Only Enter Numeric Value';
                $('.messages13').html(block);
                //return  false;
        }else{
            $('.price1').removeClass('has-error');
            $('.price11').addClass('successGreen');
            $('.price1').addClass('has-success');
            $('.messages13').html('');
        }
       var abc4 = $('#vendor_id').val();
        if(abc4==null || abc4=="") {
            $('.vendor_id11').removeClass('successGreen');
             $('.vendor_id1').removeClass('has-success');
              $('.vendor_id1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Vendor ID cannot be blank';
                $('.messages14').html(block);
        }else{
            $('.vendor_id1').removeClass('has-error');
            $('.vendor_id11').addClass('successGreen');
            $('.vendor_id1').addClass('has-success');
            $('.messages14').html('');
        }
        var abc5 = $('#availability_days').val();
        if(abc5==null || abc5==""  || !$.isNumeric(abc5)) {
            $('.availability_days11').removeClass('successGreen');
             $('.availability_days1').removeClass('has-success');
              $('.availability_days1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Availability days cannot be blank And Only Enter Numeric Value';
                $('.messages15').html(block);
        }else{
            $('.availability_days1').removeClass('has-error');
            $('.availability_days11').addClass('successGreen');
            $('.availability_days1').addClass('has-success');
            $('.messages15').html('');
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
    _.each(form.querySelectorAll("input[name], select[name] ,input[name='service_type[]'], textarea[name]"), function(input) {
      // Since the errors can be null if no errors were found we need to handle
      // that
      showErrorsForInput(input, errors && errors[input.name]);
    });
  }

  // Shows the errors for a specific input
  function showErrorsForInput(input, errors) {
    //alert(errors);
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
    $('#brand_name1').on('change', function() {
        var abc1 = $('#brand_name1').val();
        if(abc1==null || abc1=="") {
            $('.greenq1').removeClass('successGreen');
             $('.fff1').removeClass('has-success');
              $('.fff1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Brand Name cannot be blank';
                $('.messages11').html(block);
        }else{
            $('.fff1').removeClass('has-error');
            $('.greenq1').addClass('successGreen');
            $('.fff1').addClass('has-success');
            $('.messages11').html('');
        }
});

$('#qty').on('change', function() {
        var abc2 = $('#qty').val();
        //var regex=/^[0-9]+$/;
        if(abc2==null || abc2=="" || !$.isNumeric(abc2)) {
            $('.qty11').removeClass('successGreen');
             $('.qty1').removeClass('has-success');
              $('.qty1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Quantity cannot be blank And Use Only Numeric Value';
                $('.messages12').html(block);
        }else{
            $('.qty1').removeClass('has-error');
            $('.qty11').addClass('successGreen');
            $('.qty1').addClass('has-success');
            $('.messages12').html('');
        }
});
$('#price').on('change', function() {
        var abc3 = $('#price').val();
        if(abc3==null || abc3=="" || !$.isNumeric(abc3)) {
            $('.price11').removeClass('successGreen');
             $('.price1').removeClass('has-success');
              $('.price1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'price cannot be blank And Use Only Numeric Value';
                $('.messages13').html(block);
        }else{
            $('.price1').removeClass('has-error');
            $('.price11').addClass('successGreen');
            $('.price1').addClass('has-success');
            $('.messages13').html('');
        }
 });
 $('#vendor_id').on('change', function() {
        var abc1 = $('#vendor_id').val();
        if(abc1==null || abc1=="") {
            $('.vendor_id11').removeClass('successGreen');
             $('.vendor_id1').removeClass('has-success');
              $('.vendor_id1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Vendor ID cannot be blank';
                $('.messages14').html(block);
        }else{
            $('.vendor_id1').removeClass('has-error');
            $('.vendor_id11').addClass('successGreen');
            $('.vendor_id1').addClass('has-success');
            $('.messages14').html('');
        }
 }); 
  $('#availability_days').on('change', function() {
        var abc5 = $('#availability_days').val();
        if(abc5==null || abc5==""  || !$.isNumeric(abc5)) {
            $('.availability_days11').removeClass('successGreen');
             $('.availability_days1').removeClass('has-success');
              $('.availability_days1').addClass('has-error');
             var block = document.createElement("span");
             block.classList.add("help-block");
            block.classList.add("error");
            block.innerHTML = 'Availability days cannot be blank And Only Enter Numeric Value';
                $('.messages15').html(block);
        }else{
            $('.availability_days1').removeClass('has-error');
            $('.availability_days11').addClass('successGreen');
            $('.availability_days1').addClass('has-success');
            $('.messages15').html('');
        }
 });           
</script>
@endsection