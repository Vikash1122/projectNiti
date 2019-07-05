@extends('admin.layouts.product_layout')
@section('css')
<style>
    .cardViewTable tr td{
        width:100%;
        display:block;
    }
    .cardViewTable .widget_user_list{
        width:auto;
    }
    .grid.simple .grid-title{
        display:none;
    }
    .widget_user_list_new{
        border-radius: 5px;
        background: #ffffff;
        float: left;
        margin-bottom: 20px;
    }
    .widget_user_list_new .widget_img_box {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: 20px auto 10px;
        display: block;
        border: 5px solid #ececec;
    }
    .widget_user_list_new .widget_img_box img {
        width: 100%;
        border-radius: 50%;
        height: -webkit-fill-available;
    }
    .widget_user_list_new .widget-item {
        position: relative;
    }
    .widget_user_list_new .widget-item .controller.right {
        top: 10px;
    }
    .widget_user_list_new .widget-item .controller a, .item_card .widget-item .controller a {
        background: none !important;
        padding-left: 10px;
        color: #ccc;
    }
    .widget_user_list_new .widget-title {
        width: 100%;
        float: left;
    }
    .widget_user_list_new .widget-title h4 {
        font-weight: 600;
        text-align: center;
        color: #000000;
        letter-spacing: 1px;
    }
    .widget_user_list_new .widget-title h5 {
        font-weight: 400;
        text-align: center;
        letter-spacing: .8px;
        color: #000000;
        padding-bottom: 20px;
    }
    .grid.simple .grid-body{
        padding:0px !important;
        border:0px;
    }
    .widget_user_list_new .widget-user-details {
        /* border-top: 1px solid #a7a4a4; */
        padding: 15px;
        width: 100%;
        float: left;
        background: #039347;
    }

        .cardViewTable .table-condensed thead{
        display:none;
    }
    .cardViewTable tr td{
        width:100% !important;
        display: block;
    }
    .cardViewTable .DTTT {
        display:none !important;
    }
    .cardViewTable .select2-container .select2-choice .select2-arrow b:before{
        content:"" !important;  
    }
    .cardViewTable .select2-container{
        width: 60px !important;
    }
    .cardViewTable .select2-container .select2-choice{
        height: 35px;
        padding: 6px 0 6px 8px;
        border-radius: 4px !important;
        border: 1px solid #dbdbdb;
    }
    .cardViewTable .select2-container .select2-choice .select2-arrow{
        background: transparent;
        border-left: none;
    }
    .cardViewTable .table td{
        /* border-top: none !important; */
        padding:0px !important;
        
    }
    .cardViewTable .table .clm1{
        border-top: 1px solid #e5e5e5 !important;
        border-left: 1px solid #e5e5e5 !important;
        border-right: 1px solid #e5e5e5 !important;
    }
    .cardViewTable .table .clm2{
        border-left: 1px solid #e5e5e5 !important;
        border-right: 1px solid #e5e5e5 !important;
    }
    .cardViewTable .table .clm3{
        border-left: 1px solid #e5e5e5 !important;
        border-right: 1px solid #e5e5e5 !important;
        float:left;
    }
    .cardViewTable .table .clm4{
        float: left;
        background: #2f9247;
    }
    .widget_user_list_new .widget-user-details .widget-action-block{
        border-top: 1px solid rgba(255, 255, 255, 0.43);
        padding-top: 8px;
        padding-bottom: 8px;
        width: 100%;
        float: left;
        text-align: center;
    }
    #example_wrapper .row:first-child{
        margin-left:0px;
        margin-right:0px;
    }
  
    .widget-title .pri_service_main span{
        border:none !important;
        text-transform: capitalize;
    }
    .widget-title .pri_service_main span:first-child{
        padding-left:0px !important;
    }
    .item_card{
        width:auto !important;
        margin-bottom:20px;
        border-radius:4px;
        border: 1px solid #ececec;
    }
    .cardViewTable .table .col-md-3{
        margin-bottom:20px;
    }
    .borderBx{
        border: 1px solid #e5e5e5 !important;
    }
    .borderTop0{
        border-top:0px !important;
    }
    .widget-title .pri_service_name{
        padding:0px 0px !important;
    }

    .items_details .card-text-heading span{
        font-size:12px;
        display:block;
        text-align:center;
    }
    
</style>
@endsection
@section('content')
<div class="content">
    <div class="page-title"> 
        <a href="{{ url()->previous() }}" class="previousBtn">
            <img src="{{asset('public/img/go_back.png') }}" class="img-responsive">
        </a> 
        <h3>Inventory Margin <span class="semi-bold">&nbsp;</span></h3>

           

        @if(hasPermissionThroughRole('add_products'))
            <a href="{{ route('margin.form') }}" class="new_btn_add_service">
                <i class="fa fa-plus"></i> Add New Margin 
            </a>
        @endif
       
        <!-- <div class="form-filter">
            <div class="flt">
                <div class="serchBarDiv marginRight0">
                    <div class="searchContainer">
                        <input class="searchBox" type="search" id="searchTeamName" name="search" placeholder="Search">
                        <i class="fa fa-search searchIcon"></i>
                    </div>
                </div>
            </div>
        </div>  -->
    </div>
    
    <div class="row">   
        <div class="col-md-12">
            <div class="content-box-main-ng">
                <div class="row"> 
                    @if(Session::has('message')) 
                        <div class="alert alert-info">
                            {{Session::get('message')}} 
                        </div> 
                    @endif
                    <div class="col-md-12">
                        <div class="table-responsive tableDiv_ng">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td class="text-center">S.No.</td>
                                        <td class="text-center">Amount</td>
                                        <td class="text-center">Margin</td>
                                        <td class="text-center">Code</td>
                                        <td class="text-center">Action</td>
                                    </tr>
                                </thead>

                                <tbody class="bannerTbody productList" id="searchbyName">
                                @if(isset($margins[0]) && !empty($margins[0]))
                                <?php $i = 1; ?>
                                @foreach($margins as $margin)
                                    <tr>
                                        <td class="text-center">{{ $i }}</td>
                                        <td class="text-center">{{ $margin->amount }}</td>
                                        <td class="text-center">{{ $margin->margin }}</td>
                                        <td class="text-center"><div class="marginCircle"></div></td>
                                        <td class="text-center">
                                            
                                            <!-- <a href="#" title="Edit Margin"><i class="fa fa-pencil"></i></a> -->
                                           
                                            <a href="{{ url('admin/margins/destroy/'.$margin->id) }}" onclick="return confirm('Are you sure you want to delete this record?');" title="Delete Margin"><i class="fa fa-times"></i></a>
                                            
                                        </td>
                                    </tr>
                                <?php $i++; ?>
                                @endforeach
                                @else

                                @endif
                                    
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
@endsection
@section('js')
<script>

</script>
@endsection