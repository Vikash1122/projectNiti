<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row login-container column-seperation">
        <div class="col-md-offset-4 col-md-4">
            
        <form class="login-form" method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo e(csrf_field()); ?>

                <div class="loginFormPanel">
                    <div class="logo">
                        <a href="<?php echo e(route('login')); ?>">
                            <img src="<?php echo e(asset('public/img/logo.png')); ?>" alt="">
                        </a>
                    </div>
                    <h4>Login to your Admin account</h4>
                
                    <div class="row">
                        <div class="form-group col-md-12 <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label class="form-label">Username</label>
                            <input class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus placeholder="Enter Username">
                            <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12 <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label class="form-label">Password</label> <span class="help"></span>
                            <input  id="password" type="password" class="form-control" name="password" placeholder="Enter Password" required>
                            <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="control-group col-md-12">
                            <div class="checkbox checkbox check-success">
                                <input id="checkbox1" type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                <label for="checkbox1">Keep me reminded</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary btn-cons " type="submit">Login</button>
                        </div>
                        <!--<a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                Forgot Your Password?
                            </a>--->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>