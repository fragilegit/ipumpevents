@extends('layouts.appes')
@section('content')
    <section>
        
    </section>      
    <section>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
    
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                         You are logged in! Your account is: {{ auth()->user()->verified() ? 'Verified.' : 'not verified.'}}
                        <a href="/events/create" class="btn btn-primary">Create Event</a>
                        <h3>Your Event Posts</h3>
                        @if(count($events) > 0)
                        <table id="eventPost" class="table table-striped display" style="width:100%">
                            <thead>
                                    <tr>
                                        <th>Event Image</th>
                                        <th>Event Name</th>
                                        <th>Created At</th>
                                        <th>Strat Date</th>
                                        <th>End Date</th>
                                        <th>Actions</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($events as $event)
                                    <tr>
                                        <td></td>
                                        <td>{{$event->event_name}}</td>
                                        <td>{{$event->created_at}}</td>
                                        <td>{{$event->start_date}}</td>
                                        <td>{{$event->end_date}}</td>
                                        <td>
                                            <a href="/posts/{{$event->id}}/edit" class="btn btn-primary">Edit</a>
                                            {!!Form::open(['action'=>['EventController@destroy', $event->id], 'method'=> 'POST', 'class'=> 'pull-right'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                            {!!Form::close()!!}
                                        </td>  
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Event Image</th>
                                        <th>Event Name</th>
                                        <th>Created At</th>
                                        <th>Strat Date</th>
                                        <th>End Date</th>
                                        <th>Actions</th>
                                        
                                    </tr>
                                </tfoot>
                        </table>
                        @else
                            <p>You have no Events</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="panel panel-primary">
            {{-- <div class="panel-heading">Events</div> --}}
            <h1 class="panel-heading">Your Events</h1>
            <div class="panel-body">
                {!! $calendar_details->calendar() !!}
            </div>
        </div>
    </section>
@endsection