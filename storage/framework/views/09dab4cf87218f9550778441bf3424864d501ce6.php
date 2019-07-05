
<?php $__env->startSection('css'); ?>
<style>
    @font-face {
        font-family: 'Nexa Bold';
        src: url('<?php echo e(asset("public/fonts/Nexa Bold.otf")); ?>');
    }
    @font-face {
        font-family: 'Arial';
        src: url('<?php echo e(asset("public/fonts/ARIALBD.TTF")); ?>');
    }
    .page-title{
        width:100%;
        float:left;
    }
    .page-title i{
        padding-left: 15px;
        top: 9px;
    }

    .sub_service_form{
        box-shadow: 0px 1px 7px hsla(0, 0%, 37%, 0.3607843137);
        width: 100%;
        float: left;
    }

    .form-control::placeholder{
        color: rgba(77, 77, 77, .34);
        font-weight: 100 !important;
        font-size:20px;
    }
    .form-control:-ms-input-placeholder{
        color: rgba(77, 77, 77, .34);
        font-weight: 100 !important;
        font-size:20px;
    }
    .form-control::-ms-input-placeholder{
        color: rgba(77, 77, 77, .34);
        font-weight: 100 !important;
        font-size:20px;
    }
    
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="content">
    <div class="page-title"> 
        <a class="previousBtn" href="<?php echo e(url()->previous()); ?>">
            <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
        </a>
        
        <h3> Inventory Margin </h3>
        <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Add Margin</h3></div>
    </div>

            
    <div class="clearfix"></div>
    <?php if(Session::has('message')): ?> 
        <div class="alert alert-info">
            <?php echo e(Session::get('message')); ?> 
        </div> 
    <?php endif; ?>

    <!-- <div class="content-box-main"> -->
        <div class="row">
            <div class="col-md-4 ">
                <div class="sub_service_form">
                    <form action="<?php echo e(route('margin.post')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                        <div class="content-box-main-ng marginBottom0">
                            <h3>Add New Margin</h3>
                            <div class="content-box-main marginBottom0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Amount</div>
                                            <div class="form-group">
                                                <input class="form-control" name="amount" id="amount" placeholder="Enter Amount" required> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Margin</div>
                                            <div class="form-group"> 
                                                <input class="form-control"  name="margin" id="margin" placeholder="Enter Margin" required> 
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                            <div class="new_add_srv_btn_block">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn new_add_srv_btn">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </form>
                </div>
                
            </div>
        </div>
    <!-- </div> -->
    

</div>    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>