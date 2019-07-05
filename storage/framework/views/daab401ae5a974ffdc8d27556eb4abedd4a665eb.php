<div class="page-sidebar " id="main-menu">
    <div class="scroll-wrapper page-sidebar-wrapper scrollbar-dynamic" style="position: relative;"><div class="page-sidebar-wrapper scrollbar-dynamic scroll-content scroll-scrolly_visible" id="main-menu-wrapper" style="margin-bottom: -15px; margin-right: -15px; height: 329px;">
        <div class="user-info-wrapper sm">
            <div class="profile-wrapper sm">
                <img src="<?php echo e(asset('public/img/profiles/avatar.jpg')); ?>" alt="" data-src="<?php echo e(asset('public/img/profiles/avatar.jpg')); ?>" data-src-retina="<?php echo e(asset('public/img/profiles/avatar2x.jpg')); ?>" width="69" height="69">
                <div class="availability-bubble online"></div>
            </div>
            <div class="user-info sm">
                <div class="username">Admin <span class="semi-bold">User</span></div>
                <div class="status">Life goes on...</div>
            </div>
        </div>

        <p class="menu-title sm">BROWSE <span class="pull-right">
            <a href="javascript:;"><i class="material-icons">refresh</i></a></span>
        </p>
        
        <ul>
            <li> 
                <a href="<?php echo e(route('admin.dashboard')); ?>" title="Home"><i class="material-icons">home</i>     
                <span class="title">Dashboard</span> <span class="selected"></span> </a>
            </li>

            <li>
                <a href="javascript:;"> <i class="material-icons">airplay</i> <span class="title">Master Pages</span> <span class=" arrow"></span> </a>
                <ul class="sub-menu">
                    <li> <a href="<?php echo e(route('admin.services')); ?>">Services</a> </li>
                    <!-- <li> <a href="sub_services.php">Sub Services</a> </li> -->
                    <li> <a href="<?php echo e(route('admin.slots')); ?>">Slot Management</a> </li> 
                    <!-- <li> <a href="calender.php">Calender</a> </li> -->
                    <li> <a href="<?php echo e(route('admin.brands')); ?>" title="Brands">Brands</a> </li>
                    <li> <a href="<?php echo e(route('admin.other')); ?>" title="Other Charges">Other Charges</a> </li>
                    <li> <a href="<?php echo e(route('admin.packages')); ?>" title="Package Management">Package Management</a> </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;"> <i class="material-icons">invert_colors</i> <span class="title">Survey Management</span> <span class=" arrow"></span> </a>
                <ul class="sub-menu">
                    <li> <a href="#" title="Requested Survey">Requested Survey</a> </li>
                    <li> <a href="#" title="Schedule Survey">Schedule Survey</a> </li>
                    <li> <a href="#" title="All Survey">All Survey</a> </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;"> <i class="material-icons">invert_colors</i> <span class="title">Order Management</span> <span class=" arrow"></span> </a>
                <ul class="sub-menu">
                    <li> <a href="<?php echo e(route('groups.form')); ?>" title="Create Group">Create Group</a> </li>
                    <li> <a href="<?php echo e(route('admin.groups')); ?>" title="Group List">Group List</a> </li>
                    <li> <a href="#" title="Approved Orders">Approved Orders</a> </li>
                    <li> <a href="#" title="Alloted Orders">Alloted Orders</a> </li>
                    <li> <a href="#" title="All Orders">All Orders</a> </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;"> <i class="material-icons">invert_colors</i> <span class="title">Vendor Management</span> <span class=" arrow"></span> </a>
                <ul class="sub-menu">
                    <li><a href="#" title="Vendor Registration"> Vendor Registration </a> </li>
                    <li><a href="#" title="Vendor List">Vendor List</a> </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;"> <i class="material-icons">invert_colors</i> <span class="title">Employee</span> <span class=" arrow"></span> </a>
                <ul class="sub-menu">
                    <li> <a href="<?php echo e(route('admin.employee')); ?>" title="Employee List ">Employee List </a> </li>
                    <li> <a href="<?php echo e(route('employee.form')); ?>" title="Add New Employee">Add New Employee</a> </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;"> <i class="material-icons">airplay</i> <span class="title">Vehicle Management</span> <span class=" arrow"></span> </a>
                <ul class="sub-menu">
                    <li> <a href="<?php echo e(route('admin.vehiclelist')); ?>" title="Vehicle List"> Vehicle List </a> </li>
                    <li> <a href="<?php echo e(route('vehicle.form')); ?>" title="Add New Vehicle">Add New Vehicle </a> </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;"> <i class="material-icons">flip</i><span class="title"> Inventory</span> <span class=" arrow"></span> </a>
                <ul class="sub-menu">
                   <!-- <li> <a href="vendors.php" title="Vendors"> Vendors  </a> </li>
                    <li> <a href="add_vendors.php" title="Add Vendors">Add Vendors  </a> </li>-->
                    <li> <a href="#" title="Products"> Products</a> </li>
                    <li> <a href="#" title="Add Products"> Add Products</a> </li>
                    <li> <a href="#" title="Handover Products">Handover Products</a> </li>
                    <li> <a href="#" title="Products Issue">Issue Products</a> </li>
                </ul>
            </li>

            <li class="hidden-lg hidden-md hidden-xs" id="more-widgets">
                <a href="javascript:;"> <i class="material-icons"></i></a>
                <ul class="sub-menu">
                    <li class="side-bar-widgets">
                        <p class="menu-title sm">Reports <span class="pull-right"><a href="#" class="create-folder"><i class="material-icons">add</i></a></span></p>
                        <ul class="folders">
                            <li>
                                <a href="#" title="Invoice">
                                    <div class="status-icon green"></div>
                                    Invoice 
                                </a>
                            </li>
                            <li>
                                <a href="#" title="Inventory Stock">
                                    <div class="status-icon red"></div>
                                    Inventory Stock 
                                </a>
                            </li>
                            <!-- <li>
                                <a href="#">
                                    <div class="status-icon blue"></div>
                                    Projects 
                                </a>
                            </li> -->
                            <li class="folder-input" style="display:none">
                                <input type="text" placeholder="Name of folder" class="no-boarder folder-name" name="" id="folder-name">
                            </li>
                        </ul>
                        
                    </li>
                </ul>
            </li>
        </ul>

        <div class="side-bar-widgets">
            <p class="menu-title sm">Reports <span class="pull-right"><a href="#" class="create-folder"> <i class="material-icons">add</i></a></span></p>
            <ul class="folders">
                <li>
                <a href="#">
                <div class="status-icon green"></div>
                Invoice </a>
                </li>
                <li>
                <a href="#">
                <div class="status-icon red"></div>
                Inventory Stock </a>
                </li>
                <li>
                <a href="#">
                <!-- <div class="status-icon blue"></div>
                Projects </a>
                </li> -->
                </a></li><li class="folder-input" style="display:none"><a href="#">
                <input type="text" placeholder="Name of folder" class="no-boarder folder-name" name="">
                </a></li><a href="#">
            </a></ul><a href="#">

        </a></div><a href="#">

        <div class="clearfix"></div>
    </a></div>
    <div class="scroll-element scroll-x scroll-scrolly_visible">
    <div class="scroll-element_outer">    
    <div class="scroll-element_size"></div>
        <div class="scroll-element_track"></div>
            <div class="scroll-bar" style="width: 89px;"></div>
            </div>
            </div>
            
            <div class="scroll-element scroll-y scroll-scrolly_visible">
            <div class="scroll-element_outer">    
            <div class="scroll-element_size"></div>
                <div class="scroll-element_track"></div>    
                <div class="scroll-bar" style="height: 158px; top: 0px;"></div>
                </div>
                </div>
                </div>
                <a href="#">
</a>
</div>