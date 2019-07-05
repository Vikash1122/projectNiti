@extends('admin.layouts.product_layout')

@section('content')
<style>
    .input-group{
        width:100%;
        display:block;
    }
    .ser_rpt_heading span{
        color: #000;
        font-weight: 600;
        margin-bottom: 5px;
        margin-top: 10px;
        border-bottom: 1px solid #ccc;
        display: block;
        width: 100%;
        padding-bottom: 5px;
        margin-bottom: 20px;
    }
    .noJobCardSpan{
        margin-bottom:4px;
    }
    .noJobCardSpan .btn{
        padding: 7px 12px;
    }
</style>
<div class="content">
    <div class="page-title"> 
        <div class="row">
            <div class="col-md-6">
                <a href="{{ url()->previous() }}" class="previousBtn">
                    <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
                </a>
                <h3>Job Card<span class="semi-bold">&nbsp;</span></h3>
            </div>
        </div>
    </div>

    <div class="row">
        <form method="post" action="{{ url('/admin/newjobs/'.$id.'/jobCard') }}" >
        {{ csrf_field() }}
            <div class="col-md-12">
                <div class="content-box-main">
                    <div class="header_main_div_sec">
                        <div class="title">
                            <h5 class="pull-left" id="jobTitle_text">Job No :  {{$id}}</h5>
                            <span class="pull-right noJobCardSpan">
                                <button type="button" id="noJobCardRequired" onclick="addnojobCard(<?php echo $id; ?>)" class="btn btn-primary">No job Card Required</button>
                                <button type="button" id="nojobCardReferesh" class="btn btn-warning"><i class="fa fa-refresh"></i></button>
                            </span>
                        </div>       
                    </div>

                    <div class="row">
                        <div class="col-md-12" id="job_card_service_list">
                            <input name="group_id" id="group_id" type="hidden" value="{{ Auth::user()->group_id }}"/>
                            <input name="job_id" id="job_id" type="hidden" value="{{ $id }}"/>
                            <div id="appendDivjobcard1">
                            @if(isset($myarray[0]) && !empty($myarray[0]))
                                @foreach($myarray as $arr)
                                    <?php 
                                    $subservices = \App\SubServices::where('service_id',$arr->id)->get();
                                    $products = \App\Product::where('service_id',$arr->id)->get();
                                    ?>
                                    <input type="hidden" name="service_id[]" id="serviceID" value="{{ $arr->id }}">

                                    <div class="order_history_box">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="ser_rpt_heading">
                                                    <span class="pull-left">{{ $arr->service_name }}</span>
                                                </h5>
                                            </div>
                                        </div>

                                        <div id="jobcardappendeddiv_<?php echo $arr->id;?>">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="row ">
                                                        <div class="col-md-3">
                                                            <div class="form_control_new">  
                                                                <div class="label_head">Sub Service Type</div>
                                                                <div class="input-group">
                                                                    <select class="form-control" name="sub_service_id_<?php echo $arr->id;?>[]" id="sub_service_name" required>
                                                                        <option value="">Please Select</option>
                                                                    @foreach($subservices as $sub)
                                                                        <option value="{{ $sub->id }}">{{ $sub->sub_service_name }}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form_control_new">  
                                                                <div class="label_head">Product Type</div>
                                                                <div class="input-group">
                                                                    <select class="form-control" name="product_id_<?php echo $arr->id;?>[]" id="product_name" required>
                                                                        <option value="">Please Select</option>
                                                                    @foreach($products as $prd)
                                                                        <option value="{{ $prd->id }}">{{ $prd->product_name }}</option>
                                                                    @endforeach
                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form_control_new">  
                                                                <div class="label_head">Quantity</div>
                                                                <div class="input-group">
                                                                    <input class="form-control" name="qty_<?php echo $arr->id;?>[]" id="qty" placeholder="Quantity" required> 
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form_control_new">  
                                                                <div class="label_head">Unit Variable Par /</div>
                                                                <div class="input-group">
                                                                    <select class="form-control" name="unit_variable_<?php echo $arr->id;?>[]" id="unit_variable" required>
                                                                        <option value="">Please Select</option>
                                                                    @foreach($subservices as $sub)
                                                                        <option value="{{ $sub->unit_variable }}">{{ $sub->unit_variable }}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-md-2 text-right">
                                                    <!-- <div class="col-md-3"> -->
                                                        <div class="form_control_new ">  
                                                            <div class="label_head">&nbsp;</div>
                                                            <a type="button" class="btn btn-primary" onclick="addjobCard(<?php echo $arr->id; ?>);">Add More</a>
                                                        </div>
                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <script>
                                    function addjobCard(id){

                                        var json = JSON.stringify(<?php echo $subservices = \App\SubServices::where('service_id',$arr->id)->get(); ?>); 
                                        var json1 = $.parseJSON(json);

                                        var json2 = JSON.stringify(<?php echo $products = \App\Product::where('service_id',$arr->id)->get(); ?>); 
                                        var json3 = $.parseJSON(json2);
                                            htmlslot = '';
                                            htmlslot='<div class="row" id="mydata3">'+
                                                        '<div class="col-md-10">'+
                                                            '<div class="row ">'+
                                                                '<div class="col-md-3">'+
                                                                    '<div class="form_control_new">'+  
                                                                        '<div class="label_head">Sub Service Type</div>'+
                                                                        '<div class="input-group">'+
                                                                            '<select class="form-control" name="sub_service_id_'+id+'[]" id="sub_service_name" >'+
                                                                                '<option value="">Please Select</option>';
                                                                                if(json1){
                                                                                    $.each(json1, function(index, value) {
                                                                                        htmlslot+='<option value="'+value.id+'">'+value.sub_service_name+'</option>';
                                                                                    });
                                                                                }
                                                                                htmlslot+='</select>'+
                                                                        '</div>'+
                                                                    '</div>'+
                                                                '</div>'+

                                                                '<div class="col-md-3">'+
                                                                    '<div class="form_control_new">'+  
                                                                        '<div class="label_head">Product Type</div>'+
                                                                        '<div class="input-group">'+
                                                                            '<select class="form-control" name="product_id_'+id+'[]" id="product_name" >'+
                                                                                '<option value="">Please Select</option>';
                                                                                if(json1){
                                                                                    $.each(json3, function(index1, value1) {
                                                                                        htmlslot+='<option value="'+value1.product_name+'">'+value1.product_name+'</option>';
                                                                                    });
                                                                                }
                                                                                htmlslot+='</select>'+
                                                                        '</div>'+
                                                                    '</div>'+
                                                                '</div>'+

                                                                '<div class="col-md-3">'+
                                                                    '<div class="form_control_new">'+  
                                                                        '<div class="label_head">Quantity</div>'+
                                                                        '<div class="input-group">'+
                                                                            '<input class="form-control" name="qty_'+id+'[]" id="qty" placeholder="Quantity" >'+ 
                                                                        '</div>'+
                                                                    '</div>'+
                                                                '</div>'+

                                                                '<div class="col-md-3">'+
                                                                    '<div class="form_control_new">'+  
                                                                        '<div class="label_head">Unit Variable Par /</div>'+
                                                                        '<div class="input-group">'+
                                                                            '<select class="form-control" name="unit_variable_'+id+'[]" id="unit_variable" >'+
                                                                                '<option value="">Please Select</option>';
                                                                                if(json1){
                                                                                    $.each(json1, function(index, value) {
                                                                                        htmlslot+='<option value="'+value.unit_variable+'">'+value.unit_variable+'</option>';
                                                                                    });
                                                                                }
                                                                                htmlslot+='</select>'+
                                                                        '</div>'+
                                                                    '</div>'+
                                                                '</div>'+

                                                            '</div>'+
                                                        '</div>'+

                                                        '<div class="col-md-2 text-right">'+
                                                                '<div class="form_control_new ">'+  
                                                                    '<div class="label_head">&nbsp;</div>'+
                                                                    '<a type="button" class="btn btn-danger" onclick="removeJobCard();">Remove</a>'+
                                                                '</div>'+
                                                        '</div>'+
                                                    '</div>'
                                            ;
                                            $("#jobcardappendeddiv_"+id).append(htmlslot);
                                            
                                    }

                                    function removeJobCard(){
                                        //alert(id);
                                        var elem = document.getElementById('mydata3');
                                        elem.parentNode.removeChild(elem);
                                        //$(caller).closest('.row dd').remove();
                                    }

                                    function addnojobCard(job_id){
                                        $.ajax({
                                            type:"GET",
                                            url:"{{route('ajaxjobCard.job')}}?job_id="+job_id,
                                            success:function(res){   
                                                           
                                                if(res){
                                                    var json1 = $.parseJSON(res);
                                                    //console.log(json1);
                                                    if(json1.length > 0){
                                                        $("#appendDivjobcard1").html('');
                                                        htmlslot = '';
                                                        $.each(json1, function(index, value) {
                                                        htmlslot='<div class="order_history_box">'+
                                                                '<input type="hidden" name="service_id[]" id="serviceID" value="'+value.id+'">'+
                                                                '<div class="row">'+
                                                                    '<div class="col-md-12">'+
                                                                        '<h5 class="ser_rpt_heading">'+
                                                                            '<span class="pull-left">'+value.service_name+'</span>'+
                                                                        '</h5>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                                '<div class="row" id="mydata4">'+
                                                                    '<div class="col-md-12">'+
                                                                        '<div class="row ">'+
                                                                            

                                                                            '<div class="col-md-12">'+
                                                                                '<div class="form_control_new">'+  
                                                                                    '<div class="label_head">Description</div>'+
                                                                                    '<div class="input-group">'+
                                                                                        '<textarea rows="4" name="text_content_'+value.id+'[]" class="form-control" placeholder="Enter Description" required></textarea>'+
                                                                                    '</div>'+
                                                                                '</div>'+
                                                                            '</div>'+

                                                                        '</div>'+
                                                                    '</div>'+

                                                                '</div>'
                                                                '</div>'
                                                        ;
                                                        $("#appendDivjobcard1").append(htmlslot);
                                                        });
                                                    }
                                                    
                                                }
                                            }
                                        });
                                            
                                    }
                                </script>
                                @endforeach
                            @endif

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-danger">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </div>

                    </div>   

                </div>
            </div> 
        </form>
    </div> 
</div> 
<script src="{{ asset('public/plugins/jquery/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
<script>
//    $(document).ready(function(){
//         $("#noJobCardRequired").click(function(){
//             $("#noJobCardRequired").addClass('hidden');
//             $("#backBtn").removeClass('hidden');
//             $("#jobTitle_text").html("Job Description");
//             $("#job_card_service_list").addClass('hidden');
//             $("#desc_job_card").removeClass('hidden');
//         });
        
//         $("#backBtn").click(function(){
            
//             $("#noJobCardRequired").removeClass('hidden');
//             $("#backBtn").addClass('hidden');
//             $("#jobTitle_text").html("Jobs");
//             $("#desc_job_card").addClass('hidden');
//             $("#job_card_service_list").removeClass('hidden');
//         });
//    });                                 
</script>
@endsection