<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Nitty-Gritty - Services</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta content="" name="author" />
<link href="<?php echo e(asset('public/plugins/jquery-metrojs/MetroJs.min.css')); ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/plugins/shape-hover/css/demo.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/plugins/shape-hover/css/component.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/plugins/owl-carousel/owl.carousel.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/plugins/owl-carousel/owl.theme.css')); ?>" />
<link href="<?php echo e(asset('public/plugins/pace/pace-theme-flash.css')); ?>" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo e(asset('public/plugins/jquery-slider/css/jquery.sidr.light.css')); ?>" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo e(asset('public/plugins/jquery-ricksaw-chart/css/rickshaw.css')); ?>" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo e(asset('public/plugins/Mapplic/mapplic/mapplic.css')); ?>" type="text/css" media="screen">


<link href="<?php echo e(asset('public/plugins/pace/pace-theme-flash.css')); ?>" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo e(asset('public/plugins/bootstrapv3/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrapv3/css/bootstrap-theme.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="<?php echo e(asset('public/plugins/animate.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/jquery-scrollbar/jquery.scrollbar.css')); ?>" rel="stylesheet" type="text/css" />

<link href="<?php echo e(asset('public/css/webarch.css')); ?>" rel="stylesheet" type="text/css" />

<link href="<?php echo e(asset('public/developer/css/styles.css')); ?>" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://use.fontawesome.com/6fd4525080.js"></script>
<link href="<?php echo e(asset('public/plugins/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrap-tag/bootstrap-tagsinput.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/dropzone/css/dropzone.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrap-datepicker/css/datepicker.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/ios-switch/ios7-switch.css')); ?>" rel="stylesheet" type="text/css" media="screen">
<link href="<?php echo e(asset('public/plugins/bootstrap-select2/select2.css')); ?>" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo e(asset('public/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.css')); ?>" rel="stylesheet" type="text/css" media="screen" />
<?php echo $__env->yieldContent('css'); ?>
<style>
     @font-face {
        font-family: 'Nexa Bold';
        src: url('../../../../public/fonts/Nexa Bold.otf');
    }
    body{
        font-family: 'Nexa Bold';
    }
    h1,h2,h3,h4,h5,h6{
        font-family: 'Nexa Bold';
    }
    input, button, select, textarea{
        font-family: 'Nexa Bold';
    }  
    .page-content .breadcrumb{
        font-family: 'Nexa Bold';
    }
    .page-sidebar{
        font-family: 'Nexa Bold';
    }
    .btn{
        font-family: 'Nexa Bold';
    }

</style>
</head>

<body class="">

    <!-- start header---->
        <?php echo $__env->make('admin.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- end header---->
    <div class="page-container row-fluid">
       <!--- start sidebar ---->
       <?php echo $__env->make('admin.includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!--- start sidebar ---->

        <div class="page-content">

<!-- main content start---->
<?php echo $__env->yieldContent('content'); ?>
<!--- main content end----->
</div>


</div>

        

<script src="<?php echo e(asset('public/plugins/pace/pace.min.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('public/plugins/jquery/jquery-1.11.3.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/bootstrapv3/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/jquery-block-ui/jqueryblockui.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/jquery-unveil/jquery.unveil.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/jquery-scrollbar/jquery.scrollbar.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/jquery-numberAnimate/jquery.animateNumbers.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/jquery-validation/js/jquery.validate.min.js')); ?>" type="text/javascript"></script>
<!-- <script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script> -->


<script src="<?php echo e(asset('public/js/webarch.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/js/chat.js')); ?>" type="text/javascript"></script>
    
    <script src="<?php echo e(asset('public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/plugins/jquery-inputmask/jquery.inputmask.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/plugins/jquery-autonumeric/autoNumeric.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/plugins/ios-switch/ios7-switch.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/plugins/bootstrap-select2/select2.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/plugins/bootstrap-tag/bootstrap-tagsinput.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/plugins/dropzone/dropzone.min.js')); ?>" type="text/javascript"></script>

    <script src="<?php echo e(asset('public/developer/js/custom.js')); ?>" type="text/javascript"></script>
   

    <script src="<?php echo e(asset('public/plugins/bootstrap-select2/select2.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/plugins/jquery-datatable/js/jquery.dataTables.min.js')); ?>" type="text/javascript"></script>

    <script src="<?php echo e(asset('public/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/plugins/datatables-responsive/js/datatables.responsive.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/plugins/datatables-responsive/js/lodash.min.js')); ?>"></script>

    <script src="<?php echo e(asset('public/js/datatables.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/js/validate.js')); ?>" type="text/javascript"></script>
    <?php echo $__env->yieldContent('js'); ?>
    <script>
   
    $('#refreshbutton').click(function(){
        location.reload();
    });

    setTimeout(function() {
        $('.alert-info').slideUp(300);
    }, 5000); 


var employee=[];
$('#group_emp343').select2().on("select2-selecting", function(e) {
       var id = e.val;
                //  employee.push(e.object.text);
                // console.log(employee);
        //$("#emp_group_add").html('');
        //console.log(employee.length);
       // console.log(employee[(parseInt(employee.length)-1)]);
                $("#emp_group_add").append(`<div class="form_control_new" id="mydivdd_${id}">
                <div class="col-md-5">
                    <div class="form_control_new">  
                            <div class="label_head">Employee Name</div>
                            <div class="input-group"> 
                                <span class="input-group-addon" id="employee_name"><i class="fa fa-user"></i></span> 
                                <input class="form-control" disabled="true" name="employee_id[]" id="employee_name" value="${e.object.text}"> 
                            </div>
                        </div>
                    </div>
                        
                    <div class="col-md-5">
                        <div class="form_control_new">  
                            <div class="label_head">Employee Role</div>
                            <select class="" name="employee_role[]" id="employee_role" placeholder="Employee Role">
                                <option value="">Select Role</option>
                                <option value="Mechanic">Mechanic</option>
                                <option value="Electrician">Electrician</option>
                                <option value="Helper">Helper</option>
                            </select>
                            
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="dlt_emp_btn relativePosition">  
                            <h5>
                                <span class="cancle_sur_btn removeButton" onclick="removediv(${id});"><img src="<?php echo e(asset('public/img/error.png')); ?>" class="img-responsive"></span>
                            </h5> 
                        </div>
            </div>
            </div>`);
});
function removediv(id){
    var elem = document.getElementById('mydivdd_'+id);
    
    elem.parentNode.removeChild(elem);
    
}

  

    $(document).ready(function() {
        $.fn.datepicker.defaults.format = "dd-mm-yyyy";
        $("#source").select2();
        
        $("#country").select2();
        $('#country').on('change', function() {
      var data = $("#country option:selected").val();
      //alert(data);
       // $("#test").val(data);
    })
<?php if(isset($arr) && !empty($arr)){ ?>
    $(".multiselect").val(<?= json_encode($arr); ?>).select2();
    <?php }else{ ?>
        $(".multiselect").val(["Jim", "Lucy"]).select2();
<?php }?>

        $("#edittEmp").click(function(){
            var data = $("#staff_type").val();
            //alert(data);
        });
            
        $('.input-append.date').datepicker({
            autoclose: true,
            todayHighlight: true
        });

        $("#group_date").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            //endDate: today1, 
        }).on('changeDate', function (selected) {
            var startDate1 = new Date(selected.date.valueOf());
            var date = $('#group_date').val();
                //alert(date);
                GetSlotDate(date);
        }).on('clearDate', function (selected) {
            $('#insurance_expire_date').val('');
            // fum remove ///
        });


            $("#date_of_birth").datepicker({
            
            startView: -3,
            daysOfWeekDisabled: "3,4",
            autoclose: true,
            todayHighlight: true
            });
            
            
       
        $('.clockpicker ').clockpicker({
            autoclose: true
        });
        $('.my-colorpicker-control').colorpicker()
        $(function($) {
            $("#date").mask("99-99-9999");
            $("#phone").mask("(999) 999-9999");
            $("#tin").mask("99-9999999");
            $("#ssn").mask("999-99-9999");
        });
        $('.auto').autoNumeric('init');
        $('#text-editor').wysihtml5();
        $("div#myId").dropzone({
            url: "/file/post"
        });
        $('#source-tags').tagsinput({
            typeahead: {
                source: ['Amsterdam', 'Washington', 'Sydney', 'Beijing', 'Cairo']
            }
        });
    }); 

function GetSlotDate(date){
    var token = "<?php echo e(csrf_token()); ?>";
    //alert(date+'------------'+token);
    $.ajax({ 
        url: "<?php echo e(route('slots.ajaxslots')); ?>",
        data: {"date":date,"_token":token},
        type: 'post',
        success: function(result) {
        //console.log(result); return false ;
            console.log(result);
            var json = $.parseJSON(result);
            if(result != ''){
                $("#dataslotbindnew").html('');
                $("#dataslotbindnew").append(` <div class="sub_ser_box_header" style="background: #e2e5e7;color: #000;">
                                <div class="row">
                                    <div class="col-md-3">Day Slots</div>
                                    <div class="col-md-3">Start Time</div>
                                    <div class="col-md-3">End Time</div>
                                    <div class="col-md-3">Status</div>
                                </div>
                            </div>
                            
                            <div class="srv_dt_slot" id="slot_dtbind">
                                
                            </div>`);
                $.each(json, function(index, value) {
                    // do your stuff here
                    //console.log(value.slot_timename);
                    var htmlslot='';
                    if(value.index != ''){
                        var str=''
                        if (value.status == 1){
                            str =  '<button type="button" class="availableSlot">Available</button>'
                        }else if(value.status == 0){
                            str =  '<button type="button" class="blockDate">BLock</button>'
                        }else{
                            str =  '<button type="button" class="availableSlot">Available</button>'
                        }
                        htmlslot=` 
                        <div class="sub_ser_box_list">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="radio radio-primary">
                                        <input id="`+ value.slot_timename.toLowerCase() +`" type="radio" name="day_slot" value="morning" checked="checked">
                                        <label for="`+ value.slot_timename.toLowerCase() +`">`+ value.slot_timename +`</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class=""> `+ value.slotstart_time +` </div>
                                </div>

                                <div class="col-md-3">
                                    <div class=""> `+ value.slotend_time +`</div>
                                </div>

                                <div class="col-md-3">
                                `+ str +`
                                </div>
                            </div>
                        </div>                        
                            `;
                    }
                    $("#slot_dtbind").append(htmlslot);
                });

                }else{
                    $("#dataslotbindnew").append(`
                        <div class="col-md-9" >
                        <div class="form_control_new"> 
                            <h4> ${moment(currentdate).format("YYYY-MM-DD")} is blocked!</h4>
                        </div>
                        </div>
                    `);
                } 
                  
                }
            });
}




    </script>
</body>
</html>