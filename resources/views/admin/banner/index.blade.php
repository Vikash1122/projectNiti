@extends('admin.layouts.package_layout')

@section('content')

    <div class="content">
        <div class="page-title"> 
            <a class="previousBtn" href="{{ url()->previous() }}">
                <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
            </a>

            <h3>Banners  </h3>

            @if(hasPermissionThroughRole('add_banners'))
            <a href="{{ route('banners.add')}}" class="new_btn_add_service" title="Add New Banner">
                <i class="fa fa-plus"></i> Add New Banner 
            </a>
            @endif
        
        </div>

        <div class="row">
            @if(Session::has('message')) 
                <div class="alert alert-info">
                    {{Session::get('message')}} 
                </div> 
            @endif
                
            <div class="col-md-12">
                <div class="content-box-main-ng">
                    <div class="row"> 
                        <div class="col-md-12">
                            <div class="table-responsive tableDiv_ng">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Active Banners</td>
                                            <td class="text-center">Title</td>
                                            <!-- <td>Banner Url</td> -->
                                            <td class="text-center">Active Date</td>
                                            @if(hasPermissionThroughRole('edit_banners') || hasPermissionThroughRole('delete_banners'))
                                            <td class="text-right" colspan="2">Action</td>
                                            @endif
                                        </tr>
                                    </thead>

                                    <tbody class="bannerTbody">
                                    @if(isset($instant_banners) && !empty($instant_banners))
                                        @foreach($instant_banners as $bann)
                                            <tr>
                                                <td>
                                                    <img src="{{ fileurlbanner().$bann->banner_img }}" class="img-responsive" />
                                                </td>
                                                <td class="text-center">{{ $bann->title }}</td>
                                                <!-- <td>{{ $bann->banner_url }}</td> -->
                                                <td class="text-center">Active</td>
                                                @if(hasPermissionThroughRole('edit_banners') || hasPermissionThroughRole('delete_banners'))
                                                <td class="text-right">
                                                    @if(hasPermissionThroughRole('edit_banners'))
                                                        <a href="{{ url('admin/banners/editBanner/'.$bann->id) }}" class="editbanner_btn12 tableEditBtn padding5" style="color: #ffffff">
                                                        <i class="fa fa-pencil"></i></a>
                                                    @endif
                                                    @if(hasPermissionThroughRole('delete_banners'))
                                                        <a href="{{ url('admin/banners/destroy/'.$bann->id) }}" class="tableDeleteBtn padding5" onclick="return confirm('Are you sure you want to delete this banner?');" style="color: #ffffff"><i class="fa fa-times"></i></a>
                                                       
                                                    @endif
                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="content-box-main-ng">
                    <div class="row"> 
                        <div class="col-md-12">
                            <div class="table-responsive tableDiv_ng">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Scheduled Banners</td>
                                            <td class="text-center">Title</td>
                                            <td class="text-center">Scheduled Date</td>
                                            <td class="text-right" colspan="2">Action</td>
                                        </tr>
                                    </thead>

                                    <tbody class="bannerTbody">
                                    @if(isset($schedule_banners[0]) && !empty($schedule_banners[0]))
                                        @foreach($schedule_banners as $schedule)
                                        <tr>
                                            <td>
                                                <img src="{{ fileurlbanner().$schedule->banner_img }}" class="img-responsive" />
                                            </td>
                                            <td class="text-center">{{ $schedule->title }}</td>
                                            <td class="text-center"><?php if(!empty($schedule->schedule_date) && isset($schedule->schedule_date)){ echo date('d/m/Y', strtotime($schedule->schedule_date));}else{ echo "";}?></td>
                                            @if(hasPermissionThroughRole('edit_banners') || hasPermissionThroughRole('delete_banners'))
                                            <td class="text-right">
                                                @if(hasPermissionThroughRole('edit_banners'))
                                                        <a href="{{ url('admin/banners/editBanner/'.$schedule->id) }}" class="editbanner_btn12 tableEditBtn padding5" style="color: #ffffff">
                                                        <i class="fa fa-pencil"></i></a>
                                                @endif
                                                @if(hasPermissionThroughRole('delete_banners'))
                                                    <a href="{{ url('admin/banners/destroy/'.$schedule->id) }}" class="tableDeleteBtn padding5" onclick="return confirm('Are you sure you want to delete this banner?');" style="color: #ffffff"><i class="fa fa-times"></i></a>
                                                @endif
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            <h4>No Record Found!</h4>
                                        </td>
                                    </tr>
                                    @endif
                                        
                                    </tbody>
                                </table>  
                            </div>
                        </div> 
                    </div>     
                </div>
            </div>
        <div>
    </div>  


    @endsection