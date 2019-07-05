

    <?php $__env->startSection('content'); ?>
        <style>
            /* @font-face {
                font-family: 'Nexa Bold';
                src: url('../../../public/fonts/Nexa Bold.otf');
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
            } */
            .dltBtnImg{
                background: transparent;
                border: none;
                text-align: right;
            }
            .mar_bt_20{
                margin-bottom: 20px;
            }
        </style>

        <div class="content">
            <div class="page-title"> 
                <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
                    <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
                </a>

                <h3>Package  <span class="semi-bold">&nbsp;</span></h3>
                <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Edit Package</h3></div>
            </div>

            <?php if(Session::has('message')): ?> 
                <div class="alert alert-info">
                    <?php echo e(Session::get('message')); ?> 
                </div> 
            <?php endif; ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="sub_service_form">
                        <form method="post" action="<?php echo e(url('admin/contracts/editContractServices/'.$id)); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="content-box-main-ng marginBottom0">
                                <input type="hidden" name="package_id" value="<?php echo e($package->id); ?>" >
                                <h3><?php echo e($package->package_type); ?></h3>

                                <!-- <div class="header_main_div_sec">
                                    <div class="title">
                                        <input type="hidden" name="package_id" value="<?php echo e($package->id); ?>" >
                                        <h5><?php echo e($package->package_type); ?></h5>
                                    </div>       
                                </div> -->

                                <div class="content-box-main marginBottom0">
                                    <?php if(isset($package->packcat[0]) && !empty($package->packcat[0])): ?>
                                        <?php $__currentLoopData = $package->packcat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="order_history_box">
                                                <div class="row srvLst mar_bt_20">
                                                    <div class="col-md-6"> 
                                                        <div class="form_control_new">  
                                                            <div class="label_head">Package Category</div>
                                                            <select id="package_category" name="package_cat_id[]" style="width:100%">
                                                                <option value="" selected>Select Package Category</option>
                                                                <?php if(isset($category[0]) && !empty($category[0])): ?>
                                                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option <?php if(isset($cate->id) && !empty($cate->id) && $cate->id == $ct->id){ echo "selected";}else{ echo "";}?> value="<?php echo e($ct->id); ?>"><?php echo e($ct->title); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php if(isset($cate->pc[0]) && !empty($cate->pc[0])): ?>
                                                
                                                    <div class="row" id="serviceListPkg">
                                                        <?php $__currentLoopData = $cate->pc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="col-md-6">
                                                                <div class="order_history_box">
                                                                    <div class="form_control_new">  
                                                                        <div class="label_head">Service Name 
                                                                            <span class="pull-right">
                                                                            <?php if(hasPermissionThroughRole('delete_contract_service')): ?>
                                                                                <a href="<?php echo e(url('admin/contracts/deleteContactServices/'.$sub->id)); ?>">
                                                                                    <button type="button" class="dltBtnImg">
                                                                                        <img src="/public/img/cancel.png" />
                                                                                    </button>
                                                                                </a>
                                                                            <?php endif; ?>
                                                                            </span>
                                                                        </div>
                                                                        <div class="form-group"> 
                                                                            <input class="form-control" name="pkg_service_name_<?php echo e($cate->id); ?>[]" value="<?php echo e($sub->pkg_service_name); ?>" id="pkg_service_name" placeholder="Enter Service Name" /> 
                                                                        </div>
                                                                    </div>

                                                                    <div class="form_control_new">  
                                                                        <div class="label_head">Service Description</div>
                                                                        <div class="form-group"> 
                                                                            <textarea class="form-control" id="pkg_service_desc" name="pkg_service_desc_<?php echo e($cate->id); ?>[]" placeholder="Enter Service Description"><?php echo e($sub->pkg_service_desc); ?></textarea>
                                                                            <!-- <span class="input-group-addon" id="pkg_service_desc"><i class="fa fa-user"></i></span> 
                                                                            <input class="form-control" name="pkg_service_name" id="pkg_service_name" placeholder="Enter Service Name" />  -->
                                                                        </div>
                                                                    </div> 
                                                                </div>   
                                                            </div>

                                                            <!-- <div class="col-md-6">
                                                                <div class="form_control_new">  
                                                                    <div class="label_head">Service Description</div>
                                                                    <div class="form-group"> 
                                                                        <textarea class="form-control" id="pkg_service_desc" name="pkg_service_desc_<?php echo e($cate->id); ?>[]" placeholder="Enter Service Description"><?php echo e($sub->pkg_service_desc); ?></textarea>
                                                                        <span class="input-group-addon" id="pkg_service_desc"><i class="fa fa-user"></i></span> 
                                                                        <input class="form-control" name="pkg_service_name" id="pkg_service_name" placeholder="Enter Service Name" />  --/>
                                                                    </div>
                                                                </div>    
                                                            </div> -->

                                                                <!-- <div class="col-md-2">
                                                                    <div class="form_control_new text-right">  
                                                                        <div class="label_head">&nbsp;</div>
                                                                        <button type="button" class="btn btn-primary btn-cons" onclick="addServicesPkg()">Add More Service</button>
                                                                    </div>
                                                                </div> -->
                                                            <!-- </div>  -->
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>

                                <div class="new_add_srv_btn_block">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn new_add_srv_btn">Update</button>
                                        </div>
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
                    '<div class="col-md-6">'+
                        '<div class="order_history_box">'+
                            '<div class="row" >'+
                                '<div class="col-md-10">'+
                                    '<div class="form_control_new">  '+
                                        '<div class="label_head">Service Name</div>'+
                                        '<div class="form-group"> '+
                                            '<input class="form-control" name="pkg_service_name[]" id="pkg_service_name" placeholder="Enter Service Name" /> '+
                                        '</div>'+
                                    '</div>   '+

                                    '<div class="form_control_new">  '+
                                        '<div class="label_head">Service Description</div>'+
                                        '<div class="form-group"> '+
                                            '<textarea class="form-control" name="pkg_service_desc[]" id="pkg_service_desc" placeholder="Enter Service Description"></textarea>'+
                                        '</div>'+
                                    '</div>'+ 

                                '</div>'+

                                // '<div class="col-md-5">'+
                                //     '<div class="form_control_new">  '+
                                //         '<div class="label_head">Service Description</div>'+
                                //         '<div class="form-group"> '+
                                //             '<textarea class="form-control" name="pkg_service_desc[]" id="pkg_service_desc" placeholder="Enter Service Description"></textarea>'+
                                //         '</div>'+
                                //     '</div>'+  
                                // '</div>'+

                                '<div class="col-md-2">'+
                                    '<div class="form_control_new text-right">'+  
                                        '<div class="label_head">&nbsp;</div>'+
                                        '<button type="button" class="btn btn-danger btn-cons" onclick="removeServicesPkg($(this))">Remove</button>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                        '</div>'+
                    '</div>'

                    // '<div class="row" >'+
                    //     '<div class="col-md-5">'+
                    //         '<div class="form_control_new">  '+
                    //             '<div class="label_head">Service Name</div>'+
                    //             '<div class="input-group"> '+
                    //                 '<span class="input-group-addon" id="pkg_service_name"><i class="fa fa-user"></i></span>'+ 
                    //                 '<input class="form-control" name="pkg_service_name[]" id="pkg_service_name" placeholder="Enter Service Name" /> '+
                    //             '</div>'+
                    //         '</div>   '+
                    //     '</div>'+

                    //     '<div class="col-md-5">'+
                    //         '<div class="form_control_new">  '+
                    //             '<div class="label_head">Service Description</div>'+
                    //             '<div class="form-group"> '+
                    //                 '<textarea class="form-control" name="pkg_service_desc[]" id="pkg_service_desc" placeholder="Enter Service Description"></textarea>'+
                    //             '</div>'+
                    //         '</div>'+  
                    //     '</div>'+

                    //     '<div class="col-md-2">'+
                    //         '<div class="form_control_new text-right">'+  
                    //             '<div class="label_head">&nbsp;</div>'+
                    //             '<button type="button" class="btn btn-danger btn-cons" onclick="removeServicesPkg($(this))">Remove</button>'+
                    //         '</div>'+
                    //     '</div>'+
                    // '</div>'
            )
            }

            function removeServicesPkg(caller){
            //console.log(caller);
            $(caller).closest('.row').remove();
            }
        </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.package_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>