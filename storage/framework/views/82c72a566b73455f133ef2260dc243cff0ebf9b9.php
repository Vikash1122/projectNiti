<?php $__env->startSection('content'); ?>
<div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">Group List</a> </li>
                </ul>

                <div class="page-title"> <i class="icon-custom-left"></i>
                    <h3>Group List  <span class="semi-bold">&nbsp;</span></h3>
                </div>
                <?php if(Session::has('message')): ?> 
                    <div class="alert alert-info">
                        <?php echo e(Session::get('message')); ?> 
                    </div> 
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="content-box-main">
                            <div id='calendar1'></div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="content-box-main">
                            <div class="header_main_div_sec" id="currentdatedata">
                                      
                            </div>

                            <div class="row" id="groupDivid">
                            
                                 
                            
                               
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.slot_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>