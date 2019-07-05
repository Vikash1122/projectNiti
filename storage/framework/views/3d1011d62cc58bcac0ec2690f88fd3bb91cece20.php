
    <?php $__env->startSection('content'); ?>
        <div class="content">
            <div class="page-title"> 
                <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
                    <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
                </a>
                <h3>Add Package Category<span class="semi-bold">&nbsp;</span></h3>
            </div>

            <div class="content-box-main-ng marginBottom0">
                <h3 class="text-center">Add Package Category</h3>
                <form method="post" action="<?php echo e(route('category.post')); ?>" >
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(Session::has('message')): ?> 
                                <div class="alert alert-info">
                                    <?php echo e(Session::get('message')); ?> 
                                </div> 
                            <?php endif; ?>
                            <div class="content-box-main marginBottom0">
                                <div class="header_main_div_sec">
                                    <div class="title marginBottom40">
                                        <h5 class="pull-left">Add Category</h5>
                                        <button type="button" class="btn btn-primary pull-right" onclick="addCategory()">Add More Category</button>
                                    </div>       
                                </div>

                                <div class="row srvLst ">
                                <?php echo e(csrf_field()); ?>

                                    <div class="col-md-3">
                                        <div class="form_control_new">  
                                            <div class="label_head">Package Type</div>
                                            <select id="package_id" name="package_id" style="width:100%" required>
                                                <option value="" selected>Select Package Type</option>
                                                <?php if(isset($packages) && !empty($packages)): ?>
                                                <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pack): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($pack->id); ?>"><?php echo e($pack->package_type); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="row" id="boxCategory">
                                            <div class="col-md-4">
                                                <div class="form_control_new">  
                                                    <div class="label_head">Category Name</div>
                                                    <div class="form-group"> 
                                                        <input class="form-control" name="title[]" id="title" placeholder="Category Name" required> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-4"> 
                                        <div class="form_control_new">  
                                            <div class="label_head">Category Name</div>
                                            <div class="input-group"> 
                                                <span class="input-group-addon" id="category_name"><i class="fa fa-user"></i></span> 
                                                <input class="form-control" name="category_name" id="category_name" placeholder="Category Name"> 
                                            </div>
                                        </div>
                                    </div> -->
                                    
                                </div>                                
                            </div>

                            <div class="content-box-main-footer-ng">
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-4">
                                        <button type="button" name="" class="btn-large actionBtn redBg">cancel</button>
                                        <button type="submit" name="" class="btn-large actionBtn greenBg">Save</button>
                                    </div>
                                </div>
                            </div> 
                        </div> 
                    </div>    
                </form>   
            </div>     
        </div>    
           
        <script>

        function addCategory(){
            $("#boxCategory").append(
                '<div class="col-md-4">'+
                    '<div class="form_control_new">  '+
                        '<div class="label_head">Category Name <span class="pull-right" onclick="removeServicesPkg($(this))"><img src="<?php echo e(asset("public/img/cancel.png")); ?>" /></span></div>'+
                        '<div class="form-group">'+ 
                            '<input class="form-control" name="title[]" id="title" placeholder="Category Name"> '+
                        '</div>'+
                    '</div>'+
                '</div>'
            )
        }

        function removeServicesPkg(caller){
           $(caller).closest('.col-md-4').remove();
        }
        </script>
    <?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin.layouts.package_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>