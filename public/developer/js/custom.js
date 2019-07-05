/*Custom js*/
function openModal(obj){
    alert(obj);
}

function closeModal(elem){
    alert(obj);
}

function edit(id){
    alert(id);
}

function deleteRec(id){
    alert(id);
}

/* get Country*/ 
function getCountry(){
    var countryName = $("#country").val();
    if(countryName=="UAE"){
        $("#int_Doc").addClass("hidden");
    }else{
        $("#int_Doc").removeClass("hidden");
    }
}

/* Staff Multiselect */ 
var selectedStaff=[];

function getstaff(){
  
    console.log($('#staff_type :selected').length);
        $('#staff_type :selected').each(function(){ 
            
            if($(this).text()=="Driving"){
                $("#driverInfo").removeClass("hidden");
            }else{
                $("#driverInfo").addClass("hidden");
            }
            console.log($(this).text())
        });
}

function preview_image(event,id) {

   // var docID = event.target.id;
   // console.log(docID);

    //var documentID = $("#"+docID).parent().children().eq(3).attr('id');
   // console.log(documentID);

    var reader = new FileReader();

    reader.onload = function(){
        var output = document.getElementById(id);
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

// function uploadFile(){
//     alert("upload File");
//     $('.fileUploadMain .imgPrv').open();
// }
// document.getElementById('get_file').onclick = function() {
//     document.getElementById('my_file').click();
// };

// function OpenFile(id2){
//     alert(id2);
//      $("#"+id2).click();
// }
function getpic(fileid,id,id2,event){
    var file = $("#"+fileid)[0].files[0]
    if (file){
 
    $('#'+id2).val(file.name);

    var reader = new FileReader();

    reader.onload = function(){
        var output = document.getElementById(id);
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
}

/** Filter On Vendors listing page Start */
var defaultimg ="http://3.16.87.53/public/img/defaultIcon.png" ;
function serviceFilter(){
    var service_type = $('#service_typeFilter').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    var vendorurl = "http://3.16.87.53/public/uploads/vendors/";
    var empurl = "http://3.16.87.53/public/uploads/employees/";
    $.ajax({ 
        url: "http://3.16.87.53/admin/vendors/filterAjax",
        data: {"service_type":service_type,"payment_term":'',"payment_method":'',"_token":token},
        type: 'post',
        success: function(result) {
            var json = $.parseJSON(result);
            if(json.length > 0){
                    $("#allfilterApply1").html('');
                    var  flag=false;
                        // do your stuff here
                    var htmlslot='';
                       
                    $.each(json, function(index, value) {
                        flag=false;
                        var vendor_image='';
                        var vndr_image = vendorurl+ value.profile_img;
                                if (value.profile_img == null){
                                    vendor_image =  '<img src="'+defaultimg+'" class="img-responsive">'
                                }else{
                                    vendor_image =  '<img src="'+ vndr_image +'" class="">'
                                }
                        if(value.index != ''){
                            htmlslot+='<div class="col-md-3">'+
                            '<div class="widget_user_list">'+
                                '<div class="widget-item ">'+
                                    '<div class="controller overlay right">'+
                                        '<a href="http://3.16.87.53/admin/vendors/'+value.id+'/edit" title="Edit Vendor"><i class="fa fa-pencil"></i></a>'+
                                        
                                        '<a href="http://3.16.87.53/admin/vendors/'+value.id+'/destroy"><i class="fa fa-times"></i></a>'+
                                    
                                    '</div>'+
                                '</div>'+

                                '<div class="widget_img_box">'+
                                    ''+vendor_image+''+
                                '</div>'+

                                '<div class="widget-title">'+
                                    '<h4>'+value.company_name.substring(0,15)+'...'+'</h4>'+
                                    '<h5><span>Services</span>'+
                                        '<span class="pri_service_main">'+
                                            '<span class="pri_service_name">Plumbing,</span>'+
                                            '<span class="pri_service_name"> Mechanical</span>'+
                                        '</span>'+
                                    '</h5>'+
                                '</div>'+
                                '<div class="widget-user-details">'+
                                    '<div class="card_loc">'+
                                            '<div class="row">'+
                                                '<div class="col-sm-8">'+
                                                    '<div class="tiles-title card-text-heading">Mobile No.</div>'+
                                                    '<div class="job_st_details">'+
                                                        '<div class="left_opt">'+
                                                            '<div class="st_opt">+971-'+value.mobile+'</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-sm-4 text-right">'+
                                                    '<div class="tiles-title card-text-heading">Rating</div>'+
                                                    '<div class="job_st_details pull-right payment_days_notification">'+
                                                        '<div class="left_opt pull-right">'+
                                                            '<div class="st_opt">5.0</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="card_loc">'+
                                            '<div class="row">'+
                                                '<div class="col-sm-6">'+
                                                    '<div class="tiles-title card-text-heading">Payment Mode</div>'+
                                                    '<div class="job_st_details">'+
                                                        '<div class="left_opt">'+
                                                            '<div class="st_opt">'+value.payment_method+'</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-sm-6 text-right">'+
                                                    '<div class="tiles-title card-text-heading">Payment Terms</div>'+
                                                    '<div class="job_st_details pull-right payment_days_notification">'+
                                                        '<div class="left_opt pull-right">'+
                                                            '<div class="st_opt">'+value.payment_term+'</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+


                                    '<div class="tiles-body">'+
                                        '<div class="card_loc">'+
                                            '<div class="tiles-title card-text-heading">Invoices</div>'+
                                            '<div class="job_st_details">'+
                                                '<div class="widget-stats">'+
                                                    '<div class="wrapper transparent">'+
                                                        '<a href="">'+
                                                            '<span class="item-title">Total</span> <span class="item-count animate-number semi-bold" data-value="5" data-animation-duration="5">5</span>'+
                                                        '</a>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="widget-stats">'+
                                                    '<div class="wrapper transparent">'+
                                                        '<a href="">'+
                                                            '<span class="item-title">Complete</span> <span class="item-count animate-number semi-bold" data-value="3" data-animation-duration="3">3</span>'+
                                                        '</a>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="widget-stats ">'+
                                                    '<div class="wrapper last">'+
                                                        '<a href="">'+
                                                            '<span class="item-title">Pending</span> <span class="item-count animate-number semi-bold" data-value="2" data-animation-duration="2">2</span>'+
                                                        '</a>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+

                                        
                                    '</div>'+

                                    '<div class="widget-action-block">'+
                                        '<a href="http://3.16.87.53/admin/vendors/'+value.id+'/view" class="hashtags transparent">View More</a>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                    
                        }
                    });
                                                    
                $("#allfilterApply1").append(htmlslot);
            }else{
                $("#allfilterApply1").html('');
                $("#allfilterApply1").append('<div class="col-md-12">'+
                            '<h3 class="text-center">No Record Found!</h3>'+
                            '</div>'
                );
            } 
        }                      
    });
}

function paymentMethodFilter(){
    var payment_method = $('#payment_methodFilter').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    var vendorurl = "http://3.16.87.53/public/uploads/vendors/";
    var empurl = "http://3.16.87.53/public/uploads/employees/";
    $.ajax({ 
        url: "http://3.16.87.53/admin/vendors/filterAjax",
        data: {"service_type":'',"payment_term":'',"payment_method":payment_method,"_token":token},
        type: 'post',
        success: function(result) {
            var json = $.parseJSON(result);
            if(json.length > 0){
                    $("#allfilterApply1").html('');
                    var  flag=false;
                        // do your stuff here
                    var htmlslot='';
                       
                    $.each(json, function(index, value) {
                        flag=false;
                        var vendor_image='';
                        var vndr_image = vendorurl+ value.profile_img;
                                if (value.profile_img == null){
                                    vendor_image =  '<img src="'+defaultimg+'" class="img-responsive">'
                                }else{
                                    vendor_image =  '<img src="'+ vndr_image +'" class="">'
                                }
                        if(value.index != ''){
                            htmlslot+='<div class="col-md-3">'+
                            '<div class="widget_user_list">'+
                                '<div class="widget-item ">'+
                                    '<div class="controller overlay right">'+
                                        '<a href="http://3.16.87.53/admin/vendors/'+value.id+'/edit" title="Edit Vendor"><i class="fa fa-pencil"></i></a>'+
                                            
                                        '<a href="http://3.16.87.53/admin/vendors/'+value.id+'/destroy"><i class="fa fa-times"></i></a>'+
                                    
                                    '</div>'+
                                '</div>'+

                                '<div class="widget_img_box">'+
                                    ''+vendor_image+''+
                                '</div>'+

                                '<div class="widget-title">'+
                                    '<h4>'+value.company_name.substring(0,15)+'...'+'</h4>'+
                                    '<h5><span>Services</span>'+
                                        '<span class="pri_service_main">'+
                                            '<span class="pri_service_name">Plumbing,</span>'+
                                            '<span class="pri_service_name"> Mechanical</span>'+
                                        '</span>'+
                                    '</h5>'+
                                '</div>'+
                                '<div class="widget-user-details">'+
                                    '<div class="card_loc">'+
                                            '<div class="row">'+
                                                '<div class="col-sm-8">'+
                                                    '<div class="tiles-title card-text-heading">Mobile No.</div>'+
                                                    '<div class="job_st_details">'+
                                                        '<div class="left_opt">'+
                                                            '<div class="st_opt">+971-'+value.mobile+'</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-sm-4 text-right">'+
                                                    '<div class="tiles-title card-text-heading">Rating</div>'+
                                                    '<div class="job_st_details pull-right payment_days_notification">'+
                                                        '<div class="left_opt pull-right">'+
                                                            '<div class="st_opt">5.0</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="card_loc">'+
                                            '<div class="row">'+
                                                '<div class="col-sm-6">'+
                                                    '<div class="tiles-title card-text-heading">Payment Mode</div>'+
                                                    '<div class="job_st_details">'+
                                                        '<div class="left_opt">'+
                                                            '<div class="st_opt">'+value.payment_method+'</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-sm-6 text-right">'+
                                                    '<div class="tiles-title card-text-heading">Payment Terms</div>'+
                                                    '<div class="job_st_details pull-right payment_days_notification">'+
                                                        '<div class="left_opt pull-right">'+
                                                            '<div class="st_opt">'+value.payment_term+'</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+


                                    '<div class="tiles-body">'+
                                        '<div class="card_loc">'+
                                            '<div class="tiles-title card-text-heading">Invoices</div>'+
                                            '<div class="job_st_details">'+
                                                '<div class="widget-stats">'+
                                                    '<div class="wrapper transparent">'+
                                                        '<a href="">'+
                                                            '<span class="item-title">Total</span> <span class="item-count animate-number semi-bold" data-value="5" data-animation-duration="5">5</span>'+
                                                        '</a>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="widget-stats">'+
                                                    '<div class="wrapper transparent">'+
                                                        '<a href="">'+
                                                            '<span class="item-title">Complete</span> <span class="item-count animate-number semi-bold" data-value="3" data-animation-duration="3">3</span>'+
                                                        '</a>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="widget-stats ">'+
                                                    '<div class="wrapper last">'+
                                                        '<a href="">'+
                                                            '<span class="item-title">Pending</span> <span class="item-count animate-number semi-bold" data-value="2" data-animation-duration="2">2</span>'+
                                                        '</a>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+

                                        
                                    '</div>'+

                                    '<div class="widget-action-block">'+
                                        '<a href="http://3.16.87.53/admin/vendors/'+value.id+'/view" class="hashtags transparent">View More</a>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                    
                        }
                    });
                                                    
                $("#allfilterApply1").append(htmlslot);
            }else{
                $("#allfilterApply1").html('');
                $("#allfilterApply1").append('<div class="col-md-12">'+
                            '<h3 class="text-center">No Record Found!</h3>'+
                            '</div>'
                );
            }
        }                      
    });
}

function paymentTermFilter(){
    var payment_term = $('#payment_termFilter').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    var vendorurl = "http://3.16.87.53/public/uploads/vendors/";
    var empurl = "http://3.16.87.53/public/uploads/employees/";
    $.ajax({ 
        url: "http://3.16.87.53/admin/vendors/filterAjax",
        data: {"service_type":'',"payment_term":payment_term,"payment_method":'',"_token":token},
        type: 'post',
        success: function(result) {
            var json = $.parseJSON(result);
            if(json.length > 0){
                    $("#allfilterApply1").html('');
                    var  flag=false;
                        // do your stuff here
                    var htmlslot='';
                       
                    $.each(json, function(index, value) {
                        flag=false;
                        var vendor_image='';
                        var vndr_image = vendorurl+ value.profile_img;
                                if (value.profile_img == null){
                                    vendor_image =  '<img src="'+defaultimg+'" class="img-responsive">'
                                }else{
                                    vendor_image =  '<img src="'+ vndr_image +'" class="">'
                                }
                        if(value.index != ''){
                            htmlslot+='<div class="col-md-3">'+
                            '<div class="widget_user_list">'+
                                '<div class="widget-item ">'+
                                    '<div class="controller overlay right">'+
                                        '<a href="http://3.16.87.53/admin/vendors/'+value.id+'/edit" title="Edit Vendor"><i class="fa fa-pencil"></i></a>'+
                                            
                                        '<a href="http://3.16.87.53/admin/vendors/'+value.id+'/destroy"><i class="fa fa-times"></i></a>'+
                                    
                                    '</div>'+
                                '</div>'+

                                '<div class="widget_img_box">'+
                                    ''+vendor_image+''+
                                '</div>'+

                                '<div class="widget-title">'+
                                    '<h4>'+value.company_name.substring(0,15)+'...'+'</h4>'+
                                    '<h5><span>Services</span>'+
                                        '<span class="pri_service_main">'+
                                            '<span class="pri_service_name">Plumbing,</span>'+
                                            '<span class="pri_service_name"> Mechanical</span>'+
                                        '</span>'+
                                    '</h5>'+
                                '</div>'+
                                '<div class="widget-user-details">'+
                                    '<div class="card_loc">'+
                                            '<div class="row">'+
                                                '<div class="col-sm-8">'+
                                                    '<div class="tiles-title card-text-heading">Mobile No.</div>'+
                                                    '<div class="job_st_details">'+
                                                        '<div class="left_opt">'+
                                                            '<div class="st_opt">+971-'+value.mobile+'</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-sm-4 text-right">'+
                                                    '<div class="tiles-title card-text-heading">Rating</div>'+
                                                    '<div class="job_st_details pull-right payment_days_notification">'+
                                                        '<div class="left_opt pull-right">'+
                                                            '<div class="st_opt">5.0</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="card_loc">'+
                                            '<div class="row">'+
                                                '<div class="col-sm-6">'+
                                                    '<div class="tiles-title card-text-heading">Payment Mode</div>'+
                                                    '<div class="job_st_details">'+
                                                        '<div class="left_opt">'+
                                                            '<div class="st_opt">'+value.payment_method+'</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-sm-6 text-right">'+
                                                    '<div class="tiles-title card-text-heading">Payment Terms</div>'+
                                                    '<div class="job_st_details pull-right payment_days_notification">'+
                                                        '<div class="left_opt pull-right">'+
                                                            '<div class="st_opt">'+value.payment_term+'</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+


                                    '<div class="tiles-body">'+
                                        '<div class="card_loc">'+
                                            '<div class="tiles-title card-text-heading">Invoices</div>'+
                                            '<div class="job_st_details">'+
                                                '<div class="widget-stats">'+
                                                    '<div class="wrapper transparent">'+
                                                        '<a href="">'+
                                                            '<span class="item-title">Total</span> <span class="item-count animate-number semi-bold" data-value="5" data-animation-duration="5">5</span>'+
                                                        '</a>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="widget-stats">'+
                                                    '<div class="wrapper transparent">'+
                                                        '<a href="">'+
                                                            '<span class="item-title">Complete</span> <span class="item-count animate-number semi-bold" data-value="3" data-animation-duration="3">3</span>'+
                                                        '</a>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="widget-stats ">'+
                                                    '<div class="wrapper last">'+
                                                        '<a href="">'+
                                                            '<span class="item-title">Pending</span> <span class="item-count animate-number semi-bold" data-value="2" data-animation-duration="2">2</span>'+
                                                        '</a>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+

                                        
                                    '</div>'+

                                    '<div class="widget-action-block">'+
                                        '<a href="http://3.16.87.53/admin/vendors/'+value.id+'/view" class="hashtags transparent">View More</a>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                    
                        }
                    });
                                                    
                $("#allfilterApply1").append(htmlslot);
            }else{
                $("#allfilterApply1").html('');
                $("#allfilterApply1").append('<div class="col-md-12">'+
                            '<h3 class="text-center">No Record Found!</h3>'+
                            '</div>'
                );
            }
        }                      
    });
}
/** Filter On Vendors listing page End */

/** Filter On Products listing page Start */
function filterByService(){
    alert("asfdhgfsahydrjsdudykfudflklksfdkjesf");
    var service_type = $('#service_typeFilter1').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    var producturl = "http://3.16.87.53/public/uploads/products/";
    var empurl = "http://3.16.87.53/public/uploads/employees/";
    $.ajax({ 
        url: "http://3.16.87.53/admin/inventry/products/filterByAjax",
        data: {"service_type":service_type,"brand_name":'',"stock_type":'',"_token":token},
        type: 'post',
        success: function(result) {
            var json = $.parseJSON(result);
                var htmlslot;
                $('#searchbyName').html('');
                var i = 0;
            
            if(json.length > 0){
                $.each(json,function(index, value){
                    var edit_permission='';
                    if("<?php echo hasPermissionThroughRole('edit_product'); ?>"){
                        var edit_permission = '<a href="http://3.16.87.53/admin/inventry/products/'+value.id+'" title="Edit Product"><i class="fa fa-pencil"></i></a>';
                    }
                    var delete_permission='';
                    if("<?php echo hasPermissionThroughRole('delete_products'); ?>"){
                        var delete_permission = '<a href="http://3.16.87.53/admin/inventry/products/destroy/'+value.id+'" title="Delete Product"><i class="fa fa-times"></i></a>';
                    }
                    var view_product_permission='';
                    if("<?php echo hasPermissionThroughRole('view_vehicle_info'); ?>"){
                        var view_product_permission = '<a href="http://3.16.87.53/admin/inventry/products/'+value.id+'/view"><i class="fa fa-eye"></i></a>';
                    }
                    htmlslot='<tr>'+
                                '<td class="text-center">'+(i+1)+'</td>'+
                                '<td class="text-center">'+value.product_code+'</td>'+
                                '<td class="text-center">'+value.product_name+'</td>'+
                                '<td class="text-center"><div class="marginCircle"></div></td>'+
                                '<td class="text-center">10.00AED</td>'+
                                '<td class="text-center">15.00AED</td>'+
                                '<td class="text-center">N/A</td>'+
                                '<td class="text-center">'+
                                    ''+view_product_permission+''+
                                    ''+edit_permission+''+
                                    ''+delete_permission+''+
                                '</td>'+
                            '</tr>'
                    ;
                    $("#searchbyName").append(htmlslot);
                    i++;
                });
            }else{
                htmlslot='<tr><td colspan="8">'+
                            '<h4 class="text-center">No Record Found!</h4>'+
                        '</td></tr>';
                
                $("#searchbyName").append(htmlslot);
            }
        }                      
    });
}

function filterByBrand(){
    var service_type = $('#service_typeFilter1').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    var producturl = "http://3.16.87.53/public/uploads/products/";
    var empurl = "http://3.16.87.53/public/uploads/employees/";
    $.ajax({ 
        url: "http://3.16.87.53/admin/inventry/products/filterByAjax",
        data: {"service_type":service_type,"brand_name":'',"stock_type":'',"_token":token},
        type: 'post',
        success: function(result) {
            var json = $.parseJSON(result);
            
            if(json.length > 0){

                    $("#filterservicediv1").html('');
                    var  flag=false;
                        // do your stuff here
                    var htmlslot='';
                       
                    $.each(json, function(index, value) {
                        flag=false;
                        var product_image='';
                        var prd_image = producturl+ value.product_img;
                                if (value.product_img == null){
                                    product_image =  '<img src="http://3.16.87.53/public/img/no-preview-item.jpg" class="img-responsive" />';
                                }else{
                                    product_image =  '<img src="'+ prd_image +'" class="">'
                                }
                               // alert(value[index] != '');     
                        if(value.index != ''){
                            htmlslot ='<div class="col-md-3">'+
                            '<div class="item_card"> '+
                                '<div class="widget-item ">'+
                                    '<div class="controller overlay right">'+
                                        '<a href="http://3.16.87.53/admin/inventry/products/'+value.id+'" title="Edit Product"><i class="fa fa-pencil"></i></a>'+
                                        '<a href="http://3.16.87.53/admin/inventry/products/destroy/'+value.id+'"><i class="fa fa-times"></i></a>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="item_img">'+
                                    ''+product_image+''+
                                '</div>'+
    
                                '<div class="items_details">'+
                                    '<div class="text-uppercase text-center card-text-heading">'+
                                        ''+value.product_name+''+
                                        
                                        '<span>('+value.product_code+')</span>'+ 
                                    '</div>'+             
                                    '<div class="job_st_details widget-title">'+
                                    '<div class="title">Services</div>'+                                 
                                    '<span class="pri_service_main">'+
                                    '<span class="pri_service_name"> '+value.service_name+',</span>'+
                                    '<span class="pri_service_name"> '+value.services+'</span>'+                         
                                    '</span>'+          
                                    '</div>'+
    
                                '<div class="job_st_details widget-title">'+
                                
                                    '<div class="title">Brands</div>'+
                                    '<span class="pri_service_main">'+
                                    '<span class="pri_service_name"> '+value.brands+'</span>'+
                                    '</span>'+
                                
                                    '</div>'+
                                    '<div class="job_st_details">'+
                                        '<div class="left_opt">'+
                                            '<div class="title">Product Quantity</div>'+
                                            '<div class="st_opt">'+value.qty+' </div>'+
                                        '</div>';
                                        if(value.qty == 0){
                                        htmlslot+='<div class="right_opt item_note">'+
                                            '<div class="title">&nbsp;</div>'+
                                            '<div class="st_opt  blink"><span class="">No Stock</span></div>'+
                                        '</div>';
                                        }
                                        else if(value.qty < 5){
                                            htmlslot+='<div class="right_opt item_note">'+
                                            '<div class="title">&nbsp;</div>'+
                                            '<div class="st_opt  blink"><span class="">Low Stock</span></div>'+
                                        '</div>';
                                        }
                                        htmlslot+='</div>'+
    
                                    '<div class="widget-action-block">'+
                                        '<a href="http://3.16.87.53/admin/inventry/products/'+value.id+'/view" class="hashtags transparent">View</a>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                    
                        }
                        $("#filterservicediv1").append(htmlslot);
                    });
                                                    
                
            }else{
                $("#filterservicediv1").html('');
                $("#filterservicediv1").append('<div class="col-md-12">'+
                            '<h3 class="text-center">No Record Found!</h3>'+
                            '</div>'
                );
            } 
        }                      
    });
}

function filterByStock(){
    var service_type = $('#service_typeFilter1').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    var producturl = "http://3.16.87.53/public/uploads/products/";
    var empurl = "http://3.16.87.53/public/uploads/employees/";
    $.ajax({ 
        url: "http://3.16.87.53/admin/inventry/products/filterByAjax",
        data: {"service_type":service_type,"brand_name":'',"stock_type":'',"_token":token},
        type: 'post',
        success: function(result) {
            var json = $.parseJSON(result);
            
            if(json.length > 0){

                    $("#filterservicediv1").html('');
                    var  flag=false;
                        // do your stuff here
                    var htmlslot='';
                       
                    $.each(json, function(index, value) {
                        flag=false;
                        var product_image='';
                        var prd_image = producturl+ value.product_img;
                                if (value.product_img == null){
                                    product_image =  '<img src="http://3.16.87.53/public/img/no-preview-item.jpg" class="img-responsive" />';
                                }else{
                                    product_image =  '<img src="'+ prd_image +'" class="">'
                                }
                               // alert(value[index] != '');     
                        if(value.index != ''){
                            htmlslot ='<div class="col-md-3">'+
                            '<div class="item_card"> '+
                                '<div class="widget-item ">'+
                                    '<div class="controller overlay right">'+
                                        '<a href="http://3.16.87.53/admin/inventry/products/'+value.id+'" title="Edit Product"><i class="fa fa-pencil"></i></a>'+
                                        '<a href="http://3.16.87.53/admin/inventry/products/destroy/'+value.id+'"><i class="fa fa-times"></i></a>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="item_img">'+
                                    ''+product_image+''+
                                '</div>'+
    
                                '<div class="items_details">'+
                                    '<div class="text-uppercase text-center card-text-heading">'+
                                        ''+value.product_name+''+
                                        
                                        '<span>('+value.product_code+')</span>'+ 
                                    '</div>'+             
                                    '<div class="job_st_details widget-title">'+
                                    '<div class="title">Services</div>'+                                 
                                    '<span class="pri_service_main">'+
                                    '<span class="pri_service_name"> '+value.service_name+',</span>'+
                                    '<span class="pri_service_name"> '+value.services+'</span>'+                         
                                    '</span>'+          
                                    '</div>'+
    
                                '<div class="job_st_details widget-title">'+
                                
                                    '<div class="title">Brands</div>'+
                                    '<span class="pri_service_main">'+
                                    '<span class="pri_service_name"> '+value.brands+'</span>'+
                                    '</span>'+
                                
                                    '</div>'+
                                    '<div class="job_st_details">'+
                                        '<div class="left_opt">'+
                                            '<div class="title">Product Quantity</div>'+
                                            '<div class="st_opt">'+value.qty+' </div>'+
                                        '</div>';
                                        if(value.qty == 0){
                                        htmlslot+='<div class="right_opt item_note">'+
                                            '<div class="title">&nbsp;</div>'+
                                            '<div class="st_opt  blink"><span class="">No Stock</span></div>'+
                                        '</div>';
                                        }
                                        else if(value.qty < 5){
                                            htmlslot+='<div class="right_opt item_note">'+
                                            '<div class="title">&nbsp;</div>'+
                                            '<div class="st_opt  blink"><span class="">Low Stock</span></div>'+
                                        '</div>';
                                        }
                                        htmlslot+='</div>'+
    
                                    '<div class="widget-action-block">'+
                                        '<a href="http://3.16.87.53/admin/inventry/products/'+value.id+'/view" class="hashtags transparent">View</a>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                    
                        }
                        $("#filterservicediv1").append(htmlslot);
                    });
                                                    
                
            }else{
                $("#filterservicediv1").html('');
                $("#filterservicediv1").append('<div class="col-md-12">'+
                            '<h3 class="text-center">No Record Found!</h3>'+
                            '</div>'
                );
            } 
        }                      
    });
}
/** Filter On Products listing page End */




