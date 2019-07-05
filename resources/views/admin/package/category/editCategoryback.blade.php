@extends('admin.layouts.package_layout')
    @section('content')
        <div class="content">
            <div class="page-title"> 
                <a href="{{ url()->previous() }}" class="previousBtn">
                    <img src="{{asset('public/img/go_back.png')}}" class="img-responsive">
                </a>
                <h3>Edit Package Category</h3>
            </div>

            <div class="content-box-main-ng marginBottom0">
                <h3 class="text-center">Edit Package Category</h3>
                <form method="post" action="{{ url('admin/contracts/editContractCategory/'.$id) }}" >
                    <div class="row">
                        <div class="col-md-12">
                            @if(Session::has('message')) 
                                <div class="alert alert-info">
                                    {{Session::get('message')}} 
                                </div> 
                            @endif
                            <div class="content-box-main marginBottom0">
                                <!-- <div class="header_main_div_sec">
                                    <div class="title">
                                        <h5 class="pull-left">Add Category</h5>
                                        <button type="button" class="btn btn-primary pull-right" onclick="addCategory()">Add More Category</button>
                                    </div>       
                                </div> -->
                                <div class="row srvLst ">
                                {{ csrf_field() }}
                                    <div class="col-md-3">
                                        <div class="form_control_new">  
                                            <div class="label_head">Package Type</div>
                                            <select id="package_id" name="package_id" required>
                                                <option value="" selected>Select Package Type</option>
                                                @if(isset($packages) && !empty($packages))
                                                @foreach($packages as $pack)
                                                    <option <?php if(isset($category->package_id) && !empty($category->package_id) && $category->package_id == $pack->id){echo "selected";}else{ echo "";}?> value="{{ $pack->id }}">{{ $pack->package_type }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="row" id="boxCategory">
                                            <div class="col-md-4">
                                                <div class="form_control_new">  
                                                    <div class="label_head">Category Name</div>
                                                    <div class="form-group"> 
                                                        <input class="form-control" name="title" value="{{ $category->title }}" id="title" placeholder="Category Name" required> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="content-box-main-footer-ng">
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-4">
                                        <button type="button" name="" class="btn-large actionBtn redBg">cancel</button>
                                        <button type="submit" name="" class="btn-large actionBtn greenBg">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>    
                </form>
            </div>        
        </div>    
           
        <script>

            function addCategory(){
                $("#boxCategory").append(
                    '<div class="col-md-4">'+
                        '<div class="form_control_new">  '+
                            '<div class="label_head">Category Name <span class="pull-right" onclick="removeServicesPkg($(this))"><img src="{{ asset("public/img/cancel.png") }}" /></span></div>'+
                            '<div class="input-group">'+ 
                                '<span class="input-group-addon" id="title"><i class="fa fa-user"></i></span> '+
                                '<input class="form-control" name="title[]" id="title" placeholder="Category Name"> '+
                            '</div>'+
                        '</div>'+
                    '</div>'
                )
            }

            function removeServicesPkg(caller){
            $(caller).closest('.col-md-4').remove();
            }
        </script>
    @endsection 