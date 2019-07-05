

<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('public/plugins/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('public/plugins/bootstrap-select2/select2.css')); ?>" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo e(asset('public/plugins/jquery-datatable/css/jquery.dataTables.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('public/plugins/datatables-responsive/css/datatables.responsive.css')); ?>" rel="stylesheet" type="text/css" media="screen" />
    <style>
       
        
    </style>

    <div class="content">
        <div class="page-title"> 
            <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
                <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive"/>
            </a>
            <h3>Categories </h3>

            <?php if(hasPermissionThroughRole('add_categories')): ?>
            <a href="<?php echo e(route('categories.form')); ?>" class="new_btn_add_service"><i class="fa fa-plus"></i> Add New Category </a>
            <?php endif; ?>

            <div class="serchBarDiv">
                <div class="searchContainer">
                    <input class="searchBox" type="search" id="searchCategory" name="search" placeholder="Search">
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
                <div class="innerWrapper1">
                    <div class="row" id="searchData">
                        <?php if(isset($categories) && !empty($categories)): ?>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3">
                                    <div class="serviceListBox">
                                        <div class="grid_box new_srv_box">
                                            <div class="controller overlay">
                                                <?php if(hasPermissionThroughRole('delete_categories')): ?>
                                                    <a href="<?php echo e(url('admin/categories/destroy/'.$cat->id)); ?>" onclick="return confirmation();" title="Delete Category" class="EditService editSub_btn pull-left dlt_btn"><i class="fa fa-times"></i></a>
                                                <?php endif; ?>
                                                <?php if(hasPermissionThroughRole('edit_categories')): ?>
                                                    <a href="<?php echo e(url('admin/categories/edit/'.$cat->id)); ?>" class=" pull-right edt_btn " title="Edit Category"><i class="fa fa-pencil"></i></a>
                                                <?php endif; ?>
                                            </div>

                                            <div class="paddingBottom0">
                                                <div class="icon_div ">
                                                    <?php if(isset($cat->cat_img) && !empty($cat->cat_img)): ?>
                                                        <img src="<?php echo e(fileurlCategory().$cat->cat_img); ?>" class="img-responsive">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('public/img/no-preview.jpg')); ?>" class="img-responsive">
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="content_box">
                                                <div class="title">
                                                <?php if(strlen($cat->name) > 15): ?>
                                                    <h4 title="<?php echo e($cat->name); ?>"><?php echo e(substr($cat->name, 0, 15) . '...'); ?></h4>
                                                <?php else: ?>
                                                    <h4 title="<?php echo e($cat->name); ?>"><?php echo e($cat->name); ?></h4>
                                                <?php endif; ?>
                                                </div>

                                                <div class="content_opt">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="card_box_opt text-center marginTop20">
                                                                <div class="card-text-heading">Code No.</div>
                                                                <div class="service_code"><?php echo e($cat->code); ?></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="action_box">
                                                                <div class="card_box_opt">
                                                                    <div class="card-text-heading arialFont">Status</div>
                                                                    <div class="toggleCheckBox">
                                                                        <?php if($cat->status == 1): ?>
                                                                        <label class="switch">
                                                                        <input name="status" type="checkbox" onclick="isActive(<?php echo $cat->id; ?>)" value="0" id="enable_<?php echo e($cat->id); ?>" checked>
                                                                        <span class="slider round"></span>
                                                                        </label>
                                                                        <?php else: ?>
                                                                        <label class="switch">
                                                                        <input name="status" type="checkbox" onclick="isActive(<?php echo $cat->id; ?>)" value="1" id="enable_<?php echo e($cat->id); ?>">
                                                                        <span class="slider round"></span>
                                                                        </label>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>                                                
                                                            </div>    
                                                        </div>
                                                    </div>

                                                    <!-- <div class="row">
                                                        <div class="col-sm-12 col-xs-12">
                                                            <div class="card_box_opt text-center">
                                                                <div class="card-text-heading">Code No.</div>
                                                                <div class="service_code"><?php echo e($cat->code); ?></div>
                                                            </div>
                                                        </div>
                                                    </div> -->
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
function confirmation() {
    return confirm('Are you sure you want to delete this Category record?');
}
$('#searchCategory').on('keyup',function(){ 
    $value=$(this).val();
    $.ajax({
        type : 'get',
        url : "<?php echo e(route('categories.search')); ?>",
        data:{
            'search':$value
            },
        success:function(data){
            
            var json = $.parseJSON(data);
            var htmlslot;
            $('#searchData').html('');
            if(json.length > 0){
                $.each(json,function(index, value){
                
                    var cat_image='';
                    var cat_image1 = "<?php echo fileurlCategory(); ?>"+ value.cat_img;
                    if(value.cat_img == null || value.cat_img == ''){
                        var cat_image = '<img src="<?php echo e(asset("public/img/no-preview.jpg")); ?>" class="img-responsive" />';
                    }else{
                        var cat_image = '<img src="'+cat_image1+'" class="img-responsive">';
                    }
                    
                    var delete_permission='';
                    if("<?php echo hasPermissionThroughRole('delete_categories'); ?>"){
                        var delete_permission = '<a href="http://3.16.87.53/admin/categories/destroy/'+value.id+'" onclick="return confirmation();" title="Delete Category" class="EditService editSub_btn pull-left dlt_btn"><i class="fa fa-times"></i></a>';
                    }
                    var edit_permission = '';
                    if("<?php echo hasPermissionThroughRole('edit_categories');?>"){
                        var edit_permission = '<a href="http://3.16.87.53/admin/categories/edit/'+value.id+'" class=" pull-right edt_btn " title="Edit Category"><i class="fa fa-pencil"></i></a>';
                    }

                    htmlslot='<div class="col-md-3">'+
                                    '<div class="serviceListBox">'+
                                        '<div class="grid_box new_srv_box">'+
                                            '<div class="controller overlay">'+
                                                ''+delete_permission+''+ 
                                                ''+edit_permission+''+
                                            '</div>'+
                                            '<div class="paddingBottom0">'+
                                                '<div class="icon_div ">'+
                                                    ''+cat_image+''+
                                                '</div>'+
                                            '</div>'+

                                            '<div class="content_box">'+
                                                ' <div class="title">';
                                                if((value.name).length > 15){
                                                    htmlslot+='<h4 title="'+value.name+'">'+value.name.substr(0, 15)+'...'+'</h4>';
                                                }else{
                                                    htmlslot+='<h4 title="'+value.name+'">'+value.name+'</h4>';
                                                }
                                                htmlslot+='</div>'+

                                                '<div class="content_opt">'+
                                                    '<div class="row">'+
                                                        '<div class="col-sm-6 col-xs-6">'+
                                                            '<div class="card_box_opt text-center marginTop20">'+
                                                                ' <div class="card-text-heading">Code No.</div>'+
                                                                '<div class="service_code">'+value.code+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="col-sm-6 col-xs-6">'+
                                                            '<div class="action_box">'+
                                                                '<div class="card_box_opt">'+
                                                                    '<div class="card-text-heading arialFont">Status</div>'+
                                                                    '<div class="toggleCheckBox">';
                                                                        if(value.status == 1){
                                                                        htmlslot+='<label class="switch">'+
                                                                        '<input name="status" type="checkbox" onclick="isActive('+value.id+')" value="0" id="enable_'+value.id+'" checked>'+
                                                                        '<span class="slider round"></span>'+
                                                                        '</label>';
                                                                        }else{
                                                                        htmlslot+='<label class="switch">'+
                                                                        '<input name="status" type="checkbox" onclick="isActive('+value.id+')" value="1" id="enable_'+value.id+'">'+
                                                                        '<span class="slider round"></span>'+
                                                                        '</label>';
                                                                        }
                                                                    htmlslot+='</div>'+
                                                                '</div>'+                
                                                            '</div>'+    
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
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>