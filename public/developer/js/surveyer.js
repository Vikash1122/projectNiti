/*Custom Surveyor js*/
function ucwords (str) {
    return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
        return $1.toUpperCase();
    });
}

function strtolower (str) {
    return (str+'').toLowerCase();
}
/*---Jobs REcord Acc to date---*/
var defaultimg ="http://3.16.87.53/public/img/defaultIcon.png" ;
var default_small_img = "http://3.16.87.53/public/img/profiles/avatar_small.jpg";
$(document).ready(function() {       
    var currentdate=new Date();
    var calender=$('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
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
        var date = `${moment(currentdate).format("YYYY-MM-DD")}`;
        var token = $('meta[name="csrf-token"]').attr('content');
        var userurl = "http://3.16.87.53/public/uploads/users/";
        //alert(date);
        $.ajax({ 
            url: "http://3.16.87.53/admin/surveyers/getAllJObsAjax",
            data: {"date":date,"_token":token},
            type: 'post',
            success: function(result) {
                var json = $.parseJSON(result);
                $("#jobdt2").html('');
                $("#jobdt2").html( `${moment(currentdate).format("DD-MM-YYYY")}` );
                if(json.length > 0){
                   var htmlslot;
                 var  flag=false;
                   //console.log("Mainlist "+json.length);
                    $("#currentdateJobs").html('');
                    $.each(json, function(index, value) {
                        flag=false;
                        var user_image='';
                        var usr_image = userurl+ value.profile_pic;
                                if (value.profile_pic == null){
                                    user_image =  '<img src="'+defaultimg+'" class="">'
                                }else{
                                    user_image =  '<img src="'+ usr_image +'" class="">'
                                }
                        
                        if(value.status == 1){
                            var allot_surveyer = '<button type="button" class="hashtags asign_job_btn tp_mar_4" >Alloted</button>';
                
                        }else{
                            var allot_surveyer = '<button type="button" class="hashtags asign_job_btn tp_mar_4 allowSurveyData12" onclick="showddt('+value.id+');" data-toggle="modal"  data-job_id="'+value.id+'" data-target=".allotJob">Allot</button>';
                        
                        }
                          if(value.index != ''){
                            var dt1 = `${moment(value.job_date).format("DD-MM-YYYY")}`;
                            
                                htmlslot='<div class="col-md-12"> ' +
                                            '<div class="order_history_box req_sr_box_main"> ' +
                                                '<div class="row"> ' +
                                                    '<div class="col-sm-4 jd_list_cust_img_box"> ' +
                                                        '<div class="order_history_box"> ' +
                   ' <div class="job_desc_box_list"> ' +
                   ' <div class="title"> ' +
                   ' <h5>Job No. <span class="pull-right srv_name">'+ value.id +'</span></h5> ' +
                                ' </div>  ' +        
                                '  </div> ' +
                                ' <div class="widget_user_list req_sr_card"> ' +
                                ' <div class="widget_img_box"> ' +
                                ' '+user_image+' ' +
                                '  </div> ' +
                                ' <div class="bs_inf_jd"> ' +
                                '  <h5 class="text-center">'+value.firstname+' '+ value.lastname+'</h5> ' +
                                ' <p>('+value.mobile+')</p> ' +
                                '  </div> ' +
                            
                                '  <div class="job_desc_box_list"> ' +
                                ' <div class="row"> ' +
                                '  <div class="col-sm-12 col-xs-12"> ' +
                                '  <h5 class="textHead">Location</h5> ' +
                                '  <p>'+value.address.substring(0,38)+'...'+'</p> ' +
                                '  </div> ' +

                                    '  <div class="col-sm-12 col-xs-12"> ' +
                                    '  <h5 class="textHead">Distance <span class="pull-right req_sr_card_dis">25 KM</span> </h5> ' +
                                    '  </div> ' +
                                    ' </div>    ' + 
                                    ' </div> ' +
                                    ' </div>  ' + 
                                    ' </div> ' +
                                    ' </div> ' +

                '<div class="col-sm-8 req_sr_card_dt_panel"> ' +
                    '<div class="sub_ser_box_list"> ' +
                        '<div class="row"> ' +
                        ' <div class="col-sm-12"> ' +
                        ' <div class="table-responsive"> ' +
                        ' <table class="table"> ' +
                        '  <thead> ' +
                        '  <tr> ' +
                        '  <th>Service Date</th> ' +
                        '  <th>Slot</th> ' +
                        '  <th>Time</th> ' +
                        ' </tr> ' +
                        '</thead> ' +

                                      '  <tbody> ' +
                                      '  <tr> ' +
                                      '  <td>'+dt1+'</td> ' +
                                      '  <td>'+value.slot_name+'</td> ' +
                                      ' <td>'+value.slotstart_time+' - '+value.slotend_time+'</td> ' +
                                      '  </tr> ' +
                                      '  </tbody> ' +
                                      '</table> ' +
                                      ' </div> ' +
                                      ' </div> ' +
                                      '</div> ' +
                                      '</div> ' +
                                      ' <div class="job_desc_box_list">' +
                                      ' <div class="sub_ser_box_list">' +
                                      '  <div class="title_new">' +
                                      '   <h5>Services ' +
                                      '      <span class="pending">'+ucwords(strtolower(value.service_type))+' Service</span>' +
                                      '    </h5>' +
                                      ' </div>' +

                            '<div class="row">' +
                            ' <div class="col-md-12">' +
                            ' <div class="jd_desc_blk" id="style-1">' +
                            ' <div class="force-overflow" id="myjobserv">';
                                 if(!flag)

                                {  //console.log(value.services.length)  
                                        for(var x=0;x<value.services.length;x++)
                                       {    //console.log(value.services[x].service_name);
                                            htmlslot +='<div class="card_main_srv_lst">' +
                                            '<div class="row">' +
                                            '<div class="col-md-12">' +
                                            '<h5 class="textHead mar_bot nm_srv">Service Name : <span class="srv_name">'+value.services[x].service_name+'</span></h5>' +
                                            '</div>' +
                                            '</div>' +
                                            ' <div class="row">' +
                                            '<div class="col-md-12">' +
                                            ' <h5 class="textHead">Job Services Details</h5>' +
                                            ' <div class="list_sub_srv" >'+
                                            '<div class="problemText">'+
                                                '<div class="pblIcon"><i class="fa fa-question-circle"></i></div>';
                                                if(value.services[x].jobServices.specify_problem != '' && value.services[x].jobServices.specify_problem != null){
                                                htmlslot +='<div class="pblTxt">'+value.services[x].jobServices.specify_problem+'</div>';
                                                }
                                                    htmlslot +='</div>'+

                                                '<div class="additionalText">'+
                                                    '<div class="adtIcon"><i class="fa fa-info-circle"></i></div>';
                                                    if(value.services[x].jobServices.additional_notes != '' && value.services[x].jobServices.additional_notes != null){
                                                    htmlslot +='<div class="adtTxt">'+value.services[x].jobServices.additional_notes+'</div>';
                                                    }
                                                    htmlslot +='</div>'+
                                                        '</div>'+
                                                        ' </div>'+
                                                        ' </div>'+
                                                        ' </div>';
                                    }
                                   
                                }
                               /// flag=true;
                               htmlslot +=' </div>'+
                                    ' </div>'+
                                    '</div>'+
                                    '</div>'+
                                    '</div>'+
                                    ' </div>'+
                                    '</div>'+
                                    '</div>'+

            '<div class="row">'+
            '<div class="col-md-12">'+
            '<div class="footer_bx">'+
            '<div class="row">'+
            ' <div class="col-sm-5">'+
            ' <div class="job_desc_box_list">'+
            ' <h5>Total Estimated Price <span class="pull-right">5000 AED</span></h5>'+
            '</div>'+
            '</div>'+
            '<div class="col-sm-7 text-right">'+
            '  '+allot_surveyer+''+
            '</div>'+
            ' </div>'+
            '</div>'+
            ' </div>'+
            ' </div>'+
            '</div>'+
            ' </div>';

                            }
                            $("#currentdateJobs").append(htmlslot);
                    });

                }else{
                $("#currentdateJobs").html('');
                $("#currentdateJobs").append('<div class="col-md-12">'+
                    '<div class="order_history_box req_sr_box_main">'+
                        '<div class="row"> '+
                            '<div class="col-md-12">'+
                                '<h4 class="text-center"> No Record Found!</h4>'+
                            '</div>'+
                        '</div>'+
                    '</div>'
                );
        } 
      
    }
});


}

/** approved orders acc to date start  */

function GetApprovedOrderDate(currentdate){
    var date = `${moment(currentdate).format("YYYY-MM-DD")}`;
    var token = $('meta[name="csrf-token"]').attr('content');
    var userurl = "http://3.16.87.53/public/uploads/users/";
    var empurl = "http://3.16.87.53/public/uploads/employees/";
    var serviceurl = "http://3.16.87.53/public/uploads/services/";
    //var button = allotgroup(this.getAttribute('+value.id+'));
    //alert(date);
    $.ajax({ 
        url: "http://3.16.87.53/admin/orders/getallApprovedAjax",
        data: {"date":date,"_token":token},
        type: 'post',
        success: function(result) {
            var json = $.parseJSON(result);
            $("#jobdt23").html( `${moment(currentdate).format("DD-MM-YYYY")}` );
            $("#totalapproved1").html('');
            $("#totalapproved1").html('Total Orders : '+json.length+'');
            if(json.length > 0){
                var htmlslot;
                var  flag=false;
                //console.log("Mainlist "+json.length);
                $("#approvedJObsdata1").html('');
                $.each(json, function(index, value) {
                    flag=false;
                    var user_image='';
                    var usr_image = userurl+ value.profile_pic;
                    if (value.profile_pic == null){
                        user_image =  '<img src="'+defaultimg+'" class="">'
                    } else {
                        user_image =  '<img src="'+ usr_image +'" class="">'
                    }
                    
                    var alloted_group = '';
                    if(value.group_name != '' && value.group_name != null){
                        var alloted_group = '<button type="button" class="btn btn-primary btn-cons" >Alloted Team: '+value.group_name+'</button>';            
                    }else{
                        var alloted_group = '<button type="button" class="btn btn-primary btn-cons" data-toggle="modal" data-jobId="'+value.id+'" onclick="allotgroup('+value.id+')" data-target=".allotGroup">Allot Team</button>';
                                            //  '<button type="button" class="btn btn-info btn-cons" data-toggle="modal" data-jobId="'+value.id+'" onclick="allotgroup('+value.id+')" data-target=".individualOrders">Allot individual</button>';                    
                    }

                    var dt1 = `${moment(value.job_date).format("DD-MM-YYYY")}`;
                    if(value.index != ''){
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
                                                    '<div class="labelValue"> '+dt1+'</div>'+
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
                                                    '<div class="labelText">';
                                                        if(value.amc_type == 0){
                                                            htmlslot+='Non-AMC Holde';
                                                        }else if(value.amc_type == 1){
                                                            htmlslot+='AMC Holder';
                                                        }
                                                    htmlslot+='</div>'+
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
                                                        '<div class="labelText">Team Leader</div>'+
                                                        '<div class="labelValue">'+value.group.teamleader+'</div>'+
                                                    '</div>'+
                                                '</div>';
                                                }else{
                                                    htmlslot+='<div class="col-sm-6">'+
                                                    '<div class="odrInner">'+
                                                        '<div class="imgIconOdr">'+
                                                            '<img src="'+defaultimg+'" class="img-responsive" />'+
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
                                                        htmlslot+='<div class="labelValue">'+value.group.leaderMobile+'</div>';
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
                                                            var service_image1 = serviceurl+value1.service_icon;
                                                            if(value1.service_icon == null || value1.service_icon == ''){
                                                                var service_image = '<img src="'+defaultimg+'" class="img-responsive" />';
                                                    
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
                                        ''+alloted_group+'';
                                        if(value.status == 4){
                                            htmlslot +='<a href="#" class="btn btn-danger btn-cons pull-right">No Job Card</a>';
                                        }
                                        if(value.status == 5){
                                            htmlslot +='<a href="http://3.16.87.53/admin/orders/orderDetails/'+value.id+'" class="btn btn-danger btn-cons pull-right">View Job Card</a>';
                                        }
                                        if(value.status == 6){
                                            htmlslot +='<a href="http://3.16.87.53/admin/orders/viewProposal/'+value.id+'" class="btn btn-danger btn-cons pull-right">Proposed</a>';
                                        }
                                        if(value.status == 8){
                                            htmlslot+='<a href="#" class="btn btn-success btn-cons pull-right">Completed</a>';
                                        }
                                        if(value.status == 9){
                                            htmlslot+='<a href="#" class="btn btn-danger btn-cons pull-right">Rejected</a>';
                                        }
                                    htmlslot +='</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                    }

                    $("#approvedJObsdata1").append(htmlslot);
                });

            } else {
                $("#approvedJObsdata1").html('');
                $("#approvedJObsdata1").append('<div class="col-md-12">'+
                    '<div class="order_history_box req_sr_box_main">'+
                        '<div class="row">'+
                            '<div class="col-md-12">'+
                                '<h4 class="text-center">No Record Found on this Date!</h4>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>');
            } 
        }
    });
}
/** approved orders acc to date end  */

/** alloted orders acc to date start  */

function GetAllotedOrderDate(currentdate){
        var date = `${moment(currentdate).format("YYYY-MM-DD")}`;
        var token = $('meta[name="csrf-token"]').attr('content');
        var empurl = "http://3.16.87.53/public/uploads/employees/";
        var userurl = "http://3.16.87.53/public/uploads/users/";
        var serviceurl = "http://3.16.87.53/public/uploads/services/";
        //var button = allotgroup(this.getAttribute('+value.id+'));
        //alert(date);
        $.ajax({ 
            url: "http://3.16.87.53/admin/orders/getallAllotedAjax",
            data: {"date":date,"_token":token},
            type: 'post',
            success: function(result) {
                var json = $.parseJSON(result);
                $("#totalalloted1").html('');
                $("#totalalloted1").html('Total Orders : '+json.length+'');
                if(json.length > 0){
                    $("#allotedDate6").html( `${moment(currentdate).format("DD-MM-YYYY")}` );
                    
                   var htmlslot;
                 var  flag=false;
                   //console.log("Mainlist "+json.length);
                    $("#groupbydatafilter").html('');
                    $.each(json, function(index, value) {
                        flag=false;
                        var user_image='';
                        var usr_image = userurl+ value.profile_pic;
                                if (value.profile_pic == null){
                                    user_image =  '<img src="'+defaultimg+'" class="img-responsive">'
                                }else{
                                    user_image =  '<img src="'+ usr_image +'" class="">'
                                }

                        var teamleader_image='';
                        var teamleader_image1 = empurl+ value.group.teamleader_image;
                        if(value.group.teamleader_image == null || value.group.teamleader_image == ''){
                            var teamleader_image = '<img src="'+defaultimg+'" class="img-responsive">';
                
                        } else {
                            var teamleader_image = '<img src="'+ teamleader_image1 +'" class="img-responsive">';
                        
                        }
                        if(value.index != ''){
                            //alert(value.status);
                            var dt1 = `${moment(value.job_date).format("DD-MM-YYYY")}`;
                                htmlslot='<div class="row">'+
                                '<div class="col-md-12">'+
                                    '<div class="orderBox_ng">'+
                                        '<div class="row" >'+
                                            '<div class="col-md-4">'+
                                                '<div class="row">'+
                                                    '<div class="col-sm-6">'+
                                                        '<h4>Job No. '+value.id+'</h4>'+
                                                    '</div>'+
                                                    '<div class="col-sm-6">'+
                                                        '<div class="odrInner">'+
                                                            '<div class="labelText">Job Date</div>'+
                                                            '<div class="labelValue">'+dt1+'</div>'+
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
                                                            // '<div class="labelText">AMC holder</div>'+
                                                            '<div class="labelText">';
                                                            if(value.amc_type == 0){
                                                                htmlslot +='Non-AMC Holder';
                                                            }else if(value.amc_type == 1){
                                                                htmlslot +='AMC Holder ';
                                                            }
                                                            htmlslot +='</div>'+

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
                                                            '<div class="labelText">Job Status</div>';
                                                            if(value.status == 3){
                                                                htmlslot +='<div class="text-orange">Requested</div>';
                                                            }else if(value.status == 4){
                                                                htmlslot +='<div class="text-green">Service Team Alloted</div>';
                                                            }else if(value.status == 5){
                                                                htmlslot +='<div class="text-light-blue">In Process</div>';
                                                            }else if(value.status == 6){
                                                                htmlslot +='<div class="text-green-light">Proposed</div>';
                                                            }else if(value.status == 7){
                                                                htmlslot +='<div class="text-megenta">Payment Done</div>';
                                                            }else if(value.status == 8){
                                                                htmlslot +='<div class="">Completed</div>';
                                                            }else if(value.status == 9){
                                                                htmlslot +='<div class="text-brown">Rejected</div>';
                                                            }                                
                                                        htmlslot +='</div>'+
                                                    '</div>';
                                                    
                                                    if(value.status == 4 || value.status == 5 || value.status == 6 || value.status == 7 || value.status == 8 || value.status == 9){
                                                        htmlslot+='<div class="col-sm-6">'+
                                                            '<div class="odrInner">'+
                                                                '<div class="imgIconOdr">'+
                                                                ''+teamleader_image+''+
                                                                '</div>'+
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
                                                                    '<img src="'+defaultimg+'" class="img-responsive" />'+
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
                                                            '<div class="labelText">Service Type</div>';
                                                            if(value.services[0] != ''){
                                                                htmlslot+='<div class="labelValue">'+ucwords(strtolower(value.service_type))+'</div>';
                                                            }
                                                            
                                                        htmlslot+='</div>'+
                                                    '</div>'+
                                                    
                                                    '<div class="col-sm-5">'+
                                                        '<div class="odrInner">'+
                                                            '<div class="labelText">Job Service</div>'+
                                                            '<div class="orderServiceIcon">';
                                                            if(value.services[0] != ''){
                                                
                                                                $.each(value.services,function(index1, value1){
                                                                    var service_image='';
                                                                    var service_image1 = serviceurl+value1.service_icon;
                                                                    if(value1.service_icon == null || value1.service_icon == ''){
                                                                        var service_image = '<img src="'+defaultimg+'" class="img-responsive" />';
                                                            
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
                                    '</div>'+
                                '</div>'+
                            '</div>';

                            }
                        $("#groupbydatafilter").append(htmlslot);
                    });

                }else{
                    $("#groupbydatafilter").html('');
                    $("#groupbydatafilter").append(
                        '<div class="row">'+
                            '<div class="col-md-12">'+
                                '<div class="order_history_box req_sr_box_main">'+
                                    '<div class="row">'+
                                        '<div class="form_control_new">'+ 
                                            '<h4 class="text-center">No Record Found on this Date!</h4>'+
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
/** alloted orders acc to date end  */

/** jobs filter by service_type  */
$('#myserviceType').on('change', function() {
    var service_type = this.value;
    var token = $('meta[name="csrf-token"]').attr('content');
    var userurl = "http://3.16.87.53/public/uploads/users/";
    alert(service_type);   
    if(service_type){
        $.ajax({ 
                 url: "http://3.16.87.53/admin/surveyers/getSurveyorserviceTypeAjax",
                 data: {"service_type":service_type,"_token":token},
                 type: 'post',
                 success: function(result) {
                     var json = $.parseJSON(result);
                     if(json.length > 0){
                        $("#jobDate3").html('');
                           // $("#jobdt2").html( `${moment(currentdate).format("DD-MM-YYYY")}` );
                        var htmlslot;
                        var  flag=false;
                        //console.log("Mainlist "+json.length);
                            $("#currentdateJobs").html('');
                            $.each(json, function(index, value) {
                                flag=false;
                                var user_image='';
                                var usr_image = userurl+ value.profile_pic;
                                        if (value.profile_pic == null){
                                            user_image =  '<img src="'+defaultimg+'" class="">'
                                        }else{
                                            user_image =  '<img src="'+ usr_image +'" class="">'
                                        }
                                
                                if(value.status == 1){
                                    var allot_surveyer = '<button type="button" class="hashtags asign_job_btn tp_mar_4" >Alloted</button>';
                        
                                }else{
                                    var allot_surveyer = '<button type="button" class="hashtags asign_job_btn tp_mar_4 allowSurveyData12" onclick="showddt('+value.id+');" data-toggle="modal"  data-job_id="'+value.id+'" data-target=".allotJob">Allot</button>';
                                
                                }
                                if(value.index != ''){
                                    var dt1 = `${moment(value.job_date).format("DD-MM-YYYY")}`;
                                        htmlslot='<div class="col-md-12"> ' +
            ' <div class="order_history_box req_sr_box_main"> ' +
                    '<div class="row"> ' +
                        '<div class="col-sm-4 jd_list_cust_img_box"> ' +
                        ' <div class="order_history_box"> ' +
                        ' <div class="job_desc_box_list"> ' +
                        ' <div class="title"> ' +
                        ' <h5>Job No. <span class="pull-right srv_name">'+ value.id +'</span></h5> ' +
                                        ' </div>  ' +        
                                        '  </div> ' +
                                        ' <div class="widget_user_list req_sr_card"> ' +
                                        ' <div class="widget_img_box"> ' +
                                        ' '+user_image+' ' +
                                        '  </div> ' +
                                        ' <div class="bs_inf_jd"> ' +
                                        '  <h5 class="text-center">'+value.firstname+' '+ value.lastname+'</h5> ' +
                                        ' <p>('+value.mobile+')</p> ' +
                                        '  </div> ' +
                                    
                                        '  <div class="job_desc_box_list"> ' +
                                        ' <div class="row"> ' +
                                        '  <div class="col-sm-12 col-xs-12"> ' +
                                        '  <h5 class="textHead">Location</h5> ' +
                                        '  <p>'+value.address.substring(0,38)+'...'+'</p> ' +
                                        '  </div> ' +

                                            '  <div class="col-sm-12 col-xs-12"> ' +
                                            '  <h5 class="textHead">Distance <span class="pull-right req_sr_card_dis">25 KM</span> </h5> ' +
                                            '  </div> ' +
                                            ' </div>    ' + 
                                            ' </div> ' +
                                            ' </div>  ' + 
                                            ' </div> ' +
                                            ' </div> ' +

                        '<div class="col-sm-8 req_sr_card_dt_panel"> ' +
                            '<div class="sub_ser_box_list"> ' +
                                '<div class="row"> ' +
                                ' <div class="col-sm-12"> ' +
                                ' <div class="table-responsive"> ' +
                                ' <table class="table"> ' +
                                '  <thead> ' +
                                '  <tr> ' +
                                '  <th>Service Date</th> ' +
                                '  <th>Slot</th> ' +
                                '  <th>Time</th> ' +
                                ' </tr> ' +
                                '</thead> ' +

                                            '  <tbody> ' +
                                            '  <tr> ' +
                                            '  <td>'+dt1+'</td> ' +
                                            '  <td>'+value.slot_name+'</td> ' +
                                            ' <td>'+value.slotstart_time+' - '+value.slotend_time+'</td> ' +
                                            '  </tr> ' +
                                            '  </tbody> ' +
                                            '</table> ' +
                                            ' </div> ' +
                                            ' </div> ' +
                                            '</div> ' +
                                            '</div> ' +
                                            ' <div class="job_desc_box_list">' +
                                            ' <div class="sub_ser_box_list">' +
                                            '  <div class="title_new">' +
                                            '   <h5>Services ' +
                                            '      <span class="pending">'+ucwords(strtolower(value.service_type))+' Service</span>' +
                                            '    </h5>' +
                                            ' </div>' +

                                    '<div class="row">' +
                                    ' <div class="col-md-12">' +
                                    ' <div class="jd_desc_blk" id="style-1">' +
                                    ' <div class="force-overflow" id="myjobserv">';
                                        if(!flag)

                                        {  //console.log(value.services.length)  
                                                for(var x=0;x<value.services.length;x++)
                                            {    //console.log(value.services[x].service_name);
                                                    htmlslot +='<div class="card_main_srv_lst">' +
                                                    '<div class="row">' +
                                                    '<div class="col-md-12">' +
                                                    '<h5 class="textHead mar_bot nm_srv">Service Name : <span class="srv_name">'+value.services[x].service_name+'</span></h5>' +
                                                    '</div>' +
                                                    '</div>' +
                                                    ' <div class="row">' +
                                                    '<div class="col-md-12">' +
                                                    ' <h5 class="textHead">Job Services Details</h5>' +
                                                    ' <div class="list_sub_srv" >'+
                                                    '<div class="problemText">'+
                                                        '<div class="pblIcon"><i class="fa fa-question-circle"></i></div>'+
                                                        '<div class="pblTxt">'+value.services[x].jobServices.specify_problem+'</div>'+
                                                    '</div>'+

                                                    '<div class="additionalText">'+
                                                        '<div class="adtIcon"><i class="fa fa-info-circle"></i></div>'+
                                                        '<div class="adtTxt">'+value.services[x].jobServices.additional_notes+'</div>'+
                                                    '</div>'+
                                                                '</div>'+
                                                                ' </div>'+
                                                                ' </div>'+
                                                                ' </div>';
                                            }
                                        
                                        }
                                    /// flag=true;
                                    htmlslot +=' </div>'+
                                            ' </div>'+
                                            '</div>'+
                                            '</div>'+
                                            '</div>'+
                                            ' </div>'+
                                            '</div>'+
                                            '</div>'+

                    '<div class="row">'+
                    '<div class="col-md-12">'+
                    '<div class="footer_bx">'+
                    '<div class="row">'+
                    ' <div class="col-sm-5">'+
                    ' <div class="job_desc_box_list">'+
                    ' <h5>Total Estimated Price <span class="pull-right">5000 AED</span></h5>'+
                    '</div>'+
                    '</div>'+
                    '<div class="col-sm-7 text-right">'+
                    '  '+allot_surveyer+''+
                    '</div>'+
                    ' </div>'+
                    '</div>'+
                    ' </div>'+
                    ' </div>'+
                    '</div>'+
                    ' </div>';

                                    }
                                    $("#currentdateJobs").append(htmlslot);
                            });
                     }else{
                    $("#currentdateJobs").html();
                    $("#currentdateJobs").append('<div class="col-md-12">'+
                    '<div class="order_history_box req_sr_box_main">'+
                        '<div class="row">'+
                            '<div class="col-md-12">'+
                            '<h4 class="text-center">No Record Found on this Date!</h4>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '</div>');
                    }
     }
    });
}
});


/** alloted jobs filter by service_type and by group or not */
//$('#groupType14my').on('change', function() {
function jsFunction(){
    var group_type = $('#groupType14my').val();
    //var service_type = $('#serviceType1').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    var userurl = "http://3.16.87.53/public/uploads/users/";
    var empurl = "http://3.16.87.53/public/uploads/employees/";
    //alert(group_type);   
    if(group_type){
        $.ajax({ 
            url: "http://3.16.87.53/admin/orders/getAllotedserviceTypeAjax",
            data: {"group_type":group_type,"employee_id":'',"vehicle_id":'',"service_type":'',"_token":token},
            type: 'post',
            success: function(result) {
                var json = $.parseJSON(result);
                //alert(json.length);
                if(json.length > 0){
                $("#jobDate3").html('');
                $("#totalalloted1").html('');
                $("#totalalloted1").html('Total Orders : '+json.length+'');
                    // $("#jobdt2").html( `${moment(currentdate).format("DD-MM-YYYY")}` );
                var htmlslot;
                var  flag=false;
                //console.log("Mainlist "+json.length);

                $("#groupbydatafilter").html('');
                $.each(json, function(index, value) {
                    flag=false;
                    var user_image='';
                    var usr_image = userurl+ value.profile_pic;
                        if (value.profile_pic == null){
                            user_image =  '<img src="'+defaultimg+'" class="img-responsive">'
                        }else{
                            user_image =  '<img src="'+ usr_image +'" class="">'
                        }
                              
                        if(value.index != ''){
                            var dt1 = `${moment(value.job_date).format("DD-MM-YYYY")}`;
                                htmlslot='<div class="row">'+
                                '<div class="col-md-12">'+
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
                                                            ''+user_image+''+
                                                        '</div>'+
                                                        '<div class="bs_inf_jd">'+
                                                            '<h5 class="text-center"> '+value.firstname+' '+value.lastname+'</h5>'+
                                                            '<p><i class="fa fa-phone"> '+value.mobile+'</i></p>'+
                                                        '</div>'+
                                                        
                                                        '<div class="job_desc_box_list">'+
                                                            '<div class="row">'+
                                                                '<div class="col-sm-12 col-xs-12">'+
                                                                    '<h5 class="textHead">Location</h5>'+
                                                                    '<p>'+value.address.substring(0,38)+'...'+'</p>'+
                                                                '</div>'+

                                                                '<div class="col-sm-12 col-xs-12">'+
                                                                    '<h5 class="textHead">Distance <span class="pull-right req_sr_card_dis">15 KM</span> </h5>'+
                                                                '</div>'+
                                                            '</div> '+   
                                                        '</div>'+
                                                    '</div>'+  
                                                '</div>'+
                                            '</div>';
                                            htmlslot += '<div class="col-sm-8 req_sr_card_dt_panel">'+
                                                    '<div class="sub_ser_box_list">'+
                                                    '<div class="row">'+
                                                        '<div class="col-md-12">'+
                                                            '<div class="job_desc_box_list">'+
                                                                '<div class="title">';
                                                                if(value.amc_type == 0){
                                                                    htmlslot +='<h5>Non-AMC Holder <span class="pull-right srv_name"> </span></h5>';
                                                                } else if(value.amc_type == 1){
                                                                    htmlslot +='<h5>AMC Holder <span class="pull-right srv_name"> </span></h5>';
                                                                }
                                                                    
                                                                htmlslot +='</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                    '<div class="row amc_inf">'+
                                                        '<div class="col-sm-6">'+
                                                            '<h5 class="textHead">Nick Name</h5>'+
                                                            '<p class="pending"> '+value.title+'</p>'+
                                                        '</div>'+
                                                        '<div class="col-sm-6 text-right">'+
                                                            '<h5 class="textHead">Job Status </h5>';
                                                            if(value.status == 3){
                                                            htmlslot +='<p class="pending">Requested</p>';
                                                            }else if(value.status == 4){
                                                            htmlslot +='<p class="text-green">Service Team Alloted</p>';
                                                            }else if(value.status == 5){
                                                            htmlslot +='<p class="text-orange">In Process</p>';
                                                            }else if(value.status == 6){
                                                            htmlslot +='<p class="text-orange">Proposed</p>';
                                                            }else if(value.status == 7){
                                                            htmlslot +='<p class="text-green">Payment Done</p>';
                                                            }else if(value.status == 8){
                                                            htmlslot +='<p class="text-green">Completed</p>';
                                                            }else if(value.status == 9){
                                                            htmlslot +='<p class="text-red">Rejected</p>';
                                                            }
                                                            htmlslot +='</div>'+
                                                    '</div>'+
    
                                                    '<div class="row amc_inf">'+
                                                        '<div class="col-sm-6">'+
                                                            '<h5 class="textHead">Job Date</h5>'+
                                                            '<p class="pending"> '+dt1+'</p>'+
                                                        '</div>'+
                                                        '<div class="col-sm-6 text-right">'+
                                                            '<h5 class="textHead">Day Slot </h5>'+
                                                            '<p class="pending"> '+value.slot_name+' </p>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>';
                                                if(value.services[0] != ''){
                                                htmlslot += '<div class="job_desc_box_list">'+
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
                                                                        if(value1.jobServices != ''){
                                                                        htmlslot += '<div class="card_main_srv_lst">'+
                                                                            '<div class="row">'+
                                                                                '<div class="col-md-12">'+
                                                                                    '<h5 class="textHead mar_bot nm_srv">Service Name : <span class="srv_name">'+value1.service_name+'</span></h5>'+
                                                                                '</div>'+
                                                                            '</div>'+
                                                                            '<div class="row">'+
                                                                                '<div class="col-md-12">'+
                                                                                '<div class="listSubSr">'+
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
                                                                            '</div>'+
                                                                        '</div>';
                                                                        }
                                                                    });
                                                                        htmlslot += '</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>';
                                                }
                                                htmlslot += '</div>';
                                        
                                        htmlslot += '</div>';
                                        if(value.group != ''){
                                            var teamleader_image='';
                                            var teamleader_image1 = empurl+ value.group.teamleader_image;
                                            if(value.group.teamleader_image == null || value.group.teamleader_image == ''){
                                                var teamleader_image = '<img src="'+defaultimg+'" class="img-responsive">';
                                    
                                            }else{
                                                var teamleader_image = '<img src="'+ teamleader_image1 +'" class="img-responsive">';
                                            
                                            }

                                            var driver_image='';
                                            var driver_image1 = empurl+ value.group.driver_image;
                                            if(value.group.driver_image == null || value.group.driver_image == ''){
                                                var driver_image = '<img src="'+defaultimg+'" class="img-responsive">';
                                    
                                            }else{
                                                var driver_image = '<img src="'+ driver_image1 +'" class="img-responsive">';
                                            
                                            }

                                        htmlslot +='<div class="order_history_box">'+
                                            '<div class="row">'+
                                                '<div class="col-md-12">'+
                                                    '<div class="header_main_div_sec">'+
                                                        '<div class="title">'+
                                                            '<h5>Alloted Group : <span>'+value.group.group_name+'</span> </h5>'+
                                                        '</div>'+       
                                                    '</div>'+
                                                '</div>'+
                                            '<div>'+
                                            
                                            '<div class="row">'+
                                                '<div class="col-md-5">'+
                                                    '<div class="row">'+
                                                        '<div class="col-sm-4 col-xs-4">'+
                                                            '<div class="jd_list_cust_img_box">'+
                                                                '<div class="widget_img_box">'+
                                                                    ''+teamleader_image+''+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+

                                                        '<div class="col-sm-8 col-xs-8">'+
                                                            '<div class="groupListDiv">'+
                                                                '<div class="row">'+
                                                                    '<div class="col-sm-12">'+
                                                                        '<h5 class="fontWeight600">'+value.group.teamleader+'  </h5>'+
                                                                        '<p class="fontWeight600">Team Leader</p>'+
                                                                    '</div>'+

                                                                    '<div class="col-sm-12">'+
                                                                        '<p class="tm_role"> Start Time :<span> Morning 9:30 AM</span></p>'+
                                                                    '</div>'+

                                                                    // '<div class="col-sm-12">'+
                                                                    //     '<button type="button" class="btn btn-primary btn-sm btn-small" data-toggle="modal" data-target=".routePlan">Route Plan</button>'+
                                                                    // '</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>   '+
                                                '</div>'+

                                                '<div class="col-md-2">'+
                                                    '<div class="groupListCardDiv" style="padding-top: 4px;">'+
                                                        '<h5>Team Size</h5>'+
                                                        '<div class="teamSize">'+value.group.total_emp+'</div>'+
                                                    '</div>'+
                                                '</div>'+

                                                '<div class="col-md-5">'+
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
                                                                        '<p class="tm_role">'+value.group.drivername+' <span> (Driver)</span></p>'+
                                                                        '<p class="vhl_inf">Vehicle No :  '+value.group.vehicle_no+'</p>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+        
                                                '</div>'+

                                            '</div>'+
                                        '</div>';
                                        }else{
                                            var teamleader_image='';
                                            var teamleader_image1 = empurl+ value.empIMG;
                                            if(value.empIMG == null || value.empIMG == ''){
                                                var teamleader_image = '<img src="'+defaultimg+'" class="img-responsive">';
                                    
                                            }else{
                                                var teamleader_image = '<img src="'+ teamleader_image1 +'" class="img-responsive">';
                                            
                                            }
                                            htmlslot +='<div class="order_history_box">'+
                                            '<div class="row">'+
                                                '<div class="col-md-12">'+
                                                    '<div class="header_main_div_sec">'+
                                                        '<div class="title">'+
                                                            '<h5>Alloted Individual : <span>'+value.empName+'</span> </h5>'+
                                                        '</div>'+       
                                                    '</div>'+
                                                '</div>'+
                                            '<div>'+
                                            
                                            '<div class="row">'+
                                                '<div class="col-md-12">'+
                                                    '<div class="row">'+
                                                        '<div class="col-sm-4 col-xs-4">'+
                                                            '<div class="jd_list_cust_img_box">'+
                                                                '<div class="widget_img_box">'+
                                                                    ''+teamleader_image+''+
                                                                '</div>'+
                                                            '</div>'+    
                                                        '</div>'+

                                                        '<div class="col-sm-8 col-xs-8">'+
                                                            '<div class="groupListDiv">'+
                                                                '<div class="row">'+
                                                                    '<div class="col-sm-12">'+
                                                                        '<h5 class="fontWeight600">'+value.empName+'  </h5>'+
                                                                        '<p class="fontWeight600">'+value.employee_role+'</p>'+
                                                                    '</div>'+

                                                                    '<div class="col-sm-12">'+
                                                                        '<p class="tm_role"> Start Time :<span> '+value.gp_slot+' '+value.gp_slotstart_time+'</span></p>'+
                                                                    '</div>'+

                                                                    // '<div class="col-sm-12">'+
                                                                    //     '<button type="button" class="btn btn-primary btn-sm btn-small" data-toggle="modal" data-target=".routePlan">Route Plan</button>'+
                                                                    // '</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+   
                                                '</div>'+

                                            '</div>'+
                                        '</div>';
                                        }
                                        htmlslot +='</div>'+
                                '</div>'+
                            '</div>';

                        }
                        $("#groupbydatafilter").append(htmlslot);
                    });
                    }else{
                        $("#totalalloted1").html('');
                        $("#totalalloted1").html('Total Orders : '+json.length+'');
                        $("#groupbydatafilter").html('');
                        $("#groupbydatafilter").append(
                            '<div class="row">'+
                                '<div class="col-md-12">'+
                                    '<div class="order_history_box req_sr_box_main">'+
                                        '<div class="row">'+
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
}

function jsFunctionservice(){
    //var group_type = $('#groupType14my').val();
    var service_type = $('#serviceType1').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    var userurl = "http://3.16.87.53/public/uploads/users/";
    var empurl = "http://3.16.87.53/public/uploads/employees/";
    var serviceurl = "http://3.16.87.53/public/uploads/services/";
   // alert(service_type);   
    if(service_type){
        $.ajax({ 
            url: "http://3.16.87.53/admin/orders/getAllotedserviceTypeAjax",
            data: {"service_type":service_type,"employee_id":'',"vehicle_id":'',"group_type":'',"_token":token},
            type: 'post',
            success: function(result){
                var json = $.parseJSON(result);
                //alert(json.length);
                if(json.length > 0){
                    $("#jobDate3").html('');
                    $("#totalalloted1").html('');
                    $("#totalalloted1").html('Total Orders : '+json.length+'');
                        // $("#jobdt2").html( `${moment(currentdate).format("DD-MM-YYYY")}` );
                    var htmlslot;
                    var  flag=false;
                    //console.log("Mainlist "+json.length);
                    $("#groupbydatafilter").html('');
                    $.each(json, function(index, value) {
                        flag=false;
                        var user_image='';
                        var usr_image = userurl+ value.profile_pic;
                        if (value.profile_pic == null){
                            user_image =  '<img src="'+defaultimg+'" class="img-responsive">'
                        }else{
                            user_image =  '<img src="'+ usr_image +'" class="">'
                        }
                        var teamleader_image='';
                        var teamleader_image1 = empurl+ value.group.teamleader_image;
                        if(value.group.teamleader_image == null || value.group.teamleader_image == ''){
                            var teamleader_image = '<img src="'+defaultimg+'" class="img-responsive">';
                
                        } else {
                            var teamleader_image = '<img src="'+ teamleader_image1 +'" class="img-responsive">';
                        
                        }
                        if(value.index != ''){
                            var dt1 = `${moment(value.job_date).format("DD-MM-YYYY")}`;
                            htmlslot='<div class="row">'+
                                '<div class="col-md-12">'+
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
                                                            '<div class="labelValue">'+dt1+'</div>'+
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
                                                            '<div class="labelText">';
                                                                if(value.amc_type == 0){
                                                                    htmlslot +='Non-AMC Holder ';
                                                                }else if(value.amc_type == 1){
                                                                    htmlslot +='AMC Holder';
                                                                }
                                                                
                                                            htmlslot +='</div>'+
                                                            '<div class="labelValue">AMC No. '+value.amc_id+'</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="row">'+
                                                    '<div class="col-sm-12">'+
                                                        '<div class="odrInner">'+
                                                            '<div class="labelText">Location</div>'+
                                                            '<div class="labelValue">'+value.address.substring(0,38)+'...'+'</div>'+
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
                                                            '<div class="labelText">Job Status</div>'+
                                                            '<div class="text-orange">';
                                                                if(value.status == 3){
                                                                    htmlslot +='<div class="text-orange">Requested</div>';
                                                                }else if(value.status == 4){
                                                                    htmlslot +='<div class="text-green">Service Team Alloted</div>';
                                                                }else if(value.status == 5){
                                                                    htmlslot +='<div class="text-light-blue">In Process</div>';
                                                                }else if(value.status == 6){
                                                                    htmlslot +='<div class="text-green-light">Proposed</div>';
                                                                }else if(value.status == 7){
                                                                    htmlslot +='<div class="text-megenta">Payment Done</div>';
                                                                }else if(value.status == 8){
                                                                    htmlslot +='<div class="">Completed</div>';
                                                                }else if(value.status == 9){
                                                                    htmlslot +='<div class="text-brown">Rejected</div>';
                                                                }    
                                                            htmlslot +='</div>'+
                                                        '</div>'+
                                                    '</div>';
                                                    if(value.status == 4 || value.status == 5 || value.status == 6 || value.status == 7 || value.status == 8 || value.status == 9){
                                                        htmlslot+='<div class="col-sm-6">'+
                                                            '<div class="odrInner">'+
                                                                '<div class="imgIconOdr">'+
                                                                ''+teamleader_image+''+
                                                                '</div>'+
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
                                                                    '<img src="'+defaultimg+'" class="img-responsive" />'+
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
                                                                htmlslot+='<div class="labelValue">'+value.group.teamleader_mobile+'</div>';
                                                                }else{
                                                                    htmlslot+='<div class="labelValue">Not Assign</div>';
                                                                }
                                                                htmlslot+='</div>'+
                                                        '<div class="odrInner">'+
                                                            '<div class="labelText">Service Type</div>';
                                                            if(value.services[0] != ''){
                                                                htmlslot+='<div class="labelValue">'+ucwords(strtolower(value.service_type))+'</div>';
                                                            }
                                                            htmlslot+='</div>'+
                                                    '</div>'+

                                                    '<div class="col-sm-5">'+
                                                        '<div class="odrInner">'+
                                                            '<div class="labelText">Job Service</div>'+
                                                            '<div class="orderServiceIcon">';
                                                            if(value.services[0] != ''){
                                                
                                                                $.each(value.services,function(index1, value1){
                                                                    var service_image='';
                                                                    var service_image1 = serviceurl+value1.service_icon;
                                                                    if(value1.service_icon == null || value1.service_icon == ''){
                                                                        var service_image = '<img src="'+defaultimg+'" class="img-responsive" />';
                                                            
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
                                    '</div>'+
                                '</div>'+
                            '</div>';
                        }
                        $("#groupbydatafilter").append(htmlslot);
                    });
                }else{
                    $("#groupbydatafilter").html('');
                    $("#groupbydatafilter").append(
                        '<div class="row">'+
                            '<div class="col-md-12">'+
                                '<div class="order_history_box req_sr_box_main">'+
                                    '<div class="row">'+
                                        '<div class="form_control_new">'+ 
                                            '<h4 class="text-center"> No Record Found on this Date!</h4>'+
                                        '</div>'+
                                    '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>');
                }
            }
        });
    }
}
//});
/** all Filter on all Orders page start */
function GetfilterDate(date){
    var token = $('meta[name="csrf-token"]').attr('content');
    var userurl = "http://3.16.87.53/public/uploads/users/";
    var empurl = "http://3.16.87.53/public/uploads/employees/";
   // alert(date);
    $.ajax({ 
        url: "http://3.16.87.53/admin/orders/getallFilterAjax",
        data: {"date":date,"_token":token},
        type: 'post',
        success: function(result) {
        //console.log(result); return false ;
            //console.log(result);
            var json = $.parseJSON(result);
            if(json.length > 0){
                $("#allfilterApply").html('');
                var  flag=false;
                $.each(json, function(index, value) {
                    // do your stuff here
                    flag=false;
                            var user_image='';
                            var usr_image = userurl+ value.profile_pic;
                                    if (value.profile_pic == null){
                                        user_image =  '<img src="'+defaultimg+'" class="img-responsive">'
                                    }else{
                                        user_image =  '<img src="'+ usr_image +'" class="">'
                                    }
                            
                    if(value.index != ''){
                        var dt1 = `${moment(value.job_date).format("DD-MM-YYYY")}`;
                        htmlslot='<div class="col-md-6">'+
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
                                                    ''+user_image+''+
                                                    '</div>'+
                                                    '<div class="bs_inf_jd">'+
                                                        '<h5 class="text-center"> '+value.firstname+' '+value.lastname+'</h5>'+
                                                        '<p><i class="fa fa-phone"> '+value.mobile+'</i></p>'+
                                                    '</div>'+
                                                    
                                                    '<div class="job_desc_box_list">'+
                                                        '<div class="row">'+
                                                            '<div class="col-sm-12 col-xs-12">'+
                                                                '<h5 class="textHead">Location</h5>'+
                                                                '<p>'+value.address.substring(0,100)+'...'+'</p>'+
                                                            '</div>'+

                                                            '<div class="col-sm-12 col-xs-12">'+
                                                                '<h5 class="textHead">Distance <span class="pull-right req_sr_card_dis">25 KM</span> </h5>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+  
                                            '</div>'+
                                        '</div>';
                                        htmlslot += '<div class="col-sm-8 req_sr_card_dt_panel">'+
                                                '<div class="job_desc_box_list">'+
                                                '<div class="sub_ser_box_list">'+
                                                    '<div class="row">'+
                                                        '<div class="col-md-12">'+
                                                            '<div class="job_desc_box_list">'+
                                                                '<div class="title">';
                                                                if(value.amc_type == 0){
                                                                    htmlslot +='<h5>Non-AMC Holder <span class="pull-right srv_name"> </span></h5>';
                                                                }else if(value.amc_type == 1){
                                                                    htmlslot +='<h5>AMC Holder <span class="pull-right srv_name"> </span></h5>';
                                                                }
                                                                    
                                                                htmlslot +='</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                    '<div class="row amc_inf">'+
                                                        '<div class="col-sm-6">'+
                                                            '<h5 class="textHead">Nick Name</h5>'+
                                                            '<p class="pending"> '+value.title+'</p>'+
                                                        '</div>'+
                                                        '<div class="col-sm-6 text-right">'+
                                                            '<h5 class="textHead">Job Status </h5>';
                                                            if(value.status == 3){
                                                            htmlslot +='<p class="pending">Requested</p>';
                                                            }else if(value.status == 4){
                                                            htmlslot +='<p class="text-green">Service Team Alloted</p>';
                                                            }else if(value.status == 5){
                                                            htmlslot +='<p class="text-orange">In Process</p>';
                                                            }else if(value.status == 6){
                                                            htmlslot +='<p class="text-orange">Proposed</p>';
                                                            }else if(value.status == 7){
                                                            htmlslot +='<p class="text-green">Payment Done</p>';
                                                            }else if(value.status == 8){
                                                            htmlslot +='<p class="text-green">Completed</p>';
                                                            }else if(value.status == 9){
                                                            htmlslot +='<p class="text-red">Rejected</p>';
                                                            }
                                                            htmlslot +='</div>'+
                                                    '</div>'+

                                                    '<div class="row amc_inf">'+
                                                        '<div class="col-sm-6">'+
                                                            '<h5 class="textHead">Job Date</h5>'+
                                                            '<p class="pending"> '+dt1+'</p>'+
                                                        '</div>'+
                                                        '<div class="col-sm-6 text-right">'+
                                                            '<h5 class="textHead">Day Slot </h5>'+
                                                            '<p class="pending"> '+value.slot_name+' </p>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>';
                                            if(value.services[0] != ''){
                                            htmlslot += '<div class="job_desc_box_list">'+
                                                '<div class="sub_ser_box_list">'+
                                                    '<div class="title_new">'+
                                                        '<h5>Services'+ 
                                                            '<span class="pending">'+ucwords(strtolower(value.service_type))+' Service</span>'+
                                                        '</h5>'+
                                                    '</div>'+

                                                    '<div class="row">'+
                                                        '<div class="col-md-12">'+
                                                            '<div class="jd_desc_blk" id="style-1">'+
                                                                '<div class="force-overflow">';
                                                                    $.each(value.services, function(index1, value1) {
                                                                    if(value1.jobServices != ''){
                                                                    htmlslot += '<div class="card_main_srv_lst">'+
                                                                        '<div class="row">'+
                                                                            '<div class="col-md-12">'+
                                                                                '<h5 class="textHead mar_bot nm_srv">Service Name : <span class="srv_name">Plumbing</span></h5>'+
                                                                            '</div>'+
                                                                        '</div>'+
                                                                        '<div class="row">'+
                                                                            '<div class="col-md-12">'+
                                                                            '<div class="listSubSr">'+
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
                                                                        '</div>'+
                                                                    '</div>';
                                                                    }
                                                                });
                                                                htmlslot += '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>';
                                                            }
                                        htmlslot += '</div>';
                                            
                                        htmlslot += '</div>';
                                        if(value.group != ''){
                                                var teamleader_image='';
                                                var teamleader_image1 = empurl+ value.group.teamleader_image;
                                                if(value.group.teamleader_image == null || value.group.teamleader_image == ''){
                                                    var teamleader_image = '<img src="'+defaultimg+'" class="img-responsive">';
                                        
                                                }else{
                                                    var teamleader_image = '<img src="'+ teamleader_image1 +'" class="img-responsive">';
                                                
                                                }

                                                var driver_image='';
                                                var driver_image1 = empurl+ value.group.driver_image;
                                                if(value.group.driver_image == null || value.group.driver_image == ''){
                                                    var driver_image = '<img src="'+defaultimg+'" class="img-responsive">';
                                        
                                                }else{
                                                    var driver_image = '<img src="'+ driver_image1 +'" class="img-responsive">';
                                                
                                                }
                                        htmlslot +='<div class="order_history_box">'+
                                        '<div class="row">'+
                                            '<div class="col-md-12">'+
                                                '<div class="header_main_div_sec">'+
                                                    '<div class="title">'+
                                                        '<h5>Alloted Group : <span>'+value.group.group_name+'</span> </h5>'+
                                                    '</div>'+       
                                                '</div>'+
                                            '</div>'+
                                        '<div>'+
                                        
                                        '<div class="row">'+
                                            '<div class="col-md-5">'+
                                                '<div class="row">'+
                                                    '<div class="col-sm-4 col-xs-4">'+
                                                        '<div class="jd_list_cust_img_box">'+
                                                            '<div class="widget_img_box">'+
                                                            ''+teamleader_image+''+
                                                            '</div>'+
                                                        '</div>    '+
                                                    '</div>'+

                                                    '<div class="col-sm-8 col-xs-8">'+
                                                        '<div class="groupListDiv">'+
                                                            '<div class="row">'+
                                                                '<div class="col-sm-12">'+
                                                                    '<h5 class="fontWeight600">'+value.group.teamleader+'  </h5>'+
                                                                    '<p class="fontWeight600">Team Leader</p>'+
                                                                '</div>'+

                                                                '<div class="col-sm-12">'+
                                                                    '<p class="tm_role"> Start Time :<span> Afternoon 1:30 PM</span></p>'+
                                                                '</div>'+

                                                                // '<div class="col-sm-12">'+
                                                                //     '<button type="button" class="btn btn-primary btn-sm btn-small" data-toggle="modal" data-target=".routePlan">Route Plan</button>'+
                                                                // '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>   '+
                                            '</div>'+

                                            '<div class="col-md-2">'+
                                                '<div class="groupListCardDiv" style="padding-top: 4px;">'+
                                                    '<h5>Team Size</h5>'+
                                                    '<div class="teamSize">'+value.group.total_emp+'</div>'+
                                                '</div>'+
                                            '</div>'+

                                            '<div class="col-md-5">'+
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
                                                                    '<p class="tm_role">'+value.group.drivername+' <span> (Driver)</span></p>'+
                                                                    '<p class="vhl_inf">Vehicle No :  '+value.group.vehicle_no+'</p>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+        
                                            '</div>'+

                                        '</div>';
                                    }else{
                                        var teamleader_image='';
                                                var teamleader_image1 = empurl+ value.empIMG;
                                                if(value.empIMG == null || value.empIMG == ''){
                                                    var teamleader_image = '<img src="'+defaultimg+'" class="img-responsive">';
                                        
                                                }else{
                                                    var teamleader_image = '<img src="'+ teamleader_image1 +'" class="img-responsive">';
                                                
                                                }
                                                htmlslot +='<div class="order_history_box">'+
                                                '<div class="row">'+
                                                    '<div class="col-md-12">'+
                                                        '<div class="header_main_div_sec">'+
                                                            '<div class="title">'+
                                                                '<h5>Alloted Individual : <span>'+value.empName+'</span> </h5>'+
                                                            '</div>'+       
                                                        '</div>'+
                                                    '</div>'+
                                                '<div>'+
                                                
                                                '<div class="row">'+
                                                    '<div class="col-md-12">'+
                                                        '<div class="row">'+
                                                            '<div class="col-sm-4 col-xs-4">'+
                                                                '<div class="jd_list_cust_img_box">'+
                                                                    '<div class="widget_img_box">'+
                                                                        ''+teamleader_image+''+
                                                                    '</div>'+
                                                                '</div>'+    
                                                            '</div>'+
    
                                                            '<div class="col-sm-8 col-xs-8">'+
                                                                '<div class="groupListDiv">'+
                                                                    '<div class="row">'+
                                                                        '<div class="col-sm-12">'+
                                                                            '<h5 class="fontWeight600">'+value.empName+'  </h5>'+
                                                                            '<p class="fontWeight600">'+value.employee_role+'</p>'+
                                                                        '</div>'+
    
                                                                        '<div class="col-sm-12">'+
                                                                            '<p class="tm_role"> Start Time :<span> '+value.gp_slot+' '+value.gp_slotstart_time+'</span></p>'+
                                                                        '</div>'+
    
                                                                        // '<div class="col-sm-12">'+
                                                                        //     '<button type="button" class="btn btn-primary btn-sm btn-small" data-toggle="modal" data-target=".routePlan">Route Plan</button>'+
                                                                        // '</div>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+   
                                                    '</div>'+
    
                                                '</div>'+
                                            '</div>';
                                    }
                                    htmlslot +='</div>'+
                                '</div>'+
                            '</div>';
                    }
                    $("#allfilterApply").append(htmlslot);
                });

                }else{
                    $("#allfilterApply").html('');
                    $("#allfilterApply").append('<div class="col-md-12">'+
                        '<div class="order_history_box req_sr_box_main">'+
                                '<h4 class="text-center" >No Record Found on this Date!</h4>'+
                        '</div>'+
                    '</div>');
                } 
                
                }
            });
}


function GetfiltergroupDate(){
    var group_type = $('#group_type2').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    var userurl = "http://3.16.87.53/public/uploads/users/";
    var empurl = "http://3.16.87.53/public/uploads/employees/";
   // alert(date);
    $.ajax({ 
        url: "http://3.16.87.53/admin/orders/filterDropDOwnAjax",
        data: {"group_type":group_type,"service_type":'',"employee_id":'',"vehicle_id":'',"_token":token},
        type: 'post',
        success: function(result) {
        //console.log(result); return false ;
            //console.log(result);
            var json = $.parseJSON(result);
            if(json.length > 0){
                $("#allfilterApply").html('');
                var  flag=false;
                $.each(json, function(index, value) {
                    // do your stuff here
                    flag=false;
                            var user_image='';
                            var usr_image = userurl+ value.profile_pic;
                                    if (value.profile_pic == null){
                                        user_image =  '<img src="'+defaultimg+'" class="img-responsive">'
                                    }else{
                                        user_image =  '<img src="'+ usr_image +'" class="">'
                                    }
                            
                    if(value.index != ''){
                        var dt1 = `${moment(value.job_date).format("DD-MM-YYYY")}`;
                        htmlslot='<div class="col-md-6">'+
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
                                                    ''+user_image+''+
                                                    '</div>'+
                                                    '<div class="bs_inf_jd">'+
                                                        '<h5 class="text-center"> '+value.firstname+' '+value.lastname+'</h5>'+
                                                        '<p><i class="fa fa-phone"> '+value.mobile+'</i></p>'+
                                                    '</div>'+
                                                    
                                                    '<div class="job_desc_box_list">'+
                                                        '<div class="row">'+
                                                            '<div class="col-sm-12 col-xs-12">'+
                                                                '<h5 class="textHead">Location</h5>'+
                                                                '<p>'+value.address.substring(0,100)+'...'+'</p>'+
                                                            '</div>'+

                                                            '<div class="col-sm-12 col-xs-12">'+
                                                                '<h5 class="textHead">Distance <span class="pull-right req_sr_card_dis">25 KM</span> </h5>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+  
                                            '</div>'+
                                        '</div>';
                                        htmlslot += '<div class="col-sm-8 req_sr_card_dt_panel">'+
                                                        '<div class="job_desc_box_list">'+
                                                        '<div class="sub_ser_box_list">'+
                                                            '<div class="row">'+
                                                                '<div class="col-md-12">'+
                                                                    '<div class="job_desc_box_list">'+
                                                                        '<div class="title">';
                                                                        if(value.amc_type == 0){
                                                                            htmlslot +='<h5>Non-AMC Holder <span class="pull-right srv_name"> </span></h5>';
                                                                        }else if(value.amc_type == 1){
                                                                            htmlslot +='<h5>AMC Holder <span class="pull-right srv_name"> </span></h5>';
                                                                        }
                                                                            
                                                                        htmlslot +='</div>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                            '<div class="row amc_inf">'+
                                                                '<div class="col-sm-6">'+
                                                                    '<h5 class="textHead">Nick Name</h5>'+
                                                                    '<p class="pending"> '+value.title+'</p>'+
                                                                '</div>'+
                                                                '<div class="col-sm-6 text-right">'+
                                                                    '<h5 class="textHead">Job Status </h5>';
                                                                    if(value.status == 3){
                                                                    htmlslot +='<p class="pending">Requested</p>';
                                                                    }else if(value.status == 4){
                                                                    htmlslot +='<p class="text-green">Service Team Alloted</p>';
                                                                    }else if(value.status == 5){
                                                                    htmlslot +='<p class="text-orange">In Process</p>';
                                                                    }else if(value.status == 6){
                                                                    htmlslot +='<p class="text-orange">Proposed</p>';
                                                                    }else if(value.status == 7){
                                                                    htmlslot +='<p class="text-green">Payment Done</p>';
                                                                    }else if(value.status == 8){
                                                                    htmlslot +='<p class="text-green">Completed</p>';
                                                                    }
                                                                    htmlslot +='</div>'+
                                                            '</div>'+

                                                            '<div class="row amc_inf">'+
                                                                '<div class="col-sm-6">'+
                                                                    '<h5 class="textHead">Job Date</h5>'+
                                                                    '<p class="pending"> '+dt1+'</p>'+
                                                                '</div>'+
                                                                '<div class="col-sm-6 text-right">'+
                                                                    '<h5 class="textHead">Day Slot </h5>'+
                                                                    '<p class="pending"> '+value.slot_name+' </p>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>';
                                            if(value.services[0] != ''){
                                            htmlslot += '<div class="job_desc_box_list">'+
                                                '<div class="sub_ser_box_list">'+
                                                    '<div class="title_new">'+
                                                        '<h5>Services'+ 
                                                            '<span class="pending">'+ucwords(strtolower(value.service_type))+' Service</span>'+
                                                        '</h5>'+
                                                    '</div>'+

                                                    '<div class="row">'+
                                                        '<div class="col-md-12">'+
                                                            '<div class="jd_desc_blk" id="style-1">'+
                                                                '<div class="force-overflow">';
                                                                    $.each(value.services, function(index1, value1) {
                                                                    if(value1.jobServices != ''){
                                                                    htmlslot += '<div class="card_main_srv_lst">'+
                                                                        '<div class="row">'+
                                                                            '<div class="col-md-12">'+
                                                                                '<h5 class="textHead mar_bot nm_srv">Service Name : <span class="srv_name">Plumbing</span></h5>'+
                                                                            '</div>'+
                                                                        '</div>'+
                                                                        '<div class="row">'+
                                                                            '<div class="col-md-12">'+
                                                                                '<div class="listSubSr">'+
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
                                                                        '</div>'+
                                                                    '</div>';
                                                                    }
                                                                });
                                                                htmlslot += '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>';
                                                            }
                                        htmlslot += '</div>';
                                            
                                        htmlslot += '</div>';
                                        if(value.group != ''){
                                                var teamleader_image='';
                                                var teamleader_image1 = empurl+ value.group.teamleader_image;
                                                if(value.group.teamleader_image == null || value.group.teamleader_image == ''){
                                                    var teamleader_image = '<img src="'+defaultimg+'" class="img-responsive">';
                                        
                                                }else{
                                                    var teamleader_image = '<img src="'+ teamleader_image1 +'" class="img-responsive">';
                                                
                                                }

                                                var driver_image='';
                                                var driver_image1 = empurl+ value.group.driver_image;
                                                if(value.group.driver_image == null || value.group.driver_image == ''){
                                                    var driver_image = '<img src="'+defaultimg+'" class="img-responsive">';
                                        
                                                }else{
                                                    var driver_image = '<img src="'+ driver_image1 +'" class="img-responsive">';
                                                
                                                }
                                        htmlslot +='<div class="order_history_box">'+
                                        '<div class="row">'+
                                            '<div class="col-md-12">'+
                                                '<div class="header_main_div_sec">'+
                                                    '<div class="title">'+
                                                        '<h5>Alloted Group : <span>'+value.group.group_name+'</span> </h5>'+
                                                    '</div>'+       
                                                '</div>'+
                                            '</div>'+
                                        '<div>'+
                                        
                                        '<div class="row">'+
                                            '<div class="col-md-5">'+
                                                '<div class="row">'+
                                                    '<div class="col-sm-4 col-xs-4">'+
                                                        '<div class="jd_list_cust_img_box">'+
                                                            '<div class="widget_img_box">'+
                                                            ''+teamleader_image+''+
                                                            '</div>'+
                                                        '</div>    '+
                                                    '</div>'+

                                                    '<div class="col-sm-8 col-xs-8">'+
                                                        '<div class="groupListDiv">'+
                                                            '<div class="row">'+
                                                                '<div class="col-sm-12">'+
                                                                    '<h5 class="fontWeight600">'+value.group.teamleader+'  </h5>'+
                                                                    '<p class="fontWeight600">Team Leader</p>'+
                                                                '</div>'+

                                                                '<div class="col-sm-12">'+
                                                                    '<p class="tm_role"> Start Time :<span> Afternoon 1:30 PM</span></p>'+
                                                                '</div>'+

                                                                // '<div class="col-sm-12">'+
                                                                //     '<button type="button" class="btn btn-primary btn-sm btn-small" data-toggle="modal" data-target=".routePlan">Route Plan</button>'+
                                                                // '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>   '+
                                            '</div>'+

                                            '<div class="col-md-2">'+
                                                '<div class="groupListCardDiv" style="padding-top: 4px;">'+
                                                    '<h5>Team Size</h5>'+
                                                    '<div class="teamSize">'+value.group.total_emp+'</div>'+
                                                '</div>'+
                                            '</div>'+

                                            '<div class="col-md-5">'+
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
                                                                    '<p class="tm_role">'+value.group.drivername+' <span> (Driver)</span></p>'+
                                                                    '<p class="vhl_inf">Vehicle No :  '+value.group.vehicle_no+'</p>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+        
                                            '</div>'+

                                        '</div>';
                                    }else{
                                        var teamleader_image='';
                                                var teamleader_image1 = empurl+ value.empIMG;
                                                if(value.empIMG == null || value.empIMG == ''){
                                                    var teamleader_image = '<img src="'+defaultimg+'" class="img-responsive">';
                                        
                                                }else{
                                                    var teamleader_image = '<img src="'+ teamleader_image1 +'" class="img-responsive">';
                                                
                                                }
                                                htmlslot +='<div class="order_history_box">'+
                                                '<div class="row">'+
                                                    '<div class="col-md-12">'+
                                                        '<div class="header_main_div_sec">'+
                                                            '<div class="title">'+
                                                                '<h5>Alloted Individual : <span>'+value.empName+'</span> </h5>'+
                                                            '</div>'+       
                                                        '</div>'+
                                                    '</div>'+
                                                '<div>'+
                                                
                                                '<div class="row">'+
                                                    '<div class="col-md-12">'+
                                                        '<div class="row">'+
                                                            '<div class="col-sm-4 col-xs-4">'+
                                                                '<div class="jd_list_cust_img_box">'+
                                                                    '<div class="widget_img_box">'+
                                                                        ''+teamleader_image+''+
                                                                    '</div>'+
                                                                '</div>'+    
                                                            '</div>'+
    
                                                            '<div class="col-sm-8 col-xs-8">'+
                                                                '<div class="groupListDiv">'+
                                                                    '<div class="row">'+
                                                                        '<div class="col-sm-12">'+
                                                                            '<h5 class="fontWeight600">'+value.empName+'  </h5>'+
                                                                            '<p class="fontWeight600">'+value.employee_role+'</p>'+
                                                                        '</div>'+
    
                                                                        '<div class="col-sm-12">'+
                                                                            '<p class="tm_role"> Start Time :<span> '+value.gp_slot+' '+value.gp_slotstart_time+'</span></p>'+
                                                                        '</div>'+
    
                                                                        // '<div class="col-sm-12">'+
                                                                        //     '<button type="button" class="btn btn-primary btn-sm btn-small" data-toggle="modal" data-target=".routePlan">Route Plan</button>'+
                                                                        // '</div>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+   
                                                    '</div>'+
    
                                                '</div>'+
                                            '</div>';
                                    }
                                    htmlslot +='</div>'+
                                '</div>'+
                            '</div>';
                    }
                    $("#allfilterApply").append(htmlslot);
                });

                }else{
                    $("#allfilterApply").html('');
                    $("#allfilterApply").append('<div class="col-md-12">'+
                        '<div class="order_history_box req_sr_box_main">'+
                                '<h4 class="text-center">No Record Found on this Date!</h4>'+
                        '</div>'+
                    '</div>');
                } 
                
                }
            });
}

function GetfilterservtypeDate(){
    var service_type = $('#service_typeIH4').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    var userurl = "http://3.16.87.53/public/uploads/users/";
    var empurl = "http://3.16.87.53/public/uploads/employees/";
   // alert(date);
    $.ajax({ 
        url: "http://3.16.87.53/admin/orders/filterDropDOwnAjax",
        data: {"group_type":'',"service_type":service_type,"employee_id":'',"vehicle_id":'',"_token":token},
        type: 'post',
        success: function(result) {
        //console.log(result); return false ;
            //console.log(result);
            var json = $.parseJSON(result);
            if(json.length > 0){
                $("#allfilterApply").html('');
                var  flag=false;
                $.each(json, function(index, value) {
                    // do your stuff here
                    flag=false;
                            var user_image='';
                            var usr_image = userurl+ value.profile_pic;
                                    if (value.profile_pic == null){
                                        user_image =  '<img src="'+defaultimg+'" class="img-responsive">'
                                    }else{
                                        user_image =  '<img src="'+ usr_image +'" class="">'
                                    }
                            
                    if(value.index != ''){
                        var dt1 = `${moment(value.job_date).format("DD-MM-YYYY")}`;
                        htmlslot='<div class="col-md-6">'+
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
                                                    ''+user_image+''+
                                                    '</div>'+
                                                    '<div class="bs_inf_jd">'+
                                                        '<h5 class="text-center"> '+value.firstname+' '+value.lastname+'</h5>'+
                                                        '<p><i class="fa fa-phone"> '+value.mobile+'</i></p>'+
                                                    '</div>'+
                                                    
                                                    '<div class="job_desc_box_list">'+
                                                        '<div class="row">'+
                                                            '<div class="col-sm-12 col-xs-12">'+
                                                                '<h5 class="textHead">Location</h5>'+
                                                                '<p>'+value.address.substring(0,100)+'...'+'</p>'+
                                                            '</div>'+

                                                            '<div class="col-sm-12 col-xs-12">'+
                                                                '<h5 class="textHead">Distance <span class="pull-right req_sr_card_dis">25 KM</span> </h5>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+  
                                            '</div>'+
                                        '</div>';
                                        htmlslot += '<div class="col-sm-8 req_sr_card_dt_panel">'+
                                                '<div class="job_desc_box_list">'+
                                                '<div class="sub_ser_box_list">'+
                                                    '<div class="row">'+
                                                        '<div class="col-md-12">'+
                                                            '<div class="job_desc_box_list">'+
                                                                '<div class="title">';
                                                                if(value.amc_type == 0){
                                                                    htmlslot +='<h5>Non-AMC Holder <span class="pull-right srv_name"> </span></h5>';
                                                                }else if(value.amc_type == 1){
                                                                    htmlslot +='<h5>AMC Holder <span class="pull-right srv_name"> </span></h5>';
                                                                }
                                                                    
                                                                htmlslot +='</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                    '<div class="row amc_inf">'+
                                                        '<div class="col-sm-6">'+
                                                            '<h5 class="textHead">Nick Name</h5>'+
                                                            '<p class="pending"> '+value.title+'</p>'+
                                                        '</div>'+
                                                        '<div class="col-sm-6 text-right">'+
                                                            '<h5 class="textHead">Job Status </h5>';
                                                            if(value.status == 3){
                                                            htmlslot +='<p class="pending">Requested</p>';
                                                            }else if(value.status == 4){
                                                            htmlslot +='<p class="text-green">Service Team Alloted</p>';
                                                            }else if(value.status == 5){
                                                            htmlslot +='<p class="text-orange">In Process</p>';
                                                            }else if(value.status == 6){
                                                            htmlslot +='<p class="text-orange">Proposed</p>';
                                                            }else if(value.status == 7){
                                                            htmlslot +='<p class="text-green">Payment Done</p>';
                                                            }else if(value.status == 8){
                                                            htmlslot +='<p class="text-green">Completed</p>';
                                                            }
                                                            htmlslot +='</div>'+
                                                    '</div>'+

                                                    '<div class="row amc_inf">'+
                                                        '<div class="col-sm-6">'+
                                                            '<h5 class="textHead">Job Date</h5>'+
                                                            '<p class="pending"> '+dt1+'</p>'+
                                                        '</div>'+
                                                        '<div class="col-sm-6 text-right">'+
                                                            '<h5 class="textHead">Day Slot </h5>'+
                                                            '<p class="pending"> '+value.slot_name+' </p>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>';
                                            if(value.services[0] != ''){
                                            htmlslot += '<div class="job_desc_box_list">'+
                                                '<div class="sub_ser_box_list">'+
                                                    '<div class="title_new">'+
                                                        '<h5>Services'+ 
                                                            '<span class="pending">'+ucwords(strtolower(value.service_type))+' Service</span>'+
                                                        '</h5>'+
                                                    '</div>'+

                                                    '<div class="row">'+
                                                        '<div class="col-md-12">'+
                                                            '<div class="jd_desc_blk" id="style-1">'+
                                                                '<div class="force-overflow">';
                                                                    $.each(value.services, function(index1, value1) {
                                                                    if(value1.jobServices != ''){
                                                                    htmlslot += '<div class="card_main_srv_lst">'+
                                                                        '<div class="row">'+
                                                                            '<div class="col-md-12">'+
                                                                                '<h5 class="textHead mar_bot nm_srv">Service Name : <span class="srv_name">Plumbing</span></h5>'+
                                                                            '</div>'+
                                                                        '</div>'+
                                                                        '<div class="row">'+
                                                                            '<div class="col-md-12">'+
                                                                            '<div class="listSubSr">'+
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
                                                                        '</div>'+
                                                                    '</div>';
                                                                    }
                                                                });
                                                                htmlslot += '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>';
                                                            }
                                        htmlslot += '</div>';
                                            
                                        htmlslot += '</div>';
                                        if(value.group != ''){
                                                var teamleader_image='';
                                                var teamleader_image1 = empurl+ value.group.teamleader_image;
                                                if(value.group.teamleader_image == null || value.group.teamleader_image == ''){
                                                    var teamleader_image = '<img src="'+defaultimg+'" class="img-responsive">';
                                        
                                                }else{
                                                    var teamleader_image = '<img src="'+ teamleader_image1 +'" class="img-responsive">';
                                                
                                                }

                                                var driver_image='';
                                                var driver_image1 = empurl+ value.group.driver_image;
                                                if(value.group.driver_image == null || value.group.driver_image == ''){
                                                    var driver_image = '<img src="'+defaultimg+'" class="img-responsive">';
                                        
                                                }else{
                                                    var driver_image = '<img src="'+ driver_image1 +'" class="img-responsive">';
                                                
                                                }
                                        htmlslot +='<div class="order_history_box">'+
                                        '<div class="row">'+
                                            '<div class="col-md-12">'+
                                                '<div class="header_main_div_sec">'+
                                                    '<div class="title">'+
                                                        '<h5>Alloted Group : <span>'+value.group.group_name+'</span> </h5>'+
                                                    '</div>'+       
                                                '</div>'+
                                            '</div>'+
                                        '<div>'+
                                        
                                        '<div class="row">'+
                                            '<div class="col-md-5">'+
                                                '<div class="row">'+
                                                    '<div class="col-sm-4 col-xs-4">'+
                                                        '<div class="jd_list_cust_img_box">'+
                                                            '<div class="widget_img_box">'+
                                                            ''+teamleader_image+''+
                                                            '</div>'+
                                                        '</div>    '+
                                                    '</div>'+

                                                    '<div class="col-sm-8 col-xs-8">'+
                                                        '<div class="groupListDiv">'+
                                                            '<div class="row">'+
                                                                '<div class="col-sm-12">'+
                                                                    '<h5 class="fontWeight600">'+value.group.teamleader+'  </h5>'+
                                                                    '<p class="fontWeight600">Team Leader</p>'+
                                                                '</div>'+

                                                                '<div class="col-sm-12">'+
                                                                    '<p class="tm_role"> Start Time :<span> Afternoon 1:30 PM</span></p>'+
                                                                '</div>'+

                                                                // '<div class="col-sm-12">'+
                                                                //     '<button type="button" class="btn btn-primary btn-sm btn-small" data-toggle="modal" data-target=".routePlan">Route Plan</button>'+
                                                                // '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>   '+
                                            '</div>'+

                                            '<div class="col-md-2">'+
                                                '<div class="groupListCardDiv" style="padding-top: 4px;">'+
                                                    '<h5>Team Size</h5>'+
                                                    '<div class="teamSize">'+value.group.total_emp+'</div>'+
                                                '</div>'+
                                            '</div>'+

                                            '<div class="col-md-5">'+
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
                                                                    '<p class="tm_role">'+value.group.drivername+' <span> (Driver)</span></p>'+
                                                                    '<p class="vhl_inf">Vehicle No :  '+value.group.vehicle_no+'</p>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+        
                                            '</div>'+

                                        '</div>';
                                    }else{
                                        var teamleader_image='';
                                                var teamleader_image1 = empurl+ value.empIMG;
                                                if(value.empIMG == null || value.empIMG == ''){
                                                    var teamleader_image = '<img src="'+defaultimg+'" class="img-responsive">';
                                        
                                                }else{
                                                    var teamleader_image = '<img src="'+ teamleader_image1 +'" class="img-responsive">';
                                                
                                                }
                                                htmlslot +='<div class="order_history_box">'+
                                                '<div class="row">'+
                                                    '<div class="col-md-12">'+
                                                        '<div class="header_main_div_sec">'+
                                                            '<div class="title">'+
                                                                '<h5>Alloted Individual : <span>'+value.empName+'</span> </h5>'+
                                                            '</div>'+       
                                                        '</div>'+
                                                    '</div>'+
                                                '<div>'+
                                                
                                                '<div class="row">'+
                                                    '<div class="col-md-12">'+
                                                        '<div class="row">'+
                                                            '<div class="col-sm-4 col-xs-4">'+
                                                                '<div class="jd_list_cust_img_box">'+
                                                                    '<div class="widget_img_box">'+
                                                                        ''+teamleader_image+''+
                                                                    '</div>'+
                                                                '</div>'+    
                                                            '</div>'+
    
                                                            '<div class="col-sm-8 col-xs-8">'+
                                                                '<div class="groupListDiv">'+
                                                                    '<div class="row">'+
                                                                        '<div class="col-sm-12">'+
                                                                            '<h5 class="fontWeight600">'+value.empName+'  </h5>'+
                                                                            '<p class="fontWeight600">'+value.employee_role+'</p>'+
                                                                        '</div>'+
    
                                                                        '<div class="col-sm-12">'+
                                                                            '<p class="tm_role"> Start Time :<span> '+value.gp_slot+' '+value.gp_slotstart_time+'</span></p>'+
                                                                        '</div>'+
    
                                                                        // '<div class="col-sm-12">'+
                                                                        //     '<button type="button" class="btn btn-primary btn-sm btn-small" data-toggle="modal" data-target=".routePlan">Route Plan</button>'+
                                                                        // '</div>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+   
                                                    '</div>'+
    
                                                '</div>'+
                                            '</div>';
                                    }
                                    htmlslot +='</div>'+
                                '</div>'+
                            '</div>';
                    }
                    $("#allfilterApply").append(htmlslot);
                });

                }else{
                    $("#allfilterApply").html('');
                    $("#allfilterApply").append('<div class="col-md-12">'+
                        '<div class="order_history_box req_sr_box_main">'+
                                '<h4 class="text-center">No Record Found on this Date!</h4>'+
                        '</div>'+
                    '</div>');
                } 
                
                }
            });
}

function GetfilterTeamLead(){
    var employee_id = $('#employeeIsd4').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    var userurl = "http://3.16.87.53/public/uploads/users/";
    var empurl = "http://3.16.87.53/public/uploads/employees/";
   // alert(date);
    $.ajax({ 
        url: "http://3.16.87.53/admin/orders/filterDropDOwnAjax",
        data: {"group_type":'',"service_type":'',"employee_id":employee_id,"vehicle_id":'',"_token":token},
        type: 'post',
        success: function(result) {
        //console.log(result); return false ;
            //console.log(result);
            var json = $.parseJSON(result);
            if(json.length > 0){
                $("#allfilterApply").html('');
                var  flag=false;
                $.each(json, function(index, value) {
                    // do your stuff here
                    flag=false;
                            var user_image='';
                            var usr_image = userurl+ value.profile_pic;
                                    if (value.profile_pic == null){
                                        user_image =  '<img src="'+defaultimg+'" class="img-responsive">'
                                    }else{
                                        user_image =  '<img src="'+ usr_image +'" class="">'
                                    }
                           
                    if(value.index != ''){
                        var dt1 = `${moment(value.job_date).format("DD-MM-YYYY")}`;
                        htmlslot='<div class="col-md-6">'+
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
                                                    ''+user_image+''+
                                                    '</div>'+
                                                    '<div class="bs_inf_jd">'+
                                                        '<h5 class="text-center"> '+value.firstname+' '+value.lastname+'</h5>'+
                                                        '<p><i class="fa fa-phone"> '+value.mobile+'</i></p>'+
                                                    '</div>'+
                                                    
                                                    '<div class="job_desc_box_list">'+
                                                        '<div class="row">'+
                                                            '<div class="col-sm-12 col-xs-12">'+
                                                                '<h5 class="textHead">Location</h5>'+
                                                                '<p>'+value.address.substring(0,100)+'...'+'</p>'+
                                                            '</div>'+

                                                            '<div class="col-sm-12 col-xs-12">'+
                                                                '<h5 class="textHead">Distance <span class="pull-right req_sr_card_dis">25 KM</span> </h5>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+  
                                            '</div>'+
                                        '</div>';
                                    if(value.surveyerdetail != ''){
                                        htmlslot += '<div class="col-sm-8 req_sr_card_dt_panel">'+
                                                    '<div class="job_desc_box_list">'+
                                                    '<div class="sub_ser_box_list">'+
                                                        '<div class="row">'+
                                                            '<div class="col-md-12">'+
                                                                '<div class="job_desc_box_list">'+
                                                                    '<div class="title">';
                                                                    if(value.amc_type == 0){
                                                                        htmlslot +='<h5>Non-AMC Holder <span class="pull-right srv_name"> </span></h5>';
                                                                    }else if(value.amc_type == 1){
                                                                        htmlslot +='<h5>AMC Holder <span class="pull-right srv_name"> </span></h5>';
                                                                    }
                                                                        
                                                                    htmlslot +='</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="row amc_inf">'+
                                                            '<div class="col-sm-6">'+
                                                                '<h5 class="textHead">Nick Name</h5>'+
                                                                '<p class="pending"> '+value.title+'</p>'+
                                                            '</div>'+
                                                            '<div class="col-sm-6 text-right">'+
                                                                '<h5 class="textHead">Job Status </h5>';
                                                                if(value.status == 3){
                                                                htmlslot +='<p class="pending">Requested</p>';
                                                                }else if(value.status == 4){
                                                                htmlslot +='<p class="text-green">Service Team Alloted</p>';
                                                                }else if(value.status == 5){
                                                                htmlslot +='<p class="text-orange">In Process</p>';
                                                                }else if(value.status == 6){
                                                                htmlslot +='<p class="text-orange">Proposed</p>';
                                                                }else if(value.status == 7){
                                                                htmlslot +='<p class="text-green">Payment Done</p>';
                                                                }else if(value.status == 8){
                                                                htmlslot +='<p class="text-green">Completed</p>';
                                                                }
                                                                htmlslot +='</div>'+
                                                        '</div>'+

                                                        '<div class="row amc_inf">'+
                                                            '<div class="col-sm-6">'+
                                                                '<h5 class="textHead">Job Date</h5>'+
                                                                '<p class="pending"> '+dt1+'</p>'+
                                                            '</div>'+
                                                            '<div class="col-sm-6 text-right">'+
                                                                '<h5 class="textHead">Day Slot </h5>'+
                                                                '<p class="pending"> '+value.slot_name+' </p>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>';
                                            if(value.services[0] != ''){
                                            htmlslot += '<div class="job_desc_box_list">'+
                                                '<div class="sub_ser_box_list">'+
                                                    '<div class="title_new">'+
                                                        '<h5>Services'+ 
                                                            '<span class="pending">'+ucwords(strtolower(value.service_type))+' Service</span>'+
                                                        '</h5>'+
                                                    '</div>'+

                                                    '<div class="row">'+
                                                        '<div class="col-md-12">'+
                                                            '<div class="jd_desc_blk" id="style-1">'+
                                                                '<div class="force-overflow">';
                                                                    $.each(value.services, function(index1, value1) {
                                                                    if(value1.jobServices != ''){
                                                                    htmlslot += '<div class="card_main_srv_lst">'+
                                                                        '<div class="row">'+
                                                                            '<div class="col-md-12">'+
                                                                                '<h5 class="textHead mar_bot nm_srv">Service Name : <span class="srv_name">Plumbing</span></h5>'+
                                                                            '</div>'+
                                                                        '</div>'+
                                                                        '<div class="row">'+
                                                                            '<div class="col-md-12">'+
                                                                            '<div class="listSubSr">'+
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
                                                                        '</div>'+
                                                                    '</div>';
                                                                    }
                                                                });
                                                                htmlslot += '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>';
                                                            }
                                        htmlslot += '</div>';
                                            }
                                        htmlslot += '</div>';
                                        if(value.group != ''){
                                                var teamleader_image='';
                                                var teamleader_image1 = empurl+ value.group.teamleader_image;
                                                if(value.group.teamleader_image == null || value.group.teamleader_image == ''){
                                                    var teamleader_image = '<img src="'+defaultimg+'" class="img-responsive">';
                                        
                                                }else{
                                                    var teamleader_image = '<img src="'+ teamleader_image1 +'" class="img-responsive">';
                                                
                                                }

                                                var driver_image='';
                                                var driver_image1 = empurl+ value.group.driver_image;
                                                if(value.group.driver_image == null || value.group.driver_image == ''){
                                                    var driver_image = '<img src="'+defaultimg+'" class="img-responsive">';
                                        
                                                }else{
                                                    var driver_image = '<img src="'+ driver_image1 +'" class="img-responsive">';
                                                
                                                }
                                        htmlslot +='<div class="order_history_box">'+
                                        '<div class="row">'+
                                            '<div class="col-md-12">'+
                                                '<div class="header_main_div_sec">'+
                                                    '<div class="title">'+
                                                        '<h5>Alloted Group : <span>'+value.group.group_name+'</span> </h5>'+
                                                    '</div>'+       
                                                '</div>'+
                                            '</div>'+
                                        '<div>'+
                                        
                                        '<div class="row">'+
                                            '<div class="col-md-5">'+
                                                '<div class="row">'+
                                                    '<div class="col-sm-4 col-xs-4">'+
                                                        '<div class="jd_list_cust_img_box">'+
                                                            '<div class="widget_img_box">'+
                                                            ''+teamleader_image+''+
                                                            '</div>'+
                                                        '</div>    '+
                                                    '</div>'+

                                                    '<div class="col-sm-8 col-xs-8">'+
                                                        '<div class="groupListDiv">'+
                                                            '<div class="row">'+
                                                                '<div class="col-sm-12">'+
                                                                    '<h5 class="fontWeight600">'+value.group.teamleader+'  </h5>'+
                                                                    '<p class="fontWeight600">Team Leader</p>'+
                                                                '</div>'+

                                                                '<div class="col-sm-12">'+
                                                                    '<p class="tm_role"> Start Time :<span> Afternoon 1:30 PM</span></p>'+
                                                                '</div>'+

                                                                // '<div class="col-sm-12">'+
                                                                //     '<button type="button" class="btn btn-primary btn-sm btn-small" data-toggle="modal" data-target=".routePlan">Route Plan</button>'+
                                                                // '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>   '+
                                            '</div>'+

                                            '<div class="col-md-2">'+
                                                '<div class="groupListCardDiv" style="padding-top: 4px;">'+
                                                    '<h5>Team Size</h5>'+
                                                    '<div class="teamSize">'+value.group.total_emp+'</div>'+
                                                '</div>'+
                                            '</div>'+

                                            '<div class="col-md-5">'+
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
                                                                    '<p class="tm_role">'+value.group.drivername+' <span> (Driver)</span></p>'+
                                                                    '<p class="vhl_inf">Vehicle No :  '+value.group.vehicle_no+'</p>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+        
                                            '</div>'+

                                        '</div>';
                                    }else{
                                        var teamleader_image='';
                                                var teamleader_image1 = empurl+ value.empIMG;
                                                if(value.empIMG == null || value.empIMG == ''){
                                                    var teamleader_image = '<img src="'+defaultimg+'" class="img-responsive">';
                                        
                                                }else{
                                                    var teamleader_image = '<img src="'+ teamleader_image1 +'" class="img-responsive">';
                                                
                                                }
                                                htmlslot +='<div class="order_history_box">'+
                                                '<div class="row">'+
                                                    '<div class="col-md-12">'+
                                                        '<div class="header_main_div_sec">'+
                                                            '<div class="title">'+
                                                                '<h5>Alloted Individual : <span>'+value.empName+'</span> </h5>'+
                                                            '</div>'+       
                                                        '</div>'+
                                                    '</div>'+
                                                '<div>'+
                                                
                                                '<div class="row">'+
                                                    '<div class="col-md-12">'+
                                                        '<div class="row">'+
                                                            '<div class="col-sm-4 col-xs-4">'+
                                                                '<div class="jd_list_cust_img_box">'+
                                                                    '<div class="widget_img_box">'+
                                                                        ''+teamleader_image+''+
                                                                    '</div>'+
                                                                '</div>'+    
                                                            '</div>'+
    
                                                            '<div class="col-sm-8 col-xs-8">'+
                                                                '<div class="groupListDiv">'+
                                                                    '<div class="row">'+
                                                                        '<div class="col-sm-12">'+
                                                                            '<h5 class="fontWeight600">'+value.empName+'  </h5>'+
                                                                            '<p class="fontWeight600">'+value.employee_role+'</p>'+
                                                                        '</div>'+
    
                                                                        '<div class="col-sm-12">'+
                                                                            '<p class="tm_role"> Start Time :<span> '+value.gp_slot+' '+value.gp_slotstart_time+'</span></p>'+
                                                                        '</div>'+
    
                                                                        // '<div class="col-sm-12">'+
                                                                        //     '<button type="button" class="btn btn-primary btn-sm btn-small" data-toggle="modal" data-target=".routePlan">Route Plan</button>'+
                                                                        // '</div>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+   
                                                    '</div>'+
    
                                                '</div>'+
                                            '</div>';
                                    }
                                    htmlslot +='</div>'+
                                '</div>'+
                            '</div>';
                    }
                    $("#allfilterApply").append(htmlslot);
                });

                }else{
                    $("#allfilterApply").html('');
                    $("#allfilterApply").append('<div class="col-md-12">'+
                        '<div class="order_history_box req_sr_box_main">'+
                                '<h4 class="text-center">No Record Found on this Date!</h4>'+
                        '</div>'+
                    '</div>');
                } 
                
                }
            });
}

function GetfilterVehicle(){
    var vehicle_no = $('#vehicleIds1').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    var userurl = "http://3.16.87.53/public/uploads/users/";
    var empurl = "http://3.16.87.53/public/uploads/employees/";
   // alert(date);
    $.ajax({ 
        url: "http://3.16.87.53/admin/orders/filterDropDOwnAjax",
        data: {"group_type":'',"service_type":'',"employee_id":'',"vehicle_id":vehicle_no,"_token":token},
        type: 'post',
        success: function(result) {
        //console.log(result); return false ;
            //console.log(result);
            var json = $.parseJSON(result);
            $('#totalapproved1').html('');
            $('#totalapproved1').html('Total Orders : '+json.length+'');
            if(json.length > 0){
                $("#allfilterApply").html('');
                var  flag=false;
                $.each(json, function(index, value) {
                    // do your stuff here
                    flag=false;
                            var user_image='';
                            var usr_image = userurl+ value.profile_pic;
                                    if (value.profile_pic == null){
                                        user_image =  '<img src="'+defaultimg+'" class="img-responsive">'
                                    }else{
                                        user_image =  '<img src="'+ usr_image +'" class="">'
                                    }
                            
                    if(value.index != ''){
                        var dt1 = `${moment(value.job_date).format("DD-MM-YYYY")}`;
                        htmlslot='<div class="col-md-6">'+
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
                                                    ''+user_image+''+
                                                    '</div>'+
                                                    '<div class="bs_inf_jd">'+
                                                        '<h5 class="text-center"> '+value.firstname+' '+value.lastname+'</h5>'+
                                                        '<p><i class="fa fa-phone"> '+value.mobile+'</i></p>'+
                                                    '</div>'+
                                                    
                                                    '<div class="job_desc_box_list">'+
                                                        '<div class="row">'+
                                                            '<div class="col-sm-12 col-xs-12">'+
                                                                '<h5 class="textHead">Location</h5>'+
                                                                '<p>'+value.address.substring(0,100)+'...'+'</p>'+
                                                            '</div>'+

                                                            '<div class="col-sm-12 col-xs-12">'+
                                                                '<h5 class="textHead">Distance <span class="pull-right req_sr_card_dis">25 KM</span> </h5>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+  
                                            '</div>'+
                                        '</div>';
                                    if(value.surveyerdetail != ''){
                                        htmlslot += '<div class="col-sm-8 req_sr_card_dt_panel">'+
                                                '<div class="job_desc_box_list">'+
                                                '<div class="sub_ser_box_list">'+
                                                    '<div class="row">'+
                                                        '<div class="col-md-12">'+
                                                            '<div class="job_desc_box_list">'+
                                                                '<div class="title">';
                                                                if(value.amc_type == 0){
                                                                    htmlslot +='<h5>Non-AMC Holder <span class="pull-right srv_name"> </span></h5>';
                                                                }else if(value.amc_type == 1){
                                                                    htmlslot +='<h5>AMC Holder <span class="pull-right srv_name"> </span></h5>';
                                                                }
                                                                    
                                                                htmlslot +='</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                    '<div class="row amc_inf">'+
                                                        '<div class="col-sm-6">'+
                                                            '<h5 class="textHead">Nick Name</h5>'+
                                                            '<p class="pending"> '+value.title+'</p>'+
                                                        '</div>'+
                                                        '<div class="col-sm-6 text-right">'+
                                                            '<h5 class="textHead">Job Status </h5>';
                                                            if(value.status == 3){
                                                            htmlslot +='<p class="pending">Requested</p>';
                                                            }else if(value.status == 4){
                                                            htmlslot +='<p class="text-green">Service Team Alloted</p>';
                                                            }else if(value.status == 5){
                                                            htmlslot +='<p class="text-orange">In Process</p>';
                                                            }else if(value.status == 6){
                                                            htmlslot +='<p class="text-orange">Proposed</p>';
                                                            }else if(value.status == 7){
                                                            htmlslot +='<p class="text-green">Payment Done</p>';
                                                            }else if(value.status == 8){
                                                            htmlslot +='<p class="text-green">Completed</p>';
                                                            }
                                                            htmlslot +='</div>'+
                                                    '</div>'+

                                                    '<div class="row amc_inf">'+
                                                        '<div class="col-sm-6">'+
                                                            '<h5 class="textHead">Job Date</h5>'+
                                                            '<p class="pending"> '+dt1+'</p>'+
                                                        '</div>'+
                                                        '<div class="col-sm-6 text-right">'+
                                                            '<h5 class="textHead">Day Slot </h5>'+
                                                            '<p class="pending"> '+value.slot_name+' </p>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>';
                                            if(value.services[0] != ''){
                                            htmlslot += '<div class="job_desc_box_list">'+
                                                '<div class="sub_ser_box_list">'+
                                                    '<div class="title_new">'+
                                                        '<h5>Services'+ 
                                                            '<span class="pending">'+ucwords(strtolower(value.service_type))+' Service</span>'+
                                                        '</h5>'+
                                                    '</div>'+

                                                    '<div class="row">'+
                                                        '<div class="col-md-12">'+
                                                            '<div class="jd_desc_blk" id="style-1">'+
                                                                '<div class="force-overflow">';
                                                                    $.each(value.services, function(index1, value1) {
                                                                    if(value1.jobServices != ''){
                                                                    htmlslot += '<div class="card_main_srv_lst">'+
                                                                        '<div class="row">'+
                                                                            '<div class="col-md-12">'+
                                                                                '<h5 class="textHead mar_bot nm_srv">Service Name : <span class="srv_name">Plumbing</span></h5>'+
                                                                            '</div>'+
                                                                        '</div>'+
                                                                        '<div class="row">'+
                                                                            '<div class="col-md-12">'+
                                                                            '<div class="listSubSr">'+
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
                                                                        '</div>'+
                                                                    '</div>';
                                                                    }
                                                                });
                                                                htmlslot += '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>';
                                                            }
                                        htmlslot += '</div>';
                                            }
                                        htmlslot += '</div>';
                                        if(value.group != ''){
                                                var teamleader_image='';
                                                var teamleader_image1 = empurl+ value.group.teamleader_image;
                                                if(value.group.teamleader_image == null || value.group.teamleader_image == ''){
                                                    var teamleader_image = '<img src="'+defaultimg+'" class="img-responsive">';
                                        
                                                }else{
                                                    var teamleader_image = '<img src="'+ teamleader_image1 +'" class="img-responsive">';
                                                
                                                }

                                                var driver_image='';
                                                var driver_image1 = empurl+ value.group.driver_image;
                                                if(value.group.driver_image == null || value.group.driver_image == ''){
                                                    var driver_image = '<img src="'+defaultimg+'" class="img-responsive">';
                                        
                                                }else{
                                                    var driver_image = '<img src="'+ driver_image1 +'" class="img-responsive">';
                                                
                                                }
                                        htmlslot +='<div class="order_history_box">'+
                                        '<div class="row">'+
                                            '<div class="col-md-12">'+
                                                '<div class="header_main_div_sec">'+
                                                    '<div class="title">'+
                                                        '<h5>Alloted Group : <span>'+value.group.group_name+'</span> </h5>'+
                                                    '</div>'+       
                                                '</div>'+
                                            '</div>'+
                                        '<div>'+
                                        
                                        '<div class="row">'+
                                            '<div class="col-md-5">'+
                                                '<div class="row">'+
                                                    '<div class="col-sm-4 col-xs-4">'+
                                                        '<div class="jd_list_cust_img_box">'+
                                                            '<div class="widget_img_box">'+
                                                            ''+teamleader_image+''+
                                                            '</div>'+
                                                        '</div>    '+
                                                    '</div>'+

                                                    '<div class="col-sm-8 col-xs-8">'+
                                                        '<div class="groupListDiv">'+
                                                            '<div class="row">'+
                                                                '<div class="col-sm-12">'+
                                                                    '<h5 class="fontWeight600">'+value.group.teamleader+'  </h5>'+
                                                                    '<p class="fontWeight600">Team Leader</p>'+
                                                                '</div>'+

                                                                '<div class="col-sm-12">'+
                                                                    '<p class="tm_role"> Start Time :<span> Afternoon 1:30 PM</span></p>'+
                                                                '</div>'+

                                                                // '<div class="col-sm-12">'+
                                                                //     '<button type="button" class="btn btn-primary btn-sm btn-small" data-toggle="modal" data-target=".routePlan">Route Plan</button>'+
                                                                // '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>   '+
                                            '</div>'+

                                            '<div class="col-md-2">'+
                                                '<div class="groupListCardDiv" style="padding-top: 4px;">'+
                                                    '<h5>Team Size</h5>'+
                                                    '<div class="teamSize">'+value.group.total_emp+'</div>'+
                                                '</div>'+
                                            '</div>'+

                                            '<div class="col-md-5">'+
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
                                                                    '<p class="tm_role">'+value.group.drivername+' <span> (Driver)</span></p>'+
                                                                    '<p class="vhl_inf">Vehicle No :  '+value.group.vehicle_no+'</p>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+        
                                            '</div>'+

                                        '</div>';
                                    }else{
                                        var teamleader_image='';
                                                var teamleader_image1 = empurl+ value.empIMG;
                                                if(value.empIMG == null || value.empIMG == ''){
                                                    var teamleader_image = '<img src="'+defaultimg+'" class="img-responsive">';
                                        
                                                }else{
                                                    var teamleader_image = '<img src="'+ teamleader_image1 +'" class="img-responsive">';
                                                
                                                }
                                                htmlslot +='<div class="order_history_box">'+
                                                '<div class="row">'+
                                                    '<div class="col-md-12">'+
                                                        '<div class="header_main_div_sec">'+
                                                            '<div class="title">'+
                                                                '<h5>Alloted Individual : <span>'+value.empName+'</span> </h5>'+
                                                            '</div>'+       
                                                        '</div>'+
                                                    '</div>'+
                                                '<div>'+
                                                
                                                '<div class="row">'+
                                                    '<div class="col-md-12">'+
                                                        '<div class="row">'+
                                                            '<div class="col-sm-4 col-xs-4">'+
                                                                '<div class="jd_list_cust_img_box">'+
                                                                    '<div class="widget_img_box">'+
                                                                        ''+teamleader_image+''+
                                                                    '</div>'+
                                                                '</div>'+    
                                                            '</div>'+
    
                                                            '<div class="col-sm-8 col-xs-8">'+
                                                                '<div class="groupListDiv">'+
                                                                    '<div class="row">'+
                                                                        '<div class="col-sm-12">'+
                                                                            '<h5 class="fontWeight600">'+value.empName+'  </h5>'+
                                                                            '<p class="fontWeight600">'+value.employee_role+'</p>'+
                                                                        '</div>'+
    
                                                                        '<div class="col-sm-12">'+
                                                                            '<p class="tm_role"> Start Time :<span> '+value.gp_slot+' '+value.gp_slotstart_time+'</span></p>'+
                                                                        '</div>'+
    
                                                                        // '<div class="col-sm-12">'+
                                                                        //     '<button type="button" class="btn btn-primary btn-sm btn-small" data-toggle="modal" data-target=".routePlan">Route Plan</button>'+
                                                                        // '</div>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+   
                                                    '</div>'+
    
                                                '</div>'+
                                            '</div>';
                                    }
                                    htmlslot +='</div>'+
                                '</div>'+
                            '</div>';
                    }
                    $("#allfilterApply").append(htmlslot);
                });

                }else{
                    $("#allfilterApply").html('');
                    $("#allfilterApply").append('<div class="col-md-12">'+
                        '<div class="order_history_box req_sr_box_main">'+
                                '<h4 class="text-center">No Record Found on this Date!</h4>'+
                        '</div>'+
                    '</div>');
                } 
                
                }
            });
}


/** filter on approved order */
function Getfilterservtype(){
    var service_type = $('#service_typeIH4').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    var userurl = "http://3.16.87.53/public/uploads/users/";
    var empurl = "http://3.16.87.53/public/uploads/employees/";
   // alert(date);
    $.ajax({ 
        url: "http://3.16.87.53/admin/orders/filterDropDOwnAjax",
        data: {"group_type":'',"service_type":service_type,"employee_id":'',"vehicle_id":'',"_token":token},
        type: 'post',
        success: function(result) {
        //console.log(result); return false ;
            
            var json = $.parseJSON(result);
            //console.log(json);
           // $("#jobdt23").html( '' );
                $("#totalapproved1").html('');
                $("#totalapproved1").html('Total Orders : '+json.length+'');
            if(json.length > 0){
                $("#approvedJObsdata1").html('');
                var  flag=false;
                $.each(json, function(index, value) {
                        flag=false;
                        var user_image='';
                        var usr_image = userurl+ value.profile_pic;
                                if (value.profile_pic == null){
                                    user_image =  '<img src="'+defaultimg+'" class="">'
                                }else{
                                    user_image =  '<img src="'+ usr_image +'" class="">'
                                }

                        var alloted_group = '';
                        if(value.group_name != '' && value.group_name != null){
                            var alloted_group = '<button type="button" class="btn btn-primary btn-cons" >Alloted Group: '+value.group_name+'</button>';
                
                        }else{
                            var alloted_group = '<button type="button" class="btn btn-primary btn-cons" data-toggle="modal" data-jobId="'+value.id+'" onclick="allotgroup('+value.id+')" data-target=".allotGroup">Allot By Group</button>'+
                                                 '<button type="button" class="btn btn-info btn-cons" data-toggle="modal" data-jobId="'+value.id+'" onclick="allotgroup('+value.id+')" data-target=".individualOrders">Allot individual</button>';
                        
                        }
                          if(value.index != ''){
                            var dt1 = `${moment(value.job_date).format("DD-MM-YYYY")}`;
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
                                                        ''+user_image+''+
                                                    '</div>'+
                                                    '<div class="bs_inf_jd">'+
                                                        '<h5 class="text-center"> '+value.firstname+' '+value.lastname+'</h5>'+
                                                        '<p><i class="fa fa-phone"> '+value.mobile+'</i></p>'+
                                                    '</div>'+
                                                    
                                                    '<div class="job_desc_box_list">'+
                                                        '<div class="row">'+
                                                            '<div class="col-sm-12 col-xs-12">'+
                                                                '<h5 class="textHead">Location</h5>'+
                                                                '<p>'+value.address.substring(0,38)+'...'+'</p>'+
                                                            '</div>'+

                                                            '<div class="col-sm-12 col-xs-12">'+
                                                                '<h5 class="textHead">Distance <span class="pull-right req_sr_card_dis">25 KM</span> </h5>'+
                                                            '</div>'+
                                                        '</div>'+    
                                                    '</div>'+
                                                '</div>'+  
                                            '</div>'+
                                        '</div>'+

                                        '<div class="col-sm-8 req_sr_card_dt_panel">'+
                                            '<div class="job_desc_box_list">'+
                                                '<div class="sub_ser_box_list">'+
                                                    '<div class="row">'+
                                                        '<div class="col-md-12">'+
                                                            '<div class="job_desc_box_list">'+
                                                                '<div class="title">';
                                                                    if(value.amc_type == 0){
                                                                        htmlslot +='<h5>Non-AMC Holder <span class="pull-right srv_name"> </span></h5>';
                                                                    }else if(value.amc_type == 1){
                                                                        htmlslot +='<h5>AMC Holder <span class="pull-right srv_name"> </span></h5>';
                                                                    }
                                                                htmlslot +='</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+

                                                    '<div class="row amc_inf">'+
                                                        '<div class="col-sm-6">'+
                                                            '<h5 class="textHead">Nick Name</h5>'+
                                                            '<p class="pending"> '+value.title+'</p>'+
                                                        '</div>'+

                                                        '<div class="col-sm-6 text-right">'+
                                                            '<h5 class="textHead">Job Status </h5>';
                                                            if(value.status == 3){
                                                            htmlslot +='<p class="pending">Requested</p>';
                                                            }else if(value.status == 4){
                                                            htmlslot +='<p class="text-green">Service Team Alloted</p>';
                                                            }else if(value.status == 5){
                                                            htmlslot +='<p class="text-orange">In Process</p>';
                                                            }else if(value.status == 6){
                                                            htmlslot +='<p class="text-orange">Proposed</p>';
                                                            }else if(value.status == 7){
                                                            htmlslot +='<p class="text-green">Payment Done</p>';
                                                            }else if(value.status == 8){
                                                            htmlslot +='<p class="text-green">Completed</p>';
                                                            }
                                                            htmlslot +='</div>'+
                                                    '</div>'+

                                                    '<div class="row amc_inf">'+
                                                        '<div class="col-sm-6">'+
                                                            '<h5 class="textHead">Job Date</h5>'+
                                                            '<p class="pending"> '+dt1+'</p>'+
                                                        '</div>'+
                                                        '<div class="col-sm-6 text-right">'+
                                                            '<h5 class="textHead">Day Slot </h5>'+
                                                            '<p class="pending"> '+value.slot_name+' </p>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>';
                                   
                                            if(value.services[0] != ''){
                                                htmlslot += '<div class="job_desc_box_list">'+
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
                                                                                        if(value1.jobServices){
                                                                                            htmlslot += '<div class="card_main_srv_lst">'+
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
                                                                                }
                                                                });
                                                        htmlslot +='</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+

                                                '</div>'+
                                            '</div>';
                                    }
                            htmlslot += '</div>'+
                                    '</div>'+

                                    '<div class="row">'+
                                        '<div class="col-md-12">'+
                                            ''+alloted_group+'';
                                            if(value.status == 4){
                                                htmlslot +='<a href="#" class="btn btn-danger btn-cons pull-right">No Job Card</a>';
                                            }
                                            if(value.status == 5){
                                                htmlslot +='<a href="http://3.16.87.53/admin/orders/orderDetails/'+value.id+'" class="btn btn-danger btn-cons pull-right">View Job Card</a>';
                                            }
                                            if(value.status == 6){
                                                htmlslot +='<a href="http://3.16.87.53/admin/orders/viewProposal/'+value.id+'" class="btn btn-danger btn-cons pull-right">Proposed</a>';
                                            }
                                            if(value.status == 8){
                                                htmlslot+='<a href="#" class="btn btn-success btn-cons pull-right">Completed</a>';
                                            }
                                            htmlslot +='</div>'+
                                    '</div>'+
                                    
                                '</div>'+
                            '</div>';

                            }
                            $("#approvedJObsdata1").append(htmlslot);
                    });

                }else{
                    $("#approvedJObsdata1").html('');
                    $("#approvedJObsdata1").append('<div class="col-md-12">'+
                        '<div class="order_history_box req_sr_box_main">'+
                                '<h4 class="text-center">No Record Found on this Date!</h4>'+
                        '</div>'+
                    '</div>');
                } 
                
                }
            });
}
/** all Filter on all Orders page end */


/*---Assign Surveyor Acc to date---*/
function showddt(id){
    // var job_id = $(this).attr("job_id");
    $("#jobId").val(id); 
  // console.log(id);
 }
 
 $('.input-append.date').datepicker().on('changeDate', function() {
   var temp = $(this).datepicker('getDate');
   var d = new Date(temp);
   var date = d.toLocaleDateString();
   
   //console.log(date);
  // alert(date);
        // var date = $(this).attr("data-date");
                     var token = $('meta[name="csrf-token"]').attr('content');
                     //alert(date);
                     $.ajax({ 
                         url: "http://3.16.87.53/admin/surveyers/getAllSurveyerSlotAjax",
                         data: {"date":date,"_token":token},
                         type: 'post',
                         success: function(result) {
                             var json = $.parseJSON(result);
                             if(json != ''){
                                var htmlslot;
                              var  flag=false;
                                 if(json.message != undefined){
                                     $("#srv_slot_datadt1").html(' ');
                                     $("#srv_slot_datadt1").html(' '+json.message+' ');
                                 }else{
                                     //console.log(json);
                                     $("#srv_slot_datadt1").html(' ');
                                     $.each(json, function(index, value) {
                                         flag=false;
                                         if(value.button != ''){
                                             var str_button = '<button type="button" class="blockDate ">Blocked</button>';
                                         }else{
                                             var str_button = '<button type="button" class="availableSlot">Available</button>';
                                         }
                                             if(value.index != ''){
                                                 
                                                 htmlslot='<div class="sub_ser_box_list">'+
                                                                     '<div class="row" id="slotMessage'+value.id+'">'+
                                                                         '<div class="col-md-3">'+
                                                                             '<div class="radio radio-primary">'+
                                                                                 '<input id="morning'+value.id+'" type="radio" name="survey_slot_id" value="'+value.slot_id+'" checked="checked" required>'+
                                                                                 '<label for="morning'+value.id+'">'+value.slot_timename+'</label>'+
                                                                             '</div>'+
                                                                        '</div>'+
 
                                                                         '<div class="col-md-6">'+
                                                                             '<div class="">  '+
                                                                                 '<div class="input-group">' +
                                                                                     '<span class="input-group-addon" id="slot_time"><i class="fa fa-clock-o"></i></span> '+
                                                                                     '<input class="form-control" readonly name="slot_time" id="slot_time" placeholder="'+value.slotstart_time+' - '+value.slotend_time+'"> '+
                                                                                 '</div>'+
                                                                             '</div>'+
                                                                         '</div>'+
 
                                                                         '<div class="col-md-3">'+
                                                                             ''+str_button+''+
                                                                         '</div>'+
                                                                     '</div>'+
                                                                 '</div> ';
 
                                             }
                                             $("#srv_slot_datadt1").append(htmlslot);
                                     });
                                     // if(value.id ==){
 
                                     // }
                                     // htmlslot = '';
 
                                 }
                                
 
 
 
                             }
                 }
             });
 
 });

 /*---Surveyor REcord Acc to date---*/
 $(document).ready(function() {       
    var currentdate=new Date();
    var calender=$('#calendar1').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month'
        },
        selectable: true,
        defaultDate:$.fullCalendar.moment(),
       
        dayClick: function(date) {
            GetSurveyorDate(date);
        }
    });
    var date=new Date($('#calendar1').fullCalendar('getDate'));
    GetSurveyorDate(date);
});

 var status=1;
 function GetSurveyorDate(currentdate){
        var date = `${moment(currentdate).format("YYYY-MM-DD")}`;
         var token = $('meta[name="csrf-token"]').attr('content');
         var employeeUrl = "http://3.16.87.53/public/uploads/employees/";
         var userurl = "http://3.16.87.53/public/uploads/users/";
         //alert(date);
         $.ajax({ 
             url: "http://3.16.87.53/admin/surveyers/getAllSurveyorAjax",
             data: {"date":date,"_token":token},
             type: 'post',
             success: function(result) {
                 var json = $.parseJSON(result);
                 var tt = `${moment(currentdate).format("DD-MM-YYYY")}`;
                 if(json.length > 0){
                     $("#scheduleData").html('');
                     $("#scheduleData").append('<div class="calenderHeading" style="margin-bottom: 20px;">'+
                     '<h5 class="date_selected pull-left" style="width:100%">Date : <span id="jobdt7">'+tt+'</span> <span class="pull-right greenColor">Total Survey : '+json.length+' </span></h5>'+
                 '</div>');
                    var htmlslot;
                  var  flag=false;
                    //console.log("Mainlist "+json.length);
                    // $("#currentdateJobs").html('');
                     $.each(json, function(index, value) {
                         flag=false;
                         var user_image='';
                         var usr_image = employeeUrl+ value.emp_profile;
                                 if (value.profile_pic == null){
                                     user_image =  '<img src="'+defaultimg+'" class="">'
                                 }else{
                                     user_image =  '<img src="'+ usr_image +'" class="">'
                                 }
                         
                           if(value.index != ''){
                            //if(value.index != '' && value.jobs.length > 0 ){
                                 htmlslot='<div class="order_history_box">'+
                     '<div class="row">'+
                         '<div class="col-md-3">'+
                             '<div class="job_desc_box_list">'+
                                 '<div class="title">'+
                                     '<h5>Surveyor<span class="pull-right srv_name"></span></h5>'+
                                 '</div>'+       
                             '</div>'+
                             '<div class="widget_user_list surveyor_dtl">'+
                                 '<div class="widget_img_box">'+
                                     ''+user_image+''+
                                 '</div>'+
                                 '<div class="bs_inf_jd">'+
                                     '<h5 class="text-center">'+value.employee_name+'</h5>'+
                                     '<p>( '+value.emp_mobile+' )</p>'+
                                 '</div>'+
                             '</div>'+
                         '</div>'+

                         '<div class="col-md-9">'+
                             '<div class="sdl_srv" id="style-1">'+
                                 '<div class="force-overflow">';
                                 if(value.jobs[0] != ''){
                                 if(!flag)

                                 {  //console.log(value.jobs.length)  
                                         for(var x=0;x<value.jobs.length;x++)
                                     {    //console.log(value.jobs[x].firstname);
                                             htmlslot +='<div class="sub_ser_box_list">'+
                                         '<div class="row">'+
                                             '<div class="col-md-12">'+
                                                 '<div class="job_desc_box_list">'+
                                                     '<div class="title">'+
                                                         '<h5>Job No. <span class="srv_name">'+value.jobs[x].id+'</span></h5>'+
                                                     '</div> '+      
                                                 '</div>'+
                                             '</div>'+
                                         '</div>  '+

                                         '<div class="row">'+
                                             '<div class="col-md-12 job_desc_box_list">'+
                                                 '<div class="row">'+
                                                     '<div class="col-md-3">'+
                                                         '<div class="jb_list_bl">'+
                                                             '<p>Customer</p>';
                                                             if(value.jobs[x].profile_pic != '' && value.jobs[x].profile_pic != null){
                                                                 htmlslot +='<img src="'+userurl+value.jobs[x].profile_pic+'" alt="" data-src="'+userurl+value.jobs[x].profile_pic+'" width="35" height="35">';
                                                             }else{
                                                                 htmlslot +='<img src="'+default_small_img+'" alt="" data-src="'+default_small_img+'" width="35" height="35">';
                                                             }
                                                             
                                                             htmlslot +='<h5>'+value.jobs[x].firstname+' '+value.jobs[x].lastname+'</h5> '+
                                                             '<p>( '+value.jobs[x].mobile+' )</p>'+
                                                         '</div>'+
                                                     '</div>'+

                                                     '<div class="col-md-9">'+
                                                         '<div class="row">'+
                                                             '<div class="col-sm-4">'+
                                                                 '<h5 class="textHead">Slot Time</h5>'+
                                                                 '<p>'+value.jobs[x].slot_name+' : <br /> '+value.jobs[x].slotstart_time+' - '+value.jobs[x].slotend_time+''+
                                                             '</div>'; 
                                                             if(value.jobs[x].status == 1){   
                                                             htmlslot +='<div class="col-sm-4">'+
                                                                 '<h5 class="textHead">Estimate Price</h5>'+
                                                                 '<p>Nill</p>'+
                                                             '</div>'+
                                                             '<div class="col-sm-4">'+
                                                                 '<h5 class="textHead">Estimate Time</h5>'+
                                                                 '<p>Nill</p>'+
                                                             '</div>';
                                                             }
                                                        htmlslot +='</div>'+

                                                         '<div class="row">'+
                                                             '<div class="col-sm-4">'+
                                                                 '<h5 class="textHead">Location</h5>'+
                                                                 '<p>'+value.jobs[x].address.substring(0,38)+'...'+''+'</p>'+
                                                             '</div>'+

                                                             '<div class="col-sm-4">'+
                                                                 '<h5 class="textHead">Distance</h5>'+
                                                                 '<p>30 KM</p>'+
                                                             '</div>'+

                                                             '<div class="col-sm-4">'+
                                                                 '<h5 class="textHead">Status</h5>';
                                                                 
                                                                 if(value.jobs[x].status == 0){
                                                                     htmlslot +='<span class="bold pending">Requested</span>';
                                                                 }else if(value.jobs[x].status == 1){
                                                                     htmlslot +='<span class="bold pending">Scheduled</span>';
                                                                 }else if(value.jobs[x].status == 2){
                                                                     htmlslot +='<span class="bold pending">Proposed</span>';
                                                                 }else if(value.jobs[x].status == 3){
                                                                     htmlslot +='<span class="bold pending">Accepted</span>';
                                                                 }else if(value.jobs[x].status == 4){
                                                                     htmlslot +='<span class="bold pending">In Process</span>';
                                                                 }else if(value.jobs[x].status == 5){
                                                                    htmlslot +='<span class="bold pending">Completed</span>';
                                                                }else if(value.jobs[x].status == 6){
                                                                    htmlslot +='<span class="bold pending">Rejected</span>';
                                                                }else{

                                                                 }
                                                                 htmlslot +='</div>'+
                                                         '</div>'+
                                                     '</div>'+
                                                     '<div class="row">'+
                                                            '<div class="col-md-12 text-right">'+
                                                                '<a href="http://3.16.87.53/admin/surveyers/jobs/'+value.jobs[x].id+'" data-job_id="'+value.jobs[x].id+'" class="btn btn-primary">Add Report</a>'+
                                                            '</div>'+
                                                    '</div>'+

                                                 '</div>'+
                                             '</div>'+
                                         '</div>'+
                                     '</div>';
                                     }
                                 }
                                 }
                                 
                                 htmlslot +='</div>'+ 
                             '</div>'+       
                         '</div>'+
                     '</div>'+
                 '</div>';
                                }

                //              }else{
                //                 $("#scheduleData").html('');
                //                 $("#scheduleData").append('<div class="order_history_box">'+
                //      '<p>No Record Found!</p>'+
                //  '</div>');
                //              }
                             $("#scheduleData").append(htmlslot);
                     });

                 }else{
                    $("#scheduleData").html('');
                    $("#scheduleData").append('<div class="calenderHeading" style="margin-bottom: 20px;">'+
                     '<h5 class="date_selected pull-left" style="width:100%">Date : <span id="jobdt7">'+tt+'</span> <span class="pull-right greenColor">Total Survey : '+json.length+' </span></h5>'+
                 '</div>');
                    $("#scheduleData").append('<div class="order_history_box">'+
                        '<div class="row">'+
                            '<div>'+
                                '<h4 class="text-center">No Record Found on this Date!</h4>'+
                            '</div>'+
                        '</div>'+
                        '</div>');
             
         } 
       
     }
 });

 }

 $("#statusSurveys, #statusSurveys1, #statusSurveys2").click(function(){
    $("#proposedDataSurv2").html('');
    $("#proposedDataSurv1").html('');
    $("#proposedDataSurv").html('');
    var status_id = $(this).attr("data-status_id");
    
    var token = $('meta[name="csrf-token"]').attr('content');
    var employeeUrl = "http://3.16.87.53/public/uploads/employees/";
    var userurl = "http://3.16.87.53/public/uploads/users/";
    //alert(date);
    $.ajax({ 
        url: "http://3.16.87.53/admin/surveyers/getAllProposedAjax",
        data: {"status_id":status_id,"_token":token},
        type: 'post',
        success: function(result) {
            var json = $.parseJSON(result);
           // alert(json != '');
            if(json.length > 0){
                $("#proposedDataSurv, #proposedDataSurv1, #proposedDataSurv2").html('');
               var htmlslot;
             var  flag=false;
               //console.log("Mainlist "+json.length);
               // $("#currentdateJobs").html('');
                $.each(json, function(index, value) {
                    flag=false;
                    var user_image='';
                         var usr_image = userurl+ value.profile_pic;
                                 if (value.profile_pic == null){
                                     user_image =  '<img src="'+defaultimg+'" class="">'
                                 }else{
                                     user_image =  '<img src="'+ usr_image +'" class="">'
                                 }
                                 
                      if(value.index != ''){
                            
                            htmlslot='<div class="col-md-6">'+
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
                                                    ''+user_image+''+
                                                '</div>'+
                                                '<div class="bs_inf_jd">'+
                                                    '<h5 class="text-center">'+value.firstname+' '+value.lastname+'</h5>'+
                                                    '<p><i class="fa fa-phone"> '+value.mobile+'</i></p>'+
                                                '</div>'+
                                                
                                                '<div class="job_desc_box_list">'+
                                                    '<div class="row">'+
                                                        '<div class="col-sm-12 col-xs-12">'+
                                                            '<h5 class="textHead">Location</h5>'+
                                                            '<p>'+value.address.substring(0,38)+'...'+'</p>'+
                                                        '</div>'+

                                                        '<div class="col-sm-12 col-xs-12">'+
                                                            '<h5 class="textHead">Distance <span class="pull-right req_sr_card_dis">65 KM</span> </h5>'+
                                                        '</div>'+
                                                    '</div>'+    
                                                '</div>'+
                                            '</div>'+  
                                        '</div>'+
                                    '</div>'+

                                    '<div class="col-sm-8 req_sr_card_dt_panel">'+
                                        '<div class="sub_ser_box_list">'+
                                            '<div class="row">'+
                                            '<div class="col-md-12">'+
                                                '<h6 class="textHead mar_bot nm_srv bold text-black">Surveyor </h6>'+
                                           '</div>'+
                                            '<div class="col-md-2 col-sm-2">'+
                                                '<div class="profile-img-wrapper pull-left m-l-10">'+
                                                    '<div class=" p-r-10">';
                                                    if(value.surveyerdetail.emp_profile != '' && value.surveyerdetail.emp_profile != null){
                                                        htmlslot +='<img src="'+employeeUrl+value.surveyerdetail.emp_profile+'" alt="" data-src="'+employeeUrl+value.surveyerdetail.emp_profile+'" width="35" height="35">';
                                                    }else{
                                                        htmlslot +='<img src="'+default_small_img+'" alt="" data-src="'+default_small_img+'" width="35" height="35">';
                                                    }
                                                        htmlslot +='</div>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-md-10 col-sm-10">'+
                                                '<div style="line-height: 9px;padding-top:5px;" class="user-name text-black bold large-text">'+value.surveyerdetail.employee_name+' </div>'+
                                                '<div><span class="bold">'+value.surveyerdetail.emp_mobile+'</span></div>'+
                                            '</div>'+
                                            '</div>'+

                                            '<div class="row">'+
                                                '<div class="col-sm-12">'+
                                                    '<div class="table-responsive">'+
                                                        '<table class="table tb-ped sr_dt_tbl">'+
                                                            '<thead>'+
                                                                '<tr>'+
                                                                    '<th>Survey Date</th>'+
                                                                    '<th>Estimate time</th>'+
                                                                    '<th>Status</th>'+
                                                                '</tr>'+
                                                            '</thead>'+

                                                            '<tbody>'+
                                                                '<tr>'+
                                                                    '<td>'+value.surveyerdetail.servey_date+'</td>';
                                                                    if(value.status == 1){
                                                                        htmlslot +='<td>Nill</td>';
                                                                    }
                                                                    htmlslot +='<td class="text-bold text-red">';
                                                                    if(value.status == 1){
                                                                        htmlslot +='Scheduled';
                                                                    }else{

                                                                    }
                                                                    htmlslot +='</td>'+
                                                                '</tr>'+
                                                            '</tbody>'+
                                                        '</table>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        
                                        '<div class="job_desc_box_list">'+
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
                                                            if(value.services[0] != ''){
                                                                $.each(value.services, function(index1, value1) {
                                                                htmlslot +='<div class="card_main_srv_lst">'+
                                                                    '<div class="row">'+
                                                                        '<div class="col-md-12">'+
                                                                            '<h5 class="textHead mar_bot nm_srv">Service Name : <span class="srv_name">'+value1.service_name+'</span></h5>'+
                                                                        '</div>'+
                                                                    '</div>'+
                                                                    '<div class="row">'+
                                                                        '<div class="col-md-12">'+
                                                                            '<h5 class="textHead">Sub Services</h5>'+
                                                                            '<div class="list_sub_srv">'+
                                                                                '<p>'+value1.jobServices.specify_problem+'</p>'+
                                                                                '<h6>'+value1.jobServices.additional_notes+'</h6>'+
                                                                            '</div>'+
                                                                    '</div>'+
                                                                    '</div>'+
                                                                '</div>';
                                                                });
                                                            }
                                                            htmlslot+='</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+

                                '<div class="row">'+
                                    '<div class="col-md-12">'+
                                        '<div class="footer_bx">'+
                                            '<div class="row">'+
                                                '<div class="col-sm-5">'+
                                                    '<div class="job_desc_box_list">'+
                                                        '<h5>Total Estimated Price <span class="pull-right">45.00 AED</span></h5>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-sm-7 text-right">'+
                                                    '<a href="http://3.16.87.53/admin/surveyers/surveyDetail" class="hashtags asign_job_btn tp_mar_4">View</a>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div> ';
                                
                      }else{
                        $("#proposedDataSurv, #proposedDataSurv1, #proposedDataSurv2").append('<div class="col-md-6">'+
                            '<h4 class="text-center">No Record Found on this Date!</h4>'+
                        '</div>');
                      } 
                      $("#proposedDataSurv, #proposedDataSurv1, #proposedDataSurv2").append(htmlslot);  
                });

            }else{
            $("#proposedDataSurv, #proposedDataSurv1, #proposedDataSurv2").append('<div class="col-md-12">'+
                '<h4 class="text-center">No Record Found on this Date!</h4>'+
            '</div>');
        
    } 
  
}
});

});

/*---Order Record Acc to date with group allot option---*/
$(document).ready(function() {       
    var currentdate=new Date();
    var calender=$('#calendar2').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month'
        },
        selectable: true,
        defaultDate:$.fullCalendar.moment(),
       
        // dayClick: function(date) {
        //     GetSurveyorDate(date);
        // }
    });
    // var date=new Date($('#calendar2').fullCalendar('getDate'));
    // GetSurveyorDate(date);
});





