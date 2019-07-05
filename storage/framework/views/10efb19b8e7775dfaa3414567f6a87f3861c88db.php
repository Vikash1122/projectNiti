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
    .widget_user_list_new{
        border-radius: 5px;
        background: #ffffff;
        float: left;
        margin-bottom: 20px;
    }
    .widget_user_list_new .widget_img_box {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: 20px auto 10px;
        display: block;
        border: 5px solid #ececec;
    }
    .widget_user_list_new .widget_img_box img {
        width: 100%;
        border-radius: 50%;
        height: -webkit-fill-available;
    }
    .widget_user_list_new .widget-item {
        position: relative;
    }
    .widget_user_list_new .widget-item .controller.right {
        top: 10px;
    }
    .widget_user_list_new .widget-item .controller a, .item_card .widget-item .controller a {
        background: none !important;
        padding-left: 10px;
        color: #ccc;
    }
    .widget_user_list_new .widget-title {
        width: 100%;
        float: left;
    }
    .widget_user_list_new .widget-title h4 {
        font-weight: 600;
        text-align: center;
        color: #000000;
        letter-spacing: 1px;
    }
    .widget_user_list_new .widget-title h5 {
        font-weight: 400;
        text-align: center;
        letter-spacing: .8px;
        color: #000000;
        padding-bottom: 20px;
    }
    .grid.simple .grid-body{
        padding:0px !important;
        border:0px;
    }
    .widget_user_list_new .widget-user-details {
        /* border-top: 1px solid #a7a4a4; */
        padding: 15px;
        width: 100%;
        float: left;
        background: #039347;
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
        /* border-top: none !important; */
        padding:0px !important;
        
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
    /**/ 
    /* .item_card{
        margin-bottom:20px;
    } */
    /* .item_card .item_img{
        height:205px;
    } */
    /* .item_card .item_img img{
        height:100%
    } */
    .widget-title .pri_service_main span{
        border:none !important;
        text-transform: capitalize;
    }
    .widget-title .pri_service_main span:first-child{
        padding-left:0px !important;
    }
    .item_card{
        width:auto !important;
        margin-bottom:20px;
        border-radius:4px;
        border: 1px solid #ececec;
    }
    .cardViewTable .table .col-md-3{
        margin-bottom:20px;
    }
    .borderBx{
        border: 1px solid #e5e5e5 !important;
    }
    .borderTop0{
        border-top:0px !important;
    }
    .widget-title .pri_service_name{
        padding:0px 0px !important;
    }

    .items_details .card-text-heading span{
        font-size:12px;
        display:block;
        text-align:center;
    }
    
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="page-title"> 
        <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
            <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
        </a> 
        <h3>Products <span class="semi-bold">&nbsp;</span></h3>

           

        <?php if(hasPermissionThroughRole('add_products')): ?>
            <a href="<?php echo e(route('products.add')); ?>" class="new_btn_add_service">
                <i class="fa fa-plus"></i> Add New Product 
            </a>
            <!-- <a class="fixed-btn" href="<?php echo e(route('products.add')); ?>" title="Add New Product">
                <img src="<?php echo e(asset('public/img/add.png')); ?>">
            </a> -->
        <?php endif; ?>
       
        <div class="form-filter">
            <div class="flt">
                <select onchange="filterByService(this.value);" name="service_type" id="service_typeFilter1"  >
                    <option value="">Select Services</option>
                    <?php if(isset($services) && !empty($services)): ?>
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($servc->id); ?>"><?php echo e($servc->service_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="flt">
                <div class="serchBarDiv marginRight0">
                    <div class="searchContainer">
                        <input class="searchBox" type="search" id="searchTeamName" name="search" placeholder="Search">
                        <i class="fa fa-search searchIcon"></i>
                    </div>
                </div>
            </div>
            
        </div> 
    </div>


    <div class="row">   
        <div class="col-md-12">
            <div class="content-box-main-ng">
                <div class="row"> 
                    <?php if(Session::has('message')): ?> 
                        <div class="alert alert-info">
                            <?php echo e(Session::get('message')); ?> 
                        </div> 
                    <?php endif; ?>
                    <div class="col-md-12">
                        <div class="table-responsive tableDiv_ng">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td class="text-center">S.No.</td>
                                        <td class="text-center">Code</td>
                                        <td class="text-center">Product Name</td>
                                        <td class="text-center">Margin</td>
                                        <td class="text-center">Cost</td>
                                        <td class="text-center">Selling Price</td>
                                        <td class="text-center">Custom Price</td>
                                        <td class="text-center">Action</td>
                                    </tr>
                                </thead>

                                <tbody class="bannerTbody productList" id="searchbyName">
                                <?php if(isset($products[0]) && !empty($products[0])): ?>
                                <?php $i = 1; ?>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($i); ?></td>
                                        <td class="text-center"><?php echo e($prodct->product_code); ?></td>
                                        <td class="text-center"><?php echo e($prodct->product_name); ?></td>
                                        <td class="text-center"><div class="marginCircle"></div></td>
                                        <td class="text-center">10.00AED</td>
                                        <td class="text-center">15.00AED</td>
                                        <td class="text-center">N/A</td>
                                        <td class="text-center">
                                            <?php if(hasPermissionThroughRole('view_product_details')): ?>
                                            <a href="<?php echo e(url('admin/inventry/products/'.$prodct->id.'/view')); ?>"><i class="fa fa-eye"></i></a>
                                            <?php endif; ?>
                                            <?php if(hasPermissionThroughRole('edit_product')): ?>
                                            <a href="<?php echo e(url('admin/inventry/products/'.$prodct->id)); ?>" title="Edit Product"><i class="fa fa-pencil"></i></a>
                                            <?php endif; ?>
                                            <?php if(hasPermissionThroughRole('delete_products')): ?>
                                            <a href="<?php echo e(url('admin/inventry/products/destroy/'.$prodct->id)); ?>" onclick="return confirmation();" title="Delete Product"><i class="fa fa-times"></i></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php $i++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>

                                <?php endif; ?>
                                    <!-- <tr>
                                        <td class="text-center">2</td>
                                        <td class="text-center">PL0067</td>
                                        <td class="text-center">3m Wiston Pipe</td>
                                        <td class="text-center"><div class="marginCircle profit-25"></div></td>
                                        <td class="text-center">560.00AED</td>
                                        <td class="text-center">700.00AED</td>
                                        <td class="text-center">N/A</td>
                                        <td class="text-center">
                                            <a href="#"><i class="fa fa-eye"></i></a>
                                            <a href="#"><i class="fa fa-pencil"></i></a>
                                            <a href="#"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td class="text-center">AC0043</td>
                                        <td class="text-center">570 General Filter</td>
                                        <td class="text-center"><div class="marginCircle"></div></td>
                                        <td class="text-center">120.00AED</td>
                                        <td class="text-center">170.00AED</td>
                                        <td class="text-center">Yes</td>
                                        <td class="text-center">
                                            <a href="#"><i class="fa fa-eye"></i></a>
                                            <a href="#"><i class="fa fa-pencil"></i></a>
                                            <a href="#"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td class="text-center">ET0034</td>
                                        <td class="text-center">0.1mm Copper Wire</td>
                                        <td class="text-center"><div class="marginCircle"></div></td>
                                        <td class="text-center">10.00AED</td>
                                        <td class="text-center">15.00AED</td>
                                        <td class="text-center">N/A</td>
                                        <td class="text-center">
                                            <a href="#"><i class="fa fa-eye"></i></a>
                                            <a href="#"><i class="fa fa-pencil"></i></a>
                                            <a href="#"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td class="text-center">ET0034</td>
                                        <td class="text-center">0.1mm Copper Wire</td>
                                        <td class="text-center"><div class="marginCircle"></div></td>
                                        <td class="text-center">10.00AED</td>
                                        <td class="text-center">15.00AED</td>
                                        <td class="text-center">N/A</td>
                                        <td class="text-center">
                                            <a href="#"><i class="fa fa-eye"></i></a>
                                            <a href="#"><i class="fa fa-pencil"></i></a>
                                            <a href="#"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-box-main" id="filterservicediv1">
            <?php if(isset($products) && !empty($products)): ?>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <div class="item_card"> 
                            <div class="widget-item ">
                                <div class="controller overlay right">
                                <?php if(hasPermissionThroughRole('edit_product')): ?>
                                    <a href="<?php echo e(url('admin/inventry/products/'.$prodct->id)); ?>" title="Edit Product"><i class="fa fa-pencil"></i></a>
                                <?php endif; ?>
                                <?php if(hasPermissionThroughRole('delete_products')): ?>
                                    <a href="<?php echo e(url('admin/inventry/products/destroy/'.$prodct->id)); ?>" onclick="return confirmation();"><i class="fa fa-times"></i></a>
                                <?php endif; ?>
                                </div>
                            </div>
                            <div class="item_img">
                                <?php if(isset($prodct->product_img) && !empty($prodct->product_img)): ?>
                                    <img src="<?php echo e(fileurlProduct().$prodct->product_img); ?>" class="img-responsive" />
                                <?php else: ?>
                                    <img src="<?php echo e(asset('public/img/no-preview-item.jpg')); ?>" class="img-responsive" />
                                <?php endif; ?>
                            </div>

                            <div class="items_details">
                                <div class="text-uppercase text-center card-text-heading">
                                    <?php echo e($prodct->product_name); ?> 
                                    
                                    <span>(<?php echo e($prodct->product_code); ?>)</span> 
                                </div>             
                                <div class="job_st_details widget-title">
                                    <div class="title">Services</div>                                 
                                    <span class="pri_service_main">
                                        <span class="pri_service_name"> <?php echo e($prodct->service_name); ?>,</span>
                                        <span class="pri_service_name"> <?php echo e(substr($prodct->service_name, 0, 15) . '...'); ?></span>                         
                                    </span>          
                                </div>

                                <div class="job_st_details widget-title">
                            
                                    <div class="title">Brands</div>
                                    <span class="pri_service_main">
                                        <span class="pri_service_name"> <?php echo e(substr($prodct->brands, 0, 25) . '...'); ?></span>
                                    </span>
                            
                                </div>
                                <div class="job_st_details">
                                    <div class="left_opt">
                                        <div class="title">Product Quantity</div>
                                        <div class="st_opt"><?php echo e($prodct->qty); ?> </div>
                                    </div>
                                    <?php if($prodct->qty == 0): ?>
                                    <div class="right_opt item_note">
                                        <div class="title">&nbsp;</div>
                                        <div class="st_opt  blink"><span class="">No Stock</span></div>
                                    </div>
                                    <?php elseif($prodct->qty < 5): ?>
                                    <div class="right_opt item_note">
                                        <div class="title">&nbsp;</div>
                                        <div class="st_opt  blink"><span class="">Low Stock</span></div>
                                    </div>
                                    <?php endif; ?>
                                </div>


                                <!-- <div class="job_st_details">
                                    <div class="title">Description</div>
                                    <div class="item_des_text"><?php echo e(substr($prodct->text_content, 0, 25) . '...'); ?></div>
                                </div> -->

                                <div class="widget-action-block">
                                    <?php if(hasPermissionThroughRole('view_product_details')): ?>
                                        <a href="<?php echo e(url('admin/inventry/products/'.$prodct->id.'/view')); ?>" class="hashtags transparent">View</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?> 
        </div>
    </div>
</div>        
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
function confirmation() {
    return confirm('Are you sure you want to delete this Product record?');
}
$('#searchTeamName').on('keyup',function(){ 
    $value=$(this).val();
    $.ajax({
        type : 'get',
        url : "<?php echo e(route('products.search')); ?>",
        data:{
            'search':$value
            },
        success:function(data){
            
            var json = $.parseJSON(data);
                var htmlslot;
                $('#searchbyName').html('');
                var i = 0;
            if(json.length > 0){
                $.each(json,function(index, value){
                    var edit_permission='';
                    if("<?php echo hasPermissionThroughRole('edit_product'); ?>"){
                        var edit_permission = '<a href="http://3.16.87.53/admin/inventry/products/'+value.id+'" title="Edit Product"><i class="fa fa-pencil"></i></a>';
                    }
                    var delete_permission='';
                    if("<?php echo hasPermissionThroughRole('delete_products'); ?>"){
                        var delete_permission = '<a href="http://3.16.87.53/admin/inventry/products/destroy/'+value.id+'" onclick="return confirmation();" title="Delete Product"><i class="fa fa-times"></i></a>';
                    }
                    var view_product_permission='';
                    if("<?php echo hasPermissionThroughRole('view_vehicle_info'); ?>"){
                        var view_product_permission = '<a href="http://3.16.87.53/admin/inventry/products/'+value.id+'/view"><i class="fa fa-eye"></i></a>';
                    }
                    htmlslot='<tr>'+
                                '<td class="text-center">'+(i+1)+'</td>'+
                                '<td class="text-center">'+value.product_code+'</td>'+
                                '<td class="text-center">'+value.product_name+'</td>'+
                                '<td class="text-center"><div class="marginCircle"></div></td>'+
                                '<td class="text-center">10.00AED</td>'+
                                '<td class="text-center">15.00AED</td>'+
                                '<td class="text-center">N/A</td>'+
                                '<td class="text-center">'+
                                    ''+view_product_permission+''+
                                    ''+edit_permission+''+
                                    ''+delete_permission+''+
                                '</td>'+
                            '</tr>'
                    ;
                    $("#searchbyName").append(htmlslot);
                    i++;
                });
            }else{
                htmlslot='<tr><td colspan="8">'+
                            '<h4 class="text-center">No Record Found!</h4>'+
                        '</td></tr>';
                
                $("#searchbyName").append(htmlslot);
            }
            
        }
    });
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.product_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>