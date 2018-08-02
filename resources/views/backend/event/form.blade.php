<div class="col-xs-12 col-md-8 col-lg-9">
        <div class="box">
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
                <div class="form-group {{ $errors->has('event_name') ? 'has-error' : ''}}" >
                    {!! Form::label('event_name') !!}
                    {!! Form::text('event_name', null, ['class' => 'form-control']) !!}
                    @if($errors->has('event_name'))
                        <span class="help-block">{{ $errors->first('event_name') }}</span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
                    {!! Form::label('slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
                    
                </div>
                <div class="form-group excerpt {{ $errors->has('excerpt') ? 'has-error' : ''}}">
                    {!! Form::label('excerpt') !!}
                    {!! Form::textarea('excerpt', null, ['id' => 'excerpt', 'class' => 'form-control']) !!}
                    {!! $errors->first('excerpt', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                    {!! Form::label('description') !!}
                    {!! Form::textarea('description', null, ['id'=>'article-ckeditor','class' => 'form-control']) !!}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
                
                <div class="form-group">
                    {{ Form::label('map', 'Add Even Location') }}
                    {{-- {{ Form::text('searchmap', null, ['class' => 'form-control'], ['id' => 'searchmap'])}} --}}
                    <div id="map-canvas" style="width: inherit; height: 350px;"></div>
                </div>
                <div class="form-group" style="display: none;">
                    <div class="col-xs-6">
                        {{ Form::label('lat', 'Lat') }}
                        {{ Form::text('lat', null, ['class' => 'form-control'], ['id' => 'lat']) }}
                    </div>
                    <div class="col-xs-6">
                        {{ Form::label('lng', 'Lng') }}
                        {{ Form::text('lng', null, ['class' => 'form-control'], ['id' => 'lng']) }}
                    </div>
                    {{-- {{ Form::hidden('lat', ['id' => 'lat']) }}
                    {{ Form::hidden('lng', ['id' => 'lng']) }} --}}
                </div>
                <hr>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
</div>
<div class="col-xs-12 col-md-4 col-lg-3">
    <div class="box">
        <div class="box-header">
            <h2 class="box-title">Event Date</h2>
        </div>
        <div class="box-body">
            <div class="form-group {{ $errors->has('published_at') ? 'has-error' : ''}}">
                <div class='input-group date' id='datetimepicker1'>
                        {!! Form::text('published_at', null, ['id' => 'published_at', 'class' => 'form-control', 'placeholder' => 'Y-m-d H:i:s']) !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                
                {!! $errors->first('published_at', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="box-footer">
            <div class="pull-left">
                <a id="draft-btn" class="btn btn-default">Save Draft</a>
            </div>
            <div class="pull-right">
                {!! Form::submit('Publish', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {{-- /.box-body --}}
    </div>
    {{-- /.box --}}
    <div class="box">
        <div class="box-header width-border">
            <h2 class="box-title">Category</h2>
        </div>
        <div class="box-body">
            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
                {!! Form::select('category_id', App\Category::pluck('title', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Select Category']) !!}
                {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    {{-- <div class="box">
        <div class="box-header width-border">
            <div class="box-title">Tags</div>
        </div>
        <div class="box-body">
            <div class="form-group">
                {!! Form::text('event_tags', null,['class' => 'form-control']) !!}
            </div>
        </div>
    </div> --}}
    <div class="box">
        <div class="box-header">
            <h3 class="box-title with-border">Feature Image</h3>
        </div>
        <div class="box-body text-center">
            <div class="form-group {{ $errors->has('event_image') ? 'has-error' : ''}}">
                <br>
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="{{ ($event->image_thumb_url) ? $event->image_thumb_url : 'http://placehold.it/200x150$text=No+Image' }}" alt="...">
                        {{-- <img src="/storage/event_image/{{ $event->event_image }}" alt="..."> --}}
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                    <div>
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>{!! Form::file('event_image') !!}</span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                    </div>
                </div>
                {!! $errors->first('event_image', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    {{-- /.box --}}
</div>
@include('backend.event.script')
  