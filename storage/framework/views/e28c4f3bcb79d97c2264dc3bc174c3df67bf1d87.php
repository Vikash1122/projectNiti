<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Nitty-Gritty - Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- CSRF Token -->
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
<link href="<?php echo e(asset('public/developer/calender/fullcalendar.min.css')); ?>" rel='stylesheet' />
<link href="<?php echo e(asset('public/developer/calender/fullcalendar.print.min.css')); ?>" rel='stylesheet' media='print' />

<link href="<?php echo e(asset('public/plugins/bootstrap-datepicker/css/datepicker.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.css')); ?>" rel="stylesheet" type="text/css" media="screen" />
<style>
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
    .sub_ser_box_list1 {
        padding: 10px;
        color: #1b1e24;
        font-weight: 500;
        letter-spacing: 0.7px;
        line-height: 3;
    }

    @font-face {
        font-family: 'Nexa Bold';
        src: url('../../public/fonts/Nexa Bold.otf');
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
    .groupList .controller {
        position:absolute;
        top:0;
        left:0px;
        width:100%;
    }
    .groupList{
        padding-top: 50px;
    }
    .groupList .controller a {
        width: 30px;
        height: 25px;
        /* background: #2f9247 !important; */
        text-align: center;
        padding: 0;
        line-height: 25px;
        color: #ffffff;
        font-size: 12px;
    }
    .groupList .controller .edt_btn {
        background: #029448 !important;
    }
    .groupList .controller .dlt_btn {
        background: #D61B1B !important;
    }
    .border_radius_left {
        border-bottom-left-radius: 10px;
    }
    .border_radius_right {
        border-bottom-right-radius: 10px;
    }
    .groupList .srv_name{
        float :none !important;
    }
    .vhlInfMain{
        width:100%;
        float:left;
    }
    .vhlInfMain .drv_outer_img_box{
        width:95px;
        float:left;
    }
    .vhlInfMain .groupListDivNew{
        width:calc(100% - 95px);
        float:right;
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
<script src="<?php echo e(asset('public/developer/calender/lib/jquery.min.js')); ?>"></script>
<script>
    $('#refreshbutton').click(function(){
        location.reload();
    });
       
    </script>
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
    <!-- <script src="assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.js" type="text/javascript"></script> -->
<?php echo $__env->yieldContent('js'); ?>
<script>
$('#timepicker1').timepicker();
var slotarr=[{
        Id:1,
        dateBlock:"2018-10-27",
        Slots:[{
            slotblock:1
        }],    
    },
    {
        Id:2,
        dateBlock:"2018-10-28",
        Slots:null,    
    },
    ,
    {
        Id:3,
        dateBlock:"2018-10-29",
        Slots:[{
            
            slotblock:3,
        }],    
    },
    {
        Id:4,
        dateBlock:"2018-10-30",
        Slots:[{
            
            slotblock:4,
        }],    
    },
    
    ];

$(document).ready(function() {       
    var currentdate=new Date();
    var calender=$('#calendar').fullCalendar({
        header: {
            left: 'next today',
            center: 'title',
            right: 'month'
        },
        selectable: true,
        defaultDate:$.fullCalendar.moment(),
        // validRange: function(nowDate) {
        //    // alert(nowDate);
        //    // alert(moment(nowDate));
        //       return {
        //       start: nowDate.clone().subtract(1, 'days'),
        //       end: nowDate.clone().add(20, 'days')
        //  };
        // },
        
        dayClick: function(date) {
            GetData(date);
        }
    });
    var date=new Date($('#calendar').fullCalendar('getDate'));
    GetData(date);
});
var status=1;
function GetData(currentdate){
    var date = `${moment(currentdate).format("YYYY-MM-DD")}`;
    //alert(date1);
    //$(".fc-day-top").click(function(){
        //var date = $(this).attr("data-date");
        var token = "<?php echo e(csrf_token()); ?>";
        $.ajax({ 
            url: "<?php echo e(route('slots.ajaxslots')); ?>",
            data: {"date":date,"_token":token},
            type: 'post',
            success: function(result) {
                //console.log(result); return false ;
                console.log(result);
                var json = $.parseJSON(result);
                if(json.length > 0){
                    $("#databind").html('');
                    $("#databind").append(` <div class="row">
                                                <div class="col-md-10" >
                                                    <div class="form_control_new"> 
                                                        <h4>Selected Date : ${moment(currentdate).format("YYYY-MM-DD")} </h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 " >
                                                    <div class="form_control_new"> 
                                                        <a href="#" class="btn btn-danger blockslotdateins1" onclick="blockDate(this);" data-status="2" data-token="<?php echo e(csrf_token()); ?>" data-slotdate="${moment(currentdate).format("YYYY-MM-DD")}" >Block Date</a>
                                                    </div>
                                                </div>
                                            </div>    
                                                
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Day Slot Name</th>
                                                                <th scope="col">Start Time</th>
                                                                <th scope="col">End Time</th>
                                                                <th scope="col">Limit Request</th>
                                                                <th scope="col">Slot Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="slotbind">
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>`);

                    $.each(json, function(index, value) {
                        // do your stuff here
                        //console.log(value.slot_timename);
                                var htmlslot='';
                            if(value.index != ''){

                                var selecteddate = `${moment(currentdate).format("YYYY-MM-DD")}`
//alert(value.id);
                                var str=''
                                if (value.status == 1){
                                str =  '<a href="#" class="btn btn-danger blockslot1update" onclick="myfunction1(this);" id="blockslot1" data-status="0" data-id="' + value.id + '" data-token="<?php echo e(csrf_token()); ?>" data-slotdate="'+ selecteddate +'">Block Slot</a>'
                                }else if(value.status == null){
                                    str =  '<a href="#" class="btn btn-success blockslot1update" onclick="myfunction1(this);" id="blockslot1" data-status="1" data-id="' + value.id + '" data-token="<?php echo e(csrf_token()); ?>" data-slotdate="'+ selecteddate +'">Block Slot</a>'
                                }else{
                                    str =  '<a href="#" class="btn btn-success blockslot1update" onclick="myfunction1(this);" id="blockslot1" data-status="1" data-id="' + value.id + '" data-token="<?php echo e(csrf_token()); ?>" data-slotdate="'+ selecteddate +'">UnBlock Slot</a>'
                                }
                                htmlslot=` 
                                    <tr>
                                    <th scope="row">
                                    <input id="morning" type="checkbox" value="1">
                                    </th>
                                    <td>`+ value.slot_timename +`</td>
                                    <td>`+ value.slotstart_time +`</td>
                                    <td>`+ value.slotend_time +`</td>
                                    <td>`+ value.limit_request +`</td>                                     
                                    <td>`+ str +`</td>    
                                    </tr>                        
                            `;
                            }
                            $("#slotbind").append(htmlslot);
                    });

                }else{
                    $("#databind").html('');
                                $("#databind").append(`
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form_control_new"> 
                                                <h4> ${moment(currentdate).format("YYYY-MM-DD")} is blocked!</h4>
                                            </div>
                                        </div>
                                    </div>
                        `);
                            } 
                            //$("#slotbind").append(htmlslot);
        
    }
});


    // });


    
}
function ToggleBtn(){
    
    if(status==0){
        status=1;
    }if(status==1){
        status=0;
    }
//  alert(status);
}

setTimeout(function() {
    $('.alert-info').slideUp(300);
}, 5000); 

function myfunction1(obj){
    var id = obj.getAttribute("data-id"); //$(this).data('key')
    var date = obj.getAttribute("data-slotdate");
    var token = obj.getAttribute("data-token");
    var status = obj.getAttribute("data-status");
   // alert(date);
    $.ajax({ 
        url: "<?php echo e(route('slots.blockslot')); ?>",
        data: {"_token":token, "slot_id":id , "date":date, "status":status},
        type: 'post',
        success: function(result) {
            //console.log(result); return false ;
            alert(result == 1);
            
        }
    });
    return false ;
}

function blockDate(obj){
    var date = obj.getAttribute("data-slotdate");
    var token = obj.getAttribute("data-token");
    var status = obj.getAttribute("data-status");
    alert(date);
    $.ajax({ 
        url: "<?php echo e(route('slots.blockDate')); ?>",
        data: {"_token":token, "date":date, "status":status},
        type: 'post',
        success: function(result) {
            //console.log(result); return false ;
            alert(result == 1);
    
                
        }
    });
    return false ;
}

</script>

</body>
</html>