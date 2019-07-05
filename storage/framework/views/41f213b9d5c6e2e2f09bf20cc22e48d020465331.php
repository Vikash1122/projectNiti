<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Nitty-Gritty - Vendors</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<link href="<?php echo e(asset('public/plugins/jquery-metrojs/MetroJs.min.css')); ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/plugins/shape-hover/css/demo.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/plugins/shape-hover/css/component.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/plugins/owl-carousel/owl.carousel.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/plugins/owl-carousel/owl.theme.css')); ?>" />
<link href="<?php echo e(asset('public/plugins/pace/pace-theme-flash.css')); ?>" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo e(asset('public/plugins/jquery-slider/css/jquery.sidr.light.css')); ?>" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo e(asset('public/plugins/jquery-ricksaw-chart/css/rickshaw.css')); ?>" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo e(asset('public/plugins/Mapplic/mapplic/mapplic.css')); ?>" type="text/css" media="screen">


<link href="<?php echo e(asset('public/plugins/pace/pace-theme-flash.css')); ?>" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo e(asset('public/plugins/bootstrapv3/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrapv3/css/bootstrap-theme.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="<?php echo e(asset('public/plugins/animate.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/jquery-scrollbar/jquery.scrollbar.css')); ?>" rel="stylesheet" type="text/css" />

<link href="<?php echo e(asset('public/css/webarch.css')); ?>" rel="stylesheet" type="text/css" />

<link href="<?php echo e(asset('public/developer/css/styles.css')); ?>" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://use.fontawesome.com/6fd4525080.js"></script>
<link href="<?php echo e(asset('public/developer/css/form_wizard.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrap-datepicker/css/datepicker.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrap-tag/bootstrap-tagsinput.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrap-select2/select2.css')); ?>" rel="stylesheet" type="text/css" media="screen" />
<?php echo $__env->yieldContent('css'); ?>
<link href="<?php echo e(asset('public/plugins/jquery-datatable/css/jquery.dataTables.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/datatables-responsive/css/datatables.responsive.css')); ?>" rel="stylesheet" type="text/css" media="screen" />

<style>
     @font-face {
        font-family: 'Nexa Bold';
        src: url('../../../public/fonts/Nexa Bold.otf');
    }
    body{
        font-family: 'Nexa Bold';
    }
    h1,h2,h3,h4,h5,h6{
        font-family: 'Nexa Bold';
    }
    input, button, select, textarea{
        font-family: 'Nexa Bold';
    }  
    .page-content .breadcrumb{
        font-family: 'Nexa Bold';
    }
    .page-sidebar{
        font-family: 'Nexa Bold';
    }
    .btn{
        font-family: 'Nexa Bold';
    }
    .dltBtnImg {
        background: transparent;
        border: none;
        text-align: right;
        margin-bottom: 4px;
    }
</style>


</head>

<body class="">

    <!-- start header---->
    <?php echo $__env->make('admin.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- end header---->
    <div class="page-container row-fluid">
    <!--- start sidebar ---->
    <?php echo $__env->make('admin.includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!--- start sidebar ---->

        <div class="page-content">
            <?php echo $__env->yieldContent('content'); ?>
        </div> 
    </div>

<script src="<?php echo e(asset('public/plugins/pace/pace.min.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('public/plugins/jquery/jquery-1.11.3.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/bootstrapv3/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/jquery-block-ui/jqueryblockui.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/jquery-unveil/jquery.unveil.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/jquery-scrollbar/jquery.scrollbar.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/jquery-numberAnimate/jquery.animateNumbers.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/jquery-validation/js/jquery.validate.min.js')); ?>" type="text/javascript"></script>
<!-- <script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script> -->


<script src="<?php echo e(asset('public/js/webarch.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/js/chat.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('public/plugins/bootstrap-select2/select2.min.js')); ?>" type="text/javascript"></script>




<script src="<?php echo e(asset('public/plugins/bootstrap-tag/bootstrap-tagsinput.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/developer/js/custom.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('public/plugins/jquery-datatable/js/jquery.dataTables.min.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('public/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js')); ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo e(asset('public/plugins/datatables-responsive/js/datatables.responsive.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/plugins/datatables-responsive/js/lodash.min.js')); ?>"></script>

<script src="<?php echo e(asset('public/js/datatables.js')); ?>" type="text/javascript"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
<?php echo $__env->yieldContent('js'); ?>
<script src="<?php echo e(asset('public/developer/js/form_wizard.js')); ?>" type="text/javascript"></script>
<script>
    $('#refreshbutton').click(function(){
        location.reload();
    });
    setTimeout(function() {
        $('.alert-info').slideUp(300);
    }, 5000); 
  var i = 1;  
$(document).ready(function() {

 <?php if(isset($vendor->selected_services[0]) && !empty($vendor->selected_services[0])){ 
     foreach($vendor->selected_services as $k=>$serv){
     ?>
    $(".multiselect<?=$k; ?>").val([<?= $serv->category_id; ?>]).select2();
<?php }
}else{ ?>
    $(".multiselect").val(["Jim", "Lucy"]).select2();
<?php }?>
  

    var ckbox = $('#sub_services');

    $('#sub_services').on('click',function () {
        if (ckbox.is(':checked')) {
            $("#sub_services_block").removeClass("hidden");
        } else {
            $("#sub_services_block").addClass("hidden");
        }
    });

    $('#reg_exp_date').datepicker();
});  

$('#sService_type').on('change',function(){
    var serviceID = $(this).val();    
    //alert(serviceID);
    if(serviceID){
        $.ajax({
           type:"GET",
           url:"<?php echo e(url('admin/categories/getajaxSubServicedata')); ?>?service_id="+serviceID,
           success:function(res){               
            if(res){
                var json = $.parseJSON(res);
                $("#subService_type").empty();
                //alert(res);
                $("#subService_type").append('<option value="">Please Select</option>');
                $.each(json,function(index, value){
                  //  alert(value.id);
                    $("#subService_type").append('<option value="'+value.id+'">'+value.sub_service_name+'</option>');
                });
           
            }else{
               $("#subService_type").empty();
            }
           }
        });
    }else{
        $("#subService_type").empty();
    }
        
});
$('#subService_type').on('change',function(){
    var subserviceID = $(this).val();    
    //alert(serviceID);
    if(subserviceID){
        $.ajax({
           type:"GET",
           url:"<?php echo e(url('admin/inventry/products/ajaxCategorydata')); ?>?subservice_id="+subserviceID,
           success:function(res){               
            if(res){
                var json = $.parseJSON(res);
                $("#category_id").empty();
                //alert(res);
                $("#category_id").append('<option value="">Please Select</option>');
                $.each(json,function(index, value){
                  //  alert(value.id);
                    $("#category_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
           
            }else{
               $("#category_id").empty();
            }
           }
        });
    }else{
        $("#category_id").empty();
    }
        
});


function addServ(){
    var services = JSON.stringify(<?php echo $services; ?>); 
    var services1 = $.parseJSON(services);
    var subservices = JSON.stringify(<?php echo $subservices; ?>); 
    var subservices1 = $.parseJSON(subservices);
    var categories = JSON.stringify(<?php echo $categories; ?>); 
    var categories1 = $.parseJSON(categories);
        htmlslot = '';
        htmlslot='<div class="form_control_new" id="mydata2">'+
                    '<div class="marginBottom20">'+
                        '<div class="row">'+
                            '<div class="col-md-6">'+
                                '<div class="form_control_new">'+  
                                    '<div class="label_head">Select Service</div>'+
                                    '<select class="form-control" name="service_id[]" id="sService_type'+i+'" onchange="selectService(this.id)" required>'+
                                        '<option value="">Select Services</option>';
                                        if(services1){
                                            $.each(services1, function(index, value) {
                                                htmlslot+='<option value="'+value.id+'">'+value.service_name+'</option>';
                                            });
                                        }
                                    htmlslot+='</select>'+
                                    '<div class="iconDiv">'+
                                        '<i class="fa fa-check" aria-hidden="true"></i>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+

                            '<div class="col-md-6">'+
                                '<div class="form_control_new">'+  
                                    '<div class="label_head">Select Sub Service</div>'+
                                    '<select class="form-control" name="sub_service_id[]" id="subService_type'+i+'" onchange="selectCategory(this.id)" >'+
                                    '</select>'+
                                    '<div class="iconDiv">'+
                                        '<i class="fa fa-check" aria-hidden="true"></i>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+

                        '<div class="row">'+
                            '<div class="col-md-6">'+
                                '<div class="form_control_new">'+ 
                                '<div class="label_head">Select Category</div>'+
                                    '<select class="multiselect form-control1 form-control" name="category_id_'+i+'[]" id="category_id'+i+'" multiple>'+
                                    '</select> '+
                                    '<div class="iconDiv">'+
                                        '<i class="fa fa-check" aria-hidden="true"></i>'+
                                    '</div>'+
                                '</div>'+    
                            '</div>'+

                            '<div class="col-md-2">'+
                                '<div class="form_control_new">'+
                                    '<div class="label_head">&nbsp;</div>'+
                                    '<button type="button" onclick="removeServicesPkg();" class="btn btn-danger btn-cons">Remove</button>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'
        ;
        $("#appendDtata").append(htmlslot);
        $("select.multiselect").select2();
        i++; 
         
}

//var t = 0;
function selectService(id){
    
    var ID=id.substring(13);
    $("#subService_type"+ID).html('');
    if($("#"+id).val()){
        $.ajax({
           type:"GET",
           url:"<?php echo e(url('admin/categories/getajaxSubServicedata')); ?>?service_id="+$("#"+id).val(),
           success:function(res){     
            if(res){
                var json = $.parseJSON(res);
                $("#subService_type"+ID).html('');
               $("#subService_type"+ID).append('<option value="">Please Select</option>');
               $.each(json,function(index, value){;
                  $("#subService_type"+ID).append('<option value="'+value.id+'">'+value.sub_service_name+'</option>');
                });
           
            }else{
                $("#subService_type"+ID).append('<option value="">Please Select</option>');
            }
           }
        });
   
    }
}
function selectCategory(id){
    var ID=id.substring(15);
     if($("#"+id).val()){
        $.ajax({
           type:"GET",
           url:"<?php echo e(url('admin/inventry/products/ajaxCategorydata')); ?>?subservice_id="+$("#"+id).val(),
           success:function(res){   
            if(res){
                var json = $.parseJSON(res);
                $("#category_id"+ID).html('');
                $("#category_id"+ID).append('<option value="">Please Select</option>');
                    $.each(json,function(index, value){;
                        $("#category_id"+ID).append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                
                }else{
                    $("#category_id"+ID).append('<option value="">Please Select</option>');
                }
           }
        });
    }else{
        $("#category_id"+ID).append('<option value="">Please Select</option>');
    }

}





function removeServicesPkg(){
    var elem = document.getElementById('mydata2');
    elem.parentNode.removeChild(elem);
}

// function vendorRegistration(){
//     var fdata = document.getElementById("msform");
//     var formData = new FormData(fdata) ;
//     var category_id = $("#category_id").val();
//   //  alert(category_id);
//     $.ajax({
//         url : "<?php echo e(route('vendors.post')); ?>",
//         type: "POST",
//         data : formData,
//         async : false ,
//         success : function(data){
//             var res =$.parseJSON(data);
//             console.log(res);
//             if(data > 0){
                 
//                 setTimeout(function(){ 
//                     location.reload();
//                     window.location.href = "<?php echo e(url('admin/vendors')); ?>";
//                 }, 2000);
//                 $('.successdiv').addClass('success');
//                 $('.successdiv').html("Vendor Registered successfully!");
                
//             }else{
//                 setTimeout(function(){ 
//                     location.reload();
//                     window.location.href = "<?php echo e(url('admin/vendors')); ?>";
//                 }, 2000);
//                 $('.errordiv').addClass('error');
//                 $('.errordiv').html("There is Something wrong while Vendor Registration!");
//             }
//         },
//         cache: false ,
//         contentType:false ,
//         processData : false,
//     }) ;  
//     return false ;  
// }

// function UpdateVendorDetails(id){
//     var fdata = document.getElementById("msform");
//     var formData = new FormData(fdata) ;
//     var category_id = $("#category_id").val();
//   //  alert(category_id);
//     $.ajax({
//         url : "<?php echo e(url('admin/vendors/edit')); ?>/"+id,
//         type: "POST",
//         data : formData,
//         async : false ,
//         success : function(data){
//             var res =$.parseJSON(data);
//             console.log(res);
//             if(data > 0){
                 
//                 setTimeout(function(){ 
//                     location.reload();
//                     window.location.href = "<?php echo e(url('admin/vendors')); ?>";
//                 }, 2000);
//                 $('.successdiv').addClass('success');
//                 $('.successdiv').html("Vendor Updated successfully!");
                
//             }else{
//                 setTimeout(function(){ 
//                     location.reload();
//                     window.location.href = "<?php echo e(url('admin/vendors')); ?>";
//                 }, 2000);
//                 $('.errordiv').addClass('error');
//                 $('.errordiv').html("There is Something wrong while Vendor Updating!");
//             }
//         },
//         cache: false ,
//         contentType:false ,
//         processData : false,
//     }) ;  
//     return false ;  
// }
</script>
</body>
</html>    