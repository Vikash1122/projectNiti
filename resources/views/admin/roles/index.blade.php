@extends('admin.layouts.header_layout')

@section('content')

    <link href="{{ asset('public/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/plugins/bootstrap-select2/select2.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('public/plugins/jquery-datatable/css/jquery.dataTables.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" />
    
    <style>
        @font-face {
            font-family: 'Nexa Bold';
            src: url('../../../public/fonts/Nexa Bold.otf');
        }
        @font-face {
            font-family: 'Arial';
            src: url('../../../public/fonts/ARIALBD.TTF');
        }
        .list_of_sub_services{

        }
        table.table thead .sorting_asc{
            background:none !important;
        }
        .list_of_sub_services .edit_btn {
            background: #2f9247;
            border: 2px solid #2f9247;
            color: #fff;
        }
        .list_of_sub_services .delete_btn {
            background: #F44336;
            border: 2px solid #F44336;
            color: #fff;
        }
        .list_of_sub_services .delete_btn a, .list_of_sub_services .delete_btn a:hover{
            color:#ffffff;
        }
        .table-condensed>thead>tr>th{
            color: #4D4D4D;
            font-family: 'Nexa Bold';
            font-size:15px;
            text-transform: capitalize;
        }
        .table-condensed>thead{
            background: rgba(228, 232, 234, 0.19);
        }
        .table-condensed>thead>tr>th:last-child, .table-condensed>tbody>tr>td:last-child{
            text-align:right;
        }

        .page-title {
            width: 100%;
            float: left;
        }

        .page-title h3 {
            float: left;
            width: auto;
            font-size: 20px;
            font-family: 'Nexa Bold';
            color: rgba(69, 69, 69, 0.57);
            letter-spacing: .9px;
        }
        .page-title .sub_pages {
            width: auto;
            float: left;
        }
        .page-title i {
            padding-left: 15px;
            top: 9px;
        }
        
        .page-title .sub_pages h3 {
            color: #454545;
        }
        .list_of_sub_services .DTTT {
            display: none !important;
        }
        .list_of_sub_services .select2-container .select2-choice .select2-arrow {
            background: transparent;
            border-left: none;
        }
        .list_of_sub_services .select2-container .select2-choice .select2-arrow b:before {
            content: "" !important;
        }

        .new_btn_add_service{
            width: auto;
            display: inline-block;
            background: #2f9348;
            color: #ffffff;
            float: right;
            padding: 8px;
            font-family: 'Nexa Bold';
            font-size: 16px;
            font-weight: 100 !important;
            letter-spacing: 1.5px;
        }
        .new_btn_add_service:hover, .new_btn_add_service i:hover{
            color:#ffffff !important;
        }
        .new_btn_add_service i{
            color: #ffffff !important;
            top: 4px !important;
            font-size: 16px;
            margin-right: 8px;
        }
        .card_box_opt{
            margin-bottom:0px !important;
        }
    </style>

    <div class="content">
        <div class="page-title"> 
            <a class="previousBtn" href="{{ url()->previous() }}">
                <img src="{{ asset('public/img/go_back.png') }}" class="img-responsive">
            </a>
            <h3>Users List</h3>
            @if(hasPermissionThroughRole('add_privileges'))
            <a href="{{ url('/admin/privileges/create') }}" class="new_btn_add_service"><i class="fa fa-plus"></i> Add New </a>
            @endif
        </div>
        
       

        @if(isset($roles[0]) && !empty($roles[0]))
            
            <div class="row">
                <div class="col-md-12">
                    <div class="content-box-main-ng">
                        <!-- <div class="row-fluid list_of_sub_services">
                            <div class="span12">
                                <div class="grid simple ">
                                    <div class="grid-body" style="background:transparent;padding:0px;border:none;"> -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive tableDiv_ng">
                                                    <table class="table table-condensed" id="example23">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr. No.</th>
                                                                <th>User Name</th>
                                                                @if(hasPermissionThroughRole('active_privileges'))
                                                                <th>Status</th>
                                                                @endif
                                                                <th>Action</th>
                                                                <th style="width:20%;">&nbsp;</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php   $i = 1; ?>
                                                            @foreach($roles as $item)
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $item->name }}</td>
                                                                @if(hasPermissionThroughRole('active_privileges'))
                                                                <td>
                                                                    <div class="action_box" style="margin-bottom:0px;">
                                                                        <div class="card_box_opt">
                                                                            <div class="toggleCheckBox" style="text-align: left;">
                                                                            @if($item->status == 1)
                                                                            <label class="switch">
                                                                            <input name="status" type="checkbox" onclick="statusChange1(<?php echo $item->id; ?>)" value="0" id="enable_{{$item->id}}" checked>
                                                                            <span class="slider round"></span>
                                                                            </label>
                                                                            @else
                                                                            <label class="switch">
                                                                            <input name="status" type="checkbox" onclick="statusChange1(<?php echo $item->id; ?>)" value="1" id="enable_{{$item->id}}">
                                                                            <span class="slider round"></span>
                                                                            </label>
                                                                            @endif
                                                                            </div>
                                                                        </div>                                                
                                                                    </div>
                                                                </td>
                                                                @endif
                                                                <td>
                                                                    <!-- <a href="{{ url('/admin/privileges/' . $item->id) }}" title="View Role"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a> -->
                                                                    @if(hasPermissionThroughRole('edit_privileges'))
                                                                        <a href="{{ url('/admin/privileges/' . $item->id . '/edit') }}" title="Edit Role">
                                                                            <button class="tableEditBtn"><i class="fa fa-pencil"></i></button>
                                                                            <!-- <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> -->
                                                                        </a>
                                                                    @endif
                                                                    @if(hasPermissionThroughRole('delete_privileges'))
                                                                        {!! Form::open([
                                                                            'method' => 'DELETE',
                                                                            'url' => ['/admin/privileges', $item->id],
                                                                            'style' => 'display:inline'
                                                                        ]) !!}
                                                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                                                    'type' => 'submit',
                                                                                    'class' => 'tableDeleteBtn',
                                                                                    'title' => 'Delete Role',
                                                                                    'onclick'=>'return confirm("Confirm delete?")'
                                                                            )) !!}
                                                                        {!! Form::close() !!}
                                                                    @endif
                                                                </td>
                                                                <td>&nbsp;</td>
                                                            </tr>

                                                            <?php  $i++; ?>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>

        @endif
    </div>
   
  
@endsection

