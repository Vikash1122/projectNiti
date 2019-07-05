@extends('admin.layouts.main-layout')

@section('content')
    <style>
        @font-face {
            font-family: 'Nexa Bold';
            src: url('../../../public/fonts/Nexa Bold.otf');
        }
        @font-face {
            font-family: 'Arial';
            src: url('../../../public/fonts/ARIALBD.TTF');
        }
        .page-title{
            width:100%;
            float:left;
        }
        
        .page-title h3{
            float: left;
            width: auto;
            font-size: 20px;
            font-family: 'Nexa Bold';
            color: rgba(69, 69, 69, 0.57);
            letter-spacing: 1px;
        }
        .page-title .sub_pages{
            width:auto;
            float:left;
        }
        .page-title .sub_pages h3{
            color: #454545;
        }
        .form_control_new .label_head {
            margin-bottom: 0;
            letter-spacing: 1px;
            color: #4D4D4D;
            font-size: 16px;
            font-weight: 500;
            font-family: 'Nexa Bold';
        }
        .addSerBtn{
            background: #2f9247;
            padding: 8px 20px;
            font-size: 18px;
            color: #ffffff;
            font-family: 'Nexa Bold';
            letter-spacing: 1.5px;
        }
    </style>
    <div class="content">
        <div class="page-title"> 
            <a href="{{ url()->previous() }}" class="previousBtn">
                <img src="{{asset('public/img/go_back.png')}}" class="img-responsive">
            </a>
            <h3> User </h3>
            <div class="sub_pages"><i class="fa fa-angle-right"></i> <h3>Edit User</h3></div>
        </div>

                
        <div class="clearfix"></div>
        @if(Session::has('message')) 
            <div class="alert alert-info">
                {{Session::get('message')}} 
            </div> 
        @endif

            <div class="row">
                <div class="col-md-12 ">
                    <div class="sub_service_form">
                   
                    @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($role, [
                            'method' => 'PATCH',
                            'url' => ['/admin/privileges', $role->id],
                            'class' => 'form-horizontal'
                        ]) !!}

                        @include ('admin.roles.editform', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                    
                    </div>
                </div>
    
        </div>    
@endsection
