<style>
    .labelheading{color: #2f9247;
        font-weight: 500;
        margin-bottom: 10px;
        width: 100%;
        letter-spacing: .5px;
    }
    .labelheading11{
        color: #2f9247 !important;
        font-weight: 500 !important;
        margin-bottom: 10px;
        letter-spacing: .5px;
    }
    .permissionListBox{
        border-bottom: 1px solid #cccccc6b;
        margin-bottom: 10px;
        padding-top: 10px;
        width: 100%;
    }
</style>
<div class="content-box-main">
    <div class="row">
        <div class="col-md-6">
            <div class="form_control_new">  
                <div class="label_head">User Name</div>
                <div class="">
                    <input class="form-control" name="name" id="name" placeholder="User Name" > 
                    <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

                </div>
                <div class="messages"></div>
            </div>
        </div>

        <div class="col-md-12 text-center" style="margin-top:20px;">
            <div class="form_control_new">  
                <div class="label_head">Click to give permissions to this Group</div><hr/>
            </div>
            <div class="messages1"></div>
            <div class="form_control_new"> 
                
            <?php if(isset($permissions) && !empty($permissions)): ?>
                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pemsn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="permissionListBox">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="checkbox check-primary text-left">
                                <input id="<?php echo e($pemsn->id); ?>" name="permissions[]" type="checkbox" value="<?php echo e($pemsn->id); ?>">
                                <label class="labelheading11" for="<?php echo e($pemsn->id); ?>"><?php echo e($pemsn->label); ?></label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <?php if(isset($pemsn->permissions[0]) && !empty($pemsn->permissions[0])): ?>
                        <?php $__currentLoopData = $pemsn->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3">  
                                <div class="checkbox check-primary text-left">
                                    <input id="<?php echo e($perm->id); ?>" name="permissions[]" type="checkbox" value="<?php echo e($perm->id); ?>">
                                    <label for="<?php echo e($perm->id); ?>"><?php echo e($perm->label); ?></label>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- <button type="submit" class="btn addSerBtn">Create</button> -->
            <?php echo Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn addSerBtn']); ?>

        </div>
    </div>
</div>
