@extends('admin.layouts.main-layout')
@section('css')
<link href="{{ asset('public/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/plugins/bootstrap-select2/select2.css') }}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{ asset('public/plugins/jquery-datatable/css/jquery.dataTables.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" />


@endsection

@section('content')


    <div class="content">
        <div class="page-title"> 
            <a href="{{ url()->previous() }}" class="previousBtn">
                <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
            </a>
            <h3>Brands</h3>

            @if(hasPermissionThroughRole('add_brands'))
            <a href="{{ route('brands.form') }}" class="new_btn_add_service"><i class="fa fa-plus"></i> Add New Brands </a>
            @endif

            <div class="serchBarDiv">
                <div class="searchContainer">
                    <input class="searchBox" type="search" id="searchBrand" name="search" placeholder="Search">
                    <i class="fa fa-search searchIcon"></i>
                </div>
            </div>
        </div>

        <div class="row">
            @if(Session::has('message')) 
                <div class="alert alert-info">
                    {{Session::get('message')}} 
                </div> 
            @endif

            <div class="col-md-12">
                <div class="innerWrapper1">
                    <div class="row" id="searchData">
                        @if(isset($brands) && !empty($brands))
                            @foreach($brands as $br)
                                <div class="col-md-3">
                                    <div class="serviceListBox">
                                        <div class="grid_box new_srv_box">
                                            <div class="controller overlay">
                                                @if(hasPermissionThroughRole('delete_brands'))
                                                    <a href="{{ url('admin/brands/destroy/'.$br->id) }}" class="EditService editSub_btn pull-left dlt_btn" onclick="return confirm('Are you sure you want to delete this brand?');" title="Delete Brand"><i class="fa fa-times"></i></a>
                                                @endif
                                                @if(hasPermissionThroughRole('edit_brands'))
                                                    <a href="{{ url('admin/brands/edit/'.$br->id) }}" class=" pull-right edt_btn" onclick="return confirmation();" title="Edit Brand"><i class="fa fa-pencil"></i></a>
                                                @endif
                                                <!-- <a href="http://3.16.87.53/admin/services/destroy/1" data-id="1" onclick="return confirm('Are you sure you want to delete this record?');" class="EditService editSub_btn pull-left dlt_btn" title="Delete Service"><i class="fa fa-times"></i></a>
                                                <a href="http://3.16.87.53/admin/services/1" class=" pull-right edt_btn " title="Edit Service"><i class="fa fa-pencil"></i></a> -->
                                            </div>

                                            <div class="paddingBottom0">
                                                <div class="icon_div ">
                                                    @if(isset($br->brand_icon) && !empty($br->brand_icon))
                                                        <img src="{{ fileurlbrand().$br->brand_icon }}" style="">
                                                    @else
                                                        <img src="{{ asset('public/img/no-preview.jpg') }}" style="">
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="content_box">
                                                <div class="title">
                                                    <h4>{{ $br->brand_name }}</h4>
                                                </div>

                                                <div class="content_opt">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-xs-12">
                                                            <div class="card_box_opt text-center">
                                                                <div class="card-text-heading">Brand Code</div>
                                                                <div class="service_code">{{ $br->brand_code }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                        <div class="col-md-12">
                            <div class="content-box-main">
                                <h4 class="text-center">No Record Found!</h4>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>            
       
    </div>

@endsection
@section('js')
<script>
function confirmation() {
    return confirm('Are you sure you want to delete this Brand record?');
}
$('#searchBrand').on('keyup',function(){ 
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : "{{ route('brands.search') }}",
            data:{
                'search':$value
                },
            success:function(data){
                
                var json = $.parseJSON(data);
                var htmlslot;
                $('#searchData').html('');
                if(json.length > 0){
                    $.each(json,function(index, value){
                   
                        var brand_img='';
                        var brand_img1 = "<?php echo fileurlbrand(); ?>"+ value.brand_icon;
                        if(value.brand_icon == null || value.brand_icon == ''){
                            var brand_img = '<img src="{{ asset("public/img/no-preview.jpg") }}" class="img-responsive" />';
                        }else{
                            var brand_img = '<img src="'+brand_img1+'" class="img-responsive">';
                        }
                        
                        var delete_permission='';
                        if("<?php echo hasPermissionThroughRole('delete_brands'); ?>"){
                            var delete_permission = '<a href="http://3.16.87.53/admin/brands/destroy/'+value.id+'" onclick="return confirmation();" class="EditService editSub_btn pull-left dlt_btn" title="Delete Brand"><i class="fa fa-times"></i></a>';
                        }
                        var edit_permission='';
                        if("<?php echo hasPermissionThroughRole('edit_brands'); ?>"){
                            var edit_permission = '<a href="http://3.16.87.53/admin/brands/edit/'+value.id+'" class=" pull-right edt_btn" title="Edit Brand"><i class="fa fa-pencil"></i></a>';
                        }

                        htmlslot='<div class="col-md-3">'+
                                        '<div class="serviceListBox">'+
                                            '<div class="grid_box new_srv_box">'+
                                                '<div class="controller overlay">'+
                                                    ''+delete_permission+''+
                                                    ''+edit_permission+''+
                                                '</div>'+

                                                '<div class="paddingBottom0">'+
                                                    '<div class="icon_div ">'+
                                                        ''+brand_img+''+
                                                    '</div>'+
                                                '</div>'+

                                                '<div class="content_box">'+
                                                    '<div class="title">'+
                                                        '<h4>'+value.brand_name+'</h4>'+
                                                    '</div>'+

                                                    '<div class="content_opt">'+
                                                        '<div class="row">'+
                                                            '<div class="col-sm-12 col-xs-12">'+
                                                                '<div class="card_box_opt text-center">'+
                                                                    '<div class="card-text-heading">Brand Code</div>'+
                                                                    '<div class="service_code">'+value.brand_code+'</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+ 
                                                '</div>'+  
                                            '</div>'+
                                        '</div>'+
                                    '</div>'
                        ;
                        $("#searchData").append(htmlslot);
                    });
                }else{
                    htmlslot='<div class="col-md-12"><div class="content-box-main">'+
                            '<h4 class="text-center">No Record Found!</h4>'+
                        '</div></div>';
                
                    $("#searchData").append(htmlslot);
                }
                
            }
        });
})
</script>
@endsection