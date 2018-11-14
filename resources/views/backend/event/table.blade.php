<div class="table-responsive">


    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td width="100">Action</td>
                <td>Title</td>
                <td width="120">Author</td>
                <td width="120">Category</td>
                <td width="160">Start Date</td>
                <td width="160">Created At</td>
            </tr>
        </thead> 
        <tbody>
            <?php $request = request(); ?>
            @foreach($events as $event)
            <tr>
                <td>    
                {!! Form::open(['method' => 'DELETE', 'route' => ['event.destroy', $event->id ]]) !!}
                @if(checkUserPermissions($request, "Event@edit", $event->id))
                    <a href="{{ route('event.edit', $event->id)}}" class="btn btn-xs btn-default">
                        <i class="fa fa-edit"></i>
                    </a>
                @else
                    <a href="#" class="btn btn-xs btn-default" disabled>
                        <i class="fa fa-edit"></i>
                    </a>
                @endif

                @if(checkUserPermissions($request, "Event@destroy", $event->id))
                    <button type="submit" class="btn btn-xs btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                @else
                <button type="button" onclick="return false;" class="btn btn-xs btn-danger disabled">
                    <i class="fa fa-trash"></i>
                </button>
                @endif
                {!! Form::close() !!}
                </td>
                <td>{{ $event->event_name }}</td>
                <td>{{ $event->user->name }}</td>
                <td>{{ $event->category->title }}</td>
                <td>
                    <abbr title="{{ $event->startDateFormatted(true) }}"> {{ $event->startDateFormatted() }}</abbr>
                    {{-- {!! $event->publicationLabel() !!} --}}
                </td>
                <td>
                    <abbr title="{{ $event->dateFormatted(true) }}"> {{ $event->dateFormatted() }}</abbr>
                    {!! $event->publicationLabel() !!}
                </td>
                </tr>
            @endforeach
            
        </tbody>  
    </table>

</div>