@extends('admin.layouts.header_layout')

@section('content')
    <div class="content">
        <div class="page-title"> 
            <a class="previousBtn" href="{{ url()->previous() }}">
                <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive" />
            </a>
            <h3>Activity Log  </h3>
            <div class="serchBarDiv">
                <div class="searchContainer">
                    <input class="searchBox" type="search" id="search" name="search" placeholder="Search">
                    <i class="fa fa-search searchIcon"></i>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="content-box-main-ng actLog">
                    <div class="table-responsive tableDiv_ng">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Department</th>
                                    <th>Activity</th>
                                    <th>Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($activitylogs as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        @if ($item->causer['firstname'])
                                            <a href="{{ url('/admin/users/' . $item->causer['id']) }}">{{ ucwords($item->causer['firstname']) }} <?php if(isset($item->causer['lastname']) && !empty($item->causer['lastname']) ){ echo ucwords($item->causer['lastname']);}else{ echo "";}?></a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ ucwords($item->causer['role_name']) }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ date("H:i d/m/Y", strtotime($item->created_at)) }}</td>
                                    <td>
                                        <div class="infIcon"><i class="fa fa-info"></i></div>
                                    </td>
                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $activitylogs->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection