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
<?php echo $__env->yieldContent('css'); ?>
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

<script src="<?php echo e(asset('public/plugins/bootstrap-select2/select2.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/jquery-datatable/js/jquery.dataTables.min.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('public/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js')); ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo e(asset('public/plugins/datatables-responsive/js/datatables.responsive.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/plugins/datatables-responsive/js/lodash.min.js')); ?>"></script>

<script src="<?php echo e(asset('public/js/datatables.js')); ?>" type="text/javascript"></script>
<?php echo $__env->yieldContent('js'); ?>
    
<script>
setTimeout(function() {
    $('.alert-info').slideUp(300);
}, 5000); 
function statusChange1(id) {
    var status = $("#enable_"+id).val();
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

    $.ajax({ 
        url: "<?php echo e(route('privileges.status')); ?>",
        data: {"role_id":id,"status":status},
        type: 'post',
        success: function(result) {
            var json = $.parseJSON(result);
            if(result != ''){
                
                location.reload();

            }
        }
    });
}

    $('#refreshbutton').click(function(){
        location.reload();
    });
$('#serviceIid1').on('change',function(){
    var serviceID = $(this).val();    
    //alert(serviceID);
    if(serviceID){
        $.ajax({
           type:"GET",
           url:"<?php echo e(url('admin/categories/getajaxSubServicedata')); ?>?service_id="+serviceID,
           success:function(res){               
            if(res){
                var json = $.parseJSON(res);
                $("#sub_serviceIid1").empty();
                //alert(res);
                $("#sub_serviceIid1").append('<option value="">Please Select</option>');
                $.each(json,function(index, value){
                  //  alert(value.id);
                    $("#sub_serviceIid1").append('<option value="'+value.id+'">'+value.sub_service_name+'</option>');
                });
           
            }else{
               $("#sub_serviceIid1").empty();
            }
           }
        });
    }else{
        $("#sub_serviceIid1").empty();
    }
        
});
    function statusChange(id) {
        var status = $("#enable_"+id).val();
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

        $.ajax({ 
            url: "<?php echo e(route('services.active')); ?>",
            data: {"service_id":id,"status":status},
            type: 'post',
            success: function(result) {
                var json = $.parseJSON(result);
                if(result != ''){
                    
                    location.reload();
 
                }
            }
        });
    }

    function statusActive(id) {
        var status = $("#enable_"+id).val();
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

        $.ajax({ 
            url: "<?php echo e(route('subservices.active')); ?>",
            data: {"sub_service_id":id,"status":status},
            type: 'post',
            success: function(result) {
                var json = $.parseJSON(result);
                if(result != ''){
                    
                    location.reload();
 
                }
            }
        });
    }
    function isActive(id) {
        var status = $("#enable_"+id).val();
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

        $.ajax({ 
            url: "<?php echo e(route('categories.status')); ?>",
            data: {"cat_id":id,"status":status},
            type: 'post',
            success: function(result) {
                var json = $.parseJSON(result);
                if(result != ''){
                    location.reload();
 
                }
            }
        });
    }
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
    

$('#rOleId').on('change',function(){
    var role = $(this).val();    
    
    if(role==10){
        var json = JSON.stringify(<?php echo $groups = \App\Group::get();; ?>); 
        var json1 = $.parseJSON(json);
        //alert(role);
        htmlslot = '';
        htmlslot='<div class="col-md-6">'+
                    '<div class="form_control_new" id="groupDIv">'+  
                        '<div class="label_head">Group</div>'+
                        '<div class="formGroup_ng">'+
                            '<div class="form-group">'+
                                '<select class="form-control" name="group_id">'+
                                    '<option value="">Please Select</option>';
                                        if(json1){
                                            $.each(json1, function(index, value) {
                                                htmlslot+='<option value="'+value.id+'">'+value.group_name+'</option>';
                                            });
                                        }
                                htmlslot+='</select>'+
                            '</div>'+
                            '<div class="iconDiv">'+
                                '<i class="fa fa-check" aria-hidden="true"></i>'+
                            '</div>'+  
                        '</div>'+
                    '</div>'+
                '</div>';
        
        $("#groupDIv").append(htmlslot);
        
    }else{
        $("#groupDIv").html('');
    }
        
});
    </script>
</body>
</html>