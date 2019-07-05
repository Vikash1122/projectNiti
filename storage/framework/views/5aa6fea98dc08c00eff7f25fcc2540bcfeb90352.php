

<?php $__env->startSection('content'); ?>
    <style>
        .widget-title .pri_service_name{
            display: inline-block;
            margin-bottom: 10px;
        }
    </style>

    <div class="content">
        <div class="page-title"> 
            <a href="<?php echo e(url()->previous()); ?>" class="previousBtn">
                <img src="<?php echo e(asset('public/img/go_back.png')); ?>" class="img-responsive">
            </a>
            <h3>Vendor Details</h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="content-box-main">
                    <div class="boxDetailsHeadings">
                        <div class="headSec">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="profile-username text-capitalize pull-left">Sethi Marbles & Hardware</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <!-- <div class="col-md-8 col-vlg-8 m-b-10">
                            <div class="row">
                                <div class="col-md-12" data-sync-height="true">
                                    <div class="" style="height: 380px;">
                                        <div class="col-md-6 col-vlg-6 col-sm-6 no-padding -height" style="height: 380px;">
                                            <div class="widget_user_list" style="border-radius: 0px; !important">
                                                <h4>Sethi Marbles & Hardware</h4>
                                                <hr style="margin:2px !important;"/>
                                                <div class="widget_img_box" style="width: 80px !important; height: 80px !important;">
                                                    <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="" />
                                                </div>

                                                <div class="widget-title">
                                                    <h5>Anurag Sethi<span> ( Owner ) </span></h5>
                                                </div>

                                                <table class="table no-more-tables m-t-20 m-l-20 m-b-30">
                                                    <thead style="display:none">
                                                        <tr>
                                                            <th style="width:9%"></th>
                                                            <th style="width:22%"></th>
                                                        
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="v-align-middle bold text-success">Mobile No.</td>
                                                            <td class="v-align-middle"><span class="muted">+971-54840984</span> </td>
                                                        
                                                        </tr>
                                                        <tr>
                                                            <td class="v-align-middle bold text-success">Email Id</td>
                                                            <td class="v-align-middle"><span class="muted">sethi@gmail.com</span> </td>              
                                                        </tr>
                                                        <tr>
                                                            <td class="v-align-middle bold text-success">Company Address</td>
                                                            <td class="v-align-middle"><span class="muted">A-29/21 Sikandarpur</span> </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-vlg-6 col-sm-6 no-padding -height" style="height: 380px;">
                                            <div class="widget_user_list" style="border-radius: 0px; !important" >
                                                <h4>Contact Persons Details</h4>
                                                <hr style="margin:2px !important;"/>
                                                <table class="table no-more-tables m-b-30">
                                                    <tbody>
                                                        <tr>
                                                            <td class="v-align-middle bold text-success">Name</td>
                                                            <td class="v-align-middle"><span class="muted">Rohit Sethi</span> </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="v-align-middle bold text-success">Designation</td>
                                                            <td class="v-align-middle"><span class="muted">Superviser</span> </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="v-align-middle bold text-success">Mobile No.</td>
                                                            <td class="v-align-middle"><span class="muted">+971-54840984</span> </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="v-align-middle bold text-success">Email Id</td>
                                                            <td class="v-align-middle"><span class="muted">sethi@gmail.com</span> </td>              
                                                        </tr>
                                                        <tr>
                                                            <td class="v-align-middle bold text-success">Emirate ID</td>
                                                            <td class="v-align-middle"><span class="muted">EMD45467W</span> </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="v-align-middle bold text-success">Warehouse Address</td>
                                                            <td class="v-align-middle"><span class="muted">DLF phase 1, Gurugram</span> </td>
                                                        </tr> 
                                                        <tr>
                                                            <td class="v-align-middle bold text-success">Billing Address</td>
                                                            <td class="v-align-middle"><span class="muted">Dwarka Sec 21, Delhi</span> </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>

                                    <!-- <div class="col-md-5 col-vlg-4 col-sm-4 no-padding" style="height: 380px;">
                                        <div class="tiles black" style="height: 380px;background:#efe7d6 !important">
                                            <div class="tiles-body">
                                                <h5 class="text-white"><span class="semi-bold" style="color:#000;font-weight: bold;">Services</span></h5>
                                                <div class="widget-title">
                                                    <span class="pri_service_main">
                                                        <span class="pri_service_name"># Plumbing</span>
                                                        <span class="pri_service_name"># Mechanical</span>
                                                        <span class="pri_service_name"># Electrical</span>
                                                    </span>
                                                    <span class="pri_service_main"> 
                                                        <span class="pri_service_name"># Painting</span>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="tiles-body">
                                                <h5 class="text-white"><span class="semi-bold"  style="color:#000;font-weight: bold;">Products</span></h5>
                                                <div class="widget-title">
                                                    <span class="pri_service_main">
                                                        <span class="pri_service_name"># AC</span>
                                                        <span class="pri_service_name"># Computer</span>
                                                        <span class="pri_service_name"># Pipes</span>
                                                        <span class="pri_service_name"># Washbasins</span>
                                                    </span>
                                                    <span class="pri_service_main">
                                                        <span class="pri_service_name"># Glasses</span>
                                                        <span class="pri_service_name"># Paints</span>
                                                        <span class="pri_service_name"># Wallpapers</span>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="tiles-body">
                                                <h5 class="text-white"><span class="semi-bold"  style="color:#000;font-weight: bold;">Brands</span></h5>
                                                <div class="widget-title">
                                                    <span class="pri_service_main">
                                                        <span class="pri_service_name"># Hitachi</span>
                                                        <span class="pri_service_name"># Voltas</span>
                                                        <span class="pri_service_name"># Havells</span>
                                                        <span class="pri_service_name"># L.G</span>
                                                    </span>
                                                    <span class="pri_service_main">
                                                        <span class="pri_service_name"># Asian</span>
                                                        <span class="pri_service_name"># Astral</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --/>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="col-md-4 col-vlg-4 m-b-10 ">
                            <div class="tiles white">
                                <div class="row">
                                    <div class="sales-graph-heading">
                                        <div class="col-md-5 col-sm-5">
                                            <h5 class="semi-bold">Payment Mode</h5>
                                            <h4><span class="item-count animate-number semi-bold" style="font-size: 14px; font-weight: bold;">Cheque</span></h4>
                                        </div>

                                        <div class="col-md-4 col-sm-4">
                                            <p class="semi-bold">Payment Terms</p>
                                            <h4><span class="item-count animate-number" style="font-size: 14px; font-weight: bold;">15 Days</span> </h4>
                                        </div>

                                        <div class="col-md-3 col-sm-3">
                                            <p class="semi-bold">Rating</p>
                                            <h4><span class="item-count animate-number" style="font-size: 14px; font-weight: bold;">4.5</span></h4>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <h5 class="semi-bold m-t-30 m-l-30">Bank Account Details</h5>

                                <table class="table no-more-tables m-t-20 m-l-20 m-b-30">
                                    <thead style="display:none">
                                        <tr>
                                            <th style="width:25%"></th>
                                            <th style="width:25%"></th>
                                            <th style="width:25%"></th>
                                            <th style="width:25%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="v-align-middle bold text-success">Account Holder Name</td>
                                            <td class="v-align-middle"><span class="muted">Sethi Marbles & Hardware Pvt. Ltd.</span> </td>
                                        </tr>
                                        <tr>
                                            
                                            <td><span class="muted bold text-success">Bank Name</span> </td>
                                            <td class="v-align-middle">State Bank Of India</td>
                                        </tr>
                                        <tr>
                                            <td><span class="muted bold text-success">Account Number</span> </td>
                                            <td class="v-align-middle">35624512589</td>
                                        </tr>
                                        <tr>
                                            <td><span class="muted bold text-success">Branch Name</span> </td>
                                            <td class="v-align-middle">Palam Vihar</td>
                                        </tr>
                                        
                                        <tr>
                                            <td><span class="muted bold text-success">IFSC Code</span> </td>
                                            <td class="v-align-middle">SBIN123428</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> -->
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="order_history_box">
                                <div class="job_desc_box_list">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="title"><h5>Owner Details</h5></div>
                                            <div class="widget_user_list" style="border-radius: 0px; !important">
                                                <div class="widget_img_box" style="width: 80px !important; height: 80px !important;">
                                                    <img src="<?php echo e(asset('public/img/defaultIcon.png')); ?>" class="" />
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="widget-title">
                                                            <h5 class="text-uppercase">Anurag Sethi</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr />

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h5 class="textHead">Mobile No.</h5>
                                                        <p class="inv_text ">+971-54840984</p>
                                                    </div>
                                                    <div class="col-sm-6 text-right">
                                                        <h5 class="textHead">Email Id</h5>
                                                        <p class="inv_text ">sethi@gmail.com</p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h5 class="textHead">Company Address</h5>
                                                        <p class="inv_text ">A-29/21 Sikandarpur</p>
                                                    </div>
                                                </div>    

                                                <!-- <table class="table no-more-tables m-t-20 m-l-20 m-b-30">
                                                    <tbody>
                                                        <tr>
                                                            <td class="v-align-middle bold">Mobile No.</td>
                                                            <td class="v-align-middle"><span class="muted">+971-54840984</span> </td>
                                                        
                                                        </tr>
                                                        <tr>
                                                            <td class="v-align-middle bold">Email Id</td>
                                                            <td class="v-align-middle"><span class="muted">sethi@gmail.com</span> </td>              
                                                        </tr>
                                                        <tr>
                                                            <td class="v-align-middle bold">Company Address</td>
                                                            <td class="v-align-middle"><span class="muted">A-29/21 Sikandarpur</span> </td>
                                                        </tr>
                                                    </tbody>
                                                </table> -->
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="title"><h5>Contact Person Details</h5></div>
                                            <!-- <div class="widget_user_list" style="border-radius: 0px; !important" >                                                
                                                <table class="table no-more-tables m-b-30">
                                                    <tbody>
                                                        <tr>
                                                            <td class="v-align-middle bold">Name</td>
                                                            <td class="v-align-middle"><span class="muted">Rohit Sethi</span> </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="v-align-middle bold">Designation</td>
                                                            <td class="v-align-middle"><span class="muted">Superviser</span> </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="v-align-middle bold">Mobile No.</td>
                                                            <td class="v-align-middle"><span class="muted">+971-54840984</span> </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="v-align-middle bold">Email Id</td>
                                                            <td class="v-align-middle"><span class="muted">sethi@gmail.com</span> </td>              
                                                        </tr>
                                                        <tr>
                                                            <td class="v-align-middle bold">Emirate ID</td>
                                                            <td class="v-align-middle"><span class="muted">EMD45467W</span> </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="v-align-middle bold">Warehouse Address</td>
                                                            <td class="v-align-middle"><span class="muted">DLF phase 1, Gurugram</span> </td>
                                                        </tr> 
                                                        <tr>
                                                            <td class="v-align-middle bold">Billing Address</td>
                                                            <td class="v-align-middle"><span class="muted">Dwarka Sec 21, Delhi</span> </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div> -->

                                            
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 class="textHead">Name</h5>
                                                    <p class="inv_text ">Rohit Sethi</p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h5 class="textHead">Designation</h5>
                                                    <p class="inv_text ">Superviser</p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h5 class="textHead">Mobile No.</h5>
                                                    <p class="inv_text ">+971-54840984</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 class="textHead">Email Id</h5>
                                                    <p class="inv_text ">sethi@gmail.com</p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h5 class="textHead">Emirate ID</h5>
                                                    <p class="inv_text ">EMD45467W</p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h5 class="textHead">Warehouse Address</h5>
                                                    <p class="inv_text ">DLF phase 1, Gurugram</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 class="textHead">Billing Address</h5>
                                                    <p class="inv_text ">Dwarka Sec 21, Delhi</p>
                                                </div>
                                            </div>

                                             <div class="row">
                                        <div class="col-md-4">
                                            <div class="job_desc_box_list">
                                                <div class="title"><h5>Services</h5> </div>
                                                <div class="widget-title">
                                                    <p>
                                                        <span class="pri_service_main">
                                                            <span class="pri_service_name"># Plumbing</span>
                                                            <span class="pri_service_name"># Mechanical</span>
                                                            <span class="pri_service_name"># Electrical</span>
                                                            <span class="pri_service_name"># Painting</span>
                                                        </span>
                                                    </p>    
                                                </div>
                                            </div>    
                                        </div>

                                        <div class="col-md-4">
                                            <div class="job_desc_box_list">
                                                <div class="title"><h5>Products</h5></div>
                                                <div class="widget-title">
                                                    <p>
                                                        <span class="pri_service_main">
                                                            <span class="pri_service_name"># AC</span>
                                                            <span class="pri_service_name"># Computer</span>
                                                            <span class="pri_service_name"># Pipes</span>
                                                            <span class="pri_service_name"># Washbasins</span>
                                                            <span class="pri_service_name"># Glasses</span>
                                                            <span class="pri_service_name"># Paints</span>
                                                            <span class="pri_service_name"># Wallpapers</span>
                                                        </span>
                                                    </p>    
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="col-md-4">
                                            <div class="job_desc_box_list">
                                                <div class="title"><h5>Brands</h5></div>
                                                <div class="widget-title">
                                                    <p>
                                                        <span class="pri_service_main">
                                                            <span class="pri_service_name"># Hitachi</span>
                                                            <span class="pri_service_name"># Voltas</span>
                                                            <span class="pri_service_name"># Havells</span>
                                                            <span class="pri_service_name"># L.G</span>
                                                            <span class="pri_service_name"># Asian</span>
                                                            <span class="pri_service_name"># Astral</span>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>    
                                                  
                                        </div>
                                    </div>
                                    <!-- <hr/> -->

                                   
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="order_history_box">
                                <div class="job_desc_box_list">
                                    <div class="title">
                                        <h5>Payment Details</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 class="textHead">Payment Mode</h5>
                                                    <p class="inv_text ">Cheque</p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h5 class="textHead">Payment Terms</h5>
                                                    <p class="inv_text ">15 Days</p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h5 class="textHead">Rating</h5>
                                                    <p class="inv_text ">4.5</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 class="textHead">Account Holder Name</h5>
                                                    <p class="inv_text ">Sethi Marbles & Hardware Pvt. Ltd.</p>
                                                </div>
                                            <!-- </div> 

                                            <div class="row"> -->
                                                <div class="col-sm-4">
                                                    <h5 class="textHead">Bank Name</h5>
                                                    <p class="inv_text ">State Bank Of India</p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h5 class="textHead">Account Number</h5>
                                                    <p class="inv_text ">35624512589</p>
                                                </div>
                                                
                                            <!-- </div> 

                                             <div class="row"> -->
                                                <div class="col-sm-4">
                                                    <h5 class="textHead">Branch Name</h5>
                                                    <p class="inv_text ">Palam Vihar</p>
                                                </div>

                                                <div class="col-sm-4">
                                                    <h5 class="textHead">IFSC Code</h5>
                                                    <p class="inv_text ">SBIN123428</p>
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
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="content-box-main">
                    <div class="box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="boxDetailsHeadings">
                                    <div class="headSec">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <h3 class="profile-username text-capitalize pull-left">Invoices</h3>
                                            </div>
                                            <div class="col-md-7 text-right">
                                                <button type="button" class="filter_btn all_invoices btn-small ">All [ 3 ]</button>
                                                <button type="button" class="complete_btn filter_btn btn-small">Completed [ 2 ]</button>
                                                <button type="button" class="pending_btn filter_btn btn-small">Pending [ 1 ]</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="listing_invoice_box" id="style-1">
                                            <div class="force-overflow">
                                                <div class="order_history_box">
                                                    <div class="job_desc_box_list">
                                                        <div class="title">
                                                            <h5>Invoice No. : 2241345</h5>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h5 class="textHead mar_bot">Invoice Generated Date : 02/9/2018</h5>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-sm-6 col-xs-6">
                                                                        <h5 class="textHead">Product Quantity</h5>
                                                                        <p class="inv_text ">50</p>
                                                                    </div>
                                                                    <div class="col-sm-6 col-xs-6 text-right">
                                                                        <h5 class="textHead">Price</h5>
                                                                        <p class="inv_text ">3500</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-sm-6 col-xs-6">
                                                                        <h5 class="textHead">Payment Status</h5>
                                                                        <p class="inv_text complete">Complete</p>
                                                                    </div>
                                                                    <div class="col-sm-6 col-xs-6 text-right">
                                                                        <h5 class="textHead">Payment Date</h5>
                                                                        <p class="inv_text ">10/9/2018</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr>

                                                        <div class="row">
                                                            <div class="col-sm-12 text-right">
                                                                <a href="#" class="hashtags asign_job_btn">View</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                    </div> 

                                    <div class="col-md-4">
                                        <div class="listing_invoice_box" id="style-1">
                                            <div class="force-overflow">
                                                <div class="order_history_box">
                                                    <div class="job_desc_box_list">
                                                        <div class="title">
                                                            <h5>Invoice No. : 2245725</h5>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h5 class="textHead mar_bot">Invoice Generated Date : 15/9/2018</h5>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-sm-6 col-xs-6">
                                                                        <h5 class="textHead">Product Quantity</h5>
                                                                        <p class="inv_text ">25</p>
                                                                    </div>
                                                                    <div class="col-sm-6 col-xs-6 text-right">
                                                                        <h5 class="textHead">Price</h5>
                                                                        <p class="inv_text ">4000</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-sm-6 col-xs-6">
                                                                        <h5 class="textHead">Payment Status</h5>
                                                                        <p class="inv_text pending">Pending</p>
                                                                    </div>
                                                                    <div class="col-sm-6 col-xs-6 text-right">
                                                                        <h5 class="textHead">Payment Date</h5>
                                                                        <p class="inv_text ">25/9/2018</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr>

                                                        <div class="row">
                                                            <div class="col-sm-12 text-right">
                                                                <a href="#" class="hashtags asign_job_btn">View</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                    </div> 


                                    <div class="col-md-4">
                                        <div class="listing_invoice_box" id="style-1">
                                            <div class="force-overflow">
                                                <div class="order_history_box">
                                                    <div class="job_desc_box_list">
                                                        <div class="title">
                                                            <h5>Invoice No. : 2245345</h5>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h5 class="textHead mar_bot">Invoice Generated Date : 02/9/2018</h5>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-sm-6 col-xs-6">
                                                                        <h5 class="textHead">Product Quantity</h5>
                                                                        <p class="inv_text ">20</p>
                                                                    </div>
                                                                    <div class="col-sm-6 col-xs-6 text-right">
                                                                        <h5 class="textHead">Price</h5>
                                                                        <p class="inv_text ">1500</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-sm-6 col-xs-6">
                                                                        <h5 class="textHead">Payment Status</h5>
                                                                        <p class="inv_text complete">Complete</p>
                                                                    </div>
                                                                    <div class="col-sm-6 col-xs-6 text-right">
                                                                        <h5 class="textHead">Payment Date</h5>
                                                                        <p class="inv_text ">12/9/2018</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr>

                                                        <div class="row">
                                                            <div class="col-sm-12 text-right">
                                                                <a href="#" class="hashtags asign_job_btn">View</a>
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
                    </div>
                </div>
            </div>
        </div> 

    </div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.vendor_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>