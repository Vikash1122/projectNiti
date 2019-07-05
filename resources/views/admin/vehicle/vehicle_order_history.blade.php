@extends('admin.layouts.emp_layout')

@section('content')
    <style>
        .teamSize{
            width: 100%;
            background: rgba(0, 0, 0, 0.2);
            height: 100% !important;
            border-radius: 0;
        }
    </style>

    <div class="content">
        <div class="page-title"> 
            <a href="{{ url()->previous() }}" class="previousBtn">
                <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive" />
            </a>
            <h3>Vehicle  <span class="semi-bold">&nbsp;</span></h3>
            <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Order History </h3></div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="content-box-main">
                    <div class="box">
                        <div class="row">
                            <div class="col-xl-3 col-md-3">
                                <div class="mainWidget_ng listVehicle_ng">
                                    <div class="head_ng borderBottomNone">
                                        <div class="icon_div">
                                        @if(isset($vehicle->vehicle_pic) && !empty($vehicle->vehicle_pic))
                                            <img src="{{ fileurlvehicle().$vehicle->vehicle_pic }}" class="img-responsive padding0">
                                        @else
                                            <img src="{{ asset('public/img/vehicleDefault1.png') }}" class="img-responsive padding0">
                                        @endif
                                            
                                        </div>
                                        <h4 class="text-center">{{ $vehicle->manufacturer }}</h4>
                                    </div>

                                    <div class="title history_order_ng_vnum">
                                        <h4>Vehicle No. <span>{{ $vehicle->vehicle_no }}</span></h4>
                                    </div>

                                    <div class="content_opt borderTop_none"> 
                                        <div class="card_loc">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="tiles-title card-text-heading">Registration Number</div>
                                                    <div class="job_st_details">{{ $vehicle->registration_number }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="card_loc">
                                            <div class="row">
                                                <div class="col-md-6 ">
                                                    <div class="tiles-title card-text-heading">Registration Expiration</div>
                                                    <div class="job_st_details">{{ date('d/m/y', strtotime($vehicle->registration_expiration)) }}</div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <div class="tiles-title card-text-heading">Current Status</div>
                                                    @if($vehicle->status == 1)
                                                    <div class="job_st_details">Available</div>
                                                    @elseif($vehicle->status == 2)
                                                    <div class="job_st_details">Ongoing</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card_loc">
                                            <div class="row">
                                                <div class="col-md-6 ">
                                                    <div class="tiles-title card-text-heading">Vehicle Colour</div>
                                                    <div class="job_st_details">{{ $vehicle->vehilce_color }}</div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <div class="tiles-title card-text-heading">Vehicle Partner</div>
                                                    <div class="job_st_details">{{ $vehicle->vehicle_partner }}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="newActBtn_ng">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    @if(hasPermissionThroughRole('view_vehicle_info'))
                                                        <a href="{{ url('admin/vehicles/viewVehicle/'.$vehicle->id) }}" class="btn">Vehicle Info</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-9 col-md-9 order_history_box_main">
                                <div class="box-body boxDetailsHeadings">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="headSec">
                                                <h3 class="profile-username text-capitalize pull-left">Order List</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @if(isset($vehicle->drivers[0]->job_id) && !empty($vehicle->drivers[0]->job_id))
                                    @foreach($vehicle->drivers as $job)
                                    <?php 
                                    $total = explode(',',$job->group_emp);
                                    ?>
                                    <div class="order_history_box">
                                        <div class="row">   
                                            <div class="col-md-12">
                                                <div class="dtl_order-hd">
                                                    <h5 class="pull-left">Job Code - <span>#{{ $job->job_id }}</span></h5>
                                                    @if($job->status == 3)
                                                    <h5 class="pull-right pending"> Requested</h5>
                                                    @elseif($job->status == 4)
                                                    <h5 class="pull-right text-green"> Service Team Alloted</h5>
                                                    @elseif($job->status == 5)
                                                    <h5 class="pull-right text-orange"> In Process</h5>
                                                    @elseif($job->status == 6)
                                                    <h5 class="pull-right text-orange"> Proposed</h5>
                                                    @elseif($job->status == 7)
                                                    <h5 class="pull-right text-green"> Payment Done</h5>
                                                    @elseif($job->status == 8)
                                                    <h5 class="pull-right text-green"> Completed</h5>
                                                    @elseif($job->status == 9)
                                                    <h5 class="pull-right job_sts"> Rejected</h5>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>    

                                        <div class="row">
                                            <div class="col-md-4">
                                                <h5>Service Name</h5>
                                                <p>{{ $job->services }}</p>
                                            </div>

                                            <div class="col-md-4 text-center">
                                                <h5>Job Date</h5>
                                                <p>{{ date('d/m/y', strtotime($job->job_date)) }}</p>
                                            </div>

                                            <!-- <div class="col-md-3">
                                                <h5>Total working day</h5>
                                                <p>5 Days</p>
                                            </div> -->
                                            <div class="col-md-4 text-right">
                                                <h5>Team size</h5>
                                                <p class="odr-tm-count">
                                                    <a data-toggle="modal" data-target=".bs-example-modal-lg" data-id="{{ $job->job_id }}" class="getEmpDetail"> {{ count($job->ids) }} Members</a>
                                                </p>
                                            </div>
                                        </div> 

                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5>Job Location</h5>
                                                <p>{{ $job->address }}</p>
                                            </div>

                                            <div class="col-md-6 text-right">
                                                <h5>&nbsp;</h5>
                                                <span class="odr-tm-count"><a href="javascript:;" data-toggle="modal" data-target="#myModal">Inventories</a></span>
                                                <!-- <span class="odr-tm-dt"><a href="#" >View Job Details</a></span> -->
                                            </div>
                                        </div> 
                                    </div>
                                    @endforeach
                                    @else

                                    @endif
                                   

                                    <!-------------- Team Member modal ---------------->
                                    <div class="modal fade bs-example-modal-lg teamSize" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                        <div class="modal-dialog" role="document"> 
                                            <div class="modal-content"> 
                                                <div class="modal-header"> 
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button> 
                                                    <h4 class="modal-title" id="myLargeModalLabel">Job Code - JD4040</h4> 
                                                </div> 
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4>Team Members</h4>
                                                            <ul id="empData">
                                                                

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>

                                    <!------------------------------>

                                    <div class="modal fade inventoryModal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Job Code - JD4040</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4>Inventory Product List <a href="" class="pull-right">Order No. - ( #JD40401545 )</a></h4>
                                                        <ul>
                                                            <li>
                                                                <a href="view_emp_details.php">
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <div class="profile-img-wrapper pull-left m-l-10">
                                                                                <div class=" p-r-10">
                                                                                    <img src="{{ asset('public/img/no-preview-item.jpg') }}" alt="" data-src="{{ asset('public/img/no-preview-item.jpg') }}" width="35" height="35"> 
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="user-name text-black bold large-text"> Wire </div>
                                                                            <div class="preview-wrapper"><span class="bold">Type - .2mm</span></div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="user-name text-black "> Quantity </div>
                                                                            <div class="preview-wrapper"><span class="bold">5 M</span></div>
                                                                        </div>
                                                                    </div>  
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="view_emp_details.php">
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <div class="profile-img-wrapper pull-left m-l-10">
                                                                                <div class=" p-r-10">
                                                                                    <img src="{{ asset('public/img/no-preview-item.jpg') }}" alt="" data-src="{{ asset('public/img/no-preview-item.jpg') }}" width="35" height="35"> 
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="user-name text-black bold large-text"> HAMBER </div>
                                                                            <div class="preview-wrapper"><span class="bold">Type - Plastic</span></div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="user-name text-black "> Quantity </div>
                                                                            <div class="preview-wrapper"><span class="bold">3</span></div>
                                                                        </div>
                                                                    </div>  
                                                                </a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>        
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!------------------------------>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div> 
@endsection
@section('js')
<script>
$('.getEmpDetail').on('click',function(){ 
    var id = $(this).attr("data-id");
    var token = "{{ csrf_token() }}";
    $('#myLargeModalLabel').html('Job Code - '+id+'');
    $.ajax({
        type : 'post',
        url : "{{ route('vehicles.ajaxEmp') }}",
        data:{
            'job_id':id,"_token":token
            },
        success:function(data){
            
            var json = $.parseJSON(data);
                //alert(json);
                console.log(json);
                var htmlslot;
                $('#empData').html('');
            if(json.length > 0){
                $.each(json,function(index, value){
                
                    var emp_image='';
                    var emp_image1 = "<?php echo fileurlemp(); ?>"+ value.emp_profile;
                    if(value.emp_profile == null || value.emp_profile == ''){
                        var emp_image = '<img src="{{ asset("public/img/profiles/avatar_small.jpg") }}" alt="" data-src="{{ asset("public/img/profiles/avatar_small.jpg") }}" width="35" height="35">';
                    }else{
                        var emp_image = '<img src="'+ emp_image1 +'" alt="" data-src="{{ asset("public/img/profiles/avatar_small.jpg") }}" width="35" height="35">';
                    }
                    htmlslot='<li>'+
                                '<a href="{{ url("admin/employees/employeeProfile") }}/'+value.emp_id+'">'+
                                    '<div class="row">'+
                                        '<div class="col-md-2">'+
                                            '<div class="profile-img-wrapper pull-left m-l-10">'+
                                                '<div class=" p-r-10">'+
                                                    ''+emp_image+''+ 
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-md-10">'+
                                            '<div class="user-name text-black bold large-text"> '+value.employee_name+' <span class="semi-bold">Smith</span> </div>'+
                                            '<div class="preview-wrapper"><span class="bold">'+value.emp_mobile+'</span></div>'+
                                        '</div>'+
                                    '</div>  '+
                                '</a>'+
                            '</li>'
                    ;
                    $("#empData").append(htmlslot);
                });
            }else{
                htmlslot='<li class="text-center">No Record Found!</li>';
                
                $("#empData").append(htmlslot);
            }
            
        }
    });
});
</script>
@endsection