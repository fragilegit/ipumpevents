<table class="table table-bordered">
    <thead>
        <tr>
            <td width="80">Action</td>
            <td>Title</td>
            <td width="120">Author</td>
            <td width="120">Category</td>
            <td width="160">Created At</td>
        </tr>
    </thead> 
    <tbody>
        <?php $request = request(); ?>
        @foreach($events as $event)
        <tr>
            <td>    
            {!! Form::open(['style' => 'display: inline-block;', 'method' => 'PUT', 'route' => ['admin.restore', $event->id ]]) !!}
            @if(checkUserPermissions($request, "Event@restore", $event->id))  
                <button title="Restore" class="btn btn-xs btn-default">
                    <i class="fa fa-refresh"></i>
                </button>
            @else
                <button title="Restore" onclick="return false;" class="btn btn-xs btn-default disabled">
                    <i class="fa fa-refresh"></i>
                </button>
            @endif
            {!! Form::close() !!}
            
            {!! Form::open(['style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => ['admin.force-destroy', $event->id ]]) !!}
            @if(checkUserPermissions($request, "Event@forceDestroy", $event->id))  
                <button title="Delete Permanent" type="submit" class="btn btn-xs btn-danger" onclick="return confirm('You are about to delete an Event permanently. Are you sure?')">
                    <i class="fa fa-times"></i>
                </button>
            @else
                <button title="Delete Permanent" type="button" class="btn btn-xs btn-danger disabled" onclick="return false;">
                    <i class="fa fa-times"></i>
                </button>
            @endif
            {!! Form::close() !!}
            </td>
            <td>{{ $event->event_name }}</td>
            <td>@if(isset($event->user)){{ $event->user->name }}@endif</td>
            @if(isset($event->category->title))
            <td>{{ $event->category->title }}</td>
            @else
            <td> no cat</td>
            @endif
            <td>
                <abbr title="{{ $event->dateFormatted(true) }}"> {{ $event->dateFormatted() }}</abbr>
                {{-- {!! $event->publicationLabel() !!} --}}
            </td>
            </tr>
        @endforeach
        
    </tbody>  
</table>