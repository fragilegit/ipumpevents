@extends('layouts.app')

@section('title', config('app.name').' | '. $event->event_name)

@section('content')
<section class="container">
    <div class="row">
        <div class="col-md-8">
            {{-- <article class="post-item post-detail">
                @if($event->event_image)
                <div class="post-item-image">
                    <a href="#">
                    <img src="/Storage/event_image/{{ $event->event_image}}" alt="">
                    </a>
                </div>
                @endif
                <div class="post-item-body">
                    <div class="padding-10">
                    <h1>{{ $event->event_name }}</h1>

                        <div class="post-meta no-border">
                            <ul class="post-meta-group">
                            <li><i class="fa fa-user"></i><a href="{{ route('author', $event->user->slug) }}"> {{ $event->user->name }} </a></li>
                            <li><i class="fa fa-clock-o"></i><time> {{ $event->date }} </time></li>
                            <li><i class="fa fa-folder"></i><a href="{{ route('category', $event->category->slug) }}"> {{ $event->category->title }}</a></li>
                            <li><i class="fa fa-tag"></i>{!! $event->tags_html !!}</li>
                            <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                            </ul>
                        </div>
                        {!! $event->body_html !!}
                    </div>
                </div>
            </article> --}}

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
                    <p class="card-text">{!! $event->excerpt !!}</p>
                    <p class="card-text">{!! $event->description !!}</p>
                </div>
                
                <div class="card-footer post-meta clearfix">
                    <div class="pull-left" style="">
                    <small>  <ul class="post-meta-group">
                            <li><i class="fa fa-user"></i><a href="{{ route('author', $event->user) }}"> {{ $event->user->name }}</a></li>
                            <li><i class="fa fa-clock-o"></i><time> {{ $event->date }} </time></li>
                            <li><i class="fa fa-folder"></i><a href="{{ route('category', $event->category->slug) }}"> {{ $event->category->title }}</a></li>
                            {{-- <li><i class="fa fa-tag"></i> {!! $event->tags_html !!}</li> --}}
                            {{-- <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li> --}}
                            <li><i class="fa fa-calendar"></i><span>{{ $event->startDateFormatted(true) }}</span></li>
                        </ul></small>
                    </div>
                    <div class="pull-right">
                    </div>
                </div>
                {{-- <hr> --}}
            </div>
            <hr><br>
            {{-- map --}}
            @if(isset($event->lat) && isset($event->lng))
            <h2>Event Location</h2>
            <div id="map-canvas"></div>
            <hr><br>
            @endif
            {{-- author bio --}}
            <article class="post-author padding-10">
                <div class="media">
                  <div class="media-left">
                    <?php $author= $event->user; ?>
                  <a href="{{ route('author', $author->slug) }}">
                    <img alt="{{ $author->name }}" src="{{ $author->gravatar() }}" width="100" height="100"class="media-object">
                    </a>
                  </div>
                  <div class="media-body">
                  <h4 class="media-heading"><a href="{{ route('author', $author->slug) }}">{{ $author->name }}</a></h4>
                    <div class="post-author-count">
                      <a href="#">
                          <i class="fa fa-clone"></i>
                          <?php $eventCount = $author->events()->published()->count(); ?>
                          {{ $eventCount }} {{ str_plural('event', $eventCount )}}
                      </a>
                    </div>
                    {!! $author->bio_html !!}<p></p>
                  </div>
                </div>
            </article>

           {{-- post comments here --}}
        </div>
        @include('inc.sidebar')
    </div>
</section>
@endsection
@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyATj3nXIlTh6atBzhuGuCiuM8sPtU5bw&callback=initMap" async defer></script>
<script type="text/javascript">

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
    });
    function initMap(){
        var lat = {{ $event->lat }};
        var lng = {{ $event->lng }};
        var event_name = "{{ $event->event_name }}";

        map = new google.maps.Map(document.getElementById('map-canvas'),{
        center: {lat: lat, lng: lng},
        zoom: 15
    });
    var contentString ='<a href="#" data-toggle="tooltip" title="Hooray!">'+ event_name +'</a>';
    var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

    marker = new google.maps.Marker({
        position:{
            lat: lat,
            lng: lng
        },
        map:map,
        title: event_name
    });

    marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
    }
</script>
@endsection