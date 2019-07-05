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
<script src="https://use.fontawesome.com/6fd4525080.js"></script><link rel="stylesheet" href="<?php echo e(asset('public/plugins/jquery-morris-chart/css/morris.css')); ?>" type="text/css" media="screen">
<link href="<?php echo e(asset('public/developer/calender/fullcalendar.min.css')); ?>" rel='stylesheet' />
    
<link href="<?php echo e(asset('public/developer/calender/fullcalendar.print.min.css')); ?>" rel='stylesheet' media='print' />

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
</style>

<link href="<?php echo e(asset('public/plugins/bootstrap-datepicker/css/datepicker.css')); ?>" rel="stylesheet" type="text/css" />

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

    <script>

        // $(document).ready(function() {

        //      $('.input-append.date').datepicker({
        //         autoclose: true,
        //         todayHighlight: true
        //     });

        //     var currentdate=new Date();

        //     var calender=$('#calendar').fullCalendar({
        //         header: {
        //             left: 'next today',
        //             center: 'title',
        //             right: 'month'
        //         },
        //         selectable: true,
        //         defaultDate:moment().format("YYYY-MM-DD"),
           
        //     });
        // });

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
               
                dayClick: function(date) {
                    GetJobsDate(date);
                }
            });
            var date=new Date($('#calendar').fullCalendar('getDate'));
            GetJobsDate(date);
        });
        
        var status=1;
            function GetJobsDate(currentdate){
                $(".fc-day-top").click(function(){
                    var date = $(this).attr("data-date");
                    var token = "<?php echo e(csrf_token()); ?>";
                    //alert(date);
                    $.ajax({ 
                        url: "<?php echo e(route('surveyers.ajaxjobs')); ?>",
                        data: {"date":date,"_token":token},
                        type: 'post',
                        success: function(result) {
                            //console.log(result); return false ;
                            console.log(result);
                            var json = $.parseJSON(result);
                            if(result != ''){
                                $("#jobdt2").html( `${moment(currentdate).format("DD-MM-YYYY")}` );
                               // $("#jobdate7").append(`<div class="" ><h4 style="font-weight: 500;">Date : <span style="color: #039347;">${moment(currentdate).format("DD-MM-YYYY")}</span></h4></div>`);

                                $("#currentdateJobs").html('');
                                $.each(json, function(index, value) {
                                    // do your stuff here
                                    //console.log(value.slot_timename);
                                    // var team = value.group_emp;
                                    // var teamarr = team.split(',');
                                    // var totalteam = teamarr.length;

                                    // var driver_image='';
                                    // var dr_image = '<?php //echo fileurlemp();?>'+ value.driver_image;
                                    //         if (value.driver_image == null){
                                    //             driver_image =  '<img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="img-responsive">'
                                    //         }else{
                                    //             driver_image =  '<img src="'+ dr_image +'" class="img-responsive">'
                                    //         }
                                    // var leader_image='';
                                    // var lead_image = '<?php// echo fileurlemp();?>'+ value.teamleader_image;
                                    //         if (value.teamleader_image == null){
                                    //             leader_image =  '<img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="img-responsive">'
                                    //         }else{
                                    //             leader_image =  '<img src="'+ lead_image +'" class="img-responsive">'
                                    //         }
                                    //alert(totalteam);
                                            var htmlslot='';
                                        if(value.index != ''){
                                            htmlslot=` 
                                            <div class="col-md-12">
                                                <div class="order_history_box req_sr_box_main">
                                                    <div class="row">
                                                        <div class="col-sm-4 jd_list_cust_img_box">
                                                            <div class="order_history_box">
                                                                <div class="job_desc_box_list">
                                                                    <div class="title">
                                                                        <h5>Job No. <span class="pull-right srv_name">`+ value.id +`</span></h5>
                                                                    </div>       
                                                                </div>
                                                                <div class="widget_user_list req_sr_card">
                                                                    <div class="widget_img_box">
                                                                        <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="">
                                                                    </div>
                                                                    <div class="bs_inf_jd">
                                                                        <h5 class="text-center">Anurag Pandey</h5>
                                                                        <p>(9896989698)</p>
                                                                    </div>
                                                                    
                                                                    <div class="job_desc_box_list">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-xs-12">
                                                                                <h5 class="textHead">Location</h5>
                                                                                <p>`+ value.address +`</p>
                                                                            </div>

                                                                            <div class="col-sm-12 col-xs-12">
                                                                                <h5 class="textHead">Distance <span class="pull-right req_sr_card_dis">25 KM</span> </h5>
                                                                            </div>
                                                                        </div>    
                                                                    </div>
                                                                </div>  
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-8 req_sr_card_dt_panel">
                                                            <div class="sub_ser_box_list">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="table-responsive">
                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Service Date</th>
                                                                                        <th>Slot</th>
                                                                                        <th>Time</th>
                                                                                    </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>25/9/2018</td>
                                                                                        <td>Morning</td>
                                                                                        <td>9:00 AM - 11:00 AM</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="job_desc_box_list">
                                                                <div class="sub_ser_box_list">
                                                                    <div class="title_new">
                                                                        <h5>Services 
                                                                            <span class="pending">Instant Service</span>
                                                                        </h5>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="jd_desc_blk" id="style-1">
                                                                                <div class="force-overflow">
                                                                                    <div class="card_main_srv_lst">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <h5 class="textHead mar_bot nm_srv">Service Name : <span class="srv_name">`+value1.service_name+`</span></h5>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <h5 class="textHead">Sub Services</h5>
                                                                                                <div class="list_sub_srv">
                                                                                                    <h6>Bathroom Water Filter</h6>
                                                                                                    <p>sndbvsdyfusytdtsf</p>
                                                                                                    <h6>Bathroom Fitting</h6>
                                                                                                    <p>sndbvsdyfusytdtsf</p>
                                                                                                    <h6>Shower</h6>
                                                                                                    <p>sndbvsdyfusytdtsf</p>
                                                                                                </div>
                                                                                        </div>
                                                                                        </div>
                                                                                    </div></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <button type="button" class="hashtags asign_job_btn" data-toggle="modal" data-target=".allotJob">Allot</button>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="footer_bx">
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <div class="job_desc_box_list">
                                                                            <h5>Total Estimated Price <span class="pull-right">5000 AED</span></h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-7 text-right">
                                                                        <button type="button" class="hashtags asign_job_btn tp_mar_4" data-toggle="modal" data-target=".allotJob">Allot</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                       
                                        `;
                                        }
                                        $("#currentdateJobs").append(htmlslot);
                                });

                            }else{
                                            $("#currentdateJobs").append(`
                                            <div class="col-md-9" >
                                                <div class="form_control_new"> 
                                                    <h4> ${moment(currentdate).format("YYYY-MM-DD")} is blocked!</h4>
                                                    </div>
                                                </div>
                                    `);
                                        } 
                                        //$("#slotbind").append(htmlslot);
                  
                }
            });
            
            
                });


               
            }
    </script>
<script src="<?php echo e(asset('public/plugins/jquery-ricksaw-chart/js/d3.v2.js')); ?>"></script>
<script src="<?php echo e(asset('public/plugins/jquery-ricksaw-chart/js/rickshaw.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/plugins/jquery-morris-chart/js/morris.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/plugins/jquery-easy-pie-chart/js/jquery.easypiechart.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/plugins/jquery-sparkline/jquery-sparkline.js')); ?>"></script>
<script src="<?php echo e(asset('public/plugins/skycons/skycons.js')); ?>"></script>
<!-- <script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script> -->
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?php echo e(asset('public/plugins/jquery-gmap/gmaps.js')); ?>" type="text/javascript"></script>

<!-- <script src="assets/plugins/Mapplic/js/jquery.easing.js" type="text/javascript"></script>
<script src="assets/plugins/Mapplic/js/jquery.mousewheel.js" type="text/javascript"></script>
<script src="assets/plugins/Mapplic/js/hammer.js" type="text/javascript"></script> -->
<script src="<?php echo e(asset('public/plugins/Mapplic/mapplic/mapplic.js')); ?>" type="text/javascript"></script>
<!-- <script src="assets/plugins/jquery-flot/jquery.flot.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-metrojs/MetroJs.min.js" type="text/javascript"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="<?php echo e(asset('public/js/dashboard_v2.js')); ?>" type="text/javascript"></script>

 
</body>
</html>