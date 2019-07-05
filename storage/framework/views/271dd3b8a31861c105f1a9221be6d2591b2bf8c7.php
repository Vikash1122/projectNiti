<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/plugins/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrap-select2/select2.css')); ?>" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo e(asset('public/plugins/jquery-datatable/css/jquery.dataTables.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/datatables-responsive/css/datatables.responsive.css')); ?>" rel="stylesheet" type="text/css" media="screen" />

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
        padding:10px !important;
    }
    .widget_user_list_new .widget-user-details {
        border-top: 1px solid #a7a4a4;
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
        border-top: none !important;
    }
    .widget_user_list_new .widget-user-details .widget-action-block{
    border-top: 1px solid rgba(255, 255, 255, 0.43);
    padding-top: 8px;
    padding-bottom: 8px;
    width: 100%;
    float: left;
    text-align: center;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="content">
        <div class="page-title"> 
            <a class="previousBtn" href="<?php echo e(url()->previous()); ?>">
                <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive" />
            </a>
            <h3>Employee List</h3>

            <?php if(hasPermissionThroughRole('add_employee')): ?>
            <a href="<?php echo e(route('employee.form')); ?>" class="new_btn_add_service"><i class="fa fa-plus"></i> Add Employee </a>
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

        <div class="row empLstMainBox">
            <div class="col-md-12">
                <div class="row listContainer" id="searchDataall">
                    <?php if(isset($employee) && !empty($employee)): ?>
                        <?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3">
                                <div class="mainWidget_ng ">
                                    <div class="head_ng borderBottomNone ng_listEmp">
                                        <div class="grid_box new_srv_box">
                                            <div class="controller overlay">
                                                <?php if(hasPermissionThroughRole('delete_employee')): ?>
                                                    <a href="<?php echo e(url('admin/employees/destroy',$emp->id)); ?>" onclick="return confirmation();" class="EditService editSub_btn pull-left dlt_btn" title="Delete Employee"><i class="fa fa-times"></i></a>
                                                <?php endif; ?>
                                                <?php if(hasPermissionThroughRole('edit_employee')): ?>
                                                    <a href="<?php echo e(url('admin/employees/editEmployee/'.$emp->id)); ?>" class=" pull-right edt_btn "title="Edit Employee" >
                                                       
                                                        <img src="<?php echo e(asset('public/img//edit_icons.png')); ?>" class="img-responsive">
                                                    </a>
                                                <?php endif; ?>                                       
                                            </div>
                                        </div>

                                        <div class="icon_div">
                                            <?php if(isset($emp->emp_profile) && !empty($emp->emp_profile)): ?>
                                            <img src="<?php echo e(fileurlemp().$emp->emp_profile); ?>" class="center-block userImg img-responsive">
                                            <?php else: ?>
                                            <img src="<?php echo e(asset('public/img/vendorDefault.png')); ?>" class="center-block userImg img-responsive">
                                            <?php endif; ?>
                                        </div>
                                        <h4 class="text-center"><?php echo e($emp->employee_name); ?></h4>
                                        <p class="text-center"><?php echo e($emp->emp_role); ?></p>
                                    </div>

                                    <div class="title listEmp">
                                        <div class="service_title">
                                            <h5>Skills</h5>
                                            <?php $services = explode(',',$emp->service_name); 
                                            //prd($services[1]);
                                            ?>
                                            <p>
                                            <?php if(isset($services[0]) && !empty($services[0])): ?>
                                            <span><?php echo e($services[0]); ?></span>
                                            <?php endif; ?>
                                            <?php if(isset($services[1]) && !empty($services[1])): ?>
                                            , <span><?php echo e($services[1]); ?></span>
                                            <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="content_opt borderTop_none"> 
                    
                                        <div class="card_loc">
                                            <div class="row">
                                                <div class="col-md-7 col-sm-7 col-xs-7">
                                                    <div class="tiles-title card-text-heading">Mobile Number</div>
                                                    <div class="job_st_details">+971-<?php echo e($emp->emp_mobile); ?></div>
                                                </div>

                                                <div class="col-md-5 col-sm-5 col-xs-5">
                                                    <div class="tiles-title card-text-heading">Team</div>
                                                    <?php if(isset($emp->group) && !empty($emp->group)): ?>
                                                    <div class="job_st_details"><?php echo e($emp->group); ?></div>
                                                    <?php else: ?>
                                                    <div class="job_st_details">Not Assign</div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card_loc">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="tiles-title card-text-heading">Current Status</div>
                                                    <div class="job_st_details"><?php echo e($emp->currentStatus); ?></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="newActBtn_ng">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <?php if(hasPermissionThroughRole('view_order_history')): ?>
                                                        <a href="<?php echo e(url('admin/employees/orderList',$emp->id)); ?>" class="btn btn-block">Order History</a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php if(hasPermissionThroughRole('view_personal_info')): ?>
                                                        <a href="<?php echo e(url('admin/employees/employeeProfile',$emp->id)); ?>" class="btn btn-block">More Details</a>
                                                    <?php endif; ?>
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
    return confirm('Are you sure you want to delete this Employee record?');
}
$('#search').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
        type : 'get',
        url : "<?php echo e(route('employees.search')); ?>",
        data:{
            'search':$value
            },
        success:function(data){
            
            var json = $.parseJSON(data);
            var htmlslot;
            $('#searchDataall').html('');
            if(json.length > 0){
                $.each(json,function(index, value){
                
                    var employee_image='';
                    var employee_image1 = "<?php echo fileurlemp(); ?>"+ value.emp_profile;
                    if(value.emp_profile == null || value.emp_profile == ''){
                        var employee_image = '<img src="<?php echo e(asset("public/img/vendorDefault.png")); ?>" class="img-responsive" />';
            
                    }else{
                        var employee_image = '<img src="'+ employee_image1 +'" class="img-responsive">';
                    
                    }
                    var edit_permission='';
                    if("<?php echo hasPermissionThroughRole('edit_employee'); ?>"){
                        var edit_permission = '<a href="http://3.16.87.53/admin/employees/destroy/'+value.id+'" onclick="return confirmation();" class="EditService editSub_btn pull-left dlt_btn" title="Delete Employee"><i class="fa fa-times"></i></a>';
                    }
                    var delete_permission='';
                    if("<?php echo hasPermissionThroughRole('delete_employee'); ?>"){
                        var delete_permission = '<a href="http://3.16.87.53/admin/employees/editEmployee/'+value.id+'" class=" pull-right edt_btn "title="Edit Employee">'+
                                                    '<img src="<?php echo e(asset("public/img/edit_icons.png")); ?>" class="img-responsive"></a>';
                    }
                    var view_permission='';
                    if("<?php echo hasPermissionThroughRole('view_personal_info'); ?>"){
                        var view_permission = '<a href="http://3.16.87.53/admin/employees/employeeProfile/'+value.id+'" class="btn btn-block">More Details</a>';
                    }
                    var view_history_permission='';
                    if("<?php echo hasPermissionThroughRole('view_order_history'); ?>"){
                        var view_history_permission = '<a href="http://3.16.87.53/admin/employees/orderList/'+value.id+'" class="btn btn-block">Order History</a>';
                    }

                    htmlslot='<div class="col-md-3">'+
                            '<div class="mainWidget_ng ">'+
                                '<div class="head_ng borderBottomNone ng_listEmp">'+
                                    '<div class="grid_box new_srv_box">'+
                                        '<div class="controller overlay">'+
                                            ''+delete_permission+''+
                                            ''+edit_permission+''+                                  
                                        '</div>'+
                                    '</div>'+

                                    '<div class="icon_div">'+
                                        ''+employee_image+''+
                                    '</div>'+
                                    '<h4 class="text-center">'+value.employee_name+'</h4>'+
                                    '<p class="text-center">'+value.emp_role+'</p>'+
                                '</div>'+

                                '<div class="title listEmp">'+
                                    '<div class="service_title">'+
                                        '<h5>Skills</h5>'+
                                        '<p><span>Electrical</span>, <span>Plumbing</span>, <span>Carpentry</span></p>'+
                                    '</div>'+
                                '</div>'+

                                '<div class="content_opt borderTop_none">'+ 
                                    '<div class="card_loc">'+ 
                                        '<div class="row">'+ 
                                            '<div class="col-md-7 col-sm-7 col-xs-7">'+ 
                                                '<div class="tiles-title card-text-heading">Mobile Number</div>'+ 
                                                '<div class="job_st_details">+971-'+value.emp_mobile+'</div>'+ 
                                            '</div>'+ 

                                            '<div class="col-md-5 col-sm-5 col-xs-5">'+ 
                                                '<div class="tiles-title card-text-heading">Team</div>'; 
                                                if(value.group != '' && value.group != null){
                                                    htmlslot+='<div class="job_st_details">'+value.group+'</div>';
                                                }else{
                                                    htmlslot+='<div class="job_st_details">Not Assign</div>';
                                                }
                                                htmlslot+='</div>'+ 
                                        '</div>'+ 
                                    '</div>'+ 

                                    '<div class="card_loc">'+ 
                                        '<div class="row">'+ 
                                            '<div class="col-md-12 col-sm-12 col-xs-12">'+ 
                                                '<div class="tiles-title card-text-heading">Current Status</div>'+ 
                                                '<div class="job_st_details">'+value.currentStatus+'</div>'+ 
                                            '</div>'+ 
                                        '</div>'+ 
                                    '</div>'+ 
                                    '<div class="newActBtn_ng">'+
                                        '<div class="row">'+
                                            '<div class="col-md-6">'+
                                            ''+view_history_permission+''+
                                            '</div>'+
                                            '<div class="col-md-6">'+
                                                ''+view_permission+''+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+

                                '</div>'+
                            '</div>'+
                        '</div>'
                    ;
                    $("#searchDataall").append(htmlslot);
                });
            }else{
                htmlslot='<div class="col-md-12"><div class="content-box-main">'+
                            '<h4 class="text-center">No Record Found!</h4>'+
                        '</div></div>';
                    
                    $("#searchDataall").append(htmlslot);
            }
        }
    });
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.emp_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>