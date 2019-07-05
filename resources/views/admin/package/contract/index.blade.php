@extends('admin.layouts.main-layout')

    @section('content')

        <link href="{{ asset('public/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />

        <div class="content">
            <div class="page-title"> 
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ url()->previous() }}" class="previousBtn">
                            <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
                        </a>
                        <h3> Packages </h3>
                        
                        @if(hasPermissionThroughRole('access_contracts'))
                        <a href="{{ route('contracts.fp') }}" class="new_btn_add_service"><i class="fa fa-plus"></i> Add New Packages </a>
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

            @if(isset($packages[0]) && !empty($packages[0]))
                <div class="content-box-main-ng">                            
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive tableDiv_ng">
                                <!-- <table class="table table-condensed" id="example"> -->
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Package Title</th>
                                            <th>Package Price</th>
                                            <th>No. Of Callouts</th>
                                            @if(hasPermissionThroughRole('edit_contract'))
                                            <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php   $i = 1; ?>
                                            @foreach($packages as $pack)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $pack->package_type }}</td>
                                            <td>{{ $pack->package_price}} AED</td>
                                            <td>{{ $pack->callouts}}</td>
                                            
                                            @if(hasPermissionThroughRole('edit_contract') )
                                            <td>
                                            @if(hasPermissionThroughRole('edit_contract'))
                                            <button type="button" title="Edit Packages" class="edit_btn tableEditBtn">
                                                <a href="{{ url('admin/contracts/editContract/'.$pack->id) }}" style="color:#ffffff;">
                                                    <i class="fa fa-pencil"></i>
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
            @endif

            @if(isset($packages[0]) && !empty($packages[0]))
                <div class="innerWrapper1">
                    <div class="row">
                        <?php   $i = 1; ?>
                        @foreach($packages as $pack)
                            <div class="col-md-3">
                                <div class="package-ng">
                                    <div class="header-ng">
                                        <div class="controller overlay">
                                            <a href="#" class="EditService editSub_btn pull-left dlt_btn" title="Delete Package"><i class="fa fa-times"></i></a>
                                            <a href="#" class=" pull-right edt_btn " title="">
                                                <img src="{{ asset('public/img/chain.png')}}" class="img-responsive">
                                            </a>                                                     
                                        </div>
                                        <h3>{{ $pack->package_type }}</h3>
                                    </div>

                                    <div class="count-num-ng">
                                        <h3 class="marginBottom0">223</h3>
                                        <h4 class="marginTop5">Subscribers</h4>
                                    </div>

                                    <div class="contentDiv-ng">
                                        <h3 class="marginBottom0">{{ $pack->package_price}} AED</h3>
                                        <h4 class="marginTop5">Average Price</h4>
                                        <h4 class="contract-time-ng">12 Month Contact</h4>
                                    </div>

                                    <div class="footer-ng">
                                        <div class="row">
                                            @if(hasPermissionThroughRole('edit_contract') )
                                                <div class="col-md-12 text-center">
                                                    @if(hasPermissionThroughRole('edit_contract'))
                                                    <a href="{{ url('admin/contracts/editContract/'.$pack->id) }}" class="new_add_srv_btn">Edit Package</a>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php  $i++; ?>
                        @endforeach
                    </div>
                </div>
            @endif

        
        </div>
   
    @endsection