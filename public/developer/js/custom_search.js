/*Custom Search js*/

$('#search').on('keyup',function(){
    //if($(this).val().length >= 2) {
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : 'http://3.16.87.53/admin/services/search',
            data:{
                'search':$value
                },
            success:function(data){
                
                var json = $.parseJSON(data);
                 //alert(json);
                 console.log(json);
                 var htmlslot;
                 $('#searchData').html('');
                $.each(json,function(index, value){
                    
                    var service_image='';
                    var service_image1 = '<?php echo fileurlservice(); ?>'+ value.service_icon;
                    if(value.service_icon == null || value.service_icon == ''){
                        var service_image = '<img src="{{ asset("public/img/defaultIcon.png") }}" class="">';
            
                    }else{
                        var service_image = '<img src="'+ service_image1 +'" class="img-responsive">';
                    
                    }
                    var edit_permission='';
                    if('<?php echo hasPermissionThroughRole("edit_services"); ?>'){
                        var edit_permission = '<a href="{{ url("admin/services/")}}'+value.id+'" class=" pull-right edt_btn " title="Edit Service"><i class="fa fa-pencil"></i></a>';
                    }
                    var delete_permission='';
                    if('<?php echo hasPermissionThroughRole("delete_services"); ?>'){
                        var delete_permission = '<a href="{{ url("admin/services/destroy/")}}'+value.id+'" data-id="" onclick="return confirm("Are you sure you want to delete this record?");" class="EditService editSub_btn pull-left dlt_btn" title="Delete Service" ><i class="fa fa-times"></i></a>';
                    }

                    htmlslot=
                        '<div class="col-md-3">'+
                            '<div class="serviceListBox">'+
                                '<div class="grid_box new_srv_box">'+
                                    '<div class="controller overlay">'+
                                        ''+delete_permission+''+
                                        ''+edit_permission+''+
                                    '</div>'+

                                    '<div class="paddingBottom0">'+
                                        '<div class="icon_div ">'+
                                            ''+service_image+''+
                                        '</div>'+
                                    '</div>'+

                                    '<div class="content_box">'+
                                        '<div class="title">'+
                                            '<h4>'+value.service_name+'</h4>'+
                                        '</div>'+

                                        '<div class="content_opt">'+
                                            '<div class="row">'+
                                                '<div class="col-sm-12 col-xs-12">'+
                                                    '<div class="action_box" style="margin-bottom:0px;">'+
                                                        '<div class="card_box_opt">'+
                                                            '<div class="card-text-heading arialFont">Status</div>'+
                                                            '<div class="toggleCheckBox">';
                                                            if(value.status == 1){
                                                                htmlslot+='<label class="switch">'+
                                                                '<input name="status" type="checkbox" onclick="statusChange('+value.id+')" value="0" id="enable_'+value.id+'" checked>'+
                                                                '<span class="slider round"></span>'+
                                                                '</label>';
                                                            }else{
                                                                htmlslot+='<label class="switch">'+
                                                                '<input name="status" type="checkbox" onclick="statusChange('+value.id+')" value="1" id="enable_'+value.id+'">'+
                                                                '<span class="slider round"></span>'+
                                                                '</label>';
                                                            }
                                                            

                                                            htmlslot+='</div>'+
                                                        '</div>'+                                                
                                                    '</div>'+    
                                                '</div>'+
                                            '</div>'+

                                            '<div class="row">'+
                                                '<div class="col-sm-12 col-xs-12">'+
                                                    '<div class="card_box_opt text-center">'+
                                                        '<div class="card-text-heading">Total Sub Service</div>'+
                                                        '<div class="service_code">'+value.subcount.totalsubs+' <a href="http://3.16.87.53/admin/services/'+value.id+'/subServices">View</a></div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+ 

                                        '<div class="new_add_srv_btn_block">'+
                                            '<div class="row">'+
                                                '<div class="col-md-12 text-center">'+
                                                    '<a href="http://3.16.87.53/admin/services/'+value.id+'/addSubService" class="new_add_srv_btn"><i class="fa fa-plus"></i> Add Sub Services</a>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+  
                                '</div>'+
                            '</div>'+
                        '</div>'
                    ;
                    $("#searchData").append(htmlslot);
                });
            }
        });
    //}
})