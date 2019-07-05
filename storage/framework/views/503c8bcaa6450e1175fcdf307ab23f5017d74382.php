

    <?php $__env->startSection('content'); ?>
        <style>
            @font-face {
                font-family: 'Nexa Bold';
                src: url('../../../../public/fonts/Nexa Bold.otf');
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
            .page-content .breadcrumb, .page-title, .btn, .page-sidebar{
                font-family: 'Nexa Bold';
            }
        
            .listSev{
                width:100%;
                float:left;
                margin-top: 10px;
                padding-left: 20px;
            }
            .listSev ul li{
                font-size: 14px;
                padding-bottom: 10px;
                list-style-type: decimal;
            }
            .checkbox label{
                font-size: 14px;
                font-weight: 600;
                color: #000;
                text-transform: capitalize;
                margin-top: 10px;
                margin-left: 20px;
            }
            .header_main_div_sec .title{
               margin-bottom: 25px;
            }
            .marginTop20{
                margin-top: 20px;
            }
        </style>

        <div class="content">

            <ul class="breadcrumb">
                <li>
                    <p>YOU ARE HERE</p>
                </li>
                <li><a href="#" class="active">Job Report</a> </li>
            </ul>

            <div class="page-title"> 
                <a href="<?php echo e(url()->previous()); ?>">
                    <i class="icon-custom-left"></i>
                </a>
                <h3>Job Report  <span class="semi-bold">&nbsp;</span></h3>
            </div>

            <div class="content-box-main">
                <form action="<?php echo e(url('admin/newjobs/'.$id.'/reports')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-md-12">
                        <?php if(isset($jobreport[0]) && !empty($jobreport[0])): ?>
                            <div class="header_main_div_sec">
                                <div class="title">
                                    <h5>Job No : <span id="notASSIGNdate"><?php echo e($id); ?></span> 
                                    </h5>
                                </div>       
                            </div>
                            <?php $__currentLoopData = $jobreport; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="order_history_box">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="checkbox check-primary">
                                            <input id="sub_ser<?php echo e($job->service_id); ?>" name="service_id[]" value="<?php echo e($job->service_id); ?>" type="checkbox" required>
                                            <label for="sub_ser<?php echo e($job->service_id); ?>"><?php echo e($job->service_name); ?></label>
                                        </div>

                                        <?php if(isset($job->serviceData[0]) && !empty($job->serviceData[0])): ?>
                                        <div class="listSev">
                                            <ul>
                                            <?php if(isset($job->serviceData[0]->text_content) && !empty($job->serviceData[0]->text_content)): ?>
                                                <li><?php echo e($job->serviceData[0]->text_content); ?></li>
                                            <?php else: ?>
                                                <?php $__currentLoopData = $job->serviceData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($sub->sub_service_name); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            </ul>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                                                
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-md-3">
                            <div class="form_control_new date_picker marginTop20">  
                                <div class="label_head">Job Completion Date</div>
                                <div class="input-append success date input-group"> 
                                    <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
                                    <input class="form-control" name="jobCompletionDate" id="jobCompletionDate" placeholder="Job Completion Date" required>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <hr />

                    <div class="row">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-danger">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    <?php $__env->stopSection(); ?>    

<?php echo $__env->make('admin.layouts.header_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>