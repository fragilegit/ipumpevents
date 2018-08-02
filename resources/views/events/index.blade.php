@extends('layouts.app')

@section('title', config('app.name').' | Events')

@section('content')
<section class="container">
    <div class="row section-room">
        @include('inc.sidebar')
        <div class="col-xs-12 col-sm-12 col-md-8">
            @if($events->count())

            @include('events.alert')

                <div class="row">
                    <div class="card-columns">
                        @foreach($events as $event)
                            <div class="card">
                                @if($event->event_image)
                                    <a href="{{ route('events.show', $event->slug) }}">
                                        <img class="card-img-top" src="{{ $event->image_url }}" alt="Card image cap">
                                    </a>
                                @endif
                                <div class="card-body">
                                    <h2 class="card-title">
                                        <a href="{{ route('events.show', $event->slug) }}">{{$event->event_name}}</a>
                                    </h2>
                                    <p class="card-text">{{ $event->excerpt }}</p>
                                </div>
                                
                                <div class="card-footer post-meta clearfix">
                                    <div class="pull-left" style="">
                                    <small>  <ul class="post-meta-group">
                                            <li><i class="fa fa-user"></i><a href="{{ route('author', $event->user) }}"> {{ $event->user->name }}</a></li>
                                            <li><i class="fa fa-clock-o"></i><time> {{ $event->date }} </time></li>
                                            <li><i class="fa fa-folder"></i><a href="{{ route('category', $event->category->slug) }}"> {{ $event->category->title }}</a></li>
                                            {{-- <li><i class="fa fa-tag"></i> {!! $event->tags_html !!}</li> --}}
                                            {{-- <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li> --}}
                                        </ul></small>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('events.show', $event->slug) }}" class="btn btn-primary btn-sm">See More &raquo;</a>
                                    </div>
                                </div>
                            </div> <!-- /.card -->
                        @endforeach
                    </div> <!-- /.card-colums --> 
                </div> <!-- /.row -->
                
            @else
            <article class="alert alert-warning">
            Nothing Found
            </article>
            @endif
            <nav>
                {{ $events->appends(request()->only(['term','month','year']))->links() }}
            </nav>
        </div> <!-- /.col-xs -->
    </div>
</section>
@endsection