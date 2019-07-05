

<?php $__env->startSection('content'); ?>
            <div class="content">
                <div class="page-title"> 
                    <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
                        <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
                    </a>
                    <h3>Add Package  <span class="semi-bold">&nbsp;</span></h3>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="content-box-main-ng marginBottom0">
                            <h3 class="text-center">Add New Package</h3>
                            <form method="post" action="<?php echo e(route('contracts.post')); ?>">
                                <?php echo e(csrf_field()); ?>

                                
                                <?php if(Session::has('message')): ?> 
                                    <div class="alert alert-info">
                                        <?php echo e(Session::get('message')); ?> 
                                    </div> 
                                <?php endif; ?>

                                <div class="content-box-main-vdr">
                                    <div class="content-box-main marginBottom0">
                                        <div class="row srvLst">
                                            <div class="col-md-5">
                                                <div class="form_control_new">  
                                                    <div class="label_head">Package Type</div>
                                                    <select id="package_type" name="package_id" style="width:100%">
                                                        <option value="" selected>Select Package Type</option>
                                                        <?php if(isset($packages) && !empty($packages)): ?>
                                                        <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pack): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($pack->id); ?>"><?php echo e($pack->package_type); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-5"> 
                                                <div class="form_control_new">  
                                                    <div class="label_head">Package Category</div>
                                                    <select id="package_category" name="package_cat_id" style="width:100%">
                                                        <option value="" selected>Select Package Category</option>
                                                        <?php if(isset($cat) && !empty($cat)): ?>
                                                        <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($c->id); ?>"><?php echo e($c->title); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div id="serviceListPkg">
                                            <div class="row" >
                                                <div class="col-md-5">
                                                    <div class="form_control_new">  
                                                        <div class="label_head">Service Name</div>
                                                        <div class="form-group"> 
                                                            <input class="form-control" name="pkg_service_name[]" id="pkg_service_name" placeholder="Enter Service Name" /> 
                                                        </div>
                                                    </div>   
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="form_control_new">  
                                                        <div class="label_head">Service Description</div>
                                                        <div class="form-group"> 
                                                            <textarea class="form-control" id="pkg_service_desc" name="pkg_service_desc[]" placeholder="Enter Service Description"></textarea>
                                                            <!-- <span class="input-group-addon" id="pkg_service_desc"><i class="fa fa-user"></i></span> 
                                                            <input class="form-control" name="pkg_service_name" id="pkg_service_name" placeholder="Enter Service Name" />  -->
                                                        </div>
                                                    </div>    
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form_control_new text-right">  
                                                        <div class="label_head">&nbsp;</div>
                                                        <button type="button" class="btn btn-primary btn-cons" onclick="addServicesPkg()">Add More Service</button>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>

                                <hr />
                                <div class="content-box-main-footer-ng">
                                    <div class="row" >
                                        <div class="col-md-offset-4 col-md-4">
                                            <button type="button" name="" class="btn-large actionBtn redBg">cancel</button>
                                            <button type="submit" name="" class="btn-large actionBtn greenBg">Save</button>
                                        </div>
                                    </div>
                                </div>  
                            </form>
                        </div>
                       
                    </div> 
                </div>            
            </div>    
       
    <script>
       function addServicesPkg(){
            $("#serviceListPkg").append(
                '<div class="row" >'+
                    '<div class="col-md-5">'+
                        '<div class="form_control_new">  '+
                            '<div class="label_head">Service Name</div>'+
                            '<div class="form-group"> '+
                                '<input class="form-control" name="pkg_service_name[]" id="pkg_service_name" placeholder="Enter Service Name" /> '+
                            '</div>'+
                        '</div>   '+
                    '</div>'+

                    '<div class="col-md-5">'+
                        '<div class="form_control_new">  '+
                            '<div class="label_head">Service Description</div>'+
                            '<div class="form-group"> '+
                                '<textarea class="form-control" name="pkg_service_desc[]" id="pkg_service_desc" placeholder="Enter Service Description"></textarea>'+
                            '</div>'+
                        '</div>'+  
                    '</div>'+

                    '<div class="col-md-2">'+
                        '<div class="form_control_new text-right">'+  
                            '<div class="label_head">&nbsp;</div>'+
                            '<button type="button" class="btn btn-danger btn-cons" onclick="removeServicesPkg($(this))">Remove</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'
           )
        }

        function removeServicesPkg(caller){
           //console.log(caller);
           $(caller).closest('.row').remove();
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.package_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>