

<?php $__env->startSection('content'); ?>


            <div class="content">
                <div class="page-title"> 
                    <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
                        <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
                    </a>
                    <h3>Other Charges  <span class="semi-bold">&nbsp;</span></h3>
                </div>

                <div class="content-box-main-ng marginBottom0">
                    <h3 class="text-center">Service Charges</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content-box-main">
                                <div class="row">   
                                    <!-- <div class="col-md-12 boxDetailsHeadings">
                                        <div class="dtl_order-hd" style="border-bottom: 1px solid #d1cccc;">
                                            <h5 class="pull-left">Service Charges</h5>
                                        </div>
                                    </div> -->                                    
                                    <div class="col-md-12 fxdChg">
                                        <h5 class="pull-right">Fixed Surveyor Charge : 
                                            <span style="color: #F44336;">250 AED</span> 
                                            <button type="button" title="Edit Fixed Surveyor Charge" class="edtFxdChg"><i class="fa fa-pencil"></i></button>
                                            
                                            <span class="hidden">
                                                <span style="color: #F44336;"><input type="text" value="250"></span>
                                                <button type="button" class="btn btn-primary btn-xs btn-mini">Apply</button>
                                                <button type="button" class="btn btn-danger btn-xs btn-mini">Cancel</button>
                                            </span>
                                        </h5>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="sub_ser_box_header">
                                            <div class="row">
                                                <div class="col-md-1">SR. No</div>
                                                <div class="col-md-4 text-center">Service Name</div>
                                                <div class="col-md-2 text-center">Emergency Charge</div>
                                                <div class="col-md-3 text-center">Surveyor Charge</div>
                                                <div class="col-md-2 text-right">Action</div>
                                            </div>
                                        </div>

                                        <div class="invt_list_clock" id="style-1">
                                            <div class="force-overflow">
                                            <?php if(isset($services) && !empty($services)): ?> 
                                        <?php   $i = 1; ?>
                                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="sub_ser_box_list">
                                                    <div class="row">
                                                        <div class="col-md-1"><?php echo e($i); ?></div>
                                                        <div class="col-md-4 text-center"><?php echo e($ser->service_name); ?></div>
                                                        <div class="col-md-2 text-center"><?php echo e($ser->instant_service_price); ?> AED</div>
                                                        <form method="post" action="<?php echo e(route('chargeupdate.post')); ?>">
                                                        <?php echo e(csrf_field()); ?>

                                                            <input type="hidden" name="service_id" value="<?php echo e($ser->id); ?>"/>
                                                            <div class="col-md-3 text-center">
                                                                <div class="hidden"> <?php echo e($ser->surveyer_price); ?> AED</div>
                                                                <div>
                                                                    <input type="text" class="text-center" name="surveyer_price" value="<?php echo e($ser->surveyer_price); ?>"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 text-right">
                                                                <button type="submit" class="btn btn-primary btn-xs btn-mini">Apply</button>
                                                                <button type="cancel" class="btn btn-danger btn-xs btn-mini">Cancel</button>
                                                                <!-- <button type="button" data-toggle="modal" data-target=".editSurveyorCharges" title="Edit Surveyor Charge" class="edit_btn"><i class="fa fa-pencil"></i></button> -->
                                                                <!-- <button type="button" class="delete_btn" data-toggle="modal" data-target=".alert_modal" title="Delete"><i class="fa fa-times"></i></button> -->
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            <?php  $i++; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            </div>
                                        </div>        
                                    </div>
                                </div>
                            </div> 
                        </div>
                    <div>
                </div>
            </div>    
        
    <!-- <a class="fixed-btn" href="javascript:;" data-toggle="modal" data-target=".editSurveyorCharges">
        <img src="assets/img/add.png">
    </a> -->

    <!---Add Edit Sub Services modal start -->
    <div class="modal fade sub_services_modal_main editSurveyorCharges" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog" role="document" id="sub_services_modal_content">

            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Surveyor Charges</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 sub_service_form">
                            <form action="" method="">
                                <div class="content-box-main">
                                    <div class="row">

                                        <!-- <div id="oth_Charge">
                                            <div class="col-md-12">
                                                <div class="form_control_new">  
                                                    <div class="label_head">Other Service Name</div>
                                                    <div class="input-group"> 
                                                        <span class="input-group-addon" id="other_service_name"><i class="fa fa-cog"></i></span> 
                                                        <input class="form-control" name="other_service_name" id="other_service_name" placeholder="Other Service Name"> 
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form_control_new">  
                                                    <div class="label_head"> Other Service Charge</div>
                                                    <div class="input-group"> 
                                                        <span class="input-group-addon" id="other_service_charge"><i class="fa fa-money"></i></span> 
                                                        <input class="form-control" name="other_service_charge" id="other_service_charge" placeholder="Other Service Charge"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div id="ser_Charge">
                                            <div class="col-md-12">
                                                <div class="form_control_new">  
                                                    <div class="label_head">Service Name</div>
                                                    <div class="input-group"> 
                                                        <span class="input-group-addon" id="surveyor_charge"><i class="fa fa-money"></i></span> 
                                                        <input class="form-control" name="surveyor_charge" id="surveyor_charge" value="Plumbing" placeholder="Surveyor Charge"> 
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form_control_new">  
                                                    <div class="label_head">Surveyor Charge</div>
                                                    <div class="input-group"> 
                                                        <span class="input-group-addon" id="surveyor_charge"><i class="fa fa-money"></i></span> 
                                                        <input class="form-control" name="surveyor_charge" id="surveyor_charge" value="500" placeholder="Surveyor Charge"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-danger">Cancel</button>
                                            <button type="button" class="btn btn-primary">Submit</button>
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
    <!---Add Edit Sub Services modal End -->



    <div class="modal fade alert_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content" >
                <div class="modal-body" style="background:#ffffff;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-center">Are you sure! You want to delete it.</p>
                            <p class="text-center">
                                <!-- <button type="button" class="btn-small">Cancel</button> -->
                                <button type="button" class="btn-small btn-success">Ok</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin.layouts.main-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>