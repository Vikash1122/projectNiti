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
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- <script src="../../cdn-cgi/apps/head/QJpHOqznaMvNOv9CGoAdo_yvYKU.js"></script><link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" /> -->
<link href="{{ asset('public/plugins/jquery-metrojs/MetroJs.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/shape-hover/css/demo.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/shape-hover/css/component.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/owl-carousel/owl.carousel.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/owl-carousel/owl.theme.css') }}" />
<link href="{{ asset('public/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{ asset('public/plugins/jquery-slider/css/jquery.sidr.light.css') }}" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" href="{{ asset('public/plugins/jquery-ricksaw-chart/css/rickshaw.css') }}" type="text/css" media="screen">
<link rel="stylesheet" href="{{ asset('public/plugins/Mapplic/mapplic/mapplic.css') }}" type="text/css" media="screen">


<link href="{{ asset('public/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{ asset('public/plugins/bootstrapv3/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/plugins/bootstrapv3/css/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="{{ asset('public/plugins/animate.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('public/css/webarch.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('public/developer/css/styles.css') }}" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://use.fontawesome.com/6fd4525080.js"></script><link rel="stylesheet" href="{{ asset('public/plugins/jquery-morris-chart/css/morris.css') }}" type="text/css" media="screen">
<link href="{{ asset('public/developer/calender/fullcalendar.min.css') }}" rel='stylesheet' />
    
<link href="{{ asset('public/developer/calender/fullcalendar.print.min.css') }}" rel='stylesheet' media='print' />

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

<link href="{{ asset('public/plugins/bootstrap-datepicker/css/datepicker.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="">

    <!-- start header---->
        @include('admin.includes.header')
    <!-- end header---->
    <div class="page-container row-fluid">
       <!--- start sidebar ---->
       @include('admin.includes.sidebar')
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
@yield('content')
<!--- main content end----->
</div>


</div>

        

        




<script src="{{ asset('public/plugins/pace/pace.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('public/plugins/jquery/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/plugins/bootstrapv3/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/plugins/jquery-block-ui/jqueryblockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/plugins/jquery-numberAnimate/jquery.animateNumbers.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<!-- <script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script> -->


<script src="{{ asset('public/js/webarch.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/chat.js') }}" type="text/javascript"></script>


<script src="{{ asset('public/developer/calender/lib/moment.min.js') }}"></script>
    
    <script src="{{ asset('public/developer/calender/fullcalendar.min.js') }}"></script>

    
    <script src="{{ asset('public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>

    <script>
    setTimeout(function() {
        $('.alert-info').slideUp(300);
    }, 5000);
    $('#refreshbutton').click(function(){
        location.reload();
    });
$('#timepicker1').timepicker();

         $(document).ready(function() {

            $(".multiselect").val(["Jim", "Lucy"]).select2();
            var slotarr=[{
                Id:1,
                Slotdate:"2018-09-13",
                Slotstatus:1,
                SlotTime:[{
                    Slotname:"Morning",
                    Slottime:"9:00 AM - 12:00 PM",
                    SlotTimeStatus:1
                },

                {
                    Slotname:"Afternoon",
                    Slottime:"12:00 PM - 3:00 PM",
                    SlotTimeStatus:1
                },
                {
                    Slotname:"Evening",
                    Slottime:"3:00 PM - 6:00 PM",
                    SlotTimeStatus:1
                }]
            }];

             $('.input-append.date').datepicker({
                autoclose: true,
                todayHighlight: true
            });
         });
/** For approved jobs in calender start */
$(document).ready(function() {
    var currentdate=new Date();
    
    var result = '<?php echo $currentmonthjob = \App\Order::viewallJobsDate();?>';

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
    

    var calender=$('#mycalendar2').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month'
        },
        
        selectable: true,
        defaultDate:$.fullCalendar.moment(),
        viewRender: function (view, element) {
            var b = $('#mycalendar2').fullCalendar('getDate');
            var b_nDate = b.format('YYYY-MM-DD');
                alljobsinCal(b_nDate);
        },
        events: eventsArray,
        
        dayClick: function(date) {
            GetApprovedOrderDate(date);
        }
    
    });

    var date=new Date($('#mycalendar2').fullCalendar('getDate'));
    GetApprovedOrderDate(date);
});

function alljobsinCal(b_nDate){
    $.ajax({
           type:"GET",
           url:"{{route('ajaxDateJobs.dt')}}?date="+b_nDate,
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
                var calender=$('#mycalendar2').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month'
                    },
                    
                    selectable: true,
                    defaultDate:$.fullCalendar.moment(),
                    //alert(defaultDate);
                    viewRender: function (view, element) {
                        var b = $('#mycalendar2').fullCalendar('getDate');
                        var b_nDate = b.format('YYYY-MM-DD');
                            alljobsinCal(b_nDate);
                    },
                    events: eventsArray1,
                    
                    dayClick: function(date) {
                        GetApprovedOrderDate(date);
                    }
                
                });

                 $("#mycalendar2").fullCalendar('removeEvents');
                 $("#mycalendar2").fullCalendar('addEventSource', eventsArray1);
                 $("#mycalendar2").fullCalendar('rerenderEvents');
           
            }
           }
    });
    
}
/** For approved jobs in calender end */

/** For alloted jobs in calender start */
$(document).ready(function() {
    var currentdate=new Date();
    
    var result = '<?php echo $currentmonthjob = \App\Order::viewallallotedJobsDate();?>';
    var json = $.parseJSON(result);
    //alert(json);
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
    

    var calender=$('#calendarallot').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month'
        },
        
        selectable: true,
        defaultDate:$.fullCalendar.moment(),
        viewRender: function (view, element) {
            var b = $('#calendarallot').fullCalendar('getDate');
            var b_nDate = b.format('YYYY-MM-DD');
            allotedjobsinCal(b_nDate);
        },
        events: eventsArray,
        
        dayClick: function(date) {
            GetAllotedOrderDate(date);
        }
    
    });

    var date=new Date($('#calendarallot').fullCalendar('getDate'));
    GetAllotedOrderDate(date);
});

function allotedjobsinCal(b_nDate){
    $.ajax({
           type:"GET",
           url:"{{route('dates.ajaxDateJobs')}}?date="+b_nDate,
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
                var calender=$('#calendarallot').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month'
                    },
                    
                    selectable: true,
                    defaultDate:$.fullCalendar.moment(),
                    //alert(defaultDate);
                    viewRender: function (view, element) {
                        var b = $('#calendarallot').fullCalendar('getDate');
                        var b_nDate = b.format('YYYY-MM-DD');
                            alljobsinCal(b_nDate);
                    },
                    events: eventsArray1,
                    
                    dayClick: function(date) {
                        GetAllotedOrderDate(date);
                    }
                
                });

                 $("#calendarallot").fullCalendar('removeEvents');
                 $("#calendarallot").fullCalendar('addEventSource', eventsArray1);
                 $("#calendarallot").fullCalendar('rerenderEvents');
           
            }
           }
    });
    
}
/** For alloted jobs in calender end */
    </script>
    <script src="{{ asset('public/developer/js/surveyer.js') }}"></script>
<script src="{{ asset('public/plugins/jquery-ricksaw-chart/js/d3.v2.js') }}"></script>
<script src="{{ asset('public/plugins/jquery-ricksaw-chart/js/rickshaw.min.js') }}"></script>
<script src="{{ asset('public/plugins/jquery-morris-chart/js/morris.min.js') }}"></script>
<script src="{{ asset('public/plugins/jquery-easy-pie-chart/js/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('public/plugins/jquery-sparkline/jquery-sparkline.js') }}"></script>
<script src="{{ asset('public/plugins/skycons/skycons.js') }}"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script src="{{ asset('public/plugins/jquery-gmap/gmaps.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/plugins/Mapplic/mapplic/mapplic.js') }}" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{ asset('public/js/dashboard_v2.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/plugins/jquery-datatable/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('public/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('public/plugins/datatables-responsive/js/datatables.responsive.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/plugins/datatables-responsive/js/lodash.min.js') }}"></script>

<script src="{{ asset('public/js/datatables.js') }}" type="text/javascript"></script>

<script>

    function allotgroup(id){
        $('#jobID').val(id);
        $('#jobID1').val(id);
        //alert(id)
    }
        $('#group_idmy').on('change', function() {
            var group_id = this.value;
            var token = $('meta[name="csrf-token"]').attr('content');
           // alert( group_id );
            $.ajax({ 
                         url: "{{ route('orders.ajaxgroups') }}",
                         data: {"group_id":group_id,"_token":token},
                         type: 'post',
                         success: function(result) {
                             var json = $.parseJSON(result);
                             if(json[0] != ''){
                                var htmlslot;
                              var  flag=false;
                                     console.log(json[0]);
                                     $("#groupdetail1").html(' ');
                                    // $.each(json, function(index, value) {
                                         flag=false;
                                         
                                         if(json[0].teamleader_image != '' && json[0].teamleader_image != null){
                                            var emp_image = '<?php echo fileurlemp();?>'+ json[0].teamleader_image;
                                             var teamlead_img = '<img src="'+emp_image+'" class="img-responsive">';
                                         }else{
                                             var teamlead_img = '<img src="{{ asset("public/img/defaultIcon.png") }}" class="img-responsive">';
                                         }

                                         if(json[0].driver_image != '' && json[0].driver_image != null){
                                            var dr_image = '<?php echo fileurlemp();?>'+ json[0].driver_image;
                                             var driver_image = '<img src="'+dr_image+'" class="img-responsive">';
                                         }else{
                                             var driver_image = '<img src="{{ asset("public/img/defaultIcon.png") }}" class="img-responsive">';
                                         }

                                                 htmlslot='<div class="col-md-12">'+
                                                        '<div class="row">'+
                                                            '<div class="col-sm-8 col-xs-8">'+
                                                                '<div class="groupListDiv">'+
                                                                    '<div class="row">'+
                                                                        '<div class="col-sm-12">'+
                                                                            '<h5 class="fontWeight600">'+json[0].group_name+' </h5>'+
                                                                            '<p class="tm_role"> '+json[0].teamleader+' <span> (Team Leader)</span></p>'+
                                                                        '</div>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                            
                                                            '<div class="col-sm-4 col-xs-4">'+
                                                                '<div class="jd_list_cust_img_box">'+
                                                                    '<div class="widget_img_box">'+
                                                                        ''+teamlead_img+''+
                                                                    '</div>'+
                                                                '</div>'+    
                                                            '</div>'+
                                                        '</div>'+

                                                        '<div class="row">'+
                                                            '<div class="col-sm-6 col-xs-6">'+
                                                                '<div class="groupListCardDiv">'+
                                                                    '<h5>Time Slot</h5>'+
                                                                    '<p class="tm_role">Morning : 9:00 AM</p>'+
                                                                '</div>'+
                                                            '</div>'+
                                                            '<div class="col-sm-6 col-xs-6">'+
                                                                '<div class="groupListCardDiv">'+
                                                                    '<h5>Services</h5>'+
                                                                    '<p class="tm_role">'+json[0].services+'</p>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+

                                                        '<div class="row">'+
                                                            '<div class="col-sm-6 col-xs-6">'+
                                                                '<div class="groupListCardDiv">'+
                                                                    '<h5>Team Size</h5>'+
                                                                    '<div class="teamSize">'+json[0].total_emp+'</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+    
                                                        '<hr />'+
                                                        '<div class="row">'+
                                                            '<div class="col-sm-3 col-xs-3">'+
                                                                '<div class="drv_outer_img_box">'+
                                                                    '<div class="widget_img_box">'+
                                                                        ''+driver_image+''+
                                                                    '</div>'+
                                                                '</div>'+    
                                                            '</div>'+
                                                            '<div class="col-sm-9 col-xs-9">'+
                                                                '<div class="row">'+
                                                                    '<div class="col-sm-12">'+
                                                                        '<div class="groupListDivNew">'+
                                                                            '<p class="tm_role">'+json[0].drivername+' <span> (Driver)</span></p>'+
                                                                            '<p class="vhl_inf">Vehicle No :  '+json[0].vehicle_no+'</p>'+
                                                                        '</div>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>';
                                             $("#groupdetail1").append(htmlslot);
                                     //});
                             }
                 }
             });
        });

    $('#example').dataTable( {
    "rowCallback": function( row, data ) {
        if ( data[4] == "A" ) {
        $('td:eq(4)', row).html( '<b>A</b>' );
        }
    }
    } );
    
    </script>

</body>
</html>