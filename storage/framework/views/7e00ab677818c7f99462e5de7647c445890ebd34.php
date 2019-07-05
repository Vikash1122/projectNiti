
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/plugins/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrap-select2/select2.css')); ?>" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo e(asset('public/plugins/jquery-datatable/css/jquery.dataTables.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/datatables-responsive/css/datatables.responsive.css')); ?>" rel="stylesheet" type="text/css" media="screen" />

<style>
    @font-face {
        font-family: 'Nexa Bold';
        src: url('<?php echo e(asset("public/fonts/Nexa Bold.otf")); ?>');
    }
    @font-face {
        font-family: 'Arial';
        src: url('<?php echo e(asset("public/fonts/ARIALBD.TTF")); ?>');
    }
    .list_of_sub_services{
    
    }
    table.table thead .sorting_asc{
        background:none !important;
    }
    .list_of_sub_services .edit_btn {
        background: #2f9247;
        border: 2px solid #2f9247;
        color: #fff;
    }
    .list_of_sub_services .delete_btn {
        background: #F44336;
        border: 2px solid #F44336;
        color: #fff;
        margin-left:5px;
    }
    .list_of_sub_services .delete_btn a, .list_of_sub_services .delete_btn a:hover{
        color:#ffffff;
    }
    .page-title {
        width: 100%;
        float: left;
    }
    .page-title .sub_pages {
        width: auto;
        float: left;
    }
    .page-title i {
        padding-left: 15px;
        top: 9px;
    }
    
    .page-title .sub_pages h3 {
        color: #454545;
    }
    .list_of_sub_services .DTTT {
        display: none !important;
    }
    .list_of_sub_services .select2-container .select2-choice .select2-arrow {
        background: transparent;
        border-left: none;
    }
    .list_of_sub_services .select2-container .select2-choice .select2-arrow b:before {
        content: "" !important;
    }

    .list_of_sub_services .edit_btn a{
        color:#ffffff;
    }
    .viewBtnUnitPrice{
        cursor:pointer;
    }
    .serchBarDiv .searchContainer{
        margin-top:5px;
    }
    /* .serchBarDiv .searchBox{
        height: 42px;
    } */
    .serchBarDiv .searchBox {
        font-family: 'Nexa Bold';
    }
    
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <input type="hidden" id="olddata" value="">

    <div class="content">
        <div class="page-title"> 
            <div class="row">
                <div class="col-md-12">
                    <a class="previousBtn" href="<?php echo e(url()->previous()); ?>">
                        <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
                    </a>
                    <h3> Services </h3>
                    <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>View Sub Services</h3></div>
                    <div class="serchBarDiv">
                        <div class="searchContainer">
                            <input class="searchBox" type="search" id="sub_ServiceSearch" data-id="<?php echo e($id); ?>" name="search" placeholder="Search">
                            <i class="fa fa-search searchIcon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if(isset($subservices[0]) && !empty($subservices[0])): ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="content-box-main-ng">
                        <div class="row-fluid list_of_sub_services">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive tableDiv_ng">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <td>Code</td>
                                                    <td>Sub Service Name</td>
                                                    <td>Unit Variable</td>
                                                    <td>Duration</td>
                                                    <td>Unit Price</td>
                                                    <td>Status</td>
                                                    <?php if(hasPermissionThroughRole('edit_sub_services') || hasPermissionThroughRole('delete_sub_services')): ?>
                                                    <td class="text-right">Action</td>
                                                    <?php endif; ?>
                                                </tr>
                                            </thead>

                                            <tbody id="searchData1">
                                                <?php   $i = 1; ?>
                                                    <?php $__currentLoopData = $subservices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($sub->services->service_code); ?></td>
                                                    <td><?php echo e($sub->sub_service_name); ?></td>
                                                    <td><?php echo e($sub->unit_variable); ?></td>
                                                    <td><?php echo e($sub->unit_duration); ?> </td>
                                                    <td class="viewBtnUnitPrice">
                                                        <img class="viewIconImg" id="<?php echo e($sub->id); ?>" onclick="viewPrice(<?php echo e($sub->id); ?>)" src="../../../public/img/visibility.png" width="42" />
                                                        <span onclick="hidePrice(<?php echo e($sub->id); ?>)"  id="abd<?php echo e($sub->id); ?>" class="hidden showPrice"><?php echo e($sub->unit_price); ?> AED</span>
                                                    </td>

                                                    <td>
                                                        <div class="toggleCheckBox">
                                                        <?php if($sub->status == 1): ?>
                                                            <label class="switch">
                                                                <input name="status" type="checkbox" onclick="statusActive(<?php echo $sub->id; ?>)" value="0" id="enable_<?php echo e($sub->id); ?>" checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        <?php else: ?>
                                                            <label class="switch">
                                                                <input name="status" type="checkbox" onclick="statusActive(<?php echo $sub->id; ?>)" value="1" id="enable_<?php echo e($sub->id); ?>">
                                                                <span class="slider round"></span>
                                                            </label>
                                                        <?php endif; ?>
                                                        </div>
                                                    </td>
                                                    
                                                    <?php if(hasPermissionThroughRole('edit_sub_services') || hasPermissionThroughRole('delete_sub_services')): ?>
                                                    <td class="text-right actIconCell">
                                                    
                                                    <?php if(hasPermissionThroughRole('edit_sub_services')): ?>
                                                    <button type="button" title="Edit Sub Services" class="edit_btn">
                                                        <a href="<?php echo e(url('admin/services/'.$sub->service_id.'/editSubSErvice/'.$sub->id)); ?>">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </button>
                                                    <?php endif; ?>
                                                    <?php if(hasPermissionThroughRole('delete_sub_services')): ?>
                                                    <button type="button" class="delete_btn" title="Delete Sub Service">
                                                        <a href="<?php echo e(url('admin/services/destroySubService',$sub->id)); ?>" data-id="<?php echo e($sub->id); ?>" onclick="return confirmation();">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </button>
                                                    <?php endif; ?>
                                                    </td>
                                                    <?php endif; ?>
                                                </tr>

                                                <?php  $i++; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>

        <?php else: ?>
        <tr>
            <td colspan="7">
                <h4 class="text-center">No Record Found!</h4>
            </td>
        </tr>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<!-- <script src="http://3.16.87.53/public/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script> -->
<script>
function confirmation() {
    return confirm('Are you sure you want to delete this Sub-Service record?');
}
    var OldData;
    function viewPrice(valueId){

        //Hidden Price
        $('#abd'+document.getElementById("olddata").value).addClass('hidden');
        $('#'+document.getElementById("olddata").value).removeClass('hidden');
            //Show Price
            $('#'+valueId).addClass('hidden');
            $('#abd'+valueId).removeClass('hidden');
        document.getElementById("olddata").value = valueId;
        
        
    }
    function hidePrice(valueId){
        $('#abd'+valueId).addClass('hidden');
        $('#'+valueId).removeClass('hidden');
    }

    $('#sub_ServiceSearch').on('keyup',function(){
        $id = $(this).attr("data-id"); //$(this).data('key')
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : 'http://3.16.87.53/admin/services/'+$id+'/subServiceSearch',
            data:{
                'search':$value
                },
            success:function(data){
                
                var json = $.parseJSON(data);
                var htmlslot;
                $('#searchData1').html('');
                if(json.length > 0){
                    $.each(json,function(index, value){
                    
                        var edit_permission='';
                        if("<?php echo hasPermissionThroughRole('edit_sub_services'); ?>"){
                            var edit_permission = '<button type="button" title="Edit Sub Services" class="edit_btn">'+
                                    '<a href="http://3.16.87.53/admin/services/'+value.service_id+'/editSubSErvice/'+value.id+'">'+
                                        '<i class="fa fa-pencil"></i>'+
                                    '</a>'+
                                '</button>';
                        }
                        var delete_permission='';
                        if("<?php echo hasPermissionThroughRole('delete_sub_services'); ?>"){
                            var delete_permission = '<button type="button" class="delete_btn" title="Delete Sub Service">'+
                                    '<a href="http://3.16.87.53/admin/services/destroySubService/'+value.id+'" data-id="'+value.id+'" onclick="return confirmation();">'+
                                        '<i class="fa fa-times"></i>'+
                                    '</a>'+
                                '</button>';
                        }

                        htmlslot=
                            '<tr>'+
                                '<td>'+value.services.service_code+'</td>'+
                                '<td>'+value.sub_service_name+'</td>'+
                                '<td>'+value.unit_variable+'</td>'+
                                '<td>'+value.unit_duration+'</td>'+
                                '<td class="viewBtnUnitPrice">'+
                                    '<img class="viewIconImg" id="'+value.id+'" onclick="viewPrice('+value.id+')" src="<?php echo e(asset("public/img/visibility.png")); ?>" width="42" />'+
                                    '<span onclick="hidePrice('+value.id+')"  id="abd'+value.id+'" class="hidden showPrice">'+value.unit_price+' AED</span>'+
                                '</td>'+

                                '<td>'+
                                    '<div class="toggleCheckBox">';
                                    if(value.status == 1){
                                        htmlslot+='<label class="switch">'+
                                            '<input name="status" type="checkbox" onclick="statusActive('+value.id+')" value="0" id="enable_'+value.id+'" checked>'+
                                            '<span class="slider round"></span>'+
                                        '</label>';
                                    }else{
                                        htmlslot+='<label class="switch">'+
                                            '<input name="status" type="checkbox" onclick="statusActive('+value.id+')" value="1" id="enable_'+value.id+'">'+
                                            '<span class="slider round"></span>'+
                                        '</label>';
                                    }
                                    htmlslot+='</div>'+
                                '</td>'+
                                
                                '<td class="text-right actIconCell">'+
                                ''+edit_permission+''+
                                ''+delete_permission+''+
                                '</td>'+
                            '</tr>'
                        ;
                        $("#searchData1").append(htmlslot);
                    });
                }else{
                    htmlslot='<tr>'+
                                '<td colspan="7">'+
                                    '<h4 class="text-center">No Record Found!</h4>'+
                                '</td>'+
                            '</tr>';
                    
                    $("#searchData1").append(htmlslot);
                }
                
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>