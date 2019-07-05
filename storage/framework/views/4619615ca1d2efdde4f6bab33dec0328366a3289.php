

<?php $__env->startSection('content'); ?>

    <div class="content">
        <ul class="breadcrumb">
            <li>
                <p>YOU ARE HERE</p>
            </li>
            <li>
                <a href="#" class="active">Permissions</a> 
            </li>
        </ul>

        <div class="page-title"> 
            <h3>Permissions  </h3>
        </div>

        
        <div class="grid simple ">
        <form method="post" action="<?php echo e(url('admin/teams/'.$id.'/permissions')); ?>">
        <?php echo e(csrf_field()); ?>

            <div class="grid-body ">
                <div class="row">
                <?php if(isset($permissions) && !empty($permissions)): ?>
                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pemsn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <div class="form_control_new">  
                            <div class="checkbox check-primary text-left">
                                <input id="<?php echo e($pemsn->id); ?>" name="permissions[]" type="checkbox" value="<?php echo e($pemsn->id); ?>" <?php if(is_array($permission) && in_array($pemsn->id, $permission)){ echo  "checked";} ?>>
                                <label for="<?php echo e($pemsn->id); ?>"><?php echo e($pemsn->label); ?></label>
                            </div>
                        </div>
                    </div>    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>  
                </div>

                <hr />
                
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-danger">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        </div>        
    </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin.layouts.header_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>