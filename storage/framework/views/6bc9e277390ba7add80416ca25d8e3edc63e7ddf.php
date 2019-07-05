<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Nitty-Gritty - Services</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta content="" name="author" />
<link href="<?php echo e(asset('public/plugins/ios-switch/ios7-switch.css')); ?>" rel="stylesheet" type="text/css" media="screen">

<!-- <script src="../../cdn-cgi/apps/head/QJpHOqznaMvNOv9CGoAdo_yvYKU.js"></script><link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" /> -->
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
<link href="<?php echo e(asset('public/plugins/jquery-datatable/css/jquery.dataTables.css')); ?>" rel="stylesheet" type="text/css" />

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

<div id="portlet-config" class="modal hide">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
    </div>
    <div class="modal-body"> Widget settings form goes here </div>
</div>

<div class="clearfix"></div>
<!-- main content start---->
<?php echo $__env->yieldContent('content'); ?>
<!--- main content end----->
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




    <script src="<?php echo e(asset('public/plugins/ios-switch/ios7-switch.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/js/form_elements.js')); ?>" type="text/javascript"></script>
    
    <script src="<?php echo e(asset('public/developer/js/custom.js')); ?>" type="text/javascript"></script>
    <script>
        $(".EditService").click(function() {
            var id = $(this).attr("data-id"); //$(this).data('key')
            $("#service_id").val(id);
            //alert(id);
        }); 
        $(".addSubService").click(function() {
            var id = $(this).attr("data-id"); //$(this).data('key')
            $("#serviceId").val(id);
           // alert(id);
        }); 

        $(".editSub_btn").click(function() {
            var id = $(this).attr("data-id"); //$(this).data('key')
            var name = $(this).attr("data-name");
            var code = $(this).attr("data-code");
            var service_price = $(this).attr("data-service_price");
            var icon = $(this).attr("data-icon");
            var service_icon = $(this).attr("data-service_icon");
            var img = "http://localhost/MyProject/public/uploads/services/"+service_icon
            alert(img);
            $("#ser_Id1").val(id);
            $("#service_name1").val(name);
            $("#service_code1").val(code);
            $("#instant_service_price1").val(service_price);
            $('#profile_copy img').attr("src",img);
            //alert(id);
        }); 
        $("#editSErviceSubmit1").click(function(){
            var fdata = document.getElementById("edit_service_form");
            var formData = new FormData(fdata) ;
            $.ajax({
                url : "<?php echo e(route('services.edit')); ?>",
                type: "POST",
                data : formData,
                async : false ,
                success : function(data){
                    if(data == 1){
                        // alert(data == 1);
                        $('.SUBeDIT').addClass('success');
                        $('.SUBeDIT').html("This Service updated successfully!");
                        setTimeout(function() 
                        {
                            $('.editNewService').modal('hide');
                        }, 2000);
                        location.reload();
                    }else{
                        $('.suberrord').addClass('error');
                        $('.suberrord').html("There is Something wrong while updating!");
                    }
                },
                cache: false ,
                contentType:false ,
                processData : false,
            }) ;  
            return false ;  
        });


        $(".edit_btn").click(function() {
            var subserviceid = $(this).attr("data-subserviceid"); //$(this).data('key')
            var id = $(this).attr("data-service_id"); //$(this).data('key')
            var name = $(this).attr("data-name");
            var code = $(this).attr("data-code");
            var price = $(this).attr("data-price");
            var hour = $(this).attr("data-hour");
            var mints = $(this).attr("data-mints");
            $("#serviceId1").val(id);  
            $("#subSErviceId").val(subserviceid);
            $("#sub_service_name1").val(name);
            $("#sub_service_code1").val(code);
            $("#estimate_price1").val(price);
            $("#estimate_hour1").val(hour);
            $("#estimate_mints1").val(mints);
            //alert(id);
        }); 

        $("#editButton").click(function(){
            var service_id = $("#serviceId1").val(); 
            var id = $("#subSErviceId").val(); 
            var name = $("#sub_service_name1").val();
            var code = $("#sub_service_code1").val();
            var price = $("#estimate_price1").val();
            var hour = $("#estimate_hour1").val();
            var mints = $("#estimate_mints1").val();
            var token = $('#token').val();
            //alert(name);
            $.ajax({ 
                url: 'editSubSErvice/'+id,
                data: {"_token":token,"service_id":service_id, "id":id , "name":name, "code":code, "price":price, "hour":hour, "mints":mints},
                type: 'post',
                success: function(result)
                {
                    //alert(result == 1);
                    if(result == 1){
                        $('#SUBeDIT').addClass('success');
                        $('#SUBeDIT').html("This SubService updated successfully!");
                        setTimeout(function() 
                        {
                            $('.bs-example-modal-lg').modal('hide');
                        }, 3000);
                    }else{
                        $('#suberrord').addClass('error');
                        $('#suberrord').html("There is Something wrong while updating!");
                    }
                        
                }
            });
        });

        // $(document).ready(function(){
        //     $(".view_service_btn").click(function(){
        //         $(".overlay_box").animate({
        //             width: "toggle"
        //         });
        //     });

        //     $(".close_overlay_box").click(function(){
        //         $(".overlay_box").animate({
        //             width: "toggle"
        //         });
        //     });
        // });

        // function getTemp(e){
        //     alert("obj");
        //     console.log(e);
        // }
    </script>
</body>
</html>