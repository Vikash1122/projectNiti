
<?php $__env->startSection('css'); ?>
<style>
    @font-face {
    font-family: 'Nexa Bold';
    src: url("<?php echo e(asset('public/fonts/Nexa Bold.otf')); ?>");
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

    .req_sr_card_dt_panel .jd_desc_blk {
        min-height: 120px;
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
    .listSubSr{
        padding-left:10px;
        padding-right:10px;
    }
    .amc_inf{
        line-height:1.5 !important;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<div class="content">
    <div class="page-title"> 
        <a class="previousBtn" href="<?php echo e(url()->previous()); ?>">
            <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
        </a>
        <h3>All Orders</h3>

        <!-- <a href="#" class="new_btn_add_service"><i class="fa fa-plus"></i> Add New Order </a> -->

        <div class="form-filter">
            <div class="flt">
                <select class="" name="days" id="dayDt" onchange="filter();">
                    <option value="All" selected>All</option>
                    <option value="15 Days">Last 15 Days</option>
                    <option value="30 Days">Last 30 Days</option>
                </select>
            </div>
            <div class="flt">
                <select class="" name="order" id="orderAcc" onchange="filterOrder();">
                    <option value="">Sort: Order No.</option>
                    <option value="Ascending">Ascending</option>
                    <option value="Descending">Descending</option>
                    <option value="All">All</option>
                </select>
            </div>
        </div>

        <div class="serchBarDiv">
            <div class="searchContainer">
                <input class="searchBox" type="search" id="searchOrder" name="search" placeholder="Search">
                <i class="fa fa-search searchIcon"></i>
            </div>
        </div>
    </div>

    <?php if(Session::has('message')): ?> 
        <div class="alert alert-info">
            <?php echo e(Session::get('message')); ?> 
        </div> 
    <?php endif; ?>
    
    <div class="row">
        <div class="col-md-12">
            <div class="categoriProJobs">
                <ul>
                    <li onclick="location.href='<?php echo e(route('admin.orders')); ?>'">PPMP</li>
                    <li class="activeCategory">Jobs</li>
                    <li>Projects</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="orderFilters">
                <ul>
                    <!-- <li class="activeFtr">All</li>
                    <li class="text-orange">Requested</li>
                    <li class="text-green-light">Proposed</li>
                    <li class="text-green">Scheduled</li>
                    <li class="text-light-blue">In Progress</li>
                    <li class="">Completed</li>
                    <li class="text-megenta">On Hold</li>
                    <li class="text-maroon">Canceled</li>
                    <li class="text-brown">Rejected</li> -->

                    <li class="activeFtr" onclick="filterStatus('All');">All</li>
                    <li class="text-orange" onclick="filterStatus(3);">Requested</li>
                    <!-- <li class="text-yellow">Surveyed</li> -->
                    <li class="text-green" onclick="filterStatus(4);">Scheduled</li>
                    <li class="text-light-blue" onclick="filterStatus(5);">In Progress</li>
                    <li class="text-green-light" onclick="filterStatus(6);">Proposed</li>
                    <li class="text-megenta" onclick="filterStatus(7);">Payment Done</li>
                    <li class="" onclick="filterStatus(8);">Completed</li>
                    <li class="text-brown" onclick="filterStatus(9);">Rejected</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-box-main newPadding">
        

        <div class="row" id="allOrderFilter">
            <?php if(isset($orders[0]) && !empty($orders[0])): ?>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ordr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($ordr['amc_type'] == 0): ?>
                    <div class="col-md-12">
                        <div class="orderBox_ng">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h4>JOB No. <?php echo e($ordr['id']); ?></h4>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="odrInner">
                                                <div class="labelText">JOB Date</div>
                                                <div class="labelValue"><?php echo e(date("d-F, Y", strtotime($ordr['job_date']))); ?></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="odrInner">
                                                <div class="labelText">Customer Name</div>
                                                <div class="labelValue"><?php echo e($ordr['firstname'].' '.$ordr['lastname']); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="odrInner">
                                                <div class="labelText">AMC holder</div>
                                                <div class="labelValue">AMC No. <?php echo e($ordr['amc_id']); ?></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="odrInner">
                                                <div class="labelText">Location</div>
                                                <div class="labelValue"><?php echo e(substr($ordr['address'], 0, 30) . '...'); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="odrInner">
                                                <div class="labelText">JOB Duration</div>
                                                <div class="labelValue">45 minutes</div>
                                            </div>
                                            <div class="odrInner">
                                                <div class="labelText">Estimated Start Time</div>
                                                <div class="labelValue"><?php echo e($ordr['slotstart_time']); ?></div>
                                            </div>
                                            <div class="odrInner">
                                                <div class="labelText">JOB Status</div>
                                                <?php if($ordr['status'] == 3): ?>
                                                    <div class="text-orange">Requested</div>
                                                <?php elseif($ordr['status'] == 4): ?>
                                                    <div class="text-green">Service Team Alloted</div>
                                                <?php elseif($ordr['status'] == 5): ?>
                                                    <div class="text-light-blue">In Process</div>
                                                <?php elseif($ordr['status'] == 6): ?>
                                                    <div class="text-green-light">Proposed</div>
                                                <?php elseif($ordr['status'] == 7): ?>
                                                    <div class="text-green">Payment Done</div>
                                                <?php elseif($ordr['status'] == 8): ?>
                                                    <div class="">Completed</div>
                                                <?php elseif($ordr['status'] == 9): ?>
                                                    <div class="text-brown">Rejected</div>
                                                <?php endif; ?>
                                                
                                            </div>
                                        </div>
                                        <?php if($ordr['status'] == 4 || $ordr['status'] == 5 || $ordr['status'] == 6 || $ordr['status'] == 7 || $ordr['status'] == 8 || $ordr['status'] == 9): ?>
                                        <div class="col-sm-6">
                                            <div class="odrInner">
                                                <div class="imgIconOdr">
                                                <?php if(isset($ordr['group']['teamleader_image']) && !empty($ordr['group']['teamleader_image'])): ?>
                                                    <img src="<?php echo e(fileurlemp().$ordr['group']['teamleader_image']); ?>" class="img-responsive" />
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="img-responsive" />
                                                <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="odrInner">
                                                <div class="labelText">Team Leader</div>
                                                <div class="labelValue"><?php echo e($ordr['group']['teamleader']); ?></div>
                                            </div>
                                        </div>
                                        <?php else: ?>
                                        <div class="col-sm-6">
                                            <div class="odrInner">
                                                <div class="imgIconOdr">
                                                    <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="img-responsive" />
                                                </div>
                                            </div>
                                            <div class="odrInner">
                                                <div class="labelText">Team Leader</div>
                                                <div class="labelValue">Not Assign</div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="odrInner">
                                                <div class="labelText">Team Members</div>
                                                <?php if($ordr['status'] == 4 || $ordr['status'] == 5 || $ordr['status'] == 6 || $ordr['status'] == 7 || $ordr['status'] == 8 || $ordr['status'] == 9): ?>
                                                <div class="labelValue"><?php echo e($ordr['group']['total_emp']); ?></div>
                                                <?php else: ?>
                                                <div class="labelValue">Not Assign</div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="odrInner">
                                                <div class="labelText">Number</div>
                                                <?php if($ordr['status'] == 4 || $ordr['status'] == 5 || $ordr['status'] == 6 || $ordr['status'] == 7 || $ordr['status'] == 8 || $ordr['status'] == 9): ?>
                                                <div class="labelValue"><?php echo e($ordr['group']['leaderMobile']); ?></div>
                                                <?php else: ?>
                                                <div class="labelValue">Not Assign</div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="odrInner">
                                                <div class="labelText">Service Type</div>
                                                <div class="labelValue"><?php echo e(ucwords($ordr['service_type'])); ?></div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-5">
                                            <div class="odrInner">
                                                <div class="labelText">JOB Service</div>
                                                <div class="orderServiceIcon">
                                                <?php if(isset($ordr['services'][0]) && !empty($ordr['services'][0])): ?>
                                                <?php $__currentLoopData = $ordr['services']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <img src="<?php echo e(fileurlservice().$service->service_icon); ?>" class="img-responsive">
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- <div class="odrInner">
                                                <a href="" class="orderLinkButton">Track</a>
                                                <a href="" class="orderLinkButton">Schedule</a>
                                            </div> -->
                                        </div>

                                        <div class="col-sm-3">
                                            <a href="<?php echo e(url('admin/orders/viewOrder/'.$ordr['id'])); ?>" class="orderMoreBtn">more Details <span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>    

<!--Route Plan-->
<div class="modal fade largeModal routePlan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Prem Maurya</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 sub_service_form">
                        <form action="" method="">
                            <div class="content-box-main">
                                <div class="allotOrderScroller" id="style-1">
                                    <div class="force-overflow">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="content-box-main"> 
                                                    <div class="header_main_div_sec">
                                                        <div class="title">
                                                            <h5>Route Plan</h5>
                                                        </div>       
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="order_history_box">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form_control_new">
                                                                            <div class="sub_ser_box_header" style="background: #e2e5e7;color: #000;">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">Job No</div>
                                                                                    <div class="col-md-3">Arriving Time</div>
                                                                                    <div class="col-md-3">Location</div>
                                                                                    <div class="col-md-2">Distance</div>
                                                                                    <div class="col-md-2">Navigate</div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="srv_dt_slot">
                                                                                <div class="sub_ser_box_list">
                                                                                    <div class="row">
                                                                                        <div class="col-md-2">PLB001</div>

                                                                                        <div class="col-md-3">
                                                                                            <div class="">Morning - 9:40 AM </div>
                                                                                        </div>

                                                                                        <div class="col-md-3">
                                                                                            <div class=""> A-25 DLF Phase-5 Gurugram</div>
                                                                                        </div>

                                                                                        <div class="col-md-2">
                                                                                            <div class="">10 KM</div>
                                                                                        </div>

                                                                                        <div class="col-md-2">
                                                                                            <button type="button" class="btn btn-primary btn-sm btn-small" >Navigate</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="sub_ser_box_list">
                                                                                    <div class="row">
                                                                                        <div class="col-md-2">NGB002</div>

                                                                                        <div class="col-md-3">
                                                                                            <div class="">Afternoon - 12:45 PM </div>
                                                                                        </div>

                                                                                        <div class="col-md-3">
                                                                                            <div class=""> Noida Sector 15</div>
                                                                                        </div>

                                                                                        <div class="col-md-2">
                                                                                            <div class="">20 KM</div>
                                                                                        </div>

                                                                                        <div class="col-md-2">
                                                                                            <button type="button" class="btn btn-primary btn-sm btn-small" >Navigate</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                </div>    
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>   
<?php $__env->startSection('js'); ?>
<script>
$('#searchOrder').on('keyup',function(){ 
    $value=$(this).val();
    $.ajax({
        type : 'get',
        url : "<?php echo e(route('orders.jobSearch')); ?>",
        data:{
            'search':$value
            },
        success:function(data){
            
            var json = $.parseJSON(data);
                console.log(json);
            if(json.length>0){
                var htmlslot;
                $('#allOrderFilter').html('');
                $.each(json,function(index, value){
                    var teamleader_image='';
                    var teamleader_image1 = "<?php echo fileurlemp(); ?>"+ value.group.teamleader_image;
                    if(value.group.teamleader_image == null || value.group.teamleader_image == ''){
                        var teamleader_image = '<img src="<?php echo e(asset("public/img/defaultIcon.png")); ?>" class="img-responsive" />';
            
                    }else{
                        var teamleader_image = '<img src="'+ teamleader_image1 +'" class="img-responsive">';
                    
                    } 
                    htmlslot='<div class="col-md-12">'+
                        '<div class="orderBox_ng">'+
                            '<div class="row">'+
                                '<div class="col-md-4">'+
                                    '<div class="row">'+
                                        '<div class="col-sm-6">'+
                                            '<h4>JOB No. '+value.id+'</h4>'+
                                        '</div>'+
                                        '<div class="col-sm-6">'+
                                            '<div class="odrInner">'+
                                                '<div class="labelText">JOB Date</div>'+
                                                '<div class="labelValue">'+value.job_date+'</div>'+
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
                                                '<div class="labelText">AMC holder</div>'+
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
                                                '<div class="labelText">JOB Duration</div>'+
                                                '<div class="labelValue">45 minutes</div>'+
                                            '</div>'+
                                            '<div class="odrInner">'+
                                                '<div class="labelText">Estimated Start Time</div>'+
                                                '<div class="labelValue">'+value.slotstart_time+'</div>'+
                                            '</div>'+
                                            '<div class="odrInner">'+
                                                '<div class="labelText">JOB Status</div>';
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
                                                    '<img src="<?php echo e(asset("public/img/defaultIcon.png")); ?>" class="img-responsive" />'+
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
                                        '</div>'+
                                        
                                        '<div class="col-sm-5">'+
                                            '<div class="odrInner">'+
                                                '<div class="labelText">JOB Service</div>'+
                                                '<div class="orderServiceIcon">';
                                                if(value.services[0] != ''){
                                                
                                                    $.each(value.services,function(index1, value1){
                                                        var service_image='';
                                                        var service_image1 = "<?php echo fileurlservice(); ?>"+ value1.service_icon;
                                                        if(value1.service_icon == null || value1.service_icon == ''){
                                                            var service_image = '<img src="<?php echo e(asset("public/img/defaultIcon.png")); ?>" class="img-responsive" />';
                                                
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
                    '</div>'
                    ;
                    $("#allOrderFilter").append(htmlslot);
                });
            }else{
                $('#allOrderFilter').html('');
                $('#allOrderFilter').append('<div class="col-md-12"><h4 class="text-center">No Record Found!</h4></div>');
            }
        }
    });
})
function filter(){
    var dayValue=$('#dayDt').val();
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    $.ajax({
        type : 'post',
        url : "<?php echo e(route('orders.jobFilter')); ?>",
        data:{
            'searchDay':dayValue,'searchOrder':''
            },
        success:function(data){
            
            var json = $.parseJSON(data);
            if(json.length>0){
                var htmlslot;
                $('#allOrderFilter').html('');
                $.each(json,function(index, value){
                    var teamleader_image='';
                    var teamleader_image1 = "<?php echo fileurlemp(); ?>"+ value.group.teamleader_image;
                    if(value.group.teamleader_image == null || value.group.teamleader_image == ''){
                        var teamleader_image = '<img src="<?php echo e(asset("public/img/defaultIcon.png")); ?>" class="img-responsive" />';
            
                    }else{
                        var teamleader_image = '<img src="'+ teamleader_image1 +'" class="img-responsive">';
                    
                    } 
                    htmlslot='<div class="col-md-12">'+
                        '<div class="orderBox_ng">'+
                            '<div class="row">'+
                                '<div class="col-md-4">'+
                                    '<div class="row">'+
                                        '<div class="col-sm-6">'+
                                            '<h4>JOB No. '+value.id+'</h4>'+
                                        '</div>'+
                                        '<div class="col-sm-6">'+
                                            '<div class="odrInner">'+
                                                '<div class="labelText">JOB Date</div>'+
                                                '<div class="labelValue">'+value.job_date+'</div>'+
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
                                                '<div class="labelText">AMC holder</div>'+
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
                                                '<div class="labelText">JOB Duration</div>'+
                                                '<div class="labelValue">45 minutes</div>'+
                                            '</div>'+
                                            '<div class="odrInner">'+
                                                '<div class="labelText">Estimated Start Time</div>'+
                                                '<div class="labelValue">'+value.slotstart_time+'</div>'+
                                            '</div>'+
                                            '<div class="odrInner">'+
                                                '<div class="labelText">JOB Status</div>';
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
                                                    '<img src="<?php echo e(asset("public/img/defaultIcon.png")); ?>" class="img-responsive" />'+
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
                                        '</div>'+
                                        
                                        '<div class="col-sm-5">'+
                                            '<div class="odrInner">'+
                                                '<div class="labelText">JOB Service</div>'+
                                                '<div class="orderServiceIcon">';
                                                if(value.services[0] != ''){
                                                
                                                    $.each(value.services,function(index1, value1){
                                                        var service_image='';
                                                        var service_image1 = "<?php echo fileurlservice(); ?>"+ value1.service_icon;
                                                        if(value1.service_icon == null || value1.service_icon == ''){
                                                            var service_image = '<img src="<?php echo e(asset("public/img/defaultIcon.png")); ?>" class="img-responsive" />';
                                                
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
                    '</div>'
                    ;
                    $("#allOrderFilter").append(htmlslot);
                });
            }else{
                $('#allOrderFilter').html('');
                $('#allOrderFilter').append('<div class="col-md-12"><h4 class="text-center">No Record Found!</h4></div>');
            }
        }
    });

}
function filterOrder(){
    var orderValue=$('#orderAcc').val();
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    $.ajax({
        type : 'post',
        url : "<?php echo e(route('orders.jobFilter')); ?>",
        data:{
            'searchDay':'','searchOrder':orderValue
            },
        success:function(data){
            
            var json = $.parseJSON(data);
            if(json.length>0){
                var htmlslot;
                $('#allOrderFilter').html('');
                $.each(json,function(index, value){
                    var teamleader_image='';
                    var teamleader_image1 = "<?php echo fileurlemp(); ?>"+ value.group.teamleader_image;
                    if(value.group.teamleader_image == null || value.group.teamleader_image == ''){
                        var teamleader_image = '<img src="<?php echo e(asset("public/img/defaultIcon.png")); ?>" class="img-responsive" />';
            
                    }else{
                        var teamleader_image = '<img src="'+ teamleader_image1 +'" class="img-responsive">';
                    
                    } 
                    htmlslot='<div class="col-md-12">'+
                        '<div class="orderBox_ng">'+
                            '<div class="row">'+
                                '<div class="col-md-4">'+
                                    '<div class="row">'+
                                        '<div class="col-sm-6">'+
                                            '<h4>JOB No. '+value.id+'</h4>'+
                                        '</div>'+
                                        '<div class="col-sm-6">'+
                                            '<div class="odrInner">'+
                                                '<div class="labelText">JOB Date</div>'+
                                                '<div class="labelValue">'+value.job_date+'</div>'+
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
                                                '<div class="labelText">AMC holder</div>'+
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
                                                '<div class="labelText">JOB Duration</div>'+
                                                '<div class="labelValue">45 minutes</div>'+
                                            '</div>'+
                                            '<div class="odrInner">'+
                                                '<div class="labelText">Estimated Start Time</div>'+
                                                '<div class="labelValue">'+value.slotstart_time+'</div>'+
                                            '</div>'+
                                            '<div class="odrInner">'+
                                                '<div class="labelText">JOB Status</div>';
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
                                                    '<img src="<?php echo e(asset("public/img/defaultIcon.png")); ?>" class="img-responsive" />'+
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
                                        '</div>'+
                                        
                                        '<div class="col-sm-5">'+
                                            '<div class="odrInner">'+
                                                '<div class="labelText">JOB Service</div>'+
                                                '<div class="orderServiceIcon">';
                                                if(value.services[0] != ''){
                                                
                                                    $.each(value.services,function(index1, value1){
                                                        var service_image='';
                                                        var service_image1 = "<?php echo fileurlservice(); ?>"+ value1.service_icon;
                                                        if(value1.service_icon == null || value1.service_icon == ''){
                                                            var service_image = '<img src="<?php echo e(asset("public/img/defaultIcon.png")); ?>" class="img-responsive" />';
                                                
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
                    '</div>'
                    ;
                    $("#allOrderFilter").append(htmlslot);
                });
            }else{
                $('#allOrderFilter').html('');
                $('#allOrderFilter').append('<div class="col-md-12"><h4 class="text-center">No Record Found!</h4></div>');
            }
        }
    });

}

function filterStatus(status){
    $('li').on('click', function(){
        //alert('clicked');
        $(this).siblings().removeClass('activeFtr');
        $(this).addClass('activeFtr');
    });

    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    $.ajax({
        type : 'post',
        url : "<?php echo e(route('orders.jobsStatusFilter')); ?>",
        data:{
            'status':status
            },
        success:function(data){
            
            var json = $.parseJSON(data);
            if(json.length>0){
                var htmlslot;
                $('#allOrderFilter').html('');
                $.each(json,function(index, value){
                    var teamleader_image='';
                    var teamleader_image1 = "<?php echo fileurlemp(); ?>"+ value.group.teamleader_image;
                    if(value.group.teamleader_image == null || value.group.teamleader_image == ''){
                        var teamleader_image = '<img src="<?php echo e(asset("public/img/defaultIcon.png")); ?>" class="img-responsive" />';
            
                    }else{
                        var teamleader_image = '<img src="'+ teamleader_image1 +'" class="img-responsive">';
                    
                    } 
                    htmlslot='<div class="col-md-12">'+
                        '<div class="orderBox_ng">'+
                            '<div class="row">'+
                                '<div class="col-md-4">'+
                                    '<div class="row">'+
                                        '<div class="col-sm-6">'+
                                            '<h4>JOB No. '+value.id+'</h4>'+
                                        '</div>'+
                                        '<div class="col-sm-6">'+
                                            '<div class="odrInner">'+
                                                '<div class="labelText">JOB Date</div>'+
                                                '<div class="labelValue">'+value.job_date+'</div>'+
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
                                                '<div class="labelText">AMC holder</div>'+
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
                                                '<div class="labelText">JOB Duration</div>'+
                                                '<div class="labelValue">45 minutes</div>'+
                                            '</div>'+
                                            '<div class="odrInner">'+
                                                '<div class="labelText">Estimated Start Time</div>'+
                                                '<div class="labelValue">'+value.slotstart_time+'</div>'+
                                            '</div>'+
                                            '<div class="odrInner">'+
                                                '<div class="labelText">JOB Status</div>';
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
                                                    '<img src="<?php echo e(asset("public/img/defaultIcon.png")); ?>" class="img-responsive" />'+
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
                                        '</div>'+
                                        
                                        '<div class="col-sm-5">'+
                                            '<div class="odrInner">'+
                                                '<div class="labelText">JOB Service</div>'+
                                                '<div class="orderServiceIcon">';
                                                if(value.services[0] != ''){
                                                
                                                    $.each(value.services,function(index1, value1){
                                                        var service_image='';
                                                        var service_image1 = "<?php echo fileurlservice(); ?>"+ value1.service_icon;
                                                        if(value1.service_icon == null || value1.service_icon == ''){
                                                            var service_image = '<img src="<?php echo e(asset("public/img/defaultIcon.png")); ?>" class="img-responsive" />';
                                                
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
                    '</div>'
                    ;
                    $("#allOrderFilter").append(htmlslot);
                });
            }else{
                $('#allOrderFilter').html('');
                $('#allOrderFilter').append('<div class="col-md-12"><h4 class="text-center">No Record Found!</h4></div>');
            }
        }
    });

}
</script>
<?php $__env->stopSection(); ?>
                    

                
               
       
<?php echo $__env->make('admin.layouts.header_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>