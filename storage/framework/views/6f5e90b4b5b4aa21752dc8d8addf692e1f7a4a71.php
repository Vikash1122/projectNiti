<?php $__env->startSection('css'); ?>
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
    
    .new_btn_add_service:hover, .new_btn_add_service i:hover{
        color:#ffffff !important;
    }
    
    .toggleCheckBox .slider{
        background-color: rgba(246, 5, 5, 0.6509803921568628) ;
    }
    .widget_usr_img_blk .controller{
        width: auto;
        float: right;
    }
    .widget_usr_img_blk .controller a{
        padding-right: 10px;
        color:#ffffff !important;
    }
    .userRole_text{
        display: block;
        text-align: center;
        padding-bottom: 25px;
        color: #fff;
        font-size: 14px;
    }
    .widget_usr_img_blk h4{
        height:auto; 
        padding-bottom: 0px;
        margin-bottom: 5px;

    }
    
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="page-title"> 
        <a class="previousBtn" href="<?php echo e(url()->previous()); ?>">
            <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
        </a>
        <h3>Privileges List  </h3>

        <a href="<?php echo e(url('/admin/teams/create')); ?>" class="new_btn_add_service"><i class="fa fa-plus"></i> Add New</a>
        
        <div class="serchBarDiv">
            <div class="searchContainer">
                <input class="searchBox" type="search" id="search" name="search" placeholder="Search">
                <i class="fa fa-search searchIcon"></i>
            </div>
        </div>
    </div>

    <?php if(Session::has('message')): ?> 
        <div class="alert alert-info">
            <?php echo e(Session::get('message')); ?> 
        </div> 
    <?php endif; ?>

    <div class="row">
        <div class="col-md-12">
            <div class="content-box-main">
                <div class="">
                    <div class="row" id="userFilter">
                        <?php if(isset($users) && !empty($users)): ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3">
                                    <div class="new_srv_box userList_ng">
                                        <div class="controller overlay">
                                            <?php if(hasPermissionThroughRole('edit_admin')): ?>
                                                <a href="<?php echo e(url('/admin/teams/' . $usr->id . '/edit')); ?>" class="EditService editSub_btn pull-left border_radius_right edt_btn" ><i class="fa fa-pencil"></i></a>
                                            <?php endif; ?>
                                            <?php if(hasPermissionThroughRole('delete_admin')): ?>
                                                <a href="<?php echo e(url('admin/teams/'.$usr->id.'/destroy')); ?>" class=" pull-right border_radius_left dlt_btn" onclick="return confirmation();" title="Delete Service"><i class="fa fa-times"></i></a>
                                            <?php endif; ?>
                                            <!-- <a href="#" data-id="1" onclick="return confirm('Are you sure you want to delete this record?');" class="EditService editSub_btn pull-left dlt_btn" title="Delete Service"><i class="fa fa-times"></i></a>
                                            <a href="#" class=" pull-right edt_btn " title="Edit Service"><i class="fa fa-pencil"></i></a> -->
                                        </div>

                                        <div class="userInf_ng">
                                            <div class="userImg_ng">
                                                <?php if(isset($usr->profile_pic) && !empty($usr->profile_pic)): ?>
                                                    <img src="<?php echo e(fileurlUser().$usr->profile_pic); ?>" class="">
                                                    <?php else: ?>
                                                    <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="">
                                                <?php endif; ?>
                                            </div>
                                            <h4 class="text-center"><?php echo e($usr->firstname); ?> 
                                            <?php if(isset($usr->lastname) && !empty($usr->lastname)): ?>
                                            <span> <?php echo e($usr->lastname); ?></span>
                                            <?php endif; ?>
                                            </h4>
                                            <p class="text-center">(<?php echo e($usr->role_user->name); ?>)</p>
                                        </div>

                                        <div class="userCaption_ng">
                                            <div class="caption_ng">
                                                <div class="icon_ng"><i class="fa fa-envelope"></i></div>
                                                <?php if(strlen($usr->email) > 17 ): ?>
                                                <div class="userText_ng"><?php echo e(substr($usr->email, 0, 17) . '...'); ?></div>
                                                <?php else: ?>
                                                <div class="userText_ng"><?php echo e(substr($usr->email, 0, 17)); ?></div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="caption_ng">
                                                <div class="icon_ng"><i class="fa fa-phone"></i></div>
                                                <div class="userText_ng"><?php echo e($usr->mobile); ?></div>
                                            </div>

                                            <div class="caption_ng">
                                                <!-- <div class="action_box" style="margin-bottom:0px;">
                                                    <div class="card_box_opt"> -->
                                                        <?php if(hasPermissionThroughRole('change_status')): ?>
                                                        <div class="toggleCheckBox" style="text-align: center;">
                                                            <?php if($usr->status == 1): ?>
                                                            <label class="switch">
                                                                <input name="status" type="checkbox" onclick="statusChange(<?php echo $usr->id; ?>)" value="0" id="enable_<?php echo e($usr->id); ?>" checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                            <?php else: ?>
                                                            <label class="switch">
                                                                <input name="status" type="checkbox" onclick="statusChange(<?php echo $usr->id; ?>)" value="1" id="enable_<?php echo e($usr->id); ?>">
                                                                <span class="slider round"></span>
                                                            </label>
                                                            <?php endif; ?>
                                                        </div>
                                                        <?php endif; ?>
                                                    <!-- </div>                                                
                                                </div>  -->
                                            </div>

                                            <!-- <div class="btn_ng">
                                                <a class="" href="">More Details</a>
                                            </div> -->
                                        </div>

                                        
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php else: ?>
                        <div class="col-md-12">
                            <h4 class="text-center">No Record Found!</h4>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>    
</div>  
<?php $__env->stopSection(); ?>  
<?php $__env->startSection('js'); ?>
<script>
function confirmation() {
    return confirm('Are you sure you want to delete this Privilege user?');
}
$('#search').on('keyup',function(){
    //if($(this).val().length >= 2) {
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : "<?php echo e(route('teams.search')); ?>",
            data:{
                'search':$value
                },
            success:function(data){
                
                var json = $.parseJSON(data);
                 //alert(json);
                 var htmlslot;
                 $('#userFilter').html('');
                if(json.length > 0){
                    $.each(json,function(index, value){
                    
                        var user_image='';
                        var user_image1 = "<?php echo fileurlUser(); ?>"+ value.profile_pic;
                        if(value.profile_pic == null || value.profile_pic == ''){
                            var user_image = '<img src="<?php echo e(asset("public/img/defaultIcon.png")); ?>" class="img-responsive" />';
                
                        }else{
                            var user_image = '<img src="'+ user_image1 +'" class="img-responsive">';
                        
                        }
                        var edit_permission='';
                        if("<?php echo hasPermissionThroughRole('edit_admin'); ?>"){
                            var edit_permission = '<a href="http://3.16.87.53/admin/teams/'+value.id+'/edit" class="EditService editSub_btn pull-left border_radius_right edt_btn"><i class="fa fa-pencil"></i></a>';
                        }
                        var delete_permission='';
                        if("<?php echo hasPermissionThroughRole('delete_admin'); ?>"){
                            var delete_permission = '<a href="http://3.16.87.53/admin/teams/'+value.id+'/destroy" class=" pull-right border_radius_left dlt_btn" onclick="return confirmation();" title="Delete Service"><i class="fa fa-times"></i></a>';
                        }
                        var changestatus_permission='';
                        if("<?php echo hasPermissionThroughRole('change_status'); ?>"){

                            var changestatus_permission = '<div class="toggleCheckBox" style="text-align: center;">';
                                                if(value.status == 1){
                                                    changestatus_permission +='<label class="switch">'+
                                                    '<input name="status" type="checkbox" onclick="statusChange('+value.id+')" value="0" id="enable_'+value.id+'" checked>'+
                                                    '<span class="slider round"></span>'+
                                                '</label>';
                                                }else{
                                                    changestatus_permission +='<label class="switch">'+
                                                    '<input name="status" type="checkbox" onclick="statusChange('+value.id+')" value="1" id="enable_'+value.id+'">'+
                                                    '<span class="slider round"></span>'+
                                                '</label>';
                                                }
                                                changestatus_permission +='</div>';
                        }

                        htmlslot='<div class="col-md-3">'+
                                '<div class="new_srv_box userList_ng">'+
                                    '<div class="controller overlay">'+
                                    ''+edit_permission+''+
                                    ''+delete_permission+''+
                                    '</div>'+

                                    '<div class="userInf_ng">'+
                                        '<div class="userImg_ng">'+
                                            ''+user_image+''+
                                        '</div>'+
                                        '<h4 class="text-center">'+value.firstname+'';
                                        if(value.lastname != '' && value.lastname != null){
                                        htmlslot+=' <span>'+value.lastname+'</span>';
                                        }
                                        htmlslot+='</h4>'+
                                        '<p class="text-center">('+value.role_user.name+')</p>'+
                                    '</div>'+

                                    '<div class="userCaption_ng">'+
                                        '<div class="caption_ng">'+
                                            '<div class="icon_ng"><i class="fa fa-envelope"></i></div>';
                                            if((value.email).length > 17 ){
                                            htmlslot+='<div class="userText_ng">'+value.email.substring(0,17)+'...'+'</div>';
                                            }else{
                                            htmlslot+='<div class="userText_ng">'+value.email.substring(0,17)+'</div>';
                                            }
                                            htmlslot+='</div>'+

                                        '<div class="caption_ng">'+
                                            '<div class="icon_ng"><i class="fa fa-phone"></i></div>'+
                                            '<div class="userText_ng">'+value.mobile+'</div>'+
                                        '</div>'+

                                        '<div class="caption_ng">'+
                                            ''+changestatus_permission+''+
                                        '</div>'+

                                        // '<div class="btn_ng">'+
                                        //     '<a class="" href="">More Details</a>'+
                                        // '</div>'+
                                    '</div>'+

                                    
                                '</div>'+
                            '</div>'
                        ;
                        $("#userFilter").append(htmlslot);
                    });
                }else{
                    htmlslot='<div class="col-md-12">'+
                                '<h4 class="text-center">No Record Found!</h4>'+
                            '</div>';
                    
                    $("#userFilter").append(htmlslot);
                }
                
            }
        });
    //}
})
</script>
<?php $__env->stopSection(); ?>




    




<?php echo $__env->make('admin.layouts.header_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>