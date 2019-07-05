@extends('admin.layouts.header_layout')

@section('content')

    <div class="content">
        <ul class="breadcrumb">
            <li>
                <p>YOU ARE HERE</p>
            </li>
            <li>
                <a href="#" class="active">Permissions</a> 
            </li>
        </ul>

        <div class="page-title"> 
            <h3>Permissions  </h3>
        </div>

        
        <div class="grid simple ">
        <form method="post" action="{{ url('admin/teams/'.$id.'/permissions') }}">
        {{ csrf_field() }}
            <div class="grid-body ">
                <div class="row">
                @if(isset($permissions) && !empty($permissions))
                @foreach($permissions as $pemsn)
                    <div class="col-md-3">
                        <div class="form_control_new">  
                            <div class="checkbox check-primary text-left">
                                <input id="{{ $pemsn->id }}" name="permissions[]" type="checkbox" value="{{ $pemsn->id }}" <?php if(is_array($permission) && in_array($pemsn->id, $permission)){ echo  "checked";} ?>>
                                <label for="{{ $pemsn->id }}">{{ $pemsn->label}}</label>
                            </div>
                        </div>
                    </div>    
                @endforeach
                @endif  
                </div>

                <hr />
                
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-danger">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        </div>        
    </div>
@endsection 