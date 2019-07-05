
<?php $__env->startSection('content'); ?>
                <div class="content">
                    <ul class="breadcrumb">
                        <li>
                            <p>YOU ARE HERE</p>
                        </li>
                        <li><a href="#" class="active">Add Contract</a> </li>
                    </ul>

                    <div class="page-title"> 
                        <a href="<?php echo e(url()->previous()); ?>">
                            <i class="icon-custom-left"></i>
                        </a>
                        <h3>Add Contract  <span class="semi-bold">&nbsp;</span></h3>
                    </div>
                <form method="post" action="<?php echo e(route('package_form.post')); ?>" >
                    <div class="row">
                        <div class="col-md-12">
                        <?php if(Session::has('message')): ?> 
                                        <div class="alert alert-info">
                                            <?php echo e(Session::get('message')); ?> 
                                        </div> 
                                    <?php endif; ?>
                            <div class="content-box-main">
                                <div class="header_main_div_sec">
                                    <div class="title">
                                        <h5>Add New Contract</h5>
                                    </div>       
                                </div>
                                <div class="row srvLst">
                                <?php echo e(csrf_field()); ?>

                                    <div class="col-md-4">
                                        <div class="form_control_new">  
                                            <div class="label_head">Contract Title</div>
                                            <div class="input-group"> 
                                                <span class="input-group-addon" id="package_type"><i class="fa fa-user"></i></span> 
                                                <input class="form-control" name="package_type" id="package_type" placeholder="Contract Title" required> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4"> 
                                        <div class="form_control_new">  
                                            <div class="label_head">Contract Price</div>
                                            <div class="input-group"> 
                                                <span class="input-group-addon" id="package_price"><i class="fa fa-user"></i></span> 
                                                <input class="form-control" name="package_price" id="package_price" placeholder="Contract Price" required> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4"> 
                                        <div class="form_control_new">  
                                            <div class="label_head">No of Callouts</div>
                                            <div class="input-group"> 
                                                <span class="input-group-addon" id="callouts"><i class="fa fa-user"></i></span> 
                                                <input class="form-control" name="callouts" id="callouts" placeholder="No of Callouts " required> 
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="row" >
                                    <div class="col-md-12">
                                        <button type="button" name="" class="btn btn-danger">cancel</button>
                                        <button type="submit" name="" class="btn btn-primary">Save</button>
                                    </div>
                                </div>  
                            </div>
                        </div> 
                    </div> 
                </form>           
                </div> 
<?php $__env->stopSection(); ?>   
            
<?php echo $__env->make('admin.layouts.package_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>