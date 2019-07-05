

    <?php $__env->startSection('content'); ?>
        <div class="content">
            <div class="page-title"> 
                <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
                    <img src="<?php echo e(asset('public/img//go_back.png')); ?>" class="img-responsive">
                </a>
                <h3>Employee List </h3>
                <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Order History</h3></div>
            </div>

            <?php if(isset($employee) && !empty($employee)): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="content-box-main">
                        <div class="box">
                            <div class="row">
                                <div class="col-xl-3 col-md-3">
                                    <div class="mainWidget_ng ">
                                        <div class="head_ng borderBottomNone ng_listEmp">
                                            <div class="icon_div">
                                                <img src="<?php echo e(asset('public/img/vendorDefault.png')); ?>" class="center-block userImg img-responsive">
                                            </div>
                                            <h4 class="text-center"><?php echo e($employee->employee_name); ?> </h4>
                                            <p class="text-center"><?php echo e($employee->emp_role); ?></p>
                                        </div>

                                        <div class="title listEmp">
                                            <div class="service_title">
                                                <h5>Skills</h5>
                                                <p>
                                                    <span><?php echo e($employee->service_name); ?></span>
                                                </p>
                                            </div>
                                        </div>

                                            <div class="content_opt borderTop_none"> 
                                            <!--<div class="card_loc">
                                                <div class="row">
                                                    <div class="col-md-7 col-sm-7 col-xs-7">
                                                        <div class="tiles-title card-text-heading">Total Jobs</div>
                                                        <div class="job_st_details"><?php echo e($employee->total_jobs->total_jobs); ?></div>
                                                    </div>

                                                    <div class="col-md-5 col-sm-5 col-xs-5">
                                                        <div class="tiles-title card-text-heading">Current Month Job</div>
                                                        <div class="job_st_details"><?php echo e($employee->currentmonth_jobs->currentmonth_jobs); ?></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card_loc">
                                                <div class="row">
                                                    <div class="col-md-7 col-sm-7 col-xs-7">
                                                        <div class="tiles-title card-text-heading">Current Status</div>
                                                        <div class="job_st_details"><?php echo e($employee->currentStatus); ?> </div>
                                                    </div>
                                                    <div class="col-md-5 col-sm-5 col-xs-5">
                                                        <div class="tiles-title card-text-heading">Vehicle No.</div>
                                                        <?php if(isset($employee->job) && !empty($employee->job)): ?>
                                                            <?php if(isset($employee->job->vehicle_no) && !empty($employee->job->vehicle_no)): ?>
                                                            <div class="job_st_details"><?php echo e($employee->job->vehicle_no); ?> </div>
                                                            <?php else: ?>
                                                            <div class="job_st_details">Not Assign </div>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card_loc">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="tiles-title card-text-heading">Current Job Location</div>
                                                        <?php if(isset($employee->job) && !empty($employee->job)): ?>
                                                        <div class="job_st_details"><?php echo e(substr($employee->job->address, 0, 30) . '...'); ?></div>
                                                        <?php else: ?>
                                                        <div class="job_st_details"> Not Assign </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>     -->

                                            <div class="card_loc">
                                                <div class="row">
                                                    <div class="col-md-7 col-sm-7 col-xs-7">
                                                        <div class="tiles-title card-text-heading">Mobile Number</div>
                                                        <div class="job_st_details">+971-<?php echo e($employee->emp_mobile); ?></div>
                                                    </div>

                                                    <div class="col-md-5 col-sm-5 col-xs-5">
                                                        <div class="tiles-title card-text-heading">Team</div>
                                                        <?php if(isset($employee->group) && !empty($employee->group)): ?>
                                                        <div class="job_st_details"><?php echo e($employee->group); ?></div>
                                                        <?php else: ?>
                                                        <div class="job_st_details">Not Assign</div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card_loc">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="tiles-title card-text-heading">Current Status</div>
                                                        <div class="job_st_details"><?php echo e($employee->currentStatus); ?></div>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <div class="newActBtn_ng">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="<?php echo e(url('admin/employees/employeeProfile',$employee->id)); ?>" class="btn btn-block">Personal Info</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- <div class="widget_user_list">
                                        <div class="widget_img_box">
                                            <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="">
                                        </div>

                                        <div class="widget-title">
                                            <h4><?php echo e($employee->employee_name); ?> </h4>
                                            <h5><span>Primary Service</span>
                                                <span class="pri_service_main"><span class="pri_service_name"> <?php echo e($employee->emp_role); ?></span></span>
                                            </h5>
                                        </div>

                                        <div class="widget-user-details view_us">
                                            <div class="tiles-body">
                                                <div class="card_box_opt">
                                                    <div class="tiles-title text-uppercase card-text-heading">Secondary Skill</div>
                                                    <div class="skills_list">
                                                        <span><?php echo e($employee->service_name); ?></span>
                                                    </div>
                                                </div>

                                                <div class="card_loc">
                                                    <div class="tiles-title text-uppercase card-text-heading">Job Details</div>
                                                    <div class="job_st_details">
                                                        <div class="left_opt">
                                                            <div class="widget-stats">
                                                                <div class="wrapper transparent">
                                                                    <a href="">
                                                                        <span class="item-title">Total</span> <span class="item-count animate-number semi-bold" data-value="<?php echo e($employee->total_jobs->total_jobs); ?>" data-animation-duration="700"><?php echo e($employee->total_jobs->total_jobs); ?></span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="widget-stats ">
                                                                <div class="wrapper last">
                                                                    <a href="">
                                                                        <span class="item-title">Current Month Job</span> <span class="item-count animate-number semi-bold" data-value="<?php echo e($employee->currentmonth_jobs->currentmonth_jobs); ?>" data-animation-duration="700"><?php echo e($employee->currentmonth_jobs->currentmonth_jobs); ?></span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="right_opt">
                                                            <div class="title">Current Status</div>
                                                            <div class="st_opt"><a href="#"><?php echo e($employee->currentStatus); ?> </a></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php if(isset($employee->job) && !empty($employee->job)): ?>
                                                <div class="card_loc">
                                                    <div class="tiles-title text-uppercase card-text-heading">Current Job</div>
                                                        <div class="job_st_details">
                                                            <div class="left_opt">
                                                                <div class="title">Location</div>
                                                                <div class="st_opt"><?php echo e(substr($employee->job->address, 0, 10) . '...'); ?> </div>
                                                            </div>
                                                            <div class="right_opt">
                                                                <div class="title">Vehicle No.</div>
                                                                <?php if(isset($employee->job->vehicle_no) && !empty($employee->job->vehicle_no)): ?>
                                                                <div class="st_opt"><?php echo e($employee->job->vehicle_no); ?> </div>
                                                                <?php else: ?>
                                                                <div class="st_opt">Not Assign </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                <div class="card_loc">
                                                    <div class="tiles-title text-uppercase card-text-heading">Current Job</div>
                                                        <div class="job_st_details">
                                                            <div class="left_opt">
                                                                <div class="title">Location</div>
                                                                <div class="st_opt">Not Assign </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="widget-action-block">
                                                <a href="<?php echo e(url('admin/employees/employeeProfile',$employee->id)); ?>" class="hashtags transparent">Personal Info</a>
                                            </div>
                                        </div>
                                    </div> -->

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
                                        <?php if(isset($employee->alljobs[0]) && !empty($employee->alljobs[0])): ?>
                                        <?php $__currentLoopData = $employee->alljobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="order_history_box">
                                            <div class="row">   
                                                <div class="col-md-12">
                                                    <div class="dtl_order-hd">
                                                        <h5 class="pull-left">Job Code - <span><?php echo e($jobs->id); ?></span></h5>
                                                        <?php if($jobs->status == 0): ?>
                                                            <h5 class="pull-right job_sts"> Requested</h5>
                                                        <?php elseif($jobs->status == 1): ?>
                                                            <h5 class="pull-right job_sts"> Scheduled</h5>
                                                        <?php elseif($jobs->status == 2): ?>
                                                            <h5 class="pull-right job_sts"> Proposed</h5>
                                                        <?php elseif($jobs->status == 3): ?>
                                                            <h5 class="pull-right job_sts"> Accepted</h5>
                                                        <?php elseif($jobs->status == 4): ?>
                                                            <h5 class="pull-right job_sts"> In Process</h5>
                                                        <?php elseif($jobs->status == 5): ?>
                                                            <h5 class="pull-right job_sts"> Completed</h5>
                                                        <?php elseif($jobs->status == 6): ?>
                                                            <h5 class="pull-right job_sts"> Rejected</h5>
                                                        <?php else: ?>

                                                        <?php endif; ?>
                                                        <!-- <h5 class="pull-right job_sts"> Pending</h5> -->
                                                    </div>
                                                </div>
                                            </div>    

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5>Job Services</h5>
                                                    <p><?php echo e(substr($jobs->ser->ser_name, 0, 30) . '...'); ?></p>
                                                </div>

                                                <div class="col-md-4">
                                                    <h5>Job Date</h5>
                                                    <p><?php echo e(date("d-M-Y", strtotime($jobs->job_date))); ?></p>
                                                </div>

                                                <!-- <div class="col-md-3">
                                                    <h5>Total working day</h5>
                                                    <p>5 Days</p>
                                                </div> -->
                                                <div class="col-md-4">
                                                    <h5>Team size</h5>
                                                    <div class="odr-tm-count-ng">
                                                        <a href="javascript:;" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="getteamSize('<?php echo $jobs->id?>')">
                                                            <?php if($jobs->total_emp > 0): ?>
                                                            <?php echo e($jobs->total_emp); ?> Members
                                                            <?php else: ?>
                                                            Group Not Assign
                                                            <?php endif; ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5>Job Location</h5>
                                                    <p><?php echo e(substr($jobs->address, 0, 30) . '...'); ?></p>
                                                </div>

                                                <div class="col-md-6 text-right">
                                                    <h5>&nbsp;</h5>
                                                    <span class="odr-tm-count">
                                                        <a href="javascript:;" data-toggle="modal" data-target="#myModal">Inventories</a>
                                                    </span>
                                                    <span class="odr-tm-dt">
                                                        <a href="<?php echo e(url('admin/employees/orderJobDetails/'.$jobs->id.'/'.$employee->id)); ?>" >View Job Details</a>
                                                    </span>
                                                </div>
                                            </div> 
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                        <div class="order_history_box">
                                            <div class="row">   
                                                <p>No Record Found!</p>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <div class="clearfix"></div>

                                        <!-------------- Team Member modal ---------------->
                                        <div class="modal fade bs-example-modal-lg teamSize" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                            <div class="modal-dialog" role="document"> 
                                                <div class="modal-content"> 
                                                    <div class="modal-header"> 
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button> 
                                                        <h4 class="modal-title" id="myLargeModalLabel"></h4>
                                                    </div> 
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h4>Team Members</h4>
                                                                <div class="list_emp_dt">
                                                                <ul class="new_li_elements" id="teammember1">
                                                                    
                                                                </ul>
                                                                </div>
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
                                                                                        <img src="<?php echo e(asset('public/img/no-preview-item.jpg')); ?>" alt="" data-src="<?php echo e(asset('public/img/no-preview-item.jpg')); ?>" width="35" height="35"> 
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
                                                                                        <img src="<?php echo e(asset('public/img/no-preview-item.jpg')); ?>" alt="" data-src="<?php echo e(asset('public/img/no-preview-item.jpg')); ?>" width="35" height="35"> 
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
            <?php endif; ?>
        </div> 
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('js'); ?>

    <script type="text/javascript">
        function getteamSize(teamSize){
            var token = "<?php echo e(csrf_token()); ?>";
            var job_id=teamSize;
            $('#myLargeModalLabel').html('Job Code - '+job_id+'');
            //alert(teamSize);
            $.ajax({
            type :'post',
            url: "<?php echo e(route('teamSize.ajaxteam')); ?>",
            data:{
                'job_id':job_id,
                '_token':token
                },
            success:function(data){
                
                var json = $.parseJSON(data);
                console.log(json);
                var htmlslot;
                $('#teammember1').html('');
                if(json.length > 0){
                    
                    $.each(json,function(index, value){
                        var employee_image='';
                        var employee_image1 = "<?php echo fileurlemp(); ?>"+ value.emp_profile;
                        if(value.emp_profile == null || value.emp_profile == ''){
                            var employee_image = '<img src="<?php echo e(asset("public/img/profiles/avatar_small.jpg")); ?>" class="img-responsive" />';
                        }else{
                            var employee_image = '<img src="'+ employee_image1 +'" class="img-responsive">';
                        
                        }
                        htmlslot ='<li class="listOfTeam">'+
                                    '<a href="view_emp_details.php">'+
                                        '<div class="list_emp_dt-ng">'+
                                            '<div class="img-div-ng">'+
                                                employee_image+ 
                                            '</div>'+
                                            
                                            '<div class="list_emp-dtl-ng">'+
                                                '<div class="lft">'+
                                                    '<div class="user-name"> '+value.employee_name+' </div>'+
                                                    '<div class="preview-wrapper"><span class="bold">'+value.emp_mobile+' </span></div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+

                                        // '<div class="row">'+
                                        //     '<div class="col-md-2">'+
                                        //         '<div class="profile-img-wrapper pull-left m-l-10">'+
                                        //             '<div class=" p-r-10">'+
                                        //                 employee_image+ 
                                        //             '</div>'+
                                        //         '</div>'+
                                        //     '</div>'+
                                        //     '<div class="col-md-10">'+
                                        //         '<div class="user-name text-black bold large-text">'+value.employee_name+'<span class="semi-bold"></span> </div>'+
                                        //         '<div class="preview-wrapper"><span class="bold">'+value.emp_mobile+'</span></div>'+
                                        //     '</div>'+
                                        // '</div>'+  
                                    '</a>'+
                                '</li>';
                                $("#teammember1").append(htmlslot);
                    });
                }else{
                    $('#teammember1').html('');
                    htmlslot='<div class="col-md-12">'+
                                    '<div class="content-box-main">'+
                                        '<h4 class="text-center">'+'No Data Found'+
                                        '</h4>'+
                                '</div>'+
                            '</div>';
                        
                        $("#teammember1").append(htmlslot);

                }

            }
        })
        }
        
    </script>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.emp_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>