<?php $__env->startSection('css'); ?>
<style>
        .cardViewTable tr td{
            width:100%;
            display:block;
        }
        .cardViewTable .widget_user_list{
            width:auto;
        }
        .grid.simple .grid-title{
            display:none;
        }
        
        .grid.simple .grid-body{
            padding:10px !important;
        }
        
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
        .cardViewTable .table .clm1{
            border-top: 1px solid #e5e5e5 !important;
            border-left: 1px solid #e5e5e5 !important;
            border-right: 1px solid #e5e5e5 !important;
        }
        .cardViewTable .table .clm2{
            border-left: 1px solid #e5e5e5 !important;
            border-right: 1px solid #e5e5e5 !important;
        }
        .cardViewTable .table .clm3{
            border-left: 1px solid #e5e5e5 !important;
            border-right: 1px solid #e5e5e5 !important;
            float:left;
        }
        .cardViewTable .table .clm4{
            float: left;
            background: #2f9247;
        }
        .widget_user_list_new .widget-user-details .widget-action-block{
        border-top: 1px solid rgba(255, 255, 255, 0.43);
        padding-top: 8px;
        padding-bottom: 8px;
        width: 100%;
        float: left;
        text-align: center;
        }
        #example_wrapper .row:first-child{
            margin-left:0px;
            margin-right:0px;
        }
        .widget-title .pri_service_name{
            border: none;
        }
        .widget-title .pri_service_name{
            padding: 2px 0px !important;
        }
        .widget_user_list{
            margin-bottom:20px;
            border: 1px solid #f1f1f1;
        }
        .card-text-heading{
            font-weight:100 !important;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-title"> 
            <a class="previousBtn" href="<?php echo e(url()->previous()); ?>">
                <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive" />
            </a>
            <h3>Vendors  </h3>
            <?php if(hasPermissionThroughRole('vendor_registration')): ?>
            <a href="<?php echo e(route('vendors.form')); ?>" class="new_btn_add_service"><i class="fa fa-plus"></i> Add New Vendor </a>
            <?php endif; ?>

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

        <div class="successdiv"></div>

        <div class="errordiv"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="row listContainer" id="allfilterApply1">
                    <?php if(isset($vendors[0]) && !empty($vendors[0])): ?>
                        <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3">
                                <div class="mainWidget_ng">
                                    <div class="head_ng borderBottomNone">
                                        <div class="grid_box new_srv_box">
                                            <div class="controller overlay">
                                            <?php if(hasPermissionThroughRole('delete_vendor')): ?>
                                                <a href="<?php echo e(url('admin/vendors/'.$vd->id.'/destroy')); ?>" onclick="return confirmation();" class="EditService editSub_btn pull-left dlt_btn" title="Delete Vendor">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            <?php endif; ?>

                                            <?php if(hasPermissionThroughRole('edit_vendor')): ?>
                                                <a href="<?php echo e(url('admin/vendors/'.$vd->id.'/edit')); ?>" class=" pull-right edt_btn " title="Edit Vendor">
                                                    <!-- <i class="fa fa-pencil"></i> -->
                                                    <img src="<?php echo e(asset('public/img/edit_icons.png')); ?>" class="img-responsive" />
                                                </a>
                                            <?php endif; ?>
                                               
                                            </div>
                                        </div>

                                        <div class="icon_div">
                                            <?php if(isset($vd->company_logo) && !empty($vd->company_logo) ): ?>
                                                <img src="<?php echo e(fileurlVendor().'logo/'.$vd->company_logo); ?>" class="img-responsive" />
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('public/img/vendorLogo.png')); ?>" class="img-responsive" />
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="title">
                                        <h4><?php echo e(substr( $vd->company_name, 0, 15) . '...'); ?></h4>
                                    </div>

                                    <div class="content_opt borderTop_none"> 
                                        <div class="service_title">
                                            <h5>Services</h5>
                                            <p>
                                            <?php if(isset($vd->services[0]) && !empty($vd->services[0])): ?>
                                            <span> <?php echo e($vd->services[0]); ?></span>
                                            <?php endif; ?>
                                            <?php if(isset($vd->services[1]) && !empty($vd->services[1])): ?>
                                            , <span><?php echo e($vd->services[1]); ?></span>
                                            <?php endif; ?>
                                            </p>
                                        </div>
                                        
                                        <div class="card_loc">
                                            <div class="row">
                                                <div class="col-md-6 ">
                                                    <div class="tiles-title card-text-heading">Primary Contact</div>
                                                    <div class="job_st_details"><?php echo e($vd->contact_person_name); ?></div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <div class="tiles-title card-text-heading">Mobile Number</div>
                                                    <div class="job_st_details">+971-<?php echo e($vd->mobile); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card_loc">
                                            <div class="row">
                                                <div class="col-md-6 ">
                                                    <div class="tiles-title card-text-heading">Payment Method</div>
                                                    <div class="job_st_details"><?php echo e($vd->payment_method); ?></div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <div class="tiles-title card-text-heading">Payment Terms</div>
                                                    <div class="job_st_details"><?php echo e($vd->payment_term); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="newActBtn_ng">
                                            <div class="row">
                                                <!-- <div class="col-md-6">
                                                    <a href="#" class="btn btn-block">Order History</a>
                                                </div> -->
                                                <div class="col-md-12 text-center">
                                                    <a href="<?php echo e(url('admin/vendors/'.$vd->id.'/view')); ?>" class="btn">More Details</a>
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
                <div class="col-md-1"></div>
            </div>
           
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
function confirmation() {
    return confirm('Are you sure you want to delete this vendor record?');
}
$('#search').on('keyup',function(){
    //if($(this).val().length >= 2) {
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : "<?php echo e(route('vendors.search')); ?>",
            data:{
                'search':$value
                },
            success:function(data){
                
                var json = $.parseJSON(data);
                var htmlslot;
                $('#allfilterApply1').html('');
                if(json.length > 0){
                    $.each(json,function(index, value){
                    
                        var vendor_image='';
                        var vendor_image1 = "<?php echo fileurlVendor(); ?>logo/"+ value.company_logo;
                        if(value.company_logo == null || value.company_logo == ''){
                            var vendor_image = '<img src="<?php echo e(asset("public/img/vendorLogo.png")); ?>" class="img-responsive" />';
                
                        }else{
                            var vendor_image = '<img src="'+ vendor_image1 +'" class="img-responsive">';
                        
                        }
                        var edit_permission='';
                        if("<?php echo hasPermissionThroughRole('edit_vendor'); ?>"){
                            var edit_permission = '<a href="http://3.16.87.53/admin/vendors/'+value.id+'/edit" class=" pull-right edt_btn " title="Edit Vendor"><img src="<?php echo e(asset("public/img/edit_icons.png")); ?>" class="img-responsive" /></a>';
                        }
                        var delete_permission='';
                        if("<?php echo hasPermissionThroughRole('delete_vendor'); ?>"){
                            var delete_permission = '<a href="http://3.16.87.53/admin/vendors/'+value.id+'/destroy" onclick="return confirmation();" class="EditService editSub_btn pull-left dlt_btn" title="Delete Vendor"><i class="fa fa-times"></i></a>';
                        }

                        htmlslot=
                            '<div class="col-md-3">'+
                                    '<div class="mainWidget_ng">'+
                                        '<div class="head_ng borderBottomNone">'+
                                            '<div class="grid_box new_srv_box">'+
                                                '<div class="controller overlay">'+
                                                ''+delete_permission+''+
                                                ''+edit_permission+''+
                                                '</div>'+
                                            '</div>'+

                                            '<div class="icon_div">'+
                                                ''+vendor_image+''+
                                            '</div>'+
                                        '</div>'+

                                        '<div class="title">'+
                                            '<h4>'+value.company_name.substring(0,15)+'...'+'</h4>'+
                                        '</div>'+

                                        '<div class="content_opt borderTop_none">'+ 
                                            '<div class="service_title">'+
                                                '<h5>Services</h5>'+
                                                '<p>';
                                                if(value.services[0] != '' && value.services[0] != 'null'){
                                                htmlslot+='<span> '+value.services[0]+'</span>';
                                                }
                                                if(value.services[1] != '' && value.services[1] != 'null'){
                                                htmlslot+=', <span>'+value.services[1]+'</span>';
                                                }
                                                htmlslot+='</p>'+
                                            '</div>'+
                                            
                                            '<div class="card_loc">'+
                                                '<div class="row">'+
                                                    '<div class="col-md-6 ">'+
                                                        '<div class="tiles-title card-text-heading">Primary Contact</div>'+
                                                        '<div class="job_st_details">' +value.contact_person_name+ '</div>'+
                                                    '</div>'+

                                                    '<div class="col-md-6 col-sm-6 col-xs-6">'+
                                                        '<div class="tiles-title card-text-heading">Mobile Number</div>'+
                                                        '<div class="job_st_details">+971-' +value.mobile+ '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+

                                            '<div class="card_loc">'+
                                                '<div class="row">'+
                                                    '<div class="col-md-6 ">'+
                                                        '<div class="tiles-title card-text-heading">Payment Method</div>'+
                                                        '<div class="job_st_details">' +value.payment_method+'</div>'+
                                                    '</div>'+

                                                    '<div class="col-md-6 col-sm-6 col-xs-6">'+
                                                        '<div class="tiles-title card-text-heading">Payment Terms</div>'+
                                                        '<div class="job_st_details">' +value.payment_term+'</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+

                                            '<div class="newActBtn_ng">'+
                                                '<div class="row">'+
                                                    '<div class="col-md-12 text-center">'+
                                                        '<a href="http://3.16.87.53/admin/vendors/'+value.id+'/view" class="btn">More Details</a>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                            
                                        '</div>'+
                                    '</div>'+
                                '</div>'
                        ;
                        $("#allfilterApply1").append(htmlslot);
                    });
                }else{
                    htmlslot='<div class="col-md-12"><div class="content-box-main">'+
                                '<h4 class="text-center">No Record Found!</h4>'+
                            '</div></div>';
                    
                    $("#allfilterApply1").append(htmlslot);
                }
                
            }
        });
    //}
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.vendor_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>