

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
        .page-sidebar {
            font-family: 'Nexa Bold';
        }
        @media  print{
            .inv_table_list thead tr, .inv_table_list thead tr td{
                background:#1b1e24 !important;
                background-color:#1b1e24 !important;
                -webkit-print-color-adjust: exact; 
            }
        }
        .contentBox .order_history_box h5 {
            color: #1b1e24;
            font-weight: 500;
        }
        .contentBox h5 {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        .contentBox {
            background-color: #ffffff;
            margin-bottom: 20px;
            float: left;
            width: 100%;
        }
        .contentBox p {
            font-weight: 500;
            font-size: 13px;
            letter-spacing: .6px;
        }
        .topPadding15 {
            padding-top: 15px;
        }

        .amtPay {
            border-top: 1px dashed #cccccc;
            margin-top: 20px;
            padding-top: 15px;
            color: #000000;
            text-transform: uppercase;
        }
        .invoice_summery_box{
            border-top: 1px solid #ccc;
            padding-top: 10px;
            padding-left: 0;
        }
        .table>thead>tr>th{
            color: #000000;
            background: #e5e9ec;
        }
    </style>

    <div class="content">
    <?php if(isset($job_invoice) && !empty($job_invoice)): ?>
        <div class="content-box-main">
            <div class="invoice_header pull-left">
                <div style="width:100%;float:left;display:block;">
                    <div style="width:50%;float:left">
                        <div>
                            <img src="../../../public/img/logo.png" class="img-responsive" />
                        </div>
                    </div>
                    <div style="width:50%;float:left">
                        <div class="text-right">
                            <address>
                                29/21, DLF Phase-1, Near Sahara mall,<br />
                                Gurugram<br />
                                Phone no. : 9874562122<br />
                                Email : Info@nittygritty.com
                            </address>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div style="width:100%;float:left;display:block;">
                        <div style="width:50%;float:left">
                            <div class="invoice_vdr_box">
                                <h4><?php echo e($job_invoice->firstname); ?> <?php echo e($job_invoice->lastname); ?></h4>
                                <p><?php echo e($job_invoice->mobile); ?></p>
                                <p><?php echo e($job_invoice->address); ?></p>
                            </div>
                        </div>
                        <div style="width:50%;float:left">
                            <div class="invoice_inf_box">
                                <div>Job No : <?php echo e($job_invoice->id); ?></div>
                                <div>Invoice Generated Date : <?php echo e(date('d-m-Y')); ?></div>
                                <div>Payment Date : <?php echo e(date('d-m-Y', strtotime($job_invoice->updated_at))); ?></div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="job_desc_box_list">
                        <div class="title">
                        <?php if($job_invoice->amc_type == 1): ?>
                            <h5 class="pull-left">AMC Holder</h5>
                        <?php else: ?>
                            <h5 class="pull-left">Not a AMC Holder</h5>
                        <?php endif; ?>
                            <!-- <h5 class="pull-left">Non AMC Holder</h5> -->
                            <h5 class="pull-right">Nick Name  : &nbsp;<span class="srv_name"><?php echo e($job_invoice->title); ?></span></h5>
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
                                    <?php if(isset($job_invoice->serviceData[0]->text_content) && !empty($job_invoice->serviceData[0]->text_content)): ?>
                                    <th >Description</th>
                                    <?php endif; ?>
                                    <th class="text-right">Price</th>
                                </tr>
                            </thead>
                        <?php //print_r($job_invoice);die(); ?>
                            <tbody>
                            <?php if(isset($job_invoice->serviceData[0]) && !empty($job_invoice->serviceData[0])): ?>
                            <?php $i = 1; ?>
                                <?php $__currentLoopData = $job_invoice->serviceData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr >
                                    <td><?php echo e($i); ?></td>
                                    <td><?php echo e($service->service_name); ?></td>
                                    <?php if(isset($job_invoice->serviceData[0]->text_content) && !empty($job_invoice->serviceData[0]->text_content)): ?>
                                        <td><?php echo e($service->text_content); ?></td>
                                    <?php endif; ?>
                                    <td class="text-right">Free</td>
                                </tr>
                                <?php  $i++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                               
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="invoice_summery_box" >
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

           
            <?php if($job_invoice->serviceData[0]->text_content == '' || $job_invoice->serviceData[0]->text_content == NULL): ?>
            <div class="row">
                <div class="col-md-12">
                    
                        <div class="header_main_div_sec">
                            <div class="title">
                                <h5>Services </h5>
                            </div>       
                        </div>

                        <div class="job_desc_box_list">
                            <div class="row ">
                                <div class="col-md-8">
                                    <div class="contentBox">
                                        <?php if(isset($job_invoice->serviceData[0]) && !empty($job_invoice->serviceData[0])): ?>
                                       
                                        <?php $__currentLoopData = $job_invoice->serviceData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="order_history_box">
                                                <h5><strong><?php echo e($service->service_name); ?></strong></h5>
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
                                                            <?php if(isset($service->job_proposal[0]) && !empty($service->job_proposal[0])): ?>
                                                                <?php $__currentLoopData = $service->job_proposal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo e($proposal->sub_service_name); ?></td>
                                                                    <td><?php echo e($proposal->product_name); ?></td>
                                                                    <td><?php echo e($proposal->qty); ?></td>
                                                                    <td><?php echo e($proposal->unit_variable); ?></td>
                                                                    <td class="text-center"><?php echo e($proposal->sub_service_price); ?></td>
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
                                                                    <th class="text-center"> <?php echo e($service->service_price); ?> </th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <!-- <div class="order_history_box">
                                            <h5><strong>Plumbing</strong></h5>
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
                                                            <tr>
                                                                <td>Plumbing</td>
                                                                <td>Plumbing</td>
                                                                <td>3</td>
                                                                <td>25</td>
                                                                <td class="text-center">150</td>
                                                            </tr>

                                                            <tr>
                                                                <td>Plumbing</td>
                                                                <td>Plumbing</td>
                                                                <td>3</td>
                                                                <td>25</td>
                                                                <td class="text-center">150</td>
                                                            </tr>
                                                        </tbody>

                                                        <tfoot>
                                                            <tr>
                                                                <th>&nbsp;</th>
                                                                <th>&nbsp;</th>
                                                                <th>&nbsp;</th>
                                                                <th>Total</th>
                                                                <th class="text-center">500</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div> -->
                                                                                
                                    </div>  
                                </div>

                                <div class="col-md-4">
                                    <div class="contentBox">
                                        <div class="order_history_box">
                                            <h5><strong>Order Summary</strong></h5>
                                            <div class="row">
                                                <div class="col-md-12">
                                                <?php if(isset($job_invoice->serviceData[0]) && !empty($job_invoice->serviceData[0])): ?>
                                                    <?php $__currentLoopData = $job_invoice->serviceData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <p class="topPadding15"><?php echo e($service->service_name); ?> 
                                                            <span class="pull-right"><?php echo e($service->service_price); ?> </span>
                                                        </p>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                                                                                                                     
                                                    <p class="amtPay">Total Price <span class="pull-right" id="totalPrice"><?php echo e($job_invoice->serviceData[0]->total_price); ?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                </div> 
                            </div>
                        </div>   
                </div>
            </div>
            <?php endif; ?>
            

        
        </div>
    <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.service_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>