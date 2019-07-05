

<?php $__env->startSection('content'); ?>

    <style>
        @font-face {
            font-family: 'Nexa Bold';
            src: url('../../public/fonts/Nexa Bold.otf');
        }
        @font-face {
            font-family: 'Arial';
            src: url('../../public/fonts/ARIALBD.TTF');
        }
        .page-title{
            width:100%;
            float:left;
        }
        .page-title i{
            padding-left: 15px;
            top: 9px;
        }
        .page-title h3{
            float: left;
            width: auto;
            font-size: 20px;
            font-family: 'Nexa Bold';
            color: rgba(69, 69, 69, 0.57);
            letter-spacing: 1px;
        }
        .page-title .sub_pages{
            width:auto;
            float:left;
        }
        .page-title .sub_pages h3{
            color: #454545;
        }
        .form_control_new .label_head {
            margin-bottom: 0;
            letter-spacing: 1px;
            color: #4D4D4D;
            font-size: 16px;
            font-weight: 500;
            font-family: 'Nexa Bold';
        }
        .addSerBtn{
            background: #2f9247;
            padding: 8px 20px;
            font-size: 18px;
            color: #ffffff;
            font-family: 'Nexa Bold';
            letter-spacing: 1.5px;
        }
    </style>

    <div class="content">
        <div class="page-title"> 
            <h3> Team </h3>
            <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Add Team</h3></div>
        </div>

                
        <div class="clearfix"></div>
        <?php if(Session::has('message')): ?> 
            <div class="alert alert-info">
                <?php echo e(Session::get('message')); ?> 
            </div> 
        <?php endif; ?>

            <div class="row">
                <div class="col-md-6 ">
                    <div class="sub_service_form">
                   
                         <form action="<?php echo e(route('teams.post')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <div class="content-box-main">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">First Name</div>
                                            <div class="form-group">
                                                <input class="form-control" name="firstname" id="firstname" placeholder="First Name" required> 
                                                <?php echo $errors->first('firstname', '<p class="help-block">:message</p>'); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Last Name</div>
                                            <div class="form-group">
                                                <input class="form-control" name="lastname" id="lastname" placeholder="Last Name" required> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Email</div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required> 
                                                <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Mobile</div>
                                            <div class="form-group">
                                                <input type="tel" class="form-control" maxlength="10" name="mobile" id="mobile" placeholder="Mobile" required> 
                                                <?php echo $errors->first('mobile', '<p class="help-block">:message</p>'); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <?php echo Form::label('password', 'Password ', ['class' => 'label_head']); ?>

                                            
                                            <div class="form-group">
                                            <?php echo Form::password('password',array('class' => 'form-control','required' => 'required')); ?>

                                            <?php echo $errors->first('password', '<p class="help-block">:message</p>'); ?>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <?php echo Form::label('role', 'Role ', ['class' => 'label_head']); ?>

                                            <div class="form-group">
                                            <?php echo Form::select('roles', $roles, isset($user_roles) ? $user_roles : [], ['placeholder' => 'Select Role','class' => 'form-control']); ?>

                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn addSerBtn">Create</button>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                    
                </div>
            </div>
       

    </div>    

<?php $__env->stopSection(); ?>



   

<?php echo $__env->make('admin.layouts.main-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>