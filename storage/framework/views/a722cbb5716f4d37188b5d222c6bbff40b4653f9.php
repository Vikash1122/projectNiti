
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/plugins/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrap-select2/select2.css')); ?>" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo e(asset('public/plugins/jquery-datatable/css/jquery.dataTables.css')); ?>" rel="stylesheet" type="text/css" />
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
    
    .usr_link_outer{
        padding: 20px 20px 20px !important;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="content">
    <div class="page-title"> 
        <a class="previousBtn" href="<?php echo e(url()->previous()); ?>">
            <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive" />
        </a>
        <h3>Customers List <span class="semi-bold">&nbsp;</span></h3>
        <!-- <a href="#" class="new_btn_add_service"><i class="fa fa-plus"></i> Add New</a> -->
        
        <div class="serchBarDiv">
            <div class="searchContainer">
                <input class="searchBox" type="search" id="search" name="search" placeholder="Search">
                <i class="fa fa-search searchIcon"></i>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-md-12">
            <div class="content-box-main-ng">
                <div class="content-box-main marginBottom0">
                    <div class="row" id="filterSearh">
                        <?php if(isset($users) && !empty($users)): ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3">
                                    <div class="new_srv_box userList_ng">
                                        <!-- <div class="controller overlay">
                                            <a href="#" class="EditService editSub_btn pull-left border_radius_right edt_btn" ><i class="fa fa-pencil"></i></a>
                                            <a href="#" class=" pull-right border_radius_left dlt_btn" onclick="return confirm('Are you sure you want to delete this record?');" title="Delete Service"><i class="fa fa-times"></i></a>                                       
                                        </div> -->

                                        <div class="userInf_ng">
                                            <div class="userImg_ng">
                                                <?php if(isset($usr->profile_pic) && !empty($usr->profile_pic)): ?>
                                                    <img src="<?php echo e(fileurlUser().$usr->profile_pic); ?>" class="">
                                                    <?php else: ?>
                                                    <img src="<?php echo e(asset('public/img/defaultCustomer.png')); ?>" class="">
                                                <?php endif; ?>
                                            </div>

                                            <h4 class="text-center"><?php echo e($usr->firstname); ?> 
                                            <?php if($usr->lastname != '' && $usr->lastname != 'NULL' && $usr->lastname != 'N/A'): ?>
                                            <span><?php echo e($usr->lastname); ?></span>
                                            <?php endif; ?>
                                            </h4>
                                            <p class="text-center">&nbsp;</p>
                                        </div>

                                        <div class="userCaption_ng">
                                            <div class="caption_ng1">
                                                <div class="label_ng">Email</div>
                                                <?php if(strlen($usr->email) > 20 ): ?>
                                                <div class="value_ng"><?php echo e(substr($usr->email, 0, 20) . '...'); ?></div>
                                                <?php else: ?>
                                                <div class="value_ng"><?php echo e(substr($usr->email, 0, 20)); ?></div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="caption_ng1">
                                                <div class="label_ng">Mobile Number</div>
                                                <div class="value_ng"><?php echo e($usr->mobile); ?></div>
                                            </div>

                                            <!-- <div class="caption_ng1">
                                                <div class="label_ng">Area</div>
                                                <div class="value_ng">Al Mirdif</div>
                                            </div>

                                            <div class="caption_ng1">
                                                <div class="label_ng">Location</div>
                                                <div class="value_ng">A-29/21, M..</div>
                                            </div> -->

                                            <div class="btn_ng borderTop1">
                                                <a class="" href="<?php echo e(url('admin/users/userDetails/'.$usr->id)); ?>">More Details</a>
                                            </div>
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
<?php $__env->startSection('js'); ?>
<script>
$('#search').on('keyup',function(){
    //if($(this).val().length >= 2) {
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : "<?php echo e(route('users.search')); ?>",
            data:{
                'search':$value
                },
            success:function(data){
                
                var json = $.parseJSON(data);
                var htmlslot;
                $('#filterSearh').html('');
                if(json.length > 0){
                    $.each(json,function(index, value){
                        var user_image='';
                        var user_image1 = "<?php echo fileurlUser(); ?>"+ value.profile_pic;
                        if(value.profile_pic == null || value.profile_pic == ''){
                            var user_image = '<img src="<?php echo e(asset("public/img/defaultCustomer.png")); ?>" class="">';
                
                        }else{
                            var user_image = '<img src="'+ user_image1 +'" class="">';
                        
                        }
                        htmlslot='<div class="col-md-3">'+
                                    '<div class="new_srv_box userList_ng">'+
                                        // '<div class="controller overlay">'+
                                        //     '<a href="#" class="EditService editSub_btn pull-left border_radius_right edt_btn" ><i class="fa fa-pencil"></i></a>'+
                                        //     '<a href="#" class=" pull-right border_radius_left dlt_btn" onclick="return confirm("Are you sure you want to delete this record?");" title="Delete Service"><i class="fa fa-times"></i></a>'+                                       
                                        // '</div>'+

                                        '<div class="userInf_ng">'+
                                            '<div class="userImg_ng">'+
                                                ''+user_image+''+
                                            '</div>'+

                                            '<h4 class="text-center">'+value.firstname+' ';
                                            if(value.lastname != '' && value.lastname != null && value.lastname != 'N/A'){
                                            htmlslot+='<span>'+value.lastname+'</span>';
                                            }
                                            htmlslot+='</h4>'+
                                            '<p class="text-center">&nbsp;</p>'+
                                        '</div>'+

                                        '<div class="userCaption_ng">'+
                                            '<div class="caption_ng1">'+
                                                '<div class="label_ng">Email</div>';
                                                if((value.email).length > 20 ){
                                                htmlslot+='<div class="value_ng">'+value.email.substring(0,20)+'...'+'</div>';
                                                }else{
                                                htmlslot+='<div class="value_ng">'+value.email.substring(0,20)+'</div>';
                                                }
                                                htmlslot+='</div>'+

                                            '<div class="caption_ng1">'+
                                                '<div class="label_ng">Mobile Number</div>'+
                                                '<div class="value_ng">'+value.mobile+'</div>'+
                                            '</div>'+

                                            // '<div class="caption_ng1">'+
                                            //     '<div class="label_ng">Area</div>'+
                                            //     '<div class="value_ng">Al Mirdif</div>'+
                                            // '</div>'+

                                            // '<div class="caption_ng1">'+
                                            //     '<div class="label_ng">Location</div>'+
                                            //     '<div class="value_ng">A-29/21, M..</div>'+
                                            // '</div>'+

                                            '<div class="btn_ng borderTop1">'+
                                                '<a class="" href="http://3.16.87.53/admin/users/userDetails/'+value.id+'">More Details</a>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'
                        ;
                        $("#filterSearh").append(htmlslot);
                    });
                }else{
                    htmlslot='<div class="col-md-12">'+
                            '<h4 class="text-center">No Record Found!</h4>'+
                        '</div>';
                    
                    $("#filterSearh").append(htmlslot);
                }
                
            }
        });
    //}
})
</script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('admin.layouts.header_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>