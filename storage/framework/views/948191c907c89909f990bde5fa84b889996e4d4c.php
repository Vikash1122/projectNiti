

<?php $__env->startSection('content'); ?>

    <style>
        @font-face {
            font-family: 'Nexa Bold';
            src: url('../../../public/fonts/Nexa Bold.otf');
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
        .page-content .breadcrumb, .page-title, .btn, .page-sidebar{
            font-family: 'Nexa Bold';
        }

        .contentBox{
            background-color: #ffffff;
            /* box-shadow: 0px 3px 34px rgba(201, 201, 201, 0.89); */
            /* padding: 15px 0px; */
            margin-bottom: 20px;
            float: left;
            width: 100%;
        }
        .contentBox h5{
            border-bottom: 1px solid #ccc;
            /* margin: 0px 15px 20px; */
            padding-bottom: 10px;
        }
        .contentBox table h5{
            border-bottom:0px;
            margin-left: 0;
        }
        .pd_Left_0{
            padding-left:0px !important;
        }
        .cart_detail .media .thumbnail{
            width:60px;
            height:60px;
            padding-right:4px !important;
        }
        .cart_detail .media .thumbnail img{
            max-width:100%;
            overflow:hidden;
        }
        .cart_detail .media .media-body{
            padding-left: 15px;
        }
        .contentBox p{
            font-weight: 500;
            font-size: 13px;
            letter-spacing: .6px;
        }
        .amtPay{
            border-top: 1px dashed #cccccc;
            margin-top: 20px;
            padding-top: 15px;
        }
        .chkOutBox{
            width:100%;
            float:left;
        }
        .chkOutBox a{
            padding:10px;
        }
        
        .chkOutBox a:hover, .chkOutBox a:focus{
            color:#ffffff;
        }
        .job_desc_box_list .content{
            padding-left: 0;
            padding-right: 0;
            padding-top: 0px;
        }
        .incDecBox{
            border: 1px solid #ccc;
            border-radius: 22px;
            display: inline-flex;
        }
        .incDecBtnBox, .incDecTextBox{
            display: inline-block;
            
        }
        .incDecBox .incDecTextBox{
            padding-top: 5px;
            padding-left: 5px;
            padding-right: 5px;
            font-size: 12px;
            font-weight: 600;
            color: #000;
        }
        .incDecBtnBox button{
            background:transparent;
            border: none;
            
        }
        .incDecBox .leftBtn{
            background: #33a599;
            color: #ffffff;
            padding: 2px;
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
        }
        .incDecBox .rightBtn{
            background: #33a599;
            color: #ffffff;
            padding: 2px;
            border-top-right-radius: 12px;
            border-bottom-right-radius: 12px;
        }
        .contentBox{
            /* padding:0px; */
        }
        .contentBox .table>thead>tr>th{
            color:#000000;
        }
        .contentBox .table>thead{
            background: #e5e9ec;
        }
        .incDecBtnBox i{
            font-size: 10px;
        }
        .resetPrice{
            background: #33a599;
            color: #ffffff;
            border: none;
            float: right;
            margin-right: 5%;
            margin-top: 4px;
            border-radius: 2px;
        }
        .amtPayNew{
            font-weight: 500;
            font-size: 13px;
            letter-spacing: .6px;
        }
        .topPadding15{
            padding-top: 15px;
        }
        .contentBox .order_history_box h5{
            color: #F44336;
            font-weight: 500;

        }
        .order_history_box .serTextInput{
            color: black;
            border: none;
            text-align: right;
            outline: none;
        }
        .serTextInput11{
            color: black;
            border: none;
            outline: none;
            width:50%;
            background:transparent;
        }
        .table>thead>tr>th {
            color: #000000;
            background: #e5e9ec;
        }
    </style>

    <link href="<?php echo e(asset('public/plugins/bootstrap-tag/bootstrap-tagsinput.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('public/plugins/bootstrap-select2/select2.css')); ?>" rel="stylesheet" type="text/css" media="screen" />

    <div class="content">
        <div class="page-title"> 
            <div class="row">
                <div class="col-md-6">
                <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
                    <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
                </a>
                <h3>Job Card Details  <span class="semi-bold">&nbsp;</span></h3>
                </div>
                <div class="col-md-6">
                    <span class="pull-right" style="margin-top: 6px;">
                        <!-- <button type="button" class="btn btn-primary btn-cons">Accept</button> -->
                        <?php if($job->status == 9): ?>
                        <button type="button" class="btn btn-danger btn-cons">Rejected</button>
                        <?php else: ?>
                        <button type="button" onclick="jobIsReject(<?php echo $id;?>);" class="btn btn-danger btn-cons">Reject</button>
                        <?php endif; ?>
                    </span>
                </div>
            </div>  
        </div>
        <?php if(isset($jobcard[0]) && !empty($jobcard[0])): ?>
            <form action="<?php echo e(url('admin/orders/sendProposal/'.$id)); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="content-box-main">
                
                    <div class="order_history_box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="job_desc_box_list">
                                    <div class="title">
                                        <h5 class="pull-left">AMC Holder</h5>
                                        <h5 class="pull-right">Nick Name  : &nbsp;<span class="srv_name">My Hometown</span></h5>
                                    </div>
                                </div>
                            </div>                
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr style="background: #1b1e24;">
                                                <th>#</th>
                                                <th>Service Name</th>
                                                <?php if(isset($jobcard[0]->text_content) && !empty($jobcard[0]->text_content)): ?>
                                                    <th>Description</th>
                                                <?php endif; ?>
                                                <th class="text-right">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1;?>
                                        <?php $__currentLoopData = $jobcard; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jb_c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($i); ?></td>
                                                <td>
                                                    <?php echo e($jb_c->service_name); ?>

                                                    
                                                </td>
                                                <?php if(isset($jobcard[0]->text_content) && !empty($jobcard[0]->text_content)): ?>
                                                    <td>
                                                    <?php echo e($jb_c->text_content); ?>

                                                    <input type="hidden" name="service_id[]" value="<?php echo e($jb_c->service_id); ?>">
                                                    <input type="hidden" name="text_content_<?php echo e($jb_c->service_id); ?>[]" value="<?php echo e($jb_c->text_content); ?>">
                                                    </td>
                                                <?php endif; ?>
                                                <td class="text-right">Free</td>
                                            </tr>
                                            <?php $i++;?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                                                     
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="invoice_summery_box">
                                            <div class="row">
                                                <div class="col-md-offset-9 col-md-3">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-6">
                                                            <h5>Total :</h5>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-6 text-right">
                                                            <h5>1 Callout</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                        </div>
                        
                    </div>
                
                <?php if($jobcard[0]->text_content == '' || $jobcard[0]->text_content == NULL): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content-box-main">
                                <div class="header_main_div_sec">
                                    <div class="title">
                                        <h5>Services </h5>
                                    </div>       
                                </div>

                                <div class="job_desc_box_list">
                                        <div class="row ">
                                            <div class="col-md-8">
                                                <div class="content">
                                                    <div class="contentBox">
                                                    <?php $__currentLoopData = $jobcard; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="order_history_box">
                                                        <input type="hidden" name="service_id[]" value="<?php echo e($card->service_id); ?>">
                                                            <h5><strong><?php echo e($card['service_name']); ?></strong></h5>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <table class="table table-hover">
                                                                        <thead>
                                                                            <tr>   
                                                                                <th>Sub Service Type</th>
                                                                                <th>Product Type</th>
                                                                                <th>Quantity</th>
                                                                                <th>Unit Variable</th>
                                                                                <th class="text-center">Price</th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody class="cart_detail">
                                                                        <?php if(isset($card['serviceData'][0]) && !empty($card['serviceData'][0])): ?>
                                                                            <?php $__currentLoopData = $card['serviceData']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <tr>
                                                                                <td>
                                                                                <input type="hidden" name="sub_service_id_<?php echo e($card->service_id); ?>[]" value="<?php echo e($sub->sub_service_id); ?>">
                                                                                <?php echo e($sub->sub_service_name); ?>

                                                                                </td>
                                                                                <td>
                                                                                <input type="hidden" name="product_id_<?php echo e($card->service_id); ?>[]" value="<?php echo e($card->product_id); ?>">
                                                                                <?php echo e($sub->product_name); ?>

                                                                                </td>
                                                                                <td><?php echo e($sub->qty); ?></td>
                                                                                <td><?php echo e($sub->unit_variable); ?></td>
                                                                                <td class="text-center">
                                                                                <input type="text" name="sub_service_price_<?php echo e($card->service_id); ?>[]" id="" class="serTextInput11" value="<?php echo e($sub->sub_price); ?>" readonly />
                                                                                </td>
                                                                            </tr>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php endif; ?>
                                                                        </tbody>

                                                                        <tfoot>
                                                                            <tr>
                                                                                <th>&nbsp;</th>
                                                                                <th>&nbsp;</th>
                                                                                <th>&nbsp;</th>
                                                                                <th>Total</th>
                                                                                <th class="text-center">
                                                                                <?php echo e($card['sub_total_price']); ?>

                                                                                    <!-- <input type="" name="" id="" class="serTextInput11" value="<?php echo e($card['sub_total_price']); ?>" disabled="disabled" /> -->
                                                                                </th>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                    </div>  
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="content">
                                                    <div class="contentBox">
                                                        <div class="order_history_box">
                                                            <h5><strong>Order Summary</strong></h5>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                <?php $__currentLoopData = $jobcard; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <p class="topPadding15"><?php echo e($cd['service_name']); ?> 
                                                                        <span class="pull-right">
                                                                        <input type="text" name="service_price_<?php echo e($cd['service_id']); ?>[]" id="" class="serTextInput" value="<?php echo e($cd['sub_total_price']); ?>" readonly /></span>
                                                                    </p>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php 
                                                                    $sum = 0;
                                                                    foreach($jobcard as $key=>$value){
                                                            
                                                                    if(isset($value->sub_total_price))   
                                                                        $sum += $value->sub_total_price;
                                                                    }
                                                                ?>
                                                                    <!-- <p>Painting 
                                                                        <span class="pull-right"><input type="" name="" id="" class="serTextInput" value="1500" disabled="disabled" /></span>
                                                                    </p> -->
                                                                    <p class="amtPay">Total Price <span class="pull-right" id="totalPrice"><?php echo e($sum); ?></span></p>
                                                                    <div class="amtPay amtPayNew">Extra charges  
                                                                        <div class="incDecBox pull-right" >
                                                                            <div class="incDecBtnBox leftBtn"><button type="button" onclick="addVariable()"><i class="fa fa-plus"></i></button></div>
                                                                            <div class="incDecTextBox">10%</div>
                                                                            <div class="incDecBtnBox rightBtn"><button type="button" onclick="removeVariable()"><i class="fa fa-minus"></i></button></div>
                                                                        </div>
                                                                        <button class="resetPrice" title="Reset Price" id="resetTotal" ><i class="fa fa-undo" aria-hidden="true"></i></button>
                                                                    </div>
                                                                    <div class="amtPay amtPayNew">Grand Total <span class="pull-right" >
                                                                        <input type="text" name="total_price" id="grandTotal" class="serTextInput" value="<?php echo e($sum); ?>" readonly /></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>        
                                            

                                                <!-- <div class="chkOutBox"><button type="submit" class="btn btn-block btn-primary">Send Proposal</button></div> -->
                                            </div> 
                                        </div>
                                </div>   
                            </div>
                        </div>
                    </div> 
                <?php endif; ?>
                    <div class="row">
                        <div class="col-md-offset-8 col-md-4">
                            <div class="chkOutBox"><button type="submit" class="btn btn-block btn-primary">Send Proposal</button></div>
                        </div>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    </div> 

    <script>
        var count = 0;
        
        function addVariable(){
            count++;
            if(count==1){
                var grandVal = $("#totalPrice").html();
                var hh = ((grandVal  * 10)/100);
                alert(hh);

                var newGrandVal = parseInt(grandVal) + parseInt(hh);
                console.log(newGrandVal);
                $("#grandTotal").val(newGrandVal);
                
            }else{
                var grandVal = $("#grandTotal").val();
                var hh = ((grandVal  * 10)/100);
                alert(hh);

                var newGrandVal = parseInt(grandVal) + parseInt(hh);
                $("#grandTotal").val(newGrandVal);
            }
            
        }

        function removeVariable(){
            count++;
            if(count==1){
                var grandVal1 = $("#totalPrice").html();
                var hh1 = ((grandVal1  * 10)/100);
                alert(hh1);
                var newGrandVal1 = parseInt(grandVal1) - parseInt(hh1);
                $("#grandTotal").val(newGrandVal1);
                
            }else{
                var grandVal1 = $("#grandTotal").val();
                var hh1 = ((grandVal1  * 10)/100);
                alert(hh1);
                var newGrandVal1 = parseInt(grandVal1) - parseInt(hh1);
                $("#grandTotal").val(newGrandVal1);
            }
            alert();
            
        }

    </script>

    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <script>
    $(document).ready(function(){
        var grandValNew = $("#totalPrice").html();
        $("#resetTotal").click(function(){
            $("#grandTotal").text(grandValNew);
        })
    });

    function jobIsReject(id){
        $.ajax({
            url : "<?php echo e(route('isReject.get')); ?>?job_id="+id,
            type: "GET",
            async : false ,
            success : function(data){
                var res =$.parseJSON(data);
                console.log(res);
                if(data > 0){
                    
                    setTimeout(function(){ 
                        location.reload();
                        window.location.href = "<?php echo e(url('admin/orders/viewProposal')); ?>/"+id;
                    }, 2000);
                    $('.successdiv').addClass('success');
                    $('.successdiv').html("This Job Rejected Successfully!");
                    
                }else{
                    setTimeout(function(){ 
                        location.reload();
                        window.location.href = "<?php echo e(url('admin/orders/viewProposal')); ?>/"+id;
                    }, 2000);
                    $('.errordiv').addClass('error');
                    $('.errordiv').html("There is Something wrong while Rejecting a Job!");
                }
            },
            cache: false ,
            contentType:false ,
            processData : false,
        }) ;  
        return false ;  
    }
  </script>

          
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.header_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>