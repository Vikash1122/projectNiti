

<?php $__env->startSection('content'); ?>
<div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">Slot Management</a> </li>
                </ul>
                <div class="page-title"> 
                <a href="<?php echo e(url()->previous()); ?>">
                    <i class="icon-custom-left">
                    
                    </i>
                </a>
                    <h3>Slot Management  <span class="semi-bold">&nbsp;</span></h3>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="content-box-main">
                            <div class="slotForm">
                                <form action="<?php echo e(route('slots.post')); ?>" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                        <div class="row">
                                    <div class="col-md-12">
                                                <div class="sub_ser_box_list1">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form_control_new">  
                                                                        <div class="label_head">Day Slots</div>
                                                                        <div class="input-group"> 
                                                                            <span class="input-group-addon" id="slot_timename"></span> 
                                                                            <input class="form-control" name="slot_timename" id="slot_timename" placeholder="Morning"> 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-3">
                                                                    <div class="form_control_new">  
                                                                        <div class="label_head">Slot Start Time</div>
                                                                        <div class="input-group"> 
                                                                            <span class="input-group-addon" id="slotstart_time"><i class="fa fa-clock-o"></i></span> 
                                                                            <input class="form-control" name="slotstart_time" id="slotstart_time" placeholder="9:00 AM"> 
                                                                        </div>
                                                                    
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="form_control_new">  
                                                                        <div class="label_head">Slot End Time</div>
                                                                        <div class="input-group"> 
                                                                            <span class="input-group-addon" id="slotend_time"><i class="fa fa-clock-o"></i></span> 
                                                                            <input class="form-control" name="slotend_time" id="slotend_time" placeholder="12:00 PM"> 
                                                                        </div>
                                                                    
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="form_control_new">  
                                                                        <div class="label_head">Limit Request</div>
                                                                        <div class="input-group"> 
                                                                            <span class="input-group-addon" id="limit_request"><i class="fa fa-code"></i></span> 
                                                                            <input class="form-control" name="limit_request" id="limit_request" placeholder="Limit Request Number"> 
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2" style="top:45px">
                                                            <div class="form_control_new"> 
                                                                <button type="submit" class="btn btn-primary btn-cons">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div> 
                                    </form>
                            </div>
                        </div>
                    </div> 
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="content-box-main">
                            <div style="padding: 10px 28px;">
                                <div class="row"> 
                                    <div class="col-md-3">
                                        <div id='calendar'></div>
                                    </div>
                                    <div class="col-md-9" id="databind">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.slot_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>