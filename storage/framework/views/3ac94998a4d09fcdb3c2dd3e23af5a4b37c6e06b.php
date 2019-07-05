<?php $__env->startSection('content'); ?>
            <div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="" class="active">Job Details</a> </li>
                </ul>

                <div class="page-title"> <i class="icon-custom-left"></i>
                    <h3>Job Details  <span class="semi-bold">&nbsp;</span></h3>
                </div>
                <?php if(isset($employee) && !empty($employee)): ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-box-main">
                            <div class="box">
                                <div class="row">
                                    <div class="col-xl-3 col-md-3">
                                        <div class="widget_user_list">
                                            <div class="widget_img_box">
                                                <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="">
                                            </div>

                                            <div class="widget-title">
                                                <h4><?php echo e($employee->employee_name); ?> </h4>
                                                <h5><span>Primary Service</span>
                                                    <span class="pri_service_main"><span class="pri_service_name"># <?php echo e($employee->emp_role); ?></span></span>
                                                </h5>
                                            </div>

                                            <div class="widget-user-details view_us">
                                                <div class="tiles-body">
                                                    <div class="card_box_opt">
                                                        <div class="tiles-title text-uppercase card-text-heading">Secondary Skill</div>
                                                        <div class="skills_list">
                                                            <span>#<?php echo e($employee->emp_role); ?></span>
                                                            <?php if(!empty($employee->service_name)): ?>
                                                            <?php $dt = explode(',',$employee->service_name);
                                                            //print_r($dt);die();
                                                            ?>
                                                            <?php $__currentLoopData = $dt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            , <span> 
                                                            <?php echo "#".$d; ?>
                                                            </span>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                    <div class="card_loc">
                                                        <div class="tiles-title text-uppercase card-text-heading">Job Details</div>
                                                        <div class="job_st_details">
                                                            <div class="left_opt">
                                                                <div class="widget-stats">
                                                                    <div class="wrapper transparent">
                                                                        <a href="">
                                                                            <span class="item-title">Total</span> <span class="item-count animate-number semi-bold" data-value="2415" data-animation-duration="700">2,415</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-stats ">
                                                                    <div class="wrapper last">
                                                                        <a href="">
                                                                            <span class="item-title">Monthly</span> <span class="item-count animate-number semi-bold" data-value="157" data-animation-duration="700">157</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="right_opt">
                                                                <div class="title">Current Status</div>
                                                                <div class="st_opt"><a href="#">Unavailable </a></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card_loc">
                                                        <div class="tiles-title text-uppercase card-text-heading">Current Job</div>
                                                        <div class="job_st_details">
                                                            <div class="left_opt">
                                                                <div class="title">Location</div>
                                                                <div class="st_opt">Dubai </div>
                                                            </div>
                                                            <div class="right_opt">
                                                                <div class="title">Vehicle No.</div>
                                                                <div class="st_opt">ADC-254 </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="widget-action-block">
                                                    <a href="<?php echo e(url('admin/employees/employeeProfile/'.$employee->id)); ?>" class="hashtags transparent">Personal Info</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="boxDetailsHeadings jd_box_left">
                                            <div class="order_history_box ">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h5>Job Code</h5>
                                                        <p>#0001</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <h5>Job Name</h5>
                                                        <p>Plumbing</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h5>Job Date</h5>
                                                        <p>23/5/2018</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <h5>Total working day</h5>
                                                        <p>5 Days</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h5>Inventory Order Number </h5> 
                                                        <p class="odr-tm-count"><a href="#">#125454</a></p>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <h5>Job Location</h5>
                                                        <p>45/54 DLF phase-1 , Gurugram</p>
                                                    </div>
                                                </div>    
                                            </div>
                                        </div>    
                                    </div>
                                    
                                    <div class="col-xl-9 col-md-9 order_history_box_main">
                                        <div class="box-body boxDetailsHeadings">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="headSec ">
                                                        <h3 class="profile-username text-capitalize pull-left">Job Status - <span class="complete">Complete</span></h3>
                                                        <h4 class="jdHead pull-right">Final Cost -<span> $ 1000/-</span></h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="order_history_box">
                                                <div class="row">   
                                                    <div class="col-md-12">
                                                        <div class="dtl_order-hd">
                                                            <h5 class="pull-left">Customer Details</h5>
                                                        </div>
                                                    </div>
                                                </div>   

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="order_history_box">
                                                            <div class="dtl_order-hd">
                                                                <h5 class="pull-left">Basic Information</h5>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 cst_dtl">
                                                                    <div class="dtl_order_box_n">
                                                                        <div class="widget_user_list">
                                                                            <div class="jd_emp_name">
                                                                                <h4>Hemraj <span>Anuragi</span></h4>
                                                                            </div>      
                                                                            <div class="widget_img_box">
                                                                                <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="">
                                                                            </div>
                                                                            <div class="widget-title">
                                                                                <!-- <h4>Hemraj <span>Anuragi</span></h4> -->
                                                                                <div class="bs_inf_jd">
                                                                                    <h5>Mobile : 9988774411</h5>
                                                                                    <p>Email-id : hemraj@gmail.com</p>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="col-sm-12">
                                                                    <div class="dtl_cst">
                                                                        <div class="form-group">
                                                                            <h5>Mobile Number</h5>
                                                                            <p>9988774411</p>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <h5>Email Id</h5>
                                                                            <p>hemraj@gmail.com</p>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8">
                                                        <div class="order_history_box">
                                                            <div class="dtl_order-hd">
                                                                <h5 class="pull-left">Queries</h5>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12"> 
                                                                    <div class="queries_cst" id="style-1">
                                                                        <ul class="force-overflow">
                                                                            <li>
                                                                                <div class="row">
                                                                                    <div class="col-sm-4">
                                                                                        <div class="dtl_cst">
                                                                                            <h5>Query Title</h5>
                                                                                            <p>AC Repair</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <div class="dtl_cst">
                                                                                            <h5>Cost</h5>
                                                                                            <p>$ 500/-</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <div class="dtl_cst">
                                                                                            <h5>Query Date</h5>
                                                                                            <p>09/05/2018</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>    
                                                                                <div class="row">
                                                                                    <div class="col-sm-8">
                                                                                        <div class="dtl_cst">
                                                                                            <h5>Description</h5>
                                                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <div class="dtl_cst">
                                                                                            <h5>Status</h5>
                                                                                            <p>Pending</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </li>

                                                                            <li>
                                                                                <div class="row">
                                                                                    <div class="col-sm-4">
                                                                                        <div class="dtl_cst">
                                                                                            <h5>Query Title</h5>
                                                                                            <p>AC Repair</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <div class="dtl_cst">
                                                                                            <h5>Cost</h5>
                                                                                            <p>$ 500/-</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <div class="dtl_cst">
                                                                                            <h5>Query Date</h5>
                                                                                            <p>09/05/2018</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>    
                                                                                <div class="row">
                                                                                    <div class="col-sm-8">
                                                                                        <div class="dtl_cst">
                                                                                            <h5>Description</h5>
                                                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <div class="dtl_cst">
                                                                                            <h5>Status</h5>
                                                                                            <p>Pending</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>         
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <!-- <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="dtl_order_box_n">
                                                            <div class="widget_user_list">
                                                                <div class="widget_img_box">
                                                                    <img src="assets/img/defaultIcon.png" class="">
                                                                </div>
                                                                <div class="widget-title">
                                                                    <h4>Hemraj <span>Anuragi</span></h4>
                                                                    <h5>(Surveyor)</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <h5>Job Name</h5>
                                                                <p>Plumbing</p>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <h5>Job Date</h5>
                                                                <p>23/5/2018</p>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <h5>Total working day</h5>
                                                                <p>5 Days</p>
                                                            </div>
                                                            
                                                        </div> 

                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <h5>Job Location</h5>
                                                                <p>45/54 DLF phase-1 , Gurugram</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <h5>Inventory Order Number</h5>
                                                                <p class="odr-tm-count"><a href="#">#125454</a></p>
                                                            </div>
                                                        </div> 
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="dtl_order_box_n">
                                                            <div class="widget_user_list">
                                                                <div class="widget_img_box">
                                                                    <img src="assets/img/defaultIcon.png" class="">
                                                                </div>
                                                                <div class="widget-title">
                                                                    <h4>Hemraj <span>Anuragi</span></h4>
                                                                    <h5>(Customer)</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>

                                            <div class="order_history_box">
                                                <div class="row">   
                                                    <div class="col-md-12">
                                                        <div class="dtl_order-hd">
                                                            <h5 class="pull-left">Surveyor Details</h5>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="serveor_dt" id="style-1" >
                                                            <div class="force-overflow">
                                                                <div class="order_history_box">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="dtl_order-hd">
                                                                                <h5 class="">Survey - <span>1</span></h5>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <div class="widget_img_box">
                                                                                <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <h5>Name</h5>
                                                                            <p>Prem Maurya</p>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <h5>Survey Date</h5>
                                                                            <p>15/5/2018</p>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <h5>Status</h5>
                                                                            <p>Pending</p>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <h5 style="margin-bottom:10px;">Footage</h5>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="ser_footage">
                                                                                <img src="<?php echo e(asset('public/img/hotel.jpg')); ?>" class="img-responsive" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="ser_footage">
                                                                                <video controls>
                                                                                    <source src="<?php echo e(asset('public/videos/videoplayback.mp4')); ?>" type="video/mp4">
                                                                                </video>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="ser_footage">
                                                                                <img src="<?php echo e(asset('public/img/hotel.jpg')); ?>" class="img-responsive" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="ser_footage">
                                                                                <video controls>
                                                                                    <source src="<?php echo e(asset('public/videos/videoplayback.mp4')); ?>" type="video/mp4">
                                                                                </video>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="order_history_box">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="dtl_order-hd">
                                                                                <h5 class="">Survey - <span>2</span></h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <div class="widget_img_box">
                                                                                <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <h5>Name</h5>
                                                                            <p>Prem Maurya</p>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <h5>Survey Date</h5>
                                                                            <p>15/5/2018</p>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <h5>Status</h5>
                                                                            <p>Pending</p>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <h5 style="margin-bottom:10px;">Footage</h5>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="ser_footage">
                                                                                <img src="<?php echo e(asset('public/img/hotel.jpg')); ?>" class="img-responsive" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="ser_footage">
                                                                                <video controls>
                                                                                    <source src="<?php echo e(asset('public/videos/videoplayback.mp4')); ?>" type="video/mp4">
                                                                                </video>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="ser_footage">
                                                                                <img src="<?php echo e(asset('public/img/hotel.jpg')); ?>" class="img-responsive" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="ser_footage">
                                                                                <video controls>
                                                                                    <source src="<?php echo e(asset('public/videos/videoplayback.mp4')); ?>" type="video/mp4">
                                                                                </video>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                    </div>
                                                </div> 

                                                <!-- <div class="row">   
                                                    <div class="col-md-12">
                                                        <div class="dtl_order-hd">
                                                            <h5 class="pull-left">Job Code - <span>#0001</span></h5>
                                                            <h5 class="pull-right job_sts"> Complete</h5>
                                                        </div>
                                                    </div>
                                                </div>    

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="dtl_order_box_n">
                                                            <div class="widget_user_list">
                                                                <div class="widget_img_box">
                                                                    <img src="assets/img/defaultIcon.png" class="">
                                                                </div>
                                                                <div class="widget-title">
                                                                    <h4>Hemraj <span>Anuragi</span></h4>
                                                                    <h5>(Surveyor)</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <h5>Job Name</h5>
                                                                <p>Plumbing</p>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <h5>Job Date</h5>
                                                                <p>23/5/2018</p>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <h5>Total working day</h5>
                                                                <p>5 Days</p>
                                                            </div>
                                                            
                                                        </div> 

                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <h5>Job Location</h5>
                                                                <p>45/54 DLF phase-1 , Gurugram</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <h5>Inventory Order Number</h5>
                                                                <p class="odr-tm-count"><a href="#">#125454</a></p>
                                                            </div>
                                                        </div> 
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="dtl_order_box_n">
                                                            <div class="widget_user_list">
                                                                <div class="widget_img_box">
                                                                    <img src="assets/img/defaultIcon.png" class="">
                                                                </div>
                                                                <div class="widget-title">
                                                                    <h4>Hemraj <span>Anuragi</span></h4>
                                                                    <h5>(Customer)</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>

                                            <div class="clearfix"></div>

                                            <div class="order_history_box">
                                                <div class="row">   
                                                    <div class="col-md-12">
                                                        <div class="dtl_order-hd">
                                                            <h5>Vehicle Information</h5>
                                                        </div>  

                                                        <div class="row dtl_order_box_n">
                                                            <div class="col-xl-3 col-md-3">
                                                                <div class="widget_user_list">
                                                                    <div class="widget_img_box">
                                                                        <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="">
                                                                    </div>
                                                                    <div class="widget-title">
                                                                        <h4>Hemraj <span>Anuragi</span></h4>
                                                                        <h5>( Driver )</h5>
                                                                    </div>
                                                                </div>        
                                                            </div>

                                                            <div class="col-xl-9 col-md-9">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <h5>Driver Licence</h5>
                                                                        <p>cdsdjflsdj</p>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <h5>Vehicle Type</h5>
                                                                        <p>4 Wheeler</p>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <h5>Plate Number</h5>
                                                                        <p>UAE-03-1212</p>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <h5>Vehicle Modal</h5>
                                                                        <p>BMW</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                       

                                            <div class="clearfix"></div>

                                            <div class="order_history_box">
                                                <div class="row">   
                                                    <div class="col-md-12">
                                                        <div class="dtl_order-hd">
                                                            <h5 class="pull-left">Team Members</h5>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="order_history_box">
                                                                    <div class="team_members">
                                                                        <div class="widget_img_box">
                                                                            <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="img-responsive">
                                                                        </div>
                                                                        <div class="widget-title">
                                                                            <h4>Hemraj Anuragi</h4>
                                                                            <h5>( 99778855 )</h5>
                                                                            <p>Driver</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="order_history_box">
                                                                    <div class="team_members">
                                                                        <div class="widget_img_box">
                                                                            <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="img-responsive">
                                                                        </div>
                                                                        <div class="widget-title">
                                                                            <h4>Prem Maurya</h4>
                                                                            <h5>( 99778855 )</h5>
                                                                            <p>Electrician</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="order_history_box">
                                                                    <div class="team_members">
                                                                        <div class="widget_img_box">
                                                                            <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="img-responsive">
                                                                        </div>
                                                                        <div class="widget-title">
                                                                            <h4>Nishikant Chaurasia</h4>
                                                                            <h5>( 99778855 )</h5>
                                                                            <p>Driver</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="order_history_box">
                                                                    <div class="team_members">
                                                                        <div class="widget_img_box">
                                                                            <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="img-responsive">
                                                                        </div>
                                                                        <div class="widget-title">
                                                                            <h4>Ashish Yadav</h4>
                                                                            <h5>( 99778855 )</h5>
                                                                            <p>Driver</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="list_emp_dt">
                                                        <ul>
                                                            <li>
                                                                <a href="view_emp_details.php">
                                                                    <div class="row">
                                                                        <div class="col-md-1 col-sm-1">
                                                                            <div class="profile-img-wrapper pull-left m-l-10">
                                                                                <div class=" p-r-10">
                                                                                    <img src="assets/img/profiles/avatar_small.jpg" alt="" data-src="assets/img/profiles/avatar_small.jpg" width="35" height="35"> 
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-11 col-sm-11">
                                                                            <div class="user-name text-black bold large-text"> Kamath <span class="semi-bold">Smith</span> </div>
                                                                            <div class="preview-wrapper"><span class="bold">9878299874</span></div>
                                                                        </div>
                                                                    </div>  
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="view_emp_details.php">
                                                                    <div class="row">
                                                                        <div class="col-md-1 col-sm-1">
                                                                            <div class="profile-img-wrapper pull-left m-l-10">
                                                                                <div class=" p-r-10">
                                                                                    <img src="assets/img/profiles/avatar_small.jpg" alt="" data-src="assets/img/profiles/avatar_small.jpg" width="35" height="35"> 
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-11 col-sm-11">
                                                                            <div class="user-name text-black bold large-text"> NishiKant <span class="semi-bold">Chaurasia</span> </div>
                                                                            <div class="preview-wrapper"><span class="bold">9878299874</span></div>
                                                                        </div>
                                                                    </div>  
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="view_emp_details.php">
                                                                    <div class="row">
                                                                        <div class="col-md-1 col-sm-1">
                                                                            <div class="profile-img-wrapper pull-left m-l-10">
                                                                                <div class=" p-r-10">
                                                                                    <img src="assets/img/profiles/avatar_small.jpg" alt="" data-src="assets/img/profiles/avatar_small.jpg" width="35" height="35"> 
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-11 col-sm-11">
                                                                            <div class="user-name text-black bold large-text"> Hemu <span class="semi-bold">Smith</span> </div>
                                                                            <div class="preview-wrapper"><span class="bold">9878299874</span></div>
                                                                        </div>
                                                                    </div>  
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="view_emp_details.php">
                                                                    <div class="row">
                                                                        <div class="col-md-1 col-sm-1">
                                                                            <div class="profile-img-wrapper pull-left m-l-10">
                                                                                <div class=" p-r-10">
                                                                                    <img src="assets/img/profiles/avatar_small.jpg" alt="" data-src="assets/img/profiles/avatar_small.jpg" width="35" height="35"> 
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-11 col-sm-11">
                                                                            <div class="user-name text-black bold large-text"> Prem <span class="semi-bold">Smith</span> </div>
                                                                            <div class="preview-wrapper"><span class="bold">9800000001</span></div>
                                                                        </div>
                                                                    </div>  
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div> -->
                                                </div>
                                            </div> 
                                            
                                            <div class="clearfix"> </div>

                                            <div class="order_history_box">
                                                <div class="row">   
                                                    <div class="col-md-12">
                                                        <div class="dtl_order-hd">
                                                            <h5 class="pull-left">Inventories</h5>
                                                            <h5 class="pull-right job_sts">Order No - #15424</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="invt_list_clock" id="style-1">
                                                            <div class="force-overflow">

                                                                <div class="list_emp_dt">
                                                                    <ul>
                                                                        <li>
                                                                            <div class="row">
                                                                                <div class="col-md-4 col-sm-4">
                                                                                    <div class="order_history_box">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="int_dt">
                                                                                                    <div class="img_intv">
                                                                                                        <img  src="<?php echo e(asset('public/img/hamber.jpg')); ?>" class="img-responsive" />
                                                                                                    </div> 
                                                                                                    <h4 class="text-center"> HAMBER </h4>
                                                                                                    <div class="row">
                                                                                                        <div class="col-sm-6 col-xs-6">
                                                                                                            <h5>Inventory Type</h5>
                                                                                                            <p>Plastic</p>
                                                                                                        </div>
                                                                                                        <div class="col-sm-6 col-xs-6">
                                                                                                            <h5>Quantity</h5>
                                                                                                            <p>50</p>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>    
                                                                                </div>

                                                                                <div class="col-md-8 col-sm-8">
                                                                                    <div class="order_history_box">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="dtl_order-hd">
                                                                                                    <h5>Issue Inventories</h5>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <h5>Counter No.</h5>
                                                                                                        <p>5</p>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <h5>Provider Name</h5>
                                                                                                        <p>Prem</p>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <h5>Receiver Name</h5>
                                                                                                        <p>Nishikant</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="dtl_order-hd">
                                                                                                    <h5>Return Inventories</h5>
                                                                                                </div> 
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <h5>Counter No.</h5>
                                                                                                        <p>5</p>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <h5>Provider Name</h5>
                                                                                                        <p>Prem</p>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <h5>Receiver Name</h5>
                                                                                                        <p>Nishikant</p>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <h5>Quantity</h5>
                                                                                                        <p>15</p>
                                                                                                    </div>
                                                                                                </div>   
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>            
                                                                                </div>
                                                                            </div>
                                                                            <!-- <a href="view_emp_details.php">
                                                                                <div class="row">
                                                                                    <div class="col-md-1">
                                                                                        <div class="profile-img-wrapper pull-left m-l-10">
                                                                                            <div class=" p-r-10">
                                                                                                <img src="assets/img/no-preview-item.jpg" alt="" data-src="assets/img/no-preview-item.jpg" width="35" height="35"> 
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="user-name text-black bold large-text"> Wire </div>
                                                                                        <div class="preview-wrapper"><span class="bold">Type - .2mm</span></div>
                                                                                    </div>
                                                                                    <div class="col-md-3 text-right">
                                                                                        <div class="user-name text-black "> Quantity </div>
                                                                                        <div class="preview-wrapper"><span class="bold">5 M</span></div>
                                                                                    </div>
                                                                                </div>  
                                                                            </a> -->
                                                                        </li>

                                                                        <li>
                                                                            <div class="row">
                                                                                <div class="col-md-4 col-sm-4">
                                                                                    <div class="order_history_box">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="int_dt">
                                                                                                    <div class="img_intv">
                                                                                                        <img  src="<?php echo e(asset('public/img/hamber.jpg')); ?>" class="img-responsive" />
                                                                                                    </div> 
                                                                                                    <h4 class="text-center"> HAMBER </h4>
                                                                                                    <div class="row">
                                                                                                        <div class="col-sm-6 col-xs-6">
                                                                                                            <h5>Inventory Type</h5>
                                                                                                            <p>Plastic</p>
                                                                                                        </div>
                                                                                                        <div class="col-sm-6 col-xs-6">
                                                                                                            <h5>Quantity</h5>
                                                                                                            <p>50</p>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>    
                                                                                </div>
                                                                                
                                                                                <div class="col-md-8 col-sm-8">
                                                                                    <div class="order_history_box">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="dtl_order-hd">
                                                                                                    <h5>Issue Inventories</h5>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <h5>Counter No.</h5>
                                                                                                        <p>5</p>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <h5>Provider Name</h5>
                                                                                                        <p>Prem</p>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <h5>Receiver Name</h5>
                                                                                                        <p>Nishikant</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="dtl_order-hd">
                                                                                                    <h5>Return Inventories</h5>
                                                                                                </div> 
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <h5>Counter No.</h5>
                                                                                                        <p>5</p>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <h5>Provider Name</h5>
                                                                                                        <p>Prem</p>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <h5>Receiver Name</h5>
                                                                                                        <p>Nishikant</p>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <h5>Quantity</h5>
                                                                                                        <p>15</p>
                                                                                                    </div>
                                                                                                </div>   
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>            
                                                                                </div>
                                                                            </div>
                                                                        </li>

                                                                        <li>
                                                                            <div class="row">
                                                                                <div class="col-md-4 col-sm-4">
                                                                                    <div class="order_history_box">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="int_dt">
                                                                                                    <div class="img_intv">
                                                                                                        <img  src="<?php echo e(asset('public/img/hamber.jpg')); ?>" class="img-responsive" />
                                                                                                    </div> 
                                                                                                    <h4 class="text-center"> HAMBER </h4>
                                                                                                    <div class="row">
                                                                                                        <div class="col-sm-6 col-xs-6">
                                                                                                            <h5>Inventory Type</h5>
                                                                                                            <p>Plastic</p>
                                                                                                        </div>
                                                                                                        <div class="col-sm-6 col-xs-6">
                                                                                                            <h5>Quantity</h5>
                                                                                                            <p>50</p>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>    
                                                                                </div>
                                                                                
                                                                                <div class="col-md-8 col-sm-8">
                                                                                    <div class="order_history_box">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="dtl_order-hd">
                                                                                                    <h5>Issue Inventories</h5>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <h5>Counter No.</h5>
                                                                                                        <p>5</p>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <h5>Provider Name</h5>
                                                                                                        <p>Prem</p>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <h5>Receiver Name</h5>
                                                                                                        <p>Nishikant</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="dtl_order-hd">
                                                                                                    <h5>Return Inventories</h5>
                                                                                                </div> 
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <h5>Counter No.</h5>
                                                                                                        <p>5</p>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <h5>Provider Name</h5>
                                                                                                        <p>Prem</p>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <h5>Receiver Name</h5>
                                                                                                        <p>Nishikant</p>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <h5>Quantity</h5>
                                                                                                        <p>15</p>
                                                                                                    </div>
                                                                                                </div>   
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>            
                                                                                </div>
                                                                            </div>
                                                                        </li>

                                                                        <!-- <li>
                                                                            <a href="view_emp_details.php">
                                                                                <div class="row">
                                                                                    <div class="col-md-1">
                                                                                        <div class="profile-img-wrapper pull-left m-l-10">
                                                                                            <div class=" p-r-10">
                                                                                                <img src="assets/img/no-preview-item.jpg" alt="" data-src="assets/img/no-preview-item.jpg" width="35" height="35"> 
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="user-name text-black bold large-text"> HAMBER </div>
                                                                                        <div class="preview-wrapper"><span class="bold">Type - Plastic</span></div>
                                                                                    </div>
                                                                                    <div class="col-md-3 text-right">
                                                                                        <div class="user-name text-black "> Quantity </div>
                                                                                        <div class="preview-wrapper"><span class="bold">3</span></div>
                                                                                    </div>
                                                                                </div>  
                                                                            </a>
                                                                        </li> -->
                                                                    </ul>
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
                <?php endif; ?>                  
            </div>    
    <!-----------------modal start------------>

	<div class="modal fade videoModalMainDiv videoModal" id="videoModal1" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="closeBtnMain">
            <button type="button" class="close closeBtnN" data-dismiss="modal" onclick="closedestroy()" aria-label="Close">
                <span aria-hidden="true"><img src="<?php echo e(asset('public/img/closebtn.png')); ?>"  /></span>
            </button>
        </div>
        <div class="modal-dialog largeModalDiv">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="videoModalDiv" >
                        <div id="player"></div>
                    </div>
                </div>
            </div>
        </div>
	</div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.emp_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>