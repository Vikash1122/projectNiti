<div class="content-box-main">
    <div class="row">
        <div class="col-md-12">
            <div class="form_control_new">  
                <div class="label_head">First Name</div>
                <div class="form-group">
                    <input class="form-control" name="firstname" id="firstname" value="{{ $user->firstname }}" placeholder="First Name" required> 
                    {!! $errors->first('firstname', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form_control_new">  
                <div class="label_head">Last Name</div>
                <div class="form-group">
                    <input class="form-control" name="lastname" id="lastname" value="{{ $user->lastname }}" placeholder="Last Name"> 
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form_control_new">  
                <div class="label_head">Email/Username</div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" id="email" placeholder="Email/Username" required> 
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form_control_new">  
                <div class="label_head">Mobile</div>
                <div class="form-group">
                    <input type="tel" class="form-control" maxlength="10" value="{{ $user->mobile }}" name="mobile" id="mobile" placeholder="Mobile" required> 
                    {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form_control_new">  
                {!! Form::label('password', 'Password ', ['class' => 'label_head']) !!}
                @php
                    $passwordOptions = ['class' => 'form-control'];
                    if ($formMode === 'create') {
                        $passwordOptions = array_merge($passwordOptions, ['required' => 'required']);
                    }
                @endphp
                <div class="form-group">
                {!! Form::password('password', $passwordOptions) !!}
                {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form_control_new">  
                {!! Form::label('role', 'Role ', ['class' => 'label_head']) !!}
                <div class="form-group">
                {!! Form::select('roles[]', $roles, isset($user_roles) ? $user_roles : [], ['class' => 'form-control', 'multiple' => true]) !!}
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn addSerBtn']) !!}    
            <button type="submit" class="btn addSerBtn">Create</button>
        </div>
    </div>
</div>

<!-- <div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div> -->
<!-- <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name', 'Name: ', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
    {!! Form::label('email', 'Email: ', ['class' => 'control-label']) !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
    {!! Form::label('password', 'Password: ', ['class' => 'control-label']) !!}
    @php
        $passwordOptions = ['class' => 'form-control'];
        if ($formMode === 'create') {
            $passwordOptions = array_merge($passwordOptions, ['required' => 'required']);
        }
    @endphp
    {!! Form::password('password', $passwordOptions) !!}
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('roles') ? ' has-error' : ''}}">
    {!! Form::label('role', 'Role: ', ['class' => 'control-label']) !!}
    {!! Form::select('roles[]', $roles, isset($user_roles) ? $user_roles : [], ['class' => 'form-control', 'multiple' => true]) !!}
</div> -->

