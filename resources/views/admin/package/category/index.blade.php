@extends('admin.layouts.main-layout')

@section('content')

    <link href="{{ asset('public/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/plugins/bootstrap-select2/select2.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <!-- <link href="{{ asset('public/plugins/jquery-datatable/css/jquery.dataTables.css') }}" rel="stylesheet" type="text/css" /> -->
    <link href="{{ asset('public/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" />
    
    <style>
       
        table.table thead .sorting_asc{
            background:none !important;
        }
        .list_of_sub_services .edit_btn {
            background: #2f9247;
            border: 2px solid #2f9247;
            color: #fff;
        }
        .list_of_sub_services .delete_btn {
            background: #F44336;
            border: 2px solid #F44336;
            color: #fff;
        }
        .list_of_sub_services .delete_btn a, .list_of_sub_services .delete_btn a:hover{
            color:#ffffff;
        }
        .table-condensed>thead>tr>th{
            color: #4D4D4D;
            font-family: 'Nexa Bold';
            font-size:15px;
            text-transform: capitalize;
        }

        .page-title {
            width: 100%;
            float: left;
        }

        .page-title h3 {
            float: left;
            width: auto;
            font-size: 20px;
            font-family: 'Nexa Bold';
            color: rgba(69, 69, 69, 0.57);
            letter-spacing: .9px;
        }
        .page-title .sub_pages {
            width: auto;
            float: left;
        }
        .page-title i {
            padding-left: 15px;
            top: 9px;
        }
        
        .page-title .sub_pages h3 {
            color: #454545;
        }
        .list_of_sub_services .DTTT {
            display: none !important;
        }
        .list_of_sub_services .select2-container .select2-choice .select2-arrow {
            background: transparent;
            border-left: none;
        }
        .list_of_sub_services .select2-container .select2-choice .select2-arrow b:before {
            content: "" !important;
        }
       

        .new_btn_add_service{
            width: auto;
            display: inline-block;
            background: #2f9348;
            color: #ffffff;
            float: right;
            padding: 8px;
            font-family: 'Nexa Bold';
            font-size: 16px;
            font-weight: 100 !important;
            letter-spacing: 1.5px;
        }
        .new_btn_add_service:hover, .new_btn_add_service i:hover{
            color:#ffffff !important;
        }
        .new_btn_add_service i{
            color: #ffffff !important;
            top: 4px !important;
            font-size: 16px;
            margin-right: 8px;
        }
    </style>

    <div class="content">
        <div class="page-title"> 
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ url()->previous() }}" class="previousBtn">
                        <img src="{{asset('public/img/go_back.png')}}" class="img-responsive">
                    </a>

                    <h3> Package Categories </h3>                   
                    @if(hasPermissionThroughRole('access_contact_categories'))
                        <a href="{{ route('contracts.category') }}" class="new_btn_add_service"><i class="fa fa-plus"></i> Add Package Category </a>
                    @endif
                    
                    <div class="serchBarDiv">
                        <div class="searchContainer">
                            <input class="searchBox" type="search" id="search" name="search" placeholder="Search">
                            <i class="fa fa-search searchIcon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        @if(Session::has('message')) 
            <div class="alert alert-info">
                {{Session::get('message')}} 
            </div> 
        @endif

        @if(isset($categories[0]) && !empty($categories[0]))

            <div class="row">
                <div class="col-md-12">
                    <div class="content-box-main-ng">
                        <div class="table-responsive tableDiv_ng">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Package Name</th>
                                        <th>Package Category Title</th>
                                        @if(hasPermissionThroughRole('edit_contract_category') || hasPermissionThroughRole('delete_contract_category'))
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php   $i = 1; ?>
                                        @foreach($categories as $cat)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $cat->package_type }}</td>
                                        <td>{{ $cat->title}}</td>
                                        
                                        @if(hasPermissionThroughRole('edit_contract_category') || hasPermissionThroughRole('delete_contract_category'))
                                        <td>
                                        @if(hasPermissionThroughRole('edit_contract_category'))
                                        <button type="button" title="Edit Packages" class="edit_btn tableEditBtn">
                                            <a href="{{ url('admin/contracts/editContractCategory/'.$cat->id) }}" style="color:#ffffff;">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </button>
                                        @endif
                                        @if(hasPermissionThroughRole('delete_contract_category'))
                                        <button type="button" class="delete_btn tableDeleteBtn" title="Delete Packages">
                                            <a href="{{ url('admin/contracts/delete',$cat->id)}}" data-id="{{ $cat->id }}" onclick="return confirm('Are you sure you want to delete this record?');" style="color:#ffffff;">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </button>
                                        @endif
                                        </td>
                                        @endif
                                    </tr>

                                    <?php  $i++; ?>
                                    @endforeach
                                </tbody>
                            <table>  
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="content-box-main">
                        <div class="row-fluid list_of_sub_services">
                            <div class="span12">
                                <div class="grid simple ">
                                    <div class="grid-body" style="background:transparent;padding:0px;border:none;">
                                        <div class="row">
                                            <div class="col-md-12 table-responsive">
                                                <table class="table table-condensed" id="example">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Package Name</th>
                                                            <th>Package Category Title</th>
                                                            @if(hasPermissionThroughRole('edit_contract_category') || hasPermissionThroughRole('delete_contract_category'))
                                                            <th>Action</th>
                                                            @endif
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php   $i = 1; ?>
                                                            @foreach($categories as $cat)
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $cat->package_type }}</td>
                                                            <td>{{ $cat->title}}</td>
                                                            
                                                            @if(hasPermissionThroughRole('edit_contract_category') || hasPermissionThroughRole('delete_contract_category'))
                                                            <td>
                                                            @if(hasPermissionThroughRole('edit_contract_category'))
                                                            <button type="button" title="Edit Packages" class="edit_btn">
                                                                <a href="{{ url('admin/contracts/editContractCategory/'.$cat->id) }}" style="color:#ffffff;">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                            </button>
                                                            @endif
                                                            @if(hasPermissionThroughRole('delete_contract_category'))
                                                            <button type="button" class="delete_btn" title="Delete Packages">
                                                                <a href="{{ url('admin/contracts/delete',$cat->id)}}" data-id="{{ $cat->id }}" onclick="return confirm('Are you sure you want to delete this record?');" style="color:#ffffff;">
                                                                    <i class="fa fa-times"></i>
                                                                </a>
                                                            </button>
                                                            @endif
                                                            </td>
                                                            @endif
                                                        </tr>

                                                        <?php  $i++; ?>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

        @endif
    </div>
   
@endsection