
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/plugins/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrap-select2/select2.css')); ?>" rel="stylesheet" type="text/css" media="screen" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-title"> 
            <a class="previousBtn" href="<?php echo e(url()->previous()); ?>">
                <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive" />
            </a>
            <h3>Services  </h3>
            <?php if(hasPermissionThroughRole('add_services')): ?>
            <a href="<?php echo e(route('services.form')); ?>" class="new_btn_add_service"><i class="fa fa-plus"></i> Add New Services </a>
            <?php endif; ?>

            <div class="serchBarDiv">
                <div class="searchContainer">
                    <input class="searchBox" type="search" id="search" name="search" placeholder="Search">
                    <i class="fa fa-search searchIcon"></i>
                </div>
            </div>

        </div>

                
        <div class="clearfix"></div>
        <?php if(Session::has('message')): ?> 
            <div class="alert alert-info">
                <?php echo e(Session::get('message')); ?> 
            </div> 
        <?php endif; ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="innerWrapper1">
                        <div class="row" id="searchData">
                        <?php if(isset($services) && !empty($services)): ?>
                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="col-md-3">
                                <div class="serviceListBox">
                                    <div class="grid_box new_srv_box">
                                        <div class="controller overlay">
                                        <?php if(hasPermissionThroughRole('delete_services')): ?>
                                            <a href="<?php echo e(url('admin/services/destroy',$ser->id)); ?>" data-id="<?php echo e($ser->id); ?>" onclick="return confirmation();" class="EditService editSub_btn pull-left dlt_btn" title="Delete Service" ><i class="fa fa-times"></i></a>
                                        <?php endif; ?>
                                        <?php if(hasPermissionThroughRole('edit_services')): ?>
                                            <a href="<?php echo e(url('admin/services',$ser->id)); ?>"class=" pull-right edt_btn " title="Edit Service"><i class="fa fa-pencil"></i></a>
                                        <?php endif; ?>
                                        </div>

                                        <div class="paddingBottom0">
                                            <div class="icon_div ">
                                                <?php if(isset($ser->service_icon) && !empty($ser->service_icon)): ?>
                                                <img src="<?php echo e(fileurlservice().$ser->service_icon); ?>" class="img-responsive">
                                                <?php else: ?>
                                                <img id="service_icon" src="<?php echo e(asset('public/img/default_icon.png')); ?>" class="img-responsive">
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="content_box">
                                            <div class="title">
                                                <h4><?php echo e($ser->service_name); ?></h4>
                                            </div>

                                            <div class="content_opt">
                                                <div class="row">
                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="action_box" >
                                                            <div class="card_box_opt">
                                                                <div class="card-text-heading arialFont">Status</div>
                                                                <div class="toggleCheckBox">
                                                                <?php if($ser->status == 1): ?>
                                                                <label class="switch">
                                                                <input name="status" type="checkbox" onclick="statusChange(<?php echo $ser->id; ?>)" value="0" id="enable_<?php echo e($ser->id); ?>" checked>
                                                                <span class="slider round"></span>
                                                                </label>
                                                                <?php else: ?>
                                                                <label class="switch">
                                                                <input name="status" type="checkbox" onclick="statusChange(<?php echo $ser->id; ?>)" value="1" id="enable_<?php echo e($ser->id); ?>">
                                                                <span class="slider round"></span>
                                                                </label>
                                                                <?php endif; ?>
                                                                </div>
                                                            </div>                                                
                                                        </div>    
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="card_box_opt text-center">
                                                            <div class="card-text-heading">Total Sub Service</div>
                                                            <div class="service_code"> <span><?php echo e($ser->subcount->totalsubs); ?></span> <a href="<?php echo e(url('admin/services/'.$ser->id.'/subServices')); ?>">View</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="new_add_srv_btn_block">
                                            <?php if(hasPermissionThroughRole('add_sub_services')): ?>
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <a href="<?php echo e(url('admin/services/'.$ser->id.'/addSubService')); ?>" class="new_add_srv_btn"><i class="fa fa-plus"></i> Add Sub Services</a>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <div class="col-md-12">
                            <div class="content-box-main">
                                <h4 class="text-center">No Record Found!</h4>
                            </div>
                        </div>
                        <?php endif; ?>
                        </div> 
                        </div>                      
                    </div>
                </div>                
            </div>
       
        <!--Delete modal start-->
        <div class="modal fade alert_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content" >
                    <div class="modal-body" style="background:#ffffff;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-center">Are you sure! You want to delete it.</p>
                                <p class="text-center">
                                    <button type="button" class="btn-small btn-success">Ok</button>
                                </p>
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
    return confirm('Are you sure you want to delete this Service record?');
}
$('#search').on('keyup',function(){
    //if($(this).val().length >= 2) {
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : '<?php echo e(URL::to("/admin/services/search")); ?>',
            data:{
                'search':$value
                },
            success:function(data){
                
                var json = $.parseJSON(data);
                var htmlslot;
                $('#searchData').html('');
                if(json.length > 0){
                    $.each(json,function(index, value){
                        var service_image='';
                        var service_image1 = "<?php echo fileurlservice(); ?>"+ value.service_icon;
                        if(value.service_icon == null || value.service_icon == ''){
                            var service_image = '<img src="<?php echo e(asset("public/img/defaultIcon.png")); ?>" class="">';
                
                        }else{
                            var service_image = '<img src="'+ service_image1 +'" class="img-responsive">';
                        
                        }
                        var edit_permission='';
                        if("<?php echo hasPermissionThroughRole('edit_services'); ?>"){
                            var edit_permission = '<a href="<?php echo e(url("admin/services")); ?>/'+value.id+'" class=" pull-right edt_btn " title="Edit Service"><i class="fa fa-pencil"></i></a>';
                        }
                        var delete_permission='';
                        if("<?php echo hasPermissionThroughRole('delete_services'); ?>"){
                            var delete_permission = '<a href="<?php echo e(url("admin/services/destroy")); ?>/'+value.id+'" data-id="" onclick="return confirmation();" class="EditService editSub_btn pull-left dlt_btn" title="Delete Service" ><i class="fa fa-times"></i></a>';
                        }

                        htmlslot=
                            '<div class="col-md-3">'+
                                '<div class="serviceListBox">'+
                                    '<div class="grid_box new_srv_box">'+
                                        '<div class="controller overlay">'+
                                            ''+delete_permission+''+
                                            ''+edit_permission+''+
                                        '</div>'+

                                        '<div class="paddingBottom0">'+
                                            '<div class="icon_div ">'+
                                                ''+service_image+''+
                                            '</div>'+
                                        '</div>'+

                                        '<div class="content_box">'+
                                            '<div class="title">'+
                                                '<h4>'+value.service_name+'</h4>'+
                                            '</div>'+

                                            '<div class="content_opt">'+
                                                '<div class="row">'+
                                                    '<div class="col-sm-12 col-xs-12">'+
                                                        '<div class="action_box" style="margin-bottom:0px;">'+
                                                            '<div class="card_box_opt">'+
                                                                '<div class="card-text-heading arialFont">Status</div>'+
                                                                '<div class="toggleCheckBox">';
                                                                if(value.status == 1){
                                                                    htmlslot+='<label class="switch">'+
                                                                    '<input name="status" type="checkbox" onclick="statusChange('+value.id+')" value="0" id="enable_'+value.id+'" checked>'+
                                                                    '<span class="slider round"></span>'+
                                                                    '</label>';
                                                                }else{
                                                                    htmlslot+='<label class="switch">'+
                                                                    '<input name="status" type="checkbox" onclick="statusChange('+value.id+')" value="1" id="enable_'+value.id+'">'+
                                                                    '<span class="slider round"></span>'+
                                                                    '</label>';
                                                                }
                                                                

                                                                htmlslot+='</div>'+
                                                            '</div>'+                                                
                                                        '</div>'+    
                                                    '</div>'+
                                                '</div>'+

                                                '<div class="row">'+
                                                    '<div class="col-sm-12 col-xs-12">'+
                                                        '<div class="card_box_opt text-center">'+
                                                            '<div class="card-text-heading">Total Sub Service</div>'+
                                                            '<div class="service_code">'+value.subcount.totalsubs+' <a href="http://3.16.87.53/admin/services/'+value.id+'/subServices">View</a></div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+ 

                                            '<div class="new_add_srv_btn_block">'+
                                                '<div class="row">'+
                                                    '<div class="col-md-12 text-center">'+
                                                        '<a href="http://3.16.87.53/admin/services/'+value.id+'/addSubService" class="new_add_srv_btn"><i class="fa fa-plus"></i> Add Sub Services</a>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+  
                                    '</div>'+
                                '</div>'+
                            '</div>'
                        ;
                        $("#searchData").append(htmlslot);
                    });
                }else{
                    htmlslot='<div class="col-md-12"><div class="content-box-main">'+
                                '<h4 class="text-center">No Record Found!</h4>'+
                            '</div></div>';
                    
                    $("#searchData").append(htmlslot);
                }
                
            }
        });
    //}
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>