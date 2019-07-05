
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Nitty-Gritty - Packages</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

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

<link href="<?php echo e(asset('public/plugins/bootstrap-datepicker/css/datepicker.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/css/webarch.css')); ?>" rel="stylesheet" type="text/css" />

<link href="<?php echo e(asset('public/developer/css/styles.css')); ?>" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://use.fontawesome.com/6fd4525080.js"></script>
<?php echo $__env->yieldContent('css'); ?>
<style>
    @font-face {
        font-family: 'Nexa Bold';
        src: url('<?php echo e(asset("public/fonts/Nexa Bold.otf")); ?>');
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

    .pc-price-29 {
        color: #999;
        position: relative;
        z-index: 0;
        width:100%;
        box-shadow: 0px 3px 32px hsla(0, 0%, 79%, 0.75);
        border: 1px solid #e5e1e1;
        margin-bottom: 20px;
    }

    .pc-price-29 .price-title {
        /* background-color: #30414b; */
        background:#2f9247;
        color: #fff;
        padding: 23px 0 116px;
        position: relative;
        -webkit-transition: all 0.3s ease-in-out 0s;
        -moz-transition: all 0.3s ease-in-out 0s;
        -o-transition: all 0.3s ease-in-out 0s;
        transition: all 0.3s ease-in-out 0s;
    }

    .pc-price-29 .price-title:before {
        background-color: transparent;
        bottom: 0;
        content: "";
        left: -15px;
        position: absolute;
        right: -15px;
        top: 0;
        z-index: -1;
        -webkit-transition: all 0.3s ease-in-out 0s;
        -moz-transition: all 0.3s ease-in-out 0s;
        -o-transition: all 0.3s ease-in-out 0s;
        transition: all 0.3s ease-in-out 0s;
    }

    .pc-price-29 .price-title h3 {
        font-family: "Dosis", sans-serif;
        /* font-size: 42px; */
        font-size: 22px;
        font-weight: 600;
        line-height: 1.1;
        margin: 0;
        color: #fff;
        letter-spacing: 1px;
    }
    .pc-price-29 .price-title h6{
        font-weight: 500;
        color: #fff8dc;
        letter-spacing: 1.3px;
        font-size: 14px;
    }
    .pc-price-29 .pricing {
        background-color: #fff;
        font-family: "Dosis", sans-serif;
        color: #333333;
        border-radius: 50%;
        box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.5), 0 0 0 -1px rgba(255, 255, 255, 0.5), 0 0 0 15px rgba(255, 255, 255, 0.5);
        height: 140px;
        left: 50%;
        margin: -70px 0 0 -70px;
        position: absolute;
        top: auto;
        width: 140px;
        -webkit-transition: all 0.3s ease-in-out 0s;
        -moz-transition: all 0.3s ease-in-out 0s;
        -o-transition: all 0.3s ease-in-out 0s;
        transition: all 0.3s ease-in-out 0s;
    }

    .pc-price-29 .price-inner {
        left: 50%;
        position: absolute;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }
    .pc-price-29 .pricing .currency {
        display: inline-block;
        font-weight: 700;
        margin: 0 1px 4px 0;
        vertical-align: bottom;
    }
    .pc-price .pricing span {
        display: inline-block;
        font-size: 18px;
        line-height: normal;
    }
    .pc-price-29 .pricing .value {
        font-size: 35px;
        font-weight: 700;
    }
    .pc-price .pricing .value {
        font-size: 48px;
        line-height: 40px;
    }

    .pc-price .pricing span {
        display: inline-block;
        font-size: 18px;
        line-height: normal;
    }

    .pc-price-29 .pricing .period {
        display: block;
        font-size: 18px;
        font-weight: 700;
        margin-top: 3px;
    }
    .pc-price-29 .price-body {
        background-color: #eee;
        padding: 80px 0 45px;
    }

    .pc-price ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .pc-price .price-body li {
        line-height: 25px;
        white-space: nowrap;
        color: #1a1e23;
        font-weight: 500;
        font-size: 14px;
        padding-bottom: 13px;
    }
    .pc-price .price-body li span{
        display: block;
        font-size: 12px;
        color: #6f7b8a;
    }
    .pc-price-29 .pc-btn {
        /* background-color: #2a353b; */
        background-color: #2f9247;
        border: 0 none;
        border-radius: 50px;
        box-shadow: 0 0 0 0 rgba(42, 53, 59, 0.15), 0 0 0 -1px rgba(42, 53, 59, 0.15), 0 0 0 5px rgba(42, 53, 59, 0.15);
        color: #fff;
        display: inline-block;
        font-size: 14px;
        font-weight: 400;
        line-height: 37px;
        margin: 31px 0 0;
        padding: 0 40px;
        position: relative;
    }
    .mar_btm30{
        margin-bottom: 30px;
    }
    .pc-price-29 .price-body .nav-tabs{
        background:#ffffff;
        display: -webkit-inline-box;
    }
    .pc-price-29 .price-body .nav-tabs {
        float: none;
    }
    .pc-price-29 .price-body .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover{
        color: #2f9247;
    }
    .pc-price-29 .price-body .nav-tabs>li>a{
        padding: 15px 20px 5px ;
        text-transform: uppercase;
    }
    .pc-price-29 .price-body .srvBody{
        height: 365px;
        overflow-y: auto;
        overflow-x: hidden;
    }
    .amc{
        color: #1a1e23;
        font-weight: 500;
    }
    .amch4{
        font-weight: 500;
        font-size: 14px;
        color: #2f9247;
    }
    .table-responsive tr td img{
        width:120px;
    }

    .bnrImg .up_img_pro{
        margin-top:0px !important;
    }
    .bnrImg .form-body .upProfile_sec, .bnrImg .form-body{
        padding:0px !important; 
    }
    .bannerImgBox{
        max-width:100% !important;
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
<script src="<?php echo e(asset('public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')); ?>" type="text/javascript"></script>
    
<script src="<?php echo e(asset('public/developer/js/custom.js')); ?>" type="text/javascript"></script>
<?php echo $__env->yieldContent('js'); ?>
<script>
$("#date_schedule").datepicker();
setTimeout(function() {
    $('.alert-info').slideUp(300);
}, 5000); 
    $('#refreshbutton').click(function(){
        location.reload();
    });
$('#package_type').on('change',function(){
    var packageID = $(this).val();    
    if(packageID){
        $.ajax({
           type:"GET",
           url:"<?php echo e(url('admin/contracts/packagedata')); ?>?package_id="+packageID,
           success:function(res){               
            if(res){
                var json = $.parseJSON(res);
                $("#package_category").empty();
                //alert(res);
                $.each(json,function(index, value){
                  //  alert(value.id);
                    $("#package_category").append('<option value="'+value.id+'">'+value.title+'</option>');
                });
           
            }else{
               $("#package_category").empty();
            }
           }
        });
    }else{
        $("#package_category").empty();
    }
        
   });

   
</script>


</body>
</html>        