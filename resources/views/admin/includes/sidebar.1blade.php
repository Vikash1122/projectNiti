<div class="page-sidebar " id="main-menu">
    <!-- <div class="scroll-wrapper page-sidebar-wrapper scrollbar-dynamic" style="position: relative;"> -->
        <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper" >
            
            <div class="user-info-wrapper sm">
                <div class="profile-wrapper sm">
                    <img src="{{ asset('public/img/profiles/avatar.jpg')}}" alt="" data-src="{{ asset('public/img/profiles/avatar.jpg') }}" data-src-retina="{{ asset('public/img/profiles/avatar2x.jpg') }}" width="69" height="69">
                    <div class="availability-bubble online"></div>
                </div>
                <div class="user-info sm">
                    <div class="username">{{ ucwords(Auth::user()->firstname) }} <span class="semi-bold">User</span></div>
                    <div class="status">Life goes on...</div>
                </div>
            </div>

            <p class="menu-title sm">Refresh <span class="pull-right">
                <a href="javascript:;" id="refreshbutton"><i class="material-icons">refresh</i></a></span>
            </p>
        
            <ul>
            <?php //print_r(Auth::user()->hasRole('admin'));die();?>
            @if (Auth::check() && Auth::user()->hasRole('surveyor') ) 
                <li> 
                    <a href="{{ route('admin.dashboard') }}" title="Home"><i class="material-icons">home</i>     
                    <span class="title">Dashboard</span> <span class="selected"></span> </a>
                </li>
                <li>
                    <a href="javascript:;"> <i class="material-icons">invert_colors</i> <span class="title">Survey Management</span> <span class=" arrow"></span> </a>
                    <ul class="sub-menu">
                        <li> <a href="{{ route('admin.surveyers') }}" title="Requested Survey">Requested Survey</a> </li>
                        <li> <a href="{{ route('surveyers.scheduleSurveyers') }}" title="Schedule Survey">Schedule Survey</a> </li>
                        <li> <a href="{{ route('surveys.all') }}" title="All Survey">All Survey</a> </li>
                    </ul>
                </li>
            @elseif (Auth::check() && Auth::user()->hasRole('team') )
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
            @elseif (Auth::check() && Auth::user()->hasRole('admin') ) 
                
                <li> 
                    <a href="{{ route('admin.dashboard') }}" title="Home"><i class="material-icons">home</i>     
                    <span class="title">Dashboard</span> <span class="selected"></span> </a>
                </li>
                <li>
                    <a href="javascript:;"> <i class="material-icons">airplay</i> <span class="title">Master Pages</span> <span class=" arrow"></span> </a>
                    <ul class="sub-menu">
                        <li> <a href="{{ route('admin.services') }}">Services</a> </li>
                        <!-- <li> <a href="sub_services.php">Sub Services</a> </li> -->
                        <li> <a href="{{ route('admin.slots')}}">Slot Management</a> </li> 
                        <!-- <li> <a href="calender.php">Calender</a> </li> -->
                        <li> <a href="{{ route('admin.brands') }}" title="Brands">Brands</a> </li>
                        <li> <a href="{{ route('admin.categories') }}" title="Categories">Categories</a> </li>
                        <li> <a href="{{ route('admin.banners') }}" title="Brands">Banners</a> </li>
                        <li> <a href="{{ route('admin.other') }}" title="Other Charges">Other Charges</a> </li>
                   </ul>
                </li>

                <li>
                    <a href="javascript:;"> <i class="material-icons">invert_colors</i> <span class="title">Contract Management</span> <span class=" arrow"></span> </a>
                    <ul class="sub-menu">
                        <li> <a href="{{ route('contracts.fp') }}" title="Contracts">Contracts</a> </li>
                        <li> <a href="{{ route('contracts.category') }}" title="Contract Categories">Contract Categories</a> </li>
                        <li> <a href="{{ route('admin.contracts') }}" title="All Contracts">All Contracts</a> </li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript:;"> <i class="material-icons">invert_colors</i> <span class="title">Survey Management</span> <span class=" arrow"></span> </a>
                    <ul class="sub-menu">
                        <li> <a href="{{ route('admin.surveyers') }}" title="Requested Survey">Requested Survey</a> </li>
                        <li> <a href="{{ route('surveyers.scheduleSurveyers') }}" title="Schedule Survey">Schedule Survey</a> </li>
                        <li> <a href="{{ route('surveys.all') }}" title="All Survey">All Survey</a> </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"> <i class="material-icons">invert_colors</i> <span class="title">Order Management</span> <span class=" arrow"></span> </a>
                    <ul class="sub-menu">
                        <li> <a href="{{ route('groups.form') }}" title="Create Group">Create Group</a> </li>
                        <li> <a href="{{ route('admin.groups') }}" title="Group List">Group List</a> </li>
                        <li> <a href="{{ route('orders.approved') }}" title="Approved Orders">Approved Orders</a> </li>
                        <li> <a href="{{ route('orders.alloted') }}" title="Alloted Orders">Alloted Orders</a> </li>
                        <li> <a href="{{ route('admin.orders') }}" title="All Orders">All Orders</a> </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:;"> <i class="material-icons">invert_colors</i> <span class="title">Vendor Management</span> <span class=" arrow"></span> </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('vendors.form') }}" title="Vendor Registration"> Vendor Registration </a> </li>
                        <li><a href="{{ route('admin.vendors') }}" title="Vendor List">Vendor List</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;"> <i class="material-icons">invert_colors</i> <span class="title">Employee</span> <span class=" arrow"></span> </a>
                    <ul class="sub-menu">
                        <li> <a href="{{ route('admin.employee') }}" title="Employee List ">Employee List </a> </li>
                        <li> <a href="{{ route('employee.form') }}" title="Add New Employee">Add New Employee</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;"> <i class="material-icons">airplay</i> <span class="title">Vehicle Management</span> <span class=" arrow"></span> </a>
                    <ul class="sub-menu">
                        <li> <a href="{{ route('admin.vehiclelist') }}" title="Vehicle List"> Vehicle List </a> </li>
                        <li> <a href="{{ route('vehicle.form') }}" title="Add New Vehicle">Add New Vehicle </a> </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;"> <i class="material-icons">airplay</i> <span class="title">User Management</span> <span class=" arrow"></span> </a>
                    <ul class="sub-menu">
                        <li> <a href="{{ route('admin.users') }}" title="Users List"> Users List </a> </li>
                    
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"> <i class="material-icons">airplay</i> <span class="title">Team Management</span> <span class=" arrow"></span> </a>
                    <ul class="sub-menu">
                        <li> <a href="{{ url('admin/teams') }}" title="Team List"> Team List </a> </li>
                        <!-- <li> <a href="{{ url('admin/roles') }}" title="Roles"> Roles</a> </li>
                        <li> <a href="{{ url('admin/permissions') }}" title="Permissions">Permissions</a> </li>
                        <li> <a href="{{ url('admin/pages') }}" title="Pages">Pages</a> </li>
                        <li> <a href="{{ url('admin/activitylogs') }}" title="Activity Logs">Activity Logs</a> </li>
                        <li> <a href="{{ url('admin/settings') }}" title="Settings">Settings</a> </li>
                        <li> <a href="{{ url('admin/generator') }}" title="Generator">Generator</a> </li> -->
                    </ul>
                </li>


                <li>
                    <a href="javascript:;"> <i class="material-icons">airplay</i> <span class="title">Enquiry Management</span> <span class=" arrow"></span> </a>
                    <ul class="sub-menu">
                        <li> <a href="{{ route('admin.quries') }}" title="Users List"> Enquiry List </a> </li>
                    
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"> <i class="material-icons">flip</i><span class="title"> Inventory</span> <span class=" arrow"></span> </a>
                    <ul class="sub-menu">
                    <!-- <li> <a href="vendors.php" title="Vendors"> Vendors  </a> </li>
                        <li> <a href="add_vendors.php" title="Add Vendors">Add Vendors  </a> </li>-->
                        <li> <a href="{{ route('admin.products') }}" title="Products"> Products</a> </li>
                        <li> <a href="{{ route('products.add') }}" title="Add Products"> Add Products</a> </li>
                        <li> <a href="{{ route('product.issue') }}" title="Issue Products">Issue Products</a> </li>
                        <li> <a href="#" title="Products Issue">Issue Products</a> </li>
                    </ul>
                </li>
                @endif
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
                                
                                <li class="folder-input" style="display:none">
                                    <input type="text" placeholder="Name of folder" class="no-boarder folder-name" name="" id="folder-name">
                                </li>
                            </ul>
                            
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="side-bar-widgets">
                <p class="menu-title sm">Reports <span class="pull-right">
                    <a href="#" class="create-folder"> <i class="material-icons">add</i></a>
                    </span>
                </p>
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
                    
                    
                    <li class="folder-input" style="display:none">
                        <a href="#">
                            <input type="text" placeholder="Name of folder" class="no-boarder folder-name" name="">
                        </a>
                    </li>
                
                </ul>
            </div>

        </div>

        <a href="#" class="scrollup">Scroll</a>
        
        <div class="footer-widget">
            <div class="progress transparent progress-small no-radius no-margin">
                <div class="progress-bar progress-bar-success animate-progress-bar" data-percentage="79%" style="width: 79%;"></div>
            </div>
            <div class="pull-right">
                <div class="details-status"> <span class="animate-number" data-value="86" data-animation-duration="560">86</span>% </div>
                <a href="#"><i class="material-icons">power_settings_new</i></a>
            </div>
        </div>
    </div>

    <!-- <div class="scroll-element scroll-x scroll-scrolly_visible">
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
</a> -->
<!-- </div> -->
