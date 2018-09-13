<div class="col-xs-12 col-sm-12 col-md-4">
    <aside class="left-sidebar">

        <div class="card search-room">
            <form action="{{ url('events') }}">
                <div class="input-group">
                    <input type="text" class="form-control input-lg" name="term" value="{{ request('term') }}" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-lg btn-default" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div><!-- /input-group -->
            </form>
        </div>

        <div class="card card-room bg-danger text-default">
            <div class="card-header">
                <h4>Categories</h4>
            </div>
            <ul class="list-group">
                @foreach($categories as $category)
                <li class="list-group-item">
                <a href="{{ route('category', $category->slug) }}" class="text-default"><i class="fa fa-angle-right"></i>{{ $category->title }}</a>
                <span class="badge pull-right">{{ $category->events->count()}}</span>
                </li>
                @endforeach                    
            </ul>
            
        </div>

        <div class="card card-room bg-success text-default">
            <div class="card-header">
                <h4>Popular Events</h4>
            </div>
            <div class="body">
                <ul class="popular-posts">
                    @foreach($popularEvents as $event)
                    <li>
                        @if($event->image_url)
                        <div class="post-image">
                            <a href="{{ route('events.show', $event->slug) }}">
                                {{-- <img src="{{ $event->image_thumb_url }}" /> --}}
                                <img src="{{ $event->image_url }}" />
                            </a>
                        </div>
                        @endif
                        <div class="post-body">
                            <h6><a href="{{ route('events.show', $event->slug) }}" class="text-default">{{ $event->event_name }}</a></h6>
                            <div class="post-meta">
                                <span>{{ $event->date }}</span>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- <div class="widget">
            <div class="widget-heading">
                <h4>Tags</h4>
            </div>
            <div class="widget-body">
                <ul class="tags">
                @foreach($tags as $tag)
                    <li><a href="{{ route('tag', $tag->slug) }}">{{ $tag->name }}</a></li>
                @endforeach                    
                </ul>
            </div>
        </div>  --}}

        {{-- <div class="card card-room text-default bg-warning">
            <div class="card-header">
                <h4>Archives</h4>
            </div>
            <div class="body">
                <ul class="list-group">
                    @foreach($archives as $archive)
                        <li class="list-group-item"><a href="{{ route('event', ['month' => $archive->month, 'year' => $archive->year]) }}" class="text-default">
                            {{ month_name($archive->month) ." ". $archive->year }}
                        </a><span class="badge pull-right">{{ $archive->event_count }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div> --}}
        
    </aside>
</div>