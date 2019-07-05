<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Nitty-Gritty - Products</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta content="" name="author" />

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
<script src="https://use.fontawesome.com/6fd4525080.js"></script>

<link href="{{ asset('public/developer/calender/fullcalendar.min.css') }}" rel='stylesheet' />
<link href="{{ asset('public/developer/calender/fullcalendar.print.min.css') }}" rel='stylesheet' media='print' />

<link href="{{ asset('public/plugins/bootstrap-datepicker/css/datepicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.css') }}" rel="stylesheet" type="text/css" media="screen" />

<link href="{{ asset('public/plugins/bootstrap-tag/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/plugins/bootstrap-select2/select2.css') }}" rel="stylesheet" type="text/css" media="screen" />
@yield('css')
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

<script src="{{ asset('public/plugins/bootstrap-select2/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/plugins/bootstrap-tag/bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/developer/js/custom.js') }}" type="text/javascript"></script>
@yield('js')
<script>
    setTimeout(function() {
        $('.alert-info').slideUp(300);
    }, 5000);
    $('#refreshbutton').click(function(){
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
                RequestedJobs(date);
            }
        
        });

        var date=new Date($('#calendar').fullCalendar('getDate'));
        RequestedJobs(date);
    });

    function alljobsinCal(b_nDate){
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
            url: "{{ route('negotiate.jobs') }}",
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
                    $("#requestedJObsDt").html('');
                    $.each(json, function(index, value) {
                        flag=false;
                        if(value.index != '' && (value.status == 4 || value.status == 5 || value.status == 6 || value.status == 7 || value.status == 8)){
                            
                            var issueProduct = '';
                            var admin = '<?php echo Auth::check() && Auth::user()->hasRole('admin'); ?>';
                            var team = '<?php echo Auth::check() && Auth::user()->hasRole('Service Team'); ?>';
                            if(team){
                                if(value.issueProduct != '' && value.issueProduct[0].status == 2){
                                    var issueProduct = '<a href="#"><button class="btn btn-success btn-cons pull-right">Issued</button></a>';
                        
                                }else if(value.issueProduct != '' && value.issueProduct[0].status == 1){
                                    var issueProduct = '<a href="#"><button class="btn btn-success btn-cons pull-right">Already Requested</button></a>';
                        
                                }else{
                                    var issueProduct = '<a href="{{ url("admin/inventry/products/requestInventory") }}/'+value.id+'" class="btn btn-success btn-cons pull-right">Request Inventory</a>';
                                
                                }
                            }else if(admin){
                                if(value.issueProduct != '' && value.issueProduct[0].status == 2){
                                    var issueProduct = '<a href="#"><button class="btn btn-success btn-cons pull-right">Already Issue</button></a>';
                                }else if(value.issueProduct != '' && value.issueProduct[0].status == 1){
                                    var issueProduct = '<a href="{{ url("admin/inventry/products/issueProducts") }}/'+value.id+'"><button class="btn btn-success btn-cons pull-right">Issue Products</button></a>';
                        
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
                                                        '<div class="labelValue"> '+value.job_date+'</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+

                                            '<div class="row">'+
                                                '<div class="col-sm-6">'+
                                                    '<div class="odrInner">'+
                                                        '<div class="labelText">Customer Name</div>'+
                                                        '<div class="labelValue">'+value.firstname+' '+value.lastname+'</div>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-sm-6">'+
                                                    '<div class="odrInner">'+
                                                        '<div class="labelText">AMC Holder</div>'+
                                                        '<div class="labelValue">AMC No. 119</div>'+
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
                                                        '<div class="labelValue">'+value.job_date+'</div>'+
                                                    '</div>'+

                                                    '<div class="odrInner">'+
                                                        '<div class="labelText">Job Status</div>';
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

                                                if(value.status == 4 || value.status == 5 || value.status == 6 || value.status == 7 || value.status == 8 || value.status == 9){
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
                                                            '<div class="labelText">Team Leader</div>'+
                                                            '<div class="labelValue">'+value.group.teamleader+'</div>'+
                                                        '</div>'+
                                                    '</div>';
                                                }else{
                                                    htmlslot+='<div class="col-sm-6">'+
                                                        '<div class="odrInner">'+
                                                            '<div class="imgIconOdr">'+
                                                                '<img src="{{ asset("public/img/defaultIcon.png")}}" class="img-responsive" />'+
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
                                                        if(value.status == 4 || value.status == 5 || value.status == 6 || value.status == 7 || value.status == 8 || value.status == 9){
                                                            htmlslot+='<div class="labelValue">'+value.group.total_emp+'</div>';
                                                        }else{
                                                        htmlslot+='<div class="labelValue">Not Assign</div>';
                                                        }
                                                        htmlslot+='</div>'+
                                                    '<div class="odrInner">'+
                                                        '<div class="labelText">Number</div>';
                                                        if(value.status == 4 || value.status == 5 || value.status == 6 || value.status == 7 || value.status == 8 || value.status == 9){
                                                        htmlslot+='<div class="labelValue">'+value.group.teamleader_mob+'</div>';
                                                        }else{
                                                            htmlslot+='<div class="labelValue">Not Assign</div>';
                                                        }
                                                        htmlslot+='</div>'+
                                                    '<div class="odrInner">'+
                                                        '<div class="labelText">Service Type</div>'+
                                                        '<div class="labelValue">Regular</div>'+
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
                                                                        var service_image = '<img src="{{ asset("public/img/defaultIcon.png")}}" class="img-responsive" />';
                                                            
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
                                            '<button type="button" class="btn btn-primary btn-cons">Alloted Team: Service Team6</button>';
                                            if(value.status == 4){
                                                htmlslot+='<a href="http://3.16.87.53/admin/newjobs/'+value.id+'/jobCard" class="btn btn-primary btn-cons pull-right">Job Card</a>';
                                            }else if(value.status == 5){
                                                htmlslot+='<a href="http://3.16.87.53/admin/newjobs/'+value.id+'/viewJobCard" class="btn btn-primary btn-cons pull-right">View Job Card</a>';
                                            }
                                            if(value.status == 6){
                                                htmlslot+='<a href="http://3.16.87.53/admin/newjobs/'+value.id+'/viewJobCard" class="btn btn-primary btn-cons pull-right">View Job Card</a>';
                                                htmlslot+='<a href="http://3.16.87.53/admin/newjobs/'+value.id+'/viewProposal" class="btn btn-danger btn-cons pull-right">Proposal</a>';
                                            // htmlslot+='<a href="http://3.16.87.53/admin/newjobs/'+value.id+'/reports" class="btn btn-success btn-cons pull-right">Job Report</a>';
                                            }
                                            if(value.status == 7){
                                                htmlslot+='<a href="http://3.16.87.53/admin/newjobs/'+value.id+'/reports" class="btn btn-success btn-cons pull-right">Job Report</a>';
                                            }
                                            if(value.status == 8){
                                                htmlslot+='<a href="#" class="btn btn-success btn-cons pull-right">Completed</a>';
                                            }
                                            
                                            htmlslot+='</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';

                        }
                        $("#requestedJObsDt").append(htmlslot);
                    });
                }else{
                    $("#requestedJObsDt").html('');
                    $("#requestedJObsDt").append(
                        
                        '<div class="col-md-12">'+
                            '<div class="order_history_box req_sr_box_main">'+
                                '<div class="row">'+
                                    '<div class="col-md-12">'+
                                        '<div class="form_control_new">'+ 
                                            '<h4 class="text-center">  No Record Found on this Date!</h4>'+
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

    </script>
   
    
</body>
</html>