

<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('public/plugins/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrap-select2/select2.css')); ?>" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo e(asset('public/plugins/jquery-datatable/css/jquery.dataTables.css')); ?>" rel="stylesheet" type="text/css" />
<!-- <link href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css"  rel="stylesheet" type="text/css"  />  -->
<link href="<?php echo e(asset('public/plugins/datatables-responsive/css/datatables.responsive.css')); ?>" rel="stylesheet" type="text/css" media="screen" />


<style>
        .cardViewTable .table-condensed thead{
            display:none;
        }
        .cardViewTable tr td{
            width:100% !important;
            display: block;
        }
        .cardViewTable .DTTT {
            display:none !important;
        }
        .cardViewTable .select2-container .select2-choice .select2-arrow b:before{
          content:"" !important;  
        }
        .cardViewTable .select2-container{
            width: 60px !important;
        }
        .cardViewTable .select2-container .select2-choice{
            height: 35px;
            padding: 6px 0 6px 8px;
            border-radius: 4px !important;
            border: 1px solid #dbdbdb;
        }
        .cardViewTable .select2-container .select2-choice .select2-arrow{
            background: transparent;
            border-left: none;
        }
        .cardViewTable .table td{
            border-top: none !important;
        }
        @font-face {
            font-family: 'Arial';
            src: url('../public/fonts/ARIALBD.TTF');
        }
        .arialFont{
            font-family: 'Arial' !important;
        }
        .new_btn_add_service{
            width: auto;
            display: inline-block;
            background: #2f9348;
            color: #ffffff;
            float: right;
            padding: 8px;
            font-family: 'Nexa Bold';
            font-size: 16px;
            font-weight: 100 !important;
            letter-spacing: 1.5px;
        }
        .new_btn_add_service:hover, .new_btn_add_service i:hover{
            color:#ffffff !important;
        }
        .new_btn_add_service i{
            color: #ffffff !important;
            top: 4px !important;
            font-size: 16px;
            margin-right: 8px;
        }
        .page-title {
            background: #ffffff !important;
            padding: 7px;
        }
        .page-title h3 {
            width: auto !important;
            font-family: 'Nexa Bold';
            color: #454545;
            padding-left: 10px;
            line-height: 20px;
            letter-spacing: 1.0px;
            font-size: 22px;
        }
        .toggleCheckBox .slider{
            background-color: rgba(246, 5, 5, 0.6509803921568628) ;
        }
    </style>
    
            <div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">Team List</a> </li>
                </ul>

                <div class="page-title"> 
                    <!-- <a href="<?php echo e(url()->previous()); ?>">
                        <i class="icon-custom-left"></i>
                    </a> -->
                    <h3>Team List  </h3>
                    <a href="<?php echo e(url('/admin/teams/create')); ?>" class="new_btn_add_service"><i class="fa fa-plus"></i> Add New </a>
                </div>
                <?php if(Session::has('message')): ?> 
                    <div class="alert alert-info">
                        <?php echo e(Session::get('message')); ?> 
                    </div> 
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="row-fluid cardViewTable">
                                    <div class="span12">
                                        <div class="grid simple ">
                                            <!-- <div class="grid-title">
                                                <h4>Table <span class="semi-bold">Styles</span></h4>
                                                <div class="tools">
                                                <a href="javascript:;" class="collapse"></a>
                                                <a href="#grid-config" data-toggle="modal" class="config"></a>
                                                <a href="javascript:;" class="reload"></a>
                                                <a href="javascript:;" class="remove"></a>
                                                </div>
                                            </div> -->
                                            <div class="grid-body ">
                                                <table class="table table-condensed" id="example">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:100%" classs="">
                                                                <div class="widget_img_box" style="margin-right:auto;margin-left:auto;">
                                                                    <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="">
                                                                </div>
                                                            </th>
                                                            <th style="width:100%">&nbsp;</th>
                                                            <th style="width:100%">&nbsp;</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                    <?php if(isset($users) && !empty($users)): ?>
                                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr class="col-md-4 userCard">
                                                                <!-- <div class="controller overlay">
                                                                    <a href="<?php echo e(url('/admin/teams/' . $usr->id . '/edit')); ?>" class="EditService editSub_btn pull-left border_radius_right edt_btn" ><i class="fa fa-pencil"></i></a>
                                                                    <a href="<?php echo e(url('admin/services/destroy',$usr->id)); ?>" class=" pull-right border_radius_left dlt_btn" onclick="return confirm('Are you sure you want to delete this record?');" title="Delete Service"><i class="fa fa-times"></i></a>
                                                                </div> -->
                                                            <td style="width:100%" class="v-align-middle ">
                                                                <div class="widget_user_list">
                                                               
                                                                    <div class="widget_usr_img_blk">
                                                                        <div class="widget_img_box">
                                                                        <?php if(isset($usr->profile_pic) && !empty($usr->profile_pic)): ?>
                                                                        <img src="<?php echo e(fileurlUser().$usr->profile_pic); ?>" class="">
                                                                        <?php else: ?>
                                                                            <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="">
                                                                        <?php endif; ?>
                                                                        </div>
                                                                        <h4><?php echo e($usr->firstname); ?> <span><?php echo e($usr->lastname); ?></span></h4>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td style="width:100%" class="v-align-middle">
                                                                <div class="widget_user_content_main">
                                                                    <div class="widget_content">
                                                                        <div class="inr_ct">
                                                                            <div class="inr_ct1">
                                                                                <div class="icn_box"><i class="fa fa-envelope"></i></div>
                                                                                <div class="inf_text"><?php echo e($usr->email); ?></div>
                                                                            </div> 

                                                                            <div class="inr_ct1">
                                                                                <div class="icn_box"><i class="fa fa-phone"></i></div>
                                                                                <div class="inf_text"><?php echo e($usr->mobile); ?></div>
                                                                            </div> 
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td style="width:100%" class="v-align-middle">
                                                                <div class="usr_link_outer">
                                                                <a href="#" title="View User">View</a></div>
                                                            </td>
                                                        </tr>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                
                           
                            </div>
                        </div>    
                    </div>
                </div>    
            </div>  

            <!-- <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                        <a href="<?php echo e(url('/admin/teams/create')); ?>" class="btn btn-success btn-sm" title="Add New User">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <?php echo Form::open(['method' => 'GET', 'url' => '/admin/teams', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search']); ?>

                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <?php echo Form::close(); ?>


                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Name</th><th>Email</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->id); ?></td>
                                        <td><a href="<?php echo e(url('/admin/teams', $item->id)); ?>"><?php echo e($item->firstname); ?></a></td><td><?php echo e($item->email); ?></td>
                                        <td>
                                            <a href="<?php echo e(url('/admin/teams/' . $item->id)); ?>" title="View User"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="<?php echo e(url('/admin/teams/' . $item->id . '/edit')); ?>" title="Edit User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            <?php echo Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/teams', $item->id],
                                                'style' => 'display:inline'
                                            ]); ?>

                                                <?php echo Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete User',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )); ?>

                                            <?php echo Form::close(); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination"> <?php echo $users->appends(['search' => Request::get('search')])->render(); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> -->
<?php $__env->stopSection(); ?>  




    




<?php echo $__env->make('admin.layouts.header_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>