<div class="col-xs-12 col-md-8 col-lg-9">
        <div class="box box-primary">
            <div class="box-header">
                <div class="pull-left">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @elseif (Session::has('warnning'))
                        <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
                    @endif
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}" >
                    {!! Form::label('name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    @if($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}" >
                    {!! Form::label('slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                    @if($errors->has('slug'))
                        <span class="help-block">{{ $errors->first('slug') }}</span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                    {!! Form::label('email') !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                    
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                    {!! Form::label('password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                    
                </div>
                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                    {!! Form::label('password_confirmation') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
                    
                </div>
                <div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
                    {!! Form::label('role') !!}
                    @if($user->exists && ($user->id == config('cms.default_user_id') || isset($hideRoleDropdown)))
                        {{ Form::hidden('role', $user->roles->first()->id) }}
                        <p class="form-control-static">{{ $user->roles->first()->display_name }}</p>
                    @else
                        {!! Form::select('role', App\Role::pluck('display_name', 'id'), $user->exists ? $user->roles->first()->id : null, ['class' => 'form-control', 'placeholder' => 'Choose a Role']) !!}
                        
                    @endif
                    {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
                    
                </div>
                <div class="form-group" >
                    {!! Form::label('bio') !!}
                    {!! Form::textarea('bio', null, ['rows' => 5, 'class' => 'form-control']) !!}
                    @if($errors->has('bio'))
                        <span class="help-block">{{ $errors->first('bio') }}</span>
                    @endif
                </div>
                {{-- <hr> --}} 
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">{{ $user->exists ? 'Update' : 'Save' }}</button>
                <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
        <!-- /.box -->
</div>
@include('backend.users.script')