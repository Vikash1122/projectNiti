@extends('admin.layouts.header_layout')
@section('css')
<link href="{{ asset('public/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/plugins/bootstrap-select2/select2.css') }}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{ asset('public/plugins/jquery-datatable/css/jquery.dataTables.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" />
<style>
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
        border-top: none !important;
    }
    
    .usr_link_outer{
        padding: 20px 20px 20px !important;
    }
</style>
@endsection
@section('content')

<div class="content">
    <div class="page-title"> 
        <a class="previousBtn" href="{{ url()->previous() }}">
            <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive" />
        </a>
        <h3>Customers List <span class="semi-bold">&nbsp;</span></h3>
        <!-- <a href="#" class="new_btn_add_service"><i class="fa fa-plus"></i> Add New</a> -->
        
        <div class="serchBarDiv">
            <div class="searchContainer">
                <input class="searchBox" type="search" id="search" name="search" placeholder="Search">
                <i class="fa fa-search searchIcon"></i>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-md-12">
            <div class="content-box-main-ng">
                <div class="content-box-main marginBottom0">
                    <div class="row" id="filterSearh">
                        @if(isset($users) && !empty($users))
                            @foreach($users as $usr)
                                <div class="col-md-3">
                                    <div class="new_srv_box userList_ng">
                                        <!-- <div class="controller overlay">
                                            <a href="#" class="EditService editSub_btn pull-left border_radius_right edt_btn" ><i class="fa fa-pencil"></i></a>
                                            <a href="#" class=" pull-right border_radius_left dlt_btn" onclick="return confirm('Are you sure you want to delete this record?');" title="Delete Service"><i class="fa fa-times"></i></a>                                       
                                        </div> -->

                                        <div class="userInf_ng">
                                            <div class="userImg_ng">
                                                @if(isset($usr->profile_pic) && !empty($usr->profile_pic))
                                                    <img src="{{ fileurlUser().$usr->profile_pic }}" class="">
                                                    @else
                                                    <img src="{{ asset('public/img/defaultCustomer.png') }}" class="">
                                                @endif
                                            </div>

                                            <h4 class="text-center">{{ $usr->firstname }} 
                                            @if($usr->lastname != '' && $usr->lastname != 'NULL' && $usr->lastname != 'N/A')
                                            <span>{{ $usr->lastname }}</span>
                                            @endif
                                            </h4>
                                            <p class="text-center">&nbsp;</p>
                                        </div>

                                        <div class="userCaption_ng">
                                            <div class="caption_ng1">
                                                <div class="label_ng">Email</div>
                                                @if(strlen($usr->email) > 20 )
                                                <div class="value_ng">{{ substr($usr->email, 0, 20) . '...' }}</div>
                                                @else
                                                <div class="value_ng">{{ substr($usr->email, 0, 20) }}</div>
                                                @endif
                                            </div>

                                            <div class="caption_ng1">
                                                <div class="label_ng">Mobile Number</div>
                                                <div class="value_ng">{{ $usr->mobile }}</div>
                                            </div>

                                            <!-- <div class="caption_ng1">
                                                <div class="label_ng">Area</div>
                                                <div class="value_ng">Al Mirdif</div>
                                            </div>

                                            <div class="caption_ng1">
                                                <div class="label_ng">Location</div>
                                                <div class="value_ng">A-29/21, M..</div>
                                            </div> -->

                                            <div class="btn_ng borderTop1">
                                                <a class="" href="{{ url('admin/users/userDetails/'.$usr->id) }}">More Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                        <div class="col-md-12">
                            <h4 class="text-center">No Record Found!</h4>
                        </div>
                        @endif 
                    </div>
                </div>
            </div>    

        </div>
        
    </div>
</div>  
@section('js')
<script>
$('#search').on('keyup',function(){
    //if($(this).val().length >= 2) {
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : "{{ route('users.search') }}",
            data:{
                'search':$value
                },
            success:function(data){
                
                var json = $.parseJSON(data);
                var htmlslot;
                $('#filterSearh').html('');
                if(json.length > 0){
                    $.each(json,function(index, value){
                        var user_image='';
                        var user_image1 = "<?php echo fileurlUser(); ?>"+ value.profile_pic;
                        if(value.profile_pic == null || value.profile_pic == ''){
                            var user_image = '<img src="{{ asset("public/img/defaultCustomer.png") }}" class="">';
                
                        }else{
                            var user_image = '<img src="'+ user_image1 +'" class="">';
                        
                        }
                        htmlslot='<div class="col-md-3">'+
                                    '<div class="new_srv_box userList_ng">'+
                                        // '<div class="controller overlay">'+
                                        //     '<a href="#" class="EditService editSub_btn pull-left border_radius_right edt_btn" ><i class="fa fa-pencil"></i></a>'+
                                        //     '<a href="#" class=" pull-right border_radius_left dlt_btn" onclick="return confirm("Are you sure you want to delete this record?");" title="Delete Service"><i class="fa fa-times"></i></a>'+                                       
                                        // '</div>'+

                                        '<div class="userInf_ng">'+
                                            '<div class="userImg_ng">'+
                                                ''+user_image+''+
                                            '</div>'+

                                            '<h4 class="text-center">'+value.firstname+' ';
                                            if(value.lastname != '' && value.lastname != null && value.lastname != 'N/A'){
                                            htmlslot+='<span>'+value.lastname+'</span>';
                                            }
                                            htmlslot+='</h4>'+
                                            '<p class="text-center">&nbsp;</p>'+
                                        '</div>'+

                                        '<div class="userCaption_ng">'+
                                            '<div class="caption_ng1">'+
                                                '<div class="label_ng">Email</div>';
                                                if((value.email).length > 20 ){
                                                htmlslot+='<div class="value_ng">'+value.email.substring(0,20)+'...'+'</div>';
                                                }else{
                                                htmlslot+='<div class="value_ng">'+value.email.substring(0,20)+'</div>';
                                                }
                                                htmlslot+='</div>'+

                                            '<div class="caption_ng1">'+
                                                '<div class="label_ng">Mobile Number</div>'+
                                                '<div class="value_ng">'+value.mobile+'</div>'+
                                            '</div>'+

                                            // '<div class="caption_ng1">'+
                                            //     '<div class="label_ng">Area</div>'+
                                            //     '<div class="value_ng">Al Mirdif</div>'+
                                            // '</div>'+

                                            // '<div class="caption_ng1">'+
                                            //     '<div class="label_ng">Location</div>'+
                                            //     '<div class="value_ng">A-29/21, M..</div>'+
                                            // '</div>'+

                                            '<div class="btn_ng borderTop1">'+
                                                '<a class="" href="http://3.16.87.53/admin/users/userDetails/'+value.id+'">More Details</a>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'
                        ;
                        $("#filterSearh").append(htmlslot);
                    });
                }else{
                    htmlslot='<div class="col-md-12">'+
                            '<h4 class="text-center">No Record Found!</h4>'+
                        '</div>';
                    
                    $("#filterSearh").append(htmlslot);
                }
                
            }
        });
    //}
})
</script>
@endsection
@endsection  