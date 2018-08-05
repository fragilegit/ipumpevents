<div class="col-xs-12 col-md-8 col-lg-9">
        <div class="box box-success">
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
                <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}" >
                    {!! Form::label('title') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    @if($errors->has('title'))
                        <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
                    {!! Form::label('slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
                    
                </div>
                <hr>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">{{ $category->exists ? 'Update' : 'Save' }}</button>
                <a href="{{ route('categories.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
        <!-- /.box -->
</div>
@include('backend.categories.script')
  