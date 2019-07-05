<div class="content-box-main">
    <div class="row">
        <div class="col-md-12">
            <div class="form_control_new">  
                <div class="label_head">First Name</div>
                <div class="form-group">
                    <input class="form-control" name="firstname" id="firstname" value="<?php echo e($user->firstname); ?>" placeholder="First Name" required> 
                    <?php echo $errors->first('firstname', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form_control_new">  
                <div class="label_head">Last Name</div>
                <div class="form-group">
                    <input class="form-control" name="lastname" id="lastname" value="<?php echo e($user->lastname); ?>" placeholder="Last Name"> 
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form_control_new">  
                <div class="label_head">Email/Username</div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" value="<?php echo e($user->email); ?>" id="email" placeholder="Email/Username" required> 
                    <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form_control_new">  
                <div class="label_head">Mobile</div>
                <div class="form-group">
                    <input type="tel" class="form-control" maxlength="10" value="<?php echo e($user->mobile); ?>" name="mobile" id="mobile" placeholder="Mobile" required> 
                    <?php echo $errors->first('mobile', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form_control_new">  
                <?php echo Form::label('password', 'Password ', ['class' => 'label_head']); ?>

                <?php
                    $passwordOptions = ['class' => 'form-control'];
                    if ($formMode === 'create') {
                        $passwordOptions = array_merge($passwordOptions, ['required' => 'required']);
                    }
                ?>
                <div class="form-group">
                <?php echo Form::password('password', $passwordOptions); ?>

                <?php echo $errors->first('password', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form_control_new">  
                <?php echo Form::label('role', 'Role ', ['class' => 'label_head']); ?>

                <div class="form-group">
                <?php echo Form::select('roles[]', $roles, isset($user_roles) ? $user_roles : [], ['class' => 'form-control', 'multiple' => true]); ?>

                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php echo Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn addSerBtn']); ?>    
            <button type="submit" class="btn addSerBtn">Create</button>
        </div>
    </div>
</div>

<!-- <div class="form-group">
    <?php echo Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']); ?>

</div> -->
<!-- <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
    <?php echo Form::label('name', 'Name: ', ['class' => 'control-label']); ?>

    <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

    <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

</div>
<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
    <?php echo Form::label('email', 'Email: ', ['class' => 'control-label']); ?>

    <?php echo Form::email('email', null, ['class' => 'form-control', 'required' => 'required']); ?>

    <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

</div>
<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
    <?php echo Form::label('password', 'Password: ', ['class' => 'control-label']); ?>

    <?php
        $passwordOptions = ['class' => 'form-control'];
        if ($formMode === 'create') {
            $passwordOptions = array_merge($passwordOptions, ['required' => 'required']);
        }
    ?>
    <?php echo Form::password('password', $passwordOptions); ?>

    <?php echo $errors->first('password', '<p class="help-block">:message</p>'); ?>

</div>
<div class="form-group<?php echo e($errors->has('roles') ? ' has-error' : ''); ?>">
    <?php echo Form::label('role', 'Role: ', ['class' => 'control-label']); ?>

    <?php echo Form::select('roles[]', $roles, isset($user_roles) ? $user_roles : [], ['class' => 'form-control', 'multiple' => true]); ?>

</div> -->

