@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@elseif (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@elseif(session('trash-message')) 
    <?php list($message, $eventId) = session('trash-message') ?>
        {!! Form::open(['method' => 'PUT', 'route' => ['admin.restore', $eventId ]]) !!}
            <div class="alert alert-info">      
                {{ $message }}
                <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-undo"></i> Undo</button>
            </div>
        {!! Form::close() !!}
@endif