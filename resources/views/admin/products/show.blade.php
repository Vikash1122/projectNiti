@extends('admin.layouts.product_layout')

    @section('content')
        <style>
            .stockQty{
                width:auto;
                float:right;
            }
            .proDtl table thead{
                background: #e5e9ec;
            }
        </style>
        <div class="content">
            <div class="page-title"> 
                <a href="{{ url()->previous() }}" class="previousBtn">
                    <img src="{{asset('public/img/go_back.png')}}" class="img-responsive">
                </a>
                <h3>Product Details</h3>
            </div>

            <!-- <form action="" method=""> -->
                <div class="row">
                @if(isset($products) && !empty($products))
                    <div class="col-md-3">
                        <div class="content-box-main profile_img_sec">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="upProfile_sec">
                                            <div class="form-group form-md-line-input">
                                                <h4 class="headingH4">Product Image</h4>
                                                <div class="docMainBox productImgBox">
                                                @if(isset($products->product_img) && !empty($products->product_img))
                                                    <img src="{{ fileurlProduct().$products->product_img }}" class="img-responsive" />
                                                @else
                                                    <img src="{{ asset('public/img/no-preview-item.jpg') }}" class="img-responsive" />
                                                @endif
                                                </div>
                                            </div>
                                            <div class="text-uppercase text-center card-text-heading" style="color:#000 !important">
                                                {{ $products->product_name }} - ({{ $products->product_code }})
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="order_history_box">
                                            <h5>Description</h5>
                                            <p>{{ $products->text_content }}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        @if(isset($products->brands[0]) && !empty($products->brands[0]))
                            @foreach($products->brands as $bnd)
                                <div class="content-box-main">
                                    <div class="header_main_div_sec">
                                        <div class="title">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5 class="text-uppercase">Product Details</h5>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="stockQty">
                                                        @if($bnd->qty == 0)
                                                            <div class="right_opt item_note">
                                                                <div class="st_opt  blink">
                                                                    <span class="">No Stock</span>
                                                                </div>
                                                            </div>
                                                        @elseif($bnd->qty < 5)
                                                            <div class="right_opt item_note">
                                                                <div class="st_opt  blink">
                                                                    <span class="">Low Stock</span>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>       
                                    </div>   

                                    <!-- <div class="accordion" id="accordionExample">
                                        <div class="card"> -->
                                            <!-- <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card-header" id="headingOne">
                                                        <div class="stockQty">
                                                        @if($bnd->qty == 0)
                                                            <div class="right_opt item_note">
                                                                <div class="title">&nbsp;</div>
                                                                <div class="st_opt  blink">
                                                                    <span class="">No Stock</span>
                                                                </div>
                                                            </div>
                                                        @elseif($bnd->qty < 5)
                                                            <div class="right_opt item_note">
                                                                <div class="title">&nbsp;</div>
                                                                <div class="st_opt  blink">
                                                                    <span class="">Low Stock</span>
                                                                
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>         -->
                                                
                                            <div class="row proDtl">
                                                <div class="col-md-12">
                                                    <div class="order_history_box boxDetailsHeadings">
                                                        <div class="job_desc_box_list">
                                                            <div class="row">   
                                                                <div class="col-md-4">
                                                                    <h5>Brand Name</h5>
                                                                    <p class="text-capitalize"> {{ $bnd->brand_name }}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <h5>Available Qty</h5>
                                                                    <p>{{ $bnd->qty }}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <h5>Price</h5>
                                                                    <p>{{ $bnd->price }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row marginTop20"> 
                                                                <div class="col-md-12">
                                                                    <div class="header_main_div_sec">
                                                                        <div class="title">
                                                                            <h5>Venders</h5>
                                                                        </div>       
                                                                    </div>
                                                                </div>  
                                                                <div class="col-md-12">
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th></th>
                                                                                    <th>Vender Name </th>
                                                                                    <th>Rating </th>
                                                                                    <th>Location </th>
                                                                                    <th colspan="2">Distance </th>
                                                                                </tr>
                                                                            </thead>

                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <input  type="radio"  value="1">
                                                                                    </td>
                                                                                    <td> {{ $bnd->vendor_id }}</td>
                                                                                    <td> 4</td>
                                                                                    <td> DLF Phase 1</td>
                                                                                    <td> 5 KM
                                                                                        <button type="button" class="btn btn-primary btn-cons pull-right">Quick Order Now</button>
                                                                                    </td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>     
                                                            </div>
                                                        </div>

                                                        <!-- <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Brand Name </th>
                                                                        <th>Available Qty </th>
                                                                        <th>Price </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td> {{ $bnd->brand_name }}</td>
                                                                        <td> {{ $bnd->qty }}</td>
                                                                        <td> {{ $bnd->price }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div> -->
                                                    </div>
                                                </div>    

                                                <!-- <div class="col-md-12">
                                                    <div class="order_history_box">
                                                        <div class="header_main_div_sec">
                                                            <div class="title">
                                                                <h5>Venders</h5>
                                                            </div>       
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th></th>
                                                                                <th>Vender Name </th>
                                                                                <th>Rating </th>
                                                                                <th>Location </th>
                                                                                <th colspan="2">Distance </th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                            <tr>
                                                                            <td><input  type="radio"  value="1"></td>
                                                                                <td> {{ $bnd->vendor_id }}</td>
                                                                                <td> 4</td>
                                                                                <td> DLF Phase 1</td>
                                                                                <td> 5 KM
                                                                                <button type="button" class="btn btn-primary btn-cons pull-right">Quick Order Now</button>
                                                                                </td>
                                                                            </tr>
                                                                            
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->

                                            </div>
                                        <!-- </div>
                                    </div> -->
                                </div>
                                @endforeach
                                @endif
                                
                            </div>

                        </div>
                    </div>
                @endif
                </div>
                </div>
            <!-- </form> -->
        </div>

    @endsection