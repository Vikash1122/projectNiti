@extends('admin.layouts.slot_layout')

    @section('content')
        <div class="content">
            <div class="page-title"> 
                <a href="{{ url()->previous() }}" class="previousBtn">
                    <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
                </a>
                <h3>Teams</h3>
                
                <a href="{{ route('groups.form') }}" class="new_btn_add_service"><i class="fa fa-plus"></i>Create New Team </a>
                <div class="serchBarDiv">
                    <div class="searchContainer">
                        <input class="searchBox" type="search" id="searchTeamName" name="search" placeholder="Search">
                        <i class="fa fa-search searchIcon"></i>
                    </div>
                </div>
            </div>

            @if(Session::has('message')) 
                <div class="alert alert-info">
                    {{Session::get('message')}} 
                </div> 
            @endif

            <div class="content-box-main-groupList">
                <div class="titleBar"><h3>Team List</h3></div>
                <div class="content-box-main">
                    <div class="row" >
                        <div class="col-md-12">
                            <div class="teamContainer" id="searchData">
                                @if(isset($groups[0]) && !empty($groups[0]))
                                <?php $i=1; ?>
                                    @foreach($groups as $gp)
                                    <!-- <div class="col-md-4"> -->
                                            <div class="teamBox-ng1">
                                                <div class="serialNo">{{ $i++ }}</div>
                                                <div class="flex-container">
                                                    <div class="leftFlex">
                                                        <div class="flex-item item1">
                                                            <div class="odrInner">
                                                                <div class="labelText">Team Name</div>
                                                                <div class="labelValue">{{ $gp->group_name }}</div>
                                                            </div>
                                                            <div class="odrInner">
                                                                <div class="labelText">Team Leader</div>
                                                                <div class="labelValue">{{ $gp->teamleader }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-item item2">
                                                            <div class="odrInner">
                                                                <?php $emp_name = explode(',', $gp->employee);
                                                                
                                                                ?>
                                                                @if(isset($emp_name[0]) && !empty($emp_name[0]))
                                                                <div class="labelValue">{{ $emp_name[0] }}</div>
                                                                @endif
                                                                @if(isset($emp_name[1]) && !empty($emp_name[1]))
                                                                <div class="labelValue">{{ $emp_name[1] }}</div>
                                                                @endif
                                                                @if(isset($emp_name[2]) && !empty($emp_name[2]))
                                                                <div class="labelValue">{{ $emp_name[2] }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="flex-item item3"> -->
                                                    <div class="rightFlex">
                                                        <a href="{{ url('admin/orders/groups/editGroup/'.$gp->id) }}" class="">more Details <span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    <!-- </div> -->
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="content-box-main">
                        <div class="row" id="groupDivid">
                        @if(isset($groups[0]) && !empty($groups[0]))
                        @foreach($groups as $gp)
                            <div class="col-md-6">
                                <div class="order_history_box groupList relativePosition">
                                    <div class="controller overlay">
                                    @if(hasPermissionThroughRole('edit_group'))
                                        <a class="edt_btn border_radius_right pull-left" href="{{ url('admin/orders/groups/editGroup/'.$gp->id) }}" data-toggle="modal" ><i class="fa fa-pencil"></i></a>
                                    @endif
                                    @if(hasPermissionThroughRole('delete_groups'))
                                        <a class="dlt_btn border_radius_left  pull-right" href="{{ url('admin/orders/groups/destroy/'.$gp->id) }}" data-toggle="modal" title="Delete Group"><i class="fa fa-times"></i></a>
                                    @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="job_desc_box_list">
                                                <div class="title">
                                                    <h5>Group Name : &nbsp; <span class="srv_name text-capitalize">{{ $gp->group_name }}</span></h5>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4 col-xs-4">
                                                    <div class="jd_list_cust_img_box">
                                                        <div class="widget_img_box">
                                                        @if(isset($gp->teamleader_image) && !empty($gp->teamleader_image))
                                                            <img src="{{ fileurlemp().$gp->teamleader_image }}" class="img-responsive">
                                                        @else
                                                            <img src="{{ asset('public/img/defaultIcon.png') }}" class="img-responsive">
                                                        @endif
                                                        </div>
                                                    </div> 
                                                    <div class="groupListDiv">
                                                        <div class="row">
                                                            <div class="col-sm-12 text-center">
                                                                <h5 class="fontWeight600">{{ $gp->teamleader }}</h5>
                                                                <p class="tm_role"> (Team Leader) <span></span></p>
                                                            </div>
                                                        </div>
                                                    </div> 

                                                </div>

                                                <div class="col-sm-8 col-xs-8">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="groupListCardDiv">
                                                                <h5>Start Time</h5>
                                                                <p class="tm_role">Morning 9:30 AM</p>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="groupListCardDiv">
                                                                <h5>Team Size</h5>
                                                                <div class="teamSize">{{ $gp->total_emp }}</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="groupListCardDiv">
                                                                <h5>Services</h5>
                                                                <p class="tm_role">{{ substr($gp->services, 0, 35) . '...' }} </p>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                            
                                            <hr />

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="vhlInfMain">
                                                        <div class="drv_outer_img_box">
                                                            <div class="widget_img_box">
                                                            @if(isset($gp->driver_image) && !empty($gp->driver_image))
                                                                <img src="{{ fileurlemp().$gp->driver_image }}" class="img-responsive">
                                                            @else
                                                                <img src="{{ asset('public/img/defaultIcon.png') }}" class="img-responsive">
                                                            @endif
                                                            </div>
                                                        </div>

                                                        <div class="groupListDivNew">
                                                            <p class="tm_role">{{ $gp->driver }} <span> (Driver)</span></p>
                                                            <p class="vhl_inf">Vehicle No :  {{ $gp->vehicle_no }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                            
                        </div>
                        
                    </div>
                </div>
            </div> -->
        </div>  
@endsection
@section('js')
<script>
$('#searchTeamName').on('keyup',function(){ 
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : "{{ route('groups.search') }}",
            data:{
                'search':$value
                },
            success:function(data){
                
                var json = $.parseJSON(data);
                 //alert(json);
                 console.log(json);
                 //if(data != "" || data != null){
               // if(data){
                if(json.length>0){
                 var htmlslot;
                 $('#searchData').html('');
                 var i=1;
                $.each(json,function(index, value){
                    var myStr = value.employee.split(",");
                                
                    htmlslot='<div class="teamBox-ng1">'+
                                    '<div class="serialNo">'+(i)+
                                     '</div>'+
                                    '<div class="flex-container">'+
                                        '<div class="leftFlex">'+
                                            '<div class="flex-item item1">'+
                                                '<div class="odrInner">'+
                                                    '<div class="labelText">Team Name</div>'+
                                                    '<div class="labelValue">'+value.group_name+'</div>'+
                                                '</div>'+
                                                '<div class="odrInner">'+
                                                    '<div class="labelText">Team Leader</div>'+
                                                    '<div class="labelValue">'+value.teamleader+'</div>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="flex-item item2">'+
                                                '<div class="odrInner">';
                                                for(var t = 0; t < myStr.length; t++){
                                                    if(t<3){
                                                        htmlslot+= '<div class="labelValue">'+myStr[t]+'</div>';
                                                            }
                                                    }     
                                    htmlslot+= '</div>'+
                                            '</div>'+
                                        '</div>'+

                                        '<div class="rightFlex">'+
                                            '<a href="" class="">more Details <span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>'+
                                        '</div>'+
                                    '</div>'+
                               ' </div>'
                    ;
                    $("#searchData").append(htmlslot);
                    i++;
                });
                 }else {
                    $('#searchData').html('');
                     htmlslot='<div class="error_log"><p class="error"><strong>Data Not Found!..</strong></p></div>';
                    $("#searchData").append(htmlslot);
                }
            }
        });
})
</script>
@endsection