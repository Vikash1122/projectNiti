
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
                    <div class="status">Nitty Gritty Admin</div>
                </div>
            </div>

            <p class="menu-title sm">Refresh <span class="pull-right">
                <a href="javascript:;" id="refreshbutton"><i class="material-icons">refresh</i></a></span>
            </p>
        
            <ul>
            <?php 
          // prd(hasPermissionThroughRole('access_manage_services'));
            ?>
            @if (Auth::check()) 
                
                @if(hasPermissionThroughRole('dashboard_access'))
                    <li> 
                        <a href="{{ route('admin.dashboard') }}" title="Home"><i class="material-icons">home</i>     
                        <span class="title">Dashboard</span> <span class="selected"></span> </a>
                    </li>
                @endif
                <?php //print_r($name);?>
                @if(hasPermissionThroughRole('master_access'))
                    <li>
                        <a href="javascript:;"> <i class="material-icons">airplay</i> <span class="title">Master Pages</span> <span class=" arrow"></span> </a>
                        <ul class="sub-menu">
                        
                        @if(hasPermissionThroughRole('access_manage_services'))
                            <li> <a href="{{ route('admin.services') }}">Services</a> </li>
                        @endif
                        @if(hasPermissionThroughRole('access_slot_management'))
                            <!-- <li> <a href="sub_services.php">Sub Services</a> </li> -->
                            <li> <a href="{{ route('admin.slots')}}">Slot Management</a> </li> 
                        @endif
                        <li> <a href="{{ route('admin.margin') }}" title="Inventory Margin">Inventory Margin</a> </li>
                        @if(hasPermissionThroughRole('access_brands'))
                            <!-- <li> <a href="calender.php">Calender</a> </li> -->
                            <li> <a href="{{ route('admin.brands') }}" title="Brands">Brands</a> </li>
                        @endif

                        @if(hasPermissionThroughRole('access_categories'))
                            <li> <a href="{{ route('admin.categories') }}" title="Categories">Categories</a> </li>
                        @endif
                        @if(hasPermissionThroughRole('access_banners'))
                            <li> <a href="{{ route('admin.banners') }}" title="Brands">Banners</a> </li>
                        @endif
                        @if(hasPermissionThroughRole('access_other_charges'))
                            <li> <a href="{{ route('admin.other') }}" title="Other Charges">Other Charges</a> </li>
                        @endif
                        </ul>
                    </li>
                @endif
                @if(hasPermissionThroughRole('contract_management_access'))
                    <li>
                        <a href="javascript:;"> <i class="material-icons">invert_colors</i> <span class="title">Package Management</span> <span class=" arrow"></span> </a>
                        <ul class="sub-menu">
                        @if(hasPermissionThroughRole('list_contracts'))
                            <li> <a href="{{ route('contracts.all') }}" title="Packages">Packages</a> </li>
                        @endif
                        @if(hasPermissionThroughRole('list_contract_category'))
                            <li> <a href="{{ route('contracts.allcategory') }}" title="Package Categories">Package Categories</a> </li>
                        @endif
                        @if(hasPermissionThroughRole('view_all_contrats'))
                            <li> <a href="{{ route('admin.contracts') }}" title="All Packages">All Packages</a> </li>
                        @endif
                        </ul>
                    </li>
                @endif
                @if(hasPermissionThroughRole('survey_access'))
                    <!-- <li>
                        <a href="javascript:;"> <i class="material-icons">invert_colors</i> <span class="title">Survey Management</span> <span class=" arrow"></span> </a>
                        <ul class="sub-menu">
                            <li> <a href="{{ route('admin.surveyers') }}" title="Requested Survey">Requested Survey</a> </li>
                            <li> <a href="{{ route('surveyers.scheduleSurveyers') }}" title="Schedule Survey">Schedule Survey</a> </li>
                            <li> <a href="{{ route('surveys.all') }}" title="All Survey">All Survey</a> </li>
                        </ul>
                    </li> -->
                @endif
                @if(hasPermissionThroughRole('order_managaement_access'))
                    <li>
                        <a href="javascript:;"> <i class="material-icons">invert_colors</i> <span class="title">Order Management</span> <span class=" arrow"></span> </a>
                        <ul class="sub-menu">
                        @if(hasPermissionThroughRole('approved_orders'))
                            <li> <a href="{{ route('orders.approved') }}" title="Approved Orders">Allotment</a> </li>
                        @endif
                        @if(hasPermissionThroughRole('alloted_orders'))
                            <li> <a href="{{ route('orders.alloted') }}" title="Alloted Orders">Alloted Orders</a> </li>
                        @endif
                        @if(hasPermissionThroughRole('all_orders'))
                            <li> <a href="{{ route('admin.orders') }}" title="All Orders">All Orders</a> </li>
                        @endif
                        @if(hasPermissionThroughRole('create_groups'))
                            <li> <a href="{{ route('groups.form') }}" title="Create Team">Create Team</a> </li>
                        @endif
                        @if(hasPermissionThroughRole('view_groups'))
                            <li> <a href="{{ route('admin.groups') }}" title="Teams">Teams</a> </li>
                        @endif
                        </ul>
                    </li>
                @endif
                @if (Auth::check() && Auth::user()->hasRole('admin') )
                    <li>
                        <a href="javascript:;"> <i class="material-icons">invert_colors</i> <span class="title">Invoice</span> <span class=" arrow"></span> </a>
                        <ul class="sub-menu">
                        
                            <li> <a href="{{ route('admin.invoice') }}" title="Complete Jobs">Complete Jobs</a> </li>
                       
                        </ul>
                    </li>
                @endif
                @if(hasPermissionThroughRole('vendor_management_access'))
                    <li>
                        <a href="javascript:;"> <i class="material-icons">invert_colors</i> <span class="title">Vendor Management</span> <span class=" arrow"></span> </a>
                        <ul class="sub-menu">
                        @if(hasPermissionThroughRole('vendor_registration'))
                            <li><a href="{{ route('vendors.form') }}" title="Vendor Registration"> Vendor Registration </a> </li>
                        @endif
                        @if(hasPermissionThroughRole('vendor_list'))
                            <li><a href="{{ route('admin.vendors') }}" title="Vendor List">Vendor List</a> </li>
                        @endif
                        </ul>
                    </li>
                @endif
                @if(hasPermissionThroughRole('employee_access'))
                    <li>
                        <a href="javascript:;"> <i class="material-icons">invert_colors</i> <span class="title">Employee</span> <span class=" arrow"></span> </a>
                        <ul class="sub-menu">
                        @if(hasPermissionThroughRole('employee_list'))
                            <li> <a href="{{ route('admin.employee') }}" title="Employee List ">Employee List </a> </li>
                        @endif
                        @if(hasPermissionThroughRole('add_employee'))
                            <li> <a href="{{ route('employee.form') }}" title="Add New Employee">Add New Employee</a> </li>
                        @endif
                        </ul>
                    </li>
                @endif
                @if(hasPermissionThroughRole('vehicle_management_access'))
                    <li>
                        <a href="javascript:;"> <i class="material-icons">airplay</i> <span class="title">Vehicle Management</span> <span class=" arrow"></span> </a>
                        <ul class="sub-menu">
                        @if(hasPermissionThroughRole('vehicle_list'))
                            <li> <a href="{{ route('admin.vehiclelist') }}" title="Vehicle List"> Vehicle List </a> </li>
                        @endif
                        @if(hasPermissionThroughRole('add_vehicle'))
                            <li> <a href="{{ route('vehicle.form') }}" title="Add New Vehicle">Add New Vehicle </a> </li>
                        @endif
                        </ul>
                    </li>
                @endif
                @if(hasPermissionThroughRole('users_access'))
                    <li>
                        <a href="javascript:;"> <i class="material-icons">airplay</i> <span class="title">Customer Management</span> <span class=" arrow"></span> </a>
                        <ul class="sub-menu">
                            <li> <a href="{{ route('admin.users') }}" title="Customers List"> Customers List </a> </li>
                        </ul>
                    </li>
                @endif
                @if(hasPermissionThroughRole('privilege_management_access'))
                    <li>
                        <a href="javascript:;"> <i class="material-icons">airplay</i> <span class="title">User Management</span> <span class=" arrow"></span> </a>
                        <ul class="sub-menu">
                        @if(hasPermissionThroughRole('view_privileges'))
                            <li> <a href="{{ url('admin/privileges') }}" title="Users List"> Users List</a> </li>
                        @endif
                        @if(hasPermissionThroughRole('access_list_admins'))
                            <li> <a href="{{ url('admin/teams') }}" title="Privileges"> Privileges </a> </li>
                        @endif
                        @if(hasPermissionThroughRole('list_permissions'))
                            <!-- <li> <a href="{{ url('admin/permissions') }}" title="Permissions">Permissions</a> </li> -->
                        @endif
                        <!-- <li> <a href="{{ url('admin/pages') }}" title="Pages">Pages</a> </li>
                            <li> <a href="{{ url('admin/activitylogs') }}" title="Activity Logs">Activity Logs</a> </li>
                            <li> <a href="{{ url('admin/settings') }}" title="Settings">Settings</a> </li>
                            <li> <a href="{{ url('admin/generator') }}" title="Generator">Generator</a> </li> -->
                        </ul>
                    </li>
                @endif
                @if(hasPermissionThroughRole('enquiry_management_access'))

                    <li>
                        <a href="javascript:;"> <i class="material-icons">airplay</i> <span class="title">Enquiry Management</span> <span class=" arrow"></span> </a>
                        <ul class="sub-menu">
                            <li> <a href="{{ route('admin.quries') }}" title="Users List"> Enquiry List </a> </li>
                        
                        </ul>
                    </li>
                @endif
                @if(hasPermissionThroughRole('inventory_access'))
                    <li>
                        <a href="javascript:;"> <i class="material-icons">flip</i><span class="title"> Inventory</span> <span class=" arrow"></span> </a>
                        <ul class="sub-menu">
                        <!-- <li> <a href="vendors.php" title="Vendors"> Vendors  </a> </li>
                            <li> <a href="add_vendors.php" title="Add Vendors">Add Vendors  </a> </li>-->
                        @if(hasPermissionThroughRole('view_products'))
                            <li> <a href="{{ route('admin.products') }}" title="Products"> Products</a> </li>
                        @endif
                        @if(hasPermissionThroughRole('add_products'))
                            <li> <a href="{{ route('products.add') }}" title="Add Products"> Add Products</a> </li>
                        @endif
                        @if(hasPermissionThroughRole('issue_products'))
                            <li> <a href="{{ route('product.issue') }}" title="Issue Products">Issue Products</a> </li>
                        @endif
                        </ul>
                    </li>
                @endif
                
                @if(hasPermissionThroughRole('access_new_job_request'))
                    <li>
                        <a href="javascript:;"> <i class="material-icons">invert_colors</i> <span class="title">New Job Request</span> <span class=" arrow"></span> </a>
                        <ul class="sub-menu">
                        @if(hasPermissionThroughRole('list_new_jobs'))
                            <li> <a href="{{ route('new.jobs') }}" title="New Job Request List">New Job Request List</a> </li>
                        @endif
                            <!-- <li> <a href="{{ route('jobs.inNegotitation') }}" title="In Negotiation Jobs">In Negotiation Jobs</a> </li> -->
                        </ul>
                    </li>
                @endif
                @if(hasPermissionThroughRole('access_team_inventory'))
                    <li>
                        <a href="javascript:;"> <i class="material-icons">flip</i><span class="title"> Inventory</span> <span class=" arrow"></span> </a>
                        <ul class="sub-menu">
                        @if(hasPermissionThroughRole('list_jobs'))
                            <li> <a href="{{ route('product.issue') }}" title="Jobs">Jobs</a> </li>
                        @endif
                            <!-- <li> <a href="#" title="Products Issue">Issue Products</a> </li> -->
                        </ul>
                    </li>
                @endif
            @endif
                <!-- <li class="hidden-lg hidden-md hidden-xs" id="more-widgets">
                    <a href="javascript:;"> <i class="material-icons"></i></a>
                    <ul class="sub-menu">
                        <li class="side-bar-widgets">
                            <p class="menu-title sm">Reports <span class="pull-right"><a href="#" class="create-folder"><i class="material-icons">add</i></a></span></p>
                            <ul class="folders">
                                <li>
                                    <a href="{{ route('admin.invoice') }}" title="Invoice">
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
                </li> -->
            </ul>

            <!-- <div class="side-bar-widgets">
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
            </div> -->

        </div>

        <a href="#" class="scrollup">Scroll</a>
        
        <div class="footer-widget">
            <div class="progress transparent progress-small no-radius no-margin">
                <div class="progress-bar progress-bar-success animate-progress-bar" data-percentage="79%" style="width: 79%;"></div>
            </div>
            <div class="pull-right">
                <div class="details-status"> <span class="animate-number" data-value="86" data-animation-duration="560">86</span>% </div>
                
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="material-icons">power_settings_new</i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                </form>
                
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

