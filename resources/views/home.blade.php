@extends('layouts.app')
@section('content')
<header class="v-header container">
    <div class="fullscreen-video-wrap">
        <video src="{{ asset('storage/videos/baby.mp4') }}" autoplay="true" loop="true" muted="true"></video>
    </div>
    {{-- autoplay="" loop="" muted="" --}}
    <div class="header-overlay"></div>
    <div class="header-content">
        <h1>Weclome to {{ config('app.name') }}</h1>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, explicabo.</p>
    </div>
</header>
<section id="event-feature" class="">
    <div class="container">
        <h2>Lorem ipsum dolor sit amet consectetur.</h2>
        <hr class="half-rule bg-success">
        <div class="row">
            @if(count($events) > 0)
                @foreach($events as $event)
                <div class="col-sm-6 col-md-4">
                    <div class="card">
                        @if(isset($event->event_image))
                            {{-- <img class="card-img-top" src="{{ $event->image_thumb_url }}" alt="{{ $event->event_name }}"> --}}
                            <img class="card-img-top" src="{{ $event->image_url }}" alt="{{ $event->event_name }}">
                        @endif
                       {{-- <div class="card-body">
                             <h2 class="card-title">
                                <a href="{{ route('events.show', $event->slug) }}">{{$event->event_name}}</a>
                            </h2> 
                             <p class="card-text">{{ $event->excerpt }}</p> 
                        </div>--}}
                        <div class="card-footer post-meta clearfix">
                            <div class="pull-left" style="">
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('events.show', $event->slug) }}" class="btn btn-primary btn-sm">See More &raquo;</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
            
        </div>
        <hr class="half-rule">
    </div>
</section>
<section id="event-feature-2" class="bg-white">
    <div class="container">
        <h2>Lorem ipsum dolor sit amet.</h2>
        <div class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et, totam!</div>
        <hr class="half-rule">
        <div class="row">
            <div class="col-sm-4">
                <img src="#" alt="" class="img-responsive">
                <h3>Lorem ipsum dolor sit.</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur alias nobis dolore a libero perspiciatis optio natus fugit dignissimos tempore eveniet quibusdam, animi ullam sed.</p>
            </div>
            <div class="col-sm-4">
                <img src="#" alt="" class="img-responsive">
                <h3>Lorem ipsum dolor sit.</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum minus distinctio voluptatibus, nulla provident modi enim numquam!</p>
            </div>
            <div class="col-sm-4">
                <img src="#" alt="" class="img-responsive">
                <h3>Lorem ipsum dolor sit.</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia cumque debitis cum sapiente?</p>
            </div>
        </div>
        <hr class="half-rule">
        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
        <a href="#" class="btn btn-success">Learn more</a>
    </div>
</section>
@endsection
