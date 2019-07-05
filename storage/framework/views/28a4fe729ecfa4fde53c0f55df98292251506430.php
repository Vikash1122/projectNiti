<?php $__env->startSection('content'); ?>
    <div class="content">
                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">Add New Vehicle</a> </li>
                </ul>

                <div class="page-title"> <i class="icon-custom-left"></i>
                    <h3>Add New Vehicle  <span class="semi-bold">&nbsp;</span></h3>
                </div>
                <?php if(Session::has('message')): ?> 
                    <div class="alert alert-info">
                        <?php echo e(Session::get('message')); ?> 
                    </div> 
                <?php endif; ?>
                <form method="POST" action="<?php echo e(route('vehicle.post')); ?>" enctype="multipart/form-data">   
                <?php echo e(csrf_field()); ?> 
                    <div class="row">
                        <div class="col-md-3">
                            <div class="content-box-main">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form_control_new">  
                                            <div class="label_head">Select Vehicle Type</div>
                                            <div class="radio_button_box">
                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <input type="radio" name="vehicle_type" value="4 Wheeler" checked="checked"  id="four_wheeler" class="input-hidden" />
                                                        <label for="four_wheeler">
                                                            <img 
                                                            src="<?php echo e(asset('public/img/car.png')); ?>" 
                                                            alt="4 Wheeler" class="img-responsive" />
                                                            <div class="label_head text-center"> 4 Wheeler </div>
                                                        </label>
                                                        
                                                    </div>
                                                    <div class="col-sm-6 col-xs-6">
                                                        <input type="radio" name="vehicle_type" value="2 Wheeler" id="two_wheeler" class="input-hidden" />
                                                        <label for="two_wheeler">
                                                            <img 
                                                            src="<?php echo e(asset('public/img/bike.png')); ?>" 
                                                            alt="2 Wheeler" class="img-responsive" />
                                                            <div class="label_head text-center"> 2 Wheeler </div>
                                                        </label>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group new_box_left form-md-line-input">
                                            <label for="reg_card_copy">Registration card</label>
                                            <div class="docMainBox">
                                                <img alt="" id="reg_card_copy" src="<?php echo e(asset('public/img/upload.png')); ?>" class="center-block userImg img-responsive">
                                                <div class="uploadProfile">
                                                    <div class="btn default btn-file btn-uploadnew">
                                                    <input type="file" name="registration_card" onChange="getpic('registration_card','reg_card_copy','dl_text',event),OpenFile('registration_card')" class="form-control imgPrv" id="registration_card">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="content-box-main">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Vehicle Manufacturer</div>
                                            <div class="input-group"> 
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                                                <input class="form-control" name="manufacturer" id="manufacturer" placeholder="Vehicle Manufacturer"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Vehicle Number</div>
                                            <div class="input-group"> 
                                                <span class="input-group-addon"><i class="fa fa-sort-numeric-desc"></i></span> 
                                                <input class="form-control" name="vehicle_no" id="vehicle_no" placeholder="Vehicle Number"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Vehicle Modal Number</div>
                                            <div class="input-group"> 
                                                <span class="input-group-addon"><i class="fa fa-sort-numeric-desc"></i></span> 
                                                <input class="form-control" name="modal_no" id="modal_no" placeholder="Vehicle Modal Number"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form_control_new date_picker">  
                                            <div class="label_head">Manufacturing Year</div>
                                            <div class="input-append success date input-group"> 
                                                <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
                                                <input class="form-control" name="manufacturing_year" id="manufacturing_year" placeholder="Manufacturing Year">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Vehicle Partner</div>
                                            <select name="vehicle_partner" id="vehicle_partner">
                                                <option value="">Select Vehicle Partner</option>
                                                <option value="Partner 1">Partner 1</option>
                                                <option value="Partner 2">Partner 2</option>
                                                <option value="Partner 3">Partner 3</option>
                                                <option value="Partner 4">Partner 4</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Vehicle Owner Name</div>
                                            <div class="input-group"> 
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                                                <input class="form-control" name="owner_name" id="owner_name" placeholder="Vehicle Owner Name"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Vehicle Color</div>
                                            <div class="input-group"> 
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                                                <input class="form-control" name="vehilce_color" id="vehilce_color" placeholder="Vehicle Color"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form_control_new">  
                                            <div class="label_head">Registration number</div>
                                            <div class="input-group"> 
                                                <span class="input-group-addon"><i class="fa fa-sort-numeric-desc"></i></span> 
                                                <input class="form-control" name="registration_number" id="registration_number" placeholder="Registration number"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_control_new date_picker">  
                                            <div class="label_head">Registration expiration</div>
                                            <div class="input-append success date input-group"> 
                                                <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
                                                <input class="form-control" name="registration_expiration" id="registration_expiration" placeholder="Registration expiration">
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                <hr />

                                <div class="row">
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-danger">Reset</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                
            </div>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.emp_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>