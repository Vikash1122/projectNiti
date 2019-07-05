<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/plugins/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrap-select2/select2.css')); ?>" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo e(asset('public/plugins/jquery-datatable/css/jquery.dataTables.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/datatables-responsive/css/datatables.responsive.css')); ?>" rel="stylesheet" type="text/css" media="screen" />


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="content">
        <div class="page-title"> 
            <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
                <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
            </a>
            <h3>Brands</h3>

            <?php if(hasPermissionThroughRole('add_brands')): ?>
            <a href="<?php echo e(route('brands.form')); ?>" class="new_btn_add_service"><i class="fa fa-plus"></i> Add New Brands </a>
            <?php endif; ?>

            <div class="serchBarDiv">
                <div class="searchContainer">
                    <input class="searchBox" type="search" id="searchBrand" name="search" placeholder="Search">
                    <i class="fa fa-search searchIcon"></i>
                </div>
            </div>
        </div>

        <div class="row">
            <?php if(Session::has('message')): ?> 
                <div class="alert alert-info">
                    <?php echo e(Session::get('message')); ?> 
                </div> 
            <?php endif; ?>

            <div class="col-md-12">
                <div class="innerWrapper1">
                    <div class="row" id="searchData">
                        <?php if(isset($brands) && !empty($brands)): ?>
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $br): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3">
                                    <div class="serviceListBox">
                                        <div class="grid_box new_srv_box">
                                            <div class="controller overlay">
                                                <?php if(hasPermissionThroughRole('delete_brands')): ?>
                                                    <a href="<?php echo e(url('admin/brands/destroy/'.$br->id)); ?>" class="EditService editSub_btn pull-left dlt_btn" onclick="return confirm('Are you sure you want to delete this brand?');" title="Delete Brand"><i class="fa fa-times"></i></a>
                                                <?php endif; ?>
                                                <?php if(hasPermissionThroughRole('edit_brands')): ?>
                                                    <a href="<?php echo e(url('admin/brands/edit/'.$br->id)); ?>" class=" pull-right edt_btn" onclick="return confirmation();" title="Edit Brand"><i class="fa fa-pencil"></i></a>
                                                <?php endif; ?>
                                                <!-- <a href="http://3.16.87.53/admin/services/destroy/1" data-id="1" onclick="return confirm('Are you sure you want to delete this record?');" class="EditService editSub_btn pull-left dlt_btn" title="Delete Service"><i class="fa fa-times"></i></a>
                                                <a href="http://3.16.87.53/admin/services/1" class=" pull-right edt_btn " title="Edit Service"><i class="fa fa-pencil"></i></a> -->
                                            </div>

                                            <div class="paddingBottom0">
                                                <div class="icon_div ">
                                                    <?php if(isset($br->brand_icon) && !empty($br->brand_icon)): ?>
                                                        <img src="<?php echo e(fileurlbrand().$br->brand_icon); ?>" style="">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('public/img/no-preview.jpg')); ?>" style="">
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="content_box">
                                                <div class="title">
                                                    <h4><?php echo e($br->brand_name); ?></h4>
                                                </div>

                                                <div class="content_opt">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xs-12">
                                                            <div class="card_box_opt text-center">
                                                                <div class="card-text-heading">Brand Code</div>
                                                                <div class="service_code"><?php echo e($br->brand_code); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
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
    return confirm('Are you sure you want to delete this Brand record?');
}
$('#searchBrand').on('keyup',function(){ 
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : "<?php echo e(route('brands.search')); ?>",
            data:{
                'search':$value
                },
            success:function(data){
                
                var json = $.parseJSON(data);
                var htmlslot;
                $('#searchData').html('');
                if(json.length > 0){
                    $.each(json,function(index, value){
                   
                        var brand_img='';
                        var brand_img1 = "<?php echo fileurlbrand(); ?>"+ value.brand_icon;
                        if(value.brand_icon == null || value.brand_icon == ''){
                            var brand_img = '<img src="<?php echo e(asset("public/img/no-preview.jpg")); ?>" class="img-responsive" />';
                        }else{
                            var brand_img = '<img src="'+brand_img1+'" class="img-responsive">';
                        }
                        
                        var delete_permission='';
                        if("<?php echo hasPermissionThroughRole('delete_brands'); ?>"){
                            var delete_permission = '<a href="http://3.16.87.53/admin/brands/destroy/'+value.id+'" onclick="return confirmation();" class="EditService editSub_btn pull-left dlt_btn" title="Delete Brand"><i class="fa fa-times"></i></a>';
                        }
                        var edit_permission='';
                        if("<?php echo hasPermissionThroughRole('edit_brands'); ?>"){
                            var edit_permission = '<a href="http://3.16.87.53/admin/brands/edit/'+value.id+'" class=" pull-right edt_btn" title="Edit Brand"><i class="fa fa-pencil"></i></a>';
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
                                                        ''+brand_img+''+
                                                    '</div>'+
                                                '</div>'+

                                                '<div class="content_box">'+
                                                    '<div class="title">'+
                                                        '<h4>'+value.brand_name+'</h4>'+
                                                    '</div>'+

                                                    '<div class="content_opt">'+
                                                        '<div class="row">'+
                                                            '<div class="col-sm-12 col-xs-12">'+
                                                                '<div class="card_box_opt text-center">'+
                                                                    '<div class="card-text-heading">Brand Code</div>'+
                                                                    '<div class="service_code">'+value.brand_code+'</div>'+
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