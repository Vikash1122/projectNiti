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

<link href="<?php echo e(asset('public/plugins/bootstrap-datepicker/css/datepicker.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')); ?>" rel="stylesheet" type="text/css" />

<link href="<?php echo e(asset('public/developer/css/styles.css')); ?>" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://use.fontawesome.com/6fd4525080.js"></script><link rel="stylesheet" href="<?php echo e(asset('public/plugins/jquery-morris-chart/css/morris.css')); ?>" type="text/css" media="screen">
<link href="<?php echo e(asset('public/developer/calender/fullcalendar.min.css')); ?>" rel='stylesheet' />
<link href="<?php echo e(asset('public/plugins/jquery-datatable/css/jquery.dataTables.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/datatables-responsive/css/datatables.responsive.css')); ?>" rel="stylesheet" type="text/css" media="screen" />

<link href="<?php echo e(asset('public/developer/calender/fullcalendar.print.min.css')); ?>" rel='stylesheet' media='print' />
<script src="https://use.fontawesome.com/6fd4525080.js"></script> 

<link href="<?php echo e(asset('public/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.css')); ?>" rel="stylesheet" type="text/css" media="screen" />

<style>
        .userCard {
            /* padding: 0; */
            background: #ffffff;
            /* width: 100%; */
            float: left;
            margin-bottom: 20px;
        }
        .userCard .widget_user_list{
            position:relative;
        }
        .widget_usr_img_blk {
            background: #31954c;
            padding-top: 10px;
            padding-bottom: 10px;
            position: relative;
        }
        .widget_usr_img_blk h4{
            text-align: center;
            color: #ffffff !important;
            font-weight: 500;
            letter-spacing: 1px;
            font-size: 16px;
            padding-bottom: 10px;
            padding-top: 10px;
            height:65px;
        }
        .userCard .widget_user_list .widget_content{
            position:absolute;
            bottom:5px;
            background:#ffffff;
            padding:20px;
        }
        .userCard .widget_content{
            width: 80%;
            background: #fff;
            margin: auto;
            /* padding: 20px; */
            position: relative;
            margin-top: -30px;
            border-radius: 4px;
        }
        .inr_ct{
            width:100%;
            float:left;
            background: #ffffff;
            padding: 20px 20px 0px;
            border-radius: 4px;
        }
        .inr_ct1{
            width:100%;
            float:left;
            margin-bottom: 15px;
            border-bottom: 1px solid rgba(204, 204, 204, 0.5);
            padding-bottom: 5px;
        }
        .inr_ct1 .icn_box{
            width: 18%;
            float: left;
            text-align: left;
            font-size: 20px;
            color: #31944c;
        }
        .inr_ct1 .inf_text{
            float: left;
            font-size: 15px;
            word-break: break-word;
            display: block;
            line-height: 1.2;
            width: 80%;
            padding-top: 5px;
        }
        .widget_user_content_main{
            width: 100%;
            float: left;
            position: relative;
            border-left: 1px solid #ccc;
            border-right: 1px solid #ccc;
        }
        .usr_link_outer{
            text-align:center;
            padding:20px;
            display: block;
            width: 100%;
            float: left;
            border-left: 1px solid #ccc;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }
        .usr_link_outer a{
            border: 2px solid #31944c;
            padding: 4px 23px;
            border-radius: 18px;
            font-weight: 500;
            color: #31944c;
            letter-spacing: 1px;
            font-size: 14px;
        }
        .usr_link_outer a:hover{
            background:#31944c;
            color:#ffffff;
        }
        .userCard .widget_user_list .widget_img_box{
            width:90px;
            height:90px;   
        }
    </style>
<style>
    .contactEnq .boxDetailsHeadings .dtl_order-hd{
        margin-bottom:0;
    }
    .fontWeight500{
        font-weight: 500 !important;
    }

    .enqMainBox{
        width:100%;
        float:left;
        border-bottom: 1px solid rgba(204, 204, 204, 0.611764705882353);
        margin-bottom: 20px;
        padding-bottom: 10px;
    }
    .enqMainBox:last-child{
        border-bottom:none;
    }
    .enqMainBox .nameDiv{
        width:30px;
        height:30px;
        border-radius:50%;
        color:#ffffff;
        font-weight:600;
        font-size:16px;
        line-height:32px;
        text-transform: uppercase;
        text-align:center;
        float: left;
        margin-top: 10px;
    }
    .enqMainBox .enqContent{
        width:auto;
        margin-left:50px;
    }
    .enqMainBox .enqContent h4{
        color:#000000;
        font-weight:400;
        margin-bottom:10px;
        font-size:17px;
        text-transform: capitalize;
    }
    .enqMainBox .enqContent h4 .emailAddr{
        font-size: 13px;
        display: block;
        font-weight: 500;
        /* color: #800000; */
        color:#b43a1e;
        letter-spacing: .6px;
        margin-bottom: 10px;
    }

    .enqMainBox .enqContent .enqDate{
        font-weight: 500;
        color:#5f9ea0;
        font-size: 12px;
        display: block;
    }
    
    .enqCtBlock span{
        margin-right: 20px;
        color: #b43a1e;
        letter-spacing: 1px;
        font-weight: 500;
    }
    .enqCtBlock span i{
        margin-right:5px;
    }
    /*background Colors*/
    .red{
        background: rgb(244, 67, 54);
    }
    .indigo{
        background: rgb(63, 81, 181);
    }
    .green{
        background: rgb(76, 175, 80);
    }
    .darkBlue{
        background: rgb(63, 81, 181);
    }
    .teal{
        background: rgb(0, 150, 136);
    }
    .black{
        background: rgb(0, 0, 0);
    }


        .ser_rpt_heading{
            font-weight: 500;
            margin-top: 0;
            border-bottom: 1px solid #ccc;
            padding-bottom: 3px;
            margin-bottom: 20px;
            width: 100%;
            float: left;
        }
        .headingH4 span{
            color: #F44336 !important;
        }

        .add_more_btn{
            background: transparent;
            border: 2px solid #F44336;
            padding: 4px 10px;
            border-radius: 16px;
            font-weight: 500;
            color: #F44336;
            font-size: 13px;
            line-height: 14px;
        }

        .cardViewTable .grid.simple .grid-body{
            padding:15px !important;
        }
        .cardViewTable .dataTables_length{
            padding-top:15px;
            padding-left:15px;
        }
        .cardViewTable .dataTables_filter{
            padding-top:15px;
            padding-right:15px;
        }

        @media  only screen and (max-width: 420px){
            .userCard td{
                padding:0px !important;
            }
            .userCard{
                width:100%;
            }
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
<script>
  
        $(document).ready(function(){
            // $("#edit_svr_report").hide();

            $(".multiselect").val(["Jim", "Lucy"]).select2();
            $('#source-tags').tagsinput({
                typeahead: {
                    source: ['Amsterdam', 'Washington', 'Sydney', 'Beijing', 'Cairo']
                }
            });
        })

           
    </script>
  <script src="<?php echo e(asset('public/plugins/bootstrap-select2/select2.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/jquery-datatable/js/jquery.dataTables.min.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('public/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js')); ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo e(asset('public/plugins/datatables-responsive/js/datatables.responsive.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/plugins/datatables-responsive/js/lodash.min.js')); ?>"></script>

<script src="<?php echo e(asset('public/js/datatables.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('public/js/webarch.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/js/chat.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')); ?>" type="text/javascript"></script>

    <script src="<?php echo e(asset('public/plugins/bootstrap-tag/bootstrap-tagsinput.min.js')); ?>" type="text/javascript"></script>

    <script>
        $(document).ready(function(){
            var colors = ["red", "indigo", "green", "darkBlue", "teal", "black"];

            $("#enqBoxOuter .enqMainBox .nameDiv").each(function(){
                $(this).addClass( colors.splice( ~~(Math.random()*colors.length), 1 )[0] );
            });

            $('#dateSelect90').datepicker({
                autoclose: true,
                todayHighlight: true
            }).on('changeDate', function (selected) {
                var startDate1 = new Date(selected.date.valueOf());
                var date = $('#dateSelect90').val();
                    //alert(date);
                GetfilterDate(date);
            }).on('clearDate', function (selected) {
                $('#dateSelect90').val('');
                // fum remove ///
            });

        });

   </script>
   <script src="<?php echo e(asset('public/developer/js/custom.js')); ?>" type="text/javascript"></script>
   <script src="<?php echo e(asset('public/developer/js/surveyer.js')); ?>" type="text/javascript"></script>

   <script src="<?php echo e(asset('public/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.js')); ?>" type="text/javascript"></script>
   <script type="text/javascript">
            
        $('.clockpicker').clockpicker({
            //placement: 'top',
            //align: 'left',
            autoclose: true
            // donetext: 'Done'
        });
        
    </script>

   <script>
        function addServ(id){
        //(".fc-day-top").click(function(){
            //var serv_id = $(this).attr("data-serv_id");
            //alert(id);
            $("#srvListBlock_"+id+" .appendeddiv").append(
                '<div class="row dd" id="remdd_'+id+'">'+
                    '<div class="col-md-3">'+
                        '<div class="form_control_new">  '+
                            '<div class="label_head">Sub Service Name</div>'+
                            '<div class="input-group"> '+
                                '<span class="input-group-addon" id="sub_service_name"><i class="fa fa-user"></i></span> '+
                                '<input class="form-control" name="sub_service_name_'+id+'[]" id="sub_service_name" placeholder="Sub Service Name">'+ 
                            '</div>'+
                        '</div>'+
                    '</div>'+

                    '<div class="col-md-3">'+
                        '<div class="form_control_new">  '+
                            '<div class="label_head">Estimate Time</div>'+
                            '<div class="input-group clockpicker">'+
                                '<span class="input-group-addon" id="estimate_time">'+
                                    '<span class="glyphicon glyphicon-time"></span>'+
                                '</span>'+
                                '<input type="text" class="form-control" name="estimate_time_'+id+'[]" id="estimate_time" placeholder="Estimate Time">'+
                            '</div>'+

                            // '<div class="input-group"> '+
                            //     '<span class="input-group-addon" id="estimate_time"><i class="fa fa-user"></i></span>'+ 
                            //     '<input class="form-control" name="estimate_time_'+id+'[]" id="estimate_time" placeholder="Estimate Time"> '+
                            // '</div>'+
                        '</div>'+
                    '</div>'+

                    '<div class="col-md-3">'+
                        '<div class="form_control_new"> '+ 
                            '<div class="label_head">Estimate Price</div>'+
                            '<div class="input-group">'+ 
                                '<span class="input-group-addon" id="estimate_price"><i class="fa fa-user"></i></span> '+
                                '<input class="form-control" name="estimate_price_'+id+'[]" id="estimate_price" placeholder="Estimate Price">'+ 
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    
                    '<div class="col-md-3 text-right">'+
                        '<div class="form_control_new"> '+ 
                            '<div class="label_head">&nbsp;</div>'+
                            '<div class="input-group">'+ 
                                '<button type="button" class="btn btn-danger"  onclick="removeServicesPkg('+id+');">Remove</button>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'
            );

             $('.clockpicker').clockpicker({
                //placement: 'top',
                //align: 'left',
                autoclose: true,
                // donetext: 'Done'
            });
        }

        function removeServicesPkg(id){
            //alert(id);
            var elem = document.getElementById('remdd_'+id+'');
            elem.parentNode.removeChild(elem);
           //$(caller).closest('.row dd').remove();
        }

        
    </script>
</body>
</html>