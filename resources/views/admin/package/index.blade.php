@extends('admin.layouts.package_layout')
@section('css')
<style>
    .gr_container .controller{
        position: absolute;
        top: 0;
        right: 0;
        z-index: 1;
        padding: 5px 10px;
        width:100%;
    }
    .gr_container .controller a, .gr_container .controller a:hover{
        color:#ffffff;
        text-decoration:none;
        padding-left: 10px;
    }
</style>
@endsection
@section('content')
<div class="content">
    <div class="page-title"> 
        <a href="{{ url()->previous() }}" class="previousBtn">
            <img src="{{asset('public/img/go_back.png')}}" class="img-responsive">
        </a>
        <h3>Packages  <span class="semi-bold">&nbsp;</span></h3>
    </div>

    <div class="content-box-main">
        <div class="order_history_box mar_btm30">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <h3 class="text-center amc">ANNUAL MAINTENANCE PACKAGES</h3>
                    <p class="text-center">Having your property covered under our Annual Maintenance Packages gives you round the clock 24/7 365 days access to our team with an emergency* response time of 60 Minutes for any maintenance issue you may face. AMC assures you complete peace of mind. We have tailored our AMC into 3 different packages to fit your various requirements being the owner or the tenant of the property.</p>
                </div>
            </div>
        </div>


        <!-- <div class="order_history_box"> -->
            <div class="row">
            @if(isset($packages) && !empty($packages))
            @foreach($packages as $pkg)
                <div class="col-md-4">
                    <div class="pc-price pc-price-29 text-center gr_container">
                        <div class="controller overlay"> 
                            @if(hasPermissionThroughRole('edit_contract_service'))
                                <a href="{{ url('admin/contracts/editContractServices/'.$pkg['id']) }}" data-toggle="modal" class="pull-left" ><i class="fa fa-pencil"></i></a> 
                            @endif
                            @if(hasPermissionThroughRole('delete_contract'))
                                <a class="pull-right" href="{{ url('admin/contracts/destroy/'.$pkg['id']) }}" onclick="return confirm('Are you sure you want to delete this package?');"  title="Delete Service"><i class="fa fa-times"></i></a> 
                            @endif
                        </div> 
                        <div class="price-title">
                            <h3>{{ $pkg['package_type'] }}</h3>
                            
                            <h6>{{ $pkg['package_category'] }}</h6>
                        </div>
                        <div class="pricing">
                            <div class="price-inner">
                                <span class="currency">$</span>
                                <span class="value">{{ $pkg['package_price'] }}</span>
                                <span class="period">/year</span>
                            </div>
                        </div>

                        <div class="price-body">
                            <div class="srvBody" id="style-1">
                            @if(isset($pkg['packcat'][0]) && !empty($pkg['packcat'][0]))
                            
                                <div class="tab-content">
                                @foreach($pkg['packcat'] as $cat)
                                <p>{{ $cat->title }}</p>
                                    <div role="tabpanel" class="tab-pane active" id="preventative_<?php echo $cat['title'];?>">
                                        <ul>
                                        @foreach($cat['pc'] as $ser)
                                            <li>{{ $ser->pkg_service_name }}
                                                <span>{{ $ser->pkg_service_desc }}</span>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endforeach 
                                </div>
                                @endif
                            </div> 
                            @if(hasPermissionThroughRole('add_contract_services'))
                            <a class="pc-btn pc-btn-7" href="{{ route('contracts.form') }}">Add More Package Services</a>
                            @endif
                        </div>
                    </div>    
                </div>
            @endforeach
            @endif
            </div>
        <!-- </div>     -->
    </div>        
</div>    
@endsection