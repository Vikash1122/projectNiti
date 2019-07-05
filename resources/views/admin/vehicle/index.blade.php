@extends('admin.layouts.main-layout')
@section('css')
<link href="{{ asset('public/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/plugins/bootstrap-select2/select2.css') }}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{ asset('public/plugins/jquery-datatable/css/jquery.dataTables.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" />

<style>
    .cardViewTable tr td{
        width:100%;
        display:block;
    }
    .cardViewTable .widget_user_list{
        width:auto;
    }
    .grid.simple .grid-title{
        display:none;
    }
    .widget_user_list_new{
        border-radius: 5px;
        background: #ffffff;
        float: left;
        margin-bottom: 20px;
    }
    .widget_user_list_new .widget_img_box {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: 20px auto 10px;
        display: block;
        border: 5px solid #ececec;
    }
    .widget_user_list_new .widget_img_box img {
        width: 100%;
        border-radius: 50%;
        height: -webkit-fill-available;
    }
    .widget_user_list_new .widget-item {
        position: relative;
    }
    .widget_user_list_new .widget-item .controller.right {
        top: 10px;
    }
    .widget_user_list_new .widget-item .controller a, .item_card .widget-item .controller a {
        background: none !important;
        padding-left: 10px;
        color: #ccc;
    }
    .widget_user_list_new .widget-title {
        width: 100%;
        float: left;
    }
    .widget_user_list_new .widget-title h4 {
        font-weight: 600;
        text-align: center;
        color: #000000;
        letter-spacing: 1px;
    }
    .widget_user_list_new .widget-title h5 {
        font-weight: 400;
        text-align: center;
        letter-spacing: .8px;
        color: #000000;
        padding-bottom: 20px;
    }
    .grid.simple .grid-body{
        padding:10px !important;
    }
    .widget_user_list_new .widget-user-details {
        border-top: 1px solid #a7a4a4;
        padding: 15px;
        width: 100%;
        float: left;
        background: #039347;
    }

        .cardViewTable .table-condensed thead{
        display:none;
    }
    .cardViewTable tr td{
        width:100% !important;
        display: block;
    }
    .cardViewTable .DTTT {
        display:none !important;
    }
    .cardViewTable .select2-container .select2-choice .select2-arrow b:before{
        content:"" !important;  
    }
    .cardViewTable .select2-container{
        width: 60px !important;
    }
    .cardViewTable .select2-container .select2-choice{
        height: 35px;
        padding: 6px 0 6px 8px;
        border-radius: 4px !important;
        border: 1px solid #dbdbdb;
    }
    .cardViewTable .select2-container .select2-choice .select2-arrow{
        background: transparent;
        border-left: none;
    }
    .cardViewTable .table td{
        border-top: none !important;
    }
    .widget_user_list_new .widget-user-details .widget-action-block{
    border-top: 1px solid rgba(255, 255, 255, 0.43);
    padding-top: 8px;
    padding-bottom: 8px;
    width: 100%;
    float: left;
    text-align: center;
    }
</style>
@endsection
@section('content')
    <div class="content">
        <div class="page-title"> 
            <a class="previousBtn" href="{{ url()->previous() }}">
                <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive" />
            </a>
            <h3>Vehicle List </h3>

            <!-- @if(hasPermissionThroughRole('add_employee')) -->
            <a href="{{ route('vehicle.form') }}" class="new_btn_add_service"><i class="fa fa-plus"></i> Add New Vehicles </a>
            <!-- @endif -->

            <div class="serchBarDiv">
                <div class="searchContainer">
                    <input class="searchBox search_field" type="search" id="searchVehicle" name="search" placeholder="Search">
                    <i class="fa fa-search searchIcon"></i>
                </div>
            </div>
        </div>

        @if(Session::has('message')) 
            <div class="alert alert-info">
                {{Session::get('message')}} 
            </div> 
        @endif

        <div class="row empLstMainBox">
            <div class="col-md-12">
                <div class="row listContainer" id="allfilterApply1">
                    @if(isset($vehicles) && !empty($vehicles))
                        @foreach($vehicles as $veh)
                        <div class="col-md-3">
                            <div class="mainWidget_ng listVehicle_ng">
                                <div class="head_ng borderBottomNone">
                                    <div class="grid_box new_srv_box">
                                        <div class="controller overlay">
                                            @if(hasPermissionThroughRole('delete_vehicle'))
                                            <a href="{{ url('admin/vehicles/destroy/'.$veh->id) }}" onclick="return confirmation();" class="EditService editSub_btn pull-left dlt_btn" title="Delete Vendor">
                                                <i class="fa fa-times"></i>
                                            </a>
                                            @endif 

                                            @if(hasPermissionThroughRole('edit_vehicle'))
                                            <a href="{{ url('admin/vehicles/editVehicle/'.$veh->id) }}" class=" pull-right edt_btn " title="Edit Vendor">
                                                <img src="{{ asset('public/img//edit_icons.png') }}" class="img-responsive">
                                            </a>  
                                            @endif                                     
                                        </div>
                                    </div>

                                    <div class="icon_div">
                                    @if(isset($veh->vehicle_pic) && !empty($veh->vehicle_pic))
                                        <img src="{{ fileurlvehicle().$veh->vehicle_pic }}" class="img-responsive">
                                    @else
                                        <img src="{{ asset('public/img/vehicleDefault.png') }}" class="img-responsive">
                                    @endif
                                    </div>
                                    <h4 class="text-center">{{ $veh->manufacturer }}</h4>
                                </div>

                                <div class="title">
                                    <h4>Vehicle No. <span>{{ $veh->vehicle_no }}</span></h4>
                                </div>

                                <div class="content_opt borderTop_none"> 
                                    <div class="card_loc">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="tiles-title card-text-heading">Registration Number</div>
                                                <div class="job_st_details">{{ $veh->registration_number }}</div>
                                            </div>
                                        </div>
                                    </div>    

                                    <div class="card_loc">
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <div class="tiles-title card-text-heading">Registration Expiration</div>
                                                <div class="job_st_details">{{ date('d/m/y', strtotime($veh->registration_expiration)) }}</div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <div class="tiles-title card-text-heading">Current Status</div>
                                                @if($veh->status == 1)
                                                <div class="job_st_details">Available</div>
                                                @elseif($veh->status == 2)
                                                <div class="job_st_details">Ongoing</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card_loc">
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <div class="tiles-title card-text-heading">Vehicle Colour</div>
                                                <div class="job_st_details">{{ $veh->vehilce_color }}</div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <div class="tiles-title card-text-heading">Vehicle Partner</div>
                                                <div class="job_st_details">{{ $veh->vehicle_partner }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="newActBtn_ng">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                @if(hasPermissionThroughRole('view_vehicle_info'))
                                                    <a href="{{ url('admin/vehicles/viewVehicle/'.$veh->id) }}" class="btn">Vehicle Info</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <div class="col-md-12">
                        <div class="content-box-main">
                            <h4 class="text-center">No Record Found!</h4>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-md-1"></div>
        </div>    

    </div>   

@endsection
@section('js')
<script>
function confirmation() {
    return confirm('Are you sure you want to delete this Vehicle record?');
}
$('#searchVehicle').on('keyup',function(){ 
    //if($(this).val().length >= 2) {
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : "{{ route('vehicles.search') }}",
            data:{
                'search':$value
                },
            success:function(data){
                
                var json = $.parseJSON(data);
                 //alert(json);
                 console.log(json);
                 var htmlslot;
                 $('#allfilterApply1').html('');
                if(json.length > 0){
                    $.each(json,function(index, value){
                   
                        var vehicle_image='';
                        var vehicle_image1 = "<?php echo fileurlvehicle(); ?>"+ value.vehicle_pic;
                        if(value.vehicle_pic == null || value.vehicle_pic == ''){
                            var vehicle_image = '<img src="{{ asset("public/img/vehicleDefault.png") }}" class="img-responsive" />';
                        }else{
                            var vehicle_image = '<img src="'+ vehicle_image1 +'" class="img-responsive">';
                        }
                        var edit_permission='';
                        if("<?php echo hasPermissionThroughRole('edit_vehicle'); ?>"){
                            var edit_permission = '<a href="http://3.16.87.53/admin/admin/vehicles/editVehicle/'+value.id+'" class=" pull-right edt_btn " title="Edit Vehicle"><img src="{{ asset("public/img/edit_icons.png") }}" class="img-responsive"></a>';
                        }
                        var delete_permission='';
                        if("<?php echo hasPermissionThroughRole('delete_vehicle'); ?>"){
                            var delete_permission = '<a href="http://3.16.87.53/admin/vehicles/destroy/'+value.id+'" onclick="return confirmation();" class="EditService editSub_btn pull-left dlt_btn" title="Delete vehicle"><i class="fa fa-times"></i></a>';
                        }
                        var view_vehicle_info_permission='';
                        if("<?php echo hasPermissionThroughRole('view_vehicle_info'); ?>"){
                            var view_vehicle_info_permission = '<a href="http://3.16.87.53/admin/admin/vehicles/viewVehicle/'+value.id+'" class="btn">Vehicle Info</a>';
                        }
                        var vehicle_status='';
                        if(value.status==1){
                            vehicle_status="Available";      
                        }else{
                            vehicle_status="Ongoing";
                        }

                        htmlslot='<div class="col-md-3">'+
                                '<div class="mainWidget_ng listVehicle_ng">'+
                                    '<div class="head_ng borderBottomNone">'+
                                        '<div class="grid_box new_srv_box">'+
                                            '<div class="controller overlay">'+
                                                ''+delete_permission+''+ 
                                                ''+edit_permission+''+                            
                                            '</div>'+
                                        '</div>'+

                                        '<div class="icon_div">'+
                                            ''+vehicle_image+''+
                                        '</div>'+
                                        '<h4 class="text-center">'+value.manufacturer+'</h4>'+
                                    '</div>'+

                                    '<div class="title">'+
                                        '<h4>Vehicle No. <span>'+value.vehicle_no+'</span></h4>'+
                                    '</div>'+

                                    '<div class="content_opt borderTop_none">'+ 
                                        '<div class="card_loc">'+
                                            '<div class="row">'+
                                                '<div class="col-md-12">'+
                                                    '<div class="tiles-title card-text-heading">Registration Number</div>'+
                                                    '<div class="job_st_details">'+
                                                    ''+value.registration_number+''+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+    

                                        '<div class="card_loc">'+
                                            '<div class="row">'+
                                                '<div class="col-md-6 ">'+
                                                    '<div class="tiles-title card-text-heading">Registration Expiration</div>'+
                                                    '<div class="job_st_details">'+
                                                        ''+value.registration_expiration+''+
                                                        '</div>'+
                                                '</div>'+

                                                '<div class="col-md-6 col-sm-6 col-xs-6">'+
                                                    '<div class="tiles-title card-text-heading">Current Status</div>'+
                                                    '<div class="job_st_details">'+vehicle_status+'</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+

                                        '<div class="card_loc">'+
                                            '<div class="row">'+
                                                '<div class="col-md-6 ">'+
                                                    '<div class="tiles-title card-text-heading">Vehicle Colour</div>'+
                                                    '<div class="job_st_details">'+
                                                        ''+value.vehilce_color+''+
                                                    '</div>'+
                                                '</div>'+

                                                '<div class="col-md-6 col-sm-6 col-xs-6">'+
                                                    '<div class="tiles-title card-text-heading">Vehicle Partner</div>'+
                                                    '<div class="job_st_details">'+
                                                        ''+value.vehicle_partner+''+
                                                        '</div>'+
                                                ' </div>'+
                                            '</div>'+
                                        '</div>'+

                                        '<div class="newActBtn_ng">'+
                                            '<div class="row">'+
                                                '<div class="col-md-12 text-center">'+
                                                        ''+view_vehicle_info_permission+''+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+ 
                                    '</div>'+
                                '</div>'+
                            '</div>'
                        ;
                        $("#allfilterApply1").append(htmlslot);
                    });
                }else{
                    htmlslot='<div class="col-md-12"><div class="content-box-main">'+
                                '<h4 class="text-center">No Record Found!</h4>'+
                            '</div></div>';
                    
                    $("#allfilterApply1").append(htmlslot);
                }
                
            }
        });
    //}
})
</script>
@endsection