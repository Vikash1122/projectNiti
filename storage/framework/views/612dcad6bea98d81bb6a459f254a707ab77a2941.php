<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Nitty-Gritty - Products</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta content="" name="author" />

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

<link href="<?php echo e(asset('public/developer/calender/fullcalendar.min.css')); ?>" rel='stylesheet' />
<link href="<?php echo e(asset('public/developer/calender/fullcalendar.print.min.css')); ?>" rel='stylesheet' media='print' />

<link href="<?php echo e(asset('public/plugins/bootstrap-datepicker/css/datepicker.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.css')); ?>" rel="stylesheet" type="text/css" media="screen" />

<link href="<?php echo e(asset('public/plugins/bootstrap-tag/bootstrap-tagsinput.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrap-select2/select2.css')); ?>" rel="stylesheet" type="text/css" media="screen" />

<link href="<?php echo e(asset('public/plugins/jquery-datatable/css/jquery.dataTables.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/datatables-responsive/css/datatables.responsive.css')); ?>" rel="stylesheet" type="text/css" media="screen" />
<?php echo $__env->yieldContent('css'); ?>

<style>
    @font-face {
        font-family: 'Nexa Bold';
        src: url('../../../../public/fonts/Nexa Bold.otf');
    }
    body{
        font-family: 'Nexa Bold';
    }
    .grid_box .content_box .title h4{
        font-family: 'Nexa Bold';
    }
    h1,h2,h3,h4,h5,h6{
        font-family: 'Nexa Bold';
    }
    input, button, select, textarea{
        font-family: 'Nexa Bold';
    }   
    .page-sidebar{
        font-family: 'Nexa Bold';
    }
    .btn{
        font-family: 'Nexa Bold';
    }
        

    .widget-title .pri_service_main span{
        border: 1px solid #ffffff !important;
        color: #fbfffd !important;
    
    }
    .widget-title .pri_service_main {
        display: block;
        margin-top: 10px;
    }
    #calendar {
        /* max-width: 900px; */
        margin: 0 auto;
        width:100%;
    }

    .fc-unthemed td.fc-today {
        background: #1b1e24;    
    }

    .fc-highlight {
        background: #919191;
        opacity: .3;
    }

    .order_history_box {
    
    display: block;
    float: left;
    width: 100%;
    padding: 15px;
    margin-bottom: 10px;
    }
    .text-red{
        color: #F44336 !important;
    }
    .text-green{
        color: green !important;
    }
    .text-orange{
        color:#ffa72a !important;
    }
    .head_btm_spc{
        line-height: 1.5 !important;
    }
    .listSubSr{
        padding-left:10px;
        padding-right:10px;
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

<script src="<?php echo e(asset('public/developer/calender/lib/moment.min.js')); ?>"></script>
    
<script src="<?php echo e(asset('public/developer/calender/fullcalendar.min.js')); ?>"></script>

<script src="<?php echo e(asset('public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('public/plugins/bootstrap-select2/select2.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/bootstrap-tag/bootstrap-tagsinput.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/developer/js/custom.js')); ?>" type="text/javascript"></script>


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
    $('#refreshbutton').click(function(){
        location.reload();
    });
    $('#nojobCardReferesh').click(function(){
        location.reload();
    });
var i = 0;
        $('#timepicker1').timepicker();

/** List All JObs in issue products acc to date */
$(document).ready(function() {
    var currentdate=new Date();
    
    var result = '<?php echo $currentmonthjob = \App\Order::viewallallotedJobsDate();?>';

    var json = $.parseJSON(result);
    var eventsArray = [];
    console.log(json);
    if(json.length > 0){
        $.each(json, function(index, value) {
             eventsArray.push({
                title:'Job',
                start:value.job_date
             })
          })
    }
    

    var calender=$('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month'
        },
        
        selectable: true,
        defaultDate:$.fullCalendar.moment(),
        viewRender: function (view, element) {
            var b = $('#calendar').fullCalendar('getDate');
            var b_nDate = b.format('YYYY-MM-DD');
                alljobsinCal(b_nDate);
        },
        events: eventsArray,
        
        dayClick: function(date) {
            GetNotIssuedJobs(date);
            RequestedJobs(date);
        }
       
    });

    var date=new Date($('#calendar').fullCalendar('getDate'));
    GetNotIssuedJobs(date);
    RequestedJobs(date);
});

function alljobsinCal(b_nDate){
    $.ajax({
           type:"GET",
           url:"<?php echo e(route('dates.ajaxDateJobs')); ?>?date="+b_nDate,
           success:function(res){   
               // alert(res);          
            if(res){
                var json1 = $.parseJSON(res);
                var eventsArray1 = [];
                if(json1.length > 0){
                $.each(json1, function(index1, value1) {
                    eventsArray1.push({
                            title:'Job',
                            start:value1.job_date
                        })
                    });
                }
                var calender=$('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month'
                    },
                    
                    selectable: true,
                    defaultDate:$.fullCalendar.moment(),
                    //alert(defaultDate);
                    viewRender: function (view, element) {
                        var b = $('#calendar').fullCalendar('getDate');
                        var b_nDate = b.format('YYYY-MM-DD');
                            alljobsinCal(b_nDate);
                    },
                    events: eventsArray1,
                    
                    dayClick: function(date) {
                        GetNotIssuedJobs(date);
                        RequestedJobs(date);
                    }
                
                });

                 $("#calendar").fullCalendar('removeEvents');
                 $("#calendar").fullCalendar('addEventSource', eventsArray1);
                 $("#calendar").fullCalendar('rerenderEvents');
           
            }
           }
    });
    
}

function ucwords (str) {
    return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
        return $1.toUpperCase();
    });
}

function strtolower (str) {
    return (str+'').toLowerCase();
}

var status=1;

function GetNotIssuedJobs(currentdate){
    //alert("shdg");
    var date = `${moment(currentdate).format("YYYY-MM-DD")}`;
    var dt = `${moment(currentdate).format("DD-MM-YYYY")}`;
    var token = $('meta[name="csrf-token"]').attr('content');
    var employeeUrl = "http://3.16.87.53/public/uploads/employees/";
    var userurl = "http://3.16.87.53/public/uploads/users/";
    var group_id =  <?php echo Auth::user()->group_id;?>
    //alert(date);
    $.ajax({ 
        url: "<?php echo e(route('assigned.product')); ?>",
        data: {"date":date,"_token":token,"group_id":group_id},
        type: 'post',
        success: function(result) {
            var json = $.parseJSON(result);
            //alert(json);
            $("#notAssignOrder").html('');
            $("#notAssignOrder").html('Total Orders : '+json.length+'');
            $("#notASSIGNdate").html('');
            $("#notASSIGNdate").html(dt);
            if(json.length > 0){
                $("#notASSIGNdate").html( `${moment(currentdate).format("DD-MM-YYYY")}` );
                    
                var htmlslot;
                var  flag=false;
                console.log("Mainlist "+json.length);
                $("#notAssigndata1").html('');
                $.each(json, function(index, value) {
                    flag=false;
                    if(value.index != ''){
                        var emp_image='';
                        var emp_image1 = "<?php echo fileurlUser(); ?>"+ value.profile_pic;
                        if(value.profile_pic == null || value.profile_pic == ''){
                            var emp_image = '<img src="<?php echo e(asset("public/img/defaultIcon.png")); ?>" class="">';                    
                        }else{
                            var emp_image = '<img src="'+ emp_image1 +'" class="img-responsive">';                            
                        }
                        var issueProduct = '';
                        var admin = '<?php echo Auth::check() && Auth::user()->hasRole('admin'); ?>';
                        var team = '<?php echo Auth::check() && Auth::user()->hasRole('Service Team'); ?>';
                        if(team){
                            if(value.issueProduct != '' && value.issueProduct[0].status == 2){
                                var issueProduct = '<a href="#"><button class="btn btn-success btn-cons pull-right">Issued</button></a>';                        
                            }else if(value.issueProduct != '' && value.issueProduct[0].status == 1){
                                var issueProduct = '<a href="#"><button class="btn btn-success btn-cons pull-right">Already Requested</button></a>';
                        
                            }else{
                                var issueProduct = '<a href="<?php echo e(url("admin/inventry/products/requestInventory")); ?>/'+value.id+'" class="btn btn-success btn-cons pull-right">Request Inventory</a>';
                                
                            }
                        }else if(admin){
                            if(value.issueProduct != '' && value.issueProduct[0].status == 2){
                                var issueProduct = '<a href="#"><button class="btn btn-success btn-cons pull-right">Already Issue</button></a>';
                            }else if(value.issueProduct != '' && value.issueProduct[0].status == 1){
                                var issueProduct = '<a href="<?php echo e(url("admin/inventry/products/issueProducts")); ?>/'+value.id+'"><button class="btn btn-success btn-cons pull-right">Issue Products</button></a>';
                        
                            }else{
                                var issueProduct = '<a href="#" class="btn btn-success btn-cons pull-right">No Product Required</a>';
                                
                            }
                        }
                            
                        htmlslot='<div class="col-md-12">'+
                            '<div class="orderBox_ng">'+
                                '<div class="row">'+
                                    '<div class="col-md-4">'+
                                        '<div class="row">'+
                                            '<div class="col-sm-6">'+
                                                '<h4>Job No. '+value.id+'</h4>'+
                                            '</div>'+
                                            '<div class="col-sm-6">'+
                                                '<div class="odrInner">'+
                                                    '<div class="labelText">Job Date</div>'+
                                                    '<div class="labelValue">'+value.job_date+'</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="row">'+
                                            '<div class="col-sm-6">'+
                                                '<div class="odrInner">'+
                                                    '<div class="labelText">Customer Name</div>'+
                                                    '<div class="labelValue"> '+value.firstname+' '+value.lastname+'</div>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-sm-6">'+
                                                '<div class="odrInner">'+
                                                    '<div class="labelText">AMC Holder</div>'+
                                                    '<div class="labelValue">AMC No. '+value.amc_id+'</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="row">'+
                                            '<div class="col-sm-12">'+
                                                '<div class="odrInner">'+
                                                    '<div class="labelText">Location</div>'+
                                                    '<div class="labelValue">'+value.address+'</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    
                                    '<div class="col-md-3">'+
                                        '<div class="row">'+
                                            '<div class="col-sm-6">'+
                                                '<div class="odrInner">'+
                                                    '<div class="labelText">Job Duration</div>'+
                                                    '<div class="labelValue">45 minutes</div>'+
                                                '</div>'+
                                                '<div class="odrInner">'+
                                                    '<div class="labelText">Estimated Start Time</div>'+
                                                    '<div class="labelValue">'+value.slotstart_time+'</div>'+
                                                '</div>'+
                                                '<div class="odrInner">'+
                                                    '<div class="labelText">PMPP Status</div>';
                                                    if(value.status == 3){
                                                        htmlslot+='<div class="text-orange">Requested</div>';
                                                    }else if(value.status == 4){
                                                        htmlslot+='<div class="text-green">Service Team Alloted</div>';
                                                    }else if(value.status == 5){
                                                        htmlslot+='<div class="text-light-blue">In Process</div>';
                                                    }else if(value.status == 6){
                                                        htmlslot+='<div class="text-green-light">Proposed</div>';
                                                    }else if(value.status == 7){
                                                        htmlslot+='<div class="text-green">Payment Done</div>';
                                                    }else if(value.status == 8){
                                                        htmlslot+='<div class="">Completed</div>';
                                                    }else if(value.status == 9){
                                                        htmlslot+='<div class="text-brown">Rejected</div>';
                                                    }
                                                    
                                                    htmlslot+='</div>'+
                                            '</div>';
                                            if(value.status == 4 || value.status == 5 || value.status == 6 || value.status == 7 || value.status == 8 || value.status == 9 ){
                                            htmlslot+='<div class="col-sm-6">'+
                                                '<div class="odrInner">'+
                                                    '<div class="imgIconOdr">';
                                                    if(value.group.teamleader_image == null || value.group.teamleader_image == ''){
                                                        htmlslot+='<img src="'+defaultimg+'" class="img-responsive">';
                                                    }else{
                                                        htmlslot+='<img src="http://3.16.87.53/public/uploads/employees/'+value.group.teamleader_image+'" class="img-responsive">';
                                                    }
                                                    htmlslot+='</div>'+
                                                '</div>'+
                                                '<div class="odrInner">'+
                                                    '<div class="labelText">Team Leader</div>';
                                                    if(value.group.teamleader != null){
                                                        htmlslot+='<div class="labelValue">'+value.group.teamleader+'</div>';
                                                    }else{
                                                        htmlslot+='<div class="labelValue">'+value.group.teamleader+'</div>';
                                                    }
                                                    htmlslot+='</div>'+
                                            '</div>';
                                            }else{
                                                htmlslot+='<div class="col-sm-6">'+
                                                '<div class="odrInner">'+
                                                    '<div class="imgIconOdr">'+
                                                        '<img src="<?php echo e(asset("public/img/defaultIcon.png")); ?>" class="img-responsive" />'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="odrInner">'+
                                                    '<div class="labelText">Team Leader</div>'+
                                                    '<div class="labelValue">Not Assign</div>'+
                                                '</div>'+
                                            '</div>';
                                            }
                                            htmlslot+='</div>'+
                                    '</div>'+
                                    '<div class="col-md-5">'+
                                        '<div class="row">'+
                                            '<div class="col-sm-4">'+
                                                '<div class="odrInner">'+
                                                    '<div class="labelText">Team Members</div>';
                                                    if(value.status == 4 || value.status == 5 || value.status == 6 || value.status == 7 || value.status == 8 || value.status == 9 ){
                                                        htmlslot+='<div class="labelValue">'+value.group.total_emp+'</div>';
                                                    }else{
                                                    htmlslot+='<div class="labelValue">Not Assign</div>';
                                                    }
                                                    htmlslot+='</div>'+
                                                '<div class="odrInner">'+
                                                    '<div class="labelText">Number</div>';
                                                    if(value.status == 4 || value.status == 5 || value.status == 6 || value.status == 7 || value.status == 8 || value.status == 9 ){
                                                    htmlslot+='<div class="labelValue">'+value.group.teamleader_mob+'</div>';
                                                    }else{
                                                        htmlslot+='<div class="labelValue">Not Assign</div>';
                                                    }
                                                    htmlslot+='</div>'+
                                                '<div class="odrInner">'+
                                                    '<div class="labelText">Service Type</div>'+
                                                    '<div class="labelValue">'+ucwords(strtolower(value.service_type))+'</div>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-sm-5">'+
                                                '<div class="odrInner">'+
                                                    '<div class="labelText">Job Service</div>'+
                                                    '<div class="orderServiceIcon">';
                                                    if(value.services[0] != ''){
                                                
                                                        $.each(value.services,function(index1, value1){
                                                            var service_image='';
                                                            var service_image1 = "<?php echo fileurlservice(); ?>"+ value1.service_icon;
                                                            if(value1.service_icon == null || value1.service_icon == ''){
                                                                var service_image = '<img src="<?php echo e(asset("public/img/defaultIcon.png")); ?>" class="img-responsive" />';
                                                    
                                                            }else{
                                                                var service_image = '<img src="'+ service_image1 +'" class="img-responsive">';
                                                            
                                                            }   
                                                            htmlslot+=''+service_image+'';
                                                        });
                                                    }
                                                    htmlslot+='</div>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-sm-3">'+
                                                '<a href="" class="orderMoreBtn">more Details <span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<hr>'+
                                '<div class="row">'+
                                    '<div class="col-md-12">'+
                                        ''+issueProduct+''+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';

                    }
                    $("#notAssigndata1").append(htmlslot);
                });

            }else{
                $("#notAssigndata1").html('');
                $("#notAssigndata1").append(
                    '<div class="row">'+
                        '<div class="col-md-12">'+
                            '<div class="order_history_box req_sr_box_main">'+
                                '<div class="row">'+
                                    '<div class="form_control_new">'+ 
                                        '<h4 class="text-center">  No Record Found!</h4>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'
                );
            }
        }
    });
}

function RequestedJobs(currentdate){
    //alert("shdg");
       var date = `${moment(currentdate).format("YYYY-MM-DD")}`;
       var dt = `${moment(currentdate).format("DD-MM-YYYY")}`;
        var token = $('meta[name="csrf-token"]').attr('content');
        var employeeUrl = "http://3.16.87.53/public/uploads/employees/";
        var userurl = "http://3.16.87.53/public/uploads/users/";
        var group_id =  <?php echo Auth::user()->group_id;?>
        //alert(date);
        $.ajax({ 
            url: "<?php echo e(route('assigned.product')); ?>",
            data: {"date":date,"_token":token,"group_id":group_id},
            type: 'post',
            success: function(result) {
                var json = $.parseJSON(result);
                //alert(json);
                $("#requestedJObOrder").html('');
                $("#requestedJObOrder").html('Total Orders : '+json.length+'');
                $("#requestedJObsDtae").html('');
                $("#requestedJObsDtae").html(dt);
                if(json.length > 0){
                    $("#requestedJObsDtae").html( `${moment(currentdate).format("DD-MM-YYYY")}` );
                    
                   var htmlslot;
                 var  flag=false;
                   console.log("Mainlist "+json.length);
                    $("#requestedJObsDt").html('');
                    $.each(json, function(index, value) {
                        flag=false;
                        if(value.index != ''){
                            var emp_image='';
                            var emp_image1 = "<?php echo fileurlUser(); ?>"+ value.profile_pic;
                            if(value.profile_pic == null || value.profile_pic == ''){
                                var emp_image = '<img src="<?php echo e(asset("public/img/defaultIcon.png")); ?>" class="">';
                    
                            }else{
                                var emp_image = '<img src="'+ emp_image1 +'" class="img-responsive">';
                            
                            }
                            var issueProduct = '';
                           var admin = '<?php echo Auth::check() && Auth::user()->hasRole('admin'); ?>';
                           var team = '<?php echo Auth::check() && Auth::user()->hasRole('Service Team'); ?>';
                           if(team){
                                if(value.issueProduct != '' && value.issueProduct[0].status == 2){
                                    var issueProduct = '<a href="#"><button class="btn btn-success btn-cons pull-right">Issued</button></a>';
                        
                                }else if(value.issueProduct != '' && value.issueProduct[0].status == 1){
                                    var issueProduct = '<a href="#"><button class="btn btn-success btn-cons pull-right">Already Requested</button></a>';
                        
                                }else{
                                    var issueProduct = '<a href="<?php echo e(url("admin/inventry/products/requestInventory")); ?>/'+value.id+'" class="btn btn-success btn-cons pull-right">Request Inventory</a>';
                                
                                }
                           }else if(admin){
                                if(value.issueProduct != '' && value.issueProduct[0].status == 2){
                                    var issueProduct = '<a href="#"><button class="btn btn-success btn-cons pull-right">Already Issue</button></a>';
                                }else if(value.issueProduct != '' && value.issueProduct[0].status == 1){
                                    var issueProduct = '<a href="<?php echo e(url("admin/inventry/products/issueProducts")); ?>/'+value.id+'"><button class="btn btn-success btn-cons pull-right">Issue Products</button></a>';
                        
                                }else{
                                    var issueProduct = '<a href="#" class="btn btn-success btn-cons pull-right">No Product Required</a>';
                                
                                }
                           }
                            
                                htmlslot='<div class="col-md-12">'+
                        '<div class="order_history_box req_sr_box_main">'+
                            '<div class="row">'+
                                '<div class="col-sm-4 jd_list_cust_img_box">'+
                                    '<div class="order_history_box">'+
                                        '<div class="job_desc_box_list">'+
                                            '<div class="title">'+
                                                '<h5>Job No. <span class="pull-right srv_name">'+value.id+'</span></h5>'+
                                            '</div>'+       
                                        '</div>'+
                                        '<div class="widget_user_list req_sr_card">'+
                                            '<div class="widget_img_box">'+
                                                ''+emp_image+''+
                                            '</div>'+
                                            '<div class="bs_inf_jd">'+
                                                '<h5 class="text-center"> '+value.firstname+' '+value.lastname+'</h5>'+
                                                '<p><i class="fa fa-phone"> '+value.mobile+'</i></p>'+
                                            '</div>'+
                                            
                                            '<div class="job_desc_box_list">'+
                                                '<div class="row">'+
                                                    '<div class="col-sm-12 col-xs-12">'+
                                                        '<h5 class="textHead">Location</h5>'+
                                                        '<p>'+value.address+'</p>'+
                                                    '</div>'+

                                                    '<div class="col-sm-12 col-xs-12">'+
                                                        '<h5 class="textHead">Distance <span class="pull-right req_sr_card_dis">25 KM</span> </h5>'+
                                                    '</div>'+
                                                '</div>'+    
                                            '</div>'+
                                        '</div>'+  
                                    '</div>'+
                                '</div>'+

                                '<div class="col-sm-8 req_sr_card_dt_panel">';
                                if(value.group != ''){
                                    var teamleader_image='';
                                                var teamleader_image1 = "<?php echo fileurlemp(); ?>"+ value.group.teamleader_image;
                                                if(value.group.teamleader_image == null || value.group.teamleader_image == ''){
                                                    var teamleader_image = '<img src="<?php echo e(asset("public/img/profiles/avatar_small.jpg")); ?>" alt="" data-src="<?php echo e(asset("public/img/profiles/avatar_small.jpg")); ?>" >';
                                        
                                                }else{
                                                    var teamleader_image = '<img src="'+ teamleader_image1 +'" class="img-responsive">';
                                                
                                                }
                                    htmlslot+='<div class="sub_ser_box_list">'+
                                        '<div class="row">'+
                                                '<div class="col-md-12">'+
                                                    '<h6 class="textHead mar_bot nm_srv bold text-black">Team Leader</h6>'+
                                                '</div>'+
                                                '<div class="col-md-2 col-sm-2">'+
                                                    '<div class="profile-img-wrapper pull-left m-l-10">'+
                                                        '<div class=" p-r-10">'+
                                                            ''+teamleader_image+''+ 
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-md-6 col-sm-6">'+
                                                    '<div style="line-height: 9px;padding-top:5px;" class="user-name text-black bold large-text"> '+value.group.teamleader+' </div>'+
                                                    '<div><span class="bold">'+value.group.teamleader_mob+'</span></div>'+
                                                '</div>'+
                                                '<div class="col-md-4 col-sm-4">'+
                                                    '<div style="line-height: 9px;padding-top:5px;" class="user-name text-black bold large-text">Product Handover Status</div>'+
                                                    '<div><span class="bold pending">Not Issued</span></div>'+
                                                '</div>'+
                                        '</div>'+

                                        '<div class="row">'+
                                            '<div class="col-sm-12">'+
                                                '<div class="table-responsive">'+
                                                    '<table class="table tb-ped sr_dt_tbl">'+
                                                        '<thead>'+
                                                            '<tr>'+
                                                                
                                                                '<th>Day Slot</th>'+
                                                                '<th>Order Start Time</th>'+
                                                                
                                                            '</tr>'+
                                                        '</thead>'+

                                                        '<tbody>'+
                                                            '<tr>'+
                                                                
                                                                '<td>'+value.slot_name+'</td>'+
                                                                '<td>'+value.slotstart_time+'</td>'+                                                                              
                                                            '</tr>'+
                                                        '</tbody>'+
                                                    '</table>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>';
                                }else{
                                    var teamleader_image='';
                                        var teamleader_image1 = "<?php echo fileurlemp(); ?>"+ value.group.teamleader_image;
                                        if(value.empIMG == null || value.empIMG == ''){
                                            var teamleader_image = '<img src="<?php echo e(asset("public/img/defaultIcon.png")); ?>" class="">';
                                
                                        }else{
                                            var teamleader_image = '<img src="'+ teamleader_image1 +'" class="img-responsive">';
                                        
                                        }
                                    htmlslot+='<div class="sub_ser_box_list">'+
                                        '<div class="row">'+
                                                '<div class="col-md-12">'+
                                                    '<h6 class="textHead mar_bot nm_srv bold text-black">Team Leader</h6>'+
                                                '</div>'+
                                                '<div class="col-md-2 col-sm-2">'+
                                                    '<div class="profile-img-wrapper pull-left m-l-10">'+
                                                        '<div class=" p-r-10">'+
                                                            ''+teamleader_image+''+ 
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-md-6 col-sm-6">'+
                                                    '<div style="line-height: 9px;padding-top:5px;" class="user-name text-black bold large-text"> '+value.empName+' </div>'+
                                                    '<div><span class="bold">'+value.empMobile+'</span></div>'+
                                                '</div>'+
                                                '<div class="col-md-4 col-sm-4">'+
                                                    '<div style="line-height: 9px;padding-top:5px;" class="user-name text-black bold large-text">Product Handover Status</div>'+
                                                    '<div><span class="bold pending">Not Issued</span></div>'+
                                                '</div>'+
                                        '</div>'+

                                        '<div class="row">'+
                                            '<div class="col-sm-12">'+
                                                '<div class="table-responsive">'+
                                                    '<table class="table tb-ped sr_dt_tbl">'+
                                                        '<thead>'+
                                                            '<tr>'+
                                                                
                                                                '<th>Day Slot</th>'+
                                                                '<th>Order Start Time</th>'+
                                                                
                                                            '</tr>'+
                                                        '</thead>'+

                                                        '<tbody>'+
                                                            '<tr>'+
                                                                
                                                                '<td>'+value.slot_name+'</td>'+
                                                                '<td>'+value.slotstart_time+'</td>'+                                                                              
                                                            '</tr>'+
                                                        '</tbody>'+
                                                    '</table>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>';
                                }
                                if(value.services[0] != ''){
                                    htmlslot+='<div class="job_desc_box_list">'+
                                        '<div class="sub_ser_box_list">'+
                                            '<div class="title_new">'+
                                                '<h5>Services '+
                                                    '<span class="pending">'+ucwords(strtolower(value.service_type))+' Service</span>'+
                                                '</h5>'+
                                            '</div>'+

                                            '<div class="row">'+
                                                '<div class="col-md-12">'+
                                                    '<div class="jd_desc_blk" id="style-1">'+
                                                        '<div class="force-overflow">';
                                                        $.each(value.services, function(index1, value1) {
                                                            htmlslot+='<div class="card_main_srv_lst">'+
                                                                '<div class="row">'+
                                                                    '<div class="col-md-12">'+
                                                                        '<h5 class="textHead mar_bot nm_srv">Service Name : <span class="srv_name">'+value1.service_name+'</span></h5>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                                '<div class="row">'+
                                                                    '<div class="col-md-12">'+
                                                                        '<h5 class="textHead">Sub Services</h5>'+
                                                                        '<div class="list_sub_srv">'+
                                                                            '<div class="problemText">'+
                                                                                '<div class="pblIcon"><i class="fa fa-question-circle"></i></div>'+
                                                                                '<div class="pblTxt">'+value1.jobServices.specify_problem+'</div>'+
                                                                            '</div>'+

                                                                            '<div class="additionalText">'+
                                                                                '<div class="adtIcon"><i class="fa fa-info-circle"></i></div>'+
                                                                                '<div class="adtTxt">'+value1.jobServices.additional_notes+'</div>'+
                                                                            '</div>'+
                                                                        '</div>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</div>';
                                                        });
                                             htmlslot+= '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>';
                                }
                                htmlslot+='</div>'+
                            '</div>'+

                            '<div class="row">'+
                                '<div class="col-md-12">'+
                                    '<a href="http://3.16.87.53/admin/newjobs/'+value.id+'/jobCard" class="btn btn-primary btn-cons pull-right">Job Card</a>'+
                                    '<a href="http://3.16.87.53/admin/newjobs/'+value.id+'/reports" class="btn btn-success btn-cons pull-right">Job Report</a>'+
                                         
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';

                            }
                            $("#requestedJObsDt").append(htmlslot);
                    });

                }else{
                    $("#requestedJObsDt").html('');
                    $("#requestedJObsDt").append(
                    '<div class="row">'+
                                        '<div class="col-md-12">'+
                                            '<div class="order_history_box req_sr_box_main">'+
                                                '<div class="row">'+
                        '<div class="form_control_new">'+ 
                            '<h4 class="text-center">  No Record Found!</h4>'+
                            '</div>'+
                        '</div>'+
                        '</div>'+
                        '</div>'+
                        '</div>'
                    );
                }
      
    }
});
}
       
    </script>
<script>
 $("#service_Ids").on('change',function(){
    var serviceID = $(this).val();    
    //alert(serviceID);
    if(serviceID){
        $.ajax({
           type:"GET",
           url:"<?php echo e(url('admin/inventry/products/getajaxProdata')); ?>?service_id="+serviceID,
           success:function(res){   
               // alert(res);          
            if(res){
                var jsn1 = $.parseJSON(res);
                $("#product_Ids").empty();
                $("#product_Ids").append('<option value="">Please Select</option>');
                $.each(jsn1,function(inx, vlu){
                   // console.log(vl.brand_name);
                    $("#product_Ids").append('<option value="'+vlu.id+'">'+vlu.product_name+'</option>');
                });
           
            }else{
               $("#product_Ids").empty();
            }
           }
        });
    }else{
        $("#product_Ids").empty();
    }
        
});

$('#product_Ids').on('change',function(){
    var productID = $(this).val();    
   // alert(productID);
    if(productID){
        $.ajax({
           type:"GET",
           url:"<?php echo e(url('admin/inventry/products/ajaxproductdata')); ?>?product_id="+productID,
           success:function(res){               
            if(res){
                var json = $.parseJSON(res);
                $("#brand_nameId").empty();
                //alert(res);
                $("#brand_nameId").append('<option value="">Please Select</option>');
                $.each(json,function(index, value){
                  //  alert(value.id);
                    $("#brand_nameId").append('<option value="'+value.id+'">'+value.brand_name+'</option>');
                });
           
            }else{
               $("#brand_nameId").empty();
            }
           }
        });
    }else{
        $("#brand_nameId").empty();
    }
        
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

$(document).ready(function() {
    $("#brand_name").val(["Havells", "Voltes"]).select2();
    $("#Services").val(["Electronics"]).select2();
    
});  
$(document).ready(function() {
    <?php if(isset($arr) && !empty($arr)){ ?>
        $(".multiselect").val(<?= json_encode($arr); ?>).select2();
        <?php }else{ ?>
            $(".multiselect").val(["Havells", "Voltes","Ashish","Sanesh"]).select2();
    <?php }?>

    
    //$("#vendor_name2").val(["Ashish"]).select2();
    $("#another_servId").select2();
    $(".multiselect1").select2();
    
});  
function addServ(){
    //alert("sahds");
    var json = JSON.stringify(<?php echo $brands = \App\Brand::get();; ?>); 
        var json1 = $.parseJSON(json);
        htmlslot = '';
        htmlslot='<div class="order_history_box" id="mydata1">'+
                '<div class="row">'+
                    '<div class="col-md-6">'+
                        '<div class="form_control_new">'+  
                            '<div class="label_head">Brand Name </div>'+
                            '<div class="form-group"> '+
                                '<select name="brand_id[]" class="form-control">'+
                                    '<option value="">Select Brands</option>';
                                    if(json1){
                                            $.each(json1, function(index, value) {
                                            htmlslot+='<option value="'+value.id+'">'+value.brand_name+'</option>';
                                        });
                                    }
                                htmlslot+='</select>'+
                                '<div class="iconDiv">'+
                                    '<i class="fa fa-check" aria-hidden="true"></i>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+

                    '<div class="col-md-6">'+
                        '<div class="form_control_new">'+  
                            '<div class="label_head">Quantity</div>'+
                            '<input class="form-control" name="qty[]" id="qty" placeholder="Quantity">'+ 
                            '<div class="iconDiv">'+
                                '<i class="fa fa-check" aria-hidden="true"></i>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+

                '<div class="row">'+
                    '<div class="col-md-6">'+
                        '<div class="form_control_new">'+  
                            '<div class="label_head"> Price</div>'+
                            '<input class="form-control" name="price[]" id="price" placeholder="Price">'+ 
                            '<div class="iconDiv">'+
                                '<i class="fa fa-check" aria-hidden="true"></i>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+

                    '<div class="col-md-6">'+
                        '<div class="form_control_new">'+  
                            '<div class="label_head"> Selling Price</div>'+
                            '<input class="form-control" name="selling_price[]" id="selling_price" placeholder="Selling Price">'+ 
                            '<div class="iconDiv">'+
                                '<i class="fa fa-check" aria-hidden="true"></i>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+

                '<div class="row">'+
                    '<div class="col-md-6">'+
                        '<div class="form_control_new">'+  
                            '<div class="label_head"> Custom Price</div>'+
                            '<input class="form-control" name="custom_price[]" id="custom_price" placeholder="Custom Price">'+ 
                            '<div class="iconDiv">'+
                                '<i class="fa fa-check" aria-hidden="true"></i>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+

                    '<div class="col-md-6">'+
                        '<div class="form_control_new"> '+ 
                            '<div class="label_head">Availability Days</div>'+
                            '<input class="form-control" name="availability_days[]" id="availability_days" placeholder="Availability Days">'+ 
                            '<div class="iconDiv">'+
                                '<i class="fa fa-check" aria-hidden="true"></i>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+

                '<div class="row">'+
                    '<div class="col-md-6">'+
                        '<div class="form_control_new"> '+ 
                            '<div class="label_head">Vendors</div>'+
                            '<select class="multiselect1 form-control form-control1" name="vendor_id[]" id="vendor_id" multiple>'+
                                '<option value="">Select Vendors</option>'+
                                '<option value="Ashish">Ashish</option>'+
                                '<option value="Amandeep">Amandeep</option>'+
                                '<option value="Abid">Abid</option>'+                                                
                                '<option value="Sanesh">Sanesh</option>'+
                            '</select>'+
                            '<div class="iconDiv">'+
                                '<i class="fa fa-check" aria-hidden="true"></i>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+

                    '<div class="col-md-6">'+
                        '<div class="form_control_new">'+  
                            '<div class="label_head">&nbsp;</div>'+
                            '<div class="input-group">'+ 
                            '<button type="button" class="btn btn-danger"  onclick="removeServicesPkg();">Remove</button>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'
        ;
        $("#appendDtata").append(htmlslot);
        $("select.multiselect1").select2();
        
}

function removeServicesPkg(){
    var elem = document.getElementById('mydata1');
    elem.parentNode.removeChild(elem);
    //$(caller).closest('.row dd').remove();
}

function addServ1(){
     
    var json = JSON.stringify(<?php echo $brands = \App\Brand::get();; ?>); 
    var json1 = $.parseJSON(json);

    var services = JSON.stringify(<?php echo $services=\App\Service::where('status','=',1)->get();; ?>); 
    var services1 = $.parseJSON(services);

    var product = JSON.stringify(<?php echo $products=\App\Product::get();; ?>); 
    var product1 = $.parseJSON(product);
    htmlslot = '';
    htmlslot='<div class="order_history_box" id="mydata2">'+
                '<div class="row">'+

                    '<div class="col-md-6">'+
                        '<div class="form_control_new">'+  
                            '<div class="label_head">Service Type </div>'+
                            '<div class="form-group">'+ 
                                '<select name="service_id[]" id="service_Ids'+i+'"  style="width:100%" required>'+
                                    '<option value="">Select Service Type</option>';
                                    if(services1){
                                        $.each(services1, function(index, value) {
                                            htmlslot+='<option value="'+value.id+'">'+value.service_name+'</option>';
                                        });
                                    }
                                    htmlslot+='</select>'+
                            
                            '</div>'+
                        '</div>'+
                    '</div>'+

                    '<div class="col-md-6">'+
                        '<div class="form_control_new">'+  
                            '<div class="label_head">Product Name </div>'+
                            '<div class="form-group">'+ 
                                '<select name="product_id[]" id="product_Ids'+i+'"  style="width:100%" required>'+
                                    '<option value="">Select Product</option>';
                                    if(product1){
                                        $.each(product1, function(index1, value1) {
                                            htmlslot+='<option value="'+value1.id+'">'+value1.product_name+'</option>';
                                        });
                                    }
                                    htmlslot+='</select>'+
                            
                            '</div>'+
                        '</div>'+
                    '</div>'+


                '</div>'+

                '<div class="row">'+
                    
                    '<div class="col-md-6">'+
                        '<div class="form_control_new">'+  
                            '<div class="label_head">Brand Name </div>'+
                            '<div class="form-group">'+ 
                                '<select name="brand_id[]" id="brand_nameId'+i+'"  style="width:100%" required>'+
                                    '<option value="">Select Brands</option>';
                                    if(json1){
                                        $.each(json1, function(index2, value2) {
                                            htmlslot+='<option value="'+value2.id+'">'+value2.brand_name+'</option>';
                                        });
                                    }
                                    htmlslot+='</select>'+
                            
                            '</div>'+
                        '</div>'+
                    '</div>'+

                    '<div class="col-md-6">'+
                        '<div class="form_control_new">'+  
                            '<div class="label_head">Quantity</div>'+
                            '<input class="form-control" name="qty[]" id="qty" placeholder="Quantity" required>'+ 
                        '</div>'+
                    '</div>'+

                '</div>'+

                '<div class="row">'+
                    '<div class="col-md-6">'+
                        '<div class="form_control_new">'+  
                            '<div class="label_head">Product Specification</div>'+                            
                            '<textarea class="form-control" name="specification[]" id="specification" placeholder="Product Specification"></textarea>'+                             
                        '</div>'+
                    '</div>'+

                    '<div class="col-md-4">'+
                        '<div class="form_control_new">'+  
                            '<div class="label_head">&nbsp;</div>'+
                            '<div class="input-group">'+ 
                                '<a type="button" class="btn btn-danger" onclick="removeProduct()">Remove</a>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'
    ;
    $("#appendDtata123").append(htmlslot);

 $("#service_Ids"+i).on('change',function(){
    var serviceID = $(this).val();    
    alert(serviceID);
    if(serviceID){
        $.ajax({
           type:"GET",
           url:"<?php echo e(url('admin/inventry/products/getajaxProdata')); ?>?service_id="+serviceID,
           success:function(res){   
               // alert(res);          
            if(res){
                var jsn1 = $.parseJSON(res);
                $("#product_Ids"+i).empty();
                $("#product_Ids"+i).append('<option value="">Please Select</option>');
                $.each(jsn1,function(inx, vlu){
                   // console.log(vl.brand_name);
                    $("#product_Ids"+i).append('<option value="'+vlu.id+'">'+vlu.product_name+'</option>');
                });
           
            }else{
               $("#product_Ids"+i).empty();
            }
           }
        });
    }else{
        $("#product_Ids"+i).empty();
    }
        
});

$("#product_Ids"+i).on('change',function(){
    var productID = $(this).val();    
    alert(productID);
    
    if(productID){
        $.ajax({
           type:"GET",
           url:"<?php echo e(url('admin/inventry/products/ajaxproductdata')); ?>?product_id="+productID,
           success:function(res){   
            //console.log("#brand_nameId"+i);  
            if(res){
                var jsn = $.parseJSON(res);
                $("#brand_nameId"+i).empty();
                $("#brand_nameId"+i).append('<option value="">Please Select</option>');
                $.each(jsn,function(ix, vl){
                    
                    $("#brand_nameId"+i).append('<option value="'+vl.id+'">'+vl.brand_name+'</option>');
                });
           
            }else{
               $("#brand_nameId"+i).empty();
            }
           }
        });
    }else{
        $("#brand_nameId"+i).empty();
    }
        
});
   i++;       
}
function removeProduct(){
    var elem = document.getElementById('mydata2');
    elem.parentNode.removeChild(elem);
    //$(caller).closest('.row dd').remove();
}


</script>
   
    
</body>
</html>