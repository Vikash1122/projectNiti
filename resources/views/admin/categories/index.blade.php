@extends('admin.layouts.main-layout')

@section('content')
<link href="{{ asset('public/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/plugins/bootstrap-select2/select2.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('public/plugins/jquery-datatable/css/jquery.dataTables.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <style>
       
        
    </style>

    <div class="content">
        <div class="page-title"> 
            <a href="{{ url()->previous() }}" class="previousBtn">
                <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive"/>
            </a>
            <h3>Categories </h3>

            @if(hasPermissionThroughRole('add_categories'))
            <a href="{{ route('categories.form') }}" class="new_btn_add_service"><i class="fa fa-plus"></i> Add New Category </a>
            @endif

            <div class="serchBarDiv">
                <div class="searchContainer">
                    <input class="searchBox" type="search" id="searchCategory" name="search" placeholder="Search">
                    <i class="fa fa-search searchIcon"></i>
                </div>
            </div>
        </div>

        @if(Session::has('message')) 
            <div class="alert alert-info">
                {{Session::get('message')}} 
            </div> 
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="innerWrapper1">
                    <div class="row" id="searchData">
                        @if(isset($categories) && !empty($categories))
                            @foreach($categories as $cat)
                                <div class="col-md-3">
                                    <div class="serviceListBox">
                                        <div class="grid_box new_srv_box">
                                            <div class="controller overlay">
                                                @if(hasPermissionThroughRole('delete_categories'))
                                                    <a href="{{ url('admin/categories/destroy/'.$cat->id) }}" onclick="return confirmation();" title="Delete Category" class="EditService editSub_btn pull-left dlt_btn"><i class="fa fa-times"></i></a>
                                                @endif
                                                @if(hasPermissionThroughRole('edit_categories'))
                                                    <a href="{{ url('admin/categories/edit/'.$cat->id) }}" class=" pull-right edt_btn " title="Edit Category"><i class="fa fa-pencil"></i></a>
                                                @endif
                                            </div>

                                            <div class="paddingBottom0">
                                                <div class="icon_div ">
                                                    @if(isset($cat->cat_img) && !empty($cat->cat_img))
                                                        <img src="{{ fileurlCategory().$cat->cat_img }}" class="img-responsive">
                                                    @else
                                                        <img src="{{ asset('public/img/no-preview.jpg') }}" class="img-responsive">
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="content_box">
                                                <div class="title">
                                                @if(strlen($cat->name) > 15)
                                                    <h4 title="{{ $cat->name }}">{{ substr($cat->name, 0, 15) . '...' }}</h4>
                                                @else
                                                    <h4 title="{{ $cat->name }}">{{ $cat->name }}</h4>
                                                @endif
                                                </div>

                                                <div class="content_opt">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="card_box_opt text-center marginTop20">
                                                                <div class="card-text-heading">Code No.</div>
                                                                <div class="service_code">{{ $cat->code }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-6">
                                                            <div class="action_box">
                                                                <div class="card_box_opt">
                                                                    <div class="card-text-heading arialFont">Status</div>
                                                                    <div class="toggleCheckBox">
                                                                        @if($cat->status == 1)
                                                                        <label class="switch">
                                                                        <input name="status" type="checkbox" onclick="isActive(<?php echo $cat->id; ?>)" value="0" id="enable_{{$cat->id}}" checked>
                                                                        <span class="slider round"></span>
                                                                        </label>
                                                                        @else
                                                                        <label class="switch">
                                                                        <input name="status" type="checkbox" onclick="isActive(<?php echo $cat->id; ?>)" value="1" id="enable_{{$cat->id}}">
                                                                        <span class="slider round"></span>
                                                                        </label>
                                                                        @endif
                                                                    </div>
                                                                </div>                                                
                                                            </div>    
                                                        </div>
                                                    </div>

                                                    <!-- <div class="row">
                                                        <div class="col-sm-12 col-xs-12">
                                                            <div class="card_box_opt text-center">
                                                                <div class="card-text-heading">Code No.</div>
                                                                <div class="service_code">{{ $cat->code }}</div>
                                                            </div>
                                                        </div>
                                                    </div> -->
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
    return confirm('Are you sure you want to delete this Category record?');
}
$('#searchCategory').on('keyup',function(){ 
    $value=$(this).val();
    $.ajax({
        type : 'get',
        url : "{{ route('categories.search') }}",
        data:{
            'search':$value
            },
        success:function(data){
            
            var json = $.parseJSON(data);
            var htmlslot;
            $('#searchData').html('');
            if(json.length > 0){
                $.each(json,function(index, value){
                
                    var cat_image='';
                    var cat_image1 = "<?php echo fileurlCategory(); ?>"+ value.cat_img;
                    if(value.cat_img == null || value.cat_img == ''){
                        var cat_image = '<img src="{{ asset("public/img/no-preview.jpg") }}" class="img-responsive" />';
                    }else{
                        var cat_image = '<img src="'+cat_image1+'" class="img-responsive">';
                    }
                    
                    var delete_permission='';
                    if("<?php echo hasPermissionThroughRole('delete_categories'); ?>"){
                        var delete_permission = '<a href="http://3.16.87.53/admin/categories/destroy/'+value.id+'" onclick="return confirmation();" title="Delete Category" class="EditService editSub_btn pull-left dlt_btn"><i class="fa fa-times"></i></a>';
                    }
                    var edit_permission = '';
                    if("<?php echo hasPermissionThroughRole('edit_categories');?>"){
                        var edit_permission = '<a href="http://3.16.87.53/admin/categories/edit/'+value.id+'" class=" pull-right edt_btn " title="Edit Category"><i class="fa fa-pencil"></i></a>';
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
                                                    ''+cat_image+''+
                                                '</div>'+
                                            '</div>'+

                                            '<div class="content_box">'+
                                                ' <div class="title">';
                                                if((value.name).length > 15){
                                                    htmlslot+='<h4 title="'+value.name+'">'+value.name.substr(0, 15)+'...'+'</h4>';
                                                }else{
                                                    htmlslot+='<h4 title="'+value.name+'">'+value.name+'</h4>';
                                                }
                                                htmlslot+='</div>'+

                                                '<div class="content_opt">'+
                                                    '<div class="row">'+
                                                        '<div class="col-sm-6 col-xs-6">'+
                                                            '<div class="card_box_opt text-center marginTop20">'+
                                                                ' <div class="card-text-heading">Code No.</div>'+
                                                                '<div class="service_code">'+value.code+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="col-sm-6 col-xs-6">'+
                                                            '<div class="action_box">'+
                                                                '<div class="card_box_opt">'+
                                                                    '<div class="card-text-heading arialFont">Status</div>'+
                                                                    '<div class="toggleCheckBox">';
                                                                        if(value.status == 1){
                                                                        htmlslot+='<label class="switch">'+
                                                                        '<input name="status" type="checkbox" onclick="isActive('+value.id+')" value="0" id="enable_'+value.id+'" checked>'+
                                                                        '<span class="slider round"></span>'+
                                                                        '</label>';
                                                                        }else{
                                                                        htmlslot+='<label class="switch">'+
                                                                        '<input name="status" type="checkbox" onclick="isActive('+value.id+')" value="1" id="enable_'+value.id+'">'+
                                                                        '<span class="slider round"></span>'+
                                                                        '</label>';
                                                                        }
                                                                    htmlslot+='</div>'+
                                                                '</div>'+                
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