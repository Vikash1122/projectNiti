<style>
    .labelheading{color: #2f9247;
        font-weight: 500;
        margin-bottom: 10px;
        width: 100%;
        letter-spacing: .5px;
    }
    .labelheading11{
        color: #2f9247 !important;
        font-weight: 500 !important;
        margin-bottom: 10px;
        letter-spacing: .5px;
    }
    .permissionListBox{
        border-bottom: 1px solid #cccccc6b;
        margin-bottom: 10px;
        padding-top: 10px;
        width: 100%;
    }
</style>
<div class="content-box-main">
    <div class="row">
        <div class="col-md-6">
            <div class="form_control_new">  
                <div class="label_head">User Name</div>
                <div class="">
                    <input class="form-control" name="name" id="name" placeholder="User Name" value="{{ $role->name }}" required> 
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
       
        <div class="col-md-12 text-center" style="margin-top:20px;">
            <div class="form_control_new">  
                <div class="label_head">Click to give permissions to this Group</div><hr/>
            </div>

            <div class="form_control_new"> 
            @if(isset($permissions) && !empty($permissions))
                @foreach($permissions as $pemsn)
                <div class="permissionListBox">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="checkbox check-primary text-left">
                                <input id="{{ $pemsn->id }}" name="permissions[]" type="checkbox" value="{{ $pemsn->id }}" <?php if(is_array($role->permissions->pluck('id')->toArray()) && in_array($pemsn->id, $role->permissions->pluck('id')->toArray())){ echo  "checked";} ?> >
                                <label class="labelheading11" for="{{ $pemsn->id }}">{{ $pemsn->label}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if(isset($pemsn->permissions[0]) && !empty($pemsn->permissions[0]))
                        @foreach($pemsn->permissions as $perm)
                            <div class="col-md-3">  
                                <div class="checkbox check-primary text-left">
                                    <input id="{{ $perm->id }}" name="permissions[]" type="checkbox" value="{{ $perm->id }}" <?php if(is_array($role->permissions->pluck('id')->toArray()) && in_array($perm->id, $role->permissions->pluck('id')->toArray())){ echo  "checked";} ?> >
                                    <label for="{{ $perm->id }}">{{ $perm->label}}</label>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                @endforeach
            @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- <button type="submit" class="btn addSerBtn">Create</button> -->
            {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn addSerBtn']) !!}
        </div>
    </div>
</div>
